<?php
return [
    'name' => trans('Post Management'),
    'route' => '#',
    'sort' => 3,
    'active'=> TRUE,
    'id'=> 'post',
    'icon' => '<i class="fa fa-clipboard"></i>',
    'middleware' => [],
    'group' => [
        [
            'name' => trans('Post Category'),
            'route' => route('get.post_category.list'),
            'id' => 'post-category',
            'middleware' => ['post-category']
        ],
        [
            'name' => trans('Post'),
            'route' => route('get.post.list'),
            'id' => 'post',
            'middleware' => ['post']
        ]
    ]
];
