<?php
?>
@extends('layouts.app')
@section('content')
    <div class="container">

        <div>
            <div class="d-flex align-items-stretch justify-content-center">
                <div class="d-block">
                    <img src="{{ isset($song->songImage) ? asset('storage').'/'.$song->songImage : asset('storage').'/Interrogation.png' }}" alt="Song Image" width="600" class="img-thumbnail rounded"/>
                    <br/>
                    <br/>
                    <div >
                        <div class="btn-group"  role="group" aria-label="Basic example">
                            <a class="btn btn-warning" href="{{ url('/song/'.$song->id.'/edit') }}">Update</a>
                            <form method="post" action="{{ url('/song/'.$song->id) }}" class="d-inline btn-group">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')"/>
                            </form>
                        </div>
                        <a class="btn btn-outline-primary" href="{{ url('song') }}">Go Back</a>
                    </div>
                </div>
                <div class="d-block w-100" >
                    <h2 class="text-center">Song Name</h2>
                    <h1 class="text-center display-4">{{ $song->songName }}</h1>
                    @if(isset($song->artistName))
                        <h4 class="text-center">Artist Name</h4>
                        <h1 class="text-center">{{ $song->artistName }}</h1>
                        <br/>
                    @endif
                    @if(isset($song->score))
                        <h4 class="text-center">Score</h4>
                        <h1 class="text-center">{{ $song->score }}</h1>
                    @endif
                    @if(isset($song->publishDate))
                        <br/>
                        <h4 class="text-center">Publish Date: {{ $song->publishDate}}</h4>
                    @endif
                    @if(isset($song->lyrics))
                        <br/>
                        <br/>
                        <h3 class="text-center">Lyrics</h3>
                        <pre class="text-center">{{ $song->lyrics }}</pre>
                    @endif
                    <p></p>
                </div>
            </div>
        </div>
    </div>
@endsection
