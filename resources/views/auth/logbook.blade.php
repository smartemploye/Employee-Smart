@extends('layout.master')

@section('content')
<h3>Senin, 27 Oktober 2023</h3>
<div class="container">
    <textarea name="" id="" cols="100" rows="5"></textarea>
    <form action="upload.php" method="post" enctype="multipart/form-data" style="margin-left: 900px;margin-top: -50px">
        <input type="file" name="fileToUpload" id="fileToUpload">
    </form>
</div>
<h3 style="margin-top: 20px">Selasa, 28 Oktober 2023</h3>
<div class="container" >
    <textarea name="" id="" cols="100" rows="5"></textarea>
    <form action="upload.php" method="post" enctype="multipart/form-data" style="margin-left: 900px;margin-top: -50px">
        <input type="file" name="fileToUpload" id="fileToUpload">
    </form>
</div>
<input type="submit" value="Submit" style="margin-left: 1100px;margin-top: 30px;background-color: blue;color: white">
@endsection
