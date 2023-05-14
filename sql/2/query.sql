/*
 Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины,
 и все они (каждый) поставили высокую оценку (строго выше 5).
 */
SELECT DISTINCT department_id
FROM evaluations
WHERE gender = 1
AND value > 5
