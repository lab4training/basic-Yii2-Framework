<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

//Il controller utilizza il model (la classe Country)

class CountryController extends Controller{


     public function actionIndex(){

       //eseguiamo una query
      $query = Country::find(); //la Select

      //$query è un recordset -- PDOStatement

      //la paginazione
      $pagination = new Pagination([
           'defaultPageSize' => 5,//record per pagina
           'totalCount' => $query->count(), //conteggio record
       ]);

       //ordinamento e Limit

       $countries = $query->orderBy('name')
           ->offset($pagination->offset)
           ->limit($pagination->limit)
           //offset e Limit sono equivalenti all'istruzione SQL
           // Limit (n,m)

           //select * from country Limit(0,10)
           //select * from country Limit(11,10)

           /* ->all() fa il fetch dei dati (fetchAll(PDO::FETCH_OBJECT))traduce l'oggetto $query in una
           matrice di array associativi*/

           ->all();

           return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
          ]);



     }

     public function actionCreate(){

         $model = new Country();
         if ($model->load(Yii::$app->request->post())
            && $model->validate())

          {
            //print_r($model); die();
            $model->save();

            return $this->redirect(['view', 'code' => $model->code]);
       }
          else{
            return $this->render('create', [
                 'model' => $model,
                ]);
          }

     }


     public function actionUpdate($code){

        $model = $this->findModel($code);

        if ($model->load(Yii::$app->request->post())
            && $model->validate())

          {
            //print_r($model); die();
            $model->save();

            return $this->redirect(['view', 'code' => $model->code]);
       }
          else{
            return $this->render('update', [
                 'model' => $model,
                ]);
          }

     }




     public function actionView($code){

       if(isset($code) && is_string($code)){
         $code=addslashes($code);
         $model = $this->findModel($code);
         //mi ricavo il model relativo al record con il code $code

         //Country::find()->where(['code' => $code])->one();
         //la Select
         return $this->render('view',['model' => $model]);

     } else{
         return $this->redirect('index.php?r=country');
      }

     }


     public function actionDelete($code){
       //ci ricaviamo il model
       $arrQuery = $this->findModel($code);

       //cancello il model, quindi il record
       $arrQuery->delete();
       return $this->redirect('index.php?r=country/index');

     }

     public function findModel($code){

       $arrQuery = Country::find()->where(['code' => $code])->one();

       //print_r($arrQuery);die();
       return $arrQuery;


     }

}
