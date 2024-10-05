--
-- Add column `od_note` to table `order`
-- Fix some columns is set to null type
--

ALTER TABLE `order` ADD `od_note` text NOT NULL;
ALTER TABLE `order` MODIFY COLUMN `od_note` text NOT NULL AFTER `od_total_price`;

ALTER TABLE `cash` CHANGE `c_quantity` `c_quantity` int NOT NULL;
ALTER TABLE `cash` CHANGE `c_total_price` `c_total_price` int NOT NULL;

ALTER TABLE `order` CHANGE `od_price` `od_price` int NOT NULL;
ALTER TABLE `order` CHANGE `od_total_price` `od_total_price` int NOT NULL;

ALTER TABLE `product` CHANGE `pd_price` `pd_price` int NOT NULL;