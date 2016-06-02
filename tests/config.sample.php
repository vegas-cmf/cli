<?php
return [
    'application' => [
        'modules' => [
            'Test'
        ],
        'autoload' => [
            'App\Task' => TESTS_ROOT_DIR . '/fixtures/app/tasks'
        ],
        'modulesDirectory' => TESTS_ROOT_DIR . '/app/modules',
        'sharedServices' => [
        ],
        'initializers'=> [
        ],
        'view' => [
            'cacheDir' => TESTS_ROOT_DIR . '/fixtures/cache/view/',
            'viewsDir' => TESTS_ROOT_DIR . '/fixtures/app',
            'layout' => 'main',
            'layoutsDir' => 'layouts/',
            'engines' => [
                'volt' => [
                    'compiledPath' => TESTS_ROOT_DIR . '/fixtures/cache/view/compiled/',
                    'compiledSeparator' => '_',
                    'compileAlways' => false
                ]
            ]
        ]
    ]
];
