<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
  <style>
    /* Optional CSS styling for the canvas element */
    #employeeChart {
      width: 300px;
      height: 300px;
      margin: 0 auto;
      border: 1px solid #ddd;
      align : right;
    }
  </style>
</head>
<body>
<canvas id="employeeChart" width="5" height="5"></canvas>
    <script src="script.js"></script>

<script>
// Define data directly 
const femaleCount = 8;
const maleCount = 2;

const ctx = document.getElementById('employeeChart').getContext('2d');
const employeeChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            label: 'Employee Count',
            data: [maleCount, femaleCount],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)', // Light blue for male
                'rgba(255, 99, 132, 0.2)'  // Light pink for female
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)', // Blue for male
                'rgba(255, 99, 132, 1)'  // Red for female
            ],
            borderWidth: 1
        }]
    },
  
});
</script>
</body>
</html>