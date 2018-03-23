<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Progs extends CI_Migration {
    
	public function up()
	{
	    
		$this->dbforge->add_field(array(

			'prog_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '11',
			    'primary' => TRUE,
			),
			'prog_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			),
		));

		$this->dbforge->add_key('prog_code', TRUE);
		$this->dbforge->create_table('progs');
	}

	public function down()
	{
		$this->dbforge->drop_table('progs');
	}
}
?>