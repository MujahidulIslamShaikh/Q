/*
Author       : Dreamguys
Template Name: Kanakku - Bootstrap Admin Template
Version      : 1.0
*/


(function($) {
    "use strict";
	
	// Variables declarations
	
	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');
	var $slimScrolls = $('.slimscroll');
	
	feather.replace();
		
	// Sidebar
	var Sidemenu = function () {
		this.$menuItem = $('#sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function (e) {
			if ($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if (!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if ($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}
	
	// Sidebar Initiate
	init();
	
	// Mobile menu sidebar overlay
	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function () {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		return false;
	});
	
	// Sidebar overlay
	$(".sidebar-overlay").on("click", function () {
		$wrapper.removeClass('slide-nav');
		$(".sidebar-overlay").removeClass("opened");
		$('html').removeClass('menu-opened');
	});
	
	// Page Content Height
	if ($('.page-wrapper').length > 0) {
		var height = $(window).height();
		$(".page-wrapper").css("min-height", height);
	}
	
	// Page Content Height Resize
	$(window).resize(function () {
		if ($('.page-wrapper').length > 0) {
			var height = $(window).height();
			$(".page-wrapper").css("min-height", height);
		}
	});
	
	// Select 2
	if ($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}
	
	// Datetimepicker
	
	if($('.datetimepicker').length > 0 ){
		$('.datetimepicker').datetimepicker({
			format: 'DD-MM-YYYY',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}
	
	// Tooltip
	if ($('[data-toggle="tooltip"]').length > 0) {
		$('[data-toggle="tooltip"]').tooltip();
	}
	
	// Datatable
	if ($('.datatable').length > 0) {
		$('.datatable').DataTable({
			"bFilter": true,
		});
	}
	
	// Sidebar Slimscroll
	if ($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			allowPageScroll: false,
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function () {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}
	
	// Password Show
	
	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}

	// Check all email
	
	$(document).on('click', '#check_all', function() {
		$('.checkmail').click();
		return false;
	});
	if($('.checkmail').length > 0) {
		$('.checkmail').each(function() {
			$(this).on('click', function() {
				if($(this).closest('tr').hasClass('checked')) {
					$(this).closest('tr').removeClass('checked');
				} else {
					$(this).closest('tr').addClass('checked');
				}
			});
		});
	}
	
	// Mail important
	
	$(document).on('click', '.mail-important', function() {
		$(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
	});
	
	// Small Sidebar
	$(document).on('click', '#toggle_btn', function () {
		if ($('body').hasClass('mini-sidebar')) {
			$('body').removeClass('mini-sidebar');
			$('.subdrop + ul').slideDown();
		} else {
			$('body').addClass('mini-sidebar');
			$('.subdrop + ul').slideUp();
		}
		setTimeout(function () {
			mA.redraw();
			mL.redraw();
		}, 300);
		return false;
	});
	
	$(document).on('mouseover', function (e) {
		e.stopPropagation();
		if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
			var targ = $(e.target).closest('.sidebar').length;
			if (targ) {
				$('body').addClass('expand-menu');
				$('.subdrop + ul').slideDown();
			} else {
				$('body').removeClass('expand-menu');
				$('.subdrop + ul').slideUp();
			}
			return false;
		}
	});
	
	$(document).on('click', '#filter_search', function() {
		$('#filter_inputs').slideToggle("slow");
	});
	
	if($('.custom-file-container').length > 0) {
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
	}
    
	// Clipboard 
	
	if($('.clipboard').length > 0) {
		var clipboard = new Clipboard('.btn');
	}
	
	// Summernote
	
	if($('#summernote').length > 0) {
        $('#summernote').summernote({
		  height: 300,                 // set editor height
		  minHeight: null,             // set minimum height of editor
		  maxHeight: null,             // set maximum height of editor
		  focus: true                  // set focus to editable area after initializing summernote
		});
    }
	
	// Tooltip
	
	if($('[data-bs-toggle="tooltip"]').length > 0) {
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	}
	
	// Popover
	
	if($('.popover-list').length > 0) {
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		  return new bootstrap.Popover(popoverTriggerEl)
		})
	}
	
	// Counter 
	
	if($('.counter').length > 0) {
	   $('.counter').counterUp({
			delay: 20,
            time: 2000
       });
	}
	
	if($('#timer-countdown').length > 0) {
		$( '#timer-countdown' ).countdown( {
			from: 180, // 3 minutes (3*60)
			to: 0, // stop at zero
			movingUnit: 1000, // 1000 for 1 second increment/decrements
			timerEnd: undefined,
			outputPattern: '$day Day $hour : $minute : $second',
			autostart: true
		});
	}
	
	if($('#timer-countup').length > 0) {
		$( '#timer-countup' ).countdown( {
			from: 0,
			to: 180 
		});
	}
	
	if($('#timer-countinbetween').length > 0) {
		$( '#timer-countinbetween' ).countdown( {
			from: 30,
			to: 20 
		});
	}
	
	if($('#timer-countercallback').length > 0) {
		$( '#timer-countercallback' ).countdown( {
			from: 10,
			to: 0,
			timerEnd: function() {
				this.css( { 'text-decoration':'line-through' } ).animate( { 'opacity':.5 }, 500 );
			} 
		});
	}
	
	if($('#timer-outputpattern').length > 0) {
		$( '#timer-outputpattern' ).countdown( {
			outputPattern: '$day Days $hour Hour $minute Min $second Sec..',
			from: 60 * 60 * 24 * 3
		});
	}
	

	// Chat

	var chatAppTarget = $('.chat-window');
	(function() {
		if ($(window).width() > 991)
			chatAppTarget.removeClass('chat-slide');
		
		$(document).on("click",".chat-window .chat-users-list a.media",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.addClass('chat-slide');
			}
			return false;
		});
		$(document).on("click","#back_user_list",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.removeClass('chat-slide');
			}	
			return false;
		});
	})();
	
})(jQuery);

