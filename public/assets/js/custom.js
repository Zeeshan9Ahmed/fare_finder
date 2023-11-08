


// DATA TABLE START
$(document).ready( function () {
	$('#table_id').DataTable();
});
// DATA TABLE END

// SIDE MENU ACTIVE AFTER PAGE RELOAD START
$(document).ready(function () {
	jQuery(function ($) {
		var path = window.location.href;
	// because the 'href' property of the DOM element is the absolute path
		$(".navItem").each(function () {
			if (this.href === path) {
				$(this).addClass("active");
			}
		});
	});
});
// SIDE MENU ACTIVE AFTER PAGE RELOAD END


// SIDE MENU TOGGLE START
$(document).ready(function(){
	$(".toggleBtn").click(function(){
		$(".sideMenu").toggleClass("active");
		$(".mainContent").toggleClass("active");
		$(".artistInfoBox").toggleClass("active");
	});	
	$(".closeAside").click(function(){
		$(".sideMenu").removeClass("active");
	})


	$(".playlist-track-ctn").click(function(){
		$(".audioBox").toggleClass("active");
	});
	$(".closeAudio").click(function(){
		$(".audioBox").removeClass("active");
	})
});
// SIDE MENU TOGGLE END


/// EDIT-PROFILE-AVATAR JS START (PERSONAL PROFILE) 
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#imagePreview').css('background-image', 'url('+e.target.result +')');
			$('#imagePreview').hide();
			$('#imagePreview').fadeIn(650);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#imageUpload").change(function() {
	readURL(this);
});
/// EDIT-PROFILE-AVATAR JS END (PERSONAL PROFILE)


/// EDIT-PROFILE-AVATAR JS START (VENUE PROFILE) 
function readURL2(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#imagePreview2').css('background-image', 'url('+e.target.result +')');
			$('#imagePreview2').hide();
			$('#imagePreview2').fadeIn(650);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#imageUpload2").change(function() {
	readURL2(this);
});
/// EDIT-PROFILE-AVATAR JS END (VENUE PROFILE)

/// OTP INPUTS START
$(document).ready(function () {
	$('.digit-group').find('input').each(function() {
		$(this).attr('maxlength', 1);
		$(this).on('keyup', function(e) {
			var parent = $($(this).parent());

			if(e.keyCode === 8 || e.keyCode === 37) {
				var prev = parent.find('input#' + $(this).data('previous'));

				if(prev.length) {
					$(prev).select();
				}
			} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
				var next = parent.find('input#' + $(this).data('next'));

				if(next.length) {
					$(next).select();
				} else {
					if(parent.data('autosubmit')) {
						parent.submit();
					}
				}
			}
		});
	});
});
/// OTP INPUTS END


//DASHBOARD PIE CHART START
var ctx = document.querySelectorAll('.custome-chart-2');
ctx.forEach(function(ct) {
	ct.getContext('2d');
	var myChart = new Chart(ct, {
		type: 'doughnut',
		responsive:true,
		maintainAspectRatio:true,
		data: {
			labels: ['70%', '80%', '90%'],
			datasets: [{
				label: '# of Votes',
				data: [30, 45, 40],
				backgroundColor: [
					'#686868',
					'#b78826',
					'#8e5700'
					],
			}]
		},
	});
})

//DASHBOARD PIE CHART START END

//DASHBOARD BAR CHART START
var ctx = document.querySelectorAll('.custome-chart');
ctx.forEach(function(ct) {
	ct.getContext('2d');
	var myChart = new Chart(ct, {
		type: 'bar',
		responsive:true,
		data: {
			labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9r', '10', '11', '12'],
			datasets: [{
				label: 'lorem',
				data: [3, 5, 6, 4, 7, 6 , 8, 5, 6, 5, 4, 8],
				backgroundColor: [
					'#d09e00',
					'#c49102',
					'#d09e00',
					'#a87c00',
					'#d09e00',
					'#ffbc00',
					'#a57a00',
					'#d09e00',
					'#c49100',
					'#ffd04d',
					'#cc9600',
					'#af8100'
					],
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
})

//DASHBOARD BAR CHART START


// LINE CHART JS START
var config = {
	type: 'line',
	responsive: true,
	data: {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July' , 'Aug' , 'Sep', 'Oct', 'Nov', 'Dec'],
		datasets: [{
			label: 'Lorem',
			backgroundColor: '#bb8133',
			borderColor: '#bb8133',
			borderWidth: 4,
			pointRadius: 8,
			hoverRadius: 12,
			tension: 0.4,
			fill: false,
			data: [
				10,
				24,
				200,
				95,
				114,
				180,
				340,
				300,
				280,
				380,
				140,
				290
				],

		}]
	},
	options: {
		responsive: true,
		title: {
			display: true,
		},
		scales: {
			xAxes: [{
				display: true,
				scaleLabel: {
					display: true,
				},
			}],
			yAxes: [{
				display: true,
          //type: 'logarithmic',
				scaleLabel: {
					display: true,
				},
				ticks: {
					min: 1,
					max: 400,

              // forces step size to be 5 units
					stepSize: 100
				}
			}]
		}
	}
};

window.onload = function() {
	var ctx = document.getElementById('canvas').getContext('2d');
	window.myLine = new Chart(ctx, config);
};

document.getElementById('randomizeData').addEventListener('click', function() {
	config.data.datasets.forEach(function(dataset) {
		dataset.data = dataset.data.map(function() {
			return randomScalingFactor();
		});

	});

	window.myLine.update();
});

// LINE CHART JS END



