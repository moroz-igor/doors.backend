<?php
namespace frontend\models;
use Yii;
/**
 *
 */
class Main
{
    public static function getContentAboutShop()
    {
        $sql = "SELECT * FROM about_shop";
            $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result ;
    }
    public static function aboutContentPrint($section, $link)
    {
        $content =  Main::getContentAboutShop();
        if($link == 1)
            echo '<a href="/frontend/web/products/'.$link.'"><h2>'.$content[$section]['subtitle'].'</h2></a>';
        else
            echo '<a href="/frontend/web/sqproducts/'.$link.'"><h2>'.$content[$section]['subtitle'].'</h2></a>';
        for ($rubric=1; $rubric <= 3 ; $rubric++)
        {
            if($content[$section]['paragraph_'.$rubric])
            {
                echo '<p>'.$content[$section]['paragraph_'.$rubric].'</p>';
            }
        }
    }
    public static function BrandDescriptionPrint()
    {
        $sql = "SELECT title, description FROM partners WHERE id=1";
            $brandContent = Yii::$app->db->createCommand($sql)->queryAll();
            echo '<h2>'.$brandContent[0]['title'].'</h2>';
            echo '<p>'.$brandContent[0]['description'].'</p>';
    }
    public static function getBrands()
    {
        $sql = "SELECT id, brand_img FROM partners WHERE status=1";
            $brands = Yii::$app->db->createCommand($sql)->queryAll();
        return $brands;
    }

}
