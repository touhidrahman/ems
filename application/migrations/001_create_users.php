<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration {
    
	public function up()
	{
	    
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
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
			'roll' => array(
				'type' => 'INT',
				'constraint' => '6',
			),

			'birthdate' => array(
				'type' => 'DATE',
			),
		    
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
?>