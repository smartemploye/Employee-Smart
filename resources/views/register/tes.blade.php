<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="">
        <label>Asal Sekolah</label>
        <select id="sekolah">
            <option value="">Pilih Sekolah</option>
            @foreach ($sekolah as $product)
                <option value="{{ $product->id }}">{{ $product->nama_sekolah }}</option>
            @endforeach
        </select>

        <label for="inputSupervisor">Nama Pembimbing</label>
        <input type="text" id="nama_pembimbing" readonly>
    </form>
</body>
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sekolah').on('change', function() {
                var idSekolah = $(this).val();
                if (idSekolah) {
                    $.ajax({
                        url: '/pembimbing/' + encodeURIComponent(idSekolah),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.error) {
                                $('#nama_pembimbing').val('');
                                alert(data.error);
                            } else {
                                $('#nama_pembimbing').val(data.nama_pembimbing);
                            }
                        }
                    });
                } else {
                    $('#nama_pembimbing').val('');
                }
            });
        });
    </script>
@endpush


</html>
