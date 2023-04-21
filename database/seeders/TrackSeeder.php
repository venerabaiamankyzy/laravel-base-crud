<?php

namespace Database\Seeders;

use App\Models\Track;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {
            $track = new Track;

            $track->title = $faker->firstName();
            $track->album = $faker->sentence(4);
            $track->author = $faker->name();
            $track->editor = $faker->name();
            $track->length = $faker->time();
            $track->poster = "https://picsum.photos/200/300";
            
            $track->save();

        }
    }
}