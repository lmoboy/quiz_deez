<?php

use App\Models\Quiz;
use App\Models\User;

it('can create a quiz', function () {
    $response = $this
        ->postJson('/api/quizzes', [
            'name' => 'Test Quiz',
        ]);

    $response->assertStatus(201);
});

it('has a quiz page', function () {
    $user = User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->get('/quiz');
    $response->assertOk();
});

it('responds with all quizzes and 200', function () {
    $user = User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->get('/api_quiz');
    $response->assertOk();
});