@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">



@stop



@section('content')

    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminMediaController@store', 'class'=>'dropzone']) !!}

    {!! Form::close() !!}

@stop






@section('scripts')

<script src="{{asset('js/dropzone.js')}}"></script>

{{--../../../../public/js/dropzone.js--}}

@stop