<?php
error_reporting(E_ALL);
include_once(dirname(__FILE__) . '/AI_ID3.class.php');
include_once(dirname(__FILE__) . '/DS_Tree.class.php');

//实例集
$example7_1_instances = array(
    array("身高" => "矮", "发色" => "亚麻色", "眼色" => "蓝色", "类别" => "P"),
    array("身高" => "高", "发色" => "亚麻色", "眼色" => "黑色", "类别" => "N"),
    array("身高" => "高", "发色" => "棕色", "眼色" => "蓝色", "类别" => "P"),
    array("身高" => "矮", "发色" => "黑色", "眼色" => "蓝色", "类别" => "N"),
    array("身高" => "高", "发色" => "黑色", "眼色" => "蓝色", "类别" => "N"),
    array("身高" => "高", "发色" => "亚麻色", "眼色" => "蓝色", "类别" => "P"),
    array("身高" => "高", "发色" => "黑色", "眼色" => "黑色", "类别" => "N"),
    array("身高" => "矮", "发色" => "亚麻色", "眼色" => "黑色", "类别" => "N")
);

//值域
$example7_1_values = array(
    "身高" => array("矮", "高"),
    "发色" => array("亚麻色", "棕色", "黑色"),
    "眼色" => array("蓝色", "黑色")
);


$example7_1_AttrList = array('身高', '发色', '眼色'); //初始属性表
$example7_1_class = array("N", "P"); //分类结果

$tree = new DS_Tree();
$node = array('name' => 'start');

$tree->insert_node($node);
$tree->goto_root();

$id3 = new AI_ID3();
$id3->init($example7_1_AttrList, $example7_1_values, $example7_1_class, $example7_1_instances, $tree);

$id3->run();

//echo $id3->tree->draw_tree()


    ?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>jOrgChart - A jQuery OrgChart Plugin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link href="css/prettify.css" type="text/css" rel="stylesheet" />


    <!-- jQuery includes -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

    <script src="jquery.jOrgChart.js"></script>

    <script>
    jQuery(document).ready(function() {
        $("ul").jOrgChart({
            chartElement : '#chart',
            dragAndDrop  : true
        });
    });
    </script>
  </head>

  <body>

    <?=$id3->tree->draw_tree() ?>

    <div id="chart" class="orgChart"></div>



</body>
</html>;


