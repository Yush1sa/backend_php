<?php
require_once "BaseBrandsTwigController.php";

class BrandsObjectUpdateController extends BaseBrandsTwigController {
    public $template = "brands_object_edit.twig";

    public function get(array $context) {
        $id = $this->params['id'];

        $sql = <<<EOL
SELECT * FROM brands_objects WHERE id = :id
EOL;

    $query = $this->pdo->prepare($sql);
    $query->bindValue("id", $id);
    $query->execute();

    $data = $query->fetch();

    $context["object"] = $data;

    parent::get($context); 
    }

    public function post(array $context) {
        $id = $this->params['id'];
        $title = $_POST['title'];
        $country = $_POST['country'];
        $info = $_POST['info'];

        $query = $this->pdo->prepare("SELECT image FROM brands_objects WHERE id = :id");
        $query->execute(['id' => $id]);
        $old_data = $query->fetch();
        $image_url = $old_data['image'];

        if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK){
             $tmp_name = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name";

        }

        $sql = <<<EOL
        UPDATE brands_objects
        SET title = :title,
            country_id = :country,
            info = :info,
            image = :image_url 
        WHERE id = :id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->bindParam(':title', $title);
        $query->bindParam(':country', $country);
        $query->bindParam(':info', $info);
        $query->bindParam(':image_url', $image_url);
        $query->execute();

         $context['message'] = "Объект успешно обновлен";

        $this->get($context);
    }
}