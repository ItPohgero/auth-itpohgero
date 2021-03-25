<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auth extends Migration
{
    public function up()
    {

        // Uncomment below if want config
        $this->forge->addField([
            'id'                  => [
                'type'           => 'BIGINT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'pin'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'name'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'email'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'password'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'phone'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('auth');
    }

    public function down()
    {
        $this->forge->dropTable('auth');
    }
}
