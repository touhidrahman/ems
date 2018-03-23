<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Questions extends CI_Migration {

    public function up()
    {
         
        $this->dbforge->add_field(array(

            'id' => array(
                'type' => 'INT',
                'constraint' => '20',
                'auto_increment' => TRUE,
                'primary' => TRUE,
            ),
            'test_id' => array(
                'type' => 'INT',
                'constraint' => '20',
            ),
            'ques_title' => array(
                'type' => 'TEXT',
            ),
            'ans1' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'ans2' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'ans3' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'ans4' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'true_ans' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('questions');
    }

    public function down()
    {
        $this->dbforge->drop_table('questions');
    }
}
?>