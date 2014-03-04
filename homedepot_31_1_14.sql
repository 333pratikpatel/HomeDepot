-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 08:06 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homedepot`
--
CREATE DATABASE IF NOT EXISTS `homedepot` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `homedepot`;

-- --------------------------------------------------------

--
-- Table structure for table `advertise_section`
--

CREATE TABLE IF NOT EXISTS `advertise_section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(200) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `advertise_section`
--

INSERT INTO `advertise_section` (`section_id`, `section_name`) VALUES
(1, 'service_bottom');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `index_city_on_state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=673 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'Kupwara', 1),
(2, 'Badgam', 1),
(3, 'Leh(Ladakh)', 1),
(4, 'Kargil', 1),
(5, 'Punch', 1),
(6, 'Rajouri', 1),
(7, 'Kathua', 1),
(8, 'Baramula', 1),
(9, 'Bandipore', 1),
(10, 'Srinagar', 1),
(11, 'Ganderbal', 1),
(12, 'Pulwama', 1),
(13, 'Shupiyan', 1),
(14, 'Anantnag', 1),
(15, 'Kulgam', 1),
(16, 'Doda', 1),
(17, 'Ramban', 1),
(18, 'Kishtwar', 1),
(19, 'Udhampur', 1),
(20, 'Reasi', 1),
(21, 'Jammu', 1),
(22, 'Samba', 1),
(23, 'Chamba', 2),
(24, 'Kangra', 2),
(25, 'Lahul & Spiti', 2),
(26, 'Kullu', 2),
(27, 'Mandi', 2),
(28, 'Hamirpur', 2),
(29, 'Una', 2),
(30, 'Bilaspur', 2),
(31, 'Solan', 2),
(32, 'Sirmaur', 2),
(33, 'Shimla', 2),
(34, 'Kinnaur', 2),
(35, 'Gurdaspur', 3),
(36, 'Kapurthala ', 3),
(37, 'Jalandhar', 3),
(38, 'Hoshiarpur', 3),
(39, 'Shahid Bhagat Singh Nagar ', 3),
(40, 'Fatehgarh Sahib', 3),
(41, 'Fazilka', 3),
(42, 'Ludhiana', 3),
(43, 'Moga', 3),
(44, 'Firozpur', 3),
(45, 'Muktsar', 3),
(46, 'Faridkot', 3),
(47, 'Pathankot', 3),
(48, 'Bathinda', 3),
(49, 'Mansa', 3),
(50, 'Patiala', 3),
(51, 'Amritsar ', 3),
(52, 'Tarn Taran', 3),
(53, 'Rupnagar', 3),
(54, 'Sahibzada Ajit Singh Nagar', 3),
(55, 'Sangrur', 3),
(56, 'Barnala', 3),
(57, 'Chandigarh', 4),
(58, 'Uttarkashi', 5),
(59, 'Chamoli', 5),
(60, 'Rudraprayag', 5),
(61, 'Tehri Garhwal', 5),
(62, 'Dehradun', 5),
(63, 'Garhwal', 5),
(64, 'Pithoragarh', 5),
(65, 'Bageshwar', 5),
(66, 'Almora', 5),
(67, 'Champawat', 5),
(68, 'Nainital', 5),
(69, 'Udham Singh Nagar', 5),
(70, 'Hardwar', 5),
(71, 'Panchkula', 6),
(72, 'Ambala', 6),
(73, 'Yamunanagar', 6),
(74, 'Kurukshetra', 6),
(75, 'Kaithal', 6),
(76, 'Karnal', 6),
(77, 'Panipat', 6),
(78, 'Sonipat', 6),
(79, 'Jind', 6),
(80, 'Fatehabad', 6),
(81, 'Sirsa', 6),
(82, 'Hisar', 6),
(83, 'Bhiwani', 6),
(84, 'Rohtak', 6),
(85, 'Jhajjar', 6),
(86, 'Mahendragarh', 6),
(87, 'Rewari', 6),
(88, 'Gurgaon', 6),
(89, 'Mewat ', 6),
(90, 'Faridabad', 6),
(91, 'Palwal ', 6),
(92, 'North West', 7),
(93, 'North', 7),
(94, 'North East', 7),
(95, 'East', 7),
(96, 'New Delhi', 7),
(97, 'Central', 7),
(98, 'West', 7),
(99, 'South West', 7),
(100, 'South', 7),
(101, 'Ganganagar ', 8),
(102, 'Hanumangarh', 8),
(103, 'Bikaner', 8),
(104, 'Churu', 8),
(105, 'Jhunjhunun', 8),
(106, 'Alwar', 8),
(107, 'Bharatpur', 8),
(108, 'Dhaulpur', 8),
(109, 'Karauli', 8),
(110, 'Sawai Madhopur', 8),
(111, 'Dausa', 8),
(112, 'Jaipur', 8),
(113, 'Sikar', 8),
(114, 'Nagaur', 8),
(115, 'Jodhpur', 8),
(116, 'Jaisalmer', 8),
(117, 'Barmer', 8),
(118, 'Jalor', 8),
(119, 'Sirohi', 8),
(120, 'Pali', 8),
(121, 'Ajmer', 8),
(122, 'Tonk', 8),
(123, 'Bundi', 8),
(124, 'Bhilwara', 8),
(125, 'Rajsamand', 8),
(126, 'Dungarpur', 8),
(127, 'Banswara', 8),
(128, 'Chittaurgarh', 8),
(129, 'Kota', 8),
(130, 'Baran', 8),
(131, 'Jhalawar', 8),
(132, 'Udaipur', 8),
(133, 'Pratapgarh', 8),
(134, 'Saharanpur', 9),
(135, 'Muzaffarnagar', 9),
(136, 'Sambhal (Bhimnagar)', 9),
(137, 'Bijnor', 9),
(138, 'Moradabad', 9),
(139, 'Rampur', 9),
(140, 'Jyotiba Phule Nagar', 9),
(141, 'Meerut', 9),
(142, 'Baghpat', 9),
(143, 'Ghaziabad', 9),
(144, 'Gautam Buddha Nagar', 9),
(145, 'Bulandshahr ', 9),
(146, 'Aligarh', 9),
(147, 'Mahamaya Nagar (Hathras)', 9),
(148, 'Mathura', 9),
(149, 'Agra', 9),
(150, 'Firozabad', 9),
(151, 'Mainpuri', 9),
(152, 'Budaun', 9),
(153, 'Bareilly', 9),
(154, 'Pilibhit', 9),
(155, 'Shahjahanpur', 9),
(156, 'Kheri', 9),
(157, 'Shamli (Prabudh Nagar)', 9),
(158, 'Sitapur', 9),
(159, 'Hardoi', 9),
(160, 'Unnao', 9),
(161, 'Lucknow', 9),
(162, 'Rae Bareli', 9),
(163, 'Farrukhabad', 9),
(164, 'Kannauj', 9),
(165, 'Etawah', 9),
(166, 'Auraiya', 9),
(167, 'Kanpur Dehat', 9),
(168, 'Kanpur Nagar', 9),
(169, 'Jalaun ', 9),
(170, 'Jhansi', 9),
(171, 'Lalitpur', 9),
(172, 'Hamirpur', 9),
(173, 'Hapur (Panchsheel Nagar)', 9),
(174, 'Mahoba', 9),
(175, 'Banda', 9),
(176, 'Chitrakoot', 9),
(177, 'Fatehpur', 9),
(178, 'Pratapgarh', 9),
(179, 'Kaushambi', 9),
(180, 'Allahabad ', 9),
(181, 'Bara Banki', 9),
(182, 'Faizabad', 9),
(183, 'Ambedkar Nagar', 9),
(184, 'Amethi (Chhatrapati Shahuji Maharaj)', 9),
(185, 'Sultanpur', 9),
(186, 'Bahraich', 9),
(187, 'Shrawasti', 9),
(188, 'Balrampur', 9),
(189, 'Gonda', 9),
(190, 'Siddharthnagar', 9),
(191, 'Basti', 9),
(192, 'Sant Kabir Nagar', 9),
(193, 'Mahrajganj', 9),
(194, 'Gorakhpur', 9),
(195, 'Kushinagar', 9),
(196, 'Deoria', 9),
(197, 'Azamgarh', 9),
(198, 'Mau', 9),
(199, 'Ballia', 9),
(200, 'Jaunpur', 9),
(201, 'Ghazipur', 9),
(202, 'Chandauli', 9),
(203, 'Varanasi', 9),
(204, 'Sant Ravidas Nagar (Bhadohi)', 9),
(205, 'Mirzapur', 9),
(206, 'Sonbhadra', 9),
(207, 'Etah', 9),
(208, 'Kanshiram Nagar', 9),
(209, 'Pashchim Champaran', 10),
(210, 'Purba Champaran', 10),
(211, 'Sheohar', 10),
(212, 'Sitamarhi', 10),
(213, 'Madhubani', 10),
(214, 'Supaul', 10),
(215, 'Araria', 10),
(216, 'Kishanganj', 10),
(217, 'Purnia', 10),
(218, 'Katihar', 10),
(219, 'Madhepura', 10),
(220, 'Saharsa', 10),
(221, 'Darbhanga', 10),
(222, 'Muzaffarpur', 10),
(223, 'Gopalganj', 10),
(224, 'Siwan', 10),
(225, 'Saran', 10),
(226, 'Vaishali', 10),
(227, 'Samastipur', 10),
(228, 'Begusarai', 10),
(229, 'Khagaria', 10),
(230, 'Bhagalpur', 10),
(231, 'Banka', 10),
(232, 'Munger', 10),
(233, 'Lakhisarai', 10),
(234, 'Sheikhpura', 10),
(235, 'Nalanda', 10),
(236, 'Patna', 10),
(237, 'Bhojpur', 10),
(238, 'Buxar', 10),
(239, 'Kaimur (Bhabua)', 10),
(240, 'Rohtas', 10),
(241, 'Aurangabad', 10),
(242, 'Gaya', 10),
(243, 'Nawada', 10),
(244, 'Jamui', 10),
(245, 'Jehanabad ', 10),
(246, 'Arwal', 10),
(247, 'North  city', 11),
(248, 'West city', 11),
(249, 'South city', 11),
(250, 'East city (Gangtok)', 11),
(251, 'Tawang', 12),
(252, 'West Kameng', 12),
(253, 'East Kameng', 12),
(254, 'Papum Pare', 12),
(255, 'Upper Subansiri', 12),
(256, 'West Siang', 12),
(257, 'East Siang', 12),
(258, 'Upper Siang', 12),
(259, 'Changlang', 12),
(260, 'Tirap', 12),
(261, 'Lower Subansiri', 12),
(262, 'Kurung Kumey', 12),
(263, 'Dibang Valley', 12),
(264, 'Lower Dibang Valley', 12),
(265, 'Lohit', 12),
(266, 'Anjaw', 12),
(267, 'Longding', 12),
(268, 'Mon', 13),
(269, 'Mokokchung', 13),
(270, 'Zunheboto', 13),
(271, 'Wokha', 13),
(272, 'Dimapur ', 13),
(273, 'Phek', 13),
(274, 'Tuensang', 13),
(275, 'Longleng', 13),
(276, 'Kiphire', 13),
(277, 'Kohima', 13),
(278, 'Peren', 13),
(279, 'Senapati', 14),
(280, 'Tamenglong ', 14),
(281, 'Churachandpur', 14),
(282, 'Bishnupur', 14),
(283, 'Thoubal', 14),
(284, 'Imphal West', 14),
(285, 'Imphal East', 14),
(286, 'Ukhrul', 14),
(287, 'Chandel', 14),
(288, 'Mamit', 15),
(289, 'Kolasib', 15),
(290, 'Aizawl', 15),
(291, 'Champhai', 15),
(292, 'Serchhip', 15),
(293, 'Lunglei', 15),
(294, 'Lawngtlai', 15),
(295, 'Saiha', 15),
(296, 'West Tripura ', 16),
(297, 'South Tripura ', 16),
(298, 'Dhalai', 16),
(299, 'Unakoti', 16),
(300, 'Gomati', 16),
(301, 'North Tripura', 16),
(302, 'Khowai', 16),
(303, 'Sepahijala', 16),
(304, 'West Garo Hills', 17),
(305, 'East Garo Hills', 17),
(306, 'East Jaintia Hills', 17),
(307, 'South Garo Hills', 17),
(308, 'South West Garo Hills', 17),
(309, 'West Khasi Hills', 17),
(310, 'Ribhoi', 17),
(311, 'South West Khasi Hills', 17),
(312, 'East Khasi Hills', 17),
(313, 'Jaintia Hills', 17),
(314, 'North Garo Hills', 17),
(315, 'Kokrajhar', 18),
(316, 'Dhubri', 18),
(317, 'Goalpara', 18),
(318, 'Barpeta', 18),
(319, 'Morigaon', 18),
(320, 'Nagaon', 18),
(321, 'Sonitpur', 18),
(322, 'Lakhimpur', 18),
(323, 'Dhemaji', 18),
(324, 'Tinsukia', 18),
(325, 'Dibrugarh', 18),
(326, 'Sivasagar', 18),
(327, 'Jorhat', 18),
(328, 'Golaghat', 18),
(329, 'Karbi Anglong', 18),
(330, 'Dima Hasao', 18),
(331, 'Cachar', 18),
(332, 'Karimganj', 18),
(333, 'Hailakandi', 18),
(334, 'Bongaigaon', 18),
(335, 'Chirang', 18),
(336, 'Kamrup', 18),
(337, 'Kamrup Metropolitan', 18),
(338, 'Nalbari', 18),
(339, 'Baksa', 18),
(340, 'Darrang', 18),
(341, 'Udalguri', 18),
(342, 'Darjiling ', 19),
(343, 'Jalpaiguri ', 19),
(344, 'Koch Bihar ', 19),
(345, 'Uttar Dinajpur', 19),
(346, 'Dakshin Dinajpur', 19),
(347, 'Maldah ', 19),
(348, 'Murshidabad ', 19),
(349, 'Birbhum', 19),
(350, 'Barddhaman ', 19),
(351, 'Nadia ', 19),
(352, 'North Twenty Four Parganas', 19),
(353, 'Hugli ', 19),
(354, 'Bankura ', 19),
(355, 'Puruliya', 19),
(356, 'Haora ', 19),
(357, 'Kolkata', 19),
(358, 'South Twenty Four Parganas', 19),
(359, 'Paschim Medinipur', 19),
(360, 'Purba Medinipur', 19),
(361, 'Garhwa ', 20),
(362, 'Chatra', 20),
(363, 'Kodarma', 20),
(364, 'Giridih', 20),
(365, 'Deoghar', 20),
(366, 'Godda', 20),
(367, 'Sahibganj', 20),
(368, 'Pakur', 20),
(369, 'Dhanbad', 20),
(370, 'Bokaro', 20),
(371, 'Lohardaga', 20),
(372, 'Purbi Singhbhum', 20),
(373, 'Palamu', 20),
(374, 'Latehar', 20),
(375, 'Hazaribagh', 20),
(376, 'Ramgarh', 20),
(377, 'Dumka', 20),
(378, 'Jamtara', 20),
(379, 'Ranchi', 20),
(380, 'Khunti', 20),
(381, 'Gumla', 20),
(382, 'Simdega', 20),
(383, 'Pashchimi Singhbhum', 20),
(384, 'Saraikela-Kharsawan', 20),
(385, 'Bargarh', 21),
(386, 'Jharsuguda', 21),
(387, 'Sambalpur', 21),
(388, 'Debagarh', 21),
(389, 'Sundargarh', 21),
(390, 'Kendujhar', 21),
(391, 'Mayurbhanj', 21),
(392, 'Baleshwar', 21),
(393, 'Bhadrak', 21),
(394, 'Kendrapara ', 21),
(395, 'Jagatsinghapur ', 21),
(396, 'Cuttack', 21),
(397, 'Jajapur  ', 21),
(398, 'Dhenkanal', 21),
(399, 'Anugul  ', 21),
(400, 'Nayagarh  ', 21),
(401, 'Khordha ', 21),
(402, 'Puri', 21),
(403, 'Ganjam', 21),
(404, 'Gajapati', 21),
(405, 'Kandhamal', 21),
(406, 'Baudh', 21),
(407, 'Subarnapur', 21),
(408, 'Balangir', 21),
(409, 'Nuapada', 21),
(410, 'Kalahandi', 21),
(411, 'Rayagada  ', 21),
(412, 'Nabarangapur ', 21),
(413, 'Koraput', 21),
(414, 'Malkangiri  ', 21),
(415, 'Balod', 22),
(416, 'Baloda Bazar', 22),
(417, 'Balrampur', 22),
(418, 'Koriya', 22),
(419, 'Surguja', 22),
(420, 'Jashpur ', 22),
(421, 'Raigarh', 22),
(422, 'Korba ', 22),
(423, 'Janjgir - Champa', 22),
(424, 'Bilaspur', 22),
(425, 'Kabeerdham', 22),
(426, 'Kondagaon', 22),
(427, 'Rajnandgaon', 22),
(428, 'Durg', 22),
(429, 'Sukma', 22),
(430, 'Gariyaband', 22),
(431, 'Raipur', 22),
(432, 'Surajpur', 22),
(433, 'Mahasamund', 22),
(434, 'Dhamtari ', 22),
(435, 'Mungeli', 22),
(436, 'Uttar Bastar Kanker', 22),
(437, 'Bastar', 22),
(438, 'Bemetara', 22),
(439, 'Narayanpur', 22),
(440, 'Dakshin Bastar Dantewada', 22),
(441, 'Bijapur', 22),
(442, 'Agar-Malwa', 23),
(443, 'Sheopur ', 23),
(444, 'Morena', 23),
(445, 'Bhind', 23),
(446, 'Gwalior', 23),
(447, 'Datia', 23),
(448, 'Shivpuri', 23),
(449, 'Tikamgarh', 23),
(450, 'Chhatarpur', 23),
(451, 'Panna', 23),
(452, 'Sagar', 23),
(453, 'Damoh', 23),
(454, 'Satna', 23),
(455, 'Rewa', 23),
(456, 'Umaria', 23),
(457, 'Neemuch ', 23),
(458, 'Mandsaur', 23),
(459, 'Ratlam', 23),
(460, 'Ujjain', 23),
(461, 'Shajapur', 23),
(462, 'Dewas', 23),
(463, 'Dhar', 23),
(464, 'Indore', 23),
(465, 'Khargone (West Nimar)', 23),
(466, 'Barwani ', 23),
(467, 'Rajgarh', 23),
(468, 'Vidisha', 23),
(469, 'Bhopal', 23),
(470, 'Sehore', 23),
(471, 'Raisen', 23),
(472, 'Betul', 23),
(473, 'Harda ', 23),
(474, 'Hoshangabad', 23),
(475, 'Katni ', 23),
(476, 'Jabalpur', 23),
(477, 'Narsimhapur', 23),
(478, 'Dindori ', 23),
(479, 'Mandla', 23),
(480, 'Chhindwara', 23),
(481, 'Seoni', 23),
(482, 'Balaghat', 23),
(483, 'Guna', 23),
(484, 'Ashoknagar', 23),
(485, 'Shahdol', 23),
(486, 'Anuppur', 23),
(487, 'Sidhi', 23),
(488, 'Singrauli', 23),
(489, 'Jhabua', 23),
(490, 'Alirajpur', 23),
(491, 'Khandwa (East Nimar)', 23),
(492, 'Burhanpur', 23),
(493, 'Kachchh', 24),
(494, 'Banas Kantha', 24),
(495, 'Patan  ', 24),
(496, 'Mahesana', 24),
(497, 'Mahisagar', 24),
(498, 'Sabar Kantha', 24),
(499, 'Gandhinagar', 24),
(500, 'Morbi', 24),
(501, 'Ahmedabad', 24),
(502, 'Gir Somnath', 24),
(503, 'Surendranagar', 24),
(504, 'Rajkot', 24),
(505, 'Jamnagar', 24),
(506, 'Porbandar ', 24),
(507, 'Junagadh', 24),
(508, 'Amreli', 24),
(509, 'Bhavnagar', 24),
(510, 'Anand  ', 24),
(511, 'Botad', 24),
(512, 'Aravalli', 24),
(513, 'Chhota Udaipur', 24),
(514, 'Kheda', 24),
(515, 'Devbhoomi Dwarka', 24),
(516, 'Panch Mahals', 24),
(517, 'Dohad  ', 24),
(518, 'Vadodara', 24),
(519, 'Narmada', 24),
(520, 'Bharuch', 24),
(521, 'The Dangs', 24),
(522, 'Navsari  ', 24),
(523, 'Valsad', 24),
(524, 'Surat', 24),
(525, 'Tapi', 24),
(526, 'Diu', 25),
(527, 'Daman', 25),
(528, 'Dadra & Nagar Haveli', 26),
(529, 'Nandurbar', 27),
(530, 'Dhule', 27),
(531, 'Jalgaon', 27),
(532, 'Buldana', 27),
(533, 'Akola', 27),
(534, 'Washim', 27),
(535, 'Amravati', 27),
(536, 'Wardha', 27),
(537, 'Nagpur', 27),
(538, 'Bhandara', 27),
(539, 'Gondiya', 27),
(540, 'Gadchiroli', 27),
(541, 'Chandrapur', 27),
(542, 'Yavatmal', 27),
(543, 'Nanded', 27),
(544, 'Hingoli', 27),
(545, 'Parbhani', 27),
(546, 'Jalna', 27),
(547, 'Aurangabad', 27),
(548, 'Nashik', 27),
(549, 'Thane', 27),
(550, 'Mumbai Suburban', 27),
(551, 'Mumbai', 27),
(552, 'Raigarh', 27),
(553, 'Pune', 27),
(554, 'Ahmadnagar', 27),
(555, 'Bid', 27),
(556, 'Latur', 27),
(557, 'Osmanabad', 27),
(558, 'Solapur', 27),
(559, 'Satara', 27),
(560, 'Ratnagiri', 27),
(561, 'Sindhudurg', 27),
(562, 'Kolhapur', 27),
(563, 'Sangli', 27),
(564, 'Adilabad', 28),
(565, 'Nizamabad', 28),
(566, 'Karimnagar', 28),
(567, 'Medak', 28),
(568, 'Hyderabad', 28),
(569, 'Rangareddy', 28),
(570, 'Mahbubnagar', 28),
(571, 'Nalgonda', 28),
(572, 'Warangal', 28),
(573, 'Khammam', 28),
(574, 'Srikakulam', 28),
(575, 'Vizianagaram', 28),
(576, 'Visakhapatnam', 28),
(577, 'East Godavari', 28),
(578, 'West Godavari', 28),
(579, 'Krishna', 28),
(580, 'Guntur', 28),
(581, 'Prakasam', 28),
(582, 'Sri Potti Sriramulu Nellore', 28),
(583, 'Y.S.R.', 28),
(584, 'Kurnool', 28),
(585, 'Anantapur', 28),
(586, 'Chittoor', 28),
(587, 'Belgaum', 29),
(588, 'Bagalkot ', 29),
(589, 'Bijapur', 29),
(590, 'Bidar', 29),
(591, 'Raichur', 29),
(592, 'Koppal', 29),
(593, 'Gadag', 29),
(594, 'Dharwad', 29),
(595, 'Uttara Kannada', 29),
(596, 'Haveri', 29),
(597, 'Bellary', 29),
(598, 'Chitradurga', 29),
(599, 'Davanagere', 29),
(600, 'Shimoga', 29),
(601, 'Udupi', 29),
(602, 'Chikmagalur', 29),
(603, 'Tumkur', 29),
(604, 'Bangalore', 29),
(605, 'Mandya', 29),
(606, 'Hassan', 29),
(607, 'Dakshina Kannada', 29),
(608, 'Kodagu', 29),
(609, 'Mysore', 29),
(610, 'Chamarajanagar', 29),
(611, 'Gulbarga', 29),
(612, 'Yadgir', 29),
(613, 'Kolar', 29),
(614, 'Chikkaballapura', 29),
(615, 'Bangalore Rural', 29),
(616, 'Ramanagara', 29),
(617, 'North Goa (Panji)', 30),
(618, 'South Goa', 30),
(619, 'Lakshadweep', 31),
(620, 'Kasaragod', 32),
(621, 'Kannur', 32),
(622, 'Wayanad', 32),
(623, 'Kozhikode', 32),
(624, 'Malappuram', 32),
(625, 'Palakkad', 32),
(626, 'Thrissur', 32),
(627, 'Ernakulam', 32),
(628, 'Idukki ', 32),
(629, 'Kottayam', 32),
(630, 'Alappuzha', 32),
(631, 'Pathanamthitta', 32),
(632, 'Kollam', 32),
(633, 'Thiruvananthapuram', 32),
(634, 'Thiruvallur', 33),
(635, 'Chennai', 33),
(636, 'Kancheepuram', 33),
(637, 'Vellore', 33),
(638, 'Tiruvannamalai', 33),
(639, 'Viluppuram', 33),
(640, 'Salem', 33),
(641, 'Namakkal   ', 33),
(642, 'Erode', 33),
(643, 'The Nilgiris', 33),
(644, 'Dindigul', 33),
(645, 'Karur ', 33),
(646, 'Tiruchirappalli', 33),
(647, 'Perambalur  ', 33),
(648, 'Ariyalur  ', 33),
(649, 'Cuddalore', 33),
(650, 'Nagapattinam  ', 33),
(651, 'Thiruvarur', 33),
(652, 'Thanjavur', 33),
(653, 'Pudukkottai', 33),
(654, 'Sivaganga', 33),
(655, 'Madurai', 33),
(656, 'Theni  ', 33),
(657, 'Virudhunagar', 33),
(658, 'Ramanathapuram', 33),
(659, 'Thoothukkudi', 33),
(660, 'Tirunelveli ', 33),
(661, 'Kanniyakumari', 33),
(662, 'Dharmapuri', 33),
(663, 'Krishnagiri', 33),
(664, 'Coimbatore', 33),
(665, 'Tiruppur', 33),
(666, 'Yanam', 34),
(667, 'Puducherry', 34),
(668, 'Mahe', 34),
(669, 'Karaikal', 34),
(670, 'Nicobars', 35),
(671, 'North  & Middle Andaman', 35),
(672, 'South Andaman', 35);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(1, 'Aquel'),
(2, 'Jaquar'),
(3, 'Ganga'),
(4, 'Raksha'),
(5, 'Florence'),
(7, 'Ess Ess');

-- --------------------------------------------------------

--
-- Table structure for table `expert_area`
--

CREATE TABLE IF NOT EXISTS `expert_area` (
  `worker_expertice_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `worker_expertice_name` varchar(255) NOT NULL,
  PRIMARY KEY (`worker_expertice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `expert_area`
--

INSERT INTO `expert_area` (`worker_expertice_id`, `service_id`, `worker_expertice_name`) VALUES
(1, 1, 'New Residence Work'),
(2, 1, 'New Commercial Work'),
(3, 2, 'Tap Fitting'),
(4, 2, 'Water proofing'),
(5, 2, 'Pump Fitting'),
(6, 1, 'New Site'),
(7, 1, 'Repairing work'),
(8, 2, 'Drainage'),
(9, 2, 'Swimming pool'),
(10, 2, 'Gas pipe line'),
(11, 2, 'Zula work');

-- --------------------------------------------------------

--
-- Table structure for table `expert_in`
--

CREATE TABLE IF NOT EXISTS `expert_in` (
  `expert_in_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` varchar(50) NOT NULL,
  `worker_expertice_id` int(11) NOT NULL,
  PRIMARY KEY (`expert_in_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `expert_in`
--

INSERT INTO `expert_in` (`expert_in_id`, `worker_id`, `worker_expertice_id`) VALUES
(1, 'GUJAHM11092001', 3),
(5, 'GUJVDR11092005', 1),
(6, 'GUJVDR11092001', 1),
(7, 'GUJVDR11092002', 1),
(8, 'GUJVDR11092003', 4),
(9, 'GUJVDR11092004', 4),
(10, 'GUJVDR11092005', 2),
(93, 'GUJSUR11092010', 3),
(94, 'GUJSUR11092010', 4),
(95, 'GUJSUR11092010', 5),
(96, 'GUJSUR11092010', 9),
(97, 'GUJAHM11092009', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `worker_id`, `name`, `phone`, `email`, `feedback`) VALUES
(1, 'GUJSUR11092010', 'Pratik Patel', '33556677', 'pratik@gmail.com', 'Very good and fast work done by this plumber.\r\nI am impressed. :)'),
(2, 'GUJSUR11092010', 'Jaymin Shah', '33556677', 'pratik@gmail.com', 'Very fast work done by this plumber.\r\nI am impressed. :)');

-- --------------------------------------------------------

--
-- Table structure for table `generator`
--

CREATE TABLE IF NOT EXISTS `generator` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generator`
--

INSERT INTO `generator` (`id`, `num`) VALUES
(1, 11092017);

-- --------------------------------------------------------

--
-- Table structure for table `service_advertise`
--

CREATE TABLE IF NOT EXISTS `service_advertise` (
  `service_advertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `advertise_section_id` int(11) NOT NULL,
  `advertise_company_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `advertise_image` varchar(255) NOT NULL,
  PRIMARY KEY (`service_advertise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service_advertise`
--

INSERT INTO `service_advertise` (`service_advertise_id`, `advertise_section_id`, `advertise_company_id`, `service_id`, `advertise_image`) VALUES
(1, 1, 1, 2, 'aquel_small.jpg'),
(2, 1, 2, 2, 'jaquar_small.jpg'),
(3, 1, 3, 2, 'ganga_small.jpg'),
(4, 1, 4, 2, 'raksha_small.jpg'),
(5, 1, 5, 2, 'florence_small.jpg'),
(6, 1, 6, 2, 'essess_small.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE IF NOT EXISTS `service_category` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(25) NOT NULL,
  `service_photo` varchar(200) NOT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `service_type` (`service_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`service_id`, `service_type`, `service_photo`) VALUES
