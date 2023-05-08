<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('title')) {
            return Video::where('title', 'like', '%' . $request->title . '%')->get();
        }

        if ($request->has('sort')) {
            return Video::orderBy($request->sort)->get();
        }

        return Video::All();    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Video::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return $video;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        Log::info('update videos', ['ip' => $request->ip(), 'old' => $video, 'new' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            Log::error("video can not be updated");
            return response('{"Foutmelding":"Data not correct"}', 400)->header('Content-Type', 'application/json');
        }
        $video->update($request->all());
        return $video;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        Log::info('delete videos', ['data' => $video]);
        $video->delete();
    }
}
