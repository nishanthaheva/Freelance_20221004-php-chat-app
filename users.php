

<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php"); //redirects non login user to login page 
    }
?>

<?php include_once "header.php";?>


<body>
    <div class ="wrapper">
        <section class="user">
            <header>
        <?php
            include_once "php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
            }
        ?>
            <div class="info">
                <div class="detail">
                <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                <p><?php echo $row['status']; ?></p>
                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span>Select To Chat</span>
                <input type="text" placeholder="Search user...">
                <button><i class= "fas fa-search"></i></button>
            </div>
            <div class= "list-user">

            </div>
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

<script src="javascript/users.js"></script>
</body>
</html>