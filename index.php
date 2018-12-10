<?php
include('core/main.class.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php $app->getTitle($_GET['page']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
    <script src="main.js"></script>
</head>
<body>
    <script type="text/javascript" src="assets/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
    <div class="navbar">
        <nav>
            <!-- NAVIGATION -->
            <?php include('views/navigation/navigation.php'); ?>
        </nav>
    </div>
    <div class="wrapper">
        <!-- MAIN BODY -->
        <?php $app->getPage($_GET['page']); ?>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#logout').on('click',function(e){
                e.preventDefault();
                $.ajax({
                    url: '/pagdraft/views/login/ajax_logout.php',
                    dataType: 'json',
                    success: function(data){
                        if (data.error == false){
                            window.location.replace('/pagdraft/');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>