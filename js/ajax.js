function loadMessages(with_) {
	$.get("./php/scripts/messages_loader.php", {expediteur : $("#expediteur_id").val(), recepteur : with_}, function(data) {
		
		$("#chat-box").html(data);
		
	});
}

function deconnection() {

	$.post("./php/scripts/auth_deconnexion.php", {}, function(data) {
		alert(data);
		if (data == "success") {
			window.location = "index.php";
		}
		
	});
}

$("#login_btn").click(function() {
	$.post("./php/scripts/auth.php", {login : $("#username").val(), password : $("#password").val()}, function(data) {
		if(data == 0) {
			$("#connexion_error").text("login ou mot de passe invalide!").show();
		}else if(data == 1) {

			window.location = "accueil.php";
		}
	});
});

$(".discussion-item").click(function() {
	
	$(".discussion-item").removeClass("active");
	$(".discussion-item").css("color", "black");
	$(this).addClass("active");
	$(this).css("color", "white");

	$("#chat-body").removeClass("d-none");
	$("#no-discussion").addClass("d-none");

	$("#message_form").find('input[name="recepteur"]').val(this.id);

	loadMessages(with_ = this.id);
});


$("#message_form").submit(function(event) {
	var form = $(this);
	
	$.post("./php/scripts/send_msg.php", form.serialize(), function(data) {
		// console.log(data);
		$("#chat-box").append(data);
		$("#message_area").val("");

	});
	
	event.preventDefault();
});