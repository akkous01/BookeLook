<?php
/**
 * Created by PhpStorm.
 * User: HpPC
 * Date: 16-Jun-16
 * Time: 5:10 PM
 */
//include "../../../Database/MySqlConnect.php";
if(isset($_GET['delete'])) {
    $gallery_query = $conn->prepare("DELETE FROM `gallery` WHERE `gallery`.`gallery_photo_id` = ".$_GET['delete'].";");
    $gallery_query->execute();
}
$gallery_query = $conn->prepare("SELECT * FROM `gallery`;");
$gallery_query->execute();

$gallery_photos=$gallery_query->fetchAll(PDO::FETCH_ASSOC);
$gallery="<div id='gallery_table'><table>";
$i=0;
$not_close=false;
foreach ($gallery_photos as $row ){
    if($i%4==0){$gallery.="<tr>"; $not_close=true;}
    $gallery.="<td>
                    <div id='photo' >
                        <img style='width:100px;height: 110px;' src='../../Database/Gallery_photos/".$row['gallery_photo']."'>
                    </div>
                    <div id='delete_button' >
                        <input type='button'  id='photo_".$row['gallery_photo_id']."' value='Delete' class='special delete_button'/>
                    </div>
               </td>";
    if($i%4==3){$gallery.="</tr>"; $not_close=false;}
    $i++;
}
if($not_close){
    $gallery.="</tr>";
}
$gallery.="</table></div>";
//echo $gallery;

?>