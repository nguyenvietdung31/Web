DROP TABLEadmin;

CREATE TABLE `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO admin VALUES("1","admin","202cb962ac59075b964b07152d234b70","1");
INSERT INTO admin VALUES("2","admin1","admin1","1");
INSERT INTO admin VALUES("3","vietdung","a123456","1");



DROP TABLEbrands;

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO brands VALUES("1","Panasonic","1");
INSERT INTO brands VALUES("2","LG","1");
INSERT INTO brands VALUES("3","Suzuki","1");
INSERT INTO brands VALUES("5","Yamaha","1");
INSERT INTO brands VALUES("6","Samsung","1");
INSERT INTO brands VALUES("7","Sony","0");



DROP TABLEcategories;

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO categories VALUES("1","Tivi","1");
INSERT INTO categories VALUES("2","Tủ lạnh","1");
INSERT INTO categories VALUES("3","Máy giặt","1");
INSERT INTO categories VALUES("4","Máy lạnh, quạt, điều hòa","1");
INSERT INTO categories VALUES("5","Đồ bếp","1");
INSERT INTO categories VALUES("6","Chưa biết","0");



DROP TABLEcomments;

CREATE TABLE `comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `member_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO comments VALUES("1","2","4","2021-08-04 23:22:10","aaaaaaaaa","0");
INSERT INTO comments VALUES("2","2","2","2021-08-04 23:24:27","BBBBBBB","0");
INSERT INTO comments VALUES("3","3","5","2021-08-04 23:26:49","CCCCCCC","1");
INSERT INTO comments VALUES("4","3","5","2021-08-04 23:27:36","DDDDDDDD","0");
INSERT INTO comments VALUES("5","4","0","2021-08-05 08:50:21","EEEEEEE","0");
INSERT INTO comments VALUES("6","4","2","2021-08-05 09:32:58","FFFFFFFFF","1");
INSERT INTO comments VALUES("7","1","4","2021-08-05 09:36:11","OOOOOOOOO","0");
INSERT INTO comments VALUES("8","1","5","2021-08-05 09:40:30","wqeqweqeqwe4","0");



DROP TABLEmembers;

CREATE TABLE `members` (
  `member_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO members VALUES("11","hungphamprovip","123456789","Hưng Ank Fạm","0123456789","Việt Chì Fú Thọ","hungwanhfam@yahoo.com","1");
INSERT INTO members VALUES("12","user1","123456789","User1","0147258369","Hai Phong","User1@dienmayxanh.com","1");
INSERT INTO members VALUES("13","user2","d41d8cd98f00b204e9800998ecf8427e","ASdasdasdasd","0156489855","Hai Phong","user2@gmail.com","1");



DROP TABLEorderdetail;

CREATE TABLE `orderdetail` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO orderdetail VALUES("1","19","1","3400000");
INSERT INTO orderdetail VALUES("1","22","1","3400000");
INSERT INTO orderdetail VALUES("1","23","1","3400000");
INSERT INTO orderdetail VALUES("1","24","1","3400000");
INSERT INTO orderdetail VALUES("1","25","1","3400000");
INSERT INTO orderdetail VALUES("2","19","1","2100000");
INSERT INTO orderdetail VALUES("2","22","1","2100000");
INSERT INTO orderdetail VALUES("2","23","1","2100000");
INSERT INTO orderdetail VALUES("2","24","1","2100000");
INSERT INTO orderdetail VALUES("3","19","1","1200000");
INSERT INTO orderdetail VALUES("3","22","1","1200000");
INSERT INTO orderdetail VALUES("3","23","1","1200000");
INSERT INTO orderdetail VALUES("3","24","1","1200000");
INSERT INTO orderdetail VALUES("4","23","1","42333000");
INSERT INTO orderdetail VALUES("6","25","1","10000000");
INSERT INTO orderdetail VALUES("13","25","2","600000");



DROP TABLEordermethod;

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO ordermethod VALUES("1","Trực tiếp cho người giao hàng ","1");
INSERT INTO ordermethod VALUES("2","Chuyển khoản","1");
INSERT INTO ordermethod VALUES("3","Thanh toán tại shop","1");
INSERT INTO ordermethod VALUES("4","Paypal","1");



DROP TABLEorders;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_method_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Huỷ ',
  `name` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO orders VALUES("19","1","11","2021-11-05 10:08:28","1","Hưng Ank Fạm","Việt Chì Fú Thọ","0123456789","hungwanhfam@yahoo.com","");
INSERT INTO orders VALUES("22","1","11","2021-11-05 11:03:02","3","Hưng Ank Fạm","Việt Chì Fú Thọ","0123456789","hungwanhfam@yahoo.com","Giao trong ngafy");
INSERT INTO orders VALUES("23","2","11","2021-11-12 09:54:15","3","Hưng Ank Fạm","Việt Chì Fú Thọ","0123456789","hungwanhfam@yahoo.com","Giao cẩn thận k hỏng");
INSERT INTO orders VALUES("24","1","12","2021-11-25 15:31:01","3","User1","Hai Phong","0147258369","User1@dienmayxanh.com","Giao ngay hom nay");
INSERT INTO orders VALUES("25","4","12","2021-11-25 19:34:09","3","User1","Hai Phong","0147258369","User1@dienmayxanh.com","giao cang som cang tot");



DROP TABLEproducts;

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_cat` int(5) NOT NULL,
  `product_brand` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO products VALUES("1","2","3","Tủ lạnh panasonic","3400000","tulanhpana.jpg","<p>Tủ lạnh panasonic</p>
","1");
INSERT INTO products VALUES("2","4","2","Điều hòa inventer","2100000","dieuhoa.jpg","Điều hòa inventer","1");
INSERT INTO products VALUES("3","3","3","Máy giặt","1200000","maygiat.jpg","Máy giặt","1");
INSERT INTO products VALUES("4","2","2","Tủ lạnh samsung","42333000","tulanhsamsung.jpg","Tủ lạnh samsung","1");
INSERT INTO products VALUES("5","5","5","Lò vi sóng sharp","1200000","lovisong.jpg","Lò vi sóng sharp","1");
INSERT INTO products VALUES("6","1","2","TV LG","10000000","tvlg.jpg","<p>TV LG</p>
","1");
INSERT INTO products VALUES("8","1","1","Tivi Panasonic","120000000","tivipanasonic.jpg","<p>TV panasonic</p>","1");
INSERT INTO products VALUES("11","3","3","Máy giặt Beko","8790000","maygiat2.jpg","Máy giặt Beko","1");
INSERT INTO products VALUES("12","4","2","Quạt hơi nước","1500000","quathoinuoc.jpg","","1");
INSERT INTO products VALUES("13","5","5","Bếp từ sunhouse","600000","beptu.jpg","","1");



