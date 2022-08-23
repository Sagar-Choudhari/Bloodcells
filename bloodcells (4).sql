-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 03:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodcells`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `emailid` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `emailid`, `birthday`, `gender`, `password`) VALUES
(2569084790040014, 'Sagar', 'Choudhari', 'sagarsphotoworks@gmail.com', '1999-05-21', 'male', 'cdbe588e7d72bdaa1bbcce88846e3bb7'),
(2569084790040014, 'Sagar', 'Choudhari', 'sagarsphotoworks@gmail.com', '1999-05-21', 'male', 'cdbe588e7d72bdaa1bbcce88846e3bb7');

-- --------------------------------------------------------

--
-- Table structure for table `all_cities`
--

CREATE TABLE `all_cities` (
  `city_name` text DEFAULT NULL,
  `city_code` text DEFAULT NULL,
  `state_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_cities`
--

INSERT INTO `all_cities` (`city_name`, `city_code`, `state_code`) VALUES
('Alipur', '101', '1'),
('Andaman Island', '102', '1'),
('Anderson Island', '103', '1'),
('Arainj-Laka-Punga', '104', '1'),
('Austinabad', '105', '1'),
('Bamboo Flat', '106', '1'),
('Barren Island', '107', '1'),
('Beadonabad', '108', '1'),
('Betapur', '109', '1'),
('Bindraban', '110', '1'),
('Bonington', '111', '1'),
('Brookesabad', '112', '1'),
('Cadell Point', '113', '1'),
('Calicut', '114', '1'),
('Chetamale', '115', '1'),
('Cinque Islands', '116', '1'),
('Defence Island', '117', '1'),
('Digilpur', '118', '1'),
('Dolyganj', '119', '1'),
('Flat Island', '120', '1'),
('Geinyale', '121', '1'),
('Great Coco Island', '122', '1'),
('Haddo', '123', '1'),
('Havelock Island', '124', '1'),
('Henry Lawrence Island', '125', '1'),
('Herbertabad', '126', '1'),
('Hobdaypur', '127', '1'),
('Ilichar', '128', '1'),
('Ingoie', '128', '1'),
('Inteview Island', '130', '1'),
('Jangli Ghat', '131', '1'),
('Jhon Lawrence Island', '132', '1'),
('Karen', '133', '1'),
('Kartara', '134', '1'),
('KYD Islannd', '135', '1'),
('Landfall Island', '136', '1'),
('Little Andmand', '137', '1'),
('Little Coco Island', '138', '1'),
('Long Island', '138', '1'),
('Maimyo', '140', '1'),
('Malappuram', '141', '1'),
('Manglutan', '142', '1'),
('Manpur', '143', '1'),
('Mitha Khari', '144', '1'),
('Neill Island', '145', '1'),
('Nicobar Island', '146', '1'),
('North Brother Island', '147', '1'),
('North Passage Island', '148', '1'),
('North Sentinel Island', '149', '1'),
('Nothen Reef Island', '150', '1'),
('Outram Island', '151', '1'),
('Pahlagaon', '152', '1'),
('Palalankwe', '153', '1'),
('Passage Island', '154', '1'),
('Phaiapong', '155', '1'),
('Phoenix Island', '156', '1'),
('Port Blair', '157', '1'),
('Preparis Island', '158', '1'),
('Protheroepur', '159', '1'),
('Rangachang', '160', '1'),
('Rongat', '161', '1'),
('Rutland Island', '162', '1'),
('Sabari', '163', '1'),
('Saddle Peak', '164', '1'),
('Shadipur', '165', '1'),
('Smith Island', '166', '1'),
('Sound Island', '167', '1'),
('South Sentinel Island', '168', '1'),
('Spike Island', '169', '1'),
('Tarmugli Island', '170', '1'),
('Taylerabad', '171', '1'),
('Titaije', '172', '1'),
('Toibalawe', '173', '1'),
('Tusonabad', '174', '1'),
('West Island', '175', '1'),
('Wimberleyganj', '176', '1'),
('Yadita', '177', '1'),
('Adilabad', '201', '2'),
('Anantapur', '201', '2'),
('Chittoor', '203', '2'),
('Cuddapah', '204', '2'),
('East Godavari', '205', '2'),
('Guntur', '206', '2'),
('Hyderabad', '207', '2'),
('Karimnagar', '208', '2'),
('Khammam', '209', '2'),
('Krishna', '210', '2'),
('Kurnool', '211', '2'),
('Mahabubnagar', '212', '2'),
('Medak', '213', '2'),
('Nalgonda', '214', '2'),
('Nellore', '215', '2'),
('Nizamabad', '216', '2'),
('Prakasam', '217', '2'),
('Rangareddy', '218', '2'),
('Srikakulam', '219', '2'),
('Visakhapatnam', '220', '2'),
('Vizianagaram', '221', '2'),
('Warangal', '222', '2'),
('West Godavari', '223', '2'),
('Anjaw', '301', '3'),
('Changlang', '302', '3'),
('Dibang Valley', '303', '3'),
('East Kameng', '304', '3'),
('East Siang', '305', '3'),
('Itanagar', '306', '3'),
('Kurung Kumey', '307', '3'),
('Lohit', '308', '3'),
('Lower Dibang Valley', '309', '3'),
('Lower Subansiri', '310', '3'),
('Papum Pare', '311', '3'),
('Tawang', '312', '3'),
('Tirap', '313', '3'),
('Upper Siang', '314', '3'),
('Upper Subansiri', '315', '3'),
('West Kameng', '316', '3'),
('West Siang', '317', '3'),
('Barpeta', '401', '4'),
('Bongaigaon', '402', '4'),
('Cachar', '403', '4'),
('Darrang', '404', '4'),
('Dhemaji', '405', '4'),
('Dhubri', '406', '4'),
('Dibrugarh', '407', '4'),
('Goalpara', '408', '4'),
('Golaghat', '409', '4'),
('Guwahati', '410', '4'),
('Hailakandi', '411', '4'),
('Jorhat', '412', '4'),
('Kamrup', '413', '4'),
('Karbi Anglong', '414', '4'),
('Karimganj', '415', '4'),
('Kokrajhar', '416', '4'),
('Lakhimpur', '417', '4'),
('Marigaon', '418', '4'),
('Nagaon', '419', '4'),
('Nalbari', '420', '4'),
('North Cachar Hills', '421', '4'),
('Silchar', '422', '4'),
('Sivasagar', '423', '4'),
('Sonitpur', '424', '4'),
('Tinsukia', '425', '4'),
('Udalguri', '426', '4'),
('Araria', '501', '5'),
('Aurangabad', '502', '5'),
('Banka', '503', '5'),
('Begusarai', '504', '5'),
('Bhagalpur', '505', '5'),
('Bhojpur', '506', '5'),
('Buxar', '507', '5'),
('Darbhanga', '508', '5'),
('East Champaran', '509', '5'),
('Gaya', '510', '5'),
('Gopalganj', '511', '5'),
('Jamshedpur', '512', '5'),
('Jamui', '513', '5'),
('Jehanabad', '514', '5'),
('Kaimur (Bhabua)', '515', '5'),
('Katihar', '516', '5'),
('Khagaria', '517', '5'),
('Kishanganj', '518', '5'),
('Lakhisarai', '519', '5'),
('Madhepura', '520', '5'),
('Madhubani', '521', '5'),
('Munger', '522', '5'),
('Muzaffarpur', '523', '5'),
('Nalanda', '524', '5'),
('Nawada', '525', '5'),
('Patna', '526', '5'),
('Purnia', '527', '5'),
('Rohtas', '528', '5'),
('Saharsa', '529', '5'),
('Samastipur', '530', '5'),
('Saran', '531', '5'),
('Sheikhpura', '532', '5'),
('Sheohar', '533', '5'),
('Sitamarhi', '534', '5'),
('Siwan', '535', '5'),
('Supaul', '536', '5'),
('Vaishali', '537', '5'),
('West Champaran', '538', '5'),
('Chandigarh', '601', '6'),
('Mani Marja', '602', '6'),
('Bastar', '701', '7'),
('Bhilai', '702', '7'),
('Bijapur', '703', '7'),
('Bilaspur', '704', '7'),
('Dhamtari', '705', '7'),
('Durg', '706', '7'),
('Janjgir-Champa', '707', '7'),
('Jashpur', '708', '7'),
('Kabirdham-Kawardha', '709', '7'),
('Korba', '710', '7'),
('Korea', '711', '7'),
('Mahasamund', '712', '7'),
('Narayanpur', '713', '7'),
('Norh Bastar-Kanker', '714', '7'),
('Raigarh', '715', '7'),
('Raipur', '716', '7'),
('Rajnandgaon', '717', '7'),
('South Bastar-Dantewada', '718', '7'),
('Surguja', '719', '7'),
('Amal', '801', '8'),
('Amli', '802', '8'),
('Bedpa', '803', '8'),
('Chikhli', '804', '8'),
('Dadra Nagar Haveli', '805', '8'),
('Dahikhed', '806', '8'),
('Dolara', '807', '8'),
('Galonda', '808', '8'),
('Kanadi', '809', '8'),
('Karchond', '810', '8'),
('Khadoli', '811', '8'),
('Kharadpada', '812', '8'),
('Kherabari', '813', '8'),
('Kherdi', '814', '8'),
('Kothar', '815', '8'),
('Luari', '816', '8'),
('Mashat', '817', '8'),
('Rakholi', '818', '8'),
('Rudana', '819', '8'),
('Saili', '820', '8'),
('Sili', '821', '8'),
('Silvassa', '822', '8'),
('Sindavni', '823', '8'),
('Udva', '824', '8'),
('Umbarkoi', '825', '8'),
('Vansda', '826', '8'),
('Vasona', '827', '8'),
('Velugam', '828', '8'),
('Brancavare', '901', '9'),
('Dagasi', '902', '9'),
('Daman', '903', '9'),
('Diu', '904', '9'),
('Magarvara', '905', '9'),
('Nagwa', '906', '9'),
('Pariali', '907', '9'),
('Passo Covo', '908', '9'),
('Central Delhi', '1001', '10'),
('East Delhi', '1002', '10'),
('New Delhi', '1003', '10'),
('North Delhi', '1004', '10'),
('North East Delhi', '1005', '10'),
('North West Delhi', '1006', '10'),
('Old Delhi', '1007', '10'),
('South Delhi', '1008', '10'),
('South West Delhi', '1009', '10'),
('West Delhi', '1010', '10'),
('Canacona', '1101', '11'),
('Candolim', '1102', '11'),
('Chinchinim', '1103', '11'),
('Cortalim', '1104', '11'),
('Goa', '1105', '11'),
('Jua', '1106', '11'),
('Madgaon', '1107', '11'),
('Mahem', '1108', '11'),
('Mapuca', '1109', '11'),
('Marmagao', '1110', '11'),
('Panji', '1111', '11'),
('Ponda', '1112', '11'),
('Sanvordem', '1113', '11'),
('Terekhol', '1114', '11'),
('Ahmedabad', '1201', '12'),
('Amreli', '1202', '12'),
('Anand', '1203', '12'),
('Banaskantha', '1204', '12'),
('Baroda', '1205', '12'),
('Bharuch', '1206', '12'),
('Bhavnagar', '1207', '12'),
('Dahod', '1208', '12'),
('Dang', '1209', '12'),
('Dwarka', '1210', '12'),
('Gandhinagar', '1211', '12'),
('Jamnagar', '1212', '12'),
('Junagadh', '1213', '12'),
('Kheda', '1214', '12'),
('Kutch', '1215', '12'),
('Mehsana', '1216', '12'),
('Nadiad', '1217', '12'),
('Narmada', '1218', '12'),
('Navsari', '1219', '12'),
('Panchmahals', '1220', '12'),
('Patan', '1221', '12'),
('Porbandar', '1222', '12'),
('Rajkot', '1223', '12'),
('Sabarkantha', '1224', '12'),
('Surat', '1225', '12'),
('Surendranagar', '1226', '12'),
('Vadodara', '1227', '12'),
('Valsad', '1228', '12'),
('Vapi', '1229', '12'),
('Ambala', '1301', '13'),
('Bhiwani', '1302', '13'),
('Faridabad', '1303', '13'),
('Fatehabad', '1304', '13'),
('Gurgaon', '1305', '13'),
('Hisar', '1306', '13'),
('Jhajjar', '1307', '13'),
('Jind', '1308', '13'),
('Kaithal', '1309', '13'),
('Karnal', '1310', '13'),
('Kurukshetra', '1311', '13'),
('Mahendragarh', '1312', '13'),
('Mewat', '1313', '13'),
('Panchkula', '1314', '13'),
('Panipat', '1315', '13'),
('Rewari', '1316', '13'),
('Rohtak', '1317', '13'),
('Sirsa', '1318', '13'),
('Sonipat', '1319', '13'),
('Yamunanagar', '1320', '13'),
('Bilaspur', '1401', '14'),
('Chamba', '1402', '14'),
('Dalhousie', '1403', '14'),
('Hamirpur', '1404', '14'),
('Kangra', '1405', '14'),
('Kinnaur', '1406', '14'),
('Kullu', '1407', '14'),
('Lahaul Spiti', '1408', '14'),
('Mandi', '1409', '14'),
('Shimla', '1410', '14'),
('Sirmaur', '1411', '14'),
('Solan', '1412', '14'),
('Una', '1413', '14'),
('Anantnag', '1501', '15'),
('Baramulla', '1502', '15'),
('Budgam', '1503', '15'),
('Doda', '1504', '15'),
('Jammu', '1505', '15'),
('Kargil', '1506', '15'),
('Kathua', '1507', '15'),
('Kupwara', '1508', '15'),
('Leh', '1509', '15'),
('Poonch', '1510', '15'),
('Pulwama', '1511', '15'),
('Rajauri', '1512', '15'),
('Srinagar', '1513', '15'),
('Udhampur', '1514', '15'),
('Bokaro', '1601', '16'),
('Chatra', '1602', '16'),
('Deoghar', '1603', '16'),
('Dhanbad', '1604', '16'),
('Dumka', '1605', '16'),
('East Singhbhum', '1606', '16'),
('Garhwa', '1607', '16'),
('Giridih', '1608', '16'),
('Godda', '1609', '16'),
('Gumla', '1610', '16'),
('Hazaribag', '1611', '16'),
('Jamtara', '1612', '16'),
('Koderma', '1613', '16'),
('Latehar', '1614', '16'),
('Lohardaga', '1615', '16'),
('Pakur', '1616', '16'),
('Palamu', '1617', '16'),
('Ranchi', '1618', '16'),
('Sahibganj', '1619', '16'),
('Seraikela', '1620', '16'),
('Simdega', '1621', '16'),
('West Singhbhum', '1622', '16'),
('Bagalkot', '1701', '17'),
('Bangalore', '1702', '17'),
('Bangalore Rural', '1703', '17'),
('Belgaum', '1704', '17'),
('Bellary', '1705', '17'),
('Bhatkal', '1706', '17'),
('Bidar', '1707', '17'),
('Bijapur', '1708', '17'),
('Chamrajnagar', '1709', '17'),
('Chickmagalur', '1710', '17'),
('Chikballapur', '1711', '17'),
('Chitradurga', '1712', '17'),
('Dakshina Kannada', '1713', '17'),
('Davanagere', '1714', '17'),
('Dharwad', '1715', '17'),
('Gadag', '1716', '17'),
('Gulbarga', '1717', '17'),
('Hampi', '1718', '17'),
('Hassan', '1719', '17'),
('Haveri', '1720', '17'),
('Hospet', '1721', '17'),
('Karwar', '1722', '17'),
('Kodagu', '1723', '17'),
('Kolar', '1724', '17'),
('Koppal', '1725', '17'),
('Madikeri', '1726', '17'),
('Mandya', '1727', '17'),
('Mangalore', '1728', '17'),
('Manipal', '1729', '17'),
('Mysore', '1730', '17'),
('Raichur', '1731', '17'),
('Shimoga', '1732', '17'),
('Sirsi', '1733', '17'),
('Sringeri', '1734', '17'),
('Srirangapatna', '1735', '17'),
('Tumkur', '1736', '17'),
('Udupi', '1737', '17'),
('Uttara Kannada', '1738', '17'),
('Alappuzha', '1801', '18'),
('Alleppey', '1802', '18'),
('Alwaye', '1803', '18'),
('Ernakulam', '1804', '18'),
('Idukki', '1805', '18'),
('Kannur', '1806', '18'),
('Kasargod', '1807', '18'),
('Kochi', '1808', '18'),
('Kollam', '1809', '18'),
('Kottayam', '1810', '18'),
('Kovalam', '1811', '18'),
('Kozhikode', '1812', '18'),
('Malappuram', '1813', '18'),
('Palakkad', '1814', '18'),
('Pathanamthitta', '1815', '18'),
('Perumbavoor', '1816', '18'),
('Thiruvananthapuram', '1817', '18'),
('Thrissur', '1818', '18'),
('Trichur', '1819', '18'),
('Trivandrum', '1820', '18'),
('Wayanad', '1821', '18'),
('Agatti Island', '1901', '19'),
('Bingaram Island', '1902', '19'),
('Bitra Island', '1903', '19'),
('Chetlat Island', '1904', '19'),
('Kadmat Island', '1905', '19'),
('Kalpeni Island', '1906', '19'),
('Kavaratti Island', '1907', '19'),
('Kiltan Island', '1908', '19'),
('Lakshadweep Sea', '1909', '19'),
('Minicoy Island', '1910', '19'),
('North Island', '1911', '19'),
('South Island', '1912', '19'),
('Anuppur', '2001', '20'),
('Ashoknagar', '2002', '20'),
('Balaghat', '2003', '20'),
('Barwani', '2004', '20'),
('Betul', '2005', '20'),
('Bhind', '2006', '20'),
('Bhopal', '2007', '20'),
('Burhanpur', '2008', '20'),
('Chhatarpur', '2009', '20'),
('Chhindwara', '2010', '20'),
('Damoh', '2011', '20'),
('Datia', '2012', '20'),
('Dewas', '2013', '20'),
('Dhar', '2014', '20'),
('Dindori', '2015', '20'),
('Guna', '2016', '20'),
('Gwalior', '2017', '20'),
('Harda', '2018', '20'),
('Hoshangabad', '2019', '20'),
('Indore', '2020', '20'),
('Jabalpur', '2021', '20'),
('Jagdalpur', '2022', '20'),
('Jhabua', '2023', '20'),
('Katni', '2024', '20'),
('Khandwa', '2025', '20'),
('Khargone', '2026', '20'),
('Mandla', '2027', '20'),
('Mandsaur', '2028', '20'),
('Morena', '2029', '20'),
('Narsinghpur', '2030', '20'),
('Neemuch', '2031', '20'),
('Panna', '2032', '20'),
('Raisen', '2033', '20'),
('Rajgarh', '2034', '20'),
('Ratlam', '2035', '20'),
('Rewa', '2036', '20'),
('Sagar', '2037', '20'),
('Satna', '2038', '20'),
('Sehore', '2039', '20'),
('Seoni', '2040', '20'),
('Shahdol', '2041', '20'),
('Shajapur', '2042', '20'),
('Sheopur', '2043', '20'),
('Shivpuri', '2044', '20'),
('Sidhi', '2045', '20'),
('Tikamgarh', '2046', '20'),
('Ujjain', '2047', '20'),
('Umaria', '2048', '20'),
('Vidisha', '2049', '20'),
('Ahmednagar', '2101', '21'),
('Akola', '2102', '21'),
('Amravati', '2103', '21'),
('Aurangabad', '2104', '21'),
('Beed', '2105', '21'),
('Bhandara', '2106', '21'),
('Buldhana', '2107', '21'),
('Chandrapur', '2108', '21'),
('Dhule', '2109', '21'),
('Gadchiroli', '2110', '21'),
('Gondia', '2111', '21'),
('Hingoli', '2112', '21'),
('Jalgaon', '2113', '21'),
('Jalna', '2114', '21'),
('Kolhapur', '2115', '21'),
('Latur', '2116', '21'),
('Mahabaleshwar', '2117', '21'),
('Mumbai', '2118', '21'),
('Mumbai City', '2119', '21'),
('Mumbai Suburban', '2120', '21'),
('Nagpur', '2121', '21'),
('Nanded', '2122', '21'),
('Nandurbar', '2123', '21'),
('Nashik', '2124', '21'),
('Osmanabad', '2125', '21'),
('Parbhani', '2126', '21'),
('Pune', '2127', '21'),
('Raigad', '2128', '21'),
('Ratnagiri', '2129', '21'),
('Sangli', '2130', '21'),
('Satara', '2131', '21'),
('Sholapur', '2132', '21'),
('Sindhudurg', '2133', '21'),
('Thane', '2134', '21'),
('Wardha', '2135', '21'),
('Washim', '2136', '21'),
('Yavatmal', '2137', '21'),
('Bishnupur', '2201', '22'),
('Chandel', '2202', '22'),
('Churachandpur', '2203', '22'),
('Imphal East', '2204', '22'),
('Imphal West', '2205', '22'),
('Senapati', '2206', '22'),
('Tamenglong', '2207', '22'),
('Thoubal', '2208', '22'),
('Ukhrul', '2209', '22'),
('East Garo Hills', '2301', '23'),
('East Khasi Hills', '2302', '23'),
('Jaintia Hills', '2303', '23'),
('Ri Bhoi', '2304', '23'),
('Shillong', '2305', '23'),
('South Garo Hills', '2306', '23'),
('West Garo Hills', '2307', '23'),
('West Khasi Hills', '2308', '23'),
('Aizawl', '2401', '24'),
('Champhai', '2402', '24'),
('Kolasib', '2403', '24'),
('Lawngtlai', '2404', '24'),
('Lunglei', '2405', '24'),
('Mamit', '2406', '24'),
('Saiha', '2407', '24'),
('Serchhip', '2408', '24'),
('Dimapur', '2501', '25'),
('Kohima', '2502', '25'),
('Mokokchung', '2503', '25'),
('Mon', '2504', '25'),
('Phek', '2505', '25'),
('Tuensang', '2506', '25'),
('Wokha', '2507', '25'),
('Zunheboto', '2508', '25'),
('Angul', '2601', '26'),
('Balangir', '2602', '26'),
('Balasore', '2603', '26'),
('Baleswar', '2604', '26'),
('Bargarh', '2605', '26'),
('Berhampur', '2606', '26'),
('Bhadrak', '2607', '26'),
('Bhubaneswar', '2608', '26'),
('Boudh', '2609', '26'),
('Cuttack', '2610', '26'),
('Deogarh', '2611', '26'),
('Dhenkanal', '2612', '26'),
('Gajapati', '2613', '26'),
('Ganjam', '2614', '26'),
('Jagatsinghapur', '2615', '26'),
('Jajpur', '2616', '26'),
('Jharsuguda', '2617', '26'),
('Kalahandi', '2618', '26'),
('Kandhamal', '2619', '26'),
('Kendrapara', '2620', '26'),
('Kendujhar', '2621', '26'),
('Khordha', '2622', '26'),
('Koraput', '2623', '26'),
('Malkangiri', '2624', '26'),
('Mayurbhanj', '2625', '26'),
('Nabarangapur', '2626', '26'),
('Nayagarh', '2627', '26'),
('Nuapada', '2628', '26'),
('Puri', '2629', '26'),
('Rayagada', '2630', '26'),
('Rourkela', '2631', '26'),
('Sambalpur', '2632', '26'),
('Subarnapur', '2633', '26'),
('Sundergarh', '2634', '26'),
('Bahur', '2701', '27'),
('Karaikal', '2701', '27'),
('Mahe', '2701', '27'),
('Pondicherry', '2701', '27'),
('Purnankuppam', '2701', '27'),
('Valudavur', '2701', '27'),
('Villianur', '2701', '27'),
('Yanam', '2701', '27'),
('Amritsar', '2801', '28'),
('Barnala', '2801', '28'),
('Bathinda', '2801', '28'),
('Faridkot', '2801', '28'),
('Fatehgarh Sahib', '2801', '28'),
('Ferozepur', '2801', '28'),
('Gurdaspur', '2801', '28'),
('Hoshiarpur', '2801', '28'),
('Jalandhar', '2801', '28'),
('Kapurthala', '2801', '28'),
('Ludhiana', '2801', '28'),
('Mansa', '2801', '28'),
('Moga', '2801', '28'),
('Muktsar', '2801', '28'),
('Nawanshahr', '2801', '28'),
('Pathankot', '2801', '28'),
('Patiala', '2801', '28'),
('Rupnagar', '2801', '28'),
('Sangrur', '2801', '28'),
('SAS Nagar', '2801', '28'),
('Tarn Taran', '2801', '28'),
('Ajmer', '2901', '29'),
('Alwar', '2902', '29'),
('Banswara', '2903', '29'),
('Baran', '2904', '29'),
('Barmer', '2905', '29'),
('Bharatpur', '2906', '29'),
('Bhilwara', '2907', '29'),
('Bikaner', '2908', '29'),
('Bundi', '2909', '29'),
('Chittorgarh', '2910', '29'),
('Churu', '2911', '29'),
('Dausa', '2912', '29'),
('Dholpur', '2913', '29'),
('Dungarpur', '2914', '29'),
('Hanumangarh', '2915', '29'),
('Jaipur', '2916', '29'),
('Jaisalmer', '2917', '29'),
('Jalore', '2918', '29'),
('Jhalawar', '2919', '29'),
('Jhunjhunu', '2920', '29'),
('Jodhpur', '2921', '29'),
('Karauli', '2922', '29'),
('Kota', '2923', '29'),
('Nagaur', '2924', '29'),
('Pali', '2925', '29'),
('Pilani', '2926', '29'),
('Rajsamand', '2927', '29'),
('Sawai Madhopur', '2928', '29'),
('Sikar', '2929', '29'),
('Sirohi', '2930', '29'),
('Sri Ganganagar', '2931', '29'),
('Tonk', '2932', '29'),
('Udaipur', '2933', '29'),
('Barmiak', '3001', '30'),
('Be', '3002', '30'),
('Bhurtuk', '3003', '30'),
('Chhubakha', '3004', '30'),
('Chidam', '3005', '30'),
('Chubha', '3006', '30'),
('Chumikteng', '3007', '30'),
('Dentam', '3008', '30'),
('Dikchu', '3009', '30'),
('Dzongri', '3010', '30'),
('Gangtok', '3011', '30'),
('Gauzing', '3012', '30'),
('Gyalshing', '3013', '30'),
('Hema', '3014', '30'),
('Kerung', '3015', '30'),
('Lachen', '3016', '30'),
('Lachung', '3017', '30'),
('Lema', '3018', '30'),
('Lingtam', '3019', '30'),
('Lungthu', '3020', '30'),
('Mangan', '3021', '30'),
('Namchi', '3022', '30'),
('Namthang', '3023', '30'),
('Nanga', '3024', '30'),
('Nantang', '3025', '30'),
('Naya Bazar', '3026', '30'),
('Padamachen', '3027', '30'),
('Pakhyong', '3028', '30'),
('Pemayangtse', '3029', '30'),
('Phensang', '3030', '30'),
('Rangli', '3031', '30'),
('Rinchingpong', '3032', '30'),
('Sakyong', '3033', '30'),
('Samdong', '3034', '30'),
('Singtam', '3035', '30'),
('Siniolchu', '3035', '30'),
('Sombari', '3036', '30'),
('Soreng', '3037', '30'),
('Sosing', '3038', '30'),
('Tekhug', '3039', '30'),
('Temi', '3040', '30'),
('Tsetang', '3041', '30'),
('Tsomgo', '3042', '30'),
('Tumlong', '3043', '30'),
('Yangang', '3044', '30'),
('Yumtang', '3045', '30'),
('Chennai', '3101', '31'),
('Chidambaram', '3102', '31'),
('Chingleput', '3103', '31'),
('Coimbatore', '3104', '31'),
('Courtallam', '3105', '31'),
('Cuddalore', '3106', '31'),
('Dharmapuri', '3107', '31'),
('Dindigul', '3108', '31'),
('Erode', '3109', '31'),
('Hosur', '3110', '31'),
('Kanchipuram', '3111', '31'),
('Kanyakumari', '3112', '31'),
('Karaikudi', '3113', '31'),
('Karur', '3114', '31'),
('Kodaikanal', '3115', '31'),
('Kovilpatti', '3116', '31'),
('Krishnagiri', '3117', '31'),
('Kumbakonam', '3118', '31'),
('Madurai', '3119', '31'),
('Mayiladuthurai', '3120', '31'),
('Nagapattinam', '3121', '31'),
('Nagarcoil', '3122', '31'),
('Namakkal', '3123', '31'),
('Neyveli', '3124', '31'),
('Nilgiris', '3125', '31'),
('Ooty', '3126', '31'),
('Palani', '3127', '31'),
('Perambalur', '3128', '31'),
('Pollachi', '3129', '31'),
('Pudukkottai', '3130', '31'),
('Rajapalayam', '3131', '31'),
('Ramanathapuram', '3132', '31'),
('Salem', '3133', '31'),
('Sivaganga', '3134', '31'),
('Sivakasi', '3135', '31'),
('Thanjavur', '3136', '31'),
('Theni', '3137', '31'),
('Thoothukudi', '3138', '31'),
('Tiruchirappalli', '3139', '31'),
('Tirunelveli', '3140', '31'),
('Tirupur', '3141', '31'),
('Tiruvallur', '3142', '31'),
('Tiruvannamalai', '3143', '31'),
('Tiruvarur', '3144', '31'),
('Trichy', '3145', '31'),
('Tuticorin', '3146', '31'),
('Vellore', '3147', '31'),
('Villupuram', '3148', '31'),
('Virudhunagar', '3149', '31'),
('Yercaud', '3150', '31'),
('Agartala', '3201', '32'),
('Ambasa', '3202', '32'),
('Bampurbari', '3203', '32'),
('Belonia', '3204', '32'),
('Dhalai', '3205', '32'),
('Dharam Nagar', '3206', '32'),
('Kailashahar', '3207', '32'),
('Kamal Krishnabari', '3208', '32'),
('Khopaiyapara', '3209', '32'),
('Khowai', '3210', '32'),
('Phuldungsei', '3211', '32'),
('Radha Kishore Pur', '3212', '32'),
('Tripura', '3213', '32');

-- --------------------------------------------------------

--
-- Table structure for table `all_states`
--

CREATE TABLE `all_states` (
  `state_code` text DEFAULT NULL,
  `state_name` text DEFAULT NULL,
  `country_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_states`
--

INSERT INTO `all_states` (`state_code`, `state_name`, `country_code`) VALUES
('1', 'Andaman Nicobar [AN]', '+91'),
('2', 'Andhra Pradesh [AP]', '+91'),
('3', 'Arunachal Pradesh [AR]', '+91'),
('4', 'Assam [AS]', '+91'),
('5', 'Bihar [BH]', '+91'),
('6', 'Chandigarh [CH]', '+91'),
('7', 'Chhattisgarh [CG]', '+91'),
('8', 'Dadra Nagar Haveli [DN]', '+91'),
('9', 'Daman Diu [DD]', '+91'),
('10', 'Delhi [DL]', '+91'),
('11', 'Goa [GO]', '+91'),
('12', 'Gujarat [GU]', '+91'),
('13', 'Haryana [HR]', '+91'),
('14', 'Himachal Pradesh [HP]', '+91'),
('15', 'Jammu Kashmir [JK]', '+91'),
('16', 'Jharkhand [JH]', '+91'),
('17', 'Karnataka [KR]', '+91'),
('18', 'Kerala [KL]', '+91'),
('19', 'Lakshadweep [LD]', '+91'),
('20', 'Madhya Pradesh [MP]', '+91'),
('21', 'Maharashtra [MH]', '+91'),
('22', 'Manipur [MN]', '+91'),
('23', 'Meghalaya [ML]', '+91'),
('24', 'Mizoram [MM]', '+91'),
('25', 'Nagaland [NL]', '+91'),
('26', 'Orissa [OR]', '+91'),
('27', 'Pondicherry [PC]', '+91'),
('28', 'Punjab [PJ]', '+91'),
('29', 'Rajasthan [RJ]', '+91'),
('30', 'Sikkim [SK]', '+91'),
('31', 'Tamil Nadu [TN]', '+91'),
('32', 'Tripura [TR]', '+91'),
('33', 'Uttar Pradesh [UP]', '+91'),
('34', 'Uttaranchal [UT]', '+91'),
('35', 'West Bengal [WB]', '+91');

-- --------------------------------------------------------

--
-- Table structure for table `appoitments`
--

CREATE TABLE `appoitments` (
  `id` int(11) NOT NULL,
  `from` text NOT NULL,
  `date` text NOT NULL,
  `purpose` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `replied` text NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoitments`
