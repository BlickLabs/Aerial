$(document).ready(function() {
  $.ajax({
    cache: false,
    type: 'GET',
    url: 'api.php',
    dataType: "json",
    data: 'drone=1',
    success: function(data) {
        console.log('ajax request');
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
        $('.no-images').hide();
        $(".carousel-inner").empty();
        console.log('remove items');
        for(var i=0;i<res.images.length;i++){
          if(count == 1 && i < 2){
            var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
            $('.carousel-inner').append(item);
            var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
            count++;
            $('#row-'+ ids).append(content);
            console.log("1");
          }
          else if(count == 1 && i > 2){
            var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
            $('.carousel-inner').append(item);
            var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
            count++;
            $('#row-'+ ids).append(content);
            console.log("2");
          }
          else if(count > 1 && count < 3){
            var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
            count++;
            $('#row-'+ ids).append(content);
            console.log("3");
          }
          else if(count == 3){
            var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
            $('#row-'+ ids).append(content);
            console.log("4");
            count=1;
            ids++;
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
          console.log('ajax request');
          var res = data;
          var count= 1;
          var ids = 1;
          var images = data.images;
          $('.no-images').hide();
          $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 2){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 2){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 3){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 3){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
    
  });
  $('.category').on('click', function(){
    var category = $(this).attr('query');
    $('.category').addClass('active-category');
    $('.category').not('#category-' + drone).removeClass('active-category');
    var drone = $('.drone.active-drone').attr('query');
    var dataSend = 'drone=' + drone + '&category=' + category;
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: dataSend,
      success: function(data) {
          console.log('ajax request');
          var res = data;
          var count= 1;
          var ids = 1;
          console.log('Data: '+data.images);
          if(data.images == undefined || data.images == null || data.images == 'null' || data.images.length == 0){
            $(".carousel-inner").empty();
            $('.carousel-control').hide();
            $('.no-images').show();         
          }
          else{
            var images = data.images;
            $('.no-images').hide();
            $(".carousel-inner").empty();
            console.log('remove items');
            for(var i=0;i<res.images.length;i++){
              if(count == 1 && i < 2){
                var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                $('.carousel-inner').append(item);
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                count++;
                $('#row-'+ ids).append(content);
                console.log("1");
              }
              else if(count == 1 && i > 2){
                var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
                $('.carousel-inner').append(item);
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                count++;
                $('#row-'+ ids).append(content);
                console.log("2");
              }
              else if(count > 1 && count < 3){
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                count++;
                $('#row-'+ ids).append(content);
                console.log("3");
              }
              else if(count == 3){
                var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
                $('#row-'+ ids).append(content);
                console.log("4");
                count=1;
                ids++;
              };
            }
          }
        }
      });     
    
  });
/*
  $('#drone-1').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'drone=1',
      success: function(data) {
          console.log('ajax request');
          var res = data;
          var count= 1;
          var ids = 1;
          var images = data.images;
          $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
   $('#drone-2').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'drone=2',
      success: function(data) {
          var res = data;
          var count= 1;
          var ids = 1;
          var images = data.images;
          $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
    $('#drone-3').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'drone=3',
      success: function(data) {
          var res = data;
          var count= 1;
          var ids = 1;
          var images = data.images;
          $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#drone-4').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'drone=4',
      success: function(data) {
          var res = data;
          var count= 1;
          var ids = 1;
          var images = data.images;
          $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#category-1').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'category=1',
      success: function(data) {
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
        $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#category-2').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'category=2',
      success: function(data) {
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
       $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#category-3').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'category=3',
      success: function(data) {
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
        $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#category-4').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'category=4',
      success: function(data) {
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
        $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#category-5').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'category=5',
      success: function(data) {
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
        $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });
  $('#category-6').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: 'category=6',
      success: function(data) {
        var res = data;
        var count= 1;
        var ids = 1;
        var images = data.images;
        $(".carousel-inner").empty();
          console.log('remove items');
          for(var i=0;i<res.images.length;i++){
            if(count == 1 && i < 8){
              var item = "<div class='item active' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("1");
            }
            else if(count == 1 && i > 8){
              var item = "<div class='item' id='item-"+ ids +"'><div class='row row-no-margin-right' id='row-"+ ids +"'></div></div>";
              $('.carousel-inner').append(item);
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("2");
            }
            else if(count > 1 && count < 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              count++;
              $('#row-'+ ids).append(content);
              console.log("3");
            }
            else if(count == 9){
              var content = "<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 img-container'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
              $('#row-'+ ids).append(content);
              console.log("4");
              count=1;
              ids++;
            };
          }
        }
      });     
  });*/
});