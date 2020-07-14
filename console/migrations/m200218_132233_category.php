<?php

use yii\db\Migration;

/**
 * Class m200218_132233_category
 */
class m200218_132233_category extends Migration
{
    public function up()
    {

        $this->createTable('category', [
            'id' => $this->primaryKey()->defaultValue(1),
            'section' => $this->integer()->notNull(),
            'page_number' => $this->integer()->notNull(),
            'title' => $this->string(32)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }

}
