# Custom Default Thumbnail for Posts in WordPress

This WordPress customization allows setting a default thumbnail for posts when no specific thumbnail is assigned. The code is placed in the `functions.php` file of your WordPress theme.

## Overview

The code snippet hooks into the `default_post_metadata` filter to provide a default thumbnail ID for posts. This is particularly useful for ensuring that all posts have a thumbnail image, even if the author does not set one explicitly.

## Code Explanation

```php
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
```

The function default_post_thumbnail_id checks if the metadata being filtered is the thumbnail ID (_thumbnail_id). If so, it checks if the post type is post. For posts, it sets the thumbnail ID to 17602, which should be replaced with the ID of your desired default thumbnail image.

How to Use
Replace 17602 with the ID of the image you want to use as the default thumbnail.
Add this code snippet to the functions.php file of your active WordPress theme.
This customization ensures that all your posts have a consistent appearance by using a default thumbnail image when none is specified.
