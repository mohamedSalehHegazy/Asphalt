<?php

return [
    'role_structure' => [
        'admin' => [
            'complaints' => 'r,u,d',
        ],
        'user' => [
            'complaints' => 'c'
        ],
    ],
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
