<?php

use App\Image;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        foreach ($array as $one) {

            $images = new Image();

            $images->user_id = $one;
            $images->save();
        }
    }
}
