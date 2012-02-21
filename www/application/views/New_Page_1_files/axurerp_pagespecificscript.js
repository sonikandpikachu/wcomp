
var PageName = 'New Page 1';
var PageId = 'af192b5ef52745858e61874378ef9544'
var PageUrl = 'New_Page_1.html'
document.title = 'New Page 1';
var PageNotes = 
{
"pageName":"New Page 1",
"showNotesNames":"False"}
var $OnLoadVariable = '';

var $CSUM;

var hasQuery = false;
var query = window.location.hash.substring(1);
if (query.length > 0) hasQuery = true;
var vars = query.split("&");
for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    if (pair[0].length > 0) eval("$" + pair[0] + " = decodeURIComponent(pair[1]);");
} 

if (hasQuery && $CSUM != 1) {
alert('Prototype Warning: The variable values were too long to pass to this page.\nIf you are using IE, using Firefox will support more data.');
}

function GetQuerystring() {
    return '#OnLoadVariable=' + encodeURIComponent($OnLoadVariable) + '&CSUM=1';
}

function PopulateVariables(value) {
    var d = new Date();
  value = value.replace(/\[\[OnLoadVariable\]\]/g, $OnLoadVariable);
  value = value.replace(/\[\[PageName\]\]/g, PageName);
  value = value.replace(/\[\[GenDay\]\]/g, '8');
  value = value.replace(/\[\[GenMonth\]\]/g, '2');
  value = value.replace(/\[\[GenMonthName\]\]/g, 'Февраль');
  value = value.replace(/\[\[GenDayOfWeek\]\]/g, 'среда');
  value = value.replace(/\[\[GenYear\]\]/g, '2012');
  value = value.replace(/\[\[Day\]\]/g, d.getDate());
  value = value.replace(/\[\[Month\]\]/g, d.getMonth() + 1);
  value = value.replace(/\[\[MonthName\]\]/g, GetMonthString(d.getMonth()));
  value = value.replace(/\[\[DayOfWeek\]\]/g, GetDayString(d.getDay()));
  value = value.replace(/\[\[Year\]\]/g, d.getFullYear());
  return value;
}

function OnLoad(e) {

}

var u21 = document.getElementById('u21');

var u86 = document.getElementById('u86');
gv_vAlignTable['u86'] = 'center';
var u51 = document.getElementById('u51');

var u102 = document.getElementById('u102');
gv_vAlignTable['u102'] = 'top';
var u25 = document.getElementById('u25');

var u16 = document.getElementById('u16');
gv_vAlignTable['u16'] = 'top';
var u55 = document.getElementById('u55');

var u46 = document.getElementById('u46');
gv_vAlignTable['u46'] = 'top';
var u76 = document.getElementById('u76');
gv_vAlignTable['u76'] = 'center';
var u31 = document.getElementById('u31');

var u77 = document.getElementById('u77');

u77.style.cursor = 'pointer';
if (bIE) u77.attachEvent("onclick", Clicku77);
else u77.addEventListener("click", Clicku77, true);
function Clicku77(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u87','','fade',300);

}

}

var u93 = document.getElementById('u93');
gv_vAlignTable['u93'] = 'center';
var u107 = document.getElementById('u107');
gv_vAlignTable['u107'] = 'top';
var u38 = document.getElementById('u38');
gv_vAlignTable['u38'] = 'top';
var u32 = document.getElementById('u32');
gv_vAlignTable['u32'] = 'top';
var u23 = document.getElementById('u23');

var u62 = document.getElementById('u62');
gv_vAlignTable['u62'] = 'top';
var u53 = document.getElementById('u53');

var u87 = document.getElementById('u87');

var u1 = document.getElementById('u1');
gv_vAlignTable['u1'] = 'center';
var u4 = document.getElementById('u4');
gv_vAlignTable['u4'] = 'top';
var u7 = document.getElementById('u7');

var u66 = document.getElementById('u66');
gv_vAlignTable['u66'] = 'top';
var u104 = document.getElementById('u104');

var u30 = document.getElementById('u30');
gv_vAlignTable['u30'] = 'top';
var u8 = document.getElementById('u8');
gv_vAlignTable['u8'] = 'center';
var u60 = document.getElementById('u60');
gv_vAlignTable['u60'] = 'top';
var u89 = document.getElementById('u89');
gv_vAlignTable['u89'] = 'center';
var u34 = document.getElementById('u34');
gv_vAlignTable['u34'] = 'top';
var u17 = document.getElementById('u17');

var u64 = document.getElementById('u64');
gv_vAlignTable['u64'] = 'top';
var u100 = document.getElementById('u100');

var u19 = document.getElementById('u19');

var u49 = document.getElementById('u49');

var u103 = document.getElementById('u103');
gv_vAlignTable['u103'] = 'top';
var u79 = document.getElementById('u79');

var u81 = document.getElementById('u81');

var u97 = document.getElementById('u97');

var u85 = document.getElementById('u85');

u85.style.cursor = 'pointer';
if (bIE) u85.attachEvent("onclick", Clicku85);
else u85.addEventListener("click", Clicku85, true);
function Clicku85(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u91','','none',300);

}

}

var u11 = document.getElementById('u11');

var u41 = document.getElementById('u41');

var u108 = document.getElementById('u108');

var u71 = document.getElementById('u71');

var u15 = document.getElementById('u15');

