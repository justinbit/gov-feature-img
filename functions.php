<?php

// Function for custom post type "bekendmaking"
function custom_bekendmaking_thumbnail_id($value, $object_id, $meta_key, $single, $meta_type)
{
    if ('_thumbnail_id' === $meta_key) {
        $post = get_post($object_id);

        if ('bekendmaking' === $post->post_type) {
            $categories = get_the_terms($object_id, 'category');

            if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    switch ($category->slug) {
                        case 'arbeid-werkgelegenheid-en-jeugdzaken':
                            $value = 115226; // the ID for the default image for category 1
                            break;
                        case 'binnenlandse-zaken':
                            $value = 115205; // the ID for the default image for category 2
                            break;
                        case 'buitenlandse-zaken-international-business-internationale-samenwerking':
                            $value = 115204; // the ID for the default image for category 2
                            break;
                        case 'defensie':
                            $value = 115206; // the ID for the default image for category 2
                            break;
                        case 'economische-zaken-ondernemerschap-technologische-innovatie':
                            $value = 115207; // the ID for the default image for category 2
                            break;
                        case 'financien-en-planning	':
                            $value = 115208; // the ID for the default image for category 2
                            break;
                        case 'grondbeleid-en-bosbeheer':
                            $value = 115209; // the ID for the default image for category 2
                            break;
                        case 'justitie-en-politie':
                            $value = 115210; // the ID for the default image for category 2
                            break;
                        case 'landbouw-veeteelt-en-visserij':
                            $value = 115216; // the ID for the default image for category 2
                            break;
                        case 'natuurlijke-hulpbronnen':
                            $value = 115218; // the ID for the default image for category 2
                            break;
                        case 'onderwijs-wetenschap-en-cultuur':
                            $value = 115217; // the ID for the default image for category 2
                            break;
                        case 'openbare-werken':
                            $value = 115220; // the ID for the default image for category 2
                            break;
                        case 'regionale-ontwikkeling-en-sport':
                            $value = 115222; // the ID for the default image for category 2
                            break;
                        case 'ruimtelijke-ordening-en-milieu':
                            $value = 115221; // the ID for the default image for category 2
                            break;
                        case 'sociale-zaken-en-volkshuisvesting':
                            $value = 115223; // the ID for the default image for category 2
                            break;
                        case 'transport-communicatie-toerisme':
                            $value = 115224; // the ID for the default image for category 2
                            break;
                        case 'volksgezondheid':
                            $value = 115225; // the ID for the default image for category 2
                            break;
                        case 'kabinet-van-de-president':
                            $value = 115211; // the ID for the default image for category 2
                            break;
                        case 'kabinet-van-de-vice-president':
                            $value = 115212; // the ID for the default image for category 2
                            break;
                            // Add more cases as needed
                        default:
                            $value = 17602; // the ID for the default image for other categories
                    }
                }
            } else {
                $value = 17602; // the ID for the default image if no category is found
            }
        }
    }

    return $value;
}
add_filter('default_post_metadata', 'custom_bekendmaking_thumbnail_id', 10, 5);

// Function for normal posts
function default_post_thumbnail_id($value, $object_id, $meta_key, $single, $meta_type)
{
    if ('_thumbnail_id' === $meta_key) {
        $post = get_post($object_id);

        if ('post' === $post->post_type) {
            $value = 17602; // the ID for the default image
        }
    }

    return $value;
}
add_filter('default_post_metadata', 'default_post_thumbnail_id', 10, 5);
