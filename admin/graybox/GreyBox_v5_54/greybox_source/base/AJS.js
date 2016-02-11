/*
Last Modified: 02/03/09 20:10:29

AJS JavaScript library
    A very small library with a lot of functionality
AUTHOR
    4mir Salihefendic (http://amix.dk) - amix@amix.dk
LICENSE
    Copyright (c) 2006 amix. All rights reserved.
    Copyright (c) 2005 Bob Ippolito. All rights reserved.
    http://www.opensource.org/licenses/mit-license.php
VERSION
    4.31
SITE
    http://orangoo.com/AmiNation/AJS
**/
if(!window.AJS) {
var AJS = {
    BASE_URL: "",
    ajaxErrorHandler: null,

////
// General accessor functions
////
    getQueryArgument: function(var_name) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if (pair[0] == var_name) {
                return pair[1];
            }
        }
        return null;
    },

    _agent: navigator.userAgent.toLowerCase(),
    _agent_version: navigator.productSub,

    isIe: function() {
        return (AJS._agent.indexOf("msie") != -1 && AJS._agent.indexOf("opera") == -1);
    },
    isIe8: function() {
        return AJS._agent.indexOf("msie 8") != -1;
    },
    isSafari: function(all) {
        if(all)
            return AJS._agent.indexOf("khtml");

        return (AJS._agent.indexOf("khtml") != -1 &&
                AJS._agent.match(/3\.\d\.\d safari/) == null);
    },
    isOpera: function() {
        return AJS._agent.indexOf("opera") != -1;
    },
    isMozilla: function() {
        return (AJS._agent.indexOf("gecko") != -1 && AJS._agent_version >= 20030210);
    },
    isMac: function() {
        return (AJS._agent.indexOf('macintosh') != -1);
    },
    isCamino: function() {
        return (AJS._agent.indexOf("camino") != -1);
    },


////
// Array functions
////
    //Shortcut: AJS.$A
    createArray: function(v) {
        if(AJS.isArray(v) && !AJS.isString(v))
            return v;
        else if(!v)
            return [];
        else
            return [v];
    },

    forceArray: function(args) {
        var r = [];
        for(var i = 0; i < args.length; i++)
            r.push(args[i]);
        return r;
    },

    join: function(delim, list) {
        try {
            return list.join(delim);
        }
        catch(e) {
            var r = list[0] || '';
            AJS.map(list, function(elm) {
                r += delim + elm;
            }, 1);
            return r + '';
        }
    },

    isIn: function(elm, list) {
        var i = AJS.getIndex(elm, list);
        if(i != -1)
            return true;
        else
            return false;
    },

    getIndex: function(elm, list/*optional*/, eval_fn) {
        for(var i=0; i < list.length; i++)
            if(eval_fn && eval_fn(list[i]) || elm == list[i])
                return i;
        return -1;
    },

    getFirst: function(list) {
        if(list.length > 0)
            return list[0];
        else
            return null;
    },

    getLast: function(list) {
        if(list.length > 0)
            return list[list.length-1];
        else
            return null;
    },

    getRandom: function(list) {
        return list[Math.floor(Math.random()*list.length)];
    },

    update: function(l1, l2) {
        for(var i in l2)
            l1[i] = l2[i];
        return l1;
    },

    flattenList: function(list) {
        var has_list = false;
        var new_list = [];

        for(var i=0; i < list.length; i++) {
            var elm = list[i];
            if(AJS.isArray(elm)) {
                has_list = true;
                break;
            }

            if(elm != null)
                new_list.push(elm);
        }

        if(!has_list)
            return new_list;

        var r = [];
        var _flatten = function(r, l) {
            AJS.map(l, function(o) {
                if(o == null) {
                }
                else if (AJS.isArray(o))
                    _flatten(r, o);
                else
                    r.push(o);
            });
        }
        _flatten(r, list);
        return r;
    },

    //[[elm1, ..., elmN], valX] -> [elm1, ..., elmN, valX]
    flattenElmArguments: function(args) {
        return AJS.flattenList(AJS.forceArray(args));
    },


////
// Functional programming
////
    map: function(list, fn,/*optional*/ start_index, end_index) {
        var i = 0, l = list.length;
        if(start_index)
             i = start_index;
        if(end_index)
             l = end_index;
        for(i; i < l; i++) {
            var val = fn(list[i], i);
            if(val != undefined)
                return val;
        }
    },

    rmap: function(list, fn) {
        var i = list.length-1, l = 0;
        for(i; i >= l; i--) {
            var val = fn.apply(null, [list[i], i]);
            if(val != undefined)
                return val;
        }
    },

    filter: function(list, fn, /*optional*/ start_index, end_index) {
        var r = [];
        AJS.map(list, function(elm) {
            if(fn(elm))
                r.push(elm);
        }, start_index, end_index);
        return r;
    },

    partial: function(fn) {
        var args = AJS.$FA(arguments);
        args.shift();
        return function() {
            args = args.concat(AJS.$FA(arguments));
            return fn.apply(window, args);
        }
    },


