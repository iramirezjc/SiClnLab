<?php 
use yii\helpers\Html;
?>

<p> Ingresaste la siguiente información:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name)?></il>
    <li><label>Email</label>: <?= Html::encode($model->email)?></il>
</ul>