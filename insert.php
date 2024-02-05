<?php
    session_start();
    include('includes/dbinit.php');

    $allShoes = "SELECT * FROM shoes";

    $res = mysqli_query($conn, $allShoes);

    print_r($res);
    if(isset($_SESSION['errors'])){
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    if(isset($_POST['insert'])){
        $errors = array('shoe_name'=> '','shoe_size' => '','quantity_available' => '','price' => '','description'=> '');
        if(empty($_POST['shoe_name'])){
            $errors['shoe_name'] = "Shoe name is required";
        }else{
            $shoe_name = $_POST['shoe_name'];
        }
        if(empty($_POST['shoe_size'])){
            $errors['shoe_size'] = "Shoe size is required";
        }else{
            $shoe_size = (int)$_POST['shoe_size'];
        }
        if(empty($_POST['quantity_available'])){
            $errors['quantity_available'] = "Quantity Available is required";
        }else{
            $quantity_available = (int)$_POST['quantity_available'];
        }
        if(empty($_POST['price'])){
            $errors['price'] = "Price is required";
        }else{
            $price = (float)$_POST['price'];
        }
        if(empty($_POST['description'])){
            $errors['description'] = "Description is required";
        }else{
            $description = $_POST['description'];
            $insertShoe = "INSERT INTO `shoes` (`shoeID`, `shoeName`, `shoeSize`, `description`, `quantityAvailable`, `price`, `productAddedBy`) VALUES (NULL, 'Airforce', '12', 'ndndn', '12', '12000', 'Bolaji Owokoniran')";
            // $insertShoe = "INSERT INTO 'shoes' (shoeName, shoeSize, description, quantityAvailable, price) VALUES ($shoe_name, $shoe_size, $description, $quantity_available, $price)";
            // die($insertShoe);
            // $addShoe = mysqli_query($conn,$insertShoe);
            if(!mysqli_query($conn,$insertShoe)){
                echo "Error: " . $insertShoe . "<br>" . mysqli_error($conn);
            } else {
                mysqli_close($conn);
                echo "New record created successfully";
                // You can redirect to another page if needed
                // header("Location: success.php");
                // exit();
            }
        }

        if(array_filter($errors)){
            $_SESSION['errors'] = $errors;
            header("Location: insert.php");
        }else{
           
            // print_r($conn);

            // $insertShoe = "INSERT INTO shoes('shoeName','shoeSize','description','quantityAvailable','price') VALUES (" . $shoe_name. ', ' . $shoe_size. ', ' . $description. ', ' . $quantity_available. ', ' . $price . ")";
            // if ($conn->query($insertShoe) === TRUE) {
            //     echo "New record created successfully";
            //   } else {
            //     echo "Error: " . $insertShoe . "<br>" . $conn->error;
            //   }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolaji Keeks | Insert Page</title>
    <link rel="stylesheet" href="./styles/insert.css">
</head>
<body>
    <nav>
        <h2>Bolaji Keeks</h2>
    </nav>
    <main>
        <section id="shoe-action">
            <h3>Add Shoe</h3>
            <?php if(isset($errors)) { ?>
                <div id="err-sec">
                    <h2 id="err-heading">Opps</h2>
                    <div class="error-message"><?php echo $errors['shoe_name']; ?></div>
                    <div class="error-message"><?php echo $errors['shoe_size']; ?></div>
                    <div class="error-message"><?php echo $errors['quantity_available']; ?></div>
                    <div class="error-message"><?php echo $errors['price']; ?></div>
                    <div class="error-message"><?php echo $errors['description']; ?></div>
                </div>
                <?php }?>
            <!-- <a href="">Add Keeks</a> -->
        </section>
        <section id="add-shoes">
            <form action="" method="post">
                <label for="">Shoe Name</label>
                <input type="text" name="shoe_name" id="">
                <label for="">Shoe Size</label>
                <input type="text" name="shoe_size" id="">
                <label for="">Quantity Available</label>
                <input type="text" name="quantity_available" id="">
                <label for="">Price</label>
                <input type="text" name="price" id="">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="5"></textarea>
                <button name="insert">Insert</button>
            </form>
        </section>
    </main>
</body>
</html>