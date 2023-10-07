<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>

        <?php

        //falta el alt de la imagen
        // ../../css/styles.css

        class ListView {

            public function showItems($items) { ?>
                <ul class="listaItems"> <?php
                foreach ($items as $item) { ?>
                    <li>
                        <h2><?php echo $item->nombre ?></h2>
                        <img class="fotoPc" src="<?php echo $item->imagen ?>"/>
                        <p class="categoria"><?php echo $item->id_categoria ?></p>
                    </li> <?php
                }
            }
        }?> </ul>

</body>

</html>