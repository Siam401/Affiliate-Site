<?php
	$name='';
	if (Session::has('name'))
	{
		$name = Session::get('name');
	}
?>

<div id="kt_header" class="header header-fixed">
  <!--begin::Container-->
  <div class="container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::Header Menu Wrapper-->
    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
    </div>
    <!--end::Header Menu Wrapper-->
    <!--begin::Topbar-->
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <div class="topbar">
		
		
      <div class="dropdown">
        <!--begin::Toggle-->
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
          <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
            <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ $name }}</span>
            <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
              <span class="symbol-label font-size-h5 font-weight-bold">V</span>
            </span>
          </div>
        </div>
        <!--end::Toggle-->
        <!--begin::Dropdown-->
        <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
          <!--begin::Nav-->
          <ul class="navi navi-hover py-4">
            <!--begin::Item-->
            <li class="navi-item">
              <a href="{{ route('logout') }}" class="navi-link btn">Sign out</a>
            </li>
          </ul>
          <!--end::Nav-->
        </div>
        <!--end::Dropdown-->
      </div>
    </div>
    <!--end::Topbar-->
  </div>
  <!--end::Container-->
</div>


<script>
	function showMessages(){
		// alert('asd');
	  $("#message-div").empty(); 
      $.ajax({
          type: 'GET',
          url: '/dcs/getNotification',
          dataType: 'json',
          success: function (data) {
              console.log(data[0].readstatus);
			  var div='';
              if(data.length==0){
                  $("#message-div").append('<div class="d-flex flex-center text-center text-muted min-h-200px">No Notification</div>')
              }else{
                  for(var i=0; i<data.length; i++){
                      var id    =data[i].id
                      var readstatus    =data[i].readstatus
                      var message =data[i].message
                      var docreff   =data[i].docreff
                      var created_at   =data[i].created_at
                      
                      if(readstatus=='0'){
                        var div='<a onclick="readMessages('
						div+=id
						div+=')"  href="'
						div += docreff
						div += '"' 
						div += 'class="navi-item"><div class="navi-link"><div class="navi-text"><div class="font-weight-bold text-primary">'
						div += message
						div += '</div><div class="text-muted">'
						div += created_at
						div += '</div></div></div></a>'

						$("#message-div").append(div);
                      }                      
                  }
                  for(var i=0; i<data.length; i++){
                      var readstatus    =data[i].readstatus
                      var message =data[i].message
                      var docreff   =data[i].docreff
                      var created_at   =data[i].created_at
                      
					  if(readstatus=='1'){
                        var div='<a href="'
						div += docreff
						div += '"' 
						div += 'class="navi-item"><div class="navi-link"><div class="navi-text"><div class="font-weight-bold">'
						div += message
						div += '</div><div class="text-muted">'
						div += created_at
						div += '</div></div></div></a>'

						$("#message-div").append(div);
                      }
                      
                  }
              }
          },
          error: function (ex) {
			$("#message-div").append('<div class="d-flex flex-center text-center text-muted min-h-200px">No Notification</div>')
          }
      });
	}

	function readMessages(id){
		$.ajax({
        url: '/dcs/readNotification',
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            id:id
            },
        success:function(data){
        }
    });
	}
</script>