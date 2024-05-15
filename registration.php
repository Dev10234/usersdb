
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #49b3f01a;
    background: url(image4.jpg) no-repeat;
    background-size: cover;
    background-position: center;

}


.wrapper{
    width: 750px;
    background: rgba(255, 255, 255, .1);
    border: 2px solid rgba(255, 255, 255, .2);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    backdrop-filter: blur(50px);
    border-radius: 10px;
    color: white;
    padding: 40px 35px 55px;
    margin: 0 10px;
}
.wrapper h1{
    font-size: 36px;
    text-align: center;
    margin-bottom: 20px;
}
.wrapper .input-box{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;

}
.input-box .input-field{
    position: relative;
    width: 48%;
    height: 50px;
    margin: 13px 0;
}

.input-box .input-field input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: 2px solid #fffcfc;
    outline: none;
    font-size: 16px;
    color: white;
    border-radius: 40px;
    padding: 15px 15px 15px 40px;

}
.input-box .input-field input::placeholder{
    color: white;
}
.input-box .input-field i{
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    font-size: 20px;
}

.wrapper label{
    display: inline-block;
    font-size: 14.5px;
    margin: 10px 0 23px;
}

.wrapper label input{
    accent-color: white;
    margin-right: 5px;
}
.wrapper .btn{
    width: 100%;
    height: 45px;
    background: white;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
}
.bottom{
  text-align:center;
  margin-top:9px
}
.bottom a{
  font-weight:700;
  color:white;
  text-decoration:none;
  margin-left:5px;
}
.bottom a:hover{
  text-decoration:underline;
}
@media (max-width: 576px) {
    .input-box .input-field{
        width: 100%;
        margin: 10px 0;
    }
    
}
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="register_query.php" method="POST">
            <h1>Registration</h1>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="firstname" name="firstname" required>
                    <i class='bx bx-id-card'></i>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="lastname"  name="lastname" required>
                    <i class='bx bx-id-card'></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="username" required name="username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="password" name="password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-field">
                    <input type="password" placeholder=" confirm password" name="confirmPassword" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
            </div>
            <button type="submit" class="btn" name="register">Register</button><br>
            <div class="bottom">
                <span>You Have an account!</span><a href="index.php" class="btn-l">Login</a>
            </div>
        </form>
    </div>
</body>
</html>