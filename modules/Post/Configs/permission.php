<?php
return [
    [
        'name' => 'post',
        'display_name' => trans('Post'),
        'group' => [
            [
                'name' => 'post-create',
                'display_name' => trans('Create Post'),
            ],
            [
                'name' => 'post-update',
                'display_name' => trans('Update Post'),
            ],
            [
                'name' => 'post-delete',
                'display_name' => trans('Delete Post'),
            ],
        ]
    ],
    [
        'name' => 'post-category',
        'display_name' => trans('Post Category'),
        'group' => [
            [
                'name' => 'post-category-create',
                'display_name' => trans('Create Post Category'),
            ],
            [
                'name' => 'post-category-update',
                'display_name' => trans('Update Post Category'),
            ],
            [
                'name' => 'post-category-delete',
                'display_name' => trans('Delete Post Category'),
            ],
        ]
    ]
];