////
// DOM functions
////

//--- Accessors ----------------------------------------------
    //Shortcut: AJS.$
    getElement: function(id) {
        if(AJS.isString(id) || AJS.isNumber(id))
            return document.getElementById(id);
        else
            return id;
    },

    //Shortcut: AJS.$$
    getElements: function(/*id1, id2, id3*/) {
        var args = AJS.flattenElmArguments(arguments);
        var elements = new Array();
            for (var i = 0; i < args.length; i++) {
                var element = AJS.getElement(args[i]);
                elements.push(element);
            }
            return elements;
    },

    //Shortcut: AJS.$bytc
    getElementsByTagAndClassName: function(tag_name, class_name, /*optional*/ parent, first_match) {
        var class_elements = [];

        if(!AJS.isDefined(parent))
            parent = document;
        if(!AJS.isDefined(tag_name))
            tag_name = '*';

        var i, j;

        if(class_name && document.getElementsByClassName) {
            var els = parent.getElementsByClassName(class_name);

            if(tag_name == '*') {
                class_elements = AJS.forceArray(els);
            }
            else {
                var els_len = els.length;
                for (i = 0; i < els_len; i++) {
                    if(els[i].nodeName.toLowerCase() == tag_name) {
                        class_elements.push(els[i]);
                    }
                }
            }
        }
        else {
            var els = parent.getElementsByTagName(tag_name);

            if(!class_name) {
                class_elements = AJS.forceArray(els);
            }
            else {
                var els_len = els.length;
                var pattern = new RegExp("(^|\\s)" + class_name + "(\\s|$)");
                for (i = 0; i < els_len; i++) {
                    if (pattern.test(els[i].className) || !class_name) {
                        class_elements.push(els[i]);
                    }
                }
            }
        }

        if(first_match)
            return class_elements[0];
        else
            return class_elements;
    },

    nodeName: function(elm) {
        return elm.nodeName.toLowerCase();
    },

    _nodeWalk: function(elm, tag_name, class_name, fn_next_elm) {
        var p = fn_next_elm(elm);

        var checkFn;
        if(tag_name && class_name) {
            checkFn = function(p) {
                return AJS.nodeName(p) == tag_name && AJS.hasClass(p, class_name);
            }
        }
        else if(tag_name) {
            checkFn = function(p) { return AJS.nodeName(p) == tag_name; }
        }
        else {
            checkFn = function(p) { return AJS.hasClass(p, class_name); }
        }

        if(checkFn(elm))
            return elm;

        while(p) {
            if(checkFn(p))
                return p;
            p = fn_next_elm(p);
        }
        return null;
    },

    //Shortcut: AJS.$gp
    getParentBytc: function(elm, tag_name, class_name) {
        return AJS._nodeWalk(elm, tag_name, class_name, function(m) { if(m) return m.parentNode; });
    },

    //Shortcut: AJS.$gc
    getChildBytc: function(elm, tag_name, class_name) {
        var elms = AJS.$bytc(tag_name, class_name, elm);
        if(elms.length > 0)
            return elms[0];
        else
            return null;
    },

    hasParent: function(elm, parent_to_consider, max_look_up) {
        if(elm == parent_to_consider)
            return true;
        if(max_look_up == 0)
            return false;
        return AJS.hasParent(elm.parentNode, parent_to_consider, max_look_up-1);
    },

    getPreviousSiblingBytc: function(elm, tag_name, class_name) {
        return AJS._nodeWalk(elm, tag_name, class_name, function(m) { return m.previousSibling; });
    },

    getNextSiblingBytc: function(elm, tag_name, class_name) {
        return AJS._nodeWalk(elm, tag_name, class_name, function(m) { return m.nextSibling; });
    },

    getBody: function() {
        return AJS.$bytc('body')[0]
    },


//--- Form related ----------------------------------------------
    //Shortcut: AJS.$f
    getFormElement: function(form, name) {
        form = AJS.$(form);
        var r = null;
        AJS.map(form.elements, function(elm) {
            if(elm.name && elm.name == name)
                r = elm;
        });
        if(r)
            return r;

        AJS.map(AJS.$bytc('select', null, form), function(elm) {
            if(elm.name && elm.name == name)
                r = elm;
        });
        return r;
    },

    getSelectValue: function(select) {
        var select = AJS.$(select);
        return select.options[select.selectedIndex].value;
    },


