<?php
/**
 * Created by JetBrains PhpStorm.
 * User: horsley
 * Date: 12-12-29
 * Time: 上午11:03
 * To change this template use File | Settings | File Templates.
 */

$a = new stdClass();
$b = new stdClass();

$c = array($a, $b);

$c[0]->t = 1;

var_dump($a);


