<?php

namespace frontend\models;

use common\models\Config;
use common\models\Feedback;
use Yii;
use yii\base\Model;

class ContactsForm extends Model
{
    public $user;
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $text;


    public function rules()
    {

        $Rules = [
            ['name', 'required', 'message' => 'Введите имя.'],
            ['email', 'required', 'message' => 'Введите e-mail.'],
            ['email', 'email', 'message' => 'Некорректный e-mail.'],
            ['text', 'required', 'message' => 'Введите текст сообщения.'],
            ['subject', 'required', 'message' => 'Введите тему сообщения.'],
        ];

        return $Rules;
    }

    public function attributeLabels(): array
    {
        $Form = [
            [
                'name' => 'Имя',
                'email' => 'E-mail',
                'phone' => 'Телефон',
                'subject' => 'Тема сообщения',
                'text' => 'Ваше сообщение',
            ],
        ];

        return $Form;
    }

    public function InitForm($user = '')
    {
        $this->user = $user;
    }

    public function Send()
    {
        $adminEmail = Config::ValueOf('adminEmail');
        $adminName = Config::ValueOf('adminName');
        Yii::$app->mailer->compose(
            [
                'html' => 'feedback/Feedback.php',
            ],
            [
                'userName' => $this->name,
                'userEmail' => $this->email,
                'subject' => $this->subject,
                'text' => $this->text,
                'phone' => $this->phone,
            ]
        )
            ->setFrom([$adminEmail => $adminName])
            ->setTo($adminEmail)
            ->setSubject('Сообщение с imba-it.ru')
            ->setTextBody($this->text)
            ->send();

        $fb = new Feedback();
        if (!isset($this->name)) {
            $fb->name = 'null';
        } else {
            $fb->name = $this->name;
        }
        if (!isset($this->email)) {
            $fb->email = 'null';
        } else {
            $fb->email = $this->email;
        }
        if (!isset($this->text)) {
            $fb->text = 'null';
        } else {
            $fb->text = $this->text;
        }
        if (!isset($this->phone)) {
            $fb->tel = 'null';
        } else {
            $fb->tel = $this->phone;
        }
        $fb->insert();

        Yii::$app->getSession()->setFlash('success', 'Сообщение отправлено');
        Yii::$app->response->redirect(['/']);
        Yii::$app->end();
    }
}
