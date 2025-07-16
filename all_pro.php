<?php 

	include("inc/header.php");
	include("inc/nav.php");
	include("inc/sidebar.php");
	?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">All Products</h1>
			</div>
		</div><!--/.row-->
    <?php
    $select_products = "SELECT * FROM products";
    $result_products = $con-> query($select_products);

    ?>
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">image</th>
      <th scope="col">Describtion</th>
      <th scope="col">Count</th>
      <th scope="col">Brand</th>
      <th scope="col">Category</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>
    <?php
     foreach( $result_products as $product){?>

     <tr>
      <td scope="col"><?= $product["Name"] ?></td>
      <td scope="col"><?= $product["price"] ?> LE</td>
      <td scope="col"><img src="image/<?= $product["image"] ?>" style="height:100px"></td>
      <td scope="col" style="height:150px" ><?= $product["describtion"] ?></td>
      <td scope="col"><?= $product["Count"] ?></td>
      <td scope="col"><?php $id_brand= $product["brand"];
      $select_brand = "SELECT * FROM brand WHERE id = '$id_brand'";
      $result_brand = $con -> query( $select_brand);
      $brand= $result_brand -> fetch_assoc();
      echo $brand['name'];?>
      </td>

      <td scope="col"><?php $id_category= $product["category"];
      $select_category = "SELECT * FROM category WHERE id = '$id_category'";
      $result_category = $con -> query( $select_category);
      $cat= $result_category -> fetch_assoc();
      echo $cat['name'];
      ?></td>
       <td scope="col">
        <a href="update_pro.php?id=<?=$product['id']?>"><button class="btn btn-primary"> Update </button></a>
        <br>
        <br>
        <a href="func/delete_pro.php?id=<?=$product['id']?>"><button class="btn btn-danger"> Delete </button></a>

     </td>
      

    </tr>

    <?php
     }
    ?>
    
  </tbody>
</table>
	<a href="add_pro.php"><button class="btn btn-success"> Add New </button></a>
        <br>
        <br>

		
	<?php 
	include("inc/footer.php");
	?>