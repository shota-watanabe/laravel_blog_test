<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogViewControllerTest extends TestCase
{
    /** @test Index */
    function ブログのトップページを開ける()
    {
        $this->get('/')
             ->assertOK();
    }
}
