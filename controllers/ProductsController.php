<?php

namespace app\controllers;
use app\controllers\Yii;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Otdel;
use app\models\ChangeLog;

use app\models\Sales;
class ProductsController extends Controller
{
    public function actionIndex()
    {
      $productsDataProvider = new ActiveDataProvider([
      'query' => Products::find()->with('otdel'),
      'pagination'=> [
        'pageSize' => 20,
      ]
      ]);
  
        return $this->render('index', [
          'productsDataProvider'=>$productsDataProvider,
        ],
      );
    }
    
public function actionUpdate($id)
{
  $products = Products::findOne($id);
  $departments = Otdel::find()->all();
  if ($products->load(\Yii::$app->request->post()))
      { $oldValues = [
            'Name' => $products->getOldAttribute('Name'),
            'Unit' => $products->getOldAttribute('Unit'),
            'Price' => $products->getOldAttribute('Price'),
            'Otdel' => $products->getOldAttribute('Otdel'),
        ];
        if ($products->save()) {
          // После успешного сохранения записи, теперь можем логировать изменения
          $log = new ChangeLog();
          $log->date = date('H:i d-m-Y'); // текущее время и дата
          $log->category = 'Update';
          $log->old_value = implode('/', $oldValues); // Преобразуем старые значения в строку
          $log->new_value = implode('/', [
              $products->Name,
              $products->Unit,
              $products->Price
          ]);
          if ($log->save()) {
            \Yii::info('ChangeLog saved: ' . json_encode($log->attributes), 'changelog');
            return $this->redirect(['index']);
        } else {
            \Yii::error('Error saving ChangeLog: ' . json_encode($log->errors), 'changelog');
        }
          
        
        \Yii::info('Product updated: ' . json_encode($log->attributes), 'product');
          
          return $this->redirect(['index']);
      }
  }
  return $this->render('editprod', [
    'products' => $products,
    'departments' => $departments
  ]);
}

public function actionAdd(){
  $products = new Products();
  $departments = Otdel::find()->all();
  if ($products->load(\Yii::$app->request->post()))
  {
    $products->save();
        return $this->redirect(['index']);
      }
      return $this->render('addprod', [
        'products' => $products,
        'departments' => $departments
      ]);
}

public function actionDelete($id){
  $products = Products::findOne($id);
  if ($products->delete())
  {
    return $this->redirect(['index']);
  }
}
}