//--- DOM related ----------------------------------------------
    //Shortcut: AJS.DI
    documentInsert: function(elm) {
        if(typeof(elm) == 'string')
            elm = AJS.HTML2DOM(elm);
        document.write('<span id="dummy_holder"></span>');
        AJS.swapDOM(AJS.$('dummy_holder'), elm);
    },

    //Shortcut: AJS.ACN
    appendChildNodes: function(elm/*, elms...*/) {
        if(arguments.length >= 2) {
            AJS.map(arguments, function(n) {
                if(AJS.isString(n))
                    n = AJS.TN(n);
                if(AJS.isDefined(n))
                    elm.appendChild(n);
            }, 1);
        }
        return elm;
    },

    appendToTop: function(elm/*, elms...*/) {
        var args = AJS.flattenElmArguments(arguments).slice(1);
        if(args.length >= 1) {
            var first_child = elm.firstChild;
            if(first_child) {
                while(true) {
                    var t_elm = args.shift();
                    if(t_elm)
                        AJS.insertBefore(t_elm, first_child);
                    else
                        break;
                }
            }
            else {
                AJS.ACN.apply(null, arguments);
            }
        }
        return elm;
    },

    //Shortcut: AJS.RCN
    replaceChildNodes: function(elm/*, elms...*/) {
        var child;
        while ((child = elm.firstChild))
            AJS.swapDOM(child, null);

        if (arguments.length < 2)
            return elm;
        else
            return AJS.appendChildNodes.apply(null, arguments);
        return elm;
    },

    insertAfter: function(elm, reference_elm) {
        reference_elm.parentNode.insertBefore(elm, reference_elm.nextSibling);
        return elm;
    },

    insertBefore: function(elm, reference_elm) {
        reference_elm.parentNode.insertBefore(elm, reference_elm);
        return elm;
    },

    swapDOM: function(dest, src) {
        dest = AJS.getElement(dest);
        var parent = dest.parentNode;
        if (src) {
            src = AJS.getElement(src);
            parent.replaceChild(src, dest);
        } else {
            parent.removeChild(dest);
        }

        return src;
    },

    removeElement: function(/*elm1, elm2...*/) {
        var args = AJS.flattenElmArguments(arguments);
        try {
            AJS.map(args, function(elm) { 
                if($(elm)) 
                    AJS.swapDOM(elm, null); 
            });
        }
        catch(e) {
        }
    },

    createDOM: function(name, attrs) {
        var i=0, attr;
        var elm = document.createElement(name);

        var first_attr = attrs[0];
        if(AJS.isDict(attrs[i])) {
            for(k in first_attr) {
                attr = first_attr[k];
                if(k == 'style' || k == 's')
                    elm.style.cssText = attr;
                else if(k == 'c' || k == 'class' || k == 'className')
                    elm.className = attr;
                else {
                    elm.setAttribute(k, attr);
                }
            }
            i++;
        }

        if(first_attr == null)
            i = 1;

        for(var j=i; j < attrs.length; j++) {
            var attr = attrs[j];
            if(attr) {
                var type = typeof(attr);
                if(type == 'string' || type == 'number')
                    attr = AJS.TN(attr);
                elm.appendChild(attr);
            }
        }

        return elm;
    },

    _createDomShortcuts: function() {
        var elms = [
                "ul", "li", "td", "tr", "th",
                "tbody", "table", "input", "span", "b",
                "a", "div", "img", "button", "h1",
                "h2", "h3", "h4", "h5", "h6", "br", "textarea", "form",
                "p", "select", "option", "optgroup", "iframe", "script",
                "center", "dl", "dt", "dd", "small",
                "pre", 'i', 'label', 'thead'
        ];
        var extends_ajs = function(elm) {
            AJS[elm.toUpperCase()] = function() {
                return AJS.createDOM.apply(null, [elm, arguments]); 
            };
        }
        AJS.map(elms, extends_ajs);
        AJS.TN = function(text) { return document.createTextNode(text) };
    },
    
    setHTML: function(/*elms..., html*/) {
        var args = AJS.flattenElmArguments(arguments);
        var html = args.pop();
        AJS.map(args, function(elm) { 
            if(elm)
                elm.innerHTML = html;
        });
        return args[0];
    },


