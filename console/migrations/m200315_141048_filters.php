<?php

use yii\db\Migration;

/**
 * Class m200315_141048_filters
 */
class m200315_141048_filters extends Migration
{
    public function up()
    {
        $this->createFilters();
    }

    public function down()
    {
        $this->dropTable('filters');

    }
    private function createFilters()
    {
        $this->createTable('filters', [
            'id' => $this->primaryKey(),
            'category_id' => $this->smallInteger(),
            'filter' => $this->string(),
            'input_name' => $this->string(),
            'brand' =>$this->string(),
            'color' =>$this->string(),
            'status' => $this->smallInteger(),

        ]);
        $this->insert('filters', [
            'id' => 1,
            'category_id' => 2,
            'filter' => 'В наявності',
            'input_name' => 'first',
            'brand' => 'бренд',
            'color' => 'колір',
            'status' => 1,

        ]);
        $this->insert('filters', [
            'id' => 2,
            'category_id' => 2,
            'filter' => 'Акційні',
            'input_name' => 'second',
            'brand' => 'Terminus',
            'color' => 'Дерево темне',
        ]);
        $this->insert('filters', [
            'id' => 3,
            'category_id' => 2,
            'filter' => 'Розпродаж',
            'input_name' => 'third',
            'brand' => 'Вікнарьоф',
            'color' => 'Білий',
        ]);
        $this->insert('filters', [
            'id' => 4,
            'category_id' => 2,
            'filter' => 'Фільтр',
            'input_name' => 'filter',

            'brand' => 'Новий стиль',
            'color' => 'Сірий',
        ]);
        $this->insert('filters', [
            'id' => 5,
            'category_id' => 2,
            'color' => 'червоний',
        ]);
        $this->insert('filters', [
            'id' => 6,
            'category_id' => 2,
            'color' => 'Коричневий',
        ]);
        $this->insert('filters', [
            'id' => 7,
            'category_id' => 2,
            'color' => 'Жовтий',
        ]);
        $this->insert('filters', [
            'id' => 8,
            'category_id' => 2,
            'color' => 'Синій',
        ]);
        $this->insert('filters', [
            'id' => 9,
            'category_id' => 3,
            'filter' => 'В наявності',
            'input_name' => 'first',
            'brand' => 'бренд',
            'color' => 'колір',
            'status' => 1,
        ]);
        $this->insert('filters', [
            'id' => 10,
            'category_id' => 3,
            'filter' => 'Акційні',
            'input_name' => 'second',
            'brand' => 'Veka',
            'color' => 'Золотий дуб',
        ]);
        $this->insert('filters', [
            'id' => 11,
            'category_id' => 3,
            'filter' => 'Розпродаж',
            'input_name' => 'third',
            'brand' => 'wds',
            'color' => 'Сірий антрацит',
        ]);
        $this->insert('filters', [
            'id' => 12,
            'category_id' => 3,
            'color' => 'Сірий',
        ]);
        $this->insert('filters', [
            'id' => 13,
            'category_id' => 3,
            'color' => 'Вікнарьоф',
            'color' => 'Білий',
        ]);

    }

}
