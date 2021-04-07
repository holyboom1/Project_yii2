<?php
namespace backend\controllers;
  
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use common\models\User;
use common\models\Query;
use common\models\Config;
use yii\helpers\Json;
use common\models\CSV;
use common\helpers\CurrentURL;
use yii\helpers\ArrayHelper;
use admin\models\MailsForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $user;

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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
     public function actionIndex()
     {
/*
	$user=User::findOne(2);
	$user->setPassword("34EE77");
	$user->save();
*/
         Yii::$app->response->redirect(['/config']);
         return $this->render('index');
     }


     public function actionAdmins()
     {
         return $this->render('admins');
     }

     public function actionCustomers()
     {
         return $this->render('customers');
     }

     public function actionUsers()
     {
         return $this->render('users');
     }


     public function actionConfig()
     {
	if(isset($_GET['phpinfo'])){
	        echo phpinfo();
		exit;
		}
         return $this->render('config');
     }

     public function actionConfigSendemail()
     {
        $adminEmail=Config::ValueOf("adminEmail");
        $adminName=Config::ValueOf("adminName");
		Yii::$app->mailer->compose()
                    ->setTextBody('Test mail text')
                    ->setFrom([$adminEmail => $adminName])
		            ->setTo($adminEmail)
		            ->setSubject('Test mail')
		       	    ->send();
        \Yii::$app->getSession()->setFlash('success', 'Mail was sent.');
        CurrentURL::GoBack();
        Yii::$app->end();

     }


     public function actionAdminmenu()
     {
         return $this->render('adminmenu');
     }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

     public function actionMails()
     {
         $model = new MailsForm();
         $model->InitForm();
         if(isset($_POST['MailsForm'])){
                $model->setAttributes($_POST['MailsForm'],false);
                $model->Go();
             }
         
         return $this->render('mails', [
             'model' => $model,
             'user' => $this->user,
             ]);
     }

    public function beforeAction($action)
    {
        if(isset(Yii::$app->user->id)){
		$this->user=User::find()->where('id='.Yii::$app->user->id." and type=0")->one();
		if(!isset($this->user))
			exit;
		}
	elseif($action->id!="login")
		return $this->redirect(['/login']);

   	$this->enableCsrfValidation = false;
	return parent :: beforeAction($action);
    }

    public function actionNavigation()
    {
        return $this->render('navigation', [
            'user' => $this->user,
        ]);
    }
    public function actionBlocks()
    {
        return $this->render('blocks', [
            'user' => $this->user,
        ]);
    }
    public function actionAbout_content()
    {
        return $this->render('about_content', [
            'user' => $this->user,
        ]);
    }
    public function actionMain_slider()
    {
        return $this->render('main_slider', [
            'user' => $this->user,
        ]);
    }
    public function actionServices()
    {
        return $this->render('services', [
            'user' => $this->user,
        ]);
    }
    public function actionSolutions()
    {
        return $this->render('solutions', [
            'user' => $this->user,
        ]);
    }
    public function actionBrand_box()
    {
        return $this->render('brand_box', [
            'user' => $this->user,
        ]);
    }
    public function actionReq()
    {
        return $this->render('req', [
            'user' => $this->user,
        ]);
    }
    public function actionEquipment()
    {
        return $this->render('equipment', [
            'user' => $this->user,
        ]);
    }
    public function actionFeedback()
    {
        return $this->render('feedback', [
            'user' => $this->user,
        ]);
    }
}