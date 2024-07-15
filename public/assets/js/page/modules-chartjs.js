document.addEventListener('DOMContentLoaded', function () {
    // Menampilkan indikator loading saat memuat
    showLoadingIndicator();
  
    fetchDataAndUpdateChart()
        .finally(() => {
            // Menyembunyikan indikator loading setelah selesai memuat data
            hideLoadingIndicator();
        });
  });
  
  function fetchDataAndUpdateChart() {
    fetchChartData()
        .then(data => {
            updateBarChart(data.barChart);
            updatePieChart(data.pieChart);
        })
        .catch(error => {
            console.error('Error fetching or updating chart data:', error);
            // Menampilkan pesan kesalahan kepada pengguna
            // displayErrorMessage('Failed to load chart data. Please try again later.');
        });
    // $.ajax({
    //     type: "GET",
    //     url: "/dashboard/barChartData",
    //     dataType: "json",
    //     success: function (response) {
    //         console.log(response)
    //     }
    // });
  }

  fetchDataAndUpdateChart();
  
  function fetchChartData() {
    return Promise.all([
        fetchChartEndpoint('barChartData'),
        fetchChartEndpoint('pieChartData')
    ]).then(responses => {
        return Promise.all(responses.map(response => {
            if (!response.ok) {
                // Tangani akses yang ditolak dengan kode status 403
                if (response.status === 403) {
                    throw new Error('Access denied. You do not have permission to view this data.');
                } else {
                    throw new Error('Network response was not ok');
                }
            }
            return response.json();
        }));
    }).then(data => {
        return {
            barChart: data[0],
            pieChart: data[1]
        };
    });
  }
  
  function fetchChartEndpoint(endpoint) {
    return fetch(`/dashboard/${endpoint}`)
        .then(response => {
            if (!response.ok) {
                // Tangani akses yang ditolak dengan kode status 403
                if (response.status === 403) {
                    throw new Error('Access denied. You do not have permission to view this data.');
                } else {
                    throw new Error('Network response was not ok');
                }
            }
            return response;
        });
  }
  
  function updateBarChart(data) {
    const ctx = document.getElementById('myChart2').getContext('2d');
  
    // Periksa apakah chart sudah ada, lalu perbarui atau buat baru
    if (window.barChartInstance) {
        window.barChartInstance.data.labels = Object.keys(data);
        window.barChartInstance.data.datasets[0].data = Object.values(data);
        window.barChartInstance.update();
    } else {
        window.barChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Statistics',
                    data: Object.values(data),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
  }
  
  function updatePieChart(data) {
    const ctx = document.getElementById('myChart4').getContext('2d');
  
    // Periksa apakah chart sudah ada, lalu perbarui atau buat baru
    if (window.pieChartInstance) {
        window.pieChartInstance.data.labels = Object.keys(data);
        window.pieChartInstance.data.datasets[0].data = Object.values(data);
        window.pieChartInstance.update();
    } else {
        window.pieChartInstance = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    data: Object.values(data),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += Math.round(context.raw * 100) / 100 + '%';
                                return label;
                            }
                        }
                    }
                }
            }
        });
    }
  }
  

  
  // Fungsi untuk menampilkan indikator loading
  function showLoadingIndicator() {
    const loadingElement = document.getElementById('loadingIndicator');
    if (loadingElement) {
        loadingElement.style.display = 'block';
    }
  }
  
  // Fungsi untuk menyembunyikan indikator loading
  function hideLoadingIndicator() {
    const loadingElement = document.getElementById('loadingIndicator');
    if (loadingElement) {
        loadingElement.style.display = 'none';
    }
  }
  