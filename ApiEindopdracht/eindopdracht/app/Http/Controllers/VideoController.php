<?php

namespace App\Http\Controllers;

use App\Models\Channel;
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
        $request->user()->currentAccessToken()->delete();
        Log::info(
            'Videos index',
            [
                'ip' => $request->ip(),
                'data' => $request->all()
            ]
        );

        if ($request->has('title')) {
            $data = Video::where('title', 'like', '%' . $request->title . '%')->get();
        } else if ($request->has('sort')) {
            $data =  Video::orderBy($request->sort)->get();
        } else {
            $data = Video::all();
        }


        $response = [
            'success' => true,
            'data'    => $data,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);
    }


    public function store(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $response = [
            'success' => true,
            'data'    => Video::create($request->all()),
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);
    }
    public function show(Request $request, Video $video)
    {
        $request->user()->currentAccessToken()->delete();
        $response = [
            'success' => true,
            'data'    =>  $video,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);        
    }
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


        $request->user()->currentAccessToken()->delete();
        $video->update($request->all());
        $response = [
            'success' => true,
            'data'    =>  $video,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);  
    }
    public function destroy(Request $request, Video $video)
    {
        Log::info('delete videos', ['data' => $video]);
        $request->user()->currentAccessToken()->delete();
        $video->delete(); 
        $response = [
            'success' => true,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return response()->json($response, 200);  
    }






    public function indexFunctie(Request $request, $id)
    {
        $request->user()->currentAccessToken()->delete();    // Verwijder de actuele token

        Log::info(
            'videos indexFunctie',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
                'id' => $id
            ]
        );
        if ($request->has('sort')) {
            $data =  Video::where('channel_id', $id)->orderBy($request->sort)->get();
        } else {
            $data = Video::where('channel_id', $id)->get();
        }

        $content = [
            'success' => true,
            'data'    => $data,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer',
        ];
        return response()->json($content, 200);
    }










    public function destroyFunctie(Request $request, $id)
    {
        $request->user()->currentAccessToken()->delete();    // Verwijder de actuele token

        Log::info(
            'Videos destroyFunctie',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
                'channel_id' => $id
            ]
        );
        Channel::where('channel_id', $id)->delete();

        $content = [
            'success' => true,
            'data'    => $id,
            'access_token' => auth()->user()->createToken('API Token')->plainTextToken,
            'token_type' => 'Bearer',
        ];
        return response()->json($content, 202);
    }


}
