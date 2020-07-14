<?php

use yii\db\Migration;

/**
 * Class m200624_193633_page_description
 */
class m200624_193633_page_description extends Migration
{
    public function up()
    {
        $this->createPageDescription();
    }

    public function down()
    {
        $this->dropTable('page_description');
    }
    private function createPageDescription()
    {
        $this->createTable('page_description', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'status' => $this->boolean(),
        ]);

        $this->insert('page_description', [
            'description' => 'Lorem ipsum dolor sit amet. Maxime placeat, facere possimus, omnis voluptas sit. Corporis suscipit laboriosam, nisi ut enim. Itaque earum rerum hic tenetur a sapiente delectus, ut enim. Suscipit laboriosam, nisi ut aut officiis. Vitae dicta sunt, explicabo provident, similique sunt in culpa, qui in. Minima veniam, quis nostrum exercitationem. Maiores alias consequatur aut reiciendis voluptatibus. Suscipit laboriosam, nisi ut aliquid ex ea voluptate velit esse quam.',
            'category_id' => 1,
            'status' => 1,
        ]);

        $this->insert('page_description', [
            'description' =>'Дверне полотно одної конфігурації та одного бренду можуть мати різну ширину. Якщо ви додали дверне полотно в кошик, то перед оформленням замовлення перевірте в кошику відповідніcть ширини до Ваших потреб. Також ціна вказана лише за дверне полотно. Коробка, наличники та доборні полоски до відповідної моделі потрібно добавити додатково. Це можливо зробити натиснувши на кнопку "Замовити" біля зображення уподобанної вами моделі дверей у блоці "Додатково добавити".',
            'category_id' => 2,
            'status' => 1,
        ]);
    }

}
