<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
//use App\Models\Channel;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ApiFeatureTest extends TestCase
{
   // use DatabaseTransactions, WithFaker;

    static $accessToken;

    public function test_login()
    {
        $userData = [
            'email' => 'test@test.com',
            'password' => 'geheim'
        ];

        $response = $this->post('/api/login', $userData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type'
            ]);

        self::$accessToken = $response['access_token'];
    }

    

    public function test_get_videos()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . self::$accessToken,
        ])->get('api/videos');

        // create and status
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'token_type' => 'Bearer'
        ]);
        self::$accessToken = $response['access_token'];
    }


    public function test_get_video_1()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . self::$accessToken,
        ])->get('api/videos/1');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'success' => true,
            'token_type' => 'Bearer'
        ]);
        self::$accessToken = $response['access_token'];
    }

}
