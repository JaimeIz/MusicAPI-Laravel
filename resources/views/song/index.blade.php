<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Alert: </strong>{{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <br/>
        <div class="d-flex justify-content-between">
            <h1 div class="p-2">List of songs</h1>
            <a href="{{ url('song/create') }}" class="btn btn-success align-self-center">New Song</a>
        </div>
        <table class="table table-striped table-light">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Song Image</th>
                <th>Song Name</th>
                <th>Artist Name</th>
                <th>Publish Date</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $songs as $song )
                <tr>
                    <td class="align-middle">{{ $song->id }}</td>
                    <td>
                        @if(isset($song->songImage))
                            <img src="{{ asset('storage').'/'.$song->songImage }}" alt="Song Image" width="50"
                                 class="rounded"/>
                        @else
                            <img src="{{ asset('storage').'/Interrogation.png' }}" alt="Song Image" width="50"
                                 class="rounded"/>
                        @endif
                    </td>
                    <td class="align-middle">{{ $song->songName }}</td>
                    <td class="align-middle">{{ $song->artistName }}</td>
                    <td class="align-middle">{{ $song->publishDate }}</td>
                    <td class="align-middle">{{ $song->score!=null ? $song->score : '?' }}/10</td>
                    <td class="align-middle">
                        <div class="btn-group"  role="group" aria-label="Basic example">
                            <a class="btn btn-primary align-self-center" href="{{ url('/song/'.$song->id) }}">Show+</a>
                            <a class="btn btn-warning align-self-center" href="{{ url('/song/'.$song->id.'/edit') }}">Update</a>
                            <form method="post" action="{{ url('/song/'.$song->id) }}" class="d-inline btn-group align-self-center">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger align-self-center" type="submit" value="Delete" onclick="return confirm('Are you sure?')"/>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $songs->links() !!}
        </div>
    </div>
@endsection
