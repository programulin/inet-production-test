/*
  В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT),
  таблица с тегами tags (id INTEGER, name TEXT) и таблица связи товаров и тегов
  goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)).
  Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
 */
SELECT goods.id, goods.name, COUNT(*) as 'count'
FROM goods_tags
INNER JOIN goods ON goods.id = goods_tags.goods_id
GROUP BY goods_id
HAVING count = (SELECT COUNT(*) FROM tags)
