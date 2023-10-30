<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cards Distribution Program</title>

	<?php if(isset($include_port) && $include_port == true){ ?>
		<link rel="icon" type="image/png" href="/assets/img/poker_icon.png">
		<script src="/assets/plugins/sweetalert/sweetalert.js"></script>
	<?php }else{ ?>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/poker_icon.png'); ?>">
		<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.js'); ?>"></script>
	<?php } ?>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	.hidden {
    	display: none;
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	.result_area {
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	input[type=number] {
		padding: 6px 0px;
		box-sizing: border-box;
		border: 3px solid #ccc;
		-webkit-transition: 0.5s;
		transition: 0.5s;
		outline: none;
	}

	input[type=number]:focus {
		border: 3px solid #555;
	}

	.button-82-pushable {
		position: relative;
		border: none;
		background: transparent;
		padding: 0;
		cursor: pointer;
		outline-offset: 4px;
		transition: filter 250ms;
		user-select: none;
		-webkit-user-select: none;
		touch-action: manipulation;
	}

	.button-82-shadow {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border-radius: 12px;
		background: hsl(0deg 0% 0% / 0.25);
		will-change: transform;
		transform: translateY(2px);
		transition:
			transform
			600ms
			cubic-bezier(.3, .7, .4, 1);
	}

	.button-82-edge {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border-radius: 12px;
		background: linear-gradient(
			to left,
			hsl(340deg 100% 16%) 0%,
			#125c00 8%,
			#125c00 92%,
			hsl(340deg 100% 16%) 100%
		);
	}

	.button-82-front {
		display: block;
		position: relative;
		padding: 12px 27px;
		border-radius: 12px;
		font-size: 1.1rem;
		color: white;
		background: #28a745;
		will-change: transform;
		transform: translateY(-4px);
		transition:
			transform
			600ms
			cubic-bezier(.3, .7, .4, 1);
	}

	@media (min-width: 768px) {
		.button-82-front {
			font-size: 14px;
			padding: 5px 10px;
		}
	}

	.button-82-pushable:hover {
		filter: brightness(110%);
		-webkit-filter: brightness(110%);
	}

	.button-82-pushable:hover .button-82-front {
		transform: translateY(-6px);
		transition:
			transform
			250ms
			cubic-bezier(.3, .7, .4, 1.5);
	}

	.button-82-pushable:active .button-82-front {
		transform: translateY(-2px);
		transition: transform 34ms;
	}

	.button-82-pushable:hover .button-82-shadow {
		transform: translateY(4px);
		transition:
			transform
			250ms
			cubic-bezier(.3, .7, .4, 1.5);
	}

	.button-82-pushable:active .button-82-shadow {
		transform: translateY(1px);
		transition: transform 34ms;
	}

	.button-82-pushable:focus:not(:focus-visible) {
		outline: none;
	}

	</style>
</head>
<body>

	<div id="container">
		<h1>Cards Distribution Program</h1>

		<div id="body">

			<label for="num_people">Number of People:</label>
			<input style="width: 50px;" type="number" name="num_people" id="num_people" required>

			<button id="btn_submit" class="button-82-pushable" role="button">
				<span class="button-82-shadow"></span>
				<span class="button-82-edge"></span>
				<span class="button-82-front text">
					Distribute Cards
				</span>
			</button>

			<div class="result_area hidden">
				<div id="process_result"></div>
			</div>
			
		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

		
	</div>

</body>

</html>

<script>
$(document).ready(function() {

	$('#num_people').on('click', function() {
        $(this).select(); // Highlight the input field whenever clicked, ease the user to input new value without delete previous one
    });

    $('#num_people').on('input', function() {

		var maxNumPeople = 0;
					
		$('input[name="num_people"]').each(function() {
			var value = $(this).val();
			var width = value.length * 5 + 40;
						
			if (width > maxNumPeople) {
				maxNumPeople = width;
			}
		});

		$('input[name="num_people"]').width(maxNumPeople); // Change the input field size on input value

	});

	$('#num_people').on('keypress', function(e) {

        if (e.which === 101) {
            e.preventDefault(); // Prevent the "e" key from being entered
        }

		if (e.which == 13) { // Enable user to click "Enter" key to submit value
			$("#btn_submit").click();
		}

    });

	$(document).on('click', '#btn_submit', function() {

		var check_port = "<?php echo isset($include_port) ? $include_port : 0; ?>";

		if(check_port == 1){
			var ajax_url = "/Main/process";
		}else{
			var ajax_url = "<?php echo site_url('Main/process');?>";
		}

		var num_people = $('#num_people').val();
		
		if(num_people == '' || num_people == null)
		{
			Swal.fire('Input value does not exist','','error');

			$('.result_area').addClass('hidden');
			$('.result_area').html('');

			return;
		}

		if(isNaN(num_people) || num_people < 0)
		{
			Swal.fire('Value is invalid','','error');

			$('.result_area').addClass('hidden');
			$('.result_area').html('');

			return;
		}

		$.ajax({
			url:ajax_url,
			method:"POST",
			data: {num_people:num_people},
			success:function(data)
			{
				json = JSON.parse(data);
				$('.result_area').removeClass('hidden');
				$('.result_area').html(json.result);
			},
			error: function(xhr, ajaxOptions, thrownError) {
        		console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				Swal.fire('Irregularity occurred','','error');

				return;
      		}
		});
		
	});

});

</script>
