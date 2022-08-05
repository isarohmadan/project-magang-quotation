<?php

namespace app\controllers;
use Yii;
use app\models\table\Quotation;
use app\models\search\QuotationSearch;
use app\models\table\Service;
use app\models\table\QuotService as TableQuotService;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;
use yii\filters\AccessControl;
use app\lib\GetName;

/**
 * QuotationController implements the CRUD actions for Quotation model.
 */
class QuotationController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        
        return array_merge(
            parent::behaviors(),
            [
                'access' => [ 
                    'class' => AccessControl::className(),
                    'only' => ['logout','index','create','update','delete','quot-service','gen-pdf','view'],
                    'rules' => [
                        [
                            'actions' => ['logout','index','create','update','delete','quot-service','gen-pdf','view'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Quotation models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new QuotationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quotation model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $service = TableQuotService::find()
        ->where(['id_quotation'=> $id])
        ->all();
        foreach($service as $val) {
            $service_name = Service::find()
            ->where(['id' => $val->id_service])
            ->all();
            $return[] = $service_name;
         }  
         return $this->render('view', [
            'model' => $this->findModel($id),
            'service' => $return
        ]);
    }
    public function actionQuotService($id){
        $tabel = new TableQuotService();
        $quotService = $tabel->find()
        ->where(['id_quotation' => $id , 'id_service' => NULL])
        ->orderBy('id')
        ->one();
        if($this->request->isPost){
        $req = $_POST['QuotService']['service'];
            // kalo di id quotation tidak ada nilai kosong
            if (isset($quotService)) {
                if ($quotService->load($this->request->post()) && $quotService->save()) {
                    return $this->redirect(['view', 'id' => $id]);
                }  

            }else {
                $tabel->id_quotation = $id;
                $tabel->id_service = $req;
                if ($tabel->save()) {
                    return $this->redirect(['view', 'id' => $id]);
                }
            }
            // kalo disini ada nilai kosong di id service
            
            
            }
        return $this->renderAjax('quot-service' ,[
            'model' => $tabel
        ]);
        
    }
    public function actionGenPdf($id){
        $result = TableQuotService::find()
        ->where(['id_quotation'=> $id])
        ->all();
        $pdf = new mpdf();
        $pdf->WriteHTML($this->renderPartial('view-pdf' , [
            'model' => $this->findModel($id),
            'result' => $result

        ]));
        $pdf->Output();
    }

    /**
     * Creates a new Quotation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Quotation();
        $model2 =new TableQuotService();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())&& $model->save() ) {
                $model2->id_quotation = $model->id;
                if($model2->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }else {
                    return false;
                }  
            }
        }   
        return $this->render('create', [
            'model' => $model
        ]);
    }
    

    /**
     * Updates an existing Quotation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $newId = Quotation::find()->max('id') + 1;
        if ($newId < 10) {
           $id = '00'.$newId;
        }elseif ($newId<100) {
            $id = '0'.$newId;
        }else {
            $id = $newId;
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'id' => $id
        ]);
    }

    /**
     * Deletes an existing Quotation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $find_id = TableQuotService::findOne(['id_quotation' => $id]);
       if ($this->findModel($id)->delete() && $find_id->delete() ) {
            return $this->redirect(['index']);
       }else {
            echo"false";
       }

        
    }

    /**
     * Finds the Quotation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Quotation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotation::findOne(['id' => $id])) !== null) {
            return $model;
        }
       
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
