<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        /* .nav-pills .nav-link {
            margin-bottom: 10px;
        } */
        /* .nav-pills .nav-item .nav-link.active,
        .nav-pills .nav-item .nav-link {
            color: black;
        } */
        /* .nav-pills .nav-item .nav-link.active,
        .nav-pills .nav-item .nav-link:hover {
            background-color: rgb(128, 128, 128);
            color: white;

        } */

        .nav-link {
            color: black;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link:hover {
            color: aliceblue;
        }

        .nav-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .nav-item:hover{
            background-color: rgba(123, 136, 153, 0.925);
            color: white;
        
        }


        .sidebar {
            background-color: rgb(108, 235, 255);
            padding-top: 20px;
            height: 100vh;
            position: fixed; 
            top: 0;
            left: 0; 
            bottom: 0; 
        }
        h1 {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            padding-bottom: 30px;
            display: flex;
            text-align: center;
            justify-content: center;
        }
        .main-content {
            margin-left: 240px; 
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <h1>Student Attendance</h1>
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('students') ?  : '' }}" href="{{ url('/students') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('subjects') ? 'active' : '' }}" href="{{ url('/subjects') }}">Subjects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('attendances') ? 'active' : '' }}" href="{{ url('/attendances') }}">Attendance</a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="container mt-5">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
