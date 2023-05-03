
@extends('layout.master')

@section('judul')
SmartInternship
@endsection

@section('content')

{{-- Berhasil --}}
<div class="p-6">
    <div class="visible-print text-center">
        {!! QrCode::size(300)->generate("PT GARUDA CYBER INDOESIA"); !!}
        <p>Scan me to return to the original page.</p>
    </div>
</div>


@endsection
