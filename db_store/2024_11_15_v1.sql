--
-- Remove unique dependency
--

ALTER TABLE `product_order` DROP INDEX `FK_od_pod`;
ALTER TABLE `product_order` DROP FOREIGN KEY `FK_od_pod`;
ALTER TABLE `product_order` DROP PRIMARY KEY;
ALTER TABLE `product_order` ADD COLUMN `pod_id` INT PRIMARY KEY AUTO_INCREMENT FIRST;

ALTER TABLE `product_order`
ADD CONSTRAINT `FK_od_pod`
FOREIGN KEY (`od_id`)
REFERENCES `order`(`od_id`);