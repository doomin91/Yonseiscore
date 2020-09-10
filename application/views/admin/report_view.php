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
                            <select id="examSel" name="exam_name" class="chosen-select chosen form-control input-sm" style="display: none;">
                                <option value="">전체</option>
                                <?php foreach($EXAM_LIST as $ql){
                                    echo "<option>[". $ql->ETL_ROUND . "회차]".$ql->ETL_NAME ."</option>";

                                }?>
                            </select>
                        </div>
                        <div class="right-menu">
                            <form id="reportForm" name="reportForm" method="post" action="/Report/reportDownload">
                                <button type="button" class="btn btn-success" id="reportDnBtn" value="보고서 다운로드"><i class="fa fa-file-excel-o" aria-hidden="true"> 보고서 다운로드</i></button>
                            </form>
                        </div>
                    </div>
                        
                    <div class="tile-body" style="padding-bottom:50px;">
                        <table class="table table-bordered table-hover table-condensed" id="reportList">
                            <thead>
                                <tr class="info text-center">
                                    <th class="text-center">답안코드</th>
                                    <th class="text-center">응시자번호</th>
                                    <th class="text-center">응시자이름</th>
                                    <th class="text-center">채점자</th>
                                    <th class="text-center">문항</th>
                                    <!-- <th class="text-center">선택/단답</th> -->
                                    <?php 
                                    $num = 1;
                                    $keys = array_keys($REPORT_LIST);
                                    $total = array_key_last($REPORT_LIST);

                                    for ($i = 0; $i < count($keys); $i++) {
                                        $SUB_SCORE = explode(",", $REPORT_LIST[$keys[$i]]->SUB_SCORE);
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
                                    <td></td>
                                    <td><?php echo $REPORT_LIST[$keys[$i]]->ULS_NO;?></td>
                                    <td><?php echo $REPORT_LIST[$keys[$i]]->ULS_NAME;?></td>
                                    <td><?php echo $REPORT_LIST[$keys[$i]]->ULM_NAME;?></td>
                                    <td><?php echo $num;
                                    
                                    if($i != $total){
                                        if($REPORT_LIST[$keys[$i]]->EML_ULM_SEQ != $REPORT_LIST[$keys[$i+1]]->EML_ULM_SEQ){
                                            $num = 0;
                                        }
                                    }
                                    ?></td>
                                    <?php 
                                    $SUB_SCORE = explode(",", $REPORT_LIST[$keys[$i]]->SUB_SCORE);
                                    for ($j=0 ;$j < $MAX_SCORE; $j++){
                                        if(count($SUB_SCORE) > $j){
                                            echo "<td>". $SUB_SCORE[$j] ."</td>";
                                        }else {
                                            echo "<td></td>";
                                        }
                                        
                                    }
                                    ?>
                                    <td><?php echo $REPORT_LIST[$keys[$i]]->EML_COMMENT;?></td>
                                </tr>

                                <?php 

                                $num += 1;    
                                }
                                ?>
                            </thead>
                        </table>
                        <!-- /tile body -->
                    
                    <div class="col-md-12 text-center">
                        <div class="dataTables_paginate paging_bootstrap paging_custombootstrap" style="margin-top:10px; width:100%;">
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


$("#reportDnBtn").click(function(){
    let rows = $("tr").length;
    let cols = $("tr").children("th").length;
    console.log("행 : " + rows + " 열 : " + cols);

    for ($i=0; $i < cols ; $i++){
        eval("column" + $i + "= new Array()");
    }
    
    $("tr").each(function(index){
        if(index == 0){
            for ($i=0; $i < cols ; $i++){
                eval("column" + $i + ".push($(this).find('th').eq(" + $i + ").html())");
            }       
        } else {
            for ($i=0; $i < cols ; $i++){
                eval("column" + $i + ".push($(this).find('td').eq(" + $i + ").html())");
            }   
        }
        
    })

    for ($i=0; $i < cols ; $i++){
        eval("console.log(column" + $i + ")");

    }

    $.ajax({
        url : "/Report/download",
        type : "post",
        data : {},
        sucuess : function(data){
            console.log(data);
        },
        error : function(e){
            console.log(e);
        }
    })

    // $("#reportForm").append("<input type='hidden' name='cols' value=" + cols + ">");
    // $("#reportForm").append("<input type='hidden' name='rows' value=" + rows + ">");

    // $("#reportForm").attr({
    //     'method':'post',
    //     'action':'/Report/download'
    // });
    // $("#reportForm").submit();
})
    
</script>

