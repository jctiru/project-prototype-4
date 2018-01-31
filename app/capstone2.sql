-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 04:14 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`) VALUES
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Ecchi'),
(6, 'Harem'),
(7, 'Horror'),
(8, 'Mystery'),
(9, 'Psychological'),
(10, 'Romance'),
(11, 'Sci-Fi'),
(12, 'Slice of Life'),
(13, 'Supernatural');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(2, 'Overlord', 'Overlord (オーバーロード Ōbārōdo) is a Japanese light novel series written by Kugane Maruyama and illustrated by so-bin. It began serialization online in 2010, before being acquired by Enterbrain. Twelve volumes have been published since July 30, 2012. A manga adaptation by Satoshi Ōshio, with art by Hugin Miyama, began serialization in Kadokawa Shoten&#39;s manga magazine Comp Ace from November 26, 2014. Both the light novels and the manga are licensed in North America by Yen Press, with a release date of November 8, 2016.', 100, 'Overlord.jpg', '2018-01-24 19:42:02'),
(4, 'Zero no Tsukaima', 'The Familiar of Zero (Japanese: ゼロの使い魔 Hepburn: Zero no Tsukaima) is a fantasy and comedy-oriented series of Japanese light novels written by Noboru Yamaguchi, with illustrations by Eiji Usatsuka. Media Factory published 20 volumes between June 2004 and February 2011. The series was left unfinished due to the author&#39;s death on April 4, 2013,[2] but the series was concluded in two volumes released in February 2016 and February 2017 with a different author, making use of notes left behind by the late Noboru Yamaguchi. The story features several characters from the second year class of a magic academy in a fictional magical world with the main characters being the inept mage Louise and her familiar from Earth, Saito Hiraga.', 100, 'Zeronots1_01.jpg', '2018-01-25 10:43:29'),
(5, 'Baka to Test to Shoukanjuu', 'Baka and Test (Japanese: バカとテストと召喚獣 Hepburn: Baka to Tesuto to Shōkanjū, lit. Idiots, Tests, and Summoned Beasts), also known as Baka and Test: Summon the Beasts, is a Japanese light novel series written by Kenji Inoue with illustrations by Yui Haga. Enterbrain published 18 novels from January 2007 to March 2015 under their Famitsu Bunko imprint.', 55, 'BakaTestV1cover.jpg', '2018-01-25 10:46:07'),
(7, 'Utsuro no Hako to Zero no Maria', 'The Empty Box and Zeroth Maria, known in Japan as Utsuro no Hako to Zero no Maria (空ろの箱と零のマリア, lit. The Hollow Box and the Maria of Zero) and colloquially referred to as Hakomari (箱マリ), is a Japanese light novel series written by Eiji Mikage (ja), with illustrations by Tetsuo.[2][a] ASCII Media Works published seven novels from January 2009 to June 2015 under their Dengeki Bunko imprint. The novels have been licensed for release in North America by Yen Press.', 78, 'UtsuroNoHako_vol1.jpg', '2018-01-25 10:50:25'),
(8, 'Toaru Majutsu no Index', 'A Certain Magical Index (とある魔術の禁書目録 インデックス Toaru Majutsu no Indekkusu) is a Japanese light novel series written by Kazuma Kamachi and illustrated by Kiyotaka Haimura, which has been published by ASCII Media Works under their Dengeki Bunko imprint since April 2004. The plot is set in a world where supernatural abilities exist. The light novels focus on Tōma Kamijō, a young high school student in Academy City who has an unusual ability, as he encounters an English nun named Index. His ability and relationship with Index proves dangerous to other magicians and espers who want to discover the secrets behind him, Index as well as the city.', 89, 'To_Aru_Majutsu_no_Index_new_cover.jpg', '2018-01-25 10:55:01'),
(10, 'Rokujouma no Shinryakusha!?', 'Invaders of the Rokujyōma!? (六畳間の侵略者!? Rokujōma no Shinryakusha!?, lit. Invaders of the Six-Tatami Mat Room!?) is a Japanese light novel series written by Takehaya and illustrated by Poco. HJ Bunko has published seventeen volumes since 2009 under their HJ Bunko imprint, as well as two side story volumes. A manga adaptation with art by Tomosane Ariike is serialized in Hobby Japan&#39;s online seinen manga magazine Comic Dangan. A 12-episode anime television series adaptation by Silver Link aired between July 11 and September 26, 2014.', 75, 'Rokujouma_no_Shinryakusha_Volume_8.5.jpeg.jpeg', '2018-01-25 16:23:54'),
(11, 'Maria-sama ga Miteru', 'Maria-sama ga Miteru (マリア様がみてる) is a Japanese light novel series written by Oyuki Konno and illustrated by Reine Hibiki. The series is published by Shueisha under their Cobalt imprint. Many of the short stories which were later also included in the novel series were first published in the Cobalt magazine. The series currently has 37 published volumes.', 80, 'MM_v01_cover.jpg', '2018-01-29 10:38:30'),
(12, 'Gate - Thus the JSDF Fought There', '&#34;Gate - Thus the JSDF Fought There&#34; (ゲート：自衛隊　彼の地にて、斯く戦えり / Geito - Jieitai Karenochinite Kakutatakaeri) is a Japanese fantasy novel series by Takumi Yanai.\r\nBetween 2006 and 2009, Gate was serialized online in a novel website called Arcadia.\r\n\r\nLater in 2010 it was published by Alphapolis. Compared to the online serialization, the published volumes place a lesser weight on political commentary. Also, volume three has been substantially rewritten. The ending was also different. The concluding fifth volume was published in late 2011. Two gaiden (side story) volumes were also published in 2012 and 2013.', 90, 'GATESvol2.jpg', '2018-01-29 10:44:30'),
(13, 'The World God Only Knows', 'The World God Only Knows (神のみぞ知るセカイ) is a light novel series written by Mamizu Arisawa and illustrated by Tamiki Wakaki. The series has currently 2 volumes. It also has a manga(complete) and 3 anime seasons. It should also be noted that the novels have a story disparate from the manga.', 120, 'The_World_God_Only_Knows_v01_cover.jpg', '2018-01-29 10:47:09'),
(14, 'Ultimate Antihero', 'Ultimate Antihero (アルティメット・アンチヒーロー) is a Japanese light novel written by Riku Misora (海空 りく), with illustrations by Nardack. The first volume was published in October 2014 and the series is complete with 4 volumes.', 125, 'Ultimate_Antihero_V1_cover.jpg', '2018-01-29 10:49:58'),
(15, 'Another', 'Another (アナザー) is a novel by Yukito Ayatsuji, a mainstream author in Japan who is specialized mystery and horror. The story is originally a magazine serialization that dates back to 2006. As a compilation of all serialized chapters, a hard-cover version of the novel was published in 2009. A paperback version was also released in 2011.\r\n\r\nThe novel is ranked 4th in the &#34;Bunshun Mystery Best Ten 2009&#34; ranking and 3rd in the &#34;This Mystery Novel is Great! 2010&#34; ranking.\r\n\r\nIt was released as an e-book in two volumes in March and July of 2013.', 250, 'Another_cover.png', '2018-01-29 10:56:07'),
(16, 'Clockwork Planet', 'Clockwork Planet(クロックワーク・プラネット) is a light novel series by author Yuu Kamiya and Tsubaki Himana and illustrated by Shino. It has an ongoing manga adaptation illustrated by Kuro.\r\nThe Earth had died a thousand years ago. It was rebuilt using gears by a mysterious man named &#34;Y&#34;. In the present, while Naoto Miura is living his life as a high school student and a gear enthusiast, a box crashed into his home. In the box, is an beautiful automata girl, RyuZU. This encounter would then have a profound effect on both Naoto and Society itself.', 150, 'Clockwork_Planet_Cover_Vol01.jpg', '2018-01-29 10:58:38'),
(17, 'Date A Live', 'Date A Live (デート・ア・ライブ), is a Japanese light novel series written by Tachibana Koushi (橘公司), with illustrations by Tsunako (つなこ), published by Fujimi Shobo under their Fujimi Fantasia Bunko label. The novel was first published in March 2011 and has 16 volumes currently. In April 2013 an anime adaptation began which covered the events of volumes 1-4 of the light novel which ended in June 2013. A dub of season 1 was released on 10th June 2014 by FUNimation. A second season aired on 11th April, 2014 to 13th June, 2014 which covers the events from volumes 5-7. A movie Date A Live : Mayuri Judgment was released on 22nd August 2015. A third season has been announced in october 2017.', 130, 'DAL_v01_cover.jpg', '2018-01-29 11:00:40'),
(18, 'Strike the Blood', 'Strike the Blood (ストライク・ザ・ブラッド, Sutoraiku za Buraddo) is a Japanese light novel series by Gakuto Mikumo with illustrations by Manyako. &#34;The fourth primogenitor&#34;—that is the world&#39;s strongest vampire; one who was supposed to only exist in legends. Accompanied by twelve Kenjuu in spreading catastrophes, this phantom vampire appears in Japan. In order to observe and eliminate the &#34;fourth primogenitor&#34;, the governmental organization, Lion King, decides to dispatch an attack mage denoted as a &#34;swords shaman&#34;. However, for some reason, the one chosen for the observation was an apprentice &#34;swords shaman&#34; girl, Himeragi Yukina. Wielding the strongest anti-primogenitor spirit spear, Yukina arrives at Demon Sanctuary, &#34;Itogami City&#34;. What is the true identity of the &#34;fourth primogenitor&#34;, Akatsuki Kojou, who she encounters over there!?', 90, 'StB_Vol_1_cover.jpg', '2018-01-29 11:11:30'),
(19, 'Sword Art Online', 'Sword Art Online (ソードアート・オンライン, Sōdoāto Onrain) is a light novel series written by Reki Kawahara and illustrated by abec.\r\n\r\nThere are currently 14 volumes released in Japanese with the 15th out in August 2014.\r\n\r\nThe English version has been licensed by Yen Press which has released Volume 1 in April 2014 with Volume 2 out in August 2014. Please support the series by buying the official English translations.\r\n\r\nIt was written as a Web novel with the penname &#34;Kunori Fumio&#34; since 2002, and was published in 2009 at the same time as Accel World, in the label Dengeki Bunko.', 140, 'Sword_Art_Online_Vol_01_cover.jpg', '2018-01-29 11:14:24'),
(20, 'Youjo Senki', 'Yōjo Senki (幼女戦記), is a light novel series written by Carlo Zen (カルロ・ゼン) and illustrated by Shinotsuki Shinobu (篠月しのぶ). It is ongoing with 7 volumes. On the front line of the war, there’s a little girl. Blond hair, blue eyes and porcelain white skin, she commands the army with lisping voice. Her name is Tanya Degurechaff. But in reality, she is one of Japan’s most elite salarymen, reborn as a little girl after angering a mysterious being X who calls himself “God.” And this little girl, who prioritize over anything else efficiency and her own career, will become the most dangerous being amongst the sorcerers of the imperial army…', 140, 'Youjo_senki_vol1_cover.jpg', '2018-01-29 11:22:43'),
(21, 'Kono Subarashii Sekai ni Shukufuku o!', 'Kono Subarashii Sekai ni Shukufuku o! (この素晴らしい世界に祝福を!, Gifting the Wonderful World with Blessings!) is a Japanese light novel series written by Akatsuki Natsume and illustrated by Mishima Kurone. It is ongoing with 7 volumes. An anime adaptation of 10 episodes aired from Jan 14, 2016 to Mar 17, 2016.', 115, 'Kono_Subarashii_Sekai_ni_Shukufuku_o!_v01_cover.jpeg.jpeg', '2018-01-29 11:25:01'),
(22, 'Kagerou Days', 'The Kagerou Project (カゲロウプロジェクト Kagerō Purojekuto, lit. &#34;Heat Haze Project&#34;), also known as Kagerou Daze (but commonly referred to as Kagerou Days), is a Vocaloid song series created by Jin (also known as Shizen no Teki-P). The story revolves around the Mekakushi Dan (メカクシ団, lit. &#34;Blindfold Gang&#34;), a group of teenagers with unusual powers, dubbed Eye Abilities.\r\nThe series became popular on the video sharing website Niconico after the release of the song Kagerou Daze (カゲロウデイズ lit. Heat Haze Days), which also gave the series its name. The song has amassed over 3 million views and is the most popular song of the project. Four light novels have been released, written by Jin and illustrated by Shidu.', 135, 'Kageou_Days_Volume1_Cover.png', '2018-01-29 11:28:06'),
(23, 'Tokyo Ravens', 'Tokyo Ravens (レイヴンズ) is a Japanese light novel written by Kōhei Azano and illustrated by Sumihei. It was adapted into a manga series in 2010. A 24 episode anime adaptation was aired in Japan from October 8, 2013 until March 26, 2014, covering volumes 1 till 9, except some short stories from volumes 4 and 5.', 136, 'Tr1_cover_cut.jpg', '2018-01-29 11:32:06'),
(24, 'Black Bullet', 'Black Bullet (ブラック・ブレット) is the light novel series written by Shiden Kanzaki (神崎紫電) and illustrated by Saki Ukai (鵜飼沙樹) with 7 volumes currently released.\r\n\r\nProduced by Kinema Citrus, a 13-episode anime adaptation aired during the Spring 2014 season, covering Volumes 1-4.', 150, 'BlackBullet01.jpg', '2018-01-29 11:35:31'),
(25, 'Yume Nikki', 'Yume Nikki (ゆめにっき, lit. Dream Diary). Adaptation of the RPGMaker game by Kikiyama, Yume Nikki is the story about a young girl named Madotsuki who travels and explores her dreams every night, never leaving her room. Those dreams are filled with the most estranged beings and places, giving an insight into Madotsuki. Follow her while she discovers the deepest places of her mind.', 210, 'Yume_Nikki_Cover.jpg', '2018-01-29 11:38:22'),
(26, 'Ao no Exorcist', 'The ongoing light-novel series Ao no Exorcist (青の祓魔師, lit. Blue Exorcist) is written by Aya Yajima. It is an adaptation of an ongoing supernatural action manga series written and illustrated by Katou Kazue. The illustrations of the light novel are also done by Katou Kazue, and it is published under Shueisha&#39;s JUMP j-BOOKS label. As of March 2016, there have been three volumes published.', 100, 'Ao_no_Exorcist_v1_cover.jpg', '2018-01-29 11:40:51'),
(27, 'Seirei Tsukai no Blade Dance', 'Seirei Tsukai no Blade Dance (精霊使いの剣舞 / Bladedance of Elementaler) is a light novel series written by Shimizu Yuu and initially illustrated by Sakura Hanpen. Due to poor health, Sakura Hanpen could no longer continue illustrating the series and Nimura Yuuji, the illustrator of Leviathan of the Covenant, took over starting Volume 14', 210, 'STnBD_Nimura_Yuuji_visual.jpg', '2018-01-29 11:45:23'),
(28, 'High School DxD', 'I, Hyoudou Issei, am a 2nd Year High school student and my age is equal to the number of years I haven&#39;t had a girlfriend. And, someone like me got a girlfriend! I&#39;m sorry buddies, I will walk the path of becoming an adult before you guys! —That&#39;s how it was supposed to be, but why did I get killed by my girlfriend!?\r\n\r\nI still haven&#39;t done anything yet! Are there no Gods in this World!?\r\n\r\nAnd, the person who saved me is the most beautiful girl in my school, Rias Gremory-senpai. I learned the shocking truth from her who isn&#39;t a God but a Devil. &#34;You have reincarnated as a Devil! Work for me!&#34;\r\n\r\nLured by Senpai&#39;s breasts and treats, my life as a reincarnated Devil began.\r\n\r\nSo the &#34;Academy×Love Comedy×Battle Fantasy” starts here with just aggressive and worldly desires!', 420, 'HSDxD_v01_cover.jpg', '2018-01-29 11:49:05'),
(29, 'Amagi Brilliant Park', 'Amagi Brilliant Park (甘城ブリリアントパーク) is a fantasy novel written by Gatou Shouji and illustrated by Nakajima Yuka. The series has 8 volumes published so far and a spin-off with 3 volumes named Amagi Brilliant Park: Mapple Summoner. Kanie Seiya is a good looking, perfectionist boy who is forced by the mysterious Sento Isuzu to visit an amusement park named Amagi Brilliant Park, which is in serious financial trouble and about to be closed forever. The park is actually staffed by refugees from a magical realm called Maple Land, and the park is a facility for harvesting magical energy from visitors while they’re having fun. As such, the park is the only way the refugees can maintain their existence in the human realm.\r\n\r\nTo save the park from closing, Seiya is hired by the owner, Latifa Fleuranza, to use his skills in entertainment to become its new manager. However, to not lose the land to a real estate agency, they have only three months left to attract 250,000 visitors, a feat that seems impossible given the park’s current situation.', 136, 'AmaburiV1_cover.jpg', '2018-01-29 23:07:13'),
(30, 'Densetsu no Yūsha no Densetsu', 'Densetsu no Yūsha no Densetsu (伝説の勇者の伝説 The Legend of the Legendary Heroes) is a light novel series written by Kagami Takaya (鏡貴也), who is also the author of following notable series:\r\n\r\n大伝説の勇者の伝説 (Dai Densetsu no Yūsha no Densetsu) series,\r\nいつか天魔の黒ウサギ (Itsuka Tenma no Kuro Usagi) series,\r\n黙示録アリス (Mokushiroku Arisu/Apocalypse Alice) series,\r\n終わりのセラフ (Owari no Seraph / Seraph of the End) series', 145, 'DYD_v01_cover.jpg', '2018-01-29 23:09:25'),
(31, 'Dungeon ni Deai wo Motomeru no wa Machigatteiru Darou ka', 'Dungeon ni Deai wo Motomeru no wa Machigatteiru Darou ka, shortened as DanMachi(ダンまち), is a Japanese light novel series written by Fujino Omori and illustrated by Suzuhito Yasuda. The first volume of the novel was published on Jan 15, 2013. Since then, 4 volumes have been published by SOFTBANK Creative under their GA Bunko label.\r\n\r\nA manga adaptation by Kunieda (Art) and Omori, Fujino (Story) began its serialization on Aug 2, 2013 in the seinen manga magazine, Young Gangan, published by Square Enix.\r\n\r\nOn April 19, 2014, Yen Press has announced that they have licensed this title and will be publishing it under the name Is It Wrong to Try to Pick Up Girls in a Dungeon?', 340, 'DanMachi_Vol_1_Cover.jpeg.jpeg', '2018-01-29 23:11:03'),
(32, 'Welcome to the N.H.K!', 'Twenty-two-year-old Satou, a college dropout and aficionado of anime porn, knows a little secret or at least he thinks he does! Believe it or not, he has stumbled upon an incredible conspiracy created by the Japanese Broadcasting Company, N.H.K. But despite fighting the good fight, Satou has become an unemployed hikikomori a shut-in who has withdrawn from the world.\r\n\r\nOne day, he meets Misaki, a mysterious young girl who invites him to join her special project. Slowly, Satou comes out of his reclusive shell, and his hilarious journey begins, filled with mistaken identity, Lolita complexes and an ultimate quest to create the greatest hentai game ever!', 190, 'NHK.jpg', '2018-01-29 23:14:20'),
(33, 'Durarara!!', 'Durarara!! or DRRR!! (デュラララ!!) is a light novel series written by Narita Ryohgo, also well-known for his Baccano! series. The illustrations are done by Yasuda Suzuhito.\r\nThe first series is complete at 13 volumes. However the continuation, a second series named Durarara!!SH is currently being published, with 2 volumes out so far. An extra Gaiden!? was also published in August 2014.', 184, 'Durarara!!_v01_cover.jpg', '2018-01-29 23:26:06'),
(34, 'Toradora!', 'Toradora! (とらドラ！) is a light novel written by Takemiya Yuyuko. Takasu Ryuuji begins his second year of high school trying to look his best. However, there is one thing that torments him: despite his gentle personality he has inherited his gangster father&#39;s intimidating eyes, which often leads to misunderstandings by his classmates. But all that is about to change, on the first day of the new school term he accidentally bumps into the most dangerous being in school - Aisaka Taiga, also known as the Palmtop Tiger. Despite her diminutive appearance, Taiga has a very negative attitude and has left a &#34;bloody trail&#34; wherever she goes, hence her nickname.', 180, 'Toradora!_novel_cover.jpg', '2018-01-29 23:29:13'),
(35, 'Sword Art Online: Progressive', 'Sword Art Online: Progressive (ソードアート・オンライン プログレッシブ) is a spin-off series of Sword Art Online written by Reki Kawahara and illustrated by abec.\r\n\r\nIt is published by ASCII Media Works under their imprint Dengeki Bunko, and it is reboot of the SAO Aincrad Arc starting from a day or two before the clearing of the First Floor Boss, and continuing onwards. A compilation of Aria in the Starless Night, where Kirito becomes known as the Black Swordsman, the events concerning the 2nd floor boss clearing, and Rondo of the Transient Blade, the sad tale of a young male blacksmith.', 500, 'Sword_Art_Online_Progressive_Vol_1_-_001.jpg', '2018-01-29 23:31:54'),
(36, 'Ryuoh no Oshigoto!', 'Ryuoh no Oshigoto (りゅうおうのおしごと！) is a light novel series written by Shirow Shiratori (白鳥 士郎) and illustrated by Shirabi (しらび). The series is ongoing with currently 5 released volumes, published since September 2015. The story is about a teenage boy who happens to be a shogi master. One day, a nine-year-old girl turns up at his house, announcing that she will take him as her master. From there, all kinds of wacky hijinks ensue.', 160, 'Ryuoh_no_Oshigoto!_v01_cover.jpg', '2018-01-29 23:46:02'),
(37, 'Ero Manga Sensei', 'Ero Manga Sensei (エロマンガ先生) is a Japanese light novel series written by Tsukasa Fushimi (伏見 つかさ), and illustrated by Hiro Kanzaki (かんざき ひろ) which is published by Dengeki Bunko. The manga adaptation is illustrated by rin and it is published by Dengeki Daioh. The series currently has 7 volumes. An anime adaptation has been green-lit. The anime will be produced by Aniplex and animation studio A-1 Pictures. The &#34;new sibling romantic comedy&#34; revolves around Masamune Izumi, a light novel author in high school. Masamune&#39;s little sister is Sagiri, a shut-in girl who hasn&#39;t left her room for an entire year. She even forces her brother to make and bring her meals when she stomps the floor. Masamune wants his sister to leave her room, because the two of them are each other&#39;s only family.', 250, 'Eromanga-sensei_Vol1_Cover.jpg', '2018-01-29 23:47:53'),
(38, 'Rokka no Yuusha', 'Rokka no Yuusha (六花の勇者) is a novel series written by Ishio Yamagata and illustrated by Miyagi. An anime aired from July to September 2015, adapting the first volume of the novels. When “The Majin” awakes the goddess of fate will choose six warriors and bestow them with the power to save the world. Somewhere on their bodies a crest in the shape of a flower will appear and as a result the warriors are called “The Heroes of the Six Flowers”. As the day of The Majin’s revival nears, Adlet, a boy who calls himself the strongest man in the world, is chosen as one of the “Six Flowers”. But when the heroes arrived at their designated location, they found that there were seven heroes present. Which meant that one of them was an imposter and an enemy. Confused by the impossible situation, suspicion and paranoia spread among the chosen. And within a thick forest, the heroes’ fierce battle begins!', 300, 'RnY_V1_cover.jpg', '2018-01-29 23:50:39'),
(39, 'Hataraku Maou-sama!', '&#34;Hataraku Maō-sama!&#34; (はたらく魔王さま!), is a Japanese light novel series written by Satoshi Wagahara, with illustrations by 029. Since February 2011, ASCII Media Works has published ten volumes. (April 2014) A 13 episodes long anime has aired in Japan during Spring 2013, the anime was later licensed and released in the US under the title &#34;The Devil is a Part-Timer!&#34;.', 190, 'Hataraku_Maou-sama.jpg', '2018-01-29 23:53:53'),
(40, 'Re:Zero kara Hajimeru Isekai Seikatsu', 'Re:Zero − Starting Life in Another World (Japanese: Re：ゼロから始める異世界生活 Hepburn: Ri:Zero kara Hajimeru Isekai Seikatsu) is a Japanese light novel series written by Tappei Nagatsuki and illustrated by Shinichirou Otsuka. The story centers on Subaru Natsuki, a hikikomori who suddenly finds himself transported to another world on his way home from the convenience store. The series was initially serialized on the website Shōsetsuka ni Narō from 2012 onwards. Fifteen volumes have been published by Media Factory since January 24, 2014, under their MF Bunko J imprint.', 500, 'Re_Zero_-_Volume_01_-_Couverture.jpeg.jpeg', '2018-01-29 23:55:40'),
(41, 'Psycho Love Comedy', 'Psycho Love Comedy / PSYCOME (サイコメ) is a Japanese light novel series by Mizuki Mizushiro (水城水城) with illustrations by Namanie (生煮え). Published by Famitsu Bunko, the main series is complete with 6 volumes with an additional short stories collection. Sentenced on false charges, Kamiya Kyousuke was forced to enroll in the &#34;Purgatorium School of Rehabilitation&#34; where juvenile convicts are gathered. His surroundings include pretty girls with beautiful legs or fluttering hair... But they are actually convicted murderers. Attracting extra attention in school as the special &#39;Mass Murderer of Twelve&#39;, Kyousuke is also drawing the advances of the unidentified gas mask-wearing beauty with the giant rack, Hikawa Renko. In order to graduate safely, will Kyousuke be able to resist temptation laced with death!? Every single classmate is a murderer. LOVE＝KILL！The deeper the love, the greater the risk of death, a hardcore romantic comedy!! Let the lessons begin!', 190, 'PsyCome_V1_Cover.jpg', '2018-01-29 23:57:59'),
(42, 'Kuusen Madoushi Kouhosei no Kyoukan', 'Kuusen Madoushi Kouhosei no Kyoukan (空戦魔導士候補生の教官) is a Japanese light novel series written by Yuu Moroboshi, illustrated by Mikihiro Amami and published by Fujimi Shobo on their imprint Fujimi Fantasia Bunko. The story is set in a world where humanity, driven off the land by the threat of magical armored insects, now live in aerial floating cities. Thus wizards - aerial combat mages who fight the insects with magical powers - came into being.\r\n\r\nKanata Age is a young man who lives on the floating wizard academy city of &#34;Mistgun&#34;. He was once celebrated as the &#34;Black Master Swordsman,&#34; the elite ace of the S128 special team. However, he is now despised as the &#34;traitor of the special team.&#34; One day, he is assigned as the instructor of E601, a team that has suffered 10 consecutive defeats. E601 has three girls - Misora Whitale, Lecty Eisenach, and Rico Flamel - with one or two peculiar quirks.', 180, 'Kuusen-Madoushi-Kouhosei-no-Kyoukan-vol1.jpg', '2018-01-30 00:00:12'),
(43, 'Papa no Iu Koto o Kikinasai!', 'Papa no Iu Koto o Kikinasai! (パパのいうことを聞きなさい!), in short &#34;Papa Kiki&#34;, also known officially as &#34;Listen to me, girls. I am your father!&#34;, is a Japanese light novel series written by Matsu Tomohiro (松智洋) who is also the author of Mayoi Neko Overrun!, and with illustrations by Nakajima Yuka (なかじまゆか), published by Shueisha under their Super Dash Bunko imprint. 19-year Segawa Yuuta was looking forward to start his new university life and go through a normal university life, making new friends, etc, etc. But suddenly, when the plane which his elder sister and brother-in-law were on went missing, he became the &#39;father&#39; of his three young nieces! Now, his six-tatami mat apartment not just has to accommodate himself, but 14-year old Sora, 10-year old Miu, and 3-year old Hina. What will be the fate of Yuuta?', 100, 'Papakiki_v01_cover.jpg', '2018-01-30 00:02:25'),
(44, 'Owari no Serafu', 'Owari no Serafu - Ichinose Glen, Jyuurokusai no Catastrophe (Seraph of the End - Ichinose Glen, a 16 year old&#39;s Catastrophe) (終わりのセラフ 一瀬グレン、16歳の破滅) is a Japanese light novel series written by Kagami Takaya (鏡貴也), who is also the author of the following notable series:\r\n\r\n伝説の勇者の伝説 (Densetsu no Yūsha no Densetsu/The Legend of the Legendary Heroes) series,\r\nいつか天魔の黒ウサギ (Itsuka Tenma no Kuro Usagi) series,\r\n黙示録アリス (Mokushiroku Arisu/Apocalypse Alice) series\r\nWith illustrations by Yamamoto Yamato (山本ヤマト), &#34;Owari no Seraph - Ichinose Glen, a 16 year old&#39;s Catastrophe&#34; is published under Kodansha light novel label.', 210, 'Seraph_v01_000a.jpg', '2018-01-30 00:04:12'),
(45, 'Magical Girl Raising Project', 'Magical Girl Raising Project (魔法少女育成計画) is a light novel series written by Endou Asari and illustrated by Maruino. The series has 10 volumes as of March 2016. The highly popular social network game &#34;Magical Girl Raising Project&#34; is a miraculous game that produces real Magical Girls, giving each player a chance of 1 in 10000 to become one. Girls who are lucky enough to gain the power of magic spend their days with glee. However, one day, the administration arbitrarily announces that there are too many Magical Girls, so the number will be halved. The curtain will now be raised on the relentless and merciless survival game between sixteen magical girls.', 310, 'Magicalgirlraisingprojectcover.png', '2018-01-30 00:05:54'),
(46, 'Mahouka Koukou no Rettousei', 'Mahouka Koukou no Rettousei (魔法科高校の劣等生), literally &#34;The Poor Performing Student of a Magic High School&#34;, and also known officially as &#34;The Irregular at Magic High School&#34;, is a Japanese light novel series written by Satou Tsutomu (佐島勤), with illustrations by Ishida Kana (石田可奈), published by ASCII Media Works under their Dengeki Bunko label. The novel began as a web novel serialization in &#34;Let&#39;s Become a Novelist&#34; on October 12, 2008. It then became the second web novel after &#34;Sword Art Online&#34;, to be commercialized and published by Dengeki in July 2011. An anime adaptation by Madhouse Studios was announced on October 6, 2013, and the anime aired from April 5 to September 27, 2014, for a total of 26 episodes.', 99, 'MKnR_v01_cover.jpg', '2018-01-30 00:07:24'),
(47, 'Oda Nobuna no Yabou', 'Oda Nobuna no Yabou (織田信奈の野望) is a light novel series written by Kasuga Mikage and illustrated by Miyama-Zero, published by GA Bunko. Currently, the series has 13 volumes and a spin off novel. Sagara Yoshiharu finds himself back in time during the Sengoku era. During his first day, he was about to be killed in a battlefield. He is saved by a man named Toyotomi Hideyoshi. The famous Daimyou, General and Politician who unified Japan and ended the Sengoku era, dies while saving Sagara Yoshiharu. With history completely changed, Sagara Yoshiharu tries to make things right again but it seems that history is taking a different course than the one he learned in his time. Oda Nobunaga, the famed Daimyo is now a brilliant but beautiful young girl named Oda Nobuna. Sagara Yoshiharu decides to replace Toyotomi Hideyoshi by taking his place and serve under the command of Oda Nobuna under the given name &#34;Monkey&#34;. Rewriting history as he goes along.', 222, 'Oda_Nobuna_no_Yabou_v01_cover.jpg', '2018-01-30 00:20:27'),
(48, 'Ore no Imouto ga Konna ni Kawaii Wake ga Nai', 'Ore no Imōto ga Konna ni Kawaii Wake ga Nai (俺の妹がこんなに可愛いわけがない, My Little Sister Can&#39;t Be This Cute) is a Japanese light novel series written by Tsukasa Fushimi, with illustrations by Hiro Kanzaki.', 160, '10_Year_Reunion_Cover.jpg', '2018-01-30 00:22:08'),
(49, 'Absolute Duo', 'Absolute Duo (アブソリュート・デュオ) is a Japanese light novel written by Hiiragi★Takumi (柊★たくみ) and illustrated by Asaba Yuu (浅葉ゆう), published by MF Bunko J. An anime adaptation aired from January 4th 2015 to March 22nd 2015, covering the first four volumes. 《Blaze》— That is a weapon made by materialising your own soul with your enhanced will power. I, Tooru Kokonoe, have that ability which is said to be possessed only by one in every one thousand people, so it was decided that I would enroll in Kouryou academy that gives out 《Blaze》, and a school that teaches battle techniques. But for an unknown reason, my 《Blaze》 didn&#39;t have a shape of a weapon but a protector, and it takes the form of a 《Shield》.', 110, 'Absolute_Duo_Vol1_Main-thumb.jpg', '2018-01-30 00:25:18'),
(50, 'Allison', 'Allison (アリソン) is a Japanese light novel series written by Keiichi Sigsawa (時雨沢恵一 ) and illustrated by Kohaku Kuroboshi (黒星紅白). The series is complete with 4 volumes. A sequel series - Lillia to Treize - also exists with 6 volumes. Set in a world of a single continent divided by the Lutoni River and Central Mountains into two warring countries, Roxche and Sou Beil, the story follows Roxche pilot Allison and her childhood friend Wilhelm in their dangerous quest for a fabled treasure in Sou Beil territory that may end the war between the two nations.', 210, 'Allison_v1_cover.jpg', '2018-01-30 00:26:33'),
(51, 'Toaru Majutsu no Index: New Testament', 'Toaru Majutsu no Index (とある魔術の禁書目録（インデックス）, lit. A Certain Magical Index) is a Japanese light novel series written by Kazuma Kamachi (鎌池 和馬) and illustrated by Kiyotaka Haimura (灰村 キヨタカ). The series is published by ASCII Media Works under their Dengeki Bunko imprint. There are currently 43 published volumes of the novels, including 2 side story volumes. Regularly placing in the top 10 of the Kono Light Novel ga Sugoi! rankings, it was named the Best Novel Series of 10 Years in Kono Light Novel ga Sugoi! 2014.', 330, 'NT_vol_6.jpg', '2018-01-30 00:30:34'),
(53, 'Masou Gakuen HxH', 'Masou Gakuen HxH or Hybrid X Heart Magias Academy Ataraxia (魔装学園H×H) is a Japanese light novel series written by Kuji Masamune (久慈 マサムネ), with illustrations by Hisasi & mechanical design by Kurogin (黒銀). The first volume was published in January 2014 and is currently ongoing with 12 volumes. A manga adaptation is being published since June 2015, with also an anime adaptation airing since July and till September 2016, with 12 episodes.', 190, 'Masou_Gakuen_HxH_V04_Cover.jpg', '2018-01-30 00:33:37'),
(54, 'Shinrei Tantei Yakumo', 'Shinrei Tantei Yakumo (心霊探偵 八雲 / Psychic Detective Yakumo) is a light novel series written by author Manabu Kaminaga. The series was first published by Nihon Bungeisha with illustrations done by Katoh Akatsuki, from volume 9 Kadokawa took over the publication. The series is also republished in bunko format under Kadokawa Bunko label with the cover arts done by Yasushi Suzuki. Currently there are 10 volumes of the main series published, as well as 5 volumes containing side stories. \r\nAlso a spin-off prequel series titled Ukikumo Shinrei Kitan (浮雲心霊奇譚 / Ukikumo Psychic Mysterious Story), with illustrations by ZUNKO, lauched as the author&#39;s 10th anniversary project. With 3 volumes released, it is also currently being serialized in Shousetsu Subaru.', 140, 'Shinrei_Tantei_Yakumo_1.jpg', '2018-01-30 00:35:05'),
(56, 'Seiken Tsukai No World Break', 'Seiken Tsukai No World Break (聖剣使いの禁呪詠唱) is a Japanese light novel series written by Akamitsu Awamura and illustrated by Refeia. SB Creative has published nineteen volumes since November 2012 under their GA Bunko imprint.  Written by Akamitsu Awamura, the series takes place in a private high school involving the concept of &#34;saviors.&#34; They are known as people who possess awakened memories of their past lives. The story tells of a young boy named Moroha Haimura who comes to this private school.\r\n\r\nAt the school, there are two types of people: Shirogane, who fight enemies with weapons and techniques gleaned from the Prana powered from their own bodies, and Kuroma, who wipe out enemies with magic to manipulate the Mana powers that surpass physics. Moroha Haimura is the first person with past lives of both Shirogane and Kuroma.', 230, 'SeiKen_Tsukai_no_World_Break_01_000.JPG', '2018-01-30 00:38:59'),
(57, 'Hyouka', 'Hyouka (氷菓) is a novel written by Honobu Yonezawa and serialized in Kadokawa Shoten. It constitutes the first installment in the &#34;Classics Club Series&#34; (〈古典部〉シリーズ), which currently has 6 volumes. The anime aired from April 22, 2012 to September 16, 2012 with 22 episodes in total. There is an ongoing manga written by the original author and illustrated by Task Ohna.', 210, 'Hyouka_01.jpg', '2018-01-30 00:41:05'),
(58, 'Meg to Seron', 'Meg to Seron (メグとセロン, Meg and Seron) is a Japanese light novel series written by Keiichi Sigsawa (時雨沢恵一 ) and illustrated by Kohaku Kuroboshi (黒星紅白). It is a spin-off series of Lillia to Treize and is complete with 7 volumes. A spin-off of Lillia and Treize, Meg and Seron is a high school adventure/mystery/romance/comedy of sorts taking place in the rough equivalent of the 1950s. The story follows Seron, a stoic and handsome bookworm who is in love with his classmate--a sweet, oblivious transfer student named Meg.\r\n\r\nMeg and Seron takes place at around the same time as Lillia and Treize, but knowledge of the main series is not necessary to read Meg and Seron.', 111, 'Meg_to_Seron_v1_cover.jpg', '2018-01-30 00:43:35'),
(59, 'Mondaiji-tachi ga isekai kara kuru soudesu yo', 'Mondaiji-tachi ga Isekai Kara Kuru Sou Desu yo? (問題児たちが異世界から来るそうですよ? lit. Problem Children are Coming from Another World, Aren&#39;t They?) also known as Mondaiji (問題児) for short is a Japanese light novel series written by Tatsunoko Tarou and illustrated by Amano Yuu. An anime adaptation by Diomedea aired from January 11, 2013 to March 15, 2013, covering the first two volumes of the novel.', 167, 'Mondaiji_cover.jpg', '2018-01-30 00:44:41'),
(60, 'Tsukumodo Antique Shop', 'Tsukumodo Antique Shop: We Sell &#34;Mysteriosities&#34; (付喪堂骨董店―“不思議”取り扱います Tsukumodou Kottouten - &#34;Fushigi&#34; Toriatsukaimasu) is a light novel series written by Akihiko Odou and illustrated by Takeshima Satoshi. The series is finished with 7 volumes. The story revolves around so-called &#34;Relics&#34;—mysterious items with special powers that range from obviously dangerous to deceptively harmless—and the havoc they wreak. Again and again, Tokiya Kurusu and Saki Maino, two part-timers at the Tsukumodo Antique Shop (FAKE), find themselves in new difficult situations as they help their employer, Towako Settsu, to take such Relics into custody. \r\nWhy do they seem to be haunted by such incidents and what fate awaits the never-smiling girl and the death-seeing boy...?', 190, 'Tsukumodo_Vol_5_001.jpg', '2018-01-30 00:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `items_genres`
--

CREATE TABLE `items_genres` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_genres`
--

