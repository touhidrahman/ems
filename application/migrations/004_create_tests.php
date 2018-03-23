<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Tests extends CI_Migration {
    
	public function up()
	{
	    
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'testname' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'sub_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '11',
			),
			'prog_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '11',
			),
			'total_ques' => array(
				'type' => 'INT',
				'constraint' => '4',
				'default' => '0',
			),
			'total_marks' => array(
				'type' => 'INT',
				'constraint' => '5',
			),
			'batch' => array(
				'type' => 'INT',
				'constraint' => '5',
			),
			'type' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('tests');
	}

	public function down()
	{
		$this->dbforge->drop_table('tests');
	}
}
?>