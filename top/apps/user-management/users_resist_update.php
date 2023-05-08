<html>
	<head>
		<meta charset="utf-8">
		<title>利用者登録</title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="../../js/user_resist.js" charset="utf-8"></script>
		<?php
			include(dirname(__FILE__) . '/../common/utility.php');
		?>
	</head>
	<body>
		<?php
			session_start();
			$_SESSION['UorA'] = 0;
		?>
		<h1>利用者登録</h1>
		<form method="post" action="users_resist_update.php">
		<label>更新</label>
			<table border="1">
				<tr>
					<th>利用者番号</th>
					<td>
						<input type="text"name="usersNumber"value="<?php echo $_SESSION['uNum'];?>
						"size=30>
					</td>
				</tr>
				<tr>
					<th>氏名</th>
					<td>
						<input type="text"name="usersName"value="<?php echo $_SESSION['uName'];?>"size=30>
					</td>
				</tr>
				<tr>
					<th>性別</th>
					<td>
						<select name='sex'>
							<option value='1'>1</option>
							<option value='2'>2</option>
						</select>
					</td>
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
					<td>
					<input type="password"name="usersPassword"value="
					<?php
						echo $_SESSION['uPass'];
					?>
					"size=30>
					</td>
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
							header("Location:./users_resist_submit.php");
						}
					?>
					<button type="submit" name="Return">戻る</button>
					<?php
						if(isset($_POST['Return'])){
							header("Location:./users_resist_return.php");
						}
					?>
					<button type="reset" name="Clear">クリア</button>
				</td>
			</table>
		</form>
	</body>