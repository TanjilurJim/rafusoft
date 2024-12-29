<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('content');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->string('banner_head');
            $table->string('banner_head_two');
            $table->string('canonical');  
            $table->string('page_url');  
            $table->string('favicon');  
            $table->string('og');  
            $table->string('schema_company_name');  
            $table->string('schema_description');  
            $table->string('streetAddress');  
            $table->string('addressLocality');  
            $table->string('addressRegion');  
            $table->string('postalCode');  
            $table->string('addressCountry');  
            $table->string('telephone');  
            $table->string('schema_url');  
            $table->string('industry_type');  
            $table->string('price_range');  
            $table->string('openingHours');  
            $table->string('artical_headline');  
            $table->string('artical_description');  
            $table->string('author_type');  
            $table->string('author_name');  
            $table->string('author_url');  
            $table->string('publisher');  
            $table->string('published_date');  
            $table->string('modified_date');  
            $table->string('publisher_logo');  
            $table->string('schema_image_url');  
            $table->string('map');  
            $table->string('status');  
            $table->string('category');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refs');
    }
};
