<?php

//include "../Database/MySqlConnect.php";

// CATEGORIES

$announcements_query = $conn->prepare("SELECT * FROM `announcements`");
$announcements_query->execute();

$announcements= $announcements_query->fetchAll(PDO::FETCH_ASSOC);



$announcements_box= "<div id='announcements_box'>";
foreach ($announcements as $row ){
	$content = $string = html_entity_decode($row['announcement_content']);
	$content = strip_tags($content);
    $announcements_box .= "<tr>
                                <td>{$row['announcement_id']}</td>
                                <td>{$content}</td>
                                <td>{$row['announcement_date']}</td>

                            </tr>";
}
$announcements_box .="</div>";

?>