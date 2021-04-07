<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class Equipment extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%equipment}}';
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'lang' => 'Язык',
            'name' => 'Элемент Списка',
            'main_name' => 'Основное имя',
            'text_1' => 'Под элемент списка',
            'text_2' => 'Под элемент списка',
            'text_3' => 'Под элемент списка',
            'text_4' => 'Под элемент списка',
            'text_5' => 'Под элемент списка',


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
            'ru' => 'Рус',
            'en' => 'Eng',
        ];
    }

}
