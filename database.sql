-- Database Schema for Wixvent Event Management System
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wixvent`
--
CREATE DATABASE IF NOT EXISTS `wixvent`;
USE `wixvent`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(20) UNIQUE NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `type` TINYINT(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=User',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` INT(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `venue` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `rate` FLOAT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` INT(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `venue_id` INT(30) NOT NULL,
  `event` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `schedule` DATETIME NOT NULL,
  `type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1=Public, 2=Private',
  `audience_capacity` INT(30) NOT NULL,
  `payment_type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1=Free,2=Payable',
  `amount` DOUBLE NOT NULL DEFAULT 0,
  `banner` TEXT NOT NULL,
  `date_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`venue_id`) REFERENCES `venue`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audience`
--

CREATE TABLE `audience` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `name` TEXT NOT NULL,
  `contact` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `address` TEXT NOT NULL,
  `event_id` INT(30) NOT NULL,
  `payment_status` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0=pending,1=Paid',
  `attendance_status` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '1=present',
  `status` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0=for verification,1=confirmed,2=declined',
  `date_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue_booking`
--

CREATE TABLE `venue_booking` (
  `id` INT(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `name` TEXT NOT NULL,
  `address` TEXT NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `contact` VARCHAR(100) NOT NULL,
  `venue_id` INT(30) NOT NULL,
  `duration` VARCHAR(100) NOT NULL,
  `datetime` DATETIME NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0=for verification,1=confirmed,2=canceled',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`venue_id`) REFERENCES `venue`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` INT(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` TEXT NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `contact` VARCHAR(20) NOT NULL,
  `cover_img` TEXT NOT NULL,
  `about_content` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Default data insertion
--

-- Insert default admin user
INSERT INTO `users` (`username`, `email`, `password`, `type`) VALUES
('admin', 'admin@wixvent.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1);

-- Insert default system settings
INSERT INTO `system_settings` (`name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
('Wixvent', 'info@wixvent.com', '+1234567890', 'default-cover.jpg', 'Welcome to Wixvent - Your Event Management System');

-- Insert sample venue
INSERT INTO `venue` (`venue`, `address`, `description`, `rate`) VALUES
('Sample Venue', 'Sample Address', 'A beautiful venue for your events', 500.00);

COMMIT; 