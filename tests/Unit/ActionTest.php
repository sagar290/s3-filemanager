<?php

namespace Tests\Unit;

use App\Service\ActionService;
use App\Service\S3Service;
use Tests\TestCase;

class ActionTest extends TestCase
{
    public function __construct()
    {
        $this->folder = str_replace('/', '', $this->folder) . "Unit/";
        parent::__construct();
    }

    public function test_run_create_folder_actions_success()
    {
        $createFolder = app(ActionService::class)
            ->createFolderAction($this->bucket, $this->folder);

        $this->assertEquals('success', $createFolder['status']);
    }

    public function test_run_create_folder_actions_which_already_exist()
    {
        $createFolder = app(ActionService::class)
            ->createFolderAction($this->bucket, $this->folder);

        $this->assertEquals('error', $createFolder['status']);
    }

}
