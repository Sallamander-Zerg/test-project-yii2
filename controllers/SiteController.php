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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
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
        $model = new \app\models\User();

        if(isset($_POST['User']))
        {
            if($model->addNewUser(Yii::$app->request->post('User'))){
                // return $model->addNewUser(Yii::$app->request->post('User'));
                return $this->redirect(['login']);
            }else{
                return $this->render('index',['model'=>$model]);
            }
        }


        return $this->render('index',['model'=>$model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new \app\models\User();

        if(isset($_POST['User']))
        {
            if($model->Login(Yii::$app->request->post('User')['name'])){
                return $this->render('contact',['userData' =>$model->Login(Yii::$app->request->post('User')['name']),'allUser'=>$model->getAllUser(Yii::$app->request->post('User')['name'])]);
            }else{
                return $this->render('login',['model'=>$model]);
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
