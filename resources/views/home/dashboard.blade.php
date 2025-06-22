<?php // views/dashboard.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tableau de bord</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
    .card-custom { border-radius:1rem; box-shadow:0 0.75rem 1.5rem rgba(0,0,0,0.1); }
    .table-custom thead { background-color:#f1f3f5; }
    .section-title { font-weight:600; margin-bottom:1rem; }
    @media(min-width:1200px){ canvas#absenceChart{max-height:300px;} }
  </style>
</head>
<body>
  <button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
  <div class="container-fluid p-0">
    <div class="row g-0">
     
    
    @include('partials.sidebar')
       
      <div class="col-12" id="content">
        <nav class="navbar navbar-expand navbar-light bg-white py-1" style="border-bottom:1px solid black;margin:10px;">
          <div class="container-fluid">
            <span class="navbar-brand"><i class="bi bi-speedometer2"></i> Tableau de bord</span>
            <div class="ms-auto"><span class="text-muted" id="User"></span></div>
          </div>
        </nav>
        <main class="p-2">
          <div class="py-4">
            <h2 id="welcomeMessage" class="mb-4">Bienvenue, Anas</h2>
            <div class="row mb-4" id="statCards">
              <!-- Static Stats Cards -->
              <div class="col-md-4 mb-3">
                <div class="card card-custom text-white bg-primary">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Total Etudiants</h5>
                      <h3>150</h3>
                    </div>
                    <i class="bi bi-people fs-1"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="card card-custom text-white bg-success">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Présences</h5>
                      <h3>14</h3>
                    </div>
                    <i class="bi bi-check-circle fs-1"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="card card-custom text-white bg-danger">
                  <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Absences</h5>
                      <h3>05</h3>
                    </div>
                    <i class="bi bi-x-circle fs-1"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-5">
              <h4 class="section-title">Statistiques d'absences (ce mois)</h4>
              <canvas id="absenceChart"></canvas>
            </div>
            <!-- Top absents table -->
            <div class="mb-5">
              <h4 class="section-title">Top 6 - Etudiants les plus absents</h4>
              <div class="table-responsive">
                <table class="table table-hover table-custom align-middle">
                  <thead><tr><th>ID</th><th>Nom complet</th><th>Groupe</th><th>Téléphone</th><th>Heures d'absence</th></tr></thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Anas</td>
                      <td>Groupe 1</td>
                      <td>06 00 00 00 00</td>
                      <td>10</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Ahmed</td>
                      <td>Groupe 2</td>
                      <td>06 00 00 00 00</td>
                      <td>10</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </main>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Static Chart Data
    const labels = ['Semaine 1', 'Semaine 2', 'Semaine 3', 'Semaine 4'];
    const dataSet = [4, 5, 3, 2];
    
    // Chart
    new Chart(document.getElementById('absenceChart').getContext('2d'), {
      type: 'bar',
      data: { 
        labels: labels, 
        datasets: [{ 
          label: 'Absences', 
          data: dataSet, 
          backgroundColor: '#0d6efd' 
        }] 
      },
      options: {
        responsive: true,
        plugins: { 
          legend: { 
            display: false 
          } 
        },
        scales: {
          y: { 
            beginAtZero: true, 
            title: { 
              display: true, 
              text: "Nombre d'absences" 
            } 
          },
          x: { 
            title: { 
              display: true, 
              text: "Semaine du mois" 
            } 
          }
        }
      }
    });
  </script>
  
</body>
</html>
