-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 05. pro 2015, 01:20
-- Verze serveru: 5.6.15-log
-- Verze PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `kiv_web`
--
CREATE DATABASE IF NOT EXISTS `kiv_web2` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `kiv_web2`;

-- --------------------------------------------------------

--
-- Struktura tabulky `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `authors` varchar(512) COLLATE utf8_czech_ci NOT NULL,
  `id_author` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text COLLATE utf8_czech_ci NOT NULL,
  `file_name` varchar(256) COLLATE utf8_czech_ci NOT NULL,
  `total_score` double NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=19 ;

--
-- Vypisuji data pro tabulku `article`
--

INSERT INTO `article` (`id_article`, `article_name`, `authors`, `id_author`, `create_date`, `content`, `file_name`, `total_score`, `result`) VALUES
(11, 'The first example', 'first author', 8, '2015-10-24 10:48:17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'zcu_cmyk.pdf', 0, 0),
(12, 'The second example', 'third author', 8, '2015-10-24 10:51:51', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'zcu_cmyk.pdf', 0, 0),
(13, 'The next article', '', 5, '2015-10-24 10:59:14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'A14N0081P.pdf', 0, 0),
(14, 'The next article', 'third author', 5, '2015-10-24 11:00:02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'A14B0339P.pdf', 0, 0),
(15, 'The next article', 'first author', 9, '2015-10-24 11:02:44', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'A14N0081P.pdf', 0, 0),
(16, 'The next article', 'second author', 9, '2015-10-24 11:03:19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'A14B0339P.pdf', 1.67, 1),
(17, 'The public example', 'second author', 9, '2015-10-24 11:03:19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'A14B0339P.pdf', 0, 0),
(18, 'The public example 2', 'second author', 9, '2015-10-24 11:03:19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dapibus malesuada placerat. Morbi est est, maximus rhoncus euismod in, ullamcorper vel orci. Nullam congue odio sapien, a pulvinar velit ultrices eget. Mauris in justo quis dolor mollis consequat. Integer malesuada magna nibh, at posuere augue egestas iaculis. Nulla ultrices ac nisi et imperdiet. Ut enim dui, lacinia eget ante a, accumsan porttitor lectus. Proin venenatis blandit tortor, eu scelerisque sem. Quisque finibus nunc urna, at euismod massa efficitur nec. Praesent cursus diam vel augue blandit pretium. Vestibulum et ipsum a justo imperdiet malesuada ac eget justo. Aenean nec egestas enim. Vestibulum bibendum, nibh a malesuada semper, velit justo luctus libero, quis faucibus ante nisl non mi. Morbi imperdiet dui dapibus vehicula venenatis.', 'A14B0339P.pdf', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_reviewer` int(11) NOT NULL,
  `note` text COLLATE utf8_czech_ci NOT NULL,
  `originalsReview` int(11) NOT NULL,
  `themeReview` int(11) NOT NULL,
  `technicalReview` int(11) NOT NULL,
  `languagesReview` int(11) NOT NULL,
  `recommendationReview` int(11) NOT NULL,
  `is_reviewed` int(11) NOT NULL,
  `assigned_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `review_date` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `review`
--

INSERT INTO `review` (`id_review`, `id_article`, `id_reviewer`, `note`, `originalsReview`, `themeReview`, `technicalReview`, `languagesReview`, `recommendationReview`, `is_reviewed`, `assigned_date`, `review_date`, `id_admin`) VALUES
(3, 16, 6, '', 2, 1, 2, 1, 1, 1, '2015-10-25 16:13:10', '2015-12-05 00:32:06', 7),
(4, 16, 10, '', 2, 2, 2, 1, 2, 1, '2015-10-25 16:13:22', '2015-12-05 00:33:08', 7),
(5, 16, 11, '', 1, 3, 1, 3, 1, 1, '2015-12-05 00:27:42', '2015-12-05 00:59:15', 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `roles`
--

INSERT INTO `roles` (`id_role`, `description`) VALUES
(1, 'administrator'),
(2, 'recenzent'),
(3, 'autor');

-- --------------------------------------------------------

--
-- Struktura tabulky `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `value` double NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `settings`
--

INSERT INTO `settings` (`id_setting`, `description`, `value`) VALUES
(1, 'criterium_review', 1.7);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `organisation` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `login` varchar(32) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=13 ;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `name`, `email`, `organisation`, `login`, `password`) VALUES
(5, 3, 'Autor autor', 'autor@konferencnisystem.com', 'ZCU', 'autor', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 2, 'Recenzent recenzent', 'recenzent@konferencnisystem.com', 'ZCU', 'recenzent', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 1, 'Administrator admin', 'admin@konferencnisystem.com', 'ZCU', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 3, 'Second autor', 'secondAutor@konferencnisystem.com', 'ZCU', 'secondAutor', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 3, 'Third autor', 'thirdAutor@konferencnisystem.com', 'ZCU', 'thirdAutor', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 2, 'Second recenzent', 'secondRecenzent@konferencnisystem.com', 'ZCU', 'secondRecenzent', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 2, 'Thirdrecenzent', 'thirdRecenzent@konferencnisystem.com', 'ZCU', 'thirdRecenzent', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 3, 'Author von Recenzent', 'autrec@konferencnisystem.com', 'ZCU', 'autrec', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
