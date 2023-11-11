<?

namespace app\controllers;

use app\models\QuarterForm;
use app\models\CurrentForm;
use app\models\ScopeForm;
use yii\base\Controller;
use yii\db\Query;
use yii\widgets\ActiveForm;
use Yii;

class QueryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
  
    public function actionMinSum()
{
    
    $model = new ScopeForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $minscope = $model->scope;
        $symbol = $model->symbol;
    $query = new Query;
    $result = $query->select(['Otdel.Name AS Otdel', 'SUM(products.Price * sales.count) AS Scope'])
                   ->from('Otdel')
                   ->innerJoin('products', 'Otdel.id = products.otdel')
                   ->innerJoin('sales', 'products.Article = sales.Article')
                   ->groupBy('Otdel.Name')
                   ->having([$symbol, 'SUM(products.Price * sales.count)', $minscope])
                   ->all();

    
    }else {
        return $this->render('minSum', ['model' => $model]);
    }
    return $this->render('minSum',  ['result' => $result, 'model' => $model]);
}
public function actionLowestSalesDepartment()
{
    $query = new Query;
    $result = $query->select(['Otdel.Name AS Otdel', 'SUM(products.Price * sales.count) AS Scope'])
        ->from('Otdel')
        ->innerJoin('products', 'Otdel.id = products.otdel')
        ->innerJoin('sales', 'products.Article = sales.Article')
        ->groupBy('Otdel.Name')
        ->orderBy(['Scope' => SORT_ASC])
        ->limit(1)
        ->one();

    return $this->render('lowestSalesDepartment', ['result' => $result]);
}

public function actionLowSalesFirstQuarter()
{
    $model = new QuarterForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
       
        $quarter = $model->quarter;
    
        $minCount = $model->minCount;
       
        $query = new Query;
        $result = $query->select(['Otdel.Name AS Otdel', 'COUNT(*) AS Count'])
            ->from('Otdel')
            ->innerJoin('products', 'Otdel.id = products.otdel')
            ->innerJoin('sales', 'products.Article = sales.Article')
            ->where([
                'and',
                ['=', 'QUARTER(sales.Date)', $quarter], 
                ['=', 'YEAR(sales.Date)', date('Y')], 
            ])
            ->groupBy('Otdel.Name')
            ->having(['<=', 'COUNT(*)', $minCount])
            ->all();
           
    } else {
        return $this->render('lowSalesFirstQuarter', ['model' => $model]);
    }
    
    return $this->render('lowSalesFirstQuarter', ['result' => $result, 'model' => $model]);
}


public function actionCurrentMonthSales()
{
    $model = new CurrentForm();
   
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    
        $month = $model->month;
    
        $query = new Query;
    $result = $query->select(['products.Name AS ProductName', 'sales.Date AS SaleDate'])
        ->from('sales')
        ->innerJoin('products', 'sales.Article = products.Article')
        ->where([
            'and',
            ['=', 'MONTH(sales.Date)', $month],
            ['=', 'YEAR(sales.Date)', date('Y')],
        ])
        ->all();
    }
    else{
        return $this->render('currentMonthSales', ['model' => $model]);
    }
    return $this->render('currentMonthSales', ['result' => $result, 'model'=>$model]);
}

public function actionSeptemberSalesCount()
{
    $query = new Query;
    $result = $query->select(['products.Name AS ProductName', 'sales.Date AS SaleDate', 'COUNT(*) AS TotalSales'])
        ->from('sales')
        ->innerJoin('products', 'sales.Article = products.Article')
        ->where(['=', 'MONTH(sales.Date)', date('n')])
        ->groupBy(['products.Name', 'sales.Date']);
    
    $command = $query->createCommand();
    $results = $command->queryAll();

    return $this->render('septemberSalesCount', ['results' => $results]);
}

}
