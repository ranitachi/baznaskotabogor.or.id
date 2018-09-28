@extends('layouts.front')
@section('title')
    <title>BAZNAS Kota Bogor</title>
@endsection
@section('main')
    <section class="main slider-video">
    @include('include.main')
    </section> 
@endsection
@section('content')
    @include('pages.main.main')
@endsection
