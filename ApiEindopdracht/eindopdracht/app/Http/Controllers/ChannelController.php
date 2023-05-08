<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Channel::All();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subs' => 'required',
            'views' => 'required',
            'created_on' => 'required',

        ]);
        
        if ($validator->fails()) {
            return response('{"Foutmelding":"Data not correct"}', 400)
                ->header('Content-Type', 'application/json');
        } else return Channel::create($request->all());    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        return $channel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel)
    {
        $channel->update($request->all());
        return $channel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
    }
}
