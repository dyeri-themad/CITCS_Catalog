<?php
require "config/connection.php";
$id = $_GET["id"];

$capsisYear = "";
$capsisMonth = "";
$capsisTitle = "";
$capsisAuthors = "";
$capsisKeywords = "";
$capsisCategory = "";

$res = mysqli_query($link, "select * from capsisinformation where id=$id");
while ($row = mysqli_fetch_array($res)) {
  $capsisYear = $row["capsisYear"];
  $capsisMonth = $row["capsisMonth"];
  $capsisTitle = $row["capsisTitle"];
  $capsisAuthors = $row["capsisAuthors"];
  $capsisKeywords = $row["capsisKeywords"];
  $capsisCategory = $row["capsisCategory"];
  $capsisDateAdded = $row["capsisDateAdded"];
}

$resPDF = mysqli_query($link, "select * from pdfinformation where id=$id");
while ($row = mysqli_fetch_array($resPDF)) {
  $name = $row["name"];
  $mime = $row["mime"];
  $data = $row["data"];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Research Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <!-- Datatable CSS -->
  <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="tablestyles.css">
  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  <style>
    body {
      padding: 0 0 0 0;
      background-image: url(./img/bg-pic3.png);
      font-family: "karla", sans-serif;
    }

    .header {
      position: relative;
      margin-bottom: 20px;
      background-color: rgb(93, 114, 49, 0.5);
    }

    .header img {
      padding: 5px 0 5px 0;
      height: 125px;
    }

    #main_form {
      color: white;
      font-weight: bolder;
      background-color: rgb(93, 114, 49, 0.5);
      padding: 20px;
      margin-top: 20px;
      border-radius: 20px;
      box-shadow: 0px 0px 61px -1px rgba(93, 114, 49, 0.83);
      -webkit-box-shadow: 0px 0px 61px -1px rgba(93, 114, 49, 0.83);
      -moz-box-shadow: 0px 0px 61px -1px rgba(93, 114, 49, 0.83);
    }

    #main_form .form-group {
      margin-bottom: 5px;
    }

    h2 {
      text-align: center;
      margin: 20px 0 20px 0;
    }
  </style>

</head>

