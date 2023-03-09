<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="EI-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang {{ $nama }} {{ $alamat }}</h1>
    <p>Jenis Kelamin =
        @if ($jeniskelamin=== "1")
            Laki-laki
        @else
            Perempuan
        @endif
    </p>
</body>
</html>
