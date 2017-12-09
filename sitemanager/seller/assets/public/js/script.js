jQuery('document').ready(function(){



	jQuery('.create-new-vandor').on('click',function(){

		var btn = jQuery(this);


		var form = jQuery('#user-register');

		var form_data = form.serialize();

		

		console.log(form_data);

		jQuery.ajax({

			type : 'POST',
			url  : ajax_url+'login/create_vandor',
			data : form_data,
			beforeSend : function() {
				btn.val('Please Wait...');
				jQuery('.error').hide();
			},
			success : function(html) {

				jQuery('.error').show();

				console.log(html);

				btn.val('Create Account');

				var data = jQuery.parseJSON(html);

				if (data.status=='false') {

					jQuery('.name-error').html(data.name);	
					jQuery('.email-error').html(data.email);	
					jQuery('.phone-error').html(data.phone);	
					jQuery('.password-error').html(data.password);	
					jQuery('.retype-error').html(data.retype);	
					jQuery('.state-error').html(data.state);	
					jQuery('.city-error').html(data.city);	
					jQuery('.zipcode-error').html(data.zipcode);	
					jQuery('.address-error').html(data.address);	

				} else {

					window.location = ajax_url+'admin';
				}

			}
		});
		return false;


	});

	
	jQuery('.error').hide();

	jQuery('.vandor-login').on('click',function(){

		var email = jQuery('#user-email').val();
		var password = jQuery('#user-password').val();

		var btn = jQuery(this);

		jQuery.ajax({

			url : ajax_url+'login/vandor_login',
			type: 'POST',
			data : {email:email,password:password},
			beforeSend : function() {

				btn.val('wait..');
				jQuery('.error').html('');
				jQuery('.error').hide();
			},
			success : function(html) {	

				console.log(html);

				btn.val('Login');
				jQuery('.error').show();
				var data = jQuery.parseJSON(html);

				if (data.status=='success') {

					window.location = ajax_url+'admin';

				} else {


					jQuery('.error').html(data.error);

				}
			}

		});


		return false;
	});



	jQuery('.create-account input#createaccount').on('click',function(){

		var box  = jQuery(this);
		
		if (box.is(':checked')) {

			jQuery('.checkout-password-div').slideDown();

		} else {

			jQuery('.checkout-password-div').slideUp();
			
		}
	});

	jQuery('.save-personal-info').on('click',function(){

		var fname  = jQuery('.acc-fname').val();
		var lname  = jQuery('.acc-lname').val();
		
		var gender = jQuery('.acc-gender').val();
		var phone  = jQuery('.acc-phone').val();
		var btn = jQuery(this);

		jQuery.ajax({

			type :'POST',
			url : ajax_url+'shop/save_personal_info',
			data : {fname:fname,lname:lname,gender:gender,phone:phone},
			beforeSend : function() {
				btn.html('Please Wait...');
				jQuery('.error').hide();
			},
			success : function(html) {

				var data = jQuery.parseJSON(html);
				console.log(html);
				btn.html('save changes');

				if (data.status=='success') {

					jQuery('.error').hide();
					jQuery('.success-msg').show();


				} else {

					jQuery('.fname-error').html(data.fname);
					jQuery('.lname-error').html(data.lname);
					jQuery('.email-error').html(data.email);
					jQuery('.phone-error').html(data.phone);
					jQuery('.gender-error').html(data.gender);
					jQuery('.error').show();
					
				}

			}

		});
		return false;


	});


	jQuery(document).on('change', 'form#attach-thumbnail #file-attach', function (e) {

		var progressBar = jQuery('.progressBar'), bar = jQuery('.progressBar .bar'), percent = jQuery('.progressBar .percent');


		jQuery('form#attach-thumbnail').ajaxForm({
		    beforeSend: function() {
		        progressBar.fadeIn();
		        var percentVal = '0%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },
		    uploadProgress: function(event, position, total, percentComplete) {
		        var percentVal = percentComplete + '%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },

		    success: function(html, statusText, xhr, $form) {   
		
			console.log(html);
		    obj = jQuery.parseJSON(html);  
		    if(obj.status){   
		      var percentVal = '100%';
		      bar.width(percentVal)
		      percent.html(percentVal);
		      // jQuery('#product_image').fadeOut();
		      jQuery('.progressBar').fadeOut();
		      jQuery('#file-attach-hidden').val(obj.name);
		      // jQuery(".uploaded_image").prop('src',ajax_url+'uploads/'+obj.name);     
		    
		    }else{
		    	// toastr['error'](obj.error,'Error');
		      jQuery('.attach-error').html(obj.error);
		    }
		    },
		  complete: function(xhr) {
		    progressBar.fadeOut();      
		  } 
		}).submit();    

	});


	jQuery('.woocommerce-checkout-payment .overlay-div').hide();
	jQuery('.checkout-payment-method li').on('click',function(){

		
		var method = jQuery(this).find('input').val();

		if (method=='wallet') {

			jQuery.ajax({
			url : ajax_url+'checkout/check_wallet',
			type : 'POST',
			data : {},
			beforeSend : function() {
				jQuery('.woocommerce-checkout-payment .overlay-div').show();
			},
			success : function(html) {
				
				// jQuery('.woocommerce-checkout-payment .overlay-div').hide();
				
				if (html!='success') {
				
					jQuery('.woocommerce-checkout-payment .wallet-error').html('You dont have enough balance !');
					jQuery('#place_order').attr('disabled','disabled');

				} 

			}


		});

		} else {

			jQuery('.woocommerce-checkout-payment .wallet-error').html('');
			jQuery('#place_order').removeAttr('disabled');
		}
		
	});

});






function load_twenty_products(cat_id,url) {

	jQuery.ajax({

		url : url,
		type : 'POST',
		data : {'get_products'  : 'products' , cat_id:cat_id},
		
		success : function(html) {


				if(html>0){

					if(html<=20){

						for (var i = 1; i <= html; i++) {
						
							load_products(cat_id,ajax_url+'shop/get_cat_products','#tab-products-'+cat_id,i,'one');
		

						}
					} else {

							for (var i = 1; i <= 20; i++) {
								
								load_products(cat_id,ajax_url+'shop/get_cat_products','#tab-products-'+cat_id,i,'one');
				

							}
						
					}

				} else {

					console.log('.ajax-content #tab-products-'+cat_id+'.products');

					jQuery('.ajax-content .tab-pane').removeClass('active');
					jQuery('.ajax-content #tab-products-'+cat_id).addClass('active');
					jQuery('.ajax-content #tab-products-'+cat_id).html('<p class="text-center">No Products in this category</p>');

				

				}

		}



	});

}

