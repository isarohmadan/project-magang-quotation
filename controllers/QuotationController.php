<?php

namespace app\controllers;
use Yii;
use app\models\table\Quotation;
use app\models\search\QuotationSearch;
use app\models\table\Service;
use app\models\table\QuotService as TableQuotService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\httpclient\Client;

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
                        'class' => AccessControl::class,
                        'only' => ['index','view','generate-pdf','create','update','delete'],
                        'rules' => [
                            [
                                'allow' => true,
                                'actions' => ['index'],
                                'roles' => ['adminAccess','userAccess'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['view'],
                                'roles' => ['adminAccess','userAccess'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['create'],
                                'roles' => ['adminAccess','userAccess'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['update'],
                                'roles' => ['adminAccess','userAccess'],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['delete'],
                                'roles' => ['adminAccess    '],
                            ],
                            [
                                'allow' => true,
                                'actions' => ['generate-pdf'],
                                'roles' => ['adminAccess','userAccess'],
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
         return $this->render('view', [
            'model' => $this->findModel($id),
            'service' => $service
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
    public function actionGenPdf($id,$token=null){
        if ($token != "1234") {
            throw new NotFoundHttpException("Page Not Found");
        }
        $this->layout = 'pdflayout';
        $result = TableQuotService::find()
        ->where(['id_quotation'=> $id])
        ->all();         
        return $this->render('view-pdf',[
            'model' => $this->findModel($id),
            'result' => $result
        ]);
        
    }
    public function actionGeneratePdf($id,$token){
        $client = new Client();
    $response_client = $client->createRequest()
    ->setMethod("POST")
    ->setFormat(Client::FORMAT_JSON)
    ->setUrl('http://api.pdf-generator.saturuangdigital.id/generate')
    ->setData([
        "url" => "http://27.54.117.163:7010/index.php?r=quotation%2Fgen-pdf&id=1&token=1234",
        "contentOptions" => [
            "contentDispotition" => "attachment"
        ]
    ])
        
    ->send();   
    $response = Yii::$app->response;
    return $response->sendContentAsFile($response_client,'view-test',["mimeType" => 'application/pdf','inline' => 'true']);
    }

    /**
     * Creates a new Quotation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Quotation();
        $modelService = [new TableQuotService];
        $table_quot = new TableQuotService();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $table_quot->id_quotation = $model->id;
                $table_quot->id_service = $_POST['QuotService']['id_service'];
                if ($table_quot->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
               
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
            'modelService' => (empty($modelService)) ? [new TableQuotService] : $modelService,
        ]);   
    }
    public function actionUpdateQuotservice($id){
        $model = TableQuotService::findOne(['id'=>$id]);
        return $this->renderAjax(['quot-service']);
    }
    public function actionGetServiceFee($val){
        $model = Service::findOne($val);
        echo Json::encode($model);
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
        $modelService = [new TableQuotService];

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' =>$id]);
                
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'id' => $id,
            'modelService' => (empty($modelService)) ? [new TableQuotService] : $modelService,
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
    public function actionDeleteQuotservice($id){
        $model = TableQuotService::findOne(['id'=>$id]);
        if ($model->delete()) {
            return $this->redirect(['index']);
        }else {
            echo "false";
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
