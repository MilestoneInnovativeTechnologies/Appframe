<u>**ResourceFormFieldDepend**</u>
<br>`compare_method`
<br>This method should return a value which is to be going to compare with `db_field` using operator `operator`
<br>This method will get the `depend_field` value as its only argument.

<u>**ResourceFormFieldDepend**</u>
<br>`method`
<br>This method should not return anything but need to store data into bag.
<br>The store is expecting two type of data from this method.
<ol>
<li>DependValue
<br>If the dependent field is expecting any value. This method should store DependValue with Key as ID of form and value as a associate array with Keys as field name and Values as corresponding field value
</li>
<li>FieldOption
<br>If the dependent field is expecting any options. This method should store FieldOption with Key as the ID of Option(get it from field options table) and value as a associate array with Keys as field option value and Values as corresponding field option label
</li>
</ol>
<br>This method will get the `depend_field` value as its only argument.

<u>**ResourceFormFieldOption**</u>
<br>`detail`
<br>The method in this field must return an associate array with keys _options_ and _latest_.
<br>The _options_ should be another associate array with keys as the `form field option value` and values as its `form field option label`
<br>The _latest_ should be `datetime` or `0`. Next time the options who are greater than this are only outputs.