<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote | System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }

        .nav li:hover:after {
            width: 100%;
        }

        .nav li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #00f;
            display: block;
            margin: auto;
            transition: width 0.5s;
        }

        .nav li:hover:after {
            width: 100%;
        }

        .nav li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #00f;
            display: block;
            margin: auto;
            transition: width 0.5s;
        }

        .icon-shape i {
            font-size: 1.75rem;
        }

        #piechart {
            width: 100%;
            height: 400px;
        }
        .card-hover:hover {
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          transform: translateY(-5px);
          transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <!-- Begin page content -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0">ลงคะแนนแล้ว</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                        <i class="fa-solid fa-person-circle-check"></i>
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold text-center" style="font-size: 3em;">{{ $totalVoters }}</h1>
                    <p class="mb-0">
                        คน
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-space-between">
            <!-- แสดงพรรคที่มีผู้ลงคะแนนมากที่สุดตรงกลาง -->
            <div class="col-md-4 mb-4">
                <div class="card card-hover" style="width: 16rem; margin-left: 5rem">
                    <img src="{{ asset($topParties[0]->image) }}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">หมายเลข: {{ $topParties[0]->number }}</h5>
                        <p class="card-text">{{ $topParties[0]->name }}</p>
                        <p class="card-text">อันดับ 1</p>
                        <p class="card-text">ผู้ลงคะแนน: {{ $topParties[0]->voter }} คน</p>
                        <a href="{{ route('parties.show', $topParties[0]->id) }}" class="btn btn-primary">รายละเอียด</a>
                    </div>
                </div>
            </div>
    
            <!-- แสดงพรรคที่มีจำนวนลงคะแนนที่สองสูงที่สุดทางซ้าย -->
            <div class="col-md-4 mb-4">
                <div class="card card-hover" style="width: 16rem; margin-left: 5rem">
                    <img src="{{ asset($topParties[1]->image) }}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">หมายเลข: {{ $topParties[1]->number }}</h5>
                        <p class="card-text">{{ $topParties[1]->name }}</p>
                        <p class="card-text">อันดับ 2</p>
                        <p class="card-text">ผู้ลงคะแนน: {{ $topParties[1]->voter }} คน</p>
                        <a href="{{ route('parties.show', $topParties[1]->id) }}" class="btn btn-primary">รายละเอียด</a>
                    </div>
                </div>
            </div>
    
            <!-- แสดงพรรคที่มีจำนวนลงคะแนนที่สามสูงที่สุดทางขวา -->
            <div class="col-md-4 mb-4">
                <div class="card card-hover" style="width: 16rem; margin-left: 5rem">
                    <img src="{{ asset($topParties[2]->image) }}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">หมายเลข: {{ $topParties[2]->number }}</h5>
                        <p class="card-text">{{ $topParties[2]->name }}</p>
                        <p class="card-text">อันดับ 3</p>
                        <p class="card-text">ผู้ลงคะแนน: {{ $topParties[2]->voter }} คน</p>
                        <a href="{{ route('parties.show', $topParties[2]->id) }}" class="btn btn-primary">รายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="piechart-container" style="width: 100%; display: flex; justify-content: end; margin-top: 5rem">
        <div id="piechart" style="width: 80%; height: 400px;"></div>
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Party');
            data.addColumn('number', 'Voters');
    
            var partiesData = <?php echo json_encode($data); ?>;
    
            for (var i = 1; i < partiesData.length; i++) {
                data.addRow([partiesData[i][1], partiesData[i][2]]);
            }
    
            var options = {
                title: 'Voters by Party',
                is3D: true,
                chartArea: { width: '80%', height: '80%' }
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>
