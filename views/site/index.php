<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        Hello World
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'Airport',
                    'value' => function($model) {
                        return implode(', ', (array)$model->getAttributes());
                    },
                    'filter' => Html::input('text', 'airport', null, []),
                ],
            ],
        ]) ?>
    </div>
</div>