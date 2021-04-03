<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new\App\User;
        $user ->username = "Julia";
        $user ->name = "Julia Dwi Cahya";
        $user ->email = "Julia@gmail.com";
        $user ->password = \Hash::make("12345678");
        $user ->role = "admin";
        $user->save();
        $this->command->info("User Ditambahkan");
    }
}
