-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2020 at 02:04 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modict5p_newsg`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(300) NOT NULL,
  `category_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`) VALUES
(1, 'Business', 'ic_launcher.png'),
(2, 'Technology', 'category.png'),
(3, 'Sport', 'category.png'),
(4, 'Gadget', 'category.png'),
(5, 'Trailer', 'category.png'),
(6, 'Entertainment', 'category.png');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `pwd` varchar(500) NOT NULL,
  `uname` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `pwd`, `uname`) VALUES
(1, 'admin@123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `guide` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `source_title` varchar(100) NOT NULL,
  `source_link` varchar(200) NOT NULL,
  `videourl` varchar(50) NOT NULL,
  `postdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`guide`, `category_id`, `title`, `description`, `image`, `source_title`, `source_link`, `videourl`, `postdate`) VALUES
(1, 1, 'Govt acts against pulses hoarders, seizes 5,800 tonne', 'The government said on Tuesday action against hoarders and blackmarketeers has been stepped up and the state governments have seized over 5,800 tonne of pulses in five states over the last few months.', 'b1.jpg', 'BTD', 'http://www.businesstoday.in/current/policy/pulses-hoarders-on-govt-radar-seizes-5800-tonnes/story/225061.html', '', '2015-10-21'),
(2, 1, 'Tata Steel says may cut about 1,200 UK jobs in restructuring', 'Tata Steel, the biggest steel-maker in Britain, said on Tuesday that its planned restructuring is expected to lead to about 1,200 job losses.', 'b2.jpg', 'BTD', 'http://www.businesstoday.in/management/executives/tata-steel-says-may-cut-about-1200-uk-jobs-in-restructuring/story/225059.html', '', '2015-10-21'),
(3, 1, 'Government to buy more cotton from farmers as China trims imports', 'The Centre will be forced to make large-scale government cotton purchases from farmers for a second straight year, following a cut in imports by top buyer China that has depressed prices, industry officials said.', 'b3.jpg', 'BTD', 'http://www.businesstoday.in/current/economy-politics/government-to-buy-more-cotton-from-farmers-as-china-trims-imports/story/225047.html', '', '2015-10-21'),
(4, 1, 'Vedanta to export over 5.5 mln tonnes iron ore from Goa this year', 'Vedanta Ltd(VDAN.NS) expects its iron ore exports from Goa to be much higher than its permitted mining capacity of 5.5 million tonnes in the fiscal year to March, as it bids for ore in government-run auctions.', 'b4.jpg', 'Reuters', 'http://in.reuters.com/article/2015/10/20/india-vedanta-iron-idINKCN0SE0TV20151020', '', '2015-10-21'),
(5, 1, 'Nestle India planning Diwali comeback for Maggi', 'Having weathered the storm over quality concerns regarding its flagship Maggi noodles, Nestle India is eyeing a Diwali comeback. The firm is busy visiting plants of various vendors, collecting samples and asking them to increase their manpower to keep their factories hygienic ', 'b5.png', 'Express', 'http://indianexpress.com/article/business/business-others/nestle-india-planning-diwali-comeback-for-maggi/', '', '2015-10-21'),
(6, 2, 'Facebook will warn users of state-sponsored attacks', 'Starting today, we will notify you if we believe your account has been targeted or compromised by an attacker suspected of working on behalf of a nation-state,&quot; Facebook chief security officer Alex Stamos said in a blog post.', 't1.jpg', 'TOI', 'http://timesofindia.indiatimes.com/tech/tech-news/Facebook-will-warn-users-of-state-sponsored-attacks/articleshow/49460398.cms', '', '2015-10-20'),
(7, 2, 'Mi TV 3 60-Inch Xiaomi Television, Self-Balancing Scooter Launched', 'Xiaomi on Monday launched its first two-wheeled, self-balancing, and battery-powered electric vehicle, named Ninebot mini. The Chinese company also announced a brand new Mi TV 3 alongside other products.', 't2.jpg', 'NDTV', 'http://gadgets.ndtv.com/others/news/xiaomi-launches-ninebot-mini-self-balancing-scooter-60-inch-mi-tv-3-754419?pfrom=home-trending', '', '2015-10-20'),
(8, 2, 'Grey markets make big bucks due to high iPhone 6s, 6s Plus prices', 'Looks like, itâ€™s not just Apple who is benefiting from the high Apple prices. Recently, there were reports about the iPhone 6s available in the Indian grey market for over Rs 1 lakh prior to the launch.', 't3.jpg', 'Firstpost', 'http://tech.firstpost.com/news-analysis/grey-markets-make-big-bucks-due-to-high-iphone-6s-6s-plus-prices-285218.html', '', '2015-10-20'),
(9, 2, 'Lenovo turned down â€˜opportunityâ€™ to sell Microsoftâ€™s Surface', 'In early September, Dell and HP both announced that they would begin carrying Microsoftâ€™s Surface Pro family as part of their business product divisions', 't4.jpg', 'extremetech', 'http://www.extremetech.com/extreme/216483-lenovo-turned-down-opportunity-to-sell-microsofts-surface', '', '2015-10-20'),
(10, 2, 'OnePlus focuses on customer service as it launches extended warranty', 'After sales support has always been one of the key areas where the new smartphone brands have struggled. Since they mostly follow online-exclusive model, users often grapple with the lack of customer services ', 't5.jpg', 'BGR', 'http://www.bgr.in/news/oneplus-focuses-on-customer-service-as-it-launches-extended-warranty-insurance-services-for-oneplus-2/', '', '2015-10-20'),
(11, 3, 'Nathu Singh has the spark', 'Until this morning, Nathu Singh, a 20-year old fast bowler playing his maiden first-class season for Rajasthan, believed that his greatest sign of success was being called â€˜Indiaâ€™s fast bowling futureâ€™ by Glenn McGrath at the MRF Pace Foundation.', 's1.jpg', 'Express', 'http://indianexpress.com/article/sports/cricket/nathu-singh-has-the-spark-the-x-factor-sandeep-patil/', '', '2015-10-20'),
(12, 3, 'Asia Cup T20 to be held in February 2016', 'BCCI secretary Anurag Thakur on Monday said that the Asia Cup T20 tournament will be held in February, next year, before the ICC World T20 but the venue is yet to be finalised.', 's2.jpg', 'Express', 'http://indianexpress.com/article/sports/cricket/asia-cup-t20-to-be-held-in-february-2016-venue-undecided/', '', '2015-10-19'),
(13, 3, 'Indo-Pak cricket when things improve: Anurag Thakur', 'Even as he condemned protests by the Shiv Sena inside the Board headquarters in Mumbai on Monday, BCCI secretary Anurag Thakur seemingly ruled out the possibility of holding bilateral series with Pakistan in the near future. â€œYou canâ€™t barge into BCCI premises and force people not to hold talks ', 's3.jpg', 'Express', 'http://indianexpress.com/article/sports/cricket/no-meeting-scheduled-in-new-delhi-talks-with-pcb-cancelled-anurag-thakur/', '', '2015-10-20'),
(14, 3, 'Pakistan umpire Dar withdrawn from India-South Africa series', 'Pakistan umpire Aleem Dar has been withdrawn from the ongoing series between India and South Africa, the International Cricket Council (ICC) announced on Monday.', 's4.jpg', 'Reuters', 'http://in.reuters.com/article/2015/10/20/cricket-india-dar-idINKCN0SD26320151020', '', '2015-10-21'),
(15, 3, 'Ronaldo and Messi headline Ballon d\'Or shortlist', 'REUTERS - Real Madrid\'s blockbuster \'BBC\' forward line and Barcelona\'s devastating \'MSN\' trio are set to go head-to-head for the 2015 Ballon d\'Or award after all six were named on the 23-man shortlist by FIFA on Tuesday.', 's5.jpg', 'Reuters', 'http://in.reuters.com/article/2015/10/20/soccer-fifa-award-ronaldo-messi-idINKCN0SE0B520151020', '', '2015-10-21'),
(16, 3, 'Virender Sehwag retires from international cricket, IPL', 'Virender Sehwag, one of Indiaâ€™s greatest opening batsmen, announced his retirement from international cricket as well as from the Indian Premier League (IPL) on Tuesday, his 37th birthday.', 's6.jpg', 'HT', 'http://www.hindustantimes.com/cricket/virender-sehwag-retires-from-international-cricket-ipl/story-zsHgI44cFJzYC9rVuDIilJ.html', '', '2015-10-21'),
(17, 4, 'Apple iPad Mini 4 now available in India; price starts at Rs 28,900', 'It has just been a few days since the launch of the latest iPhones in India and Apple has brought in its new iPad mini 4 on to the Indian shores.', 'gd1.jpg', 'ABP', 'http://www.abplive.in/gadget/2015/10/20/article744567.ece/Apple-iPad-Mini-4-Now-Available-In-India-Price-Starts-At-Rs-28900', '', '2015-10-20'),
(18, 4, 'Pepsi to launch smartphone in China', 'Soft drinks giant Pepsi Co. is set to launch a smartphone in China as part of a new marketing ploy.', 'gd2.jpg', 'ABP', 'http://www.abplive.in/gadget/2015/10/17/article742448.ece/Pepsi-to-launch-smartphone-in-China', '', '2015-10-21'),
(19, 4, 'PayTM Will Now Offer Hotel Bookings As Well', 'PayTM is known as an online recharge portal with an e-commerce angle as of recently. The Alibaba backed company is now expanding into the highly lucrative hotel business as well. The company has announced that it will start offering hotel bookings to customers in partnership with companies like TSI-', 'gd3.jpg', 'gizmodo', 'http://www.gizmodo.in/indiamodo/PayTM-will-nowoffer-hotel-bookings-as-well/articleshow/49467917.cms', '', '2015-10-20'),
(20, 5, 'Paranormal Activity trailer', 'Paranormal Activity: The Ghost Dimension', 'tr1.jpg', 'Moviefone', 'http://www.moviefone.com/movie/paranormal-activity-the-ghost-dimension/20056778/trailers', 'https://www.youtube.com/watch?v=zR2cc1BwdmI', '2015-10-20'),
(21, 5, 'Tamasha | Official Trailer ', 'Ved has grown up among stories. As a kid in Simla, he would collect money, even steal money so that the old storyteller would tell him stories. Ramayan, Helen of Troy, Laila Majnu, Heer Ranjha, Aladin, Romeo Juliet. The storyteller would also say that all stories are the same. ', 'tr2.jpg', 'pinkvilla', 'http://www.pinkvilla.com/entertainment/news/343448/touche-tamasha-trailer-has-inspired-katrina-chemistry-quotient-ranbir-jj', 'https://www.youtube.com/watch?v=VN_qxutU_qc', '2015-10-21'),
(22, 5, 'Prem Ratan Dhan Payo', 'Produced by Rajshri Productions (P) Ltd and presented by Fox Star Studios, Prem Ratan Dhan Payo releases this Diwali on 12th November 2015!', 'tr3.jpg', 'site', 'http://premratandhanpayo.in/', 'https://www.youtube.com/watch?v=Vd4iNPuRlx4', '2015-10-19'),
(23, 6, 'Bigg Boss 9: \'Veera\' fame Shivin Narang appeals', 'Actor Shivin Narang who had shared screen with actress Digangana Suryavanshi in serial Veera feels that Digangana can be winner of Bigg Boss 9.', 'e1.jpg', 'bhaskar', 'http://daily.bhaskar.com/news-etf/ENT-TV-bigg-boss-9-veera-fame-shivin-narang-appeals-for-digangana-suryavanshi-guess-the-5145705-PHO.html', '', '2015-10-19'),
(24, 6, 'Don\'t want to live a politician\'s life, says George Clooney', 'Hollywood superstar George Clooney has ruled out a run for public office insisting he wouldn\'t want a politician\'s life.', 'e2.jpg', 'dna', 'http://www.dnaindia.com/entertainment/report-don-t-want-to-live-a-politician-s-life-says-george-clooney-2136689', '', '2015-10-20'),
(25, 6, 'Ellie Goulding feeling \'broody\'', 'Los Angeles : Singer Ellie Goulding says she\'s feeling &quot;broody&quot; and has spoken about having children with her long-term boyfriend Dougie Poynter.', 'e3.jpg', 'tvnews', 'http://www.indiatvnews.com/entertainment/hollywood/ellie-goulding-feeling-broody-12078.html', '', '2015-10-20'),
(26, 6, '20 years of \'DDLJ\': SRK, Kajol recreate \'DDLJ\' on \'Dilwale\' sets ', 'The 49-year-old actor and Kajol, 41, who are teaming up again for Rohit Shetty\'s &quot;Dilwale&quot;, marked the 20 years celebration by revisiting DDLJ\'s famous poster while shooting for the upcoming movie here.', 'e4.jpg', 'midday', 'http://www.mid-day.com/articles/20-years-of-ddlj-srk-kajol-recreate-ddlj-on-dilwale-sets/16621195', 'https://www.youtube.com/watch?v=xSmvMgAKeLs', '2015-10-20'),
(27, 6, 'Will Deepika Padukone be part of \'The Fault In Our Stars\' remake? ', 'The rights of Hollywood film, \'The Fault In Our Stars\' (2014), are with Fox Star Studios. Plans are on to remake it in Hindi. Initially, Homi Adajania was to direct the film, but now Mohit Suri will helm the project. The casting is currently underway.', 'e5.jpg', 'midday', 'http://www.mid-day.com/articles/will-deepika-padukone-be-part-of-the-fault-in-our-stars-remake/16619198', '', '2015-10-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`guide`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `guide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
