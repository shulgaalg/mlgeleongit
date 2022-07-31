<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Role::create([
            'name'=>'admin',
            'slug'=>'admin',
            'permissions'=>[
                'InsertDataA'=> true,
                'DeleteData'=> true,
                'UpdateData'=> true
                ]
        ]);

        $user=Role::create([
            'name'=>'user',
            'slug'=>'user',
            'permissions'=>[
                'InsertDataTeam'=> true,
                'UpdateData'=> true
                ]
        ]);

    }
}
