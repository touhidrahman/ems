<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Answers extends CI_Migration {

    public function up()
    {
         
        $this->dbforge->add_field(array(

            'id' => array(
                'type' => 'INT',
                'constraint' => '20',
                'auto_increment' => TRUE,
                'primary' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => '11',
            ),
            'session_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'last_activity' => array(
                'type' => 'INT',
                'constraint' => '20',
            ),
            'ques_id' => array(
                'type' => 'INT',
                'constraint' => '20',
            ),
            'test_id' => array(
                'type' => 'INT',
                'constraint' => '20',
            ),
            'user_ans' => array(
                'type' => 'TINYINT',
                'constraint' => '2',
            ),
            'true_ans' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('answers');
    }

    public function down()
    {
        $this->dbforge->drop_table('answers');
    }
}
?>