

function showModalForm(title, url) {
    //alert('Hello');
    // initIziModal(title, url);
    // $('.product_details').iziModal('open')
    $('.modal-body').html('');

    $.ajax({
        url: url,
        dataType: 'html',
        data: {'_token': CSRF_TOKEN},
        success: function (response) {
            initIziModal(title);
            $('.modal-body').html(response);
            $('.product_details').iziModal('open');
            //m_popup_select();
        },

        error: function(errors){
            iziToast.warning({
                title: 'Sorry',
                message: 'Sonthing going wrong. Please try again letter!',
            });
        }
    });		
        
}

function initIziModal(title){
    $(".product_details").iziModal({           
        iconClass: 'icon-stack',
        overlayColor: 'rgba(60, 142, 190, 0.7)',
        headerColor: 'rgba(29, 31, 29, 0.66)',
        width: 700,
        height: 800,
        padding: 20
    });
    $(".product_details").iziModal('setTitle',title);
}


/*------------------------------------------
            Show confirm iziToast windows
    -------------------------------------------*/
function showConfirmModal(title, url){
    //alert('Hello');
    iziToast.warning({
        timeout: 7000,
        close: false,
        title: title,
        message: '(You data will delete temporary)',
        position: 'center',
        overlay: true,
        progressBarColor: 'rgb(0, 255, 184)',
        id: 'confirm',
        icon: 'fa fa-exclamation-triangle',
        iconColor: 'red',
        buttons: [
            ['<button><b>Yes</b></button>', function (instance, toast) {
                instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                itemDelete(url);
            },false],
            ['<button><b>No</b></button>', function (instance, toast) {
                instance.hide({
                    transitionOut: 'fadeOutUp'
                }, toast, '#confirm');
            },true]
        ]

    });		

}

    /*------------------------------------------
	              Add to Cart/wishlist
	 -------------------------------------------*/
	
     $('body').on('click', '.addToCart', function(evt) {
		evt.preventDefault();
        
        var me = $(this);
        var form = me.closest('form');
        var data = form.serialize();
        var url = me.data('action'); 
        if (form.find('input[name=_method]').val() !== 'PUT') {
           var method = 'post' ;
        }else{
           var method = 'put' ;
        }
        
		$.ajax({
			url: url,
			type: method,
			dataType: 'html',
			data: data,
			success: function (response) {
				if (me.hasClass('add-to-wishlist')) {
                    $('.whishlist-div').html(response);
                    var msg = 'Successfully added to wishlist!';
				}else{
                    $('.cart-div').html(response);
                    var msg = 'Successfully added to cart!';
                }
                $(".product_details").iziModal('close');
                
                iziToast.success({
                    title: 'Thank you',
                    message: msg,
                });
			},
			error: function(errors){
				iziToast.warning({
                    title: 'Sorry',
                    message: 'Sonthing going wrong. Please try again letter!',
                });
			}
		});	 
		
    });
    

    function showUserEntryForm() {
        //alert('Hello');
        // initIziModal(title, url);
        // $('.product_details').iziModal('open')
        $('.modal-body').html('');
    
        $.ajax({
            url: url,
            dataType: 'html',
            data: {'_token': Laravel.csrfToken},
            success: function (response) {
                //initIziModal(title);
                $('.modal-body').html(response);
                $('.product_details').iziModal('open');
            },
    
            error: function(errors){
                iziToast.warning({
                    title: 'Sorry',
                    message: 'Sonthing going wrong. Please try again letter!',
                });
            }
        });		
            
    }


    /*------------------------------------------
		      Customer registration
	 -------------------------------------------*/
	$('body').on('click', '.user_register', function(evt) {
		evt.preventDefault();

		var me = $(this),
			form = me.closest('form'),
			url = form.attr('action'),
			data = me.closest('form').serialize();

		form.find('.form-group').removeClass('has-error');
		form.find('.help-block').remove();

		$.ajax({
			url: url,
			type:'post',
			data: data,
			dataType:'json',
			success: function (response) {
                alert(response);
                iziToast.success({
                    title: 'Thank you',
                    message: 'Successfull logged in',
                });
				location.reload();
			},
			error: function(jqXhr, json, errorThorwn){
                
				var errorsj = jqXhr.responseText;
				$.each($.parseJSON(errorsj).errors, function(key, value){
					$(form).find('#'+key).closest('.form-group').addClass('has-error')
					.append('<span class="help-block">'+value[0]+'</span>');
				});
				
			}
		});


    });

    
    /*------------------------------------------
		      Customer registration
	 -------------------------------------------*/
    function priceUpdator(data) {
		$('.sub-total').text('$' + $.parseJSON(data).subtotal);
		$('.grand-total').text('$' + $.parseJSON(data).total);
		$('.tax').text('$' + $.parseJSON(data).tax);
	}


	$('body').on('click', '.product-qty-update', function(evt) {
		evt.preventDefault();

		var me = $(this),
			href = me.data('url'),
			rowId = me.data('id'),
			qty = $('.quantity').val(),
			priceStr = me.parents('tr').find('.price').text(),
			price = priceStr.replace('$', '');

		me.parents('tr').find('.pdt-total').text('$' + (parseFloat(price)*qty));
        

		$.ajax({
			url: href,
			dataType: 'text',
			data: {'qty':qty, 'rowId':rowId},
			success: function (response) {
				priceUpdator(response);
			},
			error: function(errors){
				iziToast.warning({
                    title: 'Sorry',
                    message: 'Sonthing going wrong. Please try again letter!',
                });
			}
		});

		
    });
    

    /*------------------------------------------
	              Delete Cart
	 -------------------------------------------*/
	
	$('body').on('click', '.cart-delete', function(evt) {
		evt.preventDefault();

		var me = $(this),
			url = me.data('url'),
            method = 'post';
            
        //alert(token);

		$.ajax({
			url: url,
			type: method,
			dataType: 'html',
			data: {'_token': Laravel.csrfToken},
			success: function (response) {
				me.parents('tr').fadeOut(100, function(){
					$(this).remove();
				});
				priceUpdator(response);
				iziToast.success({
                    title: 'Success!',
                    message: 'Successfull deleted',
                });

                //update carts number
                cartCounter = ($('.cart-div').length) - 2;
                if (me.hasClass('wishlist')) {
                    $('#wishlist-total').text('('+cartCounter+')');
                    $('.wishlist-dropdown').addClass('hidden');
                }else{
                    $('#cart-total').text('('+cartCounter+')');
                    $('.cart-dropdown').addClass('hidden');
                }
                if (cartCounter < 1) {
                    $('.cart-main').addClass('hidden');
                    $('.alert-warning').fadeIn(400, function(){
                    $(this).removeClass('hidden');
                    });
                }
			},

			error: function(errors){
				iziToast.warning({
                    title: 'Sorry',
                    message: 'Sonthing going wrong. Please try again letter!',
                });
            }
            
        });	
        
        

			
	});
   
