<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class Blocks extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%blocks}}';
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'lang' => 'Язык',
            'type' => 'Тип блока',
            'name' => 'Название',
            'text' => 'Содержание',
            'text_2' => 'Текст под названием',
            'text_3' => 'Доп текст под названием',
            'text_4' => 'Доп текст',
            'image' => 'Изображение',
            'link' => 'Ссылка',
            'button' => 'Кнопка',
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

    public function TypeList()
    {
        return [
            '0' => 'Проэкты ',
            '1' => 'О Нас',
            '2' => 'Футер',
        ];
    }
}
