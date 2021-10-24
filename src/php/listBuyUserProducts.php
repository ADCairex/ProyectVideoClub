<h2 class="tituloTable">
    Tus videos
</h2>
<div class="sectionProducts">

    <?php

        include 'sqlFunctions.php';

        //Change the param of the function by the idUser who is logged right now
        

        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $products = getBuyUserProducts(2);
                echo $products;
            }
        } catch (Exception $e) {
            echo 'ERROR';
        }

        foreach ($products as $i) {
            if (str_contains($i['routProduct'], '.mp3')) {
                echo '
                    <div class="containerBox">
                        <div class="productBoxMusic">
                            <div class="musicBox">
                                <audio controls id="'.$i['idProduct'].'">
                                    <source src="'.$i['routProduct'].'" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div class="musicBoxDescription">
                            <div class="avatar">
                                    <a href="#.php"><img src="IMAGES/tittleImage.png"
                                    onerror="" width="50px" height="50px"></a>
                
                                </div>
                                <div class="metaMusicBoxDescription">
                                    <div>
                                        <h3>Titulo</h3>
                                    </div>
                                    <div>
                                        <h4>19 visualizaciones</h4>
                                    </div>
                                    <div>
                                        <h4>hace 5 horas</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
            } elseif (str_contains($i['routProduct'], '.mp4')) {
                echo '
                    <div class="containerBox">
                    <div class="productBoxVideo">
                        <div class="videoBox">
                            <video controls id="'.$i['idProduct'].'">
                                <source src="'.$i['routProduct'].'" type="video/mp4">
                            </video>
                        </div>
                        <div class="videoBoxDescription">
                            <div class="avatar">
                                <a href="#.php"><img src="IMAGES/tittleImage.png"
                                onerror="" width="50px" height="50px"></a>
            
                            </div>
                            <div class="metaVideoBoxDescription">
                                <div>
                                    <h3>Titulo laksdmflkañsjdfklas fas dflkajñsdlkfja sdf añskldfjalks</h3>
                                </div>
                                <div>
                                    <h4>19 visualizaciones</h4>
                                </div>
                                <div>
                                    <h4>hace 5 horas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
            } else {
                echo 'Route DB error.';
            }
        }   
    ?>
</div>