<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reactivos $model */

$this->title = 'Registrar Reactivo';
$this->params['breadcrumbs'][] = ['label' => 'Reactivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reactivos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
