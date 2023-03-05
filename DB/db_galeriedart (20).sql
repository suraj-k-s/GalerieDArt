-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 12:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_galeriedart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Divya Varghese', 'divya09@gmail.com', '3579'),
(2, 'Chithira Ravi', 'chithira@gmail.com', '4590');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_art`
--

CREATE TABLE `tbl_art` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(100) NOT NULL,
  `genere_id` int(11) NOT NULL,
  `art_photo` varchar(100) NOT NULL,
  `art_price` varchar(50) NOT NULL,
  `art_details` varchar(100) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `art_status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_art`
--

INSERT INTO `tbl_art` (`art_id`, `art_title`, `genere_id`, `art_photo`, `art_price`, `art_details`, `artist_id`, `art_status`) VALUES
(4, 'Canvas painting', 2, 'canvas painting.png', '500', 'acrylic painting on canvas', 4, '1'),
(7, 'Buddha Paintings', 3, 'Screenshot_20220912-190153.jpg', '1200', 'Loard Budhas Painting with frame.\r\nFrame:wood\r\nType:Oil paint', 6, '0'),
(8, 'Kathakali-Canvas painting', 5, 'Screenshot_20221106-102853_Chrome.jpg', '1999', '* Premium quality print & canvas\r\n* Colour - Multicolour\r\n* Style   - Art Deco\r\n\r\n', 5, '1'),
(9, 'Guitar - Canvas Painting', 5, 'Screenshot_20221106-110621_Chrome.jpg', '1500', 'Material : Fabric\r\nStyle      : Art Deco\r\nFrame    : Unframed\r\nPaint      : Acrylic Paint', 5, '1'),
(10, 'Kathakali Dance Fabric', 5, 'Screenshot_20221106.jpg', '1700', 'Material  : Canvas\nColor      : Multicolor\nTheam    : Religious\nWidth     : 35 inches\nLength    : 35', 7, '0'),
(11, 'Paper Women Butterfly', 2, 'Screenshot_20221106-102837_Chrome.jpg', '500', 'Colour Type  : Acrylic Painting\r\nFrame Type  : Framed\r\nStyle            : Wall Deccore\r\n\r\n', 6, '1'),
(12, 'Forest Painting', 2, 'Screenshot (39).png', '720', 'Material  : Canvas\r\nColor      : Red & Black\r\nTheam    : Wall Decore\r\nWidth     : 35 inches\r\n', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artbooking`
--

