<?php
if ( ! function_exists( 'array_key_last' ) ) {
    /**
     * Polyfill for array_key_last() function added in PHP 7.3.
     *
     * Get the last key of the given array without affecting
     * the internal array pointer.
     *
     * @param array $array An array
     *
     * @return mixed The last key of array if the array is not empty; NULL otherwise.
     */
    function array_key_last( $array ) {
        $key = NULL;

        if ( is_array( $array ) ) {

            end( $array );
            $key = key( $array );
        }

        return $key;
    }
}
?>
<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff";>

    <!-- page header -->
    <div class="pageheader">

        <h2>
            시험 등록
        </h2>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>You are here</li>
                <li>
                    관리 메뉴
                </li>
                <li class="active">시험 등록</li>
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
                                <td class="col-md-1">등급</td>
                                <td class="col-md-2">시험명</td>
                                <td class="col-md-3">상세</td>
                                <td class="col-md-1">진행상태</td>
                                <td class="col-md-2">시험일</td>
                            </tr>
                            <?php foreach($LIST as $lt){
                                $STATUS = $lt->ETL_STATUS;
                                
                            ?>
                            <tr>
                                <td><?php echo $lt->ETL_SEQ;?><input id="RA_SEQ" type="hidden" value=<?php echo $lt->ETL_SEQ;?>></td>
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
                                <td><?php echo $lt->ETL_NAME;?></td>
                                <td><?php echo $lt->ETL_COMMENT;?></td>
                                <td><?php switch($lt->ETL_STATUS){
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
                         <button class="btn btn-slategray" onclick="history.back();">목록</button>
                    </div>
                    <div class="right-menu">
                    <?php if($STATUS == 0){?>
                        <input
                            id="showQueAddModal"
                            type="button"
                            class="btn btn-success"
                            value="+ 문항추가"
                            data-eid="<?php echo $_GET['EID'] ?>"
                            style="margin-right:5px;">
                        <input
                            id="showCompleteModal"
                            type="button"
                            class="btn btn-warning"
                            value="등록완료 >"
                            data-eid="<?php echo $_GET['EID'] ?>">
                    <?php }?>
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
                                        <table class="table table-bordered table-hover table-condensed" id="questionTable">
                                            <tr class="info">
                                                <td class="col-md-1">No</td>
                                                <td class="col-md-1">문항</td>
                                                <td class="col-md-1">문항이름</td>
                                                <td class="col-md-2">종류</td>
                                                <td class="col-md-2">배점</td>
                                                <td class="col-md-2">서브문항추가 / 삭제 / 문항수정</td>
                                            </tr>
                                            
                                            <?php 
                                            $Q = 0;
                                            $TEMP = "";
                                            $DEPTH = "";
                                            $ROWNUM = 1;
                                    
                                            foreach($QUESTIONS as $key => $qt){
                                            ?>
                                            <tr <?php if($qt->EQL_NON_TARGET){ echo "style='background:#eee; color:#aaa'";}?>>
                                                <td style="display:none;"><input type="hidden" name="eql_seq" value=<?php echo $qt->EQL_SEQ;?>></td>
                                                <?php 
                                                if($qt->PARENT_SEQ != $TEMP){
                                                    echo '<td name="parent_row">' . ($Q+1) . '</td>';
                                                    $Q += 1; // parent q num
                                                    $DEPTH = $qt->DEPTH; // Depth = 1
                                                } else {
                                                    echo '<td name="child_row">' . '</td>';
                                                    $DEPTH = (int)$DEPTH + 1; // child q(Depth = 2)
                                                }
                                                
                                                if($DEPTH == 1){
                                                    if(count($QUESTIONS)==1)
                                                        echo "<th>". $Q ."</th>";
                                                    else if($key === array_key_last($QUESTIONS))
                                                        echo "<th>". $Q ."</th>";
                                                    else if($QUESTIONS[$key+1]->DEPTH == 1)
                                                        echo "<th>". $Q ."</th>";
                                                    else
                                                        echo "<th>". $Q . "-" . 1 ."</th>";

                                                } else {
                                                    echo "<th>". $Q ."-".$DEPTH."</th>";
                                                }
                                                ?>
                                                <td><?php echo $qt->EQL_NAME?></td>
                                                <td><?php 
                                                switch($qt->EQL_TYPE){
                                                    case 0:
                                                        echo "객관식";
                                                        break;
                                                    case 1:
                                                        echo "단답식";
                                                        break;
                                                    case 2:
                                                        echo "서술형";
                                                        break;
                                                }

                                                ?></td>
                                                <td><?php echo $qt->EQL_SCORE;?>점</td>
                                                <td>
                                                    <?php
                                                        if($qt->DEPTH == 1 && $STATUS == 0 && $qt->EQL_NON_TARGET == 0){
                                                            echo "<button class='btn btn-xs btn-success' style='margin-right:5px;' onclick='showAddDown(". $qt->EQL_SEQ .",". $Q. ")'><i class='fa fa-plus'></i></button>";
                                                        } else {
                                                            echo "<button class='btn btn-xs btn-slategray' style='margin-right:5px;' disabled><i class='fa fa-plus'></i></button>";
                                                        }

                                                        if($STATUS == 0){
                                                        echo "<button class='btn btn-xs btn-danger' style='margin-right:5px;' onclick='delQue(". $qt->EQL_SEQ .",". $qt->DEPTH. ")'><i class='fa fa-trash-o'></i></button>";
                                                        } else {
                                                        echo "<button class='btn btn-xs btn-slategray' style='margin-right:5px;' disabled><i class='fa fa-trash-o'></i></button>";

                                                        }
                                                        if($qt->EQL_NON_TARGET == 0){
                                                        echo "<button class='btn btn-xs btn-default' onclick='showMod(" . $qt->EQL_SEQ . ",".$Q.", ".$DEPTH.")'><i class='fa fa-edit'></i></button>";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        
                                            <?php
                                            $TEMP = $qt->PARENT_SEQ;
                                            $LAST_NUMBER = $Q;
                                            $ROWNUM += 1;
                                            }
                                            ?>
                                            <!-- endfor -->
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
                    <div class="row">
                        <div class="col-md-12">
                            <section class="tile">
                                <div id="queModal" class="modal">
                                    <form id="queAddForm" name="que-add-form">
                                    <div class="modal-content">
                                    <div id="modal-title" class="modal-title">
                                        <span>문항 추가</span>
                                    </div>
                                    
                                    <div class="tile-body">
                                    <div class="row">
                                            <div class="form-group col-sm-2 context">문항 번호</div>
                                            <div class="form-group col-sm-10"><input class="form-control input-sm margin-bottom-10" type="text" name="last_number" id="last_number" value="<?php if(isset($LAST_NUMBER)){echo $LAST_NUMBER+1;}else {echo 1;} ?>" readonly></div>                                
                                            <div class="form-group col-sm-2 context">문항 종류</div>
                                            <div class="form-group col-sm-10">
                                                <input type="hidden" id="seq" name="seq" value="">
                                                <input type="hidden" id="ra_seq" name="ra_seq" value="<?php foreach($LIST as $lt){ echo $lt->ETL_SEQ;}?>">
                                                <select class="chosen-select input-sm form-control" name="que_type" id="que_type" required>
                                                    <option value="">선택</option>
                                                    <option value=0>객관식</option>
                                                    <option value=1>단답식</option>
                                                    <option value=2>서술형</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2 context">문항 이름</div>
                                            <div class="form-group col-sm-10"><input class="form-control input-sm margin-bottom-10" type="text" name="que_name" id="que_name"></div>                                
                                            <div class="form-group col-sm-2 context">배점</div>
                                            <div class="form-group col-sm-10"><input class="form-control input-sm margin-bottom-10" type="text" name="que_score" id="que_score" required></div>
                                            <div class="form-group col-sm-12" id="queOption" style="display:none;" ><label for="que_target"><input type="checkbox" name="que_target" id="que_target"> [선택] 해당 문항을 비대상으로 생성합니다. 선택 시 채점 및 수정이 불가합니다</label></div>
                                            
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
                            </section>
                        </div>
                   </div>
                    
                    <!-- 등록완료 -->
                    <div class="row">
                        <div class="col-md-12">
                            <section class="tile">
                                <div id="completeModal" class="modal">
                                    <div class="modal-content">
                                        <div id="modal-title" class="modal-title">
                                            <span>문항등록확정</span>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="well well-sm well-red">
                                                    (※주의) 시험문제 등록을 완료합니다. 이후에도 시험 종류나 배점을 변경 할 수는 있으나 새롭게 문항을 추가 할 순 없습니다.
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row" style="text-align:center;">
                                            <input
                                                id="completeBtn"
                                                type="button"
                                                class="btn btn-sm btn-success"
                                                value="완료"
                                                data-eid="<?php echo $_GET['EID'] ?>"
                                                style="margin-right:5px;">
                                            <button type="button" class="btn btn-sm btn-default cancleBtn"style="display: inline-block;">취소</button>
                                        </div>

                                    <div>
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

                        var ctd = $('td[name=child_row]');
                        for(i = 0 ; i < ctd.length ; i++){
                            $(ctd[i]).css("border-top", "hidden");
                            
                        }
                    })

                    $(document).keydown(function(event) {
                        if ( event.keyCode == 27 || event.which == 27 ) {
                            $('.cancleBtn').click();
                        }
                    });
                    
                    $("#que_target").click(function(){
                        console.log($("#que_target").is(":checked"));
                        if($("#que_target").is(":checked")){
                            $("#que_score").val("0");
                            $("#que_score").prop("readonly", true);
                        } else {
                            $("#que_score").prop("readonly", false);
                        }
                    })

                    $(".cancleBtn").click(function(){
                        $('.modal').css("display", "none");
                        $('#queSaveBtn').css("display", "none");
                        $('#queAddBtn').css("display", "none");
                        $('#queModBtn').css("display", "none");
                        $('#queOption').css("display", "none");
                        $('#que_target').prop("checked", false);
                        $('#que_type').val("");
                        $('#que_score').val("");
                        if(xhr){
                            xhr.abort();
                        }
                    });

                    $("#showQueAddModal").click(function(e){
                        eid = $(e.target).data('eid');
                        loading();
                        xhr_chk = 1
                        xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/getQuestionCountInExam"
                            , dataType : "json"
                            , data : {"eid" : eid}
                            , success : function(data){
                                console.log(data);
                                $("#queModal").css("display", "block");
                                $("#modal-title").html("<span>문항 추가</span>");
                                $('#queSaveBtn').css("display", "inline-block");
                                $('#queOption').css("display", "block");

                                $("#last_number").val((data+1));
                                loading();
                            }
                            , error : function(data, status, err) {
                                console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                loading();
                            }
                        });

                    });

                    
                    function showAddDown(SEQ, $PQ){ //parent q num
                        $("#seq").val(SEQ);
                        $("#queModal").css("display", "block");
                        $("#modal-title").html("<span>하위문항 추가</span>");
                        $("#queAddBtn").css("display", "inline-block");
                        loading();
                        xhr_chk = 1
                        xhr = $.ajax({
                            type : "post"
                            , url : "/Exam/getQuestionChildCount"
                            , dataType : "json"
                            , data : {"seq" : SEQ}
                            , success : function(data){
                                console.log(data);
                                $("#queModal").css("display", "block");
                                $("#last_number").val($PQ+"-"+(data+1));
                                loading();
                            }
                            , error : function(data, status, err) {
                                console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                loading();
                            }
                        });

                    }

                    function showMod(SEQ, Q, DEPTH){
                        $("#modal-title").html("<span>문항 수정</span>");
                        $('#queModBtn').css("display", "inline-block");
                        $("#last_number").val(Q+"-"+DEPTH);
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
                                $("#que_name").val(data[0].EQL_NAME);
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
                    $("#showCompleteModal").click(function(){

                        $("#completeModal").css("display", "block");
                    })

                    $("#completeBtn").click(function(e){
                        let questionArr = new Array;
                        let seqArr = new Array;
                        let trCnt = $("#questionTable > tbody > tr").length;
                        eid = $(e.target).data('eid');

                        for (i=1; i<trCnt; i++)
                        {
                            seq = $("#questionTable > tbody > tr:eq("+i+") > td > input[name=eql_seq]").val();
                            seqArr.push(seq);
                            number = $("#questionTable > tbody > tr:eq("+i+") > th").html();
                            questionArr.push(number);
                        }
                        console.log(questionArr);
                        $.ajax({
                            type : "post"
                            , url : "/Exam/completeQuestion"
                            , dataType : "json"
                            , data : { "eid" : eid ,
                                        "seq" : seqArr,
                                        "number" : questionArr,
                            }
                            , success : function(data){
                                console.log(data)
                                location.reload();
                            }
                            , error : function(data, status, err) {
                                alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                            }
                        })
                    });

                    $("#queSaveBtn").click(function(){
                        let myInt = $("#que_score").val()
                        if(!(/^(\-|\+)?([0-9]+)$/.test(myInt ) && parseInt(myInt ) >= 0)){
                            alert("올바른 정수 값을 입력해주세요.");
                            $("#que_score").focus();
                            return false;
                        }
                        if(myInt > 10){
                            alert("배점은 10점 이상 설정 할 수 없습니다.");
                            $("#que_score").focus();
                            return false;
                        }

                                let formData = $("#queAddForm").serialize();
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
                        let myInt = $("#que_score").val()
                        if(!(/^(\-|\+)?([0-9]+)$/.test(myInt ) && parseInt(myInt ) >= 0)){
                            alert("올바른 정수 값을 입력해주세요.");
                            $("#que_score").focus();
                            return false;
                        }

                        if(myInt > 10){
                            alert("배점은 10점 이상 설정 할 수 없습니다.");
                            $("#que_score").focus();
                            return false;
                        }

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
                        let myInt = $("#que_score").val()
                        if(!(/^(\-|\+)?([0-9]+)$/.test(myInt ) && parseInt(myInt ) >= 0)){
                            alert("올바른 정수 값을 입력해주세요.");
                            $("#que_score").focus();
                            return false;
                        }

                        if(myInt > 10){
                            alert("배점은 10점 이상 설정 할 수 없습니다.");
                            $("#que_score").focus();
                            return false;
                        }

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
                        if(DEPTH == 1){
                            $result = confirm("삭제하시겠습니까? 하위문항까지 모두 삭제됩니다.")
                        }else{
                            $result = confirm("삭제하시겠습니까?")
                        }
                        if($result){
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
