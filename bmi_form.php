<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI Calculator</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container mt-5">

  <h2 class="mb-4">BMI Calculator</h2>

  <form id="bmiForm">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="weight" class="form-label">Weight (kg)</label>
      <input type="number" class="form-control" id="weight" name="weight" required>
    </div>
    <div class="mb-3">
      <label for="height" class="form-label">Height (cm)</label>
      <input type="number" class="form-control" id="height" name="height" required>
    </div>
    <button type="submit" class="btn btn-primary">Calculate</button>
    <a href="bmi_chart.php" class="btn btn-info mt-3">View BMI History</a>
<a href="logout.php" class="btn btn-danger mt-3">Logout</a>

  </form>

  <div id="result" class="mt-4"></div>

  <script>
    $('#bmiForm').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: 'index.php',
        type: 'POST',
        data: {
          name: $('#name').val(),
          weight: $('#weight').val(),
          height: $('#height').val()
        },
        success: function(response) {
          $('#result').html(response);
        }
      });
    });
  </script>

</body>
</html>
