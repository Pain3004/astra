<style>

.navtabs_2{
    
    
    width: 100%;
    /* padding: 20px 10px;  */
    font-size:12px
    
  }
  .nav-tab-list{
      margin-bottom: 0px;
  }
  
    .custom_tab-list{
      background-color: #056d92;
      padding: 15px;
      border: 1px solid black;
      border-width: 100%;
      
    }
    .tab{
      border: 1px black;
      background-color: rgb(244, 240, 240);
      border-radius: 5px;
      padding: 5px;
      color: black;
      font-weight: bold;
      margin: 2px;
    }
  
  
  
      .tab-content{
      /* border: 1px black; */
      border-bottom: 1px solid;
    border-left: 1px solid;
    border-right: 1px solid;
      background-color: rgb(245, 239, 239);
      padding: 20px 20px;
      /* border-radius: 20px; */
      border-bottom-left-radius:20px ;
    border-bottom-right-radius: 20px;
      
       color: black; 
      font-weight: bold;
      text-decoration: none;
    } 
    
    .container1{
      padding: 20px;
      display: flex;
      justify-content: space-between;
    }
    .container2{
      
      padding: 20px;
      display: flex;
      justify-content: space-between;
    }
    
  .name1
  {
      display: flex;
      flex-direction: column;
  }
  
   
  .name1 input
  {
      width: 139px;
  }
  
  .custom_tab-list{
      display: flex;
      
      
  }


  .tab_style{
        /* border: 1px black; */
        border-bottom: 1px solid;
    border-left: 1px solid;
    border-right: 1px solid;
    background-color: rgb(245, 239, 239);
    padding: 20px 20px;
    /* border-radius: 20px; */
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    color: black;
    font-weight: bold;
    text-decoration: none;
  }

  .nav-item-custom{
    background-color: #fff;
    padding-left: 10;
    color: #000;
    margin-right: 5px;
    border-radius: 15px;
  }

  .active1{
    background-color: #fff;
    color: #000;
  }

</style>


@include('layout.dashboard.header')

@include('layout.loader')
@include('layout.Loadboard.extnavigation')

<div class="page-main">
   
  <div class="app-content main-content mt-0" id="LB">
    <div class="side-app">
      <!-- CONTAINER -->
      <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
						<!-- <div class="page-header">
							<div>
								<h1 class="page-title">Loadboard</h1>
							</div>
						</div> -->
						<!-- PAGE-HEADER END -->
        <!-- ROW-4 -->
        <input type="hidden" name="_token" id="tokenLoadboard" value="{{ csrf_token() }}" />
        <div class="row">
            
          <!-- COL END -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card-body">
             
            </div>
            <div class="card-body padd-new">
              <input type="hidden" class="_id">
              <div class="table-responsive table-scroll" style="height: 700px;">
                 <table class="table dataTable no-footer" style="border-spacing: 4px;border-collapse: unset !important;"> 
                  <thead class="thead_th">
                    <tr class="tr">
                      <th class="th_new">ID</th>
                      <th class="th_new">Invoice</th>
                      <th class="th_new">Order Id</th>
                      <th class="th_new">Status</th>
                      <th class="th_new">Ship-Date</th>
                      <th class="th_new">Del-Date</th>
                      <th class="th_new">Customer</th>
                      <th class="th_new">Carrier/Driver/Owner Operator</th>
                      <th class="th_new">Origin</th>
                      <th class="th_new">Destination</th>
                      <th class="th_new">Truck</th>
                      <th class="th_new">Trailer</th>
                      <th class="th_new">Load Pay</th>
                      <th class="th_new">Carrier Pay/Driver Pay</th>
                      <th class="th_new">Action</th>
                    </tr>
                  </thead>
                  <tbody id="extLoadBoardTable" class="load-box"></tbody>
                </table>
              </div>
            </div>
          </div>  
          <!-- COL END -->
        </div>
        <!-- ROW-4 END -->
      </div>
    </div>
  </div>
  <!-- CONTAINER END -->
</div>


@include('layout.dashboard.footer')	


<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->

  <!-- <script src="{{URL::to('/')}}/assets/js/js/extloadboard.js"></script> -->
  <script>

</script>