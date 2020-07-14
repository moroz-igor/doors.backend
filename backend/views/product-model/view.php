<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\ProductModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Product Model', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="<?php echo Url::to(['/products/view?id='.$model->id]); ?>"
            class="btn btn-info">Products</a>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'price',
            'discount',
            'sale',
            'title',
            'brand',
            'availability',
            'category',
            'type',
            'color',
            'img_way_1',
            'img_way_2',
            'add_doors',
            'description_1:ntext',
            'description_2:ntext',
        ],
    ]) ?>

</div>
