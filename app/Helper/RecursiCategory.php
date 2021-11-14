<?php
namespace App\Helper;

class RecursiCategory
{
    private $htmlSelection = " ";
    private $data;
    public function __construct($data)
    {
      $this->data = $data;
    }
    public function recursiveMenu($parentId,$id=0,$text=''){
        foreach ($this->data as $menu) {
            if ($menu["parent_id"] == $id) {
                if(!empty($parentId) && $parentId == $menu['id']){

                    $this->htmlSelection .= "<option selected value='" . $menu['id'] . "'>" . $text . $menu['nameCareer'] . "</option>";

                }
                else {
                     $this->htmlSelection .= "<option value='" . $menu['id'] . "'>" . $text . $menu['nameCareer'] . "</option>";
                }
        $this->recursiveMenu($parentId,$menu["id"], $text . '--');
        }
    }
    return $this->htmlSelection;
    }

}
?>
