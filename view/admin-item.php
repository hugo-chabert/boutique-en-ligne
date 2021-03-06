<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../model/Item_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
    exit();
}

$item = new Item();
$categories_info = $item->info_categories();

if(isset($_POST["submit"]) && !empty($_FILES["my_image"]["name"]) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['categories'])){
    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
    if($error === 0){
		if($img_size > 100000000){
            Toolbox::addMessageAlert("Désolé votre fichier est trop gros.", Toolbox::RED_COLOR);
		}
        else{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
			if(in_array($img_ex_lc, $allowed_exs)){
                if(Item_model::sql_check_item($_POST['name']) == false){
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../public/img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    Item::create($_POST['name'], $_POST['description'], $_POST['price'], $new_img_name, $_POST['categories']);
                }
                else{
                    Toolbox::addMessageAlert("Nom d'article déjà existant !", Toolbox::GREEN_COLOR);
                }
			}
            else{
                Toolbox::addMessageAlert("L'extension doit être jpg, jpeg ou png.", Toolbox::RED_COLOR);
			}
		}
	}
    else{
        Toolbox::addMessageAlert("unknown error occurred!", Toolbox::RED_COLOR);
	}

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/admin_item.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Gestion des articles</title>
    </head>
    <body>
        <?php require("header.php");?>
        <main>
        <?php require("side_nav.php");?>
            <section class="profile-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Nom de l'article :</label>
                    <input type="text" name="name" placeholder="Entrez le nom de l'article" />
                    <label>Description :</label>
                    <textarea type="text" name="description" placeholder="Entrez la description" ></textarea>
                    <label>Prix :</label>
                    <input type="text" name="price" placeholder="Entrez le prix" />
                    <label>Stocks :</label>
                    <input type="file" name="my_image">
                    <select name="categories" size="1" placeholder="Selectionner une catégorie">
                    <option value="">--Selectionner une catégorie--</option>
                        <?php foreach($categories_info as $c){
                            echo '<option value="'.$c["id"].'">'.$c["name"];
                        }?>
                    </select>
                    <button type="submit" name="submit" > Envoyer </button>
                    <?php require_once(__DIR__ . '/errors.php'); ?>
                </form>
            </section>
        </main>
        <?php require('footer.php')?>
    </body>
</html>