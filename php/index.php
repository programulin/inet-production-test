<?php

/**
 * 1. выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
 *
 * $array = [
 *   [id => 1, ...],
 *   [id => 2, ...],
 *   [id => 4, ...],
 *   [id => 3, ...],
 * ]
 */
function get_unique_rows(array $rows): array
{
    return array_values(array_column($rows, null, 'id'));
}

// 2. отсортировать многомерный массив по ключу (любому)
function sort_rows_by_date(array $rows): array
{
    usort($rows, function ($row1, $row2) {
        return strtotime($row1['date']) <=> strtotime($row2['date']);
    });

    return $rows;
}

// 3. вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
function find_rows_by_id(array $rows, int $id): array
{
    return array_filter($rows, function ($row) use ($id) {
        return $row['id'] === $id;
    });
}

/**
 * 4. изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
 *
 * $array = [
 *   "test1" => 1,
 *   "test2" => 2,
 *   "test4" => 4,
 *   "test3" => 3
 * ]
 */
function pluck_rows_by_name_and_id(array $rows): array
{
    /**
     * Можно было бы сделать так:
     * return array_column($rows, 'id', 'name');
     * Но этот вариант не соответствует ТЗ - значения должны быть взяты из первого, а не последнего совпадения.
     *
     * Можно добавить array_reverse перед array_column - тогда массив будет нужной структуры,
     * но ключи будут идти в другом порядке (test3, test4, test1, test2).
     * Поэтому выбран алгоритм, который возвращает данные точно как в ТЗ.
     */
    return array_reduce($rows, function ($result, $row) {
        $result[$row['name']] ??= $row['id'];
        return $result;
    }, []);
}

require __DIR__ . '/tests.php';

