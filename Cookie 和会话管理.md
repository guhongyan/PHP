###13.1 Cookie 基本操作
####13.1.1 什么事 Cookie 
Cookie 常用语识别用户。 Cookie 是服务器留在用户计算机中的小文件。每当相同的计算机通过浏览器请求页面时，它会同时发送 Cookie。  
Cookie 的工作原理是： 当一个客户端浏览器链接到一个 URL，它会首先扫描本地储存的  Cookie，如果发现其中有和此 URL 相关联的  Cookie,将会把它们返回给服务器端。  
Cookie 通常应用于以下几个方面：  
(1) 在页面之间传递变量。  
(2) 记录方可的一些信息。  
(3) 通过把所产看的页面存放在 Cookie 临时文件夹中，可以提高以后的浏览速度。  
####13.1.2 实例1————创建 Cookie  
创建 Cookie 使用 setcookie()函数，它的语法格式：  
setcookie(名称，cookie值，到期日，路径，域名，secure)  
其中的参数同 Set-cookie 中的参数意义相同。  
setcookie()函数必须位于<HTML>标签之前  
示例：  
setcookie("user","Cookie 保存的值", time()+3600);  
####13.1.3 读取 Cookie
//输出一个 Cookie  
echo $_COOKIE(“user”);  
//显示所有的 Cookie  
print_r($_COOKIE);  
用户可以通过 isset() 函数来确认是否设置了  Cookie。  
if(isset($_COOKIE["user"]))//假如  Cookie 文件存在  
echo "Welcome" . $_COOKIE["user"]."<br/>";  
else //如果  Cookie 文件不存在  
echo "Welcome guest!<br/>";  
***
####13.2 认识  Session
13.2.1 什么是  Session  
由于 HTTP 是无状态协议，也就是说 HTTP 的工作过程是请求与回应的简单过程，所以  HTTP 没有一个内置的方法来储存在这个过程中各方的状态。比如，当同一个用户向服务器发出两个不同的请求时，虽然服务器端都会给予相应的回应，但是它并没有办法知道这两个动作是否由相同一个用户发出。  
由此，会话（session）管理应运而生。通过使用一个会话，程序可以跟踪永辉的身份和行为，并且根据这些状态数据，给用户以相应的回应。  
13.2.2  Seesion 基本功能  
Session ID 就像是一把钥匙用来注册到 Session 变量中。而这些  Session 变量是储存在服务器端的。 Session ID 是客户唯一存在的会话数据。  
使用  Session ID 打开服务器端相对应的  Session 变量，跟用户相关的会话数据便一目了然。默认情况下，在服务器端的 Session 变量数据是以文件的形式加以储存的，但是会话变量数据也经常通过数据库进行保存。  
####  13.2.3  Cookie 与    Session  
使用  Session 可以不必手动设置 Cookie, PHP Session 可以自动进行处理。可以使用会话管理及  PHP 中的 session_get_cookie_params()函数来访问 Cookie 的内容。这个函数将返回一个数组，包括  Cookie 的生存周期、路径、域名、secure 等。它的格式：  
session_get_cookie_params(生存周期，路径，域名，secure)  
###  13.3  会话管理
####13.3.1  实例4————创建会话
常见的创建会话的方法有三种，包括   php 自动创建、使用  session_start()函数创建和使用  session_register()函数创建.  
1. PHP 自动创建  
用户可以在  php.ini 中设定 session.auto_start 为启用。但是使用这种方法时，不能把 session 变量对象化。应定义此对象的类，必须在创建会话之前加载，然后新创建的会话才能加载此对象。  
2. 使用 session_start() 函数  
这个函数首先会检查当前是否已经存在一个会话，如果不存在，它将创建一个全新的会话，并且这个会话可以访问超全局变量  $_SESSION 数组。如果已经有一个存在的会话，函数会直接使用这个绘画，加载已经注册过的会话变量，然后使用。  
session_start()函数的语法格式：  
bool session_start(boid);  
***
session_start()函数必须位于  <HTML> 标签之前。  
案例：  
session_start();  
3. 使用 session_register()函数  
在使用  session_register() 函数之前，需要在  php.ini 文件中将 register_globals 设置为 on， 然后需要重启服务器。 session_register() 函数是通过为会话登录一个变量来隐性地启动会话。  
####  13.3.2  实例5————注册会话变量  
session_start(); //启动Session  
$_SESSION['name']='xiaoli';//声明一个名为  name 的变量，并赋值 “xiaoli”  
####  13.3.3  实例6————使用会话变量  
使用绘画变量，首先要判断会话变量是否存在一个会话 ID，如果不存在，则需要创建一个，并且能够通过 $_SESSION 变量进行访问。如果已经存在，则将这个已经注册的会话变量载入已供用户使用。  
在访问 $_SESSION 数组时，先要使用 isset() 或 empty() 来确定 $_WESSION 中会话变量是否为空。  
案例：  
if(!empty($_SESSION['session_name']));//判断会话变量是否为空  
$ssvalue=$_SESSION['session_name'];//若不为空，则将变量载入  
********
下面通过实例讲解存储和取回 $_SESSION 变量的方法。  
session_start();  
//存储会话变量的值  
$_SESSION['VIEWS']=1;  
<HTML>  
<BODY>  
<?PHP    
//读取会话变量的值  
echo "浏览量="。$_SESSION['views'];  
?>  
</BODY> 
</HTML>  
####13.3.4  实例7————注销和销毁会话变量
注销会话变量使用  unset() 函数就可以，如  unset($_SESSION['name']).(不需要使用 PHP 4 中的 session_unregister() 或 session unset().) unset() 函数用于释放指定的   session 变量，代码如下：  
unset($_SESSION['views']);  
如果要注销所有会话变量，只需要向 $_SESSION 赋值一个空数组就可以了，如 $_SESSION = array()。注销完成后，使用  session_destroy() 销毁会话即可，其实就是清楚相应的  Session ID。代码如下：  
sesson_destroy();  
###  13.4  实例8————会话guanine的综合应用  
step 01  在网站根目录下建立一个文件夹，命名为 session。  
step 02  在 session 文件夹下建立  opensession.php，输入以下代码并保存。  
``<?php  
session_start();  
$_SESSION['name']="王小明";  
echo "会话变量为：".$_SESSION['name'];  
?>  
<a href='usesession.php'>下一页</a>```  
step 03  在 session 文件夹下建立usesession.php，输入以下代码并保存：  
```<?php  
session_start();  
echo "会话变量为："。$_SESSION['NAME']."<br/>";
echo $_SESSION['name']."你好。";  
?>  
<a href='closesession.php'>下一页</a>```  
step 04  在 session 文件夹下建立 closesession.php，输入以下代码并保存：  
```<?php  
session_start();  
unset($_SESSION['name']);  
if(isset($_SESSION['name'])){  
echo "会话变量为：".$_SESSION['name'];  
}else{  
echo "会话变量已注销。";  
}  
session_destroy();  
?>```
