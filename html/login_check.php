<?php
	session_start();
	include ("connect.php");
	
	$id = $_GET['id'];
	
	$query = "select pw from users where id='$id'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
if(empty($id) or empty($row) ){
	echo "<script>window.alert('아이디 또는 비밀번호가 잘못 입력 되었습니다.');</script>";
	echo "<script>location.href='index.html';</script>";
}else{	
        if($row['pw'] == hash('md5', $_GET['pw'])){
		$_SESSION['id']=$row['id'];
		$_SESSION['name']=$row['name'];
                echo "<script>window.alert('로그인 되었습니다.');</script>";
		echo "<script>location.href='login.html';</script>";
	}else{
		echo "<script>window.alert('아이디 또는 비밀번호가 잘못 입력 되었습니다.');</script>";
		echo "<script>location.href='index.html';</script>";
	}
}
?>
