<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>OOP PHP</title>
</head>
<body>
    <div class="wrappep">
        <?php
            require_once("userclass.php");
            $nguyenanh = new User('nguyen anh','dinhanh@gmail.com');

            echo "<h2> ---user info -- </h2>";
            echo "User ID: ".$nguyenanh->GetUserID()."<br/>";
            echo "UserName: ".$nguyenanh->GetUserName()."<br/>";

            $nguyenanhmore = new User("Nguyen Van A","email@gmail.com");
            echo "<h2> ---user info -- </h2>";
            echo "User ID: ".$nguyenanhmore->GetUserID()."<br/>";
            echo "UserName: ".$nguyenanhmore->GetUserName()."<br/>";
        ?>
    </div>
    <footer>
        <p>footer here</p>
    </footer>
</body>
</html>