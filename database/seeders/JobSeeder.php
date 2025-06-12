<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(4)->create();

        $employers = Employer::factory(10)->create();

        Job::factory(20)->recycle($employers)->hasAttached($tags)->create(new Sequence([
            'featured' => false,
            'schedule' => 'Full Time',
        ], [
            'featured' => true,
            'schedule' => 'Part Time',
        ]));
    }
}
