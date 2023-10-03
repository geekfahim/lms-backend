<?php

use App\Enums\CommonStatus;
use App\Enums\VatType;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(SubCategory::class)->nullable();
            $table->foreignIdFor(Brand::class)->nullable();
            $table->foreignIdFor('unit_id')->nullable();
            $table->bigInteger('vat_rate')->nullable();
            $table->string('vat_type')->default(VatType::Exclusive);
            $table->string('name');
            $table->string('item_code')->unique();
            $table->string('regular_price');
            $table->string('discount')->nullable();
            $table->string('selling_price');
            $table->string('alert_quantity')->default(1);
            $table->string('image')->nullable();
            $table->string('status')->default(CommonStatus::Active);


            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
