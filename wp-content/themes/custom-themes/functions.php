<?php

// Подключение стилей
    if (!is_admin()) {
        function blog_styles()
        {
            wp_enqueue_style('style', get_template_directory_uri() . '/style.css', ['bootstrap']);
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css');
        }
        add_action('wp_enqueue_scripts', 'blog_styles');
}

// Включаем поддержку меню
//add_theme_support('menus');



    register_nav_menus([
        'header_menu' => 'Хэдер',
        'footer_menu' => 'Футер',
    ]);

//  Правим стандартный Walker_Nav_Menu

            //$items = wp_get_nav_menu_items(header);
            //print_r( $items );
        class description_walker extends Walker_Nav_Menu
        {
            function start_el(&$output, $item, $depth, $args)
            {
                global $wp_query;
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                $class_names = $value = '';

                $classes = empty( $item->classes ) ? array() : (array) $item->classes;

                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args  ) );
                $class_names = ' class="'. esc_attr( $class_names ) . '"';




                $output .= $indent . '<li' . $value . $class_names .'>';

                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        // $description2span
                $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

                if($depth != 0)
                {
                    $description = $append = $prepend = "";
                }

                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
                $item_output .= $description.$args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;

                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
        }


    // филтруем menu_css_class
    //add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
    //function my_css_attributes_filter($var) {
    //    return is_array($var) ? array_intersect($var, array('menu-item')) : '';
    //}

    add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
    function my_css_attributes_filter($classes) {
        // if this is not a custom link and not the home page, return the $classes intact, otherwise filter $classes
        return is_array($classes) ?
            (in_array("menu-item-object-custom", $classes) || is_front_page())?
                array_diff($classes, array('menu-item'))
                : $classes // not a custom link
            : ''; // not an array
    }


// Включаем поддержку сайдбара
    register_sidebar([
        'id' => 'right_sidebar',
        'name' => 'Правая колонка',
        'description' => 'Правая боковая колонка',
        'before_widget' => '<div id="%1s" class="panel panel-default %2s">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="panel-heading">',
        'after_title' => '</div><div class="panel-body">',
    ]);


// Включаем поддержку миниатюр
    add_theme_support('post-thumbnails');



// Пагинация в стиле bootstrap
    function pagination( $query=null ) {

        global $wp_query;
        $query = $query ? $query : $wp_query;
        $big = 999999999;

        $paginate = paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'type' => 'array',
                'total' => $query->max_num_pages,
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
            )
        );

        if ($query->max_num_pages > 1) :
            ?>
            <ul class="pagination">
                <?php
                foreach ( $paginate as $page ) {
                    echo '<li>' . $page . '</li>';
                }
                ?>
            </ul>
        <?php
        endif;
    }