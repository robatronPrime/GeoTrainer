$(document).ready(function(){
    
    var newE = document.getElementById("newExercise");
    var endurList = ["Distance", "Time", "Intensity"],
    strList = ["Weight", "Reps", "Sets"],
    balList = ["Time", "Difficulty", "Weight"],
    flexList = ["Time", "Difficulty", "Intensity"];
    
    $("#hideUser").hide();
    $("#hideUser").hide();
    $("#exercise").hide();    
    $("#displayExs").hide();
    $("#newUserForm").hide();
    
    $("#newWorkout").click(function(){  
    $("#exercise").show();
    $("#newExercise").click(function(){
        
    });
    
   $("#type").on('change', function(){
       if ($("#type").val() == "Endurance"){
           $("#exValOne").text(endurList.slice(0,1));
           $("#exValTwo").text(endurList.slice(1,2));
           $("#exValThree").text(endurList.slice(2,3));
       } else if ($("#type").val() == "Strength") {
           $("#exValOne").text(strList.slice(0,1));
           $("#exValTwo").text(strList.slice(1,2));
           $("#exValThree").text(strList.slice(2,3));
       } else if ($("#type").val() == "Balance") {
           $("#exValOne").text(balList.slice(0,1));
           $("#exValTwo").text(balList.slice(1,2));
           $("#exValThree").text(balList.slice(2,3));
       } else if ($("#type").val() == "Flexibility") {
           $("#exValOne").text(flexList.slice(0,1));
           $("#exValTwo").text(flexList.slice(1,2));
           $("#exValThree").text(flexList.slice(2,3));
       }
   })
            
    $("#newExercise").click(function(){
        //*alert("Value: " + $("#Wname").val());*/

        alert("Value: " + $("#Ename").val());
                
        $("#valOneIn").text(vOne);
        $("#valTwoIn").text(vTwo);
        $("#valThreeIn").text(vThree);
        $("#displayExs").show();
                
    });
});
});
