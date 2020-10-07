

<?php
    $a = array(7=>'Silje'); // eller så kan man skrive: 
    '<br />';
    $b = array('fornavn' =>'Olav');

    //for så å kalle på arrayen ved:
    echo $a[7]  . '<br />';
    //eller
    echo $b['fornavn'] . '<br />';

/* den beste måten å skrive ut løkker er med foreach
eks: foreach($a as $key => $value);
    {
        echo $key . " : " . $value;
    }
*/


//Multidimensjonale arrays

$c = array('deltaker1' => array( 'fornavn' => 'Silje', 'poeng' => '7') );
echo $c['deltaker1']['fornavn'];


$d = array('deltaker1' =>
                    array( 'fornavn' => 'Silje', 'poeng' => '7'),
                'deltaker2' =>
                    array( 'fornavn' => 'Johan', 'poeng' => '3')
        );
    echo $d['deltaker1']['fornavn'];
    $d['deltaker1']['fornavn'] = 9;

    foreach( $d as $deltnr => $deltinfo ) { 
        echo $deltnr . ' <br>';
        foreach( $deltinfo as $fornavn => $poeng )
        {
            echo $fornavn . ' med ' . $poeng . ' poeng <br />';
        }
        
    }
    
    var_dump( $d );



?>
