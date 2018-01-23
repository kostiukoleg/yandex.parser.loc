<?php

use yii\db\Migration;

/**
 * Handles the creation of table `platform`.
 */
class m180123_193134_create_platform_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('platform', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'link' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('platform');
    }
}
