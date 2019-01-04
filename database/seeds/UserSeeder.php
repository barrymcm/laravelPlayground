<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Sophie',
            'email' => 'sophie@email.com',
            'password' => hash('sha256', 'password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'sophie.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto consectetur, dolorem eius ipsa itaque iusto laboriosam minus odit officia quam quasi quia quisquam repellat sit ut veritatis vero voluptas',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
