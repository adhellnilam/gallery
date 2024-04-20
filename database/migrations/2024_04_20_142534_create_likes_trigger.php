<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER calculate_likes
            AFTER INSERT ON likes
            FOR EACH ROW
            BEGIN
                UPDATE posts
                SET likes_count = likes_count + 1
                WHERE posts.id = NEW.post_id;
            END
        ');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes_trigger');
    }
};
