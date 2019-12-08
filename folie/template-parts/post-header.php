<div class="cl_page_header cl-element cl-load-component modern modern-center modern-effect-none light-text cl-loaded-component" style="height: 465px;border-color: #ebebeb;">
    <div class="cl-loading"></div>
    <div class="wrapper-layers cl-wait-for-load" data-delay="1">
        <div class="bg-layer " style="background-color: #f5f5f5;background-image: url('<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID(),'full') );  ?>');background-position: center;background-repeat: no-repeat;background-size: cover;background-attachment: scroll;background-blend-mode: normal;" data-parallax-config="{ &quot;speed&quot;: 0.3 }"></div>
        <div class="overlay " style="background-color: #161616;opacity: 0.8;"></div>
        <div class="effect-wrapper"></div>
    </div>
    <div class="wrapper-content cl-wait-for-load" data-delay="2">
        <div class="container container-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title_part">
                        <h1 class="custom_font" style="font-size: 64px;font-weight: 700;line-height: 76px;text-transform: none;"><?php echo get_the_title() ?></h1>
                        <?php get_template_part('template-parts/blog/parts/entry', 'meta'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>