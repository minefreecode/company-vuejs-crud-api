<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Admin\User;
use App\Models\Contribution\PeopleContribution;

class ContributionTest extends TestCase
{
    private $token;

    /**
     * Default preparation for each test
     */
    public function setUp()
    {
        parent::setUp();

        //Авторизация
        $response = $this->post('api/auth/login', [
            'email' => 'admin@admin.ru',
            'password' => '1234',
        ]);

        $this->token = $response->getData()->token;
    }



    public function testsContributionAreCreatedCorrectly()
    {
        $headers = ['Authorization' => "Bearer $this->token"];
        $payload = [
            'title' => 'Lorem',
            'description' => 'Ipsum',
            'people_id' => rand(1, 200)
        ];

        $this->json('POST', 'api/contribution/people_contributions', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'id'
            ])->assertJson([
                'status' => 0
            ]);
    }



        public function testsContributionAreUpdatedCorrectly()
        {
            $headers = ['Authorization' => "Bearer $this->token"];

            $Contribution = factory(PeopleContribution::class)->create([
                'title' => 'First Contribution',
                'description' => 'Ipsum',
                'people_id' => rand(1, 200)
            ]);

            $payload = [
                'title' => 'Lorem',
                'description' => 'Ipsum',
            ];

            $response = $this->json('PUT', 'api/contribution/people_contributions/' . $Contribution->id, $payload, $headers)
                ->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'id'
                ])
                ->assertJson([
                    'status' => 0
                ]);
        }

        public function testsContributionAreDeletedCorrectly()
        {
            $headers = ['Authorization' => "Bearer $this->token"];
            $Contribution = factory(PeopleContribution::class)->create([
                'title' => 'First Contribution',
                'description' => 'Ipsum',
                'people_id' => rand(1, 200)
            ]);

            $this->json('DELETE', 'api/contribution/people_contributions/' . $Contribution->id, [], $headers)
                ->assertStatus(200)
                ->assertJson([
                    'status' => 0
                ]);
        }

}
