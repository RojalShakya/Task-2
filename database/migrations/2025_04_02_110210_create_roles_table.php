<?php

use App\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->enum('status',['active','inactive']);

            $table->timestamps();
        });
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'status'=>'active'
        ]);
        Role::create([
            'name'=>'User',
            'slug'=>'user',
            'status'=>'active'
        ]);
        Role::create([
            'name'=>'Customer',
            'slug'=>'customer',
            'status'=>'active'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
