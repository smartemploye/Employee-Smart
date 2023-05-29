<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\DataMagang;
use App\Models\Siswa;
use App\Models\Akun;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\DataBidang;
use Illuminate\Support\Facades\Crypt;


class RegisterController extends Controller
{
    public function index()
    {
        $sekolah = DB::table('sekolah')
            ->get(['id', 'nama_sekolah']);

        $bidang = DB::table('data_bidang')
            ->get(['id', 'jenis_jurusan']);

        return view('register.index', compact('sekolah', 'bidang'));
    }

    public function store(Request $request)
    {
         $request->validate([
                'nama_siswa' => 'required|min:9',
                'nisn' => 'required|numeric|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'sekolah_id' => 'required',
                'jenis_jurusan' => 'required',
                'no_wa' => 'required|numeric|digits_between:12,13',
                'foto_siswa' => 'required',
                'tanggal_lahir' => 'required|before:today',
                'jurusan' => 'required',
                'paket_magang' => 'required',
                'nama_pembimbing' => 'required',
                'nip_pembimbing' => 'required|numeric|digits:18|unique:users',
                'no_wa_pembimbing' => 'required|numeric|digits_between:12,14',
                'ukuran_baju' => 'required',
                'surat_pengajuan' => 'required',
                'username' => 'required|email',
                ], [
            'nama_siswa.required' => 'Form harus diisi!',
            'nama_siswa.min' => 'Nama tidak boleh kurang dari 9 karakter!',
            'nisn.required' => 'Form harus diisi!',
            'nisn.numeric' => 'NISN harus diinput dalam format angka!',
            'nisn.unique' => 'NISN sudah terdaftar!',
            'password.required' => 'Form harus diisi!',
            'password_confirmation.required' => 'Konfirmasi password tidak cocok!',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok!',
            'sekolah_id.required' => 'Form harus diisi!',
            'jenis_jurusan.required' => 'Form harus diisi!',
            'no_wa.required' => 'Form harus diisi!',
            'no_wa.numeric' => 'Format harus dalam bentuk angka!',
            'no_wa.digits_between' => 'Panjang nomor harus antara 12-13 karakter!',
            'foto_siswa.required' => 'Form harus diisi!',
            'foto_siswa.image' => 'Format harus dalam bentuk gambar!',
            'tanggal_lahir.required' => 'Form harus diisi!',
            'tanggal_lahir.date_format' => 'Format tanggal harus dalam bentuk d-m-Y!',
            'tanggal_lahir.before' => 'Tanggal harus sebelum hari ini!',
            'jurusan.required' => 'Form harus diisi!',
            'paket_magang.required' => 'Form harus diisi!',
            'nama_pembimbing.required' => 'Form harus diisi!',
            'nip_pembimbing.required' => 'Form harus diisi!',
            'nip_pembimbing.numeric' => 'Format harus dalam bentuk angka!',
            'nip_pembimbing.digits' => 'Panjang NIP harus 18 karakter!',
            'nip_pembimbing.unique' => 'NIP sudah terdaftar!',
            'no_wa_pembimbing.required' => 'Form harus diisi!',
            'no_wa_pembimbing.numeric' => 'Format harus dalam bentuk angka!',
            'no_wa_pembimbing.digits_between' => 'Panjang nomor harus antara 12-14 karakter!',
            'ukuran_baju.required' => 'Form harus diisi!',
            'surat_pengajuan.required' => 'Form harus diisi!',
            'username.required' => 'Form harus diisi!',
            'username.email' => 'Format email salah!',
            ]);

        //         var_dump($v->fails());
        //         var_dump($v->errors());


        //     var_dump($request->password);
        // var_dump($request->password_confirmation);
        // die();

        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with("error", "Password should be same as your confirmed password. Please retype new password");
        }
        $nip_pembimbing = $request->nip_pembimbing;
        $nip_pembimbing = DB::table('pembimbing')->where('nip_pembimbing', '=', $nip_pembimbing)->get();
        $nip_pembimbing = count(collect($nip_pembimbing));
        $nama_bidang = $request->jurusan;
        $nama_bidang = DB::table('data_bidang')->where('nama_bidang', '=', $nama_bidang)->get();
        $nama_bidang = count(collect($nama_bidang));

