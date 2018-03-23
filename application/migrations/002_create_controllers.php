<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Controllers extends CI_Migration {
    
	public function up()
	{
	    
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			),
			
			'contact' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'batch' => array(
				'type' => 'INT',
				'constraint' => '5',
			),
			'prog_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'sub_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
		    
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('controllers');
	}

	public function down()
	{
		$this->dbforge->drop_table('controllers');
	}
}
?>