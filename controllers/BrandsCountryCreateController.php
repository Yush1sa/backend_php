<?php
require_once "BaseBrandsTwigController.php";

class BrandsCountryCreateController extends BaseBrandsTwigController {
    public $template = "brands_country_create.twig";

    public function get(array $context) {
        parent::get($context);
    }

    public function post(array $context) {
        $country = $_POST['country'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];

        move_uploaded_file($tmp_name, "../public/media/$name");

        $image_url = "/media/$name";

        $sql = <<<EOL
INSERT INTO brands_country(country, image)
VALUES(:country, :image_url)
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':country', $country);
        $query->bindParam(':image_url', $image_url);
        $query->execute();

        $context['message'] = "Вы успешно создали объект";
        $context["id"] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}