# DEPEND VALUE

A form field value can be fetched dynamically on depending on another field of the same form. If no depended field given, then on page load, it fetch automatically.

If depend value should be generated from a method, then this method should be in controller, where the controller must be defined for the resource.

This controller should return either of any value
1. A plain string or integer, that should be the value to be filled in requested field
1. An array in the format [field_name => field_value]. This is to fill all the field names in keys of array with its corresponding value
1. NULL. If returns NULL or no return then no any action occurs unless manual storing of bag should perform from within method
ex: `$this->bag->store('DependValue',$form_id,[field_name => field_value],true)` Please not, Controller should be extend Appframe Controller to have access to `$this->bag`