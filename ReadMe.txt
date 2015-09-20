BROWSER SUPPORT: Google Chrome, Firefox

index.php
- Headline with "Welcome Guest"
--- page with no GET parameter in the URL should show guest
--- page with a specific URL parameter used in the GET request show the value of that parameter instead of guest
- Headline with Class Number and Assignment
- Headline with your Name
- Page	Loaded:	Wednesday	September	9,	2015	- 10:05:32	am	|	EpochSeconds
- A Link to form.php

form.php



-------------------------
HTTP	Request
• Client	Parses	the	URI
 protocol://server/request

 • Client	sends	request	to	Server
 Usually	HTTP	protocol
[METH] [REQUEST-URI] HTTP/[VER]
[fieldname1]: [field-value]
...
[request body, if any (used for POST and PUT)]

• Example	- GET	/index.html HTTP/1.1


--------------------------
HTTP	Methods

• HTTP	Methods
 GET,	POST,	PUT,	DELETE,	HEAD,	TRACE,	CONNECT,	OPTIONS
 First	4	are	the	common	 ones.	Mostly	GET.
 http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html
• GET
 Most	common,	Basically	get	me	this	document
 Any	variable	or	form	data	is	sent	as	part	of	the	URL
 http://www.domain.com/?q=232&name=joe
 Data	q=232	and	name=joe	is	available	to	target	page

 
 ----------------------------
 HTTP	Methods
• POST
 Second	most	common	method
 Used	often	 to	send	form	 data
 Any	variable	or	form	data	is	sent	in	the	request	body	and	not	
appended	 to	the	URL

• PUT	&	DELETE
 Used	mostly	with	web	programming	 frameworks
 Used	in	Ruby	on	Rails
 
• HEAD
 Returns	only	the	Response	headers	from	server
 
• OPTIONS
 Used	to	ask	the	server	for	information	about	 the	
communication	 options	available.

 
 -----------------------------------
 Web	Servers
• Web	servers	listen	for	HTTP	or	HTTPS	protocol	requests	
on	a	specific	port.

• What	is	a	port?
• HTTP	default	port	is	80
• HTTPS	default	port	is	443

• Web	servers	job	is	to	listen	on	the	port	for	the	HTTP	
request	and	route	the	request	to	the	folder	or	file	on	
the	file	system	or	another	type	of	resource.
 
 
 
 
 
 
 
 
 
 















