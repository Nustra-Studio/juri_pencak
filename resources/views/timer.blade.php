<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Timer</title>
</head>
<body class="px-3 pt-5 bg-primary d-flex justify-content-center align-items-center" style="height: 650px;">
    <div class="container-fluid p-1 py-4 bg-light shadow ">
        <div class="row" style="height: 80px;">
            <div class="col text-center text-primary">
                Hours
                <div class="h5 container-fluid shadow p-3 text-center align-middle text-dark" style="width: 75px;">
                    00
                </div>
            </div>
            <div class="col-1 text-center text-primary d-flex justify-content-center text-primary fw-bold align-items-center pt-4" style="height: 100%;">
                :
            </div>
            <div class="col text-center text-primary">
                Minutes
                <div class="h5 container-fluid shadow p-3 text-center align-middle text-dark" style="width: 75px;">
                    00
                </div>
            </div>
            <div class="col-1 text-center text-primary d-flex justify-content-center text-primary fw-bold align-items-center pt-4" style="height: 100%;">
                :
            </div>
            <div class="col text-center text-primary">
                Seconds
                <div class="h5 container-fluid shadow p-3 text-center align-middle text-dark" style="width: 75px;">
                    00
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center my-2">
            <button class="btn btn-primary mx-3 mt-2 px-4">Pause</button>  
            <button class="btn btn-danger mx-3 mt-2 px-4">Start</button>
            <button class="btn btn-primary mx-3 mt-2 px-4">Stop</button>
        </div>
    </div>
</body>
</html>