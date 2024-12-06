<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Equipos</h1>
<ul>
    <?php foreach($equipos as $equipo): ?>
    <li>
        <?= Html::encode("{$equipo->Nombre} ({$equipo->Cantidad})") ?>
        <?= $equipo->Descripcion ?>
    </li>
    <?php endforeach; ?>
</ul>

