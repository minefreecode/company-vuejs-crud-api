<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContributionTest extends TestCase
{
    public function testsContributionAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $this->json('POST', '/api/Contribution', $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'title' => 'Lorem', 'body' => 'Ipsum']);
    }

    public function testsContributionAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $Contribution = factory(Contribution::class)->create([
            'title' => 'First Contribution',
            'body' => 'First Body',
        ]);

        $payload = [
            'title' => 'Lorem',
            'body' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/Contribution/' . $Contribution->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'title' => 'Lorem',
                'body' => 'Ipsum'
            ]);
    }

    public function testsContributionAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $Contribution = factory(Contribution::class)->create([
            'title' => 'First Contribution',
            'body' => 'First Body',
        ]);

        $this->json('DELETE', '/api/Contribution/' . $Contribution->id, [], $headers)
            ->assertStatus(204);
    }

    public function testContributionAreListedCorrectly()
    {
        factory(Contribution::class)->create([
            'title' => 'First Contribution',
            'body' => 'First Body'
        ]);

        factory(Contribution::class)->create([
            'title' => 'Second Contribution',
            'body' => 'Second Body'
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/Contribution', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'title' => 'First Contribution', 'body' => 'First Body' ],
                [ 'title' => 'Second Contribution', 'body' => 'Second Body' ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'body', 'title', 'created_at', 'updated_at'],
            ]);
    }
}
