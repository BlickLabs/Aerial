$(document).ready(function() {
  $('#drone-1').on('click', function(){ 
    console.log("si");
    $.ajax({
      cache: false,
      type: 'GET',
      url: 'api.php',
      dataType: "json",
      data: '?drone=1',
      success: function(data) {
        var res = data;
        var images = data.images;
        $( "div" ).remove( ".item.gallery" );
        for(var i=0;i<res.images.length;i++){
          if(i==0){
            var item = "<div class='item gallery active'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          else{
            var item = "<div class='item gallery'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          $('.carousel-inner.gallery').append(item);
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
      data: '?drone=2',
      success: function(data) {
        var res = data;
        var images = data.images;
        $( "div" ).remove( ".item.gallery" );
        for(var i=0;i<res.images.length;i++){
          if(i==0){
            var item = "<div class='item gallery active'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          else{
            var item = "<div class='item gallery'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          $('.carousel-inner.gallery').append(item);
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
      data: '?drone=3',
      success: function(data) {
        var res = data;
        var images = data.images;
        $( "div" ).remove( ".item.gallery" );
        for(var i=0;i<res.images.length;i++){
          if(i==0){
            var item = "<div class='item gallery active'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          else{
            var item = "<div class='item gallery'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          $('.carousel-inner.gallery').append(item);
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
      data: '?drone=4',
      success: function(data) {
        var res = data;
        var images = data.images;
        $( "div" ).remove( ".item.gallery" );
        for(var i=0;i<res.images.length;i++){
          if(i==0){
            var item = "<div class='item gallery active'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          else{
            var item = "<div class='item gallery'><img src='" + res.images[i].path + "' alt='Second slide' class='img-responsive modal-image'></div>";
          }
          $('.carousel-inner.gallery').append(item);
        }
      }
    });     
  });
});