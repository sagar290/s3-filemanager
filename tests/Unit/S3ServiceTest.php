<?php

namespace Tests\Unit;

use App\Service\S3Service;
use Illuminate\Support\Str;
use Tests\TestCase;

class S3ServiceTest extends TestCase
{
    public function __construct()
    {
        $this->folder = str_replace('/', '', $this->folder) . "Unit/";
        parent::__construct();
    }
    public function test_create_folder()
    {

        $createFolder = (new S3Service())->createFolder($this->bucket, $this->folder);

        $this->assertEquals(
            "https://bornon.s3.ap-south-1.amazonaws.com/{$this->folder}",
            $createFolder
        );
    }

    public function test_delete_folder()
    {

        // delete folder
        (new S3Service())->deleteFolder($this->bucket, $this->folder);

        // check folder is deleted
        $getFolder = (new S3Service())->getContentFolderByPath("{$this->bucket}")['folders']
            ->where(
                'Prefix',
                $this->folder
            )
            ->first();

        $this->assertTrue(blank($getFolder));
    }
}
