<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="<?php echo Url::to(['/order-items/'.$model->id]); ?>" class="btn btn-info">Детально</a>
        <?= Html::a('В обробку', ['process-add', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Завершити', ['closed-add', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Оновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            'name',
            'email:email',
            'phone',
            'address',
            'status',
            'process',
            'closed',
        ],
    ]) ?>

</div>
