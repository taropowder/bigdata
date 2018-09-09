-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-09-09 21:52:24
-- 服务器版本： 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigdata`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `time` date NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `announcement_file`
--

CREATE TABLE `announcement_file` (
  `id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `file_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `answer` text CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `starttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `blogedit`
--

CREATE TABLE `blogedit` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `starttime` datetime NOT NULL,
  `overtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `blog_like`
--

CREATE TABLE `blog_like` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `blog_login`
--

CREATE TABLE `blog_login` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_journal`
--

CREATE TABLE `data_journal` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `journalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_journal_download`
--

CREATE TABLE `data_journal_download` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_login`
--

CREATE TABLE `data_login` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `logintime` datetime NOT NULL,
  `logouttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_meeting`
--

CREATE TABLE `data_meeting` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `meetingid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_research`
--

CREATE TABLE `data_research` (
  `id` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `researchid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_school`
--

CREATE TABLE `data_school` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_school_file`
--

CREATE TABLE `data_school_file` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `file_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `data_view`
--

CREATE TABLE `data_view` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `file_time`
--

CREATE TABLE `file_time` (
  `id` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `file_type_doc`
--

CREATE TABLE `file_type_doc` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `file_type_file`
--

CREATE TABLE `file_type_file` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `file_type_pic`
--

CREATE TABLE `file_type_pic` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `file_type_tool`
--

CREATE TABLE `file_type_tool` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `followuser` int(11) NOT NULL,
  `followeduser` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `forum_answer_question`
--

CREATE TABLE `forum_answer_question` (
  `id` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL,
  `answer_question` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `forum_ask_question`
--

CREATE TABLE `forum_ask_question` (
  `id` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL,
  `question` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `forum_enter_time`
--

CREATE TABLE `forum_enter_time` (
  `id` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `forum_exit_time`
--

CREATE TABLE `forum_exit_time` (
  `id` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `forum_look`
--

CREATE TABLE `forum_look` (
  `id` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL,
  `ask_user` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `question` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `introduce`
--

CREATE TABLE `introduce` (
  `id` int(11) NOT NULL,
  `file_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `introduction`
--

CREATE TABLE `introduction` (
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `abstract` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `journal_file`
--

CREATE TABLE `journal_file` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `journal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `journal_login`
--

CREATE TABLE `journal_login` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `user` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `question` text CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `relax_action`
--

CREATE TABLE `relax_action` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `relax_time`
--

CREATE TABLE `relax_time` (
  `id` int(11) NOT NULL,
  `enter_time` datetime NOT NULL,
  `leave_time` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `relax_type_doc`
--

CREATE TABLE `relax_type_doc` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `relax_type_pic`
--

CREATE TABLE `relax_type_pic` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `relax_type_radio`
--

CREATE TABLE `relax_type_radio` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `relax_type_video`
--

CREATE TABLE `relax_type_video` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` date NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `way` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `result_file`
--

CREATE TABLE `result_file` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `result_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `school_file`
--

CREATE TABLE `school_file` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `register_IP` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `regster_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_file`
--
ALTER TABLE `announcement_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_id` (`announcement_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogedit`
--
ALTER TABLE `blogedit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_like`
--
ALTER TABLE `blog_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_login`
--
ALTER TABLE `blog_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_journal`
--
ALTER TABLE `data_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_journal_download`
--
ALTER TABLE `data_journal_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_meeting`
--
ALTER TABLE `data_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_research`
--
ALTER TABLE `data_research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_school`
--
ALTER TABLE `data_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_school_file`
--
ALTER TABLE `data_school_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_view`
--
ALTER TABLE `data_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_time`
--
ALTER TABLE `file_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_type_doc`
--
ALTER TABLE `file_type_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_type_file`
--
ALTER TABLE `file_type_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_type_pic`
--
ALTER TABLE `file_type_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_type_tool`
--
ALTER TABLE `file_type_tool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_answer_question`
--
ALTER TABLE `forum_answer_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_ask_question`
--
ALTER TABLE `forum_ask_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_enter_time`
--
ALTER TABLE `forum_enter_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_exit_time`
--
ALTER TABLE `forum_exit_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_look`
--
ALTER TABLE `forum_look`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_file`
--
ALTER TABLE `journal_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_login`
--
ALTER TABLE `journal_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relax_action`
--
ALTER TABLE `relax_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relax_time`
--
ALTER TABLE `relax_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relax_type_doc`
--
ALTER TABLE `relax_type_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relax_type_pic`
--
ALTER TABLE `relax_type_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relax_type_radio`
--
ALTER TABLE `relax_type_radio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relax_type_video`
--
ALTER TABLE `relax_type_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_file`
--
ALTER TABLE `result_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_file`
--
ALTER TABLE `school_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `announcement_file`
--
ALTER TABLE `announcement_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blogedit`
--
ALTER TABLE `blogedit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_like`
--
ALTER TABLE `blog_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `blog_login`
--
ALTER TABLE `blog_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_journal`
--
ALTER TABLE `data_journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_journal_download`
--
ALTER TABLE `data_journal_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_meeting`
--
ALTER TABLE `data_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_research`
--
ALTER TABLE `data_research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_school`
--
ALTER TABLE `data_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_school_file`
--
ALTER TABLE `data_school_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `data_view`
--
ALTER TABLE `data_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `file_time`
--
ALTER TABLE `file_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `file_type_doc`
--
ALTER TABLE `file_type_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `file_type_file`
--
ALTER TABLE `file_type_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `file_type_pic`
--
ALTER TABLE `file_type_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `file_type_tool`
--
ALTER TABLE `file_type_tool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `forum_answer_question`
--
ALTER TABLE `forum_answer_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `forum_ask_question`
--
ALTER TABLE `forum_ask_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `forum_enter_time`
--
ALTER TABLE `forum_enter_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `forum_exit_time`
--
ALTER TABLE `forum_exit_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `forum_look`
--
ALTER TABLE `forum_look`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `journal_file`
--
ALTER TABLE `journal_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `journal_login`
--
ALTER TABLE `journal_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `relax_action`
--
ALTER TABLE `relax_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `relax_time`
--
ALTER TABLE `relax_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `relax_type_doc`
--
ALTER TABLE `relax_type_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `relax_type_pic`
--
ALTER TABLE `relax_type_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `relax_type_radio`
--
ALTER TABLE `relax_type_radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `relax_type_video`
--
ALTER TABLE `relax_type_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `result_file`
--
ALTER TABLE `result_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `school_file`
--
ALTER TABLE `school_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 限制导出的表
--

--
-- 限制表 `announcement_file`
--
ALTER TABLE `announcement_file`
  ADD CONSTRAINT `announcement_file_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
