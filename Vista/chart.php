<?php require_once 'conetDataBase.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getting Started with Chart JS with www.chartjs3.com</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(54, 162, 235, 1);
      }
      /* .chartMenu p {
        padding: 10px;
        font-size: 20px;
      } */
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: linear-gradient(to right, #f2994a, #f2c94c);;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: black;
      }
    </style>
  </head>
  <body>
    <!-- <div class="chartMenu">
      <p>WWW.CHARTJS3.COM (Chart JS <span id="chartVersion"></span>)</p>
    </div> -->
    <div class="chartCard">
      <div class="chartBox">
        <input type="date" onchange='startDateFilter(this)' value='2023-09-01'>
        <input type="date" onchange='endDateFilter(this)' value='2023-09-30'>
        <canvas id="myChart"></canvas>
      </div>
    </div>

    <?php
      try {
        $sql = "SELECT * FROM dbtest2.telsa";
        $result = $conn->query($sql);

        if($result->rowCount() > 0) {
          while($row = $result->fetch()) {
            $dateArray[] = $row["date"];
            $priceArray[] = $row["price"];
          }

          unset($result);
        } else {
            echo 'No hay resultado en DB';
        }
      } catch(PDOException $e) {
        die('Error');
      }

      unset($conn);
      // print_r($dateArray)
    ?>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

    <script>
    const dateArrayJS = <?php echo json_encode($dateArray); ?>;
    //console.log(dateArrayJS);

    const dateChartJs = dateArrayJS.map((dia, index) => {
      let diaJS = new Date(dia);
      // console.log(diaJS);
      return diaJS.setHours(0, 0, 0, 0);
    });

    // setup 
    const data = {
      labels: dateChartJs,
      datasets: [{
        label: 'Ventas Diarias',
        data: <?php echo json_encode($priceArray); ?>,
        backgroundColor: [
          'rgba(75, 192, 192)'
        ],
        borderColor: [
          'rgba(75, 192, 192)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        autoSkip: false,
        scales: {
          x: {
            // min:'2023-09-01',
            // max:'2023-09-30',
            type: 'time',
            time: {
              unit: 'day'
            }
          },
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    // // Instantly assign Chart.js version
    // const chartVersion = document.getElementById('chartVersion');
    // chartVersion.innerText = Chart.version;



    function startDateFilter(date) {
      const startDate = new Date(date.value);
      console.log(startDate.setHours(0, 0, 0, 0));
      // console.log('hgola');
      myChart.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
      myChart.update();
    }

    function endDateFilter(date) {
      const endDate = new Date(date.value);
      console.log(endDate.setHours(0, 0, 0, 0));
      // console.log('hgola');
      myChart.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
      myChart.update();
    }
    </script>


  </body>
</html>