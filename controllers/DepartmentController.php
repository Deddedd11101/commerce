<?php

namespace app\controllers;

use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\Otdel;
use app\controllers\Yii;
use app\models\Sales;
class DepartmentController extends Controller
{
    public function actionIndex()
    {
      $departmentDataProvider = new ActiveDataProvider([
        'query' =>  Otdel::find(),
      'pagination'=> [
        'pageSize' => 20,
      ]
      ]);

  
        return $this->render('index', [
          'departmentDataProvider'=>$departmentDataProvider
        ],
      );
    }
    
    public function actionUpdate($id)
    {
      $departments = Otdel::findOne($id);
      if ($departments->load(\Yii::$app->request->post()))
      {
        $departments->save();
        return $this->redirect(['index']);
      }
      return $this->render('editdepart', [
        'departments' => $departments
      ]);
    }

    public function actionAdd(){
      $departments = new Otdel();

      if ($departments->load(\Yii::$app->request->post()))
      {
        $departments->save();
            return $this->redirect(['index']);
          }
          return $this->render('adddepart', [
            'departments' => $departments,
          ]);
    }
    
    public function actionDelete($id){
      $departmet = Otdel::findOne($id);
      if ($departmet->delete())
      {
        return $this->redirect(['index']);
      }
    }


}