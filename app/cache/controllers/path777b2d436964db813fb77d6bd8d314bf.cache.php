<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: array_search() expects parameter 2 to be array, string given in C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\common\Widget.php on line <i>82</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0010</td><td bgcolor='#eeeeec' align='right'>362024</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\xampp\htdocs\homepage\index.php' bgcolor='#eeeeec'>...\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0355</td><td bgcolor='#eeeeec' align='right'>724224</td><td bgcolor='#eeeeec'>micro\controllers\Startup::run( <span>$config = </span><span>array (&#39;siteUrl&#39; =&gt; &#39;http://127.0.0.1/homepage/&#39;, &#39;database&#39; =&gt; array (&#39;dbName&#39; =&gt; &#39;homepage&#39;, &#39;serverName&#39; =&gt; &#39;127.0.0.1&#39;, &#39;port&#39; =&gt; &#39;3306&#39;, &#39;user&#39; =&gt; &#39;root&#39;, &#39;password&#39; =&gt; &#39;&#39;, &#39;cache&#39; =&gt; FALSE), &#39;sessionToken&#39; =&gt; &#39;%temporaryToken%&#39;, &#39;namespaces&#39; =&gt; array (), &#39;templateEngine&#39; =&gt; &#39;micro\\views\\engine\\Twig&#39;, &#39;templateEngineOptions&#39; =&gt; array (&#39;cache&#39; =&gt; FALSE), &#39;test&#39; =&gt; FALSE, &#39;debug&#39; =&gt; FALSE, &#39;di&#39; =&gt; array (&#39;jquery&#39; =&gt; class Closure { ... }), &#39;cacheDirectory&#39; =&gt; &#39;cache/&#39;, &#39;mvcNS&#39; =&gt; array (&#39;models&#39; =&gt; &#39;models&#39;, &#39;controllers&#39; =&gt; &#39;controllers&#39;))</span>, <span>$url = </span><span>&#39;addUser&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\index.php' bgcolor='#eeeeec'>...\index.php<b>:</b>16</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0556</td><td bgcolor='#eeeeec' align='right'>1232912</td><td bgcolor='#eeeeec'>micro\controllers\Router::getRoute( <span>$path = </span><span>&#39;/addUser&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>22</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0557</td><td bgcolor='#eeeeec' align='right'>1233520</td><td bgcolor='#eeeeec'>micro\controllers\Router::getRouteUrlParts( <span>$routeArray = </span><span>array (&#39;path&#39; =&gt; &#39;/addUser&#39;, &#39;details&#39; =&gt; array (&#39;controller&#39; =&gt; &#39;controllers\\UtilisateurController&#39;, &#39;action&#39; =&gt; &#39;addUser&#39;, &#39;parameters&#39; =&gt; array (...), &#39;name&#39; =&gt; &#39;&#39;, &#39;cache&#39; =&gt; TRUE, &#39;duration&#39; =&gt; &#39;&#39;))</span>, <span>$params = </span><span>array ()</span>, <span>$cached = </span><span>TRUE</span>, <span>$duration = </span><span>&#39;&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Router.php' bgcolor='#eeeeec'>...\Router.php<b>:</b>30</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.0557</td><td bgcolor='#eeeeec' align='right'>1233840</td><td bgcolor='#eeeeec'>micro\cache\CacheManager::getRouteCache( <span>$routePath = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span>, <span>$duration = </span><span>&#39;&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Router.php' bgcolor='#eeeeec'>...\Router.php<b>:</b>60</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>6</td><td bgcolor='#eeeeec' align='center'>0.0560</td><td bgcolor='#eeeeec' align='right'>1233896</td><td bgcolor='#eeeeec'>micro\controllers\Startup::runAsString( <span>$u = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span>, <span>$initialize = </span>???, <span>$finalize = </span>??? )</td><td title='C:\xampp\htdocs\homepage\app\micro\cache\CacheManager.php' bgcolor='#eeeeec'>...\CacheManager.php<b>:</b>46</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>7</td><td bgcolor='#eeeeec' align='center'>0.0560</td><td bgcolor='#eeeeec' align='right'>1250328</td><td bgcolor='#eeeeec'>micro\controllers\Startup::runAction( <span>$u = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span>, <span>$initialize = </span><span>TRUE</span>, <span>$finalize = </span><span>TRUE</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>102</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>8</td><td bgcolor='#eeeeec' align='center'>0.0769</td><td bgcolor='#eeeeec' align='right'>1702720</td><td bgcolor='#eeeeec'>micro\controllers\Startup::callController( <span>$controller = </span><span>class controllers\UtilisateurController { protected $view = class micro\views\View { private $vars = array (...) }; public $jquery = class Ajax\php\micro\JsUtils { protected $params = array (...); protected $injected = NULL; protected $_ui = NULL; protected $_bootstrap = NULL; protected $_semantic = class Ajax\Semantic { ... }; protected $config = NULL; protected $jquery_events = array (...); protected $ajaxTransition = NULL; protected $ajaxLoader = &#39;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&#39;; protected $jquery_code_for_compile = array (...) } }</span>, <span>$u = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>95</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>9</td><td bgcolor='#eeeeec' align='center'>0.0770</td><td bgcolor='#eeeeec' align='right'>1702720</td><td bgcolor='#eeeeec'>controllers\UtilisateurController->addUser(  )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>117</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>10</td><td bgcolor='#eeeeec' align='center'>0.1119</td><td bgcolor='#eeeeec' align='right'>2458648</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\DataForm->fieldAsHidden( <span>$index = </span><span>&#39;id&#39;</span>, <span>$attributes = </span>??? )</td><td title='C:\xampp\htdocs\homepage\app\controllers\UtilisateurController.php' bgcolor='#eeeeec'>...\UtilisateurController.php<b>:</b>51</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>11</td><td bgcolor='#eeeeec' align='center'>0.1119</td><td bgcolor='#eeeeec' align='right'>2458920</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\DataForm->fieldAsInput( <span>$index = </span><span>&#39;id&#39;</span>, <span>$attributes = </span><span>array (&#39;inputType&#39; =&gt; &#39;hidden&#39;)</span> )</td><td title='C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\semantic\widgets\base\FieldAsTrait.php' bgcolor='#eeeeec'>...\FieldAsTrait.php<b>:</b>204</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>12</td><td bgcolor='#eeeeec' align='center'>0.1120</td><td bgcolor='#eeeeec' align='right'>2459408</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\DataForm->_fieldAs( <span>$elementCallback = </span><span>class Closure { public $static = array (&#39;attributes&#39; =&gt; array (...)); public $this = class Ajax\semantic\widgets\dataform\DataForm { protected $_model = NULL; protected $_modelInstance = class models\Utilisateur { ... }; protected $_instanceViewer = class Ajax\semantic\widgets\dataform\FormInstanceViewer { ... }; protected $_toolbar = NULL; protected $_toolbarPosition = &#39;beforeTable&#39;; protected $_edition = TRUE; protected $_form = class Ajax\semantic\html\collections\form\HtmlForm { ... }; protected $_generated = FALSE; protected $content = array (...); protected $wrapContentBefore = &#39;&#39;; protected $wrapContentAfter = &#39;&#39;; protected $_template = &#39;%wrapContentBefore%%content%%wrapContentAfter%&#39;; protected $tagName = &#39;p&#39;; protected $_wrapBefore = array (...); protected $_wrapAfter = array (...); protected $_bsComponent = NULL; protected $_compiled = FALSE; protected $identifier = &#39;frmUser&#39;; protected $_identifier = &#39;frmUser&#39;; protected $_self = class Ajax\semantic\html\collections\form\HtmlForm { ... }; protected $_events = array (...); protected $properties = array (...); protected $_variations = array (...); protected $_states = array (...); protected $_baseClass = NULL }; public $parameter = array (&#39;$id&#39; =&gt; &#39;&lt;required&gt;&#39;, &#39;$name&#39; =&gt; &#39;&lt;required&gt;&#39;, &#39;$value&#39; =&gt; &#39;&lt;required&gt;&#39;, &#39;$caption&#39; =&gt; &#39;&lt;required&gt;&#39;) }</span>, <span>$index = </span><span>&#39;id&#39;</span>, <span>$attributes = </span><span>array (&#39;inputType&#39; =&gt; &#39;hidden&#39;)</span>, <span>$prefix = </span><span>&#39;input&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\semantic\widgets\base\FieldAsTrait.php' bgcolor='#eeeeec'>...\FieldAsTrait.php<b>:</b>179</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>13</td><td bgcolor='#eeeeec' align='center'>0.1120</td><td bgcolor='#eeeeec' align='right'>2459896</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\DataForm->setValueFunction( <span>$index = </span><span>&#39;id&#39;</span>, <span>$callback = </span><span>class Closure { public $static = array (&#39;attributes&#39; =&gt; array (...), &#39;elementCallback&#39; =&gt; class Closure { ... }, &#39;prefix&#39; =&gt; &#39;input&#39;); public $this = class Ajax\semantic\widgets\dataform\DataForm { protected $_model = NULL; protected $_modelInstance = class models\Utilisateur { ... }; protected $_instanceViewer = class Ajax\semantic\widgets\dataform\FormInstanceViewer { ... }; protected $_toolbar = NULL; protected $_toolbarPosition = &#39;beforeTable&#39;; protected $_edition = TRUE; protected $_form = class Ajax\semantic\html\collections\form\HtmlForm { ... }; protected $_generated = FALSE; protected $content = array (...); protected $wrapContentBefore = &#39;&#39;; protected $wrapContentAfter = &#39;&#39;; protected $_template = &#39;%wrapContentBefore%%content%%wrapContentAfter%&#39;; protected $tagName = &#39;p&#39;; protected $_wrapBefore = array (...); protected $_wrapAfter = array (...); protected $_bsComponent = NULL; protected $_compiled = FALSE; protected $identifier = &#39;frmUser&#39;; protected $_identifier = &#39;frmUser&#39;; protected $_self = class Ajax\semantic\html\collections\form\HtmlForm { ... }; protected $_events = array (...); protected $properties = array (...); protected $_variations = array (...); protected $_states = array (...); protected $_baseClass = NULL }; public $parameter = array (&#39;$value&#39; =&gt; &#39;&lt;required&gt;&#39;, &#39;$instance&#39; =&gt; &#39;&lt;required&gt;&#39;, &#39;$index&#39; =&gt; &#39;&lt;required&gt;&#39;) }</span> )</td><td title='C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\semantic\widgets\base\FieldAsTrait.php' bgcolor='#eeeeec'>...\FieldAsTrait.php<b>:</b>98</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>14</td><td bgcolor='#eeeeec' align='center'>0.1120</td><td bgcolor='#eeeeec' align='right'>2459896</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\DataForm->_getIndex( <span>$fieldName = </span><span>&#39;id&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\common\Widget.php' bgcolor='#eeeeec'>...\Widget.php<b>:</b>193</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>15</td><td bgcolor='#eeeeec' align='center'>0.1120</td><td bgcolor='#eeeeec' align='right'>2459896</td><td bgcolor='#eeeeec'><a href='http://www.php.net/function.array-search' target='_new'>array_search</a>
( <span>&#39;id&#39;</span>, <span>&#39;login&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\common\Widget.php' bgcolor='#eeeeec'>...\Widget.php<b>:</b>82</td></tr>
</table></font>
<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: Invalid argument supplied for foreach() in C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\semantic\widgets\base\InstanceViewer.php on line <i>195</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0010</td><td bgcolor='#eeeeec' align='right'>362024</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\xampp\htdocs\homepage\index.php' bgcolor='#eeeeec'>...\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0355</td><td bgcolor='#eeeeec' align='right'>724224</td><td bgcolor='#eeeeec'>micro\controllers\Startup::run( <span>$config = </span><span>array (&#39;siteUrl&#39; =&gt; &#39;http://127.0.0.1/homepage/&#39;, &#39;database&#39; =&gt; array (&#39;dbName&#39; =&gt; &#39;homepage&#39;, &#39;serverName&#39; =&gt; &#39;127.0.0.1&#39;, &#39;port&#39; =&gt; &#39;3306&#39;, &#39;user&#39; =&gt; &#39;root&#39;, &#39;password&#39; =&gt; &#39;&#39;, &#39;cache&#39; =&gt; FALSE), &#39;sessionToken&#39; =&gt; &#39;%temporaryToken%&#39;, &#39;namespaces&#39; =&gt; array (), &#39;templateEngine&#39; =&gt; &#39;micro\\views\\engine\\Twig&#39;, &#39;templateEngineOptions&#39; =&gt; array (&#39;cache&#39; =&gt; FALSE), &#39;test&#39; =&gt; FALSE, &#39;debug&#39; =&gt; FALSE, &#39;di&#39; =&gt; array (&#39;jquery&#39; =&gt; class Closure { ... }), &#39;cacheDirectory&#39; =&gt; &#39;cache/&#39;, &#39;mvcNS&#39; =&gt; array (&#39;models&#39; =&gt; &#39;models&#39;, &#39;controllers&#39; =&gt; &#39;controllers&#39;))</span>, <span>$url = </span><span>&#39;addUser&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\index.php' bgcolor='#eeeeec'>...\index.php<b>:</b>16</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0556</td><td bgcolor='#eeeeec' align='right'>1232912</td><td bgcolor='#eeeeec'>micro\controllers\Router::getRoute( <span>$path = </span><span>&#39;/addUser&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>22</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0557</td><td bgcolor='#eeeeec' align='right'>1233520</td><td bgcolor='#eeeeec'>micro\controllers\Router::getRouteUrlParts( <span>$routeArray = </span><span>array (&#39;path&#39; =&gt; &#39;/addUser&#39;, &#39;details&#39; =&gt; array (&#39;controller&#39; =&gt; &#39;controllers\\UtilisateurController&#39;, &#39;action&#39; =&gt; &#39;addUser&#39;, &#39;parameters&#39; =&gt; array (...), &#39;name&#39; =&gt; &#39;&#39;, &#39;cache&#39; =&gt; TRUE, &#39;duration&#39; =&gt; &#39;&#39;))</span>, <span>$params = </span><span>array ()</span>, <span>$cached = </span><span>TRUE</span>, <span>$duration = </span><span>&#39;&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Router.php' bgcolor='#eeeeec'>...\Router.php<b>:</b>30</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.0557</td><td bgcolor='#eeeeec' align='right'>1233840</td><td bgcolor='#eeeeec'>micro\cache\CacheManager::getRouteCache( <span>$routePath = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span>, <span>$duration = </span><span>&#39;&#39;</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Router.php' bgcolor='#eeeeec'>...\Router.php<b>:</b>60</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>6</td><td bgcolor='#eeeeec' align='center'>0.0560</td><td bgcolor='#eeeeec' align='right'>1233896</td><td bgcolor='#eeeeec'>micro\controllers\Startup::runAsString( <span>$u = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span>, <span>$initialize = </span>???, <span>$finalize = </span>??? )</td><td title='C:\xampp\htdocs\homepage\app\micro\cache\CacheManager.php' bgcolor='#eeeeec'>...\CacheManager.php<b>:</b>46</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>7</td><td bgcolor='#eeeeec' align='center'>0.0560</td><td bgcolor='#eeeeec' align='right'>1250328</td><td bgcolor='#eeeeec'>micro\controllers\Startup::runAction( <span>$u = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span>, <span>$initialize = </span><span>TRUE</span>, <span>$finalize = </span><span>TRUE</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>102</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>8</td><td bgcolor='#eeeeec' align='center'>0.0769</td><td bgcolor='#eeeeec' align='right'>1702720</td><td bgcolor='#eeeeec'>micro\controllers\Startup::callController( <span>$controller = </span><span>class controllers\UtilisateurController { protected $view = class micro\views\View { private $vars = array (...) }; public $jquery = class Ajax\php\micro\JsUtils { protected $params = array (...); protected $injected = NULL; protected $_ui = NULL; protected $_bootstrap = NULL; protected $_semantic = class Ajax\Semantic { ... }; protected $config = NULL; protected $jquery_events = array (...); protected $ajaxTransition = NULL; protected $ajaxLoader = &#39;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&#39;; protected $jquery_code_for_compile = array (...) } }</span>, <span>$u = </span><span>array (0 =&gt; &#39;controllers\\UtilisateurController&#39;, 1 =&gt; &#39;addUser&#39;)</span> )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>95</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>9</td><td bgcolor='#eeeeec' align='center'>0.0770</td><td bgcolor='#eeeeec' align='right'>1702720</td><td bgcolor='#eeeeec'>controllers\UtilisateurController->addUser(  )</td><td title='C:\xampp\htdocs\homepage\app\micro\controllers\Startup.php' bgcolor='#eeeeec'>...\Startup.php<b>:</b>117</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>10</td><td bgcolor='#eeeeec' align='center'>0.1271</td><td bgcolor='#eeeeec' align='right'>2565520</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\DataForm->compile( <span>$js = </span><span>class Ajax\php\micro\JsUtils { protected $params = array (&#39;defer&#39; =&gt; TRUE, &#39;debug&#39; =&gt; TRUE, &#39;ajaxTransition&#39; =&gt; NULL); protected $injected = NULL; protected $_ui = NULL; protected $_bootstrap = NULL; protected $_semantic = class Ajax\Semantic { private $language = NULL; protected $autoCompile = TRUE; protected $components = array (...); protected $htmlComponents = array (...); protected $js = ... }; protected $config = NULL; protected $jquery_events = array (0 =&gt; &#39;bind&#39;, 1 =&gt; &#39;blur&#39;, 2 =&gt; &#39;change&#39;, 3 =&gt; &#39;click&#39;, 4 =&gt; &#39;dblclick&#39;, 5 =&gt; &#39;delegate&#39;, 6 =&gt; &#39;die&#39;, 7 =&gt; &#39;error&#39;, 8 =&gt; &#39;focus&#39;, 9 =&gt; &#39;focusin&#39;, 10 =&gt; &#39;focusout&#39;, 11 =&gt; &#39;hover&#39;, 12 =&gt; &#39;keydown&#39;, 13 =&gt; &#39;keypress&#39;, 14 =&gt; &#39;keyup&#39;, 15 =&gt; &#39;live&#39;, 16 =&gt; &#39;load&#39;, 17 =&gt; &#39;mousedown&#39;, 18 =&gt; &#39;mousseenter&#39;, 19 =&gt; &#39;mouseleave&#39;, 20 =&gt; &#39;mousemove&#39;, 21 =&gt; &#39;mouseout&#39;, 22 =&gt; &#39;mouseover&#39;, 23 =&gt; &#39;mouseup&#39;, 24 =&gt; &#39;off&#39;, 25 =&gt; &#39;on&#39;, 26 =&gt; &#39;one&#39;, 27 =&gt; &#39;ready&#39;, 28 =&gt; &#39;resize&#39;, 29 =&gt; &#39;scroll&#39;, 30 =&gt; &#39;select&#39;, 31 =&gt; &#39;submit&#39;, 32 =&gt; &#39;toggle&#39;, 33 =&gt; &#39;trigger&#39;, 34 =&gt; &#39;triggerHandler&#39;, 35 =&gt; &#39;undind&#39;, 36 =&gt; &#39;undelegate&#39;, 37 =&gt; &#39;unload&#39;); protected $ajaxTransition = NULL; protected $ajaxLoader = &#39;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&lt;span&gt;&lt;/span&gt;&#39;; protected $jquery_code_for_compile = array () }</span>, <span>$view = </span>??? )</td><td title='C:\xampp\htdocs\homepage\app\controllers\UtilisateurController.php' bgcolor='#eeeeec'>...\UtilisateurController.php<b>:</b>54</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>11</td><td bgcolor='#eeeeec' align='center'>0.1271</td><td bgcolor='#eeeeec' align='right'>2565520</td><td bgcolor='#eeeeec'>Ajax\semantic\widgets\dataform\FormInstanceViewer->setInstance( <span>$instance = </span><span>class models\Utilisateur { private $id = NULL; private $login = NULL; private $password = NULL; private $elementsMasques = NULL; private $fondEcran = NULL; private $couleur = NULL; private $ordre = NULL; private $site = NULL; private $statut = NULL; private $lienwebs = NULL; private $moteurs = NULL }</span> )</td><td title='C:\xampp\htdocs\homepage\vendor\phpmv\php-mv-ui\Ajax\semantic\widgets\dataform\DataForm.php' bgcolor='#eeeeec'>...\DataForm.php<b>:</b>35</td></tr>
</table></font>
<form id='frmUser' class="ui form" name="frmUser" novalidate=""><button id='btsubmit' class="ui button green">Validez</button></form><script type="text/javascript" >
// <![CDATA[
window.defer=function (method) {if (window.jQuery) method(); else setTimeout(function() { defer(method) }, 50);};window.defer(function(){$(document).ready(function() {
$( "#btsubmit" ).on("click" , function( event, data ) {
if(event && event.preventDefault) event.preventDefault();

if(event && event.stopPropagation) event.stopPropagation();
$('#frmUser').form('validate form');});$( "#frmUser" ).form({"fields":[],"onSuccess":function(event,fields){if(event && event.preventDefault) event.preventDefault();if(event && event.stopPropagation) event.stopPropagation();url='http://127.0.0.1/homepage//newUser';url=url+'/'+($(this).attr('id')||'');var params=$('#frmUser').serialize();params+='&'+$.param({});var self=this;$("#divUsers").empty();$("#divUsers").prepend('<div class="ajax-loader"><span></span><span></span><span></span><span></span><span></span></div>');$.post(url,params).done(function( data ) {$("#divUsers").html( data );});}});$( "#frmUser" ).form({"fields":[],"onSuccess":function(event,fields){if(event && event.preventDefault) event.preventDefault();if(event && event.stopPropagation) event.stopPropagation();url='http://127.0.0.1/homepage//newUser';url=url+'/'+($(this).attr('id')||'');var params=$('#frmUser').serialize();params+='&'+$.param({});var self=this;$("#divUsers").empty();$("#divUsers").prepend('<div class="ajax-loader"><span></span><span></span><span></span><span></span><span></span></div>');$.post(url,params).done(function( data ) {$("#divUsers").html( data );});}});$( "#frmUser" ).form({"fields":[],"onSuccess":function(event,fields){if(event && event.preventDefault) event.preventDefault();if(event && event.stopPropagation) event.stopPropagation();url='http://127.0.0.1/homepage//newUser';url=url+'/'+($(this).attr('id')||'');var params=$('#frmUser').serialize();params+='&'+$.param({});var self=this;$("#divUsers").empty();$("#divUsers").prepend('<div class="ajax-loader"><span></span><span></span><span></span><span></span><span></span></div>');$.post(url,params).done(function( data ) {$("#divUsers").html( data );});}});})});
// ]]>
</script>

