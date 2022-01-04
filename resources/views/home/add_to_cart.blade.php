@php
    $data = App\Http\Controllers\HomeController::getSetting()
@endphp


@extends('home.index')



@section('title', 'Contact')
@section('description', $data->description)
@section('keywords', $data->keywords)




@section('contenu')

@endsection