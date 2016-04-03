<?php

class LookbookControllerCore extends FrontController {
  public function init() {
    parent::init();
    $id_product = 8;
    $id_lang = $this->context->cookie->id_lang;

    $pack = new Product($id_product);
    $pack->price = round($pack->price,2);
    $category = new Category($pack->id_category_default, $id_lang);
    
    $children = Pack::getItems($id_product,$id_lang);
    for ($i=0; $i < count($children); $i++) {
      $image = Image::getCover($children[$i]->id);
      $link = new Link;
      $children[$i]->image = "http://" . $link->getImageLink($children[$i]->link_rewrite, $image['id_image'], 'home_default');
      $children[$i]->url = $link->getProductLink($children);
      $children[$i]->price = round($children[$i]->price, 2);
    }

    $this->context->smarty->assign(array('looks'=>$children, 'category'=>$category, 'pack'=>$pack));
  }

  public function initContent() {
    parent::initContent();

    $this->setTemplate(_PS_THEME_DIR_.'lookbook.tpl');
  }
}
