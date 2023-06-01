-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2023 lúc 03:35 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mygymstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'long7102', 'long7102@gmail.com', '$2y$10$e2qb8rN3aXTyvG8Y8pfxdOIlri6TZ8bGZY9Q4NMtG/a7OVP3hWhfu'),
(2, 'hanh2003', 'hanhyeulong@gmail.com', '$2y$10$Gy0oOhHPT8BgFNv/0zIbl.N.9VNhLo1PEFuSxCkYgEOBOWIIhVnRi'),
(3, 'admin', 'admin@gmail.com', '$2y$10$ZPr/oeGI.U/FqthNt99tM.cCT5bw4WOtXA7u02o6W4tkwunQc2DEK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(50) NOT NULL,
  `brand_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Joinder'),
(2, 'KingBox'),
(3, 'BoFit'),
(4, 'Alex'),
(5, 'Spirit'),
(6, 'Impulse'),
(7, 'CyberGym'),
(9, 'Avi'),
(10, 'Không có thương hiệu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(12, '::1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(50) NOT NULL,
  `category_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Tạ đòn'),
(2, 'Tạ đơn - Tạ đôi'),
(3, 'Giàn tạ '),
(4, 'Xà đơn - Xà kép'),
(5, 'Ghế tập'),
(6, 'Máy tập chạy'),
(7, 'Máy tập bụng'),
(11, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 636149193, 13, 1, 'Đang chờ'),
(2, 1, 1865743443, 10, 1, 'Đang chờ'),
(3, 1, 327356329, 11, 1, 'Đang chờ'),
(4, 1, 288388038, 11, 1, 'Đang chờ'),
(5, 1, 1790548884, 13, 2, 'Đang chờ'),
(6, 2, 95751439, 10, 1, 'Đang chờ'),
(7, 2, 300146520, 12, 1, 'Đang chờ'),
(8, 2, 873134390, 3, 3, 'Đang chờ'),
(9, 2, 214436951, 12, 2, 'Đang chờ'),
(10, 2, 629007326, 1, 1, 'Đang chờ'),
(11, 2, 1233309001, 12, 3, 'Đang chờ'),
(12, 2, 2072006408, 6, 5, 'Đang chờ'),
(13, 2, 1028911510, 17, 1, 'Đang chờ'),
(14, 2, 1136661133, 13, 1, 'Đang chờ'),
(15, 2, 1691504094, 8, 1, 'Đang chờ'),
(16, 2, 794717482, 17, 1, 'Đang chờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(250) NOT NULL,
  `product_description` varchar(700) NOT NULL,
  `product_keywords` varchar(250) NOT NULL,
  `category_id` int(100) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Tạ tay cao su nhập khẩu Technogym', 'Tạ Tay Technogym là mẫu tạ tay được nhập khẩu chính hãng không còn xa lạ với các bạn tập ngoài phòng gym cao cấp, Tạ tay Technogym được thiết kế khác biệt với các mẫu tạ tay cùng loại, 2 đầu bọc cao su cao cấp chịu lực, tay cầm inox sáng bóng với các đường kính to hơn và vân nhám. ', 'Tạ,tay,nhập khẩu,Technogym,tạ tay,tạ đơn,tạ đôi,technogym,cao su', 0, 0, 'Ta-tay-cao-su-nhap-khau-technogym-b.jpg', 'Ta-tay-cao-su-nhap-khau-technogym-a.jpg', 'Ta-tay-cao-su-nhap-khau-technogym-d.jpg', '175000', '2023-03-22 11:19:36', 'Còn hàng'),
(2, 'Tạ bình vôi cao su nhập khẩu Technogym', 'Tạ bình vôi Technogym được đúc cốt thép nguyên khối, sử dụng cao su vân nhám chịu lực PE cao cấp ép khuôn 100%, tay cầm rộng, tiêu chuẩn nhẵn mịn giúp cầm nắm không bị trơn trượt.', 'Tạ,bình,vôi,cao su,nhập khẩu,tạ đơn,tạ đôi,tạ bình vôi,technogym', 0, 0, 'Ta-binh-voi-cao-su-nhap-khau-technogym-b.jpg', 'Ta-binh-voi-cao-su-nhap-khau-technogym-c.jpg', 'Ta-binh-voi-cao-su-nhap-khau-technogym-f.jpg', '150000', '2023-05-10 12:03:14', 'true'),
(3, 'Bánh tạ cao su Technogym phi 50 nhập khẩu', 'Bánh tạ cao su Technogym phi 50 nhập khẩu được cấu tạo từ thép bọc cao su cao cấp, không độc hại an toàn cho người sử dụng. Sản phẩm có độ bền cao, tuổi thọ sử dụng lâu hơn các sản phẩm thông thường khác.  ', 'Bánh tạ cao su Technogym phi 50 nhập khẩu, bánh tạ, technogym,tạ', 2, 8, 'Banh-ta-cao-su-Technogym-phi-50-nhap-khau.jpg', 'Banh-ta-cao-su-Technogym-phi-50-nhap-khau-b.jpg', 'Banh-ta-cao-su-Technogym-phi-50-nhap-khau-d(1).jpg', '60000', '2023-03-11 08:36:36', 'true'),
(4, 'Tạ đĩa hợp kim Technogym Urethane', 'Tạ đĩa Urethene Technogym được bọc PU cao cấp chất lượng chịu lực tốt, không bị bong tróc trong quá trình sử dụng, cực bền, chuẩn phi 50. Tạ đĩa Urethene Technogym thường được sử dụng trong các phòng tập thể hình bởi khả năng chịu mài mòn tốt.', 'Tạ đĩa Technogym Urethane,tạ đĩa,technogym', 2, 8, 'ok22233-7667.jpg', '33-300x300.jpg', '16-1.jpg', '85000', '2023-03-13 02:09:36', 'true'),
(5, 'Tạ tay điều chỉnh BoFit 32Kg', 'Bộ tạ tay điều chỉnh BoFit 32kg, việc tập luyện trở nên đơn giản, bộ tạ đa năng này hoàn toàn phù hợp với bạn. Tập luyện với sản phẩm này sẽ đem lại hiệu quả cao. Được làm từ vật liệu chất lượng tốt, các tấm thép chịu lực có lớp phủ bền bỉ và đế chống lật. Khi được tháo ra khỏi giá đỡ, tay cầm sẽ tự khóa khỏi xoắn Chắc chắn, đây là một sản phẩm an toàn và đáng tin cậy.', 'tạ,tạ tay,tạ đơn,bofit', 2, 3, 'ta-dieu-chinh-bofit.jpg', '32kg.d1.png', '32kg.d.png', '500000', '2023-03-13 02:02:37', 'true'),
(6, 'Tạ tay sắt tháo lắp linh hoạt Bofit 10Kg', 'Tạ tay sắt tháo lắp Bofit 10Kg, chất liệu gang, đòn tay inox, dễ cầm nắm trong quá trình tập luyện, có thể tuỳ chỉnh khối lượng cân nặng phù hợp với thể trạng mỗi người', 'tạ, tạ tay, tạ đơn,bofit,tháo lắp', 2, 3, 'ta-sat.jpg', 'don-ta-tay-inox-38cm-1.jpg', 'ta-dia-sat-bofit-2kg-1-768x576.jpg', '250000', '2023-05-10 12:03:35', 'true'),
(7, 'Tạ Tay Cao su Đòn Inox BOFIT chất lượng cao', 'Lõi trong bằng thép, bên ngoài có phủ một lớp cao su êm. Được nhận xét là một trong những dụng cụ tập thể dục hiệu quả cho phần cơ cánh tay, cổ tay. Giúp bạn sở hữu được cánh tay thon gọn, săn chắc. Với một chế độ tập luyện thường xuyên và ăn uống điều độ. Đây gần như là một dụng bắt buộc với phòng gym, người tập gym.', 'tạ,tạ tay,tạ đơn, cao su,bofit,inox', 2, 3, 'ta-tay-cao-su-bofit-12.5kg.jpg', 'ta-bofit-12.5kg.jpg', '91095682_2486330124952650_5964417716700839936_o-370x347.jpg', '250000', '2023-03-13 02:08:52', 'true'),
(8, 'Tạ Liền Đòn Thương Hiệu Joinder JD1510', 'Tạ Joinder JD1510 có kết cấu từ thép hợp kim (alloy steel), là loại thép bao gồm sắt, cacbon, và một số yếu tố khác. Những đặc điểm vượt trội của các sản phẩm làm từ thép hợp kim có thể kể đến như: tuổi thọ cao, chịu nhiệt tốt, không bị biến dạng dù ở nhiệt độ cao, chống rỉ sét hay oxy hóa bởi không khí. ', 'tạ,tạ đòn,joinder', 1, 1, 'ta-lien-don-joinder-jd1510-c-768x768.jpg', 'ta-lien-don-joinder-jd1510-b.jpg', 'ta-lien-don-joinder-jd1510-a-768x768.jpg', '1000000', '2023-03-13 02:14:18', 'true'),
(10, 'Tạ thanh đòn hợp kim thẳng Bofit ', 'Tạ thanh đòn BoFit chất liệu cao su bền đẹp, thỏa mái luyện tập tại nhà đem lại hiệu quả cao và trải nghiệm tuyệt vời như ở phòng tập', 'tạ,tạ đòn,bofit', 1, 3, 'ta-thanh-don-bofit-10kg.jpg', 'ta-don-bofit.jpg', 'ta-thanh-don-bofit-20kg.jpg', '450000', '2023-03-13 02:16:27', 'true'),
(11, 'Tạ Đòn Thanh Chữ Z Rotating Alex', 'Tạ đòn chữ Z (Rotating Curl Rubber) Barbell Alex hay còn được gọi là tạ đòn cong, tạ đòn ziczac,… là sản phẩm được thiết kế uốn theo hình sin (theo hình chữ Z), được làm từ chất liệu thép cao cấp không rỉ sét và có ren xoắn ốc ở 2 đầu dùng làm chốt an toàn giúp giữ bánh tạ trong quá trình tập.  Tạ đòn chữ Z giúp bạn dễ dàng cầm, nắm và lên tạ trên vai dễ dàng hơn. Nó có thể đáp ứng được hầu hết những nhu cầu luyện tập của người dùng.', 'tạ,tạ đòn,tạ chữ z, alex', 1, 4, 'ta-don-chu-Z-barbell-alex-vuacobap2.jpg', 'ta-don-chu-Z-barbell-alex-vuacobap3.jpg', 'ta-don-chu-Z-barbell-alex-vuacobap1.jpg', '3000000', '2023-03-13 02:18:21', 'true'),
(12, 'Tạ Đòn Thanh Thẳng Rotating Alex', 'Tạ đòn thẳng Barbell Alex được làm từ thép không gỉ. Với thiết kế độ nhám ở vị trí tay chuẩn giúp hạn chế chấn thương và tránh trơn trượt khi nâng tạ.  Tạ đòn thẳng có mức trọng lượng đa dạng gồm 10Kg, 15Kg, 20Kg, 25Kg, 30Kg để người dùng lựa chọn.  Tạ 2 bên đòn thẳng được bọc cao su mềm, tránh làm trầy xước sàn và hạn chế bị lăn trên mặt phẳng.', 'tạ,tạ đòn,alex', 1, 4, 'ta-don-thang-barbell-alex-vuacobap2-768x1024.jpg', 'ta-don-thang-barbell-alex-vuacobap1.jpg', 'ta-don-thang-barbell-alex-vuacobap3.jpg', '2500000', '2023-03-13 02:20:14', 'true'),
(13, 'Giàn Tập Tạ Đa Năng Joinder JD3100', 'Joinder JD3100 là giàn tạ đa năng được sử dụng phổ biến tại các phòng tập gym khách sạn, phòng tập gia đình, phòng gym văn phòng,… Đây là phiên bản nâng cấp, cải tiến năm 2021. Sản phẩm dùng tập nhiều nhóm cơ như ngực, lưng xô, tay, chân,…', 'giàn tập tạ, tạ,joinder,giàn tạ đa năng', 3, 1, 'gian-tap-ta-da-nang-gia-dinh-joinder-jd3100-red-p0-768x768.jpg', 'gian-tap-ta-da-nang-gia-dinh-joinder-jd3100-yellow-p0-768x768.jpg', 'gian-tap-ta-da-nang-gia-dinh-joinder-jd3100-1.jpg', '4500000', '2023-03-13 14:31:34', 'true'),
(16, 'Thảm tập yoga', 'Thảm tập yoga 6mm định tuyến AVI chống trơn cực tốt, thảm yoga cực thông thoáng khi tập', 'thảm,thảm tập,yoga', 11, 10, '7cd712fd-e313-47e5-909f.jpg', 'tham-tap-yoga-tpe-wtm.jpg', 'e8ef3d5e-a432-4bb4-93a9-.jpg', '155000', '2023-05-25 06:04:53', 'Còn'),
(17, 'Dụng cụ tập kháng lực cho ngón tay', 'phục hồi sức mạnh cầm nắm ngón tay, sức mạnh cơ tay thể dục nhỏ  Độ đàn hồi tốt, tạo cảm giác cầm nắm tốt, thuận tiện cho người dùng khi cầm nắm, rèn luyện sức mạnh ngón tay, thiết kế chống rơi lỗ ngón tay', 'kháng lực,gripper,ngón tay', 11, 10, 's-l1600.jpg', 'S163e4c008fce405ebd5a2b68f0a1b71am.jpg', '9fd0bc9f10900fe6ba9cd99d3a79a502beb98b4c_original.jpeg', '200000', '2023-05-25 06:07:51', 'Còn'),
(18, 'Kìm bóp tay chữ A', 'Thường xuyên luyện tập với kìm bóp tay sẽ giúp bạn tăng lực nắm, tăng cơ, giúp cổ tay khỏe hơn, từ đó cải thiện hiệu quả các hoạt động thể thao, tập thể hình. ', 'kìm,bóp,tay,kìm bóp tay', 11, 10, 'shopping.jpg', 'shopping3.jpg', 'kim-tap-co-tay-chu-a-tap-the-duc-luyen-co-tay-tai-nha-62038e1d1b9df-09022022164917.jpg', '75000', '2023-05-25 06:10:27', 'Còn'),
(19, 'Dây nhảy lõi hợp kim thép', 'Nhảy dây có thể giúp tối đa hóa quá trình tập luyện của bạn, ngay cả khi bạn chỉ có vài phút nó giúp bạn cải thiện sức khỏe, dẻo dai, tinh nhanh; tăng sự linh hoạt và khả năng phối hợp; tăng sự trao đổi chất của cơ thể; cải thiện sức khỏe tim mạch; tăng cường mật độ xương; tăng hiệu quả hơi thở; đốt calo, đốt mỡ nhanh, hỗ trợ giảm cân (các nghiên cứu đã chỉ ra lượng calo đốt cháy trong 10 phút nhảy dây liên tục tương đương với thời gian chạy bộ 30 phút); loại bỏ nhiều độc tố, mang lại tâm trạng thoải mái', 'dây nhảy, dây', 11, 10, '57bdae76e11901c4694a8e31944d3b8c.jpg', '6294d80c0c1197e4109b8ca5372bf1a6.jpg_240x240q80.jpg', '747434862e6485d210af285f9460744f.jpg', '85000', '2023-05-25 06:14:23', 'Còn hàng'),
(20, 'Protein Bar', 'Thanh protein cung cấp năng lượng cho cả buổi tập, có nhiều hương vị khác nhau', 'protein,protein bar,bar', 11, 10, 'Protein-bars-1296x728-body-1296x729.jpg', 'protein-bars-scaled.jpg', 'BioTech-USA-Protein-Bar.jpg', '75000', '2023-05-26 14:33:12', 'Còn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 3075000, 961674570, 2, '2023-03-20 13:55:32', 'Đang chờ'),
(10, 1, 7575000, 1996357829, 3, '2023-03-20 13:55:36', 'Đang chờ'),
(11, 1, 7575000, 1275569540, 3, '2023-03-20 13:55:40', 'Đang chờ'),
(12, 1, 7575000, 2079476611, 3, '2023-03-20 13:55:46', 'Đang chờ'),
(13, 1, 7575000, 1526544460, 3, '2023-03-20 13:55:50', 'Đang chờ'),
(14, 1, 22725000, 289220584, 3, '2023-03-20 13:55:55', 'Đang chờ'),
(15, 1, 24075000, 1081292744, 4, '2023-03-20 13:55:16', 'Đang chờ'),
(16, 1, 7950000, 636149193, 3, '2023-03-20 14:08:57', 'Đang chờ'),
(17, 1, 450000, 1865743443, 1, '2023-03-21 02:53:05', 'Đang chờ'),
(18, 1, 3000000, 327356329, 1, '2023-03-21 04:18:46', 'Đang chờ'),
(20, 1, 3130000, 288388038, 3, '2023-03-21 04:22:54', 'Đang chờ'),
(21, 1, 10000000, 1790548884, 2, '2023-03-21 06:01:30', 'Đang chờ'),
(22, 2, 1950000, 95751439, 3, '2023-05-25 05:32:33', 'Hoàn thành'),
(23, 2, 5750000, 300146520, 3, '2023-05-25 05:31:44', 'Hoàn thành'),
(24, 2, 180000, 873134390, 1, '2023-05-25 11:59:45', 'Hoàn thành'),
(25, 2, 11500000, 214436951, 3, '2023-05-25 12:22:03', 'Hoàn thành'),
(26, 2, 175000, 629007326, 1, '2023-05-25 13:09:43', 'Hoàn thành'),
(27, 2, 7500000, 1233309001, 1, '2023-05-25 13:22:06', 'Hoàn thành'),
(28, 2, 1250000, 2072006408, 1, '2023-05-26 14:38:48', 'Hoàn thành'),
(29, 2, 10460000, 1028911510, 6, '2023-05-25 13:28:15', 'Hoàn thành'),
(30, 2, 4750000, 1136661133, 2, '2023-05-26 14:28:51', 'Đang chờ'),
(31, 2, 1000000, 1691504094, 1, '2023-05-28 00:58:24', 'Đang chờ'),
(32, 2, 355000, 794717482, 2, '2023-05-28 00:59:22', 'Đang chờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 26, 629007326, 175000, 'Apple Pay', '2023-05-25 13:12:58'),
(2, 27, 1233309001, 7500000, '', '2023-05-25 13:22:06'),
(3, 29, 1028911510, 10460000, 'Net Banking', '2023-05-25 13:28:15'),
(4, 28, 2072006408, 1250000, 'VN Pay', '2023-05-26 14:38:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'hanh2k3', 'ngochanh2k3@gmail.com', '$2y$10$62.dwmZ.qjnxY/4ulcMEEeHOsRiCeUrLOsnxfjs9XbhnyFe1oSgia', '270228245_625951878626500_6236104129080433913_n.jpg', '::1', '127 Lò Đúc, Hoàng Mai, Hà Nội', '08571027102'),
(8, 'long7102', 'longyeuhanh@gmail.com', '$2y$10$826i96k4sc58/yA6f3BI6.qEoC/wBLYDzK7BTNG1.J59kgS2T/B/2', '248959856_938759783686398_982923409830170398_n.jpg', '::1', 'Thanh Trì, Hoàng Mai', '07102710212'),
(12, 'longyeuhanh123', 'longhanh@gmail.com', '$2y$10$5fxZjdrLvld2mnRlTVV7G.GsOOXlXbFhSvJA84B7GMsA8S.CPRZQa', '243029792_187649273501910_3861298142506101875_n.jpg', '::1', '127 Thanh Trì, Hoàng Mai, Hà Nội', '071027102');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
