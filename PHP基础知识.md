###超全局变量
* $GLOBALS :包含全局变量的数组。
* $_GET :包含所有通过 GET 方法传递给代码的变量的数组。
* $_POST :包含所有通过  POST 方法传递给代码的变量的数组。
* $_FILES :包含文件上传变量的数组
* $_COOKIE :包含  cookie  变量的数组。
* $_SERVER :包含服务器环境变量的数组。
* $_ENV :包含环境变量的数组。
* $_REQUEST :包含用户所有输入内容的数组（包括  $_GET 、 $_POST  和  $_COOKIE ）。
***
###强制转换数据类型
1. 自动数据类型转换   
	float 型转换为整数  int 型，小数点后面的数将被舍弃。如果 float 数超过了整数的取值范围，则结果可能是 0 或者整数的最小数。  
  
```<?php  
	$flo1=1.86;  
	echo (int)$flo1."<br>"  
	$flo2=4E32; //超过整数取值方位   
	echo (int)flo2;  
	?>```
	结果是：  
	1  
	0
2. 强制数据类型转换  
    Bool setType(var,string type)  
    实例：```$flo1 = 1.86;  
    		echo setType($flo1,"int");  
    		```
***
###错误控制运算符  
错误控制运算符是用“@”来表示。在一个操作数之前使用，用来屏蔽错误星系的生成。  
***
###循环语句
* foreach  
	foreach (数组    as 数组元素值){
	   对数组元素的操作命令
	 }  
	   
	 foreach {数组  as  键值 => 数组元素值}{
	   对数组元素的操作命令
	 }
***
* 对函数取消引用
unset()函数
***
###正则表达式
1. 方括号（[]）  
方括号内的一串字符是将要用来进行匹配的字符。  
例如正则表达式在方括号内的[name]是指在目标字符串寻找字母  n\a\m\e,[jjk] 表示在目标字符串中寻找字符 j 和  k 。  
2. 连字符（-）  
[a-z]:表示匹配英文小写从 a 到  z 的任意字符。  
[A-Z]:表示匹配应为大写从 A 到  Z 的任意字符。  
[A-Za-z]:表示匹配英文大写从大写  A 到 Z 的任意字符。  
[0-9]:表示匹配从 0 ~ 9 的任意十进制数。  
由于子母和数字的区间固定，所以根据这样的表示方法[开始-结束],程序员可以重新定义区间大小。  
3. 点号字符（.）  
点号字符在正则表达式中是一个通配符，他代表所有字符和数字。例如：.er 表示所有以  er 结尾的三个字符的字符串。  
4. 限定符（+、*、？、{n,m}）  
+:表示其前面的字符至少一个。例如：”9+“表示目标字符串包含至少一个 9.  
*:表示其前面的字符不止一个或零。例如：”y*“表示目标字符串包含 0 或者不知一个 y。  
？：表示其前面的字符一个或零。例如："y?"表示目标字符串包含 0 或者一个  y.  
{n,m}:表示其前面的字符有  n 或者  m 个。例如：”a{3,5}“表示目标字符串包含 3 个或  5 个  a.  
点号和星号一起使用，表示广义同配。”.*“表示匹配任意字符。  
5. 行定位符（^和$）  
行定位符是用来确定匹配字符串所要出现的位置。  
如果是在目标字符串开头出现，则使用符号 ” ^ “ ；如果是在目标字符串结尾出现则使用符号 ” $ “ 。例如：^xiaoming 是指 ”xiaoming“ 只能出现在目标字符串开头。8895$是指”8895“只能出现在目标字符串结尾。  
有一个特殊标识，同时使用  " ^ " 和 " $ " 两个符号，就是 " ^[a-z]$ ",表示目标字符串要只包含从  a-z 的单个字符。  
6. 排除字符[^]  
符号"^"在方括号内所代表的意义则完全不同，他表示一个逻辑”否“。排除匹配字符串在目标字符串中出现的可能。例如：[0-9]表示目标字符串包含从 0 ~ 9 以外的任意其他字符。  
7. 括号字符（（））  
表示子串，所有对包含在子串内字符的操作，都是以子串为整体进行的，它也是把正则表达式分成不同部分的操作符。  
8. 选择字符（|）  
选择字符表示”或“选择。例如：” com | cn | com.cn | net “表示目标字符串包含 com 或  cn  或  com.cn 或   net  
9. 转义字符（\）与反斜杠（\）  
由于”\“在正则表达式中属于特殊字符，如果单独使用次字符，则直接作为特殊字符的转移字符。如果要表示反斜杠字符本身，则在此字符前添加转义字符”\“,为”\\”  
10. 认证email的正则表达  
^[A-Za-z0-9_.]+@[A-Za-z0-9_]+\.[A-Za-z0-9.]+$  
其中，^[A-Za-z0-9_.]+表示，至少有一个英文大小写字符、数字、下划线、点号，或者这些字符的组合。  
@表示email中的"@"  
[A-Za-z0-9_.]+表示，至少有一个英文大小写字符、数字、下划线，或者这些字符的组合。  
\.表示email中".com"之类的点。由于这里点号只是点本身，所以用反斜杠对它进行转义。  
[A-Za-z0-9_.]+$表示，至少有一个英文大小写字符、数字、点号，或者这些字符的组合，并且直到这个字符串的末尾。  
案例：  
php  
		$email = "wangxiaoming2011@hotmail.com";  
		$email = "The email is liuxiaoshuai_2011@hotmail.com";  
		$asemail = "This is wangxiaoming2011@hotmail";  
		$regex = '^[a-zA-Z0-9_.]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9.]+$';  
		$regex2='[a-zA-Z0-9_.]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9.]+$';  
		if(ereg($regex,$email,$a)){  
			echo "This is an email.";  
			print_r($a);  
			echo "<br/>"  
		}  
		if(ereg($regex2,$email2,$b)){  
			echo "This is a new email.";  
			print_r($b);  
			echo "<br/>";  
		}  
		if(ereg($regex,$asemail)){
			echo "This is an email.";  
		}else{
		echo "This is not an email.";
		}  
  
