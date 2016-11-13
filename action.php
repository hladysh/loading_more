<?php 
include("connect.php");
header("Content-type: text/html; charset=windows-1251");

if(isset($_GET['num'])){
	$num = $_GET['num'];
	$result = mysql_query("SELECT * FROM lesson_comment LIMIT $num, 5",$db); //����������� �� ������� 5 ������������ ������� � $num
	
	if(mysql_num_rows($result) > 0){	
		$comment = mysql_fetch_array($result);	
		
		do{
			$num++;
			printf("<div class='commentBlock'>
						<div class='name'>%s. %s</div>
						<div class='text'>%s</div>
					</div>",$num,$comment['author'],$comment['text']);		
		}while($comment = mysql_fetch_array($result));
		
		sleep(1); //������� �������� � 1 ������� ����� ����� ���������� ���������� �������
	}else{
		echo 0; //���� ������ �����������
	}
	
}

?>