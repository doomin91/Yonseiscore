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
                    <div class="tile-header report-view">
                        <div class="left-menu">
                            <form id="reportForm" name="reportForm" method="post" action="/Report/reportDownload">
                                <a href="/report/reportDownload?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ""; ?>" class="btn btn-success" id="reportDnBtn" value="보고서 다운로드"><i class="fa fa-file-excel-o" aria-hidden="true"> 보고서 다운로드</i></a>
                            </form>
                        </div>
                        <div class="right-menu">

                        </div>
                        <form name="sform" id="sform" method="get" style="float:right">
                            <label for="search">
                                <input type="text" name="search" id="search" aria-controls="basicDataTable" placeholder="Search" class="form-control" value="<?php echo $search; ?>">
                            </label>
                    </form>
                    </div>
                        


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

                                    <th class="text-center">항목</th>
                                    <th class="text-center">선택/단답</th>
                                    <?php 
                                    $num = 1;
                                    if(!empty($lists)){
                                    $keys = array_keys($lists);
                                    $total = array_key_last($lists);

                                    for ($i = 0; $i < count($keys); $i++) {
                                        $SUB_SCORE = explode(",", $lists[$keys[$i]]->SUB_SCORE);
                                        $NOW_SCORE = count($SUB_SCORE);
                                        $MAX_SCORE = 0;
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

                                ?>
                                <tr>
                                    <td><?php echo $lists[$keys[$i]]->ETL_NAME?></td>
                                    <td><?php echo $lists[$keys[$i]]->ETL_ROUND?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULM_NAME;?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULS_NO;?></td>

                                    <td>문항<?php echo $num;?>

                                    <?php 
                                    if ($i != count($keys)-1){
                                        if($lists[$keys[$i]]->EQL_RA_SEQ == $lists[$keys[$i+1]]->EQL_RA_SEQ){
                                            if($lists[$keys[$i]]->PARENT_SEQ > $lists[$keys[$i+1]]->PARENT_SEQ){
                                                $num = 0;
                                            }
                                        } else {
                                            $num = 0;
                                        }
                                    }
                                    ?>


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
                                $num += 1;    
                                }
                            } else {
                                echo "<tr><td colspan=6 class='text-center' style='height:100px; vertical-align:middle';>검색 결과가 없습니다.</td></tr>";
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

