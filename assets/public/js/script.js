jQuery('document').ready(function(){


	jQuery('body, .products').on('click','.addToCart',function(){

		var product_id   = parseInt(jQuery(this).attr('data-productId'));	
		var product_qty  = parseInt(jQuery(this).attr('data-productQty'));
		var type 		 = jQuery(this).attr('data-type');
		var cart_btn     = jQuery(this);
			
		

		jQuery.ajax({

			url : ajax_url+'shop/add_to_cart',
			
			type : 'POST',
			
			data: {'add_to_cart':'cart',product_id:product_id,product_qty:product_qty},
			
			beforeSend : function(){

				if (type=='normal') {

					cart_btn.html("wait...");
				}else {
					
					cart_btn.html("<img class='ajax-loader' src='"+ajax_url+"assets/img/spinner.gif'>");
				}	 
				
			},
		error : function(jqXHR,exception) {
				console.log(jqXHR.responseText);
				var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        alert(msg);
			},
			success : function(html) {

				console.log(html);

				if (type=='normal') {

					cart_btn.html("Add to cart");
				}
				jQuery('.ajax-loader').hide();
				
				if (html=='success') {

				
					//update the mini cart
					update_mini_cart(ajax_url+'shop/update_cart');

				} else {

					alert('Error occured !, try later');
					// show error

				}

			}

		});	


		return false;

	});


	jQuery('.mini-cart-wrap,.cart').on('click','.removeProduct',function(){

		var hash = jQuery(this).attr('data-productHash');
		// var thumb = jQuery(this).attr('data-productThumb');
		var product_id = jQuery(this).attr('data-productId');
		// var product_name = jQuery(this).attr('data-productName');

		var rm_btn = jQuery(this); 

		// alert(hash+" "+product_id);
		jQuery.ajax({

			url : ajax_url+'shop/remove_product',
			
			type : 'POST',
			
			data: {'remove_product':'cart',product_hash:hash},
			
			beforeSend : function(){

				rm_btn.after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

			},
			success : function(html) {

				jQuery('.ajax-loader').hide();

				console.log(html);

				var data = jQuery.parseJSON(html);

				if (data.status=='success') {

					// show grawl notification
					// addProductNotice('Product removed from cart','<img src="'+thumb+'">', '<h3><a href="'+ajax_url+'product/'+product_id+'">'+product_name+'"</a> removed from shopping cart !</h3>', 'success');
					
					jQuery('.row_'+hash).fadeOut();
					jQuery('.cart-price').html(data.total_price);

					update_mini_cart(ajax_url+'shop/update_cart');
					//update the mini cart

				} else {

					alert('Error occured !, try later');
					// show error

				}

			}

		});

		return false;	

	});





	var cat_id = jQuery('ul.home-ajax-cat li a.active').attr('data-category-id');
	var cat_id_two = jQuery('ul.ajax-product-section-2 li a.active').attr('data-category-id');
	// var cat_id_two = jQuery('.ltabs-tabs.product-cat-two li.ltabs-tab.tab-sel').attr('data-category-id');

// console.log(cat_id_two);
	
		load_twenty_products(cat_id,ajax_url+'shop/get_product_count');

	
	// load_products(cat_id_two,ajax_url+'shop/get_cat_products','.product-two');

	jQuery('.home-ajax-cat li a').on('click',function(){

		 jQuery('.home-ajax-cat li,.home-ajax-cat li a').removeClass('active');
		 jQuery(this).addClass('active');
		 var cat_id = jQuery(this).attr('data-category-id');

		// alert(cat_id);
		load_twenty_products(cat_id,ajax_url+'shop/get_product_count');
		
	});

	load_products(cat_id_two,ajax_url+'shop/get_cat_products_two','.product-section-2 ul.products',0,'two');

	jQuery('ul.ajax-product-section-2 li a').on('click',function(){

		var cat_id_two = jQuery(this).attr('data-category-id');
		jQuery('ul.ajax-product-section-2 li a, ul.ajax-product-section-2 li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery(this).parent().addClass('active');
		load_products(cat_id_two,ajax_url+'shop/get_cat_products_two','.product-section-2 ul.products',0,'two');

	});



	jQuery('.cart').on('click','.updateCart',function(){

		var hash         = jQuery(this).attr('data-productHash');
		var thumb        = jQuery(this).attr('data-productThumb');
		var product_id   = jQuery(this).attr('data-productId');
		var product_name = jQuery(this).attr('data-productName');
		var qty          = jQuery('input#'+hash).val();

		

		var btn = jQuery(this); 

		jQuery.ajax({

			url : ajax_url+'cart/update_product',
			
			type : 'POST',
			
			data: {'update_product':'cart',product_hash:hash,qty:qty},
			
			beforeSend : function(){

				btn.before("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");

				if (qty==0) {
					jQuery('.row_'+hash).fadeOut();
				}
			},
			success : function(html) {

				jQuery('.ajax-loader').hide();
				// console.log(html);
				var data = jQuery.parseJSON(html);
				if (data.status=='success') {

					// show grawl notification
					addProductNotice('Product updated in you cart','<img src="'+thumb+'">', '<h3><a href="'+ajax_url+'product/'+product_id+'">'+product_name+'"</a> updated in your shopping cart !</h3>', 'success');
					
					
					update_mini_cart(ajax_url+'shop/update_cart');
					//update the mini cart

					jQuery('.cart-price').html('Rs.'+data.result);
					jQuery('#price_'+hash).html('Rs.'+data.item_subtotal);

				} else {

					alert('Error occured !, try later');
					// show error

				}

			}

		});
		return false;	

	});



	jQuery('.search-product').on('keyup',function(){

		var input = jQuery(this);
		var product = input.val();
		var cat_id = jQuery('.search-category option:selected').val();

		jQuery.ajax({

			type: 'POST',
			url : ajax_url+"shop/search",
			data : {'search':'search',product:product,cat_id:cat_id},
			beforeSend : function() {

				input.css({
					background : "#FFF url('"+ajax_url+"assets/img/ajax-loader.gif') no-repeat  ",
					backgroundPosition : "right"

				});

			},

			success  : function(html){

				console.log(html);
				input.css("background","#FFF");

				if (html=='' || product=='') {

					jQuery('.navbar-search ul#result').hide();

				} else {

					jQuery('.navbar-search ul#result').html(html);
					jQuery('.navbar-search ul#result').show();

				}

			}



		});

	});


	jQuery('#result ').on('click','li',function(){

		var product = jQuery(this).html();
		selectProduct(product);
	
	});



	jQuery('.create-new-account').on('click',function(){

		var btn = jQuery(this);


		var form = jQuery('#user-register');

		var form_data = form.serialize();

		

		console.log(form_data);

		jQuery.ajax({

			type : 'POST',
			url  : ajax_url+'login/create_user',
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

					window.location = ajax_url+'shop';
				}

			}
		});
		return false;


	});

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

					window.location = ajax_url+'shop';
				}

			}
		});
		return false;


	});

	
	jQuery('.error').hide();

	jQuery('.user-login').on('click',function(){

		var email = jQuery('#user-email').val();
		var password = jQuery('#user-password').val();

		var btn = jQuery(this);

		jQuery.ajax({

			url : ajax_url+'login/login',
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

					window.location = ajax_url+'shop';

				} else {


					jQuery('.error').html(data.error);

				}
			}

		});


		return false;
	});

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

					window.location = ajax_url+'shop';

				} else {


					jQuery('.error').html(data.error);

				}
			}

		});


		return false;
	});



	jQuery('#wallet-money-amount,#phone-number').on('blur',function(){

		var field = jQuery('input[name="amount"]');
		var amount       = field.val();
		var merchant_key = jQuery('input[name="key"]').val();
		var txnid        = jQuery('input[name="txnid"]').val();
		var username     = jQuery('input[name="firstname"]').val();
		var phone        = jQuery('input[name="phone"]').val();
		var email        = jQuery('input[name="email"]').val();
		var udf          = jQuery('input[name="udf1"]').val();

		var check = true;

		if (amount=='') {

			jQuery('.add-money-error').html('please enter the anount !');
			jQuery('.add-money-error').fadeIn();

			check=false;
			return false;
		}

		if (phone=='') {

			jQuery('.add-money-error').html('please enter the your phone number !');
			jQuery('.add-money-error').fadeIn();
			check=false;
			return false;
		}

		if (check) {


			jQuery.ajax({

				type : 'POST',
				url : ajax_url+'shop/generate_hash',
				data : {merchant_key:merchant_key,price:amount,txnid:txnid,username:username,phone: phone,email:email,udf:udf},
				beforeSend :function() {

					field.after("<img class='ajax-loader' src='"+ajax_url+"assets/img/ajax-loader.gif'>");
				},
				success : function(html) {

					jQuery('.ajax-loader').hide();
					jQuery('.add-to-wallet').removeAttr('disabled');
					jQuery('input[name="hash"]').val(html);

				}


			});

		}

	});


	jQuery('.load-more-products').on('click',function(){

		var load_btn = jQuery(this);
		var s        = load_btn.attr('data-s');
		var category = load_btn.attr('data-category');
		var page     = parseInt(load_btn.attr('data-page'));
		var limit    = parseInt(load_btn.attr('data-limit'));
		var offset   = parseInt(load_btn.attr('data-offset'));


		var newPage = page+1;


		jQuery.ajax({

			type: 'POST',
			url  : ajax_url+'shop/load_more',
			data:{s:s,category:category,offset:offset},
			beforeSend: function(){

				load_btn.hide();
				jQuery('.fidget-loader').show();
			} ,

			success : function(html) {

				offset = offset+limit;
				//console.log(html);
				if (html!='') {

					load_btn.show();
					jQuery('.fidget-loader').hide();
					load_btn.attr('data-offset',offset);
					load_btn.attr('data-page',newPage);
					jQuery('.products.columns-3').append(html);

				} else {

					load_btn.hide();
					jQuery('.load_more_div').html('No more products to load !')
				jQuery('.fidget-loader').hide();
				}
			}

		});

		return false;

	});


	jQuery('.do_recharge').on('click',function(){

		alert("please login to proceed !");

		return false;


	});



	jQuery('.proceed-recharge').on('click',function(){

		var num           = jQuery('.phone_number').val();
		var operator      = jQuery('select[name="operators"]').val();
		var circle        = jQuery('select.circles').val();
		var amount        = jQuery('.recharge-amount').val();
		var recharge_type = jQuery('.recharge_type:checked').val();
		var btn           = jQuery(this);
		var request_id    = btn.attr('data-reqId');
		jQuery('.recharge-error').html('');



		if (num=='') {

			jQuery('.recharge-error').html('Please enter your number');
			return false;
		}

		if (operator=='') {

			jQuery('.recharge-error').html('Please select your operator');
		return false;
		}
		if (amount=='') {

			jQuery('.recharge-error').html('Please enter the recharge amount ');
		return false;
		}
		if (recharge_type=='') {

			jQuery('.recharge-error').html('Please select prepaid or postpaid');
		return false;
		}

		jQuery.ajax({
			
			type : 'POST',
			url: ajax_url+'shop/recharge',
			data: {num : num,operator:operator,circle:circle,amount:amount,recharge_type:recharge_type,request_id :request_id},
			
			beforeSend : function() {

				btn.html('Please wait...');
				
			},
			success : function(html) {
				btn.html('Proceed to pay');
				console.log(html);

				var data = jQuery.parseJSON(html);
				if (data.status=='false') {

					if (data.error.length!=0) {

						jQuery('.recharge-error').html(data.error);
					}else {

						if(data.amount.length!=0) {
							// alert(data.amount);
							jQuery('.recharge-error').html(data.amount);
						}
						if (data.circle.length!=0) {

							jQuery('.recharge-error').html(data.circle);
						} 
						if (data.num.length!=0) {
							
							jQuery('.recharge-error').html(data.num);
						}
						if (data.operator.length!=0) {

							jQuery('.recharge-error').html(data.operator);
						} 
						if (data.recharge_type.length!=0) {
							jQuery('.recharge-error').html(data.recharge_type);
						}
					}
						

					console.log(data);

					return false;
				} else {

					jQuery('.recharge-success').html('success !');
					return false;
				}
			}

		});

		return false;
	});

	jQuery('.proceed-landline').on('click',function(){

		var num           = jQuery('.phone_number').val();
		var operator      = jQuery('#landline-recharge').val();
		var customer_number = jQuery('.landline-customer-number').val();
		var amount        = jQuery('.landline-amount').val();
		
		var btn           = jQuery(this);
		var request_id    = btn.attr('data-reqId');
		jQuery('.recharge-error').html('');



		if (num=='') {

			jQuery('.recharge-error').html('Please enter your number');
			return false;
		}

		if (operator=='') {

			jQuery('.recharge-error').html('Please select your operator');
		return false;
		}
		if (amount=='') {

			jQuery('.recharge-error').html('Please enter the recharge amount ');
		return false;
		}
		if (customer_number=='') {

			jQuery('.recharge-error').html('Please enter customer number');
		return false;
		}

		jQuery.ajax({
			
			type : 'POST',
			url: ajax_url+'shop/landline_recharge',
			data: {num : num,operator:operator,amount:amount,request_id :request_id},
			
			beforeSend : function() {

				btn.html('Please wait...');
				
			},
			success : function(html) {
				btn.html('Proceed to pay');
				console.log(html);

				var data = jQuery.parseJSON(html);
				if (data.status=='false') {

					jQuery('.recharge-error').html(data.error);
					return false;
				} else {

					jQuery('.recharge-success').html('success !');
					return false;
				}
			}

		});

		return false;
	});


	jQuery('.cart_item .product-quantity').on('click', '.plus',function(e) {
	  
	    var val = parseInt(jQuery(this).prev('input').val());
	    var hash         = jQuery(this).attr('data-productHash');
		var product_id   = jQuery(this).attr('data-productId');

	    jQuery(this).prev('input').val(val+1 );
	    update_cart(hash,val+1);
	});

	jQuery('.cart_item .product-quantity').on('click','.minus', function(e) {
	     var val = parseInt(jQuery(this).closest('.quantity').find('input.qty').val());
	     var hash         = jQuery(this).attr('data-productHash');
		 var product_id   = jQuery(this).attr('data-productId');
		 // alert(val);
	    if (val !== 0) {
	        jQuery(this).closest('.quantity').find('input.qty').val( val-1 );
	         update_cart(hash,val-1);
	    } else {

	    	jQuery('.cart tr.row_'+hash).hide();
	    	
	    }
	});



	jQuery('#place_order').on('click',function(){

		var btn = jQuery(this);
		
		var fname          = jQuery('input[name="fname"]').val();         
		var lname          = jQuery('input[name="lname"]').val();         
		var email          = jQuery('input[name="email"]').val();         
		var address        = jQuery('input[name="address"]').val();       
		var address2       = jQuery('input[name="address2"]').val();      
		var city           = jQuery('input[name="city"]').val();          
		var country        = jQuery('input[name="country"]').val();    
		var state        = jQuery('input[name="state"]').val();    

		var pincode        = jQuery('input[name="pincode"]').val();       
		var phone          = jQuery('input[name="phone"]').val();         
		var order_note     = jQuery('textarea[name="order_note"]').val();    
		var payment_method = jQuery('input[name="payment_method"]').val();

		var create_acc_checkout = jQuery('.create-account input#createaccount');


		if (create_acc_checkout.is(":checked")) {

			// create account

			// alert('ahgdjahs');
			
			var password = jQuery('.checkout-password-div input#checkout-pass').val();
			var retype   = jQuery('.checkout-password-div input#checkout-retypepass').val();

			if (password!=retype) {

				jQuery('.retype-error').html("password did not matched");
				jQuery('.retype-error').show();
				return false;
			}
			var jQuerydata = {
				'type' : 'create_account',
				state:state,
				fname:fname,
				lname:lname,
				email:email,
				address:address,
				address2:address2,
				city:city,
				country:country,
				pincode:pincode,
				phone:phone,
				order_note:order_note,
				payment_method:payment_method,
				password:password,
			};

			checkout(jQuerydata,btn);




		} else {

			// normal purchase

			var jQuerydata = {
				'type' : 'normal',
				state:state,
				fname:fname,
				lname:lname,
				email:email,
				address:address,
				address2:address2,
				city:city,
				country:country,
				pincode:pincode,
				phone:phone,
				order_note:order_note,
				payment_method:payment_method
			};

		checkout(jQuerydata,btn);


		
		
		}

		

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

		    success: function(html, statusText, xhr, jQueryform) {   
		
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
				
				jQuery('.woocommerce-checkout-payment .overlay-div').hide();
				
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

	jQuery('body').on('click','.add_to_wishlist',function(){


		var productId = jQuery(this).attr('data-productId');
		var btn = jQuery(this);
// alert('clicked');
		jQuery.ajax({

			type : 'POST',
			url  : ajax_url+"shop/add_to_wishlist",
			data : {product_id:productId},
			beforeSend : function() {
				btn.after('<img class="ajax-loader" src="'+ajax_url+'assets/img/ajax-loader.gif">');
			},
			success: function(html) {

console.log(html);
				jQuery('.ajax-loader').hide();
				
				if (html!=='success') {

					alert('Error occured !');
				}

			}	

		});

	});

	jQuery('#landline-recharge').on('change',function(){

		var type  = jQuery(this).val();

		if (type=='MTNL') {

			jQuery('.mtnl-div').slideDown();
			jQuery('.airtel-div').slideUp();
			jQuery('.bsnl-div').slideUp();

		} else if(type=='Airtel') {

			jQuery('.mtnl-div').slideUp();
			jQuery('.airtel-div').slideDown();
			jQuery('.bsnl-div').slideUp();


		} else if(type=='BSNL') {

			jQuery('.mtnl-div').slideUp();
			jQuery('.airtel-div').slideUp();
			jQuery('.bsnl-div').slideDown();


		}

	});


	jQuery('.rechrarge-option li label').on('click',function(){

		var option = jQuery(this).find('input').val();

		console.log(option);

		if (option=='landline') {

			jQuery('.recharge-numbers').slideUp();
			jQuery('.electricity-wrapper-div').slideUp()
			jQuery('.landline-wrapper-div').slideDown();
			jQuery('.dth-wrapper-div').slideUp();
			jQuery('.gas-wrapper-div').slideUp();
 jQuery('.insurance-wrapper-div').slideUp();
	 jQuery('.data-card-wrapper-div').slideUp();
	  jQuery('.broadband-wrapper-div').slideUp();
		} else if(option=='dth') {

			// jQuery('.recharge-numbers').slideUp()
			// jQuery('.landline-wrapper-div').slideDown()
			jQuery('.recharge-numbers').slideUp();
			jQuery('.electricity-wrapper-div').slideUp()
			jQuery('.landline-wrapper-div').slideUp();
			jQuery('.gas-wrapper-div').slideUp();
			jQuery('.dth-wrapper-div').slideDown();
 jQuery('.insurance-wrapper-div').slideUp();
	 jQuery('.data-card-wrapper-div').slideUp();
 jQuery('.broadband-wrapper-div').slideUp();
		} else if(option=='electricity') {

			 jQuery('.recharge-numbers').slideUp();
			 jQuery('.landline-wrapper-div').slideUp();
			 jQuery('.electricity-wrapper-div').slideDown();
			 jQuery('.dth-wrapper-div').slideUp();
			 jQuery('.gas-wrapper-div').slideUp();
 jQuery('.insurance-wrapper-div').slideUp();
	 jQuery('.data-card-wrapper-div').slideUp();
	  jQuery('.broadband-wrapper-div').slideUp();
		} else if(option=='gas') {

			 jQuery('.recharge-numbers').slideUp();
			 jQuery('.landline-wrapper-div').slideUp();
			 jQuery('.electricity-wrapper-div').slideUp();
			 jQuery('.gas-wrapper-div').slideDown();
			 jQuery('.dth-wrapper-div').slideUp();
			  jQuery('.insurance-wrapper-div').slideUp();

			 	 jQuery('.data-card-wrapper-div').slideUp();
			  jQuery('.broadband-wrapper-div').slideUp();

		} else if(option=='insurance') {
			 jQuery('.insurance-wrapper-div').slideDown();
			  jQuery('.recharge-numbers').slideUp();
			 jQuery('.landline-wrapper-div').slideUp();
			 jQuery('.electricity-wrapper-div').slideUp();
			 jQuery('.gas-wrapper-div').slideUp();
			 jQuery('.dth-wrapper-div').slideUp();
			 		 jQuery('.data-card-wrapper-div').slideUp();
 jQuery('.broadband-wrapper-div').slideUp();
		} else if(option=='data_card') {

				 jQuery('.data-card-wrapper-div').slideDown();
				 jQuery('.insurance-wrapper-div').slideUp();
			  jQuery('.recharge-numbers').slideUp();
			 jQuery('.landline-wrapper-div').slideUp();
			 jQuery('.electricity-wrapper-div').slideUp();
			 jQuery('.gas-wrapper-div').slideUp();
			 jQuery('.dth-wrapper-div').slideUp();
			 jQuery('.broadband-wrapper-div').slideUp();
		} else if(option=='broadband') {


					jQuery('.broadband-wrapper-div').slideDown();
					
					jQuery('.data-card-wrapper-div').slideUp();
					jQuery('.insurance-wrapper-div').slideUp();
					jQuery('.recharge-numbers').slideUp();
					jQuery('.landline-wrapper-div').slideUp();
					jQuery('.electricity-wrapper-div').slideUp();
					jQuery('.gas-wrapper-div').slideUp();
					jQuery('.dth-wrapper-div').slideUp();
		}

		else {

			jQuery('.recharge-numbers').slideDown();
			jQuery('.landline-wrapper-div').slideUp();
			jQuery('.electricity-wrapper-div').slideUp();

			jQuery('.broadband-wrapper-div').slideUp();
					
			jQuery('.data-card-wrapper-div').slideUp();
			jQuery('.insurance-wrapper-div').slideUp();
			jQuery('.gas-wrapper-div').slideUp();
			jQuery('.dth-wrapper-div').slideUp();


			jQuery.ajax({
				url  : ajax_url+'shop/get_operator',
				type : 'POST',
				data : {option:option},
				beforeSend : function(){ 
					jQuery('.payment-overlay').show();
				},
				success : function(html) {

					// console.log(html);
					jQuery('.payment-overlay').hide();
					var data = jQuery.parseJSON(html);
					
					jQuery('select[name="operators"]').html(data.output);
					
				}

			});
		}

	});

	jQuery('.forgot-password-btn').on('click',function(){

		var email = jQuery('#forgot-email').val();
		var btn = jQuery(this);

		jQuery('.forgot-error').html('');

		if (!validateEmail(email)) {

			jQuery('.forgot-error').show();
			jQuery('.forgot-error').html('Please enter a valid email address !');
			return false;

		}
		jQuery.ajax({
			url  : ajax_url+'login/forgot_password_email',
			type : 'POST',
			data : {email:email},
			beforeSend : function(){ 
				btn.val('wait...');
			},
			error : function(jqXHR,exception) {
				console.log(jqXHR.responseText);
				var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404]';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {
		            msg = 'Requested JSON parse failed.';
		        } else if (exception === 'timeout') {
		            msg = 'Time out error.';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        alert(msg);
				btn.val('Submit');
			},
			success : function(html) {
				btn.val('Submit');

				console.log(html);
				if (html=='success') {

				 alert("check your mail to reset the password !");
				}
				
			}

		});


		return false;
	});


});


