@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Pembayaran</title>
	<style>
		body {
			font-family: sans-serif;
			background-color: #bb1d1d;
		}

		form {
			background-color: #F1F6F9;
			padding: 20px;
			margin: 50px auto;
			max-width: 550px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			margin-top: 0;
			text-align: center;
			color: #333;
		}

		input[type="text"], input[type="file"], input[type="submit"] {
			display: block;
			width: 100%;
			margin-bottom: 10px;
			padding: 10px;
			border: none;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			font-size: 16px;
			color: rgb(8, 7, 7);
			transition: box-shadow 0.2s ease-in-out;
		}

		input[type="text"]:focus, input[type="file"]:focus, input[type="submit"]:focus {
			box-shadow: 0px 0px 10px wh;
			outline: none;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #070606;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
		}

		input[type="submit"]:hover {
			background-color: #2E8B57;
		}

		label {
			display: block;
			margin-bottom: 5px;
			color: white;
		}
	</style>
    <style>
            #file-preview img {
            max-width: 300px;
            max-height: 100%;
            object-fit: contain;
            display: block; /* Untuk menghilangkan ruang kosong di bawah gambar */
            margin: 0 auto; /* Untuk memposisikan gambar di tengah secara horizontal */
        }
    </style>
</head>
{{-- Berhasil ya --}}
<body>
    <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo" style="margin-left: 650px">
	<form action="/bayar" method="POST" style="margin-top: 10px ;" enctype="multipart/form-data">
        @csrf
		<h1 style="color: rgb(6, 5, 5);font-size: 20px">Proses Pengajuan Magang</h1>
        <p style="background-color: #2E8B57; text-align: center;font-size: 20px;color: whitesmoke;border-radius: 20px;width: 200px;margin-left: 30%">Diterima</p>
		<label for="virtual-akun" style="color: rgb(20, 18, 18);">Nomor Rekening: Bank BNI Atas Nama "Garuda Cyber Indonesia" </label>
		<input type="text" id="virtual-akun" name="virtual_akun" style="color: #0d0b0b" placeholder="{{ $data }}" value="{{ $data }}" disabled>
        <label for="bukti-pembayaran" style="color: rgb(11, 9, 9);">Bukti Pembayaran:</label>
        <input type="file" id="bukti-pembayaran" name="bukti_pembayaran" class="form-control-file @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" accept="image/*" value="{{ old('bukti_pembayaran') }}">
        <div id="file-preview"></div>
        @error('bukti_pembayaran')
            <div class="alert alert-danger mt-2" style="width: 450px">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>
<script>
    const inputElement = document.getElementById("bukti-pembayaran");
    const filePreviewElement = document.getElementById("file-preview");

    inputElement.addEventListener("change", (event) => {
        filePreviewElement.innerHTML = "";

        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileReader = new FileReader();

            fileReader.onload = (e) => {
                const filePreview = document.createElement("img");
                filePreview.src = e.target.result;
                filePreviewElement.appendChild(filePreview);
            };

            fileReader.readAsDataURL(file);
        }
    });
</script>

@endsection
