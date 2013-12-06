<?php

class UsersSeeder extends DatabaseSeeder {

    public function run(){

        $users = [
            [
                "username" => "test",
                "password" => Hash::make("testas"),
                'role' => 'user'
            ],
            [
                "username" => "admin",
                "password" => Hash::make("admin"),
                'role' => 'admin'
            ]
        ];

        foreach ($users as $user)
        {
            Users::create($user);
        }
    }

}