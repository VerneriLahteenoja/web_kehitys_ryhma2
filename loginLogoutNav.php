<?php
    if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] == true) {
        echo "
            <li class='nav-login'>
            <a class='nav-link' href='logout.php'>Kirjaudu ulos</a>
            </li>
        ";
    } else {
        echo "
            <li class='nav-login'>
            <a class='nav-link' href='loginPage.php'>Kirjaudu</a>
            </li>
            <li class='nav-register'>
            <a class='nav-link' href='registrationPage.php'>Rekisteröidy</a>
            </li>
        ";
    }
?>