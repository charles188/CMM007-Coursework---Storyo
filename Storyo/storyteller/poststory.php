<?php

include("postclass.php");

$post = new Post();
$id = $_SESSION['email'];
$result = $post->create_post($id, $_POST)

?>