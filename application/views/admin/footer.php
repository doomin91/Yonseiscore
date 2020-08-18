
            <script>
            $('#logoutBtn').click( function () {
                    $.ajax({
                        type: 'post'
                        , async: true
                        , url : "/Admin/logout"
                        , dataType: "text"
                        , contentType: false          
                        , processData: false
                        , success: function(data) {
                            window.location.href = "/auth/";

                            }
                        , error: function(data, status, err) {
                            console.log("code:"+data.status+"\n"+"message:"+data.responseText+"\n"+"error:"+err);
                            }
                    });
                })
            </script>
    </body>
</html>
