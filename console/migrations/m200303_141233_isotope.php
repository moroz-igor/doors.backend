<?php

use yii\db\Migration;

/**
 * Class m200303_141233_isotope
 */
class m200303_141233_isotope extends Migration
{
    public function up()
    {
        $this->createIsotope();
    }

    public function down()
    {
        $this->dropTable('isotope');

    }

    private function createIsotope()
    {
        $this->createTable('isotope', [
            'id' => $this->integer(),
            'class' => $this->string(),
            'name' => $this->string(),
            'brand' => $this->string(),
            'price' => $this->string(),
            'discount' => $this->string(),
            'img_way' => $this->string(),
            'status' => $this->smallInteger(),

        ]);
        $this->insert('isotope', [
            'id' => 1,
            'name' => 'Двері',
            'class' => 'doors',
            'brand' => 'Термінус',
            'price' => 2000,
            'discount' => '-15%',
            'img_way' => 'img/isotop/doors/dv1.jpg',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 2,
            'name' => 'Двері',
            'class' => 'doors',
            'brand' => 'Термінус',
            'price' => 1000,
            'discount' => '-15%',
            'img_way' => 'img/isotop/doors/dv1.jpg',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 3,
            'name' => 'Двері',
            'class' => 'doors',
            'brand' => 'Новий стиль',
            'price' => 1500,
            'discount' => '-15%',
            'img_way' => 'img/isotop/doors/dv1.jpg',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 10,
            'name' => 'Вікно',
            'class' => 'windows',
            'brand' => 'стиль',
            'price' => 1500,
            'discount' => '-15%',
            'img_way' => 'img/isotop/windows/win-min.png',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 11,
            'name' => 'Вікно',
            'class' => 'windows',
            'brand' => 'стиль',
            'price' => 1600,
            'discount' => '-12%',
            'img_way' => 'img/isotop/windows/win-min.png',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 30,
            'name' => 'Дверна ручка',
            'class' => 'finding',
            'brand' => 'Виробник',
            'price' => 600,
            'img_way' => 'img/isotop/finding/1.png',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 31,
            'name' => 'Дверна ручка',
            'class' => 'finding',
            'brand' => 'Виробник',
            'price' => 700,
            'img_way' => 'img/isotop/finding/1.png',
            'status' => 1,
        ]);
        $this->insert('isotope', [
            'id' => 32,
            'name' => 'Дверна ручка',
            'class' => 'finding',
            'brand' => 'Виробник',
            'price' => 800,
            'img_way' => 'img/isotop/finding/1.png',
            'status' => 1,
        ]);


    }

}
