###14.1  使用  PHP 加密函数  
####14.1.1  实例1————使用 md5()函数进行加密  
MD5 是 Message-Digest Algorithm 5 (信息-摘要算法)的缩写，它的作用是吧任意长度的信息作为输入值，并将其换算成一个 128 位长度的 “指纹信息”或“报文摘要”值来代表这个输入值，并以换算后的值作为结果。  
md5()函数即使使用的   MD5 算法，其语法格式如下：  
string md5(string str[,bool raw_output]);  
上述代码中的参数 str 为需要加密的字符串；参数 raw_output 是可选的，默认值为   false, 如果设置为  true，则该函数将返回一个二进制形式的密文。  
案例：  
```<?php  
     echo '使用   md5()函数加密字符串  password: ';  
     echo md5('password');  
     ?>```  
     
####14.1.2  实例2————使用   crypt()函数进行加密
crypt()函数主要完成单向加密功能，其语法格式如下：  
string crypt()(string str[,string salt]);  
其中的参数  str 为需要加密的字符串；参数  salt 是可选的，表示加密时使用的干扰串，如果不设置该参数，则会随机生成一个干扰串。 crypt()函数支持  4 种算法和长度，如表  
|算法|salt 参数|
|:---:|:---:|
|CRYPT_STD_DES|2-character(默认)|
|CRYPT_EXT_DES|9-character|
|CRYPT_MD5|12-character(以 $1$开头)|
|CRYPT_BLOWFISH|16-character(以 $2$ 开头)|  
 
$str = '清水出芙蓉，天然去雕饰'；//声明字符串变量$str  
echo '$str加密前的值为：'.$str;  
$cry=crypt($str);//对变量$str加密   
echo '<p>$str加密后的值问：'.$cry;//输出加密后的变量  
  

####14.1.3 实例3—————使用 sha1()函数进行加密  
sha1()函数使用的是SHA算法， SHA 是 Secure Hash Algorithm (安全哈希算法)的缩写，该算法和 MD5算法类似。sha1()函数语法格式：  
string sha1() (string str[.bool raw_output]);  
其中的参数 str 为需要加密的字符串； 参数 raw_output 是可选的，默认为 false，此时该函数返回一个 40 为的十六进制数，如果 raw_output 为 true，则返回一个 20 位的二进制数。　　
案例：　　
```<?php  
echo '使用 md5() 函数加密字符串 password:'  
echo md5('password');  
echo '使用 sha1() 函数加密字符串  password:'  
echo sha1('password');  
?>  
