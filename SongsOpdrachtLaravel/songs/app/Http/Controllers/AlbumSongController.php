<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumSongController extends Controller
{
    public function store(Album $album, Song $song)
    {
        $album->songs()->attach($song);
        return redirect()->route('albums.edit',[$album]);
    }

    public function destroy(Album $album, Song $song)
    {
        $album->songs()->detach($song);
        return redirect()->route('albums.edit',[$album]);
    }
}
