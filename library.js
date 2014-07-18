function calcSubTotal(id,price)
{
	quantity = document.getElementById("quantity"+id).value;
	subTotal = document.getElementById("subTotal"+id);
	subTotal.value = quantity*price;
	document.getElementById("total").value = parseInt( document.getElementById("total").value ) + parseInt( subTotal.value );
	
	document.getElementById("quantityTotal").value = parseInt( document.getElementById("quantityTotal").value ) + parseInt( quantity );
	alert(document.getElementById("quantityTotal").value);
}

var months = new Array ("January","February",
                        "March","April","May",
						"June","July","August",
						"September","October",
						"November","December");
                        
function displayDate(day,month,year)
{
    var new_option;
    var day_f = document.getElementById(day);
    var month_f = document.getElementById(month);
    var year_f = document.getElementById(year);
    
	day_f.options[0] = new Option("","");
    for (var i=1;i<32;i++)
	{day_f.options[i] = new Option(i,i);}
    
	month_f.options[m] = new Option("","");
	for (var m=1;m<13;m++)
    {month_f.options[m] = new Option(months[m-1],m);}
        
    var today = new Date();
    var cur_year = today.getFullYear()
    
	year_f.options[0] = new Option("","");
	for (var y=1;y<100;y++)
    {year_f.options[y] = new Option(cur_year,cur_year);cur_year -= 1;}
}

