<?php

use Illuminate\Database\Seeder;
use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Riski Tisnahayu',
            'email'     => 'riskitisnahayu@gmail.com',
            'username'  => 'riskit',
            'password'  => bcrypt('123'),
            'type'      => 'Admin'
        ]);
    }
}