var u45 = document.getElementById('u45');

var u36 = document.getElementById('u36');
gv_vAlignTable['u36'] = 'top';
var u75 = document.getElementById('u75');

var u58 = document.getElementById('u58');
gv_vAlignTable['u58'] = 'top';
var u37 = document.getElementById('u37');

var u2 = document.getElementById('u2');

var u92 = document.getElementById('u92');

u92.style.cursor = 'pointer';
if (bIE) u92.attachEvent("onclick", Clicku92);
else u92.addEventListener("click", Clicku92, true);
function Clicku92(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u91','hidden','none',500);

}

}

var u83 = document.getElementById('u83');

var u95 = document.getElementById('u95');
gv_vAlignTable['u95'] = 'center';
var u22 = document.getElementById('u22');
gv_vAlignTable['u22'] = 'top';
var u13 = document.getElementById('u13');
gv_vAlignTable['u13'] = 'top';
var u52 = document.getElementById('u52');
gv_vAlignTable['u52'] = 'top';
var u43 = document.getElementById('u43');

var u0 = document.getElementById('u0');

var u3 = document.getElementById('u3');
gv_vAlignTable['u3'] = 'center';
var u27 = document.getElementById('u27');

var u47 = document.getElementById('u47');

var u68 = document.getElementById('u68');
gv_vAlignTable['u68'] = 'top';
var u90 = document.getElementById('u90');
gv_vAlignTable['u90'] = 'top';
var u73 = document.getElementById('u73');

var u84 = document.getElementById('u84');
gv_vAlignTable['u84'] = 'center';
var u20 = document.getElementById('u20');
gv_vAlignTable['u20'] = 'top';
var u50 = document.getElementById('u50');
gv_vAlignTable['u50'] = 'top';
var u106 = document.getElementById('u106');
gv_vAlignTable['u106'] = 'top';
var u28 = document.getElementById('u28');
gv_vAlignTable['u28'] = 'top';
var u24 = document.getElementById('u24');
gv_vAlignTable['u24'] = 'top';
var u54 = document.getElementById('u54');
gv_vAlignTable['u54'] = 'top';
var u99 = document.getElementById('u99');
gv_vAlignTable['u99'] = 'top';
var u39 = document.getElementById('u39');

var u69 = document.getElementById('u69');

var u78 = document.getElementById('u78');
gv_vAlignTable['u78'] = 'center';
var u94 = document.getElementById('u94');

u94.style.cursor = 'pointer';
if (bIE) u94.attachEvent("onclick", Clicku94);
else u94.addEventListener("click", Clicku94, true);
function Clicku94(e)
{
windowEvent = e;


if (true) {

                                DisableImageWidget('u94');
}

}

var u6 = document.getElementById('u6');
gv_vAlignTable['u6'] = 'center';
var u96 = document.getElementById('u96');
gv_vAlignTable['u96'] = 'top';
var u61 = document.getElementById('u61');

var u91 = document.getElementById('u91');

var u35 = document.getElementById('u35');

var u26 = document.getElementById('u26');
gv_vAlignTable['u26'] = 'top';
var u65 = document.getElementById('u65');

var u56 = document.getElementById('u56');
gv_vAlignTable['u56'] = 'top';
var u105 = document.getElementById('u105');
gv_vAlignTable['u105'] = 'center';
var u109 = document.getElementById('u109');
gv_vAlignTable['u109'] = 'center';
var u82 = document.getElementById('u82');
gv_vAlignTable['u82'] = 'center';
var u5 = document.getElementById('u5');

var u12 = document.getElementById('u12');
gv_vAlignTable['u12'] = 'center';
var u9 = document.getElementById('u9');

var u42 = document.getElementById('u42');
gv_vAlignTable['u42'] = 'top';
var u33 = document.getElementById('u33');

var u72 = document.getElementById('u72');
gv_vAlignTable['u72'] = 'top';
var u63 = document.getElementById('u63');

var u18 = document.getElementById('u18');
gv_vAlignTable['u18'] = 'top';
var u48 = document.getElementById('u48');
gv_vAlignTable['u48'] = 'top';
var u67 = document.getElementById('u67');

var u88 = document.getElementById('u88');

u88.style.cursor = 'pointer';
if (bIE) u88.attachEvent("onclick", Clicku88);
else u88.addEventListener("click", Clicku88, true);
function Clicku88(e)
{
windowEvent = e;


if (true) {

	SetPanelVisibility('u87','hidden','none',500);

}

}

var u57 = document.getElementById('u57');

var u101 = document.getElementById('u101');
gv_vAlignTable['u101'] = 'center';
var u10 = document.getElementById('u10');
gv_vAlignTable['u10'] = 'center';
var u40 = document.getElementById('u40');
gv_vAlignTable['u40'] = 'top';
var u70 = document.getElementById('u70');
gv_vAlignTable['u70'] = 'top';
var u14 = document.getElementById('u14');

var u44 = document.getElementById('u44');
gv_vAlignTable['u44'] = 'top';
var u74 = document.getElementById('u74');
gv_vAlignTable['u74'] = 'top';
var u29 = document.getElementById('u29');

var u59 = document.getElementById('u59');

var u98 = document.getElementById('u98');
gv_vAlignTable['u98'] = 'center';
var u80 = document.getElementById('u80');
gv_vAlignTable['u80'] = 'center';
if (window.OnLoad) OnLoad();
