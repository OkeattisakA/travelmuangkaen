<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'Administrator@hotmail.com',
            'firstname' => 'เกียรติศักดิ์',
            'lastname' => 'อุดแคว',
            'birthday' => '12/12/1994',
            'gender' => 'ชาย',
            'address' => '107 หมู่ 4 ต.เหมืองแก้ว อ.แม่ริม จ.เชียงใหม่ 50180',
            'tel' => '0802284075',
            'password' => bcrypt('123456789'),
            'created_at' => Carbon::now()
        ]);
        $user->assign('admin');

        $user = User::create([
            'name' => 'Member',
            'email' => 'Member@hotmail.com',
            'firstname' => 'เกียรติศักดิ์',
            'lastname' => 'อุดแคว',
            'birthday' => '12/12/1994',
            'gender' => 'ชาย',
            'address' => '107 หมู่ 4 ต.เหมืองแก้ว อ.แม่ริม จ.เชียงใหม่ 50180',
            'tel' => '0802284075',
            'password' => bcrypt('123456789'),
            'created_at' => Carbon::now()
        ]);
        $user->assign('member');

        $user = User::create([
            'name' => 'Oreoz',
            'email' => 'oreozdevelopers@outlook.com',
            'provider' => 'facebook',
            'provider_id' => '1506905666066725',
            'remember_token' => 'EdCYQGgPOlaLcn2B28orL5ojpO1jpg3Vad5Hq5nlHNC97xQ7DyTKzllSI7iu',
            'created_at' => Carbon::now()
        ]);
        $user->assign('facebook');
    }
}
