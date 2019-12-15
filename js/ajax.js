var recepteur = "<div class=\"media w-50 mb-3\"><img src=\"ressources/img/avatar_user.svg\" alt=\"user\" width=\"50\" class=\"rounded-circle\"><div class=\"media-body ml-3\"><div class=\"bg-light rounded py-2 px-3 mb-2\"><p class=\"text-small mb-0 text-muted\">Test which is a new approach all solutions</p></div><p class=\"small text-muted\"></p></div></div>";

var expediteur = "<div class=\"media w-50 ml-auto mb-3\"><div class=\"media-body\"><div class=\"bg-primary rounded py-2 px-3 mb-2\"><p class=\"text-small mb-0 text-white\">Test which is a new approach to have all solutions</p></div><p class=\"small text-muted\">12:00 PM | Aug 13</p></div></div>";


function load_and_show_messages(with_) {
	$.get("./php/scripts/messages_loader.php", {expediteur : $("#expediteur_id").val(), recepteur : with_}, function(data) {
		
		$(".chat-box").addClass('d-none');
		$("#chat-box-"+with_).removeClass('d-none');
		$("#chat-box-"+with_).html(data);
		
	});
}

function load_messages(with_) {
	$.get("./php/scripts/messages_loader.php", {expediteur : $("#expediteur_id").val(), recepteur : with_}, function(data) {
		
		json_data = JSON.parse(data);
		// console.log(json_data);
		non_lu = 0;
		if (json_data.length > 0) {

			$("#chat-box-"+with_).find('*').remove();
			jQuery.each(json_data, function(i, val) {
				if (val["expediteur"] == with_) {
					recepteur_tag = $(recepteur);
					recepteur_tag.find(".text-small.mb-0.text-muted").text(val["message"]);
					recepteur_tag.find(".small.text-muted").text(val["date_message"]);
					$("#chat-box-"+with_).append(recepteur_tag);
					if (val['lu'] == "0") {
						non_lu++;
					}
				}else{
					expediteur_tag = $(expediteur);
					expediteur_tag.find(".text-small.mb-0.text-white").text(val["message"]);
					expediteur_tag.find(".small.text-muted").text(val["date_message"]);
					$("#chat-box-"+with_).append(expediteur_tag);

				}
			});
			if (non_lu > 0) {
				$("#"+with_).find('.non_lu_tag').removeClass('d-none').text(non_lu);
			}
		}

		// $("#chat-box-"+with_).html(json_data);
		
		

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
		
		if(data.trim() == '0') {
			$("#connexion_error").text("login ou mot de passe invalide!").show().removeClass('d-none');
		}else if(data.trim() == '1') {
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

	$(".chat-box").addClass('d-none');
	$("#chat-box-" + this.id).removeClass('d-none');
	
	// console.log(this.id, );
	var expediteur_id = $("#expediteur_id").val();
	$.post('./php/scripts/lire_messages.php', {recepteur: this.id, expediteur: expediteur_id}, function(data) {
		// if (data == "success") {
			$("#"+$("#recepteur_id").val()).find('.non_lu_tag').addClass('d-none');
		// }
	});
});


$("#message_form").submit(function(event) {
	var form = $(this);
	
	$.post("./php/scripts/send_msg.php", form.serialize(), function(data) {
		console.log(data);
		recepteur = $("#recepteur_id").val();
		console.log($("#chat-box-" + recepteur));
		$("#chat-box-" + recepteur).append(data);
		$("#message_area").val("");

	});
	
	event.preventDefault();
});

$(document).ready(function () {
	
	setInterval(function() {

		discussions = $(".discussion-item");
		for (var i = discussions.length - 1; i >= 0; i--) {
			load_messages(discussions[i].id);
		}

	}, 5000);

});