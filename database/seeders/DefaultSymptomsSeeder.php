<?php

namespace Database\Seeders;

use App\Models\Symptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSymptomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Symptom::insert([
                    ['name' => 'Febre'],
                    ['name' => 'Coriza'],
                    ['name' => 'Nariz entupido'],
                    ['name' => 'Cansaço'],
                    ['name' => 'Tosse'],
                    ['name' => 'Dor de cabeça'],
                    ['name' => 'Dores no corpo'],
                    ['name' => 'Mal estar geral'],
                    ['name' => 'Dor de garganta'],
                    ['name' => 'Dificuldade de respirar'],
                    ['name' => 'Falta de paladar'],
                    ['name' => 'Falta de olfato'],
                    ['name' => 'Dificuldade de locomoção'],
                    ['name' => 'Diarreia'],
                ]);
    }
}
