<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PlacereviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('placereviews')->insert([
            'placereview_detail' => 'สวยงามมากครับ',
            'placereview_star' => 5,
            'placereview_status' => 1,
            'placereview_photo' => 'Review-2019-02-07-5c5bd553e7043-MW-GY949_travel_20181122135819_ZH.jpg',
            'place_id' => 1,
            'placereview_by' => 3,
            'created_at' => '2017-12-21 19:17:18',
            'updated_at' => '2017-12-21 19:17:18',
        ]);

        DB::table('placereviews')->insert([
            'placereview_detail' => 'สวยงามมากครับ ชอบมาก',
            'placereview_star' => 5,
            'placereview_status' => 0,
            'placereview_photo' => 'Review-2019-02-07-5c5bd553e7043-MW-GY949_travel_20181122135819_ZH.jpg',
            'place_id' => 1,
            'placereview_by' => 3,
            'created_at' => '2017-12-21 19:25:08',
            'updated_at' => '2017-12-21 19:25:08',
        ]);
    }
}
