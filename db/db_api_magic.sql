-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2020 às 20:04
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_api_magic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2020_11_17_214102_create_staff_types_table', 1),
(51, '2020_11_17_220522_staff_members_table', 1),
(52, '2020_11_17_223133_create_movie_categories_table', 1),
(53, '2020_11_17_223328_create_movies_table', 1),
(54, '2020_11_17_225611_movie_staff_relations_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `movie_category_id` int(10) UNSIGNED NOT NULL,
  `movie_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_category_id`, `movie_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dragnet', '2020-05-20 03:00:00', '2019-12-13 03:00:00'),
(2, 2, 'Jellyfish (Meduzot)', '2020-03-09 03:00:00', '2020-01-16 03:00:00'),
(3, 3, 'New Country, The (Det nya landet)', '2020-06-10 03:00:00', '2020-11-06 03:00:00'),
(4, 4, 'Invasion of the Bee Girls', '2020-01-02 03:00:00', '2019-11-23 03:00:00'),
(5, 5, 'Letter, The', '2019-12-24 03:00:00', '2020-08-18 03:00:00'),
(6, 6, 'Kiki', '2020-04-03 03:00:00', '2020-01-29 03:00:00'),
(7, 7, 'Cave, The', '2020-08-24 03:00:00', '2020-10-09 03:00:00'),
(8, 8, 'Ornamental Hairpin (Kanzashi)', '2020-08-15 03:00:00', '2019-11-30 03:00:00'),
(9, 9, 'Fahrenhype 9/11', '2020-10-25 03:00:00', '2020-08-20 03:00:00'),
(10, 10, 'Bittersweet Life, A (Dalkomhan insaeng)', '2019-12-29 03:00:00', '2019-12-12 03:00:00'),
(11, 1, 'Besieged (a.k.a. L\' Assedio)', '2020-08-29 03:00:00', '2020-02-25 03:00:00'),
(12, 2, 'Brothers Rico, The', '2019-12-23 03:00:00', '2019-11-26 03:00:00'),
(13, 3, 'Almanya - Welcome to Germany (Almanya - Willkommen in Deutschland)', '2020-01-17 03:00:00', '2020-03-13 03:00:00'),
(14, 4, 'Blue Collar Comedy Tour: The Movie', '2020-02-02 03:00:00', '2020-09-24 03:00:00'),
(15, 5, 'Dragonphoenix Chronicles: Indomitable, The', '2020-03-16 03:00:00', '2020-07-17 03:00:00'),
(16, 6, '102 Minutes That Changed America', '2020-04-10 03:00:00', '2020-06-24 03:00:00'),
(17, 7, 'Dogfight', '2019-12-26 03:00:00', '2020-10-16 03:00:00'),
(18, 8, 'City in the Sea', '2020-05-03 03:00:00', '2020-05-18 03:00:00'),
(19, 9, 'Season For Assassins', '2020-10-07 03:00:00', '2020-03-06 03:00:00'),
(20, 10, 'Last of the Mohicans, The', '2019-12-02 03:00:00', '2020-06-18 03:00:00'),
(21, 1, 'Revenge of the Pink Panther', '2020-11-11 03:00:00', '2020-06-08 03:00:00'),
(22, 2, 'ChubbChubbs!, The', '2020-04-19 03:00:00', '2020-09-06 03:00:00'),
(23, 3, 'The Red Inn', '2020-06-19 03:00:00', '2020-06-11 03:00:00'),
(24, 4, 'A Night at the Movies: The Horrors of Stephen King', '2020-07-20 03:00:00', '2020-06-26 03:00:00'),
(25, 5, 'Shape of Things to Come, The', '2020-06-01 03:00:00', '2020-02-20 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movie_categories`
--

CREATE TABLE `movie_categories` (
  `movie_category_id` int(10) UNSIGNED NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movie_categories`
--

INSERT INTO `movie_categories` (`movie_category_id`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'Drama', '2020-03-17 03:00:00', '2020-10-20 03:00:00'),
(2, 'Comedia', '2020-01-22 03:00:00', '2020-08-18 03:00:00'),
(3, 'Documentário', '2020-09-10 03:00:00', '2019-11-22 03:00:00'),
(4, 'Sci-Fi', '2020-02-28 03:00:00', '2019-12-22 03:00:00'),
(5, 'Ação', '2020-01-14 03:00:00', '2020-03-14 03:00:00'),
(6, 'Romance', '2020-07-10 03:00:00', '2020-04-06 03:00:00'),
(7, 'Animação', '2020-04-13 03:00:00', '2020-02-19 03:00:00'),
(8, 'Aventura', '2020-08-12 03:00:00', '2020-07-19 03:00:00'),
(9, 'Fantasia', '2020-09-17 03:00:00', '2020-01-18 03:00:00'),
(10, 'Guerra', '2020-09-04 03:00:00', '2020-05-15 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movie_staff_relations`
--

CREATE TABLE `movie_staff_relations` (
  `movie_staff_relation_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `staff_member_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movie_staff_relations`
--

INSERT INTO `movie_staff_relations` (`movie_staff_relation_id`, `movie_id`, `staff_member_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-08-12 03:00:00', '2020-04-13 03:00:00'),
(2, 2, 2, '2020-06-21 03:00:00', '2020-05-23 03:00:00'),
(3, 3, 3, '2020-09-01 03:00:00', '2019-12-25 03:00:00'),
(4, 4, 4, '2020-02-15 03:00:00', '2020-01-09 03:00:00'),
(5, 5, 5, '2020-01-04 03:00:00', '2020-06-18 03:00:00'),
(6, 6, 6, '2019-12-13 03:00:00', '2020-02-09 03:00:00'),
(7, 7, 7, '2020-07-04 03:00:00', '2019-12-15 03:00:00'),
(8, 8, 8, '2020-10-03 03:00:00', '2020-07-22 03:00:00'),
(9, 9, 9, '2020-06-05 03:00:00', '2020-01-28 03:00:00'),
(10, 10, 10, '2020-04-20 03:00:00', '2020-04-15 03:00:00'),
(11, 11, 11, '2020-03-06 03:00:00', '2020-04-20 03:00:00'),
(12, 12, 12, '2020-09-05 03:00:00', '2020-10-31 03:00:00'),
(13, 13, 13, '2020-09-11 03:00:00', '2019-11-22 03:00:00'),
(14, 14, 14, '2020-02-19 03:00:00', '2020-09-10 03:00:00'),
(15, 15, 15, '2020-10-03 03:00:00', '2020-07-27 03:00:00'),
(16, 16, 16, '2020-01-20 03:00:00', '2020-02-03 03:00:00'),
(17, 17, 17, '2020-09-28 03:00:00', '2019-11-27 03:00:00'),
(18, 18, 18, '2020-04-10 03:00:00', '2020-02-20 03:00:00'),
(19, 19, 19, '2020-05-12 03:00:00', '2020-03-13 03:00:00'),
(20, 20, 20, '2020-10-22 03:00:00', '2020-02-20 03:00:00'),
(21, 21, 21, '2020-09-21 03:00:00', '2020-09-18 03:00:00'),
(22, 22, 22, '2020-05-18 03:00:00', '2020-07-28 03:00:00'),
(23, 23, 23, '2020-02-04 03:00:00', '2020-04-13 03:00:00'),
(24, 24, 24, '2020-06-17 03:00:00', '2020-05-07 03:00:00'),
(25, 25, 25, '2019-12-17 03:00:00', '2020-02-11 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `staff_members`
--

CREATE TABLE `staff_members` (
  `staff_member_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `staff_members`
--

INSERT INTO `staff_members` (`staff_member_id`, `first_name`, `last_name`, `email`, `staff_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Mace', 'Beteriss', 'mbeteriss0@altervista.org', 1, '2020-02-02 03:00:00', '2020-01-06 03:00:00'),
(2, 'Rozella', 'Friary', 'rfriary1@uol.com.br', 2, '2020-10-04 03:00:00', '2020-03-29 03:00:00'),
(3, 'Joseph', 'Steers', 'jsteers2@deliciousdays.com', 1, '2020-05-23 03:00:00', '2020-01-30 03:00:00'),
(4, 'Berton', 'Tilzey', 'btilzey3@java.com', 2, '2020-05-23 03:00:00', '2020-06-22 03:00:00'),
(5, 'Dorey', 'Selvester', 'dselvester4@fastcompany.com', 1, '2020-05-11 03:00:00', '2020-06-22 03:00:00'),
(6, 'Hamid', 'Inold', 'hinold5@digg.com', 2, '2020-10-27 03:00:00', '2020-04-19 03:00:00'),
(7, 'Amaleta', 'Lamborne', 'alamborne6@t.co', 1, '2020-10-22 03:00:00', '2020-01-02 03:00:00'),
(8, 'Enrika', 'Pendrill', 'ependrill7@cisco.com', 2, '2020-01-31 03:00:00', '2020-09-25 03:00:00'),
(9, 'Terese', 'MacLaverty', 'tmaclaverty8@ucsd.edu', 1, '2020-08-26 03:00:00', '2020-08-24 03:00:00'),
(10, 'Shirline', 'Champerlen', 'schamperlen9@imageshack.us', 2, '2020-06-30 03:00:00', '2020-02-01 03:00:00'),
(11, 'Fee', 'Wisby', 'fwisbya@cargocollective.com', 1, '2020-07-21 03:00:00', '2020-11-06 03:00:00'),
(12, 'Maisie', 'Astie', 'mastieb@narod.ru', 2, '2019-11-30 03:00:00', '2020-07-15 03:00:00'),
(13, 'Renae', 'Oury', 'rouryc@skype.com', 1, '2020-10-21 03:00:00', '2020-08-01 03:00:00'),
(14, 'Herb', 'Scorrer', 'hscorrerd@livejournal.com', 2, '2020-09-12 03:00:00', '2020-01-26 03:00:00'),
(15, 'Velma', 'Gawke', 'vgawkee@craigslist.org', 1, '2020-10-31 03:00:00', '2020-04-06 03:00:00'),
(16, 'Gage', 'Darrigoe', 'gdarrigoef@unblog.fr', 2, '2020-05-22 03:00:00', '2020-11-09 03:00:00'),
(17, 'Bram', 'Figliovanni', 'bfigliovannig@storify.com', 1, '2020-11-03 03:00:00', '2020-07-25 03:00:00'),
(18, 'Aristotle', 'Shipsey', 'ashipseyh@hibu.com', 2, '2019-12-13 03:00:00', '2020-03-25 03:00:00'),
(19, 'Leoine', 'Burdin', 'lburdini@php.net', 1, '2020-05-28 03:00:00', '2020-03-21 03:00:00'),
(20, 'Peyter', 'Denley', 'pdenleyj@nasa.gov', 2, '2020-05-12 03:00:00', '2020-08-26 03:00:00'),
(21, 'Charlie', 'Deackes', 'cdeackesk@usnews.com', 1, '2019-12-31 03:00:00', '2020-06-27 03:00:00'),
(22, 'Tiphany', 'Filov', 'tfilovl@reference.com', 2, '2020-07-15 03:00:00', '2020-05-16 03:00:00'),
(23, 'Alice', 'Charette', 'acharettem@answers.com', 1, '2019-12-21 03:00:00', '2019-11-24 03:00:00'),
(24, 'Dagny', 'Gilfoy', 'dgilfoyn@uiuc.edu', 2, '2020-03-12 03:00:00', '2020-10-29 03:00:00'),
(25, 'Ilene', 'Castelletto', 'icastellettoo@livejournal.com', 1, '2020-01-30 03:00:00', '2020-02-10 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `staff_types`
--

CREATE TABLE `staff_types` (
  `staff_type_id` int(10) UNSIGNED NOT NULL,
  `staff_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `staff_types`
--

INSERT INTO `staff_types` (`staff_type_id`, `staff_description`, `created_at`, `updated_at`) VALUES
(1, 'Ator', '2020-11-18 18:27:31', '2020-11-18 18:27:31'),
(2, 'Diretor', '2020-11-18 18:27:23', '2020-11-18 18:27:23');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `movies_movie_category_id_foreign` (`movie_category_id`);

--
-- Índices para tabela `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD PRIMARY KEY (`movie_category_id`);

--
-- Índices para tabela `movie_staff_relations`
--
ALTER TABLE `movie_staff_relations`
  ADD PRIMARY KEY (`movie_staff_relation_id`),
  ADD KEY `movie_staff_relations_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_staff_relations_staff_member_id_foreign` (`staff_member_id`);

--
-- Índices para tabela `staff_members`
--
ALTER TABLE `staff_members`
  ADD PRIMARY KEY (`staff_member_id`),
  ADD KEY `staff_members_staff_type_id_foreign` (`staff_type_id`);

--
-- Índices para tabela `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `movie_categories`
--
ALTER TABLE `movie_categories`
  MODIFY `movie_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `movie_staff_relations`
--
ALTER TABLE `movie_staff_relations`
  MODIFY `movie_staff_relation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `staff_members`
--
ALTER TABLE `staff_members`
  MODIFY `staff_member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `staff_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_movie_category_id_foreign` FOREIGN KEY (`movie_category_id`) REFERENCES `movie_categories` (`movie_category_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `movie_staff_relations`
--
ALTER TABLE `movie_staff_relations`
  ADD CONSTRAINT `movie_staff_relations_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_staff_relations_staff_member_id_foreign` FOREIGN KEY (`staff_member_id`) REFERENCES `staff_members` (`staff_member_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `staff_members`
--
ALTER TABLE `staff_members`
  ADD CONSTRAINT `staff_members_staff_type_id_foreign` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_types` (`staff_type_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
