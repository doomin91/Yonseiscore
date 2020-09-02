<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff";>

    <!-- page header -->
    <div class="pageheader">

        <h2>
            시험지 관리
        </h2>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>You are here</li>
                <li>
                    관리 메뉴
                </li>
                <li class="active">시험지 관리</li>
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

                <section class="tile">


                    <!-- tile body -->
                    <div class="tile-body">
                        <table class="table table-bordered table-hover table-condensed">
                            <tr class="info">
                                <td class="col-md-1">회차</td>
                                <td class="col-md-2">시험명</td>
                                <td class="col-md-3">상세</td>
                                <td class="col-md-1">등급</td>
                                <td class="col-md-1">응시자수</td>
                                <td class="col-md-2">시험일</td>
                                <td class="col-md-2">상태</td>
                            </tr>
                            <?php foreach($LIST as $lt){
                                
                            ?>
                            <tr>
                                <input type="hidden" name="apply_number" id="apply_number" value="<?php echo $lt->ETL_SEQ;?>" />
                                <td><?php echo $lt->ETL_ROUND;?></td>
                                <td><?php echo $lt->ETL_NAME;?></td>
                                <td><?php echo $lt->ETL_COMMENT;?></td>
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
                                <td><?php echo $PAPER_LIST_CNT;?></td>
                                <td><?php echo $lt->ETL_DATE;?></td>
                                <td>
                                    <label for="wating">
                                        <input type="radio" name="marking" id="wating" value=0> 채점대기
                                    </label>
                                    <label for="marking">
                                    <input type="radio" name="marking" id="marking" value=1> 채점진행
                                    </label>
                                </td>
                            <?php
                            }
                            ?>
                       </table>
                   </div>
                    <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col 12 -->

            </div>
            <!-- /row -->

            <!-- row -->

            <div class="row">
                <div class="col-md-12 exam-write-menu">
                    <div class="left-menu">
                        <button class="btn btn-slategray" style="margin-right:5px;" onclick="history.back();">목록</button>
                        <button class="btn btn-default">시험지 등록방법</button>
                    </div>
                    <div class="right-menu">
                        <button class="btn btn-default" id="showBringPaper" style="margin-right:5px;">시험지 가져오기</button>
                        <button class="btn btn-default" id="showAutoAsign">채점자 자동등록</button>
                    </div>
                </div>
            </div>

            <!-- /row -->

                        <!-- row -->
                        <div class="row">

                            <!-- col 12 -->
                            <div class="col-md-12">

                                <section class="tile">
                                    <!-- tile body -->
                                    <div class="tile-body" style="padding-bottom:50px;">
                                        <table class="table table-bordered table-hover table-condensed">
                                            <tr class="info">
                                                <td class="col-md-1">No</td>
                                                <td class="col-md-1">파일명</td>
                                                <td class="col-md-1">학생</td>
                                                <td class="col-md-1">학번</td>
                                                <td class="col-md-2">채점자</td>
                                                <td class="col-md-2">채점자등록</td>
                                                <td class="col-md-2">진행</td>
                                            </tr>
                                            
                                            <?php 
                                            $PAGENUM = $PAPER_LIST_CNT;
                                            foreach($PAPER_LIST as $pl){
                                            ?>
                                            <tr>
                                                <td><?php echo $PAGENUM;?></td>
                                                <td><a href="/admin/paperDetail?EID=<?php echo $pl->EPL_RA_SEQ;?>&SEQ=<?php echo $pl->EPL_SEQ;?>">S<?php echo $pl->EPL_SEQ;?></a></td>
                                                <td><?php if(isset($pl->ULS_NAME)){ echo $pl->ULS_NAME; } else { echo "<label class='label label-default'>미할당</label>";}?></td>
                                                <td><?php if(isset($pl->ULS_NO)){ echo $pl->ULS_NO; } else { echo "<label class='label label-default'>미할당</label>";}?></td>
                                                <td><?php if(isset($pl->EPL_SEQ)){ echo $pl->EPL_SEQ; } else { echo "<label class='label label-default'>미할당</label>";}?></td>
                                                <td><button class="btn btn-xs btn-default" onclick="assignMarker(<?php echo $pl->EPL_SEQ;?>)">등록</button></td>
                                                <td><?php echo $pl->EPL_STATUS?><label class="label label-warning">1/3</label></td>
                                            </tr>
                                            <?php
                                            $PAGENUM -= 1;
                                            }
                                            ?>
                                            </table>
                                                    
                                        </div>

                                                <!-- /tile body -->

                                    </section>

                                            <!-- tile -->

                                        </section>
                                        <!-- /tile -->

                                        
                                    </div>
                                    <!-- /col 12 -->

                                </div>
                                <!-- /row -->

                    <!--                                        ----
                    ----                                        ----
                    ----            MODAL AREA START            ----
                    ----                                        ----
                    ----                                        --->

                    <!-- 시험지 가져오기 MODAL -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <section class="tile">
                                <div id="bringPaperModal" class="modal">
                                    <form id="bringPaperForm" name="bring-paper-form">
                                    <div class="modal-content" style="width:0px;">
                                    <div id="modal-title" class="modal-title">
                                        <span>시험지 가져오기</span>
                                    </div>
                                    
                                    <div class="tile-body">
                                        <div class="row">
                                            <!-- <div class="form-group col-sm-12 ">응시인원</div>
                                            <div class="form-group col-sm-12"><input type="text" name="people" class="form-control input-sm"></div>
                                            <div class="form-group col-sm-12 ">시험지 장수</div>
                                            <div class="form-group col-sm-12"><input type="text" name="paper" class="form-control input-sm"></div> -->
                                            <div class="form-group col-sm-12 attach_file">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <span class="btn btn-primary btn-file">
                                                        <i class="fa fa-upload"></i><input type="file" name="apply_attach[]" id="apply_attach" multiple=""/>
                                                    </span>
                                                    </span>
                                                    <input type="text" class="form-control" name="file_view" readonly="">
                                                </div>
                                                <div class="input-group upload-area" id="uploadfile">
                                                    <p>이곳에 파일을 드래그하세요.</p>
                                                    <ul class="list-type caret-right file_list">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row modal-button" style="margin-top:10px;">
                                            <!-- <button type="button" class="btn btn-sm btn-default" style="display: inline-block;" disabled>가져오기</button> -->
                                            <button type="button" class="btn btn-sm btn-default commitBtn" style="display: inline-block;">완료</button>
                                            <div class="form-group col-sm-12" style="margin-top:10px;">
                                            ※ 주의 ※ <br> 첨부시 바로 적용됩니다.
                                            </div>
                                        </div>


                                    <div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                                            
                    <!-- 채점자 자동등록 MODAL -->

                    <div class="row">
                        <div class="col-md-12">
                            <section class="tile">
                                <div id="autoAssignModal" class="modal">
                                    <form method="post" id="autoAssignForm" name="auto-assign-form" enctype="multipart/form-data" />
                                    <div class="modal-content">
                                    <div class="modal-title">
                                        <span>채점자 자동등록</span>
                                    </div>
                                    
                                    <div class="tile-body">
                                    <div class="row">
                                            <div class="form-group col-sm-1 context">문항</div>
                                            <div class="form-group col-sm-3"><input class="form-control input-sm margin-bottom-10" type="text" name="last_number" id="last_number" value="<?php if(isset($LAST_NUMBER)){echo $LAST_NUMBER+1;}else {echo 1;} ?>" readonly></div>
                                            <div class="form-group col-sm-1 context">종류</div>
                                            <div class="form-group col-sm-3">
                                                <select class="chosen-select input-sm form-control" name="que_type" id="que_type" required>
                                                    <option value="">선택</option>
                                                    <option value=0>객관식</option>
                                                    <option value=1>주관식</option>
                                                    <option value=2>서술형</option>
                                                </select>
                                                </div>
                                            <div class="form-group col-sm-1 context">배점</div>
                                            <div class="form-group col-sm-3"><input class="form-control input-sm margin-bottom-10" type="text" name="que_score" id="que_score" required></div>
                                        </div>

                                        <div class="row modal-button">
                                            <button type="button" class="btn btn-sm btn-default cancleBtn "style="display: inline-block;">취소</button>
                                        </div>
                                    <div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>

                    <!--                                        ----
                    ----                                        ----
                    ----              MODAL AREA END            ----
                    ----                                        ----
                    ----                                        --->

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

                <script src="http://malsup.github.com/jquery.form.js"></script>
                <script
                    type="text/javascript"
                    src="/assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
                <script
                    type="text/javascript"
                    src="/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
                <script
                    type="text/javascript"
                    src="/assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
                <script src="/assets/js/DragAndDrop.js"></script>

                <!-- <script type="text/javascript"
                src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script> -->

                <!-- <script type="text/javascript"
                src="/assets/js/vendor/blockui/jquery.blockUI.js"></script>\ -->

                <!-- <script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script> -->

                <script src="/assets/js/minimal.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#queSaveBtn').css("display", "none");
                        $('#queAddBtn').css("display", "none");
                        $('#queModBtn').css("display", "none");
                    })

                    $(document).keydown(function(event) {
                        if ( event.keyCode == 27 || event.which == 27 ) {
                            $('.cancleBtn').click();
                        }
                    });

                    $(".cancleBtn").click(function(){
                        $(".modal").hide();
                    });

                    $(".commitBtn").click(function(){
                        loading();
                        location.reload();
                    })

                    $("#showBringPaper").click(function(){
                        $("#bringPaperModal").show();
                    });

                    $("#showAutoAsign").click(function(){
                        $("#autoAssignModal").show();
                    });

                    $("#uploadBtn").click(function(){
                        var formData = new FormData();
                        formData.append("fileObj", $("#fileObj")[0].files[0]);
                        console.log(formData);
                            $.ajax({
                                type : "POST",
                                url : "/Exam/uploadPaper",
                                dataType : "JSON",
                                data : formData,
                                contentType: false,
                                processData: false,
                                success : function(data){
                                    console.log(data);
                                }, error: function(data, status, err) {
                                alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                            }
                        });
                    });

                    function assignMarker(SEQ){
                        console.log(SEQ);
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