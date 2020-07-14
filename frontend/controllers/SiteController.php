<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Nav;
use frontend\models\Isotope;
use frontend\models\Main;
use frontend\models\Cube;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'pages';
        $cubeData = Cube::getDataFromCubeTable();
        $popularProducts = Isotope::getProducts();
        $isotopeFilters = Isotope::getFiltersClasses();
        $aboutShop = Main::getContentAboutShop();
        $partners = Main::getBrands();
        return $this->render('index', [
            'popularProducts' => $popularProducts,
            'isotopeFilters' => $isotopeFilters,
            'aboutShop' => $aboutShop,
            'partners' => $partners,
            'cubeData' => $cubeData,
        ]);
    }
}
