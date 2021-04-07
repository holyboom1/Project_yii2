<div class="services-box" id="services">
    <div class="services-box__bg js-parallax-bg-bottom"></div>
    <div class="services-box__wrap inner-box">
        <div class="services-box__title-box">
            <div class="services-box__title page-title _top">
                <? echo $services->name?>
            </div>
        </div>
        <div class="services-box-list js-animate" data-aos="fade-up">
            <div class="services-box-list__inner swiper-container js-services-slider">
                <div class="services-box-list__wrapper swiper-wrapper">
                    <div class="services-box-list__box swiper-slide">
                        <div class="services-box-list__item">
                            <div class="services-box-list__square">
                                <div class="services-box-list__number">01</div>
                            </div>
                            <div class="services-box-list__name"> <? echo $services->text_1 ?></div>
                        </div>
                    </div>
                    <div class="services-box-list__box swiper-slide">
                        <div class="services-box-list__item">
                            <div class="services-box-list__square">
                                <div class="services-box-list__number">02</div>
                            </div>
                            <div class="services-box-list__name"> <? echo $services->text_2?></div>
                        </div>
                    </div>
                    <div class="services-box-list__box swiper-slide">
                        <div class="services-box-list__item">
                            <div class="services-box-list__square">
                                <div class="services-box-list__number">03</div>
                            </div>
                            <div class="services-box-list__name"><? echo $services->text_3?></div>
                            <button type="button" class="services-box-list__link js-modal-link"
                                    data-id="#info-box-service3"><?= Yii::t('content', 'подробнее') ?>
                            </button>
                        </div>
                    </div>
                    <div class="services-box-list__box swiper-slide">
                        <div class="services-box-list__item">
                            <div class="services-box-list__square">
                                <div class="services-box-list__number">04</div>
                            </div>
                            <div class="services-box-list__name">
                                <? echo $services->text_4?>
                            </div>
                        </div>
                    </div>
                    <div class="services-box-list__box swiper-slide">
                        <div class="services-box-list__item">
                            <div class="services-box-list__square">
                                <div class="services-box-list__number">05</div>
                            </div>
                            <div class="services-box-list__name"><? echo $services->text_5?></div>
                        </div>
                    </div>
                    <? if ($services->text_6 !== ''){?>
                    <div class="services-box-list__box swiper-slide">
                        <div class="services-box-list__item">
                            <div class="services-box-list__square">
                                <div class="services-box-list__number">06</div>
                            </div>
                            <div class="services-box-list__name"><? echo $services->text_6?></div>
                            <a href="solutions/thin.html" type="button"
                               class="services-box-list__link js-modal-link"><?= Yii::t('content', 'подробнее') ?></a>
                        </div>
                    </div>
                    <? }?>
                </div>
            </div>
        </div>
    </div>
</div>