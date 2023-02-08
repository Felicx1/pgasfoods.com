(function($)
{
	$.fn.cart = function(options)
	{
		var sb = null;
		this.each(function(e)
		{ 
			//initialize the class
			sb = new cart();
		});
		return sb;
	}

	var cart = (function()
	{
		cart.prototype.body = 'body';
		cart.prototype.items = $('.wrap-items');
		cart.prototype.btn = '.add-to-cart';
		cart.prototype.list_sizes = '.product_sizes';

		

		function cart()
		{
			var $this = this;
			
			$this.sizeChange();

			/**
			 * Add Item to cart
			 */
			$this.addToCart();

			/**
			 * control qty change and update price and total
			 */
			$this.qtyChange();

			$this.changeQuantity();

			//trigger submit
			$this.finalizeOrder();

			//remove item
			$this.remove();

			$this.delivery();

			$this.addToCartNotice();

			$this.mini_cart();

			$this.deliveryState();
		}

		cart.prototype.finalizeOrder = function(){

			$(this.body).on('click touchstart', '#finalize_checkout', function(){

				if($('input[name="terms"]').is(':checked'))
				{
					$('#finalize_order').submit();
				}
			});

		}

		cart.prototype.mini_cart = function(){
			
			var $this = this;

			$(this.body).on('click touchstart', '#minicart', function(){

				var path = '/fetch/mini/cart';
				$this.request({}, path, function(html){
					
					$('#mini_cart_container').html(html);
					console.log(html)
					
				}, 'GET');
			});
		}

		/**
		 * This will add item to cart
		 */
		cart.prototype.addToCart = function() {

			toastr.options = {
				"closeButton": true,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			  }

			var $this = this;

			//this.btn is  '.add-to-cart'
			$($this.body).on('click touchstart', $this.btn , function(e){
				
				$this.setCart($(this));
				setTimeout(function(){
					toastr.success('Item added to cart');
				}, 2000);

				e.preventDefault();
				return false;
			});
		}
		
		/**
		 * this is used by change quantity and add to cart method
		 * it send selected item to cart
		 */
		cart.prototype.setCart = function(e){

			var p = e.parents('.wrap-items');

			// if(e.hasClass('reduced')){
			// 	console.log('reduced---->.')
			// }else{
			// 	console.log('increased---->.')
			// }

			var qty = 1;
			if(p.find('.qty').hasClass('custom-qty'))
			{
				
				if (typeof qty === 'number') {
					qty = p.find('.qty').val();
				}
				
			}

			var data = {'id': p.attr('id'), 'item_data':
							{
								'products_id': $('#products_id').val(),
								'size_id': $('#size_id').val(),
								'name':$.trim(p.find('.namex').text()), 
								'link':p.find('.link').attr('href'), 
								'image':p.find('._image').attr('src'), 
								'price': p.find('.item-price').text(), 
								'qty': qty,
								'size':p.attr('data-size')
							},
							'reduced':e.hasClass('reduced')?0:1
						}
			
			var path = '/cart/add/item';
			this.request(data, path, this.setCartUiCount, 'POST');
			// call toastr

		}

		/**
		 * This remove selected item from cart
		 * and refresh the page
		 */
		cart.prototype.remove = function(){
			var $this = this;

			$($this.body).on('click touchstart', '.remove-item', function(){

				var productAndSizeId = $(this).parents('.wrap-items').attr('id');
				
				var path = '/cart/remove/item/' + productAndSizeId;
				$this.request({}, path, function(){
					
					document.location.href = document.location.href;
				}, 'GET');
			});
		}

		/**
		 * Change price
		 */
		cart.prototype.sizeChange = function(){

			var $this = this;
			
			// $(document).on('change', '.select_option', function(e) {
				$(".product_sizes").change(function(){

				var data = $(this).val(); //$(this).next().find('.selected').attr('data-value');

				var parent = $(this).parents('.wrap-items');

				var json = $.parseJSON(data);
				
				try{
					parent.find('.item-price').html(json.selling_price);
					parent.attr("id", json.products_id+'|'+json.size_id);
					parent.attr('data-size', json.size_in_kg)
					// console.log(json.size_in_kg)
					
					$this.controlLimit(json.size_in_kg);

				}catch(e){

				}

			});

			// // $(this.body).on('click touchstart', this.list_sizes, function(){
			// $(this.list_sizes).change(function(){
			// 	//var size = $(this).attr('data-value');
				
			// 	alert(9876543)
			// 	var size = $(this).val();
			// 	// try{

			// 		var json = $.parseJSON(size);

			// 		//console.log(json.prices.selling_price)
			// 		//console.log(json.products_id+'|'+json.size_id)

			// 		$('.item-price').html(json.selling_price);
			// 		$('.wrap-items').attr("id", json.products_id+'|'+json.size_id);

			// 	// }catch(e){

			// 	// }
			// });
		}

		cart.prototype.controlLimit = function(size = 0){

			if(size >= 20){
				$('.toggle_add_to_cart_for_not_available_online').hide();
				$('.toggle_size_not_available_online').show()
			}else{
				$('.toggle_add_to_cart_for_not_available_online').show();
				$('.toggle_size_not_available_online').hide();
			}
			
		}

		/**
		 * Delivery Control 						*/
		cart.prototype.delivery = function(){

			$('.cart_inner .table tbody tr.shipping_area .shipping_box .list li a').click(function(e){

				$(this).parent().siblings().removeClass('active');
				$(this).parent().addClass('active');
				e.preventDefault();
				return false;

			});
		}

		/**
		 * Details Quantity Control
		 */
		cart.prototype.changeQuantity = function(){
			
			var $this = this;
			$($this.body).on('click touchstart', '.quantity button', function(){

				var qty = $('.quantity').find('.qty');

				if($(this).hasClass('increment')){

					qty.val(parseInt(qty.val()) + 1);
				}
				if($(this).hasClass('decrement')){

					if(qty.val() <= 1){
						return;
					}
					qty.val(parseInt(qty.val()) - 1);
				}
			});
		}

		/**
		 * This is for quantity change inside basket
		 */
		cart.prototype.qtyChange = function(){

			var $this = this;
			$($this.body).on('click touchstart', 'button.items-count', function(){

				$this.setCart($(this));

				var p = $(this).parents('.wrap-items');
				update(p);
			});

			function update(row){

				var rowTotal = row.find('.row-total'); 
				var rowprice = row.find('.item-price').text(), rowQty = row.find('.qty').val();
				var total = parseFloat(rowprice) * parseFloat(rowQty)
				rowTotal.html(total.toFixed(2))

				//update sub total value
				var rows = $('body').find('.row-total');
				var subtotalValue = 0;
				rows.each(function(){
					subtotalValue += parseFloat($(this).text())
				});
				// console.log(subtotalValue.toFixed(2));
				$('.subTotal').html(subtotalValue.toFixed(2));

				$this.setWeight();

				//calsulate shipping
				$this.shipping();
				// total
				var shipping_charge = parseFloat($('.shippingFee').text());
				// var discount = parseFloat($('.discount').text());
				var finalAmount = shipping_charge += subtotalValue;
				$('.cart_amount_total').html(finalAmount.toFixed(2));

				
			}
		}

		cart.prototype.setWeight = function()
		{
			var qty_weight = $('.wrap-items').find('.qty-weight');

			var total = 0, qty = 0, weight = 0;

			qty_weight.each(function(){
				
				weight = $(this).attr('data-weight');
				qty = $(this).val();
				total += parseFloat(qty) * parseFloat(weight);
			});

			$('.total_weight').html(total.toFixed(2));
		}

		cart.prototype.shipping = function()
		{
			var weight = $('.total_weight').html();

			var shipping = 0;

			var subtotal = parseFloat($('.subTotal').text() ?? 0);
			var shipping = 6.99

			if(subtotal > 60){
				shipping = 10.99
			}

			if(subtotal > 90){
				shipping = 13.99
			}

			if(subtotal > 120){
				shipping = 16.99
			}

			$('.shipping_charge').html(shipping.toFixed(2))

			// prevent discount application if disabled
			if(!$('.shipping_charge_discount').hasClass('disabled'))
			{
				$('.shipping_charge_discount').html(shipping.toFixed(2)/2)
			}
		}

		// cart.prototype.shipping_by_extra_weight = function()
		// {
		// 	var weight = $('.total_weight').html();



		// 	var shipping = 0;

		// 	if(weight <= 15 ){
		// 		shipping = 6.99;
		// 	}else if(weight > 15 && weight <= 20){
		// 		shipping = 9.99;
		// 	}else if(weight > 20 && weight <= 30){
		// 		shipping = 12.99
		// 	}else if(weight > 30){
				
		// 		var extra = parseFloat($('#extra_shipping_charge').attr('data-shipping')); // 50p or £1/2 = 0.5
		// 		shipping = (((weight - 30) * extra) + 12.99);
		// 	}

		// 	// console.log($('#extra_shipping_charge').attr('data-shipping'))

		// 	$('.shipping_charge').html(shipping.toFixed(2))

		// 	// prevent discount application if disabled
		// 	// if(!$('.shipping_charge_discount').hasClass('disabled'))
		// 	// {
		// 	// 	$('.shipping_charge_discount').html(shipping.toFixed(2)/2)
		// 	// }
		// }

		cart.prototype.deliveryState = function(){

			var $this = this;
			let shipping_method_change = $('#shipping_method_change');
			let shipping_row = $("#shipping_amount_row");
			let notice_holder = $("#notice_holder")
			let postcode = $('#postcode');
			let shipping_holder = $('#shipping_holder');
			

			$(document).on('click.nice_select', '.nice-select .option:not(.disabled)', function(event) {

				var $option = $(this);
				var $dropdown = $option.closest('.nice-select');
				var oldSelectedValue = $dropdown.find('.selected').data('value');
				
				let option_value = 1;
				shipping_row.removeClass('waived');

				switch(oldSelectedValue){
					case 'shipping1':
						option_value = 1;
						//update temp shipping holder
						notice_holder.html("You will be charged a normal delivery cost on your cart")
					break;
					case 'shipping2':

						if($this.checkPostCode(postcode.val())){
							option_value = 2;
							shipping_row.addClass('waived');
							notice_holder.html("You will be charged a flat rate of £6.99")
						}else{
							shipping_method_change.niceSelect('update');
							notice_holder.html("You postcode must be between NN1 and NN5 to get £6.99 flat rate");
						}
						//update temp shipping holder
					break;
					case 'pickup':
						option_value = 3;
						shipping_row.addClass('waived');
						notice_holder.html("You will not be charged for this delivery £0.00")
						//update temp shipping holder
					break;
				}

				$this.deliveryOptionsInformation(option_value)
				$this.deliveryOption(option_value);
				shipping_holder.val(option_value);


			  });

			  this.postcode();
		}

		cart.prototype.deliveryOptionsInformation = function(value){

			let delivery_options = $('.delivery_options .value');

			switch(value){
				
				case 1: delivery_options.html("");  break;
				case 2: 
					delivery_options.html('£6.99 delivery charge for Only NN1 - NN5 postcode');
				break;
				case 3:
					delivery_options.html('£0.00 delivery charge for Pickup option only');
				break;
			}
			
		}

		cart.prototype.checkPostCode = function(postcode){
			
			let code_3 = postcode.substring(0, 3);

			if(postcode == ''){
				return false;
			}
			switch(code_3){
				case 'NN1':
				case 'NN2':
				case 'NN3':
				case 'NN4':
				case 'NN5':
					return true;	
				default:
					return false;
			}
		}

		cart.prototype.postcode = function(){

			var $this = this;
			let postcode = $('#postcode');
			let shipping_method_change = $('#shipping_method_change');
			
			postcode.blur(function(){
				shipping_method_change.niceSelect('update');
			})
		}

		cart.prototype.deliveryOption = function(option){

			var data = {};
			data.option = option;
			
			var path = '/cart/delivery/option/update';
			this.request(data, path, function(res){
				console.log(res)
			}, 'POST');
		}

		cart.prototype.notice = function(){


		}

		cart.prototype.setCartUiCount = function(json){

			var $this = this

			try{

				if(json){
					//var json = $.parseJSON(json);

					//
					$('.cart-item-count').html(json.total.count);
					$('.cart_price_total').html(json.total.value);

					//
					$('#cart-notification .content').addClass('success');
					$('#cart-notification .message p').show('fast').html("Item was added to cart successfully!");
					$('#cart-notification .content').show();
				}
			}catch(e){

				$('#cart-notification .content').addClass('danger');
				$('#cart-notification .message p').show('fast').html("Unable to add Item to Cart!");
			}

			setTimeout(function()
			{
				$('#cart-notification .content').hide();
				$('#cart-notification .message p').hide('fast').html("");
				$('#cart-notification .content').removeClass('danger').removeClass('success');
			}, 2000)
		}


		/**
		 * Cart Notifications												*/
		// -------------------------------------------------------------------

		cart.prototype.target = $('#cart-notification');

		cart.prototype.addToCartNotice = function()
		{
			var wrapper, message;

            holder = $('<div class="content">');
            message = $('<div class="message">').append($('<p>'));
            wrapper = $('<div class="wrapper">').append(message);

            holder.append(wrapper);

            this.target.append(holder);
		}

		// --------------------------------------------------------------------


		cart.prototype.renderHTMLResponse = function(res){

			console.log(res);
		}

		cart.prototype.request = function(data, path, callback, method){
                
			var res = $.getValues(data, path, null, method);
			res.done(function(json){
				callback(json, true);
			});
			res.fail(function(){
				callback(null, false);
			});
		}
		
		return cart;

	})()

})(jQuery)

$(function(){ $('body').cart(); });

	/*-------------------
		Ajax Request
	--------------------- */
	jQuery.extend({
		alertx:".alertx",
		isNumeric:function(value){ return /^\d+$/.test(value);},
		getValues:function(data,url_,dom,method){
			
			var result=null;
			return $.ajax({
				url:url_,
				data:data,
				type:method,
				async:true,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				beforeSend:$.onSend
			});
		},
	});