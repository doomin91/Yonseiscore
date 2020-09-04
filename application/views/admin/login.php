
<!DOCTYPE html>
<html>
    <head>
        <title>채점 관리</title>
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
    
    <body class="solid-bg-6" style="background:#fff">
        <!-- Wrap all page content here -->
        <div id="wrap">
            <!-- Make page fluid -->
            <div class="row">
                <!-- Page content -->
                <div id="content" class="col-md-12 full-page login">

                    <div class="inside-block">
                        <img src="/assets/images/yonsei_logo.png" alt="alt" class="logo">
                        <h1>
                            <strong>어학당 채점
                            </strong>
                            관리 프로그램</h1>
                        
                        <form class="form-signin">
                            <section>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
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
                if($('#username').val() == ''){
                  alert("ID를 입력해주세요.");
                  return false;
                } else if($('#password').val() == ''){
                  alert("PASSWORD를 입력해주세요.");
                  return false;
                }

                $.ajax({
                    type: 'post',
                    //async: true,
                    data: {
                        "id": $('#username').val(),
                        "pw": $('#password').val()
                    },
                    url: "/Admin/login",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if(data['code'] == 200){
                            window.location.href = "/admin/dashboard";
                        } else {
                            alert(data['msg']);
                        }

                        
                    },
                    error: function (data, status, err) {
                        console.log(
                            "code:" + data.status + "\nmessage:" + data.responseText + "\nerror:" + err
                        );

                    }
                });

                return false;
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