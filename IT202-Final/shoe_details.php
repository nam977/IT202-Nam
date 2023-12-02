<?php
/*
UCID: nam@njit.edu
Date: 12/1/2023
*/

session_start();

require('admin_db.php');

$shoe_code = $_GET['shoe_code'];
$db = getDB();
$queryShoeProducts = 'SELECT * FROM shoes WHERE shoeCode = :shoe_code';
$statement3 = $db->prepare($queryShoeProducts);
$statement3->bindValue(':shoe_code', $shoe_code);
$statement3->execute();
$shoeInfos= $statement3->fetchAll();
$statement3->closeCursor();

$image = glob("images" . "$shoe_code.jpg");


?>

<html>
    <style>
        .shoe-table-data{
            padding: 20px;
            background-color: red;
            border-style: solid;
            overflow-y: auto;
            min-height: 250px;
            max-height: 350px;
            width: 580px;
            text-align: center;
            padding: 40px;
            margin: 2% 0%;
            position: fixed;
        }

        table{
            background-color: yellow;
            padding: 40px;
        }

        td{
            padding: 5px;
            border-style: solid;
            background-color: white;
        }

        #image_placement{
            float: right;
            margin: 0% 53%;
            position: fixed;
        }

        #mouse_change_id{
            margin: 5% 5%;
        }
        
        body{
            background-color: #2E6171;
        }

    </style>
    <head>
        <title> My Shoe Store </title>
        <!--link rel = "stylesheet" href = "main_shoe_details.css"-->
    </head>
<body>

    <main>
    <div class = "header">
        <?php include('logged_in_header.php'); ?>
    </div>
    <div id = "main-div"> 
        <!-- Main shoe table -->
        <section class = "shoe-table-data">

            <h1> Shoe Information </h1>
            <table>
                <tr>
                    <th> Shoe Code: </th>
                    <th> Shoe Name: </th>
                    <th> Price: </th>
                    <th> Description: </th>

                    <th> Date Added </th>
                    <th> Category Id </th>

                        <!--th> Shoe Price: </th-->
                </tr>

                <?php foreach ($shoeInfos as $shoeInfo) : ?> <!-- Retrieves all shoe entry info -->
                <tr>
                    <td> <?php echo $shoeInfo['shoeCode'];?></td>
                    <td> <?php echo $shoeInfo['shoeName']; ?> </td>
                    <td> <?php echo $shoeInfo['price']; ?> </td>
                    <td> <?php echo $shoeInfo['description']; ?> </td>
                    <td> <?php echo $shoeInfo['dateAdded']; ?> </td>
                    <td> <?php echo $shoeInfo['shoeCategoryID']; ?> </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <div id = "image_placement">
            <?php 
                $file_location = file_exists("images/$shoe_code-bw.jpg"); // verifies if image file exists
                if($file_location == 1){ // if true
                    /*
                     * Creates image html tag containning specific shoe entry image 
                     */
                    echo "<img src = \"images/$shoe_code-bw.jpg\" id = \"mouse_change_id\" alt = \"$shoe_code\" height = \"300px\" width = \"450px\"/>"; 
                }else{
                    /*
                    Creates image html tag containing default shoe entry image
                    */
                    echo "<img src = \"images/default-shoe-bw.jpg\" id = \"mouse_change_id\" alt = \"$shoe_code\" height = \"300px\" width = \"450px\"/>";
                }
            ?>
        </div>
        <div class = "footer">
            <?php include('footer.php'); ?> <!-- Footer Section Script -->
        </div>
    </div>
    </main>
</body>
<script type = "text/javascript">
        const shoe_code = new URLSearchParams(window.location.search); //retrieves shoe code


        var item = document.getElementById("mouse_change_id"); // attaches to image element
            
        item.addEventListener("mouseover", showImage, false); // attaches mouseover attribute to image. Upon execution, image changes color when mouse is over image
        item.addEventListener("mouseout", hideImage, false);  // attaches moseout attribute to image. Upon exectuion, image changes back to black & white when mouse is over image
        
        function checkFileExists(url){ // checks if file exists
            var xhr = new XMLHttpRequest();
            xhr.open('HEAD', url, false);
            xhr.send();
            return xhr.status !== 404;
        }

        function showImage(){
            if(checkFileExists("images/" + shoe_code.get("shoe_code") + ".jpg")){
                item.setAttribute("src", "images/" + shoe_code.get("shoe_code") + ".jpg"); // sets to shoe specific image if image locaiton exists
            }else{
                item.setAttribute("src", "images/default-shoe.jpg"); // sets to default shoe image if image location does not exist
            }
        }

        function hideImage(){
            if(checkFileExists("images/" + shoe_code.get("shoe_code") + ".jpg")){
                item.setAttribute("src", "images/" + shoe_code.get("shoe_code") + "-bw.jpg");
            //img.src = "images/" + shoe_code.get("shoe_code") + ".jpg";
            }else{
                item.setAttribute("src", "images/default-shoe-bw.jpg");
            }
        }
        /*
        if(document.getElementById("mouse_change_id")){
            document.getElementById("mouse_change_id").addEventListener("mouseover", showImage("images/11.jpg"), true);
        */

    </script>
</html>