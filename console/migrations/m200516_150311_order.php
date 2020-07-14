<?php

use yii\db\Migration;

/**
 * Class m200516_150311_order
 */
class m200516_150311_order extends Migration
{
    public function up()
    {

        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'created_at' => $this->date(),
            'updated_at' => $this->date(),
            'qty' => $this->integer()->notNull(),
            'sum' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue(false),
        ]);
    }
    public function down()
    {
        $this->dropTable('order');
    }
}
