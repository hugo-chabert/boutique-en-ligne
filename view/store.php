<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(isset($_POST['search']) && !empty(trim($_POST['search-bar']))){
    $name = $_POST['search-bar'];
    $item = new Item();
    $items_info = $item->searchBar($name);
}
else if(isset($_POST['filter']) && !empty(trim($_POST['category']))){
    $category = $_POST['category'];
    $item = new Item();
    $items_info = $item->searchCategory($category);
}
else{
    $item = new Item();
    $items_info = $item->info_items();
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boutique</title>
    <link rel="stylesheet" href="../public/css/store.css">
</head>
<body>
    <?php require("header.php");?>
    <main>
        <section class="filters">
            <form action="" method="POST">
                <label for="search-bar">Rechercher</label>
                <article>
                    <input id="search-bar" type="text" name="search-bar" placeholder="Search ..."/>
                    <button name="search"> <img src="https://img.icons8.com/ios-filled/50/000000/search--v1.png"/> </button>
                </article>

                <select name="category">
                    <option value="" >--Selectionner une catégorie--</option>
                    <option value="1">Dessin</option>
                    <option value="2">Logo</option>
                    <option value="3">Portrait</option>
                    <option value="4">Custom</option>
                </select>

                <button id='filter-button' type="submit" name="filter"> Filtrer </button>
            </form>

        </section>

        <hr>

        <section class="store">
            <?php foreach($items_info as $item){?>
                <article>
                    <img class= 'image-article' src="../public/img/<?php echo $item['image'];?>">
                        <div>
                            <h2><?php echo $item['name'];?></h2>
                            <h3><?php echo $item['price'].' €';?></h3>
                        </div>
                    <button>
                        <a href="item.php?id=<?php echo $item['id'] ?>">Voir Plus</a>
                    </button>
                </article>
                <hr>
            <?php } ?>
        </section>

    </main>
    <?php require("footer.php");?>
</body>
</html>