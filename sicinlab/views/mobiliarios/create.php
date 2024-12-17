<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mobiliarios $model */

$this->title = 'Registrar Mobiliario';
$this->params['breadcrumbs'][] = ['label' => 'Mobiliario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobiliarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>