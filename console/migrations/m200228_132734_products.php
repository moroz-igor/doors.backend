<?php

use yii\db\Migration;

/**
 * Class m200228_132734_products
 */
class m200228_132734_products extends Migration
{
    public function up()
    {
        $this->createProducts();
    }

    public function down()
    {
        $this->dropTable('products');

    }
    private function createProducts()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'section' => $this->string(),
            'category_id' => $this->string(),
            'title' => $this->string(),
            'availability' => $this->string(),
            'price' => $this->integer(),
            'brand' => $this->string(),
            'img_way_1' => $this->string(),
            'img_way_2' => $this->string(),
            'discount' => $this->string(),
            'status' => $this->smallInteger(),
        ]);

        $this->insert('products', [
            'id' => 1,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Вензель золота вільха',
            'availability' => 'В наявності',
            'price' => 1256,
            'brand' => 'Новий стиь',
            'img_way_1' => '/img/products/doors/d-00001/00001_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 2,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Рина грей ПГ Gr ПВХ DeLuxe',
            'availability' => 'В наявності',
            'price' => 1230,
            'brand' => 'Новий стиь',
            'img_way_1' => '/img/products/doors/d-00002/00002_1.jpg',
            'discount' => 'Знижка',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 3,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Грета каштан сатин ПВХ',
            'availability' => 'В наявності',
            'price' => 1230,
            'brand' => 'Terminus',
            'img_way_1' => '/img/products/doors/d-00003/00003_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 4,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Двери Аста золотая ольха',
            'availability' => 'В наявності',
            'price' => 1230,
            'brand' => 'Terminus',
            'img_way_1' => '/img/products/doors/d-00004/00004_1.jpg',
            'discount' => 'Знижка',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 5,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Сакура золотая ольха ПГ',
            'availability' => 'В наявності',
            'price' => 2000,
            'brand' => 'Terminus',
            'img_way_1' => '/img/products/doors/d-00005/00005_1.jpg',
            'discount' => 'Знижка',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 6,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Сакура золотая',
            'availability' => 'В наявності',
            'price' => 2000,
            'brand' => 'Terminus',
            'img_way_1' => '/img/products/doors/d-00006/00006_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 7,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Сакура золотая',
            'availability' => 'В наявності',
            'price' => 2000,
            'brand' => 'Terminus',
            'img_way_1' => '/img/products/doors/d-00007/00007_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 8,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Сакура золотая',
            'availability' => 'В наявності',
            'price' => 2000,
            'brand' => 'Новий стиль',
            'img_way_1' => '/img/products/doors/d-00008/00008_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 9,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Сакура золотая',
            'availability' => 'В наявності',
            'price' => 2000,
            'brand' => 'Terminus',
            'img_way_1' => '/img/products/doors/d-00009/00009_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 10,
            'section' => '2',
            'category_id' => '2',
            'title' => 'Сакура золотая',
            'availability' => 'В наявності',
            'price' => 2000,
            'brand' => 'Новий стиль',
            'img_way_1' => '/img/products/doors/d-00010/00010_1.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 11,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'В наявності',
            'price' => 1700,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,
        ]);
        $this->insert('products', [
            'id' => 12,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'В наявності',
            'price' => 200,
            'brand' => 'Veka',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 13,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'В наявності',
            'price' => 1900,
            'brand' => 'Veka',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'discount' => 'Знижка',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 14,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'В наявності',
            'price' => 1800,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'discount' => 'Знижка',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 15,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'Під замовлення',
            'price' => 1700,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 16,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'Під замовлення',
            'price' => 1700,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 17,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'Під замовлення',
            'price' => 1700,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 18,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'Під замовлення',
            'price' => 1700,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,

        ]);
        $this->insert('products', [
            'id' => 19,
            'section' => '3',
            'category_id' => '3',
            'title' => 'Gealan S 9000',
            'availability' => 'Під замовлення',
            'price' => 1700,
            'brand' => 'Вікнарьоф',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'img_way_2' => '/img/products/windows/w-01000/01000_2.jpg',
            'status' => 1,

        ]);


        for ($i=2; $i <= 4; $i++) {
            for ($j=0; $j < 10; $j++) {
                $count = $i.$j;
                $img = $parameters = $j;
                ($img < 9) ? $format = '0': $format = null;
                $img_num = $format.++$img;
                $count = intval($count);
                ++$parameters;
                $title;
                $brand;
                $color;
                $discount;
                switch($parameters)
                {
                    case 1:
                            $title = 'Вензель золота вільха';
                            $brand = 'Новий стиль';
                            $color = 'Коричневий';
                            $discount = null;
                            break;
                    case 2:
                            $title = 'Рина грей ПГ Gr ПВХ DeLuxe';
                            $brand = 'Новий стиль';
                            $color = 'Сірий';
                            $discount = 'Знижка';
                            break;
                    case 3:
                            $title = 'Грета каштан сатин ПВХ';
                            $brand = 'Terminus';
                            $color = 'Коричневий';
                            $discount = null;
                            break;
                    case 4:
                            $title = 'Двери Аста золотая ольха';
                            $brand = 'Terminus';
                            $color = 'Дерево темне';
                            $discount = 'Знижка';
                            break;
                    case 5:
                            $title = 'Сакура золотая ольха ПГ';
                            $brand = 'Terminus';
                            $color = 'Дерево темне';
                            $discount = 'Знижка';
                            break;
                    case 6:
                            $title = 'Сакура золотая';
                            $brand = 'Terminus';
                            $color = 'Сірий';
                            $discount = null;
                            break;
                    case 7:
                            $title = 'Двери Сакура темна';
                            $brand = 'Новй стиль';
                            $color = 'Дерево темне';
                            $discount = null;
                            break;
                    case 8:
                            $title = 'Двери Сакура сіра';
                            $brand = 'Новй стиль';
                            $color = 'Сірий';
                            $discount = null;
                            break;
                    case 9:
                            $title = 'Двери Сакура біла';
                            $brand = 'Новй стиль';
                            $color = 'Дерево світле';
                            $discount = null;
                            break;
                    case 10:
                            $title = 'Двери Темно-коричнева';
                            $brand = 'Новй стиль';
                            $color = 'Дерево темне';
                            $discount = null;
                            break;

                }
                        $this->insert('products', [
                            'id' => $count,
                            'section' => '2',
                            'category_id' => '2',
                            'title' => $title,
                            'availability' => 'В наявності',
                            'price' => 1230 + $count,
                            'brand' => $brand,
                            'img_way_1' => '/img/products/doors/d-000'.$img_num.'/000'.$img_num.'_1.jpg',
                            'discount' => $discount,
                            'status' => 1,
                        ]);
            }
        }
    }

}
