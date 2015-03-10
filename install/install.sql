SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `scriptum`
--

DROP TABLE IF EXISTS `scriptum`;
CREATE TABLE IF NOT EXISTS `scriptum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onelife` tinyint(1) NOT NULL DEFAULT '0',
  `publication` timestamp NOT NULL,
  `destruction` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
