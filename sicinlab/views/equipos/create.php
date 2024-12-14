<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Equipos $model */

$this->title = 'Registrar Equipos';
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
