<?php

use yii\db\Migration;

/**
 * Class m200303_173932_isotope_filters
 */
class m200303_173932_isotope_filters extends Migration
{
    public function up()
    {
        $this->createIsotopeFilters();
    }

    public function down()
    {
        $this->dropTable('isotope_filters');

    }
    private function createIsotopeFilters()
    {
        $this->createTable('isotope_filters', [
            'num' => $this->primaryKey(),
            'class' => $this->string(),
            'category' => $this->string(),

        ]);
        $this->insert('isotope_filters', [
            'class' => '_is-doors',
            'category' => 'Двері',
        ]);
        $this->insert('isotope_filters', [
            'class' => '_is-windows',
            'category' => 'Вікна',
        ]);
        $this->insert('isotope_filters', [
            'class' => '_is-finding',
            'category' => 'Фурнітура',
        ]);
    }


}
