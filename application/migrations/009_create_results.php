<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Results extends CI_Migration {

    public function up()
    {
         
        $this->dbforge->add_field(array(

            'test_id' => array(
                'type' => 'INT',
                'constraint' => '20',
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '11',
            ),
            'session_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'marks' => array(
                'type' => 'FLOAT',
                'constraint' => '4,2',
            ),
        ));

        $this->dbforge->create_table('results');
    }

    public function down()
    {
        $this->dbforge->drop_table('results');
    }
}
?>