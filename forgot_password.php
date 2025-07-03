<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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

        .form-container p {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color: #666;
        }

        .form-field {
            margin-bottom: 15px;
        }

        .form-field input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .form-field input:focus {
            border-color: #000DFF;
            outline: none;
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
            font-size: 14px;
        }

        .toggle-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    
    <div class="form-container">
        <h2>Forgot Password?</h2>
        <p>Enter your registered email to receive reset instructions.</p>
        <form action="forgot_password_process.php" method="POST">
            <div class="form-field">
                <input type="email" name="email" placeholder="Your Email" required>
            </div>
            <button class="btn" type="submit">Send Reset Link</button>
        </form>
        <div class="toggle-link">
            Remembered? <a href="signin.html">Back to Sign In</a>
        </div>
    </div>
</body>

</html>