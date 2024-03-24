@extends('layout.app')


@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">sKategori</h3> --}}
                <div class="card-body">
                    <a href="{{ url('kategori/create') }}" class="btn btn-primary mb-2">Add Categori</a>
                    {{
                        $dataTable->table()
                    }}

                </div>
            </div>
        </div>
        @endsection


        @push('scripts')
            {{ $dataTable->scripts() }}

        @endpush

