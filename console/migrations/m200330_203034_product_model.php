<?php

use yii\db\Migration;

/**
 * Class m200330_203034_product_model
 */
class m200330_203034_product_model extends Migration
{
    public function up()
    {
        $this->createProduct_model();
    }

    public function down()
    {
        $this->dropTable('product_model');

    }
    private function createProduct_model()
    {
        $this->createTable('product_model', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'price' => $this->integer(),
            'discount' => $this->integer(),
            'sale' => $this->string(),
            'title' => $this->string(),
            'brand' => $this->string(),
            'availability' => $this->string(),
            'category' => $this->string(),
            'type' => $this->string(),
            'color' => $this->string(),
            'img_way_1' => $this->string(),
            'img_way_2' => $this->string(),
            'add_doors' => $this->smallInteger(),
            'description_1' => $this->text(),
            'description_2' => $this->text(),
        ]);
        $this->insert('product_model', [
            'id' => 1,
            'category_id' => 2,
            'title' => 'Двері Вензель золота вільха',
            'price' => 819,
            'brand' => 'Новий стиль',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Коричневий',
            'img_way_1' => '/img/products/doors/d-00001/00001_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi. Vel illum, qui dolorem ipsum, quia voluptas assumenda. Quod maxime placeat, facere possimus, omnis dolor sit, amet consectetur. Voluptatum deleniti atque corrupti, quos dolores et iusto. Eaque ipsa, quae ab illo inventore veritatis et harum. Reprehenderit, qui dolorem eum iure reprehenderit, qui blanditiis',

        ]);

