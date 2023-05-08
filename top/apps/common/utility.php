<?php
/* -----------------------------------------------------------
　 共通部品の PHP ファイルです
　 処理内容については Google Classroom 「システム開発演習」 の
　 　授業 > 授業資料 > 設計書見本 > 共通部品_設計書.xlsx
　 の通りに作成しています

　 ファイルは
　 　授業 > 授業資料 > 開発資料 > 開発規約.pdf
　 の通りに配置してください

　 関数使用前に以下のPHP関数を実行しないと使用できません
　 　include(dirname(__FILE__) . '\..\common\utility.php');

　 何かわからないことがあれば共通部品以外の内容でも
　 安冨に連絡してもらえれば対応します　
   ----------------------------------------------------------- */

/* --------------------------------------------------------------
　 DB 接続用の関数です
　 戻り値は DB の PDO 又は null (接続失敗時) です
　 なお、接続失敗時には HTML にエラー内容が出力されます
   　※ 仕様書に無い関数であるため完成品には使用しないでください!
   -------------------------------------------------------------- */
function ConnectDB() {
	try {
		return new PDO('mysql:dbname=library_test; host=localhost; charset=utf8', 'root', '');
	}
	catch (PDOException $e) {
		echo 'DB接続エラー :<br>'.$e -> getMessage();
		return null;
	}
}

/* --------------------------------------------------------------
   SQL 実行用の関数です
   任意のSQLを実行し結果を返します
   実行不可能な場合はnullが返ります
   　※ 仕様書に無い関数であるため完成品には使用しないでください!
   -------------------------------------------------------------- */
function ExecuteSQL($sql) {
	// 引数チェック
	if (!isset($sql)) {
		echo '<br>SQL実行エラー';
		echo '<br>SQL : null';
		echo '<br>State : -';
		echo '<br>Code : -';
		echo '<br>Message :<br>引数が未宣言、又は null です<br>';
		return null;
	}

	// SQL実行
	$db = ConnectDB();
	try {
		return $db -> query($sql);
	}
	catch (Exception $e) {
		$err = $db -> errorInfo();
		echo '<br>SQL実行エラー';
		echo '<br>SQL : ' . $sql;
		echo '<br>State : ' . $err[0];
		echo '<br>Code : ' . $err[1] . '<br>';
		echo '<br>Message :<br>' . $err[2] . '<br>';
		echo '<br>Stack Trace :<br>' . $e . '<br>';
		return null;
	}
}

// SELECT文を実行します
function FuncSelectSql($sql) {
	return ExecuteSQL($sql);
}

// INSERT、UPDATE、DELETE文を実行します
function FuncExecuteSql($sql) {
	return ExecuteSQL($sql);
}

// セッションIDが有効なものかチェックします
function FuncCheckSession($sessionID) {
	return $sessionID == $_COOKIE['PHPSESSID'];
}

// 指定のコード区分のプルダウンを作成します
function FuncMakePulldown($codeType) {
	$rows = FuncSelectSql('SELECT code_name FROM code_types  WHERE code_type = ' . $codeType);
	echo '<select name=\"codeNamePulldown\">';
	foreach ($rows as $row) {
		echo '<option>' . $row['code_name'] . '</option>';
	}
	echo '</select>';
}
?>