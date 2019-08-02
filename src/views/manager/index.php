<?php

use yii\helpers\Html;
use yii\grid\GridView;
use bupy7\pages\Module;
use bupy7\pages\models\Page;

/* @var $this yii\web\View */
/* @var $searchModel bupy7\pages\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('MODULE_NAME');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<p>
    <?= Html::a(Module::t('CREATE'), ['create'], ['class' => 'btn btn-success']); ?>
</p>

<?= GridView::widget([
    'tableOptions' => [
        'class' => 'table table-striped',
    ],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => "{update}",
        ],
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            'headerOptions' => ['style' => 'min-width:35px;width:35px;', ],
            'contentOptions' => ['align' => 'right', ],
        ],
        'title',
        'alias',
        [
            'attribute' => 'created_at',
            'format' => ['date', 'php:d.m.Y H:i'],
            'headerOptions' => ['style' => 'min-width:130px', ],
        ],
        [
            'attribute' => 'updated_at',
            'format' => ['date', 'php:d.m.Y H:i'],
            'headerOptions' => ['style' => 'min-width:130px', ],
        ],
        [
            'attribute' => 'published',
            'filter' => Page::publishedDropDownList(),
            'value' => function ($model) {
                return Yii::$app->formatter->asBoolean($model->published);
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => "{delete}",
        ],
    ],
]); ?>
