<?php

use App\Models\Post;
use App\Models\Usuari;
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
        Schema::create('comentaris', function (Blueprint $table) {
            $table->id();
            $table->text('contingut');
            $table->foreignIdFor(Usuari::class,'usuari_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Post::class,'post_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentaris');
    }
};
