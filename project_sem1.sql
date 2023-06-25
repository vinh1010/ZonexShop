-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 06, 2021 lúc 02:07 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_sem1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `attribute`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Red', '#ea0b0b', 1, '2021-07-28 01:56:28', '2021-07-29 01:22:44'),
(2, 0, 'Black', '#000000', 1, '2021-07-28 01:56:39', '2021-07-29 01:22:37'),
(3, 0, 'White', '#ffffff', 1, '2021-07-28 01:56:55', '2021-07-29 01:22:29'),
(4, 1, 'Size', 'S', 1, '2021-07-28 01:57:04', '2021-07-28 01:57:04'),
(5, 1, 'Size', 'M', 1, '2021-07-28 01:57:12', '2021-07-28 01:57:12'),
(6, 1, 'Size', 'L', 1, '2021-07-28 01:57:21', '2021-07-28 01:57:21'),
(7, 1, 'Size', 'XXL', 1, '2021-07-28 01:57:29', '2021-07-28 01:57:29'),
(8, 0, 'Dark blue', '#464f72', 1, '2021-07-29 01:22:15', '2021-07-29 01:22:15'),
(9, 0, 'Yellow', '#e7f245', 1, '2021-07-29 01:23:07', '2021-07-29 01:23:07'),
(10, 0, 'Pink', '#deb5d1', 1, '2021-07-29 01:23:44', '2021-07-29 01:23:44'),
(11, 0, 'Silver', '#c9c9c9', 1, '2021-07-29 01:24:07', '2021-07-29 01:24:07'),
(12, 0, 'Green', '#78dd92', 1, '2021-07-29 01:47:17', '2021-07-29 01:47:17'),
(13, 0, 'Earth orange', '#f2ad5f', 1, '2021-07-29 01:48:01', '2021-07-29 01:48:01'),
(14, 0, 'Brown', '#594646', 1, '2021-07-29 01:56:56', '2021-07-29 01:56:56'),
(15, 1, 'Size', 'One Size', 1, '2021-08-05 20:51:49', '2021-08-05 20:51:49'),
(16, 0, 'Blue', '#0091ff', 1, '2021-08-06 04:04:01', '2021-08-06 04:04:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `name`, `image`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gucci', 'louis-vuitton-new-york-soho-interiors-peter-marino-shuji-mukai-giuseppe-penone-designboom-1800.jpg', 1, 1, '2021-07-29 00:23:50', '2021-08-01 16:48:15'),
(2, 1, 'Louis Vuitton', 'louis-vuitton--1942_Luxembourg_Store_Opening_DIF.jpg', 1, 1, '2021-08-01 01:29:45', '2021-08-01 16:48:06'),
(3, 2, 'Glasses New', 'banner4.jpg', 1, 3, '2021-08-01 01:30:06', '2021-08-05 19:26:07'),
(6, 5, 'Hag Bag New', 'sdfsdfsfsfsffs.jpg', 1, 2, '2021-08-01 01:43:15', '2021-08-05 19:25:45'),
(7, 8, 'Shoes New', 'sddddđ.jpgwid{IMG_WIDTH}&hei{IMG_HEIGHT}', 1, 2, '2021-08-01 02:15:55', '2021-08-05 19:26:18'),
(9, 3, 'Dior', 'Dior-Chicago-Flagship-Agnora-Slider-Home-Page.jpg', 1, 1, '2021-08-01 16:47:35', '2021-08-01 16:47:35'),
(10, 9, 'Hag Bag New', 'Milan-Fashion-Boutiques-Gucci-unveils-new-store-concept-3.jpg', 1, 3, '2021-08-01 17:05:57', '2021-08-01 17:11:06'),
(11, 3, 'Shoes', 'h4.jpg', 1, 3, '2021-08-01 17:10:23', '2021-08-01 17:10:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `image`, `title`, `summary`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'blg8.jpg', 'AMAZON SUMMER ESSENTIALS FAMILY GUIDE UNDER $50', '<p>I&rsquo;m so excited to share this Amazon lookbook I put together of my favorite summer essentials for the whole family! Everything in the catalog is under $50! As much as I love Amazon I know it can be very overwhelming with all the fashion it has to offer. I wanted to create an easier way for you to view some of my tried and true favorites that are budget-friendly and great quality! This lookbook includes my best-selling and most-worn pieces and pictures of how I style them.</p>', '<p>PIN IT<br />\r\nI&rsquo;m so excited to share this Amazon lookbook I put together of my favorite summer essentials for the whole family! Everything in the catalog is under $50! As much as I love Amazon I know it can be very overwhelming with all the fashion it has to offer. I wanted to create an easier way for you to view some of my tried and true favorites that are budget-friendly and great quality! This lookbook includes my best-selling and most-worn pieces and pictures of how I style them.</p>\r\n\r\n<p>PIN IT<br />\r\nDETAILS: BROWN TWO-PIECE (UNDER $25 &ndash; SIZE MEDIUM) | TIE -DYE BIKINI (UNDER $25 &ndash; SIZE MEDIUM) | FLORAL BIKINI (UNDER $25 &ndash; SIZE MEDIUM) | RED &amp; BLACK TWO PIECE (UNDER $25 &ndash; SIZE MEDIUM) | BLUE TIE-DYE BIKINI (UNDER $30 &ndash; SIZE MEDIUM) | GREEN ONE PIECE (UNDER $30 &ndash; SIZE MEDIUM) | PINK ONE PIECE (UNDER $30 &ndash; SIZE MEDIUM)</p>\r\n\r\n<p>OPEN THE LOOKBOOK TO SEE FULL CATALOG AND CLICK ON PIECES TO SHOP</p>\r\n\r\n<p>PIN IT<br />\r\nDETAILS: INITIAL NECKLACE (UNDER $15) | COLORFUL RINGS (UNDER $15 &ndash; ONE OF MY MOST WORN SUMMER ITEM!) | HANDBAGS ALL LINKED IN CATALOG LOOKBOOK</p>\r\n\r\n<p>OPEN THE LOOKBOOK TO SEE FULL CATALOG AND CLICK ON PIECES TO SHOP</p>\r\n\r\n<p>PIN IT<br />\r\nDETAILS: FLORAL SHIRT (UNDER $30 &ndash; SIZE LARGE) | BLACK SWIM TRUNKS (UNDER $20 &ndash; SIZE 36) | BLACK SLIDES (UNDER $25) | SUNGLASSES (UNDER $20)</p>\r\n\r\n<p>OPEN THE LOOKBOOK TO SEE FULL CATALOG AND CLICK ON PIECES TO SHOP</p>\r\n\r\n<p>Every item you see in the lookbook is clickable and will take you directly to the product page. You&rsquo;ll find budget-friendly swim, summer outfit staples, bags, jewelry, essentials for him, and essentials for the kids! Every piece you&rsquo;ll see is under $50. View the lookbook in fullscreen to get the best look at everything!</p>', 1, '2021-07-29 02:21:54', '2021-08-01 20:41:31'),
(2, 1, 'blg11.jpg', 'This Couple Found Love on a Rick Owens Fan Page', '<p>Like many couples in New York City, Fiona Luo and Michael Smith don&rsquo;t necessarily run in the same circles. Luo, 23, works as a fashion publicist at Gia Kuan Consulting, with clients like Telfar, Bond Hardware, and Susan Alexandra. Born in Taipei, Taiwan, she moved to the city in 2016 to study at Parsons School of Design on a scholarship. Smith, 27, grew up in a tiny farm town in Arizona and is a data-science analyst for an advertising company. Differences aside, the two have been dating&mdash;on and off&mdash;for three years. It all started with a Rick Owens fan account.</p>', '<p>Back in 2018, Luo was browsing the Instagram account @meninrickowens, a trove of lanky dudes who love the dark lord of fashion. One guy caught Luo&rsquo;s eye. &ldquo;I think it was a blazer, tank top, drop-crotch pants, and leather boots,&rdquo; Luo says of the outfit that made her press &ldquo;follow&rdquo; on Smith&rsquo;s page. &ldquo;There are so many different Rick silhouettes, but it seemed like he was into the same ones that I like.&rdquo; The two began bantering about Rick Owens, platonically at first. &ldquo;I DM&rsquo;d her, but she followed me, so we are both guilty. I was genuinely talking about this jewelry company that she works for, Bond Hardware,&rdquo; says Smith. &ldquo;Also, she&rsquo;s a hot girl!&rdquo;</p>\r\n\r\n<p><br />\r\nTwo weeks later, they went out on the first date. What started as just dinner at Pepe Rosso Social turned into a drink at the now closed bar Y.N. and finally a nightcap at Botanica. They said goodbye at 5 a.m. &ldquo;It was the longest date I&rsquo;ve ever been on,&rdquo; says Luo. &ldquo;I think we both knew that there was something there instantly.&rdquo;&nbsp;</p>\r\n\r\n<p>This Couple Found Love on a Rick Owens Fan Page<br />\r\nADVERTISEMENT</p>\r\n\r\n<p>Their interest in Owens began as genuine curiosity. &ldquo;I think a lot of my fashion obsessions came from needing to get as far away from my current style [at the time] as possible,&rdquo; says Smith, who in his younger years experimented with scene and preppy aesthetics. His friend introduced him to Owens&rsquo;s clothing in 2014 while he was studying biomedical engineering at Arizona State University. &ldquo;I was like, That&rsquo;s ugly. Then a few months later, I was like, This is kind of all right. Then a couple of months later, I was like, I have to wear this or I&rsquo;ll be very sad,&rdquo; he says. He caved his senior year of college and bought a pair of Geobasket shoes. &ldquo;I think that&rsquo;s everyone&rsquo;s first piece. I wore it terribly.&rdquo;</p>\r\n\r\n<p>This Couple Found Love on a Rick Owens Fan Page<br />\r\nSince buying those shoes, Smith has become a micro-celebrity with the world of Rick obsessives. He started posting fit pics on 4chan in 2015, which &ldquo;had a fashion board that had really good Rick Owens people.&rdquo; (The group has since dispersed to Discord.)</p>\r\n\r\n<p>Smith wasn&rsquo;t known by name but rather as Blue Eyes, a nod to a rare Yu-Gi-Oh! card he keeps in the back of his phone case. Smith is often recognized, sometimes on the street. &ldquo;I&rsquo;ve witnessed it once,&rdquo; says Luo. &ldquo;He doesn&rsquo;t want to admit it, but he totally has fanboys.&rdquo;</p>\r\n\r\n<p>This Couple Found Love on a Rick Owens Fan Page<br />\r\nThis Couple Found Love on a Rick Owens Fan Page<br />\r\nLuo started learning about Owens as a student in Beijing, during her Tumblr phase. &ldquo;I was on high-fashion Tumblr, and Rick was one of the brands that was really coveted in those communities, though I was more into Japanese designers. It wasn&rsquo;t until I moved to New York that I could buy the clothes that I wanted to wear, and that&rsquo;s when I started collecting my own pieces,&rdquo; she says. &ldquo;I still like Comme des Gar&ccedil;ons and Ann Demeulemeester, but it doesn&rsquo;t look good on someone who isn&rsquo;t super slender or tall,&rdquo; says Luo. &ldquo;I felt like Rick was the best on my body, which is what I care a lot about.&rdquo;</p>\r\n\r\n<p>This Couple Found Love on a Rick Owens Fan Page<br />\r\nImage may contain Clothing Apparel Human Person Evening Dress Fashion Gown Robe Banister Handrail and Shoe<br />\r\nCurrently, Smith owns 130 pieces of Rick Owens, while Luo counts 80. Though Luo&rsquo;s style skews sexier, the two sometimes share clothes, including a skirt that Luo bought. They also have the same Bevel Kiss boots with Lucite heels. &ldquo;There is the same guy who recognizes us on the street wearing them,&rdquo; says Smith.</p>\r\n\r\n<p>While they both have a deep appreciation for construction and design, they also try not to take it too seriously. &ldquo;I like exaggerated, messed-up silhouettes, but I also need someone who is kind of laughing at themselves,&rdquo; Smith says. &ldquo;I think Rick is kind of a goofball.&rdquo; That levity is what makes Smith so attractive to Luo. &ldquo;Working in the industry, you meet so many people who take themselves seriously,&rdquo; says Luo. &ldquo;At the end of the day, I love clothes so much, but it&rsquo;s just clothing. There&rsquo;s more to life.&rdquo;</p>\r\n\r\n<p>This Couple Found Love on a Rick Owens Fan Page<br />\r\nAside from Rick Owens, Luo still likes Ann Demeulemeester and Comme des Gar&ccedil;ons, while Smith has been expanding his design palette with Comme des Gar&ccedil;ons and Balenciaga. But not everything is a hit. Luo hates one of his Balenciaga tops, a double shirt. &ldquo;It&rsquo;s so stupid in a good way,&rdquo; he says. Despite their differences, the two agree on one thing: &ldquo;You have to wear Rick with Rick,&rdquo; says Luo.</p>\r\n\r\n<p>&nbsp;</p>', 1, '2021-07-29 02:32:04', '2021-08-01 20:41:44'),
(3, 2, 'blg6.jpg', 'Any New Yorker Can Get the Paparazzi Treatment, Thanks to This Instagram Page', '<p>We&rsquo;ve all seen those &ldquo;candid&rdquo; paparazzi shots of celebrities. They know they&rsquo;re going to be photographed, so they come armed with a strategic (and eye-catching) ensemble, which is often executed by a professional stylist. But the next time you&rsquo;re wandering around Manhattan and hear the sound of a camera shutter going off, watch out for photographer Johnny Cirillo&mdash;because he could be taking&nbsp;<em>your</em>&nbsp;picture, not a celebrity&rsquo;s.&nbsp;</p>', '<p>On his Instagram page, @<a href=\"https://www.instagram.com/watchingnewyork/?hl=en\" target=\"_blank\">watchingnewyork</a>, Cirillo enjoys photographing regular, stylish New Yorkers and giving them the paparazzi treatment. No stylists, no glam team: Cirillo likes to document real people with&nbsp;<em>real</em>&nbsp;style. Cirillo will shoot unique fits across the city&mdash;sometimes stealthily photographing his subjects from half a city block away, thanks to a 200mm lens&mdash;then gets their permission to use and upload their photos on his page, where his 233,000 followers are obsessed with taking in everyone&rsquo;s different personal styles. So far, Cirillo has captured fashion lovers rocking&nbsp;<a href=\"https://www.instagram.com/p/CR1R31VD-tX/\" target=\"_blank\">green sequin dresses</a>&nbsp;(paired with cowboy boots!),&nbsp;<a href=\"https://www.instagram.com/p/CRGzYh2jn_S/\" target=\"_blank\">retro baker&rsquo;s caps</a>, and dapper&nbsp;<a href=\"https://www.instagram.com/p/CRyvruRjCpl/\" target=\"_blank\">pleated pants</a>, among other standout pieces.</p>\r\n\r\n<p><img alt=\"Watching New York Is the Instagram Page Giving New Yorkers the Paparazzi Treatment\" src=\"https://assets.vogue.com/photos/61002d87d01185eb7f7f8c1e/master/w_1600%2Cc_limit/2%252520(1).jpg\" /></p>\r\n\r\n<p>Photo: Johnny Cirillo</p>\r\n\r\n<p><img alt=\"Watching New York Is the Instagram Page Giving New Yorkers the Paparazzi Treatment\" src=\"https://assets.vogue.com/photos/61002d9b02f96e3229c3caec/master/w_1600%2Cc_limit/3.jpg\" /></p>\r\n\r\n<p>Photo: Johnny Cirillo</p>\r\n\r\n<p>Considering &ldquo;Watching New York&rdquo; your new, eclectic mood board of inspiring outfits to try out, and his archive of&nbsp;<em>lewks</em>&nbsp;is only growing since he launched it in 2016. The best part of it all is that each upload essentially serves as a snapshot into a New Yorker&rsquo;s own distinctive fashion flavor, and in a way that&rsquo;s more organic than your standard Instagram fit pics. In other words, there&rsquo;s lots of wearable styling inspo. Below,&nbsp;<em>Vogue</em>&nbsp;caught up with Cirillo to discuss when he started shooting street style, how he gets the perfect shot, and what his favorite encounters have been.&nbsp;</p>\r\n\r\n<p><strong>What made you want to start Watching New York?</strong></p>\r\n\r\n<p>WATCH</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.vogue.com/video/watch/iman-supermodel-life-in-looks\" target=\"_blank\">Iman Shares the Stories Behind Four Decades of Glamorous Looks</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ADVERTISEMENT</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I was and remain a long time fan of the late, great Bill Cunningham. I was often at my wife&rsquo;s office on 55th and 5th, crossing my fingers that I would see him in action. Sadly, I never did. On the day he passed [in 2016], I thought shooting street fashion as he had done for all those years would be my way of honoring him. That was the first day I shot street [style] and I never stopped. &nbsp;</p>\r\n\r\n<p><img alt=\"Watching New York Is the Instagram Page Giving New Yorkers the Paparazzi Treatment\" src=\"https://assets.vogue.com/photos/61002dafe6e3671361242850/master/w_1600%2Cc_limit/7.jpg\" /></p>\r\n\r\n<p>Photo: Johnny Cirillo</p>\r\n\r\n<p><strong>Your pictures have a paparazzi-like feel. Was that deliberate?</strong></p>\r\n\r\n<p>I decided early-on that if I was going to shoot candids of New Yorkers, I didn&rsquo;t want it to be with a wide lens, up-close in their faces. I started using a 200mm lens so that I could be half a city block away from the subject. It&rsquo;s similar to the way paparazzi shoot, and all my subjects are celebrities to me, so it&rsquo;s fitting in that respect.&nbsp;</p>\r\n\r\n<p><strong>What&#39;s your favorite part of capturing people?</strong></p>\r\n\r\n<p>For lots of years, I shot weddings and events. I always loved catching happy moments between two people. There&rsquo;s an extra layer to shooting happy moments in the street. You&#39;re dodging traffic, maneuvering around pedestrians. It seems more real. I love getting the real moments&mdash;the romance and the laughter.</p>\r\n\r\n<p><img alt=\"Watching New York Is the Instagram Page Giving New Yorkers the Paparazzi Treatment\" src=\"https://assets.vogue.com/photos/61002dc225b1a0a1d1d33d7e/master/w_1600%2Cc_limit/5.jpg\" /></p>\r\n\r\n<p>Photo: Johnny Cirillo</p>\r\n\r\n<p><strong>Any funny stories from photographing people?</strong></p>\r\n\r\n<p>It&#39;s the reason I started asking permission from everyone I shoot: I once took a beautiful photo of a couple holding hands, gazing lovingly into one another&rsquo;s eyes, and shared it to my Instagram. Was getting a great response, until I got a DM: &ldquo;This is me in the photo. My girlfriend and I are big fans of the page, but unfortunately, that&rsquo;s not my girlfriend!&rdquo;&nbsp;</p>\r\n\r\n<p>In all the years and all the people I&rsquo;ve photographed, I have also been flipped off exactly one time&mdash;and it happened to be by one of my favorite actors who had just won an Oscar.</p>', 1, '2021-07-29 02:33:52', '2021-08-01 20:41:58'),
(4, 2, 'blg12.jpg', '3 Ways To Dress Up Your ‘Jeans And A T-Shirt’ Combo', '<p>See your faves in a new light.<br />\r\nWhenever I wind up wearing jeans and a tshirt, the process is akin to scouring Netflix for an hour in search of an exciting new TV show, only to land on one of my old favourites (Friends, Sex and The City, Peep Show, etc).</p>\r\n\r\n<p>While I love the idea of ~experimenting~ and branching out with my style&mdash;in much the same way as I do my viewing tastes&mdash;sometimes it feels good to lean into what you know. Ya know?T</p>', '<p>Go To Town On Accessories<br />\r\nHonestly, I need to hunt down whoever gave rebirth to the scrunchie trend, and personally shake their hand. Scrunchies are the cutest and easiest way to add ~personality~ to an outfit, they won&rsquo;t damage your hair, and they&rsquo;re about as cost effective as they come. And, why stop there? Add a beaded bag, a pair of gold hoops, and a red lip, and then sit back and revel in the joy that is living your very best life.</p>\r\n\r\n<p>OUTFIT RECIPE: 1 x EYTS jeans, 1 x COH beaded bag, 1 x Rag &amp; Bone white t-shirt, 1 x COH plaid scrunchie, 1 x Reliquia gold hoops = Daaaaaaayum, girl!</p>\r\n\r\n<p>Make Like Jeanne Damas, Add A Heel/Blazer</p>\r\n\r\n<p>hat&rsquo;s not to say the ol&rsquo; jeans and tee outfit has to put you to sleep, though. With a few flicks of the magic wand &mdash; a.k.a the addition of some cute accessories or an ~unexpected style twist~ &mdash; your outfit can go from b-o-r-i-n-g to c-o-o-l in no time.</p>\r\n\r\n<p>Read on for fresh and exciting ways to breathe life into your trusty favourites, and then we can all meet in the comments section to talk about how Friends will always be the greatest TV show ever made. Okay? Ok!</p>\r\n\r\n<p>Today, in the land of denim, we&rsquo;re going by retiring our favourite pair of sneakers in favour of a heel/blazer instead, all thanks to the most stylish lady in all of Paris, Jeanne Damas. Do it like this style queen and add a graphic tee, a pinstripe blazer and flared jeans to give it that deriguour effortlessness inherent in the way French women dress.</p>\r\n\r\n<p>OUTFIT RECIPE: 1 x Re/Done flared jeans, 1 x Balenciaga blue t-shirt, 1 x ARKET stripe blazer, 1 x Iris &amp; Ink navy slingbacks = Oooh, La La!</p>\r\n\r\n<p>Opt For An All-White Look</p>\r\n\r\n<p><br />\r\nThere&rsquo;s just something so badass about wearing an all-white outfit. I totally understand the risk of wearing all-white, especially in the company of clumsy friends and red wine, but I&rsquo;m willing to go out on a limb anyway to look this F-A-B. Opt for a high-waisted fit and a cropped white t-shirt in a light, breezy fabric to ensure that it looks flattering, and add a pop of colour with a head scarf and/or a belt. Voila! OUTFIT RECIPE: 1 x Hanes x Karla cropped t-shirt, 1 x Grlfrnd white jeans, 1 x Balenciaga kitten heel = Did it hurt when you fell?</p>\r\n\r\n<p>What&rsquo;s your favourite way to jazz up your jeans and a t-shirt combination?</p>\r\n\r\n<p>Words, Madeleine Woon</p>', 1, '2021-07-29 02:44:28', '2021-08-01 20:42:08'),
(5, 2, 'blg10.jpg', 'Casual Summer Capsule 2021', '<p>You would think dressing casually would feel more effortless, and not as challenging to mix and match your pieces. &nbsp;But usually, when it comes to you trying to create a &#39;throw-on-and-go-look,&#39; you find yourself feeling more thrown together than put together.</p>', '<p>You would think dressing casually would feel more effortless, and not as challenging to mix and match your pieces. &nbsp;But usually, when it comes to you trying to create a &#39;throw-on-and-go-look,&#39; you find yourself feeling more thrown together than put together.</p>\r\n\r\n<p>Instead of creating a stylish and relaxed look, you feel like your outfit looks frumpy, boring, or that it&#39;s missing something.</p>\r\n\r\n<p>The truth is, creating a casual look is easy when you have a good mix of pieces in your wardrobe.</p>\r\n\r\n<p>You would think dressing casually would feel more effortless, and not as challenging to mix and match your pieces. &nbsp;But usually, when it comes to you trying to create a &#39;throw-on-and-go-look,&#39; you find yourself feeling more thrown together than put together.</p>\r\n\r\n<p>Instead of creating a stylish and relaxed look, you feel like your outfit looks frumpy, boring, or that it&#39;s missing something.</p>\r\n\r\n<p>The truth is, creating a casual look is</p>\r\n\r\n<p>You would think dressing casually would feel more effortless, and not as challenging to mix and match your pieces. &nbsp;But usually, when it comes to you trying to create a &#39;throw-on-and-go-look,&#39; you find yourself feeling more thrown together than put together.</p>\r\n\r\n<p>Instead of creating a stylish and relaxed look, you feel like your outfit looks frumpy, boring, or that it&#39;s missing something.</p>\r\n\r\n<p>The truth is, creating a casual look is</p>\r\n\r\n<p>Just because you&#39;re looking to create a casual look, doesn&#39;t mean anything that feels a bit dressy should be excluded from your wardrobe and only all casual clothes, shoes, and accessories are needed - this is where so many get it wrong - you actually need a few dressier pieces in your wardrobe. &nbsp;</p>\r\n\r\n<p>Why?</p>\r\n\r\n<p>Dressier pieces help to polish up your look and balance out your laid-back pieces. &nbsp;So, when you feel your outfit feels thrown together, an easy swap or add-on would instantly fix your look.</p>\r\n\r\n<p>A CASUAL WARDROBE NEEDS A MIX OF THINGS:<br />\r\nCasual essentials</p>\r\n\r\n<p>Casual shoes</p>\r\n\r\n<p>Casual accessories</p>\r\n\r\n<p>Dressy essentials</p>\r\n\r\n<p>Dressy / casual shoe(s)</p>\r\n\r\n<p>Dressier accessories that polish up your look</p>\r\n\r\n<p>It may sound like you need a lot, but you don&#39;t.</p>', 1, '2021-07-29 02:47:03', '2021-08-01 20:42:17'),
(6, 2, 'blg3.jpg', '2021 Summer Athleisure Capsule', '<p>When you hear the word &#39;activewear,&#39; that sometimes gets confused with being active in the gym or for when you&#39;re working out -- you have to be living an active lifestyle to wear this type of clothing. &nbsp;So, in a lot of women&#39;s minds, they think this style isn&#39;t for them. &nbsp;</p>', '<p>When you hear the word &#39;activewear,&#39; that sometimes gets confused with being active in the gym or for when you&#39;re working out -- you have to be living an active lifestyle to wear this type of clothing. &nbsp;So, in a lot of women&#39;s minds, they think this style isn&#39;t for them. &nbsp;</p>\r\n\r\n<p>Remember, when you start to place labels on items, you&#39;re unintentionally, confining yourself to certain styles because you think those styles aren&#39;t a fit for you. &nbsp;In the end, placing labels like activewear on items and thinking there aren&#39;t other ways to wear this style, is when you start to rule out items you actually can be wearing. &nbsp;</p>\r\n\r\n<p>Is an active lifestyle required to wear leggings?</p>\r\n\r\n<p>No. &nbsp;</p>\r\n\r\n<p>THINK ABOUT IT - DO YOU HAVE TO HAVE A &quot;CERTAIN LIFESTYLE&quot; TO ENJOY COMFORTABLE CLOTHING? &nbsp;<br />\r\nABSOLUTELY NOT. &nbsp;<br />\r\nLabels are flexible. &nbsp;Meaning even though it can be intended for an active lifestyle, you can also wear this style of clothing as an everyday casual look - without working out!</p>\r\n\r\n<p>If you enjoy comfortable and relaxed clothing, would love to be able to wear leggings in a fun and stylish way and don&#39;t mind a sporty twist to your look, then you&#39;d enjoy an athleisure style! &nbsp;</p>\r\n\r\n<p>An athleisure style surrounds the everyday essentials that you already have, like tees, tanks, casual dresses, jackets to cardigans. &nbsp;Active clothing, like pullovers to leggings, and leisurewear, like jogger pants to sweatshirts. It&#39;s a combination of the most comfortable and stylish relaxed clothing and a nice switch from your go-to casual style - jeans and a shirt.</p>\r\n\r\n<p>You can pull off this style - look good and not have an active lifestyle. &nbsp;If you&#39;d like a new way to dress casually, then an athleisure look gives you that option. &nbsp;</p>\r\n\r\n<p>And this eBook is going to show you how to pull it off! &nbsp;&nbsp;</p>\r\n\r\n<p>The following is a preview into the Summer Athleisure Capsule 2021 eBook.</p>\r\n\r\n<p>This eBook helps round out your dressy and casual summer capsule with a more laid-back style that&rsquo;ll work for lounging around-the-house, outdoor activities, casual outings to your everyday errands. &nbsp;</p>\r\n\r\n<p>The best part about an athleisure look is you already have most of the essentials you need to pull it off. &nbsp;And this eBook will help you fill the gaps with some summer pieces.</p>\r\n\r\n<p>All of the items featured are handpicked to fit the theme of the style and color palette. &nbsp;Here are a few of the clothes, shoes, and accessories included - there are links to purchase all of the items in this eBook with additional styles to shop in a private online shopping guide. &nbsp;&nbsp;</p>\r\n\r\n<p><br />\r\nNext, no capsule is complete without outfit ideas mixing and matching all of the items featured throughout the eBook.&nbsp;</p>\r\n\r\n<p>With a full season of outfits, you&#39;ll no longer struggle to put together your outfits, coordinate your pieces, and can avoid settling for the same casual outfits.</p>\r\n\r\n<p>Here are a few of the outfits out of the 102 included in Summer Athleisure Capsule 2021 eBook:</p>\r\n\r\n<p><br />\r\nThis eBook includes all casual outfit ideas. &nbsp;This is a flexible wardrobe plan. &nbsp;The options laid out in this eBook show you different styles, colors, prints, fits, necklines to length so you can customize and tailor it to fit your needs. &nbsp; &nbsp;</p>\r\n\r\n<p>Will you need all of the styles featured? Probably not. &nbsp;And to help you save money and sort through this, I also show you what you can transition over from your wardrobe to your summer capsule. &nbsp;You don&#39;t need identical items for this to work, just similar styles. &nbsp;So, you&#39;ll be able to start your capsule with it halfway completed!&nbsp;</p>\r\n\r\n<p>To read the full details and purchase Summer Athleisure Capsule 2021 eBook - click here. &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DON&#39;T ALLOW LABELS TO TRAP YOU INTO SETTLING FOR THE SAME OUTFITS AND LIMITING WHAT YOU CAN WEAR. &nbsp;<br />\r\nIf &quot;fashion rules&quot; can be broken, why try to follow them in the first place? Have a little fun with your wardrobe and embrace this new way to dress casually while still looking fabulous!</p>', 1, '2021-07-29 02:48:53', '2021-08-01 20:42:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'logo-gucci-removebg-preview.png', 1, '2021-07-28 01:55:10', '2021-07-29 01:03:11'),
(2, 'Hookaholics', '1.png', 1, '2021-07-28 01:56:05', '2021-08-01 21:14:06'),
(3, 'Givenchy', 'Givenchy-Logo-removebg-preview.png', 1, '2021-07-29 01:03:56', '2021-07-29 01:03:56'),
(4, 'Nike', 's_l300_1-removebg-preview.png', 1, '2021-07-29 01:04:09', '2021-07-29 01:04:09'),
(5, 'Telefcope', '2.png', 1, '2021-07-29 01:04:44', '2021-08-01 21:14:41'),
(6, 'Guangzhou', '3.png', 1, '2021-08-01 21:15:15', '2021-08-01 21:15:56'),
(7, 'Heritage', '4.png', 1, '2021-08-01 21:16:12', '2021-08-01 21:16:41'),
(8, 'Hermes', '5.png', 1, '2021-08-01 21:16:52', '2021-08-01 21:17:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, 0, '2021-08-01 19:40:27', '2021-08-01 19:40:27'),
(2, 'Women', 1, 0, '2021-08-01 19:40:35', '2021-08-01 19:40:35'),
(3, 'Bag', 1, 0, '2021-08-01 19:42:30', '2021-08-01 19:55:09'),
(5, 'Hand bag', 1, 3, '2021-08-01 19:55:43', '2021-08-01 19:55:43'),
(8, 'Shoes', 1, 0, '2021-08-01 19:58:51', '2021-08-01 19:58:51'),
(9, 'Lazy shoes', 1, 8, '2021-08-01 19:59:14', '2021-08-01 19:59:14'),
(10, 'Sneakers', 1, 8, '2021-08-01 20:00:42', '2021-08-01 20:00:42'),
(11, 'High heels', 1, 8, '2021-08-01 20:01:38', '2021-08-01 20:01:38'),
(12, 'Shirt (M)', 1, 1, '2021-08-01 20:02:49', '2021-08-01 20:02:49'),
(13, 'Shirt (W)', 1, 2, '2021-08-01 20:03:02', '2021-08-01 20:03:02'),
(14, 'Trousers (M)', 1, 1, '2021-08-01 20:03:22', '2021-08-01 20:03:22'),
(15, 'Trousers (W)', 1, 2, '2021-08-01 20:03:40', '2021-08-01 20:03:40'),
(16, 'T-Shirt (M)', 1, 1, '2021-08-01 20:04:29', '2021-08-01 20:04:29'),
(17, 'T-Shirt (W)', 1, 2, '2021-08-01 20:04:39', '2021-08-01 20:04:39'),
(18, 'Pants (M)', 1, 1, '2021-08-01 20:05:16', '2021-08-01 20:05:16'),
(19, 'Pants (W)', 1, 2, '2021-08-01 20:05:26', '2021-08-01 20:05:26'),
(20, 'Skirt', 1, 2, '2021-08-01 20:28:22', '2021-08-01 20:28:22'),
(21, 'Jacket (M)', 1, 1, '2021-08-05 20:41:13', '2021-08-05 20:41:13'),
(22, 'Jacket (W)', 1, 2, '2021-08-05 20:41:34', '2021-08-05 20:41:34'),
(23, 'Hoodie (M)', 1, 1, '2021-08-05 20:41:55', '2021-08-05 20:41:55'),
(24, 'Hoodie (W)', 1, 2, '2021-08-05 20:42:06', '2021-08-05 20:48:36'),
(25, 'Backpack', 1, 3, '2021-08-05 20:48:29', '2021-08-05 20:48:29'),
(26, 'Short', 1, 1, '2021-08-05 20:49:33', '2021-08-05 20:49:33'),
(27, 'Crossover Bag', 1, 3, '2021-08-05 20:51:27', '2021-08-05 20:51:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_blogs`
--

CREATE TABLE `comment_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_blogs`
--

INSERT INTO `comment_blogs` (`id`, `blog_id`, `user_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'wow', 0, '2021-08-05 10:06:40', '2021-08-05 10:06:40'),
(2, 6, 1, 'very good news', 0, '2021-08-05 23:12:20', '2021-08-05 23:12:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite_products`
--

INSERT INTO `favorite_products` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '2021-08-05 07:56:00', '2021-08-05 07:56:00'),
(3, 1, 1, '2021-08-05 18:35:35', '2021-08-05 18:35:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cotton', 1, '2021-07-28 02:03:07', '2021-07-29 00:49:44'),
(2, 'Kaki', 1, '2021-07-28 02:03:13', '2021-07-29 01:05:07'),
(3, 'Jean', 1, '2021-07-29 01:06:03', '2021-07-29 01:06:03'),
(4, 'Nylon', 1, '2021-07-29 01:06:21', '2021-07-29 01:06:21'),
(5, 'Chiffon', 1, '2021-07-29 01:06:37', '2021-07-29 01:06:37'),
(6, 'Leather', 1, '2021-07-29 02:00:34', '2021-07-29 02:00:34'),
(7, 'Polyamide', 1, '2021-08-05 23:03:33', '2021-08-05 23:03:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_07_05_233126_create_categories_table', 1),
(4, '2021_07_05_235953_create_brands_table', 1),
(5, '2021_07_06_001332_create_products_table', 1),
(6, '2021_07_06_001358_create_attributes_table', 1),
(7, '2021_07_06_001437_create_product_attributes_table', 1),
(8, '2021_07_06_001525_create_related_images_table', 1),
(9, '2021_07_06_001635_create_banners_table', 1),
(10, '2021_07_06_001752_create_blogs_table', 1),
(11, '2021_07_06_001817_create_orders_table', 1),
(12, '2021_07_06_001856_create_order_details_table', 1),
(13, '2021_07_06_001926_create_favorite_products_table', 1),
(14, '2021_07_21_234405_create_comment_blogs_table', 1),
(15, '2021_07_21_234639_create_ratings_table', 1),
(16, '2021_07_28_022802_create_materials_table', 1),
(17, '2021_07_28_022905_create_product_materials_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `address_ship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `address_ship`, `phone`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 310.00, 'Long Phu - Hoa Thach - Quoc Oai', '0971976699', NULL, 4, '2021-08-04 07:39:19', '2021-08-04 07:39:19'),
(2, 1, 1280.00, 'Long Phu - Hoa Thach - Quoc Oai', '0971976699', NULL, 4, '2021-08-04 07:47:19', '2021-08-04 07:47:19'),
(3, 1, 185.00, 'Long Phu - Hoa Thach - Quoc Oai - Ha Noi - Việt Nam', '0971976699', NULL, 4, '2021-08-04 20:29:35', '2021-08-04 20:29:35'),
(4, 1, 435.00, 'Long Phu - Hoa Thach - Quoc Oai - Ha Noi - Việt Nam', '0971976699', NULL, 4, '2021-08-05 08:02:03', '2021-08-05 08:02:03'),
(5, 1, 3000.00, 'Long Phu - Hoa Thach - Quoc Oai - Ha Noi - Việt Nam', '0971976699', NULL, 1, '2021-08-05 18:31:42', '2021-08-05 18:31:42'),
(6, 1, 450.00, 'Long Phu - Hoa Thach - Quoc Oai - Ha Noi - Việt Nam', '0971976699', NULL, 1, '2021-08-05 18:33:55', '2021-08-05 18:33:55'),
(7, 1, 1285.00, 'Long Phu - Hoa Thach - Quoc Oai - Ha Noi - Việt Nam', '0971976699', NULL, 1, '2021-08-05 19:57:12', '2021-08-05 19:57:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `color`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 185.00, 1, 'Red', 'S', '2021-08-04 07:39:19', '2021-08-04 07:39:19'),
(2, 1, 2, 125.00, 1, 'Red', 'S', '2021-08-04 07:39:19', '2021-08-04 07:39:19'),
(3, 2, 13, 980.00, 1, 'Black', 'S', '2021-08-04 07:47:19', '2021-08-04 07:47:19'),
(4, 2, 12, 300.00, 1, 'White', 'S', '2021-08-04 07:47:19', '2021-08-04 07:47:19'),
(5, 3, 1, 185.00, 1, 'Red', 'S', '2021-08-04 20:29:35', '2021-08-04 20:29:35'),
(6, 4, 2, 125.00, 2, 'Red', 'S', '2021-08-05 08:02:03', '2021-08-05 08:02:03'),
(7, 4, 1, 185.00, 1, 'Red', 'S', '2021-08-05 08:02:03', '2021-08-05 08:02:03'),
(8, 5, 16, 3000.00, 1, 'Black', 'S', '2021-08-05 18:31:42', '2021-08-05 18:31:42'),
(9, 6, 6, 450.00, 1, 'Black', 'S', '2021-08-05 18:33:55', '2021-08-05 18:33:55'),
(10, 7, 1, 185.00, 1, 'Red', 'S', '2021-08-05 19:57:12', '2021-08-05 19:57:12'),
(11, 7, 12, 300.00, 1, 'White', 'S', '2021-08-05 19:57:12', '2021-08-05 19:57:12'),
(12, 7, 14, 800.00, 1, 'Black', 'M', '2021-08-05 19:57:12', '2021-08-05 19:57:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `price` double(8,2) NOT NULL,
  `sale_price` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `status`, `price`, `sale_price`, `description`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'White shirt', 'b5.jpg', 1, 200.00, 185, NULL, 17, 2, '2021-07-28 02:04:37', '2021-08-06 05:05:45'),
(2, 'Shirt jean', 'a5.jpg', 1, 150.00, 125, NULL, 12, 2, '2021-07-28 02:06:12', '2021-08-06 05:06:00'),
(3, '7 colors long sleeve shirt', 'b4.jpg', 1, 300.00, 0, '<p>This is one of the newest designs of all time</p>', 12, 2, '2021-07-29 01:15:10', '2021-08-01 20:25:20'),
(4, 'Women\'s loafers', 'a1.jpg', 1, 100.00, 0, NULL, 9, 1, '2021-07-29 01:27:18', '2021-08-06 05:02:36'),
(5, 'Women\'s wool coat', 'AB783_SU2839-675x852.jpg', 1, 500.00, 0, NULL, 13, 1, '2021-07-29 01:30:51', '2021-08-06 04:57:43'),
(6, 'Women\'s bibs', 'a13.jpg', 1, 450.00, 0, '<p>Easy, breezy, and beautiful in this chambray jumpsuit. A classic with a refreshing take on all denim it features a classic collar, roll-up sleeves and two side pockets. Talk about an all denim outfit that&rsquo;s super stylish.</p>\r\n\r\n<p>Details</p>\r\n\r\n<ul>\r\n	<li>Sizes: S-L</li>\r\n	<li>Length: 56&quot;</li>\r\n	<li>Fabric Type: 100% Tencel</li>\r\n	<li>Fabric Care Type: Machine Wash Cold. Gentle Cycle. Do Not Use Bleach. Tumble Dry Medium. No Iron.</li>\r\n	<li>Imported</li>\r\n</ul>', 13, 1, '2021-07-29 01:33:39', '2021-08-06 04:57:11'),
(7, 'Crop-top shirt', 'J8192_RD5100.jpg', 1, 230.00, 0, '<p>A short blouse made of sweater knit. It has a round neckline and 3/4 sleeves. It has a decorative seam on the front. The blouse looks great with high-waisted trousers. Knit made of organic cotton with GOTS certificate.</p>\r\n\r\n<p>- Loose cut<br />\r\n- Organic cotton<br />\r\n- GOTS</p>\r\n\r\n<p>Fabric: 97% organic cotton 3% elastane<br />\r\nHand wash at 30 &deg;C<br />\r\nModel is 178cm tall and is wearing size S<br />\r\nSew in: Warsaw / Fabric from: Poland<br />\r\nFirst production date: March 2021</p>', 17, 7, '2021-07-29 01:36:07', '2021-08-06 04:54:43'),
(8, 'Jean skirt', 'a17.jpg', 1, 600.00, 0, '<p>Genuine high quality Leather Skirt. The&nbsp;Skirt comes with high quality hardware, Pockets and Color as per picture shown.&nbsp;Skirt has satin lining inside for better comfort and style.&nbsp;Super soft and ultra smooth, this genuine Koza Leather Skirt will elevate your look to the next level. All our&nbsp;products are timeless basics with a comfortable fit.</p>\r\n\r\n<p>Material :&nbsp;Genuine&nbsp;Leather</p>\r\n\r\n<p>Zip : YKK Brand</p>\r\n\r\n<p>Style : Knee Length, Straight, Pencil</p>\r\n\r\n<p>Pockets : As shown in&nbsp;picture and Inside Pocket</p>\r\n\r\n<p>Garment care : Dry clean only</p>\r\n\r\n<p>Made in India</p>\r\n\r\n<p><strong>Size Chart Women - (Inches)</strong></p>\r\n\r\n<p><img alt=\"Women Skirt Size Chart - Koza Leathers\" src=\"https://cdn.shopify.com/s/files/1/1452/8076/files/shshshrsh.jpg?v=1513163952\" style=\"height:423px; width:607px\" /></p>', 20, 1, '2021-07-29 01:46:18', '2021-08-06 04:53:44'),
(9, 'Jacket', 'a19.jpg', 1, 900.00, 0, '<table cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Artikelzustand:</td>\r\n			<td>Neu mit Etikett:&nbsp;Neuer, unbenutzter und nicht getragener Artikel in der Originalverpackung (wie z. B.&nbsp;Original&shy;karton/‑tasche) und/oder mit noch am Artikel befestigten Originaletikett. Alle Zustandsdefinitionen aufrufen</td>\r\n			<td>Brand:</td>\r\n			<td>Unbranded</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model:</td>\r\n			<td>--</td>\r\n			<td>Size:</td>\r\n			<td>M-5XL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Occasion:</td>\r\n			<td>Casual</td>\r\n			<td>Size Type:</td>\r\n			<td>Regular</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pattern:</td>\r\n			<td>Solid</td>\r\n			<td>Style:</td>\r\n			<td>Cardigan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Vintage:</td>\r\n			<td>No</td>\r\n			<td>Country/Region of Manufacture:</td>\r\n			<td>China</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Year of Manufacture:</td>\r\n			<td>2010-2019</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 12, 2, '2021-07-29 01:49:08', '2021-08-06 04:48:35'),
(10, 'Shimmy', 'a8.jpg', 1, 300.00, 0, NULL, 17, 7, '2021-07-29 01:50:25', '2021-08-06 04:47:40'),
(11, 'Heart Collar Shirt', 'AD465_PK6272.jpg', 1, 600.00, 0, NULL, 13, 7, '2021-07-29 01:54:12', '2021-08-06 04:45:49'),
(12, 'Women\'s Shirts', 'a3.jpg', 1, 300.00, 0, NULL, 13, 2, '2021-07-29 01:55:51', '2021-08-06 04:44:30'),
(13, 'Leather Shoes', 'c15.jpg', 1, 1000.00, 980, NULL, 9, 1, '2021-07-29 02:01:44', '2021-08-06 04:40:54'),
(14, 'Hand Bag Leather', 'c11.jpg', 1, 800.00, 0, '<h2>Item specifics</h2>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Condition:</td>\r\n			<td>\r\n			<p>New with tags:&nbsp;A brand-new, unused, and unworn item (including handmade items) in the original packaging (such as&nbsp;..</p>\r\n			</td>\r\n			<td>Size:</td>\r\n			<td>Medium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color:</td>\r\n			<td>Brown</td>\r\n			<td>Style:</td>\r\n			<td>Shoulder Bag</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand:</td>\r\n			<td>J.Crew</td>\r\n			<td>Material:</td>\r\n			<td>Leather</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 5, 1, '2021-07-29 02:05:39', '2021-08-06 04:36:56'),
(15, 'Shirtless Shirt', 'AD465_SU2732.jpg', 1, 200.00, 0, '<p>Enjoy the distinct texture and feel of 3D knit. A sleek and flattering neckline.</p>\r\n\r\n<ul>\r\n	<li>100% cotton for itch-free comfort.</li>\r\n	<li>Thanks to the three-dimensional manufacturing method used around the shoulders, this sweater flatters any shape.</li>\r\n	<li>Cuffs are slightly firm and easy to roll up.</li>\r\n	<li>This V-neck is gentle on the skin and features a flattering neckline.<br />\r\n	-Perfect for dressing up or down.</li>\r\n</ul>', 13, 7, '2021-07-29 02:07:44', '2021-08-06 04:33:29'),
(16, 'Dress Shirt', 'c1.jpg', 1, 3000.00, 0, '<p>Highlights</p>\r\n\r\n<ul>\r\n	<li>navy blue</li>\r\n	<li>wool</li>\r\n	<li>classic lapels</li>\r\n	<li>front button fastening</li>\r\n	<li>long sleeves</li>\r\n	<li>chest welt pocket</li>\r\n	<li>two front flap pockets</li>\r\n	<li>English rear vents</li>\r\n	<li>belt loops</li>\r\n	<li>concealed front fastening</li>\r\n	<li>two side inset pockets</li>\r\n	<li>two rear welt pockets</li>\r\n</ul>\r\n\r\n<p>Made in Italy</p>\r\n\r\n<p>Composition</p>\r\n\r\n<p>Outer: Wool 100%</p>\r\n\r\n<p>Lining: Cupro 54%, Viscose 46%</p>\r\n\r\n<p>Washing instructions</p>\r\n\r\n<p>Dry Clean Only</p>\r\n\r\n<p>Designer Style ID:&nbsp;EL861AEELRP56485</p>', 12, 2, '2021-07-29 02:09:43', '2021-08-06 04:30:58'),
(17, 'Hooded Sweatshirt Black', 'hoodie2.jpg', 1, 260.00, 169, '<p>&nbsp;</p>\r\n\r\n<p>The black hooded sweatshirt showcases the House&#39;s Couture ateliers. Crafted in cotton fleece, it presents the &#39;Christian Dior Atelier&#39; signature with a velvet texture and a vintage feel. Comfortable and oversized, this hooded sweatshirt can be worn with jeans and a pair of sneakers for a casual look.<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n	<li>White &#39;Christian Dior Atelier&#39; flocked print on the front</li>\r\n	<li>Drawstring hood with metal tips featuring a &#39;DIOR&#39; signature</li>\r\n	<li>Ribbed cuffs, hem and sides</li>\r\n	<li>Kangaroo pocket</li>\r\n	<li>Oversized fit</li>\r\n	<li>Back length: 71 cm (size M)</li>\r\n	<li>100% cotton</li>\r\n	<li>Made in Italy</li>\r\n</ul>', 23, 8, '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(18, 'GG messenger bag', 'massagebag2.jpg', 1, 1290.00, 0, '<p>A new messenger shape with an adjustable shoulder strap and additional top handle is equipped with an organized interior including multiple compartments and card slots. Crafted from black GG leather, noted for its softness and slightly shiny finish. Introduced within the Pre-Fall 2020 collection, the leather plays with texture, embossing the House emblem onto a perforated base.</p>\r\n\r\n<ul>\r\n	<li>Black GG embossed leather</li>\r\n	<li>Cotton linen lining</li>\r\n	<li>Interior: 2 compartments with a center zipper pocket and 4 card slots</li>\r\n	<li>This item can fit a cell phone up to 3.1&rdquo;W x 6.6&rdquo;H x .4&rdquo;D</li>\r\n	<li>Top handle with 2.4&quot; drop; adjustable and detachable shoulder strap with 21.7&quot; drop</li>\r\n	<li>Magnetic snap flap closure</li>\r\n	<li>7.1&quot;W x 8.1&quot;H x 1.6&quot;D</li>\r\n	<li>Weight: 1lb</li>\r\n	<li>Made in Italy</li>\r\n</ul>', 27, 1, '2021-08-05 22:19:21', '2021-08-05 22:19:21'),
(19, 'Le Glazik unisex', 'jacket1.jpg', 1, 82.00, 0, '<ul>\r\n	<li><strong>VAM</strong>,&nbsp;<strong>LE GLAZIK&nbsp;</strong>working smock</li>\r\n	<li><strong>100% BIOLOGICAL COTTON</strong>&nbsp;<strong>sailcloth smock</strong>&nbsp;.</li>\r\n	<li><strong>Authentic breton smock</strong>.</li>\r\n	<li>One button to hold collar.</li>\r\n	<li>2 inside breast pockets.</li>\r\n	<li><strong>Sizes&nbsp;</strong>: from F36 up to F64<br />\r\n	<strong>EXPORT PRICE&nbsp;</strong><strong>once shipping address has been set</strong></li>\r\n</ul>', 21, 6, '2021-08-05 22:30:07', '2021-08-05 22:30:07'),
(20, 'Tee Have Fun', 'tee2.jpg', 1, 11.00, 0, NULL, 16, 6, '2021-08-05 22:42:29', '2021-08-05 22:42:29'),
(21, 'Tee HFWTH', 'tee5.jpg', 1, 20.00, 18, NULL, 16, 5, '2021-08-05 22:48:47', '2021-08-05 22:48:47'),
(22, 'Palm Angels Curved', 'paints.jpg', 1, 461.00, 449, NULL, 12, 8, '2021-08-05 22:53:02', '2021-08-05 22:53:02'),
(23, 'GIV 1 EN CUIR MÉTALLISÉ', 'sk_a.jpg', 1, 995.00, 0, '<ul>\r\n	<li>Sneakers en cuir de veau grain&eacute;, mesh et toile technique.</li>\r\n	<li>Coloris&nbsp;: argent.</li>\r\n	<li>Design a&eacute;rodynamique.</li>\r\n	<li>D&eacute;tails en nubuck et TPU inject&eacute; blancs.</li>\r\n	<li>Broderies graphiques.</li>\r\n	<li>Petites bandes de toile contrast&eacute;es rouges.</li>\r\n	<li>Embl&egrave;me 4G d&eacute;boss&eacute; sur la languette.</li>\r\n	<li>Semelle argent transparente &agrave; 360&deg; avec renforts blancs.</li>\r\n	<li>Embl&egrave;me 4G et signature GIVENCHY en relief sur la semelle.</li>\r\n	<li>Embl&egrave;mes 4G en all-over sous la semelle.</li>\r\n	<li>Composition : 100 % cuir de veau. Doublure : 100 % polyamide.</li>\r\n	<li>Pays d&#39;origine: Italie.</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BE001ME120-040</li>\r\n</ul>', 10, 3, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(24, 'GIV RUNNER EN SUÈDE', 'sk_a2.jpg', 1, 750.00, 0, '<ul>\r\n	<li>Sneakers en su&egrave;de, cuir de veau et nylon.</li>\r\n	<li>Coloris&nbsp;: noir, gris et blanc.</li>\r\n	<li>Esprit vintage.</li>\r\n	<li>Petite boucle 4G en m&eacute;tal finition argent sur le la&ccedil;age.</li>\r\n	<li>&OElig;illets m&eacute;talliques sur les c&ocirc;t&eacute;s.</li>\r\n	<li>Embl&egrave;me 4G brod&eacute; sur la languette.</li>\r\n	<li>Semelle &eacute;paisse confortable blanche avec renforts noirs.</li>\r\n	<li>Signature GIVENCHY en relief sur le talon.</li>\r\n	<li>Embl&egrave;mes 4G en all-over sous la semelle.</li>\r\n	<li>Composition&nbsp;: 80 % cuir de veau, 15 % polyamide, 5 % acrylique. Doublure : 100 % cuir d&#39;agneau.</li>\r\n	<li>Pays d&#39;origine: Italie.</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BE001TE11R-029</li>\r\n</ul>', 10, 3, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(25, 'CUIR AVEC STUDS', 'sk_a3.jpg', 1, 1095.00, 0, '<ul>\r\n	<li>Sneakers en toile de coton.</li>\r\n	<li>Coloris&nbsp;: noir.</li>\r\n	<li>Empi&egrave;cement en cuir grain&eacute; noir sur l&#39;avant.</li>\r\n	<li>Studs en m&eacute;tal finition argent et or p&acirc;le en all-over.</li>\r\n	<li>&OElig;illets en m&eacute;tal noir.</li>\r\n	<li>Plaque m&eacute;tallique grav&eacute;e GIVENCHY &agrave; l&#39;arri&egrave;re.</li>\r\n	<li>Etiquette en cuir noir &agrave; embl&egrave;me 4G d&eacute;boss&eacute; sur la languette.</li>\r\n	<li>Semelle int&eacute;rieure en cuir d&#39;agneau.</li>\r\n	<li>Composition : 100 % coton. Doublure : 100 % cuir d&#39;agneau.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BH0050H0XR-001</li>\r\n</ul>', 10, 3, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(26, 'Nike Dri-FIT Sport', 'ts_a1.jpg', 1, 29.00, 0, '<p><strong>SWEAT-WICKING COMFORT, INSPIRED BY YOU.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Nike Dri-FIT T-Shirt is made from soft fabric that wicks sweat to help keep you dry and comfortable from warm-ups to cool-downs. Brushstroke graphic detail celebrates the creativity you bring to your workout.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Dri-FIT Technology helps keep you dry and comfortable.</li>\r\n	<li>Jersey fabric feels soft against your skin.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Standard fit for a relaxed, easy feel</li>\r\n	<li>52&ndash;59% cotton/41&ndash;48% polyester</li>\r\n	<li>Material percentages may vary. Check label for actual content.</li>\r\n	<li>Machine wash</li>\r\n	<li>Imported</li>\r\n	<li>Colour Shown: Black</li>\r\n	<li>Style: DD6813-010</li>\r\n	<li>Country/Region of Origin: China</li>\r\n</ul>', 16, 4, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(27, 'Nike Sportswear Swoosh', 'hodi_a1.jpg', 1, 76.00, 69, '<p><strong>MIRRORED SWOOSH.MUST-HAVE COMFORT.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Made with lounging in mind, the Nike Sportswear Oversized Fleece Hoodie features a roomy design and brushed fleece construction.Set-in Swoosh details wrap around the shoulders for a bold Nike look.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Plenty of Room to Move</strong></p>\r\n\r\n<p>Putting a fresh spin on your favourite hoodie, this oversized fleece staple features dropped shoulders and roomy sleeves for a relaxed, carefree feel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Brushed-Back Fleece</strong></p>\r\n\r\n<p>Fabric is lightly brushed on the back to make it ultra-soft and comfortable.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Set-In Mirrored Swoosh</strong></p>\r\n\r\n<p>Sewn-in fabric Swooshes add texture and an authentic Nike look.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>More Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Front pocket offers quick storage for your phone, keys and cards.</li>\r\n	<li>Ribbed hem and cuffs provide a carefree, comfortable feel.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Oversized fit for a baggy, spacious feel</li>\r\n	<li>80% cotton/20% polyester</li>\r\n	<li>Machine wash</li>\r\n	<li>Imported</li>\r\n</ul>', 24, 4, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(28, 'Nike Dri-FIT Race', 'tsw_a.jpg', 1, 36.00, 0, '<p><strong>LIGHTWEIGHT, BREATHABLE AND BUILT FOR SPEED.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lightweight fabric and a streamlined design keep you speeding for the finishing line in the Nike Dri-FIT Race Top.Mesh in key areas helps keep you cool with every step.It&#39;s made from 100% recycled polyester fibres.This product is made from 100% recycled polyester fibres.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ready, Set</strong></p>\r\n\r\n<p>The Race collection was designed for performance so you can reach your personal best. Lightweight silhouettes are geared for breathability, keeping you quick and cool as you approach the finish.Swoosh graphics&mdash;on the front of the left shoulder and on the back of the right&mdash;have a reflective design.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lightweight Design</strong></p>\r\n\r\n<p>Nike Dri-FIT Technology moves sweat away from your skin for quicker evaporation, helping you stay dry and comfortable.It combines with airy mesh on the sides and back for light breathability</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>More Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Solid on the front for extra coverage.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Not intended for use as Personal Protective Equipment (PPE)</li>\r\n	<li>100% polyester</li>\r\n	<li>Machine wash</li>\r\n	<li>Imported</li>\r\n	<li>Colour Shown: Hyper Pink</li>\r\n	<li>Style: DD5928-639</li>\r\n	<li>Country/Region of Origin: China</li>\r\n</ul>', 17, 4, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(29, 'Giannis', 'bag_a.jpg', 1, 100.00, 0, '<p><strong>FREAKY EVERYDAY STORAGE.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Put your gear on your back and go. The Giannis Backpack has easy-access zipped compartments for your everyday essentials. The shoulder straps adjust for length and connect with a sternum strap to distribute the load.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Front zipped compartment is easy to load and unload.</li>\r\n	<li>Shoulder straps are shaped to fit ergonomically and adjust for length.</li>\r\n	<li>Sternum strap with buckle helps distribute the load.</li>\r\n	<li>Top zipped pocket for smaller items.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Top carry handle</li>\r\n	<li>Dimensions: 48cm x 36cm W x 23cm D (approx.)</li>\r\n	<li>Body: 59% polyester/41% nylon. Lining: 100% polyester.</li>\r\n	<li>Spot clean</li>\r\n	<li>Imported</li>\r\n	<li>Colour Shown: Black/Black/Summit White</li>\r\n	<li>Style: DA9865-010</li>\r\n	<li>Country/Region of Origin: Indonesia</li>\r\n</ul>', 25, 4, '2021-08-06 01:37:57', '2021-08-06 01:37:57'),
(30, 'Nike SB Icon', 'bag_a2.jpg', 1, 78.00, 0, '<p><strong>ORGANISED STORAGE ON THE GO.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Grab your gear and get going.With padded shoulder straps and plenty of zip pockets, the Nike SB Icon Backpack lets you carry your gear in total comfort.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Polyester fabric is smooth and durable.</li>\r\n	<li>Main compartment with internal divider lets you organise your stuff.</li>\r\n	<li>Multiple zip pockets give you plenty of room for essential items.</li>\r\n	<li>Padded shoulder straps make carrying comfortable.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>100% polyester</li>\r\n	<li>Spot clean</li>\r\n	<li>Imported</li>\r\n	<li>Colour Shown: Base Grey/Black/White</li>\r\n	<li>Style: DB0305-020</li>\r\n	<li>Country/Region of Origin: Indonesia</li>\r\n</ul>', 25, 4, '2021-08-06 01:47:15', '2021-08-06 01:47:15'),
(31, 'Bouncing sneaker', 'sk_hm_a.jpg', 1, 790.00, 0, '<p>Sneaker in technical canvas and suede goatskin.<br />\r\nLight sole with contrasting design for a dynamic and modern look.<br />\r\n<br />\r\nMade in Italy</p>\r\n\r\n<ul>\r\n	<li>White rubber sole</li>\r\n	<li>Black rubber insert</li>\r\n	<li>Black goatskin insole and lining</li>\r\n</ul>', 10, 8, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(32, 'Quicker sneaker', 'sk2_hm_a.jpg', 1, 970.00, 0, '<p>Sneaker in calfskin with &quot;Cal&egrave;che vitesse&quot; print and iconic &quot;H&quot; detail<br />\r\n<br />\r\nMade in Italy</p>\r\n\r\n<ul>\r\n	<li>&quot;Caleche Vitesse&quot; printed calfskin quarters</li>\r\n	<li>White rubber sole</li>\r\n	<li>Dune metis goatskin insole and lining</li>\r\n	<li>Black rubber insert</li>\r\n</ul>', 10, 8, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(33, 'T-SHIRT GOTHIQUE', 'ts_gc_a.jpg', 1, 820.00, 0, '<ul>\r\n	<li>T-shirt &agrave; manches longues en jersey doux.</li>\r\n	<li>Coloris : jaune acidul&eacute;.</li>\r\n	<li>Imprim&eacute;s gothiques noirs et blancs en all-over.</li>\r\n	<li>Signatures GIVENCHY gothiques noires imprim&eacute;es sur l&#39;avant et le dos.</li>\r\n	<li>Coupe classique ajust&eacute;e.</li>\r\n	<li>Composition : 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage maximum 30&deg;c traitement mod&eacute;r&eacute;</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>Ne pas s&eacute;cher en s&egrave;che-linge &agrave; tambour rotatif</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM715Q3Y6B-725</li>\r\n</ul>', 16, 3, '2021-08-06 02:57:32', '2021-08-06 03:04:39'),
(34, 'T-SHIRT OVERSIZED', 'ts2_gc_a.jpg', 1, 755.00, 0, '<ul>\r\n	<li>T-shirt en jersey doux.</li>\r\n	<li>Coloris&nbsp;: jaune acidul&eacute;.</li>\r\n	<li>Imprim&eacute;s GIVENCHY noirs.</li>\r\n	<li>Coupe oversized confortable.</li>\r\n	<li>Composition : 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage maximum 30&deg;c traitement mod&eacute;r&eacute;</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>Ne pas s&eacute;cher en s&egrave;che-linge &agrave; tambour rotatif</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM71553Y6B-725</li>\r\n</ul>', 16, 3, '2021-08-06 03:02:23', '2021-08-06 03:04:17'),
(35, 'T-SHIRT À IMPRIMÉ', 'ts3_gc_a.jpg', 1, 1220.00, 0, '<ul>\r\n	<li>T-shirt en jersey doux.</li>\r\n	<li>Coloris : marron et kaki.</li>\r\n	<li>Imprim&eacute; 4G animalier en all-over.</li>\r\n	<li>Zip m&eacute;tallique oblique &agrave; tire-zip GIVENCHY et rivet 4G sur le col.</li>\r\n	<li>&OElig;illets m&eacute;talliques sur les c&ocirc;t&eacute;s.</li>\r\n	<li>Coupe classique ajust&eacute;e.</li>\r\n	<li>Composition : 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage maximum 30&deg;c traitement mod&eacute;r&eacute;</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>Ne pas s&eacute;cher en s&egrave;che-linge &agrave; tambour rotatif</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM715930P3-246</li>\r\n</ul>', 16, 3, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(36, 'T-SHIRT AVEC STUDS', 'ts4_gc_a.jpg', 1, 1790.00, 0, '<ul>\r\n	<li>T-shirt en jersey doux.</li>\r\n	<li>Coloris&nbsp;: noir.</li>\r\n	<li>Broderies de studs m&eacute;tallis&eacute;s et transparents sur l&#39;avant et les manches.</li>\r\n	<li>Coupe classique ajust&eacute;e.</li>\r\n	<li>Composition : 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage &agrave; la main, temp&eacute;rature maximale (40&deg;c)</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>S&eacute;chage &agrave; plat</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM71623Y6B-001</li>\r\n</ul>', 16, 3, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(37, 'CAPUCHE OVERSIZED', 'hd5_gc_a.jpg', 1, 945.00, 0, '<ul>\r\n	<li>T-shirt &agrave; capuche et manches longues en jersey doux.</li>\r\n	<li>Coloris&nbsp;: gris poussi&egrave;re.</li>\r\n	<li>Imprim&eacute;s gothiques noirs et rouges sur l&#39;avant et les manches.</li>\r\n	<li>Signature GIVENCHY gothique rouge sur l&#39;avant.</li>\r\n	<li>Grand embl&egrave;me 4G gothique noir dans le dos.</li>\r\n	<li>Cordon de serrage &agrave; embouts m&eacute;talliques GIVENCHY sur la capuche.</li>\r\n	<li>Coupe oversized confortable.</li>\r\n	<li>Composition : 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage maximum 30&deg;c traitement mod&eacute;r&eacute;</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>Ne pas s&eacute;cher en s&egrave;che-linge &agrave; tambour rotatif</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM715S3Y6B-129</li>\r\n</ul>', 23, 3, '2021-08-06 03:45:24', '2021-08-06 03:48:38'),
(38, 'T-SHIRT À IMPRIMÉ STRIPES', 'ts5_gc_a.jpg', 1, 720.00, 0, '<ul>\r\n	<li>T-shirt en jersey.</li>\r\n	<li>Coloris&nbsp;: noir.</li>\r\n	<li>Imprim&eacute; animalier jaune et motifs blancs.</li>\r\n	<li>Coupe oversized.</li>\r\n	<li>Composition&nbsp;: 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage maximum 30&deg;c traitement mod&eacute;r&eacute;</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>Ne pas s&eacute;cher en s&egrave;che-linge &agrave; tambour rotatif</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM712V3Y6D-003</li>\r\n</ul>', 16, 3, '2021-08-06 03:51:24', '2021-08-06 03:51:24'),
(39, 'T-SHIRT SLIM REVERSE', 'ts6_gc_a.jpg', 1, 480.00, 0, '<ul>\r\n	<li>T-shirt en jersey doux.</li>\r\n	<li>Coloris&nbsp;: blanc.</li>\r\n	<li>Signatures GIVENCHY PARIS &agrave; effet renvers&eacute; imprim&eacute;es sur l&#39;avant et le dos.</li>\r\n	<li>Petit embl&egrave;me 4G noir imprim&eacute; sur l&#39;arri&egrave;re.</li>\r\n	<li>Coupe slim.</li>\r\n	<li>Composition : 100 % coton.</li>\r\n	<li>Pays d&#39;origine: Portugal.</li>\r\n	<li>Lavage maximum 30&deg;c traitement mod&eacute;r&eacute;</li>\r\n	<li>Repasser &agrave; une temp&eacute;rature maximale de semelle du fer (110&deg;c) sans vapeur</li>\r\n	<li>Ne pas s&eacute;cher en s&egrave;che-linge &agrave; tambour rotatif</li>\r\n	<li>Pas de blanchiment</li>\r\n	<li>Pas de nettoyage professionnel &agrave; sec</li>\r\n	<li>Code du produit&nbsp;:&nbsp;BM71653Y6B-100</li>\r\n</ul>', 16, 3, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(40, 'Jordan Essentials', 'ts_nike_a.jpg', 1, 49.00, 0, '<p><strong>LONG AND LOOSE WITH SIGNATURE HERITAGE.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Get this one into your rotation.The Jordan Essentials Graphic T-Shirt is roomy and loose, made from premium structured cotton.Fresh &quot;23&quot; graphics nod to MJ, the greatest of all time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Heavyweight cotton fabric feels structured and premium.</li>\r\n	<li>The fit has a roomy feel with longer, dropped-shoulder sleeves.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Loose fit for a roomy feel</li>\r\n	<li>Ribbed neckband</li>\r\n	<li>Printed graphics</li>\r\n	<li>100% cotton</li>\r\n	<li>Machine wash</li>\r\n	<li>Imported</li>\r\n	<li>Colour Shown: Orange</li>\r\n	<li>Style: DM3244-869</li>\r\n	<li>Country/Region of Origin: China</li>\r\n</ul>', 17, 4, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(41, 'Nike Sportswear', 'ts2_nike_a.jpg', 1, 36.00, 0, '<p><strong>RETRO AND FADED BY DESIGN.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Nike Sportswear T-Shirt has a loose fit for a comfortable, casual feel. Its lightweight cotton jersey is treated with an acid wash for a sun-loving, retro look.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Details</strong></p>\r\n\r\n<ul>\r\n	<li>Loose fit for a roomy feel</li>\r\n	<li>100% cotton</li>\r\n	<li>Machine wash</li>\r\n	<li>Imported</li>\r\n	<li>Colour Shown: Sunset Pulse</li>\r\n	<li>Style: DD1234-675</li>\r\n	<li>Country/Region of Origin: Turkey</li>\r\n</ul>', 17, 4, '2021-08-06 04:22:25', '2021-08-06 04:22:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(208, 3, 1, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(209, 3, 2, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(210, 3, 3, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(211, 3, 4, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(212, 3, 5, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(213, 3, 6, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(214, 3, 7, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(366, 17, 2, '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(367, 17, 4, '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(368, 17, 5, '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(369, 17, 6, '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(370, 18, 2, '2021-08-05 22:19:21', '2021-08-05 22:19:21'),
(371, 18, 15, '2021-08-05 22:19:21', '2021-08-05 22:19:21'),
(372, 19, 2, '2021-08-05 22:30:07', '2021-08-05 22:30:07'),
(373, 19, 15, '2021-08-05 22:30:07', '2021-08-05 22:30:07'),
(374, 20, 2, '2021-08-05 22:42:29', '2021-08-05 22:42:29'),
(375, 20, 15, '2021-08-05 22:42:29', '2021-08-05 22:42:29'),
(376, 21, 2, '2021-08-05 22:48:47', '2021-08-05 22:48:47'),
(377, 21, 15, '2021-08-05 22:48:47', '2021-08-05 22:48:47'),
(383, 22, 2, '2021-08-05 22:53:54', '2021-08-05 22:53:54'),
(384, 22, 4, '2021-08-05 22:53:54', '2021-08-05 22:53:54'),
(385, 22, 5, '2021-08-05 22:53:54', '2021-08-05 22:53:54'),
(386, 22, 6, '2021-08-05 22:53:54', '2021-08-05 22:53:54'),
(387, 22, 7, '2021-08-05 22:53:54', '2021-08-05 22:53:54'),
(388, 23, 11, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(389, 23, 4, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(390, 23, 5, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(391, 23, 6, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(392, 23, 7, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(393, 24, 3, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(394, 24, 4, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(395, 24, 5, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(396, 24, 6, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(397, 24, 7, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(398, 25, 2, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(399, 25, 4, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(400, 25, 5, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(401, 25, 6, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(402, 25, 7, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(403, 26, 2, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(404, 26, 3, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(405, 26, 4, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(406, 26, 5, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(407, 26, 6, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(408, 26, 7, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(409, 27, 2, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(410, 27, 4, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(411, 27, 5, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(412, 27, 6, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(413, 27, 7, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(414, 28, 10, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(415, 28, 4, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(416, 28, 5, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(417, 28, 6, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(418, 28, 7, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(457, 29, 2, '2021-08-06 01:37:58', '2021-08-06 01:37:58'),
(458, 29, 15, '2021-08-06 01:37:58', '2021-08-06 01:37:58'),
(459, 30, 11, '2021-08-06 01:47:15', '2021-08-06 01:47:15'),
(460, 30, 15, '2021-08-06 01:47:15', '2021-08-06 01:47:15'),
(461, 31, 3, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(462, 31, 8, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(463, 31, 11, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(464, 31, 4, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(465, 31, 5, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(466, 31, 6, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(467, 31, 7, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(468, 32, 3, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(469, 32, 4, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(470, 32, 5, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(471, 32, 6, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(472, 32, 7, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(483, 34, 9, '2021-08-06 03:04:17', '2021-08-06 03:04:17'),
(484, 34, 4, '2021-08-06 03:04:17', '2021-08-06 03:04:17'),
(485, 34, 5, '2021-08-06 03:04:17', '2021-08-06 03:04:17'),
(486, 34, 6, '2021-08-06 03:04:17', '2021-08-06 03:04:17'),
(487, 34, 7, '2021-08-06 03:04:17', '2021-08-06 03:04:17'),
(488, 33, 9, '2021-08-06 03:04:39', '2021-08-06 03:04:39'),
(489, 33, 4, '2021-08-06 03:04:39', '2021-08-06 03:04:39'),
(490, 33, 5, '2021-08-06 03:04:39', '2021-08-06 03:04:39'),
(491, 33, 6, '2021-08-06 03:04:39', '2021-08-06 03:04:39'),
(492, 33, 7, '2021-08-06 03:04:39', '2021-08-06 03:04:39'),
(493, 35, 13, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(494, 35, 4, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(495, 35, 5, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(496, 35, 6, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(497, 35, 7, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(498, 36, 2, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(499, 36, 4, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(500, 36, 5, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(501, 36, 6, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(502, 36, 7, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(505, 37, 3, '2021-08-06 03:48:38', '2021-08-06 03:48:38'),
(506, 37, 15, '2021-08-06 03:48:38', '2021-08-06 03:48:38'),
(507, 38, 9, '2021-08-06 03:51:24', '2021-08-06 03:51:24'),
(508, 38, 15, '2021-08-06 03:51:24', '2021-08-06 03:51:24'),
(509, 39, 2, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(510, 39, 3, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(511, 39, 4, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(512, 39, 5, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(513, 39, 6, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(514, 39, 7, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(515, 40, 13, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(516, 40, 4, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(517, 40, 5, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(518, 40, 6, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(519, 40, 7, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(520, 41, 2, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(521, 41, 10, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(522, 41, 4, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(523, 41, 5, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(524, 41, 6, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(525, 41, 7, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(526, 16, 2, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(527, 16, 3, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(528, 16, 8, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(529, 16, 9, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(530, 16, 14, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(531, 16, 4, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(532, 16, 5, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(533, 16, 6, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(534, 16, 7, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(535, 15, 2, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(536, 15, 10, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(537, 15, 11, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(538, 15, 12, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(539, 15, 13, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(540, 15, 14, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(541, 15, 4, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(542, 15, 5, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(543, 15, 6, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(544, 15, 7, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(545, 14, 2, '2021-08-06 04:36:56', '2021-08-06 04:36:56'),
(546, 14, 3, '2021-08-06 04:36:56', '2021-08-06 04:36:56'),
(547, 14, 14, '2021-08-06 04:36:56', '2021-08-06 04:36:56'),
(548, 14, 5, '2021-08-06 04:36:56', '2021-08-06 04:36:56'),
(549, 14, 6, '2021-08-06 04:36:56', '2021-08-06 04:36:56'),
(550, 13, 2, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(551, 13, 3, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(552, 13, 14, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(553, 13, 4, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(554, 13, 5, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(555, 13, 6, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(556, 13, 7, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(557, 12, 3, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(558, 12, 8, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(559, 12, 9, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(560, 12, 11, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(561, 12, 12, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(562, 12, 4, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(563, 12, 5, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(564, 12, 6, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(565, 12, 7, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(566, 11, 1, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(567, 11, 2, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(568, 11, 3, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(569, 11, 9, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(570, 11, 12, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(571, 11, 4, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(572, 11, 5, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(573, 11, 6, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(574, 11, 7, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(575, 10, 2, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(576, 10, 3, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(577, 10, 10, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(578, 10, 11, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(579, 10, 4, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(580, 10, 5, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(581, 10, 6, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(582, 10, 7, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(583, 9, 2, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(584, 9, 3, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(585, 9, 11, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(586, 9, 4, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(587, 9, 5, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(588, 9, 6, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(589, 9, 7, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(612, 8, 1, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(613, 8, 2, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(614, 8, 3, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(615, 8, 8, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(616, 8, 9, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(617, 8, 10, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(618, 8, 11, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(619, 8, 4, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(620, 8, 5, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(621, 8, 6, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(622, 8, 7, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(623, 7, 1, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(624, 7, 2, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(625, 7, 3, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(626, 7, 8, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(627, 7, 9, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(628, 7, 10, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(629, 7, 11, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(630, 7, 4, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(631, 7, 5, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(632, 7, 6, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(633, 7, 7, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(634, 6, 2, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(635, 6, 3, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(636, 6, 8, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(637, 6, 11, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(638, 6, 4, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(639, 6, 5, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(640, 6, 6, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(641, 6, 7, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(642, 5, 2, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(643, 5, 3, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(644, 5, 10, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(645, 5, 4, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(646, 5, 5, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(647, 5, 6, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(648, 5, 7, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(649, 4, 2, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(650, 4, 10, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(651, 4, 4, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(652, 4, 5, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(653, 4, 6, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(654, 4, 7, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(655, 1, 1, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(656, 1, 2, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(657, 1, 3, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(658, 1, 4, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(659, 1, 5, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(660, 1, 6, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(661, 1, 7, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(662, 2, 1, '2021-08-06 05:06:00', '2021-08-06 05:06:00'),
(663, 2, 2, '2021-08-06 05:06:00', '2021-08-06 05:06:00'),
(664, 2, 3, '2021-08-06 05:06:00', '2021-08-06 05:06:00'),
(665, 2, 4, '2021-08-06 05:06:00', '2021-08-06 05:06:00'),
(666, 2, 5, '2021-08-06 05:06:00', '2021-08-06 05:06:00'),
(667, 2, 6, '2021-08-06 05:06:00', '2021-08-06 05:06:00'),
(668, 2, 7, '2021-08-06 05:06:00', '2021-08-06 05:06:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_materials`
--

CREATE TABLE `product_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_materials`
--

INSERT INTO `product_materials` (`id`, `product_id`, `material_id`, `created_at`, `updated_at`) VALUES
(40, 3, 1, '2021-08-01 20:25:20', '2021-08-01 20:25:20'),
(62, 17, 1, '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(63, 18, 6, '2021-08-05 22:19:21', '2021-08-05 22:19:21'),
(64, 19, 1, '2021-08-05 22:30:07', '2021-08-05 22:30:07'),
(65, 20, 1, '2021-08-05 22:42:29', '2021-08-05 22:42:29'),
(66, 21, 1, '2021-08-05 22:48:47', '2021-08-05 22:48:47'),
(68, 22, 4, '2021-08-05 22:53:54', '2021-08-05 22:53:54'),
(69, 23, 7, '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(70, 24, 4, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(71, 24, 7, '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(72, 25, 1, '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(73, 26, 1, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(74, 26, 7, '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(75, 27, 1, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(76, 27, 7, '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(77, 28, 7, '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(82, 29, 4, '2021-08-06 01:37:58', '2021-08-06 01:37:58'),
(83, 29, 7, '2021-08-06 01:37:58', '2021-08-06 01:37:58'),
(84, 30, 7, '2021-08-06 01:47:15', '2021-08-06 01:47:15'),
(85, 31, 1, '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(86, 32, 1, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(87, 32, 7, '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(90, 34, 1, '2021-08-06 03:04:17', '2021-08-06 03:04:17'),
(91, 33, 1, '2021-08-06 03:04:39', '2021-08-06 03:04:39'),
(92, 35, 1, '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(93, 36, 1, '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(95, 37, 1, '2021-08-06 03:48:38', '2021-08-06 03:48:38'),
(96, 38, 1, '2021-08-06 03:51:24', '2021-08-06 03:51:24'),
(97, 39, 1, '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(98, 40, 1, '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(99, 41, 1, '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(100, 16, 5, '2021-08-06 04:30:58', '2021-08-06 04:30:58'),
(101, 15, 5, '2021-08-06 04:33:29', '2021-08-06 04:33:29'),
(102, 14, 6, '2021-08-06 04:36:56', '2021-08-06 04:36:56'),
(103, 13, 6, '2021-08-06 04:40:54', '2021-08-06 04:40:54'),
(104, 12, 1, '2021-08-06 04:44:30', '2021-08-06 04:44:30'),
(105, 11, 5, '2021-08-06 04:45:49', '2021-08-06 04:45:49'),
(106, 10, 1, '2021-08-06 04:47:40', '2021-08-06 04:47:40'),
(107, 9, 2, '2021-08-06 04:48:35', '2021-08-06 04:48:35'),
(110, 8, 4, '2021-08-06 04:53:44', '2021-08-06 04:53:44'),
(111, 7, 1, '2021-08-06 04:54:43', '2021-08-06 04:54:43'),
(112, 6, 3, '2021-08-06 04:57:11', '2021-08-06 04:57:11'),
(113, 5, 5, '2021-08-06 04:57:43', '2021-08-06 04:57:43'),
(114, 4, 2, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(115, 4, 4, '2021-08-06 05:02:36', '2021-08-06 05:02:36'),
(116, 1, 1, '2021-08-06 05:05:45', '2021-08-06 05:05:45'),
(117, 2, 3, '2021-08-06 05:06:00', '2021-08-06 05:06:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `star` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `content`, `star`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'add', 0.00, 1, '2021-08-03 20:32:48', '2021-08-03 20:34:04'),
(2, 1, 1, 'ok', 4.95, 1, '2021-08-04 07:12:44', '2021-08-04 07:13:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `related_images`
--

CREATE TABLE `related_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `related_images`
--

INSERT INTO `related_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 3, 'b3.jpg', '2021-07-29 01:15:10', '2021-07-29 01:15:10'),
(6, 3, 'b4.jpg', '2021-07-29 01:15:10', '2021-07-29 01:15:10'),
(7, 1, 'b5.jpg', '2021-07-29 01:19:23', '2021-07-29 01:19:23'),
(8, 1, 'b6.jpg', '2021-07-29 01:19:23', '2021-07-29 01:19:23'),
(9, 2, 'a5.jpg', '2021-07-29 01:20:35', '2021-07-29 01:20:35'),
(10, 2, 'a6.jpg', '2021-07-29 01:20:35', '2021-07-29 01:20:35'),
(11, 4, 'a1.jpg', '2021-07-29 01:27:18', '2021-07-29 01:27:18'),
(12, 4, 'a2.jpg', '2021-07-29 01:27:18', '2021-07-29 01:27:18'),
(13, 5, 'AB783_SU2839_d1-675x852.jpg', '2021-07-29 01:30:51', '2021-07-29 01:30:51'),
(14, 5, 'AB783_SU2839_d2-675x852.jpg', '2021-07-29 01:30:51', '2021-07-29 01:30:51'),
(15, 5, 'AB783_SU2839_d3-675x852.jpg', '2021-07-29 01:30:51', '2021-07-29 01:30:51'),
(16, 6, 'a13.jpg', '2021-07-29 01:33:39', '2021-07-29 01:33:39'),
(17, 6, 'a14.jpg', '2021-07-29 01:33:39', '2021-07-29 01:33:39'),
(18, 7, 'J8192_RD5100_d1.jpg', '2021-07-29 01:36:07', '2021-07-29 01:36:07'),
(19, 7, 'J8192_RD5100_d2.jpg', '2021-07-29 01:36:07', '2021-07-29 01:36:07'),
(20, 7, 'J8192_RD5100_m.jpg', '2021-07-29 01:36:07', '2021-07-29 01:36:07'),
(21, 8, 'a17.jpg', '2021-07-29 01:46:18', '2021-07-29 01:46:18'),
(22, 8, 'a18.jpg', '2021-07-29 01:46:18', '2021-07-29 01:46:18'),
(23, 9, 'a19.jpg', '2021-07-29 01:49:08', '2021-07-29 01:49:08'),
(24, 9, 'a20.jpg', '2021-07-29 01:49:08', '2021-07-29 01:49:08'),
(25, 10, 'a7.jpg', '2021-07-29 01:50:25', '2021-07-29 01:50:25'),
(26, 10, 'a8.jpg', '2021-07-29 01:50:25', '2021-07-29 01:50:25'),
(27, 11, 'AD465_PK6272_d1-675x852.jpg', '2021-07-29 01:54:12', '2021-07-29 01:54:12'),
(28, 11, 'AD465_PK6272_d2-675x852.jpg', '2021-07-29 01:54:12', '2021-07-29 01:54:12'),
(29, 11, 'AD465_PK6272_m-675x852.jpg', '2021-07-29 01:54:12', '2021-07-29 01:54:12'),
(30, 12, 'a3.jpg', '2021-07-29 01:55:51', '2021-07-29 01:55:51'),
(31, 12, 'a4.jpg', '2021-07-29 01:55:51', '2021-07-29 01:55:51'),
(32, 13, 'c15.jpg', '2021-07-29 02:01:44', '2021-07-29 02:01:44'),
(33, 13, 'c16.jpg', '2021-07-29 02:01:44', '2021-07-29 02:01:44'),
(34, 14, 'c11.jpg', '2021-07-29 02:05:39', '2021-07-29 02:05:39'),
(35, 14, 'c12.jpg', '2021-07-29 02:05:39', '2021-07-29 02:05:39'),
(36, 15, 'AD465_SU2732_d1-675x852.jpg', '2021-07-29 02:07:44', '2021-07-29 02:07:44'),
(37, 15, 'AD465_SU2732_d2.jpg', '2021-07-29 02:07:44', '2021-07-29 02:07:44'),
(38, 15, 'AD465_SU2732_m-675x852.jpg', '2021-07-29 02:07:44', '2021-07-29 02:07:44'),
(39, 16, 'c1.jpg', '2021-07-29 02:09:43', '2021-07-29 02:09:43'),
(40, 16, 'c2.jpg', '2021-07-29 02:09:43', '2021-07-29 02:09:43'),
(41, 17, 'aokhoac.jpg', '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(42, 17, 'hoodie.jpg', '2021-08-05 21:05:05', '2021-08-05 21:05:05'),
(43, 18, 'massagebag.jpg', '2021-08-05 22:19:21', '2021-08-05 22:19:21'),
(44, 19, 'jacket1.jpg', '2021-08-05 22:30:07', '2021-08-05 22:30:07'),
(45, 20, 'tee2.jpg', '2021-08-05 22:42:29', '2021-08-05 22:42:29'),
(46, 21, 'tee5.jpg', '2021-08-05 22:48:47', '2021-08-05 22:48:47'),
(47, 22, 'paint1.jpg', '2021-08-05 22:53:02', '2021-08-05 22:53:02'),
(48, 22, 'pants3.jpg', '2021-08-05 22:53:02', '2021-08-05 22:53:02'),
(49, 23, 'rl_2.jpg', '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(50, 23, 'rl_1.jpg', '2021-08-05 23:05:12', '2021-08-05 23:05:12'),
(51, 24, 'rl1_2.jpg', '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(52, 24, 'rl1_1.jpg', '2021-08-05 23:10:45', '2021-08-05 23:10:45'),
(53, 25, 'rl4_2.jpg', '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(54, 25, 'rl4_1.jpg', '2021-08-06 01:00:10', '2021-08-06 01:00:10'),
(55, 26, 'rt1_ts1.jpg', '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(56, 26, 'fl1_ts1.jpg', '2021-08-06 01:07:28', '2021-08-06 01:07:28'),
(57, 27, 'rl_hd_2.jpg', '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(58, 27, 'rl_hd_1.jpg', '2021-08-06 01:16:09', '2021-08-06 01:16:09'),
(59, 28, 'rl_tsw_2.jpg', '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(60, 28, 'rl_tsw_1.jpg', '2021-08-06 01:21:51', '2021-08-06 01:21:51'),
(61, 29, 'rl_bag1.jpg', '2021-08-06 01:37:58', '2021-08-06 01:37:58'),
(62, 29, 'rl_bag2.jpg', '2021-08-06 01:37:58', '2021-08-06 01:37:58'),
(63, 30, 'rl1_bag2.jpg', '2021-08-06 01:47:15', '2021-08-06 01:47:15'),
(64, 30, 'rl1_bag1.jpg', '2021-08-06 01:47:15', '2021-08-06 01:47:15'),
(65, 31, 'rl_hm_2.jpg', '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(66, 31, 'rl_hm_1.jpg', '2021-08-06 01:57:18', '2021-08-06 01:57:18'),
(67, 32, 'rl2_sk_hm2.jpg', '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(68, 32, 'rl2_hm_1.jpg', '2021-08-06 02:03:04', '2021-08-06 02:03:04'),
(69, 33, 'rl_gc_2.jpg', '2021-08-06 02:57:32', '2021-08-06 02:57:32'),
(70, 33, 'rl_gc_1.jpg', '2021-08-06 02:57:32', '2021-08-06 02:57:32'),
(71, 34, 'rl2_gc_2.jpg', '2021-08-06 03:02:23', '2021-08-06 03:02:23'),
(72, 34, 'rl2_gc_1.jpg', '2021-08-06 03:02:23', '2021-08-06 03:02:23'),
(73, 35, 'rl3_gc_2.jpg', '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(74, 35, 'fl3_gc_1.jpg', '2021-08-06 03:11:37', '2021-08-06 03:11:37'),
(75, 36, 'fl5_gc_2.jpg', '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(76, 36, 'fl5_gc_1.jpg', '2021-08-06 03:16:48', '2021-08-06 03:16:48'),
(77, 37, 'rl_hdgc_2.jpg', '2021-08-06 03:45:24', '2021-08-06 03:45:24'),
(78, 37, 'rl5_hdgc_1.jpg', '2021-08-06 03:45:24', '2021-08-06 03:45:24'),
(79, 38, 'rl6_gc_1.jpg', '2021-08-06 03:51:24', '2021-08-06 03:51:24'),
(80, 39, 'rl_tsgc_2.jpg', '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(81, 39, 'rl_tsgc_1.jpg', '2021-08-06 03:59:31', '2021-08-06 03:59:31'),
(82, 40, 'rl_nike_2.jpg', '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(83, 40, 'rl_nike_1.jpg', '2021-08-06 04:17:00', '2021-08-06 04:17:00'),
(84, 41, 'rl2_nike_2.jpg', '2021-08-06 04:22:25', '2021-08-06 04:22:25'),
(85, 41, 'rl2_nike_1.jpg', '2021-08-06 04:22:25', '2021-08-06 04:22:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `avatar`, `date`, `address`, `city`, `country`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vinh Nguyen', 'ducvinh1020@gmail.com', NULL, '$2y$10$dIWVeJFn0xKDn2k.ncHeZu2koanNIhIUrSaDt1NZ7RA1tTkUD6jdy', '0971976699', 'vinh.jpg', NULL, 'Long Phu - Hoa Thach - Quoc Oai', 'Ha Noi', 'Việt Nam', 1, 1, 'HOBMw3AAoh', '2021-08-01 19:38:37', '2021-08-06 02:40:31'),
(2, '1', '1', NULL, '1', '1', '1', '2021-07-01', '1', '1', '1', 1, 1, NULL, NULL, NULL),
(3, 'toan', 'toan@gmail.com', NULL, '$2y$10$9H/qKLWVpXoMVEpHNbeEc.ORAiPV2YPFJdSMWAvbEhUrgZNLdhZzW', NULL, '1', NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-07-28 01:51:43', '2021-07-28 01:51:43'),
(4, 'toan', 'admin@gmail.com', NULL, '$2y$10$dreLyVXKzZrjR0OOmx9NfOHmgNeO5gJZIL2qdigcYNhl/18HPJnIG', '03256889997', 'ic-3.png', NULL, '100', 'Hà Nội', 'Việt Nam', 0, 1, NULL, '2021-07-29 00:19:36', '2021-07-29 03:52:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_image_unique` (`image`),
  ADD KEY `banners_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_image_unique` (`image`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_logo_unique` (`logo`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_blogs_blog_id_foreign` (`blog_id`),
  ADD KEY `comment_blogs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_products_product_id_foreign` (`product_id`),
  ADD KEY `favorite_products_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_name_unique` (`name`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_image_unique` (`image`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`),
  ADD KEY `product_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Chỉ mục cho bảng `product_materials`
--
ALTER TABLE `product_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_materials_product_id_foreign` (`product_id`),
  ADD KEY `product_materials_material_id_foreign` (`material_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `related_images`
--
ALTER TABLE `related_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `related_images_image_unique` (`image`),
  ADD KEY `related_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `comment_blogs`
--
ALTER TABLE `comment_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=669;

--
-- AUTO_INCREMENT cho bảng `product_materials`
--
ALTER TABLE `product_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `related_images`
--
ALTER TABLE `related_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `comment_blogs`
--
ALTER TABLE `comment_blogs`
  ADD CONSTRAINT `comment_blogs_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `comment_blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `product_materials`
--
ALTER TABLE `product_materials`
  ADD CONSTRAINT `product_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `product_materials_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `related_images`
--
ALTER TABLE `related_images`
  ADD CONSTRAINT `related_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
