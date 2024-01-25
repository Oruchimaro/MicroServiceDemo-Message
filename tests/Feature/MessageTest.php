<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    public function test_validation_fails_when_body_params_are_empty(): void
    {
        $invalidBodyParams = [
            'title' => '',
            'body' => '',
        ];

        $response = $this->postJson(route('messages.store'), $invalidBodyParams);

        $response
            ->assertUnprocessable()
            ->assertInvalid(['body', 'title']);
    }

    public function test_validation_fails_when_body_params_length_does_not_match_the_criteria(): void
    {
        $invalidBodyParams = [
            'title' => '12',
            'body' => '12',
        ];

        $response = $this->postJson(route('messages.store'), $invalidBodyParams);

        $response
            ->assertUnprocessable()
            ->assertInvalid(['body', 'title']);
    }
}
