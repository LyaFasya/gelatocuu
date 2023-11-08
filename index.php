
            <?php 
            session_start();
            if(isset($_GET['x']) && $_GET['x']== 'dashboard'){
                $page = "home.php";
                include "main.php";
            }
            else if(isset($_GET['x']) && $_GET['x']=='transaksi'){
                $page = "transaksi.php";
                include "main.php";
            }
            else if(isset($_GET['x']) && $_GET['x']=='user'){
                if ( $_SESSION['role_gelatocuu']=='admin'){
                    $page = "user.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }
            }
            else if(isset($_GET['x']) && $_GET['x']=='customer'){
                $page = "customer.php";
                include "main.php";
            }
            else if(isset($_GET['x']) && $_GET['x']=='report'){
                if ( $_SESSION['role_gelatocuu']=='admin'){
                    $page = "report.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }
                
            }
            else if(isset($_GET['x']) && $_GET['x']=='menu'){
                $page = "menu.php";
                include "main.php";
            }
            else if(isset($_GET['x']) && $_GET['x']=='login'){
                include "login.php";
            }
            else if(isset($_GET['x']) && $_GET['x']=='logout'){
                include "proses/proses_logout.php";
            }
            else if(isset($_GET['x']) && $_GET['x']=='transaksiitem'){
                $page = "transaksi_item.php";
                include "main.php";
            }
            else {
                $page = "home.php";
                include "main.php";
            }
            
            ?>