<?php
use Phinx\Migration\AbstractMigration;
class CreateCategoryCosts extends AbstractMigration
{
    public function up()
    {
       $this->table('centro_custos')
           ->addColumn('nome', 'string')
           ->addColumn('created_at', 'datetime')
           ->addColumn('updated_at', 'datetime')
           ->save();
    }
    public function down()
    {
        $this->dropTable('centro_custos');
    }
}