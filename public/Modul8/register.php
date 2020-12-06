<?php
require_once "config.php";
require_once "session.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fullname = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
        $error = '';
        //bind parameters with "s" for string
        $query->bind_param('s', $email);
        $query->execute();
        //store the results so we can chech if the account exists in the database
        $query->store_result();
        if ($query->num_rows > 0) {
            $error .= '<p class="error">The email address is already registered!</p>';
        } else {
            //validate password
            if (strlen($password ) < 6) {
                $error .= '<p class="error">password must have atleast 6 characters.</p>';
            }
            //validate confirm password
            if (empty($confirm_password)) {
                $error .= '<p class="error">Please enter confirm password.</p>';
            } else {
                if (empty($error) && ($password != $confirm_password)) {
                    $error .= '<p class="error">Password did not match.</p>';
                }
            }
            if (empty($error) ) {
                $insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
                
                $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if ($result) {
                    $error .= '<p class="success">Your registration was successful!</p>';
                } else {
                    $error .= '<p class="error">Something went wrong!</p>';
                }
            }
        }
    }
    $query->close();
    $insertQuery->close();
    //Close DB connection
    mysqli_close($db);
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title> Sign up</title>
        <link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </html>
    <body>
        <div class="containter">
            <div class="row">
                <div class="col-md-12">
                    <h2>Register</h2>
                    <p>Please fill this form to create an account.</p>
                    <form action=" " method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" style="width: 400px" name="name" class="form-control" required> <!-- alle feltene her vil være required-->
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" style="width: 400px" name="email" class="form-control" required /><!--bruker av type="email" vil sørge for at man må bruke en valid email-->
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" style="width: 400px" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" style="width: 400px" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="submit">
                        </div>
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

