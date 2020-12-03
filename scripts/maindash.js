$(document).ready(function() {
    $("main").load("../templates/home.html");
    $("#navLogo").click(function() {
        event.preventDefault();
        $("main").load("../manage_equipment.html");
    });
    $("#navbarLogo").click(function() {
        event.preventDefault();
        $("main").load("../manage_equipment.html");
    });


});