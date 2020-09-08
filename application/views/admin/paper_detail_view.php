<div id="image-popup-dialog" class="text-center" style="display:none;">
    <div>
        <a id="popup-close" href="#">X</a>
    </div>
    <div>
    <img id="popup-image" onload="myinfo(this)">
    </div>
</div>
<style type="text/css">
    .slider {
        width: 100%;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
      font-size: 30px;      
    }

    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }
    
  </style>

<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff;">

    <!-- page header -->
    <div class="pageheader">
        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>You are here</li>
                <li>
                    시험지 관리
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

                    <!-- tile header -->
                    <div class="tile-header">
                        <h1>
                            <strong>시험지</strong>
                            상세</h1>
                        <div class="controls">
                            <a href="#" class="minimize">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <a href="#" class="refresh">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a href="#" class="remove">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <table class="table table-bordered table-hover table-condensed">
                            <tr class="info">
                                <td>학생이름</td>
                                <td>학생번호</td>
                                <td>전화번호</td>
                                <td>응시일</td>
                                <td>채점자</td>

                            </tr>
                            <tr>
                                <td>
                                
                                <div class="form-group ">
                                        <select id="student-name" name="student_name" data-eid="<?php echo $_GET['EID']?>" data-eplid="<?php echo $_GET['SEQ']?>" class="chosen-select chosen form-control" style="display: none;">
                                            <option value="">전체</option>
                                            <?php foreach($STUDENT_LIST as $sl){
                                                if(isset($STUDENT) && $STUDENT[0]->ULS_NAME == $sl->ULS_NAME )
                                                    echo "<option value='" . $sl->ULS_SEQ . "' selected>" . $sl->ULS_NAME . "</option>";
                                                else{
                                                    echo "<option value='" . $sl->ULS_SEQ . "'>" . $sl->ULS_NAME . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                                                <!-- </select><div class="chosen-container chosen-container-single" style="width: 242px;" title=""><a class="chosen-single" tabindex="-1"><span>전체</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off"></div><ul class="chosen-results"><li class="active-result result-selected" style="" data-option-array-index="0">전체</li><li class="active-result" style="" data-option-array-index="1">대표이사</li><li class="active-result" style="" data-option-array-index="2">전무이사</li><li class="active-result" style="" data-option-array-index="3">상무</li><li class="active-result" style="" data-option-array-index="4">이사</li><li class="active-result" style="" data-option-array-index="5">부장</li><li class="active-result" style="" data-option-array-index="6">차장</li><li class="active-result" style="" data-option-array-index="7">과장</li><li class="active-result" style="" data-option-array-index="8">대리</li><li class="active-result" style="" data-option-array-index="9">사원</li><li class="active-result" style="" data-option-array-index="10">주임</li><li class="active-result" style="" data-option-array-index="11">차장보</li><li class="active-result" style="" data-option-array-index="12">계장</li><li class="active-result" style="" data-option-array-index="13">수습직원</li><li class="active-result" style="" data-option-array-index="14">계약직</li><li class="active-result" style="" data-option-array-index="15">직책</li><li class="active-result" style="" data-option-array-index="16">알바</li></ul></div></div> -->
                                </div>

                                </td>
                                <td id="student-no"><?php if(isset($STUDENT)) echo $STUDENT[0]->ULS_NO ?></td>
                                <td id="student-tel"><?php if(isset($STUDENT)) echo $STUDENT[0]->ULS_TEL ?></td>

                            <?php foreach($LIST as $lt){
                            ?>
                                <td><?php echo $lt->ETL_DATE;?></td>
                            <?php }?>
                                <td>
                            <?php foreach($MARKER_LIST as $ml){
                                echo "<span class='label label-default'>" . $ml->ULM_NAME . "</span>";
                            }
                            ?>
                                </td>
                            </tr>
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

            <!-- col 12 -->
            <div class="col-xs-6 col-sm-6 col-md-6">

                <section class="tile">

                    <!-- tile body -->
                    <div class="tile-body">
                        <section class="regular slider">
                            <?php foreach($ATTACH_LIST as $al) :?>
                                <div>
                                <?php    echo "<img src='" . $al->FILE_PATH . "' width='100%'>"; ?>
                                </div>
                            <?php endforeach?>
                        </section>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col 12 -->

                <div class="col-xs-6 col-sm-6 col-md-6">

                    <section class="tile">

                        <!-- tile body -->
                        <div class="tile-body">
                            <table class="table table-bordered table-hover table-condensed">
                                <tr class="info">
                                    <td class="col-md-1">문항</td>
                                    <?php foreach($MARKER_LIST as $ml){
                                    echo "<td class='col-md-2'>" . "<label class='label label-default'>" . $ml->ULM_SEQ . ". " . $ml->ULM_NAME . "</label>" . "</td>";
                                    }?>
                                    <td class="col-md-1">평균점수</td>
                                    <td class="col-md-4">메모</td>
                                </tr>
                                <tbody id="bodyMatchItem">
                                </tbody>
                            </table>
                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->
                    <div class="tile">
                        <button class="btn btn-slategray" style="float:left; margin-left:15px;" onclick="history.back();">목록</button>
                    </div>
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
                    <div id="Modal" class="modal">
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
<script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script>
<script src="/assets/js/minimal.min.js"></script>
<script>
let xhr = $.ajax();

function magnificPopup(event){
    var popupDialog;

    var imgsrc = event.target.currentSrc;

    popupDialog = $( "#image-popup-dialog" ).dialog({
            autoOpen: false,
            width: window.innerWidth ? window.innerWidth*0.5 : $(window).width()*0.5,
            height: window.innerHieght ? window.innerHieght*0.9 : $(window).height()*0.9,
            position: { my: "center", at: "cetner", of: window },
            resizable: false,
            modal: true,
            appendTo: ".navbar",
            
            close: function() {
                $( "#image-popup-dialog" ).attr("class", "dialog-layout text-center" );
            },
            create: function() {
                
            },
            open: function(event, ui){
                $('.ui-dialog-titlebar').css("display", "none");
                popupDialog.attr("class", "dialog-active text-center" );
                $( "#image-popup-dialog" ).attr("class", "dialog-active text-center" );
                $( "#image-popup-dialog" ).css({
                    background: 'transparent',
                    
                });
                var width = window.innerWidth ? window.innerWidth : $(window).width();
                var height = window.innerHieght ? window.innerHieght : $(window).height();
                $('#popup-image').attr("src", imgsrc);
                $('#popup-image').attr("width", width*0.5);
                $('#popup-image').attr("height", height*0.8);

                $('#popup-close').css("float", "right");
                $('#popup-close').css("margin-right", "10px");
                $('#popup-close').on('click', function(){
                    popupDialog.dialog( "close" );
                })
                
            }
        });


        popupDialog.dialog( "open" );
}

$(document).ready(function (){
    viewMatchInfo();

    $('#student-name').on('change', function(){
        name = $('#student-name option:selected').text();
        eid = $('#student-name').data('eid');
        eplid = $('#student-name').data('eplid');
        loading();
        xhr = $.ajax({
            type : "post"
            , url : "/Admin/getStudentInfoAndSave"
            , dataType : "json"
            , data : {
                "name"  : name,
                "eid"   : eid,
                "eplid" : eplid
                    
            }
            , success : function(data){
                console.log(data);
                $('#student-no').text(data['info']['ULS_NO']);
                $('#student-tel').text(data['info']['ULS_TEL']);
                loading();
            }
            , error : function(data, status, err) {
                console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                loading();
            }
        });
    });

    $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    window.addEventListener('resize', function(e){
            var dWidth = window.innerWidth ? window.innerWidth : $(window).width();
            var dHeight = window.innerHeight ? window.innerHeight : $(window).height();
            var activeDialog = $('.dialog-active');
            activeDialog.dialog("option", "width", dWidth*0.5);
            activeDialog.dialog("option", "height", dHeight*0.8);

            $('#popup-image').attr("width", dWidth*0.5);
            $('#popup-image').attr("height", dHeight*0.8);
        });
})

$(document).keydown(function (event) {
    if (event.keyCode == 27 || event.which == 27) {
        $('#modal').css("display", "none");
        ModalInit();
        xhr.abort();
    }
});

//initialize chosen
$(".chosen-select").chosen({allow_single_deselect:true},
                           {disable_search_threshold: 10});

function viewMatchInfo(){
    // Marker 테스트
    $.ajax({
        type : "post"
        , url : "/Exam/getMatchInfo"
        , dataType : "json"
        , data : { "SEQ" : getParameterByName("SEQ") }
        , success : function(matchInfo){
            console.log(matchInfo);
            str = "";
            average = 0;
            account = matchInfo.length/3;
            sum1 = 0;
            sum2 = 0;
            sum3 = 0;
            for(i=0;i<matchInfo.length/3;i++){
                str += "<tr>";
                str += "<td>" + (i+1) +"</td>";
                if(matchInfo[i].EML_ULM_SCORE == null){
                    str += "<td></td>";
                }else {
                    str += "<td>" + matchInfo[i].EML_ULM_SCORE +"</td>";
                }
                    
                if(matchInfo[i+account].EML_ULM_SCORE == null){
                    str += "<td></td>";
                }else {
                    str += "<td>" + matchInfo[i+account].EML_ULM_SCORE +"</td>";
                }
                    
                if(matchInfo[i+account*2].EML_ULM_SCORE == null){
                    str += "<td></td>";
                }else {
                    str += "<td>" + matchInfo[i+account*2].EML_ULM_SCORE +"</td>";
                }

                average = (parseFloat(matchInfo[i].EML_ULM_SCORE) + parseFloat(matchInfo[i+account].EML_ULM_SCORE) + parseFloat(matchInfo[i+account*2].EML_ULM_SCORE))/3;
                average = average.toFixed(2);
                if(average == "NaN"){
                    str += "<td><label class='label label-warning'>채점중</label></td>";
                } else {
                    str += "<td>" + average + "</td>";
                }
                
                str += "<td>";
                if(matchInfo[i].EML_COMMENT != null){
                    str += "<label class='label label-default' title=''>" + matchInfo[i].EML_ULM_SEQ + "</label>" + matchInfo[i].EML_COMMENT + "<br>";
                }
                if(matchInfo[i+account].EML_COMMENT != null){
                    str += "<label class='label label-default' title=''>" + matchInfo[i+account].EML_ULM_SEQ + "</label>" + matchInfo[i+account].EML_COMMENT + "<br>";
                }
                if( matchInfo[i+account*2].EML_COMMENT != null){
                    str += "<label class='label label-default' title=''>" + matchInfo[i+account*2].EML_ULM_SEQ + "</label>" + matchInfo[i+account*2].EML_COMMENT + "<br>";
                }
                str += "</td>";
                str += "</tr>";

                sum1 += parseInt(matchInfo[i].EML_ULM_SCORE);
                sum2 += parseInt(matchInfo[i+account].EML_ULM_SCORE);
                sum3 += parseInt(matchInfo[i+account*2].EML_ULM_SCORE);
            }
                str += "<tr>";
                str += "<td>총점</td>";
                if(isNaN(sum1)){
                    str += "<td><label class='label label-warning'>채점중</label></td>";
                }else {
                    str += "<td>" + sum1 + "</td>";
                }

                if(isNaN(sum2)){
                    str += "<td><label class='label label-warning'>채점중</label></td>";
                }else {
                    str += "<td>" + sum2 + "</td>";
                }

                if(isNaN(sum3)){
                    str += "<td><label class='label label-warning'>채점중</label></td>";
                }else{
                    str += "<td>" + sum3 + "</td>";
                }
                
                if(isNaN(sum1+sum2+sum3)){
                    str += "<td><label class='label label-warning'>채점중</label></td>";
                }else{
                    str += "<td>" + (sum1+sum2+sum3)/3 + "</td>";
                }

                str += "<td></td>";
                str += "</tr>"
            $("#bodyMatchItem").html(str);
        }
        , error : function(data, status, err) {
            alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
        }
    });
}

function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

function loading() {
    if ($('#loader').css("display") == "none") {
        $('.mask').css("display", "block");
        $('#loader').css("display", "block");
    } else {
        $('.mask').css("display", "none");
        $('#loader').css("display", "none");
    }
}
</script>
