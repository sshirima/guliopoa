<?php

return [
    // default values
    'default'  => [
        'rows_number' => 20,
    ],
    'template' => [
        'indicator' => [
            'sort' => [
                'class' => 'spin-on-click',
                'icon' => [
                    'asc'      => '<i class="fa fa-sort-asc"></i>',
                    'desc' => '<i class="fa fa-sort-desc"></i>',
                    'unsorted' => '<i class="fa fa-sort"></i>'
                ],
            ],
        ],
        'button'     => [
            'create'  => [
                'class' => 'btn btn-success spin-on-click',
                'icon'  => '<i class="fas fa-plus-circle" aria-hidden="true"></i>',
            ],
            'edit'    => [
                'class' => 'btn btn-primary btn-xs',
                'icon'  => '<i class="fas fa-pencil-alt"></i>',
            ],
            'destroy' => [
                'class' => 'btn btn-danger btn-xs',
                'icon'  => '<i class="fas fa-trash-alt"></i>',
            ],
            'confirm' => [
                'class' => 'btn btn-success spin-on-click',
                'icon'  => '<i class="fas fa-check" aria-hidden="true"></i>',
            ],
            'cancel'  => [
                'class' => 'btn btn-danger',
                'icon'  => '<i class="fas fa-ban" aria-hidden="true"></i>',
            ],
        ],
    ],
];
