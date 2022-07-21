(function($) {
    $('#genre_edit_modal').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');
        var genre = $(e.relatedTarget).data('genre');
        var desc = $(e.relatedTarget).data('desc');

        $(e.currentTarget).find('#genre_edit_form').attr("action", "genre/"+Id);
        $(e.currentTarget).find('input[name="genre"]').val(genre);
        $(e.currentTarget).find('textarea[name="description"]').val(desc);
    });

    $('#genre_delete_modal').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#genre_delete_form').attr("action", "genre/"+Id);
    });

    $('#tag_edit_modal').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');
        var genre = $(e.relatedTarget).data('genre');
        var desc = $(e.relatedTarget).data('desc');

        $(e.currentTarget).find('#tag_edit_form').attr("action", "tag/"+Id);
        $(e.currentTarget).find('input[name="tag"]').val(genre);
        $(e.currentTarget).find('textarea[name="description"]').val(desc);
    });

    $('#tag_delete_modal').on('show.bs.modal', function(e) {
        var Id = $(e.relatedTarget).data('id');

        $(e.currentTarget).find('#tag_delete_form').attr("action", "tag/"+Id);
    });

    $('#delete_modal').on('show.bs.modal', function(e) {
        var action = $(e.relatedTarget).data('action');

        $(e.currentTarget).find('#delete_form').attr("action", action);
    });

    //Custom Upload Button
    var $modal = $('#crop_image_modal');
    var csrf = $("input[name=_token]").val();;
    var image = document.getElementById('image');
    var cropper;
    var c_height;
    var c_width;
    var inputId;
    var imgId;
    var postUrl;
    var imgsrc;
    $('#select_image_modal').on('show.bs.modal', function(e){
        c_height = $(e.relatedTarget).data('height');
        c_width = $(e.relatedTarget).data('width');
        inputId = $(e.relatedTarget).data('input');
        imgId = $(e.relatedTarget).data('img');
        postUrl = $(e.relatedTarget).data('url');
        imgsrc = $(e.relatedTarget).data('src');
    });
    $('#upload-cover').on('click', function (e) {
        
        $('#select').click();
        //$('#select_image_modal').modal('hide');        
    })

    $("body").on("change", "#select", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    })

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: c_width/c_height,
            scalable: true,
            viewMode: 1,
            responsive: true, 
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $("#crop").click(function () {
        canvas = cropper.getCroppedCanvas({
            width: c_width,
            height: c_height,
        });
        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: postUrl,
                    data: {'image': base64data},
                    success: function(data){
                        $modal.modal('hide');
                        $('#select_image_modal').modal('hide');
                        console.log(data);
                        console.log(inputId);
                        console.log(imgId);
                        console.log(imgsrc);
                        $('#'+inputId).val(data);
                        $('#'+imgId).attr('src',imgsrc+'/'+data).show();
                    }
                })                
            }
        });
    })

    /**
	* ----------------------------------------------------------------------------------------
	*    Book Panel Rotate
	* ----------------------------------------------------------------------------------------
	*/

    var isMobile = false;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || typeof window.orientation !== "undefined") {
		isMobile = true;
	}

    var $bookPanelContainer = $('.books-panel-container');

	$bookPanelContainer.each(function () {
		var $this = $(this);
		var $bookPanelItems = $this.find('.is-book-panel-trigger');

		//  On mobile, scroll to the Book Panel Info
		if (isMobile) {
			$bookPanelItems.on('click', function (e) {
				e.preventDefault();
				var $this = $(this);
				$bookPanelItems.removeClass('selected');
				showBookPanel($this);
			})
		}

		$bookPanelItems.hover(function (event) {
			var $this = $(this);
			$bookPanelItems.removeClass('selected');
			showBookPanel($this);
		});
		showBookPanel($bookPanelItems.eq(0), true);
	})

    function showBookPanel($selector, dontScrollFlag) {


		$selector.addClass('selected');

		var targetBookID = $selector.data('panel-show');
		$selector.parents('.book-panel').find('.books-panel-info-inner').removeClass('show visible');
		var $targetBook = $selector.parents('.book-panel').find('.books-panel-info-inner[data-panel-id="' + targetBookID + '"]');
		$targetBook.addClass('show').outerWidth(); //outerWidth used for reflow http://matheusazzi.com/animating-from-display-none-with-css-and-callbacks/


		$targetBook.addClass('visible');


		//  On mobile, scroll to the Book Panel Info
		if (isMobile && !dontScrollFlag) {
			var onTouchScrollTo = $targetBook.offset().top;
			$('html, body').animate({ scrollTop: onTouchScrollTo - 150 }, '500');
		}
	}

    //AJAX 
    $('#genre_in').keyup(function(){
        var search = $('#genre_in').val();
        $.ajax({
            type: "POST",
            url: "/search-genre",
            data: {'search':search},
            success: function(result){
                $('.genre-search-result').addClass('show');
                $('.genre-search-result').empty();
                $.each(result, function(key, item) 
                {
                    $('.genre-search-result').append('<button class="btn btn-sm btn-rounded btn-info btn-genre" data-id="'+item['id']+'">'+item['genre']+'</button>');
                });
            }
        })        
    })
    $(document).on('click', '.genre-search-result.show .btn-genre' ,function(){
        var add = $(this).data('id');
        var book_id = $('.book-cover').data('id');
        var book_type = $('.book-cover').data('type');
        $(this).remove();
        $.ajax({
            type: "POST",
            url: "/add-genre",
            data: {'add':add,'book_id':book_id,'book_type':book_type},
            success: function(result){
                $('.genre-search-result').removeClass('show');
                $('.genre-list').empty();
                $.each(result, function(key, item) 
                {
                    $('.genre-list').append('<span class="badge badge-pill badge-danger">'+item['genre']+'<i class="mdi mdi-close delete_genre" data-id="'+item['book_genre_id']+'"></i></span>');
                });
            }
        })
    })

    $('#tag_in').keyup(function(){
        var search = $('#tag_in').val();
        $.ajax({
            type: "POST",
            url: "/search-tag",
            data: {'search':search},
            success: function(result){
                $('.tag-search-result').addClass('show');
                $('.tag-search-result').empty();
                $.each(result, function(key, item) 
                {
                    $('.tag-search-result').append('<button class="btn btn-sm btn-rounded btn-info btn-tag" data-id="'+item['id']+'">'+item['tag']+'</button>');
                });
            }
        })        
    })
    $(document).on('click', '.tag-search-result.show .btn-tag' ,function(){
        var add = $(this).data('id');
        var book_id = $('.book-cover').data('id');
        var book_type = $('.book-cover').data('type');
        $(this).remove();
        $.ajax({
            type: "POST",
            url: "/add-tag",
            data: {'add':add,'book_id':book_id,'book_type':book_type},
            success: function(result){
                $('.tag-search-result').removeClass('show');
                $('.tag-list').empty();
                $.each(result, function(key, item) 
                {
                    $('.tag-list').append('<span class="badge badge-pill badge-danger">'+item['tag']+'<i class="mdi mdi-close delete_tag" data-id="'+item['book_tag_id']+'"></i></span>');
                });
            }
        })
    })

    $(document).on('click', '.delete_genre', function(){
        var delete_id = $(this).data('id');        
        var book_id = $('.book-cover').data('id');
        var book_type = $('.book-cover').data('type');
        $.ajax({
            type: "POST",
            url: "/delete-genre",
            data: {'delete_id':delete_id,'book_id':book_id,'book_type':book_type},
            success: function(result){
                $('.genre-list').empty();
                $.each(result, function(key, item) 
                {
                    $('.genre-list').append('<span class="badge badge-pill badge-danger">'+item['genre']+'<i class="mdi mdi-close delete_genre" data-id="'+item['book_genre_id']+'"></i></span>');
                });
            }
        })
    })

    $(document).on('click', '.delete_tag', function(){
        var delete_id = $(this).data('id');
        var book_id = $('.book-cover').data('id');
        var book_type = $('.book-cover').data('type');
        $.ajax({
            type: "POST",
            url: "/delete-tag",
            data: {'delete_id':delete_id,'book_id':book_id,'book_type':book_type},
            success: function(result){
                $('.tag-list').empty();
                $.each(result, function(key, item) 
                {
                    $('.tag-list').append('<span class="badge badge-pill badge-danger">'+item['tag']+'<i class="mdi mdi-close delete_tag" data-id="'+item['book_tag_id']+'"></i></span>');
                });
            }
        })
    })

    /**
	* ----------------------------------------------------------------------------------------
	*    Submit Review Like Reply Comment
	* ----------------------------------------------------------------------------------------
	*/
    $('.like-btn').on('click', function(e){
        e.preventDefault();
        var likedId = $(this).data('id');
        var userId = $(this).data('user');
        var likeType = $(this).data('type');
        var url = $(this).data('url');
        $.ajax({
            type: "POST",
            url: url,
            data: {'user_id':userId, 'liked_id':likedId, 'liked_type':likeType},
            success: function(result){
                $('.like i.mdi').removeClass('mdi-thumb-up-outline').addClass('mdi-thumb-up');
                $('.like span').empty().append(result);
            }
        })
    });

    $('#add_review_form').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            success: function(result){
                //$('#add_reply_modal').modal('toggle');
                location.reload(true);
            }
        })
    });
    $('#edit_review_form').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            success: function(result){
                //$('#edit_reply_modal').modal('toggle');
                location.reload(true);
            }
        })
    });

    $('#add_reply_modal').on('show.bs.modal', function(a){
        var replyId = $(a.relatedTarget).data('id');
        $("#replied_id").val( replyId );
        var replyType = $(a.relatedTarget).data('type');
        $("#reply_type").val( replyType );
    });

    $('#view_reply_modal').on('show.bs.modal', function(a){
        $('.replies').empty();
        var repliedId = $(a.relatedTarget).data('id');
        var replyType = $(a.relatedTarget).data('type');
        var url = $(a.relatedTarget).data('url');
        $.ajax({
            type: "POST",
            url: url,
            data: {'reply_type':replyType, 'replied_id':repliedId},
            success: function(result){
                
                $.each(result, function(key, item) 
                {
                    $('.replies').append(`
                        <div class="review-item">
                            <div class="review-user">
                                <div class="nav-profile-img d-inline-block">
                                    <img src="https://mynovelhub.com/images/faces/face1.jpg" alt="image">
                                    <span class="availability-status online"></span>
                                </div>
                                <div class="nav-profile-text d-inline-block">
                                    <p class="mb-1 text-black">${item['username']}</p>
                                </div>
                            </div>
                            
                            <div class="review-content mb-2"><p>${item['content']}</p></div>
                            <div class="review-others clearfix mb-2">
                                <span class="float-left">
                                    ${item['time']}
                                </span>
                                <span class="float-right">
                                    <a href="#">
                                        <strong class="like pr-2">
                                            <i class="mdi mdi-thumb-up-outline"></i>
                                            <span>${item['likes']}</span>
                                        </strong>
                                    </a>
                                </span>
                            </div>
                        </div>
                    `);
                });
            }
        })
    });

    /**
	* ----------------------------------------------------------------------------------------
	*    Rating Stars
	* ----------------------------------------------------------------------------------------
	*/
    $('#stars li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);  
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

    /* 2. Action to perform on click */
    $('#stars li').on('click', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        $('#add_review_modal #rating').val(ratingValue);
        $('#edit_review_modal .rating').val(ratingValue);
        responseMessage(msg);
    });   

    /** Chapter Options */
    $(document).on('click', '.btn-ch-op', function(e){
        var div = $(this).data('div');
        $('.chapter-option-container').removeClass('d-none').show();
        $('.'+div).siblings().hide();
        $('.'+div).removeClass('d-none').show();
    });

    $(document).on('click', '.close-btn', function(e){        
        $('.chapter-option-container').addClass('d-none').hide();
    });

    /** Search Books */
    $('#search').keyup(function(){
        var search = $('#search').val();
        var url = $('#search').data('url');
        var image = $('#search').data('image');
        $.ajax({
            type: "POST",
            url: url,
            data: {'search':search},
            success: function(result){
                $('.book-search-result').removeClass('d-none').empty().show();
                $.each(result, function(key, item) 
                {
                    $('.book-search-result').append(`
                        <div class="result-item mb-2">
                            <a href="/novel/${item['slug']}/${item['id']}">
                                <img src="${image}/${item['cover']}">
                                <h6 class="d-inline-block">${item['novel']}</h6>
                            </a>
                        </div>
                    `);
                });
                $('.book-search-result').append(`<p class="close-search text-center m-auto">Close</p>`);
            }
        })        
    })
    $(document).on('click', '.close-search', function(e){        
        $('.book-search-result').addClass('d-none').hide();
    });
    
    //Format Chapter Content
    $('.ch_content-wrapper').contents().filter(function() {
        return this.nodeType === 3;
    }).wrap( "<p></p>" ).end().filter( "br" ).remove();

    function setCookie(cName, cValue, expDays) {
        let date = new Date();
        date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
    }

    //Chapter Settings
    $(document).on('click', '#f_in', function(e){
        $('.ch_content-wrapper p').css('font-size','+=1');
        var size = $('.ch_content-wrapper p').css('font-size');
        setCookie('font_size', size, 30);
    });
    $(document).on('click', '#f_de', function(e){
        $('.ch_content-wrapper p').css('font-size','-=1');
        var size = $('.ch_content-wrapper p').css('font-size');
        setCookie('font_size', size, 30);
    });
    $('.dark-btn').on('click', function(e){
        setCookie('dark_mode', 'active', 30);
        $('.chapter-container').addClass('dark');
        $('.light-btn').removeClass('btn-gradient-primary').addClass('btn-outline-primary').removeAttr('disabled');
        $(this).removeClass('btn-outline-primary').addClass('btn-gradient-primary').attr('disabled', 'disabled');
    });
    $('.light-btn').on('click', function(e){
        setCookie('dark_mode', 'inactive', 30);
        $('.chapter-container').removeClass('dark');
        $('.dark-btn').removeClass('btn-gradient-primary').addClass('btn-outline-primary').removeAttr('disabled');
        $(this).removeClass('btn-outline-primary').addClass('btn-gradient-primary').attr('disabled', 'disabled');
    });
    $('.font-cursive').on('click', function(e){
        setCookie('font_family', 'cursive', 30);
        $('.ch_content-wrapper p').css('font-family','cursive');
        $('.font-mulish').removeClass('btn-gradient-primary').addClass('btn-outline-primary').removeAttr('disabled');
        $(this).removeClass('btn-outline-primary').addClass('btn-gradient-primary').attr('disabled', 'disabled');
    });
    $('.font-mulish').on('click', function(e){
        setCookie('font_family', 'Mulish', 30);
        $('.ch_content-wrapper p').css('font-family','Mulish');
        $('.font-cursive').removeClass('btn-gradient-primary').addClass('btn-outline-primary').removeAttr('disabled');
        $(this).removeClass('btn-outline-primary').addClass('btn-gradient-primary').attr('disabled', 'disabled');
    });

    $('[data-toggle="tooltip"]').tooltip()
})(jQuery);