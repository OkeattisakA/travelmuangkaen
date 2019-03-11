<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'setting_systemname_th' => 'ระบบสารสนเทศภูมิศาสตร์แสดงข้อมูลการท่องเที่ยวและข้อมูลภูมิปัญญาท้องถิ่น ในพื้นที่เทศบาลเมืองเมืองแกนพัฒนา อำเภอแม่แตง จังหวัดเชียงใหม่',
            'setting_systemname_eng' => 'Geographic Information System for Travel Information And Local Wisdoms Management in Muangkaen Pattana Municipality Chiangmai Province',
            'setting_linetoken' => 'sZem6jv1OL2pB6di7z8Z8Zm3poYY6yFSRZwiQ01XLry',
            'setting_start_lat' => '19.157197',
            'setting_start_lng' => '98.979456'
        ]);
    }
}
