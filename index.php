<?php 
include "partial/head.php";
require_once "php/db_conn.php"; // Include PDO connection
?>

<body>
    <div class="dashboard-main-wrapper">
        <?php include "partial/nav.php"; ?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ecommerce-widget">
                        <div class="row">
                            <?php
                            // Function to render dashboard cards using PDO
                            function renderCard($title, $table, $dateColumn, $period, $iconClass, $bgClass, $pdo) {
                                try {
                                    if ($period === 'month') {
                                        $stmt = $pdo->prepare("SELECT COUNT(id) AS total FROM `$table` WHERE YEAR($dateColumn) = YEAR(NOW()) AND MONTH($dateColumn) = MONTH(NOW())");
                                    } else {
                                        $stmt = $pdo->prepare("SELECT COUNT(id) AS total FROM `$table` WHERE YEAR($dateColumn) = YEAR(NOW())");
                                    }
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $total = $row['total'] ?? 0;
                                } catch (PDOException $e) {
                                    $total = 0;
                                }

                                echo '
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-inline-block">
                                                <h5 class="text-muted">' . $title . ' <small>| ' . strtoupper($period) . '</small></h5>
                                                <h2 class="mb-0">' . $total . '</h2>
                                            </div>
                                            <div class="float-right icon-circle-medium icon-box-lg ' . $bgClass . ' mt-1">
                                                <i class="' . $iconClass . '"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }

                            renderCard("Total Employee", "employee", "date_hired", "month", "fa fa-user fa-fw fa-sm text-primary", "bg-primary-light", $conn);
                            renderCard("Total Logs", "dtr", "date", "month", "fa fa-address-book fa-fw fa-sm text-primary", "bg-primary-light", $conn);
                            renderCard("Total Employee", "employee", "date_hired", "year", "fa fa-user fa-fw fa-sm text-brand", "bg-brand-light", $conn);
                            renderCard("Total Logs", "dtr", "date", "year", "fa fa-address-book fa-fw fa-sm text-brand", "bg-brand-light", $conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "partial/foot.php"; ?>
</body>
</html>