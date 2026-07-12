let count = 0;
let locked = false;

document.getElementById("loginForm").onsubmit = function () {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let message = document.getElementById("message");

    if (locked == true) {
        message.innerHTML = "You are locked for 5 minutes.";
    } 
    else if (username == "" || password == "") {
        message.innerHTML = "Username and Password cannot be empty.";
    } 
    else if (username == "AIUB" && password == "$_student") {
        message.innerHTML = "Successfully Logged In";
        count = 0;
    } 
    else {
        count++;

        if (count == 1) {
            message.innerHTML = "You have 3 attempts left.";
        } 
        else if (count == 2) {
            message.innerHTML = "You have 2 attempts left.";
        } 
        else if (count == 3) {
            message.innerHTML = "You have 1 attempt left. You are locked for 5 minutes.";
            locked = true;

            setTimeout(function () {
                locked = false;
                count = 0;
            }, 300000);
        }
    }

    return false;
};