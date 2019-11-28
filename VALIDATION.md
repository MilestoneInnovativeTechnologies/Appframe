# Form Field Validation
While giving arguments, string start with *-* are considered as dynamic.
So the string should be starting with *-* followed by the item in the bag followed by *:* then name of the item

Ex: <br>
-r:update <- this will be the resolve from bag having key name *update*<br>
-req:form  <- this will be the data from request(bag) having key name *form*<br>
-get:name  <- this will be the data from keep(bag) having key name *name*<br>
-session:name  <- this will be the data from session(bag) having key name *name*<br>
