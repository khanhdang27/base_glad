<?php
return [
    'name' => trans('Page'),
    'route' => route('get.page.list'),
    'sort' => 1,
    'active'=> TRUE,
    'id'=> 'page',
    'icon' => '<i class="fa fa-window-maximize" style="display: inline-flex; align-items: center"></i>',
    'middleware' => ['page'],
    'group' => []
];
