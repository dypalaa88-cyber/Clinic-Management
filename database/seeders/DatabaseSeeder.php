<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
            SpecialtySeeder::class,
            RoomSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            ScheduleSeeder::class,
            AppointmentSeeder::class,
            PriceListSeeder::class,
            ContractSeeder::class,
            InventoryItemSeeder::class,
        ]);
    }
}