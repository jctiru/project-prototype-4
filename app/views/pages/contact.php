<?php require APPROOT .'/views/inc/header.php'; ?>
<!-- Jumbotron -->
<div class="container">    
    <div id="pages-contact-jumbotron" class="jumbotron text-center py-4 mb-3">
        <h1 class="text-white jumbotron-text-shadow">Contact</h1>
    </div>
</div>
<!-- Contact -->
<section class="container mt-4 mb-5 pb-5">
    <!--Contact description-->
    <p class="pb-4 text-dark">We'd love to hear from you. You can either reach out to us as a whole and one of our awesome team members will get back to you, or if you have a specific question reach out to one of our staff. We love getting emails all day.</p>
    <div class="row">
        <!--Grid column-->
        <div class="col-lg-5 mb-4">
            <!--Form with header-->
            <form method="POST" action="">
            	<div class="card border-secondary rounded-0 text-dark">
	                <div class="card-header p-0">
	                    <div class="text-center py-3">
	                        <h3 class="text-dark"><i class="fa fa-envelope"></i> Write to us</h3>
	                        <p class="m-0">Feel free to contact us!</p>
	                    </div>
	                </div>
	                <div class="card-body p-3">
	                    <!--Body-->
	                    <div class="form-group">
	                        <label class="control-label">Your name:</label>
	                        <div class="input-group">
	                            <div class="input-group-prepend">
	                            	<span class="input-group-text"><i class="fa fa-user"></i></span>
	                            </div>
	                            <input required type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Name">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label">Your email:</label>
	                        <div class="input-group mb-2 mb-sm-0">
	                            <div class="input-group-prepend">
	                            	<span class="input-group-text"><i class="fa fa-envelope"></i></span>
	                            </div>
	                            <input required type="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label">Service:</label>
	                        <div class="input-group mb-2 mb-sm-0">
	                            <div class="input-group-prepend">
	                            	<span class="input-group-text"><i class="fa fa-tag"></i></span>
	                            </div>
	                            <select class="custom-select">
							    	<option>Choose One:</option>
							    	<option>General Customer Service</option>
							    	<option>Suggestions</option>
							    	<option>Inquiry</option>
							    </select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="control-label">Message:</label>
	                        <div class="input-group mb-2 mb-sm-0">
	                            <div class="input-group-prepend">
	                            	<span class="input-group-text"><i class="fa fa-pencil"></i></span>
	                            </div>
	                            <textarea required placeholder="Message" class="form-control"></textarea>
	                        </div>
	                    </div>
	                    <div class="text-center">
	                        <button class="btn btn-dark btn-block rounded-0 py-2">Submit</button>
	                    </div>
	                </div>
	            </div>
            </form>
            <!--Form with header-->
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-lg-7">
            <!--Google map-->
            <div class="mb-4">
               
            </div>
            <!--Buttons-->
            <div class="row text-center text-dark">
                <div class="col-md-4">
                    <a class="bg-dark px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                    <p>San Francisco, CA 94126,<br> United States</p>
                </div>
                <div class="col-md-4">
                    <a class="bg-dark px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                    <p>+ 01 234 567 89, <br> Mon - Fri, 8:00-22:00</p>
                </div>
                <div class="col-md-4">
                    <a class="bg-dark px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                    <p>info@gmail.com <br> sale@gmail.com</p>
                </div>
            </div>
        </div>
       <!--Grid column-->

    </div>

</section>
<!-- Contact -->
<?php require APPROOT .'/views/inc/footer.php'; ?>