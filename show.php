<?php
 include( 'config/config.php');

if( isset($_POST)){
  

    $sql="SELECT * FROM std";
    $result=mysqli_query($conn,$sql) or die("error");

    while( $row= $result->fetch_assoc()){
echo' <tr>
<td>'.$row['id'].' </td>
<td>'.$row['name'].' </td>
<td> '.$row['class'].'</td>
<td> '.$row['city'].'</td>

<td><button  rel= "'.$row['id'].'" class=" btn btn-danger DeleteStd"><i class=" fas fa-trash-alt" >  </i> </button> </td>


</tr>';



    }

}

if (isset($_POST['stid'])){
    $stdid= $_POST['stid'];
    $sql= "DELETE FROM std WHERE id='$stdid'";
    $result=$conn->query($sql) or die('Record is not deleted!');

}

?>

<script>
    $(document).ready(function(){
$('.DeleteStd').on('click',function(){
    var id= $(this).attr('rel');
  


        $.ajax({
            type:'POST',
            url: 'show.php',
            data:{stid:id},
            success:function(data){
                if (!data.error) {
                    alert('Record is deleted Successfully!!!');
                } 
            }
        });
    

})





    });
</script>