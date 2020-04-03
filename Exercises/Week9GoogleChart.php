<?php 

$result = array(
    
    0 => array('task' => 'Workx',  'hours' =>    42),
    1 => array('task' => 'Watch TVx','hours' =>  12),
    2 => array('task' => 'Sleepx',  'hours' =>   1),
    3 => array('task' => 'Play Gamesx','hours' =>  16)
);

print_r($result);

?>
<html>
    <head>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['task', 'Hours per Day'],

                <?php $data = "";
                foreach($result as $result) : 
                    $data .= "['".$result['task']."', ".$result['hours']."], \n \t\t\t\t";
                endforeach ;
                echo substr($data, 0, strrpos($data, ','));
                ?>
            ]);

            var options = {
            title: 'My Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        </script>

    </head>
    <body>


        <div id="piechart" style="width: 900px; height: 500px;"></div>

    </body>
</html>
