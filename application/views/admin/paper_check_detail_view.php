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
    

    td, th {
        text-align:center;
        vertical-align:middle !important;
    }

    .chosen-single , .chosen-results{
        text-align:left;
    }

</style>

<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff;">
<input type="hidden" name="EID" id="EID" value=<?php echo $_GET["EID"];?>>
<input type="hidden" name="SEQ" id="SEQ" value=<?php echo $_GET["SEQ"];?>>
    <!-- page header -->
    <div class="pageheader">
        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>You are here</li>
                <li>
                    채점 관리
                </li>
                <li class="active">채점 관리</li>
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
                            <strong>채점 관리</strong>
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
                                <td>명칭</td>
                                <td>학생이름</td>
                                <td>학생번호</td>
                                <td>전화번호</td>
                                <td>응시일</td>
                                <td>채점자</td>

                            </tr>
                            <tr>
                                <td>S<?php echo $_GET["SEQ"];?></td>
                                <td>
                                <div>
                                        <select id="student-name" name="student_name" data-eid="<?php echo $_GET['EID']?>" data-eplid="<?php echo $_GET['SEQ']?>" class="chosen-select chosen form-control" style="display: none;" disabled>
                                            <option value="">미할당</option>
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
                                <?php foreach($LIST as $lt){ ?>
                                    <td><?php echo $lt->ETL_DATE;?></td>
                                <?php }?>
                                <td><?php echo $MARKER->ULM_NAME;?></td>
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
                            <form id="paperCheckForm" name="paper-check-form">
                            <table class="table table-bordered table-hover table-condensed">
                                <tr class="info">
                                    <td class="col-md-2" colspan=2>문항</td>
                                    <td class="col-md-1">배점</td>
                                    <td class="col-md-2">유형</td>
                                    <td class="col-md-3">점수</td>
                                    
                                    <td class="col-md-4">메모</td>
                                </tr>
                                <tbody id="bodyMatchItem">
                                <?php
                                $sum = 0;
                                $Q = 0;
                                $TEMP = "";
                                $DEPTH = "";
                                foreach ($MATCH_LIST as $key => $ml){
                                    if(!empty($ml->EML_ULM_SCORE)){
                                        $sum += $ml->EML_ULM_SCORE;
                                    }

                                    
                                ?>
                                
                                <tr <?php if($ml->EQL_NON_TARGET){ echo "style='background:#eee; color:#aaa'";}?>>
                                    <input type="hidden" name="eml_seq" value=<?php echo $ml->EML_SEQ;?>>
                                    
                                    <?php 
                                                if($ml->PARENT_SEQ != $TEMP){
                                                    echo '<td class="info" name="parent_row">' . ($Q+1) . '</td>';
                                                    $Q += 1; // parent q num
                                                    $DEPTH = $ml->DEPTH; // Depth = 1
                                                } else {
                                                    echo '<td class="info" name="child_row" style="border:0;">' . '</td>';
                                                    $DEPTH = (int)$DEPTH + 1; // child q(Depth = 2)
                                                }
                                                
                                                if($DEPTH == 1){
                                                    if(count($MATCH_LIST)==1)
                                                        echo "<th>". $Q ."</th>";
                                                    else if($key === array_key_last($MATCH_LIST))
                                                        echo "<th>". $Q ."</th>";
                                                    else if($MATCH_LIST[$key+1]->DEPTH == 1)
                                                        echo "<th>". $Q ."</th>";
                                                    else
                                                        echo "<th>". $Q . "-" . 1 ."</th>";

                                                } else {
                                                    echo "<th>". $Q ."-".$DEPTH."</th>";
                                                }
                                    ?>
                                    <td><?php echo $ml->EQL_SCORE;?></td>
                                    <td><?php                                                 
                                        switch($ml->EQL_TYPE){
                                                    case 0:
                                                        echo "객관식";
                                                        break;
                                                    case 1:
                                                        echo "주관식";
                                                        break;
                                                    case 2:
                                                        echo "서술형";
                                                        break;
                                                }?></td>

                                    <td><select name="score" class="input-sm" style="width:100%">

                                    <?php for($i=0 ; $i <= $ml->EQL_SCORE ; $i++){

                                            if( $ml->EML_ULM_SCORE == $i ){
                                                echo "<option value='" . $i . "' selected>" . $i . "</option>";
                                            } else {
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                            }
                                    }
                                        ?>
                                    </select>
                                    <td><input type="text" name="comment" class="form-control tt-query" style="width:100%;" value="<?php echo $ml->EML_COMMENT?>"></td>

                                </tr>

                                <?php
                                    
                                $TEMP = $ml->PARENT_SEQ;
                                $LAST_NUMBER = $Q;
                                }
                                
                                ?>

                                    <td class="info">총점</td>
                                    <td class="warning" colspan="5" style="text-align:center;"><?php echo $sum;?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <ul class="pager" style="margin-top:10px; margin-bottom:0px;">
                                    <!-- <li><a href="#">이전</a></li> -->
                                    <li><a href="#" id="saveBtn">저장</a></li>
                                    <!-- <li><a href="#">다음</a></li> -->
                                </ul>
                            </div>
                            </form>
                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->
                    <div class="tile">
                        <a href="/admin/paperCheck?EID=<?php echo $_GET["EID"];?>" class="btn btn-slategray" style="float:left; margin-left:15px;" >목록</a>
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

$("#saveBtn").click(function(){
    let seqArr = new Array();
    let scoreArr = new Array();
    let commentArr = new Array();
    let form = $("#paperCheckForm").serializeArray();
    for (let i=0 ; i< form.length ; i++){
        console.log(form[i])
        switch(form[i]["name"]){
            case "eml_seq" : 
                seqArr.push(form[i]["value"]);
                break;
            case "score" :
                scoreArr.push(form[i]["value"]);
                break;
            case "comment" :
                commentArr.push(form[i]["value"]);
                break;
            default :
                console.log(form[i]);
        }

    }

    $.ajax({
        type : "post"
        , url : "/Exam/updateMatchInfo"
        , dataType : "json"
        , data : {
            "seqArr" : seqArr,
            "scoreArr" : scoreArr,
            "commentArr" : commentArr,
            "EID" : $("#EID").val(),
            "PAPER_SEQ" : $("#SEQ").val()
        }
        , success : function(data){
            console.log(data);
            alert("저장되었습니다.")
        }
        , error : function(e){
            console.log(e.responseText);
        }
    })
})

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
