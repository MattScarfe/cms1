<?php

// Initiate New Tables

require('config/connect.php');

if(!$connection) {
	die("Connection Failed: " . mysqli_connect_error());
}

$errors = [];

$sql1 =
"CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

  
$sql2 =
" CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caturl` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";  

$sql3 =
" CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `catid` varchar(255) NOT NULL,
  `subcatid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `publishtime` datetime NOT NULL,
  `featuredimage` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;";

$sql4 = 
" CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `submittime` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";
  
$sql5 =
" CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$sql6 =
"INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'logo', 'img/site-logo.png'),
(2, 'ad', 'your ad code here'),
(3, 'perpage', '2'),
(4, 'sitename', 'Coding Cyber');
 
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
  
$queries = [$sql1, $sql2, $sql3, $sql4, $sql5, $sql6]; 

foreach($queries as $q => $sql){
if (mysqli_query($connection, $sql)) {
    echo "Table $q created successfully <br />";
} else {
    echo "Error creating table $q: " . mysqli_error($connection) . "<br />";
}
}
mysqli_close($connection);