<div class="contacts-box" id="contacts">
    <div class="contacts-box__wrap inner-box">
        <div class="contacts-box__title-box">
            <div class="contacts-box__title page-title _top">
                <? use common\models\Config; ?>
                <?= Yii::t('content', 'Контакты') ?>
            </div>
        </div>
        <div class="contacts-box__content">
            <div class="contacts-box-info">
                <div class="contacts-box-info__box" data-aos="fade-up">
                    <a href="tel:<?= Config::ValueOf('adminPhone') ?>"
                       class="contacts-box-info__phone"><?= Config::ValueOf('adminPhone') ?></a>
                    <a href="mailto:<?= Config::ValueOf('adminEmail') ?>"
                       class="contacts-box-info__email"><?= Config::ValueOf('adminEmail') ?></a>
                </div>
                <div class="contacts-box-info__box" data-aos="fade-up">
                    <?php
                    $adminAddressList = [
                        'ru' => Config::ValueOf('adminAddressRu'),
                        'en' => Config::ValueOf('adminAddressEn'),
                    ]; ?>
                    <address class="contacts-box-info__desc">

                        <p><?= $adminAddressList[Yii::$app->language] ?></p>
                    </address>
                </div>
                <div class="contacts-box-info__box" data-aos="fade-up">
                    <a href="<?= Config::ValueOf('mapURL') ?>" target="_blank"
                       class="contacts-box-info__map"><?= Yii::t('content', 'Адрес') ?></a>
                </div>
            </div>
            <div class="contacts-box-btn">
                <div class="contacts-box-btn__box" data-aos="fade-up">
                    <button type="button" class="contacts-box-btn__req btn btn--type-2 js-modal-link"
                            data-id="#requisites"><?= Yii::t('content', 'Реквизиты') ?>
                    </button>
                </div>
                <div class="contacts-box-btn__box" data-aos="fade-up">
                    <button type="button" class="contacts-box-btn__feedback btn btn--type-1 js-modal-link"
                            data-id="#feedback"><?= Yii::t('content', 'обратная связь') ?>
                    </button>
                </div>
            </div>
        </div>
        <div class="contacts-box__top">
            <button type="button" class="contacts-box__top-link js-scroll-head"></button>
        </div>
    </div>
</div>