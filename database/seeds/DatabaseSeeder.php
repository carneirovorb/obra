<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Work;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Truncate -> cascade para users
        DB::statement('TRUNCATE users CASCADE');

        DB::table('users')->insert([
        'name' => 'Engenheiro',
        'cpf' => '060.621.415-17',
        'email' => 'engenheiro@mail.com',
        'password' => bcrypt('12345'),
        'privilege' => 2
        ]);
        
        DB::table('prefectures')->insert([
            'name' => 'Engenheiro Coelho - SP',
        ]);
        /* exemple seed for permission
        DB::table('permissions')->insert([
            'user_id' => 2,
            'work_id' => 7,
            'type' => 1,
        ]);*/

        DB::table('works')->insert([
            'user_id' => 1,
            'name' => 'Pavimentação de Ruas',
            'contract' => '1004000-03',
            'siconv' => '351652013',
            'siafi' => '783114',
            'year' => '2017',
            'action' => 'PLANEJAMENTO UR',
            'value' => '447331.30',
            'value_free' => '315360.00',
            'status' => 'Normal',
            'object' => 'Pavimentação de Vias Publica do Municipio de Iguai - BA',
            'status_contract' => 'Em Execução',

            'propose_number' => '035165/2013',
            'account_repass' => '1004000-03',
            'repass_value' => '394200.00',
            'organ' => 'MCIDADES',
            'execution_fis' => '42.19',
            'execution_finan' => '42.19',

            'licitation_number' => '12015',
            'spreadsheet_winner' => '447311.30',
            'declaration' => 'ANEXO OK',

            'company' => 'Eloyn Construtora LTDA-ME',
            'cnpj' => '07.874.108/0001-52',
            'counterpart_value' => '52111.30',
            'original_number' => '35165/2013',
            'super_organ' => 'MINISTERIO DAS CIDADES',
            'grantor' => 'CAIXA ECONOMICA FEDERAL - PROGRAMAS SOCIAIS',

            'prefecture_id'=> 1,
            'bond' => 'CAIXA',
            'type_work'=>'1'
        ]);
    }
}
