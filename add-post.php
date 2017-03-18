<?php

$postID = $db->lastInsertId();

//add categories
if(is_array($category_ID)){
foreach($_POST['category_ID'] as $category_ID){
$stmt = $db->prepare('INSERT INTO blog_post_cats (postID,category_ID)VALUES(:postID,:category_ID)');
$stmt->execute(array(
':postID' => $postID,
':category_ID' => $catID
));
}
}
------------------------------------------------------
След sumbit бутона
<fieldset>
    <legend>Categories</legend>

    <?php

    $stmt2 = $db->query('SELECT catID, catTitle FROM blog_cats ORDER BY catTitle');
    while($row2 = $stmt2->fetch()){

        if(isset($_POST['category_ID'])){

            if(in_array($row2['category_ID'], $_POST['category_ID'])){
                $checked="checked='checked'";
            }else{
                $checked = null;
            }
        }

        echo "<input type='checkbox' name='catID[]' value='".$row2['category_ID']."' $checked> ".$row2['catTitle']."<br />";
    }

    ?>

</fieldset>
------------------------------------------------------------------
EDIT-POST:
------------------------
/delete all items with the current postID
$stmt = $db->prepare('DELETE FROM blog_post_cats WHERE postID = :postID');
$stmt->execute(array(':postID' => $postID));

if(is_array($catID)){
foreach($_POST['category_ID'] as $category_ID){
$stmt = $db->prepare('INSERT INTO blog_post_cats (postID,category_ID)VALUES(:postID,:catID)');
$stmt->execute(array(
':postID' => $postID,
':category_ID' => $category_ID
));
}
}
//
Show all categories -> submit button:

--
<fieldset>
    <legend>Categories</legend>

    <?php

    $stmt2 = $db->query('SELECT category_ID, catTitle FROM blog_cats ORDER BY catTitle');
    while($row2 = $stmt2->fetch()){

        $stmt3 = $db->prepare('SELECT category_ID FROM blog_post_cats WHERE catID = :catID AND postID = :postID') ;
        $stmt3->execute(array(':catID' => $row2['catID'], ':postID' => $row['postID']));
        $row3 = $stmt3->fetch();

        if($row3['category_ID'] == $row2['category_ID']){
            $checked = 'checked=checked';
        } else {
            $checked = null;
        }

        echo "<input type='checkbox' name='category_ID[]' value='".$row2['category_ID']."' $checked> ".$row2['catTitle']."<br />";
    }

    ?>

</fieldset>