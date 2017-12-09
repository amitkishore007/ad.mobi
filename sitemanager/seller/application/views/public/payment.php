<div class="main-container container">
		
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
							 <script>
                                 window.onload = function() {
                                 var d = new Date().getTime();
                                document.getElementById("tid").value = d;
                                     };
                              </script>
								 <form method="POST" name="customerData" action="<?php echo base_url('shop/ccavRequestHandler'); ?>">
                                    <input type="hidden" name="tid" id="tid"  />
					                <input type="hidden" name="merchant_id" value="your merchent id"/>
					                <input type="hidden" name="payment_option" value="OPTNBK">  
					                <input type="hidden" name="order_id" value="123654789"/>
					                <input type="hidden" name="merchant_param1" value="your custom value"/>
					                <input type="hidden" name="merchant_param2" value="user_id"/>
					                <input type="hidden" name="amount" value="amount"/>
					                <input type="hidden" name="currency" value="INR"/>
					                <input type="hidden" name="redirect_url" value="<?php  echo base_url('shop/payDone');?>"/>
					                <input type="hidden" name="cancel_url" value="<?php  echo base_url('shop/cancelPayment');?>"/>
					                <input type="hidden" name="billing_name" value="Amit kishore"/>
					                <input type="hidden" name="billing_address" value="E-16A"/>
					                <input type="hidden" name="billing_city" value="New Delhi"/>
					               <input type="hidden" name="billing_state" value="Delhi"/>
					             <input type="hidden" name="billing_zip" value="110071"/>
					             <input type="hidden" name="billing_country" value="India"/>
					             <input type="hidden" name="billing_tel" value="8800417260"/>
					       </form>
						    <script language='javascript'>document.customerData.submit();</script>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>