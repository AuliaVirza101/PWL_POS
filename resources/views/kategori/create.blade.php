@extends('layout.app')
{{--Customize layout Sections--}}
@section('subtitle','kategori')
@section('content_header_title','kategori')
@section('content_header_subtitle','Create')
{{--Content body: main page content--}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <h3 class="card-title">buat kategori baru</h3>
        </div>

        <form method="post" action=".../kategori">
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class='form-control' id="kodeKategori" name="kodeKategori" placehold>
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id='kodeKategori' name="kodeKAtegori" placehold>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection    