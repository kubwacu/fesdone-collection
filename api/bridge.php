<?php
    header('location: start/index.php?use_bridge=1&uri='.$_GET['resource'].'&request_method='.$_SERVER['REQUEST_METHOD'].'&data='.json_encode($_POST));