<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActionTest extends TestCase
{
    public function test_required_validation()
    {
        $response = $this->post('/api/v1/actions', [], [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function test_wrong_action_name_validation()
    {
        $response = $this->post('/api/v1/actions', [
            'actions' => [
                [
                    'name' => 'create_folder_wrong'
                ]
            ]
        ], [
            'accept' => 'application/json'
        ]);


        $response->assertStatus(422);
    }

    public function test_right_action_name_with_the_name_create_folder()
    {
        $response = $this->post('/api/v1/actions', [
            'actions' => [
                [
                    'name' => 'create_folder',
                    'path' => $this->bucket,
                    'value' => $this->folder
                ]
            ]
        ], [
            'accept' => 'application/json'
        ]);


        $response->assertStatus(200);
    }


}
