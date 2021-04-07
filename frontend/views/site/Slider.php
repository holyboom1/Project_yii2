<div class="steps-slider" id="why">
    <div class="steps-slider__wrap">
        <div class="steps-slider-el">
            <div class="steps-slider-el__container swiper-container js-steps-slider">
                <div class="steps-slider-content__wrapper swiper-wrapper">


                    <?php

                    for ($i = 0; $i < count($mainSlider); $i++) {

                        echo '<div class="steps-slider-content__box swiper-slide">
                        <div class="steps-slider-content__item">
                            <div class="steps-slider-header">
                                <div class="steps-slider-header__inner inner-box">
                                    <div class="steps-slider-header__wrapper">
                                        <div class="steps-slider-header__box">
                                            <div class="steps-slider-header__item">
                                                <div class="steps-slider__title">
                                                    <div class="page-title _top">
                                                        ' . $mainSlider[$i]->name . '
                                                    </div>
                                                </div>
                                                <div class="steps-slider__pagination js-steps-slider-pagination">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="steps-slider-header__box">
                                            <div class="steps-slider-header__item">
                                                <div class="steps-slider__nav-box">
                                                    <button type="button"
                                                            class="steps-slider__nav _prev js-steps-slider-prev">
                                                        <span class="i-arrow-long"></span>
                                                    </button>
                                                    <button type="button"
                                                            class="steps-slider__nav _next _anim js-steps-slider-next">
                                                        <span class="i-arrow-long"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="steps-slider-info inner-box">
                                <div class="steps-slider-info__inner">
                                    <div class="steps-slider-info__wrapper">
                                        <div class="steps-slider-info__box" data-aos="fade-up">
                                            <div class="steps-slider-info__item">
                                                <div class="steps-slider-info__name">
                                                    ' . $mainSlider[$i]->text . '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="steps-slider-info__box" data-aos="fade-up">
                                            <div class="steps-slider-info__item">
                                                <div class="steps-slider-info__name">
                                                    ' . $mainSlider[$i]->text_2 . '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="steps-slider-info__box" data-aos="fade-up">
                                            <div class="steps-slider-info__item">
                                                <div class="steps-slider-info__name">
                                                    ' . $mainSlider[$i]->text_3 . '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="steps-slider-content">
                                        ' . (($i == 0) ? '

                                                 <div class="steps-slider-content__wrapper">
                                                        <div class="steps-slider-content__add">
                                                            <div class="steps-slider-content__el _type-1"></div>
                                                            <div class="steps-slider-content__el _type-2"></div>
                                                        </div>
                                                     <div class="steps-slider-content__img-box">
                                                         <div class="steps-slider-content__img">
                                                            <img src="' . $mainSlider[$i]->image . '"
                                                                    alt="'. $mainSlider[$i]->name .'">
                                                         </div>
                                                     </div>
                                                 </div>
                                                 
                                                 '
                                        : "") . '
                                        
                                        ' . (($i == 1) ? '

                                                 <div class="steps-slider-content__wrapper">
                                                      <div class="steps-slider-content__add">
                                                        <div class="steps-slider-content__el _type-3">
                                                             <img src="' . $mainSlider[$i]->image . '"
                                                                alt="'. $mainSlider[$i]->name .'">
                                                        </div>
                                                        <div class="steps-slider-content__el _type-4"></div>
                                                        <div class="steps-slider-content__el _type-5"></div>
                                                      </div>
                                                      <div class="steps-slider-content__img-box">
                                                        <div class="steps-slider-content__el _type-6"></div>
                                                            <div class="steps-slider-content__img">
                                                                <img src="' . $mainSlider[$i]->image_2 . '"
                                                                alt="'. $mainSlider[$i]->name .'">
                                                            </div>
                                                      </div>
                                                 </div>
                                                 
                                                 '
                                        : "") . '
                                        
                                        ' . (($i == 2) ? '

                                                 <div class="steps-slider-content__wrapper">
                                                    <div class="steps-slider-content__add">
                                                        <div class="steps-slider-content__el _type-7"></div>
                                                        <div class="steps-slider-content__el _type-8"></div>
                                                    </div>
                                                    <div class="steps-slider-content__img-box">
                                                        <div class="steps-slider-content__img">
                                                            <img src="' . $mainSlider[$i]->image . '" alt="'. $mainSlider[$i]->name .'">
                                                        </div>
                                                    </div>
                                                 </div>
                                                 
                                                 '
                                        : "") . '
                                        
                                        ' . (($i == 3) ? '

                                                 <div class="steps-slider-content__wrapper">
                                                    <div class="steps-slider-content__add">
                                                        <div class="steps-slider-content__el _type-9">
                                                            <img src="' . $mainSlider[$i]->image . '" alt="'. $mainSlider[$i]->name .'">
                                                        </div>
                                                        <div class="steps-slider-content__el _type-10"></div>
                                                    </div>
                                                    <div class="steps-slider-content__img-box">
                                                        <div class="steps-slider-content__img">
                                                            <img src="' . $mainSlider[$i]->image_2 . '" alt="'. $mainSlider[$i]->name .'">
                                                        </div>
                                                    </div>
                                                 </div>
                                                 
                                                 '
                                        : "") . '
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