--

INSERT INTO `appoitments` (`id`, `from`, `date`, `purpose`, `subject`, `message`, `replied`, `reply`) VALUES
(1, 'gf@d', '2020-02-24', 'meeting', 'meet', 'want to meet', '', ''),
(2, 'gf@d', '2020-02-24', 'meet', 'meeting', 'want to meet', 'YES', 'first reply'),
(6, 'gf@d', '2020-02-24', 'sda', 'asd', 'sa', '', ''),
(8, 'gf@d', '2020-02-24', 'asd', 'sad', 'sad', 'YES', 'hii come to us'),
(11, 'nisha@kushwaha', '2020-02-25', 'camp', 'want to donate', 'want to donate', 'YES', 'ok we are ready'),
(13, 'nisha@kushwaha', '2020-02-25', 'test 2', 'test 2', 'test 2', '', ''),
(14, 'nisha@kushwaha', '2020-02-25', 'test3', 'test3', 'test3', 'YES', 'tesing');

-- --------------------------------------------------------

--
-- Table structure for table `blooddrive`
--

CREATE TABLE `blooddrive` (
  `id` int(11) NOT NULL,
  `campaign` text NOT NULL,
  `user` text NOT NULL,
  `bloodgroup` text NOT NULL,
  `drives` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooddrive`
--

INSERT INTO `blooddrive` (`id`, `campaign`, `user`, `bloodgroup`, `drives`, `details`) VALUES
(9, '1 blood camp nagpur', 'nisha@kushwaha', 'O+', 1, 'test'),
(10, '2 blood camp nagpur', 'ekta@kush', 'AB+', 2, 'test'),
(11, '2 blood camp nagpur', 'sagar@mail.com', 'AB+', 4, 'test'),
(12, '3 blood camp nagpur', 'nisha@kushwaha', 'O+', 2, 'test'),
(13, '2 blood camp nagpur', 'sagar@ch', 'B+', 2, 'test'),
(14, '1 blood camp nagpur', 'sourav@yadav', 'AB+', 2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `id` int(99) NOT NULL,
  `bloodgroup` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`id`, `bloodgroup`) VALUES
(90, 'A+'),
(95, 'A-'),
(100, 'AB+'),
(101, 'AB-'),
(96, 'B+'),
(97, 'B-'),
(98, 'O+'),
(102, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE `camps` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `organised_by` text NOT NULL,
  `address` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `poster` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `title`, `organised_by`, `address`, `date`, `time`, `poster`, `details`) VALUES
(9, '1 blood camp nagpur', 'raisoni college', 'kamptee', '2020-02-29', '12:00', 'images/img (14).jpg', 'here'),
(10, '2 blood camp nagpur', 'raisoni college', 'dixit nagar', '2020-02-27', '12:00', 'images/img (56).jpg', 'imp'),
(11, '3 blood camp nagpur', 'raisoni college', '4512363', '2020-02-28', '12:00', 'images/img (2).jpg', 'here is a camp');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` text NOT NULL,
  `message` varchar(999) NOT NULL,
  `donated_bld` text NOT NULL,
  `dateposted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `city`, `message`, `donated_bld`, `dateposted`) VALUES
(1, 'sagar', 'sagar@sgr', 'ngp', 'message is here', 'Yes', '2020-02-07'),
(5, 'sagar choudhary', 'sagarsphotoworks@gmail.com', 'nagpur', 'where to donate blood', 'No', '2020-02-12'),
(6, 'Riya Choudhary', 'riya@mail', 'nagpur', 'i want to donate blood', 'No', '2020-02-12'),
(8, 'Kunal Choudhary', 'kunal@mail', 'kamptee', 'i need blood', 'No', '2020-02-12'),
(9, 'Pramod Choudhary', 'pramod@mail', 'Nagpur', 'I want to donate blood', 'Yes', '2020-02-12'),
(12, 'sagar', 'mail@dagg', 'nagpur', 'sgara', 'Yes', '2020-02-12'),
(13, 'sagar', 'sagar@sagar', 'sagar', 'sagar', 'Yes', '2020-02-12'),
(14, 'ss', 'ss@ss', 'ss', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Yes', '2020-02-12'),
(16, 'sagar', 'sss@ss', 'ss', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Yes', '2020-02-12'),
(17, 'dsd', 'd@s', 'dsd', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'No', '2020-02-12'),
(18, 'sagaraa', 'saga@r', 'kmt', 'hiii', 'No', '2020-02-17'),
(19, 'sssss', 'sz@22w', 'eee', 'helow', 'Yes', '2020-02-17'),
(20, 'sassss', 'sa@far', 'sssa', 'hhhiiiiiiiii', 'Yes', '2020-02-17'),
(21, 'ss', 'sa@hjds', 'kmt', 'jhhh', 'No', '2020-02-17'),
(22, 'das', 'asd@r5tyghsd', 'wqadsx', 'qwedsa', 'Yes', '2020-03-16'),
(23, 'sourav', 'sagar@gmail.com', 'kmt', 'hiiiiiiiiiiiiiiiiiiiiiiiii', 'Yes', '2020-09-23'),
(24, 'sagar', 'sagarsphotoworks@gmail.com', 'kmt', 'hiiiiiiiiiiiiiiiiiiiiiiiii', 'Yes', '2020-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `detail`) VALUES
(1, 'pehli news', 'ummm...'),
(4, 'tisri news', 'Brief Information: Staff Selection Commission (SSC) has advertised a notification to conduct Combined Higher Secondary Level (10+2) Exam 2018 for the recruitment of Lower Divisional Clerk (LDC)/ Junior Secretariat Assistant (JSA), Postal Assistant/ Sorting Assistant, Data Entry Operator (DEO) vacancies. Those Candidates who are Interested to the following vacancy and completed all Eligibility Criteria can read the Notification & '),
(5, 'sf', ' news	Brief Information: Staff Selection Commission (SSC) has advertised a notification to conduct Combined Higher Secondary Level (10+2) Exam 2018 for the recruitment of Lower Divisional Clerk (LDC)/ Junior Secretariat Assistant (JSA), Postal Assistant/ Sorting Assistant, Data Entry Operator (DEO) vacancies. Those Candidates who are Interested to the following vacancy and completed all Eligibility Criteria can read the Notification &'),
(6, 'sd', ' news	Brief Information: Staff Selection Commission (SSC) has advertised a notification to conduct Combined Higher Secondary Level (10+2) Exam 2018 for the recruitment of Lower Divisional Clerk (LDC)/ Junior Secretariat Assistant (JSA), Postal Assistant/ Sorting Assistant, Data Entry Operator (DEO) vacancies. Those Candidates who are Interested to the following vacancy and completed all Eligibility Criteria can read the Notification &'),
(7, 'asf', ' news	Brief Information: Staff Selection Commission (SSC) has advertised a notification to conduct Combined Higher Secondary Level (10+2) Exam 2018 for the recruitment of Lower Divisional Clerk (LDC)/ Junior Secretariat Assistant (JSA), Postal Assistant/ Sorting Assistant, Data Entry Operator (DEO) vacancies. Those Candidates who are Interested to the following vacancy and completed all Eligibility Criteria can read the Notification &'),
(8, 'adf', ' Combined Higher Secondary Level (10+2) Exam 2018 for the recruitment of Lower Divisional Clerk (LDC)/ Junior Secretariat Assistant (JSA), Postal Assistant/ Sorting Assistant, Data Entry Operator (DEO) vacancies. Those Candidates who are Interested to the following vacancy and completed all Eligibility Criteria can read the Notification & new Brief Information: Staff Selection Commission (SSC) has advertised a notification to conduct');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `bgroup` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(3) NOT NULL,
  `email` text NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `city` text NOT NULL,
  `required_date` date NOT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `details` text NOT NULL,
  `replied` text NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `fname`, `lname`, `bgroup`, `gender`, `age`, `email`, `mobile`, `city`, `required_date`, `requested_date`, `details`, `replied`, `reply`) VALUES
(4, 'nisha', 'kushwaha', 'AB+', 'Female', 20, 'nisha@kushwaha', 2147483647, '', '2020-01-23', '2020-01-02 14:02:18', 'sagarsfasftydghaskcbaxkc', '', ''),
(8, 'ishan', 'choudhary', 'AB-', 'Male', 9, 'ishan@ch.cm', 2147483647, '', '2020-01-23', '2020-05-02 15:02:18', '852', '', ''),
(11, 'sagar', 'c', 'O-', 'Male', 32, 'sagar@mail.com', 2147483647, '', '2020-02-21', '2020-04-12 03:42:18', '85746354345465465465465454213fhxbc c y uyture  yu uu yu dd ', 'YES', 'test19'),
(22, 'Nisha', 'Kushwaha', 'AB+', 'Female', 0, 'nisha@kushwaha', 2147483647, 'kamptee', '2020-02-22', '2020-02-26 05:02:18', 'fe', '', ''),
(28, 'Gagan', 'Chouhan', 'AB+', 'Female', 22, 'gf@d', 8754621354, 'sad', '2020-02-15', '2020-02-26 02:40:00', 'eeererer', 'YES', 'iam helping you testing '),
(29, 'ishan', 'choudhary', 'O+', 'Male', 43, 'ishan@ch', 2417583647, 'Nagpur, Maharashtra', '2020-09-16', '2020-08-02 14:02:18', 'Choudhary Hospital, Kamptee, Nagpur, Maharshtra.', '', ''),
(33, 'ishan', 'choudhary', 'A+', 'Male', 67, 'ishan@ch', 2417583647, 'Nagpur, Maharashtra', '2020-09-23', '2020-09-11 14:14:18', 'test', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploadtoadmin`
--

CREATE TABLE `uploadtoadmin` (
  `id` int(11) NOT NULL,
  `from` text NOT NULL,
  `caption` text NOT NULL,
  `image` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadtoadmin`
--

INSERT INTO `uploadtoadmin` (`id`, `from`, `caption`, `image`, `details`) VALUES
(1, 'gf@d', '845', 'images/img (29).jpg', 'here join blood '),
(2, 'nisha@kushwaha', 'here', 'images/img1.jpg', 'images'),
(3, 'nisha@kushwaha', 'das', 'images/wave.png', 'fdsgd');

-- --------------------------------------------------------

--
-- Table structure for table `upload_img`
--

CREATE TABLE `upload_img` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_img`
--

INSERT INTO `upload_img` (`id`, `title`, `image`, `details`) VALUES
(30, 'xz', 'images/Screenshot (11).png', 'zxc'),
(36, 's', 'images/img (45).jpg', 's'),
(37, 'kj', 'images/img (10).jpg', 'jk'),
(39, 'sagarrrrr', 'images/img (32).jpg', 'choudharyyyy'),
(40, 'sfd', 'images/img.jpg', 'sdf'),
(46, 'sagar test file', 'images/img (29).jpg', 'here join blood '),
(47, 'new test file', 'images/img1.jpg', 'images'),
(48, 'image 1', 'images/stock (1).jpeg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(50, 'Image 3', 'images/stock (2).jpeg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(51, 'Image 4', 'images/stock (2).jpg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(52, 'image 5', 'images/stock (3).jpeg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(55, 'Image 8', 'images/stock (5).jpg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(56, 'Image 6', 'images/luann-hunt-X20g2GQsVdA-unsplash.jpg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(57, 'Image 7', 'images/AdobeStock_230107919_Preview.jpeg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(58, 'Image 9', 'images/AdobeStock_276496626_Preview.jpeg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(59, 'Image 10', 'images/adult-bed-care-1498927.jpg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.'),
(60, 'Image 11', 'images/AdobeStock_115651197_Preview.jpeg', 'Aute ullamco in voluptate sed ad enim eiusmod dolor laborum veniam eu esse dolore aliqua mollit eu quis fugiat amet excepteur exercitation velit adipisicing sit officia cupidatat tempor.');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `bgroup` varchar(20) NOT NULL,
  `gender` text NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobno` bigint(11) NOT NULL,
  `state` text NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `pwd` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `fname`, `lname`, `bgroup`, `gender`, `age`, `email`, `pincode`, `mobno`, `state`, `district`, `city`, `pwd`) VALUES
(26, 'AS', 'SA', 'B-', 'Male', 23, '2222222222222@E', 321, 2, '13', 'Mewat', '23', '37693cfc748049e45d87b8c7d8b9aacd'),
(28, 'sa', 'ga', 'AB-', 'Male', 22, 'sagar@mail', 441001, 9852443647, '14', 'Solan', 'kmt', '698d51a19d8a121ce581499d7b701668'),
(30, 'as', 'sa', 'A-', 'Male', 23, 'sad@dsd', 23, 23, '3', 'Anjaw', 'df', 'a29d1598024f9e87beab4b98411d48ce'),
(31, 'sagar', 'ch', 'B+', 'Male', 20, 'sagar@ch', 441002, 8096233647, '21', 'Kolhapur', 'kamptee', '202cb962ac59075b964b07152d234b70'),
(32, 'sagar', 'choudhary', 'A-', 'Male', 0, 'zd@fx', 3, 3244444, '1', 'Bindraban', 'vx', '02b1be0d48924c327124732726097157'),
(34, 'Nisha', 'Kushwaha', 'O+', 'Female', 21, 'nisha@kushwaha', 441002, 9823928200, '21', 'Nagpur', 'Kamptee', '202cb962ac59075b964b07152d234b70'),
(35, 'sagar', 'choudhary', 'AB+', 'Male', 20, 'sagar@mail.com', 441002, 7744055937, 'Maharashtra [MH]', 'Nagpur', 'kmt', '202cb962ac59075b964b07152d234b70'),
(36, 'sa', 'gar', 'AB+', 'Male', 21, 'sagar@sa', 21, 21, '13', 'Ambala', 'sa', 'f970e2767d0cfe75876ea857f92e319b'),
(37, 's', 's', 'A-', 'Female', 2, '1@1', 1, 1, '2', 'Chittoor', '1', 'c4ca4238a0b923820dcc509a6f75849b'),
(38, 'sagar', 'sagar', 'B-', 'Male', 21, 'ds@d', 41, 444444444, '17', 'Davanagere', 'iuok', 'c20ad4d76fe97759aa27a0c99bff6710'),
(40, 'Gagan', 'Chouhan', 'AB+', 'Male', 20, 'gf@d', 555124, 8754621354, '7', 'Bilaspur', 'bhilai', '202cb962ac59075b964b07152d234b70'),
(41, 'jerry', 'top', 'AB+', 'Female', 33, 'ss@dd', 66, 111111, '4', 'Dhemaji', 'eee', 'c20ad4d76fe97759aa27a0c99bff6710'),
(42, 'rr', 're', 'B-', 'Male', 34, 'rr@rr', 434343, 32, '7', 'Narayanpur', 'ew', '202cb962ac59075b964b07152d234b70'),
(44, '23', '123', 'A+', 'Male', 32, '32@342', 342, 432, '12', 'Jamnagar', '23', '37693cfc748049e45d87b8c7d8b9aacd'),
(45, 'hh', 'hh', 'A+', 'Female', 5, 'sd@lk', 56, 456, '2', 'East Godavari', 'jhhhhh', 'bf2bc2545a4a5f5683d9ef3ed0d977e0'),
(46, 'gg', 'gf', 'A-', 'Male', 55, '6@f', 66, 66, '1', 'Bonington', 'jhgfd', 'a684eceee76fc522773286a895bc8436'),
(47, 'ew', 'wer', 'A+', 'Female', 34, 'fds@ewr', 123, 423, '2', 'Krishna', 'fd', '019d385eb67632a7e958e23f24bd07d7'),
(48, 'assssssss', 'asdds', 'A-', 'Female', 213, 'sda@e', 12, 123, '16', 'Deoghar', 'we', 'c20ad4d76fe97759aa27a0c99bff6710'),
(49, 'asd', 'cx', 'A-', 'Female', 32, 'sad@ds', 324, 534, '12', 'Anand', 'dfs', 'c20ad4d76fe97759aa27a0c99bff6710'),
(50, 'asd', 'asd', 'A-', 'Female', 23, 'we@ee', 123, 213, '17', 'Gadag', 'ds', '182be0c5cdcd5072bb1864cdee4d3d6e'),
(51, 'ishan', 'choudhary', 'B-', 'Male', 15, 'ishan@ch', 441002, 2417583647, '15', 'Kupwara', 'kamt', '202cb962ac59075b964b07152d234b70'),
(52, 'sa', 'sa', 'B-', 'Female', 0, 'sa@fds', 324, 234, '16', 'Lohardaga', 're', '37693cfc748049e45d87b8c7d8b9aacd'),
(53, 'hj', 'jh', 'A+', 'Male', 7, 'thg@uy', 76, 21745214, '3', 'Tawang', 'j', '8f14e45fceea167a5a36dedd4bea2543'),
(54, 'sagar', 'choudhary', 'AB+', 'Male', 20, 'sagar@sagar', 2222, 785483647, '13', 'Gurgaon', 'kamptee', '202cb962ac59075b964b07152d234b70'),
(55, 'sourav', 'yadav', 'AB+', 'Male', 21, 'sourav@yadav', 441001, 7845083647, '21', 'Nagpur', 'kamptee', '202cb962ac59075b964b07152d234b70'),
(56, 'Ekta', 'Kushwaha', 'AB+', 'Female', 21, 'ekta@kush', 441001, 2147483647, '21', 'Nagpur', 'kamptee', '202cb962ac59075b964b07152d234b70'),
(57, 'Darshan', 'Awasthi', 'O-', 'Male', 21, 'da@mail.com', 445213, 9548691230, '15', 'Pulwama', 'kmt', '202cb962ac59075b964b07152d234b70'),
(58, 'Ashwitha', 'Awasthi', 'A-', 'Female', 26, 'ash@witha', 440001, 8456123048, '10', 'Central Delhi', 'Gurgao', '202cb962ac59075b964b07152d234b70'),
(59, 'Suruchi', 'Patil', 'AB+', 'Female', 20, 'suru@chi', 123456, 9812650769, '10', 'East Delhi', 'ngp', '202cb962ac59075b964b07152d234b70'),
(60, 'vaibhav', 'r', 'O+', 'Male', 20, 'vaibhavr@g.com', 653225, 9876543210, '13', 'Gurgaon', 'kmt', '202cb962ac59075b964b07152d234b70'),
(61, 'Akash', 'Sharma', 'O+', 'Others', 22, 'akash@sharma', 441002, 9856471236, '15', 'Jammu', 'jammu', '202cb962ac59075b964b07152d234b70'),
(62, 'Mukesh', 'Rahane', 'O+', 'Others', 25, 'mukesh@rahane', 441001, 8574965263, '10', 'Central Delhi', 'Noida', '202cb962ac59075b964b07152d234b70'),
(63, 'Shubham', 'Jawwal', 'AB+', 'Others', 24, 'shubham@jawwal', 441001, 7415263086, '6', 'Mani Marja', 'gandhi nagar', '202cb962ac59075b964b07152d234b70'),
(64, 'Sumit ', 'Patle', 'O-', 'Others', 21, 'sumit@patle', 441002, 9630852014, '22', 'Churachandpur', 'gangapur', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoitments`
--
ALTER TABLE `appoitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blooddrive`
--
ALTER TABLE `blooddrive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `bloodgroup` (`bloodgroup`);

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadtoadmin`
--
ALTER TABLE `uploadtoadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_img`
--
ALTER TABLE `upload_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobno` (`mobno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoitments`
--
ALTER TABLE `appoitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blooddrive`
--
ALTER TABLE `blooddrive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `uploadtoadmin`
--
ALTER TABLE `uploadtoadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upload_img`
--
ALTER TABLE `upload_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
