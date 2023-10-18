<?php 
    require('shoe_database.php');

    // Retrieves shoeCategoryID
    $shoe_category_id = filter_input(INPUT_GET, 'shoe_category_id', FILTER_VALIDATE_INT);

    if($shoe_category_id == NULL || $shoe_category_id == FALSE){
        $shoe_category_id = 1;
    }

    // Get shoe name from selected category
    $shoe_query = 'SELECT * FROM shoecategories 
                   WHERE shoeCategoryID = :shoe_category_id';
    $statement1 = $db->prepare($shoe_query);
    $statement1->bindValue(':shoe_category_id', $shoe_category_id);
    $statement1->execute();
    $category = $statement1->fetch();
    $category_name = $category['shoeCategoryName'];
    $statement1->closeCursor();


    // Get all categories
    $shoeQueryAllCategories = 'SELECT * FROM shoecategories
                               ORDER BY shoeCategoryID';
    $statement2 = $db->prepare($shoeQueryAllCategories);
    $statement2->execute();
    $shoe_categories = $statement2->fetchAll();
    $statement2->closeCursor();

    // Get shoe products for selected category
    $queryShoeProducts = 'SELECT * FROM shoes WHERE shoeCategoryID = :shoe_category_id';
    $statement3 = $db->prepare($queryShoeProducts);
    $statement3->bindValue(':shoe_category_id', $shoe_category_id);
    $statement3->execute();
    $shoeProducts = $statement3->fetchAll();
    $statement3->closeCursor();
?>

<!DOCTYPE html>

<html>
<head>
    <title> My Shoe Store </title>
    <link rel = "stylesheet" href = "mainShoeCatalog.css">
</head>

<body>
    <main>
        <h1> Shoe Product List </h1>

        <aside>
            <h2> Categories </h2>

            <nav>
                <ul>
                    <?php foreach($shoe_categories as $category) : ?>
                    <li>
                        <a href = "?shoe_category_id=<?php
                                                        echo $category['shoeCategoryID'];
                                                     ?>"
                        >

                        <?php echo $category['shoeCategoryName']; ?> </a>
                    </li>
                    <?php endforeach; ?>;
                </ul>
            </nav>
        </aside>

        <section>
            <h2> <?php echo $category_name; ?> </h2>

            <table>
                <tr>
                    <th> Shoe Code: </th>
                    <th> Shoe Name: </th>
                    <th class = "right"> Shoe Price: </th>
                </tr>

                <?php foreach ($shoeProducts as $shoeProduct) : ?>
                <tr>
                    <td> <?php echo $shoeProduct['shoeCode']; ?> </td>
                    <td> <?php echo $shoeProduct['shoeName']; ?> </td>
                    <td class = "right"> <?php echo $shoeProduct['price']; ?> </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
</body>
</html>