$(document).ready(function() {
    $(".image").mouseover(function () {
      let src = $(this).attr('src')
      $('#image').attr('src', src)
    })
    let inputValue = $('.quantity_input').val();
    $('#quantity_inc_button').click(function (){
      inputValue = parseInt(inputValue) + 1;
      $('.quantity_input').attr('value', inputValue)
    });
    $('#quantity_dec_button').click(function (){
      if(inputValue != 0){
        inputValue = parseInt(inputValue) - 1;
        $('.quantity_input').attr('value', inputValue)
      }else{
        inputValue = 0
      }
    }); 
});