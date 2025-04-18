<div class="container-fluid px-0">
	<div class="booking-form-wrapper glass-morphism p-4">
		<div class="mb-4 text-center">
			<h3 class="text-primary mb-2">Book Your Venue</h3>
			<p class="text-muted">Complete the form below to request your booking</p>
			<div class="booking-progress">
				<div class="progress-line active"></div>
				<div class="progress-line"></div>
				<div class="progress-line"></div>
			</div>
		</div>
		
		<form action="" id="manage-book" class="modern-form">
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id :'' ?>">
			<input type="hidden" name="venue_id" value="<?php echo isset($_GET['venue_id']) ? $_GET['venue_id'] :'' ?>">
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group floating-label mb-4">
						<input type="text" class="form-control custom-input" name="name" id="name" value="<?php echo isset($name) ? $name :'' ?>" required>
						<label for="name" class="control-label">Full Name</label>
						<div class="focus-border"></div>
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="form-group floating-label mb-4">
						<textarea cols="30" rows="2" class="form-control custom-input" name="address" id="address" required><?php echo isset($address) ? $address :'' ?></textarea>
						<label for="address" class="control-label">Address</label>
						<div class="focus-border"></div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group floating-label mb-4">
						<input type="email" class="form-control custom-input" name="email" id="email" value="<?php echo isset($email) ? $email :'' ?>" required>
						<label for="email" class="control-label">Email</label>
						<div class="focus-border"></div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group floating-label mb-4">
						<input type="text" class="form-control custom-input" name="contact" id="contact" value="<?php echo isset($contact) ? $contact :'' ?>" required>
						<label for="contact" class="control-label">Contact #</label>
						<div class="focus-border"></div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label for="duration" class="control-label mb-2">Event Duration</label>
						<div class="custom-select-wrapper">
							<select class="form-control custom-select" name="duration" id="duration" required>
								<option value="">Select Duration</option>
								<option value="Half Day (4 hours)" <?php echo isset($duration) && $duration == 'Half Day (4 hours)' ? 'selected' : '' ?>>Half Day (4 hours)</option>
								<option value="Full Day (8 hours)" <?php echo isset($duration) && $duration == 'Full Day (8 hours)' ? 'selected' : '' ?>>Full Day (8 hours)</option>
								<option value="Evening (6pm-12am)" <?php echo isset($duration) && $duration == 'Evening (6pm-12am)' ? 'selected' : '' ?>>Evening (6pm-12am)</option>
								<option value="Weekend (Sat-Sun)" <?php echo isset($duration) && $duration == 'Weekend (Sat-Sun)' ? 'selected' : '' ?>>Weekend (Sat-Sun)</option>
								<option value="Custom" <?php echo isset($duration) && !in_array($duration, ['Half Day (4 hours)', 'Full Day (8 hours)', 'Evening (6pm-12am)', 'Weekend (Sat-Sun)']) ? 'selected' : '' ?>>Custom</option>
							</select>
							<i class="fas fa-chevron-down select-arrow"></i>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label for="schedule" class="control-label mb-2">Desired Event Schedule</label>
						<div class="date-input-wrapper">
							<input type="text" class="form-control datetimepicker" name="schedule" id="schedule" value="<?php echo isset($schedule) ? $schedule :'' ?>" required>
							<i class="far fa-calendar-alt date-icon"></i>
						</div>
					</div>
				</div>
				
				<div class="col-md-12" id="custom-duration-container" style="display:none;">
					<div class="form-group floating-label mb-4">
						<input type="text" class="form-control custom-input" name="custom_duration" id="custom_duration">
						<label for="custom_duration" class="control-label">Specify Custom Duration</label>
						<div class="focus-border"></div>
					</div>
				</div>
				
				<div class="col-12 mt-3">
					<h5 class="mb-3">Additional Requirements</h5>
					<div class="row">
						<div class="col-md-6">
							<div class="custom-checkbox mb-3">
								<input type="checkbox" id="catering" name="requirements[]" value="catering">
								<label for="catering">Catering Services</label>
							</div>
							<div class="custom-checkbox mb-3">
								<input type="checkbox" id="equipment" name="requirements[]" value="equipment">
								<label for="equipment">Audio/Visual Equipment</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="custom-checkbox mb-3">
								<input type="checkbox" id="decoration" name="requirements[]" value="decoration">
								<label for="decoration">Decoration Services</label>
							</div>
							<div class="custom-checkbox mb-3">
								<input type="checkbox" id="parking" name="requirements[]" value="parking">
								<label for="parking">Reserved Parking</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<div class="booking-footer mt-4">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-primary gradient-bg pulse submit-btn">Submit Booking <i class="fas fa-paper-plane ml-2"></i></button>
		</div>
	</div>
</div>

