<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
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
        
        Schema::table('customers', function (Blueprint $table) {
            $table->string('type')->default('customer');
            $table->boolean('is_suspended')->default(0);
            $table->integer('company_role_id')->unsigned()->nullable();
            $table->foreign('company_role_id')->references('id')->on('company_roles')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['company_role_id']);
            $table->dropColumn(['type', 'is_suspended', 'company_role_id']);
        });
        Schema::dropIfExists('company_roles');
    }
};