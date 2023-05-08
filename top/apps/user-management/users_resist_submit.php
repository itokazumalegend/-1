<?php
	session_start();
	echo $_SESSION['UorA'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>登録確認</title>
		<link rel="stylesheet"href="style.css">
		<?php
			include(dirname(__FILE__) . '/../common/utility.php');
		?>
	</head>
	<body>
		<form method="post"action="users_resist_submit.php">
		<?php
			if(empty($_SESSION['uNum'])||empty($_SESSION['uName'])||empty($_SESSION['uPass'])){
				echo "入力事項が入力されていません。";
				exit;
			}
		?>
		<h1>登録しますか？</h1>
		<button type="submit" name="userSubmitYes">はい</button>
        <button type="submit" name="userSubmitNo">いいえ</button>
		<?php
			if(isset($_POST['userSubmitYes'])){
				if($_SESSION['UorA'] == 1){
					FuncExecuteSql("INSERT INTO users VALUES('".$_SESSION['uNum']."','".$_SESSION['uName']."','".$_SESSION['uSex']."','".$_SESSION['uGrade']."','".$_SESSION['uFlag']."','".$_SESSION['uPass']."','".$_SESSION['uDivision']."')");
					header("Location:./users_resist.php");
				} else{
					FuncExecuteSql("UPDATE users SET user_name='".$_SESSION['uName']."',sex_type='".$_SESSION['uSex']."',school_year='".$_SESSION['uGrade']."',use_type='".$_SESSION['uFlag']."',password='".$_SESSION['uPass']."',user_type='".$_SESSION['uDivision']."' WHERE user_number='".$_SESSION['uNum']."'");
					header("Location:./users_resist.php");
				}
			}
			if(isset($_POST['userSubmitNo'])){
				header("Location:./users_resist.php");
			}
		?>
	</body>
</html>