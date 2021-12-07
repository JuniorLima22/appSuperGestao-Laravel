<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Método 1: Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 123';
        $fornecedor->site = 'fornecedor123.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor123@email.com.br';
        $fornecedor->save();

        // Método 2: (Atenção para o atributo fillable da classe Fornecedor)
        Fornecedor::create([
            'nome' => 'Fornecedor 456',
            'site' => 'fornecedor456.com.br',
            'uf' => 'RS',
            'email' => 'fornecedor456@email.com.br',
        ]);

        // Método 3: Utilizando método insert da Facade DB
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 789',
            'site' => 'fornecedor789.com.br',
            'uf' => 'MA',
            'email' => 'fornecedor789@email.com.br',
        ]);
    }
}