// ----------------------------------------------------------------------------

// ---------- Only Number ------------
function validateNumber(e) {

	const pattern = /^[0-9]$/;

	return pattern.test(e.key)

}



$(document).ready(function() {

	// --------------- Manage User / BGV Req Tab -----------------

	$('#manage_user_tab').click(function() {
		$('#manage_user_tab').addClass('active');
		$('#bgv_req_tab').removeClass('active');
		$('#manage_user').css('display', 'block');
		$('#BGV_sec').css('display', 'none');
	});

	$('#bgv_req_tab').click(function() {
		$('#manage_user_tab').removeClass('active');
		$('#bgv_req_tab').addClass('active');
		$('#manage_user').css('display', 'none');
		$('#BGV_sec').css('display', 'block');
	});


	// ----------------- Employee type tab --------------

	$('#new_emp_type').click(function() {
		$('#new_emp_type').addClass('active');
		$('#client_emp_type').removeClass('active');
		$('#new_emp').css('display', 'block');
		$('#client_emp').css('display', 'none');
	});

	$('#client_emp_type').click(function() {
		$('#client_emp_type').addClass('active');
		$('#new_emp_type').removeClass('active');
		$('#new_emp').css('display', 'none');
		$('#client_emp').css('display', 'block');
	});

	// ----------------- Filter Tab For Active / Inactive Users ------------

	$('#active_user').click(function() {
		$('#active_user').addClass('active');
		$('#inactive_user').removeClass('active');
	});

	$('#inactive_user').click(function() {
		$('#active_user').removeClass('active');
		$('#inactive_user').addClass('active');
	});

	// ----------------- Filter Tab For New Vision Emp -----------------

	$('#new_emp_pending_case').click(function() {
		$('#new_emp_pending_case').addClass('active');
		$('#new_emp_stop_case').removeClass('active');
		$('#new_emp_completed_case').removeClass('active');
	});

	$('#new_emp_stop_case').click(function() {
		$('#new_emp_pending_case').removeClass('active');
		$('#new_emp_stop_case').addClass('active');
		$('#new_emp_completed_case').removeClass('active');
	});

	$('#new_emp_completed_case').click(function() {
		$('#new_emp_pending_case').removeClass('active');
		$('#new_emp_stop_case').removeClass('active');
		$('#new_emp_completed_case').addClass('active');
	});

	// -------------------- Filter Tab For Client Emp -----------------------

	$('#client_emp_pending_case').click(function() {
		$('#client_emp_pending_case').addClass('active');
		$('#client_emp_stop_case').removeClass('active');
		$('#client_emp_completed_case').removeClass('active');
	});

	$('#client_emp_stop_case').click(function() {
		$('#client_emp_pending_case').removeClass('active');
		$('#client_emp_stop_case').addClass('active');
		$('#client_emp_completed_case').removeClass('active');
	});

	$('#client_emp_completed_case').click(function() {
		$('#client_emp_pending_case').removeClass('active');
		$('#client_emp_stop_case').removeClass('active');
		$('#client_emp_completed_case').addClass('active');
	});

	// ------------- Report Form -------------------

	$('#show_report_form').click(function() {
		$('#submit_report_form').css('display', 'block');
	});
	$('#close_report_form').click(function(e) {
		e.preventDefault();
		$('#submit_report_form').css('display', 'none');
	});

	// --------------- BGV Process --------------

	// $('.bgv_process li:first-child').addClass('no_before');
	// $('.bgv_process li:last-child').addClass('add_bg');

	$('.bgv_process div:first-child li').addClass('no_before');
	// $('.bgv_process div:last-child li').addClass('add_bg');

	// -------------- Tooltip ---------------------

	// $('.bgv_process li').click(function() {
	// 	$('.pop').toggleClass('show');
	// });

	// ----------------- BVG Process ----------------

	// $('#show_comment_box1').click(function() {
	// 	$('#comment_box1').css('display', 'block');
	// 	$('#status_box1').css('display', 'none');
	// });

	// $('#show_status_box1').click(function() {
	// 	$('#comment_box1').css('display', 'none');
	// 	$('#status_box1').css('display', 'block');
	// });

	// $('#close_status_box1').click(function() {
	// 	$('#status_box1').css('display', 'none');
	// });

	// $('#close_coment_box1').click(function() {
	// 	$('#comment_box1').css('display', 'none');
	// });

	// ---------------

	// $('#show_pay_box2').click(function() {
	// 	$('#pay_box2').css('display', 'block');
	// 	$('#comment_box2').css('display', 'none');
	// 	$('#status_box2').css('display', 'none');
	// });

	// $('#show_comment_box2').click(function() {
	// 	$('#pay_box2').css('display', 'none');
	// 	$('#comment_box2').css('display', 'block');
	// 	$('#status_box2').css('display', 'none');
	// });

	// $('#show_status_box2').click(function() {
	// 	$('#pay_box2').css('display', 'none');
	// 	$('#comment_box2').css('display', 'none');
	// 	$('#status_box2').css('display', 'block');
	// });

	// $('#close_pay_box2').click(function() {
	// 	$('#pay_box2').css('display', 'none');
	// });

	// $('#close_status_box2').click(function() {
	// 	$('#status_box2').css('display', 'none');
	// });

	// $('#close_coment_box2').click(function() {
	// 	$('#comment_box2').css('display', 'none');
	// });

	// ---------
	
	// $('#show_pay_box3').click(function() {
	// 	$('#pay_box3').css('display', 'block');
	// 	$('#comment_box3').css('display', 'none');
	// 	$('#status_box3').css('display', 'none');
	// });

	// $('#show_comment_box3').click(function() {
	// 	$('#pay_box3').css('display', 'none');
	// 	$('#comment_box3').css('display', 'block');
	// 	$('#status_box3').css('display', 'none');
	// });

	// $('#show_status_box3').click(function() {
	// 	$('#pay_box3').css('display', 'none');
	// 	$('#comment_box3').css('display', 'none');
	// 	$('#status_box3').css('display', 'block');
	// });

	// $('#close_pay_box3').click(function() {
	// 	$('#pay_box3').css('display', 'none');
	// });

	// $('#close_status_box3').click(function() {
	// 	$('#status_box3').css('display', 'none');
	// });

	// $('#close_coment_box3').click(function() {
	// 	$('#comment_box3').css('display', 'none');
	// });

	// ---------
	
	// $('#show_pay_box4').click(function() {
	// 	$('#pay_box4').css('display', 'block');
	// 	$('#comment_box4').css('display', 'none');
	// 	$('#status_box4').css('display', 'none');
	// });

	// $('#show_comment_box4').click(function() {
	// 	$('#pay_box4').css('display', 'none');
	// 	$('#comment_box4').css('display', 'block');
	// 	$('#status_box4').css('display', 'none');
	// });

	// $('#show_status_box4').click(function() {
	// 	$('#pay_box4').css('display', 'none');
	// 	$('#comment_box4').css('display', 'none');
	// 	$('#status_box4').css('display', 'block');
	// });

	// $('#close_pay_box4').click(function() {
	// 	$('#pay_box4').css('display', 'none');
	// });

	// $('#close_status_box4').click(function() {
	// 	$('#status_box4').css('display', 'none');
	// });

	// $('#close_coment_box4').click(function() {
	// 	$('#comment_box4').css('display', 'none');
	// });

});

