<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180123_193333_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'parent_category' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
