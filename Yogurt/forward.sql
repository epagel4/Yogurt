

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
  

-- Database: `forward`
--
CREATE DATABASE IF NOT EXISTS `forward` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forward`;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_post`, `id_user`, `comentario`, `data`) VALUES
(1, 91, 2, 'Seu vacilao', '2018-09-23 20:21:42'),
(3, 91, 1, 'hue', '2018-09-23 20:36:31'),
(5, 91, 1, 'fodase', '2018-09-23 20:45:03'),
(6, 91, 1, 'ggggg', '2018-09-23 21:06:27'),
(7, 89, 1, 'oi linda', '2018-09-23 21:07:12'),
(8, 92, 1, 'aeuhaeuh', '2018-09-26 00:22:37'),
(9, 93, 15, 'teste', '2018-09-26 02:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `legenda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `id_user`, `nome`, `legenda`) VALUES
(35, 6, 'galeria6-1536703669', 'porrraaaaaaa'),
(36, 6, 'galeria6-1536703675', 'asdfasdf'),
(37, 6, 'galeria6-1536703683', 'asdfadsf'),
(39, 1, 'galeria1-1536711063', '1'),
(41, 1, 'galeria1-1536711198', '2'),
(43, 5, 'galeria5-1536877006', 'aaa'),
(44, 5, 'galeria5-1536877024', 'janela'),
(45, 5, 'galeria5-1537220891', 'eu lindo');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `post` varchar(140) NOT NULL,
  `nome_user` varchar(255) NOT NULL,
  `login_user` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `post`, `nome_user`, `login_user`, `data`, `profile_user`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `relacao`
--

DROP TABLE IF EXISTS `relacao`;
CREATE TABLE `relacao` (
  `id` int(11) NOT NULL,
  `id_segue` int(11) NOT NULL,
  `id_seguido` int(11) NOT NULL,
  `aut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relacao`
--

INSERT INTO `relacao` (`id`, `id_segue`, `id_seguido`, `aut`) VALUES
(14, 1, 2, '1'),
(22, 13, 5, '1'),
(24, 1, 9, '1'),
(27, 13, 1, '1'),
(30, 13, 11, '1'),
(31, 13, 6, '1'),
(32, 13, 9, '1'),
(35, 1, 5, '1'),
(38, 11, 2, '1'),
(39, 11, 1, '1'),
(40, 11, 10, '1'),
(41, 11, 13, '1'),
(42, 1, 13, '1'),
(43, 15, 14, '1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `profile` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relacao`
--
ALTER TABLE `relacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `relacao`
--
ALTER TABLE `relacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
