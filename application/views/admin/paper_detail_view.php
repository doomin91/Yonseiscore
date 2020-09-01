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
                                <td>NO</td>
                                <td>학생이름</td>
                                <td>학생번호</td>
                                <td>전화번호</td>
                                <td>응시일</td>
                                <td>채점자</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

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
                    <div class="col-md-12">
                            <div class="dataTables_paginate paging_bootstrap paging_custombootstrap" style="float:none; text-align:center; position:relative; top:40px;" >
                                <ul class="pagination">
                                    <li class="prev disabled">
                                        <a href="#"><</a>
                                    </li>
                                    <li class="next">
                                        <a href="#">></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="img-contents">
                            <img src="https://semosu.com/data/exam/742/ab001.gif" width="100%"></div>
                        </div>



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
                                    <td>문항</td>
                                    <?php foreach($MARKER_LIST as $ml){
                                    echo "<td>" . $ml->ULM_NAME . "</td>";
                                    }?>
                                    <td>평균점수</td>
                                    <td>코멘트</td>
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

<script src="/assets/js/minimal.min.js"></script>
<script>
let xhr = $.ajax();

$(document).ready(function (){
    viewMatchInfo();
})

$(document).keydown(function (event) {
    if (event.keyCode == 27 || event.which == 27) {
        $('#modal').css("display", "none");
        ModalInit();
        xhr.abort();
    }
});

function viewMatchInfo(){
    // Marker 테스트
    $.ajax({
        type : "post"
        , url : "/Exam/getMatchInfo"
        , dataType : "json"
        , data : { "SEQ" : 12 }
        , success : function(matchInfo){
            console.log(matchInfo);
            str = "";
            average = 0;
            account = matchInfo.length/3;
            for(i=0;i<matchInfo.length/3;i++){
                str += "<tr>";
                str += "<td>" + (i+1) +"</td>";
                str += "<td>" + matchInfo[i].EML_ULM_SEQ +"</td>";
                str += "<td>" + matchInfo[i+account].EML_ULM_SEQ +"</td>";
                str += "<td>" + matchInfo[i+account*2].EML_ULM_SEQ +"</td>";
                average = (parseFloat(matchInfo[i].EML_ULM_SCORE) + parseFloat(matchInfo[i+account].EML_ULM_SCORE) + parseFloat(matchInfo[i+account*2].EML_ULM_SCORE))/3;
                average = average.toFixed(2);
                str += "<td>" + average +"</td>";
                str += "<td>";
                str += "<label class='label label-default' title='" + matchInfo[i].EML_COMMENT + "'>A</label>"
                str += "<label class='label label-default' title='" + matchInfo[i+account].EML_COMMENT + "'>B</label>"
                str += "<label class='label label-default' title='" + matchInfo[i+account*2].EML_COMMENT + "'>C</label>"
                str += "</td>";
                str += "</tr>";
            }
            $("#bodyMatchItem").html(str);
        }
        , error : function(data, status, err) {
            alert("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
        }
    });
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