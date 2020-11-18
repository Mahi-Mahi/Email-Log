<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_mails', function (Blueprint $table) {
            $table->id();
            $table->string('from')->index();
            $table->string('reply_to')->nullable();
            $table->string('to')->index();
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->string('subject')->index();
            $table->text('html')->nullable();
            $table->text('raw')->nullable();
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
        Schema::dropIfExists('sent_mails');
    }
}
