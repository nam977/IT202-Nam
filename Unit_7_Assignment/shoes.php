<?php 
    require('database.php');

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
    <link rel = "stylesheet" href = "main.css">
</head>

<body>
    <main>
    <div class = "header">
        <?php include('header.php'); ?>
    </div>
    
    <div class = "product-info-class">

        <div id = "main-shoe-paragraph">
        <p> Welcome to our catalog! </p>
            
        <p> Feel free to browse through our amazing catalog of shoes. </p>
        
        <p> Our catalog contains discount codes for a selected variety of designer shoes. </p> 
            
        <p> We offer shoes for a wide variety of professions. </p>
        
        <p> 
            This includes, but is not limited to: Athlethics, 
            Military, Modeling, Luxury Design, Office/White   
            Collar Services, & Desert Oil Drilling 
        </p>
        </div>
    

        <div class = "main_shoe_catalog">
            <h1 id = "shoe-header"> Shoe Product List </h1>
            <div id = "category-section">
            <aside>
                <h2> Categories </h2>

                <nav>
                    <ul>
                        <!--
                            Retrieves shoe category & shoe category name from NJIT SQL Database Nam
                        -->
                        <?php foreach($shoe_categories as $category) : ?>
                        <tr>
                            <a href = "?shoe_category_id=<?php
                                                        echo $category['shoeCategoryID'];
                                                     ?>">
                                                     
                                                     <?php 
                                                        echo $category['shoeCategoryName']; 
                                                     ?> 
                            </a>
                        </tr>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            </div>
        </div>
        
        <!--
            Retrieves shoes information for selected Catgeory
        -->
        <section class = "shoe-table-data">
            <h2> Current Catalog: <?php echo $category_name; ?> </h2>
            <table>
                <tr>
                    <th> Shoe Code: </th>
                    <th> Shoe Name: </th>
                    <th> Price: </th>
                    <th> Description: </th>
                    <th> Shoe Price: </th>
                </tr>

                <?php foreach ($shoeProducts as $shoeProduct) : ?>
                <tr>
                    <td> <?php echo $shoeProduct['shoeCode']; ?> </td>
                    <td> <?php echo $shoeProduct['shoeName']; ?> </td>
                    <td> <?php echo $shoeProduct['price']; ?> </td>
                    <td> <?php echo $shoeProduct['description']; ?> </td>
                    <td> <?php echo $shoeProduct['price']; ?> </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
    
    <figure>
    <div id = "airjordan-div">
        <img src = "images/airjordans.jpg" width = "190px" height = "400px" alt = "jordans">
    </div>
    <figcaption id = "jordan-shoe-fig"> These are shoes that even Kobe Bryant will wear </figcaption>

    </figure>

    <figure>
    <div id = "desertSandles-div">
        <img src = "images/desert-sandles.jpg" width = "190px" height = "400px" alt = "desertSandles">
    </div>

    <figcaption id = "desert-shoe-fig"> Help yourself to a pair of lovely sandles while <br>you drill for oil in the desert</figcaption>

    </figure>

    <figure>
    <div id = "tacticalBoots-div">
        <img src = "images/tactical-boots.jpg" width = "190px" height = "265px" alt = "tacticalBoots">
    </div>
    
    <figcaption id = "tactical-shoe-fig"> Enter bootcamp in style with our luxurious tactical <br> boots</figcaption>

    </figure>
    
    <figure>
    <div id = "luxuryUggs-div">
        <img src = "images/luxury-uggs.jpg" width = "190px" height = "265px" alt = "luxuryUggs">
    </div>

    <figcaption id = "uggs-shoe-fig"> Embrace Fall & Winter with our comfy tailor <br>made uggs </figcaption>
    </figure>
    
    <figure>
    <div id = "gucci-loafers-div">
        <img src ="images/gucci-loafers.jpg" width = "190px" height = "265px" alt = "gucci">
    </div>
    <figcaption id = "loafers-shoe-fig"> Feel like a Diva with our extravagant gucci made <br> loafers</figcaption>

    </figure>
    
    <figure>
    <div id = "yellow-yeazy-div">
        <img src ="images/yellow-yeezy.jpg" width = "190px" height = "400px" alt = "yeezy">
    </div>

    <figcaption id = "yeezys-shoe-fig"> Experience milennial sub-culture with our hip <br> & trendy Yellow yezzys </figcaption>
    </figure>

    <div class = "footer">
        <?php include('footer.php'); ?> <!-- Footer Section Script -->
    </div>
    </main>
</body>
</html>