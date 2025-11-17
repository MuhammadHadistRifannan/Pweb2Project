<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rewards extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_reward' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'point' => [
                'type' => 'int'
            ],
            'category' => 
            [
                'type' => 'enum',
                'constraint' => ['academy' , 'tech' , 'merchandise']
            ],
            'sudah_reedem' => [
                'type' => 'bool'
            ]
            ]);

            $this->forge->addKey('id' , true);
            $this->forge->createTable('rewards');
    }

    public function down()
    {
        //
        $this->forge->dropTable('rewards');
    }
}