// document.addEventListener("DOMContentLoaded", function () {
// 	var button = document.querySelector(".initiate_btn");
// 	const select = document.querySelector(".select");

// 	button.addEventListener("click", function () {

// 		$.ajax({
// 			url : "<?= base_url('employee-log-detail')?>"
// 		});

// 		const selectedOption = select.options[select.selectedIndex].value;
// 		console.log(selectedOption);
// 		var reportCard = `
// 		<div class="bvg_process_row my-3">
// 					<div class="report_form_card process_main_card">
// 						<div class="report_form_heading d-flex justify-content-between">
// 							<div>
// 								${selectedOption}
// 							</div>
// 							<div>
// 								<a role="button" class="show_pay_box"><i class="fas fa-rupee-sign text-info"></i></a>
// 								<a role="button" class="show_status_box"><i class="fas fa-edit text-info"></i></a>
// 								<a role="button" class="show_comment_box"><i class="fas fa-comments text-info"></i></a>
// 							</div>
// 						</div>
// 						<div class="report_form_body p-3">
// 							<ul class="bgv_process">
// 								<div style="position: relative;">
// 									<li class="">
// 										<i class="far fa-clock"></i>
// 									</li>
// 									<span class="pop">
// 										<div class="pop_head">
// 											Activity
// 										</div>
// 										<div class="pop_body">
// 											<p>Smith has changed the status to Initiated</p>
// 											<p>05/07/2023 09:01 AM</p>
// 										</div>
// 									</span>
// 								</div>
								
