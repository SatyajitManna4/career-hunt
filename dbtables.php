<?php
include("dbconfig.php");
$sql = "CREATE TABLE superadmin(
ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name text NOT NULL,
email text NOT NULL,
password text NOT NULL,
role text NOT NULL,
reg_date  VARCHAR(20) NOT NULL,
mod_date TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Table superadmin created successfully";
}
 $sql = "CREATE TABLE leads(
ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name text NOT NULL,
email text NOT NULL,
mobile text NOT NULL, 
state text NOT NULL,
city text NOT NULL,
course text NOT NULL,
college text NOT NULL,
utm_source text NOT NULL,
utm_medium text NOT NULL,
utm_campaign text NOT NULL,
reg_date  VARCHAR(20) NOT NULL,
mod_date TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
if ($conn->query($sql) === TRUE) {
   echo "Table leads created successfully";
}    
 $sql = "CREATE TABLE colleges(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name text NOT NULL,
slug text NOT NULL,
description longtext NOT NULL,
state text NOT NULL,
city text NOT NULL,
course text NOT NULL,
fees text NOT NULL,
image text NOT NULL,
reg_date  VARCHAR(20) NOT NULL,
mod_date TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
if ($conn->query($sql) === TRUE) {
   echo "Table options created successfully";
}   
 $sql = "CREATE TABLE news(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name text NOT NULL,
slug text NOT NULL,
description longtext NOT NULL,
image text NOT NULL,
reg_date  VARCHAR(20) NOT NULL,
mod_date TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
if ($conn->query($sql) === TRUE) {
   echo "Table news created successfully";
}
/* mysqli_query($conn,"drop table colleges"); */
?>