<?php

// Initiate New Tables

require('config/connect.php');

if(!$connection) {
	die("Connection Failed: " . mysqli_connect_error());
}

$sql =
"CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

  
$sql .=
"CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `caturl` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";  

$sql .=
"CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `catid` varchar(255) NOT NULL,
  `subcatid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` datetime NOT NULL,
  `publishtime` datetime NOT NULL,
  `featuredimage` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;";

$sql .= 
"CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `submittime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";
  
$sql .=
"CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `settings`
--
 
INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'logo', 'img/site-logo.png'),
(2, 'ad', 'your ad code here'),
(3, 'perpage', '2'),
(4, 'sitename', 'Coding Cyber');
 
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
  
if (mysqli_query($connection, $sql)) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . mysqli_error($connection);
}

mysqli_close($connection);