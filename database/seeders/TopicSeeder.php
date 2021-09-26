<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$topics = ['laravel', 'php', 'javascript', 'nodejs', 'express' ];
        foreach($topics as $name) {
    		Topic::factory()->create([
    			'title' => $name,
    		]);
    	}
    }
}
