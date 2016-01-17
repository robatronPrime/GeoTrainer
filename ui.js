$(document).ready(function(){
    
        var newE = document.getElementById("newExercise");
    
    newE.addEventListener('click', getServerTime, false)

    $("#exercise").hide();
            
    $("#displayExs").hide();
            
    $("#newWorkout").click(function(){
        
        $("#exercise").show();
        
        function showHint(str) {
            if (str.length == 0) { 
                document.getElementById("newWorkout").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("newWorkout").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "serverSide.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    });
            
    $("#newExercise").click(function(){
        //*alert("Value: " + $("#Wname").val());*/

        alert("Value: " + $("#Ename").val());
                
        $("#valOneIn").text(vOne);
        $("#valTwoIn").text(vTwo);
        $("#valThreeIn").text(vThree);
        $("#displayExs").show();
                
    });
});
