<footer>
    <div class="container_footer">
        <div class="logo"><a href="
                                    <?php
                                        $x = $_SERVER['SCRIPT_NAME'];
                                        $x = explode('/', $x);
                                        if (in_array('index.php', $x)) {
                                            echo 'index.php';
                                        } else {
                                            echo '../index.php';
                                        }
                                    ?>
                                    "><img src="IMAGES/tittleImage.png" onerror="this.src='../IMAGES/tittleImage.png';" width="50px" height="50px"></a></div>
        <div class="menu">
            <ul>
                <li><a href="
                            <?php
                                $x = $_SERVER['SCRIPT_NAME'];
                                $x = explode('/', $x);
                                if (in_array('index.php', $x)) {
                                    echo 'index.php';
                                } else {
                                    echo '../index.php';
                                }
                            ?>
                            ">Inicio</a></li>
                <li><a href="
                            <?php
                                $x = $_SERVER['SCRIPT_NAME'];
                                $x = explode('/', $x);
                                if (in_array('index.php', $x)) {
                                    echo 'templates/politicaPrivacidad.php';
                                } else {
                                    echo '../politicaPrivacidad.php';
                                }
                            ?>
                            ">Política Privacidad</a></li>
                <li><a href="https://es-la.facebook.com/Warcraft/"><img src="IMAGES/facebook.png" onerror="this.src='../IMAGES/facebook.png';" width="50px" height="50px"></a></li>
            </ul>
        </div>
    </div>
</footer>