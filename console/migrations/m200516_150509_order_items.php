<?php

use yii\db\Migration;

/**
 * Class m200516_150509_order_items
 */
class m200516_150509_order_items extends Migration
{
    public function up()
    {

        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->string(),
            'session_id' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'qty_item' => $this->integer()->notNull(),
            'sum_item' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('order_items');
    }
}
