$("#login_btn").click(function() {
    
    $.post("./php/scripts/auth.php", {login : $("#username").val(), password : $("#password").val()}, function(data) {
        if(data == 0) {
            $("#connexion_error").text("login ou mot de passe invalide!").show();
        }else {
            window.location = "accueil.php";
        }
    });
});