INSERT INTO `items_genres` (`id`, `item_id`, `genre_id`) VALUES
(14, 7, 7),
(15, 7, 8),
(16, 7, 9),
(17, 7, 13),
(70, 4, 1),
(71, 4, 2),
(72, 4, 3),
(73, 4, 4),
(74, 8, 1),
(75, 8, 11),
(76, 8, 13),
(77, 5, 3),
(78, 5, 5),
(79, 5, 10),
(90, 10, 3),
(91, 10, 10),
(107, 11, 4),
(108, 11, 12),
(109, 12, 2),
(110, 12, 13),
(111, 13, 3),
(112, 13, 10),
(113, 14, 1),
(114, 14, 11),
(115, 15, 7),
(116, 15, 8),
(117, 15, 9),
(118, 15, 13),
(119, 16, 1),
(120, 16, 6),
(121, 16, 11),
(122, 17, 1),
(123, 17, 5),
(124, 17, 6),
(125, 2, 1),
(126, 2, 2),
(127, 2, 13),
(128, 18, 1),
(129, 18, 4),
(130, 18, 5),
(131, 18, 11),
(136, 20, 1),
(137, 20, 9),
(138, 20, 13),
(139, 21, 1),
(140, 21, 2),
(141, 21, 3),
(142, 21, 5),
(143, 22, 2),
(144, 22, 11),
(145, 22, 13),
(146, 23, 1),
(147, 23, 8),
(148, 23, 13),
(149, 24, 1),
(150, 24, 2),
(151, 24, 8),
(152, 24, 9),
(153, 24, 11),
(154, 24, 13),
(155, 25, 8),
(156, 25, 9),
(157, 25, 13),
(158, 26, 1),
(159, 26, 13),
(160, 27, 1),
(161, 27, 2),
(162, 27, 6),
(163, 27, 13),
(164, 28, 1),
(165, 28, 5),
(166, 28, 6),
(167, 28, 13),
(168, 29, 3),
(169, 29, 10),
(170, 29, 13),
(171, 30, 1),
(172, 30, 2),
(173, 31, 1),
(174, 31, 2),
(175, 31, 3),
(176, 31, 5),
(177, 31, 10),
(178, 31, 13),
(179, 32, 3),
(180, 32, 4),
(181, 32, 9),
(182, 32, 10),
(183, 33, 1),
(184, 33, 8),
(185, 33, 13),
(186, 34, 3),
(187, 34, 4),
(188, 34, 10),
(189, 34, 12),
(190, 35, 1),
(191, 35, 2),
(192, 35, 6),
(193, 35, 11),
(194, 19, 1),
(195, 19, 2),
(196, 19, 6),
(197, 19, 11),
(198, 36, 3),
(199, 36, 12),
(200, 37, 3),
(201, 37, 5),
(202, 37, 10),
(203, 37, 12),
(204, 38, 1),
(205, 38, 2),
(206, 38, 8),
(207, 38, 13),
(208, 39, 1),
(209, 39, 3),
(210, 39, 10),
(211, 39, 13),
(212, 40, 1),
(213, 40, 2),
(214, 40, 7),
(215, 40, 9),
(216, 40, 10),
(217, 40, 13),
(218, 41, 1),
(219, 41, 3),
(220, 41, 5),
(221, 41, 10),
(222, 41, 13),
(223, 42, 1),
(224, 42, 4),
(225, 42, 6),
(226, 42, 11),
(227, 43, 3),
(228, 43, 10),
(229, 43, 12),
(230, 44, 1),
(231, 44, 10),
(232, 44, 13),
(233, 45, 1),
(234, 45, 8),
(235, 45, 9),
(236, 45, 13),
(237, 46, 1),
(238, 46, 9),
(239, 46, 10),
(240, 46, 11),
(241, 47, 1),
(242, 47, 2),
(243, 47, 3),
(244, 47, 10),
(245, 48, 3),
(246, 48, 4),
(247, 48, 10),
(248, 48, 12),
(249, 49, 1),
(250, 49, 3),
(251, 49, 5),
(252, 49, 6),
(253, 49, 11),
(254, 49, 13),
(255, 50, 2),
(256, 50, 9),
(257, 50, 12),
(258, 51, 1),
(259, 51, 2),
(260, 51, 8),
(261, 51, 9),
(262, 51, 11),
(265, 53, 1),
(266, 53, 5),
(267, 53, 6),
(268, 53, 10),
(269, 53, 11),
(270, 54, 7),
(271, 54, 8),
(272, 54, 9),
(273, 54, 13),
(277, 56, 1),
(278, 56, 2),
(279, 56, 3),
(280, 56, 5),
(281, 56, 6),
(282, 56, 10),
(283, 56, 13),
(284, 57, 4),
(285, 57, 8),
(286, 57, 9),
(287, 57, 13),
(288, 58, 2),
(289, 58, 10),
(290, 58, 12),
(291, 59, 2),
(292, 59, 3),
(293, 59, 8),
(294, 59, 9),
(295, 59, 13),
(296, 60, 7),
(297, 60, 8),
(298, 60, 9),
(299, 60, 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `total_price`) VALUES
(2, 1, '2018-01-31 14:37:27', 167),
(3, 1, '2018-01-31 14:41:00', 340),
(4, 1, '2018-01-31 14:43:01', 1265),
(5, 1, '2018-01-31 16:59:09', 2505),
(6, 1, '2018-01-31 16:59:34', 748),
(7, 1, '2018-01-31 16:59:59', 1322),
(8, 1, '2018-01-31 17:00:15', 352),
(9, 1, '2018-01-31 17:15:10', 111),
(10, 2, '2018-01-31 18:12:43', 1020),
(11, 2, '2018-01-31 18:13:09', 1078),
(12, 2, '2018-01-31 18:13:28', 222),
(13, 1, '2018-01-31 20:39:58', 320),
(14, 3, '2018-01-31 20:41:46', 370),
(15, 3, '2018-01-31 20:43:13', 481);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `quantity`) VALUES
(1, 2, 59, 1),
(2, 3, 2, 2),
(3, 3, 20, 1),
(4, 4, 15, 1),
(5, 4, 16, 1),
(6, 4, 21, 1),
(7, 4, 40, 1),
(8, 4, 49, 1),
(9, 4, 54, 1),
(10, 5, 30, 1),
(11, 5, 31, 2),
(12, 5, 34, 2),
(13, 5, 50, 3),
(14, 5, 56, 3),
(15, 6, 32, 2),
(16, 6, 33, 2),
(17, 7, 25, 1),
(18, 7, 28, 2),
(19, 7, 29, 2),
(20, 8, 17, 1),
(21, 8, 47, 1),
(22, 9, 58, 1),
(23, 10, 48, 2),
(24, 10, 50, 2),
(25, 10, 54, 2),
(26, 11, 40, 1),
(27, 11, 46, 2),
(28, 11, 60, 2),
(29, 12, 5, 1),
(30, 12, 7, 1),
(31, 12, 8, 1),
(32, 13, 48, 2),
(33, 14, 48, 1),
(34, 14, 50, 1),
(35, 15, 34, 1),
(36, 15, 58, 1),
(37, 15, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `is_admin`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$BFZY8BBF16ayqFfBub8FMOIaMyvx/qUK3RFy7Iz88rYNRF5ibqWZe', '2018-01-24 19:27:49', 1),
(2, 'John Doe', 'jdoe@gmail.com', '$2y$10$uVzi4CPhVOF8ynGiVTa3uO7FNrYixZsEmLKxrnFDFnRo7C12dC53G', '2018-01-24 21:56:14', 0),
(3, 'Foo Bar', 'fbar@gmail.com', '$2y$10$9D673W94/KYU5Hk3UovvO.og/A2/C9mc5AKTC5356n37ZTGXJ9TmW', '2018-01-24 23:43:49', 0),
(4, 'Mary Jane', 'mjane@gmail.com', '$2y$10$qUsyLzk8l10Wz0DAG/zATOhCpzhJJeWE/Wk8AxSWcN33PJ0YHTxke', '2018-01-24 23:45:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_genres`
--
ALTER TABLE `items_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `items_genres`
--
ALTER TABLE `items_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `items_genres`
--
ALTER TABLE `items_genres`
  ADD CONSTRAINT `items_genres_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
