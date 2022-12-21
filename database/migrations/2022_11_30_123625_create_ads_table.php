<?php

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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->unique();
            $table->string('slug');
            $table->string('country');
            $table->unsignedInteger('no_places');
            $table->string('desc');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->timestamp('deleted_at')->nullable();
            $table->softDeletes(); //pravi timestamp 'deleted_at' i dodaje mu nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
