</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $(".del").click(function(){

            if(confirm("Are you sure you want to delete this?")){
                //$("#delete-button").attr("href", "query.php?ACTION=delete&ID='1'");
            }
            else{
                return false;
            }
        });
    });


</script>


</html>