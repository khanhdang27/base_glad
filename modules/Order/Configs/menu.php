<?php
return [
    'name' => trans('Invoice'),
    'route' => route('get.order.list'),
    'sort' => 5,
    'active'=> TRUE,
    'id'=> 'order',
    'icon' => '<i class="mdi mdi-file-document"></i>',
    'middleware' => [],
    'group' => []
];
