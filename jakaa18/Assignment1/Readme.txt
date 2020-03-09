We had difficulties making it on time thanks to other assignments creeping up on us around the same time as this one. 
For this reason, a few of the requirements have not been made and we are aware of it.

Some of the things we knew we failed to implement in time are:
RegExp) We did not manage the ensure the RegExp got checked against the username when registering a new user.
Security) Data sent from client to server is sent using proper HTTP Method
	This was reached in a few places, but not all data sent was sent through HTTP Methods
Security) The server cleans any input before examining it
	Was only implemented once
Security) Strings that build SQL statements are made in a way that avoids SQL injection
	This has not been done optimally and would require us to move away from text-written SQL statements and instead use methods to put them together proper
Security) Anything that is uploaded is cleaned to avoid cross-site scripting
	Cleaning has not been done everywhere.
	