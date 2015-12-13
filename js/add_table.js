$(document).ready(function(){
	var a=1,b=1;
	$("#add_pref1").click(function(){
	if(a<5){
		a++;
		$('#table1 tr:last').after('<tr><td><input type="text" name="exam'+a+'_name" class="exam_passed" required="" /></td><td><input type="number" name="exam'+a+'_year" class="year_passed" style="width:60px;" required="" min="1965" max="2014" /></td><td><input type="number" name="exam'+a+'_percentage" class="percentage"style="width:60px;"  required=""  min="40" max="100" /></td><td><input type="text" name="exam'+a+'_divn" class="division" style="width:120px;" required="" /></td><td><input type="text" name="exam'+a+'_institute" class="Institution" required=""  /></td><td><input type="text" name="exam'+a+'_univ" class="board_uni" required="" /></td></tr>');
		}
	});
	$("#remove_pref1").click(function(){
		if(a>1)
		{a--;
		$('#table1 tr:last').remove();
		}
	});
	$("#add_pref2").click(function(){
	if(b<5){
	b++;
		$('#table2 tr:last').after('<tr><td><input type="text"  name="post'+b+'_name" /></td><td><input type="number" name="post'+b+'_from"  style="width:60px;text-align:center;" min="1965" max="2014" /></td><td><input type="number"  name="post'+b+'_to" style="width:60px;text-align:center;" min="1965" max="2014" /></td><td ><input  name="post'+b+'_total_year" type="number" style="width:60px;text-align:center;"  min="0" max="40" /></td><td><input name="post'+b+'_total_month"  type="number" style="width:60px;text-align:center;"  min="0" max="12" /></td><td><input  name="post'+b+'_institute" type="text" style="width:210px;" /></td><td><input  name="post'+b+'_pay" type="text" style="width:175px;" /></td></tr>');
	}
	});
	
	$("#remove_pref2").click(function(){
	if(b>1)
	{b--;
		$('#table2 tr:last').remove();
		}
	});
	
});