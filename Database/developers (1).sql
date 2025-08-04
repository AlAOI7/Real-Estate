-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 أغسطس 2025 الساعة 22:35
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developers`
--

-- --------------------------------------------------------

--
-- بنية الجدول `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(10, 'About Our Company', '<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a website design and Web development Company dedicated to provide web based solutions to all type of businesses. Located in Ahmedabad, Gujarat (India).</p>\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a one stop solution for all your IT needs. It Provides full featured innovative and high quality cost effective IT web designing solutions ranging from customized web development, PHP web development, ASP.NET and all kind of programming to complete web solutions including web design, Web Development in PHP, eCommerce Solutions, Multimedia, and Print publication solutions, CSS/XHTML Web Design, Content Management, SEO (Web Promotion), Domain Registration, Web Hosting to businesses throughout the India.</p>\r\n<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a website design and Web development Company dedicated to provide web based solutions to all type of businesses. Located in Ahmedabad, Gujarat (India).</p>\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a one stop solution for all your IT needs. It Provides full featured innovative and high quality cost effective IT web designing solutions ranging from customized web development, PHP web development, ASP.NET and all kind of programming to complete web solutions including web design, Web Development in PHP, eCommerce Solutions, Multimedia, and Print publication solutions, CSS/XHTML Web Design, Content Management, SEO (Web Promotion), Domain Registration, Web Hosting to businesses throughout the India.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'condos-pool.png');

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(7, 'test', 'test@gmail.com', 'test', '2020-04-29', '8997979765'),
(9, 'admin', 'admin@gmail.com', 'admin', '1999-12-06', '9878786545');

-- --------------------------------------------------------

--
-- بنية الجدول `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'عنوان تجريبي', 'هذا محتوى تجريبي لمقالة.', '2025-08-04 17:39:44');

-- --------------------------------------------------------

--
-- بنية الجدول `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_details` text NOT NULL,
  `full_details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `title`, `short_details`, `full_details`, `image`) VALUES
(1, 'تشطيب', 'تفاصيل مختصرة عن التشطيب...', 'تفاصيل كاملة وشاملة عن التشطيب وأنواعه وخطواته...', 'img/6.jpeg'),
(2, 'احواش', 'مقدمة عن تصميم الأحواش...', 'شرح تفصيلي لأنواع الأحواش وطرق التصميم...', 'img/7.jpeg'),
(3, 'ترميم', 'نبذة عن الترميم...', 'معلومات كاملة عن ترميم المباني وكيفية تنفيذها...', 'img/8.jpeg');

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `class_name`, `image`) VALUES
(1, 'الكل', '*', 'img/30.jpeg'),
(2, 'إنشاءات', 'first', 'img/31.jpeg'),
(3, 'ترميم', 'second', 'img/32.jpeg');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `name`, `email`, `website`, `comment`, `created_at`) VALUES
(1, 1, 'أحمد محمد', 'ahmed@example.com', 'https://ahmed-site.com', 'هذا تعليق تجريبي على المقالة.', '2025-08-02 20:44:14'),
(2, 2, 'سارة علي', 'sara@example.com', NULL, 'تعليق آخر بدون موقع إلكتروني.', '2025-08-02 20:44:15'),
(3, 2, 'علاء فيصل علي الحاج عبدالله', 'alaoi77alosh@gmail.com', 'https://github.com/AlAOI7/Real-Estate', 'https://github.com/AlAOI7/Real-Estate', '2025-08-04 17:34:58'),
(4, 2, 'س', 'alaoi77alosh@gmail.com', 'https://sss', 'ss', '2025-08-04 18:06:09');

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(2, 'demo', 'demo@gmail.com', '9765989689', 'demo', 'demo'),
(4, 'test', 'test@gmail.com', '7976976979', 'test', 'test'),
(5, 'final', 'final@gmail.com', '7697967967', 'final', 'final'),
(6, 'disha', 'disha@gmail.com', '7898797696', 'demo', 'demo');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `features` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `name`, `address`, `features`, `description`) VALUES
(1, 2, 'مشروع إنشاءات 1', 'الهدا، الطائف', 'مقاومة، جودة عالية', 'وصف المشروع...'),
(2, 3, 'مشروع ترميم 1', 'الهدا، الطائف', 'تجديد، الحفاظ على الطراز', 'وصف المشروع...');

-- --------------------------------------------------------

--
-- بنية الجدول `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image_path`) VALUES
(1, 1, 'img/33.jpeg'),
(2, 2, 'img/27.jpeg');

-- --------------------------------------------------------

--
-- بنية الجدول `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `experience_percent` int(11) DEFAULT NULL,
  `projects_count` int(11) DEFAULT NULL,
  `projects_percent` int(11) DEFAULT NULL,
  `clients_count` int(11) DEFAULT NULL,
  `clients_percent` int(11) DEFAULT NULL,
  `overall_rating` float(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `reviews`
--

INSERT INTO `reviews` (`id`, `experience_years`, `experience_percent`, `projects_count`, `projects_percent`, `clients_count`, `clients_percent`, `overall_rating`) VALUES
(1, 10, 90, 150, 85, 120, 95, 4.5);

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon_class` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon_class`, `image`, `details_url`) VALUES
(1, 'بناء عظم', 'نقدم خدمات بناء العظم بأعلى معايير الجودة والإتقان، باستخدام أفضل المواد لضمان متانة الهيكل.', 'fa-building', 'img/a.jpg', 'service_details.php?id=1'),
(2, 'تصميم أحواش', 'تصاميم مبتكرة لأحواش المنازل والفلل، تجمع بين الجمال والوظائف العملية لتلبية احتياجاتك.', 'fa-tree', 'img/b.jpg', 'service_details.php?id=2');

-- --------------------------------------------------------

--
-- بنية الجدول `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `subtitle`, `button_text`, `button_link`, `created_at`) VALUES
(1, 'ابنِ منزل أحلامك معنا', '06.jpg', 'الوصف الثاني', 'اطلب عرض سعر', '##', '2025-08-02 08:43:32'),
(2, 'نحن الخيار الأمثل لمشروعك', '04.jpg', 'وصف عادي', 'اتصل بنا', '#', '2025-08-02 08:43:32');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(14, 'admin', 'admin@gmail.com', '9876543210', 'admin', 'user', '3.jpg'),
(28, 'ala', 'ala@gmail.com', '33333333', 'alaoi', 'user', 'corinne.jpg'),
(29, 'alaoi', 'alaoi@gmail.com', '0774252137', '$2y$10$TIC.5ZI9NrT8m8O6UmAVUeMf27tU49ESrHqJufZfDZk', 'user', 'rosie.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- قيود الجداول `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- قيود الجداول `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
