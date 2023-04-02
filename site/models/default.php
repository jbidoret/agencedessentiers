<?php 
class DefaultPage extends Page {
  public function anchorurl($options = null): string {
    $parent = $this->parent();
    if ($parent) {      
      return '#' . $this->slug();      
    }
    return $this->url();
  }
}