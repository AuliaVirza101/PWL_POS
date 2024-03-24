@extends('layout.app')

{{-- Customize layout sections--}}

@section('subtitle','welcome')
@section('content_header_title','home')
@section('content_header_subtitle','welcome')

{{-- content body: main page content --}}
@section('content_body')
<p>Welcome to this beautiful admin panel.</p>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets--}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">--}}
@endpush

{{-- push extra scripts--}}

@push('js')
<script> console.log("Hi,I'm using the laravel-adminLTE package!");</script>
@endpush



