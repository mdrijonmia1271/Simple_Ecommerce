<?php


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=simple_ecommerce','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT id, category_name FROM category');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
// echo "<pre>";
//  var_dump($products);
// echo "</pre>";

$emtCateName = '';
$emtSubCateName = '';
$emtColorName = '';
$emtSizeName = '';
$emtPacketName = '';
$emtQuantity = '';
if(isset($_POST['submit'])){
  $category_name = $_POST['category_name'];
  $sub_category_name = $_POST['sub_category_name'];
  $color_name = $_POST['color_name'];
  $size_name = $_POST['size_name'];
  $packet_name = $_POST['packet_name'];
  $quantity = $_POST['quantity'];
  $description = $_POST['description'];
  $status = isset($_POST['status']) && $_POST['status']  ? "1" : "0";
  $date = date('Y-m-d H:i:s');

  if(empty($category_name)){
    $emtCateName = 'Fill Up this field';
  }
  // echo $category_name_id;
  if(empty($sub_category_name)){
    $emtSubCateName = 'Fill Up this field';
  }
  if(empty($color_name)){
    $emtColorName = 'Fill Up this field';
  }
  if(empty($size_name)){
    $emtSizeName = 'Fill Up this field';
  }
  if(empty($packet_name)){
    $emtPacketName = 'Fill Up this field';
  }
  if(empty($quantity)){
    $emtQuantity = 'Fill Up this field';
  }

  if(!empty($sub_category_name) && (!empty($category_name_id))){
    $statement = $pdo ->prepare('INSERT INTO sub_category (sub_category_name, category_name_id, description, create_date, status )
                 VALUE(:sub_category_name, :category_name_id, :description, :date, :status )');
    $statement->bindVAlue(':sub_category_name', $sub_category_name);
    $statement->bindVAlue(':category_name_id', $category_name_id);
    $statement->bindVAlue(':description', $description);
    $statement->bindVAlue(':date', $date);
    $statement->bindVAlue(':status', $status);
    $statement->execute();
    header('location: ProductSubCategory.php');
    

  }

}

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
        <a href="index.html"><i class="bi bi-house-door"></i>Dashboard</a>
      </div>
      <div class="main-menu">
        <div class="menu-inner">
          <nav>
            <ul class="metismenu" id="menu">
              <li class="management">Management</li>
              <li>
                <a href="productCategory.php" data-bs-toggle="collapse show" data-bs-target="#productCategory" aria-controls="productCategory" aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Products Category </span>
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
        <div class="row" >
          <div class="col-md-12  " >
            <div style="overflow-x:auto;" data-aos="fade-up" class="shadow bg-white  py-5 px-4">

           <form action="" method="POST" enctype="multipart/form-data">
            <h5>Add Deash Board Products</h5>
              <table style="width:100%" class="current-data-table" > 
                <!-- Category Section Start -->
                <tr>
                  <th>Category Name:</th>
                  <td>
                    <select name="category_name">
                      <option value=""  selected="selected"> -- Select Size -- </option>
                      <?php
                      // Iterating through the product array
                      foreach($products as $key => $item){
                          echo "<option value='$key'>$item</option>";
                      }
                      ?>
                  </select>
                  <br>
                  <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtCateName."</span>";} ?>
                  </td>
                </tr>
                <!-- Category Section End -->

                <!-- Sub Category Section Start -->
                  <tr>
                  <th>Sub Category Name:</th>
                  <td>
                    <select name="sub_category_name">
                        <?php
                            $statement = $pdo->prepare('SELECT id, sub_category_name FROM sub_category');
                            $statement->execute();
                            $products = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
                        ?>
                      <option value=""  selected="selected"> -- Select Sub Categoty -- </option>
                      <?php
                      // Iterating through the product array
                      foreach($products as $key => $item){
                          echo "<option value='$key'>$item</option>";
                      }
                      ?>
                  </select>
                  <br>
                  <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtSubCateName."</span>";} ?>
                  </td>
                </tr>
                <!-- Sub Category Section End -->
                
                <!-- Color Section Start -->
                <tr>
                  <th>Color Name:</th>
                  <td>
                    <select name="color_name">
                        <?php
                            $statement = $pdo->prepare('SELECT id, color_name FROM colors');
                            $statement->execute();
                            $products = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
                        ?>
                      <option value=""  selected="selected"> -- Select Color -- </option>
                      <?php
                      // Iterating through the product array
                      foreach($products as $key => $item){
                          echo "<option value='$key'>$item</option>";
                      }
                      ?>
                  </select>
                  <br>
                  <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtColorName."</span>";} ?>
                  </td>
                </tr>
                <!-- Color Section End -->

                <!-- Size Section Start -->
                 <tr>
                  <th>Size Name:</th>
                  <td>
                    <select name="size_name">
                        <?php
                            $statement = $pdo->prepare('SELECT id, size_name FROM sizes');
                            $statement->execute();
                            $products = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
                        ?>
                      <option value=""  selected="selected"> -- Select Size -- </option>
                      <?php
                      // Iterating through the product array
                      foreach($products as $key => $item){
                          echo "<option value='$key'>$item</option>";
                      }
                      ?>
                  </select>
                  <br>
                  <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtSizeName."</span>";} ?>
                  </td>
                </tr>
                <!-- Size Section End -->
                    
                <!-- Packet Section Start -->
                <tr>
                  <th>Packet Name:</th>
                  <td>
                    <select name="packet_name">
                        <?php
                            $statement = $pdo->prepare('SELECT id, packet_name FROM packets');
                            $statement->execute();
                            $products = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
                        ?>
                      <option value=""  selected="selected"> -- Select Packet -- </option>
                      <?php
                      // Iterating through the product array
                      foreach($products as $key => $item){
                          echo "<option value='$key'>$item</option>";
                      }
                      ?>
                  </select>
                  <br>
                  <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtPacketName."</span>";} ?>
                  </td>
                </tr>
                <!-- Packet Section End -->

                <!-- Quantity Section Start -->
                <tr>
                  <th>Quantity:</th>
                  <td>
                    <input type="text" name="quantity" placeholder="Enter Quantity">
                    <br>
                    <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtQuantity."</span>";} ?>
                  </td>
                </tr>
                <!-- Quantity Section End -->

                <tr>
                  <th>Sub Category Description:</th>
                  <td>
                    <textarea cols="50" name="description" placeholder="Description"></textarea>
                  </td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td><label class="switch">
                      <input type="checkbox" name="status">
                      <span class="slider round"></span>
                    </label>
                    <br>
                    <?php if(isset($_POST['submit'])){echo "<span class='text-danger'>".$emtQuantity."</span>";} ?>
                </td>
                </tr>
              </table>
              <!-- <div class="col-6 categorySubmit"> -->
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <!-- </div> -->
           </form>
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