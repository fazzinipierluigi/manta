<?php
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateFieldsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('fields', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('order')->nullable();
				$table->string('display_name');
				$table->string('name');
				$table->string('type');
				$table->boolean('list');
				$table->boolean('create');
				$table->boolean('show');
				$table->boolean('update');
				$table->text('filters');
				$table->text('settings');
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
			Schema::dropIfExists('fields');
		}
	}
