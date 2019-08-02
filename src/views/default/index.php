<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model bupy7\pages\models\Page */

if (empty($model->title_browser)) {
    $this->title = $model->title;
} else {
    $this->title = $model->title_browser;
}
if (!empty($model->meta_description)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_description), 'name' => 'description']);
}
if (!empty($model->meta_keywords)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_keywords), 'name' => 'keywords']);
}
?>

<div class="clearfix"></div>

<main class="container">
    <div class="dzyga-main" role="main">
        <section class="reviews-wrapper">
            <?php
            if ($model->display_title) { ?>
                <h5 class="title-wrapper"><?= Html::encode($model->title); ?></h5>
            <?php
            } ?>

            <?= $model->content; ?>
        </section>
    </div>
</main>
