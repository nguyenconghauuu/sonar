
    <header class="header">
        <div class="header-top-menu">
            <ul class="header-nav">
                    <li class="nav-item">
                        <a href="select_course.php" class="nav-link">  
                            <img src="assets/images/logost.jpg" style="width:50px " alt="">                        
                        </a>
                    </li>
                    <li class="nav-item">
                        <svg class="nav-svg" fill="rgba(41,42,58,.66)" xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/></svg>
                        <a href="select_course.php" class="nav-link">trang chủ</a>
                    </li>
                    <li class="nav-item" >
                        <svg class="nav-svg" fill="rgba(41,42,58,.66)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/></svg>
                        <a href="old_exam_results.php" class="nav-link">hoạt động</a>
                    </li>
                    <li class="nav-item">
                        <form action="search.php" method="GET">
                            <div class="nav-search">
                                <input type="text" name="search" id="search" onclick="onOpen()" class="nav-search-input" value="" placeholder="Tìm kiếm">
                                <i class="fas fa-search nav-seatch-icon"></i>
                            </div>
                    </form>
                    </li>
                    
            </ul>
            <div class="header-right-menu">
                <?php 
                    ?>
                        <div class="header-info">
                            <svg class="nav-svg" fill="rgba(41,42,58,.66)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                            
                            <svg class="nav-svg" fill="rgba(41,42,58,.66)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>    
                        </div>
                        <ul class="header-info-list">
                            <li class="header-info-name">

                                <div class="header-username" style="text-align: center;" ><?php echo $_SESSION['username']; ?></div>
                            </li>
                            <li class="header-info-item">

                                <a href="logout.php" class="header-info-link">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#1dbfaf" width="20px" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg><span>Đăng Xuất</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                ?>
            </div>
        </div>
        <div class="over-layout" onclick="onClose()" ></div>
    </header>
    <script type="text/javascript">
        var search = document.getElementById('search');
        var overlay = document.querySelector(".over-layout");
        var headerInfo = document.querySelector(".header-info");
        const headerInfoList = document.querySelector(".header-info-list");
        document.querySelector(".header-info").onclick = ()=>{
            headerInfo.classList.toggle("active");
            headerInfoList.classList.toggle("active");
        }
        document.addEventListener("click", function(e){
            if(!headerInfoList.contains(e.target) && !headerInfo.contains(e.target))
            {
                headerInfoList.classList.remove("active");
            }
        });
        function onOpen(){
            overlay.classList.add("active");
        }
        search.onkeydown = (e)=>{
            console.log(e);
        }
        function onClose(){
            overlay.classList.remove("active");
        }
        // overlay.onclick = (){
        //     overlay.classList.remove("active");
        // }
    </script>