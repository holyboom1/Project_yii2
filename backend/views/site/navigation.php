<?php

use common\widgets\tables\CrudTable;
use common\models\Navigation;


$this->title = 'Навигация';

?>

                <div class="header__box">
                    <div class="header__item">
                        <nav class="header__nav nav">
                            <?php
                            echo CrudTable::widget([
                                'ListURL' => '/navigation',
                                'className' => 'common\models\Navigation',
                                'Coloumns' => [
                                    ['id', '{id}'],
                                    ['lang', '{lang}'],
                                    ['name', '{name}'],
                                    ['link', '{link}'],
                                ],
                                'Fields' => [
                                    ['name', 'input'],
                                    ['lang', 'SelectOneRequired', Navigation::LangList()],
                                    ['link', 'input'],
                                    ['anchor', 'input'],
                                ],
                                'Filters' => [
                                    'lang' => [
                                        'type' => 'select',
                                        'field' => 'lang',
                                        'data' => ['' => 'Все'] + Navigation::LangList(),
                                    ],
                                ],
                                'sortBy' => 'order',
                                'orderButton' => true,
                            ]);
                            ?>
                            </nav>
                        <button type="button" class="header-menu js-nav-mob-link"></button>
                    </div>
                </div>



