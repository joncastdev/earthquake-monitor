<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Country;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('countrys', function (Blueprint $table) {
    		$table->id();
    		$table->string('country_name',255)->nullable();
    		$table->unsignedInteger('lat')->nullable();
    		$table->unsignedInteger('long')->nullable();
    		$table->string('country_flag',255)->nullable();  
    		$table->timestamps();
    	});

       
    	$subcategory = new Country;
    	$subcategory->country_name = 'Indonesia';
    	// $subcategory->lat = 139.9122;
    	// $subcategory->long = -3.0909,37.818;
    	// $subcategory->country_flag = 'indonesia.png';
    	$subcategory->save();

    	$subcategory = new Country;
    	$subcategory->country_name = 'Venezuela';
    	// $subcategory->lat = 139.9122;
    	// $subcategory->long = -3.0909,37.818;
    	// $subcategory->country_flag = 'indonesia.png';
    	$subcategory->save();     	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('countrys');
    }
};
