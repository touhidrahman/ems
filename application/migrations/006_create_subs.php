<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Subs extends CI_Migration {

    public function up()
    {
         
        $this->dbforge->add_field(array(

            'sub_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '11',
                'primary' => TRUE,
            ),
            'sub_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'prog_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '11',
            ),
        ));

        $this->dbforge->add_key('sub_code', TRUE);
        $this->dbforge->create_table('subs');
    }

    public function down()
    {
        $this->dbforge->drop_table('subs');
    }
}
?>