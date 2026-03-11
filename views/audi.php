<?php
$is_image = $url == "/audi/image";
$is_info = $url == "/audi/info";
?>

<h1>AUDI</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?=$is_image ? "active" : "" ?>" aria-current="page" href="/audi/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$is_info ? "active" : "" ?>" href="/audi/info">Описание</a>
  </li>
</ul>


<?php
if ($is_image) {
    require "../views/audi_image.php";
} else if ($is_info) {
    require "../views/audi_info.php";
}
?>