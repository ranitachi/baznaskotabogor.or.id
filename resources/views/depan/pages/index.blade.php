@extends('layouts.depan')

@section('title')
    Beranda
@endsection

@section('konten')
    @include('depan.includes.slider')
    @include('depan.pages.home')
    
@endsection

@section('footscript')

@endsection