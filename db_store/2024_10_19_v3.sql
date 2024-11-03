--
-- Fix N - N relationship
--

UPDATE `product_type`
SET `pdt_name` = 'Temp'
WHERE `pdt_id` = 5;

UPDATE `product_type`
SET `pdt_name` = 'Khác'
WHERE `pdt_id` = 7;

UPDATE `product_type`
SET `pdt_name` = 'Bánh truyền thống'
WHERE `pdt_id` = 5;

UPDATE `product`
SET `pdt_id` = 5
WHERE `pdt_id` = 7;

ALTER TABLE `cart` DROP COLUMN `ca_id`;
ALTER TABLE `cart` ADD PRIMARY KEY (`us_id`, `pd_id`);
ALTER TABLE `cart` MODIFY COLUMN `ca_quantity` INT NOT NULL AFTER `pd_id`;

ALTER TABLE `cash` DROP FOREIGN KEY `FK_od_c`;
ALTER TABLE `cash` DROP FOREIGN KEY `FK_pd_c`;
ALTER TABLE `cash` DROP PRIMARY KEY;
ALTER TABLE `cash` DROP INDEX `FK_od_pd_od`;
ALTER TABLE `cash` ADD PRIMARY KEY (`pd_id`, `od_id`);
ALTER TABLE `cash` ADD CONSTRAINT `FK_od_c` FOREIGN KEY (`od_id`) REFERENCES `order`(`od_id`);
ALTER TABLE `cash` ADD CONSTRAINT `FK_pd_c` FOREIGN KEY (`pd_id`) REFERENCES `product`(`pd_id`);
ALTER TABLE `cash` ADD INDEX `FK_pd_c`(`pd_id`);

ALTER TABLE `order` CHANGE `us_id` `us_id` INT NOT NULL;
ALTER TABLE `order` CHANGE `os_id` `os_id` INT NOT NULL;

ALTER TABLE `product` CHANGE `pdt_id` `pdt_id` INT NOT NULL;

ALTER TABLE `user` CHANGE `us_name` `us_name` VARCHAR(50) NOT NULL;
ALTER TABLE `user` DROP INDEX `us_name`;
ALTER TABLE `user` CHANGE `us_number_phone` `us_number_phone` VARCHAR(12) NOT NULL UNIQUE;