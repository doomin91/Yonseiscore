
                <!-- Page content -->
                <div id="content" class="col-md-12">

                    <!-- page header -->
                    <div class="pageheader">

                        <h2>
                            <i class="fa fa-lightbulb-o" style="line-height: 48px;padding-left: 0;"></i>
                            관리자 패스워드 관리
                            </h2>

                        <div class="breadcrumbs">
                            <ol class="breadcrumb" style="line-height: 48px;">
                                <li>You are here</li>
                                <li>
                                    NAVIGATION
                                </li>
                                <li>
                                    관리 메뉴
                                </li>
                                <li class="active">관리자 패스워드 관리</li>
                            </ol>
                        </div>

                    </div>
                    <!-- /page header -->

                    <!-- content main container -->
                    <div class="main">

                        <!-- row -->
                        <div class="row">

                            <!-- col 12 -->
                            <div class="col-md-6">

                                <!-- tile -->
                                

                                <section class="tile color transparent-black">



                  <!-- tile header -->
                  <div class="tile-header">
                        <h1>비밀번호 변경</h1>
                  </div>
                  <!-- /tile header -->

                  <!-- tile body -->
                  <div class="tile-body">
                    
                    <form class="form-horizontal" role="form">
                      
                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">Current Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="ad_pw">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">New Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="ad_new_pw">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="input01" class="col-sm-4 control-label">New Password confirm</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="ad_new_pw_confirm">
                        </div>
                      </div>

                      <div class="form-group form-footer">
                        <div class="col-sm-offset-4 col-sm-8">
                          <button id="changeBtn" type="button" class="btn btn-primary">변경</button>
                          <button type="reset" class="btn btn-default">취소</button>
                        </div>
                      </div>



                    </form>

                  </div>
                  <!-- /tile body -->
                  
                


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


        $('#changeBtn').click( function () {
            var ad_pw = $('#ad_pw').val();
            var ad_new_pw = $('#ad_new_pw').val();
            var ad_new_pw_confirm = $('#ad_new_pw_confirm').val();
            
            if(ad_pw == ""){
                alert("비밀번호를 입력해주세요.");
                $('#ad_pw').focus();
                return false;
            }
            if(ad_new_pw == ""){
                alert("새로운 비밀번호를 입력해주세요.");
                $('#ad_new_pw').focus();
                return false;
            }
            if(ad_new_pw_confirm == ""){
                alert("새로운 비밀번호를 재입력해주세요.");
                $('#ad_new_pw_confirm').focus();
                return false;
            }
            if(ad_new_pw != ad_new_pw_confirm){
                alert("새로운 비밀번호가 일치하지 않습니다.");
                $('#ad_new_pw').focus();
                return false;
            }



            $.ajax({
                			type: 'post'
                			, async: true
                            , data: {"ad_pw" : ad_pw,
                                    "ad_new_pw" : ad_new_pw
                            }
                			, url: "/Admin/ChangeAdminPassword"
                			, dataType: "json"
                			, success: function(data) {
                                    alert(data['msg']);
                                    document.location.reload();
                                    
                			  }
                			, error: function(data, status, err) {
                                    console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                              }
                		});


        })

       </script>
    </body>
</html>