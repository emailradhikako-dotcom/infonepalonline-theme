<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300;400;600;700&family=Noto+Sans+Devanagari:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'infonepal'); ?></a>
<header id="site-header" class="site-header">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-left">
                    <span class="current-date">
                        <?php 
                        $nepali_days = array('आइतबार', 'सोमबार', 'मङ्गलबार', 'बुधबार', 'बिहिबार', 'शुक्रबार', 'शनिबार');
                        $nepali_months = array('बैशाख', 'जेठ', 'असार', 'साउन', 'भदौ', 'असोज', 'कार्तिक', 'मंसिर', 'पुष', 'माघ', 'फागुन', 'चैत');
                        echo $nepali_days[date('w')] . ', ';
                        echo date('Y') . ' ' . $nepali_months[date('n')-1] . ' ' . date('d');
                        ?>
                    </span>
                    <span class="separator">|</span>
                    <span class="live-time" id="live-time"></span>
                </div>
                <div class="top-bar-right">
                    <?php if (get_theme_mod('infonepal_phone')) : ?>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('infonepal_phone')); ?>" class="top-contact">
                            📞 <?php echo esc_html(get_theme_mod('infonepal_phone')); ?>
                        </a>
                    <?php endif; ?>
                    <div class="social-links">
                        <?php if (get_theme_mod('infonepal_facebook')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('infonepal_facebook')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php /* SVG */ ?></a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('infonepal_twitter')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('infonepal_twitter')); ?>" target="_blank" rel="noopener" aria-label="Twitter"><?php /* SVG */ ?></a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('infonepal_youtube')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('infonepal_youtube')); ?>" target="_blank" rel="noopener" aria-label="YouTube"><?php /* SVG */ ?></a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('infonepal_instagram')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('infonepal_instagram')); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php /* SVG */ ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php else : ?>
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <div class="logo-icon">📰</div>
                                <div class="logo-text">
                                    <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                                    <?php $description = get_bloginfo('description', 'display'); if ($description || is_customize_preview()) : ?>
                                        <p class="site-description"><?php echo $description; ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="header-search">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" class="search-field" placeholder="समाचार खोज्नुहोस्..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit"><?php /* SVG */ ?></button>
                    </form>
                </div>
                <button class="mobile-menu-toggle" aria-label="Menu" aria-expanded="false">
                    <span class="menu-icon"></span>
                    <span class="menu-icon"></span>
                    <span class="menu-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <nav id="main-navigation" class="main-navigation">
        <div class="container">
            <?php wp_nav_menu(array('theme_location' => 'primary','menu_class' => 'nav-menu','container' => false,'fallback_cb' => false)); ?>
            <?php 
            $breaking = new WP_Query(array('posts_per_page' => 5,'meta_key' => 'breaking_news','meta_value' => '1'));
            if ($breaking->have_posts()) : ?>
                <div class="breaking-news">
                    <span class="breaking-label">🔴 ब्रेकिंग</span>
                    <div class="breaking-ticker">
                        <div class="ticker-content">
                            <?php while ($breaking->have_posts()) : $breaking->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="ticker-item"><?php the_title(); ?></a>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <div class="mobile-nav-overlay">
        <div class="mobile-nav-content">
            <?php wp_nav_menu(array('theme_location' => 'primary','menu_class' => 'mobile-menu','container' => false)); ?>
            <div class="mobile-search">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" placeholder="समाचार खोज्नुहोस्..." name="s" />
                    <button type="submit">🔍</button>
                </form>
            </div>
        </div>
    </div>
</header>
<div id="main-content" class="site-content">
<?php if (!is_front_page() && !is_home()) : ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <nav class="breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">गृहपृष्ठ</a>
                <?php
                if (is_category()) {
                    echo ' / <span>' . single_cat_title('', false) . '</span>';
                } elseif (is_single()) {
                    $category = get_the_category();
                    if ($category) {
                        echo ' / <a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a>';
                        echo ' / <span>' . get_the_title() . '</span>';
                    }
                } elseif (is_page()) {
                    echo ' / <span>' . get_the_title() . '</span>';
                } elseif (is_search()) {
                    echo ' / <span>खोज परिणाम: ' . get_search_query() . '</span>';
                }
                ?>
            </nav>
        </div>
    </div>
<?php endif; ?>
