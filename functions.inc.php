<?php

$db = mysqli_connect("localhost", "root", "", "n_n_onestopshop");

function isAdmin()
{
    if ($_SESSION['ADMIN_ROLE'] == 1) {
?>
        <script>
            window.open('view_products.php', '_self');
        </script>
<?php
    }
} ?>