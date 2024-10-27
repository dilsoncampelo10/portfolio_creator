<?php

use App\Enum\PortfolioStatus;
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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->enum('status', array_column(PortfolioStatus::cases(), 'value'));
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('portfolio_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('portfolio_id')->references('id')->on('portfolios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
