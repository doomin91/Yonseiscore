
                <!-- Page content -->
                <div id="content" class="col-md-12" style="background:#fff;">

                    <!-- page header -->
                    <div class="pageheader">

                        <h2>
                            <i class="fa fa-bell" style="line-height: 48px;padding-left: 0;"></i>
                            공지사항
                            </h2>

                        <div class="breadcrumbs">
                            <ol class="breadcrumb" style="line-height: 48px;">
                                <li>You are here</li>
                                <li>
                                    NAVIGATION
                                </li>
                                <li class="active">공지사항</li>
                            </ol>
                        </div>

                    </div>
                    <!-- /page header -->

                    <!-- content main container -->
                    <div class="main">

                        <!-- row -->
                        <div class="row">

                            <!-- col 12 -->
                            <div class="col-md-12">

                                <!-- tile -->
                                <section class="tile color transparent-black">


                  <!-- tile body -->
                  <section class="tile color transparent-black">



                  <!-- tile header -->
                  <div class="tile-header">
                    <div class="controls">
                      <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                      <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body nopadding">
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <td class="col-md-12" colspan="5">
                            <button class="btn btn-sm btn-primary" style="float:right;">글쓰기</button>
                          </td>
                        </tr>
                        <tr>
                          <th class="col-md-1">#</th>
                          <th class="col-md-4">제목</th>
                          <th class="col-md-1">등록자</th>
                          <th class="col-md-2">등록일</th>
                          <th class="col-md-2">관리자 메뉴</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>3회차 실기시험 채점안내</td>
                          <td>관리자</td>
                          <td>2020-08-07</td>
                          <td>
                            <button class="btn btn-xs btn-primary">수정</button>
                            <button class="btn btn-xs btn-danger">삭제</button>
                            <button class="btn btn-xs btn-slategray">숨김</button>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>2회차 실기시험 채점안내</td>
                          <td>관리자</td>
                          <td>2020-08-06</td>
                          <td>
                            <button class="btn btn-xs btn-primary">수정</button>
                            <button class="btn btn-xs btn-danger">삭제</button>
                            <button class="btn btn-xs btn-slategray">숨김</button>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>1회차 실기시험 채점안내</td>
                          <td>관리자</td>
                          <td>2020-08-01</td>
                          <td>
                            <button class="btn btn-xs btn-primary">수정</button>
                            <button class="btn btn-xs btn-danger">삭제</button>
                            <button class="btn btn-xs btn-slategray">숨김</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <div class="row">
                      <div class="col-md-4 sm-center">

                      </div><div class="col-md-12"></div>
                        <div class="col-md-12 text-right sm-center">
                          <div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
                            <ul class="pagination"><li class="prev disabled"><a href="#">Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next</a></li></ul></div></div></div>


                  </div>
                  <!-- /tile body -->
                  
                


                </section>
                  <!-- /tile body -->




                        </div>
                   </div>

                                </section>
                                <!-- /tile -->

                            </div>
                            <!-- /col 12 -->

                        </div>
                        <!-- /row -->

                    </div>
                    <!-- /content container -->

                </div>
                <!-- Page content end -->

            </div>
            <!-- Make page fluid-->

        </div>
        <!-- Wrap all page content end -->

        <section class="videocontent" id="video"></section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed
        -->
        <script src="/assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="/assets/js/vendor/bootstrap/bootstrap-dropdown-multilevel.js"></script>
        
        <script
            type="text/javascript"
            src="/assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
        <script
            type="text/javascript"
            src="/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script
            type="text/javascript"
            src="/assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- <script
            type="text/javascript"
            src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script> -->
        
        <!-- <script type="text/javascript" src="/assets/js/vendor/blockui/jquery.blockUI.js"></script>\ -->

       

        <!-- <script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script> -->

        <script src="/assets/js/minimal.min.js"></script>
       <script>
           let xhr = $.ajax();

            $(document).keydown(function(event) {
                if ( event.keyCode == 27 || event.which == 27 ) {
                    $('#cModal').css("display", "none");
                    ModalInit();
                    xhr.abort();
                }
            });


            $('#newBtn').click( function () {
                ModalInit();
                $('#cModal').css("display", "block");
                $('#cSubmit').css("display", "inline-block");
                $('#cModify').css("display", "none")
                $('#cli_profile_img').css("display", "none");
                $('#cli_profile_doc').addClass("hide");
            }); 

            $('#cSubmit').click( function () {
                var cli_sub = $('#cli_sub').val();
                var cli_name = $('#cli_name').val();
                var cli_url = $('#cli_url').val();
                var cli_comment = $('#cli_comment').val();
                var cli_profile = $("#cli_profile")[0].files[0];

                if(cli_name == ""){
                    alert("이름을 입력해주세요.");
                    return false;
                }                
                if(cli_url == ""){
                    alert("URL을 입력해주세요.");
                    return false;
                }            
                // if(cli_comment == ""){
                //     alert("설명을 입력해주세요.");
                //     return false;
                // }                
                if(cli_profile == ""){
                    alert("파일을 선택해주세요.");
                    return false;
                }      
                var formData = new FormData();
                formData.append("cli_sub", cli_sub);
                formData.append("cli_name", cli_name);
                formData.append("cli_url", cli_url);
                formData.append("cli_comment", cli_comment);
                formData.append("cli_profile", $("#cli_profile")[0].files[0]);
                
                console.log(formData);
                loading();
                xhr = $.ajax({
                    type : "POST",
                    url : "/Admin/UploadClient",
                    dataType : "JSON",
                    data : formData,
                    contentType: false,
                    processData: false,
                    success : function(data){
                        console.log(data["msg"]);
                    if (data['code'] == "200"){
                        document.location.reload();
                    }
                }, error: function(data, status, err) {
                    alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                    document.location.reload();
                }
                
                });

            });

            $('#cModify').click( function () {
                var cli_seq = $("#cli_seq").val()
                var cli_sub = $('#cli_sub').val();
                var cli_name = $('#cli_name').val();
                var cli_url = $('#cli_url').val();
                var cli_comment = $('#cli_comment').val();
                var cli_profile = $("#cli_profile")[0].files[0];

                var formData = new FormData();
                formData.append("cli_seq", cli_seq);
                formData.append("cli_sub", cli_sub);
                formData.append("cli_name", cli_name);
                formData.append("cli_url", cli_url);
                formData.append("cli_comment", cli_comment);

                if(($("#cli_profile")[0].files[0])){
                    console.log($("#cli_profile")[0].files[0]);
                    formData.append("cli_profile", $("#cli_profile")[0].files[0]);
                } 

                xhr = $.ajax({
                    type : "POST",
                    url : "/Admin/ModifyClient",
                    dataType : "JSON",
                    data : formData,
                    contentType: false,
                    processData: false,
                    success : function(data){
                        console.log(data["msg"]);
                    if (data['code'] == "200"){
                        document.location.reload();
                    }
                }, error: function(data, status, err) {
                    alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                    document.location.reload();
                }
                
                });



            })

            $('#cCancle').click( function () {
                $('#cModal').css("display", "none");
                xhr.abort();

                return false;
            });
      
            function deleteChk(seq){
                let chk = confirm("정말로 삭제하시겠습니까?");
                if(chk)
                {
                    loading();
                    $.ajax({
                			type: 'post'
                			, async: true
                			, data: {"seq" : seq}
                			, url: "/Admin/DeleteClient"
                			, dataType: "json"
                			, success: function(data) {
                                    document.location.reload();
                                    loading();
                			  }
                			, error: function(data, status, err) {
                                    loading();
                                    console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                    
                              }
                		});
                }
            }


            $('#cImgDel').click ( function () {
                $('#cli_profile_img').css("display", "none");
                $('#cli_profile_doc').addClass("hide");
                $('#cli_profile').css("display", "block");
                $('#cli_profile').attr("disabled", false);
            })


            function modifyChk(seq){
                ModalInit();
                $('#cSubmit').css("display", "none");
                $('#cModify').css("display", "inline-block")
                $('#cmodal-title').html('<span>클라이언트 수정</span>');
                $('#cModal').css("display", "block");
                $('#cli_profile_img').css("display", "block");
                    
                loading();
                    xhr = $.ajax({
                			type: 'post'
                			, async: true
                			, data: {"seq" : seq}
                			, url: "/Admin/CheckClient"
                			, dataType: "json"
                			, success: function(data) {
                                    console.log(data);
                                    $('#cli_seq').val(data["cli_seq"]);
                                    $('#cli_sub').val(data["cli_sub"]);
                                    $('#cli_name').val(data["cli_name"]);
                                    $('#cli_url').val(data["cli_url"]);
                                    $('#cli_comment').val(data["cli_comment"]);

                                    $('#cli_profile_img_src').attr("src", "/upload/client/" + data["cli_profile"]);
                                    $('#cli_profile_doc').text(data["cli_profile"]);
                                    $('#cli_profile_doc').removeClass("hide");
                                    
                                    if($('#cli_profile_doc').text() != ""){
                                        $('#cli_profile').css("display", "none");
                                        $('#cli_profile').attr("disabled", true);
                                    } else {
                                        $('#cli_profile_img').css("display", "none");
                                    }
                                    
                                    $('#cModal').css("display", "block");

                			  }
                			, error: function(data, status, err) {
                                    console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                              }
                            , complete: function () {
                                    loading();
                            }
                		});
                
            }

            function ModalInit(){
                $('#cli_name').val('');
                $('#cli_url').val('');
                $('#cli_comment').val('');
                $('#cli_profile_doc').val('');
                $('#cli_profile_doc').addClass("hide");
                $('#cli_profile').css("display", "block")
                $('#cli_profile').attr("disabled", false)
            }

            function loading () {
                if ($('#loader').css("display") == "none"){
                    $('.mask').css("display", "block");
                    $('#loader').css("display", "block");
                } else {
                    $('.mask').css("display", "none");
                    $('#loader').css("display", "none");
                }                
            }

</script>