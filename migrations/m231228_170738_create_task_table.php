<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m231228_170738_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey()->unique(),
            'title' => $this->string(120)->notNull(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
