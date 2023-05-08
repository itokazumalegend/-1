<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>利用者登録</title>
		<link rel="stylesheet"href="style.css">
		<?php
			include(dirname(__FILE__) . '/../common/utility.php');
		?>
	</head>
	<body>
		<?php
			$_SESSION['uNum']="";
			$_SESSION['uName']="";
			$_SESSION['uPass']="";
			$_SESSION['uSex']="";
			$_SESSION['uGrade']="";
			$_SESSION['uFlag']="";
			$_SESSION['uDivision']="";
			$_SESSION['UorA']=1;
		?>
		<h1>利用者登録</h1>
		<form method="post" action="users_resist.php">
			<table border="1">
				<tr>
					<th>利用者番号</th>
					<td>
						<input id="usersNumber"type="text"size="30" name="usersNumber">
					</td>
					<button id = "usersSerch" type="submit" name="usersSerch">検索する</button>
					<?php
						if(isset($_POST['usersSerch'])){
							$serch = FuncSelectSql("SELECT * FROM users WHERE user_number='".$_POST['usersNumber']."'");
							foreach ($serch as $serchLoop){}
							if(isset($serchLoop['user_number'])==true){
								$_SESSION['uNum']=$serchLoop['user_number'];
								$_SESSION['uName']=$serchLoop['user_name'];
								$_SESSION['uPass']=$serchLoop['Password'];
								$_SESSION['uSex']=$serchLoop['sex_type'];
								$_SESSION['uGrade']=$serchLoop['school_year'];
								$_SESSION['uFlag']=$serchLoop['use_type'];
								$_SESSION['uDivision']=$serchLoop['user_type'];
								$_SESSION['UorA'] = 0;
								header("Location:./users_resist_update.php");
							}else{
								$_SESSION['uNum']=$_POST['usersNumber'];
								$_SESSION['uName']=$_POST['usersName'];
								$_SESSION['uPass']=$_POST['usersPassword'];
								$_SESSION['uSex']=$_POST['sex'];
								$_SESSION['uGrade']=$_POST['grade'];
								$_SESSION['uFlag']=$_POST['flag'];
								$_SESSION['uDivision']=$_POST['division'];
								$_SESSION['UorA']=1;
								header("Location:./users_resist_add.php");
							}
						}	
					?>
				</tr>
				<tr>
					<th>氏名</th>
					<td><input id="usersName"type="text" name="usersName"size=30></td>
				</tr>
				<tr>
					<th>性別</th>
					<td>
						<select name='sex'>
							<option value='1'>1</option>
							<option value='2'>2</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>学年</th>
					<td>
						<select name='grade'>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>利用可否フラグ</th>
					<td>
					<select name='flag'>
						<option value='0'>0</option>
						<option value='9'>9</option>
					</select>
					</td>
				</tr>
				<tr>
					<th>パスワード</th>
					<td><input id="usersPassword"type="password"size="30" name="usersPassword"></td>
				</tr>
                <tr>
					<th>
						区分
					</th>
					<td>
					<select name='division'>
						<option value='0'>0</option>
						<option value='1'>1</option>
					</select>
					</td>
				</tr>
				<td colspan="2">
					<button type="submit" name="Submit">登録する</button>
					<?php
						if(isset($_POST['Submit'])){
							$_SESSION['uNum']=$_POST['usersNumber'];
							$_SESSION['uName']=$_POST['usersName'];
							$_SESSION['uPass']=$_POST['usersPassword'];
							$_SESSION['uSex']=$_POST['sex'];
							$_SESSION['uGrade']=$_POST['grade'];
							$_SESSION['uFlag']=$_POST['flag'];
							$_SESSION['uDivision']=$_POST['division'];
							$serch = FuncSelectSql("SELECT * FROM users WHERE user_number='".$_POST['usersNumber']."'");
							foreach ($serch as $serchLoop){}
							if($_SESSION['uNum'] == $serchLoop['user_number']){
								$_SESSION['UorA']=0;
								header("Location:./users_resist_update.php");
							}
							header("Location:./users_resist_submit.php");
						}
					?>
					<button type="submit" name="Return">戻る</button>
					<?php
						if(isset($_POST['Return'])){
							$_SESSION['uNum']=$_POST['usersNumber'];
							$_SESSION['uName']=$_POST['usersName'];
							$_SESSION['uPass']=$_POST['usersPassword'];
							$_SESSION['uSex']=$_POST['sex'];
							$_SESSION['uGrade']=$_POST['grade'];
							$_SESSION['uFlag']=$_POST['flag'];
							$_SESSION['uDivision']=$_POST['division'];
							header("Location:./users_resist_return.php");
						}
					?>
					<button type="reset" name="Clear">クリア</button>
				</td>
			</table>
		</form>
	</body>
</html>