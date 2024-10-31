<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Student Admission Form</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #f0f0f0;
}

nav {
    background-color: #219d9d;
    height: 70px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

nav .logo {
    font-size: 20px;
    color: white;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background 0.3s;
}

nav ul li a:hover {
    background: rgba(255, 255, 255, 0.2);
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: 50px;
}

 
.maintitle_deg
{
    background-color:#eb185b;
    color: white;
    text-align: center;
    font-weight: bold;
    width: 400px; 
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 20px;
    margin-top: 0px;
}

.div_deg {
    background-color: #e0f7fa;
    width: 400px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.adm_int {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.label_text {
    flex: 1;
    text-align: right;
    padding-right: 10px;
    font-size: 14px;
}

.input_deg {
    flex: 2;
    height: 30px;
    border-radius: 25px;
    border: 1px solid #ccc;
    padding: 0 10px;
    font-size: 14px;
}

.input_deg[type="file"] {
    padding: 5px 10px;
}

.btn {
    display: inline-block;
    width: 100%;
    height: 35px;
    background-color: #219d9d;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    transition: background 0.3s;
}

.btn:hover {
    background-color: #17a2b8;
}

.error {
    color: red;
    font-size: 12px;
    margin-bottom: 10px;
    text-align: center;
}

footer {
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    text-align: center;
    padding: 1em;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-size: 14px;
}


.logo
{
    font-size: 25px;
    position: relative; 
    left: 5%;
    color: white;
    font-weight: bold;
    line-height: 70px;
}
</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<center> 
<body>
<nav>
    <label class="logo">Resource Sharing Application         </label>
    <ul hidden>
        <li><a href="index.php" class="btn btn-success">Home</a></li>
    </ul>
</nav>

<div class="container">
    <h1 class="maintitle_deg">Student Registration Form</h1>
    <div align="center" class="div_deg">

        <form action="data_check.php" method="POST" enctype="multipart/form-data">

            <div class="adm_int">
                <label for="name" class="label_text">Name</label>
                <input class="input_deg" id="name" type="text" name="name" required>
            </div>
            <div class="adm_int">
                <label for="email" class="label_text">Email</label>
                <input class="input_deg" id="email" type="text" name="email" required>
            </div>
            <div class="adm_int">
                <label for="course" class="label_text">Course</label>
                <select name="course" class="input_deg" id="course" required>
                    <option>Select</option>
                    <option>Btech</option>
                    <option>Be</option>
                </select>
            </div>
            <div class="adm_int">
                <label for="class" class="label_text">Class</label>
                <select name="class" class="input_deg" id="class" required>
                    <option>Select</option>
                    <option>Fy</option>
                    <option>Sy</option>
                    <option>Ty</option>
                </select>
            </div>

            <div class="adm_int">
                <label for="id_card" class="label_text">ID Card</label>
                <input class="input_deg" id="idcard" name="idcard" type="file" accept="image/*" required>
            </div>

            
            <div class="adm_int">
                <label for="phone" class="label_text">Phone</label>
                <input class="input_deg" type="number" id="phone" pattern="[0-9]{10}" placeholder="Enter 10-digit phone number" name="phone" required>
            </div>
            <div class="adm_int">
                <label for="password" class="label_text">Create Password</label>
                <input class="input_deg" id="password" name="password" type="password" pattern=".{5,}" title="Password must be at least 5 characters" required>
            </div>
            <div class="error" id="error-message"></div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply" onclick="validateForm()">
            </div>
            <br>
            <div>
                <label>Already Have An Account? <a href="login.php" class="btn btn-primary">Login Here</a></label>
            </div>
        </form>
    </div>
</div>
</center>

<script>
function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
    var errorMessage = document.getElementById("error-message");

    errorMessage.innerHTML = "";

    if (name === "" || email === "" || phone === "" || password === "") {
        errorMessage.innerHTML = "All fields are required";
        return false;
    }

    // Email validation using a simple regex
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorMessage.innerHTML = "Invalid email format";
        return false;
    }

    // Phone number validation using a simple regex
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone)) {
        errorMessage.innerHTML = "Invalid phone number format (10 digits)";
        return false;
    }

    // Password validation (at least 5 characters)
    if (password.length < 5) {
        errorMessage.innerHTML = "Password must be at least 5 characters";
        return false;
    }

    // If all validation passes, form will be submitted
    alert("Registration successful!");
}
</script>

<footer>
    &copy; 2024 Resource Sharing Application
</footer>
</body>
</html>
