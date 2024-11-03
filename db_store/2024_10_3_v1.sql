-- 
-- Init database
--

CREATE TABLE `user` (
  `us_id` int PRIMARY KEY AUTO_INCREMENT,
  `us_name` varchar(50) NOT NULL,
  `us_password` varchar(50) NOT NULL,
  `us_number_phone` varchar(12) NOT NULL,
  `us_address` varchar(100) NOT NULL
);

CREATE TABLE `order` (
  `od_id` int PRIMARY KEY AUTO_INCREMENT,
  `od_created` datetime NOT NULL,
  `od_delivery` datetime NOT NULL,
  `od_address` varchar(255) NOT NULL,
  `od_price` decimal(12,2) NOT NULL,
  `od_total_price` decimal(12,2) NOT NULL,
  `od_approval` datetime,
  `us_id` int,
  `os_id` int,
  `vc_id` int,
  `ad_id` int
);

CREATE TABLE `product` (
  `pd_id` int PRIMARY KEY AUTO_INCREMENT,
  `pd_name` varchar(50) NOT NULL,
  `pd_price` decimal(12,2) NOT NULL,
  `pd_description` text NOT NULL,
  `pdt_id` int,
  `pd_image` longblob NOT NULL
);

CREATE TABLE `product_order` (
  `pd_id` int,
  `od_id` int,
  `pd_od_quantity` int NOT NULL,
  `pd_od_total_price` decimal(12,2) NOT NULL,
  PRIMARY KEY (`pd_id`, `od_id`)
);

CREATE TABLE `product_type` (
  `pdt_id` int PRIMARY KEY AUTO_INCREMENT,
  `pdt_name` varchar(100) NOT NULL
);

CREATE TABLE `voucher` (
  `vc_id` int PRIMARY KEY AUTO_INCREMENT,
  `vc_name` varchar(50) NOT NULL,
  `vc_expired` datetime NOT NULL,
  `vc_discount` double NOT NULL
);

CREATE TABLE `order_status` (
  `os_id` int PRIMARY KEY AUTO_INCREMENT,
  `os_name` varchar(50) NOT NULL
);

CREATE TABLE `admin` (
  `ad_id` int PRIMARY KEY AUTO_INCREMENT,
  `ad_name` varchar(50) NOT NULL,
  `ad_password` varchar(50) NOT NULL
);

ALTER TABLE `product_order`
ADD CONSTRAINT `FK_od_pd_od`
FOREIGN KEY (`od_id`) REFERENCES `order`(`od_id`);

ALTER TABLE `product_order`
ADD CONSTRAINT `FK_pd_pd_od`
FOREIGN KEY (`pd_id`) REFERENCES `product`(`pd_id`);

ALTER TABLE `order`
ADD CONSTRAINT `FK_os_od`
FOREIGN KEY (`os_id`) REFERENCES `order_status`(`os_id`);

ALTER TABLE `order`
ADD CONSTRAINT `FK_vc_od`
FOREIGN KEY (`vc_id`) REFERENCES `voucher` (`vc_id`);

ALTER TABLE `order`
ADD CONSTRAINT `FK_us_od`
FOREIGN KEY (`us_id`) REFERENCES `user`(`us_id`);

ALTER TABLE `order`
ADD CONSTRAINT `FK_ad_od`
FOREIGN KEY (`ad_id`) REFERENCES `admin`(`ad_id`);

ALTER TABLE `product`
ADD CONSTRAINT `FK_pdt_pd`
FOREIGN KEY (`pdt_id`) REFERENCES `product_type`(`pdt_id`);

INSERT INTO `admin` (`ad_name`, `ad_password`) VALUES 
('admin', 'admin'),
('admin1', 'admin1'),
('admin2', 'admin2'),
('admin3', 'admin3');

INSERT INTO `product_type` (`pdt_name`) VALUES 
('Bánh trung thu'),
('Bánh sinh nhật'),
('Bánh ngọt'),
('Bánh mặn'),
('Khác');

