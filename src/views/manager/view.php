<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model newrow\settings\models\Settings */
?>
<div class="settings-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'section',
            'key',
            'value:ntext',
            'comment'
        ],
    ]) ?>

</div>
