<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into produtos
(nome, quantidade, valor, descricao)
values (?,?,?,?)',
            array(
                'Geladeira',
                2,
                5900,
                'Side by Side com gelo na porta'
            )
        );
        DB::insert('insert into produtos
(nome, quantidade, valor, descricao)
values (?,?,?,?)',
            array(
                'Fogão',
                5,
                950,
                'Painel automático e forno elétrico'
            )
        );
        DB::insert('insert into produtos
(nome, quantidade, valor, descricao)
values (?,?,?,?)',
            array(
                'Microondas',
                1,
                1520,
                'Manda SMS quando termina de esquentar'
            )
        );
    }
}
