$(function () {

	$('.table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

	$("#registeruser").validate({
		rules: {
	        firstname: {
				required: true,
				// minlength: 5         
	        },
	        lastname:{
	        	required: true, 
	        },
	        email:{
				required: true,
				email: true, 
				email_custom_rule : true,
	        },
	        country :{
	        	required: true,
	        },
	        password :{
	        	required: true,	        	
	        },
	        con_password :{
	        	required: true,
	        	equalTo : "#password"
	        },	        
	        terms :{
	        	required: true,
	        }
	    },
	    messages: {
	        firstname: {
	          required: "Please enter first name",
	        },
	        lastname: {
	          required: "Please enter last name",
	        },
	        email:{
	        	required: "Please enter Email",
	        },
	        country:{
	        	required: "Please select country",
	        },
	        password :{
	        	required: "Please enter you password",
	        },
	        terms :{
	        	required: "Please check the policy",
	        }
	    },
	    errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
	

	$("#slot_booking_form").validate({
		rules: {
	        selected_slot: {
				required: true,				        
	        },
	        start_time:{
	        	required: true, 
	        },
	        end_time:{
				required: true,				
	        }
	    },
	    messages: {
	        selected_slot: {
	          required: "Please choose at least one slot",
	        },
	        start_time: {
	          required: "Please select start time",
	        },
	        end_time:{
	        	required: "Please select end time",
	        }
	    },
	    errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});

	var res;
	$.validator.addMethod('email_custom_rule', function(value,element){
        var urlss = base_url +'check-email-existance';
        $.ajax({        
            url: urlss,
            method: 'POST',
            data: {existance_type: 'uemail', useremail: value, _token: csrf_token},
            //dataType: "html",
            async: false,  
            success:function(response) {   
                if(response !== 'true'){                
                    res = false;
                } else {
                    res = true;
                }                
            }            
        }); 
        return res;    
    },'Email is already taken.'); 
	

});

///////Show toastr messages////////
$(".admin-toastr").trigger('click');
function toastr_success(msg) { 
    toastr.success(msg)
}
function toastr_danger(msg) {
    toastr.error(msg)
}
///////Show toastr messages////////


///////////////////Step Queries Goes From Here/////////////////START//////
$('body').on('change', '.other_checkbox', function(){
	if($(this).is(":checked")){
		$('.other_textare_show').fadeIn();
	} else {
		$('.other_textare_show').fadeOut();
	}
})


$('body').on('click', '.step1', function(e){
	e.preventDefault();		
	
	var count_checked = $("[name='cats[]']:checked").length;	
	//alert(count_checked);
	if(count_checked > 0){
		if($('.other_checkbox').is(':checked')){		
			if($('#other_text_id').val() != ''){

				$('.fromvalidation_error').html('');
				/////Step1 Form Submit////
				$('#step1_form').submit();

			} else {
				$('.fromvalidation_error').html('You have to type your other category');
			}
		} else {

			$('.fromvalidation_error').html('');
			/////Step1 Form Submit////
			$('#step1_form').submit();

		}
			
		
	} else {
		$('.fromvalidation_error').html('You have to choose at least one category.');
	}

});

$('body').on('click', '.step2', function(e){	
	
	e.preventDefault();
	if( $('.each_month_goal').val() == "" || $(".select_focus_cat option:selected").val() === "" || $(".archive_goal_time option:selected").val() === ""){
				
		$('.fromvalidation_error').html('Please fill all the fields');

	} else {		
		
		$('.fromvalidation_error').html('');
		/////Step2 Form Submit////
		$('#step2_form').submit();

	}

});

$('body').on('click', '.step3', function(e){	
	
	e.preventDefault();
	var errormsg = '';
	var filled_count = 0;
	var popup_msg = '';
	$('form#step3_form .step3_inputs').each(function() {
		
			if($(this).val() == ""){ 
				$(this).addClass('validationthisfield');
				errormsg = 'All fields are required';					
			} else {
				$(this).removeClass('validationthisfield');
				errormsg = '';				
				filled_count++;	
			}
			if(filled_count == 13){			
				
				//alert($('.think_of_spend_total').val()+'<='+ $('.earn_after_tax_per_month').val());
				var cusername = $('.cusername').html(); //alert(cusername);
				var cusermonthlygoal = $('.cusermonthlygoal').html();
				
				////////All Category sum should be <= Total income after tax////////
				var category_total = $('.think_of_spend_total').val();
				var earn_after_tax_per_month = $('.earn_after_tax_per_month').val();
				var income_tax = earn_after_tax_per_month.replace('R', ''); 
				var total_income_tax = income_tax.replace(' ', ''); 
				var current_goal_name = $('#current_goal_name').val(); 

				$('.step3_popup').modal('show');
				// popup_msg = 'Hey '+cusername+' your monthly goal is to pay off R'+cusermonthlygoal+' of your debt per month. In the next step let’s analyse your bank statements and check if this is achievable. ';
				popup_msg = ''+cusername+' your monthly goal is R'+cusermonthlygoal+' to '+current_goal_name+'. In the next step let’s analyse your bank statements and check if this is achievable. ';
				$('.step3_popup .step3_popup_body').html('<p>'+popup_msg+'</p>');
			} else {
				$('.fromvalidation_error').html(errormsg);
			}
		
	});	

});

$('body').on('click', '.step3_popup_submit', function(){
	//alert('test');
	$('#step3_form').submit();
})

$('body').on('click', '.step4', function(e){	
	
	e.preventDefault();	
	var filled_count = 0;
	var empty_count = 0;
	$('form#step4_form .step4_inputs').each(function() {
		
		if($(this).val() == ""){
			$(this).addClass('validationthisfield');
			empty_count++;				
		} else {
			$(this).removeClass('validationthisfield');
			$('.fromvalidation_error').html('');
			//////////Check if previous step values and current step values are equal/////////////
			if($(this).attr('class')){
				var cat_class = $(this).attr('class').replace('step4_inputs','');
				var stepclass = $.trim(cat_class);	
				//alert($(this).val() +'=>'+ $('.prev_step_spends.'+stepclass).val());				
				// if( parseInt($(this).val()) >= parseInt($('.prev_step_spends.'+stepclass).val()) ){					
				// 	filled_count++;	
				// } 
			}
		}

	});	

	if(empty_count > 0){
		$('.fromvalidation_error').html('You have to fill each category spend.');
	} else {
		$('.fromvalidation_error').html('');
		$('#step4_form').submit();
	}

});

$('body').on('click', '.next-btn.step5', function(e){

	e.preventDefault();
	$('#step5_form').submit();	

});


$('body').on('change', '.step3_cats_inputs', function(){
		// alert($(this).val());
		
		var total = 0;
		$('.step3_cats_inputs').each(function() {	
			var thisvals = $(this).val();
			var cat_val = thisvals.replace('R', ''); 
			var thisval = cat_val.replace(' ', ''); 
			
			if(thisval){
				// alert(thisval);
				// summ = parseInt(summ) + parseInt(thisval);
				total += parseInt(thisval);				
			}
		});
		//alert(total);
		$('.think_of_spend_total').val(total);
});



var arr = {};
var catwise_array = {};
var achieve_total_amt = $('.achieve_total_amt').val();
$('body').on('change', '.achieve_goal_amount', function(){
	var my_adjust_spend = ($(this).val().replace("R", "")).split(' ').join('');
	var category = $(this).attr('achieve_cat');
	var actual_spend_value = $('.step7_actual_spends.'+category).val();

	if(my_adjust_spend == '' || my_adjust_spend == null){
		$('#add_form_submit_next_button').removeClass('already_add_submit_button');
		$('#form_submit_button').remove();
	}

	// if((parseInt(my_adjust_spend) > 0) && (parseInt(my_adjust_spend) <= parseInt(actual_spend_value))){
	if((parseInt(my_adjust_spend) <= parseInt(actual_spend_value))){
		var my_saving = $('.saving_spend_amount[achieve_cat='+category+']').val('R'+(actual_spend_value - my_adjust_spend));
		var sum = 0 ; 
		$('.saving_spend_amount.step7_inputs').each(function(){
			var this_value = ($(this).val().replace("R", "")).split(' ').join('');
			if(this_value > 0){
				sum += parseInt(this_value);
			}
		});
		var total_actual_my_spend = $('.total_amt_of_goal span').html(sum);
		
		
		$('.achieve_total_amt').val(parseInt(achieve_total_amt)+sum);
				var get_goal_amt = $('.main_goal_amount').val();
				var achv_total_amtt = $('.achieve_total_amt').val();
			
				$('.value_did_not_match').remove();
				
				$('#add_form_submit_next_button').removeClass('already_add_submit_button');
				$('#form_submit_button').remove();


				if(parseInt(achv_total_amtt) >= parseInt(get_goal_amt)){
					$('#step-7-success-popup').modal('show');
					if(! $('#add_form_submit_next_button').hasClass('already_add_submit_button')){
						$('#add_form_submit_next_button').addClass('already_add_submit_button');
						$('#add_form_submit_next_button').append(`<button id="form_submit_button" class="next-btn step7">Next</button>`);
					}
				}
	}else{

		$(this).val('');
		$('.saving_spend_amount[achieve_cat='+category+']').val('');
		$('textarea[name="action_note"][achieve_cat='+category+']').val('');

		var sum = 0 ; 
		$('.saving_spend_amount.step7_inputs').each(function(){
			var this_value = ($(this).val().replace("R", "")).split(' ').join('');
			if(this_value > 0){
				sum += parseInt(this_value);
			}
		});
		var total_actual_my_spend = $('.total_amt_of_goal span').html(sum);
		$('.achieve_total_amt').val(parseInt(achieve_total_amt)+sum);
	}
});



$('body').on('click', '#form_submit_button', function(){
	$('#step_7_data_saving_popup').modal('show');
	$('.step7_inputs').each(function() {
		var achieve_cats = $(this).attr('achieve_cat');
		var cat_input = $(this).attr('name');

		if($(this).hasClass('actual_spend_amount')){
			var cat_val = $(this).text();
			console.log(cat_val);
		}else if(!$(this).hasClass('action_note')){
			var cat_val = ($(this).val().replace("R", "")).split(' ').join('');
		}else{
			var cat_val = $(this).val();
		}
		
		// if(cat_val != '' && cat_val != null)
		// {
			// console.log(cat_val);
			if(!(achieve_cats in catwise_array)){
				catwise_array[achieve_cats] = {[cat_input]: cat_val};
			}else{
				catwise_array[achieve_cats][cat_input] = cat_val;
			}
		// }
	});

	console.log(catwise_array);

	var current_focus_goal = $('.current_focus_goal').val();
	var urlss = base_url +'step7-achieve-cats-submition';

	$.ajax({        
        url: urlss,
        method: 'POST',
        data: {focuse_goal_id: current_focus_goal, cat_wise: catwise_array, _token: csrf_token},
        //dataType: "html",
        async: false,  
        success:function(response) {  
			// $('#form_submit_button').text('Next');
			$('#step_7_data_saving_popup').modal('hide');
	    	if(response.message == 'success'){
	    		window.location.href = base_url+'step8';
	    	}
        }            
    });

});


$('body').on('click', '.like_section_like_btnn', function(){
	var urlss = base_url +'step6-like';	
	window.location.href = urlss;
});


$( "#submitamount" ).click(function(event) {
	event.preventDefault();	
	var trackingamount = $('.trackingamount').val();
	var total_weekly_goal = $('.total_weekly_goal').val()

	if($('.trackingamount').val() != ""){

		trackingamount = trackingamount.replace(/\s/g, '');
		trackingamount = $.trim(trackingamount.replace('R',''));
		//alert(trackingamount+'=>'+total_weekly_goal);

		if(parseInt(trackingamount) >= parseInt(total_weekly_goal)){

			//alert('thumbs-up');

			$('.Weekly_Check_Ineer').hide();
			$('.Weekly_Check_Ineer .goal_track_thumbs_text').html('');
			$('.Weekly_Check_Ineer .Weekly_Check_Ineer_week .unlike_weekwise_track').hide();

			///Thumbs-up and submit the form
			//alert('Thumbs-Up');
			// $('.Weekly_Check_Ineer').show();
			// $('.Weekly_Check_Ineer .goal_track_thumbs_text').html('Well done you are on track for the week');
			// $('.Weekly_Check_Ineer .Weekly_Check_Ineer_week .like_weekwise_track').show();

			$( "#tracking_goalamount" ).submit();

		} else {

			//alert('thumbs-down');

			$('.Weekly_Check_Ineer').hide();
			$('.Weekly_Check_Ineer .goal_track_thumbs_text').html('');
			$('.Weekly_Check_Ineer .Weekly_Check_Ineer_week .like_weekwise_track').hide();

			$( "#tracking_goalamount" ).submit();
		}		
		

	} else {
		$('.trackingamount_error').html('Please enter Tracking amount.');
	}
	
});
$('#submit_unlikenote').click(function(event) {
	event.preventDefault();	
	if($('.unlike_note').val() != ""){
		$( "#unlike_note_form" ).submit();
	} else {
		$('.unlikenote_error').html('Please put your note');
	}
});



////////////////Track for the month?///////////////////
$('body').on('click', '.Weekly_Check_Ineer_month .like_monthwise_track', function(){ 
	
	if($('.unlike_month_track').hasClass('show_unlike_month_track')){
		$('.unlike_month_track').toggleClass('show_unlike_month_track');
		$('.unlike_month_track_textare').toggleClass('show_unlike_month_track_textare');
	} else{
		$('.unlike_month_track_textare').toggleClass('show_unlike_month_track_textare');
	}

});

$('body').on('click', '.Weekly_Check_Ineer_month .unlike_monthwise_track', function(){ 

	
	if($('.unlike_month_track_textare').hasClass('show_unlike_month_track_textare')){
		$('.unlike_month_track_textare').toggleClass('show_unlike_month_track_textare');
		$('.unlike_month_track').toggleClass('show_unlike_month_track');
	} else {
		$('.unlike_month_track').toggleClass('show_unlike_month_track');
	}
});


////////////////Track for the month?///////////////////


////////////////////Step Queries Goes From Here/////////////////END//////

$('body').on('click', '.userdetails_editbutton', function(e){
	e.preventDefault();
	$('.update_user_profile').find('.userdetails_fields').removeAttr('disabled');
	$('.update_user_profile').find('.userdetails_fields').removeClass('uneditable').addClass('formfieldss');
	$(this).html('Submit');
	$(this).removeClass('userdetails_editbutton').addClass('userdetails_submitbutton');
});

$('body').on('click', '.userdetails_submitbutton', function(){
	var firstname = $('.firstname').val();
	var lastname = $('.lastname').val();
	var useremail = $('.email').val();
	var phone = $('.phone').val();
	var country = $('.country').val();
	
	//alert(firstname+"=>"+lastname+"=>"+useremail+"=>"+phone+"=>"+country);

	if(firstname == '' || lastname == '' || useremail == '' || phone == '' || country == ''){
		$('.pro_details_error').html('All Fields Are Required');
	} else {
		$('.pro_details_error').html('');
		$('#update_user_profile').submit();
	}
});


/////////////////////////////////////Slot Booking Form///////////////////////////////////
$('body').on('change', '.user_choose_slote_date', function(){
	var slot_id = $(this).val(); 
	var urlss = base_url +'fetch-slot-timming';
	$.ajax({        
        url: urlss,
        method: 'POST',
        data: {slot_id: slot_id, _token: csrf_token},
        type: "JSON",
        //dataType: "html",
        async: false,  
        success:function(response) {  
    			//console.log(response);     
    			var obj = JSON.parse(response);
    			s_time = tConvert(obj.start_time); 
    			e_time = tConvert(obj.end_time); 
    			$('#start_time').val(s_time).prop("readonly",true);; 
    			$('#end_time').val(e_time).prop("readonly",true);;
        }            
    });
});
function tConvert (time) {
  // Check correct time format and split into components
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join (''); // return adjusted time or original string
}


/*********************************Curreny Space**********************************/
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },    
});

