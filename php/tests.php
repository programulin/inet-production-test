<?php

$data = [
    ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
];

// Тест 1
assert(
    array_column(get_unique_rows($data), 'date', 'id') === [
        1 => '22.01.2020',
        2 => '11.11.2020',
        4 => '08.03.2020',
        3 => '06.06.2020'
    ]
);

// Тест 2
assert(
    array_column(sort_rows_by_date($data), 'date') === [
        '12.01.2020',
        '22.01.2020',
        '08.03.2020',
        '02.05.2020',
        '06.06.2020',
        '11.11.2020'
    ]
);

// Тест 3
assert(
    array_column(find_rows_by_id($data, 2), 'date') === [
        '02.05.2020',
        '11.11.2020'
    ]
);

// Тест 4
assert(
    pluck_rows_by_name_and_id($data) === [
        'test1' => 1,
        'test2' => 2,
        'test4' => 4,
        'test3' => 3
    ]
);
