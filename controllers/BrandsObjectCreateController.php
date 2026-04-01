<?php
require_once "BaseBrandsTwigController.php";

class BrandsObjectCreateController extends BaseBrandsTwigController {
    public $template = "brands_object_create.twig";

    public function get(array $context) {
        parent::get($context);
    }

    public function post(array $context) {
        $title = $_POST['title'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];

        move_uploaded_file($tmp_name, "../public/media/$name");

        $image_url = "/media/$name";

        $sql = <<<EOL
INSERT INTO brands_objects(title, type, info, image)
VALUES(:title, :type, :info, :image_url)
EOL;
        $query = $this->pdo->prepare($sql);

        $query->bindParam(':title', $title);
        $query->bindParam(':type', $type);
        $query->bindParam(':info', $info);
        $query->bindParam(':image_url', $image_url);
        $query->execute();

        $context['message'] = "Вы успешно создали объект";
        $context["id"] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}