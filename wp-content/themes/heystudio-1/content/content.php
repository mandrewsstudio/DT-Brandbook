<?php
$content = array(
    'general' => array(
        'heystudio_logo_text' => 'Your name',
        'heystudio_favicon' => get_stylesheet_directory_uri() . '/content/images/general/favicon.png',
        'heystudio_background_color' => '#000000',
        'heystudio_text_color' => '#ffffff',
        'heystudio_general_colors' => array(
            array(
                'general_color' => '#fff60a'
            ) ,
            array(
                'general_color' => '#4076ff'
            ) ,
            array(
                'general_color' => '#ff9afb'
            ) ,
            array(
                'general_color' => '#ff543a'
            ) ,
            array(
                'general_color' => '#00ffd1'
            ) ,
        ) ,
        'heystudio_footer_copyrights' => '®2023 Your name',
        'heystudio_footer_contact_email' => 'youremail@yourname.com',
        'heystudio_show_news' => 1,
        'heystudio_news_fields' => array(
            array(
                'image' => get_stylesheet_directory_uri() . '/content/images/news/1.png',
                'title' => 'Interview',
                'url' => ''
            ) ,
            array(
                'image' => get_stylesheet_directory_uri() . '/content/images/news/2.png',
                'title' => 'Work featured',
                'url' => ''
            ) ,
            array(
                'image' => get_stylesheet_directory_uri() . '/content/images/news/3.png',
                'title' => 'Product launch',
                'url' => ''
            ) ,
            array(
                'image' => get_stylesheet_directory_uri() . '/content/images/news/4.png',
                'title' => 'Collaboration',
                'url' => ''
            ) ,
            array(
                'image' => get_stylesheet_directory_uri() . '/content/images/news/5.png',
                'title' => 'Work featured',
                'url' => ''
            ) ,
            array(
                'image' => get_stylesheet_directory_uri() . '/content/images/news/6.png',
                'title' => 'Collab with',
                'url' => ''
            )
        ) ,
    ) ,
    'taxonomies' => array(
        'industry' => array(
            array(
                'name' => 'Business',
                'label' => 'business'
            ) ,
            array(
                'name' => 'Environmental',
                'label' => 'environmental'
            ) ,
            array(
                'name' => 'Fashion & Beauty',
                'label' => 'fashion-beauty'
            ) ,
            array(
                'name' => 'Food & Drink',
                'label' => 'food-drink'
            ) ,
            array(
                'name' => 'Healthcare',
                'label' => 'healthcare'
            ) ,
            array(
                'name' => 'Hospitality & Leisure',
                'label' => 'hospitality-leisure'
            ) ,
            array(
                'name' => 'Media & Entertainment',
                'label' => 'media-entertainment'
            ) ,
            array(
                'name' => 'Publishing',
                'label' => 'publishing'
            ) ,
            array(
                'name' => 'Retail',
                'label' => 'retail'
            ) ,
            array(
                'name' => 'Tech',
                'label' => 'tech'
            ) ,
        ) ,
        'service' => array(
            array(
                'name' => 'Brand Identity',
                'label' => 'brand-identity'
            ) ,
            array(
                'name' => 'Campaigns',
                'label' => 'campaigns'
            ) ,
            array(
                'name' => 'Digital Design',
                'label' => 'digital-design'
            ) ,
            array(
                'name' => 'Editorial Design',
                'label' => 'editorial-design'
            ) ,
            array(
                'name' => 'Illustration & Iconography',
                'label' => 'illustration-iconography'
            ) ,
            array(
                'name' => 'Motion Graphics',
                'label' => 'motion-graphics'
            ) ,
            array(
                'name' => 'Packaging Design',
                'label' => 'packaging-design'
            ) ,
            array(
                'name' => 'Product Design',
                'label' => 'product-design'
            ) ,
            array(
                'name' => 'Signage & Environmental Design',
                'label' => 'signage-environmental-design'
            ) ,
            array(
                'name' => 'Typography',
                'label' => 'typography'
            ) ,
            array(
                'name' => 'Web Design',
                'label' => 'web-design'
            ) ,
        ) ,
    ) ,
    'pages' => array(
        array(
            'title' => 'Work',
            'content' => '',
            'post_name' => 'work',
            'status' => 'publish',
            'post_type' => 'page',
            'template' => 'templates/template_home.php',
            'is_front_page' => 1,
        ) ,
        array(
            'title' => 'About',
            'content' => "Here, you can showcase your project’s story and background. You can introduce your team, provide insights on how you bring your project to life, and where you are based 🌍. You can express the values and ethics that steer your creativity, defining the principles of your design philosophy 🎨. Take us through your creative journey, sharing important moments, obstacles, and things that inspire you along the way ✨.",
            'post_name' => 'about',
            'status' => 'publish',
            'post_type' => 'page',
            'template' => 'templates/template_about.php',
            'is_front_page' => 0,
            'postmeta' => array(
                'meta_key' => '_heystudio_about_fields',
                'meta_value' => array(
                    array(
                        'title' => 'Tell us a value',
                        'text' => '<p>This is a dedicated space for you to articulate and describe the core values that shape your project. Feel free to express the beliefs that guide your vision. 🧩</p>',
                    ) ,
                    array(
                        'title' => 'Another value',
                        'text' => '<p>This is a dedicated space for you to articulate and describe the core values that shape your project. Feel free to express the beliefs that guide your vision.🎈</p>',
                    ) ,
                    array(
                        'title' => 'Another one',
                        'text' => '<p>This is a dedicated space for you to articulate and describe the core values that shape your project. Feel free to express the beliefs that guide your vision.🌱</p>',
                    ) ,
                    array(
                        'title' => 'Even more',
                        'text' => '<p>This is a dedicated space for you to articulate and describe the core values that shape your project. Feel free to express the beliefs that guide your vision.🔍</p>',
                    ) ,
                    array(
                        'title' => 'Last one',
                        'text' => '<p>This is a dedicated space for you to articulate and describe the core values that shape your project. Feel free to express the beliefs that guide your vision.🌈</p>',
                    ) ,
                ) ,
            ) ,
        ) ,
        array(
            'title' => 'Contact',
            'content' => '',
            'post_name' => 'contact',
            'status' => 'publish',
            'post_type' => 'page',
            'template' => 'templates/template_contact.php',
            'is_front_page' => 0,
            'postmeta' => array(
                'meta_key' => 'contact_items',
                'meta_value' => array(
                    array(
                        'main_title' => 'Get in touch, we would love to hear from you!',
                        'column_1' => "<p>🌈<br/><strong>Your Name</strong><br/>Your position in the Studio</p><p>⚡<br/><strong>Your Co-worker's Name</strong><br/>Their position in the Studio</p><p>🦋<br/><strong>Worker's name</strong><br/>Position in the Studio</p><p>🚀<br/><strong>Worker's name</strong><br/>Position in the Studio</p><p>🎈<br/><strong>Worker's name</strong><br/>Position in the Studio</p><p>🔮<br/><strong>Worker's name</strong><br/>Position in the Studio</p><p>👞<br/><strong>Worker's name</strong><br/>Position in the Studio</p>",
                        'column_2' => '<p><strong>Inquiries &amp; Commissions</strong><br>yourmail(@)yourmail.com</p><p><strong>Job Applications &amp; Internships</strong><br>apply(@)your mail.com</p><p>+XX XXX XXX XXX<br>Write your address over here<br>Postal Code City</p>',
                    ) ,
                    array(
                        'main_title' => 'Keep up to date\non all things!',
                        'column_1' => "<p>[newsletter_form]<br/>📸 Instagram<br/>🐦 Twitter<br/>💼 LinkedIn<br/>🤳 Tiktok</p>",
                        'column_2' => '',
                    ) ,
                ) ,
            ) ,

        ) ,
    ) ,
    'projects' => array(
        array(
            'title' => 'Bermudas',
            'content' => '',
            'excerpt' => '',
            'post_name' => 'bermudas',
            'status' => 'publish',
            'post_type' => 'project',
            'taxonomies' => array(
                'service' => array(
                    'brand-identity',
                    'editorial-design'
                ) ,
                'industry' => array(
                    'arts-culture',
                    'environmental'
                ) ,
            ) ,
            'postmeta' => array(
                array(
                    'meta_key' => '_heystudio_client',
                    'meta_value' => 'Name of your client/ project'
                ) ,
                array(
                    'meta_key' => '_heystudio_subtitle',
                    'meta_value' => 'Share a catchy highlight of your project'
                ) ,
                array(
                    'meta_key' => '_heystudio_big_title',
                    'meta_value' => 'Tell us what your project is about!'
                ) ,
                array(
                    'meta_key' => '_heystudio_colored_text',
                    'meta_value' => '<p>Intro about your project</p>'
                ) ,
                array(
                    'meta_key' => '_heystudio_content',
                    'meta_value' => "<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project's concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>"
                ) ,
                array(
                    'meta_key' => '_heystudio_image',
                    'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_27.png'
                ) ,
                array(
                    'meta_key' => '_heystudio_video_url',
                    'meta_value' => ''
                ) ,
                 array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
                array(
                    'meta_key' => '_heystudio_hero_video_url',
                    'meta_value' => ''
                ) ,
  array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
            ) ,
        ) ,

    
    array (
  'title' => 'Tokyo',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'tokyo',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_28.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
    array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
  array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'business',
    ),
    'service' => 
    array (
      0 => 'brand-identity',
      1 => 'campaigns',
    ),
  ),
),
array (
  'title' => 'New York',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'new-york',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_29.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
    array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
    array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'food-drink',
      1 => 'media-entertainment',
    ),
    'service' => 
    array (
      0 => 'digital-design',
      1 => 'motion-graphics',
    ),
  ),
),
array (
  'title' => 'Rio de Janeiro',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'path',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_35.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
     array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
     array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'arts-culture',
      1 => 'business',
    ),
    'service' => 
    array (
      0 => 'digital-design',
      1 => 'editorial-design',
    ),
  ),
),
array (
  'title' => 'Barcelona',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'barcelona',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_30.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
     array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
     array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'media-entertainment',
      1 => 'publishing',
    ),
    'service' => 
    array (
      0 => 'signage-environmental-design',
      1 => 'typography',
    ),
  ),
),
array (
  'title' => 'Galápagos',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'galapagos',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_31.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
     array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
    array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'arts-culture',
      1 => 'food-drink',
    ),
    'service' => 
    array (
      0 => 'campaigns',
      1 => 'motion-graphics',
    ),
  ),
),
array (
  'title' => 'Singapur',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'singapur',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_32.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
   array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
  array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'food-drink',
      1 => 'healthcare',
    ),
    'service' => 
    array (
      0 => 'illustration-iconography',
      1 => 'motion-graphics',
    ),
  ),
),
array (
  'title' => 'Patagonia',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'patagonia',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_33.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
      array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
     array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'arts-culture',
      1 => 'fashion-beauty',
    ),
    'service' => 
    array (
      0 => 'brand-identity',
      1 => 'editorial-design',
    ),
  ),
),
array (
  'title' => 'El Cairo',
  'content' => '',
  'excerpt' => '',
  'post_name' => 'night',
  'status' => 'publish',
  'post_type' => 'project',
  'postmeta' => 
  array (
    0 => 
    array (
      'meta_key' => '_heystudio_client',
      'meta_value' => 'Name of your client/ project',
    ),
    1 => 
    array (
      'meta_key' => '_heystudio_subtitle',
      'meta_value' => 'Share a catchy highlight of your project',
    ),
    2 => 
    array (
      'meta_key' => '_heystudio_big_title',
      'meta_value' => 'Tell us what your project is about!',
    ),
    3 => 
    array (
      'meta_key' => '_heystudio_colored_text',
      'meta_value' => '<p>Intro about your project</p>
',
    ),
    4 => 
    array (
      'meta_key' => '_heystudio_content',
      'meta_value' => '<p>Here, you can delve deep into your most recent project, offering a comprehensive and in-depth understanding for the reader. Feel free to explain the project’s concept, shedding light on the innovative ideas and creativity that inspired its inception. Share with us the objectives and goals that guided you toward the end result while helping us grasp the purpose and mission behind it.</p>
',
    ),
    5 => 
    array (
      'meta_key' => '_heystudio_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_34.png',
    ),
    6 => 
    array (
      'meta_key' => '_heystudio_video_url',
      'meta_value' => '',
    ),
    7 => 
     array (
      'meta_key' => '_heystudio_hero_image',
      'meta_value' => get_stylesheet_directory_uri() . '/content/images/projects/project_21.png',
    ),
    8 => 
    array (
      'meta_key' => '_heystudio_hero_video_url',
      'meta_value' => '',
    ),
    9 => 
     array (
      'meta_key' => 'project_image_sets',
      'meta_value' => 
      array (
        0 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_24.png',
              'video_url' => '',
            ),
            2 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_23.png',
              'video_url' => '',
            ),
            3 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_25.png',
              'video_url' => '',
            ),
          ),
        ),
        1 => 
        array (
          'images' => 
          array (
            1 => 
            array (
              'image' => get_stylesheet_directory_uri() . '/content/images/projects/project_22.png',
              'video_url' => '',
            ),
          ),
        ),
      ),
    ),
  ),
  'taxonomies' => 
  array (
    'industry' => 
    array (
      0 => 'arts-culture',
      1 => 'fashion-beauty',
    ),
    'service' => 
    array (
      0 => 'brand-identity',
      1 => 'digital-design',
    ),
  ),
)
) ,
);
