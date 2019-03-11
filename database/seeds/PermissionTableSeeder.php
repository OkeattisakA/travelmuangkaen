<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ability = Bouncer::ability()->create([
            'name' => 'setting-manage',
            'title' => 'ตั้งค่าโปรแกรม'
        ]);

        $ability = Bouncer::ability()->create([
            'name' => 'place-create',
            'title' => 'เพิ่มข้อมูลสถานที่ท่องเที่ยว'
        ]);

        $ability = Bouncer::ability()->create([
            'name' => 'place-edit',
            'title' => 'แก้ไขข้อมูลสถานที่ท่องเที่ยว'
        ]);

        $ability = Bouncer::ability()->create([
            'name' => 'place-delete',
            'title' => 'ลบข้อมูลสถานที่ท่องเที่ยว'
        ]);

        $ability = Bouncer::ability()->create([
            'name' => 'wisdom-create',
            'title' => 'เพิ่มข้อมูลภูมิปัญญาท้องถิ่น'
        ]);

        $ability = Bouncer::ability()->create([
            'name' => 'wisdom-edit',
            'title' => 'แก้ไขข้อมูลภูมิปัญญาท้องถิ่น'
        ]);

        $ability = Bouncer::ability()->create([
            'name' => 'wisdom-delete',
            'title' => 'ลบข้อมูลภูมิปัญญาท้องถิ่น'
        ]);

    }
}
