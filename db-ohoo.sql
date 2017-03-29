-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Mar 2017 pada 19.01
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ohoo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignments_course_id_foreign` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `assignments`
--

INSERT INTO `assignments` (`id`, `course_id`, `name`, `tanggal`, `materi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tugas 1 - Makalah', '2017-03-30', 'Daya dan Energi', NULL, NULL),
(2, 60, 'Tugas 1', '2017-03-06', 'Gravitasi dan percepatan', NULL, NULL),
(3, 60, 'Tugas 2', '2017-04-10', 'Daya dan Energi', NULL, NULL),
(4, 60, 'Tugas 3', '2017-04-18', 'Hukum Newton', NULL, NULL),
(5, 60, 'Tugas 4', '2017-05-01', 'Mekanika Fluida', NULL, NULL),
(6, 60, 'Tugas 5', '2017-05-24', 'Hukum Newton', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment_score`
--

CREATE TABLE IF NOT EXISTS `assignment_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assignment_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignment_score_assignment_id_foreign` (`assignment_id`),
  KEY `assignment_score_student_id_foreign` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `assignment_score`
--

INSERT INTO `assignment_score` (`id`, `assignment_id`, `student_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '90.00', NULL, NULL),
(2, 2, 1, '80.00', NULL, NULL),
(3, 3, 1, '60.00', NULL, NULL),
(4, 4, 1, '85.00', NULL, NULL),
(5, 5, 1, '76.00', NULL, NULL),
(6, 6, 1, '80.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `semester` int(10) unsigned NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_teacher_id_foreign` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `classes`
--

INSERT INTO `classes` (`id`, `teacher_id`, `name`, `semester`, `year`, `is_current`, `created_at`, `updated_at`) VALUES
(1, 1, 'X IPA', 1, 2014, 0, NULL, NULL),
(2, 1, 'X IPA', 2, 2014, 0, NULL, NULL),
(4, 1, 'XI IPA', 1, 2015, 0, NULL, NULL),
(5, 1, 'XI IPA', 2, 2015, 0, NULL, NULL),
(6, 1, 'XII IPA', 1, 2016, 0, NULL, NULL),
(7, 1, 'XII IPA', 2, 2016, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skbm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_teacher_id_foreign` (`teacher_id`),
  KEY `courses_class_id_foreign` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `teacher_id`, `class_id`, `name`, `skbm`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fisika', 60, NULL, NULL),
(2, 1, 1, 'Kimia', 70, NULL, NULL),
(3, 1, 1, 'Matematika', 70, NULL, NULL),
(5, 1, 1, 'Biologi', 65, NULL, NULL),
(7, 1, 1, 'Pendidikan Agama', 65, NULL, NULL),
(8, 1, 1, 'Sejarah', 70, NULL, NULL),
(9, 1, 1, 'Kewarganegaraan', 70, NULL, NULL),
(10, 1, 1, 'Bahasa Inggris', 70, NULL, NULL),
(11, 1, 1, 'Bahasa Indonesia', 70, NULL, NULL),
(14, 1, 2, 'Fisika', 65, NULL, NULL),
(15, 1, 2, 'Kimia', 65, NULL, NULL),
(16, 1, 2, 'Matematika', 65, NULL, NULL),
(17, 1, 2, 'Biologi', 65, NULL, NULL),
(18, 1, 2, 'Pendidikan Agama', 65, NULL, NULL),
(19, 1, 2, 'Sejarah', 65, NULL, NULL),
(20, 1, 2, 'Kewarganegaraan', 65, NULL, NULL),
(21, 1, 2, 'Bahasa Inggris', 65, NULL, NULL),
(22, 1, 2, 'Bahasa Indonesia', 65, NULL, NULL),
(33, 1, 4, 'Fisika', 65, NULL, NULL),
(34, 1, 4, 'Kimia', 65, NULL, NULL),
(35, 1, 4, 'Matematika', 65, NULL, NULL),
(36, 1, 4, 'Biologi', 65, NULL, NULL),
(37, 1, 4, 'Pendidikan Agama', 65, NULL, NULL),
(38, 1, 4, 'Sejarah', 65, NULL, NULL),
(39, 1, 4, 'Kewarganegaraan', 65, NULL, NULL),
(40, 1, 4, 'Bahasa Inggris', 65, NULL, NULL),
(41, 1, 4, 'Bahasa Indonesia', 65, NULL, NULL),
(42, 1, 5, 'Fisika', 65, NULL, NULL),
(43, 1, 5, 'Kimia', 65, NULL, NULL),
(44, 1, 5, 'Matematika', 65, NULL, NULL),
(45, 1, 5, 'Biologi', 65, NULL, NULL),
(46, 1, 5, 'Pendidikan Agama', 65, NULL, NULL),
(47, 1, 5, 'Sejarah', 65, NULL, NULL),
(48, 1, 5, 'Kewarganegaraan', 65, NULL, NULL),
(49, 1, 5, 'Bahasa Inggris', 65, NULL, NULL),
(50, 1, 5, 'Bahasa Indonesia', 65, NULL, NULL),
(51, 1, 6, 'Fisika', 65, NULL, NULL),
(52, 1, 6, 'Kimia', 65, NULL, NULL),
(53, 1, 6, 'Matematika', 65, NULL, NULL),
(54, 1, 6, 'Biologi', 65, NULL, NULL),
(55, 1, 6, 'Pendidikan Agama', 65, NULL, NULL),
(56, 1, 6, 'Sejarah', 65, NULL, NULL),
(57, 1, 6, 'Kewarganegaraan', 65, NULL, NULL),
(58, 1, 6, 'Bahasa Inggris', 65, NULL, NULL),
(59, 1, 6, 'Bahasa Indonesia', 65, NULL, NULL),
(60, 1, 7, 'Fisika', 65, NULL, NULL),
(61, 1, 7, 'Kimia', 65, NULL, NULL),
(62, 1, 7, 'Matematika', 65, NULL, NULL),
(63, 1, 7, 'Biologi', 65, NULL, NULL),
(64, 1, 7, 'Pendidikan Agama', 65, NULL, NULL),
(65, 1, 7, 'Sejarah', 65, NULL, NULL),
(66, 1, 7, 'Kewarganegaraan', 65, NULL, NULL),
(67, 1, 7, 'Bahasa Inggris', 65, NULL, NULL),
(68, 1, 7, 'Bahasa Indonesia', 65, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_score`
--

CREATE TABLE IF NOT EXISTS `course_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `nilai` int(11) NOT NULL,
  `nilai_praktik` int(11) NOT NULL,
  `sikap` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_score_course_id_foreign` (`course_id`),
  KEY `course_score_student_id_foreign` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=146 ;

--
-- Dumping data untuk tabel `course_score`
--

INSERT INTO `course_score` (`id`, `course_id`, `student_id`, `nilai`, `nilai_praktik`, `sikap`, `created_at`, `updated_at`) VALUES
(15, 60, 1, 82, 75, 'A', NULL, NULL),
(16, 61, 1, 52, 75, 'A', NULL, NULL),
(17, 62, 1, 64, 70, 'B', NULL, NULL),
(18, 63, 1, 86, 65, 'B', NULL, NULL),
(19, 64, 1, 88, 78, 'B', NULL, NULL),
(20, 65, 1, 73, 80, 'A', NULL, NULL),
(21, 66, 1, 69, 75, 'C', NULL, NULL),
(22, 67, 1, 72, 80, 'A', NULL, NULL),
(23, 68, 1, 89, 85, 'A', NULL, NULL),
(24, 1, 1, 80, 75, 'A', NULL, NULL),
(25, 2, 1, 61, 75, 'A', NULL, NULL),
(26, 3, 1, 59, 75, 'A', NULL, NULL),
(53, 5, 1, 79, 75, 'A', NULL, NULL),
(54, 7, 1, 85, 75, 'A', NULL, NULL),
(55, 8, 1, 81, 75, 'A', NULL, NULL),
(56, 9, 1, 86, 75, 'A', NULL, NULL),
(57, 10, 1, 82, 75, 'A', NULL, NULL),
(58, 11, 1, 52, 75, 'A', NULL, NULL),
(59, 14, 1, 60, 75, 'A', NULL, NULL),
(60, 15, 1, 84, 75, 'A', NULL, NULL),
(61, 16, 1, 82, 75, 'A', NULL, NULL),
(62, 17, 1, 81, 75, 'A', NULL, NULL),
(63, 18, 1, 87, 75, 'A', NULL, NULL),
(64, 19, 1, 72, 75, 'A', NULL, NULL),
(65, 20, 1, 75, 75, 'A', NULL, NULL),
(66, 21, 1, 79, 75, 'A', NULL, NULL),
(67, 22, 1, 68, 75, 'A', NULL, NULL),
(68, 33, 1, 83, 75, 'A', NULL, NULL),
(69, 34, 1, 81, 75, 'A', NULL, NULL),
(70, 35, 1, 60, 75, 'A', NULL, NULL),
(71, 36, 1, 68, 75, 'A', NULL, NULL),
(72, 37, 1, 72, 76, 'A', NULL, NULL),
(73, 38, 1, 64, 75, 'A', NULL, NULL),
(74, 39, 1, 73, 75, 'A', NULL, NULL),
(75, 40, 1, 80, 75, 'A', NULL, NULL),
(76, 41, 1, 81, 75, 'A', NULL, NULL),
(77, 42, 1, 58, 71, 'A', NULL, NULL),
(78, 43, 1, 90, 75, 'A', NULL, NULL),
(79, 44, 1, 80, 75, 'A', NULL, NULL),
(80, 45, 1, 92, 75, 'A', NULL, NULL),
(81, 46, 1, 58, 75, 'A', NULL, NULL),
(82, 47, 1, 65, 75, 'A', NULL, NULL),
(83, 48, 1, 80, 75, 'A', NULL, NULL),
(84, 49, 1, 82, 75, 'A', NULL, NULL),
(85, 50, 1, 84, 72, 'A', NULL, NULL),
(86, 51, 1, 81, 75, 'A', NULL, NULL),
(87, 52, 1, 76, 75, 'A', NULL, NULL),
(88, 53, 1, 73, 75, 'A', NULL, NULL),
(89, 54, 1, 65, 75, 'A', NULL, NULL),
(90, 55, 1, 80, 75, 'A', NULL, NULL),
(91, 56, 1, 82, 75, 'A', NULL, NULL),
(92, 57, 1, 80, 75, 'A', NULL, NULL),
(93, 58, 1, 58, 77, 'A', NULL, NULL),
(94, 59, 1, 82, 75, 'A', NULL, NULL),
(95, 5, 2, 68, 75, 'A', NULL, NULL),
(96, 7, 2, 69, 75, 'A', NULL, NULL),
(97, 8, 2, 50, 75, 'A', NULL, NULL),
(98, 9, 2, 82, 75, 'A', NULL, NULL),
(99, 10, 2, 74, 75, 'A', NULL, NULL),
(100, 11, 2, 59, 75, 'A', NULL, NULL),
(101, 14, 2, 68, 75, 'A', NULL, NULL),
(102, 15, 2, 75, 75, 'A', NULL, NULL),
(103, 16, 2, 92, 75, 'A', NULL, NULL),
(104, 17, 2, 80, 75, 'A', NULL, NULL),
(105, 18, 2, 81, 75, 'A', NULL, NULL),
(106, 19, 2, 78, 75, 'A', NULL, NULL),
(107, 20, 2, 75, 75, 'A', NULL, NULL),
(108, 21, 2, 79, 75, 'A', NULL, NULL),
(109, 22, 2, 68, 75, 'A', NULL, NULL),
(110, 33, 2, 83, 75, 'A', NULL, NULL),
(111, 34, 2, 81, 75, 'A', NULL, NULL),
(112, 35, 2, 60, 75, 'A', NULL, NULL),
(113, 36, 2, 68, 75, 'A', NULL, NULL),
(114, 37, 2, 72, 76, 'A', NULL, NULL),
(115, 38, 2, 64, 75, 'A', NULL, NULL),
(116, 39, 2, 73, 75, 'A', NULL, NULL),
(117, 40, 2, 80, 75, 'A', NULL, NULL),
(118, 41, 2, 81, 75, 'A', NULL, NULL),
(119, 42, 2, 58, 71, 'A', NULL, NULL),
(120, 43, 2, 90, 75, 'A', NULL, NULL),
(121, 44, 2, 80, 75, 'A', NULL, NULL),
(122, 45, 2, 92, 75, 'A', NULL, NULL),
(123, 46, 2, 58, 75, 'A', NULL, NULL),
(124, 47, 2, 65, 75, 'A', NULL, NULL),
(125, 48, 2, 80, 75, 'A', NULL, NULL),
(126, 49, 2, 82, 75, 'A', NULL, NULL),
(127, 50, 2, 84, 72, 'A', NULL, NULL),
(128, 51, 2, 81, 75, 'A', NULL, NULL),
(129, 52, 2, 76, 75, 'A', NULL, NULL),
(130, 53, 2, 73, 75, 'A', NULL, NULL),
(131, 54, 2, 65, 75, 'A', NULL, NULL),
(132, 55, 2, 80, 75, 'A', NULL, NULL),
(133, 56, 2, 82, 75, 'A', NULL, NULL),
(134, 57, 2, 80, 75, 'A', NULL, NULL),
(135, 58, 2, 58, 77, 'A', NULL, NULL),
(136, 59, 2, 82, 75, 'A', NULL, NULL),
(137, 60, 2, 78, 75, 'A', NULL, NULL),
(138, 61, 2, 89, 75, 'A', NULL, NULL),
(139, 62, 2, 72, 75, 'A', NULL, NULL),
(140, 63, 2, 72, 75, 'A', NULL, NULL),
(141, 64, 2, 79, 75, 'A', NULL, NULL),
(142, 65, 2, 89, 75, 'A', NULL, NULL),
(143, 66, 2, 90, 75, 'A', NULL, NULL),
(144, 67, 2, 77, 75, 'A', NULL, NULL),
(145, 68, 2, 85, 75, 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_score_bayangan`
--

CREATE TABLE IF NOT EXISTS `course_score_bayangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `nilai` int(11) NOT NULL,
  `nilai_praktik` int(11) NOT NULL,
  `sikap` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_score_bayangan_course_id_foreign` (`course_id`),
  KEY `course_score_bayangan_student_id_foreign` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `course_score_bayangan`
--

INSERT INTO `course_score_bayangan` (`id`, `course_id`, `student_id`, `nilai`, `nilai_praktik`, `sikap`, `created_at`, `updated_at`) VALUES
(1, 60, 1, 70, 71, 'A', NULL, NULL),
(2, 61, 1, 64, 77, 'B', NULL, NULL),
(3, 62, 1, 45, 73, 'A', NULL, NULL),
(4, 63, 1, 86, 65, 'B', NULL, NULL),
(5, 64, 1, 82, 71, 'B', NULL, NULL),
(6, 65, 1, 76, 83, 'A', NULL, NULL),
(7, 66, 1, 63, 70, 'B', NULL, NULL),
(8, 67, 1, 78, 85, 'B', NULL, NULL),
(9, 68, 1, 81, 80, 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `materi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exams_course_id_foreign` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `name`, `materi`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ujian Tengah Semester', 'Bab 1 - Bab 4', '2017-03-24', NULL, NULL),
(3, 1, 'Ujian Akhir Semester', 'Seluruh materi', '2017-03-30', NULL, NULL),
(4, 60, 'Ujian Tengah Semester', 'Bab 1 - Bab 5', '2017-03-31', NULL, NULL),
(5, 60, 'Ujian Akhir Semester', 'Bab 6 - Bab 10', '2017-04-28', NULL, NULL),
(6, 60, 'Ujian 1', 'Bab 1 - 2', '2017-02-13', NULL, NULL),
(7, 60, 'Ujian 2', 'Bab 3 - Bab 4', '2017-03-09', NULL, NULL),
(8, 60, 'Ujian 3', 'Bab 5', '2017-04-02', NULL, NULL),
(9, 60, 'Ujian 5', 'Bab 6 - 7', '2017-04-03', NULL, NULL),
(10, 60, 'Ujian 6', 'Bab 8 - 10', '2017-04-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_score`
--

CREATE TABLE IF NOT EXISTS `exam_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_score_exam_id_foreign` (`exam_id`),
  KEY `exam_score_student_id_foreign` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `exam_score`
--

INSERT INTO `exam_score` (`id`, `exam_id`, `student_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '80.00', NULL, NULL),
(2, 3, 1, '40.00', NULL, NULL),
(3, 2, 3, '40.00', NULL, NULL),
(4, 4, 1, '78.00', NULL, NULL),
(5, 5, 1, '55.00', NULL, NULL),
(6, 6, 1, '80.00', NULL, NULL),
(7, 7, 1, '72.00', NULL, NULL),
(8, 8, 1, '82.00', NULL, NULL),
(9, 9, 1, '68.00', NULL, NULL),
(10, 10, 1, '73.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_13_235432_create_students_table', 1),
('2017_03_14_000823_create_teachers_table', 1),
('2017_03_14_064229_create_classes_table', 1),
('2017_03_14_070837_create_courses_table', 1),
('2017_03_14_071916_create_exams_table', 1),
('2017_03_15_194551_remove_year_from_courses_table', 1),
('2017_03_17_172029_create_student_class_table', 2),
('2017_03_17_172816_remove_student_id_from_classes', 3),
('2017_03_17_181850_create_exam_score_table', 4),
('2017_03_17_181955_create_course_score_table', 4),
('2017_03_17_191202_add_nilai_to_course_score', 5),
('2017_03_19_084420_remove_score_from_exams_table', 6),
('2017_03_19_084843_modify_score_in_exam_score_table', 7),
('2017_03_19_093215_modify_nilai_in_course_score_table', 7),
('2017_03_19_094238_add_semester_to_classes_table', 7),
('2017_03_20_173413_add_skbm_to_courses', 8),
('2017_03_20_173803_modify_course_score', 8),
('2017_03_23_154441_create_assignments_table', 9),
('2017_03_23_154515_create_assignments_score_table', 9),
('2017_03_23_160119_modify_exams_table', 10),
('2017_03_23_160503_modify_assignments_table', 10),
('2017_03_26_043249_change_email_to_username_in_users_table', 11),
('2017_03_26_052256_create_student_id_teacher_id_in_users_table', 11),
('2017_03_26_131511_drop_name_from_users_table', 11),
('2017_03_26_200522_modify_registration_number_in_teachers_table', 11),
('2017_03_28_143615_create_parents_table', 12),
('2017_03_28_152206_modify_users_table', 13),
('2017_03_28_180939_create_course_score_bayangan', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parents_student_id_foreign` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `parents`
--

INSERT INTO `parents` (`id`, `name`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Angela', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration_number` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_registration_number_unique` (`registration_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `registration_number`, `name`, `created_at`, `updated_at`) VALUES
(1, 13513026, 'William', NULL, NULL),
(2, 11111, 'Waluyo Akbar', NULL, NULL),
(3, 13513002, 'Irene', NULL, NULL),
(4, 123412, 'Toni', NULL, NULL),
(5, 123712, 'Jessica', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_class`
--

CREATE TABLE IF NOT EXISTS `student_class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_class_student_id_foreign` (`student_id`),
  KEY `student_class_class_id_foreign` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `student_class`
--

INSERT INTO `student_class` (`id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, NULL, NULL),
(4, 1, 2, NULL, NULL),
(6, 1, 4, NULL, NULL),
(7, 1, 5, NULL, NULL),
(8, 1, 6, NULL, NULL),
(9, 1, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration_number` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_registration_number_unique` (`registration_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`id`, `registration_number`, `name`, `created_at`, `updated_at`) VALUES
(1, 123, 'Budi', NULL, NULL),
(2, 123123, 'Santi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned DEFAULT NULL,
  `teacher_id` int(10) unsigned DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`username`),
  KEY `users_student_id_foreign` (`student_id`),
  KEY `users_teacher_id_foreign` (`teacher_id`),
  KEY `users_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `student_id`, `teacher_id`, `parent_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'william', '$2y$10$.3EOjjko8Ce4p9GOB87mBeXyqwSjAaPEyqp0SR2K.TwjtlHanmRWi', '68r9UyKxwdUJnQBoaj1BlQTTAvsZUvZdBqEpzk7ItmkDRbCuCB69NPpksdXC', NULL, '2017-03-28 11:37:41'),
(2, NULL, 1, NULL, 'budi', '$2y$10$AERnWhT2sYMSMp0VaNNDuOT8qqxPQHuGRGUlLOqrn32MF2jlORkXG', 'ZZRQEpckEEQFFnBZTaDDTwjnwDYvyrVdDnDVy6jnAEYLWuHXrTKvVXaey1eO', NULL, '2017-03-29 09:13:59'),
(3, NULL, NULL, 1, 'angela', '$2y$10$mmS0cBG25YsKYOk5/YWUSuwjZLPQfp3nsYXVcixt0gCyv8mvhZmPu', '0ZKrMzLQBWgbkotB3JRGy4ifoIEwEUjaOXzr0g3cOAfOf9WvdC4eaLihIBw0', NULL, '2017-03-28 11:02:59');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `assignment_score`
--
ALTER TABLE `assignment_score`
  ADD CONSTRAINT `assignment_score_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_score_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `course_score`
--
ALTER TABLE `course_score`
  ADD CONSTRAINT `course_score_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_score_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `course_score_bayangan`
--
ALTER TABLE `course_score_bayangan`
  ADD CONSTRAINT `course_score_bayangan_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_score_bayangan_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_score`
--
ALTER TABLE `exam_score`
  ADD CONSTRAINT `exam_score_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_score_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `student_class_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_class_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
