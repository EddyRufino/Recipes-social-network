<?php

use App\User;
use App\Perfil;
use App\Recipe;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 6)->create();

        factory(User::class, 5)
        	->create()
        	->each(function (User $user) {

                $user->perfil()->save(factory(Perfil::class)->make());

        		$user->recipes()->createMany(factory(Recipe::class, 3)
        				->make()
        				->toArray());
        	});


    }
}
