<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class MainSlider extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%slider}}';
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'lang' => 'Язык',
            'name' => 'Заголовок',
            'text' => 'Текст 1',
            'text_2' => 'Текст 2',
            'text_3' => 'Текст 3',
            'image' => 'Картинка 1',
            'image_2' => 'Картинка 2',

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
