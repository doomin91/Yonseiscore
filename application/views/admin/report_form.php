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

    </div>
    <!-- /page header -->

    <!-- content main container -->
    <div class="main">

        <div class="row">

            <!-- col 12 -->
            <div class="col-md-12">

                <section class="tile">
                    <!-- tile body -->
                    <div class="tile-header ">
                        
                    <div class="tile-body" style="padding-bottom:50px;">
                        <table class="table table-bordered table-hover table-condensed" id="reportList">
                            <thead>
                            <tr class="info text-center">
                                    <th class="text-center">#</th>
                                    <th class="text-center">시험명</th>
                                    <th class="text-center">회차</th>
                                    <th class="text-center">응시자번호</th>
                                    <th class="text-center">응시자이름</th>
                                    <th class="text-center">채점자</th>
                                    <th class="text-center">문제</th>
                                    <!-- <th class="text-center">선택/단답</th> -->
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
                                            $MAX_SCORE = $NOW_SCORE+1;
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
                                    <td><?php echo $pagenum ?></td>
                                    <td><?php echo $lists[$keys[$i]]->ETL_NAME?></td>
                                    <td><?php echo $lists[$keys[$i]]->ETL_ROUND?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULS_NO;?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULS_NAME;?></td>
                                    <td><?php echo $lists[$keys[$i]]->ULM_NAME;?></td>
                                    <td><?php echo "문항".$num;
                                    
                                    if($i != $total){
                                        if($lists[$keys[$i]]->EML_ULM_SEQ != $lists[$keys[$i+1]]->EML_ULM_SEQ){
                                            $num = 0;
                                        }
                                    }
                                    ?></td>
                                    <?php 
                                    $SUB_SCORE = explode(",", $lists[$keys[$i]]->SUB_SCORE);
                                    for ($j=0 ;$j < $MAX_SCORE; $j++){
                                        if(count($SUB_SCORE) > $j){
                                            echo "<td>". $SUB_SCORE[$j] ."</td>";
                                        }else {
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                    ?>
                                    <td><?php echo $lists[$keys[$i]]->EML_COMMENT;?></td>
                                </tr>

                                <?php 
                                $pagenum -= 1;
                                $num += 1;    
                                }
                            } else {
                                echo "<tr><td colspan=6 class='text-center' style='height:100px; vertical-align:middle';>검색 결과가 없습니다.</td></tr>";
                            }
                                ?>
                            </thead>
                        </table>
                        <!-- /tile body -->

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

