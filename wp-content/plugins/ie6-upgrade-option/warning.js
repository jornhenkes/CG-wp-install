function ftf() {
    var b = this,
        m = "",
        k = 3,
        e = {
            text_download: "Download",
            text_upgrade_now: "Upgrade",
            text_you: "YOU",
            button_continue: "Continue Anyway",
            button_close: "Close",
            text_you_are_using: "You are using",
            message_failed: "It is strongly recommended that you use an alternative browser.",
            message_acceptable: "Not bad. Try using our other recommendations.",
            message_recommended: "Good choice. Stick with it.",
            message_error: "Sorry, something went wrong. We're fixing it.",
            status_loading: "Loading...",
            status_approved: "Browser Approved.",
            status_acceptable: "Browser Acceptable.",
            status_failed: "Browser Failed.",
            link_check: "Check"
        },
        g = {
            firefox: {
                url: "http://www.mozilla.com/en-US/firefox/firefox.html",
                version: "3.6"
            },
            chrome: {
                url: "http://www.google.com/chrome/index.html?hl=en-GB&brand=CHMA&utm_campaign=en_gb&utm_source=en_gb-ha-apac-in-bk&utm_medium=ha",
                version: "7.0"
            },
            opera: {
                url: "http://www.opera.com/download/",
                version: "10.6"
            },
            safari: {
                url: "http://www.apple.com/safari/download/",
                version: "5.0"
            },
            ie: {
                url: "http://www.microsoft.com/windows/internet-explorer/worldwide-sites.aspx",
                version: "8.0"
            }
        };
    b.rate = {
        firefox: 1,
        chrome: 1,
        opera: 2,
        safari: 1,
        ie6: 3,
        ie7: 1,
		ie9: 1,
        ie8: 2
    };
    b.icons = {
        firefox: "icons/32/firefox.gif",
        chrome: "icons/32/chrome.gif",
        opera: "icons/32/opera.gif",
        safari: "icons/32/safari.gif",
        ie6: "icons/32/ie9.gif",
        ie7: "icons/32/ie9.gif",
		ie9: "icons/32/ie9.gif",
        ie8: "icons/32/ie9.gif"
    };
    b.instance_name = "ftf";
    b.output_to = "ftf_link";
    b.css_external = "";
    b.lang_external = "";
    b.onload = true;
    b.get_obj = function () {
        for (var a = [], d = 0; d < arguments.length; d++) {
            var c = arguments[d];
            if (typeof c == "string") c = document.getElementById(c);
            if (arguments.length == 1) return c;
            a.push(c)
        }
        return a
    };
    b.get_cookie = function (a) {
        if (document.cookie.length > 0) {
            cookiestart = document.cookie.indexOf(a + "=");
            if (cookiestart != -1) {
                cookiestart = cookiestart + a.length + 1;
                cookieend = document.cookie.indexOf(";", cookiestart);
                if (cookieend == -1) cookieend = document.cookie.length;
                return unescape(document.cookie.substring(cookiestart, cookieend))
            }
        }
        return ""
    };
    b.set_cookie = function (a, d, c) {
        if (navigator.cookieEnabled) {
            var f = new Date;
            f.setDate(f.getDate() + c);
            document.cookie = a + "=" + escape(d) + (c == null ? "" : ";expires=" + f.toGMTString())
        }
    };
    b.get_wh = function () {
        var a = 0,
            d = 0;
        if (typeof window.innerWidth == "number") {
            a = window.innerWidth;
            d = window.innerHeight
        } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
            a = document.documentElement.clientWidth;
            d = document.documentElement.clientHeight
        } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
            a = document.body.clientWidth;
            d = document.body.clientHeight
        }
        return [a, d]
    };
    b.get_scroll = function () {
        var a = 0,
            d = 0;
        if (typeof window.pageYOffset == "number") {
            d = window.pageYOffset;
            a = window.pageXOffset
        } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
            d = document.body.scrollTop;
            a = document.body.scrollLeft
        } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
            d = document.documentElement.scrollTop;
            a = document.documentElement.scrollLeft
        }
        return [a, d]
    };
    b.check = function () {
        if (document.getElementById("ftf_page") != null) {
            var a = b.get_scroll()[1] + b.get_wh()[1];
            document.getElementById("ftf_page").style.display = "block";
            document.getElementById("ftf_page").style.top = "0px";
            document.getElementById("ftf_page").style.height = a + "px"
        }
        scroll(0, 0)
    };
    b.close_modal = function () {
        document.getElementById("ftf_page").style.display = "none"
    };
    b.continue_anyway = function () {
        b.set_cookie("ftf_popup", "Shown", 365);
        b.close_modal()
    };
    b.get_browser_version = function (a, d) {
        var c = "";
        if (/firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent.toLowerCase())) c = RegExp.$1;
        else if (/msie (\d+\.\d+);/.test(navigator.userAgent.toLowerCase())) c = RegExp.$1;
        else if (/ AppleWebKit\//.test(navigator.userAgent)) {
            c = navigator.userAgent;
            var f = c.indexOf("Safari"),
                j = c.substr(0, f).lastIndexOf("/") + 1;
            c = c.substr(j, f - j);
            navigator.userAgent.toLowerCase().indexOf("chrome");
            c = c
        } else if (/Opera\//.test(navigator.userAgent)) {
            c = navigator.userAgent;
            f = c.indexOf("Version/");
            c = c = c.substr(f + 8, 6)
        } else c = navigator.appVersion;
        if (a) {
            array_version = c.split(".");
            if (array_version.length > 1) {
                c = array_version[0];
                if (d) c += ".";
                c += array_version[1]
            }
        }
        return c
    };
    b.get_browser_name = function () {
        var a = "Unknown";
        if (b.is_firefox) a = "Firefox";
        if (b.is_ie()) a = "Internet Explorer";
        if (b.is_opera()) a = "Opera";
        if (b.is_chrome()) a = "Chrome";
        if (b.is_safari()) a = "Safari";
        return a
    };
    b.is_ie = function () {
        var a = false;
        if (/msie (\d+\.\d+);/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) > 0) a = true;
        return a
    };
    b.is_ie6 = function () {
        var a = false;
        if (/msie (\d+\.\d+);/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) == 6) a = true;
        return a
    };
    b.is_ie7 = function () {
        var a = false;
        if (/msie (\d+\.\d+);/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) == 7) a = true;
        return a
    };
	b.is_ie9 = function () {
        var a = false;
        if (/msie (\d+\.\d+);/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) == 9) a = true;
        return a
    };
    b.is_ie8 = function () {
        var a = false;
        if (/msie (\d+\.\d+);/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) == 8) a = true;
        return a
    };
    b.is_firefox = function () {
        var a = false;
        if (/firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) >= 0) a = true;
        return a
    };
    b.is_safari = function () {
        var a = false;
        a = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
        if (/safari[\/\s](\d+\.\d+)/.test(navigator.userAgent.toLowerCase())) {
            var d = new Number(RegExp.$1);
            a = !a && d > 0 ? true : false
        }
        return a
    };
    b.is_chrome = function () {
        var a = false;
        return a = navigator.userAgent.toLowerCase().indexOf("chrome") > -1
    };
    b.is_opera = function () {
        var a = false;
        if (/opera[\/\s](\d+\.\d+)/.test(navigator.userAgent.toLowerCase())) if (new Number(RegExp.$1) > 0) a = true;
        return a
    };
    b.css = function () {
        var a = document.createElement("link");
        a.setAttribute("href", b.css_external);
        a.setAttribute("media", "screen, projection");
        a.setAttribute("rel", "stylesheet");
        a.setAttribute("type", "text/css");
        document.getElementsByTagName("head")[0].appendChild(a)
    };
    b.footer = function () {
        var a = document.getElementById(b.output_to);
        if (a == null) {
            a = document.createElement("span");
            a.setAttribute("id", "ftf_link");
            a.innerHTML = e.status_loading;
            document.body.appendChild(a)
        } else a.innerHTML = "Loading..."
    };
    b.build = function () {
        var a = [];
        m = b.get_browser_name() + " " + b.get_browser_version(true, true);
        Browsers = [];
        Browsers[Browsers.length] = b.browser("FireFox", b.rate.firefox, b.icons.firefox, g.firefox.url, g.firefox.version, b.is_firefox());
        Browsers[Browsers.length] = b.browser("Chrome", b.rate.chrome, b.icons.chrome, g.chrome.url, g.chrome.version, b.is_chrome());
        Browsers[Browsers.length] = b.browser("Safari", b.rate.safari, b.icons.safari, g.safari.url, g.safari.version, b.is_safari());
        Browsers[Browsers.length] = b.browser("Opera", b.rate.opera, b.icons.opera, g.opera.url, g.opera.version, b.is_opera());
        Browsers[Browsers.length] = b.is_ie6() ? b.browser("IE", b.rate.ie6, b.icons.ie6, g.ie.url, g.ie.version, b.is_ie6()) : 
									b.is_ie7() ? b.browser("IE", b.rate.ie7, b.icons.ie7, g.ie.url, g.ie.version, b.is_ie7()) : 
									b.is_ie8() ? b.browser("IE", b.rate.ie8, b.icons.ie8, g.ie.url, g.ie.version, b.is_ie8()) :
									b.browser("IE", b.rate.ie9, b.icons.ie9, g.ie.url, g.ie.version, b.is_ie9());

        var d = [],
            c = [],
            f = [];
        for (i = 0; i < Browsers.length; i++) {
            browser = Browsers[i];
            switch (k) {
            case 1:
                d.push(Browsers[i]);
                break;
            case 2:
                c.push(Browsers[i]);
                break;
            case 3:
                f.push(Browsers[i]);
                break;
            default:
                f.push(Browsers[i])
            }
        }
        var j = document.createElement("div");
        j.setAttribute("id", "ftf_page");
        j.setAttribute("style", "display:none;");
        a.push('<div id="ftf_background" onclick="' + b.instance_name + '.close_modal()"></div>');
        a.push('<div id="ftf_outer">');
        a.push('<div id="ftf_inner" >');
        switch (k) {
        case 1:
			a.push('<div id="ftf_header" class="ftf_recommended">');
			a.push(e.text_you_are_using + ' <span class="ftf_browser_name">' + m + "</span><br />");
			a.push(e.message_recommended);
			a.push("</div>");
			a.push('<div class="ftf_description">');
			a.push(e.message_description);
			a.push(e.message_warning);
			a.push("</div>");
			break;
		case 2:
			a.push('<div id="ftf_header" class="ftf_acceptable">');
			a.push(e.text_you_are_using + ' <span class="ftf_browser_name">' + m + "</span><br />");
			a.push(e.message_acceptable);
			a.push("</div>");
			a.push('<div class="ftf_description">');
			a.push(e.message_description);
			a.push(e.message_warning);
			a.push("</div>");
			break;
		case 3:
			a.push('<div id="ftf_header" class="ftf_failed">');
			a.push(e.text_you_are_using + ' <span class="ftf_browser_name">' + m + "</span><br />");
			a.push(e.message_failed);
			a.push("</div>");
			a.push('<div class="ftf_description">');
			a.push(e.message_description);
			a.push(e.message_warning);
			a.push("</div>");
			break;
		default:
			a.push('<div id="ftf_header" class="ftf_failed">');
			a.push(e.message_error);
			a.push("</div>");
			a.push('<div class="ftf_description">');
			a.push(e.message_description);
			a.push(e.message_warning);
			a.push("</div>");
			break
		}
        a.push('<div id="ftf_body_outer">');
        a.push('<div id="ftf_body_inner">');
        a.push(d.join(" "));
        a.push(c.join(" "));
        a.push(f.join(" "));
        a.push("</div>");
        a.push("</div>");
        a.push('<div id="ftf_footer">');
        //a.push('<div class="ftf_left"><a href="http://www.freethefoxes.com" target=_blank>FreeTheFoxes.com</a></div>');
        a.push('<div class="ftf_right"><a href="Javascript:' + b.instance_name + '.continue_anyway()">');
        ftf_popup_shown = b.get_cookie("ftf_popup");
        ftf_popup_shown == null || ftf_popup_shown == "" ? a.push(e.button_continue) : a.push(e.button_close);
        a.push("</a></div>");
        a.push("<br />");
        a.push("</div>");
        a.push("</div>");
        a.push("</div>");
        d = document.getElementById(b.output_to);
        c = [];
        switch (k) {
        case 1:
            c.push(e.status_approved);
            break;
        case 2:
            c.push(e.status_acceptable);
            break;
        case 3:
            c.push(e.status_failed);
            break;
        default:
            c.push("FTF Error")
        }
        c.push(" <a href='Javascript:" + b.instance_name + ".check();'>" + e.link_check + "</a>");
        if (d == null) {
            f = document.createElement("div");
            f.setAttribute("id", "ftf_link");
            f.innerHTML = e.status_loading;
            document.body.appendChild(f)
        }
        d.innerHTML = c.join(" ");
        j.innerHTML = a.join(" ");
        document.body.appendChild(j);
        if (k == 3 && b.onload) {
            ftf_popup_shown = b.get_cookie("ftf_popup");
            if (ftf_popup_shown == null || ftf_popup_shown == "") b.check()
        }
    };
    b.browser = function (a, d, c, f, j, n) {
        var h = [],
            l = "ftf_browser_link";
        switch (d) {
        case 1:
            l += " recommended";
            break;
        case 2:
            l += " appectable";
            break;
        case 3:
            l += " failed"
        }
        if (n) {
            k = d;
            l += " you"
        }
        h.push('<a href="' + f + '" class="' + l + '" target="_blank" onclick="setTimeout(function(){' + b.instance_name + '.close_modal();},1000);">');
        h.push('<div class="ftf_browser_icon"><img src="' + c + '" border="0" /></div>');
        h.push('<div class="ftf_browser_name">' + a + "</div>");
        //h.push('<div class="ftf_browser_version">latest v' + j + "</div>");
        //if (n) Number(j) > b.get_browser_version(true, true) ? h.push('<div class="ftf_browser_download"><b>' + e.text_upgrade_now + "</b></div>") : h.push('<div class="ftf_browser_download"><b>' + e.text_you + "</b></div>");
        //else if (d < 3) d == 1 ? h.push('<div class="ftf_browser_download"><b>' + e.text_download + "</b></div>") : h.push('<div class="ftf_browser_download">' + e.text_download + "</div>");
        //else h.push('<div class="ftf_browser_download">&nbsp;</div>');
        h.push("</a>");
        return h.join(" ")
    };
    b.init = function () {
        if (document.getElementById(b.output_to) != null) document.getElementById(b.output_to).innerHTML = e.status_loading;
        if (b.lang_external.length != 0) {
            b.ajax();
            setTimeout(function () {
                b.css();
                b.footer();
                b.build()
            }, 1E3)
        } else setTimeout(function () {
            b.css();
            b.footer();
            b.build()
        }, 500)
    };
    b.ajax = function () {
        var a = window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP");
        a.open("get", b.lang_external, true);
        a.setRequestHeader("Content-Type", "application/json");
        a.onreadystatechange = function () {
            if (a.readyState == 4) if (a.status == 200) e = eval("(" + a.responseText + ")")
        };
        a.send("")
    }
};