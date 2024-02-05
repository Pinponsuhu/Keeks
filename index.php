<?php
    include('includes/dbinit.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Admin</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <nav>
        <h2>Bolaji Keeks</h2>
    </nav>
    <main>
        <section id="shoe-action">
            <h3>All Keeks</h3>
            <a href="./insert.php">Add Keeks</a>
        </section>
        <section id="all-shoes">
            <table>
                <tr>
                    <th>ShoeID</th>
                    <th>Shoe Name</th>
                    <th>Shoe Size</th>
                    <th>Quantity Available</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Added By</th>
                </tr>
            </table>
        </section>
    </main>
</body>
</html>