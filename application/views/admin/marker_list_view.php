<div id="modify-marker-form" class="dialog-layout" title="채점자 수정"  style="display:none;">
    <form class="dialog-form">
        <p class="validateTips"></p>

        <table class="table table-bordered dialog-table">
            <tr class="text-center"> 
                <td>
                    <label for="modify-marker-id">ID</label>
                </td>
                <td>
                    <label for="modify-marker-name">이름</label>
                </td>
                <td>
                    <label for="modify-marker-no">식별번호</label>
                </td>
                <td>
                    <label for="modify-marker-passwd">비밀번호</label>
                </td>
                <td>
                    <label for="modify-marker-tel">전화번호</label>
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    <input type="text" id="modify-marker-id" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="modify-marker-name" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="modify-marker-no" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="modify-marker-passwd" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="modify-marker-tel" class="text ui-widget-content ui-corner-all">
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <div class="radio">
                        상태
                    </div>
                </td>
                <td colspan="4" >
                    <div class="radio col-sm-10" >
                        <input type="radio" name="modify-marker-state" id="modify-marker-state-active"  data-index="a" value="a" checked>
                        <label for="modify-marker-state-active">사용</label>
                        <input type="radio" name="modify-marker-state" id="modify-marker-state-inactive" data-index="1" value="i" >
                        <label for="modify-marker-state-inactive">정지</label>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="add-marker-form" class="dialog-layout" title="채점자 등록"  style="display:none;">
    <form class="dialog-form">
        <p class="validateTips"></p>
        <table class="table table-bordered dialog-table">
            <tr class="text-center">
                <td>
                    <label for="add-marker-id">ID</label>
                </td>
                <td>
                    <label for="add-marker-name">이름</label>
                </td>
                <td>
                    <label for="add-marker-no">식별번호</label>
                </td>
                <td>
                    <label for="add-marker-passwd">비밀번호</label>
                </td>
                <td>
                    <label for="add-marker-tel">전화번호</label>
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    <input type="text" id="add-marker-id" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="add-marker-name" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="add-marker-no" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="add-marker-passwd" class="text ui-widget-content ui-corner-all">
                </td>
                <td>
                    <input type="text" id="add-marker-tel" class="text ui-widget-content ui-corner-all">
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <div class="radio">
                        상태
                    </div>
                </td>
                <td colspan="4" >
                    <div class="radio col-sm-10" >
                        <input type="radio" name="add-marker-state" id="add-marker-state-active"  data-index="a" value="a" checked>
                        <label for="add-marker-state-active">사용</label>
                        <input type="radio" name="add-marker-state" id="add-marker-state-inactive" data-index="1" value="i" >
                        <label for="add-marker-state-inactive">정지</label>
                    </div>
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

    table.dialog-table{
        width: 100%;
    }

    tr td input.text{
        width: 100%;
    }
    .validateTips{
        margin-top:5px;
    }

</style>

