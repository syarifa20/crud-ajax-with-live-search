<?php 
require 'dbcon.php';

$query = "SELECT * FROM `students` WHERE 
				`name` LIKE '%$keyword%' OR
				`email` LIKE '%$keyword%' OR
				`phone` LIKE '%$keyword%' OR
				`course` LIKE '%$keyword%'
				ORDER BY `id` DESC
	";

if(@$_GET['keyword'] == @$_POST['keyword']):
    if(@$_POST['keyword']):
      usleep(700000);
      $viewData =@$_POST['keyword'];
    endif;
endif;

?>