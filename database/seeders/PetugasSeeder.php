<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Petugas BPBD',
            'email'    => 'petugas@bpbd.go.id',
            'password' => Hash::make('password123'),
        ]);
    }
}