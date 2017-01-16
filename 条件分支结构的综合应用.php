<?php
	$numbers = Null;
	function checkmembers($members){
		if($members<1){
			echo "我们不能为少于一人的顾客提供房间。<br/>";
		}else{
			echo "欢迎来到  GoodHome 酒店。<br/>";
		}
	}
	
	checkmembers(2);
	checkmembers(0.5);
	function checkmembersforroom($members){
		if($memebers<1){
			echo "我们不能为少于一人的顾客提供房间。<br/>";
		}elseif($members==1){
			echo "欢迎来到  GoodHome 酒店。我们将为您准备单床房间。<br/>";
		}elseif($members == 2){
			echo "欢迎来到  GoodHome 酒店，我们将为您准备标准间。<br/>";
		}elseif($members==3){
			echo "欢迎来到  GoodHome 酒店，我们将为您准备三床房间。<br/>";
		}else{
			echo "请直接电话联系我们，我们将依照具体情况为您准备合适的房间。《br/>";
		}
	}
	checkmembersforroom(1);
	checkmembersforroom(2);
	checkmembersforroom(3);
	checkmembersforroom(5);
	function switchrooms($members){
		switch($members){
			case 1:
			echo "欢迎来到  GoodHome 酒店，我们将为您准备单床房。<br/>";
			break;
			case 2:
			echo "欢迎来到  GoodHome 酒店，我们将为您准备标准间。 <br/>";
			break;
			case 3:
			echo "欢迎来到 GoodHome 酒店，我们将为您准备三床房。<br/>";
			break;
			default:
			echo "请直接电话联系我们， 我们将为您依照具体情况为您准备合适的房间。";
			break;
		}
	}
	
	switchrooms(1);
	switchrooms(2);
	switchrooms(3);
	switchrooms(5);
?>