        $this->insert('product_model', [
            'id' => 2,
            'category_id' => 2,
            'price' => 1458,
            'brand' => 'Новий стиль',
            'discount' => 100,
            'title' => 'Рина грей ПГ Gr ПВХ DeLuxe',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Сірий',
            'img_way_1' => '/img/products/doors/d-00002/00002_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 3,
            'category_id' => 2,
            'price' => 1230,
            'title' => 'Грета каштан сатин ПВХ',
            'brand' => 'Terminus',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Коричневий',
            'img_way_1' => '/img/products/doors/d-00003/00003_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 4,
            'category_id' => 2,
            'price' => 1425,
            'discount' => 100,
            'title' => 'Двери Аста золотая ольха',
            'brand' => 'Terminus',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Дерево темне',
            'img_way_1' => '/img/products/doors/d-00004/00004_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 5,
            'category_id' => 2,
            'price' => 2000,
            'discount' => 100,
            'title' => 'Двери Сакура золотая ольха ПГ',
            'brand' => 'Terminus',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Дерево темне',
            'img_way_1' => '/img/products/doors/d-00005/00005_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 6,
            'category_id' => 2,
            'price' => 2010,
            'title' => 'Двери Сакура золотая',
            'brand' => 'Terminus',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Сірий',
            'img_way_1' => '/img/products/doors/d-00006/00006_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 7,
            'category_id' => 2,
            'price' => 2200,
            'title' => 'Двери Сакура темна',
            'brand' => 'Новий стиль',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Дерево темне',
            'img_way_1' => '/img/products/doors/d-00007/00007_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 8,
            'category_id' => 2,
            'price' => 1200,
            'title' => 'Двери Сакура сіра',
            'brand' => 'Новий стиль',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Сірий',
            'img_way_1' => '/img/products/doors/d-00008/00008_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 9,
            'category_id' => 2,
            'price' => 1600,
            'title' => 'Двери Сакура сіра',
            'brand' => 'Новй стиль',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Дерево світле',
            'img_way_1' => '/img/products/doors/d-00009/00009_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 10,
            'category_id' => 2,
            'price' => 1700,
            'title' => 'Двери Сакура сіра',
            'brand' => 'Новий стиль',
            'availability' => 'В наявності',
            'category' => 'Міжкімнатні',
            'type' => 'Глухі',
            'color' => 'Коричневі',
            'img_way_1' => '/img/products/doors/d-00010/00010_1.jpg',
            'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        $this->insert('product_model', [
            'id' => 11,
            'category_id' => 3,
            'price' => 1700,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'В наявності',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 12,
            'category_id' => 3,
            'price' => 200,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Veka',
            'availability' => 'В наявності',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Сірий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 13,
            'category_id' => 3,
            'price' => 1900,
            'discount' => 100,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Veka',
            'availability' => 'В наявності',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 14,
            'category_id' => 3,
            'price' => 1800,
            'discount' => 200,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'В наявності',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 15,
            'category_id' => 3,
            'price' => 1700,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'Під замовлення',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 16,
            'category_id' => 3,
            'price' => 1700,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'Під замовлення',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 17,
            'category_id' => 3,
            'price' => 1700,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'Під замовлення',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 18,
            'category_id' => 3,
            'price' => 1700,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'Під замовлення',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);
        $this->insert('product_model', [
            'id' => 19,
            'category_id' => 3,
            'price' => 1700,
            'title' => 'Вікно Gealan S 9000',
            'brand' => 'Вікнарьоф',
            'availability' => 'Під замовлення',
            'category' => '3 камери',
            'type' => 'Металопластик',
            'color' => 'Білий',
            'img_way_1' => '/img/products/windows/w-01000/01000_1.jpg',
            'description_1' => 'Металопластикове вікно високої якості',
            'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi.',

        ]);

        for ($i=2; $i <= 4; $i++) {
            for ($j=0; $j < 10; $j++) {
                $count = $i.$j;
                $img = $parameters = $j;
                ($img<9)? $format = '0': $format = null;
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
                            $discount = 100;
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
                            $discount = 200;

                            break;
                     case 5:
                            $title = 'Сакура золотая ольха ПГ';
                            $brand = 'Terminus';
                            $color = 'Дерево темне';
                            $discount = 150;
                            break;
                     case 6:
                            $title = 'Сакура золотая';
                            $brand = 'Terminus';
                            $color = 'Сірий';
                            $discount = null;
                            break;
                     case 7:
                            $title = 'Двери Сакура темна';
                            $brand = 'Новий стиль';
                            $color = 'Дерево темне';
                            $discount = null;
                            break;
                     case 8:
                            $title = 'Двери Сакура сіра';
                            $brand = 'Новий стиль';
                            $color = 'Сірий';
                            $discount = null;
                            break;
                     case 9:
                            $title = 'Двери Сакура біла';
                            $brand = 'Новий стиль';
                            $color = 'Дерево світле';
                            $discount = null;
                            break;
                     case 10:
                            $title = 'Двери Темно-коричнева';
                            $brand = 'Новий стиль';
                            $color = 'Дерево темне';
                            $discount = null;
                            break;

                 }


                $this->insert('product_model', [
                    'id' => $count,
                    'category_id' => 2,
                    'price' => 819 + $count,
                    'discount' => $discount,
                    'title' => $title,
                    'brand' => $brand,
                    'availability' => 'В наявності',
                    'category' => 'Міжкімнатні',
                    'type' => 'Глухі',
                    'color' => $color,
                    'img_way_1' => '/img/products/doors/d-000'.$img_num.'/000'.$img_num.'_1.jpg',
                    'description_1' => 'Дерево + МДФ, висота дверного полотна 2000мм.',
                    'description_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut labore. Veritatis et quas molestias excepturi. Vel illum, qui dolorem ipsum, quia voluptas assumenda. Quod maxime placeat, facere possimus, omnis dolor sit, amet consectetur. Voluptatum deleniti atque corrupti, quos dolores et iusto. Eaque ipsa, quae ab illo inventore veritatis et harum. Reprehenderit, qui dolorem eum iure reprehenderit, qui blanditiis',

                ]);
            }
        }

    }
}
