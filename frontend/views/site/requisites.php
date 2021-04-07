<div id="requisites" class="modal js-modal">
    <div class="modal__h-box js-modal-close"></div>
    <div class="modal-form">
        <button class="modal-form__close js-modal-close" type="button">
            <span class="i-close"></span>
        </button>
        <div class="modal-form__content">
            <div class="modal-form__title">
                <?= Yii::t('content', 'Реквизиты') ?>
            </div>
            <div class="modal-form__typography">
                <div class="rq-list">

                    <? echo(([Yii::$app->language][0] == "ru") ?
                        '<ul>
                           
                            <li> ' . $req->ooo . '</li>
                            <li>Юридический адрес<br>
                                ' . $req->adru . '
                            </li>
                            <li>Фактический адрес<br>
                               ' . $req->adrf . '
                            </li>
                            <li>' . $req->inn . '
                            </li>
                            <li>Генеральный директор<br>
                                ' . $req->dir . '
                            </li>
                            <li>Главный бухгалтер<br>
                                ' . $req->buh . '
                            </li>
                            </ul>
        
                            <ul>
                                <li>' . $req->rs . '
                                </li>
                        </ul>'
                        : '
                        <ul>
                            <li>  ' . $req->adru . '
                            </li>
                         </ul>'


                    ) ?>


                    <ul>
                        <li><a href="mailto:<? echo $req->email ?>"><? echo $req->email ?></a></li>
                        <li><a href="tel:<? echo $req->tel ?>"><? echo $req->tel ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>