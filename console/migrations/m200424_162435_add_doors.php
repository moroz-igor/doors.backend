<?php

use yii\db\Migration;

/**
 * Class m200424_162435_add_doors
 */
class m200424_162435_add_doors extends Migration
{
    public function up()
    {
        $this->createFilters();
    }

    public function down()
    {
        $this->dropTable('add_doors');

    }
    private function createFilters()
    {
        /*
        * category: 1 - doors, 2 - nall, 3 - dobor
        */
        $this->createTable('add_doors', [
            'id' => $this->primaryKey()->unique(),
            'id_product' => $this->smallInteger()->notNull(),
            'default' => $this->string(),
            'category' => $this->smallInteger()->notNull(),
            'title' => $this->string(),
            'width' => $this->smallInteger(),
            'height' =>$this->smallInteger(),
            'price' =>$this->integer(),
            'complect' =>$this->smallInteger(),
            'doorstep' =>$this->smallInteger(),
            'status' => $this->smallInteger(),

        ]);
        $this->insert('add_doors', [
            'id' => 1,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Стійка',
            'width' =>  '60',
            'height' => '2200',
            'price' => 110,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id' => 2,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка (комплект без порога)',
            'width' =>  '60',
            'height' => '2200',
            'price' => 250,
            'complect' => 1,
            'doorstep' => null,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id' => 3,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка(комплект із порогом)',
            'width' =>  '60',
            'height' => '2200',
            'price' => 320,
            'complect' => 1,
            'doorstep' => 1,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id' => 4,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Стійка',
            'width' =>  '70',
            'height' => '2200',
            'price' => 150,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id' => 5,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка(комплект без порога)',
            'width' =>  '70',
            'height' => '2200',
            'price' => 250,
            'complect' => 1,
            'doorstep' => null,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id' => 6,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка (комплект із порогом)',
            'width' =>  '70',
            'height' => '2200',
            'price' => 320,
            'complect' => 1,
            'doorstep' => 1,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id' => 7,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Стійка',
            'width' =>  '80',
            'height' => '2200',
            'price' => 180,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id' => 8,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка (комплект без порога)',
            'width' =>  '80',
            'height' => '2200',
            'price' => 250,
            'complect' => 1,
            'doorstep' => null,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id' => 9,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка (комплект із порогом)',
            'width' =>  '80',
            'height' => '2200',
            'price' => 320,
            'complect' => 1,
            'doorstep' => 1,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id' => 10,
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Стійка',
            'width' =>  '90',
            'height' => '2200',
            'price' => 200,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка (комплект без порога)',
            'width' =>  '90',
            'height' => '2200',
            'price' => 250,
            'complect' => 1,
            'doorstep' => null,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 1,
            'title' =>  'Коробка (комплект із порогом)',
            'width' =>  '90',
            'height' => '2200',
            'price' => 320,
            'complect' => 1,
            'doorstep' => 1,
            'status' => null,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 2,
            'title' =>  'Налічник',
            'width' =>  '70',
            'height' => '2200',
            'price' => 70,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 3,
            'title' =>  'Доборна планка',
            'width' =>  '80',
            'height' => '2000',
            'price' => 170,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 3,
            'title' =>  'Доборна планка',
            'width' =>  '100',
            'height' => '2000',
            'price' => 170,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 3,
            'title' =>  'Доборна планка',
            'width' =>  '150',
            'height' => '2000',
            'price' => 170,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id_product' => 1,
            'default' => 'Новий стиль',
            'category' => 3,
            'title' =>  'Доборна планка',
            'width' =>  '200',
            'height' => '2000',
            'price' => 170,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);
        $this->insert('add_doors', [
            'id_product' => 3,
            'default' => 'Terminus',
            'category' => 1,
            'title' =>  'Стійка',
            'width' =>  '200',
            'height' => '2000',
            'price' => 175,
            'complect' => null,
            'doorstep' => null,
            'status' => 1,
        ]);


    }

}
