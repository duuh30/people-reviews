<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Sales', 'Recursos Humanos', 'Marketing', 'Legal', 'Tech', 'Management'];
        $departmentsData = [];

        foreach($departments as $department) {
            $departmentsData[] = [
                'name' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('departments')->insert($departmentsData);
    }
}
