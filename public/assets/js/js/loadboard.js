$(document).ready(function() {
    dataTable = $("#example").DataTable({
      
      
    });
  
  
  
  /*dataTable.columns().every( function () {
        var that = this;
 
        $('input', this.footer()).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that.search(this.value).draw();
            }
        });
      });*/
  
  
    $('.filter-checkbox').on('change', function(e){
      var searchTerms = []
      $.each($('.filter-checkbox'), function(i,elem){
        if($(elem).prop('checked')){
          searchTerms.push("^" + $(this).val() + "$")
        }
      })
      dataTable.column(2).search(searchTerms.join('|'), true, false, true).draw();
    });
  
    $('.status-dropdown').on('change', function(e){
      var status = $(this).val();
      $('.status-dropdown').val(status)
      console.log(status)
      //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
      dataTable.column(7).search(status).draw();
    })
});