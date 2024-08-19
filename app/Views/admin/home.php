<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-body" style="padding-left: 40px;">
                <h1 class="font-weight-bold" style="color: black;">Welcome <?= user()->username; ?></h1>
                <p class="font-weight-normal">Have a nice day!</p>
            </div>
        </div>


        <div class="row justify-content-center ">
            <!-- Total User -->
            <div class="col-xl-6 col-md-6 mb-4">
                <a href="<?= base_url('admin/manageuser') ?>" style="text-decoration: none;">
                    <div class="card border-left-primary shadow h-90 py-2 card-hover-effect">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $userCount ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Feedback User -->
            <div class="col-xl-6 col-md-6 mb-4">
                <a href="<?= base_url('admin/feedback') ?>" style="text-decoration: none;">
                    <div class="card border-left-info shadow h-100 py-2 card-hover-effect">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Feedback User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $feedbackCount ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Pie Chart -->
            <div class="col-xl-6">
                <div class="card shadow mb-2">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Record User and Feedback</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="width: 100%; height: 250px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="col-xl-6">
                <div class="card shadow mb-2">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Record Feedback</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" style="width: 100%; height: 250px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Data for charts
                    var userCount = <?= $userCount ?>;
                    var feedbackCount = <?= $feedbackCount ?>;
                    var positiveCount = <?= $positiveCount ?>;
                    var negativeCount = <?= $negativeCount ?>;
                    var neutralCount = <?= $neutralCount ?>;

                    // Pie Chart
                    var pieChartCanvas = document.getElementById('pieChart').getContext('2d');
                    var pieChart = new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: {
                            labels: ['Users', 'Feedbacks'],
                            datasets: [{
                                label: 'Total Users vs Feedbacks',
                                data: [userCount, feedbackCount],
                                backgroundColor: ['#4e73df', '#1cc88a'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                position: 'right'
                            }
                        }
                    });

                    // Bar Chart
                    var barChartCanvas = document.getElementById('barChart').getContext('2d');
                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: {
                            labels: ['Positif', 'Negatif', 'Netral'],
                            datasets: [{
                                label: 'Feedback Count',
                                data: [positiveCount, negativeCount, neutralCount],
                                backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>