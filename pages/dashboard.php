<?php 
	//require "loginCheck.php";
	session_start();
    if( $_SESSION["loggedIn"] != 1)
    {
		session_destroy();
        header("Location:HomePage.php");
        exit();
	}
	
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
?>

<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- jQuery first-->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="../scripts/dashboard.js" ></script>
	<title>Dashboard</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	
	<script>
		$(document).ready(function(){
			
			var teamsButton = document.getElementById("teamsButton");
			var sportsButton = document.getElementById("sportsButton");
			var helpButton = document.getElementById("helpButton");
			var teams = document.getElementById("teams");
			var sports = document.getElementById("sports");
			var help = document.getElementById("help");
			var sendInviteDiv = document.getElementById("sendInviteDiv");
			var sendInviteButton = document.getElementById("sendInviteButton");
			var allTeamsDiv = document.getElementById("allTeamsDiv");
			var backAllTeams = document.getElementById("backAllTeams");

			teamsButton.onclick = function dispTeam (){
				teams.style.display = "inline-block";
				sports.style.display = "none";
				help.style.display = "none";
				teamsButton.disable=true;
				sportsButton.disable=false;
				helpButton.disable=false;
			} 
			sportsButton.onclick = function dispSports (){
				teams.style.display = "none";
				sports.style.display = "inline-block";
				help.style.display = "none";
				teamsButton.disable=false
				sportsButton.disable=true;
				helpButton.disable=false

			} 
			helpButton.onclick = function dispHelp (){
				teams.style.display = "none";
				sports.style.display = "none";
				help.style.display = "inline-block";
				teamsButton.disable=false;
				sportsButton.disable=false;
				helpButton.disable=true;
			}

			sendInviteButton.onclick = function dispSendInvite (){
				allTeamsDiv.style.display = "none";
				sendInviteDiv.style.display = "inline-block";
			} 
			backAllTeams.onclick = function dispAllTeams (){
				allTeamsDiv.style.display = "inline-block";
				sendInviteDiv.style.display = "none";
			}
		   
			var homeButton = document.getElementById("homeBtn");
			//homeButton.onclick="location.href='/pages/HomePage.html'" //Even this works properly
			homeButton.onclick=function redirectHome(){
				location.href='./HomePage.php'
			}

		})
	</script>

  </head>
  <body class="">
	
	<div class="container"></div>
	  <div class="jumbotron" style="background-color:#e6e6e6; border-radius:30px;">
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
			  <button type="button" class="btn btn-dark "><font color="orange"><h6>Contact Us</h6></font></button>
			</div>
		  </div>
		  </div>
		</div>
	  </div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col" align="right">
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-dark " style="margin:10px; width: 100px;" id="teamsButton" ><font color="orange"><h6>TEAMS</h6></font></button>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-dark " style="margin:10px; width: 100px;"><font color="orange" id="sportsButton" ><h6>SPORTS</h6></font></button>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-dark " style="margin:10px; width: 100px;"><font color="orange" id="helpButton"><h6>HELP</h6></font></button>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button type="button" id="homeBtn"  class="btn btn-outline-dark " style="margin:10px; width: 100px; border-color: orange;"><font color="orange"><h6>HOME</h6></font></button>
						</div>
					</div>
			</div>
			<div class="col-9">
				<div class="card" style="width:800px; height: 350px; border-radius: 25px; border-color:orange; padding:10px; background-color:#e6e6e6">
		
					<div class = "container" id="teams">
						
						<div class = "container" id="allTeamsDiv">
						
								<div class="container overflow-auto" style="margin-top:40px">
									<div class="row">
										<?php foreach ($colleges as $college){ ?>
											
											<div class="col-4 com-sm-12">
												<div class="card border-warning mb-3" style="max-width: 18rem;">
													<div class="card-body">
														<h5 class="card-text">
															<?php 
																echo htmlspecialchars($college['CollegeName']);
															?>
														</h5>
													</div>
												</div>
											</div>

										<?php } ?>
									</div>
								</div>
							
							<div class="footer">
								<button type="button" id = "sendInviteButton">
									sendInvite
								</button>
							</div>
						</div>     

						<div class="container" id="sendInviteDiv" style="display:none;">
							<div class="row">
								<div class="container" style="margin-top:40px">
									<div class="row">
										<div class="col-3" style="align-items:right">
											<b>Team name</b>
										</div>
										<div class="col-9">
											<div class="input-group input-group-sm mb-3">
												<input type="text" class="form-control" style="border-color: orange;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-3" style="align-items:right">
											<b>Email</b>
										</div>
										<div class="col-9">
											<div class="input-group input-group-sm mb-3">
												<input type="text" class="form-control" style="border-color: orange;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-3" style="align-items:right;">
											<b>Enter Message</b>
										</div>
										<div class="col-9">
											<div class="input-group">
												<textarea class="form-control" style="border-color: orange;" aria-label="With textarea"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col" align="center">
											<button type="button" class="btn btn-dark " style="margin:10px; width: 100px;"><b>SUBMIT</b></button>
										</div>
									</div>
									<div class="row">
										<div class="col" align="center">
											<button type="button" id="backAllTeams" class="btn btn-dark " style="margin:10px; width: 100px;"><b>BACK</b></button>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div id = "sports" style="display:none;">

						sports

					</div>

					<div id = "help" style="display:none;">

						<?php include "./templates/help.php"; ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	<?php
		include "./templates/footer.php";
	?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>