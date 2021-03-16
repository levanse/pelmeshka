<?php

namespace frontend\controllers;

use common\models\Product;
use common\models\search\ProductSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
