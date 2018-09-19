Helpers are used for getting furnished object from appframe database.

It should contains 2 public functions

1. ```__construct```, which should accept one argument. This argument should be the primary thing.

2. ```get```, which accepts no arguments but returns furnished data after applying relation, scopes etc etc.

And optional functions named 

1. ```set```, public method, which should accepts an associative array. This is used to set other arguments. So associative array should be Property => Value pair.