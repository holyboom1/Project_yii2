<div class="about-box" id="about">
    <div class="about-box__bg js-parallax-bg-top"></div>
    <div class="page-top__content">
        <div class="about-box__wrap inner">
            <div class="about-box__title-box page-title-box">
                <div class="about-box__title page-title">
                    <? echo $blockAbout->name ?>
                </div>
            </div>
            <div class="about-box__content">
                <div class="about-box__index" data-aos="fade-up">
                    <? echo $blockAbout->text_2 ?>
                </div>
                <div class="about-box__desc" data-aos="fade-up">
                    <p>
                        <mark> <? echo $blockAbout->text_3 ?></mark>
                    </p>

                    <? echo $blockAbout->text ?>

                </div>
                <div class="about-box-list">
                    <div class="about-box-list__inner">
                        <div class="about-box-list__wrapper">
                            <?php
                            for ($i = 0; $i < count($about_content); $i++) {
                                $k = $i + 1;
                                echo '
                            <div class="about-box-list__box" data-aos="fade-up">
                                <div class="about-box-list__item">
                                    <div class="about-box-list__number">' . $k . '</div>
                                    <div class="about-box-list__desc">
                                        ' . $about_content[$i]->text . '
                                    </div>
                                </div>
                            </div>
                           ';
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>