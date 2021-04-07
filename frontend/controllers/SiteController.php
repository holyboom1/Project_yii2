<?php

namespace frontend\controllers;

use common\models\About_content;
use common\models\Blocks;
use common\models\BrandBox;
use common\models\Certificates;
use common\models\Clients;
use common\models\Equipment;
use common\models\Feedback;
use common\models\MainSlider;
use common\models\News;
use common\models\Products;
use common\models\Projects;
use common\models\Req;
use common\models\Reviews;
use common\models\Rubrics;

use common\models\Services;
use common\models\Solutions;
use frontend\models\ContactsForm;
use Yii;
use yii\base\InvalidParamException;
use yii\jui\Slider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Config;
use common\models\Drugs;
use frontend\models\OrderForm;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $user;
    public $layout = "index";

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
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





    public function actionIndex()
    {
        $blockProject = Blocks::find()->where(['type' => 0, 'lang' => Yii::$app->language])->one();
        $blockAbout = Blocks::find()->where(['type' => 1, 'lang' => Yii::$app->language])->one();
        $about_content = About_content::find()->where(['lang' => Yii::$app->language])->orderBy('id')->all();
        $mainSlider = MainSlider::find()->where(['lang' => Yii::$app->language])->orderBy('id')->all();
        $services = Services::find()->where(['lang' => Yii::$app->language])->one();
        $solutions = Solutions::find()->where(['lang' => Yii::$app->language])->orderBy('id')->all();
        $brandBox = BrandBox::find()->orderBy('order')->all();
        $req = Req::find()->where(['lang' => Yii::$app->language])->one();

        $contacts = Config::find()->all();
        $eq = Equipment::find()->where(['lang' => Yii::$app->language])->all();


        $model = new ContactsForm;
        if (isset($_POST['ContactsForm'])) {

           $model->setAttributes($_POST['ContactsForm'], false);
           $model->Send();
        }
//            $clients = Clients::find()->where(['lang' => Yii::$app->language])->orderBy('order')->all();


        return $this->render('index', [
            'mainSlider' => $mainSlider,
            'blockProject' => $blockProject,
            'blockAbout' => $blockAbout,
            'about_content' => $about_content,
            'services' => $services,
            'solutions' => $solutions,
            'brandBox' => $brandBox,
            'contacts' => $contacts,
            'req' => $req,
            'eq' => $eq,
            'model' => $model,
        ]);
    }




}
