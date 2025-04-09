<?php
include "menu.php";



include_once "menu.php";//warning



require "menu2.php";
echo "testanto o include";


require_once "menus2.php";//fatal error
?>

conteúdo da página
<br>
<?php
   include "menu.php";//warning

   require "menu.php"; //fatal error

?>