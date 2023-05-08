<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Channel;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ApiFeatureTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function testVideosEndpoint(): void
    {
        $response = $this->get('/api/videos');

        $response->assertStatus(200);
    }

    public function testChannelsEndpoint(): void
    {
        $response = $this->get('/api/channels');

        $response->assertStatus(200);
    }

    public function testVideoCreateUpdateDelete(): void
    {
        // Create
        $responseCreate = $this->post('/api/videos', [
            'title' => $this->faker->name,
            'likes' => $this->faker->numberBetween(1, 9999999),
            'uploaded_on' => $this->faker()->date,
            'channel_id' => 1,
        ]);

        $responseCreate->assertStatus(201);

        $this->assertDatabaseHas('videos', [
            'title' => $responseCreate->json('title'),
        ]);

        // Update
        $responseUpdate = $this->put("/api/videos/{$responseCreate->json('id')}", [
            'title' => $this->faker->name,
            'likes' => $this->faker->numberBetween(1, 9999999),
            'uploaded_on' => $this->faker()->date,
            'channel_id' => 1,
        ]);

        $responseUpdate->assertStatus(200);

        $this->assertDatabaseHas('videos', [
            'title' => $responseUpdate->json('title'),
        ]);

        // Delete
        $responseDelete = $this->delete("/api/videos/{$responseCreate->json('id')}");
        $responseDelete->assertStatus(200);
    }
}
