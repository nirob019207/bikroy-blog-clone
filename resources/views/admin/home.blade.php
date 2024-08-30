@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @foreach($posts as $post)
        <div>{!! $post->long_description !!}</div> <!-- Render HTML content safely -->
    @endforeach
@stop

@section('css')
    {{-- Add extra stylesheets here if needed --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Dashboard loaded!"); </script>
@stop
