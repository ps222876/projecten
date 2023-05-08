<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumSong;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all(); // geeft alle songs terug

        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $songsFromAPI = []; //lege array stoppen in songsFromApi variable.
        $title = $request->only('title');
        if ($request->query->has('title')) { //als er een title bestaat(in de url).

            $request->validate([
                'title' => 'required|max:20',
            ]);

            $api_key = 'adf2bb80aaefd8ec3fd5bdbd1efc3461'; //eigen api sleutel
            $title = $request->query('title'); //request title
            $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=track.search&track=' . $title . '&api_key=' . $api_key . '&format=json')->json();
            $songsFromAPI = $response["results"]["trackmatches"]["track"];

            // dd($songsFromAPI);
        }

        return view('songs.create', ['songsFromAPI' => $songsFromAPI]);

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
            'title' => 'required|max:100',
            'singer' => 'max:50',
        ]);


        Song::create($validated);
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::find($id); // find = zoek op ID
        return view('songs.show', ['song' => $song]);
    }
    // $id = 0
    // $songs[$id]
    //

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
            $song = Song::find($id); // find = zoek op ID
            $albums = Album::all();
            // $album = Album::find($id); // find = zoek op ID
            //return view('songs.edit', ['song' => $song]);
            return view('songs.edit', compact('song', 'albums'));
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
            'title' => 'required|max:100',
            'singer' => 'max:50',
        ]);

        Song::find($id)->update($request->only(['title', 'singer']));

        // if($request->album_id != null)
        // {
        //     $albumsong = new AlbumSong(['album_id' => $request->album_id, 'song_id' => $id]);
        //     $albumsong->save();
        // }
        return redirect()->route('songs.show', ['id' => $id]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::destroy($id);
        return redirect()->route('songs.index');
    }
}
