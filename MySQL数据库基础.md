###MySQL
在命令行窗口中可以通过登录命令连接到 MySQL 数据库，连接 MySQL 的命令格式：
mysql -h hostname -u username -p  
其中   mysql 为登录命令， -h 后面的参数是服务器主机地址，在这里客户端和服务器在同一台机器上，所以输入  localhost 或者 IP 地址 127.0.0.1， -u 后面跟登陆数据库的用户名称，在这里为 root，-p 后面是用户登录密码。  
接下来，输入如下命令：  
mysql -h localhost -u root -p  
按 Enter键，系统会提示输入密码“Enter password”,这里输入在前面配置向导中自己设置的密码，验证正确后，即可登陆到 MySQL 数据库  
###PHP 操作 MySQL数据库
####17.1 PHP 访问  MySQL 数据库的一般步骤
对于一个通过  Web 访问数据库的工作过程。一般分为一下几个步骤。  
(1) 用户使用浏览器对某个页面发出  HTTP 请求。  
(2) 服务器端接收到请求，并发送给 PHP 程序进行处理。   
(3) PHP 解析代码。在代码中有连接 MySQL 数据库命令和请求特定数据库的某些特定数据的  SQL 命令。根据这些代码， PHP 打开一个和 MySQL 的连接，并发送 SQL 命令到  MySQL 数据库。  
(4) MySQL 接收到 SQL 语句之后，加以执行。执行完毕后返回执行结果到  PHP 程序。  
(5) PHP 执行代码，并根据  MySQL 返回请求的结果数据，生成特定格式的  HTML 文件，且传递给浏览器。 HTML 经过浏览器渲染，就是用户请求的展示结果。  
####17.2  PHP 操作 MySQL 数据库的函数  
#####17.2.1 势力2————通过  mysqli 类访问   MySQL 数据库
step 01 在网站主目录下创建   phpmysql 文件夹  
step 02 在 phpmysql 文件夹下建立文件  htmlform.html  
```
<HTML>
<HEAD>
<TITLE>Findding User</TITLE>
</HEAD>
<BODY>
<h2>Finding users from mysql database.</h2>
<form action="formhandler.php" method="post">
Fill user name:
<input name="username" type="text" size="20"/><br/>  
<input mame="submit" type="submit" value="Find"/>
</form>
</BODY>
</HTML>
```
step 03 在 phpmysql 文件夹下建立文件 formhandler.php  
```
<HTML>
<HEAD>
<TITLE>User found</TITLE>
</HEAD>
<BODY>
<h2>User found from mysql database.</h2>
<?php
$username =$_POST['username'];
if(!$username){
echo "Erro:There is no data passed.";
exit;
}
if(!get_magic_quotes_gpc()){
$username=addslashes($username);
}
@ $db=mysqli_connect('localhost'.'root'.'753951','adatabase');

if(mysqli_connect_errno()){
echo "Error:Could not connect to mysql database.";
exit;
}
$q ="SELECT * FROM user WHERE name='".$username."'";
$result=mysqli_query($db,$q);
$rownum=mysqli_num_rows($result);

for($i=0;$i<$rownum;$i++){
$row = mysqli_fetch_assoc($result);
echo "Id:".$row['id']."<br/>";
echo "Name:".$row['name']."<br/>";
echo "Age:".$row['age']."<br/>";
echo "Gender:".$row['gender']."<br/>";
echo "Info:".$row['info']."<br/>";
}
mysqli_free_result($result);
mysqli_close($db);
?>
<BODY>
</HTML>
```
####17.2.2 实例3————使用   mysqli_connect()函数连接  MySQL 服务器
PHP 使用  mysqli_connect()函数连接到 MySQL 数据库的。  
mysqli_connect()函数的格式：  
mysqli_connect('MYSQL 服务器地址','用户名','用户密码','要连接的数据库名')
例如：  
$db=mysqli_connect('localhost','root','753951','adatabase');  
####17.2.3 实例4————使用 mysqli_select_db()函数选择数据库文件
mysqli_select_db(数据库服务器连接对象，目标数据库名)  
案例：  
如果把上例中的 formhandler.php 文件中的下面的语句:  
@ $db=mysqli_connect('localhost','root','753951','adatabase');  
修改为以下两个语句代替：  
@ $db=mysqli_connect('localhost','root','753951');  
mysqli_select_db($db,'adatabase');  
程序效果完全一样  
####17.2.4  实例5————使用  mysqli_query() 函数执行 SQL 语句
使用  mysqli_query() 函数执行 SQL 语句，需要向此函数中传递两个参数，一个是 MySQL 数据库服务器连接对象，另一个是以字符串表示的  SQL 语句。 mysqli_query()  函数的格式如下：  
mysqli_query(数据库服务器连接对象， SQL 语句)  
在 17.2.1 小结的实例中 mysqli_query($db,$q); 语句中就表明了“数据库服务器连接对象”为$db,"SQL 语句" 为 $q ,而  $q 用  $q = "SELECT * FROM user WHERE  name='".$username."'"; 语句赋值。  
更重要的是 mysqli_query() 函数执行  SQL 语句之后会把结果返回。上例中即使返回结果并且赋值给 $result 变量.  
####17.2.5  实例6————使用  mysqli_fetch_assoc() 函数从数组结果集中获取信息
使用  mysqli_fetch_assoc() 函数从数组结果集中获取信息，只要确定  SQL 请求返回的对象就可以了。  
所以 $row = mysqli_fetch_assoc($result); 语句直接从 $result 结果中取得一行，并且以关联数组的形式返回给  $row。  
由于获得的是关联数组，所以在读取数组元素的时候是要通过字段名称确定数组元素的。
####17.2.6 实例7——————使用  mysqli_fetch_object() 函数从结果集中获取一行作为对象  
使用  mysqli_fetch_object() 函数从结果中获取一行作为对象，同样是确定 SQL 请求返回的对象就可以了  
```
for($i=0;$i<$rownum;$i++){
 $row = mysqli_fectch_assoc($result);
 echo "Id:".$row['id']."<br/>";
 echo "Name:".$row['name']."<br/>";
 echo "Age:".$row['age']."<br/>";
 echo "Gender:".$row['gender']."<br/>";
 echo "Info:".$row['info']."<br/>";
 }
```
 修改如下：  
