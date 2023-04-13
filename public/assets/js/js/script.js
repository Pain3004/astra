$(document).ready(function() {
  
  $('.OwnerOperatorlist').hide();
  
  $('.Driverlist').hide();
   
  $('input:radio[name="radio_buttons"]').change(
function() {

  if ($(this).is(':checked') && $(this).val() == 'Driver')
	{
		
    $('.Driverlist').show();
    $('.OwnerOperatorlist').hide();
    
		}
  
  else if ($(this).is(':checked') && $(this).val() == 'OwnerOperator')
	{
		
    $('.Driverlist').hide();
    $('.OwnerOperatorlist').show();
    
		}
  
  
  else {
    
    $('.Driverlist').hide();
    $('.OwnerOperatorlist').hide();
    
   }
  
	}
);

  
  
}
);