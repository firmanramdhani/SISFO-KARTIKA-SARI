<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/ci/resource/popup.css" rel="stylesheet" />
</head>
<body>	

	<div id="program" class="container-fluid" style="margin-top:50px;">
		<prompt v-if="loadingMsg != ''">
				{{loadingMsg}}
		</prompt>
		<form action="/ci/login/login_action" method="POST">
			<modal v-if="show" v-on:close="close()">
				<h3 slot="header">Logon</h3>
				<div slot="body">
					<p>
						Selamat datang di Kartika Sari control panel. Masukan credential.
					</p>
					<hr/>
					<textbox label="Username"
							name="username"
							v-model="username">
					</textbox>
					<textbox label="Password"
							 password
							 name="password"
							 v-model="password">
					</textbox>									   									  									  
				</div>
				<div slot="footer">
					<button class="btn btn-primary btn-sm"
							action="submit">
						Logon!
					</button>
				</div>
			</modal>
		</form>
	</div>
		  
</body>
<script src="/ci/resource/vueComponent.js" ></script>
<script>

var program = new Vue(
	{
		el: "#program",
		data:
		{
			username: "",
			password: "",
			loadingMsg: "",
			show: true
		},
		created: function()
		{
			localStorage.clear();
			<?php
				$msg = $this->session->flashdata('message') ;
				if(isset($msg))
				{
					print("alert('$msg')");
				}
			?>
		},
		methods:
		{
			close: function()
			{
				this.show = false;
				setTimeout(function(){window.location = "about:blank"}, 1000)
				
			}
		}
	}
)
</script>
</html>

