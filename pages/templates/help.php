<?php
    //connect to database
    $conn = mysqli_connect("localhost","pradyuman","pradyuman","nexsb_coach");

    //if connection fails
    if(!$conn){
            echo "Connection failed". mysqli_connect_error();
    }

    $volTable = "SELECT * from volunteers";
    $TeamTable = "SELECT * from teamnexsb";
    $refereeTable = "SELECT * from referees";
    //make qeury and get result
    $volResult = mysqli_query($conn, $volTable);
    $teamResult = mysqli_query($conn, $TeamTable);
    $refereeResult = mysqli_query($conn, $refereeTable);
    //fetch the rows as an array;
    $volunteers= mysqli_fetch_all($volResult,MYSQLI_ASSOC);
    $teamMembers= mysqli_fetch_all($teamResult,MYSQLI_ASSOC);
    $referees= mysqli_fetch_all($refereeResult,MYSQLI_ASSOC);

    //print_r($volunteers);

	//close connection
	mysqli_close($conn);


?>
<script>
    $(document).ready(function(){
        
        $('#Modal1').on('show.bs.modal', function (event) {
            var idCol = document.getElementById('idCol');
            var phoneCol = document.getElementById("phoneCol");
            var emailCol = document.getElementById("emailCol");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var volName = button.data('name') 
            var volId = button.data('id')
            var volPhone = button.data('phone')
            var volEmail = button.data('email')// Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text(volName)
            //modal.find('.modal-body').text("id = "+volId+" phone = "+volPhone+" email = "+volEmail+"")
            //modal.find('.modal-body idCol').val(volId)
            idCol.innerHTML = volId
            phoneCol.innerHTML = volPhone
            emailCol.innerHTML = volEmail
            emailCol.href = "mailto:"+ volEmail
        })

        $('#Modal2').on('show.bs.modal', function (event) {
            var idCol = document.getElementById('idCol2');
            var phoneCol = document.getElementById("phoneCol2");
            var emailCol = document.getElementById("emailCol2");
            var sportCol = document.getElementById("sportCol2");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var Name = button.data('name') 
            var Id = button.data('id')
            var Phone = button.data('phone')
            var Email = button.data('email')
            var Sport = button.data('sport')// Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text(Name)
            //modal.find('.modal-body').text("id = "+volId+" phone = "+volPhone+" email = "+volEmail+"")
            //modal.find('.modal-body idCol').val(volId)
            idCol.innerHTML = Id
            sportCol.innerHTML = Sport
            phoneCol.innerHTML = Phone
            emailCol.innerHTML = Email
            emailCol.href = "mailto:"+ Email
        })
       
    })
</script>
<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-3"><div class="card bg-dark mb-3" style="max-width: 18rem; align-items: center;color:orange">Volunteers</div></div>
        <div class="col-3"><div class="card bg-dark mb-3" style="max-width: 18rem; align-items: center;color:orange">Coaches</div></div>
        <div class="col-3"><div class="card bg-dark mb-3" style="max-width: 18rem; align-items: center;color:orange">Referees</div></div>
        <div class="col-3"><div class="card bg-dark mb-3" style="max-width: 18rem; align-items: center;color:orange">Team NexSB</div></div>
    </div>
    <div class="row">
        <div class="col-3 container-fluid">
            <?php foreach ($volunteers as $volunteer){ ?>
                <div class="card border-warning mb-3" style="max-width: 18rem; align-items: center; border-radius:10px" data-toggle="modal" data-target="#Modal1"
                     data-name="<?php  echo htmlspecialchars($volunteer['name']); ?>"
                     data-id="<?php  echo htmlspecialchars($volunteer['id']); ?>"
                     data-phone="<?php  echo htmlspecialchars($volunteer['phone']); ?>"
                     data-email="<?php  echo htmlspecialchars($volunteer['email']); ?>">
                    <?php 
                        echo htmlspecialchars($volunteer['name']);
                    ?>
                </div>
            <?php } ?>
        </div>
        <div class="col-3 container-fluid"></div>
        <div class="col-3 container-fluid">
            <?php foreach ($referees as $referee){ ?>
                <div class="card border-warning mb-3" style="max-width: 18rem; align-items: center; border-radius:10px"
                     data-toggle="modal" data-target="#Modal2"
                     data-name="<?php  echo htmlspecialchars($referee['name']); ?>"
                     data-id="<?php  echo htmlspecialchars($referee['id']); ?>"
                     data-phone="<?php  echo htmlspecialchars($referee['phone']); ?>"
                     data-email="<?php  echo htmlspecialchars($referee['email']); ?>"
                     data-sport="<?php  echo htmlspecialchars($referee['game']); ?>">
                    <?php 
                        echo htmlspecialchars($referee['name']);
                    ?>
                </div>
            <?php } ?>
        </div>
        <div class="col-3 container-fluid">
            <?php foreach ($teamMembers as $teamMember){ ?>
                <div class="card border-warning mb-3" style="max-width: 18rem; align-items: center; border-radius:10px" 
                    data-toggle="modal" data-target="#Modal1"
                    data-name="<?php  echo htmlspecialchars($teamMember['name']); ?>"
                    data-id="<?php  echo htmlspecialchars($teamMember['id']); ?>"
                    data-phone="<?php  echo htmlspecialchars($teamMember['phone']); ?>"
                    data-email="<?php  echo htmlspecialchars($teamMember['email']); ?>">
                    <?php 
                        echo htmlspecialchars($teamMember['name']);
                    ?>
                </div>
                
            <?php } ?>
        </div>
    </div>

    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #1f211e; color: orange;">
                <h5 class="modal-title" id="exampleModalCenterTitle">NAME</h5>
                <button type="button" class="close" data-dismiss="modal" style="color: orange;" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>   
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6"><b>ID</b></div>
                        <div class="col-6" id="idCol">0</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><b>PHONE</b></div>
                        <div class="col-6" id="phoneCol">0</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><b>EMAIL</b></div>
                        <div class="col-6"><a id="emailCol" href="mailto:">0</a></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">REPORT</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #1f211e; color: orange;">
                <h5 class="modal-title" id="exampleModalCenterTitle">NAME</h5>
                <button type="button" class="close" data-dismiss="modal" style="color: orange;" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>   
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6"><b>ID</b></div>
                        <div class="col-6" id="idCol2">0</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><b>SPORT</b></div>
                        <div class="col-6" id="sportCol2">0</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><b>PHONE</b></div>
                        <div class="col-6" id="phoneCol2">0</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><b>EMAIL</b></div>
                        <div class="col-6"><a id="emailCol2" href="mailto:">0</a></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">REPORT</button>
            </div>
            </div>
        </div>
    </div>

 </div>