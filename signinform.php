<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
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

        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .forgot-password a {
            font-size: 13px;
            color: #000DFF;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
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
        <h2>Welcome Back</h2>
        <form action="./signIn.php" method="POST">
            <div class="form-field">
                <input type="email" name="gmail" placeholder="Email" required>
            </div>
            <div class="form-field">
                <input type="password" name="password" id="signinPassword" placeholder="Password" required>
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('signinPassword', this)"></i>
            </div>
            <div class="forgot-password">
                <a href="forgot_password.html">Forgot Password?</a>
            </div>
            <button class="btn" type="submit">Sign In</button>
        </form>
        <div class="toggle-link">
            Don't have an account? <a href="signup.html">Sign Up</a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
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