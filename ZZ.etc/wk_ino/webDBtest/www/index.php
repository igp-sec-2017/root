<?php
include './class/MyDB.class.php';

// エラー表示
ini_set('display_errors', 1);

$db = new MyDB();
$result = $db->query("SELECT * FROM m_version");

    $outputs = array(
                    array("id"=>"dammy1", "optA"=>"test1-A", "optB"=>"test1-B"),
                    array("id"=>"dammy2", "optA"=>"test2-A", "optB"=>"test2-B"),
                    array("id"=>"dammy3", "optA"=>"test3-A", "optB"=>"test3-B"),
                    array("id"=>"dammy4", "optA"=>"test4-A", "optB"=>"test4-B"),
                    array("id"=>"dammy5", "optA"=>"test5-A", "optB"=>"test5-B"),
                    array("id"=>"dammy6", "optA"=>"test6-A", "optB"=>"test6-B"),
                    array("id"=>"dammy7", "optA"=>"test7-A", "optB"=>"test7-B"),
                    array("id"=>"dammy8", "optA"=>"test8-A", "optB"=>"test8-B"),
                    array("id"=>"dammy9", "optA"=>"test9-A", "optB"=>"test9-B"),
                    array("id"=>"dammy10", "optA"=>"test10-A", "optB"=>"test10-B")
                );
//    echo json_encode($outputs);

//header('Content-type: application/json');
//header('Content-type: html');

//print '\n\n';
echo $result;
//echo json_encode($result);

?>

