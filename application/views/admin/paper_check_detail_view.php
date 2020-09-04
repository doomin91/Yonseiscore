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
                                    <div class="form-group">
                                            <select data-placeholder="학생" tabindex="-1" class="chosen-select form-control" id="chosen" style="display: none;">
                                                <option>선택</option>
                                                <option value="A">[학번] 학생 A</option>
                                                <option value="B">[학번] 학생 B</option>
                                                <option value="C">[학번] 학생 C</option>
                                                <option value="D">[학번] 학생 D</option>
                                                <option value="E">[학번] 학생 E</option>

                                            </select>
                                            <!-- <div class="chosen-container chosen-container-multi" style="width: 514px;" title="" id="chosen_chosen"><ul class="chosen-choices"><li class="search-choice"><span>johny@gmail.com</span><a class="search-choice-close" data-option-array-index="1"></a></li><li class="search-choice"><span>arnie@gmail.com</span><a class="search-choice-close" data-option-array-index="2"></a></li><li class="search-choice"><span>pete@gmail.com</span><a class="search-choice-close" data-option-array-index="3"></a></li><li class="search-field"><input type="text" value="Select recipients..." class="" autocomplete="off" style="width: 25px;" tabindex="3"></li></ul><div class="chosen-drop"><ul class="chosen-results"><li class="active-result" style="" data-option-array-index="0">ici@gmail.com</li><li class="result-selected" style="" data-option-array-index="1">johny@gmail.com</li><li class="result-selected" style="" data-option-array-index="2">arnie@gmail.com</li><li class="result-selected" style="" data-option-array-index="3">pete@gmail.com</li><li class="active-result" style="" data-option-array-index="4">gorge@gmail.com</li></ul></div></div> -->
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
                                    <td class="col-md-1">문항</td>
                                    <td class="col-md-1">점수</td>
                                    <td class="col-md-4">메모</td>
                                </tr>
                                <tbody id="bodyMatchItem">
                                <tr>
                                    <td class="info">1</td>
                                    <td><input type='text' class="score"></td>
                                    <td><input type='text' class="comment"></td>
                                </tr>
                                <tr>
                                    <td class="info">2</td>
                                    <td><input type='text' class="score"></td>
                                    <td><input type='text' class="comment"></td>
                                </tr>
                                <tr>
                                    <td class="info">3</td>
                                    <td><input type='text' class="score"></td>
                                    <td><input type='text' class="comment"></td>
                                </tr>
                                <tr>
                                    <td class="info">총점</td>
                                    <td colspan=2 class="warning" style="text-align:center">100</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <ul class="pager" style="margin-top:10px; margin-bottom:0px;">
                                    <li><a href="#">이전</a></li>
                                    <li><a href="#" style="margin:0 50px;">저장</a></li>
                                    <li><a href="#">다음</a></li>
                                </ul>
                            </div>
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

//initialize chosen
$(".chosen-select").chosen({disable_search_threshold: 10});

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