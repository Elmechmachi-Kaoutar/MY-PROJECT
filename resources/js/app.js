import './bootstrap';

 
$(document).ready(function(){
    $('#submit-from').click(function(){
       // Check if the 'From' input field is not empty
       if($('#from').val() != ''){
          // Enable the 'To' submit button
          $('#submit-to').prop('disabled', false);
       }
    });
 });


 
