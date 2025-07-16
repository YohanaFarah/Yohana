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
				<h1 class="page-header">Update Products</h1>
			</div>
		</div><!--/.row-->
		
        <?php
		$select_cat = "SELECT * FROM category";
		$result_cat = $con -> query($select_cat);

		$select_brand = "SELECT * FROM brand";
		$result_brand = $con -> query($select_brand);

		  $id_pro = $_GET["id"];
		  $select_pro = "SELECT * FROM products WHERE id = '$id_pro' ";
		  $result_pro = $con -> query($select_pro);
		  $pro = $result_pro -> fetch_assoc();
		  
		
		?>
		<form action="func/do_update_pro.php" method="post" enctype="multipart/form-data" >
			
			<input type="hidden" name ="id" value="<?=$pro['id']?>">

		<div class="mb-3">
			<label for="Name">Product Name </label>
        <input type="text" class="form-control" id="Name" placeholder="Name" name="name" value="<?=$pro['Name'];?>">
        </div>
		<div class="mb-3">
			<label for="price"> Price </label>
        <input  type="text" class="form-control" id="price" placeholder="Price" name="price"  value="<?=$pro['price'];?>">
        </div>
		<div class="mb-3">
		<label for="Image">Update Your Product Image </label>
        <input type="file" class="" id="Image"  name="image" >
		<br>
		<img src="image/<?=$pro['image']?>" alt="lastImage" style="height:100px" >
        </div>
		<div class="mb-3">
			<label for="Describtion"> Describtion </label>
        <textarea  type="text" class="form-control" id="Describtion" placeholder="Describtion" name="describtion" ><?=$pro['describtion'];?></textarea>
        </div>
		<div class="mb-3">
			<label for="count"> Count </label>
        <input type="number" class="form-control" id="count" placeholder="Count" name="count"  value="<?=$pro['Count'];?>">
        </div>
		<div class="mb-3">
		<label for="brand">Brand</label>
       <select  class="form-control" name="brand" id="brand">
		<?php
		foreach($result_brand as $brand){?>

		<option <?php 
		   
		   if($brand['id'] == $pro['brand']){
			echo "selected";

		   }

		?> value="<?= $brand['id']?>"><?= $brand['name']?></option>

        <?php
		}
		?>
	   </select>
        </div>

		<div class="mb-3">
		<label for="category">Category</label>
       <select class="form-control" name="category" id="category" >
		<?php
		foreach($result_cat as $cat){?>

		<option
		<?php 
		   
		   if($cat['id'] == $pro['category']){
             echo "selected";
		   }

		?> value="<?= $cat['id']?>"><?= $cat['name']?></option>

        <?php
		}
		?>
	   </select>
        </div>
		<button style="margin: 20px 0 ;" class="btn btn-success" type="submit">Update Items</button>
	</form>
		
	<?php 
	include("inc/footer.php");
	?>