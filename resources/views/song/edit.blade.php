<?php
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit songs</h1>
        <br/>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Alert: </strong>{{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <br/>
        @endif
        <form method="post" action="{{ url('/song/'.$song->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field("PATCH") }}
            @include('song.form', ['submitButton' => 'Update Song'])
        </form>
    </div>
@endsection
