// checkbox 1


  $(document).ready(function(){
      $('#select-all_l1').on('click',function(){
          if(this.checked){
              $('.checkbox1').each(function(){
                  this.checked = true;
              });
          }else{
              $('.checkbox1').each(function(){
                  this.checked = false;
              });
          }
      });
      
      $('.checkbox1').on('click',function(){
          if($('.checkbox1:checked').length == $('.checkbox1').length){
              $('#select-all_l1').prop('checked',true);
          }else{
              $('#select-all_l1').prop('checked',false);
          }
      });
  });


// checkbox 2

$(document).ready(function(){
    $('#select-all_l2').on('click',function(){
        if(this.checked){
            $('.checkbox2').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox2').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox2').on('click',function(){
        if($('.checkbox2:checked').length == $('.checkbox2').length){
            $('#select-all_l2').prop('checked',true);
        }else{
            $('#select-all_l2').prop('checked',false);
        }
    });
  });



//  check box 3


  $(document).ready(function(){
    $('#select-all_l3').on('click',function(){
        if(this.checked){
            $('.checkbox3').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox3').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox3').on('click',function(){
        if($('.checkbox3:checked').length == $('.checkbox3').length){
            $('#select-all_l3').prop('checked',true);
        }else{
            $('#select-all_l3').prop('checked',false);
        }
    });
  });

  
  
  
  //  check box 4


  $(document).ready(function(){
    $('#select-all_l4').on('click',function(){
        if(this.checked){
            $('.checkbox4').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox4').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox4').on('click',function(){
        if($('.checkbox4:checked').length == $('.checkbox4').length){
            $('#select-all_l4').prop('checked',true);
        }else{
            $('#select-all_l4').prop('checked',false);
        }
    });
  });


    //  check box 5


    $(document).ready(function(){
        $('#select-all_l5').on('click',function(){
            if(this.checked){
                $('.checkbox5').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox5').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.checkbox5').on('click',function(){
            if($('.checkbox5:checked').length == $('.checkbox5').length){
                $('#select-all_l5').prop('checked',true);
            }else{
                $('#select-all_l5').prop('checked',false);
            }
        });
      });


      //  check box 6


    $(document).ready(function(){
        $('#select-all_l6').on('click',function(){
            if(this.checked){
                $('.checkbox6').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox6').each(function(){
                    this.checked = false;
                });
            }
        });
        
        $('.checkbox6').on('click',function(){
            if($('.checkbox6:checked').length == $('.checkbox6').length){
                $('#select-all_l6').prop('checked',true);
            }else{
                $('#select-all_l6').prop('checked',false);
            }
        });
      });
  

    
    function w3RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
          arr1.splice(arr1.indexOf(arr2[i]), 1);     
        }
      }
      element.className = arr1.join(" ");
    }
    
    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    // var btns = btnContainer.getElementsByClassName("btn");
    // for (var i = 0; i < btns.length; i++) {
    //   btns[i].addEventListener("click", function(){
    //     var current = document.getElementsByClassName("active");
    //     current[0].className = current[0].className.replace(" active", "");
    //     this.className += " active";
    //   });
    // }