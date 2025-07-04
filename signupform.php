<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6B73FF, #000DFF);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            width: 360px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-field {
            position: relative;
            margin-bottom: 15px;
        }

        .form-field input {
            width: 100%;
            padding: 12px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .form-field input:focus {
            border-color: #000DFF;
            outline: none;
        }

        .form-field .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        .btn {
            width: 100%;
            background: #000DFF;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background: #6B73FF;
        }

        .toggle-link {
            margin-top: 10px;
            text-align: center;
        }

        .toggle-link a {
            color: #000DFF;
            text-decoration: none;
        }

        .toggle-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Create Account</h2>
        <form action="./signUp.php" method="POST" enctype="multipart/form-data">
            <div class="form-field">
                <input type="text" name="username" placeholder="Full Name" required>
            </div>
            <div class="form-field">
                <input type="email" name="gmail" placeholder="Email" required>
            </div>
            <div class="form-field">
                <input type="text" name="mobile" placeholder="Mobile Number" required>
            </div>
            <div class="form-field">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
            </div>
            <div class="form-field">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                    required>
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('confirm_password', this)"></i>
            </div>
            <button class="btn" type="submit" <a href="signinform.php">Sign Up</a></button>
        </form>
        <div class="toggle-link">
            Already have an account? <a href="signinform.php">Sign In</a>
        </div>
    </div>

    <script>
        function togglePassword(id, icon) {
            const field = document.getElementById(id);
            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                field.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>