//--- CSS related ----------------------------------------------
    //Shortcut: AJS.$sv
    setVisibility: function(/*elms..., val*/) {
        var args = AJS.flattenElmArguments(arguments);
        var val = args.pop() && 'visible' || 'hidden';
        AJS.setStyle(args, 'visibility', val);
    },

    showElement: function(/*elms...*/) {
        AJS.setStyle(AJS.flattenElmArguments(arguments), 'display', '');
    },

    hideElement: function(elm) {
        AJS.setStyle(AJS.flattenElmArguments(arguments), 'display', 'none');
    },

    isElementHidden: function(elm) {
        return ((elm.style.display == "none") || (elm.style.visibility == "hidden"));
    },

    isElementShown: function(elm) {
        return !AJS.isElementHidden(elm);
    },

    setStyle: function(/*elm1, elm2..., {prop: value}*/) {
        var args = AJS.flattenElmArguments(arguments);
        var value = args.pop();
        var num_styles = ['top', 'left', 'right', 'width', 'height'];
        if(AJS.isObject(value)) {
            AJS.map(args, function(elm) { 
                AJS.map(AJS.keys(value), function(prop) {
                    var css_dim = value[prop];
                    if(AJS.isIn(prop, num_styles))
                        css_dim = AJS.isString(css_dim) && css_dim || css_dim + 'px';

                    elm.style[prop] = css_dim;
                });
            });
        }
        else {
            var property = args.pop();
            AJS.map(args, function(elm) { 
                if(AJS.isIn(property, num_styles))
                    value = AJS.isString(value) && value || value + 'px';
                elm.style[property] = value;
            });
        }
    },

    __cssDim: function(args, property) {
        var args = AJS.$FA(args);
        args.splice(args.length-1, 0, property);
        AJS.setStyle.apply(null, args);
    },

    setWidth: function(/*elm1, elm2..., width*/) { 
        return AJS.__cssDim(arguments, 'width');
    },
    setHeight: function(/*elm1, elm2..., height*/) {
        return AJS.__cssDim(arguments, 'height');
    },
    setLeft: function(/*elm1, elm2..., left*/) {
        return AJS.__cssDim(arguments, 'left');
    },
    setRight: function(/*elm1, elm2..., left*/) {
        return AJS.__cssDim(arguments, 'right');
    },
    setTop: function(/*elm1, elm2..., top*/) {
        return AJS.__cssDim(arguments, 'top');
    },

    setClass: function(/*elm1, elm2..., className*/) {
        var args = AJS.flattenElmArguments(arguments);
        var c = args.pop();
        AJS.map(args, function(elm) { elm.className = c});
    },
    addClass: function(/*elm1, elm2..., className*/) {
        var args = AJS.flattenElmArguments(arguments);
        var cls = args.pop();
        var add_class = function(o) {
            if(!new RegExp("(^|\\s)" + cls + "(\\s|$)").test(o.className))
                o.className += (o.className ? " " : "") + cls;
        };
        AJS.map(args, function(elm) { add_class(elm); });
    },
    hasClass: function(elm, cls) {
        if(!elm || !elm.className)
            return false;
        var e_cls = elm.className;
        return (e_cls.length > 0 && (e_cls == cls ||
                new RegExp("(^|\\s)" + cls + "(\\s|$)").test(e_cls)));
    },
    removeClass: function(/*elm1, elm2..., className*/) {
        var args = AJS.flattenElmArguments(arguments);
        var cls = args.pop();
        var rm_class = function(o) {
            o.className = o.className.replace(new RegExp("(^|\\s)" + cls, 'g'), "");
        };
        AJS.map(args, function(elm) { rm_class(elm); });
    },

    setOpacity: function(elm, p) {
        if(p == 1) {
            elm.style.opacity = 1;
            elm.style.filter = "";
        }
        else {
            elm.style.opacity = p;
            elm.style.filter = "alpha(opacity="+ p*100 +")";
        }
    },


//--- Misc ----------------------------------------------
    HTML2DOM: function(html,/*optional*/ first_child) {
        var d = AJS.DIV();
        d.innerHTML = html;
        if(first_child)
            return d.childNodes[0];
        else
            return d;
    },

    preloadImages: function(/*img_src1, ..., img_srcN*/) {
        AJS.AEV(window, 'load', AJS.$p(function(args) {
            AJS.map(args, function(src) {
                var pic = new Image();
                pic.src = src;
            });
        }, arguments));
    },

    RND: function(tmpl, ns, scope) {
         scope = scope || window;
         var fn = function(w, g) {
             g = g.split("|");
             var cnt = ns[g[0]];
             for(var i=1; i < g.length; i++)
                 cnt = scope[g[i]](cnt);
             if(cnt == '')
                 return '';
             if(cnt == 0 || cnt == -1)
                 cnt += '';
             return cnt || w;
         };
         return tmpl.replace(/%\(([A-Za-z0-9_|.]*)\)/g, fn);
    }, 


