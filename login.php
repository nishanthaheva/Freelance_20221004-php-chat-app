<?php
        if(isset($_SESSION['unique_id'])){
            header("location: users.php");
        }
?>




<?php include_once "header.php";?>

<body>
    <div class ="wrapper">
        <section class="form login">
            <header><b>Welcome To Web-Chat</b></header>
            <form method="post">
                <div class="error"></div>
                <div class="fill input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter Email">
                </div>
                <div class="fill input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="fill button">
                    <input type="submit" value="Continue...">
                </div>
            </form>
            <div class="link">--> <a href="index.php">Signup</a></div>

        </section>
    </div>

<!-- Theme Color -->
<div class="color-switcher">

    <div class="switcher-btn">
        <i class="fas fa-cog"></i>
    </div>

    <h3>Select Color</h3>

    <div class="theme-bottons-container">
        <span class="theme-bottons" data-color="#8e44ad" style="background: #8e44ad;"></span>
        <span class="theme-bottons" data-color="#2980b9" style="background: #2980b9;"></span>
        <span class="theme-bottons" data-color="#f39c12" style="background: #f39c12;"></span>
        <span class="theme-bottons" data-color="#27ae60" style="background: #27ae60;"></span>
        <span class="theme-bottons" data-color="#e74c3c" style="background: #e74c3c;"></span>
        <span class="theme-bottons" data-color="#17c0eb" style="background: #17c0eb;"></span>
        <span class="theme-bottons" data-color="#C0C0C0" style="background: #C0C0C0;"></span>
        <span class="theme-bottons" data-color="#808000" style="background: #808000;"></span>
        <span class="theme-bottons" data-color="#FFC0CB" style="background: #FFC0CB;"></span>
        
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.switcher-btn').onclick = () =>{
        document.querySelector('.color-switcher').classList.toggle('active');
    };

    let themeButtons = document.querySelectorAll('.theme-bottons');

    themeButtons.forEach(color =>{

        color.addEventListener('click', () =>{
            let dataColor = color.getAttribute('data-color');
            document.querySelector(':root').style.setProperty('--main-color', dataColor)

        });

    });
</script>

<script src="javascript/show-hide-password.js"></script>
<script src="javascript/login.js"></script>
</body>
</html>