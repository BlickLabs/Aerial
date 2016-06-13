jQuery(document).ready(function(){
  //$('.img-container a').on('click', function() {
    //var data = $(this).attr('query');
    //$('#image-gallery-modal').empty();
    //var image= "<img class='img-modal' src='"+data+"' alt=''></img>";
    //$('#image-gallery-modal').append(image);

  function getImages(drone, category) {
    var query = '';
    if (drone && !category) {
      query = 'drone=' + drone;
    } else if (!drone && category) {
      query = 'category=' + category;
    } else if (drone && category) {
      query = 'drone=' + drone + '&category=' + category;
    } 
    $.ajax({
      type: 'GET',
      url: 'api.php',
      dataType: 'json',
      data: query,
      success: function (data) {
        var count= 1;
        var ids = 1;
        if (data == undefined || data == null || data == 'null' || data.length == 0){
          $('.carousel-inner.portafolio').empty();
          $('.carousel-control').hide();
          $('.no-images').show();
          $('.carousel-inner.gallery').empty();         
        }
        else {
          var images = data;
          $('.no-images').hide();
          $('.carousel-inner.portafolio').empty();
          $('.carousel-control').show();
          $('.carousel-inner.gallery').empty();
          for(var i=0;i<images.length;i++){
            if (jQuery(window).width() < 900) {
              if(count == 1){
                var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+images[i].path+"'><img src='" + images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                $('.carousel-inner.portafolio').append(item);
                count++;
              }
              else{
                var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+images[i].path+"'><img src='" + images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                $('.carousel-inner.portafolio').append(item);
                count++;
              }
            } else {
              if(count == 1 && i < 2){
                var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                $('.carousel-inner.portafolio').append(item);
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+images[i].path+"'><img src='" + images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                count++;
                $('#row-'+ ids).append(content);
              }
              else if(count == 1 && i > 2){
                var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                $('.carousel-inner.portafolio').append(item);
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+images[i].path+"'><img src='" + images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                count++;
                $('#row-'+ ids).append(content);
              }
              else if(count > 1 && count < 3){
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+images[i].path+"'><img src='" + images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                count++;
                $('#row-'+ ids).append(content);
              }
              else if(count == 3){
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+images[i].path+"'><img src='" + images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                $('#row-'+ ids).append(content);
                count=1;
                ids++;
              }
            }
          };
          for(var j=0;j<images.length;j++){
            if(j==0){
              var item = "<div class='item gallery active'><img src='" + images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
            }
            else{
              var item = "<div class='item gallery'><img src='" + images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
            }
            $('.carousel-inner.gallery').append(item);
          };
        }
      }
    });
  }

  $('.drone').click(function () {
    var drone = $(this).attr('query'),
      category = null;
    if ($(this).hasClass('active-drone')) {
      $(this).removeClass('active-drone');
      drone = null;
    } else {
      $('.drone').removeClass('active-drone');
      $(this).addClass('active-drone');
    }
    if ($('.active-category')) {
      category = $('.active-category').attr('query');
    }
    getImages(drone, category);
  });
  $('.category').click(function () {
    var drone = null,
      category = $(this).attr('query');
    if ($(this).hasClass('active-category')) {
      $(this).removeClass('active-category');
      category = null;
    } else {
      $('.category').removeClass('active-category');
      $(this).addClass('active-category');
    }
    if ($('.active-drone')) {
      drone = $('.active-drone').attr('query');
    }
    getImages(drone, category);
  });

  getImages();
});

