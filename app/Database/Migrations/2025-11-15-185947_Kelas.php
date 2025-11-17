<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT' , 
                'constraint' => 5 , 
                'auto_increment' => true
            ] ,
            'nama_kelas' => [
                'type' => 'varchar',
                'constraint' => 50
            ] ,
            'category' => [
                'type' => 'varchar',
                'constraint' => 50
            ] ,
            'mentor' => [
                'type' => 'varchar', 
                'constraint' => 30
            ],
            'jadwal' => [
                'type' => 'datetime'
            ], 
            'point' => [
                'type' => 'INT' 
            ]
            ]);
            $this->forge->addKey('id' , true);
            $this->forge->createTable('kelas' , true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('kelas');
    }
}
