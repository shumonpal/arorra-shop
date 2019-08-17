

function showModalForm(title, url) {

    $('.modal-body').html('');

    $.ajax({
        url: url,
        dataType: 'html',
        data: {'_token': CSRF_TOKEN},
        success: function (response) {
            initIziModal(title, url);
            $('.modal-body').html(response);
            $('.save-item').iziModal('open');
        },

        error: function(errors){
            toastr.error('Something wrong!', 'Please try again lattar');
        }
    });		
		
}

function initIziModal(title, url){
    $(".save-item").iziModal({           
        iconClass: 'icon-stack',
        overlayColor: 'rgba(60, 142, 190, 0.7)',
        headerColor: 'rgba(76, 174, 76, 1)',
        width: 700,
        padding: 20
    });
    $(".save-item").iziModal('setTitle',title);
}

function saveItem(id){
    
    var form = $('.errora-form'),
        action = form.attr('action'),
        counter = 1;

        if (form.find('input[name=_method]').val() !== 'PUT') {
            method = 'post' ;
        }else{
            method = 'put' ;
        }			
        data = form.serialize();
        
        form.find('.form-group').removeClass('has-error');
        form.find('.help-block').remove();
        
    
    $.ajax({
        url: action,
        type:method,
        data: data,
        dataType:'html',
        success: function (response) { 
            $('.save-item').iziModal('close');
            if (id) {
                $('tbody .row-'+id).replaceWith(response);
                if (response == "danger") {
                    //toastr.error("Sub category already exist!");
                }
            }else{
                $('tbody').fadeIn(400, function(){					
                    $(this).append(response);
                });					
            }
            $('.counter').each(function(){
                $(this).text(counter);
                counter++;
            });
            
        },

        error: function(jqXhr, json, errorThorwn){
            var error = jqXhr.responseText;
            $.each($.parseJSON(error).errors, function(key, value){
                $(form).find('#'+key).parent('.form-group').addClass('has-error')
                .append('<span class="help-block">'+value[0]+'</span>');
                
            });
            //toastr.error("Somthings Wrong! try agin letter");
        }
    });	 
}


function error(msg) {
    iziToast.error({
        title: 'Woomps!',
        message: msg
    });
}


// $(document).ready(function () {    
//     $('.MODAL1').on("click", function (e) {
//        ShowModal("This is Modal 1");
//     });
// });



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

    function itemDelete(url) {
       
        $.ajax({
            url: url,
            type: 'delete',
            dataType: 'html',
            data: {'_token': CSRF_TOKEN},
            success: function (response) {
                $('.row-'+response).fadeOut(200, function(){
                    $(this).remove();
                });		
               // alert(response);		
            },

            error: function(errors){
                error('Somthing worng. Please try agin leter');	
                // if (me.hasClass('cart')) {
                //     $('.row-'+errors.responseText).fadeOut(200, function(){
                //         $(this).remove();
                //     });		
                //     toastr.success('Deleted Successfull');
                // }else{
                //     toastr.error(errors.responseText);
                // }
            }
        });	
    }
 
 
$(document).ready(function(){

    /*------------------------------------------
		 Extended color input field
	 -------------------------------------------*/

	$('.extended-btn').on('click',  function(evt) {
		evt.preventDefault();

		
		var me = $(this),
			html = $('.extended-div').html();

		$('.increment').fadeIn(200, function(){
					$(this).append(html);
				});

		//Colorpicker
        $('.colorpicker1').colorpicker();
		//alert(html);
		
	});


	$('body').on('click', '.remove-div',  function(evt) {
		evt.preventDefault();

		
		var me = $(this);

		me.parents('.colors').fadeOut(200, function(){
					$(this).remove();
				});
		
	});



	$('.replace').on('click',  function(evt) {
		evt.preventDefault();

		var me = $(this).parents('.replace-parent');
		me.next().removeClass('hidden');
		me.addClass('hidden');
		
    });


    /*------------------------------------------
		 Get sub category by changing category
	 -------------------------------------------*/

	$('body').on('change','.select_item', function(evt) {
		//evt.preventDefault();

		var me = $(this),
			url = me.data('url'),
			item = me.val();

		$.ajax({
			url: url,
			type: 'get',
			dataType: 'html',
			data: {'item': item, '_token': CSRF_TOKEN},
			success: function (response) {
				$('.get_item').html(response);
				$('.select2').select2();
				console.log(response);	
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});
		
    });
    

    
    
});