// 							</ul>
// 						</div>
// 					</div>
// 					<div class="report_form_card process_sub_card pay_box">
// 						<div class="report_form_heading">
// 							Amount
// 						</div>
// 						<div class="report_form_body p-3">
// 							<div class="form-group">
// 								<input type="text" class="form-control" placeholder="Enter Amount in INR" value="">
// 							</div>
// 							<div class="form-group">
// 								<input type="text" class="form-control" placeholder="Mention Details" value="">
// 							</div>
// 							<div class="text-end">
// 								<button type="button" class="btn btn-outline-secondary text-dark btn-sm mx-2 close_pay_box">Cancel</button>
// 								<button type="submit" class="btn background_1 text-white btn-sm">Submit</button>
// 							</div>
// 						</div>
// 					</div>
// 					<div class="report_form_card process_sub_card status_box">
// 						<div class="report_form_heading">
// 							Update Status
// 						</div>
// 						<div class="report_form_body p-3">
// 							<div class="form-group">
// 								<select class="select">
// 									<option>Select Verification Status</option>
// 									<option value="Positive">Positive</option>
// 									<option value="Negative">Negative</option>
// 									<option value="Discrepant">Discrepant </option>
// 									<option value="Not Applicable">Not Applicable</option>
// 								</select>
// 							</div>
// 							<div class="text-end">
// 								<button type="button" class="btn btn-outline-secondary text-dark btn-sm mx-2 close_status_box">Cancel</button>
// 								<button type="submit" class="btn background_1 text-white btn-sm">Submit</button>
// 							</div>
// 						</div>
// 					</div>
// 					<div class="report_form_card process_sub_card comment_box">
// 						<div class="report_form_heading">
// 							Add Comment
// 						</div>
// 						<div class="report_form_body p-3">
// 							<div class="form-group">
// 								<input type="hidden" class="form-control" name="id012" value="<?= $candidates['id012'] ?>">
// 								<input type="hidden" class="form-control" name="comment_for" value="Education Verification">
// 								<input type="hidden" class="form-control" name="by_id" value="<?= $users['id012'] ?>">
// 								<input type="hidden" class="form-control" name="by_name" value="<?= $users['firstname014'] . ' ' . $users['lastname015'] ?>">
// 								<input type="text" class="form-control" placeholder="Enter Comment" value="">
// 							</div>
// 							<div class="text-end">
// 								<button type="button" class="btn btn-outline-secondary text-dark btn-sm mx-2 close_comment_box">Cancel</button>
// 								<button type="submit" class="btn background_1 text-white btn-sm">Submit</button>
// 							</div>
// 						</div>
// 					</div>
// 				</div>
// 		`;

