<?php
function amtInWords()
{

	var decAmount=document.getElementById("sAmount2").value;
	var sUnits=new Array(20);
	var sTens=new Array(8);
	var sHundreds=new Array(6);
	var sAmount;
	var i,iLenAmount,iDecPart,iIntegerPart;

	sUnits[1]  = '';
	sUnits[2]  = 'One';
	sUnits[3]  = 'Two';
	sUnits[4]  = 'Three';
	sUnits[5]  = 'Four';
	sUnits[6]  = 'Five';
	sUnits[7]  = 'Six';
	sUnits[8]  = 'Seven';
	sUnits[9]  = 'Eight';
	sUnits[10] = 'Nine';
	sUnits[11] = 'Ten';
	sUnits[12] = 'Eleven';
	sUnits[13] = 'Twelve';
	sUnits[14] = 'Thirteen';
	sUnits[15] = 'Fourteen';
	sUnits[16] = 'Fifteen';
	sUnits[17] = 'Sixteen';
	sUnits[18] = 'Seventeen';
	sUnits[19] = 'Eighteen';
	sUnits[20] = 'Ninteen';
	sTens[1]   = 'Twenty';
	sTens[2]   = 'Thirty';
	sTens[3]   = 'Forty';
	sTens[4]   = 'Fifty';
	sTens[5]   = 'Sixty';
	sTens[6]   = 'Seventy';
	sTens[7]   = 'Eighty';
	sTens[8]   = 'Ninety';
	
	sHundreds[1] = 'Hundred';
	sHundreds[2] = 'Thousand';
	sHundreds[3] = 'Lac';
	sHundreds[4] = 'Crore';
	sHundreds[5] = 'Arab';
	sHundreds[6] = 'Kharab';

	if (decAmount == 10000000000000)
	{
		decAmount = 9999999999999.99;
	}
	if (decAmount  == 0)
	{
		return "";
	}

	iDecPart = (decAmount -  Math.round(decAmount)) * 100;
	iDecPart=Math.round(iDecPart);
	
	//Because Math.round results .50,.52,.53.......98,.99 in negative values

	if(iDecPart<0)
	{
		iDecPart=100+iDecPart;
	}

	if( iDecPart == 0)
	{
		decAmount = decAmount;
	}
	else
	{
		decAmount =Math.round(decAmount - (iDecPart/100));
	}
	
	iLenAmount = ((String)(decAmount)).length;

	if (iLenAmount == 1)
	{
		var index=parseInt(decAmount)+1;
		sAmount = sUnits[index];
	}
	else	
	{
		for(i=iLenAmount;i>0;i--)
		{
			if (i==13 || i==12)
			{
				iIntegerPart = parseInt(decAmount/100000000000);
				decAmount = parseInt(decAmount % 100000000000);
				if(iIntegerPart==0)
				{
					sAmount = sAmount;
				}
				else
				{
					if(iIntegerPart<20)
					{
						sAmount = sUnits[iIntegerPart + 1] +" "+ sHundreds[6]+" ";
					}
					else
					{
					  sAmount = sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[6]+" "
					}
				}
			}
			else if (i==11 || i==10)
			{
				iIntegerPart = parseInt(decAmount/1000000000);
				decAmount = parseInt(decAmount % 1000000000);
				if(iIntegerPart==0)
				{
					sAmount = sAmount;
				}
				else
				{
					if(iIntegerPart<20)
					{
						if(sAmount == null)
						{
							sAmount = sUnits[iIntegerPart + 1] +" "+ sHundreds[5]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sUnits[iIntegerPart + 1] +" "+ sHundreds[5]+" ";
						}
					}
					else
					{
						if(sAmount == null)
						{
							sAmount = sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[5]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[5]+" ";
						}
					}
				}
			}
			else if (i==9 || i==8)
			{
				iIntegerPart = parseInt(decAmount/10000000);
				decAmount = parseInt(decAmount % 10000000);
				if(iIntegerPart==0)
				{
				  sAmount = sAmount;
				}
				else
				{
					if(iIntegerPart<20)
					{
						if(sAmount == null)
						{
							sAmount = sUnits[iIntegerPart + 1] +" "+ sHundreds[4]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sUnits[iIntegerPart + 1] +" "+ sHundreds[4]+" ";
						}
					}
					else
					{
						if(sAmount == null)
						{
							  sAmount = sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[4]+" ";
						}
						else
						{
							  sAmount = sAmount+" "+sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[4]+" ";
						}
					}
				}
			}
			else if(i==7 || i==6)
			{
				iIntegerPart = parseInt(decAmount/100000);
				decAmount = (decAmount % 100000);
				if(iIntegerPart==0)
				{
					sAmount = sAmount;
				}
				else
				{
					if(iIntegerPart < 20)
					{
						if(sAmount == null)
						{
							sAmount =sUnits[iIntegerPart + 1]+" "+ sHundreds[3]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sUnits[iIntegerPart + 1]+" "+ sHundreds[3]+" ";
						}
					}
					else
					{
						if(sAmount == null)
						{
							sAmount = sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[3]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1] +" "+ sHundreds[3]+" ";
						}
					}
				}
			}
			else if(i==5 || i==4)
			{
				iIntegerPart = parseInt(decAmount/1000);
				decAmount = (decAmount % 1000);
				if(iIntegerPart==0)
				{
					sAmount = sAmount;
				}
				else
				{
					if(iIntegerPart < 20)
					{
						if(sAmount == null)
						{
							sAmount = sUnits[iIntegerPart + 1]+" "+ sHundreds[2]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sUnits[iIntegerPart + 1]+" "+ sHundreds[2]+" ";
						}
					}
					else
					{
						if(sAmount == null)
						{
							sAmount = sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1]+" "+ sHundreds[2]+" ";
						}
						else
						{
							sAmount = sAmount+" "+sTens[parseInt(iIntegerPart/10) - 1] +" "+ sUnits[(iIntegerPart - parseInt(iIntegerPart/10)*10) + 1]+" "+ sHundreds[2]+" ";
						}
					}
				}
			}
            else if(i==3)
			{
				iIntegerPart = parseInt(decAmount/100);
				decAmount = (decAmount % 100);
				if(iIntegerPart==0)
				{
					sAmount = sAmount;
				}
				else
				{
					var index;
					index=parseInt(iIntegerPart)+1;
					if (sAmount == null)
					{
						sAmount = sUnits[index] +" "+ sHundreds[1]+" ";
					}
					else
					{
						sAmount = sAmount+" "+sUnits[index] +" "+ sHundreds[1]+" ";
					}
				}
			}
			else if(i==2)
			{
				decAmount=parseInt(eval(decAmount));
				if(decAmount<20)
				{
					var index=parseInt(decAmount)+1;
					if (sAmount == null)
					{
						sAmount = sUnits[index];
					}
					else
					{
						sAmount = sAmount+" "+sUnits[index];
					}
				}
				else
				{
					var a=parseInt(((decAmount/10) - 1));
					var b=(decAmount%10) + 1;
					if (sAmount == null)
					{
						sAmount = sTens[a] +" "+ sUnits[b];
					}
					else
					{
						sAmount = sAmount+" "+sTens[a] +" "+ sUnits[b];
					}
				}	
			}
		}
	}
	if(iDecPart==0)
	{
		sAmount = "Rs. " + sAmount;
	}
	else if(sAmount=="")
	{
		sAmount = "Paise ";
	}
	else
	{
		sAmount = "Rs. "+sAmount+" And Paise";
	}

	if(iDecPart < 20)
	{
		sAmount = sAmount+" "+sUnits[iDecPart + 1]+" ";
	}
	else
	{
		var fi = parseInt(((iDecPart/10) - 1));
		var fii = parseInt((iDecPart % 10))+1;
		sAmount = sAmount+" "+sTens[fi] +" "+ sUnits[fii]+" " ;
	}	
        sAmount = sAmount + " Only";
        return sAmount;
	
}

?>