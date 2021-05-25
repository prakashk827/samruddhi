<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Login</title>


</head>
<body>
	<section class="material-half-bg">
		<div class="cover"></div>
	</section>
	<section class="login-content">
		<div class="logo">
			<h1>Vali</h1>
		</div>
		<div class="login-box">

			<form class="login-form" method="post" action="display/get-admin-info.php">
				<h3 class="login-head">
					Admin Login
				</h3>
				
				<div class="form-group">
					<label class="control-label">User name</label> <input
						class="form-control" type="text" id="uName"  name="uName">
				</div>
				<div class="form-group">
					<label class="control-label">Password</label> <input
						class="form-control" type="password" 
						name="pwd" id="pwd">
				</div>
				<div class="form-group btn-container">
					<button class="btn btn-primary btn-block loginBtn">
						Login
					</button>
					
				</div><br>
				<p id="warning" class="alert alert-danger"></p>
				<p id="wait" class="alert alert-warning">Please wait..!</p>
			</form>
		</div>
	</section>
	<!-- Essential javascripts for application to work-->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<!-- The javascript plugin to display page loading on top-->
	<script src="js/plugins/pace.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#warning").css("display",'none');
		$("#wait").css('display','none');
		$(".loginBtn").click(function(e){
			e.preventDefault();
			var uName = $("#uName").val();
			var pwd = $("#pwd").val();
			if(uName == ''){
				$("#warning").css("display",'block');
				$("#warning").html("Please enter valid user name..!");
			}else if(pwd == '' ) {
				$("#warning").css("display",'block');
				$("#warning").html("Please enter valid password..!");
			} else {
				$("#wait").css('display','block');
				$.post("display/get-admin-info.php",
	                    {
	                      uName : uName,
	                      pwd : pwd
	                    },
	                    function(data)
	                    {	$("#wait").css('display','none');
	                    	$("#warning").css("display",'block');
	                    	if(data == 200){
	                    		$("#warning").css("display",'none');
		                    	window.location.href='announce-winner.php';
	                    	}else if(data== 400 ){
	                    		window.location.href='index.php';
	                    	} 
	                    	else{
		                    	$("#warning").html(data);
	                    	}
	                    	
	                    }
	        	);
			}
				
				
		});
		

	});
	</script>
</body>
</html>