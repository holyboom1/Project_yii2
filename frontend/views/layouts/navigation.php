<?php

use common\models\Navigation;

$navigation = Navigation::GetNavigation();

for ($i = 0; $i < count($navigation); $i++)
    echo '<a class="nav__link js-menu-link" href="/'.((yii::$app->language=="ru")? "": "en"). '/' . $navigation[$i]->link . $navigation[$i]->anchor . '">' . $navigation[$i]->name . '</a>';
