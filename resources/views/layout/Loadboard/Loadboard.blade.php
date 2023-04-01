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


<div class="page-main">
    @include('layout.dashboard.navigation')
     @include('layout.dashboard.sidebar')
  <!--app-content open-->
  <div class="app-content main-content mt-0" id="LB">
    <div class="side-app">
      <!-- CONTAINER -->
      <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
          <div>
            <h1 class="page-title">Loadboard</h1>
          </div>
          <div class="ms-auto pageheader-btn">
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="javascript:void(0);">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Loadboard</li>
            </ul>
          </div>
          <!-- <div class="dropdown"> -->
          <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
          <!-- </div> -->
        </div>
        <!-- PAGE-HEADER END -->
        <!-- ROW-4 -->
        <input type="hidden" name="_token" id="tokenLoadboard" value="{{ csrf_token() }}" />
        <div class="row">
            <div class="col-12 col-sm-12">
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-sm-6">
                          <div class="row">
                              <div class="col-3">
                                   <a href="#" id="addLoadBoard" class="button-57_alt button-58_alt">
                                   New Active Load</a>
                              </div>
   
                               <div class="redio-btn col-xl-2 padd-g">
								                    <div class="radio">
   								                      <input id="radio-1" name="radio" type="radio" checked="">
    						                        <label for="radio-1" class="radio-label">MC</label>
  						                      </div>
  								                  <div class="radio">
   								                      <input id="radio-2" name="radio" type="radio">
    							                      <label for="radio-2" class="radio-label">DOT
    							                      </label>
  								                   </div>
								                </div>
                                <div class="col-1">
                                <div class="searchmenu left-sect"> 
                                          <input type="search" name="searchinput" value="" class="search-input" placeholder="search">
                                             <button name="search" value="" id="" class="search"><i class="fa fa-search"></i></button>
                                          </div>
                                </div>
                          </div></div>
                          
                          <div class="col-12 col-sm-6">
                          <div class="relative inline-block">
                               <input type="text" class="place-box" placeholder="Search...">
                                <button class="but-box" type="button"><i class="fas fa-search"></i></button>
                    </div>
                              </div>
                  </div>
           
            </div>
          <!-- COL END -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card-body">
              <div class="row">
                <!-- <div class="col-2 btn-group submitter-group"><a href="#" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a></div> -->
                <div class="col-3">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Hide/Show</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="list-unstyled dropdown-menu dropdown-menu-lb show-btn" role="menu">
                      
                    
                    
                    <li>
                        <label for="c1" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c1" data-col="col-name" class="col-checkbox" /># </label>
                      </li>
                      <li>
                        <label for="c2" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c2" data-col="col-name" class="col-checkbox" />Invoice </label>
                      </li>
                      <li>
                        <label for="c3" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c3" data-col="col-name" class="col-checkbox" />Order Id </label>
                      </li>
                      <li>
                        <label for="c4" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c4" data-col="col-name" class="col-checkbox" />Status</label>
                      </li>
                      <li>
                        <label for="c5" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c5" data-col="col-name" class="col-checkbox" />Ship-Date</label>
                      </li>
                      <li>
                        <label for="c6" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c6" data-col="col-name" class="col-checkbox" />Ship-Date</label>
                      </li>
                      <li>
                        <label for="c7" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c7" data-col="col-name" class="col-checkbox" />Del-Date</label>
                      </li>
                      <li>
                        <label for="c8" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c8" data-col="col-name" class="col-checkbox" />Customer</label>
                      </li>
                      <li>
                        <label for="c9" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c9" data-col="col-name" class="col-checkbox" />Carrier/Driver/Owner Operator</label>
                      </li>
                      <li>
                        <label for="c10" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c10" data-col="col-name" class="col-checkbox" />Origin</label>
                      </li>
                      <li>
                        <label for="c11" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c11" data-col="col-name" class="col-checkbox" />Truck</label>
                      </li>
                      <li>
                        <label for="c12" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c12" data-col="col-name" class="col-checkbox" /> Load Pay</label>
                      </li>
                      <li>
                        <label for="c13" style="display: block;">
                          <input style="margin-right: 5px;" type="checkbox" id="c13" data-col="col-name" class="col-checkbox" /> Carrier Pay/Driver Pay</label>
                      </li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-info2">Display All</button>
                </div>
                <div class="col-8 submitter-group ">
                  <input type="checkbox" data-name="Open" class="filter-checkbox checkbox_new bg1" />
                  <input type="checkbox" data-name="Dispatched" class="filter-checkbox checkbox_new bg2" />
                  <input type="checkbox" data-name="Arrived Shipper" class="checkbox_new_alt bg3" />
                  <input type="checkbox" data-name="Loaded" class="checkbox_new bg4" />
                  <input type="checkbox" data-name="On Route" class="checkbox_new_alt2 bg5" />
                  <input type="checkbox" data-name="Arrived Consignee" class="checkbox_new_alt3 bg6" />
                  <input type="checkbox" data-name="Delivered" class="checkbox_new bg7"/>
                  <input type="checkbox" data-name="Break Down" class="checkbox_new_alt4 bg8"/>
                </div>
                <div class="col-1">
                  <button type="" class="button-70 add-button">









                    <i class="fa fa-search" style="font-size: 11px;margin-left: -5px;margin-right: 5px;"></i>Filter </button>
                </div>
                <!-- <div class="col-9 btn-group submitter-group "><ul class="filter-wrapper ks-cboxtags" ><li><input type="checkbox" class="filter-checkbox" id="checkboxOne" value="Open"><label for="checkboxOne">Open</label></li><li><input type="checkbox" class="filter-checkbox" id="checkboxTwo" value="Dispatched"><label for="checkboxTwo">Dispatched</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Shipper"><label for="">Arrived Shipper</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Loaded"><label for="">Loaded</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="On Route"><label for="">On Route</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Consignee"><label for="">Arrived Consignee</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Delivered"><label for="">Delivered</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Break Down"><label for="">Break Down</label></li></ul></div> -->
              </div>
            </div>
            <div class="card-body padd-new">
              <input type="hidden" class="_id">
              <div class="table-responsive table-scroll">
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
                    </tr>
                  </thead>
                  <tbody id="LoadBoardTable" class="load-box"></tbody>
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
@include('layout.loadboard.addLoadboard')
@include('layout.loadboard.addLoadboard_function')

@include('layout.dashboard.footer')	


<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
