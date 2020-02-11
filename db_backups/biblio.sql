-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 11, 2020 at 06:33 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `biblio`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `bio`) VALUES
(1, 'Jackys', 'London', 'John Griffith London (born John Griffith Chaney; January 12, 1876 – November 22, 1916) was an American novelist, journalist, and social activist. A pioneer in the world of commercial magazine fiction, he was one of the first writers to become a worldwide celebrity and earn a large fortune from writing. He was also an innovator in the genre that would later become known as science fiction.'),
(2, 'Herman', 'Melville', 'Herman Melville (born Melvill;[a] August 1, 1819 – September 28, 1891) was an American novelist, short story writer and poet of the American Renaissance period. Among his best-known works are his magnum opus, Moby-Dick (1851), and Typee (1846), a romantic account of his experiences of Polynesian life.'),
(4, 'Ernest', 'Hemingway', ''),
(5, 'Ernest', 'Hemingway', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fk_author_id` int(11) NOT NULL,
  `fk_genre_id` int(11) DEFAULT NULL,
  `fk_language_id` int(3) DEFAULT NULL,
  `fk_shelve_id` int(3) DEFAULT NULL,
  `description` text,
  `rating` int(1) NOT NULL,
  `lent` tinyint(1) NOT NULL DEFAULT '0',
  `borrower` varchar(20) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `fk_author_id`, `fk_genre_id`, `fk_language_id`, `fk_shelve_id`, `description`, `rating`, `lent`, `borrower`, `image_url`) VALUES
(1, 'The Call of the Wild', 1, 1, 1, 1, 'The Call of the Wild is a short adventure novel by Jack London, published in 1903 and set in Yukon, Canada, during the 1890s Klondike Gold Rush, when strong sled dogs were in high demand. The central character of the novel is a dog named Buck. The story opens at a ranch in Santa Clara Valley, California, when Buck is stolen from his home and sold into service as a sled dog in Alaska. He becomes progressively feral in the harsh environment, where he is forced to fight to survive and dominate other dogs. By the end, he sheds the veneer of civilization, and relies on primordial instinct and learned experience to emerge as a leader in the wild.', 5, 0, '', NULL),
(2, 'The Sea-Wolf', 1, 1, 1, 1, 'there\'s a wolf on my window', 5, 0, '', NULL),
(3, 'Moby-Dick', 2, 1, 1, 1, 'Moby-Dick; or, The Whale is an 1851 novel by American writer Herman Melville. The book is sailor Ishmael\'s narrative of the obsessive quest of Ahab, captain of the whaling ship Pequod, for revenge on Moby Dick, the giant white sperm whale that on the ship\'s previous voyage bit off Ahab\'s leg at the knee. A contribution to the literature of the American Renaissance, the work\'s genre classifications range from late Romantic to early Symbolist.', 5, 0, NULL, NULL),
(5, 'The Old Man and the Sea', 5, 10, 2, 2, 'A small description', 3, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'action and adventure'),
(2, 'alternate history'),
(3, 'anthology'),
(4, 'chick lit'),
(5, 'children\'s'),
(6, 'comic book'),
(7, 'coming-of-age'),
(8, 'crime'),
(9, 'drama'),
(10, 'fairytale'),
(11, 'fantasy'),
(12, 'graphic novel'),
(13, 'historical fiction'),
(14, 'horror'),
(15, 'mystery'),
(16, 'paranormal romance'),
(17, 'picture book'),
(18, 'poetry'),
(19, 'political thriller'),
(20, 'romance');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'english'),
(2, 'spanish');

-- --------------------------------------------------------

--
-- Table structure for table `shelves`
--

CREATE TABLE `shelves` (
  `id` int(11) NOT NULL,
  `shelve` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shelves`
--

INSERT INTO `shelves` (`id`, `shelve`) VALUES
(1, 'Old books'),
(2, 'New books');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_genre_id` (`fk_genre_id`),
  ADD KEY `fk_author_id` (`fk_author_id`) USING BTREE,
  ADD KEY `fk_shelve_id` (`fk_shelve_id`),
  ADD KEY `fk_language_id` (`fk_language_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelves`
--
ALTER TABLE `shelves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shelves`
--
ALTER TABLE `shelves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
