--
-- Rename table `cash` to `product_order`
-- Add new column `pd_last_update` in table `product`, handle old values
--

ALTER TABLE `cash` RENAME TO `product_order`;
ALTER TABLE `product_order` DROP FOREIGN KEY `FK_od_c`;
ALTER TABLE `product_order` DROP FOREIGN KEY `FK_pd_c`;
ALTER TABLE `product_order` DROP INDEX `FK_od_c`;
ALTER TABLE `product_order` DROP INDEX `FK_pd_c`;

ALTER TABLE `product_order`
ADD CONSTRAINT `FK_od_pod`
FOREIGN KEY (`od_id`)
REFERENCES `order`(`od_id`);

ALTER TABLE `product_order`
ADD CONSTRAINT `FK_pd_pod`
FOREIGN KEY (`pd_id`)
REFERENCES `product`(`pd_id`);

ALTER TABLE `product_order` CHANGE `c_quantity` `pod_quantity` INT NOT NULL;
ALTER TABLE `product_order` ADD COLUMN `pod_price` INT NOT NULL;
ALTER TABLE `product_order` MODIFY COLUMN `pod_price` INT NOT NULL AFTER `pod_quantity`;
ALTER TABLE `product_order` CHANGE `c_created_on` `pod_created_on` DATETIME NOT NULL;

ALTER TABLE `product` ADD COLUMN `pd_last_update` DATETIME NOT NULL;
UPDATE `product`
SET `pd_last_update` = NOW()