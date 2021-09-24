<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{        
    use RefreshDatabase;
    /**
     * 
     * @return void
     */
    public function test_fetchOne() {

    }
}
