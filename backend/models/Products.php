<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $section
 * @property string|null $category_id
 * @property string|null $title
 * @property string|null $availability
 * @property int|null $price
 * @property string|null $brand
 * @property string|null $img_way_1
 * @property string|null $img_way_2
 * @property string|null $discount
 * @property int|null $status
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'boolean'],
            [['discount'], 'string', 'max' => 10],
            [['price'], 'integer'],
            [['section', 'category_id', 'title', 'availability', 'brand', 'img_way_1', 'img_way_2' ], 'string', 'max' => 255],
            [['section', 'category_id', 'title', 'availability', 'brand', 'price' ], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'availability' => 'Availability',
            'price' => 'Price',
            'brand' => 'Brand',
            'img_way_1' => 'Img Way 1',
            'img_way_2' => 'Img Way 2',
            'discount' => 'Discount',
            'status' => 'Status',
        ];
    }
    public static function increaseCategoryPrices($category_id)
    {
        $formData = Yii::$app->request->post();
        $percent = intval($formData['percent']);
        $category_id = intval($category_id);
            if(!is_int($percent) || $percent < 1){return false;}
        $command = Yii::$app->db
        ->createCommand('UPDATE products
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
        ->createCommand('UPDATE products
                            SET price = price - price /100 * '
                            .$percent
                            .' WHERE category_id='.$category_id);
        $command->execute();
    }
    public function saveImage($fileName)
    {
        $this->img_way_1 = $fileName;

        return $this->save(false);
    }
}
