--
-- Remove voucher table, add order reason cancel
--

ALTER TABLE `order` DROP FOREIGN KEY `FK_vc_od`;
ALTER TABLE `order` DROP COLUMN `vc_id`;
ALTER TABLE `order` ADD COLUMN `od_reason` TEXT NOT NULL;
ALTER TABLE `order` MODIFY COLUMN `od_reason` TEXT NOT NULL AFTER `od_note`;

DROP TABLE `voucher`;