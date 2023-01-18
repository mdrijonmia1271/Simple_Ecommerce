
<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=simple_ecommerce','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM sizes ORDER BY id DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Panel</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;500;700;900&family=Rubik:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/responsive.css" />
</head>

<body>
  <!-- sidebar menu start -->
  <div class="page-container">
    <div class="sidebar-menu">
      <div class="sidebar-header">
        <div class="logo">
          <a href="index.html"> <img src="./img/290018488_1110770999821005_2691879510461168954_n.png" alt=""></a>
        </div>
      </div>
      <div class="header-text">
        <a href="deashBoard.php"><i class="bi bi-house-door"></i>Dashboard</a>
      </div>
      <div class="main-menu">
        <div class="menu-inner">
          <nav>
            <ul class="metismenu" id="menu">
              <li class="management">Management</li>
              <li>
                <a href="productCategory.php"  
                 ><i class="bi bi-graph-up"></i><span>Products Category </span>
                </a>

                <ul class="collapse show" id="services">
                  <li><a href="ProductSubCategory.php">Product Sub Category</a></li>
                  <li><a href="productColor.php">Product Colors</a></li>
                  <li><a href="productSize.php">Product Sizes</a></li>
                  <li><a href="productPacket.php">Product Packet</a></li>
                </ul>
              </li>
              <li><a href="user.php" data-bs-toggle="collapse show"aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Registration </span>
                </a>
              </li>
              <li><a href="login.php" data-bs-toggle="collapse show"aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Log Out </span>
                </a>
              </li> 
                        
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- sidebar menu End -->

    <!-- header area start -->
    <div class="main-content">
      <div class="header-area sticky-top ">
        <div class="row align-items-center">
          <div class="col-md-2 col-sm-2 header-left">
            <div class="nav-btn pull-left">
              <span><i class="bi bi-list"></i></span>
            </div>
          </div>
         
        </div>
      </div>
      <!-- header area end -->

      <!-- main content area start -->
      <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
          <div class="col-md-3 col-sm-3">
            <h4 style="margin-bottom: 0;">Products Size</h4>
          </div>
          <div class="col-md-10 col-sm-10"> </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-12">
            <div class="recentUser">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row pt-4 pb-4 px-2">
                    <div class="col-md-12">
                      <div class="product-add-btn">
                        <a  href="addSize.php" class="add-user">Add Product Size</a>
                       </div>

                       <table class="table" id="example">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Size Name</th>
                            <th scope="col">Create Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody> 
                        <?php
                        foreach ($products as $i => $product): ?>
                            <tr>
                                <th scope="row"><?php echo $i+1 ?></th>
                                
                                <td id="example"><?php echo $product ['size_name'] ?></td>
                                <td><?php echo $product ['create_date'] ?></td>
                                <td>
                                    <a href="updateSize.php?id=<?php echo $product['id'] ?>" type="button" class="btn btn-sm btn-outline-primary">Edit</a>
                                   <form style="display: inline-block" method="post" action="deleteSize.php" >
                                       <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                       <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                   </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="./js/jquery-2.2.4.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./js/app.js"></script>
</body>

</html>