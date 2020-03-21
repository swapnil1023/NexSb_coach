<?php

//connect to database
$conn = mysqli_connect("localhost","pradyuman","pradyuman","nexsb_coach");

//if connection fails
if(!$conn){
    echo "Connection failed". mysqli_connect_error();
}

$sql = "SELECT * from colleges";

//make qeury and get result
$result = mysqli_query($conn, $sql);

//fetch the rows as an array;
$colleges= mysqli_fetch_all($result,MYSQLI_ASSOC);

print_r($colleges);

//free result from memory
mysqli_free_result($result);
//close connection
mysqli_close($conn);



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>NexSB coach</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
          
          var loginButton = document.getElementById("loginBtn");
          var cancelButton = document.getElementById("cancelBtn");
          var login = document.getElementById("login");

          // loginButton.onclick = function openForm() {
          //   document.getElementById("myForm").style.display = "block";
          // }

          cancelButton.onclick = function closeForm() {
             document.getElementById("myForm").style.display = "none";
          }
          
          login.onclick = function redirectDashboard(){
                location.href='dashboard.html'
            }
       

      })
  </script>

  <style>
      .form-popup {
        display: none;
        position: fixed;
        flex:center;
        z-index: 20;
      }
      .form-container {
        padding: 10px;
        border-radius: 30px;
        background-color: white;
        border: solid;
        border-color: orange;
      }

      /* Full-width input fields */
      .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none; 
        border-radius: 10px;
        background: #f1f1f1;
      }

      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Set a style for the submit/login button */
      .form-container .btn {
        color: orange;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
      }

      /* Add a red background color to the cancel button */
      .form-container .cancel {
        background-color: red;
        color: black;
        opacity: 0.8;
      }

      /* Add some hover effects to buttons */
      .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        color: orange;

  </style>

  </head>
  <body>
      <div class="jumbotron" style="background-color:#e6e6e6; border-radius:15px">
        <div class="container">
          <div class="row" align="center">
            <div class="col" align="left">
              <h1 class="display-2"><b>Nex</b><font color="orange"><b>SB</b></font></h1> <font color="orange"><h2 class="display-4"><footer class="blockquote-footer"> <small>COACH</small> </footer></h2></font> 
            </div>
            <div class="col" align="right">
              <h1 class="display-4">Maitree <font color="orange">2020</font></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12" align="end">
              <button type="button" class="btn btn-dark " id = "loginBtn" data-toggle="modal" data-target="#loginModalCenter"><font color="orange"><h6>login</h6></font></button>
            </div>
          </div>
        </div>
      </div>

    <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #1f211e; color: orange;">
            <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" style="color: orange;" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
              <div class="row">
                <div class="col-3" style="align-items:right">
                    <b>Email</b>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" style="border-color: orange;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-3" style="align-items:right">
                    <b>Password</b>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-sm mb-3">
                        <input type="password" class="form-control" style="border-color: orange;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
              <button class="btn btn-dark" type="submit"  id = "login" >Login</button>
              <button class="btn btn-danger" data-dismiss="modal" id = "cancelBtn">Close</button>

              </div>
         
          </div>
          
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3" align="center">
          <div class="card text-white bg-dark mb-3 " style= "max-width: 18rem; border-radius:25px">
            <div class="card-header"><font color="orange"><b>ABOUT</b></font></div>
            <div class="card-body">
              xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </div>
          </div>
        </div>
        <div class="col-md-3" align="center">
          <div class="card text-white bg-dark mb-3" style="max-width:18rem;border-radius:25px">
            <div class="card-header"><font color="orange"><b>MISSION</b></font></div>
            <div class="card-body">
              xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </div>
          </div>
        </div>
        <div class="col-md-3" align="center">
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;border-radius:25px">
            <div class="card-header"><font color="orange"><b>PARTNER</b></font></div>
            <div class="card-body">
              xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </div>
          </div>
        </div>
        <div class="col-md-3" align="center">
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem; border-radius:25px">
            <div class="card-header"><font color="orange"><b>UNIVERSITIES</b></font></div>
            <div class="card-body">
              xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
  include "./template/footer.php";
?>