```
for($i=0; $i<$rownum; $i++){
$row = mysqli_fetch_object($result);
echo "Id:".$row->id."<br/>";
echo "Name:".$row->name."<br/>";
echo "Age:".$row->age."<br>";
echo "Gender:".$row->gender."<br/>";
echo "Info:".$row->info."<br/>";
}
```
####17.2.7 实例8————使用  mysqli_free_result() 函数释放资源
mysqli_free_result() 函数格式：  
mysqli_free_result(SQL 请求所返回的数据库对象)  
在一切操作都基本完成以后，17.2.1 小节实例中程序通过 mysqli_free_result($result); 语句释放了 SQL 请求所返回的对象 $result 所占用的资源。  
####17.3.9 实例————使用   mysqli_close() 函数关闭连接  
mysqli_close() 函数格式：  
mysqli_close(需要关闭的数据库连接对象)  
在 17.2.1 小节中实例的程序中 mysqli_close($db); 语句关闭了 “需要关闭的数据库来凝结对象” 的$db 对象。  
###17.3 实例11————使用 insert 语句动态添加用户信息  
step 01 在 phpmysql 文件夹下建立文件 insertform.html，并输入代码如下：  
```
<HTML>
<HEAD>
<TITLE>Adding User</TITLE>
</HEAD>
<BODY>
<h2>Adding users to mysql database.</h2>
<form action="formhandler.php" method="post">
Select gender:
<delect name="gender">
<option value="male">man</option>
<option value="female">woman</option>
</select><br/>
Fill user name:
<input name="username" type="text" size="20"/><br/>
Fill user age:
<input name="age" type="text" size="3"/><br/>
Fill user info:
<input name="info" type="text" size="60"/><br/>
<input name="submit" type="submit" value="Add"/>
</form>
</BODY>
</HTML>
```
step 02 在 phpmysql 文件夹下建立文件 insertformhandler.php  
```
<HTML>
<HEAD>
<TITLE>uSER ADDING</TITLE>
</HEAD>
<BODY>
<h2> adding new user.</h2>
<?php
$username = $_POST['username'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$info = $_POST['info'];
if(!$username and !$gender and !$age and !$info){
echo "Error: There is no data passed.";
exit;
}
if(!$username or !$gender or !$age or !$info){
echo "Error: Some data did not be passed.";
exit;
}
if(!get_magic_quotes_gpc()){
$username = addslashes($username);
$gender = addslashes($gender);
$age = addslashes($age);
$info = addslashes($info);
}
@ $db = mysqli_connect('localhost','root','753951');
mysqli_select_db($db,'adatabase');
if(mysqli_connect_errno()){
echo "Error:Could not connect to mysql database.";
exit;
}
$q = "INSERT INTO user(name,age,gender,info) VALUES('$username',$age,'$gender','$info')";
if(!mysqli_query($db,$q)){
echo "no new user has been added to database.";
}else{
echo "New  user has been added to database.";
};
mysli_close($db);
?>
</BODY>
</HTML>
```
###17.4 实例12————使用  select 语句查询数据信息
step 01 在  phpmysql 文件夹下建立文件 selectform.html  
```
<HTML>
<HEAD>
<TITLE>Finding User</TITLE>
</HEAD>
<BODY>
<h2>Finding users from mysql database.</h2>
<form action="selectformhandler.php" method="post">
Select gender:
<select name="gender">
<option value="male">man</option>
<option value="female">woman</option>
</select><br/>
<input name="submit" type="submit" value="Find"/>
</form>
</BODY>
</HTML>
```
step 02 在  phpmysql 文件夹下建立文件  selectformhandler.php  
```
<HTML>
<HEAD>
<TITLE>User found</TITLE>
</HEAD>
<BODY>
<h2>User found from mysql database.</h2>
<?php
$gender = $_POST['gender'];
if(!gender){
echo "Error: There is no data passed.";
exit;
}
if(!$get_magic_quotes_gpc()){
$gender = addslashes($gender);
}
@ $db = mysqli_connect('localhost','root','753951');
mysqli_select_db($db,'adatabase');
if(mysqli_connect_errno()){
echo "Error: Could not connect to mysql database.";
exit;
}
$q = "SELECT * FROM user WHERE gender = '".$gender."'";
$result = mysqli_query($db,$q);
$rownum = mysqli_num_rows($result);
for($i=0; $i<$rownum; $i++){
$row = mysqli_fetch_assoc($result);
echo "Id:".$row['id']."<br/>";
echo "Name:".$row['name']."<br/>";
echo "Age:".$row['age']."<br/>";
echo "Gender:".$row['gender']."<br/>";
echo "Info:".$row['info']."<br/>";
}
mysqli_free_result($result);
mysqli_close($db);
?>
</BODY>
</HTML>
```