function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function checkout(form_data,btn) {

		jQuery.ajax({

			type : 'POST',
			url : ajax_url+"checkout/order_checkout",
			data: form_data,
			beforeSend  :function() {
				btn.val('wait...');
			},
			success : function(html) {
				btn.val('Place Order');
				console.log(html);

				var data = jQuery.parseJSON(html);
				jQuery('.check-error').html('');

				if (data.status=='true') {

					console.log('order placed !');

					alert('Successfully Placed order !, press ok to continue');
						window.location = ajax_url+'shop';
						// window.location = ajax_url+'checkout/order_confirmation';
				

				} else {

					jQuery('.fname-error').html(data.fname);
					jQuery('.lname-error').html(data.lname);
					jQuery('.address-error').html(data.address);
					jQuery('.sub-addr-error').html(data.address2);
					jQuery('.city-error').html(data.city);
					jQuery('.state-error').html(data.state);
					jQuery('.country-error').html(data.country);
					jQuery('.pincode-error').html(data.pincode);
					jQuery('.email-error').html(data.email);
					jQuery('.phone-error').html(data.phone);
					jQuery('.order-note-error').html(data.order_note);
					jQuery('.check-error').html('Please fill your information above!');
					jQuery('.error').show();
					

					}

			}
		});

}

function update_mini_cart(url){

	jQuery.ajax({

		url: url,
		type: 'POST',
		data : {'get_cart':'update'},
		success : function(html){

			console.log(html);
			var data = jQuery.parseJSON(html);

			jQuery('.mini-cart-wrap').html(data.output);
			jQuery('.cart-count').html(data.items);
			jQuery('.cart-price').html('Rs.'+data.price);

			// jQuery('.text-shopping-cart').html(data.items+" item(s) - Rs."+data.price);
			
		}


	});


}


