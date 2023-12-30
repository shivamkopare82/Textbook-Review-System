-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_textbooks`
--

CREATE TABLE `assigned_textbooks` (
  `Assignment_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Textbook_ID` int(11) NOT NULL,
  `Assignment_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `textbook_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_textbooks`
--

INSERT INTO `assigned_textbooks` (`Assignment_ID`, `User_ID`, `Textbook_ID`, `Assignment_Date`, `username`, `textbook_name`) VALUES
(6, 1, 1, '2023-09-15 11:38:50', '', ''),
(7, 1, 2, '2023-09-15 12:00:06', '', ''),
(8, 4, 4, '2023-10-09 13:22:30', '', ''),
(9, 9, 4, '2023-10-11 05:35:50', '', ''),
(10, 9, 1, '2023-10-14 06:58:19', 'Shivam', 'AI MODERN APPROACH'),
(11, 9, 5, '2023-10-14 07:06:29', '', 'BIG DATA ANALYTICS'),
(12, 9, 5, '2023-10-14 07:07:02', '', 'BIG DATA ANALYTICS'),
(13, 8, 4, '2023-10-14 07:08:30', 'Franklin', 'CLOUD COMPUTING'),
(14, 7, 1, '2023-10-14 07:09:01', 'Gaurav', 'AI MODERN APPROACH');

-- --------------------------------------------------------

--
-- Table structure for table `authorcredibility`
--

