<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->string('card_number');
            $table->string('book_code');
            $table->date('borrow_date');
            $table->date('pay_date');
            $table->timestamps();
        });

        Schema::table('borrows', function (Blueprint $table) {
            $table->foreign('card_number')->references('card_number')->on('borrowers')->onDelete('cascade');
            $table->foreign('book_code')->references('book_code')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
