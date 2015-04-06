<?php
require 'common.php';

$view = new IndexView($db);
echo $view->render();