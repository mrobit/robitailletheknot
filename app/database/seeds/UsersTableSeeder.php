<?php

use Knot\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        User::create([
			'email'    => 'matt@anchour.com',
			'password' => 'test',
        ]);
	}
}