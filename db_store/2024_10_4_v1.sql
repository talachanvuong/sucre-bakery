--
-- Change table `product_order` to `cash` and its dependencies
-- Change value type of `product`, `order` from decimal(12, 2) to int
-- 

ALTER TABLE `product_order` RENAME TO `cash`;

ALTER TABLE `cash` CHANGE `pd_od_quantity` `c_quantity` int;
ALTER TABLE `cash` CHANGE `pd_od_total_price` `c_total_price` int;

ALTER TABLE `cash` DROP FOREIGN KEY `FK_od_pd_od`;
ALTER TABLE `cash` ADD CONSTRAINT `FK_od_c` FOREIGN KEY (`od_id`) REFERENCES `order`(`od_id`);

ALTER TABLE `cash` DROP FOREIGN KEY `FK_pd_pd_od`;
ALTER TABLE `cash` ADD CONSTRAINT `FK_pd_c` FOREIGN KEY (`pd_id`) REFERENCES `product`(`pd_id`);

ALTER TABLE `order` CHANGE `od_price` `od_price` int;
ALTER TABLE `order` CHANGE `od_total_price` `od_total_price` int;

ALTER TABLE `product` CHANGE `pd_price` `pd_price` int;