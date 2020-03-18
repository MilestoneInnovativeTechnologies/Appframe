<h1>The following methods should be either in mutations to commit or in actions to dispatch</h1>

**init**

<p>This method invokes when the app get initialized.</p>

**requestInterceptor**

<p>This method is invoked before sending a server request.</p>
<p>This method received config which are free to modify.<br>
Once modified, it should commit by calling updateConfig mutation in root</p>
<p>Ex: commit('updateConfig',config,{ root:true });</p>

**responseInterceptor**

<p>This method is invoked just after the response received, before it get handled.</p>
<p>This method received response data which are free to modify.<br>
Once modified, it should commit by calling updateResponse mutation in root</p>
<p>Ex: commit('updateResponse',response,{ root:true });</p>

**beforeEachRoute**

<p>This method is invoked before the route get changed.</p>
<p>This method received payload with properties to,from,next.</p>
<p>Once done, must commit proceedRoute in root</p>
<p>Ex: commit('proceedRoute',null,{ root:true });</p>

**afterEachRoute**

<p>This method is invoked after the route get confirmed.</p>
<p>This method received payload with properties to,from.</p>

<h1>The following property should be in state</h1>

**handler**

<p>Response handler.</p>
<p>This could be defined as object with key as response key and value as method.</p>
<p>Ex: handler: { 'Resolve':'storeResolve' }</p>
<p>From the above example, where ever a response have a key 'Resolve', then 'storeResolve' action or mutation get triggered.</p>
<p>The method can be array also if have multiple handler.</p>
<p>Method invoked with payload containts data as complete data, and triggered key in same name</p>

