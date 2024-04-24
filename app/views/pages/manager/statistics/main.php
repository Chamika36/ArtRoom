<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Charts</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

    <div class="home" style="display:flex; flex-wrap: wrap;">
        <div style="width: 500px; margin: 50px;">
            <canvas id="monthChart" width="800" height="400"></canvas>
            <p>Events in each month</p>
        </div>
        <div style="width: 500px; margin: 50px">
            <canvas id="eventChart" width="800" height="400"></canvas>
            <p>Budget for each event</p>
        </div>
        <div style="width: 400px; margin: 50px; margin-top: 20px">
            <canvas id="typePieChart" width="800" height="400"></canvas>
            <p>Event Types</p>
        </div>
        <div style="width: 400px; margin: 50px; margin-top: 20px">
            <canvas id="ratingRadarChart" width="800" height="400"></canvas>
            <p>Event Ratings</p>
        </div>
    </div>

  <script>
    // Extracting data from the PHP array
    const events = <?php echo json_encode($data['events']); ?>;
    
    // Event Month Chart
    const eventMonths = {};
    events.forEach(event => {
      const date = new Date(event.EventDate);
      const month = date.getMonth() + 1; 
      eventMonths[month] = (eventMonths[month] || 0) + 1;
    });

    const ctxMonth = document.getElementById('monthChart').getContext('2d');
    const monthChart = new Chart(ctxMonth, {
      type: 'bar',
      data: {
        labels: Object.keys(eventMonths),
        datasets: [{
          label: 'Number of Events in each Month',
          data: Object.values(eventMonths),
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgb(75, 192, 192)',
          borderWidth: 1
        }]
      },
      options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
    });

    // Event Budget Chart
    const eventIDs = events.map(event => event.EventID);
    const totalBudgets = events.map(event => parseFloat(event.TotalBudget));

    const ctxEvent = document.getElementById('eventChart').getContext('2d');
    const eventChart = new Chart(ctxEvent, {
      type: 'line',
      data: {
        labels: eventIDs,
        datasets: [{
          label: 'Total Budget (LKR)',
          data: totalBudgets,
          backgroundColor: 'rgba(255, 99, 132, 0.5)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
    });

    // Example data for the Pie Chart
    const eventTypeCounts = events.reduce((acc, event) => {
      acc[event.PackageID] = (acc[event.PackageID] || 0) + 1;
      return acc;
    }, {});

    const ctxType = document.getElementById('typePieChart').getContext('2d');
    const typePieChart = new Chart(ctxType, {
      type: 'pie',
      data: {
        labels: Object.keys(eventTypeCounts),
        datasets: [{
          data: Object.values(eventTypeCounts),
          backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple']
        }]
      }
    });

    // Example data for the Radar Chart
    const eventRatings = {
      "Quality": [3, 4, 5, 3, 4],
      "Value": [4, 4, 4, 5, 3],
      "Timeliness": [3, 5, 4, 3, 4],
      "Experience": [5, 4, 3, 3, 5]
    };

    const ctxRadar = document.getElementById('ratingRadarChart').getContext('2d');
    const ratingRadarChart = new Chart(ctxRadar, {
      type: 'radar',
      data: {
        labels: Object.keys(eventRatings),
        datasets: [{
          label: 'Event Ratings',
          data: Object.values(eventRatings).map(rating => rating.reduce((a, b) => a + b, 0) / rating.length),
          fill: true,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgb(54, 162, 235)',
          pointBackgroundColor: 'rgb(54, 162, 235)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgb(54, 162, 235)'
        }]
      },
      options: {
        elements: {
          line: {
            tension: 0, // disables bezier curves
          }
        }
      }
    });
  </script>
</body>
</html>
