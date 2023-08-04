<?php

namespace App;

if (class_exists('\MultiPostThumbnails')):

    $MultiPostThumbnails = [
        'mentor' => [
            'label' => __('Cover Photo'),
            'id' => 'cover_photo',
        ],
        'team' => [
            'label' => __('Cover Photo'),
            'id' => 'cover_photo',
        ],
    ];

    foreach( $MultiPostThumbnails as $postType => $props ):
        new \MultiPostThumbnails([
            'label' => $props['label'],
            'id' => $props['id'],
            'post_type' => $postType,
        ]);
    endforeach;

endif;
