<?php $this->load->view("layouts/header"); ?>
	<div class="container" id="registration-app" style="margin-bottom: 50px;">
		<!-- Row -->
		<div class="row">
			<!-- Middle Content Area -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="heading-panel">
					<h3 class="main-title text-center">
						Create Your Dealer Account  
					</h3>
				</div>
			</div>
			<?php 
				$attributes = array('class' => 'form-horizontal');
				echo form_open_multipart('dealer/subscribe/saveDealerregistration', $attributes);
			?>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<!--  Form -->
					<?php 
						echo $this->session->flashdata('message'); 
						echo validation_errors(); 
						echo (isset($error))? $error:'';
					?>
					<div class="form-grid">
						<div class="form-group">
			               <div class="skin-minimal">
			                  <ul class="list list-horizontal">
			                  	<li>
			                        <input tabindex="8" type="radio" id="dealer-radio" name="minimal-radio" checked>
			                        <label for="minimal-radio-2">Register as dealer</label>
			                     </li>

			                     <li>
			                        <input tabindex="7" type="radio" id="user-radio" name="minimal-radio">
			                        <label  for="minimal-radio-1">Register as user </label>
			                     </li>
			                  </ul>
			               </div>
			            </div>

						<div class="form-group">
							<label> Title </label>
							<input placeholder="Enter Your Title" name="title" class="form-control" type="text" required="required" value="<?php echo set_value('title'); ?>">
						</div>
						<div class="form-group">
							<label>First Name</label><span class="required"> **</span>
							<input placeholder="Enter Your First Name" name="firstname" class="form-control" type="text" required="required" value="<?php echo set_value('firstname'); ?>">
						</div>
						<div class="form-group">
							<label>Middle Name</label>
							<input type="text" class="form-control" placeholder="Enter Your Middle Name" name="middlename" value="<?php echo set_value('middlename'); ?>">
						</div>
						<div class="form-group">
							<label>Last Name</label> <span class="required"> **</span>
							<input placeholder="Enter Your Last Name" name="lastname" class="form-control" type="text" required="required" value="<?php echo set_value('lastname'); ?>">
						</div>
						<div class="form-group">
							<label>Suffix</label>
							<input type="text" class="form-control" placeholder="Enter Your Suffix" name="suffix" value="<?php echo set_value('suffix'); ?>">
						</div>
						<div class="form-group">
							<label> Email Address </label><span class="required"> **</span>
							<input type="text" class="form-control" name="email" placeholder="Email Address" required="required" value="<?php echo set_value('email'); ?>">
						</div>
						<div class="form-group">
							<label> Address </label>
							<input type="text" class="form-control" placeholder="Street/APT/Bldg Name" name="address" value="<?php echo set_value('address'); ?>">
						</div>
						<div class="form-group">
							<label> City </label>
							<input type="text" class="form-control" placeholder="Your City" name="city" value="<?php echo set_value('city'); ?>">
						</div>
						<div class="form-group">
							<label> State </label>
							<select name="state" class="form-control">
								<?php foreach($states as $state):  ?>
	  								<option value="<?php echo $state->id; ?>"> <?php echo $state->name; ?> 
	  							    </option>
  								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label> Zip Code</label><span class="required"> **</span>
							<input type="text" class="form-control" name="zipcode" placeholder="Your Zip Code" required="required" value="<?php echo set_value('zipcode'); ?>">
						</div>
						<div class="form-group">
							<label> Country</label><span class="required"> **</span>
							<select name="country" class="form-control" required="required">
								<?php foreach($countries as $country):  ?>
									<option value="<?php echo $country->id; ?>"> <?php echo $country->name; ?> 
	  							    </option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<!-- Form -->
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-grid">
						<div class="form-group">
							<label>Company Name</label><span class="required"> **</span>
							<input type="text" class="form-control" placeholder="Enter Your Company Name" name="companyname" required="required" value="<?php echo set_value('companyname'); ?>">
						</div>
						<div class="form-group">
							<label> Job Title </label>
							<input type="text" class="form-control" placeholder="Your Job Title" name="jobtitle" value="<?php echo set_value('jobtitle'); ?>">
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<input placeholder="Enter Your Contact Number" class="form-control" type="text" name="contactnumber" value="<?php echo set_value('contactnumber'); ?>">
						</div>
						<div class="form-group">
							<label> Web Page</label><span class="required"> **</span>
							<input type="text" class="form-control" placeholder="Your Web Page (eg. Google.com)" name="webpage" required="required" value="<?php echo set_value('webpage'); ?>">
						</div>
						<div class="form-group">
							<label> FFL Document</label> <span class="required"> **</span>
							<input type="file" class="form-control" name="ffl" required="required">
						</div>
						<div class="form-group">
							<label> Expiration </label>
							<input type="date" class="form-control" name="expiration" placeholder="Your FFL Document Expiration">
						</div>
						<div class="form-group">
							<label> SOT</label> <span class="required"> **</span>
							<input type="file" class="form-control" name="sot" required="required">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input placeholder="Your Username" class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>" id="nospace">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input placeholder="Your Password" class="form-control" type="password" name="password">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input placeholder="Confirm Password" class="form-control" type="password" name="confirm">
						</div>
						<!--<div class="form-group">
							<div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }} "></div>
						</div>-->
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-sm-7">
									<div class="skin-minimal">
										<ul class="list">
											<li class="list-terms">
												<input  type="checkbox" id="minimal-checkbox-1" name="accept_terms">
												<label for="minimal-checkbox-1">I agree <a href="<?php echo base_url('term-and-condition'); ?>" target="_blank">Term and Condition</a></label>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<button class="btn btn-theme btn-lg btn-block">Join Now!</button>
						<a href="<?php echo base_url('dealer-login'); ?>" class="btn btn-theme btn-lg btn-block">I already have account <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>

			</form>
			<!-- Middle Content Area  End -->
		</div>
		<!-- Row End -->	
	</div>
<?php $this->load->view("layouts/pagefooter");?>
<script type="text/javascript">
	
	$(function() {
	    $('#nospace').on('keypress', function(e) {
	        
	        if (e.which == 32)
	            return false;
	    });
	});
</script>