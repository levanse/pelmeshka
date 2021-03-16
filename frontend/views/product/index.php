<?php
/**
 * @var ActiveDataProvider $dataProvider
 */

use yii\data\ActiveDataProvider;

?>

<div class="body-content">
    <div class="row">
        <div class="col-lg-3">
            <?= $this->render('filter', [
                'dataProvider' => $dataProvider,
            ]);
            ?>
        </div>
        <div class="col-lg-9">
            <?php foreach ($dataProvider->models as $model): ?>
                <div class="col-lg-4" style="height: 300px;">

                    <img src="<?= $model['img'] ?>" style="width: 100%; height: 200px; object-fit: contain;">

                    <a href="#" class="card-text"><?= $model['name'] ?></a>

                    <span><?= $model['price'] ?> грн.</span>
                    <span class="btn btn-default">Добавить в корзину</span>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
