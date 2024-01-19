<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Timer</title>
</head>
<body class="px-3 pt-5 bg-primary d-flex justify-content-center align-items-center" style="height: 650px;">
    <div class="container-fluid p-1 py-4 bg-light shadow">
        <div class="container-fluid d-flex justify-content-end align-items-center">
            <i class="fa-solid fa-gear" style="cursor: pointer;"> </i>
        </div>
        <div class="row" style="height: 80px;">
            <div class="col text-center text-primary">
                Hours
                <div id="hours" class="h5 container-fluid shadow p-3 text-center align-middle text-dark" style="width: 75px;">
                    00
                </div>
            </div>
            <div class="col-1 text-center text-primary d-flex justify-content-center text-primary fw-bold align-items-center pt-4" style="height: 100%;">
                :
            </div>
            <div class="col text-center text-primary">
                Minutes
                <div id="minutes" class="h5 container-fluid shadow p-3 text-center align-middle text-dark" style="width: 75px;">
                    00
                </div>
            </div>
            <div class="col-1 text-center text-primary d-flex justify-content-center text-primary fw-bold align-items-center pt-4" style="height: 100%;">
                :
            </div>
            <div class="col text-center text-primary">
                Seconds
                <div id="seconds" class="h5 container-fluid shadow p-3 text-center align-middle text-dark" style="width: 75px;">
                    00
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center my-2">
            <button id="pauseBtn" class="btn btn-primary mx-3 mt-2 px-4">Pause</button>  
            <button id="startBtn" class="btn btn-danger mx-3 mt-2 px-4">Start</button>
            <button id="stopBtn" class="btn btn-primary mx-3 mt-2 px-4">Stop</button>
        </div>
    </div>

    <script>
        let timer;
        let hours = 0;
        let minutes = 0;
        let seconds = 0;

        function updateTimer() {
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }

        function startTimer() {
            timer = setInterval(() => {
                seconds++;
                if (seconds === 60) {
                    seconds = 0;
                    minutes++;
                    if (minutes === 60) {
                        minutes = 0;
                        hours++;
                    }
                }
                updateTimer();
            }, 1000);
        }

        function pauseTimer() {
            clearInterval(timer);
        }

        function stopTimer() {
            clearInterval(timer);
            hours = 0;
            minutes = 0;
            seconds = 0;
            updateTimer();
        }

        document.getElementById('startBtn').addEventListener('click', startTimer);
        document.getElementById('pauseBtn').addEventListener('click', pauseTimer);
        document.getElementById('stopBtn').addEventListener('click', stopTimer);
    </script>
</body>
</html>
