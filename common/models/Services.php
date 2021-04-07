<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class Services extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%services}}';
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'lang' => 'Язык',
            'name' => 'Заголовок',
            'text_1' => 'Текст 1',
            'text_2' => 'Текст 2',
            'text_3' => 'Текст 3',
            'text_4' => 'Текст 4',
            'text_5' => 'Текст 5',
            'text_6' => 'Текст 6',

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
