
//
// Extract a property from an array of objects
// If array is passing as 2nd argument, extractions goes to the deep
//
export function extractPropertyFromAll(Obj, Key){
    if(_.isArray(Key))
        return _.reduce(Key,function(obj,key){ return extractPropertyFromAll(obj,key) },Obj);
    return _.flatMap(Obj,Key)
}

//
// Get object from an array with key
// Optionally each object properties can also parsed while sending 3rd argument
// or else, All properties get returned
//
export function getKeyedObject(Obj,Key,Values){
    Values = Values || _.keys(_.head(Obj));
    return _(Obj).keyBy(Key).mapValues(obj => _.pick(obj,Values)).value();
}

//
// Convert all the elements into string of an array
// Converts all the values of a object into string
// Converts into string
// Accepts nested or plain array,object,string,numeric
//
export function valuesToString(Obj){
    return _.isObject(Obj)
        ? _.isArray(Obj)
                ? _.map(Obj,(el) => valuesToString(el))
                : (_.isPlainObject(Obj)) ? _.mapValues(Obj,(val) => valuesToString(val)) : Obj
        : _.toString(Obj);
}
