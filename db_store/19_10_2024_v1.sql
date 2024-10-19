--
-- Add `cart` table and its constraint
--

CREATE TABLE `cart` (
    `ca_id` INT PRIMARY KEY AUTO_INCREMENT,
    `ca_quantity` INT,
    `us_id` INT,
    `pd_id` INT
);

ALTER TABLE `cart`
ADD CONSTRAINT `FK_us_ca`
FOREIGN KEY (`us_id`) REFERENCES `user`(`us_id`);

ALTER TABLE `cart`
ADD CONSTRAINT `FK_pd_ca`
FOREIGN KEY (`pd_id`) REFERENCES `product`(`pd_id`);