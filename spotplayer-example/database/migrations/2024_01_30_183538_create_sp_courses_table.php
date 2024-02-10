<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sp_courses', function (Blueprint $table) {
            // If you are using mysql, you can tune your table with these commands: 
            $table->engine = 'InnoDB'; // table's storage engine
            $table->charset = 'utf8mb4'; // specify the character set 
            $table->collation = 'utf8mb4_unicode_ci'; // specify the collation
            $table->comment('courses uploaded in Spotplayer');// for mysql and postgres
            //
            $table->id();
            $table->string('courseId')->unique();

            $table->foreignId('author_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp_courses');
    }
};
