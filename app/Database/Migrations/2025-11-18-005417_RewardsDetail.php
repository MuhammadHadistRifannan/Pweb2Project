<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RewardsDetail extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => true
            ] ,
            'id_reward' => [
                'type' => 'int'
            ] ,
            'id_user' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'waktu_klaim' => [
                'type' => 'date'
            ]
            ]);
            $this->forge->addKey('id' , true);
            $this->forge->addForeignKey('id_reward' , 'rewards' , 'id' , 'CASCADE' , 'CASCADE');
            $this->forge->createTable('detail_rewards');
    }

    public function down()
    {
        //
        $this->forge->dropTable('detail_rewards');
    }
}
