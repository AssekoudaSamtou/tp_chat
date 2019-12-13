<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
		<title><?php echo"salam"?></title>
		<link rel="stylesheet" href="ressources/css/bootstrap.min.css" />
		<link rel="stylesheet" href="ressources/css/Bootstrap-Chat.css" />
		<link rel="stylesheet" href="ressources/css/font-awesome.min.css" />
		<link rel="stylesheet" href="ressources/css/index.css" />
	</head>

	<body>
		<div class="bootstrap_chat">
			<button onclick="if (confirm('Confirmer la déconnexion')) deconnection();" class="btn btn-danger">Deconnection</button>
			<div class="container py-5 px-4">
				<header class="text-center">
					<h1 class="display-4 text-dark">IPNET Chat <?php echo $_SESSION['username'] ?></h1>
					<!-- <div class="d-flex align-items-end">
						<div style="">
							<img src="ressources/img/avatarMe.png" alt="user" width="50" class="rounded-circle" />
						</div>
						
					</div> -->
				</header>
				<div class="row rounded-lg overflow-hidden shadow" style="background-color: #74EBD5; border: 2px solid #74EBD5;">
					<div class="col-5 px-0">
						<div class="bg-white">
							<div class="bg-gray px-4 py-2 bg-light">
								<p class="h5 mb-0 py-1">Recent</p>
							</div>
							<div class="messages-box">
								<div class="list-group rounded-0">
									<?php 
										include 'php/scripts/liste_discussions.php';
									?>
									<!-- <a class="discussion-item list-group-item list-group-item-action active text-white rounded-0">
										<div class="media"><img src="ressources/img/avatar_user.svg" alt="user" width="50" class="rounded-circle" />
											<div class="media-body ml-4">
												<div class="d-flex align-items-center justify-content-between mb-1">
													<h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small></div>
												<p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
											</div>
										</div>
									</a> -->
								</div>
							</div>
						</div>
					</div>
					<div id="chat-body" class="col-7 px-0 d-none">
						<div id="chat-box" class="px-4 py-5 chat-box bg-white">
							<div class="media w-50 mb-3"><img src="ressources/img/avatar_user.svg" alt="user" width="50" class="rounded-circle" />
								<div class="media-body ml-3">
									<div class="bg-light rounded py-2 px-3 mb-2">
										<p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
									</div>
									<p class="small text-muted">12:00 PM | Aug 13</p>
								</div>
							</div>
							<div class="media w-50 ml-auto mb-3">
								<div class="media-body">
									<div class="bg-primary rounded py-2 px-3 mb-2">
										<p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
									</div>
									<p class="small text-muted">12:00 PM | Aug 13</p>
								</div>
							</div>
						</div>
						<form action="javascript:void(0);" class="bg-light" id="message_form">
							<input id="expediteur_id"> type="hidden" name="expediteur" value="<?php echo $_SESSION['user_id'] ?>">
							<input type="hidden" name="recepteur" value="">
							<div class="input-group">
								<input id="message_area" type="text" name="message" placeholder="Type a message" class="form-control rounded-0 border-0 py-4 bg-light" />
								<div class="input-group-append">
									<button id="button-addon2" type="submit" class="btn btn-link">
										<i class="fa fa-paper-plane"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-7 px-0">
						<div class="px-4 py-5 bg-dark" id="no-discussion">
							<p class="h4 justify-center">
								<span class="rounded-circle px-2 bg-primary">
									<i class="fa fa-info"></i>
								</span>
								&nbsp;Veillez selectionner une discussion
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ajax.js"></script>
</html>