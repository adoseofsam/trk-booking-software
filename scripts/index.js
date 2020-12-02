$(document).ready(function() {
    $("main").load("../templates/home.html");
    $("#navbarLogo").click(function() {
        event.preventDefault();
        $("main").load("../templates/home.html");
    });
    
    $("#login").click(function() {
        event.preventDefault();
        $("main").load("../templates/login.html");        
    });

    $("#contact").click(function() {
        event.preventDefault();
        $("main").load("../templates/contact.html");        
    });

});