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
                                <td>No</td>
                                <td>학생이름</td>
                                <td>학생번호</td>
                                <td>전화번호</td>
                                <td>응시일</td>
                                <td>채점자</td>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>
                                <div class="form-group ">
                                        <select name="student_name" class="chosen-select chosen form-control" style="display: none;">
                                            <option value="">전체</option>
                                            <?php foreach($STUDENT_LIST as $sl){
                                                echo "<option value='" . $sl->ULS_SEQ . "'>" . $sl->ULS_NAME . "</option>";
                                            }
                                            ?>
                                        </select>
                                                                <!-- </select><div class="chosen-container chosen-container-single" style="width: 242px;" title=""><a class="chosen-single" tabindex="-1"><span>전체</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off"></div><ul class="chosen-results"><li class="active-result result-selected" style="" data-option-array-index="0">전체</li><li class="active-result" style="" data-option-array-index="1">대표이사</li><li class="active-result" style="" data-option-array-index="2">전무이사</li><li class="active-result" style="" data-option-array-index="3">상무</li><li class="active-result" style="" data-option-array-index="4">이사</li><li class="active-result" style="" data-option-array-index="5">부장</li><li class="active-result" style="" data-option-array-index="6">차장</li><li class="active-result" style="" data-option-array-index="7">과장</li><li class="active-result" style="" data-option-array-index="8">대리</li><li class="active-result" style="" data-option-array-index="9">사원</li><li class="active-result" style="" data-option-array-index="10">주임</li><li class="active-result" style="" data-option-array-index="11">차장보</li><li class="active-result" style="" data-option-array-index="12">계장</li><li class="active-result" style="" data-option-array-index="13">수습직원</li><li class="active-result" style="" data-option-array-index="14">계약직</li><li class="active-result" style="" data-option-array-index="15">직책</li><li class="active-result" style="" data-option-array-index="16">알바</li></ul></div></div> -->
                                </div>
                                </td>
                                <td>1234</td>
                                <td>010-1234-1234</td>
                                <td>2020-08-08</td>
                                <td>김좌진</td>
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
                            <form id="paperCheckForm" name="paper-check-form">
                            <table class="table table-bordered table-hover table-condensed">
                                <tr class="info">
                                    <td class="col-md-4">문항</td>
                                    <td class="col-md-4">점수</td>
                                    <td class="col-md-4">메모</td>
                                </tr>
                                <tbody id="bodyMatchItem">
                                <?php
                                $sum = 0;
                                foreach ($MATCH_LIST as $ml){
                                    $sum += $ml->EML_ULM_SCORE;
                                ?>
                                
                                <tr>
                                    <input type="hidden" name="eml_seq" value=<?php echo $ml->EML_SEQ;?>>
                                    <td><?php echo $ml->EML_SEQ;?></td>
                                    <td><input type="text" name="score" value=<?php echo $ml->EML_ULM_SCORE?>></td>
                                    <td><input type="text" name="comment" value="<?php echo $ml->EML_COMMENT?>"></td>
                                </tr>

                                <?php
                                
                                }
                                ?>

                                    <td class="info">총점</td>
                                    <td class="warning" colspan="3" style="text-align:center;"><?php echo $sum;?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <ul class="pager" style="margin-top:10px; margin-bottom:0px;">
                                    <li><a href="#">이전</a></li>
                                    <li><a href="#" style="margin:0 50px;" id="saveBtn">저장</a></li>
                                    <li><a href="#">다음</a></li>
                                </ul>
                            </div>
                            </form>
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

$(document).ready(function (){
    $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
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
            "commentArr" : commentArr
        }
        , success : function(data){
            console.log(data);
            location.reload();
        }
        , error : function(e){
            console.log(e);
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