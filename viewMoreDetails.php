<?php
require "config/connection.php";
$id = $_GET["id"];
?>
<?php
$query = "select capsisTitle, capsisAuthors, capsisKeywords, capsisDateAdded, capsisAdviser, capsisPanelMember, capsisChairperson from capsisinformation where id=$id";
$filterresult = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($filterresult);

$pdfresult = mysqli_query($link, "select * from pdfinformation where id=$id");
$pdfrow = mysqli_fetch_assoc($pdfresult);

$idresult = mysqli_query($link, "select * from capsisinformation where id=$id");
$idrow = mysqli_fetch_assoc($idresult);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <link href="./bootstrap/css/styles.css" rel="stylesheet">
  <script type="text/javascript" src="./bootstrap/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>

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

    .container#main {
      margin-top: 100px;
    }
  </style>

</head>

<body>
  <div class="header text-center">
    <img src="./img/uc_logo_green_ext_h150.png" height="100" alt="">
  </div>
  <div class="container" id="main">
    <div class="row">
      <div class="col-md-3 text-center book-item">
        <div class="img-holder overflow-hidden">
          <img class="img-top" src="./img/bg-pic.png">
        </div>
      </div>
      <div class="col-md-9">
        <div class="card rounded-0 shadow">
          <div class="card-body">
            <div class="container-fluid">
              <h4><?= $row['capsisTitle'] ?></h4>
              <hr>
              <p><?php echo $row['capsisKeywords']; ?></p>
              <h4>Details</h4>
              <table class="table">
                <?php foreach ($row as $key => $value) {
                  if ($key == "capsisTitle" || $key == "capsisKeywords") {
                    continue;
                  }
                  switch ($key) {
                    case "capsisAuthors":
                      $key = "Authors";
                      break;
                    case "capsisAdviser":
                      $key = "Project Adviser";
                      break;
                    case "capsisPanelMember":
                      $key = "Project Panel Member";
                      break;
                    case "capsisChairperson":
                      $key = "Project Chairperson";
                      break;
                    case "capsisDateAdded":
                      $key = "Date Added/Updated";
                      break;
                  }
                ?>
                  <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                  </tr>
                <?php
                }
                if (isset($conn)) {
                  mysqli_close($conn);
                }
                ?>
              </table>
              <div class="text-center">
                <div class="btn-group">
                  <div style="margin-left: 15px;">
                    <a href="view.php?id=<?php echo $pdfrow["id"]; ?>">
                      <button type="button" class="btn btn-primary rounded-0 ">View Abstract</button></a>
                  </div>
                  <div style="margin-left: 15px;">
                    <a href="edit.php?id=<?php echo $idrow["id"]; ?>">
                      <button type="button" class="btn btn-primary rounded-0 btn-success">Update</button></a>
                  </div>
                  <div style="margin-left: 15px;">
                    <a href="delete.php?id=<?php echo $idrow["id"]; ?>">
                      <button type="button" class="btn btn-primary rounded-0 btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>