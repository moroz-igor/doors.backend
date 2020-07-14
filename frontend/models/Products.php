<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\models\filters\Selection;
use frontend\models\filters\Filters;
use yii\data\Pagination;
/**
 *
 */
class Products extends ActiveRecord
{
    public static function getSection($id)
    {
        $sql = "SELECT section FROM category WHERE id=".$id;
            $section = Yii::$app->db->createCommand($sql)->queryOne();
                $result = $section['section'];
        return $result;
    }
    public static function getProducts($category_id)
    {
        $section = self::getSection($category_id);
        $query = self::find()->where(['section' => $section])
                                ->andWhere(['category_id' => $category_id])
                                ->andWhere(['status' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),
                                 'pageSize' => PAGINATION_AMOUNT,
                                 'forcePageParam' => false,
                                 'pageSizeParam' => false,
                                ]);
        $products = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();

        return ([
            'products' => $products,
                'pages' => $pages,
        ]);
    }
}
