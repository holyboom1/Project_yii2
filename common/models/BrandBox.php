<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class BrandBox extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%brandbox}}';
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'code' => 'SVG код картинки',
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
