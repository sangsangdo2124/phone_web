<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('san_pham_id');
            $table->timestamps();
        });
    }
        // Bạn có thể thêm foreign key nếu muốn:
        // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // $table->foreign('san_pham_id')->references('id')->on('san_pham')->onDelete('cascade');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlist_items');
    }
}
