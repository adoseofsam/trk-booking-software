$(document).ready(function() {
    $("main").load("../templates/home.html");
    
    $("#login").click(function() {
        event.preventDefault();
        $("main").load("../templates/login.html");        
    });

});