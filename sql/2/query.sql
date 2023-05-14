/*
 Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины,
 и все они (каждый) поставили высокую оценку (строго выше 5).
 */
SELECT department_id, MIN(value) as 'min_value'
FROM evaluations
WHERE gender = 1
GROUP BY department_id
HAVING min_value > 5
