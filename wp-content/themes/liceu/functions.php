<?php
    @ini_set( 'upload_max_size' , '80M' );
    @ini_set( 'post_max_size', '80M');
    @ini_set( 'max_execution_time', '300' );
    global $post;
    function remove_menus(){
        global $post;

        if(!current_user_can('administrator')){
            remove_menu_page( 'index.php' );                  //Dashboard
            remove_menu_page( 'jetpack' );                    //Jetpack*
            remove_menu_page( 'edit.php' );                   //Posts
            remove_menu_page( 'upload.php' );                 //Media
            remove_menu_page( 'edit.php?post_type=page' );    //Pages
            remove_menu_page( 'edit-comments.php' );          //Comments
            remove_menu_page( 'themes.php' );                 //Appearance
            remove_menu_page( 'plugins.php' );                //Plugins
            remove_menu_page( 'users.php' );                  //Users
            remove_menu_page( 'tools.php' );                  //Tools
            remove_menu_page( 'options-general.php' );        //Settings  
        } else {
            // remove_menu_page( 'index.php' );                  //Dashboard
            remove_menu_page( 'jetpack' );                    //Jetpack*
            // remove_menu_page( 'edit.php' );                   //Posts
            remove_menu_page( 'upload.php' );                 //Media
            // remove_menu_page( 'edit.php?post_type=page' );    //Pages
            remove_menu_page( 'edit-comments.php' );          //Comments
            // remove_menu_page( 'themes.php' );                 //Appearance
            // remove_menu_page( 'plugins.php' );                //Plugins
            // remove_menu_page( 'users.php' );                  //Users
            // remove_menu_page( 'tools.php' );                  //Tools
            // remove_menu_page( 'options-general.php' );        //Settings    
        }
    }
    ////////////////////////////////////////////////////
    function attach_template_to_page( $page_name, $template_file_name ) {
        // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
        // Otherwise, set it to the page's ID.
        $page = get_page_by_title( $page_name, OBJECT, 'page' );
        $page_id = null == $page ? -1 : $page->ID;
        // Only attach the template if the page exists
        if( -1 != $page_id ) {
            update_post_meta( $page_id, '_wp_page_template', $template_file_name );
        } // end if
        return $page_id;
    } // end attach_template_to_page
    ////////////////////////////////////////////////////
    function query_post_type($query) {
        if(is_category() || is_tag()) {
        $post_type = get_query_var('post_type');
        if($post_type)
        $post_type = $post_type;
        else
        $post_type = array('nav_menu_item','post','articles');
        $query->set('post_type',$post_type);
        return $query;
        }
        }
    ////////////////////////////////////////////////////    
    function customizer( $wp_customize ) {
        $wp_customize->add_panel( 'customization', array(
            'priority'       => 2,
            'title'          => __('Customização')
        ));  
        // Social Networks
        $wp_customize->add_section( 'social_networks' , array(
        'title'       => __( 'Social Networks' ),
        'panel' => 'customization',
        'priority'    => 0
        ));    
        $wp_customize->add_setting( 'show_social_network', array(
        'capability' => 'edit_theme_options',
        'default' => 'no',
        'sanitize_callback' => 'sanitize',
        ));
        $wp_customize->add_setting( 'facebook' );
        $wp_customize->add_control('facebook',  array(
            'label' => 'Facebook',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'facebook'
        ));   
        $wp_customize->add_setting( 'twitter' );
        $wp_customize->add_control('twitter',  array(
            'label' => 'Twitter',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'twitter'
        ));    
        $wp_customize->add_setting( 'youtube' );
        $wp_customize->add_control('youtube',  array(
            'label' => 'Youtube',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'youtube'
        ));  
        $wp_customize->add_setting( 'git' );
        $wp_customize->add_control('git',  array(
            'label' => 'GIT',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'git'
        ));   
        $wp_customize->add_setting( 'linkedin' );
        $wp_customize->add_control('linkedin',  array(
            'label' => 'Linkedin',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'linkedin'
        ));             
        $wp_customize->add_setting( 'telegram' );
        $wp_customize->add_control('telegram',  array(
            'label' => 'Telegram',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'telegram'
        ));                 
        $wp_customize->add_setting( 'googleplus' );
        $wp_customize->add_control('googleplus',  array(
            'label' => 'Google Plus',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'googleplus'
        ));               
        $wp_customize->add_setting( 'instagram' );
        $wp_customize->add_control('instagram',  array(
            'label' => 'Instagram',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'instagram'
        ));     
        $wp_customize->add_setting( 'pinterest' );
        $wp_customize->add_control('pinterest',  array(
            'label' => 'Pinterest',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'pinterest'
        ));     
        $wp_customize->add_setting( 'rss' );
        $wp_customize->add_control('rss',  array(
            'label' => 'RSS',
            'section' => 'social_networks',
            'type' => 'url',
            'settings' => 'rss'
        ));             
        $wp_customize->add_section( 'header' , array(
            'title'       => __( 'Header' ),
            'panel' => 'customization',
            'priority'    => 1
        ));  
        $wp_customize->add_section( 'footer' , array(
            'title'       => __( 'Footer' ),
            'panel' => 'customization',
            'priority'    => 1
        )); 
        // $wp_customize->add_section( 'top' , array(
        //     'title'       => __( 'Top Bar' ),
        //     'panel' => 'customization',
        //     'priority'    => 1
        // ));     
        // $wp_customize->add_section( 'footer' , array(
        //     'title'       => __( 'Footer' ),
        //     'panel' => 'customization',
        //     'priority'    => 1
        // ));  
        $wp_customize->add_setting( 'logo' );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
            'label'    => __( 'Logo' ),
            'section'  => 'header',
            'settings' => 'logo'
        )));  
        $wp_customize->add_setting( 'bg' );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bg', array(
            'label'    => __( 'BG' ),
            'section'  => 'footer',
            'settings' => 'bg'
        )));   
        $wp_customize->add_setting( 'telefone' );
        $wp_customize->add_control('telefone',  array(
            'label' => 'Telefone',
            'section' => 'footer',
            'type' => 'text',
            'settings' => 'telefone'
        )); 
        $wp_customize->add_setting( 'email' );
        $wp_customize->add_control('email',  array(
            'label' => 'E-mail',
            'section' => 'footer',
            'type' => 'text',
            'settings' => 'email'
        ));  
        $wp_customize->add_setting( 'endereco' );
        $wp_customize->add_control('endereco',  array(
            'label' => 'Endereço',
            'section' => 'footer',
            'type' => 'textarea',
            'settings' => 'endereco'
        ));  
        // $wp_customize->add_setting( 'bg' );
        // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bg', array(
        //     'label'    => __( 'BG' ),
        //     'section'  => 'footer',
        //     'settings' => 'bg'
        // )));  
        // $wp_customize->add_setting( 'footer-description' );
        // $wp_customize->add_control('footer-description',  array(
        //     'label' => 'Texto do Rodapé',
        //     'section' => 'footer',
        //     'type' => 'textarea',
        //     'settings' => 'footer-description'
        // ));   
    }
    ////////////////////////////////////////////////////
    function remove_customizer_settings( $wp_customize ){
        $wp_customize->remove_section('static_front_page');
    }
    ////////////////////////////////////////////////////
    function get_custom_field_data($key, $echo = false) {
    $value = get_post_meta($post->ID, $key, true);
    if($echo == false) {
    return $value;
    } else {
    echo $value;
    }
    }
    ////////////////////////////////////////////////////
    set_post_thumbnail_size( 600, 600 );
    ////////////////////////////////////////////////////
    function regScripts() {
        wp_deregister_script('jquery');
        wp_enqueue_script('vendors', get_template_directory_uri().'/assets/js/vendors.js','','',true);
        wp_enqueue_script('commons', get_template_directory_uri().'/assets/js/commons.js','','',true);
    }
    function prefix_add_footer_styles() {
        wp_enqueue_style('fontAwesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css','','');
        wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css','','11.3');
    };
    ////////////////////////////////////////////////////
    function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    ////////////////////////////////////////////////////
    function df_terms_clauses($clauses, $taxonomy, $args) {
        if (!empty($args['post_type'])) {
        global $wpdb;
        $post_types = array();
        foreach($args['post_type'] as $cpt) {
        $post_types[] = "'".$cpt."'";
        }
        if(!empty($post_types)) {
        $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';
        $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';
        $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';
        $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];
        }
        }
        return $clauses;
        }
    ////////////////////////////////////////////////////
    function hide_editor() {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
        if( !isset( $post_id ) ) return;
            $page = get_the_title($post_id);
            remove_post_type_support('page', 'editor');
            remove_post_type_support('page', 'excerpt');
            remove_post_type_support('page', 'author');
            remove_post_type_support('page', 'comments');
            remove_post_type_support('page', 'revisions');
            remove_post_type_support('page', 'custom-fields'); 
            remove_post_type_support('page', 'thumbnail');
            remove_post_type_support('page', 'page-attributes');
            remove_post_type_support('page', 'slug');    

            $template_file = get_post_meta($post_id, '_wp_page_template', true);

            if($page == "Quem Somos"){ // the filename of the page template
                add_post_type_support('page', 'editor');
                add_post_type_support('page', 'thumbnail');
            } elseif($page == "Contato"){ // the filename of the page template
                add_post_type_support('page', 'editor');
            } elseif($page == "Participe"){ // the filename of the page template
                add_post_type_support('page', 'editor');
            }
    }
    ////////////////////////////////////////////////////
    function called( $file_name, $files = array(), $dir = '' ) {
        if( empty( $files ) ) {
            $files = debug_backtrace();
        }
        if( ! $dir ) {
            $dir = get_stylesheet_directory() . '/';
        }
        $dir = str_replace( "/", "\\", $dir );
        $caller_theme_file = array();
        foreach( $files as $file ) {
            if( false !== mb_strpos($file['file'], $dir) ) {
                $caller_theme_file[] = $file['file'];
            }
        }
        if( $file_name ) {
            return in_array( $dir . $file_name, $caller_theme_file );
        }
        return;
    }
    ////////////////////////////////////////////////////
    function sanitize( $input, $setting ) {
        global $wp_customize;
     
        $control = $wp_customize->get_control( $setting->id );
     
        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }
    ////////////////////////////////////////////////////
    function pagination(){
        echo '
        <ul class="post-pagination '.(is_single() ? '-single' : '').'">';
            if(is_single()) :
                if(get_previous_post()->ID) :
                    echo '
                    <li class="-actions -prev">
                        <a class="prev" href="'.esc_url( get_permalink( get_previous_post()->ID ) ).'" title="Post Anterior"><i class="fa fa-chevron-left"></i> Post Anterior</a>
                    </li>';
                endif; 
                if(get_next_post()->ID) :
                    echo '
                    <li class="-actions -next">
                        <a class="next" href="'.esc_url( get_permalink( get_next_post()->ID ) ).'" title="Próximo Post">Próximo Post <i class="fa fa-chevron-right"></i></a>
                    </li>';
                endif; 
            else : 
                if(get_previous_posts_link()) :
                    echo '
                    <li class="-actions -prev">
                        <a class="prev" href="'.get_previous_posts_page_link().'" title="Posts Anteriores"><i class="fa fa-chevron-left"></i> Post Anteriores</a>
                    </li>';
                endif; 
                if(get_next_posts_link()) :
                    echo '
                    <li class="-actions -next">
                        <a class="next" href="'.get_next_posts_page_link().'" title="Próximos Posts">Próximos Posts <i class="fa fa-chevron-right"></i></a>
                    </li>';
                endif; 
            endif;
        echo '</ul>';
    }
    ////////////////////////////////////////////////////
    function the_slug_exists($post_name) {
        global $wpdb;
        if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
            return true;
        } else {
            return false;
        }
    }
    if (isset($_GET['activated']) && is_admin()){
        $home_page_title = 'Home';
        $home_page_content = '';
        $home_page_check = get_page_by_title($home_page_title);
        $home_page = array(
            'post_type' => 'page',
            'post_title' => $home_page_title,
            'post_content' => $home_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'ID' => 2,
            'post_slug' => 'home'
        );
        if(!isset($home_page_check->ID) && !the_slug_exists('home')){
            $home_page_id = wp_insert_post($home_page);
        }
    }
    if (isset($_GET['activated']) && is_admin()){
        $front_page = 2; // this is the default page created by WordPress
        update_option( 'page_on_front', $front_page );
        update_option( 'show_on_front', 'page' );
    }
    function hide_admin_bar() {
    wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');
    return false;
    }
    ////////////////////////////////////////////////////
    function cpt() {
        register_post_type('turmas', array(
            'labels' => array(
                'name' => _x('Encontros', 'post type general name'),
                'singular_name' => _x('Encontro', 'post type singular name'),
                'add_new' => _x('Novo', 'Encontro'),
                'add_new_item' => __('Novo Encontro'),
                'edit_item' => __('Editar Encontro'),
                'new_item' => __('Novo Encontro'),
                'view_item' => __('Ver Encontro'),
                'search_items' => __('Buscar Encontros'),
                'not_found' =>  __('Nada encontrado'),
                'not_found_in_trash' => __('Nada encontrado'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 4,
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt')
        ));
        register_taxonomy( 'turma_categories', array( 'turmas' ), array(
            'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
            'labels'            => array(
                'name'              => _x( 'Categorias', 'taxonomy general name' ),
                'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
                'search_items'      => __( 'Buscar Categorias' ),
                'all_items'         => __( 'Todas as Categorias' ),
                'parent_item'       => __( 'Categoria Pai' ),
                'parent_item_colon' => __( 'Categoria Pai:' ),
                'edit_item'         => __( 'Editar categoria' ),
                'update_item'       => __( 'Atualizar categoria' ),
                'add_new_item'      => __( 'Adicionar nova categoria' ),
                'new_item_name'     => __( 'Novo nome' ),
                'menu_name'         => __( 'Categorias' ),
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'categories' ),
        ));
        // 
        register_post_type('dicas', array(
            'labels' => array(
                'name' => _x('Dicas de Mestre', 'post type general name'),
                'singular_name' => _x('Dicas de Mestre', 'post type singular name'),
                'add_new' => _x('Novo', 'Dicas de Mestre'),
                'add_new_item' => __('Novo Dicas de Mestre'),
                'edit_item' => __('Editar Dicas de Mestre'),
                'new_item' => __('Novo Dicas de Mestre'),
                'view_item' => __('Ver Dicas de Mestre'),
                'search_items' => __('Buscar Dicas de Mestre'),
                'not_found' =>  __('Nada encontrado'),
                'not_found_in_trash' => __('Nada encontrado'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt')
        ));
        register_taxonomy( 'dica_categories', array( 'dicas' ), array(
            'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
            'labels'            => array(
                'name'              => _x( 'Categorias', 'taxonomy general name' ),
                'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
                'search_items'      => __( 'Buscar Categorias' ),
                'all_items'         => __( 'Todas as Categorias' ),
                'parent_item'       => __( 'Categoria Pai' ),
                'parent_item_colon' => __( 'Categoria Pai:' ),
                'edit_item'         => __( 'Editar categoria' ),
                'update_item'       => __( 'Atualizar categoria' ),
                'add_new_item'      => __( 'Adicionar nova categoria' ),
                'new_item_name'     => __( 'Novo nome' ),
                'menu_name'         => __( 'Categorias' ),
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'categories' ),
        ));
        //
        register_post_type('omura', array(
            'labels' => array(
                'name' => _x('Memória', 'post type general name'),
                'singular_name' => _x('Memória', 'post type singular name'),
                'add_new' => _x('Novo', 'Memória'),
                'add_new_item' => __('Novo Memória'),
                'edit_item' => __('Editar Memória'),
                'new_item' => __('Novo Memória'),
                'view_item' => __('Ver Memória'),
                'search_items' => __('Buscar Memória'),
                'not_found' =>  __('Nada encontrado'),
                'not_found_in_trash' => __('Nada encontrado'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 4,
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt')
        ));
        register_taxonomy( 'omura_categories', array( 'omura' ), array(
            'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
            'labels'            => array(
                'name'              => _x( 'Categorias', 'taxonomy general name' ),
                'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
                'search_items'      => __( 'Buscar Categorias' ),
                'all_items'         => __( 'Todas as Categorias' ),
                'parent_item'       => __( 'Categoria Pai' ),
                'parent_item_colon' => __( 'Categoria Pai:' ),
                'edit_item'         => __( 'Editar categoria' ),
                'update_item'       => __( 'Atualizar categoria' ),
                'add_new_item'      => __( 'Adicionar nova categoria' ),
                'new_item_name'     => __( 'Novo nome' ),
                'menu_name'         => __( 'Categorias' ),
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'categories' ),
        )); 
        //
        register_post_type('eventos', array(
            'labels' => array(
                'name' => _x('Eventos', 'post type general name'),
                'singular_name' => _x('Evento', 'post type singular name'),
                'add_new' => _x('Novo', 'Evento'),
                'add_new_item' => __('Novo Evento'),
                'edit_item' => __('Editar Evento'),
                'new_item' => __('Novo Evento'),
                'view_item' => __('Ver Evento'),
                'search_items' => __('Buscar Evento'),
                'not_found' =>  __('Nada encontrado'),
                'not_found_in_trash' => __('Nada encontrado'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 4,
            'supports' => array('title', 'thumbnail', 'editor', 'excerpt')
        ));
        register_taxonomy( 'evento_categories', array( 'eventos' ), array(
            'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
            'labels'            => array(
                'name'              => _x( 'Categorias', 'taxonomy general name' ),
                'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
                'search_items'      => __( 'Buscar Categorias' ),
                'all_items'         => __( 'Todas as Categorias' ),
                'parent_item'       => __( 'Categoria Pai' ),
                'parent_item_colon' => __( 'Categoria Pai:' ),
                'edit_item'         => __( 'Editar categoria' ),
                'update_item'       => __( 'Atualizar categoria' ),
                'add_new_item'      => __( 'Adicionar nova categoria' ),
                'new_item_name'     => __( 'Novo nome' ),
                'menu_name'         => __( 'Categorias' ),
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'categories' ),
        ));         
    }
    function menu() {
        register_nav_menus(
        array(
        // 'default' => __( 'Default' ),
        // 'copyright' => __( 'Copyright' )
        )
        );
    }  
    ////////////////////////////////////////////////////
    function disable_default_dashboard_widgets() {
        global $wp_meta_boxes;
        // wp..
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
        // bbpress
        unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
        // yoast seo
        unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
        // gravity forms
        unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
    }
    ////////////////////////////////////////////////////
    function hide_welcome_panel() {
        $user_id = get_current_user_id();

        if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
            update_user_meta( $user_id, 'show_welcome_panel', 0 );
    }
    ////////////////////////////////////////////////////
    function oz_remove_screen_options( $display_boolean, $wp_screen_object ){
        $blacklist = array(/*'post.php', 'post-new.php', 'index.php', 'edit.php'*/ 'index.php');
        if ( in_array( $GLOBALS['pagenow'], $blacklist ) ) {
            $wp_screen_object->render_screen_layout();
            $wp_screen_object->render_per_page_options();
            return false;
        }
        return true;
    }
    add_filter( 'screen_options_show_screen', 'oz_remove_screen_options', 10, 2 );
    ////////////////////////////////////////////////////
    // $perfis = get_field('perfis_da_aplicação', 'option');

    // function video_access( $field ){
    //     $perfis = get_field('perfis_da_aplicação', 'option');
    //     foreach( $perfis as $row ) : 
    //         $field['choices'][strtolower(str_replace(' ', '-', $row[tipo_de_perfil]))] = $row[tipo_de_perfil];
    //     endforeach;
     
    //     return $field;
    // }

    // foreach( $perfis as $row ) : 
    //     add_role(strtolower(str_replace(' ', '-', $row[tipo_de_perfil])), __(
    //         $row[tipo_de_perfil]),
    //         array(
    //             'read'              => true, // Allows a user to read
    //             'create_posts'      => true, // Allows user to create new posts
    //             'edit_posts'        => true, // Allows user to edit their own posts
    //             'edit_others_posts' => true, // Allows user to edit others posts too
    //             'publish_posts'     => true, // Allows the user to publish posts
    //             'manage_categories' => true, // Allows user to manage post categories
    //             )
    //     );
    // endforeach;

    // // acf/load_field/key={$field_key} - filter for a specific field based on it's key name , CHANGE THIS TO YOUR FIELDS KEY!
    // add_filter('acf/load_field/key=field_5b8c86a2b1625', 'video_access');
    ////////////////////////////////////////////////////
    attach_template_to_page( 'home', 'page-templates/home.php' );
    ////////////////////////////////////////////////////
    add_theme_support( 'post-thumbnails' );
    if(!current_user_can('administrator')){
        add_filter('acf/settings/show_admin', '__return_false');
    }
    ////////////////////////////////////////////////////
    if( function_exists('acf_add_options_page') ) {

            // acf_add_options_sub_page(array(
            //     'title'      => 'Perfis',
            //     'parent'     => 'users.php',
            //     'capability' => 'manage_options'
            // ));
     
            // acf_add_options_page(array(
            //     'page_title'    => 'Dropdowns',
            //     'menu_title'    => 'Dropdowns',
            //     'menu_slug'     => 'dropdowns',
            //     'capability'    => 'edit_posts',
            //     'parent_slug'   => '',
            //     'icon_url'      => '', // Add this line and replace the second inverted commas with class of the icon you like
            //     'position' => 999
            // ));
            
            // acf_add_options_page(array(
            //     'page_title'    => 'Clientes',
            //     'menu_title'    => 'Clientes',
            //     'menu_slug'     => 'clientes',
            //     'capability'    => 'edit_posts',
            //     'parent_slug'   => '',
            //     'icon_url'      => 'dashicons-admin-users', // Add this line and replace the second inverted commas with class of the icon you like
            //     'position' => 998
            // ));

            // acf_add_options_sub_page(array(
            //     'page_title'    => '',
            //     'menu_title'    => 'Ramo de Atividade - Usuário',
            //     'capability'    => 'edit_posts',
            //     'parent_slug'   => 'dropdowns'
            // ));

            // acf_add_options_sub_page(array(
            //     'page_title'    => '',
            //     'menu_title'    => 'Ramo de Atividade - Fornecedor',
            //     'capability'    => 'edit_posts',
            //     'parent_slug'   => 'dropdowns'
            // ));

            // acf_add_options_sub_page(array(
            //     'page_title'    => '',
            //     'menu_title'    => 'Cargos',
            //     'capability'    => 'edit_posts',
            //     'parent_slug'   => 'dropdowns'
            // ));

            // acf_add_options_sub_page(array(
            //     'page_title'    => '',
            //     'menu_title'    => 'Operadoras de Telefonia',
            //     'capability'    => 'edit_posts',
            //     'parent_slug'   => 'dropdowns'
            // ));            
    }
    ////////////////////////////////////////////////////
    function add_mobile_anchor( $items, $args )
    {
        if($args->container_class == 'navigation')
        {
            $items .= '
                <li>
                    <button onclick="_mobileNavigation(this)" type="button" class="tcon tcon-menu--xbutterfly" aria-label="toggle menu">
                        <span class="tcon-menu__lines" aria-hidden="true"></span>
                        <span class="tcon-visuallyhidden">toggle menu</span>
                    </button>
                </li>
            ';
        }

        return $items;
    }
    ////////////////////////////////////////////////////
    function remove_wpcf7() {
        remove_menu_page( 'wpcf7' ); 
    }
    ////////////////////////////////////////////////////
    if ( ! function_exists( 'the_widgets_init' ) ) {
    function the_widgets_init() {
    if ( ! function_exists( 'register_sidebars' ) )
    return;
    register_sidebar(
    array(
    'id'            => 'sidebar',
    'name'          => __( 'Sidebar' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
    )
    );
    } // End the_widgets_init()
    }

        ////////////////////////////////////////////////////


        function myprefix_widgets_init() {
            register_widget( 'wp_register_form' );
        }

        add_action( 'widgets_init', 'myprefix_widgets_init' );

        class wp_register_form extends WP_Widget {



            function __construct()

            {

                $widget_ops = array( 'classname' => 'register_form', 'description' => __( "Form de regsitro", 'mytextdomain'  ) );

                parent::__construct( 'register_form', __( 'Register Form', 'mytextdomain' ), $widget_ops );

            }



            function widget( $args, $instance )

            {

                extract( $args );



                $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Register Form', 'mytextdomain'  ) : $instance['title'], $instance, $this->id_base);



                echo $before_widget;

                if ( $title )

                    echo $before_title . $title . $after_title;

                ?>

                <!-- Formulário aqui -->

                <?php 
                    echo do_shortcode('[contact-form-7 id="77" title="Contato"]');
                ?>

                <?php

                echo $after_widget;

            }



            function update( $new_instance, $old_instance )

            {

                $instance = $old_instance;

                $instance['title'] = strip_tags( $new_instance['title'] );

                return $instance;

            }



            function form( $instance )

            {

                //Defaults

                $instance = wp_parse_args( (array) $instance, array( 'title' => '') );

                $title = esc_attr( $instance['title'] );

                ?>

                <p>

                    <label for="<?php echo $this->get_field_id('title', 'mytextdomain' ); ?>"><?php _e( 'Title:', 'mytextdomain'  ); ?></label>

                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />

                </p>

                <?php

            }

        }
        function modify_read_more_link() {
            return '<a class="more-link" href="' . get_permalink() . '">Leia Mais</a>';
        }
    ////////////////////////////////////////////////////
    add_filter( 'show_admin_bar', 'hide_admin_bar' );
    add_filter('upload_mimes', 'cc_mime_types');
    add_filter( 'the_content_more_link', 'modify_read_more_link' );        
    add_filter('pre_get_posts', 'query_post_type');
    add_filter('terms_clauses', 'df_terms_clauses', 10, 3);
    add_action( 'wp_enqueue_scripts', 'regScripts' );
    add_action( 'init', 'menu' );
    add_action( 'admin_init', 'hide_editor' );
    add_action( 'customize_register', 'remove_customizer_settings', 20 );
    add_action( 'customize_register', 'customizer' );
    add_action( 'admin_menu', 'remove_menus' );
    add_action( 'init', 'cpt');
    add_filter( 'wp_nav_menu_items', 'add_mobile_anchor', 10, 2);
    // add_filter('acf/settings/show_admin', '__return_false');
    // add_action('admin_menu', 'remove_wpcf7');
    add_action( 'load-index.php', 'hide_welcome_panel' );
    add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);
    add_action( 'init', 'the_widgets_init' );
    add_action( 'get_footer', 'prefix_add_footer_styles' );    
    remove_action('welcome_panel', 'wp_welcome_panel');