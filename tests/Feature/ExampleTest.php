<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function sendPicture($base64){

        $fileName = "profile-1.png";

        try{
            Storage::disk('public')->put("/photos/profiles/" . $fileName,base64_decode($base64));
            dd();
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }
}
