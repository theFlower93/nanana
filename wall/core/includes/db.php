<?php

require "../libs/rb.php";

R::setup( 'mysql:host=localhost;dbname=ananas',
        'root', '12354' );

session_start();
