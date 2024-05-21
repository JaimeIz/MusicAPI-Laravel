<?php
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Songs</h1>
        <br/>
        <form method="post" action="{{ url('song') }}" enctype="multipart/form-data">
            @csrf
            @include('song.form', ['submitButton' => 'Create Song'])
        </form>
    </div>
@endsection
