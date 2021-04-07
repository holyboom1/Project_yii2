<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class About_content extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%about_content}}';
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'lang' => 'Язык',
            'text' => 'Содержание',
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
