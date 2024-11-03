--
-- Adjust order, cash column
--

ALTER TABLE `order` CHANGE `od_delivery`  `od_delivery_time` DATETIME NOT NULL;
ALTER TABLE `order` ADD COLUMN `od_person_receive` VARCHAR(50) NOT NULL;
ALTER TABLE `order` MODIFY COLUMN `od_person_receive` VARCHAR(50) NOT NULL AFTER `od_delivery_time`;
ALTER TABLE `order` CHANGE `od_address` `od_address` VARCHAR(100) NOT NULL;
ALTER TABLE `order` ADD COLUMN `od_number_phone` VARCHAR(10) NOT NULL;
ALTER TABLE `order` MODIFY COLUMN `od_number_phone` VARCHAR(10) NOT NULL AFTER `od_address`;
ALTER TABLE `order` DROP COLUMN `od_total_price`;
ALTER TABLE `order` DROP COLUMN `od_approval`;

ALTER TABLE `cash` DROP COLUMN `c_total_price`;