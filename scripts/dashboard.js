
$(document).ready(function(){


    $("#mailSend").click(function(e){
    event.preventDefault();
    //document.getElementById("mailBtn").disable()
    var emailTeamName= document.getElementById("emailTeamName").value;
    var emailId= document.getElementById("emailId").value;
    var Subject= "Confirmation for Registraion in Maitree 2020"
    var Body= document.getElementById("emailBody").value;
    window.open("mailto:"+encodeURI(emailId)+"?subject="+encodeURI(Subject)+"&body="+encodeURI(Body));
    document.getElementById("emailId").value="";
    document.getElementById("emailBody").value="";
    document.getElementById("emailTeamName").value="";
    })

})

