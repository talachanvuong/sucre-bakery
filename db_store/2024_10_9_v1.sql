--
-- Add unique type to `name` column of some tables
--

ALTER TABLE `admin` CHANGE `ad_name` `ad_name` varchar(50) NOT NULL UNIQUE;

ALTER TABLE `order_status` CHANGE `os_name` `os_name` varchar(50) NOT NULL UNIQUE;

ALTER TABLE `product` CHANGE `pd_name` `pd_name` varchar(50) NOT NULL UNIQUE;

ALTER TABLE `product_type` CHANGE `pdt_name` `pdt_name` varchar(100) NOT NULL UNIQUE;

ALTER TABLE `user` CHANGE `us_name` `us_name` varchar(50) NOT NULL UNIQUE;

ALTER TABLE `voucher` CHANGE `vc_name` `vc_name` varchar(50) NOT NULL UNIQUE;