(1, 'Mason', 'mason.jpg'),
(2, 'Plumber', 'plumber.jpg'),
(3, 'Painter', 'painter.jpg'),
(4, 'Electrician', 'electrician.jpg'),
(5, 'Carpenter', 'carpenter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_subcategory`
--

CREATE TABLE IF NOT EXISTS `service_subcategory` (
  `service_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `service_subtype` varchar(25) NOT NULL,
  PRIMARY KEY (`service_subcategory_id`,`service_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `service_subcategory`
--

INSERT INTO `service_subcategory` (`service_subcategory_id`, `service_id`, `service_subtype`) VALUES
(1, 2, 'Plumber'),
(2, 2, 'Plumber Consultant'),
(3, 2, 'Plumber Contractor'),
(4, 1, 'Mason Contractor'),
(5, 1, 'Mason'),
(6, 5, 'Carpenter'),
(7, 4, 'Electrician'),
(8, 3, 'Painter');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'JAMMU & KASHMIR'),
(2, 'HIMACHAL PRADESH'),
(3, 'PUNJAB'),
(4, 'CHANDIGARH'),
(5, 'UTTARAKHAND'),
(6, 'HARYANA'),
(7, 'NCT OF DELHI'),
(8, 'RAJASTHAN'),
(9, 'UTTAR PRADESH'),
(10, 'BIHAR'),
(11, 'SIKKIM'),
(12, 'ARUNACHAL PRADESH'),
(13, 'NAGALAND'),
(14, 'MANIPUR'),
(15, 'MIZORAM'),
(16, 'TRIPURA'),
(17, 'MEGHALAYA'),
(18, 'ASSAM'),
(19, 'WEST BENGAL'),
(20, 'JHARKHAND'),
(21, 'ODISHA'),
(22, 'CHHATTISGARH'),
(23, 'MADHYA PRADESH'),
(24, 'GUJARAT'),
(25, 'DAMAN & DIU'),
(26, 'DADRA & NAGAR HAVELI'),
(27, 'MAHARASHTRA'),
(28, 'ANDHRA PRADESH'),
(29, 'KARNATAKA'),
(30, 'GOA'),
(31, 'LAKSHADWEEP'),
(32, 'KERALA'),
(33, 'TAMIL NADU'),
(34, 'PUDUCHERRY'),
(35, 'ANDAMAN & NICOBAR ISLANDS');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `worker_id` varchar(50) NOT NULL,
  `worker_fname` varchar(50) NOT NULL,
  `worker_lname` varchar(50) DEFAULT NULL,
  `worker_service_subcategory_id` int(11) NOT NULL,
  `worker_address_line_1` varchar(255) NOT NULL,
  `worker_address_line_2` varchar(255) NOT NULL,
  `worker_area` varchar(50) NOT NULL,
  `worker_latitude` float(10,6) NOT NULL,
  `worker_longitude` float(10,6) NOT NULL,
  `worker_city` varchar(50) NOT NULL,
  `worker_state` varchar(50) NOT NULL,
  `worker_birthdate` date DEFAULT NULL,
  `worker_contact` varchar(15) NOT NULL,
  `worker_email` varchar(100) DEFAULT NULL,
  `worker_gender` varchar(10) NOT NULL DEFAULT 'Male',
  `worker_isverified` tinyint(1) NOT NULL DEFAULT '0',
  `worker_rating` tinyint(4) NOT NULL,
  `worker_photo` varchar(200) NOT NULL,
  `worker_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `worker_fname`, `worker_lname`, `worker_service_subcategory_id`, `worker_address_line_1`, `worker_address_line_2`, `worker_area`, `worker_latitude`, `worker_longitude`, `worker_city`, `worker_state`, `worker_birthdate`, `worker_contact`, `worker_email`, `worker_gender`, `worker_isverified`, `worker_rating`, `worker_photo`, `worker_password`) VALUES
('2450111092015', 'hiren', 'Patel', 1, 'abc', 'def', 'Naroda', 0.000000, 0.000000, '501', '24', '1992-03-20', '9725251072', '333raj@gmail.com', 'Female', 0, 2, '0', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092001', 'Kanjibhai', 'Chavada', 1, '', '', 'naroda', 23.074530, 72.652428, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'kanaji01@gujaratplumber.com', 'Male', 1, 5, 'GUJVDR11092001.jpg', '15cc992d5177a2ec8bd741a3163b254f'),
('GUJAHM11092002', 'Hashmukhbhai', 'Parghi', 2, '', '', 'paldi', 23.009590, 72.561890, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'hasmukh02@gujaratplumber.com', 'Male', 1, 5, 'GUJVDR11092002.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092003', 'Rameshbhai', 'Paramar', 1, '', '', 'navrangpura', 23.069241, 72.653214, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'ramesh03@gujaratplumber.com', 'Male', 1, 4, 'GUJVDR11092003.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092004', 'Dineshbhai', 'Vala', 3, '', '', 'vastrapur', 23.035959, 72.529388, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'dinesh04@gujaratplumber.com', 'Male', 1, 4, 'GUJVDR11092004.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092005', 'Sureshkumar', 'Chavada', 4, '', '', 'naroda', 23.079981, 72.653549, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'suresh05@gujaratplumber.com', 'Male', 1, 5, 'GUJVDR11092005.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092007', 'Nikhil', 'Patel', 6, 'Shriram Stores Compaund', 'Opp. Kailash Complex', 'vastrapur', 0.000000, 0.000000, 'ahmedabad', 'Gujarat', '1992-03-20', '9725251072', '333pratik@gmai.com', 'Male', 0, 2, 'GUJVDR11092001.jpg', '9b0a0197243b88b7b530f1041e377cfe'),
('GUJAHM11092009', 'pratik', 'patel', 2, 'Shriram Stores Compaund', 'Opp. Kailash Complex', 'naroda', 0.000000, 0.000000, 'ahmedabad', 'Gujarat', '1992-03-20', '9725251072', '333pratik@gmai.com', 'Male', 0, 2, 'GUJVDR11092003.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092012', 'suresh', 'chavada', 1, 'demo', 'demo', 'naroa', 0.000000, 0.000000, 'ahmedabad', 'Gujarat', '1985-01-06', '8980890009', 'gujaratplumber@gmail.com', 'Male', 0, 2, '87017-2.jpg', 'e4992a6fc718557d4725e6eedc1de6ab'),
('GUJAHM11092016', 'hiren', 'shah', 1, 'Shriram Stores Compaund', 'Opp. Kailash Complex', 'Naroda', 0.000000, 0.000000, 'Ahmedabad', 'GUJARAT', '1992-03-20', '9725251072', '333pratik@gmai.com', 'Female', 0, 2, '7.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJSUR11092010', 'Raj', 'Patel', 3, 'abc', 'def', 'narol', 0.000000, 0.000000, 'Surat', 'Gujarat', '1992-03-20', '9898989898', '333raj@gmail.com', 'Male', 0, 2, 'GUJVDR11092005.jpg', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJSUR11092011', 'Jaymin', 'Shah', 7, 'DEF', 'def', 'navrangpura', 0.000000, 0.000000, 'Surat', 'Gujarat', '1992-03-20', '9809998877', 'raj@gmail.com', 'Female', 0, 2, 'GUJVDR11092004.jpg', '15cc992d5177a2ec8bd741a3163b254f');

-- --------------------------------------------------------

--
-- Table structure for table `work_detail`
--

CREATE TABLE IF NOT EXISTS `work_detail` (
  `worker_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` varchar(50) NOT NULL,
  `work_description` varchar(1000) DEFAULT NULL,
  `work_title` varchar(100) NOT NULL,
  `work_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`worker_detail_id`,`worker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `work_detail`
--

INSERT INTO `work_detail` (`worker_detail_id`, `worker_id`, `work_description`, `work_title`, `work_photo`) VALUES
(1, 'GUJVDR11092001', 'Bathroom Plumbing ', 'demo', NULL),
(2, 'GUJSUR11092010', 'ahndnfn dnmgm', 'dbd', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  ADD CONSTRAINT `FK_service_subcategory` FOREIGN KEY (`service_id`) REFERENCES `service_category` (`service_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
