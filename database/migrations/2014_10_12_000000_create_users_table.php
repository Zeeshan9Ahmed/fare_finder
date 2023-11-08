<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->boolean('profile_completed')->default(0);
            $table->string('dob')->nullable();
            $table->enum('signin_mode',['email','phone','social'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_token')->nullable();
            $table->string('social_type')->nullable();
            $table->string('social_token')->nullable();
            $table->boolean('is_social')->nullable();
            $table->enum('is_active',[0,1])->default(1);
            $table->json('user_filters')->default(json_encode([
                'selected_services' => [],
                'selected_vehicles' => []
            ]));
            $table->boolean('push_notification')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(['first_name' => 'Test','last_name' => 'User', 'email' => 'test@getnada.com']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
