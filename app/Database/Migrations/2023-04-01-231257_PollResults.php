<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class PollResults extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
            ],
            'poll_id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'delete_at' => [
                'type' => 'TIMESTAMP',
                'default' => null,
                'nullable' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('poll_id', 'polls', 'id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('poll_results');    }

    public function down()
    {
        $this->forge->dropTable('poll_results');
    }
}
