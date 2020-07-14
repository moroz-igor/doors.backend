<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_model".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $price
 * @property int|null $discount
 * @property string|null $sale
 * @property string|null $title
 * @property string|null $brand
 * @property string|null $availability
 * @property string|null $category
 * @property string|null $type
 * @property string|null $color
 * @property string|null $img_way_1
 * @property string|null $img_way_2
 * @property int|null $add_doors
 * @property string|null $description_1
 * @property string|null $description_2
 */
class ProductModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['add_doors'], 'boolean'],
            [['category_id', 'price', 'discount'], 'integer'],
            [['description_1', 'description_2'], 'string'],
            [['sale', 'title', 'brand', 'availability', 'category', 'type', 'color', 'img_way_1', 'img_way_2'], 'string', 'max' => 255],
            [['category_id', 'price', 'title', 'brand', 'color', 'category', 'type'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'discount' => 'Discount',
            'sale' => 'Sale',
            'title' => 'Title',
            'brand' => 'Brand',
            'availability' => 'Availability',
            'category' => 'Category',
            'type' => 'Type',
            'color' => 'Color',
            'img_way_1' => 'Img Way 1',
            'img_way_2' => 'Img Way 2',
            'add_doors' => 'Add Doors',
            'description_1' => 'Description 1',
            'description_2' => 'Description 2',
        ];
    }
    public static function increaseCategoryPrices($category_id)
    {
        $formData = Yii::$app->request->post();
        $percent = intval($formData['percent']);
        $category_id = intval($category_id);
            if(!is_int($percent) || $percent < 1){return false;}
        $command = Yii::$app->db
        ->createCommand('UPDATE product_model
                            SET price = price + price /100 * '
                            .$percent
                            .' WHERE category_id='.$category_id);
        $command->execute();
    }
    public static function decreaseCategoryPrices($category_id)
    {
        $formData = Yii::$app->request->post();
        $percent = intval($formData['percent']);
        $category_id = intval($category_id);
            if(!is_int($percent) || $percent < 1){return false;}
        $command = Yii::$app->db
        ->createCommand('UPDATE product_model
                            SET price = price - price /100 * '
                            .$percent
                            .' WHERE category_id='.$category_id);
        $command->execute();
    }

}
