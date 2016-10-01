<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        (new \Chatbox\Message\Storage\Eloquent\MessageService())->up($schema);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $schema = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        (new \Chatbox\Message\Storage\Eloquent\MessageService())->down($schema);
    }
}
