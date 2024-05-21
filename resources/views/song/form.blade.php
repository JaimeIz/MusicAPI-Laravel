<?php
?>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <div class="input-group mb-3" for="songName">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Song Name</span>
        </div>
        <label for="songName"></label>
        <input class="form-control" placeholder="Song Name" type="text" name="songName" id="songName" value="{{ isset($song->songName)?$song->songName:'' }}"/>
    </div>
    <div class="input-group mb-3" for="artistName">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Artist Name</span>
        </div>
        <label for="artistName"></label>
        <input class="form-control" placeholder="Artist Name" class="form-control" type="text" name="artistName" id="artistName" value="{{ isset($song->artistName)?$song->artistName:'' }}"/>
    </div>
    <div class="input-group mb-3" for="publishDate">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Publish Date</span>
        </div>
        <label for="songName"></label>
        <input class="form-control" placeholder="Publish Date" type="date" name="publishDate" id="songName" value="{{ isset($song->publishDate)?$song->publishDate:'' }}"/>
    </div>
    <div class="input-group mb-3" for="score">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Score</span>
        </div>
        <label for="score"></label>
        <input class="form-control" placeholder="Score" type="number" name="score" id="score" value="{{ isset($song->score)?$song->score:'' }}"/>
    </div>
    <div class="" for="lyrics">
        <!--
        <label for="lyrics">Lyrics</label>
        <div class="input-group-prepend">
            <span  class="input-group-text" id="inputGroup-sizing-default">Lyrics</span>
        </div>-->
        <textarea class="form-control" placeholder="Lyrics" type="text" aria-multiline="true" name="lyrics" id="lyrics">{{ isset($song->lyrics)?$song->lyrics:'' }}</textarea>
    </div>
    <br/>
    <div class="input-group">
        <!--<label for="formFileLg" class="form-label">Song Image</label>-->
        <input class="form-control form-control-lg" type="file" name="songImage"  id="songImage" value="{{ isset($song->songImage)?$song->songImage:'' }}"/>
        <br/>
    </div>
    <br/>
        @if(isset($song->songImage))
            <img class="img-thumbnail img-fluid rounded float-right" src="{{ asset('storage').'/'.$song->songImage }}" alt="Song Image" width="200"/>
        @endif
    <br/>
    <br/>
    <input class="btn btn-primary" type="submit" value="{{ $submitButton }}"/>
    <a class="btn btn-outline-primary" href="{{ url('song') }}">Go Back</a>
</div>