function formatNumber(n) { 
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, " ")
}
function formatCurrency(input, blur) {  
  // get input value
  var input_val = input.val();  
  // don't validate empty input
  if (input_val === "") { return; }  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {
   

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "R" + input_val;
    
    // final formatting
    
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

/*********************************Curreny Space**********************************/


$('body').on('focus', '.my_actual_weekly_spend', function(){
	$(this).addClass('step9_focus_input');
});

$('body').on('focusout', '.my_actual_weekly_spend', function(){
	$(this).removeClass('step9_focus_input');
});

$('body').on('change', '.my_actual_weekly_spend', function(){
	$(this).removeClass('validationthisfield');
	$('.actual_weekly_saving').removeClass('validationthisfield');
	var saving_towards_goal = $('#saving_towards_goal').val();
	var this_value = ($(this).val().replace("R", "")).split(' ').join('');
	var this_category = $(this).attr('achieve_cat');

	if(this_value != ''){
		var my_budgeted_weekly_spend = ($('.my_budgeted_weekly_spend[achieve_cat='+this_category+']').val().replace('R','')).split(' ').join('');
		var planned_weekly_saving = ($('.planned_weekly_saving[achieve_cat='+this_category+']').val().replace('R', '')).split(' ').join('');
		var remaining_amount = (parseFloat(my_budgeted_weekly_spend) - parseFloat(this_value));
		var actual_weekly_saving = (parseFloat(remaining_amount) + parseFloat(planned_weekly_saving));

		$('.actual_weekly_saving[achieve_cat='+this_category+']').removeClass('step9_gap_green step9_gap_red step9_gap_grey');


		if(parseFloat(actual_weekly_saving) > parseFloat(planned_weekly_saving)){
			$('.actual_weekly_saving[achieve_cat='+this_category+']').addClass('step9_gap_green');
		}else if (parseFloat(actual_weekly_saving) < parseFloat(planned_weekly_saving)){
			$('.actual_weekly_saving[achieve_cat='+this_category+']').addClass('step9_gap_red');
		}else if(parseFloat(actual_weekly_saving) == parseFloat(planned_weekly_saving)){
			$('.actual_weekly_saving[achieve_cat='+this_category+']').addClass('step9_gap_grey');
		}
		// var set_actual_weekly_saving = $('.actual_weekly_saving[achieve_cat='+this_category+']').val('R '+ Math.abs(actual_weekly_saving));
		var set_actual_weekly_saving = $('.actual_weekly_saving[achieve_cat='+this_category+']').val('R '+ actual_weekly_saving);
		$('.actual_weekly_saving_hidden[achieve_cat='+this_category+']').val(actual_weekly_saving);

	}else{
		$('.actual_weekly_saving[achieve_cat='+this_category+']').val('');
		$('.actual_weekly_saving[achieve_cat='+this_category+']').removeClass('step9_gap_green step9_gap_red step9_gap_grey');
		$('.actual_weekly_saving_hidden[achieve_cat='+this_category+']').val('');
	}

	var sum_of_actual = 0;
	$('.actual_weekly_saving_hidden').each(function(){
		var this_value = $(this).val();
		if(this_value != ''){
			sum_of_actual += parseFloat(this_value);
		}
	});

	var saving_towards_extra_expenditure = $('#saving_towards_extra_expenditure').val();
	//saving towards goal


		if(saving_towards_extra_expenditure > sum_of_actual){
			$('#saving_towards_goal').html('R 0');
			$('#saving_towards_goal_input').val(0);
			$('#weekly_actual_saving_towards_extra_expenditure').html('');

			if(sum_of_actual > 0 ){
				var amount = sum_of_actual;
			}else{
				var amount = 0;
			}
			
			$('#weekly_actual_saving_towards_extra_expenditure').html('R ' + amount);
		}else{
			var saving_towards_goal = (parseFloat(sum_of_actual) - parseFloat(saving_towards_extra_expenditure));
			$('#saving_towards_goal').html('');
			$('#saving_towards_goal_input').val(saving_towards_goal);
			$('#saving_towards_goal').html('R ' + saving_towards_goal);
			$('#weekly_actual_saving_towards_extra_expenditure').html('');

			if(saving_towards_extra_expenditure > 0 ){
				var amount = saving_towards_extra_expenditure;
			}else{
				var amount = 0;
			}

			$('#weekly_actual_saving_towards_extra_expenditure').html('R ' + amount);
		}
	//saving towards goal 

	$('#actual_weekly_saving_input').val(sum_of_actual);
	$('#actual_weekly_savings_total').html('');
	if(sum_of_actual < 0){

		// $('#actual_weekly_savings_total').html('-R '+ (Math.abs(sum_of_actual)));
		$('#actual_weekly_savings_total').html('R '+ 0);
	}else{
		$('#actual_weekly_savings_total').html('R '+ (sum_of_actual));
	}
	
});

// if click enter on input field required message not show
$('.step9_inputs_required').keypress(function(e){
    if ( e.which == 13 ) return false;
    if ( e.which == 13 ) e.preventDefault();
});
// end if click enter on input field required message not show




$('body').on('click', '.step9', function(e){	
	e.preventDefault();	
	var empty_count = 0;
	$('.step9_inputs_required').each(function(){
		var this_value = $(this).val().replace("R","");
		if(this_value == ""){
				$(this).addClass('validationthisfield');
				empty_count++;	
		} else {
			$(this).removeClass('validationthisfield');
			$('.fromvalidation_error').html('');			
		}
	});
	
	if(empty_count > 0){
		$('.fromvalidation_error').html('You have to fill each category.');	
	} else {
		$("#step9formsubmitt").submit();
	}
});


//step 2 during adjust goal amount start
 $('body').on('focusout', '#adjust_goal_step2', function(e){  
    e.preventDefault();   
        var this_val = ($(this).val().replace("R","")).split(' ').join('');
        var monthly_income = $('#monthly_income_step2').val();
        var monthly_spend = $('#monthly_spen_step2').val();
        var goal_plus_spend = parseInt(this_val) + parseInt(monthly_spend);
        if(goal_plus_spend <= monthly_income){
        	$('#adjust_goal_step2').addClass('highlight_goal_amount');
            $('.step2_popup').modal({backdrop: 'static', keyboard: false});
            $('.step2_popup').modal('show');
            // $('#step2_form').bind('submit',function(e){e.preventDefault();});
            $('#step2_form').on('submit',function(e){e.preventDefault();});
        }else{
              // $('#step2_form').unbind('submit');
        	  $('#adjust_goal_step2').removeClass('highlight_goal_amount');
              $('#step2_form').off('submit');
        }
    });

$('body').on('click', '.highlight_amount', function(){  
       $('#adjust_goal_step2').removeClass('highlight_goal_amount');
       $('#adjust_goal_step2').val($('#goal_amount_step2').val());
        // $('#step2_form').unbind('submit');
       $('#step2_form').off('submit');

 });
//step 2 during adjust goal amount end 



//step 2 during increase goal amount start
 $('body').on('focusout', '#increase_goal_step2', function(e){  
    e.preventDefault();   
        var this_val = ($(this).val().replace("R","")).split(' ').join('');
        var monthly_income = $('#monthly_income_step2').val();
        var monthly_spend = $('#monthly_spen_step2').val();
        var goal_plus_spend = parseInt(this_val) + parseInt(monthly_spend);
        if(goal_plus_spend <= monthly_income){
        	$('#increase_goal_step2').addClass('highlight_goal_amount_during_increase');
            $('.step2_popup').modal({backdrop: 'static', keyboard: false});
            $('.step2_popup').modal('show');
            // $('#step2_form').bind('submit',function(e){e.preventDefault();});
            $('#step2_form').on('submit',function(e){e.preventDefault();});
        }else{
              // $('#step2_form').unbind('submit');
        	  $('#increase_goal_step2').removeClass('highlight_goal_amount_during_increase');
              $('#step2_form').off('submit');
        }
    });

$('body').on('click', '.highlight_amount_focus', function(){  
       var num = $('#increase_goal_step2').val();        
        $('#increase_goal_step2').focus().val('').val(num);
 });


//step 2 during increase goal amount end 






$(".all_step_popup_alert").trigger('click');
function toastr_success(msg) { 
	 $('.all_step_popup').modal('show');
}
function toastr_danger(msg) {
	$('.all_step_popup').modal('show');
}
/////Show toastr messages////////


$('#increase_month_ajax').on('click', function(){
	var focuse_goal_id = $('#current_focus_goal_id').val();
	$.ajax({
		url: base_url+'increase-month',
		type:"POST",
		data:{_token:csrf_token, focuse_goal_id:focuse_goal_id},
		success:function(data){
			if(data.message == 'success'){
				location.reload();
			}
		}
	});
});

$(".decline").on('click', function(){
	var texts = $(this).parent().parent().parent().parent().parent().hide();
});