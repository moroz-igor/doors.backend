<?php

use yii\db\Migration;

/**
 * Class m200427_201503_doors_widths
 */
class m200427_201503_doors_widths extends Migration
{
    public function up()
    {
        $this->createDoors_widths();
    }

    public function down()
    {
        $this->dropTable('doors_widths');

    }
    private function createDoors_widths()
    {
        $this->createTable('doors_widths', [
            'id' => $this->primaryKey()->unique(),
            'width' => $this->smallInteger()->notNull(),
            'brand' => $this->string(),
            'status' => $this->smallInteger(),
        ]);

        $this->insert('doors_widths', [
            'width' => 60,
            'brand' => 'Новий стиль',
            'status' => 1,
         ]) ;
        $this->insert('doors_widths', [
            'width' => 70,
            'brand' => 'Новий стиль',
            'status' => 1,
         ]) ;
        $this->insert('doors_widths', [
            'width' => 80,
            'brand' => 'Новий стиль',
            'status' => 1,
         ]) ;
        $this->insert('doors_widths', [
            'width' => 90,
            'brand' => 'Новий стиль',
            'status' => 1,
         ]) ;
        $this->insert('doors_widths', [
            'width' => 70,
            'brand' => 'Terminus',
            'status' => 1,
         ]) ;
        $this->insert('doors_widths', [
            'width' => 80,
            'brand' => 'Terminus',
            'status' => 1,
         ]) ;
        $this->insert('doors_widths', [
            'width' => 90,
            'brand' => 'Terminus',
            'status' => 1,
         ]) ;
    }
}
