<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('vid_name')->default('');
                        $table->string('slug')->default('');
                        $table->string('topic')->default('');
                        $table->string('class')->default('');
                        $table->string('instructor')->default('');
                        $table->string('vid_url')->default('');
                        $table->boolean('isVerified')->default(false);
                        $table->date('created_at')->default(NULL);
                        $table->string('created_by')->default('');
                        $table->date('updated_at')->default(NULL);
                        $table->string('updated_by')->default('');
                        $table->string('title')->default('');
                        $table->string('tags')->default('');
                        $table->string('semester')->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('videos');
	}

}