<?php

return [
    'admin.files' => [
        'manager' => 'files::permissions.files.manager',
        'index' => 'files::permissions.files.index',
        'create' => 'files::permissions.files.create',
        'edit' => 'files::permissions.files.edit',
        'destroy' => 'files::permissions.files.destroy',
    ],
    'admin.files-extension' => [
        'index' => 'files::permissions.files-extension.index',
        'create' => 'files::permissions.files-extension.create',
        'destroy' => 'files::permissions.files-extension.destroy',
    ],
];
