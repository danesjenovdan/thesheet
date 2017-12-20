<?php
include('../php/config.php');


if (
    $_GET['m'] == 'logoff'
) {
    session_destroy();
    header("Location: http://" . $_SERVER['SERVER_NAME'] . "/cms/");
    die();
}

if ($_POST) {
    if (
        (($_POST['user'] == 'nekadimvectrave') & ($_POST['pass'] == 'incigarettudine'))

    ) {
        $_SESSION['lopre5'] = '48fdGT_Rwhd8';
        $_SESSION['lopre55'] = "novice";

    }

}

if (
($_SESSION['lopre5'] != '48fdGT_Rwhd8')
) {
    print
        '
	<form method="post">
	<label>uname: </label><input type="text" name="user" />
	<br />
	<label>pass: </label><input type="password" name="pass" />

	<br />
	<input type="Submit" name="Submit" value="Submit" />
	</form>
	';
    die();
}


/********************************************
 *********************************************/

if(isset($_POST["gsheet"])){

    $book = R::load('gsheet', $_POST["id"]);

    $book->name = $_POST["name"];
    $book->url = $_POST["url"];
    $book->content = $_POST["content"];

    $book->template = $_POST["template"];

    $book->datum = date("Y-m-d H:i:s");
    $book->author = $_SESSION["forceedit"];

    $id = R::store($book);

    BCA::Redirect(__LOCALURL."/cms/?m=gsheet");
    die();
}

switch ($_GET['m']) {


    case 'gsheet':
                $books = R::findAll('gsheet', ' ORDER BY id DESC LIMIT 100 ');
        $tpl0 = new template();
        $tpl0->set('gsheet', array(
            0 => $books
        ));
        $a = $tpl0->fetch('view/gsheet_list.php');

        break;
    case 'addgsheet':

        $tpl0 = new template();
        $a = $tpl0->fetch('view/gsheet_edit.php');

        break;

    case 'editgsheet':

        $content = getDataGsheet($_GET['id']);
        $tpl0 = new template();
        $tpl0->set('gsheet', array(
            0 => $content
        ));
        $a = $tpl0->fetch('view/gsheet_edit.php');

        break;

    case 'deletegsheet':
        $content = deleteGsheetData($_GET['id']);
        BCA::Redirect(__LOCALURL."/cms/?m=gsheet");
        die();
        break;

    default:

        $books = R::findAll('gsheet', ' ORDER BY id DESC LIMIT 100 ');
        $tpl0 = new template();
        $tpl0->set('gsheet', array(
            0 => $books
        ));
        $a = $tpl0->fetch('view/gsheet_list.php');

        break;

}

$tpl = new template();
$header = $tpl->fetch('view/header.php');

$footertpl = new template();
$footer = $footertpl->fetch('view/footer.php');


print $header;
print $a;
print $footer;


?>