// 		var container = document.getElementById("reportContainer"); 
// 		container.innerHTML += reportCard;

// 		$(".comment_box").hide();

// 		$(".show_comment_box").click(function() {
// 			$(this).closest(".bvg_process_row").find(".comment_box").toggle();
// 		});

// 		$(".close_comment_box").click(function() {
// 			$(this).closest(".comment_box").hide();
// 		});

// 		$(".pay_box").hide();

// 		$(".show_pay_box").click(function() {
// 			$(this).closest(".bvg_process_row").find(".pay_box").toggle();
// 		});
	
// 		$(".close_pay_box").click(function() {
// 			$(this).closest(".pay_box").hide();
// 		});

// 		$(".status_box").hide();

// 		$(".show_status_box").click(function() {
// 			$(this).closest(".bvg_process_row").find(".status_box").toggle();
// 		});
	
// 		$(".close_status_box").click(function() {
// 			$(this).closest(".status_box").hide();
// 		});

// 		$('ul.bgv_process li').click(function () {
// 			$(this).next('.pop').toggle();
// 		});

// 		$('.bgv_process div:first-child li').addClass('no_before');
// 		// $('.bgv_process div:last-child li').addClass('add_bg');


// 	});
// });

$(document).ready(function() {
    // Hide the comment_box initially
    $(".comment_box").hide();

    // Add a click event handler for show_comment_box elements
    $(".show_comment_box").click(function() {
        // Find the closest .comment_box relative to the clicked element and toggle its visibility
        $(this).closest(".bvg_process_row").find(".comment_box").toggle();
    });

    // Add a click event handler for close_comment_box buttons
    $(".close_comment_box").click(function() {
        // Find the closest .comment_box relative to the clicked cancel button and hide it
        $(this).closest(".comment_box").hide();
    });
});


$(document).ready(function() {
    // Hide the comment_box initially
    $(".pay_box").hide();

    // Add a click event handler for show_comment_box elements
    $(".show_pay_box").click(function() {
        // Find the closest .comment_box relative to the clicked element and toggle its visibility
        $(this).closest(".bvg_process_row").find(".pay_box").toggle();
    });

    // Add a click event handler for close_comment_box buttons
    $(".close_pay_box").click(function() {
        // Find the closest .comment_box relative to the clicked cancel button and hide it
        $(this).closest(".pay_box").hide();
    });
});


