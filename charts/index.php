<?php
 $con = mysqli_connect('localhost','root','','schlock');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
         ['Browser', 'Visits'],
             <?php 
          $query = "SELECT count(movie_id) AS count, tag_id, id, tag FROM movies_tags INNER JOIN tags ON tag_id = id GROUP BY tag_id ";
 
          $exec = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($exec)){
 
          echo "['".$row['tag']."',".$row['count']."],";
          }
    ?>
        ]);
 
        var options = {
          title: 'Tags of movies'
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
        chart.draw(data, options);
      }
    </script>
</head>
<body>
   <h3>Pie Chart</h3>
   <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>



<!-- function drawChart () {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'foo');
    data.addColumn('number', 'bar');
    <?php
        // query MySQL and put results into array $results
        foreach ($results as $row) {
            echo "data.addRow(['{$row['foo']}', {$row['bar']}]);";
        }
    ?>
    var chart = new google.visualization.BarChart('chart_div');
    chart.draw(data, <options>);
} -->