function load_products(cat_id,url,div_id,offset,type) {

	jQuery.ajax({

		url : url,
		type : 'POST',
		data : {'get_products'  : 'products' , cat_id:cat_id,offset:offset},
		beforeSend : function (){


		},
		success : function(html) {

			 console.log(html);
			var data  = jQuery.parseJSON(html);

			if (data.status=='success') {

				if(type=='one'){

				// jQuery(div_id+" .products .ltabs-items-inner").html('');
				jQuery('.ajax-content .tab-pane').removeClass('active');
				jQuery(div_id).addClass('active');
				// jQuery(div_id+'.items-category-'+cat_id).find('.ltabs-loading').hide();			
				
				jQuery(div_id+' .products.owl-carousel').owlCarousel('add', data.output).owlCarousel('refresh')

				} else {

					jQuery(div_id).html(data.output);
				
				}
				

			} else {

				alert('Error occured, try later !');
			}


		}



	});

}


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

function selectProduct(product) {


	jQuery('.search-product').val(product);

	jQuery('#result').hide();



}


function update_cart(hash,qty) {

	jQuery.ajax({

			url : ajax_url+'cart/update_product',
			
			type : 'POST',
			
			data: {'update_product':'cart',product_hash:hash,qty:qty},
			
			beforeSend : function(){

				jQuery('#loader_'+hash).show();

				if (qty==0) {
					jQuery('tr#row_'+hash).fadeOut();
				}
			},
			success : function(html) {

				jQuery('.ajax-loader').hide();
				console.log(html+" updated");
				var data = jQuery.parseJSON(html);
				if (data.status=='success') {

					
					
					update_mini_cart(ajax_url+'shop/update_cart');
					
					jQuery('.cart-price').html('Rs.'+data.result);
					jQuery('#price_'+hash).html('Rs.'+data.item_subtotal);

				} else {

					alert('Error occured !, try later');
					

				}

			}

		});
}