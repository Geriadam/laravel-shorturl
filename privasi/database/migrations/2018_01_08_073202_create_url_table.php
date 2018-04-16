<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (!Schema::hasTable('url')) {
			Schema::create('url', function (Blueprint $table) {
				$table->increments('id_url');
				$table->string('url_asli', 255);
				$table->string('url_palsu', 255);
				$table->text('url_hash');
				$table->integer('url_click');
				$table->timestamps();
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('url');
    }
}
