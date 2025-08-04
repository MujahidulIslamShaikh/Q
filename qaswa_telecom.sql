-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qaswa_telecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about_us` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us`, `created_at`) VALUES
(1, '<h2><strong>The Best Mobile Repair Service Online</strong></h2><h4>Fast, Affordable and Reliable Mobile Repair Services</h4><p>At Qaswa Mobile Repairs , we understand how essential your mobile devices are to your daily life. Whether it\'s staying connected with friends and family, managing work, or enjoying entertainment, your phone is an indispensable tool. That\'s why we are dedicated to providing fast, reliable, and affordable mobile repair services to ensure that your device is back in your hands as quickly as possible.</p><p>Founded by a team of experienced technicians, Qaswa Mobile Repairs has been serving customers for [X] years, offering top-notch repair services for a variety of mobile phones, tablets, and other handheld devices. We specialize in screen repairs, battery replacements, water damage repairs, charging port fixes, camera repairs, and much more. Our goal is to deliver high-quality repairs with a focus on customer satisfaction.</p><p>&nbsp;</p><p>&nbsp;</p>', '2025-02-26 12:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`, `created_at`) VALUES
(2, '123 Stree Mumbai City, India.', '2025-02-22 13:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$cxTGdcRCSITPjSDig2wEcurP2W.lPifYDYrFWWCBbOY5ejc8RrPsC', '2025-02-19 12:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`) VALUES
(30, '1740467881_99b8fcead5e91f39e004.png', '2025-02-25 07:18:01'),
(31, '1740467887_20b8234df5263db53228.png', '2025-02-25 07:18:07'),
(32, '1740467891_294011ba9b25e970bd5e.png', '2025-02-25 07:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `image` varchar(155) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `image`, `description`, `created_at`) VALUES
(1, 'Beat the Heat: How to Prevent and Fix Mobile Heating Issues Efficiently', '1740555424_dede3ccde16728aa92b7.webp', 'Is your smartphone getting too hot to handle? Overheating is a common issue that can affect your phone’s performance, battery life, and even its safety. Whether you\'re a heavy gamer, a multitasker, or just someone who uses their phone frequently, excessive heat can be frustrating. But don’t worry—this guide will help you prevent and fix mobile heating issues efficiently.\r\n\r\nWhy Do Smartphones Overheat?\r\nBefore we jump into the fixes, let’s understand why mobile devices heat up in the first place:\r\n\r\n✅ Excessive Usage – Running multiple apps or gaming for extended periods can strain the processor.\r\n✅ High Screen Brightness – Keeping your brightness at max drains battery power and generates heat.\r\n✅ Background Apps – Apps running in the background consume processing power and battery, causing heat buildup.\r\n✅ Poor Ventilation – Keeping your phone in tight pockets or under a pillow restricts airflow.\r\n✅ Software or OS Issues – Buggy apps or outdated software can overwork the processor.\r\n✅ Defective Battery or Charger – Using non-certified chargers or faulty batteries can lead to overheating.\r\n\r\nHow to Prevent Mobile Heating Issues\r\n1. Keep Your Phone’s Software Updated\r\n???? Regular software updates optimize battery usage and improve performance, reducing unnecessary heat production.\r\n???? Go to Settings > Software Update and install the latest firmware.\r\n\r\n2. Avoid Overcharging and Use Certified Chargers\r\n???? Overcharging can heat up the battery. Unplug your device once it reaches 80-90% for optimal battery health.\r\n???? Always use original or certified chargers to prevent power fluctuations.\r\n\r\n3. Close Unused Apps & Background Processes\r\n???? Too many open apps cause the processor to work harder. Close them by:\r\n\r\nOn Android: Settings > Apps > Running Apps > Stop\r\nOn iPhone: Double-tap home button or swipe up and close background apps\r\n4. Lower Screen Brightness & Use Dark Mode\r\n???? High brightness increases battery consumption and heat. Reduce it or use auto-brightness mode.\r\n???? Dark mode helps OLED screens consume less power, reducing heat generation.\r\n\r\n5. Keep Your Phone in a Cool, Ventilated Place\r\n???? Avoid placing your phone in direct sunlight, inside a car, or under a pillow while charging.\r\n???? Use phone stands or holders that allow better airflow.\r\n\r\n6. Disable Unused Features\r\n???? Turn off Bluetooth, GPS, NFC, and Mobile Data when not in use.\r\n???? Enable Airplane Mode in poor network areas to prevent the phone from continuously searching for signals.\r\n\r\nHow to Fix an Overheating Phone\r\n1. Remove the Phone Case\r\n???? Cases trap heat—removing them allows the device to cool down faster.\r\n\r\n2. Stop Charging If It’s Hot\r\n???? If your phone is overheating while charging, unplug it and let it cool before resuming.\r\n\r\n3. Use Safe Mode to Identify Problematic Apps\r\n???? Booting your phone into Safe Mode helps identify if an app is causing excessive heating.\r\n\r\nOn Android: Press & hold the Power button > Long-press ‘Power Off’ > Tap ‘Safe Mode’\r\nOn iPhone: Reboot and check if the problem persists before launching apps\r\n4. Restart Your Phone\r\n???? A simple restart closes unnecessary apps and gives your phone a fresh start, reducing heat.\r\n\r\n5. Use Cooling Apps\r\n???? Apps like Cooling Master (Android) help detect and close overheating apps automatically.', '2025-02-22 07:27:50'),
(2, 'The Most Common Mobile Phone Issues and How to Prevent Them', '1740555430_1b5baf2dee527cd980c3.webp', ' The Most Common Mobile Phone Issues and How to Prevent ThemMobile phones have become an integral part of our lives, serving as not just communication devices but also as cameras, entertainment centers, and productivity tools.', '2025-02-22 07:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `description`, `order_number`, `created_at`) VALUES
(4, 'Apple', '1740476610_34b0a1d8d5e4a5373b24.png', 'apple brand', 1, '2025-02-20 06:14:56'),
(6, 'Samsung', '1740476278_540604478d6218f0c046.png', 'Samsung Brand', 2, '2025-02-20 09:29:33'),
(7, 'Xiaomi', '1740476428_bf28d170099c0d0b128a.png', 'Redmi brand', 4, '2025-02-20 11:33:40'),
(9, 'Motorola', '1740469089_ab34a007434bc0915cab.png', 'Motorola Brand', 3, '2025-02-25 07:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `created_at`) VALUES
(1, 'test@gmail.com', '2025-02-22 12:49:48'),
(2, 'user@gmail.com', '2025-02-22 12:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `subject` varchar(155) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`) VALUES
(1, 'Momin Affan Ahmed Ayaz Ahmed', 'test@gmail.com', '9876543210', 'Test', 'Testing message...', '2025-03-04 05:57:43'),
(2, 'Test Name', 'test@gmail.com', '1234567890', 'Test', 'Testing Message', '2025-03-04 06:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `e_waste_policy`
--

CREATE TABLE `e_waste_policy` (
  `id` int(11) NOT NULL,
  `policy` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_waste_policy`
--

INSERT INTO `e_waste_policy` (`id`, `policy`, `created_at`) VALUES
(1, '<p>At Quaswa Mobile Repairs , we are committed to promoting environmentally responsible practices, especially when it comes to the disposal of electronic waste (e-waste). As part of our dedication to sustainability, we strive to minimize the environmental impact of the mobile repair industry by ensuring that all e-waste is disposed of in a safe and responsible manner.</p><h3>1.What is E-Waste?</h3><p>E-waste refers to any electronic device or equipment that is no longer in use and is being discarded. For mobile repair businesses, this typically includes broken or obsolete mobile phones, batteries, charging cables, screens, circuit boards, and other electronic components that are no longer functional or needed.</p><h3>2. Our Commitment to E-Waste Recycling</h3><p>We recognize the environmental impact of improper disposal of e-waste and the hazardous materials that can leach into the soil and water. To help protect the environment, Quaswa Mobile Repairs is committed to:</p><ul><li>•Ensuring that all e-waste generated from repairs, upgrades, and replacements is disposed of in an environmentally responsible manner.</li><li>•Partnering with certified e-waste recycling facilities that comply with local and international environmental standards.</li><li>•To process payments and send invoices for services rendered.</li><li>•Reducing the amount of e-waste sent to landfills by recycling as much material as possible.</li><li>•Promoting the reuse of parts when feasible, especially for mobile devices that still have life left in them.</li></ul><h3>3. How We Handle E-Waste</h3><p>When a device is repaired or refurbished, we make sure to properly manage the following:</p><ul><li>•Batteries: Mobile phone batteries contain hazardous chemicals and should never be disposed of in the trash. We work with certified e-waste recyclers to ensure safe and proper recycling of old or defective batteries.</li><li>•Screens and Circuit Boards: Damaged screens, broken circuit boards, and other internal components are carefully sorted and sent to e-waste recycling facilities to recover valuable materials like metals, plastics, and glass.</li><li>•Mobile Phones: We encourage customers to recycle their old devices by offering trade-in options where possible. Old devices are either refurbished for resale or dismantled and recycled responsibly.</li></ul><h3>4. Customer Involvement in E-Waste Recycling</h3><p>We believe in creating awareness around the importance of e-waste recycling and encourage our customers to be part of this effort by:</p><ul><li>•Recycling Old Devices: If you have an old or non-functional phone, we encourage you to drop it off at our store for responsible recycling or trade it in for a discount on a repair service or a new device.</li><li>•Proper Disposal of Broken Parts: If you are upgrading or repairing your phone, please bring in your old components such as cracked screens, batteries, or charging ports so that we can ensure they are recycled in an eco-friendly manner.</li></ul><h3>5.Minimizing E-Waste Generation</h3><p>In addition to responsible recycling, we also focus on minimizing e-waste generation by:</p><ul><li>•Offering repair and refurbishment services to extend the lifespan of devices and reduce the need for new electronics.</li><li>•Encouraging customers to reuse parts when possible instead of replacing entire devices.</li><li>•Educating our customers on how small repairs can prevent unnecessary waste and save money in the long run.</li></ul><h3>6.Commitment to Sustainability</h3><p>We believe that responsible business practices extend beyond our repair services. By promoting e-waste recycling, extending the lifespan of devices, and adhering to sustainable practices, we aim to contribute positively to both the environment and the community.</p><p>If you have any questions about our e-waste policy or would like more information on how to responsibly dispose of your old or broken mobile devices, please feel free to contact us:</p>', '2025-02-26 12:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'What types of mobile repairs do you offer?', 'We provide repairs for various mobile issues, including screen replacement, battery replacement, charging port repair, water damage repair, and software troubleshooting.', '2025-03-04 09:56:16'),
(2, 'Do you repair all smartphone brands?', 'Yes! We repair popular brands like Apple, Samsung, OnePlus, Xiaomi, Oppo, Vivo, Realme, Google Pixel, and more.', '2025-03-04 09:56:44'),
(3, 'How long does a typical repair take?', 'Most repairs, such as screen or battery replacements, take 30-60 minutes. However, complex repairs like motherboard issues may take 24-48 hours.', '2025-03-04 09:57:00'),
(4, 'Do you offer doorstep mobile repair services?', 'Yes! We offer on-site repairs for select services. You can book an appointment, and our technician will visit your location.', '2025-03-04 09:57:18'),
(5, 'Is my data safe during the repair?', 'Absolutely! We take your data privacy seriously. However, we recommend backing up your important data before handing over your device.', '2025-03-04 09:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created_at`) VALUES
(4, '1740568307_54b56edf4397f9a21849.webp', '2025-02-26 11:11:47'),
(5, '1740568311_fd11fc63e0f9983623df.png', '2025-02-26 11:11:51'),
(6, '1740568316_2461e4d7256554132bde.png', '2025-02-26 11:11:56'),
(7, '1740568320_34f603bb8cb7882dae3d.png', '2025-02-26 11:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `image` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `title`, `image`, `created_at`) VALUES
(1, 'Display Damage', '1740220279_3bcdab1d6e7ab9bff404.png', '2025-02-22 10:31:19'),
(2, 'Charging Issue', '1740220911_9ec7bc2e22ef7772ab6a.png', '2025-02-22 10:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `id` int(11) NOT NULL,
  `mobile` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`id`, `mobile`, `created_at`) VALUES
(1, '9876543210', '2025-02-22 12:30:29'),
(2, '0123456789', '2025-02-22 12:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `title`, `image`, `order_number`, `description`, `created_at`) VALUES
(1, 4, 'Apple Model', '1740050763_1632d6ec90a42e8d6019.png', 1, 'ipad', '2025-02-20 11:26:03'),
(2, 7, 'Redmi 8', '1740051274_76445bbda00ffe038ad9.png', 4, 'Redmi 8 mobile', '2025-02-20 11:34:34'),
(3, 6, 'Samsung s24', '1740054784_060841accf0f9225904f.png', 3, 'Samsung s24 mobile', '2025-02-20 12:33:04'),
(5, 4, 'Apple 15 Pro', '1740655434_ce6caff5050dab2a8b46.jpeg', 2, 'Apple 15 Pro', '2025-02-27 11:23:54'),
(6, 4, 'Apple 15', '1740656166_615442051484de3a8d24.jpeg', 2, '', '2025-02-27 11:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `repair_date` date NOT NULL,
  `repair_time` time NOT NULL,
  `repair_type` varchar(155) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `repair_date`, `repair_time`, `repair_type`, `total_amount`, `status`, `created_at`) VALUES
(4, 6, '2025-03-06', '12:15:00', 'Doorstep Repair', 28998.00, 'Order Placed', '2025-03-03 06:39:47'),
(5, 6, '2025-03-10', '18:50:00', 'Pick and drop', 17849.00, 'Order Placed', '2025-03-03 09:12:15'),
(6, 6, '2025-03-05', '14:52:00', 'Pick and drop', 699.00, 'Order Cancelled', '2025-03-03 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `service_id`, `created_at`) VALUES
(13, 4, 4, '2025-03-03 06:39:47'),
(14, 4, 5, '2025-03-03 06:39:47'),
(15, 5, 5, '2025-03-03 09:12:15'),
(16, 5, 2, '2025-03-03 09:12:15'),
(17, 6, 1, '2025-03-03 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `policy` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `policy`, `created_at`) VALUES
(1, '<p>At Qaswa Mobile Repairs, we are committed to protecting your privacy and ensuring a safe and secure online experience. This Privacy Policy outlines how we collect, use, and protect your personal information when you visit our website or use our services.</p><h3>By using our website or services, you agree to the collection and use of information in accordance with this Privacy Policy.</h3><h3>1.Information We Collect</h3><p>We collect several types of information to provide and improve our services:</p><p>Personal Information</p><ul><li>•Name: To personalize and process your repair requests.</li><li>•Email Address: For communication related to repairs, appointments, and inquiries.</li><li>•Phone Number: To contact you for updates, confirmations, or issues related to your device repair.</li><li>•Billing Information: If applicable, for processing payments related to our services.</li></ul><p>Non-Personal Information</p><ul><li>•Device Information: Information about the device you are repairing (e.g., brand, model, issue description) helps us determine the necessary repair services.</li><li>•Website Usage Data: We may collect information such as IP addresses, browser types, pages visited, and the date and time of your visit to improve the user experience on our website.</li></ul><h3>1.How We Use Your Information</h3><p>We use the information we collect for the following purposes:</p><ul><li>•To provide and manage our repair services.</li><li>•To communicate with you about your repair status, appointments, or inquiries.</li><li>•To process payments and send invoices for services rendered.</li><li>•To send you promotional offers, discounts, or updates (only if you have opted-in for these communications).</li><li>•To improve the functionality and performance of our website.</li><li>•To respond to customer service requests or complaints.</li></ul><h3>2.Data Security</h3><p>We are committed to protecting your personal information and have implemented security measures designed to prevent unauthorized access, disclosure, or destruction of your personal data. However, no data transmission over the internet can be guaranteed to be 100% secure. While we strive to protect your information, we cannot guarantee the security of information transmitted to or from our site.</p><h3>3.Third-Party Service Providers</h3><p>We may share your personal information with trusted third-party service providers who help us operate our website, process payments, or provide customer support. These service providers are required to maintain the confidentiality of your information and are only allowed to use it for the purposes of providing services to us. We do not sell, rent, or lease your personal information to third parties for marketing purposes.</p><h3>4.Cookies</h3><p>Our website uses cookies to improve the user experience. Cookies are small text files that are stored on your device and help us understand how you interact with our site. You can disable cookies in your browser settings, but doing so may affect the functionality of certain parts of our website.</p><h3>5.Retention of Data</h3><p>We will retain your personal information only for as long as necessary to fulfill the purposes for which it was collected or as required by law. After that period, we will securely delete or anonymize your data.</p><h3>6.Changes to This Privacy Policy</h3><p>We may update our Privacy Policy from time to time. Any changes will be posted on this page, with the updated policy\'s effective date clearly indicated. We encourage you to review this Privacy Policy periodically to stay informed about how we are protecting your information.</p><p>If you have any questions or concerns about our Privacy Policy or the way we handle your personal data, please contact us.</p>', '2025-02-26 13:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `image` varchar(255) NOT NULL,
  `main_price` decimal(11,2) NOT NULL,
  `discounted_price` decimal(11,2) NOT NULL,
  `percent_off` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `brand_id`, `model_id`, `title`, `image`, `main_price`, `discounted_price`, `percent_off`, `description`, `created_at`) VALUES
(1, 4, 1, 'Display Service', '1740131470_de1d41b45ad909fffa1c.png', 999.00, 699.00, 30, 'Display Service', '2025-02-21 09:51:10'),
(2, 7, 2, 'Battery Issues', '1740142207_c7f2b0c76342bb12be77.png', 1100.00, 850.00, 23, 'Battery Issues', '2025-02-21 10:03:01'),
(4, 4, 5, 'Back Glass Broken', '1740659901_73e94eb55fe624639cff.jpeg', 15000.00, 11999.00, 20, '', '2025-02-27 12:38:21'),
(5, 4, 5, ' Display Touch Glass Broken', '1740659966_c1267093b150090ae718.png', 20000.00, 16999.00, 15, '', '2025-02-27 12:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE `terms_condition` (
  `id` int(11) NOT NULL,
  `terms_condition` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`id`, `terms_condition`, `created_at`) VALUES
(1, '<p>Welcome to Qaswa Mobile Repairs! These Terms and Conditions govern your use of our services, including our website and repair services. By using our website or services, you agree to comply with these Terms and Conditions. If you do not agree with these terms, please do not use our services or website.</p><h3>1. General Information</h3><ul><li>• Qaswa Mobile Repairs (hereafter referred to as \"we\", \"us\", or \"our\") provides mobile repair services, including but not limited to screen repairs, battery replacements, water damage repairs, and more.</li><li>• Our services are available to individuals and businesses located within [Your Service Area].</li><li>• We reserve the right to update or modify these Terms and Conditions at any time without prior notice. Please review these terms periodically for changes.</li></ul><h3>2.Services</h3><ul><li>• We provide a range of mobile repair services for various types of mobile devices. Detailed information about the services offered can be found on our website or by contacting us directly.</li><li>• The pricing for our services is available upon request or outlined on our website, and prices may vary depending on the device and repair type.</li><li>• We do not guarantee that our repairs will restore devices to their original condition, and certain repairs may not be possible if the device is severely damaged.</li></ul><h3>3.Customer Responsibilities</h3><ul><li>• Device Condition: Customers must provide accurate details about the condition of their devices. Any undisclosed issues may affect the repair process or result in additional charges.</li><li>• Data Backup: It is the customer\'s responsibility to back up any data on the device before submitting it for repair. We are not responsible for any loss of data during the repair process.</li><li>• Unclaimed Devices: Devices not picked up within [X] days after completion of repairs may be subject to storage fees or may be disposed of at our discretion.</li></ul>', '2025-02-24 06:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `user_name` varchar(155) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `user_name`, `description`, `created_at`) VALUES
(1, 'Ayan K', 'I had a cracked screen on my iPhone, and these guys fixed it within 30 minutes! Super fast and affordable. Highly recommend their service!', '2025-03-05 07:44:48'),
(2, 'Rahul M', 'My Samsung Galaxy had a charging issue, and they diagnosed and fixed it the same day. Great customer service and reasonable prices!', '2025-03-05 07:45:13'),
(3, 'Jennifer L', 'I was worried about losing my data after my phone fell in water. Their experts saved all my files and restored my phone like new!', '2025-03-05 07:45:34'),
(4, 'David S', 'I thought my phone was beyond repair, but they fixed my motherboard issue in just a few hours. Definitely my go-to repair shop!', '2025-03-05 07:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `other_mobile` int(11) DEFAULT NULL,
  `email` varchar(155) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(155) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `other_mobile`, `email`, `address`, `city`, `landmark`, `otp`, `created_at`) VALUES
(6, 'Momin', 2147483647, 1234567890, 'altamash@peaceinfotech.com', 'Address', 'MALEGAON', 'Landmark', 9331, '2025-02-28 09:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_policy`
--

CREATE TABLE `warranty_policy` (
  `id` int(11) NOT NULL,
  `warranty_policy` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warranty_policy`
--

INSERT INTO `warranty_policy` (`id`, `warranty_policy`, `created_at`) VALUES
(1, '<p>At Quaswa Mobile Repairs, we are committed to providing high-quality repairs with exceptional customer service. We offer a warranty on all repair services performed to ensure that you are satisfied with the work we do. This warranty policy outlines the terms and conditions of our warranty for mobile repair services.</p><h3>1.Scope of Warranty</h3><p>Our warranty covers defects in workmanship and parts provided during the repair service. If any issues arise related to the repair performed or the parts replaced within the warranty period, we will address the issue free of charge, subject to the terms outlined below.</p><h3>2. Warranty Coverage</h3><p>The warranty applies to the following aspects of the repair:</p><ul><li>•Defective Parts: If the part replaced during the repair is found to be faulty or defective under normal use, we will replace it free of charge.</li><li>•Workmanship: If the repair service itself is found to be improperly executed (e.g., issues related to assembly, installation, etc.), we will correct the error at no additional cost.</li></ul><h3>3.Warranty Duration</h3><ul><li>•Repair Work: Our warranty is valid for [X] days or [X] months from the date of repair completion. The warranty duration depends on the type of repair and the parts used.</li><li>•Parts Replaced: Parts provided as part of the repair are covered for [X] days or [X] months from the date of installation.</li></ul>', '2025-02-24 07:08:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_waste_policy`
--
ALTER TABLE `e_waste_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_condition`
--
ALTER TABLE `terms_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warranty_policy`
--
ALTER TABLE `warranty_policy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_waste_policy`
--
ALTER TABLE `e_waste_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms_condition`
--
ALTER TABLE `terms_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warranty_policy`
--
ALTER TABLE `warranty_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