<style>
	.booking-form-wrapper {
		border-radius: 15px;
		overflow: hidden;
		box-shadow: 0 10px 30px rgba(0,0,0,0.1);
	}
	
	.booking-progress {
		display: flex;
		justify-content: center;
		margin: 20px 0;
	}
	
	.progress-line {
		width: 60px;
		height: 4px;
		background: var(--gray-300);
		margin: 0 5px;
		border-radius: 5px;
		transition: all 0.3s ease;
	}
	
	.progress-line.active {
		background: var(--primary);
		width: 80px;
	}
	
	.modern-form .form-group {
		position: relative;
		margin-bottom: 25px;
	}
	
	.floating-label {
		position: relative;
	}
	
	.floating-label label {
		position: absolute;
		top: 10px;
		left: 15px;
		font-size: 14px;
		color: var(--gray-600);
		pointer-events: none;
		transition: all 0.3s ease;
	}
	
	.floating-label .custom-input {
		height: 50px;
		padding-top: 20px;
		padding-bottom: 8px;
		font-size: 16px;
		border: none;
		border-radius: 8px;
		background: var(--gray-100);
		box-shadow: none;
	}
	
	.floating-label .custom-input:focus,
	.floating-label .custom-input:not(:placeholder-shown) {
		padding-top: 25px;
		padding-bottom: 8px;
	}
	
	.floating-label .custom-input:focus + label,
	.floating-label .custom-input:not(:placeholder-shown) + label {
		top: 5px;
		left: 15px;
		font-size: 11px;
		color: var(--primary);
		font-weight: 600;
	}
	
	.focus-border {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 0;
		height: 2px;
		background-color: var(--primary);
		transition: all 0.3s ease;
	}
	
	.custom-input:focus ~ .focus-border {
		width: 100%;
	}
	
	.custom-select-wrapper, .date-input-wrapper {
		position: relative;
	}
	
	.custom-select {
		appearance: none;
		-webkit-appearance: none;
		padding-right: 30px;
		height: 50px;
		background: var(--gray-100);
		border: none;
		border-radius: 8px;
	}
	
	.select-arrow, .date-icon {
		position: absolute;
		right: 15px;
		top: 50%;
		transform: translateY(-50%);
		color: var(--primary);
		pointer-events: none;
	}
	
	.datetimepicker {
		height: 50px;
		background: var(--gray-100);
		border: none;
		border-radius: 8px;
		padding-right: 35px;
	}
	
	.custom-checkbox {
		position: relative;
		padding-left: 35px;
		cursor: pointer;
		user-select: none;
	}
	
	.custom-checkbox input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
		height: 0;
		width: 0;
	}
	
	.custom-checkbox label {
		cursor: pointer;
	}
	
	.custom-checkbox label:before {
		content: '';
		position: absolute;
		left: 0;
		top: 0;
		width: 22px;
		height: 22px;
		border: 2px solid var(--gray-300);
		border-radius: 4px;
		transition: all 0.3s ease;
	}
	
	.custom-checkbox input:checked + label:before {
		background-color: var(--primary);
		border-color: var(--primary);
	}
	
	.custom-checkbox input:checked + label:after {
		content: '\f00c';
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		position: absolute;
		left: 5px;
		top: 3px;
		color: white;
		font-size: 12px;
	}
	
	.booking-footer {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	
	.submit-btn {
		transition: var(--transition-bounce);
	}
	
	.submit-btn:hover {
		transform: translateY(-5px);
	}
	
	@media (max-width: 767px) {
		.booking-progress {
			display: none;
		}
		
		.booking-footer {
			flex-direction: column;
		}
		
		.booking-footer button {
			width: 100%;
			margin-bottom: 10px;
		}
	}
</style>

<script>
	$(document).ready(function(){
		// Initialize datetimepicker
		$('.datetimepicker').datetimepicker({
			format:'Y/m/d H:i',
			startDate: '+3d',
			step: 30,
			minTime: '08:00',
			maxTime: '22:00'
		});
		
		// Custom duration toggle
		$('#duration').on('change', function(){
			if($(this).val() === 'Custom'){
				$('#custom-duration-container').slideDown(300);
			} else {
				$('#custom-duration-container').slideUp(300);
			}
		});
		
		// Form animation
		$('.custom-input').on('focus', function(){
			$(this).parent().addClass('focused');
		}).on('blur', function(){
			if($(this).val() === ''){
				$(this).parent().removeClass('focused');
			}
		});
		
		// Pre-fill values if they exist
		$('.custom-input').each(function(){
			if($(this).val() !== ''){
				$(this).parent().addClass('focused');
			}
		});
		
		// Submission handler
		$('.submit-btn').on('click', function(){
			$('#manage-book').submit();
		});
		
		// Form submission
		$('#manage-book').submit(function(e){
			e.preventDefault();
			
			// Validate form
			if(!$(this)[0].checkValidity()) {
				$(this)[0].reportValidity();
				return false;
			}
			
			// Custom duration handling
			if($('#duration').val() === 'Custom' && $('#custom_duration').val() !== '') {
				$('#duration').val($('#custom_duration').val());
			}
			
			start_load();
			$('#msg').html('');
			
			$.ajax({
				url:'admin/ajax.php?action=save_book',
				data: new FormData($(this)[0]),
				cache: false,
				contentType: false,
				processData: false,
				method: 'POST',
				type: 'POST',
				success:function(resp){
					if(resp==1){
						alert_toast("Booking request sent successfully!",'success');
						end_load();
						uni_modal("","book_msg.php");
					} else {
						alert_toast("An error occurred. Please try again.",'error');
						end_load();
					}
				},
				error: function(xhr, status, error) {
					alert_toast("An error occurred: " + error,'error');
					end_load();
				}
			});
		});
		
		// Add floating effect
		setTimeout(function(){
			$('.booking-form-wrapper').addClass('floating');
		}, 500);
	});
</script>