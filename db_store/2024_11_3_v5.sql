--
--  Change od_id type
--

ALTER TABLE `cash` DROP FOREIGN KEY `FK_od_c`;
ALTER TABLE `cash` CHANGE `od_id` `od_id` VARCHAR(8) NOT NULL;

ALTER TABLE `order` CHANGE `od_id` `od_id` VARCHAR(8) NOT NULL;

ALTER TABLE `cash` ADD CONSTRAINT `FK_od_c` FOREIGN KEY (`od_id`) REFERENCES `order`(`od_id`);