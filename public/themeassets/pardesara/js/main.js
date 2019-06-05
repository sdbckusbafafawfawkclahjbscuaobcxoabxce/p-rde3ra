$(document).ready(function(){
      $("#list-col").click(function(){
      $("#new-ads-list").removeClass("flex-row");
      $("#new-ads-list").addClass("flex-column w-100");
      $(".new-ads-list-item").removeClass("flex-column");
      $(".new-ads-list-item").addClass("w-100 flex-row-reverse");
      });
      $("#list-row").click(function(){
      $("#new-ads-list").removeClass("flex-column");
      $("#new-ads-list").removeClass("w-100");
      $("#new-ads-list").addClass("flex-row");
      $(".new-ads-list-item").removeClass("flex-row-reverse");
      $(".new-ads-list-item").removeClass("w-100");
      $(".new-ads-list-item").addClass("flex-column");
      });
    
    //modal profile
    $('.play').click(function(){
    var new_src = $(this).attr('src');
    $('#comeback').attr('src', new_src);
    });
    
    
    //star for orofile
    $('.star').click(function(){
    $(this).attr('src', 'img/star.png');
    });
    
});