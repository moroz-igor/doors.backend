<?php

use yii\db\Migration;

/**
 * Class m200218_133412_logo
 */
class m200224_135851_logo extends Migration
{
    public function up()
    {

        $this->createTable('logo', [
            'main' => $this->string(32)->notNull(),
            'title_1' => $this->string(32)->notNull(),
            'title_2' => $this->string(32)->notNull(),
            'title_3' => $this->string(32)->notNull(),
            'title_4' => $this->string(32)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('logo');
    }


}
