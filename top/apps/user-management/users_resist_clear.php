<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>登録確認</title>
		<link rel="stylesheet"href="style.css">
	</head>
	<body>
		<h1>画面をクリアしますか？</h1>
		<input type="reset" name="reset" value="入力内容を消去" >
		<input id = "userClearYes" type="button"value="戻る">	
		<script>
			document.getElementById("userClearYes").onclick = function() {
				location.href = "users_resist.php";
			}
		</script>
	</body>
</html>