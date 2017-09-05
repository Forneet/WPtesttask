<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
	<?php wp_head() ?>
    <title><?php bloginfo('name') ?> <?php wp_title() ?></title>
</head>
<body>
<div class="container">

	<a href="/" title="Главная страница блога <?php bloginfo('name') ?>">
		<img id="logo" src="<?= get_template_directory_uri() ?>/img/logo.png" alt="Логотип"/>
	</a>




<!--    <ul class="my-menu">-->
<!--        <li class="item-(n)">-->
<!--            <a href="#" class="class_from_admin_panell my-menu__link" rel="nofollow">Some link</a>-->
<!--            <span class="my-menu__text">Some lorem text</span>-->
<!--        </li>-->
<!--        <li class="item-(n) my-menu__dropdown">-->
<!--            <a href="#" class="class_from_admin_panell my-menu__link" rel="nofollow">Some link</a>-->
<!--            <span class="my-menu__text">Some lorem text</span>-->
<!--            <ul class="my-menu__dropdown--item">-->
<!--                <li class="item-(n)">-->
<!--                    <a href="#" class="class_from_admin_panell my-menu__link" rel="nofollow">Some link</a>-->
<!--                    <span class="my-menu__text">Some lorem text</span>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        <ul>-->
<!--            ----->
<!--            - Строгая структура, без лишних стилей и идентификаторов.-->
<!--            - Данные href, link class, link value, link text in <span> должны меняться из админки-->
<!--- (n) = integer 1,2,3,4,5-->
    <nav class="navbar navbar-default">
        <div class="container-fluid">

    <?php

$walker = new description_walker();

wp_nav_menu( array(

    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'menu_class' => 'nav navbar-nav',
    'theme_location' => 'header_menu',
    'menu'            => '',
    'container_id'    => 0,
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
    'depth'           => 2,
    'walker'          => $walker
    ) );



?>


        </div><!-- /.container-fluid -->
    </nav>

	<div class="row">