<?php

namespace app\controllers;

use app\models\Sales;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Otdel;

class SalesController extends Controller
{
    public function actionIndex()
    {

        $salesDataProvider = new ActiveDataProvider([
            'query' =>  Sales::find()->with('products'),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);
        
        return $this->render('index', [
            'salesDataProvider' => $salesDataProvider,
          ],
        );
    }
    public function actionUpdate($id)
    {
      $sales = Sales::findOne($id);
      
      $products = Products::find()->all();

      if (!empty($sales->Article)) {
        $sales->Article = $sales->products->Article;
    }


      
      if ($sales->load(\Yii::$app->request->post()))
      {
        
        $sales->save();
        return $this->redirect(['index']);
      }
      return $this->render('editsales', [
        'sales' => $sales,
        'products' => $products
    ]);
    }


    
    public function actionAdd(){
      $sales = new Sales();
      $products = Products::find()->all();
      if ($sales->load(\Yii::$app->request->post()))
      {
        $sales->save();
            return $this->redirect(['index']);
          }
          return $this->render('addsale', [
            'sales' => $sales,
            'products' => $products
        ]);
    }
    
    public function actionDelete($id){
      $sale = Sales::findOne($id);

      
      if ($sale->delete())
      {
        return $this->redirect(['index']);
      }
    }



}