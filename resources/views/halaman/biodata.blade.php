<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="x-UA-Compatible" content="EI-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
    <h1>Halaman Biodata</h1>
    <form action="/kirim" method="post">
        @csrf
        <label>Nama Lengkap</label> <br>
        <input type="text" name="name"> <br>
        <label>Alamat</label> <br>
        <textarea name="alamat" id="" cols="30" rows="10"></textarea> <br>
        <label>Jenis Kelamin</label> <br>
        <input type="radio" name="jk" value="1"> Laki-laki
        <input type="radio" name="jk" value="2"> Perempuan <br>
        <input type="submit" value="Kirim">
    </form>

</body>
</html>

