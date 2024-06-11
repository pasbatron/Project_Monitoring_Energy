<?php require_once "connection.php"; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon_pt_otics_1.png" type="image/x-icon">
    <link rel="stylesheet" href="main-core.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Monitoring Energy</title>
</head>
<body>
    <nav class="navbar">
        <div class="container-navbar">
            <div class="logo"><a href="main.php">PT.Otics Indonesia Monitoring Energy</a></div>
            <ul class="nav-links">
                <li><a href="#">=</a></li>
            </ul>
        </div>
    </nav>

    <h2>Realtime Monitoring</h2>
    <br><hr>
    <div class="layout-main-1">
        <div class="item-1">
            <table>
                <tr>
                    <th>Name Panel</th> 
                    <th>Nama Power Meter</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Data Akhir Wh Meter</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-200V' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name_panel']}</td>
                                    <td>{$row['name_power_meter']}</td>
                                    <td>{$row['date']}</td>
                                    <td>{$row['time']}</td>
                                    <td>{$row['data_kwh_meter']}</td>
                                </tr>";
                            $data_kwh_meter_a = (int)$row['data_kwh_meter'];
                        }
                    } 
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-200V' and time <= '07:10:00' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $data_kwh_meter_b = (int)$row['data_kwh_meter'];
                        }
                    } 
                    // -----------------------------------------------------
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-200V' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                $data_kwh_meter_c = (int)$row['data_kwh_meter'];
                        }
                    } 
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-200V' and time < '19:50:00' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $data_kwh_meter_d = (int)$row['data_kwh_meter'];
                        }
                    } 


                    $total_pm200_shift_satu = $data_kwh_meter_a - $data_kwh_meter_b;
                    $total_pm200_shift_dua = $data_kwh_meter_c - $data_kwh_meter_d;

                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-220V' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name_panel']}</td>
                                    <td>{$row['name_power_meter']}</td>
                                    <td>{$row['date']}</td>
                                    <td>{$row['time']}</td>
                                    <td>{$row['data_kwh_meter']}</td>
                                </tr>";
                                $data_kwh_meter_e = (int)$row['data_kwh_meter'];
                        }
                    } 
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-220V' and time < '07:10:00' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $data_kwh_meter_f = (int)$row['data_kwh_meter'];
                        }
                    } 
                    // -----------------------------------------------------
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-220V' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                $data_kwh_meter_g = (int)$row['data_kwh_meter'];
                        }
                    } 
                    $sql = "SELECT * FROM table_data_energy_listrik WHERE name_power_meter = 'Power-Meter-220V' and time < '19:50:00' ORDER BY id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $data_kwh_meter_h = (int)$row['data_kwh_meter'];
                        }
                    }
                    
                    else {
                        echo "<tr><td colspan='4'>No data available</td></tr>";
                    }
                    $total_pm220_shift_satu = $data_kwh_meter_e - $data_kwh_meter_f;
                    $total_pm220_shift_dua = $data_kwh_meter_g - $data_kwh_meter_h;
                    
                ?>
            </table>
        </div>


        <div class="item-5"></div>
        <div class="item-1">
            <div class="kwh-meter">
                <div class="kwh-heading">
                    <p>Shift 1 PM_200</p>
                </div>
                <div class="kwh-data-2">
                    <p id="current-reading">Total kWh</p>
                    <p id="current-reading-data"><?php echo "{$total_pm200_shift_satu}"; ?></p>
                </div>
            </div>
        </div>

        <div class="item-2">
            <div class="kwh-meter">
                <div class="kwh-heading">
                    <p>Shift 2 PM_200</p>
                </div>
                <div class="kwh-data-1">
                    <p id="current-reading">Total kWh</p>
                    <p id="current-reading-data"><?php echo "{$total_pm200_shift_dua}"; ?></p>
                </div>
            </div>
        </div>
        <div class="item-3">
            <div class="kwh-meter">
                <div class="kwh-heading">
                    <p>Shift 1 PM_220</p>
                </div>
                <div class="kwh-data-1">
                    <p id="current-reading">Total kWh</p>
                    <p id="current-reading-data"><?php echo "{$total_pm220_shift_satu}"; ?></p>
                </div>
            </div>
        </div>
        <div class="item-4">
            <div class="kwh-meter">
                <div class="kwh-heading">
                    <p>Shift 2 PM_220</p>
                </div>
                <div class="kwh-data-1">
                    <p id="current-reading">Total kWh</p>
                    <p id="current-reading-data"><?php echo "{$total_pm220_shift_dua}"; ?></p>
                </div>
            </div>
        </div>
    </div>

    <br><hr>

    <?php $conn->close(); ?> 
    <script src="main-core.js"></script>
</body>
</html>
