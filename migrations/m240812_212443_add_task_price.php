<?php

use yii\db\Migration;

/**
 * Class m240812_212443_add_task_price
 */
class m240812_212443_add_task_price extends Migration
{
    public function up()
    {
        $this->addColumn('task', 'price', $this->integer(6));
    }

    public function down()
    {
        $this->dropColumn('task', 'price');
    }
}
