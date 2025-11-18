<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKelas extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ], 
            'id_kelas' => [
                'type' => 'int'
            ],
            'id_user' =>[
                'type' => 'int',
                'unsigned' => true
            ],
            'tanggal_masuk' => [
                'type' => 'date'
            ]
            ]);
            $this->forge->addKey('id' , true);
            $this->forge->addForeignKey('id_kelas' , 'kelas' , 'id' , 'CASCADE' , 'CASCADE');
            $this->forge->addForeignKey('id_user' , 'users' , 'id' , 'CASCADE' , 'CASCADE');
            $this->forge->createTable('detail_kelas');
    }

    public function down()
    {
        //
        $this->forge->dropTable('detail_kelas');
    }
}
