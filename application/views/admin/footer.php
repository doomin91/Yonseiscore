
            <script>
            $('#logoutBtn').click( function () {
                    $.ajax({
                        type: 'post'
                        , async: true
                        , url : "/auth/sign_out"
                        , dataType: "text"
                        , contentType: false          
                        , processData: false
                        , success: function(data) {
                            if(data=="admin")
                                window.location.href = "/auth";
                            else
                                window.location.href = "/"; 

                            }
                        , error: function(data, status, err) {
                            console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                            }
                    });
                })
            </script>
    </body>
</html>

<script
    type="text/javascript"
    src="/assets/js/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/vendor/slick/slick.js" type="text/javascript" charset="utf-8"></script>

    
<script>
    function changeProfile(seq, id){
        var profileDialog, inputForm

        _id = $( "#modify-admin-id"),
        _passwd = $( "#modify-admin-passwd"),
        allFields = $( [] ).add( _passwd ),
        tips = $( ".validateTips" );

        _id.val(id);
        _passwd.attr("placeholder", "변경하시려면 값을 입력하세요");

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

        function modifyAdmin() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );

            if(_passwd.val().length == 0 ){
                _passwd.addClass( "ui-state-error" );
                updateTips( "수정하시려면 비밀번호를 입력해주세요." );
                return valid;
            }

            if(_passwd.val().length != 0) {
                valid = valid && checkLength( _passwd, "패스워드", 4, 20 );
                valid = valid && checkRegexp( _passwd, /^[0-9a-zA-Z]+$/, "입력 가능 값: [a-z, A-Z, 0-9]" );
            }

            if ( valid ) {
                // loading();
                $.ajax({
                    type: 'post',
                    async: true,
                    data: {
                        "seq": seq,
                        "passwd": _passwd.val()
                    },
                    url: "/Admin/adminModify",
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

        profileDialog = $( "#modify-admin-form" ).dialog({
            autoOpen: false,
            width: window.innerWidth ? window.innerWidth*0.5 : $(window).width()*0.5,
            resizable: false,
            modal: true,
            position: { my: "center", at: "cetner", of: window },
            show: { effect: "blind", duration: 400 },
            appendTo: ".navbar",

            buttons: {
                "수정": modifyAdmin,
            },
            close: function() {
                inputForm[0].reset();
                inputForm.find('p').text("");
                allFields.removeClass( "ui-state-error" );
            },
            open: function(event, ui){
                $( ".ui-widget-overlay" ).css("background-color", "rgba(0,0,0)");
                $( ".ui-widget-overlay" ).css("opacity", "0.5");
            }
        });

        inputForm = profileDialog.find( "form" );

        profileDialog.dialog( "open" );
    }

</script> 