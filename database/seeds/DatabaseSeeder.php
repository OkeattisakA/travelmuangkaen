<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);

        $this->call(PlaceTableSeeder::class);
        $this->call(PlacephotoTableSeeder::class);
        $this->call(PlacereviewTableSeeder::class);


        $this->call(WisdomTableSeeder::class);

        $this->call(WisdomreviewTableSeeder::class);
    }
}