使用正则表达式替换字符串子串  
$searchurl ="这是搜索引擎链接：http://www.google.com/和http://www.baidu.com/";  
echo ereg_replace("(http://)([a-zA-Z0-9./-_]+))","<a href=\"\\0\">\\0</a>",$searchurl);  
echo "<br/>";  
echo ereg_replace("(http://)([a-zA-Z0-9./-_]+)","<a href=\"\\0\">2</a>",$searchurl);  
使用正则表达式切分字符串  
strtok(正则表达式，目标字符串)  
***
###遍历数组  
1. php  
$roomtypes=array('单床房','标准间','三床房','VIP 套房');  
for($i =0;$i<3;$i++){
	echo $roomtypes[$i]."(for循环)<br/>";  
}  
foreach ($roomtypes as $room){  
	echo $room."(foreach循环)<br/>";  
}  
2. 遍历一维联合索引数组  
$prices_per_day = array('单床房'=>298,'标准间'=>268,'三床房'=>198,'VIP 套房'=>368);  
foreach ($prices_per_day as $price){
echo $price."<br/>";  
}  
foreach ($prices_per_day as $key=>$value){  
echo $key.":".$value."每天。<br/>";  
}  
reset($prices_per_day);  
while($element=each($prices_per_day)){  
echo $element['key']."\t";
echo $element['value'];
echo "<br/>";  
}  
reset($prices_per_day);
while(list($type,$price)=each($prices_per_day)){  
echo "$type-$price<br/>";  
}  
遍历多维数组  
$roomtypes=array(array('type'=>'单床房', 'info'=>'此房间为单人单间。','price_per_day'=>298),  
				array('rype'=>'标准间','info'=>'此房间为两床标准配置。','price_per_day'=>268),  
				array('type'=>'三床房','info'=>'此房间备有三张床','price_per_day'=>198),  
				array('type'=>'VIP 套房','info'=>'此房间为 VIP 两间内外套房','price_per_day'=>368)  
				);  
for ($row =0; $row<4;$row++){  
while(list($key,$value)=each($roomtypes[$row])){  
echo "$key:$value'.'\t|";  
}  
echo '<br/>';  
}  
数组排序  
sort()默认排序  
asort()根据数组元素的值的升序排序  
ksort()是跟胡数组元素的键值，也就是关键字的升序排序  
rsort()、arsort()、krsort()正好与所对应的升序排序相反，都为降序排序  
###向数组中添加和删除元素  
array_unshift()函数格式：(头部添加数组元素)  
array_unshift(目标数组，[与添加数组元素，与台南佳数组，...])  
array_push()函数格式：（尾部添加数组元素）  
array_push(目标数组，[与添加数组元素，与添加数组元素....])  
array_shift()函数格式:(删除目标数组的头一个数组元素)  
array_shift(目标数组)  
array_pop()函数格式：(删除目标数组的组后一个数组元素)  
array_pop(目标数组)  
查询  
php  
$roomtypes = array('单床房','标准间','三床房','VIP 套房');  
$prices_per_day = array('单床房'=>298,'标准间'=>268,'三床房'=>198,'VIP 套房'=>368);
if(in_array('单床房',$roomtypes)){echo '单床房元素在数组  $roomtypes 中。<br/>';  
}  
if(array_key_exists('单床房',$prices_per_day)){echo '键名为单床房的元素在数组  $prices_per_day 中。<br/>;'  
}  
if(array_search(268,$prices_per_day)){echo '值为 268 的元素在数组 $prices_per_day 中。<br/>';  
}  
$prices_per_day_keys = array_keys($prices_per_day);  
print_r($prices_per_day_keys);  
$prices_per_day_values = array_values($prices_per_day);  
print_r($prices_per_day_values);  
###删除数组中重复元素  
array_unique()函数  
调换数组中的键值和元素的值  
array_flip()函数
***  


