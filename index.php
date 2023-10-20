<!-- Header File (navebar) included. -->
<?php include('header.php'); ?>

  
<div id="container">

    <h1>Add Student</h1>
    
    <!-- Bootstrap Form -->
    <form target="" method="post" id="add_student">

        <div class="form-row" novalidate>
            <div class="col-md-6 mb-3">
                <label for="nameInput">Full Name</label>
                <input type="text" class="form-control" id="nameInput" name="name" placeholder="Full Name"  required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="classInput">Class</label>
                <div class="input-group">
                <input type="text" class="form-control" id="classInput" name="class" placeholder="Class" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            
        </div>
        
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="cityInput">City</label>
                <input type="text" class="form-control" id="cityInput" placeholder="City" name="city" required>
            </div>
            
            <!-- <div class="col-md-6 mb-3">
                <label for="phoneInput">Phone</label>
                <input type="text" class="form-control" id="phoneInput" name="phone" placeholder="Phone" required>
            </div> -->
        </div>
        
        <!-- Form submit Button. -->
        <button class="btn btn-primary" type="submit" name="submit">Add Student</button>
</form>
    
    <br>
        <!-- Success Message for if data inserted successfully. -->
        <div class="alert alert-success alert-dismissible fade show" id="submitMsg" role="alert">
            <strong>Data Inserted Successfully.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    
    <br>
        <div id="updateData">
        <!-- When a user clicks on the update button. This block will show the box. -->

        </div>
    <br>
  
    <table class="table table-striped">
        
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>City</th>
          
            <th>Delete</th>
        </tr>

        <tbody id="showStudents">
        <!-- Data will be displayed here, which is retrieved from the database. -->
        </tbody>
        
    </table>

</div>
<?php include('footer.php'); ?>

<script>
$(document).ready(function(){
    
setInterval(function(){
    refreshStd();
},1000);



    function refreshStd() {
        $.ajax({
type:'POST',
url:'show.php',
success:function(data){
   if(!data.error){
    $("#showStudents").html(data)
   }

}
 });
    }





$("#submitMsg").hide();

$("#add_student").submit(function(evt){
    evt.preventDefault();
 var StdData=$("form").serialize();
  
 $.ajax({
type:'POST',
url:'insert.php',
data:StdData,
success:function(data){
    $("#submitMsg").show();
    
}
 })
$("form")[0].reset();


});

});

    </script>