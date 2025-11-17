<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Progress extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_user' => [
                'type' => 'INT' , 
                'unsigned' => true
            ],
            'total_point' => [
                'type' => 'INT'
            ],
            'hadir' => [
                'type' => 'INT'
            ],
            'total_kehadiran' => [
                'type' => 'INT'
            ],
            'tanggal_gabung' => [
                'type' => 'date'
            ]
            ]);

            $this->forge->addKey('id' , true);
            $this->forge->addKey('id_user');
            $this->forge->addForeignKey('id_user' , 'users' , 'id' , 'CASCADE' , 'CASCADE');
            $this->forge->createTable('progress');
    }

    public function down()
    {
        //
        $this->forge->dropTable('progress');
    }
}
