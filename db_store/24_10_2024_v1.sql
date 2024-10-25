--
--  Add created on column on some N - N tables
--

ALTER TABLE `cart` ADD `ca_created_on` DATETIME NOT NULL;

ALTER TABLE `cash` ADD `c_created_on` DATETIME NOT NULL;
ALTER TABLE `order` CHANGE `od_created` `od_created_on` DATETIME NOT NULL;