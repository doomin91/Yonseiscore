<div id="modify-student-form" class="dialog-layout" title="학생 수정"  style="display:none;">
    <form >
        <p class="validateTips"></p>

        <table class="table table-bordered dialog-table">
            <tr class="text-center"> 
                <td>
                    <label for="modify-student-name">이름</label>
                </td>
                <td>
                    <label for="modify-student-no">학번</label>
                </td>
                <td>
                    <label for="modify-student-tel">전화번호</label>
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    <input type="text" id="modify-student-name" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="modify-student-no" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="modify-student-tel" class="text ui-widget-content ui-corner-all">
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="add-student-form" class="dialog-layout" title="학생 개별 등록"  style="display:none;">
    
    <form>
        <p class="validateTips"></p>

        <table class="table table-bordered dialog-table">
            <tr class="text-center"> 
                <td>
                    <label for="add-student-name">이름</label>
                </td>
                <td>
                    <label for="add-student-no">학번</label>
                </td>
                <td>
                    <label for="add-student-tel">전화번호</label>
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    <input type="text" id="add-student-name" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="add-student-no" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="add-student-tel" class="text ui-widget-content ui-corner-all">
                </td>
            </tr>
        </table>
        </table>
    </form>
</div>

<div id="add-student-with-file-form" class="dialog-layout" title="학생 일괄 등록"  style="display:none;">
    <form >
        <p class="validateTips"></p>

        <table class="table table-bordered dialog-table">
            <tr class="text-center"> 
                <td>
                    <label for="add-file-name">파일 선택</label>
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    <input type="file" class="text ui-widget-content ui-corner-all" name="student_list_file" id="student_list_file"/>
                </td>
            </tr>
        </table>
    </form>
</div>

<style>
    .ui-dialog-buttonpane{
        height: 0;
    }
    .dialog-layout{
        height: auto!important;
    }

    table.table-dialog{
        width: 100%;
    }

    tr td input.text{
        width: 100%;
    }
    .validateTips{
        margin-top:5px;
    }

    #add-new-student-with-file{
        margin-right: 5px;
    }
    #header-btn-form{
        margin-bottom: -40px;
    }

</style>

<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff;">

    <!-- page header -->
    <div class="pageheader">

        <h2>
            <strong>응시자 관리</strong>
        </h2>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>DashBoard</li>
                <li>
                    Navigation
                </li>
                <li class="active">학생 관리</li>
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
                    <div class="tile-header">
                        <div id="header-btn-form">
                            <button id="add-new-student-with-file" class="btn btn-default" >일괄 등록</button>
                            <button id="add-new-student" class="btn btn-default">개별 등록</button> 
                        </div>

                        <form name="sform" id="sform" method="get" style="float:right">
                            <label for="search">
                                <input type="text" name="search" id="search" aria-controls="basicDataTable" placeholder="Search" class="form-control" value="<?php echo $search; ?>">
                            </label>
                        </form>
                    </div>
                        
                    <div class="tile-body" style="padding-bottom:50px;">
                        <table class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr class="info text-center">
                                    <th class="text-center">No</th>
                                    <th class="text-center">이름</th>
                                    <th class="text-center">학번</th>
                                    <th class="text-center">전화번호</th>
                                    <th class="text-center">응시횟수</th>
                                    <th class="text-center">등록일</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if (!empty($lists)) : 
                                    foreach ($lists as $list) :
                            ?>
                                    <tr class="text-center">
                                        <td ><?php echo $pagenum; ?></td>
                                        <td><a href="#" onclick="modify_student(event, '<?php echo $list->ULS_SEQ; ?>', '<?php echo $list->ULS_NAME; ?>', '<?php echo $list->ULS_NO; ?>', '<?php echo $list->ULS_TEL; ?>')"> <?php echo $list->ULS_NAME; ?> </a></td>
                                        <td><?php echo $list->ULS_NO ?></td>
                                        <td><?php echo $list->ULS_TEL ?></td>
                                        <td>1</td>
                                        <td><?php echo $list->ULS_REG_DATE ?></td>
                                    </tr>
                            <?php
                                    $pagenum--;
                                    endforeach;
                                else : 
                                    echo "<tr><td colspan=\"6\" class=\"text-center\"> * 등록된 학생이 없습니다.</td></td>";
                                endif;
                            ?>

                            </tbody>
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
<!-- <script type="text/javascript"
src="/assets/js/vendor/animate-numbers/jquery.animateNumbers.js"></script> -->

<!-- <script type="text/javascript"
src="/assets/js/vendor/blockui/jquery.blockUI.js"></script>\ -->

<!-- <script src="/assets/js/vendor/chosen/chosen.jquery.min.js"></script> -->

