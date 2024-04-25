<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Charts</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 80vw;
      max-height: 800px ;
      margin: 0 auto;
      gap : 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .chart-container {
      width: 400px;
      padding: 20px;
      background-color: #f9f9f9;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    p {
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
      color: #666;
    }
  </style>
</head>
<body>
  <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
  <div class="home">
    <h1>Event Statistics</h1>
      <div class="container">
        <div class="chart-container">
          <canvas id="monthChart" width="400" height="200"></canvas>
          <p>Events in each month</p>
        </div>
        <div class="chart-container">
          <canvas id="eventChart" width="400" height="200"></canvas>
          <p>Budget for each event</p>
        </div>
        <div class="chart-container">
          <canvas id="typePieChart" width="300" height="100"></canvas>
          <p>Event Types</p>
        </div>
        <div class="chart-container">
          <canvas id="ratingBarChart" width="400" height="200"></canvas>
          <p>Event Ratings</p>
        </div>
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
      acc[event.PackageName] = (acc[event.PackageName] || 0) + 1;
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
    const feedbacks = <?php echo json_encode($data['feedbacks']); ?>;

    const ratings = {};
    feedbacks.forEach(feedback => {
      ratings[feedback.Rating] = (ratings[feedback.Rating] || 0) + 1;
    });

    const ctxBar = document.getElementById('ratingBarChart').getContext('2d');

    const ratingBarChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: Object.keys(ratings),
        datasets: [{
          label: 'Event Ratings',
          data: Object.values(ratings),
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 1
        }]
      },
      options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
    });

  </script>
</body>
</html>
