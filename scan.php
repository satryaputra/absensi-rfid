<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require "header.php"; 
        $page = "Scan";
    ?>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#cek_kartu").load("baca_kartu.php")
            }, 2000);
        });
    </script>

    <title><?= $page; ?></title>
</head>
<body>
    <?php require "navbar.php"; ?>    

    <!-- main -->
    <div class="container">
        <div id="cek_kartu" class="text-center mt-5"></div>
    </div>
</body>
</html>