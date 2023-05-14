DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE `evaluations`
(
    `respondent_id` int(11) NOT NULL,
    `department_id` int(11) NOT NULL,
    `gender`        bit(1) NOT NULL,
    `value`         int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `evaluations` (`respondent_id`, `department_id`, `gender`, `value`)
VALUES (1, 1, CONV('1', 2, 10) + 0, 5),
       (2, 1, CONV('1', 2, 10) + 0, 4),
       (3, 2, CONV('0', 2, 10) + 0, 5),
       (4, 2, CONV('0', 2, 10) + 0, 5),
       (5, 3, CONV('1', 2, 10) + 0, 5),
       (6, 3, CONV('0', 2, 10) + 0, 4),
       (7, 4, CONV('1', 2, 10) + 0, 5),
       (8, 4, CONV('1', 2, 10) + 0, 5);
