<?php

namespace app\controllers;
use Yii;
use app\models\ProductsForm;
use yii\web\Controller;
class Lab1Controller extends Controller
{
    public function actionIndex()
    {
        $model = new ProductsForm();
           
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            
        return $this->render('success', ['model' => $model]);
          } else {
            return $this->render('index', [
                'model' => $model
            ]);
        }
        

    }
    
}