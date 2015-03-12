$(document).ready(function () {

    $("#menuAddEmployee").click(function () {
        setPage("pageAddEmployee");
    });

    $("#menuViewEmployees").click(function () {
        setPage("pageViewEmployees");
    });

    $("#vieweditEmployeeButton").click(function () {
        var id = $("#employeeList").val();
        $.post("php/employees.php", {get: true, id: id}, function (data) {
            var employee = JSON.parse(data);
            $("#editFirstName").val(employee.FirstName);
            $("#editLastName").val(employee.LastName);
            $("#editSalary").val(employee.Salary);
            $("#editUsername").val(employee.Username);
            $("#editPassword").val(employee.Password);
            setPage("pageEditEmployee");
        });
    });

    

    $("#addEmployeeButton").click(function (event) {
        event.preventDefault();

        var firstName = $("#addFirstName").val();
        var lastName = $("#addLastName").val();
        var salary = $("#addSalary").val();
        var username = $("#addUsername").val();
        var password = $("#addPassword").val();

        $.post("php/employees.php", {
            add: true,
            username:username,
            firstName: firstName,
            lastName: lastName,
            salary: salary,
            password:password,
        }, function (data) {
            refreshEmployees();
            setPage("pageViewEmployees");
        });
    });

    $("#editEmployeeButton").click(function (event) {
        event.preventDefault();

        var firstName = $("#editFirstName").val();
        var lastName = $("#editLastName").val();
        var salary = $("#editSalary").val();
        var id = $("#employeeList").val();
        var username = $("#editUsername").val();
        var password = $("#editPassword").val();

        $.post("php/employees.php", {
            update: true,
            id: id,
            username:username,
            firstName: firstName,
            lastName: lastName,
            salary: salary,
            password:password,
    
        }, function (data) {
            refreshEmployees();
            setPage("pageViewEmployees");
        });
    });

    $("#removeEmployeeButton").click(function (event) {
        event.preventDefault();
        var id = $("#employeeList").val();
        $.post("php/employees.php", {remove: true, id: id});
        removeEmployee(id);
    });

    refreshEmployees();
    setPage("pageAddEmployee");
});
