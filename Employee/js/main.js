$(document).ready(function(){

   $("#menuUpdateInfo").click(function(){
      setPage("pageAddUpdateInfo");
   });
   $("#menuTimeSheet").click(function(){
      setPage("pageAddTimeSheet");
   });

   setPage("pageAddUpdateInfo");

   $("#buttonUpdateInfo").click(function(){
     var id=$("#employeelist").val();
     var userName = $('#editUserName').val();
     var FirstName = $('#editFirstName').val();
     var LastName = $('#editLastName').val();
     var Phone = $('#addPhone').val();
     var Password = $('#addPassword').val();
     var Address = $('#addAddress').val();

     $.post("php/employees.php",
      {username: userName, id:id, firstName: FirstName, lastName: LastName, phone: Phone, password: Password, address: Address, update:true, salary:""}, 
      function(data){
         console.log("response: "+data)
     });

   });

   $('#buttonTimeIn').click(function(){
    var date = $('#addDate').val();
    var timeout=$('#addTimeOut').val();
    var time = $('#addTimeIn').val();
    var hours= $('#addHours').val();

    $.post("php/times.php", 
      {date: date, time:time, timeout:timeout, hours:hours, insert:true},
      function(data){
        console.log(data)
      })

   })

});
