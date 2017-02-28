</div>
    
    <footer class="text-center" id="footer">
        &copy; Copyright 2013-2016 Online Shop.
    </footer>
    
    <div id="modalcode">
    </div>
    <script>
        function detailsModal(id){
            var data={"id":id};
            $.ajax({
                url:"includes/detailsModal.php",
                method:"post",
                data:data,
                success:function(data){
                    //alert(data);
                    $('#modalcode').html(data);
                    $('#details-modal').modal('toggle');
                },
                error:function(){
                    alert("something went Wrong");
                }
            });
        }
    </script>
     
    </body>
    
</html>