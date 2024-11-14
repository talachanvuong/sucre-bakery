--
-- Add `pod_name` column to `product_order` table
--

ALTER TABLE `product_order` ADD COLUMN `pod_name` VARCHAR(50) NOT NULL;
ALTER TABLE `product_order` MODIFY COLUMN `pod_name` VARCHAR(50) NOT NULL AFTER `od_id`;
ALTER TABLE `product_order` ADD INDEX `FK_pd_pod`(`pd_id`);