CREATE TABLE `tbl_artbooking` (
  `artbooking_id` int(11) NOT NULL,
  `artbooking_date` varchar(11) NOT NULL DEFAULT '0',
  `artbooking_status` int(11) NOT NULL DEFAULT 0,
  `art_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_artbooking`
--

INSERT INTO `tbl_artbooking` (`artbooking_id`, `artbooking_date`, `artbooking_status`, `art_id`, `user_id`, `payment_status`) VALUES
(108, '2022-11-12', 4, 9, 4, 0),
(109, '2022-11-12', 4, 8, 4, 0),
(110, '2022-11-13', 1, 9, 4, 1),
(111, '2022-11-13', 1, 8, 4, 0),
(112, '2022-11-13', 1, 12, 4, 0),
(113, '2022-11-13', 1, 11, 4, 1),
(114, '2022-11-20', 4, 4, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artist`
--

CREATE TABLE `tbl_artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `artist_contact` varchar(10) NOT NULL,
  `artist_email` varchar(100) NOT NULL,
  `artist_address` varchar(100) NOT NULL,
  `artist_gender` varchar(100) NOT NULL,
  `artist_vstatus` varchar(100) NOT NULL DEFAULT '0',
  `artist_password` varchar(25) NOT NULL,
  `place_id` int(11) NOT NULL,
  `artist_photo` varchar(100) NOT NULL,
  `artist_proof` varchar(100) NOT NULL,
  `artist_doj` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_artist`
--

INSERT INTO `tbl_artist` (`artist_id`, `artist_name`, `artist_contact`, `artist_email`, `artist_address`, `artist_gender`, `artist_vstatus`, `artist_password`, `place_id`, `artist_photo`, `artist_proof`, `artist_doj`) VALUES
(1, 'Manu', '8567093456', 'manu@gmail.com', 'Thiruvananthapuram\r\nkovalam', 'Male', '1', 'abcd', 1, 'artshop.png', 'Screenshot (2).png', ''),
(3, 'Anu', '9847669034', 'anu@gmail.com', 'kovalam po\r\ntrivandrum', 'Female', '2', '234', 1, 'Screenshot (3).png', 'Screenshot (2).png', ''),
(4, 'Amala', '9946998766', 'amala123@gamil.com', 'Eravipuram PO \r\nkollam', 'Female', '1', '2347', 8, 'artgallery.jpg', 'Screenshot (11).png', ''),
(5, 'Vimal Babu', '8976468902', 'vimal@gmail.com', 'Kottarakara po\r\nKollam', 'Male', '1', '4680', 7, 'photogallery.png', 'Screenshot (8).png', ''),
(6, 'Parvathy', '8907654521', 'parvathy@gmail.com', 'MullakKal H\r\nAmbalappuzha P O\r\nAlappuzha', 'Female', '1', 'paru003', 16, 'Screenshot_20221008-181609_Chrome.jpg', 'Screenshot (12).png', ''),
(7, 'Ardra Gopi', '9037220439', 'ardragopi@gmail.com', 'Pilapilly(h)\r\nEast Okkal\r\nOkkal p.o\r\nPerumbavoor\r\n683550\r\nErnakulam', 'Female', '1', 'nifal', 18, 'Screenshot_20221008-181557_Chrome.jpg', 'Screenshot (19).png', ''),
(9, 'Agnes', '9087654467', 'agnes@gmail.com', 'Pulikal h\r\nPathanamthitta p o\r\nRanni', 'Female', '0', 'Agnes12', 14, 'Screenshot_20221008-181557_Chrome.jpg', 'Bill 1.pdf', '2022-11-12'),
(10, 'Anna  Babu', '8089242858', 'anna@gmail.com', 'Mapuncheril H\r\nKadakkanadu P O\r\nKolenchery', 'Female', '1', 'AnnaBabu123', 17, 'Screenshot_20221008-181609_Chrome.jpg', 'Bill 1.pdf', '2022-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `booking_amount` int(11) NOT NULL DEFAULT 0,
  `booking_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `user_id`, `booking_amount`, `booking_status`) VALUES
(19, '2022-11-13', 4, 100, 1),
(20, '2022-11-13', 4, 100, 1),
(21, '2022-11-13', 4, 100, 1),
(22, '2022-11-13', 4, 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_qty`, `product_id`, `booking_id`, `cart_status`) VALUES
(27, 1, 27, 19, 4),
(28, 1, 22, 20, 3),
(30, 2, 19, 21, 1),
(31, 1, 22, 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Pencil'),
(7, 'Brush'),
(8, 'Paints'),
(9, 'Canvas'),
(10, 'Decore Iteams'),
(11, 'Drawing Books');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_replay` varchar(100) NOT NULL DEFAULT 'Not Yet Replayed',
  `user_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `shop_id` int(11) NOT NULL DEFAULT 0,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_content`, `complaint_date`, `complaint_replay`, `user_id`, `complaint_status`, `shop_id`, `artist_id`) VALUES
(26, 4, 'sdfghjkl', '2022-11-13', 'dfghjkmnbv', 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(4, 'ghjkrtedyr');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_name`, `district_id`) VALUES
('Thiruvananthapuram', 1),
('Kollam', 4),
('Pathanamthitta', 6),
('Alapuzha', 7),
('Kotayam', 8),
('Idukki', 9),
('Thrissure', 11),
('Palakkad', 12),
('Malapuram', 13),
('Kozhikode', 14),
('Wayanadu', 15),
('Kazargode', 17),
('Ernakulam', 19),
('Kannure', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exhibition`
--

CREATE TABLE `tbl_exhibition` (
  `exhibition_id` int(11) NOT NULL,
  `exhibition_date` varchar(50) NOT NULL,
  `exhibition_title` varchar(100) NOT NULL,
  `exhibition_venue` varchar(100) NOT NULL,
  `exhibition_details` varchar(100) NOT NULL,
  `exhibition_photo` varchar(100) NOT NULL,
  `exhibition_fee` int(11) NOT NULL,
  `exhibition_startdate` varchar(50) NOT NULL,
  `exhibition_enddate` varchar(50) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_exhibition`
--

INSERT INTO `tbl_exhibition` (`exhibition_id`, `exhibition_date`, `exhibition_title`, `exhibition_venue`, `exhibition_details`, `exhibition_photo`, `exhibition_fee`, `exhibition_startdate`, `exhibition_enddate`, `artist_id`) VALUES
(5, '2022-11-13', 'Galeria Exhibition', 'muvatupuzha', 'asdfghjkl', 'artshop.png', 100, '2022-11-15', '2022-11-22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exhibitionbooking`
--

CREATE TABLE `tbl_exhibitionbooking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `booking_count` int(11) NOT NULL,
  `booking_fordate` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `exhibition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_exhibitionbooking`
--

INSERT INTO `tbl_exhibitionbooking` (`booking_id`, `booking_date`, `booking_count`, `booking_fordate`, `user_id`, `booking_status`, `exhibition_id`) VALUES
(9, '2022-11-12', 4, '2022-11-15', 4, 1, 4),
(10, '2022-11-13', 3, '2022-11-18', 4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_date` date NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_date`, `feedback_content`, `user_id`, `shop_id`, `artist_id`) VALUES
(1, '2022-11-20', 'wsdfghjokkuytdfghjkjbvvbn', 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genere`
--

CREATE TABLE `tbl_genere` (
  `genere_id` int(11) NOT NULL,
  `genere_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_genere`
--

INSERT INTO `tbl_genere` (`genere_id`, `genere_name`) VALUES
(1, 'Drawings'),
(2, 'Paintings'),
(3, 'Oil Painting'),
(4, 'Doodle Art'),
(5, 'Canvas Painting'),
(7, 'Mural Art');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'kovalam', 1),
(7, 'Kottarakara', 4),
(8, 'Eravipuram', 4),
(9, 'Varkala', 1),
(13, 'Thiruvalla', 6),
(14, 'Ranni', 6),
(16, 'Ambalappuzha', 7),
(17, 'Kolenchery', 19),
(18, 'Perumbavoor', 19),
(19, 'Puthencruzh', 19),
(20, 'Choondy', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_photo`, `shop_id`, `subcategory_id`, `product_details`) VALUES
(18, 'Acrylic paint', '650', 'Acrylic paint.jpg', 2, 5, 'Acrylic paint set 24 colours'),
(19, 'Water colour', '300', 'Water colour.jpg', 2, 6, 'water colour set'),
(20, 'Blacklead Pencil', '150', 'Blacklead pencils.jpg', 1, 4, 'Superior quality blacklead pencil'),
(22, 'Drawing pencil', '100', 'Drawing pencils.jpg', 1, 4, 'Drawing pencil'),
(23, 'Drawing pencil', '120', 'Drawing pencils.jpg', 2, 4, 'Drawing pencils'),
(24, 'Acrylic Colours', '290', 'acrylic.jpg', 4, 5, 'Paint Type  :Acrylic\nNet Quantity:1 \n          milliliter\nBrand     :Camel'),
(25, 'Paint Brush', '500', 'brushs.jpg', 4, 8, 'Material   : Wood\r\nBrand      : URBAN BOX\r\nPaint Type : All\r\nNumber of piece : 17'),
(27, 'Paint Brush', '390', 'paintbrush.jpg', 1, 8, 'Paint Type  : All\r\nHandle Type : Wood\r\nNumber of Piece : 12'),
(30, 'FABER-CASTELL       Colour Pencils', '250', 'pencil colour.jpg', 6, 10, 'Brand    : Faber Castell\r\nColour   : Multicolour\r\nMaterial : Wood\r\n'),
(32, 'Acrylic Paint', '₹ 500', 'acrylic.jpg', 1, 5, 'Color : Multicolor\r\nPack of 12 Colors');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `art_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `review_datetime`, `product_id`, `art_id`) VALUES
(1, 'Suraj K S', '4', 'gugyfcvghjgbhn', '2022-09-15 11:32:55', 27, 0),
(2, 'Divya', '3', 'sadfghjkl', '2022-09-15 11:36:44', 27, 0),
(3, 'asdfhbb', '3', 'drftyu', '2022-10-16 10:08:24', 19, 0),
(4, 'gfds', '4', 'sfdcvbn', '2022-11-20 16:38:49', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_contact` varchar(10) NOT NULL,
  `shop_email` varchar(100) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `shop_photo` varchar(100) NOT NULL,
  `shop_proof` varchar(100) NOT NULL,
  `shop_password` varchar(25) NOT NULL,
  `shop_vstatus` varchar(100) NOT NULL DEFAULT '0',
  `shop_doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_email`, `shop_address`, `place_id`, `shop_photo`, `shop_proof`, `shop_password`, `shop_vstatus`, `shop_doj`) VALUES
(1, 'Art Gallery', '9677452209', 'artgallery@gmail.com', 'Trivandrum', 1, 'fineart.png', 'Screenshot (3).png', '8900', '1', '2022-07-01'),
(2, 'Mural Gallery', '7890456722', 'mural@gmail.com', 'Eravipuram po\nkollam', 8, 'artgallery.jpg', 'Screenshot (2).png', '34578', '1', '2022-07-04'),
(4, 'Mellow Art', '9867504325', 'mellow@gmail.com', 'Kolenchery PO\r\nErnakulam', 17, 'fineart.png', 'Screenshot (10).png', '6789', '1', '2022-07-29'),
(6, 'Art And Craft', '9087564389', 'artcraft@gmail.com', 'Perumbavoor PO\nErnakulam\n', 11, 'shop.png', 'Screenshot (8).png', '3900', '1', '2022-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_qty` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_date`, `stock_qty`, `product_id`) VALUES
(9, '2022-02-09', '20', 18),
(10, '2022-07-02', '9', 19),
(12, '2022-06-24', '35', 22),
(13, '0000-00-00', '20', 27),
(14, '2022-10-01', '20', 20),
(15, '2022-10-07', '12', 20),
(17, '2022-11-12', '19', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(3, 'Acrylic', 5),
(4, 'Drawing Pencil', 1),
(5, 'Acrylic paint', 8),
(6, 'Water colour', 8),
(7, 'Oil paint', 8),
(8, 'Brush', 7),
(9, 'Canvas', 9),
(10, 'Colour Pencil', 1),
(13, 'Wall Hanging', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `user_gender`, `user_dob`, `user_password`, `place_id`, `user_photo`, `user_proof`) VALUES
(1, 'Ammuu', '6578943445', 'ammu007@gmail.com', 'Eravipuram po \r\nkollamm', 'gender', '1998-06-17', '7890', 2, 'Screenshot (3).png', 'abc'),
(2, 'Roby', '8907564399', 'roby@009', 'Thiruvananthapuram \r\nkovalam po', 'Male', '1996-10-16', '6767', 1, 'Screenshot (1).png', 'aaaa'),
(3, 'Adwaitha', '8940865734', 'adwaitha@gmail.com', 'kovalam po kovalam', 'Female', '2001-10-17', 'pqrst', 1, 'Screenshot (2).png', 'Screenshot (1).png'),
(4, 'Abi Joy', '9633867457', 'abi@gmail.com', 'vadakedathukudy (H) Irapuram', 'Male', '1999-06-09', '12345', 17, 'Screenshot (10).png', 'Screenshot (11).png'),
(5, 'Sona K A', '9078105678', 'sona01@gmail.com', 'fghjukymjnhbv', 'Female', '1997-10-22', 'abcd', 9, 'Screenshot (12).png', 'Screenshot (8).png'),
(7, 'Divya Varghese', '8976540988', 'divya@gmail.com', 'poothakkalloingal h\r\nkinginimattom ', 'Female', '2002-09-28', 'Divya002', 10, 'img.png', 'Screenshot (11).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_art`
--
ALTER TABLE `tbl_art`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `tbl_artbooking`
--
ALTER TABLE `tbl_artbooking`
  ADD PRIMARY KEY (`artbooking_id`);

--
-- Indexes for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_exhibition`
--
ALTER TABLE `tbl_exhibition`
  ADD PRIMARY KEY (`exhibition_id`);

--
-- Indexes for table `tbl_exhibitionbooking`
--
ALTER TABLE `tbl_exhibitionbooking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_genere`
--
ALTER TABLE `tbl_genere`
  ADD PRIMARY KEY (`genere_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_art`
--
ALTER TABLE `tbl_art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_artbooking`
--
ALTER TABLE `tbl_artbooking`
  MODIFY `artbooking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_exhibition`
--
ALTER TABLE `tbl_exhibition`
  MODIFY `exhibition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_exhibitionbooking`
--
ALTER TABLE `tbl_exhibitionbooking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_genere`
--
ALTER TABLE `tbl_genere`
  MODIFY `genere_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
