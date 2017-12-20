function ChangeGetElement(e) {
    var e = e;
    this.call = function () {
        var t = new ElementOptions(e).call();
        new RequestSpreadsheet(t).get(function (n) {
            Loader().hide(), new SwapGetElements(e, n, t).call()
        })
    }
}

function ElementOptions(e) {
    var e = e;
    this.call = function () {
        return n(a(t(e)))
    };
    var t = function (e) {
        for (var t = {}, n = e.attributes, a = 0; a < n.length; ++a) t[n[a].nodeName] = n[a].nodeValue;
        return t
    }, n = function (e) {
        var t = {};
        for (key in e) t[s(key)] = e[key];
        return t
    }, a = function (e) {
        var t = {};
        for (key in e) r(key) && (t[key] = e[key]);
        return t
    }, r = function (e) {
        return i().test(e)
    }, i = function () {
        return new RegExp(/^gsheet-?/i)
    }, s = function (e) {
        return "gsheet" == e ? "slug" : e.replace("gsheet-", "")
    }
}

function Elements() {
    this.change = function () {
        for (var t = (new ParsePage).call(), n = 0; n < t.length; ++n) e(t[n]) ? new PrepareFormElement(t[n]).call() : new ChangeGetElement(t[n]).call()
    };
    var e = function (e) {
        return "FORM" == e.tagName
    }
}

function Loader() {
    var e = (new ParsePage).call(), t = "gsheet-loading",
        n = "@-webkit-keyframes placeHolderShimmer{0%{background-position: -800px 0}100%{background-position: 800px 0}};",
        a = function (e) {
            return '<div style="animation-duration: 2s;animation-fill-mode: forwards;animation-iteration-count: infinite;animation-name: placeHolderShimmer;animation-timing-function: linear;background: #f6f7f8;background: linear-gradient(to right, #eeeeee 0%, #aaaaaa 30%, #eeeeee 60%);background-size: 800px 104px;height: 7px;position: relative;width: 70px;margin: auto;"class="' + t + '"gsheet-id="' + e + '"></div>'
        }, r = function () {
            document.body.appendChild(l()), s();
            for (var t = e.length - 1; t >= 0; t--) u(e[t]) || "FORM" == e[t].tagName || o(e[t])
        }, i = function () {
            s();
            for (var t = 0; t < e.length; t++) c(e[t])
        }, s = function () {
            null == window.gsheetReplacedElements && (window.gsheetReplacedElements = [])
        }, o = function (e) {
            window.gsheetReplacedElements.push(e.innerHTML);
            var t = document.createElement("div");
            t.innerHTML = a(window.gsheetReplacedElements.length - 1), e.innerHTML = "", e.appendChild(t)
        }, u = function (e) {
            return options = new ElementOptions(e).call(), options.hasOwnProperty("disable-loading")
        }, c = function (e) {
            loadingElRegex = new RegExp('<div><div.*class="gsheet-loading".*gsheet-id="(.*)".*></div></div>', "g"), output = e.innerHTML, output = output.replace(loadingElRegex, function (e, t) {
                return window.gsheetReplacedElements[parseInt(t)]
            }), e.innerHTML = output
        }, l = function () {
            var e = document.createElement("style");
            return e.textContent = n, e
        };
    return {show: r, hide: i}
}

function ParsePage() {
    this.call = function () {
        var t = document.querySelectorAll("[" + e() + "]");
        return t
    };
    var e = function () {
        return "gsheet"
    }
}

function PrepareFormElement(e) {
    var e = e;
    this.call = function () {
        e.onsubmit = FormEvent
    }
}

function RequestSpreadsheet(e) {
    var e = e;
    this.get = function (n) {
        var a = window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP");
        a.onreadystatechange = function () {
            a.readyState > 3 && 200 == a.status && n(JSON.parse(a.responseText))
        }, a.open("GET", t(e), !0), a.send()
    }, this.post = function (t) {
        var a = window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP");
        a.onreadystatechange = function () {
            a.readyState > 3 && 201 == a.status && t(JSON.parse(a.responseText))
        }, a.open("POST", n(e), !0), a.setRequestHeader("Content-Type", "application/json; charset=UTF-8"), a.send(JSON.stringify(e.data))
    };
    var t = function (e) {
        var t = a(e.slug), n = "";
        return delete e.slug, e.sheet && (n += s(e)), n += e.search ? r(e) : e.column && e["column-value"] ? i(e) : "?" + o(e), t + n
    }, n = function (e) {
        return a(e.slug)
    }, a = function (e) {
        return e
        //return e.startsWith("http://dropler.n9.si") ? e : "http://dropler.n9.si/gsheet.php?id=" + e
    }, r = function (e) {
        var t = [], n = JSON.parse(e.search);
        for (key in n) t.push(key + "=" + n[key]);
        return "/search?" + t.join("&") + "&" + o(e)
    }, i = function (e) {
        var t = "/" + e.column + "/" + e["column-value"];
        return t + "?" + o(e)
    }, s = function (e) {
        return "/sheets/" + e.sheet
    }, o = function (e) {
        var t = [];
        return e.limit && t.push("limit=" + e.limit), e.offset && t.push("offset=" + e.offset), e.transposed && t.push("transposed=" + e.transposed), e["ignore-case"] && t.push("ignore_case=" + e["ignore-case"]), t.join("&")
    }
}

function SwapGetElements(e, t, n) {
    var e = e, t = t, n = n;

    this.call = function () {
        for (var r = 0; r < t.length; ++r) {
            var element = t[r].htmlelement;
            var value = t[r].htmlvalue;

                if (
                element.indexOf("#") == -1 &&
                element.indexOf(".") == -1
            ) {
                    if(document.getElementById(element)) {
                        document.getElementById(element).innerHTML = value;
            }
            }

            if (element.indexOf("#") >= 0) {
                element = element.substr(1);
                if(document.getElementById(element)) {
                    document.getElementById(element).innerHTML = value;
            }
            }

            if (element.indexOf(".") >= 0) {
                element = element.substr(1);
                if(document.getElementById(element[0])) {
                    document.getElementsByClassName(element)[0].innerHTML = value;
            }
            }
        }
    };
}

Loader().show(), document.addEventListener("DOMContentLoaded", function () {
    (new Elements).change()
});
var redirectTo = function (e) {
    window.location = e
};
String.prototype.startsWith || (String.prototype.startsWith = function (e, t) {
    return t = t || 0, this.indexOf(e, t) === t
});