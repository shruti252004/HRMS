<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Management Dashboard - Orange Theme</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      font-family: 'Inter', sans-serif;
      background-color: #fff8f0;
    }

    .sidebar {
      width: 240px;
      background: linear-gradient(135deg, #ff914d, #ff6e40);
      color: white;
      height: 100vh;
      padding: 30px 20px;
      position: fixed;
      left: 0;
      top: 0;
      box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    }

    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 40px;
      text-align: center;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar ul li {
      margin-bottom: 20px;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      font-size: 17px;
      display: block;
      padding: 10px;
      border-radius: 6px;
      transition: background 0.3s;
    }

    .sidebar ul li a:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .main-content {
      margin-left: 240px;
      padding: 30px;
      width: calc(100% - 240px);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .header h1 {
      font-size: 28px;
      color: #e65100;
    }

    .logout-btn {
      background-color: #ff7043;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .logout-btn:hover {
      background-color: #e64a19;
    }

    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 40px;
    }

    .card {
      background: #fff3e0;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      text-align: center;
      transition: transform 0.2s;
      border-left: 6px solid #fb8c00;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h2 {
      font-size: 18px;
      color: #bf360c;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 32px;
      font-weight: 600;
      color: #e65100;
    }

    .bar-graph {
      background: #fff3e0;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    canvas {
      width: 100% !important;
      height: 400px !important;
    }

    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        width: 100%;
        padding: 20px;
      }
      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>CMS Admin</h2>
    <ul>
      <li><a href="add_contact.jsp">Add Contact</a></li>
      <li><a href="view_contacts.jsp">View Contacts</a></li>
      <li><a href="search_contact.jsp">Search</a></li>
    
    </ul>
  </div>

  <div class="main-content">
    <div class="header">
      <h1>Contact Dashboard</h1>
      <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
    </div>

    <div class="dashboard">
      <div class="card">
        <h2>Total Contacts</h2>
        <p id="totalContacts">40</p>
      </div>
      <div class="card">
        <h2>Personal Contacts</h2>
        <p id="personalContacts">22</p>
      </div>
      <div class="card">
        <h2>Work Contacts</h2>
        <p id="workContacts">12</p>
      </div>
      <div class="card">
        <h2>Other Contacts</h2>
        <p id="otherContacts">6</p>
      </div>
    </div>

    <div class="bar-graph">
      <canvas id="contactChart"></canvas>
    </div>
  </div>

  <script>
    const contactChart = new Chart(document.getElementById('contactChart'), {
      type: 'bar',
      data: {
        labels: ['Total', 'Personal', 'Work', 'Other'],
        datasets: [{
          label: 'Contacts',
          data: [40, 22, 12, 6],
          backgroundColor: [
            '#ff7043',
            '#ffa726',
            '#ffb74d',
            '#ffcc80'
          ],
          borderRadius: 6,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 5
            }
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  </script>
</body>
</html>

