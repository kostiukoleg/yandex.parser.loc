<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180123_193318_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'category_id' => $this->integer(),
            'images' => $this->string()->defaultValue(null),
            'price' => $this->integer()->defaultValue(0),
            'brand' => $this->string()->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