<script src="/assets/js/minimal.min.js"></script>
<script>
    $(document).ready(function(){
        var addDialog, form
 
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        _name = $( "#add-student-name" ),
        _no = $( "#add-student-no" ),
        _tel = $( "#add-student-tel" ),

        allFields = $( [] ).add( _name ).add( _no ).add( _tel ),

        tips = $( ".validateTips" );

        function updateTips( t ) {
            tips
                .text( t )
                .addClass( "ui-state-highlight" );
            setTimeout(function() {
                tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }
    
        function checkLength( o, n, min, max ) {
            if ( o.val().trim().replace(/ +/g, " ").length > max || o.val().trim().replace(/ +/g, " ").length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( n + "의 길이가 최소 " +
                min + " 최대 " + max + "가 되어야합니다." );
                return false;
            } else {
                return true;
            }
        }

        function checkFile(o) {
            if ( o.val() == "") {
                o.addClass( "ui-state-error" );
                updateTips("파일을 선택해주세요.");
                return false;
            } else{
                if( !(/(.*?)\.(xls|xlsx)$/.test(o.val())) ){
                    o.addClass( "ui-state-error" );
                    updateTips( "엑셀 파일만 업로드 가능합니다." );
                    return false;
                }else 
                    return true;
            }
        }
    
        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } else {
                return true;
            }
        }

        function addStudent() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );
            
            valid = valid && checkLength( _name, "이름", 2, 20 );
            valid = valid && checkRegexp( _name, /^[가-힣a-zA-Z]([가-힣a-zA-Z\s])+$/, "입력 가능 값: [문자, 공백]");

            valid = valid && checkLength( _no, "식별번호", 1, 20 );
            valid = valid && checkRegexp( _no, /^[0-9\-]+$/, "입력 가능 값: [0-9, -]");

            valid = valid && checkLength( _tel, "전화번호", 10, 20 );
            valid = valid && checkRegexp( _tel,  /^[0][1-9][0-9]{0,1}-\d{3,4}-\d{4}$/, "입력 가능 값: [0x-xxx(x)-xxxx] or [0xx-xxx(x)-xxxx]" );
           
            if ( valid ) {
                // loading();
                $.ajax({
                    type: 'post',
                    async: true,
                    data: {
                        "name": _name.val().trim().replace(/ +/g, " "),
                        "no": _no.val(),
                        "tel": _tel.val(),
                    },
                    url: "/Admin/studentCreate",
                    dataType: "json",
                    success : function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert("등록이 완료되었습니다.");
                            document.location.reload();
                        }else{
                            alert(resultMsg.msg);
                        }
                    }, error : function(e){
                        console.log(e);
                        console.log(e.responseText);
                    }
                });
            }
            return valid;
        }

        addDialog = $( "#add-student-form" ).dialog({
            autoOpen: false,
            width: window.innerWidth ? window.innerWidth*0.5 : $(window).width()*0.5,
            resizable: false,
            modal: true,
            position: { my: "center", at: "cetner", of: window },
            show: { effect: "blind", duration: 400 },
            appendTo: ".navbar",
            buttons: {
                "저장": addStudent,
            },
            close: function() {
                form[0].reset();
                form.find('p').text("");
                addDialog.attr("class", "dialog-layout" );
                allFields.removeClass( "ui-state-error" );
            },
            open: function(event, ui){
                $( ".ui-widget-overlay" ).css("background-color", "rgba(0,0,0)");
                $( ".ui-widget-overlay" ).css("opacity", "0.4");

                var wWidth;
            
                //innerWidth / innerHeight / outerWidth / outerHeight 지원 브라우저 
                if ( window.innerWidth && window.innerHeight && window.outerWidth && window.outerHeight ) {
                    wWidth = window.innerWidth;
                }else {

                    wWidth = $(window).width();
                }

                var dWidth = wWidth * 0.5;
                addDialog.dialog("option", "width", dWidth);
                $( "#add-student-form" ).attr("class", "dialog-layout dialog-active");
            }
        });
        
        form = addDialog.find( "form" );
        
        $( "#add-new-student" ).on( "click", function() {
            addDialog.dialog( "open" );
        });


        var addWithFileDialog, form2

        function addStudentWithFile() {
            // if(!checkFile($("#student_list_file")))
            //     return false;
            var dataForm = new FormData();
            var student_list_file = $("input[name=student_list_file]")[0];
            var raw_file = student_list_file.files[0]
            dataForm.append('student_list_file', raw_file);

            $.ajax({
                type : "POST",
                url : "/Admin/studentCreateWithFile",
                dataType : "json",
                data : dataForm,
                processData : false,
                contentType : false,
                success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert("등록이 완료되었습니다.");
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                }, error : function(e){
                    console.log(e);
                    console.log(e.responseText);
                }
            });
        }

        addWithFileDialog = $( "#add-student-with-file-form" ).dialog({
            autoOpen: false,
            width: window.innerWidth ? window.innerWidth*0.5 : $(window).width()*0.5,
            resizable: false,
            modal: true,
            position: { my: "center", at: "cetner", of: window },
            show: { effect: "blind", duration: 400 },
            appendTo: ".navbar",
            buttons: {
                "저장": addStudentWithFile,
            },
            close: function() {
                form[0].reset();
                form.find('p').text("");
                addWithFileDialog.attr("class", "dialog-layout" );
                allFields.removeClass( "ui-state-error" );
            },
            open: function(event, ui){
                $( ".ui-widget-overlay" ).css("background-color", "rgba(0,0,0)");
                $( ".ui-widget-overlay" ).css("opacity", "0.4");

                var wWidth;
            
                //innerWidth / innerHeight / outerWidth / outerHeight 지원 브라우저 
                if ( window.innerWidth && window.innerHeight && window.outerWidth && window.outerHeight ) {
                    wWidth = window.innerWidth;
                }else {

                    wWidth = $(window).width();
                }

                var dWidth = wWidth * 0.5;
                addWithFileDialog.dialog("option", "width", dWidth);
                $( "#add-student-with-file-form" ).attr("class", "dialog-layout dialog-active");
            }
        });

        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        _name = $( "#add-student-name" ),
        _no = $( "#add-student-no" ),
        _tel = $( "#add-student-tel" ),

        allFields = $( [] ).add( _name ).add( _no ).add( _tel ),

        tips = $( ".validateTips" );

        form2 = addWithFileDialog.find( "form" );

        $( "#add-new-student-with-file" ).on( "click", function() {
            addWithFileDialog.dialog( "open" );
        })

    });

    function modify_student(event, seq, name, no, tel){
        var modifyDialog, form
 
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        _name = $( "#modify-student-name" ),
        _no = $( "#modify-student-no" ),
        _tel = $( "#modify-student-tel" ),

        allFields = $( [] ).add( _name ).add( _no ).add( _tel ),

        tips = $( ".validateTips" );

        _name.val(name);
        _no.val(no);
        _tel.val(tel);

        function updateTips( t ) {
            tips
                .text( t )
                .addClass( "ui-state-highlight" );
            setTimeout(function() {
                tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }
    
        function checkLength( o, n, min, max ) {
            if ( o.val().trim().replace(/ +/g, " ").length > max || o.val().trim().replace(/ +/g, " ").length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( n + "의 길이가 최소 " +
                min + " 최대 " + max + "가 되어야합니다." );
                return false;
            } else {
                return true;
            }
        }
    
        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } else {
                return true;
            }
        }

        function modifyStudent() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );
            
            valid = valid && checkLength( _name, "이름", 2, 20 );
            valid = valid && checkRegexp( _name, /^[가-힣a-zA-Z]([가-힣a-zA-Z\s])+$/, "입력 가능 값: [문자, 공백]");

            valid = valid && checkLength( _no, "식별번호", 1, 20 );
            valid = valid && checkRegexp( _no, /^[0-9\-]+$/, "입력 가능 값: [0-9, -]");

            valid = valid && checkLength( _tel, "전화번호", 10, 20 );
            valid = valid && checkRegexp( _tel,  /^[0][1-9][0-9]{0,1}-\d{3,4}-\d{4}$/, "입력 가능 값: [0x-xxx(x)-xxxx] or [0xx-xxx(x)-xxxx]" );
           
            if ( valid ) {
                // loading();
                $.ajax({
                    type: 'post',
                    async: true,
                    data: {
                        "seq": seq,
                        "name": _name.val().trim().replace(/ +/g, " "),
                        "no": _no.val(),
                        "tel": _tel.val(),
                    },
                    url: "/Admin/studentModify",
                    dataType: "json",
                    success : function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert("수정이 완료되었습니다.");
                            document.location.reload();
                        }else{
                            alert(resultMsg.msg);
                        }
                    }, error : function(e){
                        console.log(e);
                        console.log(e.responseText);
                    }
                });
            }
            return valid;
        }

        modifyDialog = $( "#modify-student-form" ).dialog({
            autoOpen: false,
            width: window.innerWidth ? window.innerWidth*0.5 : $(window).width()*0.5,
            resizable: false,
            modal: true,
            position: { my: "center", at: "cetner", of: window },
            show: { effect: "blind", duration: 400 },
            appendTo: ".navbar",
            
            buttons: {
                "수정": modifyStudent,
            },
            close: function() {
                form[0].reset();
                form.find('p').text("");
                modifyDialog.attr("class", "dialog-layout" );
                allFields.removeClass( "ui-state-error" );
            },
            open: function(event, ui){
                $( ".ui-widget-overlay" ).css("background-color", "rgba(0,0,0)");
                $( ".ui-widget-overlay" ).css("opacity", "0.4");

                var wWidth;
            
                //innerWidth / innerHeight / outerWidth / outerHeight 지원 브라우저 
                if ( window.innerWidth && window.innerHeight && window.outerWidth && window.outerHeight ) {
                    wWidth = window.innerWidth;
                }else {

                    wWidth = $(window).width();
                }

                var dWidth = wWidth * 0.5;
                modifyDialog.dialog("option", "width", dWidth);
                $( "#modify-student-form" ).attr("class", "dialog-layout dialog-active");
            }
        });

        form = modifyDialog.find( "form" );

        modifyDialog.dialog( "open" );
    }

    window.addEventListener('resize', function(e){
            var wWidth = window.innerWidth;
            var dWidth = wWidth * 0.5;
            var activeDialog = $('.dialog-active');
            activeDialog.dialog("option", "width", dWidth);
        });
</script>
