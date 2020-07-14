<?php

use yii\db\Migration;

/**
 * Class m200218_133412_sections
 */
class m200218_133412_sections extends Migration
{
    public function up()
    {

        $this->createTable('sections', [
            'number' => $this->primaryKey()->defaultValue(1),
            'title' => $this->string(32)->notNull(),
            'dropdown' => $this->smallInteger(),
            'view' => $this->string(32)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('sections');
    }


}
