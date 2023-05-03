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
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    public function index()
    {
        $sekolah = DB::table('sekolah')
        ->get(['id','nama_sekolah']);

        $bidang = DB::table('data_bidang')
        ->get(['id','jenis_jurusan']);

        return view('register.index', compact('sekolah','bidang'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $nip_pembimbing = $request->nip_pembimbing;
        $nip_pembimbing = DB::table('pembimbing')->where('nip_pembimbing','=',$nip_pembimbing)->get();
        $nip_pembimbing = count(collect($nip_pembimbing));

        if($nip_pembimbing<=0){
            Pembimbing::create([
                'nip_pembimbing'=>$request->nip_pembimbing,
                'nama_pembimbing'=>$request->nama_pembimbing,
                'no_wa_pembimbing'=>$request->no_wa_pembimbing,
                'sekolah_id'=>$request->sekolah_id
            ]);

            Siswa::create([
                'nama_siswa'=>$request->nama_siswa,
                'nisn'=>$request->nisn,
                'no_wa'=>$request->no_wa,
                'sekolah_id'=>$request->sekolah_id,
                'jurusan'=>$request->jurusan,
                'nip_pembimbing'=>$request->nip_pembimbing,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'foto_siswa'=>$request->foto_siswa,
            ]);

            DataMagang::create([
                'bidang_id'=>$request->bidang_id,
                'nisn'=>$request->nisn,
                'paket_magang'=>$request->paket_magang,
                'surat_pengajuan'=>$request->surat_pengajuan,
                'ukuran_baju'=>$request->ukuran_baju,
            ]);


            Akun::create([
                'nisn'=>$request->nisn,
                'username'=>$request->username,
                'password'=>Crypt::encrypt($request->password),
            ]);
        }  else {
            Siswa::create([
                'nama_siswa'=>$request->nama_siswa,
                'nisn'=>$request->nisn,
                'no_wa'=>$request->no_wa,
                'sekolah_id'=>$request->sekolah_id,
                'jurusan'=>$request->jurusan,
                'nip_pembimbing'=>$request->nip_pembimbing,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'foto_siswa'=>$request->foto_siswa,
            ]);

            DataMagang::create([
                'bidang_id'=>$request->bidang_id,
                'nisn'=>$request->nisn,
                'paket_magang'=>$request->paket_magang,
                'surat_pengajuan'=>$request->surat_pengajuan,
                'ukuran_baju'=>$request->ukuran_baju,
            ]);


            Akun::create([
                'nisn'=>$request->nisn,
                'username'=>$request->username,
                'password'=>Crypt::encrypt($request->password),
            ]);
        }


        Alert::success('Berhasil','Success Message');
        return redirect('login');
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

    //     return redirect()->route('register.index')
    //                     ->with('success','Data created successfully.');
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        ]);
    }
}
