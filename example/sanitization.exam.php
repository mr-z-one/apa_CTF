    <?php

require  __DIR__ . '/inc/sanitization.php';

$inputs = [
    'name' => 'joe<script>',
    'email' => 'joe@example.com</>',
    'age' => '18abc',
    'weight' => '100.12lb',
    'github' => 'https://github.com/joe',
    'hobbies' => [
        ' Reading',
        'Running ',
        ' Programming '
    ]
];

$fields = [
    'name' => 'string',
    'email' => 'email',
    'age' => 'int',
    'weight' => 'float',
    'github' => 'url',
    'hobbies' => 'string[]'
];



$data = sanitize($inputs,$fields);

var_dump($data);