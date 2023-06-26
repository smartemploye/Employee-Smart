<h2 align="center" style="font-family: Arial, sans-serif; color: #007BFF; font-weight: bold;">
   Smart Internship
</h2>


## About Smart Internship

Smart Internship adalah system yang mampu melakukan pendaftaran magang secara online, membantu peserta magang dalam mengisi laporan harian dan laporan akhir, serta mempermudah peserta magang dalam melakukan perizinan terhadap perusahaan :
#### Teknologi yang digunakan :
    •	Laravel Framework 8.83.27
    •	PHP 8.2.0

    NB : Untuk mengecek versi Laravel dan versi Php, lakukan perintah berikut :
         •	php artisan --version
         •	php -v

System Smart Internship memiliki 3 user atau entitas, yaitu:
#### Siswa, yang merupakan peserta magang, dapat melakukan :
    •	Melakukan pendaftaran
    •	Mengisi data diri dan submit surat pengajuan
    •	Melakukan login
    •	Upload bukti pembayaran
    •	Menginput laporan harian
    •	Melakukan absen
    •	Mengajukan perizinan
    •	Download format laporan akhir
    •	Upload laporan akhir
    •	Download sertifikat
#### Pembimbing, yang membimbing peserta magang selama kegiatan magang berlangsung dapat melakukan:
    •	Melakukan login
    •	Memonitoring kegiatan siswa
    •	Mengupload format laporan akhir

    NB : Login Pembimbing
    1. Pembimbing nantinya akan mendapat kan pesan wa setelah siswa dinyatakan di terima magang oleh perusahaan
    2. Untuk mendapatkan pesan wa tersebut, admin harus mengubah status magang yang sebelumnya "seleksi" menjadi "Aktif" pada halaman Peserta "Edit"
    3. Pesan wa tersebut berisi username dan password untuk login sebagai "pembimbing". contoh sebagai berikut :
       •	Username : <Nip Pembimbing>
       •	Password : 123 
    Setelah melakukan login pembimbing dapat mengganti passwordnya. 

    
#### Admin, yang merupakan admin dari system dapat melakukan:
    •	Memberi akun pada siswa dan pembimbing
    •	Memberi informasi terkait seleksi berkas dan wawancara
    •	Melakukan login
    •	Memonitoring Kegiatan siswa
    •	Memberi penilaian terhadap laporan akhir 
    •	Upload sertifikat

    NB : Sebelum melakukan login sebagai admin ikuti langkah berikut ini di terminal :
    •	 $akuns->username="admin@gmail.com"
    •	 $akuns->role="admin"
    •	 $akuns->password = bcrypt("12345")
    •	 $akuns->save()
    
    Atau lakukan cara berikut ini :
    1. Inputkan username, password, dan role di database phpmyadmin pada tabel akuns
       • Username : admin@gmail.com
       • password : $2y$10$4ECa05szbTaQ8uYJpNI8s.jRelrYmPBvz//bfv/SJMUjvb7FC4WhG
       • role     : admin

    Pada Saat Login Sebagai Admin Gunakan Password : 12345
    
