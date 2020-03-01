<?php
/**
 * php实现排序
 * @author dj
 */

require '../vendor/autoload.php';

use sort;

$params = array(9,5,4,8,2,3,1,6,7,10);
var_dump(sort\Sort::insertSort($params));

$sort = new sort\Sort();
var_dump($a->quickSort($params));
?>