<?php

use Illuminate\Database\Seeder;

class PlacephotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3953e00bd38-1-1-1.jpg',
            'place_id' => 1,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3953f3e687e-1-1-2.jpg',
            'place_id' => 1,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3953f40a816-1-1-3.jpg',
            'place_id' => 1,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3953f41ab0a-1-1-4.jpg',
            'place_id' => 1,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3953f4244b0-1-1-5.jpg',
            'place_id' => 1,
        ]);

//        ----------------------------------------------------------------

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39545fcac74-2-2-1.jpg',
            'place_id' => 2,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39545fd9f34-2-2-2.jpg',
            'place_id' => 2,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39545fe1cf1-2-2-3.jpg',
            'place_id' => 2,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39546000978-2-2-4.jpg',
            'place_id' => 2,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a395460081ef-2-2-5.jpg',
            'place_id' => 2,
        ]);

        //        ----------------------------------------------------------------

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3954beba570-3-3-1.jpg',
            'place_id' => 3,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3954bed2a3c-3-3-2.jpg',
            'place_id' => 3,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3954bee1cc6-3-3-3.jpg',
            'place_id' => 3,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3954beea511-3-3-4.jpg',
            'place_id' => 3,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3954bf00885-3-3-5.jpg',
            'place_id' => 3,
        ]);

        //        ----------------------------------------------------------------

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a395506642c9-4-4-1.jpg',
            'place_id' => 4,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39550679ef1-4-4-2.jpg',
            'place_id' => 4,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39550681bfd-4-4-3.jpg',
            'place_id' => 4,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a395506904f8-4-4-4.jpg',
            'place_id' => 4,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a395506986fd-4-4-5.jpg',
            'place_id' => 4,
        ]);

        //        ----------------------------------------------------------------

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a395553df918-5-5-1.jpg',
            'place_id' => 5,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a395553eaa28-5-5-2.jpg',
            'place_id' => 5,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39555401904-5-5-3.jpg',
            'place_id' => 5,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a3955540e65e-5-5-4.jpg',
            'place_id' => 5,
        ]);

        DB::table('placephotos')->insert([
            'placephoto_path' => '2017-12-20-5a39555415e89-5-5-5.jpg',
            'place_id' => 5,
        ]);
    }
}
