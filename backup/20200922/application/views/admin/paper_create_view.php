<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff";>

    <!-- page header -->
    <div class="pageheader">

        <h2>
            답안지 등록 / 채점자 배정
        </h2>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>You are here</li>
                <li>
                    관리 메뉴
                </li>
                <li class="active">답안지 등록 / 채점자 배정</li>
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
                        <table class="table table-bordered table-hover table-condensed" >
                            <tr class="info">
                                <td class="col-md-1">회차</td>
                                <td class="col-md-2">시험명</td>
                                <td class="col-md-2">상세</td>
                                <td class="col-md-1">등급</td>
                                <td class="col-md-1">현재 응시자수</td>
                                <td class="col-md-1">학생 당 답안지 수</td>
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
                                <td><?php echo $PAPER_LIST_CNT;?>명</td>
                                <td><?php echo $lt->ETL_PAPER?>장</td>

                                <td><?php echo $lt->ETL_DATE;?></td>
                                <td>
                                    <a href="#">
                                        <div class="task-info" style="text-align:right;">
                                            <div class="percent" id="percent">0%</div>
                                        </div>
                                        <div class="progress progress-striped progress-thin">
                                            <div class="progress-bar progress-bar-green" id="percent_graph" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </a>
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
                    </div>
                    <div class="right-menu">
                        <button class="btn btn-default" id="showBringPaper" style="margin-right:5px;">시험지 가져오기</button>
                        <button class="btn btn-success" id="showAssign" style="margin-right:5px;">채점자 배정</button>
                        <button class="btn btn-danger" id="selectItemsDel">선택삭제</button>
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
                                        <table class="table table-bordered table-hover table-condensed " id="paperTable">
                                            <tr class="info">
                                                <td class="col-md-1"><input type="button" class="btn btn-xs btn-default" id="checkAll" value="전체선택"></td>
                                                <td class="col-md-1">No</td>
                                                <td class="col-md-1">명칭</td>
                                                <td class="col-md-1">학생</td>
                                                <td class="col-md-1">학번</td>
                                                <td class="col-md-2">채점자</td>
                                                <!-- <td class="col-md-2">설정</td> -->
                                                <td class="col-md-2">진행</td>
                                            </tr>
                                            
                                            <?php 
                                            $SUM_CUR = 0;
                                            $SUM_CNT = 0;
                                            $PAGENUM = $PAPER_LIST_CNT;
                                            foreach($PAPER_LIST as $pl){
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="paper_no" id="paper_no" class="paper_no" value=<?php echo $pl->EPL_SEQ?>></td>
                                                <td><?php echo $PAGENUM;?></td>
                                                <td><a href="/admin/paperDetail?EID=<?php echo $pl->EPL_RA_SEQ;?>&SEQ=<?php echo $pl->EPL_SEQ;?>">S<?php echo $pl->EPL_SEQ;?></a></td>
                                                <td><?php if(isset($pl->ULS_NAME)){ echo $pl->ULS_NAME; } else { echo "<label class='label label-default'>미할당</label>";}?></td>
                                                <td><?php if(isset($pl->ULS_NO)){ echo $pl->ULS_NO; } else { echo "<label class='label label-default'>미할당</label>";}?></td>
                                                <td><?php if(isset($pl->MARKERS)){ 
                                                    $marker = explode(",", $pl->MARKERS);
                                                    $status = explode(",", $pl->STATUS);
                                                    asort($marker);
                                                    
                                                    foreach($marker as $key=>$value){
                                                        $SUM_CNT = $SUM_CNT + 1;
                                                        if($status[$key] == 1){
                                                            $SUM_CUR = $SUM_CUR + 1;
                                                            echo "<label class='label label-success'>";
                                                        } else {
                                                            echo "<label class='label label-default'>";
                                                        }
                                                        echo $value;
                                                        echo "</label>";
                                                    }
                                                    
                                                    } else { echo "<label class='label label-danger'>채점자를 배정해주세요.</label>";}?></td>
                                                <!-- <td>
                                                    <button class="btn btn-xs btn-default" onclick="assignMarker(<?php echo $pl->EPL_SEQ;?>)">삭제</button>
                                                    <button class="btn btn-xs btn-default" onclick="assignMarker(<?php echo $pl->EPL_SEQ;?>)">수정 </button>
                                                </td> -->
                                                <td><label class="label <?php switch($pl->STATUS_SUM){
                                                    case 0: echo "label-default"; break;
                                                    case 1: echo "label-warning"; break;
                                                    case 2: echo "label-warning"; break;
                                                    case 3: echo "label-success"; break;

                                                    }?>">
                                                    <?php if(isset($pl->STATUS_SUM)){echo $pl->STATUS_SUM;} else{echo "0";}?>/3</label></td>
                                            </tr>
                                            <?php
                                            $PAGENUM -= 1;
                                            }
                                            ?>
                                            </table>
                                            <input type="hidden" id="SUM_CUR" value="<?php echo $SUM_CUR;?>">
                                            <input type="hidden" id="SUM_CNT" value="<?php echo $SUM_CNT;?>">
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
                                            <div class="form-group">
                                                <div class="well well-sm well-red">
                                                현재 설정된 시험지 수 : <?php foreach($LIST as $lt){
                                                    echo $lt->ETL_PAPER . " 장";
                                                }?><br>
                                                <?php echo $lt->ETL_PAPER;?> 장 단위로 시험지가 등록됩니다.
                                                </div>
                                            </div>
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
                                                    <p>파일을 드래그 & 드롭 또는 <br>여기를 클릭하여 업로드하세요</p>
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
                                <div id="assignMarkerModal" class="modal">
                                    <form method="post" id="assignMarkerForm" name="assign-marker-form" enctype="multipart/form-data" />
                                    <div class="modal-content">
                                    <div class="modal-title">
                                        <span>채점자 등록</span>
                                    </div>
                                    
                                    <div class="tile-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="chosen">채점자 검색</label>
                                            <select data-placeholder="Select..." multiple="" tabindex="-1" class="chosen-select form-control" id="chosen" style="display: none;">
                                            <?php foreach ($MARKER_LIST as $ml){
                                            ?>
                                                <option value=<?php echo $ml->ULM_SEQ;?>><?php echo "[" . $ml->ULM_NO . "] " .$ml->ULM_NAME?></option>

                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <!-- <div class="chosen-container chosen-container-multi" style="width: 514px;" title="" id="chosen_chosen"><ul class="chosen-choices"><li class="search-choice"><span>johny@gmail.com</span><a class="search-choice-close" data-option-array-index="1"></a></li><li class="search-choice"><span>arnie@gmail.com</span><a class="search-choice-close" data-option-array-index="2"></a></li><li class="search-choice"><span>pete@gmail.com</span><a class="search-choice-close" data-option-array-index="3"></a></li><li class="search-field"><input type="text" value="Select recipients..." class="" autocomplete="off" style="width: 25px;" tabindex="3"></li></ul><div class="chosen-drop"><ul class="chosen-results"><li class="active-result" style="" data-option-array-index="0">ici@gmail.com</li><li class="result-selected" style="" data-option-array-index="1">johny@gmail.com</li><li class="result-selected" style="" data-option-array-index="2">arnie@gmail.com</li><li class="result-selected" style="" data-option-array-index="3">pete@gmail.com</li><li class="active-result" style="" data-option-array-index="4">gorge@gmail.com</li></ul></div></div> -->
                                        </div>
                                        <div class="form-group">
                                            <div class="well well-sm well-red" style="height:42px;">
                                                <div class="col-md-10">채점자 배정 시 기존 데이터가 삭제됩니다. 동의하십니까?</div>
                                                <div class="col-md-2">
                                                    <div class="onoffswitch green">
                                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch01">
                                                        <label class="onoffswitch-label" for="myonoffswitch01">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                            </div>
                                            </div>
                                        


                                        <div class="row modal-button">
                                            <button type="button" class="btn btn-sm btn-warning" id="assignBtn" style="display: inline-block;" disabled>배정</button>
                                            <button type="button" class="btn btn-sm btn-default cancleBtn" style="display: inline-block;">취소</button>
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
                <!-- <script src="/assets/js/DragAndDrop.js"></script> -->

                <!-- <script type="text/javascript"
                src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script> -->

                <!-- <script type="text/javascript"
                src="/assets/js/vendor/blockui/jquery.blockUI.js"></script>\ -->

                <script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script>

                <script src="/assets/js/minimal.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#queSaveBtn').css("display", "none");
                        $('#queAddBtn').css("display", "none");
                        $('#queModBtn').css("display", "none");
                        let sum_current = $("#SUM_CUR").val();
                        let sum_all = $("#SUM_CNT").val();
                        let str = (sum_current / sum_all) * 100;
                                        
                        $("#percent").html(financial(str) + "%");
                        $("#percent_graph").width(str);
                    })

                    $(document).keydown(function(event) {
                        if ( event.keyCode == 27 || event.which == 27 ) {
                            $('.cancleBtn').click();
                        }
                    });

                    function financial(x) {
                      return Number.parseFloat(x).toFixed(1);
                    }

                    //initialize chosen
                    $(".chosen-select").chosen({disable_search_threshold: 10});

                    $(".cancleBtn").click(function(){
                        $(".modal").hide();
                    });

                    $(".commitBtn").click(function(){
                        location.reload();
                    })

                    $("#showBringPaper").click(function(){
                        $("#bringPaperModal").show();
                    });

                    $("#showAssign").click(function(){
                        let chkArr = new Array();
                        $.each($("input:checkbox[name=paper_no]"), function(){
                            if($(this).is(":checked")){
                                chkArr.push($(this).val());
                            }
                        });

                        if(chkArr == ""){
                            alert("시험지를 선택해주세요.");
                        } else {
                            $("#assignMarkerModal").show();
                        }

                        
                    });

                    $("#myonoffswitch01").click(function(){
                        if($("#assignBtn").attr("disabled")){
                            $("#assignBtn").attr("disabled", false);
                        } else {
                            $("#assignBtn").attr("disabled", true);
                        }
                        
                        
                    })

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

                    $("#selectItemsDel").click(function(){
                        let chkArr = new Array();
                        $.each($("input:checkbox[name=paper_no]"), function(){
                            if($(this).is(":checked")){
                                chkArr.push($(this).val());
                            }
                        });

                        if(chkArr == ""){
                            alert("시험지를 선택해주세요.");
                        }
                        else{
                            loading();
                                if(confirm("해당 시험지와 관련된 모든 데이터가 삭제됩니다. 삭제하시겠습니까?")){
                                    $.ajax({
                                    type : "POST",
                                    url : "/Exam/deleteCheckedPaper",
                                    dataType : "JSON",
                                    data : {"chkArr" : chkArr} ,
                                    success : function(data){
                                        console.log(data);
                                        location.reload();
                                        loading();
                                    }, error: function(data, status, err) {
                                    alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                    loading();
                                    }
                                });
                            }
                        }
                 
                        
                    })

                    let chk_turn = 0;
                    $('#checkAll').click(function() {
                        if (chk_turn == 0) {
                            $('.paper_no').prop("checked", true);
                            $('#checkAll').attr("value", "선택취소");
                            $('#checkAll').attr("class", "btn btn-xs btn-default");
                            chk_turn = 1;
                        } else {
                            $('.paper_no').prop("checked", false);
                            $('#checkAll').attr("value", "전체선택");
                            $('#checkAll').attr("class", "btn btn-xs btn-default");
                            chk_turn = 0;
                        }
                    });

                    $("#paperTable tr").click(function () {
                            let checkbox = $(this).find('td:first-child :checkbox');
                            if(checkbox.is(':checked') == true){
                                checkbox.prop('checked', false);
                            } else {
                                checkbox.prop('checked', true);
                            }
                            
                        });
                        
                    $("#assignBtn").click(function(){
                        let chkArr = new Array();
                        $.each($("input:checkbox[name=paper_no]"), function(){
                            if($(this).is(":checked")){
                                chkArr.push($(this).val());
                            }
                        });

                            mrkArr = $("#chosen").val();
                            if(mrkArr.length == 3){
                                $.ajax({
                                    type : "POST",
                                    url : "/Exam/assignMarkerInPaper",
                                    dataType : "JSON",
                                    data : {"chkArr" : chkArr ,
                                            "mrkArr" : mrkArr ,
                                            "apply_number" : $("#apply_number").val()
                                    },
                                    success : function(data){
                                        console.log(data);
                                        location.reload();
                                    }, error: function(data, status, err) {
                                    alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                    }
                                });
                            } else {
                                alert("3명의 채점자를 선택해주세요.")
                            }
                    })


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


                $(function() {

                // preventing page from redirecting
                $("html").on("dragover", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    //$("#uploadfile p").text("Drag here");
                });

                $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

                // Drag enter
                $('.upload-area').on('dragenter', function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    //$("#uploadfile p").text("Drop");
                });

                // Drag over
                $('.upload-area').on('dragover', function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    //$("#uploadfile p").text("Drop");
                });

                // Drop
                $('.upload-area').on('drop', function (e) {
                    e.stopPropagation();
                    e.preventDefault();

                    //$("#uploadfile p").text("Upload");

                    var file = e.originalEvent.dataTransfer.files;
                    //console.log(file.length);
                    var fd = new FormData();
                    for (var i=0; i<file.length; i++){
                        //console.log(file[i]);
                        fd.append('apply_attach[]', file[i]);
                    }

                    uploadData(fd);
                });

                // Open file selector on div click
                $("#uploadfile p").click(function(){
                    $("#apply_attach").click();
                });

                // file selected
                $("#apply_attach").change(function(){
                    var fd = new FormData();
                    var ins = document.getElementById("apply_attach").files.length;

                    for (var i=0; i<ins; i++){
                        console.log(document.getElementById("apply_attach").files[i]);
                        fd.append("apply_attach[]", document.getElementById("apply_attach").files[i]);
                    }

                    uploadData(fd);
                });

                $(document).on("click", ".file_del", function(){
                    var file_seq = $(this).data("file_seq");
                    var _this = $(this);
                    if (confirm("해당 파일을 삭제하시겠습니까?")){
                        loading();
                        $.ajax({
                            type : "POST",
                            url : "/Exam/FileDeleteAjax",
                            dataType : "JSON",
                            data : {
                                "file_seq" : file_seq
                            }, success : function(resultMsg){
                                console.log(resultMsg);
                                if (resultMsg.code == "200"){
                                    //console.log(_this.parents("li").eq(0).html());
                                    _this.parents("li").eq(0).remove();
                                    if ($(".file_list li").length == 0){
                                        $(".upload-area p").removeClass("hide");
                                    }
                                }
                                loading();
                            }, error : function(e){
                                //alert(e.responseText);
                                console.log(e.responseText);
                                loading();
                            }
                        });
                    }
                });
                });

                // Sending AJAX request and upload file
                function uploadData(formdata){
                var apply_number = $("input[name=apply_number]").val();
                //console.log(apply_number);
                formdata.append('apply_number', apply_number);
                //console.log(formdata);
                //console.log(formdata);
                loading();
                $.ajax({
                    type : "POST",
                    url: '/Exam/FileUploadAjax',
                    dataType : "JSON",
                    data : formdata,
                    contentType: false,
                    processData: false,
                    async:true,
                    success: function(resultMsg){
                        loading();
                        //console.log(resultMsg);
                        if(resultMsg.code == "200"){
                            var file_list = resultMsg.file_list;
                            $(".upload-area p").addClass("hide");
                            $.each(file_list, function(key, element){
                                $(".file_list").append("<li>"+element.file_name+"&nbsp;<i class=\"fa fa-times file_del\" data-file_seq=\""+element.file_seq+"\"></i></li>");
                            });
                        } else if(resultMsg.code == "202"){
                            alert(resultMsg.msg);
                            loading();
                        }
                    }, error: function(data, status, err) {
                                    alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                                    //console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                        }
                });
                }

                // Added thumbnail
                function addThumbnail(data){
                $("#uploadfile p").remove();
                var len = $("#uploadfile div.thumbnail").length;

                var num = Number(len);
                num = num + 1;

                var name = data.name;
                var size = convertSize(data.size);
                var src = data.src;

                // Creating an thumbnail
                $("#uploadfile").append('<div id="thumbnail_'+num+'" class="thumbnail"></div>');
                $("#thumbnail_"+num).append('<img src="'+src+'" width="100%" height="78%">');
                $("#thumbnail_"+num).append('<span class="size">'+size+'<span>');

                }

                // Bytes conversion
                function convertSize(size) {
                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (size == 0) return '0 Byte';
                var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
                return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
                }


                </script>