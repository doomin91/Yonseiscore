
<!DOCTYPE html>
<html>
    <head>
        <title>세종학당 채점 관리 프로그램</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8"/>

        <link rel="icon" type="image/ico" href="/assets/images/favicon.ico"/>
        <!-- Bootstrap -->
        <link href="/assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link
            href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"
            rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap-checkbox.css">
        <link
            rel="stylesheet"
            href="/assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css">

        <link href="/assets/css/minimal.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script
        src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="bg-1" >
        <!-- Wrap all page content here -->
        <div id="wrap">
            <!-- Make page fluid -->
            <div class="row">
                <!-- Page content -->
                <div id="content" class="col-md-12 full-page login" style="background:#eee">

                    <div class="inside-block">
                        <img src="/assets/images/yonsei_logo.png" alt="alt" class="logo">
                        <h4>
                            <strong>세종학당 쓰기 평가 채점 관리 프로그램</strong></h4>
                        
                        <form class="form-signin">
                            <section>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="admin_id" placeholder="Username">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="admin_pass"
                                        placeholder="Password">
                                    <div class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                            </section>

                            <section class="log-in">
                                <button type="button" class="btn btn-greensea" id="loginBtn">Log In</button>
                            </section>
                        </form>
                    </div>

                </div>
                <!-- /Page content -->
            </div>
        </div>
        <!-- Wrap all page content end -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>    

            $("#loginBtn").click(function () {         
                login();
            })

            $(document).keypress(function(event) {
                if(event.which == 13 || event.keycode == 13){
                    login();   
                }
            });

            function login (){
                var admin_id = $("input[name=admin_id]").val();
                var admin_pass = $("input[name=admin_pass]").val();

                if (admin_id == ""){
                    alert("관리자 아이디를 입력해주세요");
                    $("input[name=admin_id]").focus();
                    return false;
                }

                if (admin_pass == ""){
                    alert("관리자 비밀번호를 입력하세요");
                    $("input[name=admin_pass]").focus();
                    return false;
                }

                $.ajax({
                    type : "POST",
                    url : "/auth/sign_in_proc",
                    dataType : "JSON",
                    data : {
                        "admin_id" : admin_id,
                        "admin_pass" : admin_pass
                    }, success : function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            document.location.href="/admin";
                        }else{
                            alert(resultMsg.msg);
                        }
                    }, error : function(e){
                        console.log(e.responseText);
                    }
                });
            }

            function loading () {
                if ($('#loader').css("display") == "none"){
                    $('.mask').css("display", "block");
                    $('#loader').css("display", "block");
                } else {
                    $('.mask').css("display", "none");
                    $('#loader').css("display", "none");
                }                
            }

        </script>

    </body>
</html>