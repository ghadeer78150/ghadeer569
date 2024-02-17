<?php
$host = "localhost";
$dbname = "cars";
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Failed to connect to database: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? 1 : 0;

        $sql = "SELECT * FROM users1 WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user) {
            if ($password === $user['password']) {
                $secretkey = "6LeSsGMpAAAAAF9hPerSK4earrOnVjGTg_QcPMAd";
                $response = $_POST['g-recaptcha-response'];
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretkey) . '&response=' . urlencode($response);
                $response = file_get_contents($url);
                $res = json_decode($response, true);
                if ($res['success']) {
                    echo "successfully done";
                    header('Location:sweets.php');
                    exit;
                } else {
                    echo "error";
                }
            } else {
                echo "invalid password!";
            }
        } else {
            if ($remember) {
                $sql = "INSERT INTO users1 (username, password) VALUES (:username, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['username' => $username, 'password' => $password]);
                echo "user added successfully!";
                header('Location:sweets.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Login.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src='main.js'></script>
    <!-- re-captcha -->
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="username" required>
                        <label for="">user name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <!---->
                    <div class="g-recaptcha" id="capatch" data-sitekey="6LeSsGMpAAAAAGDu2CLjfcwA2LI60THTYfq5Im6T"></div>
                    
                    <div class="forget">
                        <label for="">
                            <input type="checkbox" name="remember" value="1">Remember Me <a href="#">Forget Password</a>
                        </label>
                    </div>
                    <input type="submit" value="Login" class="loginbutton">
                    <div class="register">
                        <p>Don't have an account? <a href="">Register</a></p>
                    </div>
                </form>
                <!---->
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;

}

section
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background-image: url(0115071.jpg);
    background-position: center;
    background-size: cover;
}

.form-box
{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;
}

h2
{
    font-size: 2em;
    color: #ffffff;
    text-align: center;
}

.inputbox
{
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;
}

.inputbox label
{
    position: absolute;
    top:-10%;
    left: 5px;
    
    color: rgb(231, 154, 22);
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}
input:focus ~ label,
input:valid ~ label
{
    top: -20px;

}
.inputbox input
{
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #fff;
}

.inputbox ion-icon
{
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    top: 20px;
    
}

.forget
{
    margin: -15px 0 15px;
    font-size: .9em;
    color: #fff;
    display: flex;
    justify-content: center;
}

.forget label input
{
    margin-right: 3px;
    margin-top: 20px;
}

.forget label a
{
    color:rgb(231, 154, 22);
    text-decoration: none;
}

.forget label a:hover
{
    text-decoration: underline;
}

.main-btn
{
    color: rgb(231, 154, 22);
    background-color: #fff;;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    padding: 0.6em 8em;
    letter-spacing: 1px;
    transition: 2s ease;
    border-radius: 20px;
}   

.main-btn:hover
{
    background-color: rgb(231, 154, 22);
    transform: scale(1.1);
}

.register
{
    font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}

.register p a
{
    text-decoration: none;
    color: rgb(231, 154, 22);
    font-weight: 600;
}

.register p a:hover
{
    text-decoration: underline;

}
.loginbutton
{
    color: #ffffff;
    background-color: rgb(231, 154, 22);
    font-weight: 700;
    display: inline-block;
    padding: 0.6em 8em;
    letter-spacing: 1px;
    transition: .2s ease;
    
    margin-left: 30px;
    border: none;
}
.loginbutton:hover
{
    background-color: #e4cacc;
    cursor: pointer;
    color: #fff;
}

</style>
</html>