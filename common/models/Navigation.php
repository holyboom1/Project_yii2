<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class Navigation extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%navigation}}';
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'link' => 'Ссылка на страницу',
            'lang' => 'Язык',
            'anchor' => 'Якорь',
        ];
    }

    public function rules()
    {
        return [];
    }

    public function HTMLFields()
    {
        return ['text'];
    }

    public function LangList()
    {
        return [
            'ru' => 'Русский',
            'en' => 'English',
        ];
    }

    public function MainList()
    {
        return [
            '0' => 'Главная страница',
            '1' => 'Внутренняя страница',
        ];
    }

    public function GetNavigation()
    {

        $query = ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == "/en/") ? 'link<>"/" AND link<>"/en/"' : 'link<>""';
        return Navigation::find()->where('lang="' . Yii::$app->language . '" AND ' . $query)->orderBy('order')->all();
    }

    public function changeOrder($dir)
    {
        if ($dir == "up")
            $one = $this->className()::find()->where('`order`<' . $this->order)->orderBy('`order` DESC')->one();
        else
            $one = $this->className()::find()->where('`order`>' . $this->order)->orderBy('`order`')->one();
        if (!$one)
            return false;

        $order = $one->order;
        $one->order = $this->order;
        $this->order = $order;
        $this->save(false);
        $one->save(false);

        return true;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $maxOrder = $this->className()::find()->max('`order`');
                $maxOrder++;
                $this->order = $maxOrder;
            }
            return true;
        }

        return false;
    }
}
