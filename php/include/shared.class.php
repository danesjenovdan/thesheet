<?php



class BCA
{
    public static function Redirect($location)
    {
        header("Location: {$location}");
        die();
    }

    public static function Redirect301($location)
    {
        Header("HTTP/1.1 301 Moved Permanently");
        Header("Location: {$location}");
        die();
    }

}

function deleteFeedsData($id)
{
	$id = (int)$id;
	$book = false;
	if (is_int($id) & ($id > 0)) {
		$book = R::load('feeds', $id); //reloads our book
		//$book->active = 0;
		//$id = R::store($book);
		R::trash( $book );
	}
	return $book;
}

function getDataGsheet($id)
{
	$id = (int)$id;
	$book = false;

	if (is_int($id) & ($id > 0)) {
		$book = R::load('gsheet', $id); //reloads our book
	}
	return $book;
}
function deleteGsheetData($id)
{
	$id = (int)$id;
	$book = false;
	if (is_int($id) & ($id > 0)) {
		$book = R::load('gsheet', $id); //reloads our book
		R::trash( $book );
	}
	return $book;
}
