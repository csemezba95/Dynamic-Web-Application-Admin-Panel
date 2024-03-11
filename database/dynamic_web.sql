-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2024 at 09:44 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamic_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `is_active`) VALUES
(1, 'General', 'Center', 'general', 'general@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Admin', 'Center', 'admin', 'admin@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `all_headings`
--

CREATE TABLE `all_headings` (
  `id` int UNSIGNED NOT NULL,
  `reason_for_popularity_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_popularity_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compassionate_care_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compassionate_care_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_we_are_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_we_are_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `what_we_do_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `what_we_do_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_projects_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_projects_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_gallery_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_gallery_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_headings`
--

INSERT INTO `all_headings` (`id`, `reason_for_popularity_en`, `reason_for_popularity_bn`, `compassionate_care_en`, `compassionate_care_bn`, `who_we_are_en`, `who_we_are_bn`, `team_en`, `team_bn`, `what_we_do_en`, `what_we_do_bn`, `our_projects_en`, `our_projects_bn`, `our_gallery_en`, `our_gallery_bn`, `contact_us_en`, `contact_us_bn`) VALUES
(1, 'Reason For Popularity', 'জনপ্রিয়তার কারণ', 'Compassionate Care, Education, and Self-Reliance for Every Child', 'প্রতিটি শিশুর জন্য সহানুভূতিশীল যত্ন, শিক্ষা এবং স্বনির্ভরতা', 'Who We Are', 'আমরা কারা', 'Meet Our Dynamic Team', 'আমাদের ডায়নামিক টিমের সাথে দেখা করুন', 'What We Do', 'আমরা কি করি', 'Our Projects', 'আমাদের প্রকল্প', 'Our Gallery', 'আমাদের গ্যালারি', 'Contact Us', 'যোগাযোগ করুন');

-- --------------------------------------------------------

--
-- Table structure for table `all_sub_headings`
--

CREATE TABLE `all_sub_headings` (
  `id` int UNSIGNED NOT NULL,
  `reason_for_popularity_en` longtext COLLATE utf8mb4_unicode_ci,
  `reason_for_popularity_bn` longtext COLLATE utf8mb4_unicode_ci,
  `compassionate_care_en` longtext COLLATE utf8mb4_unicode_ci,
  `compassionate_care_bn` longtext COLLATE utf8mb4_unicode_ci,
  `who_we_are_en` longtext COLLATE utf8mb4_unicode_ci,
  `who_we_are_bn` longtext COLLATE utf8mb4_unicode_ci,
  `team_en` longtext COLLATE utf8mb4_unicode_ci,
  `team_bn` longtext COLLATE utf8mb4_unicode_ci,
  `what_we_do_en` longtext COLLATE utf8mb4_unicode_ci,
  `what_we_do_bn` longtext COLLATE utf8mb4_unicode_ci,
  `our_projects_en` longtext COLLATE utf8mb4_unicode_ci,
  `our_projects_bn` longtext COLLATE utf8mb4_unicode_ci,
  `our_gallery_en` longtext COLLATE utf8mb4_unicode_ci,
  `our_gallery_bn` longtext COLLATE utf8mb4_unicode_ci,
  `contact_us_en` longtext COLLATE utf8mb4_unicode_ci,
  `contact_us_bn` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_sub_headings`
--

INSERT INTO `all_sub_headings` (`id`, `reason_for_popularity_en`, `reason_for_popularity_bn`, `compassionate_care_en`, `compassionate_care_bn`, `who_we_are_en`, `who_we_are_bn`, `team_en`, `team_bn`, `what_we_do_en`, `what_we_do_bn`, `our_projects_en`, `our_projects_bn`, `our_gallery_en`, `our_gallery_bn`, `contact_us_en`, `contact_us_bn`) VALUES
(1, '<p>At the heart of our popularity lies our unwavering commitment to impactful charitable fundraising, rallying support for meaningful causes and fostering positive change in communities.</p>\r\n', '<p>আমাদের জনপ্রিয়তার কেন্দ্রবিন্দুতে রয়েছে প্রভাবশালী দাতব্য তহবিল সংগ্রহের প্রতি আমাদের অটল প্রতিশ্রুতি, অর্থপূর্ণ কারণগুলির জন্য সমর্থন সমাবেশ এবং সম্প্রদায়গুলিতে ইতিবাচক পরিবর্তনকে উৎসাহিত করা।</p>\r\n', '<p>We believe in Compassionate Care, Education, and Self-Reliance as the pillars of transformative change, empowering each child in our care to reach their full potential. Guided by these principles, we strive to create a nurturing environment where every child not only receives the essential support but also discovers the strength within to overcome challenges and thrive. Through Compassionate Care, Education, and Self-Reliance, we pave the way for a brighter future, fostering resilience, instilling knowledge, and unlocking the boundless potential within each child under our dedicated care.</p>\r\n', '<p>আমরা সহানুভূতিশীল যত্ন, শিক্ষা, এবং আত্মনির্ভরতাকে রূপান্তরমূলক পরিবর্তনের স্তম্ভ হিসাবে বিশ্বাস করি, আমাদের যত্নে থাকা প্রতিটি শিশুকে তাদের পূর্ণ সম্ভাবনায় পৌঁছানোর জন্য ক্ষমতায়ন করে। এই নীতিগুলির দ্বারা পরিচালিত, আমরা একটি লালন-পালন করার পরিবেশ তৈরি করার চেষ্টা করি যেখানে প্রতিটি শিশু শুধুমাত্র প্রয়োজনীয় সমর্থন পায় না বরং চ্যালেঞ্জগুলি কাটিয়ে উঠতে এবং উন্নতি করার জন্য তার মধ্যে শক্তিও আবিষ্কার করে। সহানুভূতিশীল যত্ন, শিক্ষা এবং স্ব-নির্ভরতার মাধ্যমে, আমরা একটি উজ্জ্বল ভবিষ্যতের জন্য পথ প্রশস্ত করি, স্থিতিস্থাপকতা বৃদ্ধি করি, জ্ঞান সঞ্চার করি এবং আমাদের নিবেদিত যত্নের অধীনে প্রতিটি শিশুর মধ্যে সীমাহীন সম্ভাবনাকে আনলক করি।</p>\r\n', '<p>Our organization is built on the values of compassion, integrity, and social responsibility, guiding everything we do as we work towards our mission of enhancing quality of life and fostering well-being for all.</p>\r\n', '<p>আমাদের সংগঠনটি সমবেদনা, সততা এবং সামাজিক দায়বদ্ধতার মূল্যবোধের উপর নির্মিত, যা আমাদের জীবনের মান বাড়ানো এবং সকলের মঙ্গল বৃদ্ধির লক্ষ্যে কাজ করার সময় আমরা যা কিছু করি তার নির্দেশনা দেয়।</p>\r\n', '<p>Passionately united and fueled by diverse expertise, our dedicated team collaborates harmoniously to breathe life into our mission. Together, we forge the path to success with unwavering commitment and innovative spirit, shaping a future defined by excellence.</p>\r\n', '<p>আবেগের সাথে একতাবদ্ধ এবং বৈচিত্র্যময় দক্ষতার দ্বারা উজ্জীবিত, আমাদের নিবেদিত টিম আমাদের মিশনে প্রাণ ভরানোর জন্য সুরেলাভাবে সহযোগিতা করে। একসাথে, আমরা অটল প্রতিশ্রুতি এবং উদ্ভাবনী চেতনার সাথে সাফল্যের পথ তৈরি করি, উৎকর্ষ দ্বারা সংজ্ঞায়িত একটি ভবিষ্যত গঠন করি।</p>\r\n', '<p>Individuals with disabilities, and crisis intervention efforts, we strive to make a positive impact on the lives of those we serve. Our dedicated team works tirelessly to foster a culture of empathy, inclusion, and empowerment, ensuring that everyone has access to the care and resources they need to thrive. Whether it&#39;s offering a helping hand during difficult times or advocating for systemic change, Compassionate Care is committed to making a difference in the lives of individuals and communities.</p>\r\n', '<p>প্রতিবন্ধী ব্যক্তি এবং সংকটে হস্তক্ষেপের প্রচেষ্টা, আমরা যাদের সেবা করি তাদের জীবনে ইতিবাচক প্রভাব ফেলতে চেষ্টা করি। আমাদের ডেডিকেটেড টিম সহানুভূতি, অন্তর্ভুক্তি এবং ক্ষমতায়নের সংস্কৃতি গড়ে তোলার জন্য অক্লান্ত পরিশ্রম করে, নিশ্চিত করে যে প্রত্যেকের উন্নতির জন্য প্রয়োজনীয় যত্ন এবং সংস্থানগুলিতে অ্যাক্সেস রয়েছে। এটি কঠিন সময়ে সাহায্যের হাত অফার করা হোক বা সিস্টেমিক পরিবর্তনের পক্ষে সমর্থন করা হোক না কেন, করুণাময় যত্ন ব্যক্তি এবং সম্প্রদায়ের জীবনে একটি পার্থক্য তৈরি করতে প্রতিশ্রুতিবদ্ধ।</p>\r\n', '<p>At Compassionate Care, we are dedicated to making a meaningful difference in the lives of those we serve. Through a variety of projects and initiatives, we strive to provide essential support and services to individuals and communities in need. From community outreach programs and mental health awareness campaigns to elderly care initiatives and support for individuals with disabilities, our projects are driven by a commitment to empathy, excellence, and empowerment. By fostering inclusive environments, offering access to essential resources, and promoting holistic well-being, we aim to create positive and lasting impacts that enhance quality of life for all.</p>\r\n', '<p>সহানুভূতিশীল যত্নে, আমরা যাদের সেবা করি তাদের জীবনে একটি অর্থপূর্ণ পরিবর্তন আনতে আমরা নিবেদিত। বিভিন্ন প্রকল্প এবং উদ্যোগের মাধ্যমে, আমরা প্রয়োজনে ব্যক্তি এবং সম্প্রদায়কে প্রয়োজনীয় সহায়তা এবং পরিষেবা প্রদান করার চেষ্টা করি। কমিউনিটি আউটরিচ প্রোগ্রাম এবং মানসিক স্বাস্থ্য সচেতনতা প্রচার থেকে শুরু করে বয়স্কদের যত্নের উদ্যোগ এবং প্রতিবন্ধী ব্যক্তিদের জন্য সমর্থন, আমাদের প্রকল্পগুলি সহানুভূতি, শ্রেষ্ঠত্ব এবং ক্ষমতায়নের প্রতিশ্রুতি দ্বারা চালিত হয়। অন্তর্ভুক্তিমূলক পরিবেশকে উত্সাহিত করে, প্রয়োজনীয় সংস্থানগুলিতে অ্যাক্সেসের প্রস্তাব দিয়ে এবং সামগ্রিক কল্যাণের প্রচারের মাধ্যমে, আমরা ইতিবাচক এবং দীর্ঘস্থায়ী প্রভাব তৈরি করার লক্ষ্য রাখি যা সবার জন্য জীবনের মান উন্নত করে।</p>\r\n', '<p>Our Gallery, A Tapestry of Compassion and Creativity for a Brighter Tomorrow.</p>\r\n', '<p>আমাদের গ্যালারি, একটি উজ্জ্বল আগামীর জন্য সমবেদনা এবং সৃজনশীলতার একটি ট্যাপেস্ট্রি।</p>\r\n', '<p>Reach Out to Us for Inquiries, Support, or Just to Say Hello</p>\r\n', '<p>অনুসন্ধান, সমর্থন বা শুধু হ্যালো বলার জন্য আমাদের সাথে যোগাযোগ করুন</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gallery_detail_en` longtext COLLATE utf8mb4_general_ci,
  `gallery_detail_bn` longtext COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title_en`, `title_bn`, `gallery_detail_en`, `gallery_detail_bn`) VALUES
(9, 'A Showcase of Cutting-Edge Technology', 'অত্যাধুনিক প্রযুক্তির একটি প্রদর্শনী', '<p>Embark on a journey of innovation and discovery with our latest exhibition, &quot;Innovation Unveiled.&quot; As a leading tech company at the forefront of technological advancement, we are proud to present a showcase of our latest breakthroughs, prototypes, and visionary concepts.</p>\r\n', '<p>আমাদের সর্বশেষ প্রদর্শনী, &quot;উদ্ভাবন উন্মোচন&quot; এর সাথে উদ্ভাবন এবং আবিষ্কারের যাত্রা শুরু করুন। প্রযুক্তিগত অগ্রগতির অগ্রভাগে একটি শীর্ষস্থানীয় প্রযুক্তি কোম্পানি হিসাবে, আমরা আমাদের সাম্প্রতিক সাফল্য, প্রোটোটাইপ এবং দূরদর্শী ধারণাগুলির একটি শোকেস উপস্থাপন করতে পেরে গর্বিত।</p>\r\n'),
(11, 'A Journey into Tomorrows Tech World', 'কাল টেক ওয়ার্ল্ডে একটি যাত্রা', '<p>Welcome to &quot;TechXperience,&quot; where imagination meets innovation and the future comes to life. As a pioneering tech company, we invite you to immerse yourself in a world of cutting-edge technology, where possibilities are limitless and the boundaries of what&#39;s possible are constantly pushed.</p>\r\n', '<p>&quot;TechXperience&quot;-এ স্বাগতম, যেখানে কল্পনা নতুনত্বের সাথে মিলিত হয় এবং ভবিষ্যত জীবনে আসে। একটি অগ্রগামী প্রযুক্তি সংস্থা হিসাবে, আমরা আপনাকে অত্যাধুনিক প্রযুক্তির জগতে নিজেকে নিমজ্জিত করার জন্য আমন্ত্রণ জানাই, যেখানে সম্ভাবনা সীমাহীন এবং যা সম্ভব তার সীমানা ক্রমাগত ঠেলে দেওয়া হয়৷</p>\r\n'),
(13, 'Where possibilities are limitless and the boundaries', 'যেখানে সম্ভাবনা সীমাহীন এবং সীমানা', '<p>From the latest in artificial intelligence and machine learning to immersive virtual reality experiences and groundbreaking hardware developments, &quot;TechXperience&quot; showcases the forefront of technological evolution. Engage with interactive demos, experience live demonstrations, and engage with experts who are shaping the future of technology.</p>\r\n', '<p>কৃত্রিম বুদ্ধিমত্তা এবং মেশিন লার্নিং থেকে নিমজ্জিত ভার্চুয়াল রিয়েলিটি অভিজ্ঞতা এবং যুগান্তকারী হার্ডওয়্যার উন্নয়ন পর্যন্ত, &quot;TechXperience&quot; প্রযুক্তিগত বিবর্তনের সর্বাগ্রে প্রদর্শন করে। ইন্টারেক্টিভ ডেমোর সাথে যুক্ত হন, লাইভ প্রদর্শনের অভিজ্ঞতা পান এবং প্রযুক্তির ভবিষ্যত গঠনকারী বিশেষজ্ঞদের সাথে জড়িত হন।</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `galleries_file`
--

CREATE TABLE `galleries_file` (
  `id` int NOT NULL,
  `galleries_id` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleries_file`
--

INSERT INTO `galleries_file` (`id`, `galleries_id`, `img`) VALUES
(42, 9, '1709191892.png'),
(43, 9, '1709191627.png'),
(44, 9, '1709192183.png'),
(45, 9, '1709191835.png'),
(53, 11, '1709192602.png'),
(54, 11, '1709192809.png'),
(55, 11, '1709192360.png'),
(60, 13, '1709192533.png'),
(61, 13, '1709192493.png'),
(62, 13, '1709192571.png'),
(63, 13, '1709192993.png'),
(64, 13, '1709192720.png'),
(65, 13, '1709192830.png'),
(66, 13, '1709193267.png'),
(67, 13, '1709193292.png'),
(68, 11, '1709192925.png');

-- --------------------------------------------------------

--
-- Table structure for table `mission_vissions`
--

CREATE TABLE `mission_vissions` (
  `id` int UNSIGNED NOT NULL,
  `mission_title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mission_title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mission_text_en` longtext COLLATE utf8mb4_general_ci,
  `mission_text_bn` longtext COLLATE utf8mb4_general_ci,
  `vission_title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vission_title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vission_text_en` longtext COLLATE utf8mb4_general_ci,
  `vission_text_bn` longtext COLLATE utf8mb4_general_ci,
  `url1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mission_vissions`
--

INSERT INTO `mission_vissions` (`id`, `mission_title_en`, `mission_title_bn`, `mission_text_en`, `mission_text_bn`, `vission_title_en`, `vission_title_bn`, `vission_text_en`, `vission_text_bn`, `url1`, `url2`) VALUES
(1, 'Our Mission', 'আমাদের লক্ষ্য', '<p>Our mission is to empower businesses and individuals with innovative software solutions that drive growth, efficiency, and success. We are committed to delivering exceptional value through cutting-edge technology, personalized service, and a relentless focus on customer satisfaction. By leveraging our expertise and passion for innovation, we strive to be a trusted partner in our clients&#39; digital transformation journey, helping them achieve their goals and make a positive impact in the world.</p>\r\n', '<p>আমাদের লক্ষ্য হল উদ্ভাবনী সফ্টওয়্যার সমাধানগুলির সাথে ব্যবসা এবং ব্যক্তিদের ক্ষমতায়ন করা যা বৃদ্ধি, দক্ষতা এবং সাফল্যকে চালিত করে। আমরা অত্যাধুনিক প্রযুক্তি, ব্যক্তিগতকৃত পরিষেবা এবং গ্রাহক সন্তুষ্টির উপর নিরলস ফোকাসের মাধ্যমে ব্যতিক্রমী মূল্য প্রদানের জন্য প্রতিশ্রুতিবদ্ধ। উদ্ভাবনের প্রতি আমাদের দক্ষতা এবং আবেগকে কাজে লাগানোর মাধ্যমে, আমরা আমাদের ক্লায়েন্টদের ডিজিটাল রূপান্তর যাত্রায় একটি বিশ্বস্ত অংশীদার হতে চেষ্টা করি, তাদের লক্ষ্য অর্জনে এবং বিশ্বে একটি ইতিবাচক প্রভাব ফেলতে সাহায্য করে।</p>\r\n', 'Our Vision', 'আমাদের দৃষ্টি', '<p>Our vision is to be a global leader in technology innovation, empowering businesses and individuals to thrive in a digital-first world. We aspire to revolutionize industries, drive societal progress, and shape the future through our commitment to excellence, creativity, and ethical leadership. By anticipating emerging trends, embracing disruptive technologies, and fostering a culture of continuous learning and collaboration, we aim to inspire positive change and make a lasting impact on the world.</p>\r\n', '<p>আমাদের দৃষ্টিভঙ্গি হল প্রযুক্তি উদ্ভাবনে বিশ্বব্যাপী নেতা হওয়া, একটি ডিজিটাল-প্রথম বিশ্বে উন্নতির জন্য ব্যবসা এবং ব্যক্তিদের ক্ষমতায়ন করা। আমরা শ্রেষ্ঠত্ব, সৃজনশীলতা এবং নৈতিক নেতৃত্বের প্রতি আমাদের অঙ্গীকারের মাধ্যমে শিল্পে বিপ্লব ঘটাতে, সামাজিক অগ্রগতি চালাতে এবং ভবিষ্যৎকে রূপ দিতে আকাঙ্খা করি। উদীয়মান প্রবণতাগুলির পূর্বাভাস দিয়ে, বিঘ্নিত প্রযুক্তিগুলিকে আলিঙ্গন করে এবং ক্রমাগত শেখার এবং সহযোগিতার সংস্কৃতিকে উত্সাহিত করার মাধ্যমে, আমরা ইতিবাচক পরিবর্তনকে অনুপ্রাণিত করা এবং বিশ্বে একটি দীর্ঘস্থায়ী প্রভাব তৈরি করার লক্ষ্য রাখি।</p>\r\n', '1709193573.png', '1709193574.png');

-- --------------------------------------------------------

--
-- Table structure for table `organizational_insights`
--

CREATE TABLE `organizational_insights` (
  `id` int UNSIGNED NOT NULL,
  `left_title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `left_title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `right_title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `right_title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `left_text_en` longtext COLLATE utf8mb4_general_ci,
  `left_text_bn` longtext COLLATE utf8mb4_general_ci,
  `right_text_en` longtext COLLATE utf8mb4_general_ci,
  `right_text_bn` longtext COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizational_insights`
--

INSERT INTO `organizational_insights` (`id`, `left_title_en`, `left_title_bn`, `right_title_en`, `right_title_bn`, `left_text_en`, `left_text_bn`, `right_text_en`, `right_text_bn`) VALUES
(1, 'Our Organizational Insight', 'আমাদের সাংগঠনিক অন্তর্দৃষ্টি', 'Our Multifaceted Initiatives', 'আমাদের বহুমুখী উদ্যোগ', '<p>Stay ahead of the competition by identifying emerging trends and opportunities early. Our analytics platform helps you uncover hidden patterns and make strategic decisions that propel your organization forward.</p>\r\n\r\n<p>Streamline your processes and improve efficiency with data-driven insights. Identify bottlenecks, optimize workflows, and allocate resources more effectively to achieve your organizational goals.</p>\r\n\r\n<p>Enable your team to make data-driven decisions at every level of your organization. With easy access to relevant insights, they&#39;ll be empowered to drive innovation and drive results.</p>\r\n\r\n<p>Harness the power of data to fuel continuous improvement and innovation. With our analytics solutions, you&#39;ll have the tools and insights needed to adapt, evolve, and thrive in today&#39;s dynamic business environment.</p>\r\n', '<p>প্রথম দিকে উদীয়মান প্রবণতা এবং সুযোগগুলি সনাক্ত করে প্রতিযোগিতায় এগিয়ে থাকুন। আমাদের অ্যানালিটিক্স প্ল্যাটফর্ম আপনাকে লুকানো নিদর্শন উন্মোচন করতে এবং কৌশলগত সিদ্ধান্ত নিতে সাহায্য করে যা আপনার প্রতিষ্ঠানকে এগিয়ে নিয়ে যায়।</p>\r\n\r\n<p>ডেটা-চালিত অন্তর্দৃষ্টি দিয়ে আপনার প্রক্রিয়াগুলিকে স্ট্রীমলাইন করুন এবং দক্ষতা উন্নত করুন৷ আপনার সাংগঠনিক লক্ষ্য অর্জনের জন্য বাধাগুলি চিহ্নিত করুন, কর্মপ্রবাহকে অপ্টিমাইজ করুন এবং আরও কার্যকরভাবে সংস্থান বরাদ্দ করুন।</p>\r\n\r\n<p>আপনার প্রতিষ্ঠানের প্রতিটি স্তরে ডেটা-চালিত সিদ্ধান্ত নিতে আপনার দলকে সক্ষম করুন। প্রাসঙ্গিক অন্তর্দৃষ্টিতে সহজ অ্যাক্সেসের সাথে, তারা উদ্ভাবন এবং ড্রাইভ ফলাফল চালাতে ক্ষমতাপ্রাপ্ত হবে।</p>\r\n\r\n<p>ক্রমাগত উন্নতি এবং উদ্ভাবনের জন্য ডেটার শক্তি ব্যবহার করুন। আমাদের বিশ্লেষণ সমাধানগুলির সাথে, আপনার কাছে আজকের গতিশীল ব্যবসায়িক পরিবেশে মানিয়ে নেওয়া, বিকাশ এবং উন্নতির জন্য প্রয়োজনীয় সরঞ্জাম এবং অন্তর্দৃষ্টি থাকবে।</p>\r\n', '<p>Stay ahead of the competition by identifying emerging trends and opportunities early. Our analytics platform helps you uncover hidden patterns and make strategic decisions that propel your organization forward. Streamline your processes and improve efficiency with data-driven insights. Identify bottlenecks, optimize workflows, and allocate resources more effectively to achieve your organizational goals.</p>\r\n', '<p>প্রথম দিকে উদীয়মান প্রবণতা এবং সুযোগগুলি সনাক্ত করে প্রতিযোগিতায় এগিয়ে থাকুন। আমাদের অ্যানালিটিক্স প্ল্যাটফর্ম আপনাকে লুকানো নিদর্শন উন্মোচন করতে এবং কৌশলগত সিদ্ধান্ত নিতে সাহায্য করে যা আপনার প্রতিষ্ঠানকে এগিয়ে নিয়ে যায়। ডেটা-চালিত অন্তর্দৃষ্টি দিয়ে আপনার প্রক্রিয়াগুলিকে স্ট্রীমলাইন করুন এবং দক্ষতা উন্নত করুন৷ আপনার সাংগঠনিক লক্ষ্য অর্জনের জন্য বাধাগুলি চিহ্নিত করুন, কর্মপ্রবাহকে অপ্টিমাইজ করুন এবং আরও কার্যকরভাবে সংস্থান বরাদ্দ করুন।</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `organization_details_infos`
--

CREATE TABLE `organization_details_infos` (
  `id` int UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text_en` longtext COLLATE utf8mb4_general_ci,
  `text_bn` longtext COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization_details_infos`
--

INSERT INTO `organization_details_infos` (`id`, `title_en`, `title_bn`, `text_en`, `text_bn`) VALUES
(1, 'Organization Name', 'প্রতিষ্ঠানের নাম', '<p>Dynamic Web Application&nbsp;</p>\r\n', '<p>ডায়নামিক ওয়েব অ্যাপ্লিকেশন</p>\r\n'),
(2, 'Headquarters Address', 'সদর দপ্তরের ঠিকানা', '<p>Dhaka, Bangladesh</p>\r\n', '<p>ঢাকা, বাংলাদেশ</p>\r\n'),
(3, 'Contact No', 'যোগাযোগের নম্বর', '<p>01920519595</p>\r\n', '<p>০১৯২০৫১৯৫৯৫</p>\r\n'),
(4, 'Email Address', 'ইমেইল ঠিকানা', '<p>csemezba@gmail.com</p>\r\n', '<p>csemezba@gmail.com</p>\r\n'),
(5, 'Registration No', 'নিবন্ধন নম্বর', '<p>101</p>\r\n', '<p>১০১</p>\r\n'),
(6, 'Registration Date', 'নিবন্ধনের তারিখ', '<p>04 April, 2023</p>\r\n', '<p>04 এপ্রিল, 2023</p>\r\n'),
(7, 'Basis Registration No', 'বেসিস রেজিস্ট্রেশন নম্বর ', '<p>BS101</p>\r\n', '<p>বেসিস ১০১&nbsp;</p>\r\n'),
(8, 'Social Welfare Registration Date', 'সমাজসেবা নিবন্ধনের তারিখ', '<p>11 April, 2022</p>\r\n', '<p>১১ এপ্রিল, ২০২২</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `our_projects_infos`
--

CREATE TABLE `our_projects_infos` (
  `id` int UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_detail_en` longtext COLLATE utf8mb4_general_ci,
  `project_detail_bn` longtext COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_projects_infos`
--

INSERT INTO `our_projects_infos` (`id`, `title_en`, `title_bn`, `project_detail_en`, `project_detail_bn`) VALUES
(5, 'Customer Relationship Management (CRM) Software Enhancement', 'কাস্টমার রিলেশনশিপ ম্যানেজমেন্ট (CRM) সফটওয়্যার এনহ্যান্সমেন্ট', '<ul>\r\n	<li>\r\n	<p><strong>Objective</strong>: Enhance an existing CRM software to improve customer data management, streamline communication, and enhance user experience.</p>\r\n\r\n	<p><strong>Current System Overview</strong>: The current CRM system allows users to store customer information, track interactions, manage leads, and analyze sales data. However, it lacks certain features for automation, customization, and integration with other tool</p>\r\n	</li>\r\n</ul>\r\n', '<p>উদ্দেশ্য: গ্রাহক ডেটা ব্যবস্থাপনা উন্নত করতে একটি বিদ্যমান CRM সফ্টওয়্যার উন্নত করুন, যোগাযোগ স্ট্রিমলাইন করুন এবং ব্যবহারকারীর অভিজ্ঞতা উন্নত করুন।</p>\r\n\r\n<p>বর্তমান সিস্টেম ওভারভিউ: বর্তমান CRM সিস্টেম ব্যবহারকারীদের গ্রাহকের তথ্য সঞ্চয় করতে, ইন্টারঅ্যাকশন ট্র্যাক করতে, লিড পরিচালনা করতে এবং বিক্রয় ডেটা বিশ্লেষণ করতে দেয়। যাইহোক, এটিতে অটোমেশন, কাস্টমাইজেশন এবং অন্যান্য সরঞ্জামের সাথে একীকরণের জন্য নির্দিষ্ট বৈশিষ্ট্যের অভাব রয়েছে</p>\r\n'),
(6, 'Smart Home Automation System Development', 'স্মার্ট হোম অটোমেশন সিস্টেম ডেভেলপমেন্ট', '<p><strong>Objective</strong>: Develop a comprehensive smart home automation system that enables users to remotely control and monitor various home devices for increased convenience, energy efficiency, and security.</p>\r\n\r\n<p><strong>Current System Overview</strong>: While there are existing smart home automation solutions available, they often lack integration, customization, and ease of use. This project aims to address these limitations by creating a robust and user-friendly system.</p>\r\n', '<p>উদ্দেশ্য: একটি ব্যাপক স্মার্ট হোম অটোমেশন সিস্টেম তৈরি করুন যা ব্যবহারকারীদের বর্ধিত সুবিধা, শক্তি দক্ষতা এবং নিরাপত্তার জন্য দূরবর্তীভাবে বিভিন্ন হোম ডিভাইসগুলিকে নিয়ন্ত্রণ ও নিরীক্ষণ করতে সক্ষম করে।</p>\r\n\r\n<p>বর্তমান সিস্টেম ওভারভিউ: যদিও বিদ্যমান স্মার্ট হোম অটোমেশন সমাধানগুলি উপলব্ধ রয়েছে, সেগুলিতে প্রায়শই একীকরণ, কাস্টমাইজেশন এবং ব্যবহারের সহজতার অভাব থাকে। এই প্রকল্পের লক্ষ্য একটি শক্তিশালী এবং ব্যবহারকারী-বান্ধব সিস্টেম তৈরি করে এই সীমাবদ্ধতাগুলি মোকাবেলা করা।</p>\r\n'),
(7, 'Blockchain-based Supply Chain Management System', 'ব্লকচেইন ভিত্তিক সাপ্লাই চেইন ম্যানেজমেন্ট সিস্টেম', '<p><strong>Objective</strong>: Develop a blockchain-powered supply chain management system to enhance transparency, traceability, and efficiency in the movement of goods from manufacturers to consumers.</p>\r\n\r\n<p><strong>Current System Overview</strong>: Traditional supply chain management systems often suffer from inefficiencies, lack of transparency, and susceptibility to fraud. This project seeks to leverage blockchain technology to address these issues and create a more reliable and secure supply chain network.</p>\r\n', '<p>উদ্দেশ্য: একটি ব্লকচেইন-চালিত সাপ্লাই চেইন ম্যানেজমেন্ট সিস্টেম তৈরি করুন যাতে উৎপাদক থেকে ভোক্তাদের কাছে পণ্যের চলাচলে স্বচ্ছতা, সন্ধানযোগ্যতা এবং দক্ষতা বাড়ানো যায়।</p>\r\n\r\n<p>বর্তমান সিস্টেম ওভারভিউ: প্রথাগত সাপ্লাই চেইন ম্যানেজমেন্ট সিস্টেম প্রায়ই অদক্ষতা, স্বচ্ছতার অভাব এবং জালিয়াতির প্রতি সংবেদনশীলতার শিকার হয়। এই প্রকল্পটি এই সমস্যাগুলির সমাধান করতে এবং আরও নির্ভরযোগ্য এবং নিরাপদ সরবরাহ চেইন নেটওয়ার্ক তৈরি করতে ব্লকচেইন প্রযুক্তির সুবিধা নিতে চায়।</p>\r\n'),
(8, 'Data Analytics Platform for Predictive Maintenance', 'ভবিষ্যদ্বাণীমূলক রক্ষণাবেক্ষণের জন্য ডেটা বিশ্লেষণ প্ল্যাটফর্ম', '<p><strong>Objective</strong>: Develop a data analytics platform that utilizes machine learning algorithms to enable predictive maintenance for industrial equipment, reducing downtime, and optimizing maintenance schedules.</p>\r\n\r\n<p><strong>Current System Overview</strong>: Traditional maintenance practices often rely on fixed schedules or reactive approaches, leading to unnecessary downtime and maintenance costs. This project aims to leverage data analytics and predictive modeling to identify potential equipment failures before they occur.</p>\r\n', '<p>উদ্দেশ্য: একটি ডেটা অ্যানালিটিক্স প্ল্যাটফর্ম তৈরি করুন যা মেশিন লার্নিং অ্যালগরিদমগুলি ব্যবহার করে শিল্প সরঞ্জামগুলির জন্য ভবিষ্যদ্বাণীমূলক রক্ষণাবেক্ষণ সক্ষম করে, ডাউনটাইম হ্রাস করে এবং রক্ষণাবেক্ষণের সময়সূচী অপ্টিমাইজ করে৷</p>\r\n\r\n<p>বর্তমান সিস্টেম ওভারভিউ: প্রথাগত রক্ষণাবেক্ষণ অনুশীলনগুলি প্রায়শই নির্দিষ্ট সময়সূচী বা প্রতিক্রিয়াশীল পদ্ধতির উপর নির্ভর করে, যার ফলে অপ্রয়োজনীয় ডাউনটাইম এবং রক্ষণাবেক্ষণ খরচ হয়। এই প্রকল্পের লক্ষ্য হল ডেটা অ্যানালিটিক্স এবং ভবিষ্যদ্বাণীমূলক মডেলিং যাতে সম্ভাব্য যন্ত্রপাতির ব্যর্থতাগুলি ঘটার আগে শনাক্ত করা যায়।</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `our_projects_infos_file`
--

CREATE TABLE `our_projects_infos_file` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `our_projects_infos_file`
--

INSERT INTO `our_projects_infos_file` (`id`, `project_id`, `img`) VALUES
(17, 5, '1709189660.png'),
(18, 5, '1709189007.png'),
(19, 5, '1709189855.png'),
(20, 5, '1709189890.png'),
(21, 6, '1709190008.png'),
(22, 6, '1709189926.png'),
(24, 6, '1709189389.png'),
(26, 7, '1709189338.png'),
(27, 7, '1709189364.png'),
(28, 7, '1709189870.png'),
(29, 8, '1709189802.png'),
(30, 8, '1709190211.png'),
(31, 8, '1709189505.png'),
(32, 8, '1709190337.png');

-- --------------------------------------------------------

--
-- Table structure for table `popularity_reasons`
--

CREATE TABLE `popularity_reasons` (
  `id` int UNSIGNED NOT NULL,
  `popularity_title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `popularity_title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `popularity_text_en` longtext COLLATE utf8mb4_general_ci,
  `popularity_text_bn` longtext COLLATE utf8mb4_general_ci,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popularity_reasons`
--

INSERT INTO `popularity_reasons` (`id`, `popularity_title_en`, `popularity_title_bn`, `popularity_text_en`, `popularity_text_bn`, `img`) VALUES
(1, 'Innovation', 'উদ্ভাবন', '<p>Software companies often lead the way in innovation, continuously developing new technologies and solutions to address evolving market needs and challenges. Their ability to stay ahead of the curve and introduce groundbreaking ideas attracts attention and drives popularity.</p>\r\n', '<p>সফ্টওয়্যার কোম্পানিগুলি প্রায়শই উদ্ভাবনের পথে নেতৃত্ব দেয়, ক্রমাগত বিকাশমান বাজারের চাহিদা এবং চ্যালেঞ্জ মোকাবেলায় নতুন প্রযুক্তি এবং সমাধানগুলি বিকাশ করে। বক্ররেখা থেকে এগিয়ে থাকার এবং যুগান্তকারী ধারণাগুলি প্রবর্তন করার তাদের ক্ষমতা মনোযোগ আকর্ষণ করে এবং জনপ্রিয়তা বাড়ায়।</p>\r\n', '1709193155.png'),
(2, 'Efficiency and Productivity', 'দক্ষতা এবং উত্পাদনশীলতা', '<p>Software solutions are designed to streamline processes, automate tasks, and improve efficiency in various industries. Businesses and individuals alike are drawn to software services that promise to make their lives easier and help them achieve their goals more effectively.</p>\r\n', '<p>সফ্টওয়্যার সমাধানগুলি প্রক্রিয়াগুলিকে স্ট্রিমলাইন করতে, কাজগুলিকে স্বয়ংক্রিয় করতে এবং বিভিন্ন শিল্পে দক্ষতা উন্নত করার জন্য ডিজাইন করা হয়েছে। ব্যবসা এবং ব্যক্তিরা একইভাবে সফ্টওয়্যার পরিষেবাগুলির প্রতি আকৃষ্ট হয় যা তাদের জীবনকে আরও সহজ করে তুলতে এবং তাদের লক্ষ্যগুলিকে আরও কার্যকরভাবে অর্জনে সহায়তা করার প্রতিশ্রুতি দেয়।</p>\r\n', '1709193185.png'),
(3, 'Customization and Flexibility', 'কাস্টমাইজেশন এবং নমনীয়তা', '<p>Many software companies offer customizable solutions that can be tailored to specific user requirements. This flexibility allows businesses to adapt software to their unique workflows and preferences, enhancing its value and appeal.</p>\r\n', '<p>অনেক সফ্টওয়্যার সংস্থাগুলি কাস্টমাইজযোগ্য সমাধানগুলি অফার করে যা নির্দিষ্ট ব্যবহারকারীর প্রয়োজনীয়তা অনুসারে তৈরি করা যেতে পারে। এই নমনীয়তা ব্যবসাগুলিকে তাদের অনন্য ওয়ার্কফ্লো এবং পছন্দগুলির সাথে সফ্টওয়্যারকে মানিয়ে নিতে দেয়, এর মান এবং আবেদন বাড়ায়।</p>\r\n', '1709193209.png');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int UNSIGNED NOT NULL,
  `slide_title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slide_title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slide_description_en` longtext COLLATE utf8mb4_general_ci,
  `slide_description_bn` longtext COLLATE utf8mb4_general_ci,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slide_title_en`, `slide_title_bn`, `slide_description_en`, `slide_description_bn`, `img`) VALUES
(5, 'Empower Your Business with Innovative Software Solutions', 'উদ্ভাবনী সফ্টওয়্যার সমাধান দিয়ে আপনার ব্যবসাকে শক্তিশালী করুন', '<p>Unlock your company&#39;s full potential with our cutting-edge software services. From custom development to cloud solutions, we have everything you need to drive growth and success.</p>\r\n', '<p>আমাদের অত্যাধুনিক সফ্টওয়্যার পরিষেবাগুলির সাথে আপনার কোম্পানির সম্পূর্ণ সম্ভাবনা আনলক করুন৷ কাস্টম ডেভেলপমেন্ট থেকে শুরু করে ক্লাউড সলিউশন পর্যন্ত, বৃদ্ধি এবং সাফল্য চালনা করার জন্য আপনার প্রয়োজনীয় সবকিছুই আমাদের কাছে আছে।</p>\r\n', '1709193305.png'),
(6, 'Transform Your Ideas into Reality', 'আপনার ধারনাকে বাস্তবে রূপান্তর করুন', '<p>Turn your vision into reality with our expert team of developers and designers. Whether you need a mobile app, web application, or enterprise solution, we&#39;re here to bring your ideas to life.</p>\r\n', '<p>আমাদের ডেভেলপার এবং ডিজাইনারদের বিশেষজ্ঞ দলের সাথে আপনার দৃষ্টিকে বাস্তবে পরিণত করুন। আপনার একটি মোবাইল অ্যাপ, ওয়েব অ্যাপ্লিকেশন, বা এন্টারপ্রাইজ সলিউশনের প্রয়োজন হোক না কেন, আমরা আপনার ধারণাগুলিকে জীবন্ত করতে এখানে আছি৷</p>\r\n', '1709193331.png'),
(7, 'Seamless Integration, Streamlined Operations', 'বিরামহীন ইন্টিগ্রেশন, স্ট্রীমলাইনড অপারেশন', '<p>Integrate your existing systems seamlessly and optimize your workflows with our enterprise software integration services. Experience improved efficiency, collaboration, and decision-making.</p>\r\n', '<p>আপনার বিদ্যমান সিস্টেমগুলিকে নির্বিঘ্নে সংহত করুন এবং আমাদের এন্টারপ্রাইজ সফ্টওয়্যার ইন্টিগ্রেশন পরিষেবাগুলির সাথে আপনার কর্মপ্রবাহগুলিকে অপ্টিমাইজ করুন৷ উন্নত দক্ষতা, সহযোগিতা এবং সিদ্ধান্ত গ্রহণের অভিজ্ঞতা নিন।</p>\r\n', '1709193371.png');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int UNSIGNED NOT NULL,
  `team_member_name_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_member_name_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_member_designation_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_member_designation_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_member_details_en` longtext COLLATE utf8mb4_general_ci,
  `team_member_details_bn` longtext COLLATE utf8mb4_general_ci,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_member_name_en`, `team_member_name_bn`, `team_member_designation_en`, `team_member_designation_bn`, `team_member_details_en`, `team_member_details_bn`, `img`) VALUES
(1, 'Sarah Thompson', 'সারাহ থম্পসন', 'Manger', 'ম্যানেজার', '<p>Sarah Thompson is a dedicated team member with expertise in project management, ensuring seamless coordination and delivering results with precision success through his organizational and problem-solving skills.</p>\r\n', '<p>সারাহ থম্পসন হলেন একজন নিবেদিত দলের সদস্য যার সাথে প্রকল্প পরিচালনায় দক্ষতা রয়েছে, তার সাংগঠনিক এবং সমস্যা সমাধানের দক্ষতার মাধ্যমে নির্ভুল সাফল্যের সাথে বিরামহীন সমন্বয় নিশ্চিত করা এবং ফলাফল প্রদান করা।</p>\r\n', '1704703510.jpg'),
(2, 'Michael Davis', 'মাইকেল ডেভিস', 'Director ', 'পরিচালক', '<p>Michael Davis contributes valuable insights to the team, leveraging his strong analytical skills and strategic thinking for effective problem-solving and decision-making&nbsp;success through his organizational and problem-solving skills.</p>\r\n', '<p>মাইকেল ডেভিস তার সাংগঠনিক এবং সমস্যা সমাধানের দক্ষতার মাধ্যমে কার্যকরী সমস্যা সমাধান এবং সিদ্ধান্ত গ্রহণের সাফল্যের জন্য তার শক্তিশালী বিশ্লেষণাত্মক দক্ষতা এবং কৌশলগত চিন্তাভাবনাকে কাজে লাগিয়ে দলের জন্য মূল্যবান অন্তর্দৃষ্টি প্রদান করেন।</p>\r\n', '1704703581.jpg'),
(3, 'Matthew Brown', 'ম্যাথু ব্রাউন', 'Coordinator', 'সমন্বয়কারী', '<p>Matthew Brown brings creativity and technical proficiency to the team, excelling in innovative solutions and fostering a collaborative environment for successful project implementation.</p>\r\n', '<p>ম্যাথিউ ব্রাউন দলে সৃজনশীলতা এবং প্রযুক্তিগত দক্ষতা নিয়ে আসে, উদ্ভাবনী সমাধানে উৎকর্ষ সাধন করে এবং সফল প্রকল্প বাস্তবায়নের জন্য একটি সহযোগিতামূলক পরিবেশ গড়ে তোলে।</p>\r\n', '1704703630.jpg'),
(4, 'Daniel Anderson', 'ড্যানিয়েল অ্যান্ডারসন', 'Accounce Manager', 'একাউন্ট ম্যানেজার', '<p>Daniel Anderson is a reliable team player known for his meticulous attention to detail and effective communication, contributing to the team&#39;s success through his organizational and problem-solving skills.</p>\r\n', '<p>ড্যানিয়েল অ্যান্ডারসন একজন নির্ভরযোগ্য টিম প্লেয়ার যিনি তার সাংগঠনিক এবং সমস্যা সমাধানের দক্ষতার মাধ্যমে দলের সাফল্যে অবদান রেখে বিস্তারিত এবং কার্যকর যোগাযোগের প্রতি তার সূক্ষ্ম মনোযোগের জন্য পরিচিত।</p>\r\n', '1704703691.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `what_we_dos`
--

CREATE TABLE `what_we_dos` (
  `id` int UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text_en` longtext COLLATE utf8mb4_general_ci,
  `text_bn` longtext COLLATE utf8mb4_general_ci,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `what_we_dos`
--

INSERT INTO `what_we_dos` (`id`, `title_en`, `title_bn`, `text_en`, `text_bn`, `img`) VALUES
(9, 'Custom Software Development', 'কাস্টম সফটওয়্যার ডেভেলপমেন্ট', '<p>Tailored solutions crafted to your specifications, leveraging the latest technologies and best practices to drive efficiency and innovation.</p>\r\n', '<p>দক্ষতা এবং উদ্ভাবন চালানোর জন্য সর্বশেষ প্রযুক্তি এবং সর্বোত্তম অভ্যাসগুলিকে কাজে লাগিয়ে আপনার স্পেসিফিকেশন অনুযায়ী তৈরি করা সমাধান।</p>\r\n', '1709192864.png'),
(10, 'Web and Mobile App Development', 'ওয়েব এবং মোবাইল অ্যাপ ডেভেলপমেন্ট', '<p>Engaging and user-friendly applications designed to enhance customer experiences, increase engagement, and drive business growth across all devices.</p>\r\n', '<p>আকর্ষণীয় এবং ব্যবহারকারী-বান্ধব অ্যাপ্লিকেশনগুলি গ্রাহকদের অভিজ্ঞতা বাড়াতে, ব্যস্ততা বাড়াতে এবং সমস্ত ডিভাইস জুড়ে ব্যবসা বৃদ্ধির জন্য ডিজাইন করা হয়েছে।</p>\r\n', '1709192881.png'),
(11, 'Enterprise Software Integration', 'এন্টারপ্রাইজ সফটওয়্যার ইন্টিগ্রেশন', '<p>Seamlessly integrate and streamline your existing systems and processes, optimizing workflows and enabling better collaboration and decision-making.</p>\r\n', '<p>আপনার বিদ্যমান সিস্টেম এবং প্রক্রিয়াগুলিকে নির্বিঘ্নে একত্রিত করুন এবং প্রবাহিত করুন, কর্মপ্রবাহকে অপ্টিমাইজ করুন এবং আরও ভাল সহযোগিতা এবং সিদ্ধান্ত গ্রহণকে সক্ষম করুন৷</p>\r\n', '1709192908.png'),
(12, 'Cloud Solutions', 'ক্লাউড সলিউশন', '<p>Leverage the power of the cloud to scale your operations, increase agility, and reduce costs with our cloud-based solutions and services.</p>\r\n', '<p>আমাদের ক্লাউড-ভিত্তিক সমাধান এবং পরিষেবাগুলির সাথে আপনার ক্রিয়াকলাপগুলিকে স্কেল করতে, তত্পরতা বাড়াতে এবং খরচ কমাতে ক্লাউডের শক্তি ব্যবহার করুন৷</p>\r\n', '1709192942.png'),
(13, 'UI/UX Design', 'UI/UX ডিজাইন', '<p>Craft intuitive and visually stunning user interfaces and experiences that captivate audiences and drive user engagement and satisfaction.</p>\r\n', '<p>স্বজ্ঞাত এবং দৃশ্যত অত্যাশ্চর্য ব্যবহারকারী ইন্টারফেস এবং অভিজ্ঞতা তৈরি করুন যা দর্শকদের মোহিত করে এবং ব্যবহারকারীর ব্যস্ততা এবং সন্তুষ্টি চালনা করে।</p>\r\n', '1709192968.png'),
(14, 'Quality Assurance and Testing', 'গুণমান নিশ্চিতকরণ এবং পরীক্ষা', '<p>Ensure the reliability, performance, and security of your software products with our comprehensive testing and quality assurance services.</p>\r\n', '<p>আমাদের ব্যাপক পরীক্ষা এবং মানের নিশ্চয়তা পরিষেবাগুলির সাথে আপনার সফ্টওয়্যার পণ্যগুলির নির্ভরযোগ্যতা, কর্মক্ষমতা এবং নিরাপত্তা নিশ্চিত করুন৷</p>\r\n', '1709192991.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_headings`
--
ALTER TABLE `all_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_sub_headings`
--
ALTER TABLE `all_sub_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries_file`
--
ALTER TABLE `galleries_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mission_vissions`
--
ALTER TABLE `mission_vissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizational_insights`
--
ALTER TABLE `organizational_insights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_details_infos`
--
ALTER TABLE `organization_details_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_projects_infos`
--
ALTER TABLE `our_projects_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_projects_infos_file`
--
ALTER TABLE `our_projects_infos_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popularity_reasons`
--
ALTER TABLE `popularity_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what_we_dos`
--
ALTER TABLE `what_we_dos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `all_headings`
--
ALTER TABLE `all_headings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_sub_headings`
--
ALTER TABLE `all_sub_headings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `galleries_file`
--
ALTER TABLE `galleries_file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `mission_vissions`
--
ALTER TABLE `mission_vissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizational_insights`
--
ALTER TABLE `organizational_insights`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_details_infos`
--
ALTER TABLE `organization_details_infos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `our_projects_infos`
--
ALTER TABLE `our_projects_infos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `our_projects_infos_file`
--
ALTER TABLE `our_projects_infos_file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `popularity_reasons`
--
ALTER TABLE `popularity_reasons`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `what_we_dos`
--
ALTER TABLE `what_we_dos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
