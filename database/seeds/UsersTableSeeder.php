<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Eduardo Augusto',
                'department_id' => 1,
                'email' => 'eduardo.augusto@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'admin',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pedro Palrão',
                'department_id' => 1,
                'email' => 'pedro.palrao@makeadream.com',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Make a Dream',
                'department_id' => 1,
                'email' => 'makeadream@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marcos Alcantara',
                'department_id' => 1,
                'email' => 'marcos.alcantara@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lucas Malvino',
                'department_id' => 1,
                'email' => 'lucas.malvino@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Carlos Melo',
                'department_id' => 1,
                'email' => 'carlos.melo@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lourivaldo Vasconcelos',
                'department_id' => 1,
                'email' => 'louro.vasc@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Joao Mangue',
                'department_id' => 1,
                'email' => 'joao.mangue@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Felipe Prior',
                'department_id' => 1,
                'email' => 'felipe.prior@makeadream.com',
                'email_verified_at' => now(),
                'role' => 'client',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
