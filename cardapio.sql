-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Abr-2023 às 04:13
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cardapio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_categoria` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome_categoria`, `descricao_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Pastel', 'Diversos tipos', '2022-08-01 03:09:34', '2022-08-01 05:31:35'),
(2, 'Pizza', 'Diversos tipos', '2022-08-01 04:43:00', '2022-08-01 05:30:40'),
(3, 'Carne', 'Diversos tipos', '2022-08-01 05:31:04', '2022-08-01 05:31:20'),
(4, 'Marmita', 'Diversos tipos', '2022-08-01 05:32:03', '2022-08-01 05:32:03'),
(5, 'Lanches', 'Diversos tipos', '2022-08-01 05:32:13', '2022-08-01 05:32:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2022_07_27_022444_create_table_usuarios', 1),
(20, '2022_07_27_234556_create_table_categorias', 1),
(21, '2022_07_27_235143_create_table_produtos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_produto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacao` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome_produto`, `preco`, `foto`, `descricao_produto`, `situacao`, `categoria_id`, `created_at`, `updated_at`) VALUES
(4, 'HANCHO POLENTA G', '50,00', 'e9d21972a151cc02e713da1755c0a517.webp', 'Porção de polenta artesanal da casa.', '1', 3, '2022-08-01 05:35:30', '2022-08-01 05:35:30'),
(5, 'BOLINHOS DE CARNE JAPONÊS', '25,00', '7e45f3066459916c143cf26da6a77794.webp', 'Deliciosa porção de bolinhos de carne japonês com tempero da casa.', '1', 3, '2022-08-01 05:37:04', '2022-08-01 05:37:04'),
(6, '100 SALGADOS ( 18 A 20 GRAMAS)', '55,00', '69cb012b31e23183624523cf5ad8b1f3.webp', 'Carne, queijo, risoles,coxinha,kibe, calabresa,Salsicha.', '1', 5, '2022-08-01 05:39:13', '2023-03-18 16:20:26'),
(7, '25 KIBE (18 A 20 GR)', '30,00', '8c6bd156d439c944909351b77d94193e.webp', 'Kibes com ingredientes Selecionados.', '1', 5, '2022-08-01 05:40:28', '2022-08-01 05:40:28'),
(8, 'FILÉ DE TILÁPIA', '25,00', '7aae65e0ac317e3856b65a4bb2e593e4.webp', 'Marmitex Médio: Arroz, Feijão, Macarrão Alho e Óleo, Farofa, Couve Refogada, Batata Frita e salada.', '1', 4, '2022-08-01 05:42:08', '2022-08-01 05:42:08'),
(9, 'ARROZ INTEGRAL DE FORNO', '20,00', '6c6488d3517088213547496ff64434d0.webp', 'Arroz integral com patinho moído.', '1', 4, '2022-08-01 05:45:29', '2022-08-01 05:45:29'),
(10, 'PASTEL DE FRANGO', '8,00', '3700145477cf3fb05c6625b51dd11fe6.webp', 'Delicioso pastel de Frango desfiado.', '1', 1, '2022-08-01 05:46:40', '2022-08-01 05:46:40'),
(11, 'QUEIJO', '15,00', '8cf9d5c6128fcaab31c37a73a4ceff16.webp', 'Mussarela.', '1', 1, '2022-08-01 05:47:31', '2022-08-01 05:47:31'),
(12, 'PIZZA CALABRESA', '40,00', 'e21ec8a8a7ac8f3f73dde3592f852731.webp', 'Calabresa fatiada, cebola e orégano.', '1', 2, '2022-08-01 05:50:02', '2022-08-01 05:50:02'),
(13, 'PIZZA MUSSARELA', '40,00', 'a4d68fede3400c8b193f9c44e29bb9bc.webp', 'Mussarela tradição, tomate e orégano.', '1', 2, '2022-08-01 05:50:50', '2022-08-01 05:50:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$KQ.zvtLa4wk4EaUjkQs6B.297qam6diLf3j0MQnwzFoNpJKin9ovC', '2022-08-01 02:40:49', '2022-08-01 02:40:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
