<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumSong;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all(); // geeft alle albums terug

        return view('albums.index', ['albums' => $albums]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
        return redirect()->route('albums.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'band_id' => 'required|max:100',
        ]);


        Album::create($request->except(['_token']));
        return redirect()->route('albums.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id); // find = zoek op ID
        $bands = Band::all();
        $band = $bands[$album->band_id-1];
        return view('albums.show', compact('bands', 'album', 'band',));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 0) {
            $id = 1;
        }

        {
            $album = Album::find($id); // find = zoek op ID
            $songs = Song::all();
            $bands = Band::all();
            $band = $bands[$album->band_id-1];
            //return view('songs.edit', ['song' => $song]);
            return view('albums.edit', compact('bands' ,'songs', 'band', 'album'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $validated = $request->validate([
            'name' => 'required|max:100',
            'band_id' => 'required|max:100',
         ]);



        Album::find($id)->update($request->only(['name','year', 'times_sold', 'band_id']));

        return redirect()->route('albums.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);
        return redirect()->route('albums.index');
    }
}
