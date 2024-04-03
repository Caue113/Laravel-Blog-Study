<h1>User listings</h1>

<h2><?php echo $heading; ?></h2>

<?php 
    foreach($users as $user){
        echo "<p>id: " . $user['id'] . "</p>";
        echo "<p>Name: " . $user['name'] . "</p>";
        echo "<p>Bio: " . $user['bio'] . "</p>";
    }
?>