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
            'link_chk' => $this->integer()->defaultValue(0),
            'parse_link' => $this->string(),
            'description' => $this->text()->defaultValue(null),
            'xpath_product_link' => $this->string(),
            'xpath_title' => $this->string(),
            'xpath_price' => $this->string(),
            'xpath_img' => $this->string(),
            'xpath_main_img' => $this->string(),
            'xpath_description' => $this->string(),
            'product_category' => $this->string(),
            'product_url_category' => $this->string(),

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
