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
    <div class="container-fluid p-1 py-4 bg-light shadow ">
        <div class="container-fluid d-flex justify-content-end align-items-center mb-1">
            <i class="fa-solid fa-gear" style="cursor: pointer;" data-toggle="modal" data-target="#timerModal"></i>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center fs-3">
            Timer Ayo<span class="text-primary">Silat</span>
        </div>
        <div class="container-fluid">
            <i class="bi bi-gear"></i>
        </div>
        
        <div class="container-fluid d-flex justify-content-center my-4 px-1">
            <button class="btn btn-primary mt-2 me-1 px-3 py-3 fs-1">Pause</button>  
            <button class="btn btn-success mt-2 px-3 py-3 fs-1">Start</button>
            <button class="btn btn-danger mt-2 ms-1 px-3 py-3 fs-1">Stop</button>  
        </div>

        <div class="container-fluid px-4 mb-4">
            <select class="custom-select w-100 p-0 border-3 border-primary fs-5" id="input-continent" style="height: 50px;">
                <option value="1">Babak 1</option>
                <option value="2">Babak 2</option>
                <option value="3">Babak 3</option>
            </select>
        </div>


        <div class="modal fade" id="timerModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Setting Timer</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          </button>
                    </div>
                    <div class="modal-body">
                        Timer
                        <input type="time" class="form-control" placeholder="Timer">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary fw-bold">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Your HTML code here -->

<div class="d-none" id="arena" data-arena="{{$arena}}"></div>

<!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Your script with the AJAX call -->
<script>
  jQuery(document).ready(function($) {
      	var button = document.getElementById('clear');
          function clear(){
              console.log('trigger button success');
              const selectedValue = $(this).val();
              const arenaId = $('#arena').data('arena');
              $.ajax({
                url: '/timeradmin/?tipe=clear&arena='+ arenaId +'',
                method: 'GET',
                success: function (response) {
                  console.log(response.data);
                }
              }); 
          }
    $('#input-continent').change(function() {
        const selectedValue = $(this).val();
        const arenaId = $('#arena').data('arena');
        $.ajax({
            url: '/timeradmin/?tipe=babak&value=' + selectedValue + '&arena='+ arenaId +'',
            method: 'GET',
            success: function (response) {
                console.log(response.data);
            }
        });             
    });
	  button.addEventListener('click', clear);
  });
</script>

<!-- Include other scripts if needed -->

<!-- Your other scripts here -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
