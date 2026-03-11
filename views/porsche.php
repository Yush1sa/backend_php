<?php
$is_image = $url == "/porsche/image";
$is_info = $url == "/porsche/info";
?>

<h1>PORSCHE</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?=$is_image ? "active" : "" ?>" aria-current="page" href="/porsche/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$is_info ? "active" : "" ?>" href="/porsche/info">Описание</a>
  </li>
</ul>

<?php
if ($is_image) {
    require "../views/porsche_image.php";
} else if ($is_info) {
    require "../views/porsche_info.php";
}
?>