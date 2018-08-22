<h3>yes</h3>
If this method returns true, response should contains a Key named Resolve, which will have the resolved item, idn

<h3>idns</h3>
This function must return an array of idn, which are using for this particular resolver<br>
Ex:  return ['idn1'];

<h3>prepare</h3>
This method will be called then.<br>
Remaining activities goes here.<br>
Prepare and keep data in bag for further resolution