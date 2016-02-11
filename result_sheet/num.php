<?php
function convert_number_to_words($number) {
   
    $hyphen        = '-';
    $conjunction  = ' and ';
    $separator      = ', ';
    $negative        = 'negative ';
    $decimal         = ' point ';
    $dictionary         = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
		100000            => 'lac',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );   
    if (!is_numeric($number)) 
	{
        return false;
    }   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) 
	{
        // overflow
        trigger_error('convert_number_to_words only accepts numbers between -' .PHP_INT_MAX . ' and ' . PHP_INT_MAX,E_USER_WARNING );
        return false;
    }

    if ($number < 0) 
	{
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;   
    if (strpos($number, '.') !== false) 
	{
        list($number, $fraction) = explode('.', $number);
    }
   
   
    switch (true) 
	{
        case $number < 21:
            $string = $dictionary[$number];
            break;
			
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) 
			{
                $string .= $hyphen . $dictionary[$units];
            }
            break;
			
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder)
			{
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
			
        		
			
			
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder)
			{
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }   
    if (null !== $fraction && is_numeric($fraction)) 
	{
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) 
		{
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

echo ucfirst(convert_number_to_words($_GET["n"]));
// one hundred and twenty-three million, four hundred and fifty-six thousand, seven hundred and eighty-nine
/*echo convert_number_to_words(123456789.123);
// one hundred and twenty-three million, four hundred and fifty-six thousand, seven hundred and eighty-nine point one two three
echo convert_number_to_words(-1922685.477);
// negative one million, nine hundred and twenty-two thousand, six hundred and eighty-five point four seven seven
// float rounding can be avoided by passing the number as a string
echo convert_number_to_words(123456789123.12345); 
// rounds the fractional part
// one hundred and twenty-three billion, four hundred and fifty-six million, seven hundred and eighty-nine thousand, one hundred and twenty-three point one two
echo convert_number_to_words('123456789123.12345'); 
// does not round
// one hundred and twenty-three billion, four hundred and fifty-six million, seven hundred and eighty-nine thousa
*/
?>