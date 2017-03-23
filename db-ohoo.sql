-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mar 2017 pada 19.17
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `assignments`
--

INSERT INTO `assignments` (`id`, `course_id`, `name`, `tanggal`, `materi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tugas 1 - Makalah', '2017-03-30', 'Daya dan Energi', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `assignment_score`
--

INSERT INTO `assignment_score` (`id`, `assignment_id`, `student_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '90.00', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `classes`
--

INSERT INTO `classes` (`id`, `teacher_id`, `name`, `semester`, `year`, `is_current`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kelas X IPA', 1, 2016, 0, NULL, NULL),
(2, 1, 'Kelas X IPA', 2, 2016, 1, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `teacher_id`, `class_id`, `name`, `skbm`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fisika', 60, NULL, NULL),
(2, 1, 1, 'Kimia', 70, NULL, NULL),
(3, 1, 2, 'Fisika', 70, NULL, NULL),
(5, 1, 2, 'Matematika', 65, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `course_score`
--

INSERT INTO `course_score` (`id`, `course_id`, `student_id`, `nilai`, `nilai_praktik`, `sikap`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 80, 68, 'A', NULL, NULL),
(2, 2, 1, 70, 83, 'B', NULL, NULL),
(3, 1, 3, 45, 74, 'A', NULL, NULL),
(4, 2, 3, 84, 69, 'C', NULL, NULL),
(5, 3, 1, 70, 73, 'C', NULL, NULL),
(6, 5, 1, 62, 74, 'B', NULL, NULL),
(7, 3, 3, 76, 80, 'A', NULL, NULL),
(8, 5, 3, 85, 90, 'A', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `name`, `materi`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ujian Tengah Semester', 'Bab 1 - Bab 4', '2017-03-24', NULL, NULL),
(3, 1, 'Ujian Akhir Semester', 'Seluruh materi', '2017-03-30', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `exam_score`
--

INSERT INTO `exam_score` (`id`, `exam_id`, `student_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '80.00', NULL, NULL),
(2, 3, 1, '40.00', NULL, NULL),
(3, 2, 3, '40.00', NULL, NULL);

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
('2017_03_23_160503_modify_assignments_table', 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `registration_number`, `name`, `created_at`, `updated_at`) VALUES
(1, 13513026, 'William', NULL, NULL),
(3, 13513002, 'Irene', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `student_class`
--

INSERT INTO `student_class` (`id`, `student_id`, `class_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, NULL, NULL),
(4, 1, 2, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration_number` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_registration_number_unique` (`registration_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `teachers`
--

INSERT INTO `teachers` (`id`, `registration_number`, `name`, `created_at`, `updated_at`) VALUES
(1, 123, 'Budi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `assignment_score_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_score_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE;

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
-- Ketidakleluasaan untuk tabel `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `student_class_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_class_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
