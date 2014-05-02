<script type="text/javascript">
$(document).ready(function(){
});
    function see_big(id)
    {
        var pic_id=id;
        $.ajax({
            type: "GET",
            data: "pic_id="+pic_id,
            url: "get_data.php",
            dataType:'text',
            success:function(data)
            {
                $("#big_pic img").attr("src","get_data.php?id="+data);
            }
        })
    }
</script>


if(isset($_GET["pic_id"]))
{
    $pic_id = $_GET['pic_id'];
    $connect = MYSQL_CONNECT("localhost", "root", "admin") or die("Unable to connect to MySQL server");
    mysql_select_db("$dbname") or die("Unable to select database");
 
    $query = "select * from ccs_image where id=$pic_id"; 
    $result = @MYSQL_QUERY($query);
    $out=mysql_fetch_array($result);
    echo $out["id"];
}

if(isset($_GET['id'])) { 
$id = $_GET['id'];