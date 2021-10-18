
<?php

session_start(); //start the PHP_session function 

echo 'Hello <br />';

 echo '<b>Your full name is </b>' . $_SESSION['fullname']. '<br />' ;
 echo '<b>YOu are studying:  </b>'. $_SESSION['courseid'].'<br />';
 ?>
 <?php
 if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "<b>$name :</b> $value <br />\n";
    }
}

?>