INSERT INTO `order_status` (`os_name`) VALUES 
('Chờ tiếp nhận'),
('Đang làm'),
('Đã giao'),
('Đã huỷ');

INSERT INTO `voucher` (`vc_name`, `vc_expired`, `vc_discount`) VALUES 
('COMMON', '2025/1/1', 0.1),
('RARE', '2025/1/1', 0.2),
('VIP', '2025/1/1', 0.25),
('SUPER', '2025/1/1', 0.4);

INSERT INTO `product` (`pd_name`, `pd_price`, `pd_description`, `pdt_id`, `pd_image`) VALUES
('Phô mai chocolate hạt điều',
  '95000',
  'Bánh trung thu Phô Mai Chocolate – Hạt Điều được làm từ những nguyên liệu tự nhiên tươi ngon cao cấp, chọn lọc kỹ lưỡng. Vỏ bánh mềm mịn, mang màu sắc và hương vị đặc trưng của chocolate. Nhân bánh là sự hòa quyện hoàn hảo giữa phô mai béo ngậy, chocolate đậm đà và hạt điều bùi thơm, tạo nên một trải nghiệm ẩm thực độc đáo và hấp dẫn.',
  1,
  LOAD_FILE('')),
('Phô mai dưa lưới hạt chia',
  '95000',
  'Bánh trung thu Phô Mai Dưa Lưới – Hạt Chia là sự kết hợp hoàn hảo giữa lớp vỏ bánh mềm mịn và nhân bánh độc đáo. Thành phần bao gồm bột mì, trứng gà, phô mai béo ngậy, dưa lưới thơm ngọt và hạt chia giàu dinh dưỡng.',
  1,
  LOAD_FILE('')),
('Lava phô mai hoàng kim',
  '105000',
  'Bánh Trung Thu Phô Mai Hoàng Kim chinh phục thực khách bởi sự kết hợp hoàn hảo giữa những nguyên liệu cao cấp, tạo nên hương vị độc đáo và sang trọng khó cưỡng. Nhân bánh là sự hòa quyện tuyệt vời của phô mai mềm mịn, béo ngậy cùng vị ngọt thanh tao, mang đến trải nghiệm vị giác bùng nổ. Vỏ bánh than tre không chỉ tạo nên màu sắc mới lạ mà còn mang đến cảm giác thanh nhẹ, bổ dưỡng cho sức khỏe.',
  1,
  LOAD_FILE('')),
('Mochi hạt sen lava trà xanh',
  '105000',
  'Bánh trung thu Mochi Hạt Sen – Lava Trà Xanh là một sự kết hợp hoàn hảo giữa truyền thống và hiện đại, mang đến hương vị độc đáo và hấp dẫn cho người thưởng thức.',
  1,
  LOAD_FILE('')),
('Thập cẩm cá hồi sốt chanh leo',
  '165000',
  'Bánh trung thu Thập Cẩm Cá Hồi Sốt Chanh Leo (1 Trứng) là một sự kết hợp đầy sáng tạo, mang lại trải nghiệm ẩm thực độc đáo cho người thưởng thức.',
  1,
  LOAD_FILE('')),
('Than tre sò điệp trứng cá tằm',
  '165000',
  'Bánh Trung Thu Than Tre Sò Điệp – Trứng Cá Tầm mang đến trải nghiệm ẩm thực vô cùng mới lạ và hấp dẫn.',
  1,
  LOAD_FILE('')),



('Bánh kem dâu và vani',
  '595000',
  'Mousse dâu, kem bavaroise vani, mứt dâu, bánh lady fingers, các loại dâu tươi.',
  2,
  LOAD_FILE('')),
('Bánh kem trà bá tước, quả lý chua đen',
  '565000',
  'Mousse trà earl grey, thạch quả lý chua đen & oải hương, ganache trà earl grey, bánh lady fingers thấm oải hương.',
  2,
  LOAD_FILE('')),
