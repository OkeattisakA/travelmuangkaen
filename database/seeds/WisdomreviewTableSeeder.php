<?php

use Illuminate\Database\Seeder;

class WisdomreviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wisdomreviews')->insert([
            'wisdomreview_detail' => 'สวยงามมากครับ',
            'wisdomreview_star' => 5,
            'wisdomreview_status' => 1,
            'wisdomreview_photo' => 'Review-2019-02-07-5c5bd553e7043-MW-GY949_travel_20181122135819_ZH.jpg',
            'wisdom_id' => 1,
            'wisdomreview_by' => 3,
            'created_at' => '2017-12-21 19:17:18',
            'updated_at' => '2017-12-21 19:17:18',
        ]);

        DB::table('wisdomreviews')->insert([
            'wisdomreview_detail' => 'สวยงามมากครับ  ไปมาแล้วครับ',
            'wisdomreview_star' => 5,
            'wisdomreview_status' => 1,
            'wisdomreview_photo' => 'Review-2019-02-07-5c5bd553e7043-MW-GY949_travel_20181122135819_ZH.jpg',
            'wisdom_id' => 2,
            'wisdomreview_by' => 3,
            'created_at' => '2018-09-06 20:02:54',
            'updated_at' => '2018-09-06 20:02:54',
        ]);
    }
}
