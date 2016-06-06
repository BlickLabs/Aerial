  jQuery(document).ready(function(){
    //$('.img-container a').on('click', function() {
      //var data = $(this).attr('query');
      //$('#image-gallery-modal').empty();
      //var image= "<img class='img-modal' src='"+data+"' alt=''></img>";
      //$('#image-gallery-modal').append(image);
    if (jQuery(window).width() < 900) {
        $('#drone-1').addClass('active-drone');
        $.ajax({
          cache: false,
          type: 'GET',
          url: 'api.php',
          dataType: "json",
          data: 'drone=1',
          success: function(data) {
              var res = data;
              var count= 1;
              var ids = 1;
              var images = data.images;
              $('.no-images').hide();
              $(".carousel-inner.portafolio").empty();
              $('.carousel-control').show();
              $('.carousel-inner.gallery').empty();
              for(var i=0;i<res.images.length;i++){
                if(count == 1){
                  var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                  $('.carousel-inner.portafolio').append(item);
                  count++;
                }
                else{
                  var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                  $('.carousel-inner.portafolio').append(item);
                  count++;
                }
              };
              $( "div" ).remove( ".item.gallery" );
              for(var j=0;j<res.images.length;j++){
                if(i==0){
                  var item = "<div class='item gallery active'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                }
                else{
                  var item = "<div class='item gallery'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                }
                $('.carousel-inner.gallery').append(item);
              };
            }
          });     
        $('.drone').on('click', function(){
          var drone = $(this).attr('query');
          $('.drone').addClass('active-drone');
          $('.drone').not('#drone-' + drone).removeClass('active-drone');
          $.ajax({
            cache: false,
            type: 'GET',
            url: 'api.php',
            dataType: "json",
            data: 'drone='+ drone,
            success: function(data) {
                var res = data;
                var count= 1;
                var ids = 1;
                if(data.images == undefined || data.images == null || data.images == 'null' || data.images.length == 0){
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').hide();
                  $('.no-images').show();
                  $('.carousel-inner.gallery').empty();         
                }
                else{
                  var images = data.images;
                  $('.no-images').hide();
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').show();
                  $('.carousel-inner.gallery').empty();
                  for(var i=0;i<res.images.length;i++){
                    if(count == 1){
                      var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      count++;
                    }
                    else{
                      var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      count++;
                    }
                  };
                  for(var j=0;j<res.images.length;j++){
                    if(i==0){
                      var item = "<div class='item gallery active'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                    }
                    else{
                      var item = "<div class='item gallery'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                    }
                    $('.carousel-inner.gallery').append(item);
                  };
                }
              }
            });     
          });
        $('.category').on('click', function(){
          var category = $(this).attr('query');
          $('.category').addClass('active-category');
          $('.category').not('#category-' + category).removeClass('active-category');
          var drone = $('.drone.active-drone').attr('query');
          var dataSend = 'drone=' + drone + '&category=' + category;
          $.ajax({
            cache: false,
            type: 'GET',
            url: 'api.php',
            dataType: "json",
            data: dataSend,
            success: function(data) {
                var res = data;
                var count= 1;
                var ids = 1;
                if(data.images == undefined || data.images == null || data.images == 'null' || data.images.length == 0){
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').hide();
                  $('.no-images').show();
                  $('.carousel-inner.gallery').empty();         
                }
                else{
                  var images = data.images;
                  $('.no-images').hide();
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').show();
                  $('.carousel-inner.gallery').empty();
                  for(var i=0;i<res.images.length;i++){
                    if(count == 1){
                      var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      count++;
                    }
                    else{
                      var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'><div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      count++;
                    }
                  };
                  for(var j=0;j<res.images.length;j++){
                    if(i==0){
                      var item = "<div class='item gallery active'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                    }
                    else{
                      var item = "<div class='item gallery'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                    }
                    $('.carousel-inner.gallery').append(item);
                  };
                }
              }
            });     
          });
    }
    else{
        $('#drone-1').addClass('active-drone');
        $.ajax({
          cache: false,
          type: 'GET',
          url: 'api.php',
          dataType: "json",
          data: 'drone=1',
          success: function(data) {
              var res = data;
              var count= 1;
              var ids = 1;
              var images = data.images;
              $('.no-images').hide();
              $(".carousel-inner.portafolio").empty();
              $('.carousel-control').show();
              $('.carousel-inner.gallery').empty();
              for(var i=0;i<res.images.length;i++){
                if(count == 1 && i < 2){
                  var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                  $('.carousel-inner.portafolio').append(item);
                  var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                  count++;
                  $('#row-'+ ids).append(content);
                }
                else if(count == 1 && i > 2){
                  var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                  $('.carousel-inner.portafolio').append(item);
                  var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                  count++;
                  $('#row-'+ ids).append(content);
                }
                else if(count > 1 && count < 3){
                  var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                  count++;
                  $('#row-'+ ids).append(content);
                }
                else if(count == 3){
                  var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' class='modal-image-link' data-slide-to='"+i+"' data-slide-to='"+i+"' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                  $('#row-'+ ids).append(content);
                  count=1;
                  ids++;
                };
                for(var j=0;j<res.images.length;j++){
                  if(i==0){
                    var item = "<div class='item gallery active'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                  }
                  else{
                    var item = "<div class='item gallery'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                  }
                  $('.carousel-inner.gallery').append(item);
                };
              }
            }
          });     
        $('.drone').on('click', function(){
          var drone = $(this).attr('query');
          $('.drone').addClass('active-drone');
          $('.drone').not('#drone-' + drone).removeClass('active-drone');
          $.ajax({
            cache: false,
            type: 'GET',
            url: 'api.php',
            dataType: "json",
            data: 'drone='+ drone,
            success: function(data) {
                var res = data;
                var count= 1;
                var ids = 1;
                if(data.images == undefined || data.images == null || data.images == 'null' || data.images.length == 0){
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').hide();
                  $('.no-images').show();
                  $('.carousel-inner.gallery').empty();         
                }
                else{
                  var images = data.images;
                  $('.no-images').hide();
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').show();
                  $('.carousel-inner.gallery').empty();
                  for(var i=0;i<res.images.length;i++){
                    if(count == 1 && i < 2){
                      var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      count++;
                      $('#row-'+ ids).append(content);
                    }
                    else if(count == 1 && i > 2){
                      var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      count++;
                      $('#row-'+ ids).append(content);
                    }
                    else if(count > 1 && count < 3){
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      count++;
                      $('#row-'+ ids).append(content);
                    }
                    else if(count == 3){
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      $('#row-'+ ids).append(content);
                      count=1;
                      ids++;
                    };
                    for(var j=0;j<res.images.length;j++){
                      if(i==0){
                        var item = "<div class='item gallery active'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                      }
                      else{
                        var item = "<div class='item gallery'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                      }
                      $('.carousel-inner.gallery').append(item);
                    };
                  }
                }
              }
            });     
      
        });
        $('.category').on('click', function(){
          var category = $(this).attr('query');
          $('.category').addClass('active-category');
          $('.category').not('#category-' + category).removeClass('active-category');
          var drone = $('.drone.active-drone').attr('query');
          var dataSend = 'drone=' + drone + '&category=' + category;
          $.ajax({
            cache: false,
            type: 'GET',
            url: 'api.php',
            dataType: "json",
            data: dataSend,
            success: function(data) {
                var res = data;
                var count= 1;
                var ids = 1;
                if(data.images == undefined || data.images == null || data.images == 'null' || data.images.length == 0){
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').hide();
                  $('.no-images').show();
                  $('.carousel-inner.gallery').empty();         
                }
                else{
                  var images = data.images;
                  $('.no-images').hide();
                  $(".carousel-inner.portafolio").empty();
                  $('.carousel-control').show();
                  $('.carousel-inner.gallery').empty();
                  for(var i=0;i<res.images.length;i++){
                    if(count == 1 && i < 2){
                      var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                      $('.carousel-inner.portafolio').append(item);
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      count++;
                      $('#row-'+ ids).append(content);
                    }
                    else if(count == 1 && i > 2){
                      var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                      $('.carousel-inner'.portafolio).append(item);
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      count++;
                      $('#row-'+ ids).append(content);
                    }
                    else if(count > 1 && count < 3){
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      count++;
                      $('#row-'+ ids).append(content);
                    }
                    else if(count == 3){
                      var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><a href='#lightbox' data-toggle='modal' data-slide-to='"+i+"' class='modal-image-link' query='"+res.images[i].path+"'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></a></div>";
                      $('#row-'+ ids).append(content);
                      count=1;
                      ids++;
                    };
                    for(var j=0;j<res.images.length;j++){
                      if(i==0){
                        var item = "<div class='item gallery active'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                      }
                      else{
                        var item = "<div class='item gallery'><img src='" + res.images[j].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                      }
                      $('.carousel-inner.gallery').append(item);
                    };
                  }
                }
              }
            });     
      
        });
    }
  });

