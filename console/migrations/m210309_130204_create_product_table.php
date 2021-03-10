<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210309_130204_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(256),
            'content' => $this->text(),
            'price' => $this->float(),
            'mass' => $this->integer(),
            'percent' => $this->integer(),
            'meat' => $this->string(256),
            'img' => $this->string(256),
            'keywords' => $this->string(256),
            'description' => $this->string(256),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
