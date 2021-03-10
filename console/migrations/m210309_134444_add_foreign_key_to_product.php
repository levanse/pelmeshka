<?php

use yii\db\Migration;

/**
 * Class m210309_134444_add_foreign_key_to_product
 */
class m210309_134444_add_foreign_key_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-product-category_id',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE',
            'RESTRICT',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-category_id', '{{%product}}');

    }
}
