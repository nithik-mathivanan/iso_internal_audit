<?php

$vendorDirPath = realpath(__DIR__ . '/vendor');
require $vendorDirPath . '/autoload.php';
//require_once 'vendor/phpoffice/phpword/bootstrap.php';


$source = "syed97.docx";
$phpWord = \PhpOffice\PhpWord\IOFactory::load($source, 'Word2007');

 $body = '';
    
    foreach ($phpWord->getSections() as $section) {
      $arrays = $section->getElements();
      $body .='<p>';
      foreach ($arrays as $e) {
        if(get_class($e) === 'PhpOffice\PhpWord\Element\TextBreak'){
          $body .='<br>';
        }else
        if(get_class($e) === 'PhpOffice\PhpWord\Element\TextRun') {
          foreach($e->getElements() as $text) {
            //$font = $text->getFontStyle();
            //$size = $font->getSize();
            //$bold = $font->isBold() ? 'font-weight:700;' :'';
            //$color = $font->getColor();
            //if($font->isItalic()){
              //$ital = 'italic';
            //} else {$ital = '';};
            //$fontFamily = $font->getName();
            $body = $body.'<span style="float:left;font-size:14px;">'.$text->getText().'</span>';
          }
        }  
        if(get_class($e) === 'PhpOffice\PhpWord\Element\Text'){
            $font = $e->getFontStyle();
            $size = $font->getSize();
            $bold = $font->isBold() ? 'font-weight:700;' :'';
            $color = $font->getColor();
            if($font->isItalic()){
              $ital = 'italic';
            } else {$ital = '';};
            $fontFamily = $font->getName();
            $body .='<span style="display:inline;text-align:left;font-style:'.$ital.';font-size:14px;font-family:'.$fontFamily .';'.$bold.'; color:#'.$color.';'.$line.'">';
            $body .=$e->getText().'</span>';
        }
        if(get_class($e) === 'PhpOffice\PhpWord\Element\Image'){
          $body .= '<div style="width:200px;height:150px; background:red;"></div>';
        } 
        if(get_class($e) === 'PhpOffice\PhpWord\Element\Table') {
          $body .= '<table border="2px">';
               
          $rows = $e->getRows();
               
          foreach($rows as $row) {
            $body .= '<tr>';
               
            $cells = $row->getCells();
            foreach($cells as $cell) {
               $body .= '<td style="width:'.$cell->getWidth().'">';
               $celements = $cell->getElements();
                foreach($celements as $celem) {
                  if(get_class($celem) === 'PhpOffice\PhpWord\Element\Text') {
                    $body .= $celem->getText();
                  }
             
                else if(get_class($celem) === 'PhpOffice\PhpWord\Element\TextRun') {
                foreach($celem->getElements() as $text) {
                  $body .= $text->getText();
                }  
                }
              } 
              $body .= '</td>';
              }
                $body .= '</tr>';
              }
                $body .= '</table>';
              }

              if (get_class($e)==='PhpOffice\PhpWord\Element\ListItem'){
               $list = new \PhpOffice\PhpWord\Style\ListItem();
               $listType .= $list->getListType();
               if($listType === 7) {
                   $lts = '<ol>';
                   $lte = '</ol>';
               }
               else if($listType === 3) {
                   $lts = '<ul>';
                   $lte = '</ul>';
               }
                           $body .='<ul style="font-size:14px; color:black; font-family:Times-New-Roman;>';

                                  $ee = 'PhpOffice\PhpWord\Element\ListItem';

                                   $obj = $e->getTextObject();


                                       $body .='<li style="color:'.$color.';">';

                                      if(get_class($obj)==='PhpOffice\PhpWord\Element\Text'){


                                           $body .=$obj->getText();

                                       }


                                   $body .='</li>';

                            $body .='</ul>';
           }
              // else {
              //   $body .= $e->getText();
              // }
      }
      $body .='</p>';
      break;
    }   

    echo $body;


?>