<?php
return [
    'name' => trans('Product Management'),
    'route' => "#",
    'sort' => 4,
    'active'=> TRUE,
    'id'=> 'product',
    'icon' => '<i class="fa fa-shopping-cart"></i>',
    'middleware' => [],
    'group' => [
        [
            'name' => trans('Product Category'),
            'route' => route('get.product_category.list'),
            'id' => 'product-category',
            'middleware' => ['product-category']
        ],
        [
            'name' => trans('Product'),
            'route' => route('get.product.list'),
            'id' => 'product',
            'middleware' => ['product']
        ],
    ]
];
