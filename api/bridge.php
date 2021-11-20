<?php
    /*
    * This file is part of akana framework files.
    *
    * (c) Kubwacu Entreprise
    *
    * @author (kalculata) Huzaifa Nimushimirimana <nprincehuzaifa@gmail.com>
    *
    */
    header('location: start/index.php?use_bridge=1&uri='.$_GET['resource'].'&server='.$_SERVER.'&data='.json_encode($_POST));