CREATE TABLE `authorcredibility` (
  `id` int(11) NOT NULL,
  `textbook_id` int(11) DEFAULT NULL,
  `textbook_title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number_of_authors` int(11) DEFAULT NULL,
  `qualification` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `expertise` int(11) DEFAULT NULL,
  `sumA` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authorcredibility`
--

INSERT INTO `authorcredibility` (`id`, `textbook_id`, `textbook_title`, `name`, `number_of_authors`, `qualification`, `experience`, `expertise`, `sumA`) VALUES
(1, NULL, NULL, NULL, 8, 3, 4, 25, NULL),
(2, NULL, NULL, NULL, 8, 4, 3, 25, 40),
(3, 1, 'AI MODERN APPROACH', 'Shivam', 8, 3, 3, 25, 39),
(4, 4, 'CLOUD COMPUTING', 'Peter', 10, 4, 4, 28, 46),
(5, 5, 'BIG DATA ANALYTICS', 'Gaurav', 10, 4, 4, 29, 47);

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `Committee_ID` int(11) NOT NULL,
  `Committee_Name` varchar(255) NOT NULL,
  `Decision_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Decision_Summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ethicalissues`
--

CREATE TABLE `ethicalissues` (
  `id` int(11) NOT NULL,
  `data_fabrication` tinyint(1) DEFAULT NULL,
  `plagiarism` tinyint(1) DEFAULT NULL,
  `citation_bias` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ethicalissues`
--

INSERT INTO `ethicalissues` (`id`, `data_fabrication`, `plagiarism`, `citation_bias`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 0),
(5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `generalassessment`
--

CREATE TABLE `generalassessment` (
  `id` int(11) NOT NULL,
  `uniqueness_score` int(11) DEFAULT NULL,
  `uniqueness_conveyed_clearly` int(11) DEFAULT NULL,
  `stayed_focused_on_uniqueness` int(11) DEFAULT NULL,
  `deals_with_curriculum_syllabus` int(11) DEFAULT NULL,
  `sumC` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generalassessment`
--

INSERT INTO `generalassessment` (`id`, `uniqueness_score`, `uniqueness_conveyed_clearly`, `stayed_focused_on_uniqueness`, `deals_with_curriculum_syllabus`, `sumC`) VALUES
(1, 4, 2, 3, 1, NULL),
(2, 4, 0, 1, 2, 7),
(3, 4, 0, 1, 2, 7),
(4, 4, 2, 3, 3, 12),
(5, 5, 2, 3, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `illustrations`
--

CREATE TABLE `illustrations` (
  `id` int(11) NOT NULL,
  `colour` int(11) DEFAULT NULL,
  `clarity_resolution` int(11) DEFAULT NULL,
  `visibility_color` int(11) DEFAULT NULL,
  `labelling` int(11) DEFAULT NULL,
  `relevance_to_content` int(11) DEFAULT NULL,
  `sumG` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `illustrations`
--

INSERT INTO `illustrations` (`id`, `colour`, `clarity_resolution`, `visibility_color`, `labelling`, `relevance_to_content`, `sumG`) VALUES
(1, 9, 4, 4, 3, 2, NULL),
(2, 9, 4, 4, 3, 2, 22),
(3, 9, 4, 5, 3, 2, 23),
(4, 9, 4, 4, 5, 2, 24),
(5, 9, 5, 4, 4, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `languageassessment`
--

CREATE TABLE `languageassessment` (
  `id` int(11) NOT NULL,
  `language_simple` int(11) DEFAULT NULL,
  `standard_technical_terminology` int(11) DEFAULT NULL,
  `standard_punctuation_marks_symbols` int(11) DEFAULT NULL,
  `language_accurate_precise` int(11) DEFAULT NULL,
  `context_clues_for_difficult_terms` int(11) DEFAULT NULL,
  `free_from_grammatical_mistakes` int(11) DEFAULT NULL,
  `free_from_fragments_runon_complex_sentences` int(11) DEFAULT NULL,
  `correct_capitalization_spelling_paragraphs` int(11) DEFAULT NULL,
  `sumF` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languageassessment`
--

INSERT INTO `languageassessment` (`id`, `language_simple`, `standard_technical_terminology`, `standard_punctuation_marks_symbols`, `language_accurate_precise`, `context_clues_for_difficult_terms`, `free_from_grammatical_mistakes`, `free_from_fragments_runon_complex_sentences`, `correct_capitalization_spelling_paragraphs`, `sumF`) VALUES
(1, 0, 1, 2, 3, 2, 1, 0, 1, NULL),
(2, 0, 1, 2, 3, 2, 1, 0, 3, 12),
(3, 0, 1, 2, 3, 2, 1, 0, 1, 10),
(4, 1, 2, 3, 3, 2, 1, 2, 3, 17),
(5, 0, 2, 3, 3, 3, 3, 2, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `physicalappearancestructure`
--

CREATE TABLE `physicalappearancestructure` (
  `id` int(11) NOT NULL,
  `cover_attractiveness` int(11) DEFAULT NULL,
  `cover_relevance` int(11) DEFAULT NULL,
  `book_dimensions` int(11) DEFAULT NULL,
  `book_bulkiness` int(11) DEFAULT NULL,
  `paper_quality` int(11) DEFAULT NULL,
  `printing_colors` int(11) DEFAULT NULL,
  `page_layout` int(11) DEFAULT NULL,
  `font_type` int(11) DEFAULT NULL,
  `font_size` int(11) DEFAULT NULL,
  `font_consistency` int(11) DEFAULT NULL,
  `teaching_hours` int(11) DEFAULT NULL,
  `learning_objectives` int(11) DEFAULT NULL,
  `introductory_section` int(11) DEFAULT NULL,
  `table_of_contents` int(11) DEFAULT NULL,
  `abbreviations` int(11) DEFAULT NULL,
  `chapter_summary` int(11) DEFAULT NULL,
  `text_structure` int(11) DEFAULT NULL,
  `content_activities` int(11) DEFAULT NULL,
  `topic_distribution` int(11) DEFAULT NULL,
  `highlighted_keywords` int(11) DEFAULT NULL,
  `mistakes_and_reiteration` int(11) DEFAULT NULL,
  `sumD` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `physicalappearancestructure`
--

INSERT INTO `physicalappearancestructure` (`id`, `cover_attractiveness`, `cover_relevance`, `book_dimensions`, `book_bulkiness`, `paper_quality`, `printing_colors`, `page_layout`, `font_type`, `font_size`, `font_consistency`, `teaching_hours`, `learning_objectives`, `introductory_section`, `table_of_contents`, `abbreviations`, `chapter_summary`, `text_structure`, `content_activities`, `topic_distribution`, `highlighted_keywords`, `mistakes_and_reiteration`, `sumD`) VALUES
(1, 3, 3, 4, 4, 4, 2, 4, 8, 7, 6, 12, 3, 2, 3, 2, 3, 3, 3, 4, 2, 4, NULL),
(2, 3, 3, 4, 3, 4, 5, 4, 8, 7, 6, 12, 3, 3, 3, 4, 3, 3, 3, 4, 2, 4, 91),
(3, 3, 3, 2, 3, 4, 4, 2, 8, 7, 6, 12, 2, 3, 3, 4, 3, 3, 3, 4, 3, 4, 86),
(4, 5, 5, 4, 4, 5, 5, 4, 8, 7, 7, 12, 3, 5, 3, 4, 5, 3, 5, 2, 3, 4, 103),
(5, 4, 3, 4, 5, 2, 3, 5, 9, 10, 8, 13, 4, 3, 2, 5, 4, 3, 4, 5, 5, 4, 105);

-- --------------------------------------------------------

--
-- Table structure for table `publishercredibility`
--

CREATE TABLE `publishercredibility` (
  `id` int(11) NOT NULL,
  `publisher_credibility` int(11) DEFAULT NULL,
  `sumB` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishercredibility`
--

INSERT INTO `publishercredibility` (`id`, `publisher_credibility`, `sumB`) VALUES
(1, 20, NULL),
(2, 23, 23),
(3, 23, 23),
(4, 25, 25),
(5, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `Recommendation_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Textbook_ID` int(11) NOT NULL,
  `Recommendation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Reason_for_Recommendation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Review_ID` int(11) NOT NULL,
  `Reviewer_User_ID` int(11) NOT NULL,
  `Textbook_ID` int(11) NOT NULL,
  `Review_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Readability_Rating` int(11) DEFAULT NULL,
  `Accuracy_Rating` int(11) DEFAULT NULL,
  `Completeness_Rating` int(11) DEFAULT NULL,
  `Comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjectmatter`
--

CREATE TABLE `subjectmatter` (
  `id` int(11) NOT NULL,
  `classical_references` int(11) DEFAULT NULL,
  `recent_advances` int(11) DEFAULT NULL,
  `interpreted_concluded` int(11) DEFAULT NULL,
  `clear_accurate` int(11) DEFAULT NULL,
  `comprehensiveness` int(11) DEFAULT NULL,
  `self_explanatory` int(11) DEFAULT NULL,
  `supported_references` int(11) DEFAULT NULL,
  `consistency_to_curriculum` int(11) DEFAULT NULL,
  `understandable_to_learners` int(11) DEFAULT NULL,
  `facilitating_students_learn` int(11) DEFAULT NULL,
  `promoting_higher_order` int(11) DEFAULT NULL,
  `well_formed_content` int(11) DEFAULT NULL,
  `clear_meaning` int(11) DEFAULT NULL,
  `focused_content` int(11) DEFAULT NULL,
  `definitions_explained` int(11) DEFAULT NULL,
  `balanced_viewpoints` int(11) DEFAULT NULL,
  `no_bias_content` int(11) DEFAULT NULL,
  `no_discrimination` int(11) DEFAULT NULL,
  `resources_for_reading` int(11) DEFAULT NULL,
  `bibliography_citations` int(11) DEFAULT NULL,
  `sumE` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectmatter`
--

INSERT INTO `subjectmatter` (`id`, `classical_references`, `recent_advances`, `interpreted_concluded`, `clear_accurate`, `comprehensiveness`, `self_explanatory`, `supported_references`, `consistency_to_curriculum`, `understandable_to_learners`, `facilitating_students_learn`, `promoting_higher_order`, `well_formed_content`, `clear_meaning`, `focused_content`, `definitions_explained`, `balanced_viewpoints`, `no_bias_content`, `no_discrimination`, `resources_for_reading`, `bibliography_citations`, `sumE`) VALUES
(1, 3, 4, 2, 3, 4, 3, 4, 3, 2, 2, 2, 2, 3, 3, 3, 2, 2, 2, 2, 4, NULL),
(2, 4, 3, 4, 3, 4, 4, 3, 4, 2, 2, 2, 1, 3, 1, 3, 2, 3, 1, 2, 4, 55),
(3, 4, 4, 2, 5, 4, 4, 3, 3, 2, 3, 2, 1, 2, 1, 3, 1, 2, 1, 2, 4, 53),
(4, 3, 4, 5, 5, 4, 4, 3, 3, 2, 2, 1, 3, 3, 1, 2, 2, 3, 1, 1, 4, 56),
(5, 4, 4, 4, 3, 4, 5, 3, 4, 2, 2, 1, 3, 1, 3, 2, 2, 2, 1, 2, 5, 57);

-- --------------------------------------------------------

--
-- Table structure for table `textbooks`
--

CREATE TABLE `textbooks` (
  `Textbook_ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `Publication_Date` date NOT NULL,
  `File_Path` varchar(255) NOT NULL,
  `Upload_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Uploader_User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `textbooks`
--

INSERT INTO `textbooks` (`Textbook_ID`, `Title`, `Author`, `Publisher`, `Publication_Date`, `File_Path`, `Upload_Date`, `Uploader_User_ID`) VALUES
(1, 'AI MODERN APPROACH', 'PETER NORVIG', 'PETER NORVIG', '2011-06-09', 'uploads/AI.pdf', '2023-09-12 12:19:38', 1),
(2, 'RESUME', 'SHIVAM', 'SHIVAM', '2023-09-01', 'uploads/Shivam Ravindra Kopare_InternshalaResume.pdf', '2023-09-15 11:58:35', 3),
(3, 'sdafsfafafas', 'sadfasfsfaas', 'fdsafasfsfsa', '2023-02-07', 'uploads/1. TT 23-24 ODD_V2.pdf', '2023-10-09 13:14:56', 4),
(4, 'CLOUD COMPUTING', 'Nitin', 'Nitin', '2021-06-08', 'uploads/Cloud Computing Nirali.pdf', '2023-10-09 13:20:43', 4),
(5, 'BIG DATA ANALYTICS', 'Nitin Sakhare', 'Nitin Sakhare', '2019-06-04', 'uploads/Big Dada Analytics Nirali.pdf', '2023-10-09 13:21:42', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userform`
--

CREATE TABLE `userform` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'uploads/user.png',
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userform`
--

INSERT INTO `userform` (`id`, `username`, `email`, `image`, `password`, `cpassword`, `mobile`, `address`) VALUES
(1, 'Peter Parker', 'peter@gmail.com', 'uploads/male_pic.png', '$2y$10$zoiU6RDH7ZVm0R6MLqMSWuEfnHCoLuHYZJctRXo1JQtobms7zQb/.', '$2y$10$h5Yk.R8QNR/a8pOp9nFB4O3iJqALwFbtB.8fxqkEzAfGYBS6vhtba', '8600603358', 'New York'),
(3, 'admin', 'admin@gmail.com', 'uploads/admin.jpg', '$2y$10$54IE6D6uFPNMz3Y4kCRWg.98ug9sHJcPeTtprrXfZiUwcmxKyHNZW', '$2y$10$KGKHP1czXPxpMXcEqTOrsuavmh/L4qT/FemHbCOof/mkywgIW8czu', '', ''),
(4, 'Miles', 'mile@gmail.com', 'uploads/user.png', '$2y$10$V9ogXr36d0q3wHfJAhJWN.vINJbopArJqnf9PzvnakVsbM6wtN/92', '$2y$10$LUJm7aAIxpkeRj9Xd.wW1.1MCbJWQAfxOTUj7YkbpRmTjOatf.34G', '', ''),
(5, 'Shantanu', 'shantanu@gmail.com', 'uploads/user.png', '$2y$10$AAf3XeQiwYC1K1ZoWZF7/eDNRtJu6CoZSJlQ1pIm9kzFGwsNcAbOa', '$2y$10$kDUGi5TzkUs9Jh2SQYXoWOW81x4APfD6OiK2eVqhOp/PXfcM5XBpe', '', ''),
(6, 'Ajyol', 'ajyol1@gmail.com', 'uploads/user.png', '$2y$10$r1Mr42wj6xCgToPr1yaGg.srJe8ByrWW54PFCJJbFXQnYhJRbj0/K', '$2y$10$Te1tqL5myfbOD2lzH4P3JeFGSW8q7OWphW4rcvBtCKMA5oLrfzVAa', '', ''),
(7, 'Gaurav', 'gaurav4@gmail.com', 'uploads/user.png', '$2y$10$B2joVV.jb7NHhZ7oVTI95OMY0F0vC/zGkwX8SDHFaqJSTTB5Wp0iC', '$2y$10$blEsMUKGOsyYlvGr3KnZRuc4CsQ5oR2E06LwMqi2ZWx3.lDH2aSMe', '', ''),
(8, 'Franklin', 'franklin2@gmail.com', 'uploads/medium-kingsinghr164-hanuman-chalisa-paper-poster-for-home-original-imaevyvsmpfbzwhq.png', '$2y$10$9vHAwH9icXqwY9frg87dIu9znYqbsmSyDpgiPMT2P6wqWTIvuGBhC', '$2y$10$B9iL/jwhtPwlVQ78BGrg.umZIUgqznnNyyN64lKr6cPWyFUfYPyb.', '', ''),
(9, 'Shivam', 'shivamkopare@gmail.com', 'uploads/user.png', '$2y$10$KUoQvvyT.avtC5a/CC4/AeaQ5kgSFrIVyMxKhXYmnz25erHZKcU9G', '$2y$10$nPqIq1KxYkk/NeZWmbMin.i7oRZh8P0Q4x6FBBRbxVGtz3SNEtyyq', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_textbooks`
--
ALTER TABLE `assigned_textbooks`
  ADD PRIMARY KEY (`Assignment_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Textbook_ID` (`Textbook_ID`);

--
-- Indexes for table `authorcredibility`
--
ALTER TABLE `authorcredibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`Committee_ID`);

--
-- Indexes for table `ethicalissues`
--
ALTER TABLE `ethicalissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalassessment`
--
ALTER TABLE `generalassessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illustrations`
--
ALTER TABLE `illustrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languageassessment`
--
ALTER TABLE `languageassessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physicalappearancestructure`
--
ALTER TABLE `physicalappearancestructure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishercredibility`
--
ALTER TABLE `publishercredibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`Recommendation_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Textbook_ID` (`Textbook_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Reviewer_User_ID` (`Reviewer_User_ID`),
  ADD KEY `Textbook_ID` (`Textbook_ID`);

--
-- Indexes for table `subjectmatter`
--
ALTER TABLE `subjectmatter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textbooks`
--
ALTER TABLE `textbooks`
  ADD PRIMARY KEY (`Textbook_ID`),
  ADD KEY `Uploader_User_ID` (`Uploader_User_ID`);

--
-- Indexes for table `userform`
--
ALTER TABLE `userform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_textbooks`
--
ALTER TABLE `assigned_textbooks`
  MODIFY `Assignment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `authorcredibility`
--
ALTER TABLE `authorcredibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `Committee_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ethicalissues`
--
ALTER TABLE `ethicalissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `generalassessment`
--
ALTER TABLE `generalassessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `illustrations`
--
ALTER TABLE `illustrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languageassessment`
--
ALTER TABLE `languageassessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `physicalappearancestructure`
--
ALTER TABLE `physicalappearancestructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publishercredibility`
--
ALTER TABLE `publishercredibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `Recommendation_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjectmatter`
--
ALTER TABLE `subjectmatter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `textbooks`
--
ALTER TABLE `textbooks`
  MODIFY `Textbook_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userform`
--
ALTER TABLE `userform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_textbooks`
--
ALTER TABLE `assigned_textbooks`
  ADD CONSTRAINT `assigned_textbooks_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `userform` (`id`),
  ADD CONSTRAINT `assigned_textbooks_ibfk_2` FOREIGN KEY (`Textbook_ID`) REFERENCES `textbooks` (`Textbook_ID`);

--
-- Constraints for table `ethicalissues`
--
ALTER TABLE `ethicalissues`
  ADD CONSTRAINT `ethicalissues_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `generalassessment`
--
ALTER TABLE `generalassessment`
  ADD CONSTRAINT `generalassessment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `illustrations`
--
ALTER TABLE `illustrations`
  ADD CONSTRAINT `illustrations_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `languageassessment`
--
ALTER TABLE `languageassessment`
  ADD CONSTRAINT `languageassessment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `physicalappearancestructure`
--
ALTER TABLE `physicalappearancestructure`
  ADD CONSTRAINT `physicalappearancestructure_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `publishercredibility`
--
ALTER TABLE `publishercredibility`
  ADD CONSTRAINT `publishercredibility_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `userform` (`id`),
  ADD CONSTRAINT `recommendations_ibfk_2` FOREIGN KEY (`Textbook_ID`) REFERENCES `textbooks` (`Textbook_ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Reviewer_User_ID`) REFERENCES `userform` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`Textbook_ID`) REFERENCES `textbooks` (`Textbook_ID`);

--
-- Constraints for table `subjectmatter`
--
ALTER TABLE `subjectmatter`
  ADD CONSTRAINT `subjectmatter_ibfk_1` FOREIGN KEY (`id`) REFERENCES `authorcredibility` (`id`);

--
-- Constraints for table `textbooks`
--
ALTER TABLE `textbooks`
  ADD CONSTRAINT `textbooks_ibfk_1` FOREIGN KEY (`Uploader_User_ID`) REFERENCES `userform` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
