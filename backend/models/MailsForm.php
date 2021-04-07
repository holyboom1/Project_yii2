<?php
namespace admin\models;

use Yii;
use yii\base\Model;
use yii\helpers\Json;
use common\models\Config;

class MailsForm extends Model
{
    public $template;
    public $layout;
    public $email;

    public $vars;
    public $models;
    public $values;

    public $List;

    public function rules()
    {
	return [];
    }

    public function attributeLabels(): array
    {
        return [
            ];
    }


    public function InitForm()
    {
    $this->models=$this->values=$this->vars=[];
    $this->getLayouts();
    $this->getTemplates();
    $this->getModels();
	$this->template='';
    }

    public function Go()
    {
        if($this->email)
            $this->Send();
        else 
            $this->Show();   
    }

    public function Show()
    {
        $params=$this->getParams();
    	$content=Yii::$app->controller->renderPartial('../../../common/mail/'.$this->template, $params);
    	$layout=Yii::$app->controller->renderPartial('../../../common/mail/layouts/'.$this->layout, ['content'=>$content]);
        echo $layout;
        exit;
    }
    
    public function Send()
    {
    	$adminEmail=Config::ValueOf('adminEmail');
	    $adminName=Config::ValueOf('adminName');
        $params=$this->getParams();

        $mailer = Yii::$app->getMailer();
        $mailer->htmlLayout = 'layouts/'.preg_replace("/\.php$/","",$this->layout);
        $mailer->compose([
	            'html' => $this->template,
	        ],
    		$params
    		)
	       	    ->setFrom([$adminEmail => $adminName])
	            ->setTo($this->email)
	            ->setSubject('Test mail')
	       	    ->send();

        \Yii::$app->getSession()->setFlash('success', 'Mail was sent to '.$this->email);
    }

    public function getLayouts()
    {
        $this->List['layouts']=[];
        $path=$_SERVER['DOCUMENT_ROOT'].'/../../common/mail/layouts';
        $files = scandir($path);
        for($i=0;$i<count($files);$i++){
            if(!preg_match("/\.php$/",$files[$i]))
                continue;
            $key=$files[$i];
            $value=preg_replace("/\.php$/","",$files[$i]);
            $this->List['layouts'][$key]=$value;
            }
    }

    public function getTemplates()
    {
        $this->List['templates']=[];
        $path=$_SERVER['DOCUMENT_ROOT'].'/../../common/mail';
        $files = scandir($path);
        for($i=0;$i<count($files);$i++){
            if(!preg_match("/\.php$/",$files[$i]) && !preg_match("/\.tpl$/",$files[$i]))
                continue;
            $key=$files[$i];
            $value=preg_replace("/\.[^\.]+$/","",$key);
            $this->List['templates'][$key]=$value;
            }
    }
    
    public function getModels()
    {
        $this->List['models']=[''=>'='];
        $path=$_SERVER['DOCUMENT_ROOT'].'/../../common/models';
        $files = scandir($path);
        for($i=0;$i<count($files);$i++){
            if(!preg_match("/\.php$/",$files[$i]))
                continue;
            if(in_array($files[$i],['Query.php','AdminMenu.php']))
                continue;
            $value=preg_replace("/\.[^\.]+$/","",$files[$i]);
            $this->List['models'][$value]=$value;
            }
    }
 
    public function getParams()
    {
        $params=[];
        for($i=0;$i<count($this->vars);$i++)
        if(trim($this->vars[$i])){
            $varName=trim($this->vars[$i]);
            $varValue=$this->values[$i];
            if($this->models[$i] && $varValue){
                $className='common\\models\\'.$this->models[$i];
                $varValue=$className::findOne($varValue);
                }
            $params[$varName]=$varValue;
            }
        return $params;
    }
}