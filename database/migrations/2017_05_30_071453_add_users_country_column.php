<?php

use App\Country;
use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersCountryColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('country_id')->default(1);;
        });

        $countries     = Country::all();
        User::all()->each(function (User $user) use ($countries) {
            $user->country_id = $countries->first()->id;
            if ($user->id % 2 == 0) {
                $user->country_id = $user->country_id + 1;
            }
            if ($user->id % 3 == 0) {
                $user->country_id = $countries->last()->id;
            }

            $user->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('country_id');
        });
    }
}
