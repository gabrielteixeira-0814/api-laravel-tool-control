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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('codeTool');
            $table->foreignId('mark_id')->references('id')->on('marks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('model_id')->references('id')->on('models')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('toolstatuses_id')->references('id')->on('toolstatuses')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('status');
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
        Schema::dropIfExists('tools');
    }
};
