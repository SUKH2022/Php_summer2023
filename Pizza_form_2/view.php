<?php
	// add code here
	require_once('database.php');
	$res=$database->read();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pizza Form</title>
	<meta name="description" content="Pizza Order Form">
	<meta name="robots" content="noindex, nofollow">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="css/style.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
	<header>
    <nav class="navbar navbar-dark bg-transparent">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="img/logo.png" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="./view.php">View</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
<div class="container Form_Container">
	<div class="row">
		<table class="table">
			<tr>
				<!-- field names -->
				<th>#</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>contact No.</th>
				<th>Pizza Type</th>
				<th>Pizza Size</th>
				<th>Crust Type</th>
				<th>Additional Top</th>
				<th>Delivery</th>
				<th>Delivery Address</th>
				<th>Payment Method</th>
			</tr>
			<!-- php starts here -->
			<!-- formate of the inserted rows from the order form -->
			<?php
				while($r=mysqli_fetch_assoc($res)){
			?>
			<tr>
				<!-- orderForm(fname, email, contact_no, piz_type, piz_size, cru_type, addResults, delivery, d_address, pay) -->
				<td><?php echo $r['id']; ?></td>
				<td><?php echo $r['fname']; ?></td>
				<td><?php echo $r['email']; ?></td>
				<td><?php echo $r['contact_no']; ?></td>
				<td><?php echo $r['piz_type']; ?></td>
				<td><?php echo $r['piz_size']; ?></td>
				<td><?php echo $r['cru_type']; ?></td>
				<td><?php echo $r['add_top']; ?></td>
				<td><?php echo $r['delivery']; ?></td>
				<td><?php echo $r['d_address']; ?></td>
				<td><?php echo $r['pay']; ?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>
</body>
</html>
