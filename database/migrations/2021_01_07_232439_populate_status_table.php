<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            ['status_name' => 'Ready For Development', 'code' => 'READY_FOR_DEV'],
            ['status_name' => 'In Development', 'code' => 'IN_DEVELOPMENT'],
            ['status_name' => 'Done', 'code' => 'DONE']
        ];

        DB::table('status')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
