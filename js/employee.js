function setPage(page) {
    $(".page").hide();
    $("#" + page).show();
}

function addEmployee(id, username, firstName, lastName, salary, phone) {
    var userStr = "(" + id + ") " + firstName+" " + lastName + " (" + username + ", " + salary + "$)";

    $("#employeeList").append("<option value='" + id + "'>" + userStr +"</option>");
}

function removeEmployee(id) {
    $("#employeeList option[value=" + id + "]").remove();
}

function refreshEmployees() {
    $("#employeeList").children().remove();
    $.post("php/employees.php", {list: true}, function (data) {
        var employees = JSON.parse(data);
        employees.forEach(function (element) {
            addEmployee(element.Id, element.Username, element.FirstName, element.LastName, element.Salary, element.Phone);
        });
    });
}
