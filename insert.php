<?php
require "config/connection.php";
?>
<?php
$query = "select * from capsisinformation INNER JOIN pdfinformation ON capsisinformation.id = pdfinformation.id";
$filterresult = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add New Research Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="tablestyles.css">

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
  </style>

</head>

<body>
  <div class="header text-center">
    <img src="./img/uc_logo_green_ext_h150.png" height="100" alt="">
  </div>
  <div class="container">
    <div class="container" id="main">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
          <form action="" name="form1" method="post" enctype="multipart/form-data" id="main_form">

            <!-- capsis Year-->
            <div class="form-group">
              <label for="capsisName">Project Year</label>
              <select class="form-control" id="capsisYear" name="capsisYear" required>
                <?php
                for ($i = 2010; $i <= 2050; $i++) {
                ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <!-- capsis Month -->
            <div class="form-group">
              <label for="name">Project Month</label>
              <select class="form-control" id="capsisMonth" name="capsisMonth" required>
                <option value="" disabled selected>Select your option</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select>
            </div>

            <!-- capsis Title -->
            <div class="form-group">
              <label for="name">Project Title</label>
              <input type="text" class="form-control" id="capsisTitle" name="capsisTitle" required>
            </div>
            <!--capsis Authors -->

            <div class="form-group">
              <label for="capsisAuthors">Project Author/s (,)</label>
              <input type="text" class="form-control" id="capsisAuthors" name="capsisAuthors" required>
            </div>
            <!--capsis Keywords -->

            <div class="form-group">
              <label for="capsisKeywords">Keywords (,)</label>
              <input type="text" class="form-control" id="capsisKeywords" name="capsisKeywords" required>
            </div>
            <!--capsis Category-->
            <div class="form-group">
              <label for="name">Category</label>
              <select class="form-control" id="capsisCategory" name="capsisCategory" required>
                <option value="" disabled selected>Select your option</option>
                <option value="Capstone - Undergraduate">Capstone - Undergraduate</option>
                <option value="Capstone - Graduate">Capstone - Graduate</option>
                <option value="Thesis - Undergraduate">Thesis - Undergraduate</option>
                <option value="Thesis - Graduate">Thesis - Graduate</option>
              </select>
            </div>

            <!--capsis Adviser-->
            <div class="form-group">
              <label for="name">Project Adviser</label>
              <select class="form-control" id="capsisAdviser" name="capsisAdviser" required>
                <option value="">--- Select ---</option>
                <?php
                // Connect to database 
                $con = mysqli_connect("localhost", "root", "", "capstonethesis_database");

                // Get all the categories from category table
                $sql = "SELECT * FROM facultyinformation";
                $all_categories = mysqli_query($con, $sql);
                ?>

                <?php
                // use a while loop to fetch data 
                // and individually display as an option
                while ($capsisAdviser = mysqli_fetch_array(
                  $all_categories,
                  MYSQLI_ASSOC
                )) :;
                ?>
                  <option value="<?php echo $capsisAdviser["facultyName"];
                                  // The value we usually set is the primary key (but this will be the value saved)
                                  ?>">
                    <?php echo $capsisAdviser["facultyName"];
                    // To show the category name to the user
                    ?>
                  </option>
                <?php
                endwhile;
                ?>
              </select>
            </div>

            <!--capsis Panel-->
            <div class="form-group">
              <label for="name">Project Panel Member</label>
              <select class="form-control" id="capsisPanelMember" name="capsisPanelMember" required>
                <option value="">--- Select ---</option>
                <?php
                // Connect to database 
                $con = mysqli_connect("localhost", "root", "", "capstonethesis_database");

                // Get all the categories from category table
                $sql = "SELECT * FROM facultyinformation";
                $all_categories = mysqli_query($con, $sql);
                ?>

                <?php
                // use a while loop to fetch data 
                // and individually display as an option
                while ($capsisPanelMember = mysqli_fetch_array(
                  $all_categories,
                  MYSQLI_ASSOC
                )) :;
                ?>
                  <option value="<?php echo $capsisPanelMember["facultyName"];
                                  // The value we usually set is the primary key (but this will be the value saved)
                                  ?>">
                    <?php echo $capsisPanelMember["facultyName"];
                    // To show the category name to the user
                    ?>
                  </option>
                <?php
                endwhile;
                ?>
              </select>
            </div>

            <!--capsis Chairperson-->
            <div class="form-group">
              <label for="name">Project Chairperson</label>
              <select class="form-control" id="capsisChairperson" name="capsisChairperson" required>
                <option value="">--- Select ---</option>
                <?php
                // Connect to database 
                $con = mysqli_connect("localhost", "root", "", "capstonethesis_database");

                // Get all the categories from category table
                $sql = "SELECT * FROM facultyinformation";
                $all_categories = mysqli_query($con, $sql);
                ?>

                <?php
                // use a while loop to fetch data 
                // and individually display as an option
                while ($capsisChairperson = mysqli_fetch_array(
                  $all_categories,
                  MYSQLI_ASSOC
                )) :;
                ?>
                  <option value="<?php echo $capsisChairperson["facultyName"];
                                  // The value we usually set is the primary key (but this will be the value saved)
                                  ?>">
                    <?php echo $capsisChairperson["facultyName"];
                    // To show the category name to the user
                    ?>
                  </option>
                <?php
                endwhile;
                ?>
              </select>
            </div>




            <div class="form-group">
              <label for="capstoneYear">Upload Abstract File</label>
              <input type="file" name="myfile" class="form-control" id="myfile" required />
            </div>


            <div class="text-center">
              <div class="btn-group">
                <div style="margin-left: 15px;">
                  <button type="submit" name="insert" class="btn btn-success rounded-0" style="margin-top: 15px;">Save</button>
                </div>
                <div style="margin-left: 15px;">
                  <a href="index.php?id="><button type="button" class="btn btn-default" style="margin-top: 15px;">Back to Home</button></a>
                </div>
              </div>
            </div>

          </form>


          </form>
        </div>
      </div>
    </div>
  </div>



</body>

<?php
if (isset($_POST['insert'])) {
  mysqli_query($link, "insert into capsisinformation values(null, '$_POST[capsisYear]', '$_POST[capsisMonth]', '$_POST[capsisTitle]', '$_POST[capsisAuthors]', '$_POST[capsisKeywords]', '$_POST[capsisCategory]', NOW(), '$_POST[capsisAdviser]','$_POST[capsisPanelMember]', '$_POST[capsisChairperson]')");

  if (isset($_FILES['myfile']) && $_FILES['myfile']['name'] != "") {
    $dbh = new PDO("mysql:host=localhost;dbname=capstonethesis_database", "root", "");
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);
    $stmt = $dbh->prepare("insert into pdfinformation values(null,?,?,?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $type);
    $stmt->bindParam(3, $data);
    $stmt->execute();
  }
?>


  <script type="text/javascript">
    window.location.href = window.location.href;
  </script>
<?php
}
?>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

</html>