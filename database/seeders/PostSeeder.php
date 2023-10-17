<?php

namespace Database\Seeders;

use App\Models\post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        post::factory()->count(20)->hasComments(3, ['approved' => false])->create();
    }
}
