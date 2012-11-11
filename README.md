##What's this  
This is a practice php project I am making in early days (second week) of my php learning. It is here for sharing with friends and others who might be interested. And I think it might be useful in future for helping out some php noob.  
It is basically a blog, gives an admin right to create, edit and delete posts, and other visitors to view posts and comment on them.  
It uses Mysql for storing posts and comments, and is ridiculously vulnerable to sql injection.

##How to set it up  
To set it up on your machine, do this.  

*	Clone this repository or download as zip (see that "ZIP" button up there?)
*	If on Windows (then I suppose you are using wamp), extract the zip file in C:/wamp/www directory.
*	If on Linux, then I assume you to be smart enough to know what to do.
*	Create a new Mysql database. 
	*	If using PhpMyAdmin, create new database by clicking on the link given in right sidebar (name it "blog" for convenience)
*	Import blog.sql file in newly created database (click "Import" link on topbar of PhpMyAdmin)
*	Change database name, and db username and password in 'blog/includes/_header.php' file.
	*	$db_usename and $db_password for username and password respectively and $db_name for name of database itself.
	*	If you are using wamp, default database username is "root" and password is blank. So set $db_password = ""
*	Run wamp (or apache or whatever) and browse to the "blog" dir
*	You are up and running