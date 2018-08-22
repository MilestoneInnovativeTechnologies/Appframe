STATIC PROPERTY `on` &lt;ARRAY&gt;

      This engine will be included once all the conditions
      in this array succeeded
      The key will be matched against resolved data generated from Resolve class.
      If value is plain text, string comparison performs
      If value starting with @, predefined method check will performs

STATIC METHOD `boot`

      The things to be return with response are needed to be store into bag
      $this->bag->store(name,id,data)
      where name will be the root property name in response having data indexed by id
      The things to keep in bag are kept by calling
      $this->bag->keep(name,data)
      To get the kept data out of bag, call
      $this->bag->get(name)
     
