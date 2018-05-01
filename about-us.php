<?php
include_once("header.php");
?>
<style>
	body{
		overflow-x: hidden;
	}
	main{
		background-color: #fff;
	}
	.jumbotron{
		background-color: #2f70ed;
	}
	.jumbotron-content{
		/*width: 100%;*/
	}
	.jumbotron-content h1{
		font-size: 2.0rem;
		width: 80%;
		max-width: 400px;
		margin-left: auto;
		margin-right: auto;
	}
	.jumbotron-content p{
		font-size: 1.0rem;
		width: 90%;
		max-width: 600px;
		margin-left: auto;
		margin-right: auto;
	}
	.btn-custom-primary{
		background-color: #00aeff;
		text-transform: none;
		font-family: inherit !important;
		font-size: 1.1rem;
		border-radius: 5px;
	}
	.paddedhr{
		width: 100px;
		background-color: #2f70ed;
		padding: 2px 0;
	}
	.paddedhr2{
		width: 60px;
		background-color: #00aeff;
		padding: 2.5px 0;
	}
	.bg-grey{
		background-color: #eee;
	}
	.text-center{
		text-align: center !important;
	}
	.clip-bottom{
		  -webkit-clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
		  clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
		  background-color: #dbf4ff;
		padding-bottom: 60px !important;
	}
	.clip-bottom h1.text-primary{
		color: #00aeff; 
	}
	*, ::before, ::after{
		box-sizing: inherit !important;
	}
	/*.row{
		margin-right: -10%;
		margin-left: -10%;
	}*/
	.bg-footer-top{
		background-color: #134f8e;
	}
	.bg-footer-lower{
		background-color: #084482;
	}
</style>
<main>
	<div class="jumbotron text-white mb-0">
		<div class="jumbotron-content">
			<h1 class="mb-2">Dream of using tech to change the world?</h1>
			<p>Join the HNG movement and help ensure that while digital revolution might have started from Silicon Valley, its future will be written in Lagos, Nigeria</p>
			<div class="text-center">
				<button class="btn btn-custom-primary text-white px-5 py-2">Apply Now</button>
			</div>
			
		</div>

	</div>
	<div class="row bg-grey">
		<p class="text-center w-100 mb-0">About Us</p>
		<hr class="paddedhr">
	</div>
	<div class="container">
		
		<div class="logo my-5 d-flex justify-content-center">
			<img src="icons/logo-blue-bg.png">
		</div>


		<div class="content">
			<p>Join the HNG movement and help ensure that while digital revolution might have started from Silicon Valley, its future will be written in Lagos, Nigeria. Join the HNG movement and help ensure that while digital revolution might have started from Silicon Valley, its future will be written in Lagos, Nigeria. Join the HNG movement and help ensure that while digital revolution might have started from Silicon Valley, its future will be written in Lagos, Nigeria. Join the HNG movement and help ensure that while digital revolution might have started from Silicon Valley, its future will be written in Lagos, Nigeria</p>
		</div>

		
		
	</div>
	<div class="row clip-bottom py-5 text-center d-flex justify-content-around">
		<div class="col-sm-2 col-6">
			<h1 class="text-primary">4200</h1>
			Registered interns
			<hr class="paddedhr2">
		</div>
		<div class="col-sm-3 col-6">
			<h1 class="text-primary">30</h1>
			Motivated Mentors
			<hr class="paddedhr2">
		</div>
		<div class="col-sm-3 col-6">
			<h1 class="text-primary">6</h1>
			Learning Paths
			<hr class="paddedhr2">
		</div>
		<div class="col-sm-2 col-6">
			<h1 class="text-primary">5</h1>
			African Countries
			<hr class="paddedhr2">
		</div>	
	</div>
	<div class="container">
		<h3 class="mt-5 text-center">What you will learn</h3>
		<hr class="paddedhr2">
		<div class="row d-flex justify-content-around text-center">
			<div class="col-sm-3">
				<img src="icons/coding.png" class="d-block ml-auto mr-auto">
				<h4 class="my-0">Programming</h4>
				<p class="text-muted">
					Collaborate with passionate individuals to deliver on real-world projects and reasonable deadlines.
				</p>
			</div>
			<div class="col-sm-3">
				<img src="icons/painting-palette.png" class="d-block ml-auto mr-auto">
				<h4 class="my-0">Design</h4>
				<p class="text-muted">
					Collaborate with passionate individuals to deliver on real-world projects and reasonable deadlines.
				</p>
			</div>
			<div class="col-sm-3">
				<img src="icons/team.png" class="d-block ml-auto mr-auto">
				<h4 class="my-0">Collaboration</h4>
				<p class="text-muted">
					Collaborate with passionate individuals to deliver on real-world projects and reasonable deadlines.
				</p>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<div class="row bg-footer-top py-4"></div>
	<div class="row bg-footer-lower py-2 justify-content-center text-white">
		<div class="col-2 d-flex align-items-center" style=" border-right: 2px solid #fff; max-width: 150px;">
			<div class="rounded-circle bg-primary d-flex justify-content-center align-items-center mr-1" style="width: 80px; height: 50px;"><span class="fa fa-envelope float-left"></span></div>
			<h4 class="text-right">Start Learning Now</h4>
		</div>
		<div class="col-7">
			<h4 class="text-center mb-2">Ready to get started? Register Now!</h4>
			<form class="form-inline row d-flex justify-content-center">
				<div class="col-7 form-group pr-0 mr-0">
					<input type="email" name="email" id="email" placeholder="Enter your email" class="form-control w-100 py-2" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
				</div>
				<div class="col-4 form-group">
					<button class="btn btn-custom-primary text-white py-2 w-90" style="border-top-left-radius: 0; border-bottom-left-radius: 0">Apply Now</button>
				</div>
			</form>
		</div>
		
	</div>
</main>
<?php
include_once("footer.php");
?>