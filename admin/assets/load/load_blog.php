<?php

//include "../Database/MySqlConnect.php";

// CATEGORIES

        $blog_query = $conn->prepare("SELECT * FROM `blog`");
        $blog_query->execute();

        $blog= $blog_query->fetchAll(PDO::FETCH_ASSOC);

        $blog_box= "<div id='blog_box'>";
        foreach ($blog as $row ){
            $blog_box .= "<tr>
                                <td>{$row['blog_id']}</td>
                                <td>{$row['blog_title']}</td>
                                <td>{$row['blog_date']}</td>

                            </tr>";
            }
        $blog_box .="</div>";

?>