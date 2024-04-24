<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Budget Bar Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

<div class="home">
    <canvas id="eventChart" width="800" height="400"></canvas>
</div>
  <script>
    // Extracting data from the PHP array
    const events = <?php echo json_encode($data['events']); ?>;
    
    // Extracting EventID and TotalBudget
    const eventIDs = events.map(event => event.EventID);
    const totalBudgets = events.map(event => parseFloat(event.TotalBudget));

    // Creating the bar chart
    const ctx = document.getElementById('eventChart').getContext('2d');
    const eventChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: eventIDs,
        datasets: [{
          label: 'Total Budget (LKR)',
          data: totalBudgets,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>
</html>
