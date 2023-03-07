

<?php  
 $connect = mysqli_connect("localhost", "root", "", "myGraph_db");  
 $query = "SELECT region, count(*) as hiv_number FROM people GROUP BY region";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Regional HIV Breakdown</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['region', 'hiv_number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["region"]."', ".$row["hiv_number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'In Percentage format(%)',  
                      //is3D:true,  
                      pieHole: 0.3  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:800px;">  
                <h3 align="center">Regional HIV Breakdown</h3>  
                <br />  
                     
                <div id="piechart" style="width: 1300px; height: 500px;"></div> 
   		 
           </div>  
      </body>  
 </html>  

tbl_e
