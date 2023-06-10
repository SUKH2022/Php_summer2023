<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizza Form</title>
  <meta name="description" content="Pizza Order Form">
  <meta name="robots" content="noindex, nofollow">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">

  <!-- CSS Link -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <!-- header section -->
    <nav class="navbar navbar-dark bg-transparent">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="img/logo.png" alt="header logo"></a>
        <div>
          <a href="./view.php"><img class="buger" src="./img/buger.png" alt="navbar buger"></a>
        </div>
      </div>
    </nav>
  </header>
  <h1 class="space">Order Form</h1>
  <main class="container">
    <section class="myform">
      <form action="" class="" name="" method="post">
        <div class="row">
          <!-- form starts here -->
          <!-- personal details -->
          <div class="form-group col-6">
            <label class="bold">Full Name</label>
            <input type="text" name="fname" class="form-control" placeholder="Full Name" required>
          </div>

          <div class="form-group col-6">
            <label class="bold">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>

          <div class="form-group col-6 space">
            <label class="bold">Contact No.</label>
            <input type="tel" name="contact_no" class="form-control" placeholder="Contact No." required>
          </div>
        </div>

        <!-- Pizza details -->
        <div class="row">
          <div class="form-group col-5 space">
            <label class="bold">Pizza Type</label>
            <select id="piz_type" name="piz_type" class="form-control">
              <option value="margherita">Margherita</option>
              <option value="pepperoni">Pepperoni</option>
              <option value="hawaiian">Hawaiian</option>
              <option value="Italian Classic">Italian Classic</option>
              <option value="Smokey Maple Bacon">Smokey Maple Bacon</option>
              <option value="Chicken Caesar">Chicken Caesar</option>
              <option value="BBQ Chicken">BBQ Chicken</option>
              <option value="Meat Lover's">Meat Lover's</option>
              <option value="Veggie Lover's">Veggie Lover's</option>
              <option value="Canadian">Canadian</option>
              <option value="Supreme Lover's">Supreme Lover's</option>
              <option value="Triple Crown">Triple Crown</option>
              <option value="Cheese Lover's">Cheese Lover's</option>
              <option value="Super Supreme Lover's">Supreme Lover's</option>
            </select>
          </div>

          <div class="form-group col-3 space">
            <label class="bold">Pizza Size</label>
            <select id="piz_size" name="piz_size" class="form-control">
              <option value="small">Small</option>
              <option value="medium">Medium</option>
              <option value="large">Large</option>
            </select>
          </div>

          <div class="form-group col-3 space">
            <label class="bold">Crust Type</label>
            <select id="cru_type" name="cru_type" class="form-control">
              <option value="thin-crust">Thin Crust</option>
              <option value="thick-crust">Thick Crust</option>
              <option value="stuffed-crust">Stuffed Crust</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-check form-check-inline col-11 space">
            <label class="bold">Additional Toppings:- </label>
            <input id="add_top1" type="checkbox" name="add_top[]" value="pepperoni">
            <label class="form-check-label" for="add_top1">Pepperoni</label>
            <input id="add_top2" type="checkbox" name="add_top[]" value="mushrooms">
            <label class="form-check-label" for="add_top2"> Mushrooms </label>
            <input  id="add_top3" type="checkbox" name="add_top[]" value="onions">
            <label class="form-check-label" for="add_top3"> Onions </label>
            <input id="add_top4" type="checkbox" name="add_top[]" value="Bacon">
            <label class="form-check-label" for="add_top4"> Bacon </label>
            <input id="add_top5" type="checkbox" name="add_top[]" value="pepper">
            <label class="form-check-label" for="add_top5"> Pepper </label>
          </div>
        </div>

        <!-- Delivery preferences -->
        <div class="row">
          <div class="form-group col-4 space">
            <label class="bold space">Delivery:- </label>
            <input type="radio" id="delivery" name="delivery" value="yes">
            <label for="delivery">Yes</label>
            <input type="radio" id="pickup" name="delivery" value="no">
            <label for="pickup">No</label>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <label class="bold">Address</label>
            <input type="text" name="d_address" class="form-control" placeholder="Delivery Address">
          </div>
          
          <div class="form-group col-3 space">
            <label class="bold">Payment Method</label>
            <select id="pay" name="pay" class="form-control" required>
              <option value="cash">Cash on Delivery</option>
              <option value="debit/credit">Debit/Credit Card</option>
              <option value="interact">Interact</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6 space">
            <input type="submit" class="btn btn-success" value="Submit">
          </div>
        </div>
      </form>
      <div class="form-group submit-message">
        <!-- require_once scans the file once but require open many files which can create a vulnerability in the program -->
        <!-- php starts here -->
        <?php
        // orderForm(fname, email, contact_no, piz_type, piz_size, cru_type, add_top, delivery, d_address, pay)
        require_once('database.php');
        if (isset($_POST) & !empty($_POST)) {
          $fname = $database->sanitize($_POST['fname']);
          $email = $database->sanitize($_POST['email']);
          $contact_no = $database->sanitize($_POST['contact_no']);
          $piz_type = $database->sanitize($_POST['piz_type']);
          $piz_size = $database->sanitize($_POST['piz_size']);
          $cru_type = $database->sanitize($_POST['cru_type']);
          // $add_top = $database->sanitize($_POST['add_top']);
          $delivery = $database->sanitize($_POST['delivery']);
          $d_address = $database->sanitize($_POST['d_address']);
          $pay = $database->sanitize($_POST['pay']);
          //add toppings in the array
          $addResults = "";
          $addName = ($_POST['add_top']);
          foreach ($addName as $addValue) {
            // putting a comma separator at the last
            $addResults .= $addValue. ", ";
          }
          // Database message
          //$fname, $email, $contact_no, $piz_type, $piz_size, $cru_type, $add_top, $delivery, $d_address, $pay
          $res = $database->create($fname, $email, $contact_no, $piz_type, $piz_size, $cru_type, $addResults, $delivery, $d_address, $pay);
          if ($res) {
            echo "<p>Good Job!!</p>";
          } else {
            echo "<p>You failed!</p>";
          }
        }
        ?>
      </div>
    </section>
  </main>
</body>

</html>