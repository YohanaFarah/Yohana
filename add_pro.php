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
				<h1 class="page-header">Add New Products</h1>
			</div>
		</div><!--/.row-->
		<?php
		$select_cat = "SELECT * FROM category";
		$result_cat = $con -> query($select_cat);

		$select_brand = "SELECT * FROM brand";
		$result_brand = $con -> query($select_brand);
		?>
	<form action="func/do_add_pro.php" method="post" enctype="multipart/form-data" >
		<div class="mb-3">
			<label for="Image"> Name </label>
        <input type="text" class="form-control" id="Name" placeholder="Name" name="name">
        </div>
		<div class="mb-3">
			<label for="Image"> Price </label>
        <input  type="text" class="form-control" id="price" placeholder="Price" name="price">
        </div>
		<div class="mb-3">
		<label for="Image">Add Your Product Image </label>
        <input type="file" class="" id="Image"  name="image">
        </div>
		<div class="mb-3">
			<label for="Describtion"> Describtion </label>
        <textarea  type="text" class="form-control" id="Describtion" placeholder="Describtion" name="describtion"></textarea>
        </div>
		<div class="mb-3">
			<label for="count"> Count </label>
        <input type="number" class="form-control" id="count" placeholder="Count" name="count">
        </div>
		<div class="mb-3">
		<label for="brand">Brand</label>
       <select  class="form-control" name="brand" id="brand">
		<?php
		foreach($result_brand as $brand){?>

		<option value="<?= $brand['id']?>"><?= $brand['name']?></option>

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

		<option value="<?= $cat['id']?>"><?= $cat['name']?></option>

        <?php
		}
		?>
	   </select>
        </div>
		<button style="margin: 20px 0 ;" class="btn btn-success" type="submit">Add New</button>
	</form>
		
		
	<?php 
	include("inc/footer.php");
	?>