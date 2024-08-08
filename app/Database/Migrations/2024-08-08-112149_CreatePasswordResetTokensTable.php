<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePasswordResetTokensTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'token' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->createTable('password_reset_tokens');
    }

    public function down()
    {
        $this->forge->dropTable('password_reset_tokens');
    }
}
