-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kstarter_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_permissions`
--

CREATE TABLE `ks_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_name` varchar(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `show_in_menu` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `css_class` varchar(255) DEFAULT NULL,
  `display_order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_permissions`
--

INSERT INTO `ks_permissions` (`id`, `permission_category_id`, `permission_name`, `route`, `show_in_menu`, `css_class`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard', 1, 'bx bx-home-alt', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(2, 5, 'Users', 'admin/users', 1, 'bx bx-group', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(3, 5, 'Add User', 'admin/users/form/add', 0, '', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(4, 5, 'Edit User', 'admin/users/form/edit/{id}', 0, '', 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(5, 5, 'Store User', 'admin/users/store', 0, '', 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(6, 5, 'Update User', 'admin/users/update/{id}', 0, '', 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(7, 5, 'Delete User', 'admin/users/delete/{id}', 0, '', 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(8, 5, 'Toggle User Status', 'admin/users/toggle-status/{id}', 0, '', 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(9, 4, 'Roles', 'admin/roles', 1, 'bx bx-shield', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(10, 4, 'Create Role', 'admin/roles/create', 0, '', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(11, 4, 'Edit Role', 'admin/roles/edit/{id}', 0, '', 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(12, 4, 'Add Role', 'admin/roles/form/add', 0, '', 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(13, 4, 'Store Role', 'admin/roles/store', 0, '', 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(14, 4, 'Update Role', 'admin/roles/update/{id}', 0, '', 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(15, 4, 'Delete Role', 'admin/roles/delete/{id}', 0, '', 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(16, 3, 'Permissions', 'admin/permissions', 1, 'bx bx-lock-open', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(17, 3, 'Create Permission', 'admin/permissions/create', 0, '', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(18, 3, 'Add Permission', 'admin/permissions/form/add', 0, '', 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(19, 3, 'Edit Permission', 'admin/permissions/form/edit/{id}', 0, '', 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(20, 3, 'Store Permission', 'admin/permissions/store', 0, '', 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(21, 3, 'Update Permission', 'admin/permissions/update/{id}', 0, '', 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(22, 3, 'Delete Permission', 'admin/permissions/delete/{id}', 0, '', 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(23, 2, 'Permission Categories', 'admin/permission-categories', 1, 'bx bx-category', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(24, 2, 'Create Permission Category', 'admin/permission-categories/create', 0, '', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(25, 2, 'Add Permission Category', 'admin/permission-categories/form/add', 0, '', 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(26, 2, 'Edit Permission Category', 'admin/permission-categories/form/edit/{id}', 0, '', 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(27, 2, 'Store Permission Category', 'admin/permission-categories/store', 0, '', 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(28, 2, 'Update Permission Category', 'admin/permission-categories/update/{id}', 0, '', 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(29, 2, 'Delete Permission Category', 'admin/permission-categories/delete/{id}', 0, '', 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(30, 2, 'Update Permission Category Order', 'admin/permission-categories/order/{id}', 0, '', 8, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(31, 6, 'Profile', 'admin/profile', 1, 'bx bx-user-circle', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(32, 6, 'Update Profile', 'admin/profile/update', 0, '', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(33, 6, 'Change Password', 'admin/profile/change-password', 0, '', 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(34, 7, 'Logout', 'admin/logout', 1, 'bx bx-log-out', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `ks_permission_categories`
--

CREATE TABLE `ks_permission_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `css_class` varchar(255) DEFAULT NULL,
  `display_order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_permission_categories`
--

