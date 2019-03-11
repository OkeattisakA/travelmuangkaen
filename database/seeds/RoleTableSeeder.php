<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrator'
        ]);

        Bouncer::allow('admin')->to('setting-manage');

        Bouncer::allow('admin')->to('place-create');
        Bouncer::allow('admin')->to('place-edit');
        Bouncer::allow('admin')->to('place-delete');

        Bouncer::allow('admin')->to('wisdom-create');
        Bouncer::allow('admin')->to('wisdom-edit');
        Bouncer::allow('admin')->to('wisdom-delete');

        $role = Bouncer::role()->create([
            'name' => 'member',
            'title' => 'Member'
        ]);

        Bouncer::allow('member')->to('place-create');
        Bouncer::allow('member')->to('place-edit');
        Bouncer::allow('member')->to('place-delete');

        Bouncer::allow('member')->to('wisdom-create');
        Bouncer::allow('member')->to('wisdom-edit');
        Bouncer::allow('member')->to('wisdom-delete');

        $role = Bouncer::role()->create([
            'name' => 'facebook',
            'title' => 'Facebook'
        ]);
    }
}
