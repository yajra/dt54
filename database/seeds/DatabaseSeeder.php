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
        factory(App\User::class, 200)->create()->each(function (App\User $u) {
            $post = factory(App\Post::class)->make();

            $u->posts()->save($post);
            $u->blogs()->attach($post);
        });
    }
}
