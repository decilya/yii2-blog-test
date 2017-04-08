<?php

use yii\db\Migration;

class m170408_151725_fix_category extends Migration
{
    public function up()
    {
    	$this->addColumn('category', 'created_at', $this->integer(11));
    	$this->renameColumn('category', 'title', 'name');
    }

    public function down()
    {
    	$this->dropColumn('category', 'created_at');
    	$this->renameColumn('category', 'name', 'title');
    }

}