('Bánh tiramisu xoài và chanh dây',
  '475000',
  'Kem tiramisu, mứt xoài và chanh dây, bánh lady fingers thấm xoài và chanh dây, thạch xoài và chanh dây, kem tươi.',
  2,
  LOAD_FILE('')),
('Bánh kem hạt phỉ',
  '575000',
  'Kem bavaroise hạt phỉ, bánh, bánh sô-cô-la, praliné hạt phỉ, sốt caramel chảy.',
  2,
  LOAD_FILE('')),
('Bánh kem 6 lớp chuối',
  '550000',
  'Mứt chuối, mousse dừa, praliné hạt điều, bánh génoise, kem tươi chuối.',
  2,
  LOAD_FILE('')),
('Bánh kem trà xanh dâu latte',
  '585000',
  'Kem matcha, ganache matcha, kem ganache matcha, mousse dâu, bánh lady fingers thấm latte Trà Xanh.',
  2,
  LOAD_FILE('')),



('Earlgrey Dulcey Mandarin',
  '115000',
  'Vị trà Flowery Earlgrey đậm hương thơm từ hoa và vỏ cam Bergamot hoà quyện cùng lớp mousse Earlgrey với socola top 1 thế giới "Valdora Dulcey" * BST " Vườn ươm nắng hạ" sẽ lên...',
  3,
  LOAD_FILE('')),
('Soursop Avocado',
  '105000',
  'Vị chua mát của quả mãng cầu tươi kết hợp với lớp kem béo ngậy của bơ tươi. Đế bạt được nướng cùng với xoài tạo nên sự cân bằng giữa chua ngọt ngậy.',
  3,
  LOAD_FILE('')),
('Vanilla Strawberry Roll Gato',
  '115000',
  'Kem vanila cuộn cùng lớp bạt vanilla, phần nhân là lớp mứt dâu tươi nhà làm, trang trí phía trên mứt dâu kết hợp với vỏ chanh cùng với dâu tươi. Vị chua thơm từ dâu,...',
  3,
  LOAD_FILE('')),
('Burnt Caramel Signature',
  '105000',
  'Lớp  kem caramel valhora dulcey thơm ngậy kết hợp với hương vị caramel đường khò từ lớp đổ mặt, bên trong là lớp nhân dẻo thơm nhẹ mùi caramel mặn với lớp bạt gato caramel...',
  3,
  LOAD_FILE('')),
('Tiramisu De Caramel',
  '105000',
  'Sự kết hợp của cốt bánh cà phê cùng lớp kem pho mai mascapone mềm mịn, bên trong là lớp nhân Caramel dẻo quánh cùng với cà phê Arabica.Bánh thơm đậm mùi cà phê & caramel,...',
  3,
  LOAD_FILE('')),
('Mango Pinepple Roll Gato',
  '115000',
  'Mango Pineapple Roll Gato - Dòng bánh Gato, vị Gato Xoài Dứa & Lá NếpChua nhẹ từ kem xoài cuộn cùng với bạt lá nếp, thơm từ sốt nhiệt đới chanh leo, trang trí phía...',
  3,
  LOAD_FILE('')),



('Sừng bò',
  '15000',
  'Bột mỳ, bơ, đường, muối',
  4,
  LOAD_FILE('')),
('Jambong',
  '28000',
  'Bột mỳ, ruốc, sốt thịt jambon',
  4,
  LOAD_FILE('')),
('Ngàn lớp việt quất',
  '15000',
  'Bột mỳ, bơ, mứt việt quất, phụ gia',
  4,
  LOAD_FILE('')),
('Bánh xúc xích hoa',
  '28000',
  'Bột mỳ, ruốc, sốt, xúc xích, muốI, phụ gia',
  4,
  LOAD_FILE('')),
('Pain chocolate',
  '18000',
  'Bột mỳ, bơ, socola, phụ gia',
  4,
  LOAD_FILE('')),
('Pateso mini',
  '10000',
  'Bột mỳ, bơ, thịt lợn xay, hành, gia vị',
  4,
  LOAD_FILE(''));