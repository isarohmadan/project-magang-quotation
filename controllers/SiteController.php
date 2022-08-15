<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    throw new \Exception('You are not allowed to access this page');
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main_login';
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity['auth_key'] == 'DhP5fgj8tnK7CDBP5B-V_EE5o3FMMROPL3ECAgmg4vYxSzegWVuBEemi8eRs0vhTel4nSXIs8Dzqx9ETQC7rllnBtywpA4toCrnChbn1pEeKMQvkVRP5FUCfDwHRmqSx') {
                return $this->redirect(array('/service/index'));
            }
            if (Yii::$app->user->identity['auth_key'] == 'wKaRrspiw5dxgIauFu0NOjWRFb24Nh51olMf9PiHYhPiCmNPyXAa8WxheIXAQ13ILqFduvpi5RVx0YcUjMx1BrZwT5pFtW0iKyRFFpNeoN3wjZQE_8cGKo8iq0W7aK1l') {
                return $this->redirect(array('/quotation/index'));
            }
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity['auth_key'] == 'DhP5fgj8tnK7CDBP5B-V_EE5o3FMMROPL3ECAgmg4vYxSzegWVuBEemi8eRs0vhTel4nSXIs8Dzqx9ETQC7rllnBtywpA4toCrnChbn1pEeKMQvkVRP5FUCfDwHRmqSx') {
                return $this->redirect(array('/service/index'));
            }
            if (Yii::$app->user->identity['auth_key'] == 'wKaRrspiw5dxgIauFu0NOjWRFb24Nh51olMf9PiHYhPiCmNPyXAa8WxheIXAQ13ILqFduvpi5RVx0YcUjMx1BrZwT5pFtW0iKyRFFpNeoN3wjZQE_8cGKo8iq0W7aK1l') {
                return $this->redirect(array('/quotation/index'));
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
