
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