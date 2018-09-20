Helpers are used for getting furnished object from appframe database.

It should contain a primary attribute of any name; this could be set from constructor.
Other arguments should be defined as public properties that will be set from parent Helper class, if given through Help method.
Ex: Helper::Help(ItemName,PrimaryAttributeValue,AdditionalAttrs [prop => value, prop2 => value2]) 

It should contains 2 public functions

1. ```__construct```, which should accept one argument. This argument should be the primary thing.

2. ```get```, which accepts no arguments but returns furnished data.
