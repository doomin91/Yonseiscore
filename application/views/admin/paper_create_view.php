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
                                <td class="col-md-1">시험지</td>
                                <td class="col-md-2">시험명</td>
                                <td class="col-md-3">상세</td>
                                <td class="col-md-1">등급</td>
                                <td class="col-md-2">시험일</td>
                                <td class="col-md-2">상태</td>
                            </tr>
                            <?php foreach($LIST as $lt){
                                
                            ?>
                            <tr>
                                <td><?php echo $lt->ETL_ROUND;?></td>
                                <td>250</td>
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
                                <td><?php echo $lt->ETL_DATE;?></td>
                                <td><?php echo $lt->ETL_DATE;?></td>
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
                        <button class="btn btn-default" style="margin-right:5px;">채점자 자동등록</button>
                        <button class="btn btn-default">시험지 가져오기</button>
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
                                                <td class="col-md-2">학생</td>
                                                <td class="col-md-2">학번</td>
                                                <td class="col-md-2">채점자</td>
                                                <td class="col-md-2">채점자등록</td>
                                                <td class="col-md-2">진행</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>10</td>
                                                <td>scan0002.jpg</td>
                                                <td>홍길동</td>
                                                <td>10230 </td>
                                                <td>
                                                    <label class="label label-success">김좌진</label>
                                                    <label class="label label-default">강감찬</label>
                                                    <label class="label label-default">이이</label>
                                                </td>
                                                <td><button class="btn btn-xs btn-default">등록</button></td>
                                                <td><label class="label label-warning">1/3</label></td>
                                            </tr>

                                            <tr>
                                                <td>10</td>
                                                <td>scan0002.jpg</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>채점자를 등록하세요.</td>
                                                <td><button class="btn btn-xs btn-default">등록</button></td>
                                                <td><label class="label label-danger">0/3</label></td>
                                            </tr>

                                            <tr>
                                                <td>10</td>
                                                <td>scan0002.jpg</td>
                                                <td>홍길동</td>
                                                <td>-</td>
                                                <td>
                                                    <label class="label label-success">김좌진</label>
                                                    <label class="label label-success">강감찬</label>
                                                    <label class="label label-default">이이</label>
                                                </td>
                                                <td><button class="btn btn-xs btn-default">등록</button></td>
                                                <td><label class="label label-warning">2/3</label></td>
                                            </tr>

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

                    <!-- 문항추가 -->
                    <div id="queModal" class="modal">
                        <form id="queAddForm" name="que-add-form">
                        <div class="modal-content">
                        <div id="modal-title" class="modal-title">
                            <span>문항 추가</span>
                        </div>
                        
                        <div class="tile-body">
                        <div class="row">
                                <div class="form-group col-sm-1 context">문항</div>
                                <div class="form-group col-sm-3"><input class="form-control input-sm margin-bottom-10" type="text" name="last_number" id="last_number" value="<?php if(isset($LAST_NUMBER)){echo $LAST_NUMBER+1;}else {echo 1;} ?>" readonly></div>
                                <div class="form-group col-sm-1 context">종류</div>
                                <div class="form-group col-sm-3">
                                    <input type="hidden" id="seq" name="seq" value="">
                                    <input type="hidden" id="ra_seq" name="ra_seq" value="<?php foreach($LIST as $lt){ echo $lt->ETL_SEQ;}?>">
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
                                <button type="button" id="queSaveBtn" class="btn btn-sm btn-primary" style="display: inline-block;">저장하기</button>
                                <button type="button" id="queAddBtn" class="btn btn-sm btn-primary" style="display: inline-block;">추가하기</button>
                                <button type="button" id="queModBtn" class="btn btn-sm btn-warning" style="display: inline-block;">수정하기</button>
                                <button type="button" class="btn btn-sm btn-default cancleBtn"style="display: inline-block;">취소</button>
                            </div>
                        <div>
                        </form>
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

                <script
                    type="text/javascript"
                    src="/assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
                <script
                    type="text/javascript"
                    src="/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
                <script
                    type="text/javascript"
                    src="/assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
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
                        $('.modal').css("display", "none");
                        $('#queSaveBtn').css("display", "none");
                        $('#queAddBtn').css("display", "none");
                        $('#queModBtn').css("display", "none");
                        $('#que_type').val("");
                        $('#que_score').val("");
                        if(xhr){
                            xhr.abort();
                        }
                    });

                    $("#showQueAddModal").click(function(){
                        $("#queModal").css("display", "block");
                        $("#modal-title").html("<span>문항 추가</span>");
                        $('#queSaveBtn').css("display", "inline-block");

                    });

                    
                    function showAddDown(SEQ){
                        $("#seq").val(SEQ);
                        $("#queModal").css("display", "block");
                        $("#modal-title").html("<span>하위문항 추가</span>");
                        $("#queAddBtn").css("display", "inline-block");

                    }

                    function showMod(SEQ){

                        $("#modal-title").html("<span>문항 수정</span>");
                        $('#queModBtn').css("display", "inline-block");
                        loading();
                        xhr_chk = 1
                        xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/getQuestion"
                            , dataType : "json"
                            , data : {"seq" : SEQ}
                            , success : function(data){
                                console.log(data);
                                $("#queModal").css("display", "block");
                                $("#que_type").val(data[0].EQL_TYPE);
                                $("#que_score").val(data[0].EQL_SCORE);
                                $("#seq").val(data[0].EQL_SEQ);
                                loading();
                            }
                            , error : function(data, status, err) {
                                console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                loading();
                            }
                        });
                    }
                    

                    $("#queSaveBtn").click(function(){
                        let formData = $("#queAddForm").serialize();
                        console.log(formData);
                        xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/saveQuestion"
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
                    });

                    $("#queAddBtn").click(function(){
                        let formData = $("#queAddForm").serialize();
                        console.log(formData);
                        xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/addQuestionBelow"
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
                    });

                    $("#queModBtn").click(function(){
                        let formData = $("#queAddForm").serialize();
                        console.log(formData);
                        xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/updateQuestion"
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
                    });

                    function delQue(SEQ, DEPTH){

                        if(confirm(SEQ + "번 문항을 삭제하시겠습니까? 현재위치 >" + DEPTH)){
                            xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/delQuestion"
                            , dataType : "json"
                            , data : {"SEQ" : SEQ,
                                "DEPTH" : DEPTH
                            }
                            , success : function(data){
                                alert("삭제되었습니다.")
                                location.reload();
                            }
                            , error : function(data, status, err) {
                                alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                            }
                        });
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