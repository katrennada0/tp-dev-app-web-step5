<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI History</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>BMI History for <?= htmlspecialchars($_SESSION['user']['username']) ?></h2>
  <canvas id="bmiChart" height="100"></canvas>

  <script>
    const ctx = document.getElementById('bmiChart').getContext('2d');
    const bmiData = <?= json_encode($data) ?>;

    const chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: bmiData.map(record => record.timestamp),
        datasets: [{
          label: 'BMI Over Time',
          data: bmiData.map(record => record.bmi),
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Your BMI History'
          }
        }
      }
    });
  </script>
</body>
</html>
