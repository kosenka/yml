<?
  $catalogTree=array(
  );
  
  function AddCatalogAndOffer($yml,$catalogTree=array())
  {
    $yml->add_category($catalogTree['title'], $catalogTree['id'], $catalogTree['pid']);
    $items = array(); //выбираем товары из категории = $catalogTree['id']
    foreach($items as $item)
    {
      $data=array(
                  'id'=>$item['id'],                                                                       
                  'url'=>'http://shop.url/good/'.$item['id'],
                  'price'=>$item['price'],
                  'currencyId'=>'RUR',
                  'categoryId'=>$catalogTree['id'],
                  'picture'=>'http://shop.url/image/'.$item['id'],
                  'pickup'=>'true',
                  'delivery'=>'true',                
                  'name'=>$item['title'],
                  'description'=>'&nbsp;',
                  'cpa'=>'1',
                  'adult'=>'false',
                  'delivery-options'=>array('cost'=>100,'days'=>'3-4')
                );
     $yml->add_offer($item->id,$data,true);
   }
  }
  
  $yml=new Yml('utf-8');//устанавливаем кодировку
  $yml->set_shop('Test', 'CompanyName', 'http://shop.url');
  $yml->add_currency('RUR',1);//добавляем валюту
  AddCatalogAndOffer($yml,$catalogTree);//доблавляем  категории
  $result=$yml->get_xml();
?>