<!-- Page content -->
<div id="content" class="col-md-12" style="background:#fff;">
    
    <!-- page header -->
    <div class="pageheader">

        <h2>
            <strong>채점자 관리</strong>
        </h2>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="line-height: 48px;">
                <li>DashBoard</li>
                <li>
                    Navigation
                </li>
                <li class="active">
                    채점자 관리
                </li>
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
                        <button id="add-new-marker" class="btn btn-primary" style="float:right;">신규 등록</button>
                    </div>

                    <div class="tile-body" style="padding-bottom:50px;">
                        <table class="table table-bordered table-hover table-condensed">
                            <thead >
                                <tr class="info">
                                    <th class="text-center">No</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">이름</th>
                                    <th class="text-center">식별번호</th>
                                    <th class="text-center">비밀번호</th>
                                    <th class="text-center">전화번호</th>
                                    <th class="text-center">상태</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if (!empty($lists)) : 
                                    foreach ($lists as $list) :
                            ?>
                                    <tr class="text-center">
                                        <td ><?php echo $pagenum; ?></td>
                                        <td><?php echo $list->ULM_ID ?></td>
                                        <td><a href="#" onclick="modify_marker(event, '<?php echo $list->ULM_SEQ; ?>', '<?php echo $list->ULM_ID; ?>', '<?php echo $list->ULM_NAME; ?>', '<?php echo $list->ULM_NO; ?>', '<?php echo $list->ULM_TEL; ?>', '<?php echo $list->ULM_DEL_YN ?>')"> <?php echo $list->ULM_NAME; ?> </a></td>
                                        <td><?php echo $list->ULM_NO ?></td>
                                        <td><?php echo $this->customclass->decrypt($list->ULM_PWD) ?></td>
                                        <td><?php echo $list->ULM_TEL ?></td>
                                        <td><?php 
                                                if($list->ULM_DEL_YN == 'N'): echo '사용중' ?>
                                            <?php else: echo '정지' ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                            <?php
                                    $pagenum--;
                                    endforeach;
                                else : 
                                    echo "<tr><td colspan=\"6\" class=\"text-center\"> * 등록된 채점자가 없습니다.</td></td>";
                                endif;
                            ?>

                            </tbody>
                        </table>
                            <!-- /tile body -->

                        <div class="col-md-12 text-center">
                            <div class="dataTables_paginate paging_bootstrap paging_custombootstrap" style="margin-top:30px; width:100%;">
                                <?php echo $pagination; ?>
                            </div>
                        </div>

                    </div>

                </section>

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
    function loading() {
        if ($('#loader').css("display") == "none") {
            $('.mask').css("display", "block");
            $('#loader').css("display", "block");
        } else {
            $('.mask').css("display", "none");
            $('#loader').css("display", "none");
        }
    }

    $(document).ready(function(){
        var addDialog, form
 
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        _id = $( "#add-marker-id"),
        _name = $( "#add-marker-name" ),
        _no = $( "#add-marker-no" ),
        _passwd = $( "#add-marker-passwd"),
        _tel = $( "#add-marker-tel" ),
        _state = $( "input[name=add-marker-state]")
        allFields = $( [] ).add( _id ).add( _name ).add( _no ).add( _tel ).add( _passwd ),
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
            var test =o.val().trim().replace(/ +/g, " ").length;
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

        function addMarker() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );
            
            valid = valid && checkLength( _id, "ID", 5, 20 );
            valid = valid && checkRegexp( _id, /^[a-z]([0-9a-z_])+$/i, "입력 가능 값: [a-z, 0-9, _, 문자로 시작]");

            valid = valid && checkLength( _name, "이름", 2, 20 );
            valid = valid && checkRegexp( _name, /^[가-힣a-zA-Z]([가-힣a-zA-Z\s])+$/, "입력 가능 값: [문자, 공백]");

            valid = valid && checkLength( _no, "식별번호", 1, 20 );
            valid = valid && checkRegexp( _no, /^[0-9\-]+$/, "입력 가능 값: [0-9, -]");

            valid = valid && checkLength( _passwd, "패스워드", 4, 20 );
            valid = valid && checkRegexp( _passwd, /^[0-9a-zA-Z]+$/, "입력 가능 값: [a-z, A-Z, 0-9]" );

            valid = valid && checkLength( _tel, "전화번호", 10, 20 );
            valid = valid && checkRegexp( _tel,  /^[0][1-9][0-9]{0,1}-\d{3,4}-\d{4}$/, "입력 가능 값: [0x-xxx(x)-xxxx] or [0xx-xxx(x)-xxxx]" );
           
            if ( valid ) {
                // loading();
                $.ajax({
                    type: 'post',
                    async: true,
                    data: {
                        "id": _id.val(),
                        "name": _name.val().trim().replace(/ +/g, " "),
                        "no": _no.val(),
                        "passwd": _passwd.val(),
                        "tel": _tel.val(),
                        "state": _state[0].checked==true ? 'N' : 'Y'
                    },
                    url: "/Admin/markerCreate",
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

        addDialog = $( "#add-marker-form" ).dialog({
            autoOpen: false,     
            width: window.innerWidth ? window.innerWidth*0.7 : $(window).width()*0.7,
            resizable: false,
            modal: true,
            position: { my: "center", at: "cetner", of: window },
            show: { effect: "blind", duration: 400 },
            appendTo: ".navbar",
            buttons: {
                "저장": addMarker,
            },
            close: function() {
                form[0].reset();
                form.find('p').text("");
                addDialog.attr("class", "dialog-layout" );
                allFields.removeClass( "ui-state-error" );
            },
            open: function(event, ui){
                var wWidth;
            
                //innerWidth / innerHeight / outerWidth / outerHeight 지원 브라우저 
                if ( window.innerWidth && window.innerHeight && window.outerWidth && window.outerHeight ) {
                    wWidth = window.innerWidth;
                }else {

                    wWidth = $(window).width();
                }

                var dWidth = wWidth * 0.7;
                addDialog.dialog("option", "width", dWidth);
                $( "#add-marker-form" ).attr("class", "dialog-layout dialog-active");               
            }
        });
        
        form = addDialog.find( "form" );
        
        $( "#add-new-marker" ).on( "click", function() {
            addDialog.dialog( "open" );
        });

    });

    

    function modify_marker(event, seq, id, name, no, tel, state){
        var modifyDialog, form
 
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        _id = $( "#modify-marker-id"),
        _name = $( "#modify-marker-name" ),
        _no = $( "#modify-marker-no" ),
        _passwd = $( "#modify-marker-passwd"),
        _tel = $( "#modify-marker-tel" ),
        _state = $( "input[name=modify-marker-state]")
        allFields = $( [] ).add( _name ).add( _no ).add( _tel ),
        tips = $( ".validateTips" );
        
        _id.val(id);
        _name.val(name);
        _no.val(no);
        _tel.val(tel);
        _passwd.attr("placeholder", "변경하시려면 값을 입력하세요");
        state == 'N' ? _state[0].checked=true : _state[1].checked=true;

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

        function modifyMarker() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );
            
            valid = valid && checkLength( _id, "ID", 5, 20 );
            valid = valid && checkRegexp( _id, /^[a-z]([0-9a-z_])+$/i, "입력 가능 값: [a-z, 0-9, _, 문자로 시작]");

            valid = valid && checkLength( _name, "이름", 2, 20 );
            valid = valid && checkRegexp( _name, /^[가-힣a-zA-Z]([가-힣a-zA-Z\s])+$/, "입력 가능 값: [문자, 공백]");

            valid = valid && checkLength( _no, "식별번호", 1, 20 );
            valid = valid && checkRegexp( _no, /^[0-9\-]+$/, "입력 가능 값: [0-9, -]");

            if(_passwd.val().length != 0) {
                valid = valid && checkLength( _passwd, "패스워드", 4, 20 );
                valid = valid && checkRegexp( _passwd, /^[0-9a-zA-Z]+$/, "입력 가능 값: [a-z, A-Z, 0-9]" );
            }
            valid = valid && checkLength( _tel, "전화번호", 10, 20 );
            valid = valid && checkRegexp( _tel,  /^[0][1-9][0-9]{0,1}-\d{3,4}-\d{4}$/, "입력 가능 값: [0x-xxx(x)-xxxx] or [0xx-xxx(x)-xxxx]" );
            
            if ( valid ) {
                // loading();
                $.ajax({
                    type: 'post',
                    async: true,
                    data: {
                        "seq": seq,
                        "id": _id.val(),
                        "name": _name.val().trim().replace(/ +/g, " "),
                        "no": _no.val(),
                        "passwd": _passwd.val().length == 0 ? "" : _passwd.val(),
                        "tel": _tel.val(),
                        "state": _state[0].checked==true ? 'N' : 'Y'
                    },
                    url: "/Admin/markerModify",
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

        modifyDialog = $( "#modify-marker-form" ).dialog({
            autoOpen: false,
            width: window.innerWidth ? window.innerWidth*0.7 : $(window).width()*0.7,
            resizable: false,
            modal: true,
            position: { my: "center", at: "cetner", of: window },
            show: { effect: "blind", duration: 400 },
            appendTo: ".navbar",
            
            buttons: {
                "수정": modifyMarker,
            },
            close: function() {
                form[0].reset();
                form.find('p').text("");
                modifyDialog.attr("class", "dialog-layout" );
                allFields.removeClass( "ui-state-error" );
            },
            open: function(event, ui){
                var wWidth;
            
                //innerWidth / innerHeight / outerWidth / outerHeight 지원 브라우저 
                if ( window.innerWidth && window.innerHeight && window.outerWidth && window.outerHeight ) {
                    wWidth = window.innerWidth;
                }else {

                    wWidth = $(window).width();
                }

                var dWidth = wWidth * 0.7;
                modifyDialog.dialog("option", "width", dWidth);
                $( "#modify-marker-form" ).attr("class", "dialog-layout dialog-active");
            }
        });

        form = modifyDialog.find( "form" );

        modifyDialog.dialog( "open" );
    }

    window.addEventListener('resize', function(e){
        var wWidth = window.innerWidth;
        var dWidth = wWidth * 0.7;
        var activeDialog = $('.dialog-active');
        activeDialog.dialog("option", "width", dWidth);
    });
    
</script>