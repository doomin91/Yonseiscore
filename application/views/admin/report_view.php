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
<div id="content" class="col-md-12" style="background:#fff;">

    <!-- page header -->
    <div class="pageheader">

        <h2>
            <strong>보고서</strong>
        </h2>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>You are here</li>
                <li class="active">보고서</li>
            </ol>
        </div>

    </div>
    <!-- /page header -->

    <!-- content main container -->
    <div class="main">

        <div class="row">

            <!-- col 12 -->
            <div class="col-md-12">

                <section class="tile">
                    <!-- tile body -->

                    <section class="tile">

                  <!-- tile body -->
                  <div class="tile-body" >
  
                    <h4><strong>Search Form</strong></h4>

                    <form name="sform" id="sform" method="get" >

                    <div class="row notification notification-info " style="margin:0 0;"> 
                    <div class="col-lg-12">
                        <div class="row" style="margin:5px 0">
                            <div class="col-lg-8">
                                <div class="" style="float:right;">
                                    시험명
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-4">
                                <div class="">
                                    <select id="exam_name" name="exam_name" class="chosen-select chosen form-control" style="display: none; witdh">
                                    <option value="">전체</option>
                                        <?php foreach($EXAM_LIST as $el){
                                            if($exam_name == $el->ETL_NAME){
                                                echo "<option value='" . $el->ETL_NAME . "' selected>" . $el->ETL_NAME . "</option>";    
                                            } else {
                                                echo "<option value='" . $el->ETL_NAME . "'>" . $el->ETL_NAME . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><!-- /.col-lg-6 -->

                        </div><!-- /.row -->

                        <div class="row" style="margin:5px 0">

                            <div class="col-lg-8">
                                <div class="" style="float:right;">
                                    <p>회차</p>
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-4">
                                <div class="">
                                    <select id="exam_round" name="exam_round" class="chosen-select chosen form-control" style="display: none;">
                                    <option value="">전체</option>
                                    <?php foreach($EXAM_LIST as $el){
                                            if($exam_round == $el->ETL_ROUND){
                                                echo "<option value=" . $el->ETL_ROUND . " selected>" . $el->ETL_ROUND . "</option>";
                                            } else {
                                                echo "<option value=" . $el->ETL_ROUND . ">" . $el->ETL_ROUND . "</option>";
                                            }
                                            
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div><!-- /.col-lg-6 -->

                        </div><!-- /.row -->
                        <div class="row" style="margin:5px 0">

                            <div class="col-lg-8">
                                <div class="" style="float:right;">
                                    채점자
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-4">
                                <div class="">
                                    <select id="marker_name" name="marker_name" class="chosen-select chosen form-control" style="display: none;">
                                    <option value="">전체</option>
                                    <?php foreach($MARKER_LIST as $ml){
                                            if($marker_name == $ml->ULM_NAME){
                                                echo "<option value='" . $ml->ULM_NAME . "' selected>" . $ml->ULM_NAME . "</option>";
                                            } else {
                                                echo "<option value='" . $ml->ULM_NAME . "'>" . $ml->ULM_NAME . "</option>";

                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div><!-- /.col-lg-6 -->

                        </div><!-- /.row -->


                        <div class="row" style="margin-top:20px; float:right">
                            <div class="col-lg-12" style="text-align:center">
                                <button type="submit" class="btn btn-primary" style="margin-right:5px">검색</button>
                                <form id="reportForm" name="reportForm" method="post" action="/Report/reportDownload">
                                    <a href="/report/reportDownload?<?php echo "exam_name=" . $exam_name . "&exam_round=" . $exam_round . "&marker_name=" . $marker_name ?>" class="btn btn-success" id="reportDnBtn" value="보고서 다운로드"><i class="fa fa-file-excel-o" aria-hidden="true"> 보고서 다운로드</i></a>
                                 </form>
                            </div>
                        </div>
                        </form>
                    </div>
                  </div>
                  <!-- /tile body -->
                


                </section>


                    <div class="tile-body" style="padding-bottom:50px;">
                        <table class="table table-bordered table-hover table-condensed" id="reportList">
                            <thead>
                                <tr class="info text-center">
                                    <th class="text-center">시험명</th>
                                    <th class="text-center">회차</th>
                                    <th class="text-center">채점자</th>
                                    <th class="text-center">응시자번호</th>
                                    <!-- <th class="text-center">EQL_SEQ</th> -->
                                    <!-- <th class="text-center">EQL_RA_SEQ</th> -->
                                    <!-- <th class="text-center">PS</th> -->
                                    <th class="text-center">응시자이름</th>
                                    <th class="text-center">항목</th>
                                    <th class="text-center">선택/단답</th>
                                    <?php 
                                    $num = 1;
                                    if(!empty($lists)){
                                        $keys = array_keys($lists);
                                        $total = array_key_last($lists);
                                        $MAX_SCORE = 0;

                                        for ($i = 0; $i < count($keys); $i++) {
                                            $NOW_SCORE = $lists[$keys[$i]]->EQL_SUB_NUMBER;
                                            if($NOW_SCORE > $MAX_SCORE){
                                                $MAX_SCORE = $NOW_SCORE;
                                            }
                                        }   

                                    for($j=0; $j < $MAX_SCORE ;$j++){
                                    ?>
                                    <th class="text-center">평가<?php echo $j+1;?></th>
                                    <?php  
                                    }
                                    ?>
                                    <th class="text-center">메모</th>
                                </tr>
                                
                                <?php
                                
                                for ($i = 0; $i < count($keys); $i++) {
                                    if($lists[$keys[$i]]->DEPTH == 1){

                                    

                                ?>
                                <tr>
                                    <td><?php echo $lists[$keys[$i]]->ETL_NAME?></td>
                                    <td><?php echo $lists[$keys[$i]]->ETL_ROUND?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULM_NAME;?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULS_NO;?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULS_NAME;?></td>
                                    <td><?php echo $lists[$keys[$i]]->EQL_NUMBER;?></td>

                                    <?php
                                    $SUB_SCORE = explode(",", $lists[$keys[$i]]->SUB_SCORE);
                                    $NOW_SCORE = count($SUB_SCORE);
                                    
                                    if($NOW_SCORE == 1){
                                        for($j = 0; $j < $MAX_SCORE + 1; $j ++){
                                            if($NOW_SCORE > $j){
                                                echo "<td>" . $SUB_SCORE[$j] . "</td>";
                                            } 
                                            else {
                                                echo "<td style='background:#eee'></td>";
                                            }
                                            
                                        }

                                    } else {
                                        echo "<td style='background:#eee'></td>";
                                        for($j = 0; $j < $MAX_SCORE; $j ++){
                                            if($NOW_SCORE > $j){
                                                echo "<td>" . $SUB_SCORE[$j] . "</td>";
                                            } 
                                            else {
                                                echo "<td style='background:#eee'></td>";
                                            }
                                            
                                        }
                                    }


                                    ?>



                                    <td><?php echo $lists[$keys[$i]]->EML_COMMENT;?></td>
                                </tr>

                                <?php 
                                }
                            }
                            } else {
                                echo "<tr><td colspan=7 class='text-center' style='height:100px; vertical-align:middle';>검색 결과가 없습니다.</td></tr>";
                            }
                                ?>
                            </thead>
                        </table>
                        <!-- /tile body -->
                    
                        <div class="col-md-12 text-center">
                        <div class="dataTables_paginate paging_bootstrap paging_custombootstrap" style="margin-top:10px; width:100%;">
                            <?php echo $pagination; ?>
                        </div>
                    </div>  

                </section>

            </div>
            <!-- /col 12 -->

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
<script type="text/javascript"
src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>

<!-- <script type="text/javascript"
src="/assets/js/vendor/blockui/jquery.blockUI.js"></script>\ -->

<script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="/assets/js/minimal.min.js"></script>
<script>
$(document).ready(function(){
    $(".chosen-select").chosen({allow_single_deselect:true},
                           {disable_search_threshold: 10});

    
})

</script>

