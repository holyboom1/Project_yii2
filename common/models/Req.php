<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class Req extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%req}}';
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'lang' => 'Язык',
            'name' => 'название блока',
            'ooo' => 'ЮР имя',
            'adru' => 'ЮР адрес',
            'adrf' => 'Факт адрес',
            'inn' => 'ИНН и пр',
            'dir' => 'Директор',
            'rs' => 'Гав Бу',
            'email' => 'email',
            'tel' => 'телефон',

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
