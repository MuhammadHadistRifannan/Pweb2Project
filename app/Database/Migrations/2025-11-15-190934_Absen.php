<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absen extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT' , 
                'constraint' => 5
            ] , 
            'id_user' => [
                'type' => 'INT' ,
                'unsigned' => TRUE
            ],
            'tanggal_absen' => [
                'type' => 'datetime' 
            ] ,
            'id_kelas' => [
                'type' => 'INT'
            ]
            ]);
            $this->forge->addKey('id' ,TRUE);
            $this->forge->addKey('id_user'); 
            $this->forge->addKey('id_kelas');
            $this->forge->addForeignKey('id_user' , 'users' , 'id' , 'CASCADE' , 'CASCADE');
            $this->forge->addForeignKey('id_kelas' , 'kelas' , 'id' , 'CASCADE' , 'CASCADE');

            $this->forge->createTable('absen');
    }

    public function down()
    {
        //
        $this->forge->dropTable('absen');
    }
}
