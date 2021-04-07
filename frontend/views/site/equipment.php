<div id="info-box-service3" class="modal js-modal">
    <div class="modal__h-box js-modal-close"></div>
    <div class="modal-form _full">
        <button class="modal-form__close js-modal-close" type="button">
            <span class="i-close"></span>
        </button>
        <div class="modal-form__content">
            <div class="modal-form__title">
                <? echo $eq[0]->main_name?>
            </div>
            <div class="modal-form__typography">
                <div class="rq-list">
                    <ul>

                        <?
                        for( $i=0; $i<count($eq) ; $i++){
                            echo '<li> ' . $eq[$i]->name . ' </li>';
                            if ($eq[$i]->text_1 !== ''){

                                echo '<ul> 
                                           <li> '. $eq[$i]->text_1 .' </li>
                                            '. (($eq[$i]->text_2 !== '') ? '<li> '. $eq[$i]->text_2 .' </li>' : '') .'
                                            '. (($eq[$i]->text_3 !== '') ? '<li> '. $eq[$i]->text_3 .' </li>' : '') .'
                                             '. (($eq[$i]->text_4 !== '') ? '<li> '. $eq[$i]->text_4 .' </li>' : '') .'
                                             '. (($eq[$i]->text_5 !== '') ? '<li> '. $eq[$i]->text_5 .' </li>' : '') .'
                                        </ul>';

                            }
                            else '<li> ' . $eq[$i]->name . ' </li>';

                        }?>
<!--                        <li>Активное и пассивное сетевое оборудование</li>-->
<!--                        <li>Системы хранения данных</li>-->
<!--                        <li>Сервера</li>-->
<!--                        <li>Телефония и телекоммуникационное оборудование</li>-->
<!--                        <li>Системы ВКС</li>-->
<!--                        <li>Персональные компьютеры, ноутбуки, смартфоны, планшеты, периферия</li>-->
<!--                        <li>Системы бесперебойного питания</li>-->
<!--                        <li>Печатное оборудование</li>-->
<!--                        <li>-->
<!--                            <p>Виртуализация</p>-->
<!---->
<!--                            <ul>-->
<!--                                <li>Серверная и сетевая виртуализация</li>-->
<!--                                <li>Виртуализация систем хранения данных</li>-->
<!--                                <li>Виртуализация рабочих мест</li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li>Системы резервного копирования</li>-->
<!--                        <li>Мониторинг</li>-->
<!--                        <li>Системы управления конфигурациями</li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>