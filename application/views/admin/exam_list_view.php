
                <!-- Page content -->
                <div id="content" class="col-md-12" style="background:#fff;">

                    <!-- page header -->
                    <div class="pageheader">

                        <h2>
                            시험 현황
                            </h2>

                        <div class="breadcrumbs">
                            <ol class="breadcrumb" style="line-height: 48px;">
                                <li>You are here</li>
                                <li class="active">시험 현황</li>
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
                  <section class="tile">
                    <div class="tile-header">
                    
                  <?PHP 
                    if($this->session->userdata("admin_id") != "")
                        echo "<button id='examBtn' class='btn btn-sm btn-primary' style='float:right'>시험등록</button>";

                  ?>
                    </div>
                 
                  <!-- tile body -->
                  <div class="tile-body">
                    
                    <table class="table table-bordered table-hover table-condensed">
                      <thead>
                        <tr>
                          <th class="col-md-1">No</th>
                          <th class="col-md-1">회차</th>
                          <th class="col-md-1">등급</th>
                          <th class="col-md-4">시험명</th>
                          <th class="col-md-2">시험일</th>
                          <th class="col-md-1">상태</th>
                          <th class="col-md-2">#</th>

                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $PAGENUM = $LIST_COUNT;
                          foreach($LIST as $lt){
                              
                          ?>
                        <tr>
                          <td><?php echo $PAGENUM?></td>
                          <td><?php echo $lt->ETL_ROUND?></td>
                          <td><?php switch($lt->ETL_LEVEL){
                                        case 0:
                                            echo "<label class='label label-default'>초급</label>";
                                            break;
                                        case 1:
                                            echo "<label class='label label-warning'>중급</label>";
                                            break;
                                        case 2:
                                            echo "<label class='label label-danger'>고급</label>";
                                            break;
                                        default:
                                            echo "";
                                    };
                              ?></td>
                              <td>
                              <?php 
                                    if($this->session->userdata("admin_id") == ""){
                                    echo "<a href='/admin/paperCheck?EID=" . $lt->ETL_SEQ . "'>" . $lt->ETL_NAME . "</a>"; 
                                    } else {
                                    echo "<a href='/admin/examCreate?EID=" . $lt->ETL_SEQ . "'>" . $lt->ETL_NAME . "</a>";
                                    }
                              ?>
                              </td>

                              

                                
                          <td><?php echo $lt->ETL_DATE?></td>
                          <td><?php switch($lt->ETL_STATUS){
                                        case 0:
                                            echo "<span class='badge badge-danger'>문항등록 필요</span>";
                                            break;
                                        case 1:
                                            echo "<span class='badge badge-primary'>등록완료</span>";
                                            break;
                                        case 2:
                                            echo "<span class='badge badge-green'>완료</span>";
                                            break;
                                        default:
                                            echo "";

                                    };                        
                          ?>
                        </td>
                        <td><?php 
                            echo "<button type='button' class='btn btn-xs btn-danger' onclick='deleteExam(" . $lt->ETL_SEQ . ")'>시험 삭제</button>";
                        ?></td>
                        </tr>
                        <?php
                            $PAGENUM -= 1;
                          }
                        ?>
                      </tbody>
                    </table>
                    

                  </div>
                  <!-- /tile body -->
                  
                


                </section>
                  <!-- /tile body -->

                  <div id="examModal" class="modal">
                        <form id="examWriteForm" name="exam-write-form">
                        <div class="modal-content">
                        <div id="modal-title" class="modal-title">
                            <span>시험 등록</span>
                        </div>
                        
                        <div class="tile-body">
                        <div class="row">
                                <div class="form-group col-sm-4">회차</div>
                                <div class="form-group col-sm-8"><input class="form-control input-sm margin-bottom-10" type="text" name="exam_round" id="exam_round" required></div>
                                <div class="form-group col-sm-4">시험명</div>
                                <div class="form-group col-sm-8"><input class="form-control input-sm margin-bottom-10" type="text" name="exam_name" id="exam_name" required></div>
                                <div class="form-group col-sm-4"><b>답안지 이미지 장수</b> </div>
                                <div class="form-group col-sm-8"><input class="form-control input-sm margin-bottom-10" type="text" name="exam_paper" id="exam_paper" placeholder="※중요※ 학생 당 답안지의 장수를 정확히 입력해주세요." required></div>
                                <div class="form-group col-sm-4">시험 레벨</div>
                                <div class="form-group col-sm-8">
                                <select class="chosen-select input-sm form-control" name="exam_level" id="exam_level" required>
                                    <option value="">선택</option>
                                    <option value=0>초급</option>
                                    <option value=1>중급</option>
                                    <option value=2>고급</option>
                                </select>
                                </div>
                                <div class="form-group col-sm-4">시험일</div>
                                <div class="form-group col-sm-8"><input class="form-control input-sm margin-bottom-10" type="date" name="exam_date" id="exam_date" required></div>
                                <div class="form-group col-sm-4">시험상세</div>
                                <div class="form-group col-sm-8"><textarea rows="4" class="form-control margin-bottom-10" name="exam_comment" id="exam_comment" required></textarea></div>
                            </div>

                            <div class="row modal-button">
                                <button type="button" id="examSave" class="btn btn-sm btn-primary" style="display: inline-block;">저장하기</button>
                                <button type="button" id="examClose" class="btn btn-sm btn-default" style="display: inline-block;">닫기</button>
                            </div>
                        <div>
                        </form>
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
                    $('#examModal').css("display", "none");
                    // xhr.abort();
                }
            });

            $("#examBtn").click( function () {
                $('#examModal').css("display", "block");
            });

            $("#examClose").click( function () {
                $('#examModal').css("display", "none");
            });            

            $("#examSave").click( function () {
                if($("#exam_round").val() == ""){
                    $("#exam_round").focus();
                    $("#exam_round").attr("placeholder", "회차를 입력하세요.")
                    return false;
                }
                if($("#exam_name").val() == ""){
                    $("#exam_name").focus();
                    $("#exam_name").attr("placeholder", "시험명을 입력하세요.")
                    return false;
                }

                if($("#exam_paper").val() == ""){
                    $("#exam_paper").focus();
                    $("#exam_paper").attr("placeholder", "시험명을 입력하세요.")
                    return false;
                }

                if($("#exam_level").val() == ""){
                    $("#exam_level").focus();
                    $("#exam_level").attr("placeholder", "등급을 선택하세요.")
                    return false;
                }
                if($("#exam_date").val() == ""){
                    $("#exam_date").focus();
                    $("#exam_date").attr("placeholder", "시험날짜를 선택하세요.")
                    return false;
                }
                if($("#exam_comment").val() == ""){
                    $("#exam_comment").focus();
                    $("#exam_comment").attr("placeholder", "시험상세를 입력하세요.")
                    return false;
                }

                let formData = $("#examWriteForm").serialize();
                $.ajax({
                    type : "post"
                    , url : "/Exam/saveExamCase"
                    , dataType : "json"
                    , data : formData
                    , success : function(data){
                        console.log(data)
                        location.reload();
                    }
                    , error : function(data, status, err) {
    				    alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
    			    }
                });
                console.log(formData);
            })
            
            function deleteExam(ETL_SEQ){
                if(confirm("시험을 삭제하시겠습니까?")){
                    if(confirm("정말로 삭제하시겠습니까? 해당 시험과 관련된 모든 데이터가 사라집니다.")){
                    $.ajax({
                        type : "post"
                        , url : "/Exam/deleteExamBySeq"
                        , dataType : "json"
                        , data : { "ETL_SEQ" : ETL_SEQ }
                        , success : function(data){
                            console.log(data)
                            location.reload();
                        }
                        , error : function(data, status, err) {
                            alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                        }
                    })
                }
                }
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