<?php
include("../config/database.php");
$completelist = array();
$incompletelist = array();
$sql = "SELECT status FROM tasks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo $row['status'];
        if ($row['status'] == 'complete') {
            $completelist[] = $row['status'];
        } else {
            $incompletelist[] = $row['status'];
        }
    }
}
//var_dump($completelist);
$myArray = array(
    array("label" => "completed", "y" => (count($completelist) / (count($completelist) + count($incompletelist))) * 100),
    array("label" => "incomplete", "y" => (count($incompletelist) / (count($completelist) + count($incompletelist))) * 100),
)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/taskdashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.5/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js">
    </script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // User dynamic data from PHP 
            var passedArray = <?php echo json_encode($myArray); ?>;

            var chart = new CanvasJS.Chart("chartID", {
                title: {
                    text: "Tasks list"
                },
                data: [{
                    type: "pie",
                    animationEnabled: true,
                    indexLabelFontSize: 18,
                    fillOpacity: .7,
                    toolTipContent: "<i>{label}</i>: <b>{y}</b>",
                    radius: "80%",
                    startAngle: 75,
                    indexLabel: "{label} - {y}",
                    yValueFormatString: "##\"%\"",
                    dataPoints: passedArray
                }] // End data 

            }); // End chart	 
            chart.render();

            // End button click 
        }); // End document ready 
    </script>
</head>

<body>
    <!----->
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Home</a></li>
                    <li>
                        <a>Operation</a>
                        <ul class="p-2">
                            <li><a> Order Manage</a></li>

                        </ul>
                    </li>
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="communication.php">Comminication</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl">MENDIS</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a>Home</a></li>
                <li>
                    <details>
                        <summary>Operations</summary>
                        <ul class="p-2">
                            <li><a> Order Manage</a></li>

                        </ul>
                    </details>
                </li>
                <li><a href="../aboutus.php">About us</a></li>
                <li><a href="../communication.php">Comminication</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn" href="logout.php">Log Out</a>
        </div>
    </div>
    <!----->
    <aside>
        <div class="container">
            <h2>Sidebar</h2>
            <ul>
                <li><a href="taskRead.php">Tasks</a></li>
                <li><a href="taskCreate.php">Add new Task</a></li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="container">
            <h2></h2>
            <!-- Your main content here -->
            <div class="hero min-h-screen bg-base-100">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <img src="../images/taskmanager.png" class="max-w-sm rounded-lg shadow-2xl" />
                    <div>
                        <h1 class="text-5xl font-bold">Task Manager Dashboard</h1>
                        <a href="taskRead.php" class="btn1">Manage</a>
                    </div>
                </div>
            </div>
            <br />

            <div tabindex="0" class="collapse border border-base-300 bg-base-200">
                <center>
                    <div class="collapse-title text-xl font-medium">
                        Task Details
                    </div>
                </center>
                <div class="collapse-content">
                </div>
            </div>

        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Task Id</th>
                        <th>Task</th>
                        <th>Assign Project</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../config/database.php");
                    $sql = "SELECT * FROM tasks";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo "T00" . $row['Task_ID']; ?></td>
                                <td><?php echo $row['taskName']; ?></td>
                                <td><?php echo $row['assignTo']; ?></td>
                                <td><?php echo $row['dueDate']; ?></td>
                            </tr>
                    <?php        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br />
        <br />
        <div tabindex="0" class="collapse border border-base-300 bg-base-200">
            <center>
                <div class="collapse-title text-xl font-medium">
                    Chart </div>
            </center>
            <div class="collapse-content">
            </div>
        </div>
        <br />
        <div id="chartID" style="height:400px; max-width:400px; margin:0px auto;"></div>
        <br />
        <br />
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <center>
            <ul class="timeline">
                <li>
                    <div class="timeline-start timeline-box">Get Start</div>
                    <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <hr class="bg-primary" />
                </li>
                <li>
                    <hr class="bg-primary" />
                    <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-end timeline-box">plan</div>
                    <hr class="bg-primary" />
                </li>
                <li>
                    <hr class="bg-primary" />
                    <div class="timeline-start timeline-box">discuss</div>
                    <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <hr />
                </li>
                <li>
                    <hr />
                    <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-end timeline-box">design</div>
                    <hr />
                </li>
                <li>
                    <hr />
                    <div class="timeline-start timeline-box">Start project</div>
                    <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </li>
            </ul>
        </center>
    </main>
    <?php
    include("../footer.php")
    ?>

</body>

</html>