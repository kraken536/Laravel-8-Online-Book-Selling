@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp

@extends('home.index')

@section('contenu')
    @include('home._contentHome')
@endsection

@section('title', $data->title)
@section('description', $data->description)
@section('keywords', $data->keywords)
