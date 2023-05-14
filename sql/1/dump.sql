DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `goods` (`id`, `name`) VALUES
(1,	'Товар 1'),
(2,	'Товар 2'),
(3,	'Товар 3'),
(4,	'Товар 4'),
(5,	'Товар 5');

DROP TABLE IF EXISTS `goods_tags`;
CREATE TABLE `goods_tags` (
  `tag_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  UNIQUE KEY `tag_id_goods_id` (`tag_id`,`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `goods_tags` (`tag_id`, `goods_id`) VALUES
(1,	1),
(1,	3),
(1,	4),
(1,	5),
(2,	2),
(2,	3),
(2,	4),
(2,	5),
(3,	4),
(3,	5);

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tags` (`id`, `name`) VALUES
(1,	'Тег 1'),
(2,	'Тег 2'),
(3,	'Тег 3');
