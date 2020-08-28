
                <!-- Page content -->
                <div id="content" class="col-md-12">

                    <!-- page header -->
                    <div class="pageheader">

                        <h2>
                            <i class="fa fa-bell" style="line-height: 48px;padding-left: 0;"></i>
                            시험관리
                            </h2>

                        <div class="breadcrumbs">
                            <ol class="breadcrumb" style="line-height: 48px;">
                                <li>You are here</li>
                                <li>
                                    NAVIGATION
                                </li>
                                <li class="active">시험현황</li>
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


                  <!-- tile body -->
                  <section class="tile color transparent-white">

                  <!-- tile body -->
                  <div class="tile-body nopadding">
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <td class="col-md-12" colspan="5">
                            <input type="button" id="examBtn" class="btn btn-sm btn-primary" style="float:right;" value="시험등록">
                          </td>
                        </tr>
                        <tr>
                          <th class="col-md-2">No</th>
                          <th class="col-md-2">회차</th>
                          <th class="col-md-4">시험상세</th>
                          <th class="col-md-2">시험일</th>
                          <th class="col-md-2">채점 상태</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($LIST as $lt){
                          ?>
                        <tr>
                          <td><?php echo $lt->ETL_SEQ?></td>
                          <td><?php echo $lt->ETL_SEQ?></td>
                          <td><?php echo "<a href='/admin/exam_detail'>" . $lt->ETL_NAME . "</a>"?></td>
                          <td><?php echo $lt->ETL_DATE?></td>
                          <td><?php switch($lt->ETL_STATUS == 0){
                                        case 0:
                                            echo "<span class='badge badge-danger'>미진행</span>";
                                            break;
                                        case 1:
                                            echo "<span class='badge badge-primary'>진행중</span>";
                                            break;
                                        case 2:
                                            echo "<span class='badge badge-green'>완료</span>";
                                            break;
                                        default:
                                            echo "";

                                    };                        
                          ?>
                        </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    

                  </div>
                  <!-- /tile body -->
                  
                


                </section>
                  <!-- /tile body -->

                  <div id="cModal" class="cmodal" style="display: block;">
                        
                        <div class="title-header">
                    X    
                    </div>
                        <div class="cmodal-content">
                        <div id="cmodal-title" class="cmodal-title">
                            <span> 시험 등록</span>
                        </div>

                        <div class="tile-body">
                        <div class="row">
                                <div class="form-group col-sm-2">회차</div>
                                <div class="form-group col-sm-2">등급</div>
                                <div class="form-group col-sm-5">시험상세</div>
                                <div class="form-group col-sm-3">시험일</div>
                            </div>


                            <div class="row">
                                <div class="form-group col-sm-2"><input class="form-control input-sm margin-bottom-10" type="text" placeholder="#"></div>
                                <div class="form-group col-sm-2"><input class="form-control input-sm margin-bottom-10" type="text" placeholder="등급"></div>
                                <div class="form-group col-sm-5"><input class="form-control input-sm margin-bottom-10" type="text" placeholder="시험상세"></div>
                                <div class="form-group col-sm-3"><input class="form-control input-sm margin-bottom-10" type="text" placeholder="시험일"></div>
                            </div>

                            <div class="row cmodal-button">
                                <button type="button" id="cSubmit" class="btn btn-sm btn-primary" style="display: inline-block;">저장하기</button>
                                <?php
                                $AUTH = 0; 
                                if($AUTH == 0){
                                    echo "<button type='button' id='cModify' class='btn btn-sm btn-warning'>수정</button>";
                                    }
                                ?>
                            </div>
                        <div>
                            
                    </div>




                        </div>
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
            $(document).keydown(function(event) {
                if ( event.keyCode == 27 || event.which == 27 ) {
                    $('#cModal').css("display", "none");
                    // xhr.abort();
                }
            });

                $("#examBtn").click( function () {
                    $('#cModal').css("display", "block");
                });
            


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