<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addAdminUser();
        
        // create 25 users using the user factory
        factory(App\User::class, 25)->create();
    }
    public function addAdminUser(){
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => app('hash')->make('12345'),
        ]);
    }
}