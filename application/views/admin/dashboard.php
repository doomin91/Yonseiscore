<div id="popup-dialog" style="display:none;">
    <label>    
    <table class="table table-custom table-sortable nomargin">
            <thead>
                <tr>
                <th class="sortable sort-numeric sort-asc text-center">No</th>
                <th class="sortable sort-alpha text-center">이름</th>
                <th class="sortable text-center">식별번호</th>
                <th class="sortable sort-amount text-center">채점상태</th>
                <th class="text-right text-center">진행률</th>
                </tr>
            </thead>
            <tbody id="popup-tbody">
                
            </tbody>
        </table>
    <label>
</div>

<style>

</style>
                <!-- Page content -->
                <div id="content" class="col-md-12" style="background:#fff;">

                    <!-- page header -->
                    <div class="pageheader">

                        <h2>
                            <i class="fa fa-lightbulb-o" style="line-height: 48px;padding-left: 0;"></i>
                            대쉬보드
                            </h2>

                        <div class="breadcrumbs">
                            <ol class="breadcrumb" style="line-height: 48px;">
                                <li>You are here</li>
                                <li>
                                    관리 메뉴
                                </li>
                                <li class="active">대쉬보드</li>
                            </ol>
                        </div>

                    </div>
                    <!-- /page header -->

                    <!-- content main container -->
                    <div class="main">

                        <!-- row -->
                        <div class="row">

                            <!-- col 8 -->
                            <div class="col-md-12">
                                <!-- tile -->
                                <section class="tile ">

                                    <!-- tile header -->
                                    <div class="tile-header">
                                    
                                    <div class="controls">
                                        <a href="#" class="minimize"><i class="fa fa-chevron-down"></i></a>
                                        <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                                        <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                    </div>
                                    </div>
                                    <!-- /tile header -->


                                    <!-- tile body -->
                                    <div class="tile-body no-vpadding">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-condensed">
                                            <thead>
                                                <tr class="info">
                                                    <th class="text-center col-md-1">No</th>
                                                    <th class="text-center col-md-1">회차</th>
                                                    <th class="text-center col-md-1">등급</th>
                                                    <th class="text-center col-md-2">시험명</th>
                                                    <th class="text-center col-md-2">시험일</th>
                                                    <th class="text-center col-md-5">진행상태</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if (!empty($lists)) : 
                                                        foreach ($lists as $list) :
                                                ?>
                                                        <tr class="text-center">
                                                            <td ><?php echo $pagenum; ?></td>
                                                            <td ><?php echo $list->ETL_ROUND; ?></td>

                                                            <?php if($list->ETL_LEVEL == 0 ):?>
                                                                <td class="priority"><label class="label label-success"><?php echo "초급"; ?></label></td>
                                                            <?php elseif($list->ETL_LEVEL == 1): ?>
                                                                <td class="priority"><label class="label label-warning"><?php echo "중급"; ?></lable></td>
                                                            <?php else: ?>
                                                                <td class="priority"><label class="label label-danger"><?php echo "고급"; ?></lable></td>
                                                            <?php endif?> 

                                                            <td><a href="#" onclick="show_exam_status_detail(event, <?php echo $list->ETL_SEQ?>)"> <?php echo $list->ETL_NAME; ?> </a></td>
                                                            <td><?php echo $list->ETL_DATE?></td>
                                                            <td class="progress-cell">
                                                                <div class="progress-info">
                                                                    <div class="percent"><span> <?php echo round(($list->COMPLITED/$list->TOTAL)*100, 1) ?> % </span></div>
                                                                </div>
                                                                <div class="progress progress-striped">
                                                                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="<?php echo round(($list->COMPLITED/$list->TOTAL)*100, 1) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round(($list->COMPLITED/$list->TOTAL)*100, 1) ?>%"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $pagenum--;
                                                        endforeach;
                                                    else : 
                                                        echo "<tr><td colspan=\"6\" class=\"text-center\"> * 진행중인 시험이 없습니다.</td></td>";
                                                    endif;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <!-- /tile body -->


                                    <!-- tile footer -->
                                    <div class="tile-footer text-center">
                                        <!-- <div class="col-md-12 text-center"> -->
                                            <div class="dataTables_paginate paging_bootstrap paging_custombootstrap" style="margin-top:10px; width:100%;">
                                                <?php echo $pagination; ?>
                                            </div>
                                        <!-- </div>   -->
                                    </div>
                                    <!-- /tile footer -->



                                </section>
                                <!-- /tile -->
                            </div>

                        </div>
                        <!-- /col 8 -->


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
        <!-- <script
            type="text/javascript"
            src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script> -->
        
        <!-- <script type="text/javascript" src="/assets/js/vendor/blockui/jquery.blockUI.js"></script>\ -->

       

        <!-- <script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script> -->

        <script src="/assets/js/minimal.min.js"></script>
        <script type="text/javascript" src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
    
        <script>
        
            function show_exam_status_detail(event, eid){
                var clicked;
                if(clicked)
                    return false;
                function makeTable(data){
                    for(i = 0 ; i < data.length ; i++){
                        var html = ""+
                                "<tr class='text-center tr-marker-info'>"+
                                    "<td>"+ data[i].EPM_ULM_SEQ + "</td>"+
                                    "<td>"+ data[i].ULM_NAME + "</td>"+
                                    "<td>"+ data[i].ULM_NO + "</td>"+
                                    "<td>" + data[i].COMPLITED_PAPER + "/" + data[i].TOTAL_PAPER + "</td>"+
                                    "<td class='progress-cell'>"+
                                        "<div class='progress-info'>"+
                                            "<div class='percent'><span>" + ((data[i].COMPLITED_PAPER/data[i].TOTAL_PAPER)*100).toFixed(1) + "</span></div>"+
                                        "</div>"+
                                        "<div class='progress progress-striped'>"+
                                            "<div class='progress-bar progress-bar-red' role='progressbar' aria-valuenow='" + ((data[i].COMPLITED_PAPER/data[i].TOTAL_PAPER)*100).toFixed(1) + "' aria-valuemin='0' aria-valuemax='100' style='width: "+ ((data[i].COMPLITED_PAPER/data[i].TOTAL_PAPER)*100).toFixed(1) +"%'></div>"+
                                        "</div>"+
                                    "</td>"+
                                "</tr>"
                                    "";
                        $('#popup-tbody').append(html);
                    }

                    popupDialog.dialog('open');
                }
                var popupDialog;

                popupDialog = $( "#popup-dialog" ).dialog({
                    autoOpen: false,
                    width: "auto",
                    height: "auto",
                    position: { my: "center", at: "cetner", of: window },
                    resizable: false,
                    modal: true,
                    appendTo: ".navbar",
                    
                    close: function() {
                        $( "#popup-dialog" ).attr("class", "dialog-layout text-center" );
                        $('tr.tr-marker-info').remove();
                        clicked = 0;
                    },
                    create: function() {
                        
                    },
                    open: function(event, ui){
                        // $('.ui-dialog-titlebar').css("display", "none");
                        clicked = 1;
                        $( "#popup-dialog" ).attr("class", "dialog-active text-center" );

                        $( ".ui-widget-overlay").css("background", "rgb(0.0.0)");
                        $( ".ui-widget-overlay").css("opacity", "0.5");
                        $( ".ui-dialog").css("overflow", "auto");
                        $( ".ui-dialog").css("padding", "20px");

                    }
                });

                $.ajax({
                        type : "POST",
                        url : "/Admin/examStatusOfProgress",
                        dataType : "JSON",
                        data : {"eid" : eid} ,
                        success : function(resultMsg){
                            console.log(resultMsg);
                            if (resultMsg.code == "200"){
                                console.log(resultMsg.data);
                                makeTable(resultMsg.data);                                
                            }else{
                                alert(resultMsg.msg);
                            }
                            
                        }, error: function(data, status, err) {
                            console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                        }
                    });
            }

            $(function(){
                var sel = [$('.progress-bar[aria-valuenow=0]'), $('.progress-bar[aria-valuenow=1]'), $('.progress-bar[aria-valuenow=2]')] ;
                for(i = 0 ; i < sel.length ; i++){
                    for(k = 0 ; k < sel[i].length ; k++){
                        if(i==0)
                            $(sel[i][k]).css("min-width", "1px");
                        else if(i==1)
                            $(sel[i][k]).css("min-width", "2px");
                        else
                            $(sel[i][k]).css("min-width", "3px");
                    }       
                }

                window.addEventListener('resize', function(e){
                    var dWidth = window.innerWidth ? window.innerWidth : $(window).width();
                    var dHeight = window.innerHeight ? window.innerHeight : $(window).height();
                    var activeDialog = $('.dialog-active');
                    activeDialog.dialog("option", "width", "auto");
                    activeDialog.dialog("option", "height", "auto");
                });
            })
        </script>