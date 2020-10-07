<?php

// Definerer array
$lottorekke = array();

// Generere ti tilfeldig tall
for( $i=1; $i<=10; $i++ )
{
    do
    {
        $tall = rand(1,34);
    }
    while( in_array( $tall , $lottorekke ) );
    $lottorekke[] = $tall;
}

// Vi sorterer arrayet
sort( $lottorekke );

// Skrive ut lottorekke
echo 'Din lottorekke er: ';
foreach( $lottorekke as $key => $lottotall )
{
    echo $lottotall . ' ';
}

// Skrive ut lottorekke
echo '<br />Din lottorekke er: ' . implode( ', ', $lottorekke );
?>
LØSNINGSFORSLAG TIL OPPGAVE OM LODDTREKNING:
<?php
// Definerer arrays.
// Disse blir definert tidlig fordi vi legger til elementer til disse nedenfor
// og derfor må de eksistere før vi kan legge til dem.

$lodd = array();
$vinnere = array();

// Her definerer vi et array med loddkjøpere og fyller det med innhold med en gang
$loddkjopere = array( 'Silje', 'Johan', 'Karsten', 'Petra', 'Therese', 'Niels', 'Jakob', 'Stradivarius', 'Hanne', 'Merete' );

// Genererer 200 lodd
for( $i=1; $i<=200; $i++ )
{
    $tilfeldiglk = rand( 0, 9 ); // Tilfeldig nøkkel lages for valg av loddkjøper
    $lodd[$i] = $loddkjopere[$tilfeldiglk]; // Format er nøkkel=loddnr, verdi=kjøper
}

// Skriver ut lodd
foreach( $lodd as $loddnr => $loddkjoper )
{
    //echo 'Loddnr.  ' . $loddnr . ': ' . $loddkjoper . '<br />';
}
print_r( array_count_values( $lodd ) ); echo '<br />'; // Viser hvor mange lodd hver enkelt har kjøpt

// Trekker tre vinnere
for( $i=1; $i<=3; $i++ )
{
   // Sikrer oss mot at samme lodd vinner flere ganger. 
  //  Her trekkes det et nytt vinnerlodd så lenge det trukne vinnerlodd allerede finnes i arrayet
   // som har oversikten over vinnerloddene ($vinnere).

    do
    {
        $vlodd = rand(1,200);
    }
    while( in_array( $vlodd, $vinnere ) );

    // Når do-while er ferdig, så har vi trukket et vinnerlodd som ikke er trukket før.
   // Nå må også dette loddet legges til arrayet med vinnerlodd slik at dette ikke blir trukket igjen.

    $vinnere[] = $vlodd;

    // Annonserer vinner
    echo 'Vinner er loddnr. ' . $vlodd . ' som ble kjøpt av ' . $lodd[$vlodd] . '<br />';
}
?>