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
            $("#editPhone").val(employee.Phone);
            $("#editPassword").val(employee.Password);
            $("#editDesignation").val(employee.Designation);
            $("#editAddress").val(employee.Address);
            setPage("pageEditEmployee");
        });
    });

    $("#menuLogout").click(function () {
        $.ajax("php/logout.php");
        document.location.href = "";
    });

    $("#addEmployeeButton").click(function (event) {
        event.preventDefault();

        var firstName = $("#addFirstName").val();
        var lastName = $("#addLastName").val();
        var salary = $("#addSalary").val();
        var username = $("#addUsername").val();
        var phone = $("#addPhone").val();
        var password = $("#addPassword").val();
        var designation = $("#addDesignation").val();
        var address = $("#addAddress").val();

        $.post("php/employees.php", {
            add: true,
            username:username,
            firstName: firstName,
            lastName: lastName,
            salary: salary,
            phone:phone,
            password:password,
            designation:designation,
            address:address
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
        var phone = $("#editPhone").val();
        var password = $("#editPassword").val();
        var designation = $("#editDesignation").val();
        var address = $("#editAddress").val();

        $.post("php/employees.php", {
            update: true,
            id: id,
            username:username,
            firstName: firstName,
            lastName: lastName,
            salary: salary,
            phone:phone,
            password:password,
            designation:designation,
            address:address
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
