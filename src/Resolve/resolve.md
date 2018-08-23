<h3>yes</h3>
If this method returns true, response should contains a Key named Resolve, which will have the resolved item, idn

<h3>idns</h3>
This function must return an array of idn, which are using for this particular resolver<br>
Ex:  return ['idn1'];

<h3>prepare</h3>
This method will be called then.<br>
Prepare and keep data in bag which are required by further controllers to complete actions

<h3>controllers</h3>
This function should return a n array or controllers name, which all will run before dumbing the response<br>
return ['Milestone\\Appframe\\Controllers\\GetFormController'];