<body>
  <div class="header text-center">
    <img src="./img/uc_logo_green_ext_h150.png" height="100" alt="">
  </div>
  <div class="container">
    <h2 style="margin-top:25px;"><b>Update Research Project</b></h2>
    <div class="container" id="main">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
          <form action="" name="form1" method="post" enctype="multipart/form-data" id="main_form">

            <!-- capsis Year-->
            <div class="form-group">
              <label for="capsisName">Project Year</label>
              <select class="form-control" id="capsisYear" name="capsisYear" value="<?php echo $capsisYear; ?>" required>
                <?php
                for ($i = 2010; $i <= 2050; $i++) {
                ?>
                  <option value="<?php echo $i; ?>" <?php if ($capsisYear == "$i") echo 'selected="selected"'; ?>><?php echo $i; ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <!-- capsis Month -->
            <div class="form-group">
              <label for="name">Project Month</label>
              <select class="form-control" id="capsisMonth" name="capsisMonth" value="<?php echo $capsisMonth; ?>" required>
                <option value="January" <?php if ($capsisMonth == "January") echo 'selected="selected"'; ?>>January</option>
                <option value="February" <?php if ($capsisMonth == "February") echo 'selected="selected"'; ?>>February</option>
                <option value="March" <?php if ($capsisMonth == "March") echo 'selected="selected"'; ?>>March</option>
                <option value="April" <?php if ($capsisMonth == "April") echo 'selected="selected"'; ?>>April</option>
                <option value="May" <?php if ($capsisMonth == "May") echo 'selected="selected"'; ?>>May</option>
                <option value="June" <?php if ($capsisMonth == "June") echo 'selected="selected"'; ?>>June</option>
                <option value="July" <?php if ($capsisMonth == "July") echo 'selected="selected"'; ?>>July</option>
                <option value="August" <?php if ($capsisMonth == "August") echo 'selected="selected"'; ?>>August</option>
                <option value="September" <?php if ($capsisMonth == "September") echo 'selected="selected"'; ?>>September</option>
                <option value="October" <?php if ($capsisMonth == "October") echo 'selected="selected"'; ?>>October</option>
                <option value="November" <?php if ($capsisMonth == "November") echo 'selected="selected"'; ?>>November</option>
                <option value="December" <?php if ($capsisMonth == "December") echo 'selected="selected"'; ?>>December</option>
              </select>
            </div>

            <!-- capsis Title -->
            <div class="form-group">
              <label for="name">Project Title</label>
              <input type="text" class="form-control" id="capsisTitle" name="capsisTitle" value="<?php echo $capsisTitle; ?>" required>
            </div>
            <!--capsis Authors -->

            <div class="form-group">
              <label for="capsisAuthors">Project Author/s (,)</label>
              <input type="text" class="form-control" id="capsisAuthors" name="capsisAuthors" value="<?php echo $capsisAuthors; ?>" required>
            </div>
            <!--capsis Keywords -->

            <div class="form-group">
              <label for="capsisKeywords">Keywords (,)</label>
              <input type="text" class="form-control" id="capsisKeywords" name="capsisKeywords" value="<?php echo $capsisKeywords; ?>" required>
            </div>

            <!--capsis Category-->
            <div class="form-group">
              <label for="name">Category</label>
              <select class="form-control" id="capsisCategory" name="capsisCategory" required>
                <option value="" disabled selected>Select your option</option>
                <option value="Capstone - Undergraduate" <?php if ($capsisCategory == "Capstone - Undergraduate") echo 'selected="selected"'; ?>>Capstone - Undergraduate</option>
                <option value="Capstone - Graduate" <?php if ($capsisCategory == "Capstone - Graduate") echo 'selected="selected"'; ?>>Capstone - Graduate</option>

                <option value="Thesis - Undergraduate" <?php if ($capsisCategory == "Thesis - Undergraduate") echo 'selected="selected"'; ?>>Thesis - Undergraduate</option>

                <option value="Thesis - Graduate" <?php if ($capsisCategory == "Thesis - Graduate") echo 'selected="selected"'; ?>>Thesis - Graduate</option>
              </select>
            </div>

            <div class="form-group">
              <label for="capstoneYear">Update Project Abstract File?</label>
              <input type="file" name="myfile" class="form-control" id="myfile" />
            </div>

            <div class="text-center">
              <div class="btn-group">
                <div style="margin-left: 15px;">
                  <button type="submit" name="update" class="btn btn-primary rounded-0" onclick="return confirm('Are you sure you want to update these items?');" style="margin-top: 15px;">Save</button>
                </div>
                <div style="margin-left: 15px;">
                  <a href="index.php?id="><button type="button" class="btn btn-success" style="margin-top: 15px;">Back to Home</button></a>
                </div>
              </div>
            </div>




        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>
<?php
if (isset($_POST["update"])) {
  mysqli_query($link, "update capsisinformation set 
      capsisYear='$_POST[capsisYear]', 
      capsisMonth='$_POST[capsisMonth]', 
      capsisTitle='$_POST[capsisTitle]',
      capsisAuthors='$_POST[capsisAuthors]',
      capsisKeywords='$_POST[capsisKeywords]',
      capsisCategory='$_POST[capsisCategory]',
      capsisDateAdded=NOW()
      where id=$id");

  if (isset($_FILES['myfile']) && $_FILES['myfile']['name'] != "") {
    $dbh = new PDO("mysql:host=localhost;dbname=capstonethesis_database", "root", "");
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);
    $stmt = $dbh->prepare("update pdfinformation set 
          name = ?,
          mime = ?,
          data = ? 
          where id =$id");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $type);
    $stmt->bindParam(3, $data);
    $stmt->execute();
  }
?>
  <script type="text/javascript">
    window.location = "index.php";
  </script>
<?php
}

?>

</html>