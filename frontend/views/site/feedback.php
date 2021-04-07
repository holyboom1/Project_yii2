<?php

use yii\widgets\ActiveForm;

?>

<div id="feedback" class="modal js-modal">
    <div class="modal__h-box js-modal-close"></div>
    <?php
    $form = ActiveForm::begin(['options' => ['class' => 'modal-form js-modal-content']]);
    ?>

    <input type="hidden" name="_token" value="meVknXha48fLdZl7H0PcEvPOpEcZ4j1kRh3HgTPR">
    <button class="modal-form__close js-modal-close" type="button">
        <span class="i-close"></span>
    </button>
    <div class="modal-form__content">
        <div class="modal-form__title">
            <?= Yii::t('content', 'обратная связь') ?>
        </div>
        <div class="modal-form__fields">
            <div class="modal-form__list">
                <div class="modal-form__box">
                    <?= $form->field($model, 'name')->textInput(['autocomplete' => 'off', 'placeholder' => Yii::t('content', 'ФИО'),
                        'class' => 'modal-form__input input',
                    ])->label(false); ?>
                </div>
                <div class="modal-form__box">
                    <div class="modal-form-split">
                        <div class="modal-form-split__inner">
                            <div class="modal-form-split__wrapper">
                                <div class="modal-form-split__box">
                                    <div class="modal-form-split__item">
                                        <div class="modal-form__box">
                                            <?= $form->field($model, 'email')->textInput(['autocomplete' => 'off', 'placeholder' => 'E-Mail',
                                                'type' => "email",
                                                'class' => 'modal-form__input input js-contact-group', 'id' => "form_email",
                                            ])->label(false); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-form-split__separate">
                                    <?= Yii::t('content', 'и/или') ?>
                                </div>
                                <div class="modal-form-split__box">
                                    <div class="modal-form-split__item">
                                        <div class="modal-form__box">
                                            <?= $form->field($model, 'phone')->textInput(['autocomplete' => 'off', 'placeholder' => Yii::t('content', 'Телефон'), 'type' => "tel",
                                                'class' => 'modal-form__input input js-contact-group js-phone', 'id' => "form_phone",
                                            ])->label(false); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-form__box">
                    <?= $form->field($model, 'text')->textarea(['autocomplete' => 'off', 'placeholder' => Yii::t('content', 'Комментарий'),
                        'class' => 'modal-form__textarea textarea',
                    ])->label(false); ?>
                </div>
            </div>
            <div class="modal-form__checkbox-box">
                <label class="modal-form__checkbox checkbox">
                    <input type="checkbox" name="agree" class="checkbox__input" checked="" required="">
                    <div class="checkbox__name">
                        <? Yii::t('content', 'Я даю согласие на обработку своих персональных данных и соглашаюсь с') ?>
                        <a target="_blank"
                           href="uploads/files/gnpYCNZkXLsdpuSOInyRrrLvr0wS4tMKrkE97hNj-1.pdf"><? Yii::t('content', 'Политикой конфиденциальности') ?></a>
                    </div>
                </label>
            </div>
            <div class="modal-form__btn-box">
                <button type="submit" class="modal-form__btn btn btn--type-1">
                    <?= Yii::t('content', 'отправить') ?>

                </button>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>





