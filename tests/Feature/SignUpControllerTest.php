<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @see \App\Http\Controllers\SignUpController */

class SignUpControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test index */
    function ユーザー登録画面を開ける()
    {
        $this->get('signup')
             ->assertOK();
    }

    private function validData($ovverrides = [])
    {   
        return array_merge([
            'name' => '太郎',
            'email' => 'aaa@bbb.net',
            'password' => 'abcd1234',
        ]);
    }

    /** @test store */
    function ユーザー登録できる()
    {
        // データ検証
        // DBに保存
        // ログインさせてからマイページにリダイレクト
        // $this->withoutExceptionHandling();
        $validData = User::factory()->validData();
        dd($validData);
        
        $this->post('signup', $validData)
            ->assertOk();

        unset($validData['password']);

        $this->assertDatabaseHas('users', $validData);

        // パスワードの検証
        $user = User::firstWhere($validData);
        $this->assertNotNull($user);
        
        $this->assertTrue(Hash::check('abcd1234', $user->password));
    }
}