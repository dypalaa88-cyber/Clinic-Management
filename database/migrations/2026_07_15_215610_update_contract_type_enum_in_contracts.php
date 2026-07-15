<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // (1) تغيير enum ليشمل cash
        DB::statement("ALTER TABLE contracts MODIFY COLUMN contract_type ENUM('cash', 'insurance', 'corporate') DEFAULT 'cash'");
    }

    public function down(): void
    {
        // (2) إعادة enum إلى الأصل
        DB::statement("ALTER TABLE contracts MODIFY COLUMN contract_type ENUM('insurance', 'corporate') DEFAULT 'insurance'");
    }
};