<?php

namespace App\Http\Controllers;

use App\Models\song;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['songs'] = Song::paginate(10);
        return view('song.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('song.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'songName' => 'required|string',
            'songImage' => 'max:22222|mimes:jpeg,png,jpeg,jfif,gif'
        ];

        $message=[
            'required' => 'The :attribute field is required',
        ];

        $this->validate($request, $fields, $message);

        $songData = $request->except(array('_token', 'submit'));

        if ($request->hasFile('songImage')) {
            $songData['songImage']=$request->file('songImage')->store('upload', 'public');
        }

        Song::insert($songData);

        //return response()->json($songData);
        return redirect('song')->with('message', 'Song created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\song  $song
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('song.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\song  $song
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view('song.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\song  $song
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $fields = [
            'songName' => 'required|string',
            'songImage' => 'max:22222|mimes:jpeg,png,jpeg,jfif,gif'
        ];

        $message=[
            'required' => 'The :attribute field is required',
        ];

        $this->validate($request, $fields, $message);

        $songData = $request->except(['_token', 'submit', '_method']);

        if ($request->hasFile('songImage')) {
            $song=Song::findOrFail($id);
            Storage::delete('public'.$song->songImage);
            $songData['songImage']=$request->file('songImage')->store('upload', 'public');
        }

        Song::where('id', "=", $id)->update($songData);
        $song=Song::findOrFail($id);
        //return view('song.edit', compact('song'));
        return redirect('song')->with('message', 'Song updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\song  $song
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $song=Song::findOrFail($id);

        if ($song->songImage!=null) {
            Storage::delete('public/'.$song->songImage);
        }
            Song::destroy($id);
        return redirect('song')->with('message', 'Song deleted successfully');
    }
}
