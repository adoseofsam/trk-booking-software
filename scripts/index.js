$(document).ready(function() {
    $("main").load("../templates/home.html");
    
    $("#contact").click(function() {
        event.preventDefault();
        $("main").load("../templates/contact.html");        
    });
    $("#serve").click(function() {
        event.preventDefault();
        $("main").load("../templates/serve.html");        
    });
    $("#login").click(function() {
        event.preventDefault();
        $("main").load("../templates/about.html");        
    });
 

});