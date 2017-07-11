<script type="text/javascript">
    var base_url = "{{config('config.url')}}";
    $(document).ready(function(){
        $(document).idleTimeout({
            inactivity: 3000000, 
            noconfirm: 900000,      
            sessionAlive:900000,
            redirect_url :base_url + "/user/logout"
        });
    });
</script>

<div class="row">
    		<div class="col-md-8">
    			<div class="row row-top-menu">
    				<div class="col-md-2 col-top-menu1">	
    					<img src="{{URL::asset('img/popbox-logo1.png')}}" class="logo">
    				</div>
    				<a href="/customer"><div class="col-md-2 col-top-menu {{($type=="customer") ? 'active' : ''}}">Customer</div></a>
                    <a href="/transaction"><div class="col-md-2 col-top-menu {{($type=="transaction") ? 'active' : ''}}">Transaction</div></a>
                    <a href="/transaction/taken"><div class="col-md-2 col-top-menu {{($type=="Customer_taken") ? 'active' : ''}}">Customer Taken</div></a>
                    <!-- <a href="/report/biaya"><div class="col-md-2 col-top-menu {{($type=="Laporan_Pelanggan") ? 'active' : ''}}">Laporan Pelanggan</div></a>
                    <a href="/report/pengiriman"><div class="col-md-2 col-top-menu {{($type=="Laporan_Pengiriman") ? 'active' : ''}}">Laporan Pengiriman</div></a> -->    
                    <div class="col-md-2 col-top-menu1">
                        <div class="dropdown">
                            <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Laporan
                                    <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>
                                     <a href="/report/biaya">Laporan Pelanggan</a>
                                </li>  
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="/report/pengiriman">Laporan Pengiriman</a>
                                </li>                          
                                
                            </ul>
                        </div>                      
                    </div>                  
    			</div>
    		</div>
    	<div class="col-md-4">
    	<div class="row">
    		<div class="col-md-11 col-top-menu-user">
    			<div class="dropdown">
					<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    {{\Auth::user()->first_name}} {{\Auth::user()->lasts_name}}
						    <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="/user/list">User</a></li>	
                        <li role="separator" class="divider"></li>
                        <li><a href="/role/list">Role</a></li>  					    
					    <li role="separator" class="divider"></li>
				        <li><a href="/user/logout">logout</a></li>
		  		    </ul>
				</div>    					
    		</div>
    		<div class="col-md-1 col-top-menu-user">
    			<img src="{{URL::asset('img/user.png')}}" class="user" />
        	</div>
    	</div>
 	</div>
</div>

<div class="row">
        <div class="col-md-12">
            <div class="status-barang">{{ucwords(str_replace("_"," ",$type))}}</strong></div>
        </div>          
    </div>