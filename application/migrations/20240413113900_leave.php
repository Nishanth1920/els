<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Leave extends CI_Migration
{
    public function up()
    {
        $fields = array(
            array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ),
            ),
            array(
                'staff_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ),

            ),
            array(
                'profile_picture' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'unsigned' => true,
                ),

            ),
            array(
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'unsigned' => true,
                ),

            ),
            array(
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'unsigned' => true,
                ),

            ),

            array(
                'leave_reason' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 90,
                ),
            ),
            array(
                'description' => array(
                    'type' => 'TEXT',
                    'null' => true,
                ),
            ),
            array(
                'status' => array(
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 0,
                ),
            ),
            array(
                'leave_from' => array(
                    'type' => 'DATE',
                ),
            ),
            array(
                'leave_to' => array(
                    'type' => 'DATE',
                ),
            ),
            array(
                'updated_on' => array(
                    'type' => 'DATETIME',
                ),
            ),
            array(
                'applied_on' => array(
                    'type' => 'DATETIME',
                ),
            ),
        );

        foreach ($fields as $field) {
            $this->dbforge->add_field($field);
        }

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('leave_tbl');
    }

    public function down()
    {
        $this->dbforge->drop_table('leave_tbl');
    }
}
