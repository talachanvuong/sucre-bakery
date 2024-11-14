--
-- Remove some dependencies
--

ALTER TABLE `product_order` DROP INDEX `FK_pd_pod`;
ALTER TABLE `product_order` DROP FOREIGN KEY `FK_pd_pod`;
ALTER TABLE `product_order` DROP PRIMARY KEY;
ALTER TABLE `product_order` ADD PRIMARY KEY (`od_id`);
ALTER TABLE `product_order` DROP COLUMN `pd_id`;