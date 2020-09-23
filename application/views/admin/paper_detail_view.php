<div id="image-popup-dialog" style="display:none;">
    <label>    
    <section class="popup slider">
        
    </section>
    <label>
</div>

<style type="text/css">
    .slider {
        width: 100%;
    }

    .popup.slider{
        width: 100%;
        margin-top: 10px;
    }
    #image-popup-dialog label{
        width: 80%;
    }

    .slick-slide {
      margin: 0px 20px;
      transition: all ease-in-out .3s;
      opacity: .2;
    }

    .slick-slide img {
      width: 100%;
      height: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
      font-size: 30px;      
    }

    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }

    td {
        text-align:center;
        vertical-align:middle !important;
    }

    .chosen-single , .chosen-results{
        text-align:left;
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
                                
                                <div>
                                        <select id="student-name" name="student-name" data-eid="<?php echo $_GET['EID']?>" data-eplid="<?php echo $_GET['SEQ']?>" class="chosen-select chosen form-control" style="display: none;">
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
                                <div onclick="magnificPopup(event)">
                                <?php    echo "<img src='" . $al->FILE_PATH . "' name='papers' data-src= '" . $al->FILE_PATH . "'>"; ?>
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
                                    <td class="col-md-2" colspan=2>문항</td>
                                    
                                    <?php 
                                    if(empty($MARKER_LIST)){
                                            echo "<td colspan=3><label class='label label-danger'>채점자를 배정해주세요.</label></td>";
                                    } else {
                                    foreach($MARKER_LIST as $ml){
                                    echo "<td class='col-md-2'>" . "<label class='label label-default'>" . $ml->ULM_SEQ . ". " . $ml->ULM_NAME . "</label>" . "</td>";
                                    }
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
            width: window.innerWidth ? window.innerWidth*0.9 : $(window).width()*0.9,
            height: window.innerHieght ? window.innerHieght*0.9 : $(window).height()*0.9,
            position: { my: "center", at: "cetner", of: window },
            resizable: false,
            modal: true,
            appendTo: ".navbar",
            
            close: function() {
                $( "#image-popup-dialog" ).attr("class", "dialog-layout text-center" );
            },
            create: function() {
                var images = $("img[name=papers]");
                var urls = [];
                for(i = 0 ; i < images.length; i++){
                    urls.push(images[i].currentSrc);
                }
                const distinctUrls = [...new Set(urls)];
                
                for(k = 0 ; k < distinctUrls.length ; k++){
                    var html = ""+
                            "<div>"+
                                "<img src='"+distinctUrls[k]+"' >";
                            "</div>"+
                            "";
                    $( ".popup.slider").append(html)
                }

                $( ".ui-dialog").on("scroll", function(){
                    var scroll = $( ".ui-dialog")[0].scrollTop;
                    $('.ui-dialog-titlebar').css("top", scroll);
                    $('.ui-dialog-titlebar').css("z-index", 1);
                })
            },
            open: function(event, ui){
                // $('.ui-dialog-titlebar').css("display", "none");
                $( "#image-popup-dialog" ).attr("class", "dialog-active text-center" );
                $( ".ui-widget-overlay").css("background", "rgb(0.0.0)");
                $( ".ui-widget-overlay").css("opacity", "0.5");
                $( ".ui-dialog").css("overflow", "auto");

                $(".popup").slick({
                    dots: true,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    prevArrow:"<button type='button' class='slick-prev popup-prev'></button>",
                    nextArrow:"<button type='button' class='slick-next popup-right'></button>"
                });

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
                alert("변경되었습니다.")
            }
            , error : function(data, status, err) {
                console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
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
            activeDialog.dialog("option", "width", dWidth*0.9);
            activeDialog.dialog("option", "height", dHeight*0.9);
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

            q = 0;
            temp = 0;
            depth = 0;
            for(i=0;i<matchInfo.length/3;i++){
                
                if(matchInfo[i].EQL_NON_TARGET == 1){
                    str += "<tr style='background:#eee'>";
                } else {
                    str += "<tr>";
                }

                if(matchInfo[i].PARENT_SEQ != temp){
                    q += 1;
                    depth = parseInt(matchInfo[i].DEPTH);
                    str += "<td class='info'>" + q + "</td>";
                } else {
                    depth += 1;
                    str += "<td class='info'></td>";
                }

                if(depth == 1){
                    if(account == 1){
                        str += "<th>" + q + "</th>";
                    } else if(i == account){
                        str += "<th>" + q + "</th>";
                    } else if(matchInfo[i+1].DEPTH == 1){
                        str += "<th>" + q + "</th>";
                    } else {
                        str += "<th>" + q + "-" + 1 + "</th>";
                    }

                } else {
                    str += "<th>" + q + "-" + depth + "</th>";
                }

                temp = matchInfo[i].PARENT_SEQ;
                // str += "<td>" + matchInfo[i].PARENT_SEQ +"</td>";
                // str += "<td>" + matchInfo[i].DEPTH +"</td>";
                
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
                str += "<th class='info' colspan=2 style='text-align:center';>총점</th>";
                if(isNaN(sum1)){
                    str += "<td class='warning'><label class='label label-warning'>채점중</label></td>";
                }else {
                    str += "<td class='warning'>" + sum1 + "</td>";
                }

                if(isNaN(sum2)){
                    str += "<td class='warning'><label class='label label-warning'>채점중</label></td>";
                }else {
                    str += "<td class='warning'>" + sum2 + "</td>";
                }

                if(isNaN(sum3)){
                    str += "<td class='warning'><label class='label label-warning'>채점중</label></td>";
                }else{
                    str += "<td class='warning'>" + sum3 + "</td>";
                }
                
                if(isNaN(sum1+sum2+sum3)){
                    str += "<td class='warning'><label class='label label-warning'>채점중</label></td>";
                }else{
                    str += "<td class='warning'>" + (sum1+sum2+sum3)/3 + "</td>";
                }

                str += "<td class='warning'></td>";
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
