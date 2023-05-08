<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all(); // geeft alle bands terug

        return view('bands.index', ['bands' => $bands]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
        return redirect()->route('bands.index');
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
            'name' => 'required',
            'genre' => 'required',
            'founded' => 'max:4',
        ]);


        Band::create($request->except(['_token']));
        return redirect()->route('bands.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = Band::find($id); // find = zoek op ID
        $albums = array();
        $allAlbums = Album::all();
        foreach ($allAlbums as $album)
        {
            if ($album->band_id == $id)
            {
                array_push($albums, $album);
            }
        }
        return view('bands.show', compact('band', 'albums'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id == 0)
        {
            $id = 1;
        }
        {
            $band = Band::find($id); // find = zoek op ID
            return view('bands.edit', ['band' => $band]);
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
            'name' => 'required',
            'genre' => 'required',
            'founded' => 'max:4',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);



        Band::find($id)->update($request->only(['name','genre', 'founded', 'active_till']));
        return redirect()->route('bands.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Band::destroy($id);
        return redirect()->route('bands.index');
    }
}
