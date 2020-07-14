<?php

use yii\db\Migration;

/**
 * Class m200625_131032_cube
 */
class m200625_131032_cube extends Migration
{
    public function up()
    {
        $this->createCube();
    }

    public function down()
    {
        $this->dropTable('cube');
    }
    private function createCube()
    {
        $this->createTable('cube', [
            'id' => $this->primaryKey(),
            'img_path' => $this->string()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->insert('cube', [
            'img_path' => 'img/header-cub/1.jpg',
            'product_id' => 51,
        ]);

        $this->insert('cube', [
            'img_path' => 'img/header-cub/2.jpg',
            'product_id' => 53,

        ]);
        $this->insert('cube', [
            'img_path' => 'img/header-cub/3.jpg',
            'product_id' => 53,
        ]);
        $this->insert('cube', [
            'img_path' => 'img/header-cub/4.jpg',
            'product_id' => 54,

        ]);
        $this->insert('cube', [
            'img_path' => 'img/header-cub/5.jpg',
            'product_id' => 55,

        ]);
        $this->insert('cube', [
            'img_path' => 'img/header-cub/6.jpg',
            'product_id' => 56,

        ]);
    }
}