////
// Ajax functions
////
    getXMLHttpRequest: function() {
        var try_these = [
            function () { return new XMLHttpRequest(); },
            function () { return new ActiveXObject('Msxml2.XMLHTTP'); },
            function () { return new ActiveXObject('Microsoft.XMLHTTP'); },
            function () { return new ActiveXObject('Msxml2.XMLHTTP.4.0'); },
            function () { throw "Browser does not support XMLHttpRequest"; }
        ];
        for (var i = 0; i < try_these.length; i++) {
            var func = try_these[i];
            try {
                return func();
            } catch (e) {
            }
        }
    },

    getRequest: function(url, method) {
        var req = AJS.getXMLHttpRequest();

        if(url.match(/^https?:\/\//) == null) {
            if(AJS.BASE_URL != '') {
                if(AJS.BASE_URL.lastIndexOf('/') != AJS.BASE_URL.length-1)
                    AJS.BASE_URL += '/';
                url = AJS.BASE_URL + url;
            }
        }

        if(!method)
            method = "POST";

        return new AJSDeferred(req, method, url);
    },

    serializeJSON: function(o) {
        var objtype = typeof(o);
        if (objtype == "undefined") {
            return "null";
        } else if (objtype == "number" || objtype == "boolean") {
            return o + "";
        } else if (o === null) {
            return "null";
        }
        if (objtype == "string") {
            return AJS._reprString(o);
        }
        if(objtype == 'object' && o.getFullYear) {
            return AJS._reprDate(o);
        }
        var me = arguments.callee;
        if (objtype != "function" && typeof(o.length) == "number") {
            var res = [];
            for (var i = 0; i < o.length; i++) {
                var val = me(o[i]);
                if (typeof(val) != "string") {
                    val = "undefined";
                }
                res.push(val);
            }
            return "[" + res.join(",") + "]";
        }
        // it's a function with no adapter, bad
        if (objtype == "function")
            return null;
        res = [];
        for (var k in o) {
            var useKey;
            if (typeof(k) == "number") {
                useKey = '"' + k + '"';
            } else if (typeof(k) == "string") {
                useKey = AJS._reprString(k);
            } else {
                // skip non-string or number keys
                continue;
            }
            val = me(o[k]);
            if (typeof(val) != "string") {
                // skip non-serializable values
                continue;
            }
            res.push(useKey + ":" + val);
        }
        return "{" + res.join(",") + "}";
    },

    loadJSON: function(url, type, debug) {
        var d = AJS.getRequest(url, type);
        var eval_req = function(data, req) {
            var text = req.responseText;
            if(text == "Error")
                d.errback(req);
            else
                return AJS.evalTxt(text);
        };
        d.addCallback(eval_req);
        return d;
    },

    evalTxt: function(txt) {
        try {
            return eval('('+ txt + ')');
        }
        catch(e) {
            return eval(txt);
        }
    },

    evalScriptTags: function(html) {
        var script_data = html.match(/<script.*?>((\n|\r|.)*?)<\/script>/g);
        if(script_data != null) {
            for(var i=0; i < script_data.length; i++) {
                var script_only = script_data[i].replace(/<script.*?>/g, "");
                script_only = script_only.replace(/<\/script>/g, "");
                eval(script_only);
            }
        }
    },

    encodeArguments: function(data) {
        var post_data = [];
        for(k in data)
            post_data.push(k + "=" + AJS.urlencode(data[k]));
        return post_data.join("&");
    },

    _reprString: function(o) {
        return ('"' + o.replace(/(["\\])/g, '\\$1') + '"'
        ).replace(/[\f]/g, "\\f"
        ).replace(/[\b]/g, "\\b"
        ).replace(/[\n]/g, "\\n"
        ).replace(/[\t]/g, "\\t"
        ).replace(/[\r]/g, "\\r");
    },

    _reprDate: function(date) {
        var year = date.getUTCFullYear();
        var dd = date.getUTCDate();
        var mm = date.getUTCMonth()+1;

        var leadingZero = function(nr) {
            if (nr < 10) nr = "0" + nr;
            return nr;
        }

        return '"' + year + '-' + mm + '-' + dd + 'T' + leadingZero(date.getUTCHours()) + ':' + leadingZero(date.getUTCMinutes()) + ':' + leadingZero(date.getUTCSeconds()) + '"';
    },


////
// Position and size
////
    getMousePos: function(e) {
        var posx = 0;
        var posy = 0;
        if (!e) var e = window.event;
        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        }
        else if (e.clientX || e.clientY) {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }
        return {x: posx, y: posy};
    },

    getScrollTop: function() {
        //From: http://www.quirksmode.org/js/doctypes.html
        var t;
        if (document.documentElement && document.documentElement.scrollTop)
                t = document.documentElement.scrollTop;
        else if (document.body)
                t = document.body.scrollTop;
        return t;
    },

    //Shortcut: AJS.$AP
    absolutePosition: function(elm) {
        if(!elm)
            return {x: 0, y: 0};

        if(elm.scrollLeft)
            return {x: elm.scrollLeft, y: elm.scrollTop};
        else if(elm.clientX)
            return {x: elm.clientX, y: elm.clientY};

        var posObj = {'x': elm.offsetLeft, 'y': elm.offsetTop};

        if(elm.offsetParent) {
            var next = elm.offsetParent;
            while(next) {
                posObj.x += next.offsetLeft;
                posObj.y += next.offsetTop;
                next = next.offsetParent;
            }
        }
        // safari bug
        if (AJS.isSafari() && elm.style.position == 'absolute' ) {
            posObj.x -= document.body.offsetLeft;
            posObj.y -= document.body.offsetTop;
        }
        return posObj;
    },

    getWindowSize: function(doc) {
        doc = doc || document;
        var win_w, win_h;
        if (self.innerHeight) {
            win_w = self.innerWidth;
            win_h = self.innerHeight;
        } else if (doc.documentElement && doc.documentElement.clientHeight) {
            win_w = doc.documentElement.clientWidth;
            win_h = doc.documentElement.clientHeight;
        } else if (doc.body) {
            win_w = doc.body.clientWidth;
            win_h = doc.body.clientHeight;
        }
        return {'w': win_w, 'h': win_h};
    },

    isOverlapping: function(elm1, elm2) {
        var pos_elm1 = AJS.absolutePosition(elm1);
        var pos_elm2 = AJS.absolutePosition(elm2);

        var top1 = pos_elm1.y;
        var left1 = pos_elm1.x;
        var right1 = left1 + elm1.offsetWidth;
        var bottom1 = top1 + elm1.offsetHeight;
        var top2 = pos_elm2.y;
        var left2 = pos_elm2.x;
        var right2 = left2 + elm2.offsetWidth;
        var bottom2 = top2 + elm2.offsetHeight;
        var getSign = function(v) {
            if(v > 0) return "+";
            else if(v < 0) return "-";
            else return 0;
        }

        if ((getSign(top1 - bottom2) != getSign(bottom1 - top2)) &&
                (getSign(left1 - right2) != getSign(right1 - left2)))
            return true;
        return false;
    },


////
// Events
////
    getEventElm: function(e) {
        if(e && !e.type && !e.keyCode)
            return e
        var targ;
        if (!e) var e = window.event;
        if (e.target) 
            targ = e.target;
        else if (e.srcElement) 
            targ = e.srcElement;
        if (targ && targ.nodeType == 3) // defeat Safari bug
            targ = targ.parentNode;
        return targ;
    },

    setEventKey: function(e) {
        if(!e)
            e = window.event;

        e.key = e.keyCode ? e.keyCode : e.charCode;

        e.ctrl = e.ctrlKey;
        e.alt = e.altKey;
        e.meta = e.metaKey;
        e.shift = e.shiftKey;
    },

    onEvent: function(elms, type, handler, listen_once) {
        //Reset the current
        elms = AJS.$A(elms);
        AJS.map(elms, function(elm) {
            if(elm.events)
                elm.events[type] = {};
        });

        return AJS.AEV(elms, type, handler, listen_once);
    },

    //--- window.onload optimization ----------------------------------------------
    ready_bound: false,
    is_ready: false,
    bindReady: function() {
        if ( AJS.ready_bound ) return;
        AJS.ready_bound = true;

        // Mozilla, Opera and webkit nightlies currently support this event
        if ( document.addEventListener ) {
            // Use the handy event callback
            document.addEventListener( "DOMContentLoaded", function(){
                document.removeEventListener( "DOMContentLoaded", arguments.callee, false );
                AJS.ready();
            }, false );

        // If IE event model is used
        } else if ( document.attachEvent ) {
            // ensure firing before onload,
            // maybe late but safe also for iframes
            document.attachEvent("onreadystatechange", function(){
                if ( document.readyState === "complete" ) {
                    document.detachEvent( "onreadystatechange", arguments.callee );
                    AJS.ready();
                }
            });

            // If IE and not an iframe
            // continually check to see if the document is ready
            if ( document.documentElement.doScroll && window == window.top ) (function(){
                if ( AJS.is_ready ) return;

                try {
                    // If IE is used, use the trick by Diego Perini
                    // http://javascript.nwbox.com/IEContentLoaded/
                    document.documentElement.doScroll("left");
                } catch( error ) {
                    setTimeout( arguments.callee, 0 );
                    return;
                }

                // and execute any waiting functions
                AJS.ready();
            })();
        }

        // A fallback to window.onload, that will always work
        AJS.AEV( window, "load", AJS.ready );
    },

    ready_list: [],
    ready: function(fn) {
        if(AJS.is_ready)
            return ;

        AJS.is_ready = true;
        AJS.map(AJS.ready_list, function(fn) {
            fn.call(window);
        });
        AJS.ready_list = [];
    },

    _f_guid: 0,
    _wipe_guid: 0,

    //Shortcut: AJS.AEV
    addEventListener: function(elms, types, handler, listen_once) {
        elms = AJS.$A(elms);
        types = AJS.$A(types);

        AJS.map(elms, function(elm) {
            if(listen_once)
                handler.listen_once = true;
                
            if (!handler.$f_guid) 
                handler.$f_guid = AJS._f_guid++;

            if (!elm.events) 
                elm.events = {};
            
            AJS.map(types, function(type) {
                var handlers = elm.events[type];

                if(elm == window && type == 'load') {
                    AJS.ready_list.push( handler );
                }
                else {
                    if(type == 'lazy_load') {
                        type = 'load';
                    }

                    if (!handlers) {
                        handlers = elm.events[type] = {};

                        if(elm["on" + type])
                            handlers[0] = elm["on" + type];
                    }
                    
                    if(!elm._wipe_guid) {
                        elm._wipe_guid = AJS._wipe_guid++;
                    }

                    handlers[handler.$f_guid] = handler;
                    elm["on" + type] = AJS.handleEvent;
                }
            });

            elm = null;
        });
    },

    handleEvent: function(event) {
         var me = this;

         event = event || window.event;

         if(!event)
             return ;

         if(!event.ctrl && event.type.indexOf('key') != -1)
             AJS.setEventKey(event);

         var handlers = this.events[event.type];

         var handlers_to_delete = [];
         var res = true;
         for (var i in handlers) {
             var handler = this.$$handleEvent = handlers[i];

             if(handler == AJS.handleEvent)
                 continue;

             res = handler(event);
             if(handler.listen_once)
                 handlers_to_delete.push(handler);
         }

        if(handlers_to_delete.length > 0)
            AJS.map(handlers_to_delete, function(handler) {
                delete me.events[event.type][handler.$f_guid];
            });

        return res;
    },

    //Shortcut: AJS.REV
    removeEventListener: function(elms, type, handler) {
        elms = AJS.$A(elms);
        map(elms, function(elm) {
            if (elm.events && elm.events[type]) {
                delete elm.events[type][handler.$f_guid];
            }
        });
    },

    //Shortcut: AJS.$b
    bind: function(fn, scope, /*optional*/ extra_args) {
        fn._cscope = scope;
        return AJS._getRealScope(fn, extra_args);
    },

    bindMethods: function(self) {
        for (var k in self) {
            var func = self[k];
            if (typeof(func) == 'function') {
                self[k] = AJS.$b(func, self);
            }
        }
    },

    preventDefault: function(e) {
        if(AJS.isIe()) 
            window.event.returnValue = false;
        else {
            e.preventDefault();
        }
    },

    _listenOnce: function(elm, type, fn) {
        var r_fn = function() {
            AJS.removeEventListener(elm, type, r_fn);
            fn(arguments);
        }
        return r_fn;
    },

    _getRealScope: function(fn, /*optional*/ extra_args) {
        extra_args = AJS.$A(extra_args);
        var scope = fn._cscope || window;

        return function() {
            try {
                var args = AJS.$FA(arguments).concat(extra_args);
                return fn.apply(scope, args);
            }
            catch(e) {
            }
        };
    },

////
// Timeouts
////
    _reccruing_tos: {},
    setSingleTimeout: function(name, fn, interval) {
        var current = AJS._reccruing_tos[name];
        if(current)
            clearTimeout(current);
        AJS._reccruing_tos[name] = setTimeout(fn, interval);
    },


////
// Misc.
////
    keys: function(obj) {
        var rval = [];
        for (var prop in obj) {
            rval.push(prop);
        }
        return rval;
    },

    values: function(obj) {
        var rval = [];
        for (var prop in obj) {
            rval.push(obj[prop]);
        }
        return rval;
    },

    urlencode: function(str) {
        return encodeURIComponent(AJS.isDefined(str) && str.toString() || '');
    },

    urldecode: function(str) {
        var result = decodeURIComponent(AJS.isDefined(str) && str.toString() || '');
        return result.replace(/\+/g, ' ');
    },

    isDefined: function(o) {
        return (o != "undefined" && o != null)
    },

    isArray: function(obj) {
        try {
            return obj instanceof Array;
        }
        catch(e) {
            return false;
        }
    },

    isString: function(obj) {
        return (typeof obj == 'string');
    },

    isNumber: function(obj) {
        return (typeof obj == 'number');
    },

    isObject: function(obj) {
        return (typeof obj == 'object');
    },

    isFunction: function(obj) {
        return (typeof obj == 'function');
    },

    isDict: function(o) {
        var str_repr = String(o);
        return str_repr.indexOf(" Object") != -1;
    },

    exportToGlobalScope: function(scope) {
        scope = scope || window;
        for(e in AJS)
            if(e != 'addEventListener')
                scope[e] = AJS[e];
    },

    log: function(o) {
        try {
            if(window._firebug)
                window._firebug.log(o);
            else if(window.console)
                console.log(o);
        }
        catch(e) {
        }
    },

    strip: function(str) {
        return str.replace(/^\s+/, '').replace(/\s+$/g, '');
    },

    trim_if_needed: function(str, limit, delim) {
        if(str.length > limit) {
            return str.substring(0, limit) + (delim || '...');
        }
        return str;
    }

}

AJS.Class = function(members) {
    var fn = function() {
        if(arguments[0] != 'no_init') {
            return this.init.apply(this, arguments);
        }
    }
    fn.prototype = members;
    AJS.update(fn, AJS.Class.prototype);
    return fn;
}
AJS.Class.prototype = {
    extend: function(members) {
        var parent = new this('no_init');
        for(k in members) {
            var prev = parent[k];
            var cur = members[k];
            if (prev && prev != cur && typeof cur == 'function') {
                cur = this._parentize(cur, prev);
            }
            parent[k] = cur;
        }
        return new AJS.Class(parent);
    },

    implement: function(members) {
        AJS.update(this.prototype, members);
    },

    _parentize: function(cur, prev) {
        return function(){
            this.parent = prev;
            return cur.apply(this, arguments);
        }
    }
};//End class

//Shortcuts
AJS.$ = AJS.getElement;
AJS.$$ = AJS.getElements;
AJS.$f = AJS.getFormElement;
AJS.$b = AJS.bind;
AJS.$p = AJS.partial;
AJS.$FA = AJS.forceArray;
AJS.$A = AJS.createArray;
AJS.DI = AJS.documentInsert;
AJS.ACN = AJS.appendChildNodes;
AJS.RCN = AJS.replaceChildNodes;
AJS.AEV = AJS.addEventListener;
AJS.REV = AJS.removeEventListener;
AJS.$bytc = AJS.getElementsByTagAndClassName;
AJS.$AP = AJS.absolutePosition;

//Old stuff
AJS.loadJSONDoc = AJS.loadJSON;
AJS.queryArguments = AJS.encodeArguments;

AJS.$gp = AJS.getParentBytc;
AJS.$gc = AJS.getChildBytc;

AJS.$sv = AJS.setVisibility;

//General callsbacks
AJS.generalErrorback = null;
AJS.generalCallback = null;

AJSDeferred = function(req, method, url) {
    this.callbacks = [];
    this.errbacks = [];
    this.req = req;
    this.http_method = method;
    this.http_url = url;
}
AJSDeferred.prototype = {
    excCallbackSeq: function(req, list) {
        var data = req.responseText;

        if(AJS.generalCallback) {
            data = AJS.generalCallback(req, list);
            if(!data)
                return ;
        }

        while (list.length > 0) {
            var fn = list.pop();
            var new_data = fn(data, req);
            if(new_data)
                data = new_data;
            else if(new_data == false)
                break;
        }
    },

    callback: function () {
        this.excCallbackSeq(this.req, this.callbacks);
    },

    errback: function() {
        if(this.errbacks.length == 0) {
            if(AJS.ajaxErrorHandler)
                AJS.ajaxErrorHandler(req.responseText, req);
            else {
                var txt = this.req.responseText.substring(0, 200);
                if(AJS.strip(txt) && txt.indexOf("<html") == -1) {
                    alert("Error encountered:\n" + txt);
                }
            }
        }

        if(AJS.generalErrorback) {
            var result = AJS.generalErrorback(this.req);
            if(!result)
                return ;
        }

        this.excCallbackSeq(this.req, this.errbacks);
    },

    addErrback: function(fn) {
        this.errbacks.unshift(fn);
    },

    addCallback: function(fn) {
        this.callbacks.unshift(fn);
    },

    abort: function() {
        this.req.abort();
    },

    addCallbacks: function(fn1, fn2) {
        this.addCallback(fn1);
        this.addErrback(fn2);
    },

    _onreadystatechange: function () {
        var req = this.req;
        var d = this;

        if (req.readyState == 4) {
            var status = '';

            try {
                status = req.status;
            }
            catch(e) {
            };

            if(status == 200 || status == 304 || req.responseText == null) {
                this.callback();
            }
            else {
                this.errback();
            }
        }
    },

    sendReq: function(data) {
        var req = this.req;
        var http_method = this.http_method;
        var http_url = this.http_url;

        if(http_method == 'POST') {
            req.open(http_method, http_url, true);
            req.onreadystatechange = AJS.$b(this._onreadystatechange, this);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            if(AJS.isObject(data)) {
                req.send(AJS.encodeArguments(data));
            }
            else if(AJS.isDefined(data))
                req.send(data);
            else {
                req.send('');
            }
        }
        else {
            req.open("GET", http_url, true)
            req.onreadystatechange = AJS.$b(this._onreadystatechange, this);
            req.send(null);
        }

    }
};//End deferred

AJS._createDomShortcuts()
}

script_loaded = true;
AJS.exportToGlobalScope();
AJS.bindReady();
