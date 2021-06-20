-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 06:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waltonfilemangerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'T68BPryYAjzznhGAxqXqrc1a8liOQPwQ', 1, '2021-06-20 03:42:43', '2021-06-19 21:42:43', '2021-06-19 21:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:43:05\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:43:05\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:43:05\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:43:05\",\"full_name\":\"Niloy Saha\"}}', '2021-06-19 21:43:05', '2021-06-19 21:43:05'),
(2, 'file', 'created', 1, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"21-feb-2.jpg\",\"path\":\"http:\\/\\/file-manager-v1.diconlogy.com\\/storage\\/Files\\/main\\/eT4tbFADZfPDOjz0LtrpWUjg6JS3xH8fNoFon5Np.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":286843,\"updated_at\":\"2021-06-20 03:45:10\",\"created_at\":\"2021-06-20 03:45:10\",\"id\":1},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:43:05\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:43:05\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-19 21:45:10', '2021-06-19 21:45:10'),
(3, 'folder', 'created', 2, 'Modules\\Folder\\Entities\\Folder', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"name\":\"Niloy\",\"is_active\":true,\"parent_id\":\"1\",\"slug\":\"niloy\",\"updated_at\":\"2021-06-20 03:46:09\",\"created_at\":\"2021-06-20 03:46:09\",\"id\":2},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:43:05\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:43:05\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-19 21:46:09', '2021-06-19 21:46:09'),
(4, 'file', 'created', 2, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"21-feb-2.jpg\",\"path\":\"http:\\/\\/file-manager-v1.diconlogy.com\\/storage\\/Files\\/main\\/1KPTK1x1oWWZE8Kt9Zw9OqoCKBJgCE0MSYbe71Au.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":286843,\"updated_at\":\"2021-06-20 03:46:23\",\"created_at\":\"2021-06-20 03:46:23\",\"id\":2},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:43:05\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:43:05\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-19 21:46:23', '2021-06-19 21:46:23'),
(5, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:56:47\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:56:47\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:56:47\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:56:47\",\"full_name\":\"Niloy Saha\"}}', '2021-06-19 21:56:47', '2021-06-19 21:56:47'),
(6, 'file', 'created', 3, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"1.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/uLchFS9glGN0DV5kgnnHYRzatsR2dP2mawHLh6qL.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":33298,\"updated_at\":\"2021-06-20 03:57:06\",\"created_at\":\"2021-06-20 03:57:06\",\"id\":3},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 03:56:47\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:56:47\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-19 21:57:06', '2021-06-19 21:57:06'),
(7, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:50:14\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:50:14\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:50:14\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:50:14\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 02:50:14', '2021-06-20 02:50:14'),
(8, 'media', 'created', 1, 'Modules\\Media\\Entities\\Media', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"disk\":\"public_storage\",\"filename\":\"walton.png\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/media\\/TMEXH5VEaoa1gE5qnEyK7EETBKi7CtEtMIi8nUf8.png\",\"extension\":\"png\",\"mime\":\"image\\/png\",\"size\":2644,\"updated_at\":\"2021-06-20 08:51:05\",\"created_at\":\"2021-06-20 08:51:05\",\"id\":1},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:50:14\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:50:14\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 02:51:05', '2021-06-20 02:51:05'),
(9, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:50:14\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:50:14\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:50:14\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:50:14\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(10, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:57:22\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:57:22\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:57:22\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:57:22\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 02:57:22', '2021-06-20 02:57:22'),
(11, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:57:28\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:57:28\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:57:28\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:57:28\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 02:57:28', '2021-06-20 02:57:28'),
(12, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:57:43\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:57:43\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:57:43\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:57:43\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 02:57:43', '2021-06-20 02:57:43'),
(13, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:58:20\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:58:20\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:58:20\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:58:20\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 02:58:20', '2021-06-20 02:58:20'),
(14, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:58:36\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:58:36\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 08:58:36\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 08:58:36\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 02:58:36', '2021-06-20 02:58:36'),
(15, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 09:02:48\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 09:02:48\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 09:02:48\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 09:02:48\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 03:02:48', '2021-06-20 03:02:48'),
(16, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 12:53:35\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 12:53:35\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 12:53:35\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 12:53:35\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 06:53:35', '2021-06-20 06:53:35'),
(17, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 12:53:52\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 12:53:52\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 12:53:52\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 12:53:52\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 06:53:52', '2021-06-20 06:53:52'),
(18, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:01:29\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:01:29\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:01:29\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:01:29\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 07:01:29', '2021-06-20 07:01:29'),
(19, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:01:54\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:01:54\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:01:54\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:01:54\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 07:01:54', '2021-06-20 07:01:54'),
(20, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:02:18\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:02:18\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 07:02:18', '2021-06-20 07:02:18'),
(21, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:02:18\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:02:18\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:20:24', '2021-06-20 07:20:24'),
(22, 'media', 'created', 2, 'Modules\\Media\\Entities\\Media', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"disk\":\"public_storage\",\"filename\":\"A323I0528.png\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/media\\/xpztIg9RrSyIM1kYhnIdCE0E0mZciCacBZbH5qY5.png\",\"extension\":\"png\",\"mime\":\"image\\/png\",\"size\":7520455,\"updated_at\":\"2021-06-20 13:43:18\",\"created_at\":\"2021-06-20 13:43:18\",\"id\":2},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:02:18\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:43:18', '2021-06-20 07:43:18'),
(23, 'profile', 'updated', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 07:44:06', '2021-06-20 07:44:06'),
(24, 'file', 'deleted', 2, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":2,\"user_id\":1,\"folder_id\":1,\"filename\":\"21-feb-2.jpg\",\"description\":null,\"disk\":\"public_storage\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/1KPTK1x1oWWZE8Kt9Zw9OqoCKBJgCE0MSYbe71Au.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":\"286843\",\"download\":0,\"created_at\":\"2021-06-20 03:46:23\",\"updated_at\":\"2021-06-20 03:46:23\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:13', '2021-06-20 07:46:13'),
(25, 'file', 'deleted', 1, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"user_id\":1,\"folder_id\":2,\"filename\":\"21-feb-2.jpg\",\"description\":null,\"disk\":\"public_storage\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/Niloy\\/eT4tbFADZfPDOjz0LtrpWUjg6JS3xH8fNoFon5Np.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":\"286843\",\"download\":0,\"created_at\":\"2021-06-20 03:45:10\",\"updated_at\":\"2021-06-20 03:46:38\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:13', '2021-06-20 07:46:13'),
(26, 'file', 'created', 4, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"d0280d114267487.6037c97bd908e.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/UzPZWlpITCuVHALA96Z2WDHooGlVP01Kfo3YCUVK.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":77963,\"updated_at\":\"2021-06-20 13:46:25\",\"created_at\":\"2021-06-20 13:46:25\",\"id\":4},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:25', '2021-06-20 07:46:25'),
(27, 'file', 'created', 5, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"istockphoto-182370767-612x612.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/2MTYNc6FWx9sItgQ3ZIRE5e97TCYf7bh5JnX7Rj9.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":17341,\"updated_at\":\"2021-06-20 13:46:26\",\"created_at\":\"2021-06-20 13:46:26\",\"id\":5},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:26', '2021-06-20 07:46:26'),
(28, 'file', 'created', 6, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"istockphoto-859863336-612x612.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/yXzNLY24TdglBi24E5O2qv9kLOZt2n6q77q9HTdM.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":21213,\"updated_at\":\"2021-06-20 13:46:27\",\"created_at\":\"2021-06-20 13:46:27\",\"id\":6},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:27', '2021-06-20 07:46:27'),
(29, 'file', 'created', 7, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"product-furniture-8.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/BAtlPlpdrgsFdmrkm6uwmqtHJ1oXcNN6LhW1WfcX.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":28286,\"updated_at\":\"2021-06-20 13:46:28\",\"created_at\":\"2021-06-20 13:46:28\",\"id\":7},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:28', '2021-06-20 07:46:28'),
(30, 'file', 'created', 8, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"product-furniture-8-2.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/SEnYRKAbRDpVHXS935JudxblwuFIbOAyDVf5duiy.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":20708,\"updated_at\":\"2021-06-20 13:46:28\",\"created_at\":\"2021-06-20 13:46:28\",\"id\":8},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:28', '2021-06-20 07:46:28'),
(31, 'file', 'created', 9, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"product-furniture-8-3.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/46SvnOdYZYO0vpv81C80buMtFBWFFKp6ojax7HRW.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":18284,\"updated_at\":\"2021-06-20 13:46:29\",\"created_at\":\"2021-06-20 13:46:29\",\"id\":9},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:29', '2021-06-20 07:46:29'),
(32, 'file', 'created', 10, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"2.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/qKkG1wlmQmVCb3Lf116X8UCzWJcGZX3MBIEemSIM.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":48108,\"updated_at\":\"2021-06-20 13:46:52\",\"created_at\":\"2021-06-20 13:46:52\",\"id\":10},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:52', '2021-06-20 07:46:52'),
(33, 'file', 'created', 11, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"21-feb.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/ShKtkbtwaDVtw7xjCcyXx5PVwO9naCCexHgM1QgR.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":303374,\"updated_at\":\"2021-06-20 13:46:52\",\"created_at\":\"2021-06-20 13:46:52\",\"id\":11},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:52', '2021-06-20 07:46:52'),
(34, 'file', 'created', 12, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"21-feb-2.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/oAPxbPcdPe63gD2jY6vHd6OHWOStCX9Ax9gT2Fwj.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":286843,\"updated_at\":\"2021-06-20 13:46:53\",\"created_at\":\"2021-06-20 13:46:53\",\"id\":12},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:53', '2021-06-20 07:46:53');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(35, 'file', 'created', 13, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"3606158_Md Mustafizur Rahman (1).jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/BUUoYHs4Q8ReIQv1LCsQtbvKy7mcaJzAzYLhK3SA.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":23563,\"updated_at\":\"2021-06-20 13:46:54\",\"created_at\":\"2021-06-20 13:46:54\",\"id\":13},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:54', '2021-06-20 07:46:54'),
(36, 'file', 'created', 14, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"3620914_Md Mustafizur Rahman.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/8JbVoJyudcNxIyt1f5ZQezsWuQBrzUpSqjbloTBk.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":25661,\"updated_at\":\"2021-06-20 13:46:55\",\"created_at\":\"2021-06-20 13:46:55\",\"id\":14},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:55', '2021-06-20 07:46:55'),
(37, 'file', 'created', 15, 'Modules\\Files\\Entities\\Files', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"user_id\":1,\"folder_id\":\"1\",\"disk\":\"public_storage\",\"filename\":\"christmas_lamp_187448.jpg\",\"path\":\"http:\\/\\/localhost\\/filemanager-walton\\/public\\/storage\\/Files\\/main\\/tuiUsnhwaZlioTWKMNknGO56CoFy6jiE4dmzdSEY.jpeg\",\"extension\":\"jpeg\",\"mime\":\"image\\/jpeg\",\"size\":46395,\"updated_at\":\"2021-06-20 13:46:55\",\"created_at\":\"2021-06-20 13:46:55\",\"id\":15},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:46:55', '2021-06-20 07:46:55'),
(38, 'folder', 'created', 3, 'Modules\\Folder\\Entities\\Folder', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"name\":\"new-root\",\"slug\":\"new-root\",\"assign_toall\":true,\"is_active\":true,\"public_download\":false,\"updated_at\":\"2021-06-20 13:55:05\",\"created_at\":\"2021-06-20 13:55:05\",\"id\":3},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:55:05', '2021-06-20 07:55:05'),
(39, 'folder', 'created', 4, 'Modules\\Folder\\Entities\\Folder', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"name\":\"test\",\"slug\":\"test\",\"assign_toall\":true,\"is_active\":true,\"public_download\":false,\"parent_id\":\"3\",\"updated_at\":\"2021-06-20 13:55:51\",\"created_at\":\"2021-06-20 13:55:51\",\"id\":4},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 07:55:51', '2021-06-20 07:55:51'),
(40, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 08:23:32', '2021-06-20 08:23:32'),
(41, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 08:23:43', '2021-06-20 08:23:43'),
(42, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 08:26:54', '2021-06-20 08:26:54'),
(43, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":true,\"admin.translations.edit\":true,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 08:27:43', '2021-06-20 08:27:43'),
(44, 'setting', 'updated', NULL, NULL, 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":false,\"admin.translations.edit\":false,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":false,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 13:02:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 13:44:06\",\"full_name\":\"Niloy Saha\",\"roles\":[{\"id\":1,\"slug\":\"admin\",\"name\":\"Admin\",\"permissions\":{\"admin.users.index\":true,\"admin.users.create\":true,\"admin.users.edit\":true,\"admin.users.destroy\":true,\"admin.roles.index\":true,\"admin.roles.create\":true,\"admin.roles.edit\":true,\"admin.roles.destroy\":true,\"admin.translations.index\":false,\"admin.translations.edit\":false,\"admin.settings.edit\":true,\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.files-extension.index\":true,\"admin.files-extension.create\":true,\"admin.files-extension.destroy\":true,\"admin.folders.index\":true,\"admin.folders.create\":true,\"admin.folders.edit\":true,\"admin.folders.destroy\":true,\"admin.activity.index\":false,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true},\"created_at\":\"2021-06-20 03:42:42\",\"updated_at\":\"2021-06-20 03:42:42\",\"pivot\":{\"user_id\":1,\"role_id\":1,\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 03:42:43\"}}]}}', '2021-06-20 09:54:11', '2021-06-20 09:54:11'),
(45, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:04:43\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:04:43\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:04:43\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:04:43\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 10:04:43', '2021-06-20 10:04:43'),
(46, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:05:04\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:05:04\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:05:04\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:05:04\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 10:05:04', '2021-06-20 10:05:04'),
(47, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:06:45\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:06:45\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:06:45\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:06:45\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 10:06:45', '2021-06-20 10:06:45'),
(48, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:07:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:07:18\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:07:18\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:07:18\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 10:07:18', '2021-06-20 10:07:18'),
(49, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:08:08\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:08:08\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:08:08\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:08:08\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 10:08:08', '2021-06-20 10:08:08'),
(50, 'user', 'login', 1, 'Modules\\User\\Entities\\User', 1, 'Modules\\User\\Entities\\User', '{\"subject\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:08:33\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:08:33\",\"full_name\":\"Niloy Saha\"},\"causer\":{\"id\":1,\"first_name\":\"Niloy\",\"last_name\":\"Saha\",\"email\":\"admin@example.com\",\"permissions\":[],\"file_size\":null,\"last_login\":\"2021-06-20 16:08:33\",\"created_at\":\"2021-06-20 03:42:43\",\"updated_at\":\"2021-06-20 16:08:33\",\"full_name\":\"Niloy Saha\"}}', '2021-06-20 10:08:33', '2021-06-20 10:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `entity_media`
--

CREATE TABLE `entity_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entity_media`
--

INSERT INTO `entity_media` (`id`, `media_id`, `entity_type`, `entity_id`, `zone`, `created_at`, `updated_at`) VALUES
(1, 2, 'Modules\\User\\Entities\\User', 1, 'profile_image', '2021-06-20 07:44:06', '2021-06-20 07:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `folder_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `folder_id`, `filename`, `description`, `disk`, `path`, `extension`, `mime`, `size`, `download`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'istockphoto-182370767-612x612.jpg', NULL, 'public_storage', 'Files/main/Niloy/2MTYNc6FWx9sItgQ3ZIRE5e97TCYf7bh5JnX7Rj9.jpeg', 'jpeg', 'image/jpeg', '17341', 0, '2021-06-20 07:46:26', '2021-06-20 07:47:19'),
(4, 1, 2, 'd0280d114267487.6037c97bd908e.jpg', NULL, 'public_storage', 'Files/main/Niloy/UzPZWlpITCuVHALA96Z2WDHooGlVP01Kfo3YCUVK.jpeg', 'jpeg', 'image/jpeg', '77963', 0, '2021-06-20 07:46:25', '2021-06-20 07:47:19'),
(3, 1, 2, '1.jpg', NULL, 'public_storage', 'Files/main/Niloy/uLchFS9glGN0DV5kgnnHYRzatsR2dP2mawHLh6qL.jpeg', 'jpeg', 'image/jpeg', '33298', 0, '2021-06-19 21:57:06', '2021-06-20 07:47:19'),
(6, 1, 1, 'istockphoto-859863336-612x612.jpg', NULL, 'public_storage', 'Files/main/yXzNLY24TdglBi24E5O2qv9kLOZt2n6q77q9HTdM.jpeg', 'jpeg', 'image/jpeg', '21213', 0, '2021-06-20 07:46:27', '2021-06-20 07:46:27'),
(7, 1, 1, 'product-furniture-8.jpg', NULL, 'public_storage', 'Files/main/BAtlPlpdrgsFdmrkm6uwmqtHJ1oXcNN6LhW1WfcX.jpeg', 'jpeg', 'image/jpeg', '28286', 0, '2021-06-20 07:46:28', '2021-06-20 07:46:28'),
(8, 1, 1, 'product-furniture-8-2.jpg', NULL, 'public_storage', 'Files/main/SEnYRKAbRDpVHXS935JudxblwuFIbOAyDVf5duiy.jpeg', 'jpeg', 'image/jpeg', '20708', 0, '2021-06-20 07:46:28', '2021-06-20 07:46:28'),
(9, 1, 1, 'product-furniture-8-3.jpg', NULL, 'public_storage', 'Files/main/46SvnOdYZYO0vpv81C80buMtFBWFFKp6ojax7HRW.jpeg', 'jpeg', 'image/jpeg', '18284', 0, '2021-06-20 07:46:29', '2021-06-20 07:46:29'),
(10, 1, 1, '2.jpg', NULL, 'public_storage', 'Files/main/qKkG1wlmQmVCb3Lf116X8UCzWJcGZX3MBIEemSIM.jpeg', 'jpeg', 'image/jpeg', '48108', 0, '2021-06-20 07:46:52', '2021-06-20 07:46:52'),
(11, 1, 1, '21-feb.jpg', NULL, 'public_storage', 'Files/main/ShKtkbtwaDVtw7xjCcyXx5PVwO9naCCexHgM1QgR.jpeg', 'jpeg', 'image/jpeg', '303374', 0, '2021-06-20 07:46:52', '2021-06-20 07:46:52'),
(12, 1, 1, '21-feb-2.jpg', NULL, 'public_storage', 'Files/main/oAPxbPcdPe63gD2jY6vHd6OHWOStCX9Ax9gT2Fwj.jpeg', 'jpeg', 'image/jpeg', '286843', 0, '2021-06-20 07:46:53', '2021-06-20 07:46:53'),
(13, 1, 1, '3606158_Md Mustafizur Rahman (1).jpg', NULL, 'public_storage', 'Files/main/BUUoYHs4Q8ReIQv1LCsQtbvKy7mcaJzAzYLhK3SA.jpeg', 'jpeg', 'image/jpeg', '23563', 0, '2021-06-20 07:46:54', '2021-06-20 07:46:54'),
(14, 1, 1, '3620914_Md Mustafizur Rahman.jpg', NULL, 'public_storage', 'Files/main/8JbVoJyudcNxIyt1f5ZQezsWuQBrzUpSqjbloTBk.jpeg', 'jpeg', 'image/jpeg', '25661', 0, '2021-06-20 07:46:55', '2021-06-20 07:46:55'),
(15, 1, 1, 'christmas_lamp_187448.jpg', NULL, 'public_storage', 'Files/main/tuiUsnhwaZlioTWKMNknGO56CoFy6jiE4dmzdSEY.jpeg', 'jpeg', 'image/jpeg', '46395', 0, '2021-06-20 07:46:55', '2021-06-20 07:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `files_shares`
--

CREATE TABLE `files_shares` (
  `id` int(10) UNSIGNED NOT NULL,
  `share_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pwd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_extensions`
--

CREATE TABLE `file_extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_toall` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_extensions`
--

INSERT INTO `file_extensions` (`id`, `name`, `assign_toall`, `created_at`, `updated_at`) VALUES
(1, 'jpeg', 1, NULL, NULL),
(2, 'jpg', 1, NULL, NULL),
(3, 'png', 1, NULL, NULL),
(4, 'pdf', 1, NULL, NULL),
(5, 'mp4', 1, NULL, NULL),
(6, 'docx', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED DEFAULT NULL,
  `assign_toall` tinyint(1) NOT NULL DEFAULT 0,
  `public_download` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `parent_id`, `name`, `slug`, `position`, `assign_toall`, `public_download`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'main', 'main', NULL, 1, 0, 1, NULL, NULL),
(2, 1, 'Niloy', 'niloy', NULL, 0, 0, 1, '2021-06-19 21:46:09', '2021-06-19 21:46:09'),
(3, NULL, 'new-root', 'new-root', NULL, 1, 0, 1, '2021-06-20 07:55:05', '2021-06-20 07:55:05'),
(4, 3, 'test', 'test', NULL, 1, 0, 1, '2021-06-20 07:55:51', '2021-06-20 07:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `filename`, `disk`, `path`, `extension`, `mime`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 'walton.png', 'public_storage', 'media/TMEXH5VEaoa1gE5qnEyK7EETBKi7CtEtMIi8nUf8.png', 'png', 'image/png', '2644', '2021-06-20 02:51:05', '2021-06-20 02:51:05'),
(2, 1, 'A323I0528.png', 'public_storage', 'media/xpztIg9RrSyIM1kYhnIdCE0E0mZciCacBZbH5qY5.png', 'png', 'image/png', '7520455', '2021-06-20 07:43:18', '2021-06-20 07:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_30_061505_create_settings_table', 1),
(2, '2019_08_30_061712_create_setting_translations_table', 1),
(3, '2019_08_30_102225_create_translations_table', 1),
(4, '2019_08_30_102429_create_translation_translations_table', 1),
(5, '2019_09_17_083103_migration_cartalyst_sentinel', 1),
(6, '2019_09_24_054528_create_activity_log_table', 1),
(7, '2019_09_24_104134_create_files_table', 1),
(8, '2019_09_24_104134_create_media_table', 1),
(9, '2019_09_25_051244_create_file_extensions_table', 1),
(10, '2019_09_25_083103_create_folders_table', 1),
(11, '2019_09_25_092538_add_fields_to_users_table', 1),
(12, '2019_09_25_100246_create_user_file_extensions_table', 1),
(13, '2019_09_25_104114_create_user_folders_table', 1),
(14, '2019_09_25_104134_create_entity_media_table', 1),
(15, '2019_11_07_060857_create_files_shares_table', 1),
(16, '2019_12_19_100519_add_description_fields_to_files_table', 1),
(17, '2019_12_19_100919_add_folder_id_fields_to_files_table', 1),
(18, '2020_04_08_054823_add_public_download_to_folders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 1, 'u8ESGSV9QalxjdbB5MlcivKplYEetPbd', '2021-06-19 21:56:47', '2021-06-19 21:56:47'),
(20, 1, 'e8vLFXOVIFLE72mZ7f42eKxAOlcdAt1C', '2021-06-20 10:08:33', '2021-06-20 10:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\r\n   \"admin.users.index\":true,\r\n   \"admin.users.create\":true,\r\n   \"admin.users.edit\":true,\r\n   \"admin.users.destroy\":true,\r\n   \"admin.roles.index\":true,\r\n   \"admin.roles.create\":true,\r\n   \"admin.roles.edit\":true,\r\n   \"admin.roles.destroy\":true,\r\n   \"admin.translations.index\":false,\r\n   \"admin.translations.edit\":false,\r\n   \"admin.settings.edit\":true,\r\n   \"admin.files.manager\":true,\r\n   \"admin.files.index\":true,\r\n   \"admin.files.create\":true,\r\n   \"admin.files.edit\":true,\r\n   \"admin.files.destroy\":true,\r\n   \"admin.files-extension.index\":true,\r\n   \"admin.files-extension.create\":true,\r\n   \"admin.files-extension.destroy\":true,\r\n   \"admin.folders.index\":true,\r\n   \"admin.folders.create\":true,\r\n   \"admin.folders.edit\":true,\r\n   \"admin.folders.destroy\":true,\r\n   \"admin.activity.index\":false,\r\n   \"admin.media.index\":true,\r\n   \"admin.media.create\":true,\r\n   \"admin.media.destroy\":true\r\n}', '2021-06-19 21:42:42', '2021-06-19 21:42:42'),
(2, 'user', 'User', '{\"admin.files.manager\":true,\"admin.files.index\":true,\"admin.files.create\":true,\"admin.files.edit\":true,\"admin.files.destroy\":true,\"admin.activity.index\":true,\"admin.folders.create\":true,\"admin.media.index\":true,\"admin.media.create\":true,\"admin.media.destroy\":true}', '2021-06-19 21:42:43', '2021-06-19 21:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plainValue` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isTranslatable` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `plainValue`, `isTranslatable`, `created_at`, `updated_at`) VALUES
(1, 'site_name', NULL, 1, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(2, 'site_email', 's:21:\"niloysaha40@gmail.com\";', 0, '2021-06-19 21:42:43', '2021-06-20 08:23:43'),
(3, 'supported_locales', 'a:1:{i:0;s:2:\"en\";}', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(4, 'default_locale', 's:2:\"en\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(5, 'default_timezone', 's:3:\"UTC\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(6, 'user_role', 's:1:\"2\";', 0, '2021-06-19 21:42:43', '2021-06-20 02:51:14'),
(7, 'allow_registrations', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(8, 'enable_file_preview', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(9, 'enable_file_download', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(10, 'enable_file_move', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(11, 'enable_file_share', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(12, 'auto_approve_user', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(13, 'default_file_size', 's:3:\"150\";', 0, '2021-06-19 21:42:43', '2021-06-20 08:27:42'),
(14, 'auto_assign_folder_files', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(15, 'delete_assign_folder_files', 's:1:\"1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(16, 'theme_logo_header_color', 's:4:\"dark\";', 0, '2021-06-19 21:42:43', '2021-06-20 07:20:24'),
(17, 'theme_navbar_header_color', 's:4:\"dark\";', 0, '2021-06-19 21:42:43', '2021-06-20 07:20:24'),
(18, 'theme_sidebar_color', 's:5:\"white\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(19, 'theme_background_color', 's:3:\"bg1\";', 0, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(20, 'site_logo', 's:1:\"1\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(21, 'welcome_email', 's:1:\"0\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(22, 'email_from_address', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(23, 'email_from_name', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(24, 'email_host', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(25, 'email_port', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(26, 'email_username', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(27, 'email_password', 's:9:\"niloy1234\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(28, 'email_encryption', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(29, 'custom_css', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(36, 'enable_ad1', 's:1:\"0\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(37, 'ad_block_1', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(38, 'enable_ad2', 's:1:\"0\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(39, 'ad_block_2', 's:0:\"\";', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(40, 'googleanalyticscode', 'N;', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14'),
(41, 'custom_js', 'N;', 0, '2021-06-20 02:51:14', '2021-06-20 02:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`) VALUES
(1, 1, 'en', 's:19:\"Walton File Manager\";');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translation_translations`
--

CREATE TABLE `translation_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `translation_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permissions`, `file_size`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Niloy', 'Saha', 'admin@example.com', '$2y$10$VgtOUE3isp9keJRd/bR5tOAze6fDPFPnArMTBSkbn1kqUXAqY04ZS', NULL, NULL, '2021-06-20 16:08:33', '2021-06-19 21:42:43', '2021-06-20 10:08:33'),
(2, 'User', 'Saha', 'user@admin.com', '$2y$10$uftejXjQo/ZEPNWWUIs4beek4QSmTfQyFbGs40Lid3EvgfpSkBOkS', NULL, NULL, '2021-06-20 13:02:18', '2021-06-19 21:42:43', '2021-06-20 07:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_file_extensions`
--

CREATE TABLE `user_file_extensions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_extension_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_folders`
--

CREATE TABLE `user_folders` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `folder_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_folders`
--

INSERT INTO `user_folders` (`user_id`, `folder_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-06-19 21:42:43', '2021-06-19 21:42:43'),
(2, 2, '2021-06-19 21:42:43', '2021-06-19 21:42:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activations_user_id_index` (`user_id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `entity_media`
--
ALTER TABLE `entity_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entity_media_entity_type_entity_id_index` (`entity_type`,`entity_id`),
  ADD KEY `entity_media_media_id_index` (`media_id`),
  ADD KEY `entity_media_zone_index` (`zone`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_index` (`user_id`),
  ADD KEY `files_filename_index` (`filename`);

--
-- Indexes for table `files_shares`
--
ALTER TABLE `files_shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_shares_user_id_index` (`user_id`);

--
-- Indexes for table `file_extensions`
--
ALTER TABLE `file_extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folders_slug_unique` (`slug`),
  ADD KEY `folders_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_index` (`user_id`),
  ADD KEY `media_filename_index` (`filename`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`),
  ADD KEY `persistences_user_id_foreign` (`user_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_foreign` (`user_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_key_index` (`key`);

--
-- Indexes for table `translation_translations`
--
ALTER TABLE `translation_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translation_translations_translation_id_locale_unique` (`translation_id`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_file_extensions`
--
ALTER TABLE `user_file_extensions`
  ADD PRIMARY KEY (`user_id`,`file_extension_id`),
  ADD KEY `user_file_extensions_file_extension_id_foreign` (`file_extension_id`);

--
-- Indexes for table `user_folders`
--
ALTER TABLE `user_folders`
  ADD PRIMARY KEY (`user_id`,`folder_id`),
  ADD KEY `user_folders_folder_id_foreign` (`folder_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `entity_media`
--
ALTER TABLE `entity_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `files_shares`
--
ALTER TABLE `files_shares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_extensions`
--
ALTER TABLE `file_extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translation_translations`
--
ALTER TABLE `translation_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
