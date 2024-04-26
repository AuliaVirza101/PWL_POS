@extends('layout.app')
{{--Customize layout Sections--}}
@section('subtitle','kategori')
@section('content_header_title','kategori')
@section('content_header_subtitle','Edit')
{{--Content body: main page content--}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <h3 class="card-title">Edit kategori </h3>
        </div>

        <form method="post" action="{{ route('kategori/update_save',$kategori->kategori_id)}} ">
            <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-dager">
                    <ul>
                        @foreach ($error -> all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori baru</label>
                    @error('kodeKategori')
                        <div class="alert alert-danger">{{$message}}"</div>
                    @enderror
                    <input id="kodeKategori" type="text" name="kodeKategori" class="@error('kodeKategori') is-invalid @enderror">
                    {{-- <input id="text" class='form-control' id="kodeKategori" name="kodeKategori" placehold="Enter Kode Kategori" required> --}}
                </div>

                <div class="form-group">
                    <label for="namaKategori">Nama Kategori baru</label>
                    <input type="text" class="form-control" id='kodeKategori' name="kodeKAtegori" placehold="Enter Nama Kategori" required>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection    

