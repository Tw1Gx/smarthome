<?php
include_once('template.php');
if (isset($_GET['id']) and isset($_SESSION['userId'])) {
 $query = <<<END
DELETE FROM bathroom_devices
 WHERE id = '{$_GET['id']}'
END;
 $mysqli->query($query);
 header('Location:index.php');
}
echo $navigation;
?>
<!-- Query deletes the selected device with a track from the id that it was given before. Then sends the user back to index.php -->
