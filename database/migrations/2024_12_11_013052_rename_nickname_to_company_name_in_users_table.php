<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNicknameToCompanyNameInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nickname', 'company_name');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('company_name', 'nickname');
        });
    }
    
}
