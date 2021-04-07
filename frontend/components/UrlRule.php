<?php

namespace frontend\components;

use Yii;
use yii\web\UrlRuleInterface;
use common\models\News;
use common\models\Meta;
use common\models\Pages;
use common\models\Config;


class UrlRule implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {

        $lang = [
            'en' => 'en',
            'ru' => '',
        ];

        // NEWS
        if (($route == "site/news") && isset($params['id'])) {
            $page = News::findOne($params['id']);
            if ($page)
                return $lang[Yii::$app->language] . "/news/" . $page->url;
        }

        //PAGES
        if (($route == "site/page") && isset($params['id'])) {
            $page = Pages::findOne($params['id']);
            if ($page)
                return $lang[Yii::$app->language] . $page->url;
        }


        return false;
    }

    public function parseRequest($manager, $request)
    {
        $url = $request->pathInfo;
        $path = $request->url;

        $Title = "";
        $Description = "";
        $Url = "";

        if (preg_match("/\/en\//", $path)) {
            Yii::$app->language = 'en';
            //убирает /en из url
            $path = preg_replace("/\/en/", "", $path);
        } else {
            Yii::$app->language = 'ru';
        }
        //INDEX
        if ($path == '/') {
            $Url = ['/site/index', []];
        }


        if ($path == '/') {
            $url = $path;
//            $metaData = Meta::find()->where(['url' => $url, 'lang' => Yii::$app->language])->one();
//            if ($metaData) {
//                $Title = $metaData->title;
//                $Description = $metaData->description;
//            }
        }


        if ($Title)
            Yii::$app->view->title = $Title;
        if ($Description)
            Yii::$app->view->registerMetaTag([
                'name' => 'description',
                'content' => $Description,
            ]);
        if ($Url)
            return $Url;

        return false;
    }
}
