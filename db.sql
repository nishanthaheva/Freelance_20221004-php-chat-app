CREATE TABLE `messaging` (
  `in_id` int NOT NULL,
  `out_id` int DEFAULT NULL,
  `msg_id` int DEFAULT NULL,
  `msg` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`in_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
