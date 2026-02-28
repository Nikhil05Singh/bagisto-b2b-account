<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // 1. Create company_roles if it doesn't exist
        if (!Schema::hasTable('company_roles')) {
            Schema::create('company_roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('permission_type')->default('custom');
                $table->json('permissions')->nullable();
                $table->integer('customer_id')->unsigned();
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->timestamps();
            });
        }

        // 2. Add columns to customers individually
        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'type')) {
                $table->string('type')->default('customer');
            }
            if (!Schema::hasColumn('customers', 'is_suspended')) {
                $table->boolean('is_suspended')->default(0);
            }
            if (!Schema::hasColumn('customers', 'company_role_id')) {
                $table->integer('company_role_id')->unsigned()->nullable();
                $table->foreign('company_role_id')->references('id')->on('company_roles')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'company_role_id')) {
                $table->dropForeign(['company_role_id']);
                $table->dropColumn('company_role_id');
            }
            if (Schema::hasColumn('customers', 'type')) {
                $table->dropColumn('type');
            }
            if (Schema::hasColumn('customers', 'is_suspended')) {
                $table->dropColumn('is_suspended');
            }
        });
        
        Schema::dropIfExists('company_roles');
    }
};