$(document).ready(function() {
    // Hide the comment_box initially
    $(".status_box").hide();

    // Add a click event handler for show_comment_box elements
    $(".show_status_box").click(function() {
        // Find the closest .comment_box relative to the clicked element and toggle its visibility
        $(this).closest(".bvg_process_row").find(".status_box").toggle();
    });

    // Add a click event handler for close_comment_box buttons
    $(".close_status_box").click(function() {
        // Find the closest .comment_box relative to the clicked cancel button and hide it
        $(this).closest(".status_box").hide();
    });
});

$(document).ready(function() {
    // Hide the comment_box initially
    $(".approve_box").hide();

    // Add a click event handler for show_comment_box elements
    $(".show_approve_box").click(function() {
        // Find the closest .comment_box relative to the clicked element and toggle its visibility
        $(this).closest(".bvg_process_row").find(".approve_box").toggle();
    });

    // Add a click event handler for close_comment_box buttons
    $(".close_approve_box").click(function() {
        // Find the closest .comment_box relative to the clicked cancel button and hide it
        $(this).closest(".approve_box").hide();
    });
});


$(document).ready(function() {
	$('#ongoing_case').click(function() {
		$('#ongoing').css('display', 'block');
		$('#stop').css('display', 'none');
		$('#completed').css('display', 'none');
		$('#unregister').css('display', 'none');
		$('#insufficient').css('display', 'none');
		$('#ongoing_case').addClass('active');
		$('#stop_case').removeClass('active');
		$('#completed_case').removeClass('active');
		$('#unregister_case').removeClass('active');
		$('#insufficient_case').removeClass('active');
	});

	$('#stop_case').click(function() {
		$('#ongoing').css('display', 'none');
		$('#stop').css('display', 'block');
		$('#completed').css('display', 'none');
		$('#unregister').css('display', 'none');
		$('#insufficient').css('display', 'none');
		$('#ongoing_case').removeClass('active');
		$('#stop_case').addClass('active');
		$('#completed_case').removeClass('active');
		$('#unregister_case').removeClass('active');
		$('#insufficient_case').removeClass('active');
	});

	$('#completed_case').click(function() {
		$('#ongoing').css('display', 'none');
		$('#stop').css('display', 'none');
		$('#completed').css('display', 'block');
		$('#unregister').css('display', 'none');
		$('#insufficient').css('display', 'none');
		$('#ongoing_case').removeClass('active');
		$('#stop_case').removeClass('active');
		$('#completed_case').addClass('active');
		$('#unregister_case').removeClass('active');
		$('#insufficient_case').removeClass('active');
	});

	$('#unregister_case').click(function() {
		$('#ongoing').css('display', 'none');
		$('#stop').css('display', 'none');
		$('#completed').css('display', 'none');
		$('#unregister').css('display', 'block');
		$('#insufficient').css('display', 'none');
		$('#ongoing_case').removeClass('active');
		$('#stop_case').removeClass('active');
		$('#completed_case').removeClass('active');
		$('#unregister_case').addClass('active');
		$('#insufficient_case').removeClass('active');
	});

	$('#insufficient_case').click(function() {
		$('#ongoing').css('display', 'none');
		$('#stop').css('display', 'none');
		$('#completed').css('display', 'none');
		$('#unregister').css('display', 'none');
		$('#insufficient').css('display', 'block');
		$('#ongoing_case').removeClass('active');
		$('#stop_case').removeClass('active');
		$('#completed_case').removeClass('active');
		$('#unregister_case').removeClass('active');
		$('#insufficient_case').addClass('active');
	});

});

//  ------------- Tooltip -----------------

//   const listItems = document.querySelectorAll('.bgv_process li');

//   listItems.forEach((item) => {
//     item.addEventListener('click', () => {
//       const spanElement = item.querySelector('span.pop');
//       spanElement.classList.toggle('active_pop');
//     });
//   });

  $(document).ready(function () {
	$('ul.bgv_process li').click(function () {
		$(this).next('.pop').toggle();
	});
});
