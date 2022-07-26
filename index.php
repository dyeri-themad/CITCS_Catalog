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
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Datatable CSS -->
  <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

  <style>
    body {
      padding: 0 0 0 0;
      background-image: url(./img/bg-pic3.png);
      font-family: "karla", sans-serif;
    }

    .header {
      margin-bottom: 20px;
      background-color: rgb(93, 114, 49, 0.5);
    }

    .header img {
      padding: 5px 0 5px 0;
      height: 125px;
    }

    #capsis_datatable {
      background-color: rgb(93, 114, 49);
    }

    th {
      color: white;
      text-align: center;
    }

    button.btn.btn-success {
      margin: 0 0 5px 15px;
    }

    /*Show entries*/
    #capsis_datatable_length {
      color: white;
      padding: 10px 5px 5px 5px;
      margin: 5px 0 5px 0;
      background-color: rgb(93, 114, 49, 0.5);
      border-radius: 25px;
    }

    #capsis_datatable_length select {
      color: black;
      background-color: white;
    }

    /*Search*/
    #capsis_datatable_filter {
      border-radius: 25px;
      padding: 10px 5px 5px 5px;
      color: white;
      margin: 5px 0 5px 0;
      background-color: rgb(93, 114, 49, 0.5);
    }

    #capsis_datatable_filter input {
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
      color: black;
      background-color: white;
    }
  </style>

</head>

<body>
  <div class="header text-center">
    <img src="./img/uc_logo_green_ext_h150.png" height="100" alt="">
  </div>

  <div class="p-5 text-center bg-light">
    <h1 class="mb-3">CITCS Capstone & Thesis Catalog</h1>
    <h4 class="mb-3">Capstone and Thesis Database List</h4>
  </div>

  <div class="container-fluid" id="main">
    <a href="insert.php?id=">
      <button type="button" class="btn btn-success">Insert New Data</button>
    </a>
    <div class="card rounded-0">
      <div class="card-body">
        <div class="col-lg-12 table-responsive">
          <table class="table table-succes table-bordered table-responsive table-hover" id="capsis_datatable">
            <thead>
              <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Title</th>
                <th>Author/s</th>
                <th>Keywords</th>
                <th>Category</th>
                <th>Research Adviser</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $res = mysqli_query($link, "select * from capsisinformation INNER JOIN pdfinformation ON capsisinformation.id = pdfinformation.id");
              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>";
                echo $row["capsisYear"];
                echo "</td>";
                echo "<td>";
                echo $row["capsisMonth"];
                echo "</td>";
                echo "<td>";
                echo $row["capsisTitle"];
                echo "</td>";
                echo "<td>";
                echo $row["capsisAuthors"];
                echo "</td>";
                echo "<td>";
                echo $row["capsisKeywords"];
                echo "</td>";
                echo "<td>";
                echo $row["capsisCategory"];
                echo "</td>";
                echo "<td>";
                echo $row["capsisAdviser"];
                echo "</td>";
                echo "<td>"; ?> <a href="viewMoreDetails.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-primary rounded-0 text-center" style="margin-right: 15px">More Info</button></a> <?php echo "</td>";
                                                                                                                                                                                                                }

                                                                                                                                                                                                                /* ----------------------------------WAG M0NG IDEDELETE TONG MGA CODES MAGAGAMIT ITO LATER ON HAHAHAAHAHAHAHA---------------------------------------

            $stat = mysqli_query($link,"select * from pdfinformation");
            while($row=mysqli_fetch_array($stat)){
              echo "<tr>";
            echo "<td>"; echo "<a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."</a>"; echo "</td>";
       

               // if you want na magpakita yung picture
                echo "<li><a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."</a><br/>
                <embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."' width='200'/>
                </li>";
                }*/
                                                                                                                                                                                                                // ------------------------------------------------------------------------------------------------------------------------------------------------
                                                                                                                                                                                                                  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>


</body>


<!-- THIS IS FOR NO DOUBLE INPUT BUT IDK IF IT WORKS (─‿‿─) -->
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<script>
  $(document).ready(function() {
    $('#capsis_datatable').DataTable();
  });
</script>

</html>