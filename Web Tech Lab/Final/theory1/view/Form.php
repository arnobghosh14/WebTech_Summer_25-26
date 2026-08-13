<?php
    include "../Controller/FormValidation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        function formValidation(){

            let username = document.getElementById("username").value.trim();
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let website = document.getElementById("website").value.trim();
            let comment = document.getElementById("comment").value.trim();

            let female = document.getElementById("female").checked;
            let male = document.getElementById("male").checked;
            let other = document.getElementById("other").checked;

            if(username == "" || username.length < 5){
                alert("Username is required and must be at least 5 characters long");
                return false;
            }
            if (email == "" || !email.includes("@gmail.com")) {
                alert("Email is required and must contain '@gmail.com'");
                return false;
            }
            if(website == "" || website.length < 10){
                alert("Website is required and must be at least 10 characters long");
                return false;
            }
            if(password == "" || password.length < 8){
                alert("Password is required and must be at least 8 characters long");
                return false;
            }
            if (comment == "") {
                alert("Comment is required and cannot be empty");
                return false;
            }
            if (!female && !male && !other) {
                alert("Please select a gender");
                return false;
            }
            return true;
        }
    </script>

</head>
<body>
    <form action="" method="post" onsubmit="return formValidation()">
        <table>
            <tr>
                <td><label for="username">User Name:</label></td>
                <td><input type="text" id="username" name="username">
                <?php echo $username ;?></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email">
                <?php echo $email ;?></td>
            </tr>
            <tr>
                <td><label for="website">Website:</label></td>
                <td><input type="text" id="website" name="website">
                <?php echo $website ;?></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password">
                <?php echo $password ;?></td>
            </tr>

            <tr>
                <td><label for="comment">Comment:</label></td>
                <td><textarea id="comment" name="comment"></textarea>
                <?php echo $comment ;?></td>
            </tr>
            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="Other">
                    <label for="other">Other</label>
                    <?php echo $gender; ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>

            
        </table>
    </form>
</body>
</html>