INSERT INTO `ks_permission_categories` (`id`, `category_name`, `css_class`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'bx bx-home-alt', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(2, 'Permission Categories', 'bx bx-category', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(3, 'Permissions', 'bx bx-lock-open', 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(4, 'Roles', 'bx bx-shield', 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(5, 'Users', 'bx bx-group', 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(6, 'Profile', 'bx bx-user-circle', 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(7, 'Logout', 'bx bx-log-out', 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `ks_roles`
--

CREATE TABLE `ks_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `display_order` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_roles`
--

INSERT INTO `ks_roles` (`id`, `role_name`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Security Admin', 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(2, 'Admin', 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `ks_role_permissions`
--

CREATE TABLE `ks_role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_role_permissions`
--

INSERT INTO `ks_role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(2, 1, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(3, 1, 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(4, 1, 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(5, 1, 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(6, 1, 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(7, 1, 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(8, 1, 8, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(9, 1, 9, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(10, 1, 10, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(11, 1, 11, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(12, 1, 12, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(13, 1, 13, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(14, 1, 14, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(15, 1, 15, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(16, 1, 16, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(17, 1, 17, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(18, 1, 18, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(19, 1, 19, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(20, 1, 20, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(21, 1, 21, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(22, 1, 22, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(23, 1, 23, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(24, 1, 24, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(25, 1, 25, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(26, 1, 26, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(27, 1, 27, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(28, 1, 28, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(29, 1, 29, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(30, 1, 30, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(31, 1, 31, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(32, 1, 32, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(33, 1, 33, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(34, 1, 34, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(35, 2, 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(36, 2, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(37, 2, 3, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(38, 2, 4, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(39, 2, 5, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(40, 2, 6, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(41, 2, 7, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(42, 2, 8, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(43, 2, 9, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(44, 2, 10, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(45, 2, 11, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(46, 2, 12, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(47, 2, 13, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(48, 2, 14, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(49, 2, 15, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(50, 2, 16, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(51, 2, 17, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(52, 2, 18, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(53, 2, 19, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(54, 2, 20, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(55, 2, 21, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(56, 2, 22, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(57, 2, 23, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(58, 2, 24, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(59, 2, 25, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(60, 2, 26, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(61, 2, 27, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(62, 2, 28, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(63, 2, 29, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(64, 2, 30, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(65, 2, 31, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(66, 2, 32, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(67, 2, 33, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(68, 2, 34, '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `ks_users`
--

CREATE TABLE `ks_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_users`
--

INSERT INTO `ks_users` (`id`, `user_name`, `is_active`, `remember_token`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, NULL, '$2y$12$OVL/lknGp90eeHhTmAPRPeCcXy7xC7CDFntYcRYnrK59lBMWlRagS', '2026-06-01 08:17:28', '2026-06-01 08:17:28'),
(2, 'john.carter', 1, NULL, '$2y$12$0YLlH1GAKZnXVmhxw.PS5.Y5MsCDeCXqWgj65CXQt8qSMU4auFxt.', '2026-06-01 08:17:29', '2026-06-01 08:17:29'),
(3, 'sarah.mitchell', 1, NULL, '$2y$12$lQECPxELcsSvD846OAicg.LD/C1DIKqLS9RvW7OTzp7od7GUeWpu.', '2026-06-01 08:17:29', '2026-06-01 08:17:29'),
(4, 'david.nguyen', 1, NULL, '$2y$12$fu1/QWGmzhUiknYCrmZxxujnRAZbfWfNq/.o0198wPrixK50C5VT6', '2026-06-01 08:17:29', '2026-06-01 08:17:29'),
(5, 'emily.ross', 1, NULL, '$2y$12$8.bS3yTTmvjRF11WkvBNaudBmnWX7aQPbZmgiczyHQ52gNRN4njNi', '2026-06-01 08:17:30', '2026-06-01 08:17:30'),
(6, 'mark.hassan', 1, NULL, '$2y$12$LWCHkfDb7ySyMN3aoL/IaOxbVlt7JlRUctBUIL9f8sD05nQXG.1xS', '2026-06-01 08:17:30', '2026-06-01 08:17:30'),
(7, 'lisa.fernandez', 1, NULL, '$2y$12$9WnYE6mw4qozwaExeNDHieFXeF9N6RFxUvXlK3QK9MuL7pSgmI88m', '2026-06-01 08:17:30', '2026-06-01 08:17:30'),
(8, 'james.patel', 1, NULL, '$2y$12$.I/yDM9lFxNvYI65RJsJhuia9kXQ8fwO2gdK3yhG8I8Gaes4gXAtO', '2026-06-01 08:17:31', '2026-06-01 08:17:31'),
(9, 'anna.brooks', 1, NULL, '$2y$12$Wt5h7YEWPPBQ.SbHR9Fbs.Z5IUFFq.CPle496TZeHP/zqcaaIuJHy', '2026-06-01 08:17:31', '2026-06-01 08:17:31'),
(10, 'kevin.wright', 1, NULL, '$2y$12$DQYIca64t6cc1r6JrDwjgeQw06LBNs7cIK9mGFZhhnq1IkTESpKYe', '2026-06-01 08:17:31', '2026-06-01 08:17:31'),
(11, 'nina.scott', 1, NULL, '$2y$12$.S2KO1bMA8tZkUYxfHzoD.ihWGTvv6rywBudOjdydWQ9OedMe9I1W', '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `ks_user_profiles`
--

CREATE TABLE `ks_user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `designation_name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_user_profiles`
--

INSERT INTO `ks_user_profiles` (`id`, `user_name`, `first_name`, `last_name`, `email_address`, `mobile_number`, `department_name`, `designation_name`, `profile_picture`, `country`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Security', 'Admin', 'admin@kstarter.com', '+92 300 0000000', 'IT', 'System Administrator', NULL, 'Pakistan', '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(2, 'john.carter', 'John', 'Carter', 'john.carter@kstarter.com', '+92 300 1000001', 'IT', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(3, 'sarah.mitchell', 'Sarah', 'Mitchell', 'sarah.mitchell@kstarter.com', '+92 300 1000002', 'HR', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(4, 'david.nguyen', 'David', 'Nguyen', 'david.nguyen@kstarter.com', '+92 300 1000003', 'Finance', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(5, 'emily.ross', 'Emily', 'Ross', 'emily.ross@kstarter.com', '+92 300 1000004', 'Marketing', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(6, 'mark.hassan', 'Mark', 'Hassan', 'mark.hassan@kstarter.com', '+92 300 1000005', 'Operations', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(7, 'lisa.fernandez', 'Lisa', 'Fernandez', 'lisa.fernandez@kstarter.com', '+92 300 1000006', 'IT', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(8, 'james.patel', 'James', 'Patel', 'james.patel@kstarter.com', '+92 300 1000007', 'Engineering', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(9, 'anna.brooks', 'Anna', 'Brooks', 'anna.brooks@kstarter.com', '+92 300 1000008', 'HR', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(10, 'kevin.wright', 'Kevin', 'Wright', 'kevin.wright@kstarter.com', '+92 300 1000009', 'Finance', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(11, 'nina.scott', 'Nina', 'Scott', 'nina.scott@kstarter.com', '+92 300 1000010', 'Marketing', NULL, NULL, NULL, '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `ks_user_roles`
--

CREATE TABLE `ks_user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_user_roles`
--

INSERT INTO `ks_user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(2, 2, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(3, 3, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(4, 4, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(5, 5, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(6, 6, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(7, 7, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(8, 8, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(9, 9, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(10, 10, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32'),
(11, 11, 2, '2026-06-01 08:17:32', '2026-06-01 08:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2020_08_17_172041_create_sessions_table', 1),
(4, '2026_05_22_164839_create_permission_categories_table_migration', 1),
(5, '2026_05_22_164853_create_permissions_table_migration', 1),
(6, '2026_05_22_164907_create_roles_table_migration', 1),
(7, '2026_05_22_164908_create_role_permissions_table_migration', 1),
(8, '2026_05_22_164940_create_users_table_migration', 1),
(9, '2026_05_22_165010_create_user_profiles_table_migration', 1),
(10, '2026_05_30_103419_create_user_roles_table_migration', 1),
(11, '2026_06_01_000001_add_mobile_number_to_user_profiles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('14o8aJIEK7rdtOQq5YoVTlnRloPsGxbwrCKBnq8K', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS05qdGNBeDQ4N0IySWliSXB2R05ESXBKdU5vc0lrVGtsbGgwb1N3UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoxNjoiYWRtaW4ubG9naW4udmlldyI7fX0=', 1780322196);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_permissions`
--
ALTER TABLE `ks_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_permission_categories`
--
ALTER TABLE `ks_permission_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_roles`
--
ALTER TABLE `ks_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_role_permissions`
--
ALTER TABLE `ks_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_users`
--
ALTER TABLE `ks_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ks_users_user_name_unique` (`user_name`);

--
-- Indexes for table `ks_user_profiles`
--
ALTER TABLE `ks_user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ks_user_profiles_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `ks_user_profiles_email_address_unique` (`email_address`);

--
-- Indexes for table `ks_user_roles`
--
ALTER TABLE `ks_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ks_permissions`
--
ALTER TABLE `ks_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ks_permission_categories`
--
ALTER TABLE `ks_permission_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ks_roles`
--
ALTER TABLE `ks_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ks_role_permissions`
--
ALTER TABLE `ks_role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `ks_users`
--
ALTER TABLE `ks_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ks_user_profiles`
--
ALTER TABLE `ks_user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ks_user_roles`
--
ALTER TABLE `ks_user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
