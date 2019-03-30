<?php 

  require_once('functions.php');
  require_once('data.php');
  
  $lot = null;

if (isset($_GET['id'])) {
    $lot_id = $_GET['id'];
  
    foreach ($goods_list as $item) {
      if ($item['id'] == $lot_id) {
        $lot = $item;
        break;
      }
    }
  }
  
  /*if (!$lot) {
    print "ERROR 404";
    http_response_code(404);
  }*/



  
  $page_content = render_template('templates/lot.php', [
    'goods_list' => $goods_list,
    'categories' => $categories,
    'lot_id' => $lot_id,
    'lot' => $lot
    ]);

  $layout_content = render_template('templates/layout.php', [
    'content' => $page_content,
    //'categories' => [],
    'title' => 'Yeticave - Просмотр лота'
  ]);
  
  print($layout_content);


?>