        // dd($request);

        $foto_siswa = $request->foto_siswa;
        $file_foto_siswa = $foto_siswa->getClientOriginalName();
        // dd($file_foto_siswa);

        $surat_pengajuan = $request->surat_pengajuan;
        $file_surat_pengajuan = $surat_pengajuan->getClientOriginalName();

        $role = 'siswa';
        if ($nip_pembimbing <= 0) {
            Pembimbing::create([
                'nip_pembimbing' => $request->nip_pembimbing,
                'nama_pembimbing' => $request->nama_pembimbing,
                'no_wa_pembimbing' => $request->no_wa_pembimbing,
                'sekolah_id' => $request->sekolah_id,
                'password' => Hash::make('123'),

            ]);

            Akun::create([
                'username'=> $request->nip_pembimbing,
                'password' => Hash::make('123'),
                'role'=> 'pembimbing',
                'nip_pembimbing'=>$request->nip_pembimbing,
            ]);
        }

        if($nama_bidang <= 0) {
            DataBidang::create([
                'nama_bidang' => $request->jurusan,
                'jenis_jurusan' => $request->jenis_jurusan
            ]);
        }

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'no_wa' => $request->no_wa,
            'sekolah_id' => $request->sekolah_id,
            'jurusan' => $request->jurusan,
            'nip_pembimbing' => $request->nip_pembimbing,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto_siswa' =>  $file_foto_siswa,
        ]);

        DataMagang::create([
            'bidang_id' => $request->bidang_id,
            'nisn' => $request->nisn,
            'paket_magang' => $request->paket_magang,
            'surat_pengajuan' => $file_surat_pengajuan,
            'ukuran_baju' => $request->ukuran_baju,
        ]);


        Akun::create([
            'nisn' => $request->nisn,
            'username' => $request->username,
            'nip_pembimbing'=> $request->nip_pembimbing,
            // 'password' => Crypt::encrypt($request->password),
            'password' => Hash::make($request->password),
            'role'=>$role,
        ]);

        $foto_siswa->move(public_path().'/image/fotosiswa', $file_foto_siswa);

        $surat_pengajuan->move(public_path().'/surat_pengajuan', $file_surat_pengajuan);

        $data = [
            'name' => 'Syahrizal As',
            'body' => 'Testing Kirim Email di Santri Koding'
        ];

        Mail::to('azulfiantiko@gmail.com')->send(new SendEmail($data));

        //codingan wa yg dikirim bg syams masukkan disini
        $result = file_get_contents('https://testinguntuksendmessage.000webhostapp.com', false, stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query([
                'no_hp' => '085713482807', # no hp penerima
                'message' => 'test kirim wa' # pesan
            ])
        ]]));

        // dd("Email Berhasil dikirim.");
        // dd($request->all());



        // Alert::success('Berhasil', 'Success Message');
        // return redirect('login');
        // $image_path = storage_path('app/'.config('path.identity.photo').'/'.$request->identity_photo);

        // if($request->hasFile('foto'))
        // {
        //     $destination_path = 'foto/register';
        //     $foto = $request->foto;
        //     $foto = $foto->getClientOriginalName();
        //     $path = $request->foto->storeAs($destination_path, $foto);

        //     $validated_data['foto'] = $foto;
        // }
        // Register::create($validated_data);

            return redirect()->route('login')
                            ->with('success','Data created successfully.');
    }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'unique:users'],
            'nisn' => ['required', 'string', 'min:10', 'max:10', 'unique:users'],
            'nip_pembimbing' => ['required', 'string', 'min:8', 'max:8'],
            'no_wa' => ['required', 'string', 'min:12', 'max:13', 'unique:users'],
            'no_wa_pembimbing' => ['required', 'string', 'min:12', 'max:13', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nisn' => $data['nisn'],
            'nip_pembimbing' => $data['nip_pembimbing'],
            'no_wa' => $data['no_wa'],
            'no_wa_pembimbing' => $data['no_wa_pembimbing']
        ]);
    }
}
