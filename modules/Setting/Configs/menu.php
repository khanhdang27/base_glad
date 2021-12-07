<?php
return [
    'name' => trans('Setting'),
    'route' => route('get.setting.list'),
    'sort' => 11,
    'active'=> TRUE,
    'id'=> 'setting',
    'icon' => '<i class="fa fa-cog"></i>',
    'middleware' => [],
    'group' => [
        [
            'id'         => 'setting',
            'name'       => trans('Settings'),
            'route'      => route('get.setting.list'),
            'middleware' => ['setting-basic'],
        ],
        [
            'id'         => 'file-manager',
            'name'       => trans('File Manager'),
            'route'      => route('elfinder.index'),
            'middleware' => ['setting-file-manager'],
        ]
    ]
];
