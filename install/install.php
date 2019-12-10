<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/16/19
 * Time: 12:12 AM
 */

include_once 'index.php';

$sql = 'CREATE TABLE `xpeed`.`sales` 
  ( 
     `id`          BIGINT NOT NULL auto_increment, 
     `amount`      INT(10) NOT NULL, 
     `buyer`       VARCHAR(255) NOT NULL, 
     `receipt_id`  VARCHAR(20) NOT NULL, 
     `items`       VARCHAR(255) NOT NULL, 
     `buyer_email` VARCHAR(50) NOT NULL, 
     `buyer_ip`    VARCHAR(20) NOT NULL, 
     `note`        TEXT NOT NULL, 
     `city`        VARCHAR(20) NOT NULL, 
     `phone`       VARCHAR(20) NOT NULL, 
     `hash_key`    VARCHAR(255) NOT NULL, 
     `entry_at`    DATE NOT NULL, 
     `entry_by`    INT(10) NOT NULL, 
     PRIMARY KEY (`id`) 
  ) 
engine = innodb;';

$_db = \DB\Database::getDatabase();
$_db->query($sql);
