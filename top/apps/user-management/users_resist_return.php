<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>登録確認</title>
		<link rel="stylesheet"href="style.css">
	</head>
	<?php
		session_start();
	?>
	<body>
		<h1>窓口管理メニューに戻りますか？</h1>
		<input id = "userClearYes" type="button"value="はい">	
        <input id = "userClearNo" type="button"value="いいえ">
		<script>
			document.getElementById("userClearYes").onclick = function() {
				location.href = "../common/menu.php";
			}
			document.getElementById("userClearNo").onclick = function() {
				location.href = "users_resist.php";
			}
		</script>
	</body>
</html>