<?php
include_once ( "./common/user_data.php" );
include_once ( "./common/common.php" );

// --------------------------------------
// START
// --------------------------------------
// --------------------------------------
// START
// --------------------------------------
try {

    main();

} catch (Exception $e) {
    echo $e;
}

// --------------------------------------
// main function
// --------------------------------------
function main() {

    //クッキー解除する
    // ID,EMAILという名前のクッキーの中身を空にした上に有効期限をマイナス指定して消滅させる
	setcookie("ID", ''    , time() - 1800);
    setcookie("Email", ''    , time() - 1800);
    setcookie("Name", ''    , time() - 1800);


    //ログインページへリダイレクト
    // header("Location:/login.php");
    //メインページにリダイレクト
    header("Location:/");

    return true;

}
