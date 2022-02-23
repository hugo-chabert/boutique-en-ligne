<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
}

$item = new Item();
$categories_info = $item->info_categories();

if(isset($_POST["submit"]) && !empty($_FILES["my_image"]["name"])){
    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
    if($error === 0){
		if($img_size > 125000){
			echo "Désolé votre fichier est trop gros.";
		}
        else{
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
			if(in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../public/img/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				Item::create($_POST['name'], $_POST['price'], $new_img_name, $_POST['categories']);
			}
            else{
				echo "L'extension doit être jpg, jpeg ou png";
			}
		}
	}
    else{
		echo "unknown error occurred!";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des articles</title>
</head>
<body>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Nom de l'article :</label>
            <input type="text" name="name" placeholder="Entrez le nom de l'article" />
            <label>Prix :</label>
            <input type="text" name="price" placeholder="Entrez le prix" />
            <input type="file" name="my_image">
            <select name="categories" size="1">
                <?php foreach($categories_info as $c){
                    echo '<option value="'.$c["id"].'">'.$c["name"];
                }?>
            </select>
            <input type="submit" name="submit" value="Upload">
            <?php require_once(__DIR__ . '/errors.php'); ?>
        </form>
    </main>
</body>
</html>