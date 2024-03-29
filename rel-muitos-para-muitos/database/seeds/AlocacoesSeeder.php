<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alocacoes')->insert(['projeto_id' => 1, 'desenvolvedor_id' => 1, 'horas_semanais' => 11]);
        DB::table('alocacoes')->insert(['projeto_id' => 1, 'desenvolvedor_id' => 2, 'horas_semanais' => 13]);
        DB::table('alocacoes')->insert(['projeto_id' => 2, 'desenvolvedor_id' => 2, 'horas_semanais' => 24]);
        DB::table('alocacoes')->insert(['projeto_id' => 2, 'desenvolvedor_id' => 3, 'horas_semanais' => 35]);
        DB::table('alocacoes')->insert(['projeto_id' => 3, 'desenvolvedor_id' => 1, 'horas_semanais' => 16]);
        DB::table('alocacoes')->insert(['projeto_id' => 3, 'desenvolvedor_id' => 2, 'horas_semanais' => 76]);
        DB::table('alocacoes')->insert(['projeto_id' => 3, 'desenvolvedor_id' => 3, 'horas_semanais' => 26]);
    }
}
