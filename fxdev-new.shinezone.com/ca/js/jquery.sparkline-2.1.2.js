(function (a, b, c) {
    (function (d) {
        if (typeof define === "function" && define.amd) {
            define(["jquery"], d);
        } else {
            if (jQuery && !jQuery.fn.sparkline) {
                d(jQuery);
            }
        }
    }(function (l) {
        var s = {}, p, H, u, E, v, n, I, J, x, f, g, K, A, o, t, G, C, j, r, D, h, d, F, w, q, L, e, z, m, B, y, k, i = 0;
        p = function () {
            return {
                common: {
                    type: "line",
                    lineColor: "#00f",
                    fillColor: "#cdf",
                    defaultPixelsPerValue: 3,
                    width: "auto",
                    height: "auto",
                    composite: false,
                    tagValuesAttribute: "values",
                    tagOptionsPrefix: "spark",
                    enableTagOptions: false,
                    enableHighlight: true,
                    highlightLighten: 1.4,
                    tooltipSkipNull: true,
                    tooltipPrefix: "",
                    tooltipSuffix: "",
                    disableHiddenCheck: false,
                    numberFormatter: false,
                    numberDigitGroupCount: 3,
                    numberDigitGroupSep: ",",
                    numberDecimalMark: ".",
                    disableTooltips: false,
                    disableInteraction: false
                },
                line: {
                    spotColor: "#f80",
                    highlightSpotColor: "#5f5",
                    highlightLineColor: "#f22",
                    spotRadius: 1.5,
                    minSpotColor: "#f80",
                    maxSpotColor: "#f80",
                    lineWidth: 1,
                    normalRangeMin: c,
                    normalRangeMax: c,
                    normalRangeColor: "#ccc",
                    drawNormalOnTop: false,
                    chartRangeMin: c,
                    chartRangeMax: c,
                    chartRangeMinX: c,
                    chartRangeMaxX: c,
                    tooltipFormat: new u('<span style="color: {{color}}">&#9679;</span> {{prefix}}{{y}}{{suffix}}')
                },
                bar: {
                    barColor: "#3366cc",
                    negBarColor: "#f44",
                    stackedBarColor: ["#3366cc", "#dc3912", "#ff9900", "#109618", "#66aa00", "#dd4477", "#0099c6", "#990099"],
                    zeroColor: c,
                    nullColor: c,
                    zeroAxis: true,
                    barWidth: 4,
                    barSpacing: 1,
                    chartRangeMax: c,
                    chartRangeMin: c,
                    chartRangeClip: false,
                    colorMap: c,
                    tooltipFormat: new u('<span style="color: {{color}}">&#9679;</span> {{prefix}}{{value}}{{suffix}}')
                },
                tristate: {
                    barWidth: 4,
                    barSpacing: 1,
                    posBarColor: "#6f6",
                    negBarColor: "#f44",
                    zeroBarColor: "#999",
                    colorMap: {},
                    tooltipFormat: new u('<span style="color: {{color}}">&#9679;</span> {{value:map}}'),
                    tooltipValueLookups: {map: {"-1": "Loss", "0": "Draw", "1": "Win"}}
                },
                discrete: {
                    lineHeight: "auto",
                    thresholdColor: c,
                    thresholdValue: 0,
                    chartRangeMax: c,
                    chartRangeMin: c,
                    chartRangeClip: false,
                    tooltipFormat: new u("{{prefix}}{{value}}{{suffix}}")
                },
                bullet: {
                    targetColor: "#f33",
                    targetWidth: 3,
                    performanceColor: "#33f",
                    rangeColors: ["#d3dafe", "#a8b6ff", "#7f94ff"],
                    base: c,
                    tooltipFormat: new u("{{fieldkey:fields}} - {{value}}"),
                    tooltipValueLookups: {fields: {r: "Range", p: "Performance", t: "Target"}}
                },
                pie: {
                    offset: 0,
                    sliceColors: ["#3366cc", "#dc3912", "#ff9900", "#109618", "#66aa00", "#dd4477", "#0099c6", "#990099"],
                    borderWidth: 0,
                    borderColor: "#000",
                    tooltipFormat: new u('<span style="color: {{color}}">&#9679;</span> {{value}} ({{percent.1}}%)')
                },
                box: {
                    raw: false,
                    boxLineColor: "#000",
                    boxFillColor: "#cdf",
                    whiskerColor: "#000",
                    outlierLineColor: "#333",
                    outlierFillColor: "#fff",
                    medianColor: "#f00",
                    showOutliers: true,
                    outlierIQR: 1.5,
                    spotRadius: 1.5,
                    target: c,
                    targetColor: "#4a2",
                    chartRangeMax: c,
                    chartRangeMin: c,
                    tooltipFormat: new u("{{field:fields}}: {{value}}"),
                    tooltipFormatFieldlistKey: "field",
                    tooltipValueLookups: {
                        fields: {
                            lq: "Lower Quartile",
                            med: "Median",
                            uq: "Upper Quartile",
                            lo: "Left Outlier",
                            ro: "Right Outlier",
                            lw: "Left Whisker",
                            rw: "Right Whisker"
                        }
                    }
                }
            };
        };
        L = '.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}';
        H = function () {
            var M, N;
            M = function () {
                this.init.apply(this, arguments);
            };
            if (arguments.length > 1) {
                if (arguments[0]) {
                    M.prototype = l.extend(new arguments[0](), arguments[arguments.length - 1]);
                    M._super = arguments[0].prototype;
                } else {
                    M.prototype = arguments[arguments.length - 1];
                }
                if (arguments.length > 2) {
                    N = Array.prototype.slice.call(arguments, 1, -1);
                    N.unshift(M.prototype);
                    l.extend.apply(l, N);
                }
            } else {
                M.prototype = arguments[0];
            }
            M.prototype.cls = M;
            return M;
        };
        l.SPFormatClass = u = H({
            fre: /\{\{([\w.]+?)(:(.+?))?\}\}/g, precre: /(\w+)\.(\d+)/, init: function (N, M) {
                this.format = N;
                this.fclass = M;
            }, render: function (U, S, V) {
                var T = this, R = U, Q, N, O, P, M;
                return this.format.replace(this.fre, function () {
                    var W;
                    N = arguments[1];
                    O = arguments[3];
                    Q = T.precre.exec(N);
                    if (Q) {
                        M = Q[2];
                        N = Q[1];
                    } else {
                        M = false;
                    }
                    P = R[N];
                    if (P === c) {
                        return "";
                    }
                    if (O && S && S[O]) {
                        W = S[O];
                        if (W.get) {
                            return S[O].get(P) || P;
                        } else {
                            return S[O][P] || P;
                        }
                    }
                    if (x(P)) {
                        if (V.get("numberFormatter")) {
                            P = V.get("numberFormatter")(P);
                        } else {
                            P = o(P, M, V.get("numberDigitGroupCount"), V.get("numberDigitGroupSep"), V.get("numberDecimalMark"));
                        }
                    }
                    return P;
                });
            }
        });
        l.spformat = function (N, M) {
            return new u(N, M);
        };
        E = function (O, N, M) {
            if (O < N) {
                return N;
            }
            if (O > M) {
                return M;
            }
            return O;
        };
        v = function (M, O) {
            var N;
            if (O === 2) {
                N = b.floor(M.length / 2);
                return M.length % 2 ? M[N] : (M[N - 1] + M[N]) / 2;
            } else {
                if (M.length % 2) {
                    N = (M.length * O + O) / 4;
                    return N % 1 ? (M[b.floor(N)] + M[b.floor(N) - 1]) / 2 : M[N - 1];
                } else {
                    N = (M.length * O + 2) / 4;
                    return N % 1 ? (M[b.floor(N)] + M[b.floor(N) - 1]) / 2 : M[N - 1];
                }
            }
        };
        n = function (N) {
            var M;
            switch (N) {
                case"undefined":
                    N = c;
                    break;
                case"null":
                    N = null;
                    break;
                case"true":
                    N = true;
                    break;
                case"false":
                    N = false;
                    break;
                default:
                    M = parseFloat(N);
                    if (N == M) {
                        N = M;
                    }
            }
            return N;
        };
        I = function (O) {
            var N, M = [];
            for (N = O.length; N--;) {
                M[N] = n(O[N]);
            }
            return M;
        };
        J = function (Q, O) {
            var N, P, M = [];
            for (N = 0, P = Q.length; N < P; N++) {
                if (Q[N] !== O) {
                    M.push(Q[N]);
                }
            }
            return M;
        };
        x = function (M) {
            return !isNaN(parseFloat(M)) && isFinite(M);
        };
        o = function (O, N, M, R, Q) {
            var S, P;
            O = (N === false ? parseFloat(O).toString() : O.toFixed(N)).split("");
            S = (S = l.inArray(".", O)) < 0 ? O.length : S;
            if (S < O.length) {
                O[S] = Q;
            }
            for (P = S - M; P > 0; P -= M) {
                O.splice(P, 0, R);
            }
            return O.join("");
        };
        f = function (P, N, M) {
            var O;
            for (O = N.length; O--;
            ) {
                if (M && N[O] === null) {
                    continue;
                }
                if (N[O] !== P) {
                    return false;
                }
            }
            return true;
        };
        g = function (O) {
            var N = 0, M;
            for (M = O.length; M--;) {
                N += typeof O[M] === "number" ? O[M] : 0;
            }
            return N;
        };
        A = function (M) {
            return l.isArray(M) ? M : [M];
        };
        K = function (N) {
            var M;
            if (a.createStyleSheet) {
                a.createStyleSheet().cssText = N;
            } else {
                M = a.createElement("style");
                M.type = "text/css";
                a.getElementsByTagName("head")[0].appendChild(M);
                M[(typeof a.body.style.WebkitAppearance == "string") ? "innerText" : "innerHTML"] = N;
            }
        };
        l.fn.simpledraw = function (Q, M, N, P) {
            var S, R;
            if (N && (S = this.data("_jqs_vcanvas"))) {
                return S;
            }
            if (l.fn.sparkline.canvas === false) {
                return false;
            } else {
                if (l.fn.sparkline.canvas === c) {
                    var O = a.createElement("canvas");
                    if (!!(O.getContext && O.getContext("2d"))) {
                        l.fn.sparkline.canvas = function (V, T, W, U) {
                            return new B(V, T, W, U);
                        };
                    } else {
                        if (a.namespaces && !a.namespaces.v) {
                            a.namespaces.add("v", "urn:schemas-microsoft-com:vml", "#default#VML");
                            l.fn.sparkline.canvas = function (V, T, W, U) {
                                return new y(V, T, W);
                            };
                        } else {
                            l.fn.sparkline.canvas = false;
                            return false;
                        }
                    }
                }
            }
            if (Q === c) {
                Q = l(this).innerWidth();
            }
            if (M === c) {
                M = l(this).innerHeight();
            }
            S = l.fn.sparkline.canvas(Q, M, this, P);
            R = l(this).data("_jqs_mhandler");
            if (R) {
                R.registerCanvas(S);
            }
            return S;
        };
        l.fn.cleardraw = function () {
            var M = this.data("_jqs_vcanvas");
            if (M) {
                M.reset();
            }
        };
        l.RangeMapClass = t = H({
            init: function (P) {
                var O, M, N = [];
                for (O in P) {
                    if (P.hasOwnProperty(O) && typeof O === "string" && O.indexOf(":") > -1) {
                        M = O.split(":");
                        M[0] = M[0].length === 0 ? -Infinity : parseFloat(M[0]);
                        M[1] = M[1].length === 0 ? Infinity : parseFloat(M[1]);
                        M[2] = P[O];
                        N.push(M);
                    }
                }
                this.map = P;
                this.rangelist = N || false;
            }, get: function (Q) {
                var P = this.rangelist, O, N, M;
                if ((M = this.map[Q]) !== c) {
                    return M;
                }
                if (P) {
                    for (O = P.length;
                         O--;) {
                        N = P[O];
                        if (N[0] <= Q && N[1] >= Q) {
                            return N[2];
                        }
                    }
                }
                return c;
            }
        });
        l.range_map = function (M) {
            return new t(M);
        };
        G = H({
            init: function (O, M) {
                var N = l(O);
                this.$el = N;
                this.options = M;
                this.currentPageX = 0;
                this.currentPageY = 0;
                this.el = O;
                this.splist = [];
                this.tooltip = null;
                this.over = false;
                this.displayTooltips = !M.get("disableTooltips");
                this.highlightEnabled = !M.get("disableHighlight");
            }, registerSparkline: function (M) {
                this.splist.push(M);
                if (this.over) {
                    this.updateDisplay();
                }
            }, registerCanvas: function (M) {
                var N = l(M.canvas);
                this.canvas = M;
                this.$canvas = N;
                N.mouseenter(l.proxy(this.mouseenter, this));
                N.mouseleave(l.proxy(this.mouseleave, this));
                N.click(l.proxy(this.mouseclick, this));
            }, reset: function (M) {
                this.splist = [];
                if (this.tooltip && M) {
                    this.tooltip.remove();
                    this.tooltip = c;
                }
            }, mouseclick: function (N) {
                var M = l.Event("sparklineClick");
                M.originalEvent = N;
                M.sparklines = this.splist;
                this.$el.trigger(M);
            }, mouseenter: function (M) {
                l(a.body).unbind("mousemove.jqs");
                l(a.body).bind("mousemove.jqs", l.proxy(this.mousemove, this));
                this.over = true;
                this.currentPageX = M.pageX;
                this.currentPageY = M.pageY;
                this.currentEl = M.target;
                if (!this.tooltip && this.displayTooltips) {
                    this.tooltip = new C(this.options);
                    this.tooltip.updatePosition(M.pageX, M.pageY);
                }
                this.updateDisplay();
            }, mouseleave: function () {
                l(a.body).unbind("mousemove.jqs");
                var P = this.splist, M = P.length, O = false, Q, N;
                this.over = false;
                this.currentEl = null;
                if (this.tooltip) {
                    this.tooltip.remove();
                    this.tooltip = null;
                }
                for (N = 0; N < M; N++) {
                    Q = P[N];
                    if (Q.clearRegionHighlight()) {
                        O = true;
                    }
                }
                if (O) {
                    this.canvas.render();
                }
            }, mousemove: function (M) {
                this.currentPageX = M.pageX;
                this.currentPageY = M.pageY;
                this.currentEl = M.target;
                if (this.tooltip) {
                    this.tooltip.updatePosition(M.pageX, M.pageY);
                }
                this.updateDisplay();
            }, updateDisplay: function () {
                var N = this.splist, T = N.length, R = false, Q = this.$canvas.offset(), P = this.currentPageX - Q.left, O = this.currentPageY - Q.top, U, M, S, W, V;
                if (!this.over) {
                    return;
                }
                for (S = 0; S < T; S++) {
                    M = N[S];
                    W = M.setRegionHighlight(this.currentEl, P, O);
                    if (W) {
                        R = true;
                    }
                }
                if (R) {
                    V = l.Event("sparklineRegionChange");
                    V.sparklines = this.splist;
                    this.$el.trigger(V);
                    if (this.tooltip) {
                        U = "";
                        for (S = 0; S < T; S++) {
                            M = N[S];
                            U += M.getCurrentRegionTooltip();
                        }
                        this.tooltip.setContent(U);
                    }
                    if (!this.disableHighlight) {
                        this.canvas.render();
                    }
                }
                if (W === null) {
                    this.mouseleave();
                }
            }
        });
        C = H({
            sizeStyle: "position: static !important;display: block !important;visibility: hidden !important;float: left !important;",
            init: function (M) {
                var P = M.get("tooltipClassname", "jqstooltip"), N = this.sizeStyle, O;
                this.container = M.get("tooltipContainer") || a.body;
                this.tooltipOffsetX = M.get("tooltipOffsetX", 10);
                this.tooltipOffsetY = M.get("tooltipOffsetY", 12);
                l("#jqssizetip").remove();
                l("#jqstooltip").remove();
                this.sizetip = l("<div/>", {id: "jqssizetip", style: N, "class": P});
                this.tooltip = l("<div/>", {id: "jqstooltip", "class": P}).appendTo(this.container);
                O = this.tooltip.offset();
                this.offsetLeft = O.left;
                this.offsetTop = O.top;
                this.hidden = true;
                l(window).unbind("resize.jqs scroll.jqs");
                l(window).bind("resize.jqs scroll.jqs", l.proxy(this.updateWindowDims, this));
                this.updateWindowDims();
            },
            updateWindowDims: function () {
                this.scrollTop = l(window).scrollTop();
                this.scrollLeft = l(window).scrollLeft();
                this.scrollRight = this.scrollLeft + l(window).width();
                this.updatePosition();
            },
            getSize: function (M) {
                this.sizetip.html(M).appendTo(this.container);
                this.width = this.sizetip.width() + 1;
                this.height = this.sizetip.height();
                this.sizetip.remove();
            },
            setContent: function (M) {
                if (!M) {
                    this.tooltip.css("visibility", "hidden");
                    this.hidden = true;
                    return;
                }
                this.getSize(M);
                this.tooltip.html(M).css({width: this.width, height: this.height, visibility: "visible"});
                if (this.hidden) {
                    this.hidden = false;
                    this.updatePosition();
                }
            },
            updatePosition: function (M, N) {
                if (M === c) {
                    if (this.mousex === c) {
                        return;
                    }
                    M = this.mousex - this.offsetLeft;
                    N = this.mousey - this.offsetTop;
                } else {
                    this.mousex = M = M - this.offsetLeft;
                    this.mousey = N = N - this.offsetTop;
                }
                if (!this.height || !this.width || this.hidden) {
                    return;
                }
                N -= this.height + this.tooltipOffsetY;
                M += this.tooltipOffsetX;
                if (M < this.scrollLeft) {
                    M = this.scrollLeft;
                } else {
                    if (M + this.width > this.scrollRight) {
                        M = this.scrollRight - this.width;
                    }
                }
                this.tooltip.css({left: M, top: N});
            },
            remove: function () {
                this.tooltip.remove();
                this.sizetip.remove();
                this.sizetip = this.tooltip = c;
                l(window).unbind("resize.jqs scroll.jqs");
            }
        });
        e = function () {
            K(L);
        };
        l(e);
        k = [];
        l.fn.sparkline = function (M, N) {
            return this.each(function () {
                var O = new l.fn.sparkline.options(this, N), R = l(this), Q, P;
                Q = function () {
                    var T, V, S, U, Y, X, W;
                    if (M === "html" || M === c) {
                        W = this.getAttribute(O.get("tagValuesAttribute"));
                        if (W === c || W === null) {
                            W = R.html();
                        }
                        T = W.replace(/(^\s*<!--)|(-->\s*$)|\s+/g, "").split(",");
                    } else {
                        T = M;
                    }
                    V = O.get("width") === "auto" ? T.length * O.get("defaultPixelsPerValue") : O.get("width");
                    if (O.get("height") === "auto") {
                        if (!O.get("composite") || !l.data(this, "_jqs_vcanvas")) {
                            U = a.createElement("span");
                            U.innerHTML = "a";
                            R.html(U);
                            S = l(U).innerHeight() || l(U).height();
                            l(U).remove();
                            U = null;
                        }
                    } else {
                        S = O.get("height");
                    }
                    if (!O.get("disableInteraction")) {
                        Y = l.data(this, "_jqs_mhandler");
                        if (!Y) {
                            Y = new G(this, O);
                            l.data(this, "_jqs_mhandler", Y);
                        } else {
                            if (!O.get("composite")) {
                                Y.reset();
                            }
                        }
                    } else {
                        Y = false;
                    }
                    if (O.get("composite") && !l.data(this, "_jqs_vcanvas")) {
                        if (!l.data(this, "_jqs_errnotify")) {
                            alert("Attempted to attach a composite sparkline to an element with no existing sparkline");
                            l.data(this, "_jqs_errnotify", true);
                        }
                        return;
                    }
                    X = new l.fn.sparkline[O.get("type")](this, T, O, V, S);
                    X.render();
                    if (Y) {
                        Y.registerSparkline(X);
                    }
                };
                if ((l(this).html() && !O.get("disableHiddenCheck") && l(this).is(":hidden")) || !l(this).parents("body").length) {
                    if (!O.get("composite") && l.data(this, "_jqs_pending")) {
                        for (P = k.length;
                             P; P--) {
                            if (k[P - 1][0] == this) {
                                k.splice(P - 1, 1);
                            }
                        }
                    }
                    k.push([this, Q]);
                    l.data(this, "_jqs_pending", true);
                } else {
                    Q.call(this);
                }
            });
        };
        l.fn.sparkline.defaults = p();
        l.sparkline_display_visible = function () {
            var P, N, O;
            var M = [];
            for (N = 0, O = k.length; N < O; N++) {
                P = k[N][0];
                if (l(P).is(":visible") && !l(P).parents().is(":hidden")) {
                    k[N][1].call(P);
                    l.data(k[N][0], "_jqs_pending", false);
                    M.push(N);
                } else {
                    if (!l(P).closest("html").length && !l.data(P, "_jqs_pending")) {
                        l.data(k[N][0], "_jqs_pending", false);
                        M.push(N);
                    }
                }
            }
            for (N = M.length; N; N--) {
                k.splice(M[N - 1], 1);
            }
        };
        l.fn.sparkline.options = H({
            init: function (M, R) {
                var Q, P, O, N;
                this.userOptions = R = R || {};
                this.tag = M;
                this.tagValCache = {};
                P = l.fn.sparkline.defaults;
                O = P.common;
                this.tagOptionsPrefix = R.enableTagOptions && (R.tagOptionsPrefix || O.tagOptionsPrefix);
                N = this.getTagSetting("type");
                if (N === s) {
                    Q = P[R.type || O.type];
                } else {
                    Q = P[N];
                }
                this.mergedOptions = l.extend({}, O, Q, R);
            }, getTagSetting: function (O) {
                var Q = this.tagOptionsPrefix, R, N, P, M;
                if (Q === false || Q === c) {
                    return s;
                }
                if (this.tagValCache.hasOwnProperty(O)) {
                    R = this.tagValCache.key;
                } else {
                    R = this.tag.getAttribute(Q + O);
                    if (R === c || R === null) {
                        R = s;
                    } else {
                        if (R.substr(0, 1) === "[") {
                            R = R.substr(1, R.length - 2).split(",");
                            for (N = R.length; N--;) {
                                R[N] = n(R[N].replace(/(^\s*)|(\s*$)/g, ""));
                            }
                        } else {
                            if (R.substr(0, 1) === "{") {
                                P = R.substr(1, R.length - 2).split(",");
                                R = {};
                                for (N = P.length; N--;) {
                                    M = P[N].split(":", 2);
                                    R[M[0].replace(/(^\s*)|(\s*$)/g, "")] = n(M[1].replace(/(^\s*)|(\s*$)/g, ""));
                                }
                            } else {
                                R = n(R);
                            }
                        }
                    }
                    this.tagValCache.key = R;
                }
                return R;
            }, get: function (P, O) {
                var N = this.getTagSetting(P), M;
                if (N !== s) {
                    return N;
                }
                return (M = this.mergedOptions[P]) === c ? O : M;
            }
        });
        l.fn.sparkline._base = H({
            disabled: false, init: function (Q, N, O, P, M) {
                this.el = Q;
                this.$el = l(Q);
                this.values = N;
                this.options = O;
                this.width = P;
                this.height = M;
                this.currentRegion = c;
            }, initTarget: function () {
                var M = !this.options.get("disableInteraction");
                if (!(this.target = this.$el.simpledraw(this.width, this.height, this.options.get("composite"), M))) {
                    this.disabled = true;
                } else {
                    this.canvasWidth = this.target.pixelWidth;
                    this.canvasHeight = this.target.pixelHeight;
                }
            }, render: function () {
                if (this.disabled) {
                    this.el.innerHTML = "";
                    return false;
                }
                return true;
            }, getRegion: function (M, N) {
            }, setRegionHighlight: function (O, M, R) {
                var P = this.currentRegion, N = !this.options.get("disableHighlight"), Q;
                if (M > this.canvasWidth || R > this.canvasHeight || M < 0 || R < 0) {
                    return null;
                }
                Q = this.getRegion(O, M, R);
                if (P !== Q) {
                    if (P !== c && N) {
                        this.removeHighlight();
                    }
                    this.currentRegion = Q;
                    if (Q !== c && N) {
                        this.renderHighlight();
                    }
                    return true;
                }
                return false;
            }, clearRegionHighlight: function () {
                if (this.currentRegion !== c) {
                    this.removeHighlight();
                    this.currentRegion = c;
                    return true;
                }
                return false;
            }, renderHighlight: function () {
                this.changeHighlight(true);
            }, removeHighlight: function () {
                this.changeHighlight(false);
            }, changeHighlight: function (M) {
            }, getCurrentRegionTooltip: function () {
                var ac = this.options, R = "", S = [], T, Y, M, V, ab, Q, U, P, W, O, aa, Z, X, N;
                if (this.currentRegion === c) {
                    return "";
                }
                T = this.getCurrentRegionFields();
                aa = ac.get("tooltipFormatter");
                if (aa) {
                    return aa(this, ac, T);
                }
                if (ac.get("tooltipChartTitle")) {
                    R += '<div class="jqs jqstitle">' + ac.get("tooltipChartTitle") + "</div>\n";
                }
                Y = this.options.get("tooltipFormat");
                if (!Y) {
                    return "";
                }
                if (!l.isArray(Y)) {
                    Y = [Y];
                }
                if (!l.isArray(T)) {
                    T = [T];
                }
                U = this.options.get("tooltipFormatFieldlist");
                P = this.options.get("tooltipFormatFieldlistKey");
                if (U && P) {
                    W = [];
                    for (Q = T.length; Q--;) {
                        O = T[Q][P];
                        if ((N = l.inArray(O, U)) != -1) {
                            W[N] = T[Q];
                        }
                    }
                    T = W;
                }
                M = Y.length;
                X = T.length;
                for (Q = 0; Q < M;
                     Q++) {
                    Z = Y[Q];
                    if (typeof Z === "string") {
                        Z = new u(Z);
                    }
                    V = Z.fclass || "jqsfield";
                    for (N = 0; N < X; N++) {
                        if (!T[N].isNull || !ac.get("tooltipSkipNull")) {
                            l.extend(T[N], {prefix: ac.get("tooltipPrefix"), suffix: ac.get("tooltipSuffix")});
                            ab = Z.render(T[N], ac.get("tooltipValueLookups"), ac);
                            S.push('<div class="' + V + '">' + ab + "</div>");
                        }
                    }
                }
                if (S.length) {
                    return R + S.join("\n");
                }
                return "";
            }, getCurrentRegionFields: function () {
            }, calcHighlightColor: function (M, N) {
                var T = N.get("highlightColor"), P = N.get("highlightLighten"), S, R, Q, O;
                if (T) {
                    return T;
                }
                if (P) {
                    S = /^#([0-9a-f])([0-9a-f])([0-9a-f])$/i.exec(M) || /^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i.exec(M);
                    if (S) {
                        Q = [];
                        R = M.length === 4 ? 16 : 1;
                        for (O = 0; O < 3; O++) {
                            Q[O] = E(b.round(parseInt(S[O + 1], 16) * R * P), 0, 255);
                        }
                        return "rgb(" + Q.join(",") + ")";
                    }
                }
                return M;
            }
        });
        j = {
            changeHighlight: function (O) {
                var Q = this.currentRegion, P = this.target, M = this.regionShapes[Q], N;
                if (M) {
                    N = this.renderRegion(Q, O);
                    if (l.isArray(N) || l.isArray(M)) {
                        P.replaceWithShapes(M, N);
                        this.regionShapes[Q] = l.map(N, function (R) {
                            return R.id;
                        });
                    } else {
                        P.replaceWithShape(M, N);
                        this.regionShapes[Q] = N.id;
                    }
                }
            }, render: function () {
                var N = this.values, R = this.target, S = this.regionShapes, M, Q, P, O;
                if (!this.cls._super.render.call(this)) {
                    return;
                }
                for (P = N.length; P--;) {
                    M = this.renderRegion(P);
                    if (M) {
                        if (l.isArray(M)) {
                            Q = [];
                            for (O = M.length; O--;) {
                                M[O].append();
                                Q.push(M[O].id);
                            }
                            S[P] = Q;
                        } else {
                            M.append();
                            S[P] = M.id;
                        }
                    } else {
                        S[P] = null;
                    }
                }
                R.render();
            }
        };
        l.fn.sparkline.line = r = H(l.fn.sparkline._base, {
            type: "line", init: function (Q, N, O, P, M) {
                r._super.init.call(this, Q, N, O, P, M);
                this.vertices = [];
                this.regionMap = [];
                this.xvalues = [];
                this.yvalues = [];
                this.yminmax = [];
                this.hightlightSpotId = null;
                this.lastShapeId = null;
                this.initTarget();
            }, getRegion: function (O, M, Q) {
                var N, P = this.regionMap;
                for (N = P.length; N--;) {
                    if (P[N] !== null && M >= P[N][0] && M <= P[N][1]) {
                        return P[N][2];
                    }
                }
                return c;
            }, getCurrentRegionFields: function () {
                var M = this.currentRegion;
                return {
                    isNull: this.yvalues[M] === null,
                    x: this.xvalues[M],
                    y: this.yvalues[M],
                    color: this.options.get("lineColor"),
                    fillColor: this.options.get("fillColor"),
                    offset: M
                };
            }, renderHighlight: function () {
                var M = this.currentRegion, T = this.target, Q = this.vertices[M], U = this.options, P = U.get("spotRadius"), O = U.get("highlightSpotColor"), R = U.get("highlightLineColor"), N, S;
                if (!Q) {
                    return;
                }
                if (P && O) {
                    N = T.drawCircle(Q[0], Q[1], P, c, O);
                    this.highlightSpotId = N.id;
                    T.insertAfterShape(this.lastShapeId, N);
                }
                if (R) {
                    S = T.drawLine(Q[0], this.canvasTop, Q[0], this.canvasTop + this.canvasHeight, R);
                    this.highlightLineId = S.id;
                    T.insertAfterShape(this.lastShapeId, S);
                }
            }, removeHighlight: function () {
                var M = this.target;
                if (this.highlightSpotId) {
                    M.removeShapeId(this.highlightSpotId);
                    this.highlightSpotId = null;
                }
                if (this.highlightLineId) {
                    M.removeShapeId(this.highlightLineId);
                    this.highlightLineId = null;
                }
            }, scanValues: function () {
                var U = this.values, O = U.length, M = this.xvalues, S = this.yvalues, V = this.yminmax, Q, P, T, R, N;
                for (Q = 0; Q < O; Q++) {
                    P = U[Q];
                    T = typeof(U[Q]) === "string";
                    R = typeof(U[Q]) === "object" && U[Q] instanceof Array;
                    N = T && U[Q].split(":");
                    if (T && N.length === 2) {
                        M.push(Number(N[0]));
                        S.push(Number(N[1]));
                        V.push(Number(N[1]));
                    } else {
                        if (R) {
                            M.push(P[0]);
                            S.push(P[1]);
                            V.push(P[1]);
                        } else {
                            M.push(Q);
                            if (U[Q] === null || U[Q] === "null") {
                                S.push(null);
                            } else {
                                S.push(Number(P));
                                V.push(Number(P));
                            }
                        }
                    }
                }
                if (this.options.get("xvalues")) {
                    M = this.options.get("xvalues");
                }
                this.maxy = this.maxyorg = b.max.apply(b, V);
                this.miny = this.minyorg = b.min.apply(b, V);
                this.maxx = b.max.apply(b, M);
                this.minx = b.min.apply(b, M);
                this.xvalues = M;
                this.yvalues = S;
                this.yminmax = V;
            }, processRangeOptions: function () {
                var N = this.options, M = N.get("normalRangeMin"), O = N.get("normalRangeMax");
                if (M !== c) {
                    if (M < this.miny) {
                        this.miny = M;
                    }
                    if (O > this.maxy) {
                        this.maxy = O;
                    }
                }
                if (N.get("chartRangeMin") !== c && (N.get("chartRangeClip") || N.get("chartRangeMin") < this.miny)) {
                    this.miny = N.get("chartRangeMin");
                }
                if (N.get("chartRangeMax") !== c && (N.get("chartRangeClip") || N.get("chartRangeMax") > this.maxy)) {
                    this.maxy = N.get("chartRangeMax");
                }
                if (N.get("chartRangeMinX") !== c && (N.get("chartRangeClipX") || N.get("chartRangeMinX") < this.minx)) {
                    this.minx = N.get("chartRangeMinX");
                }
                if (N.get("chartRangeMaxX") !== c && (N.get("chartRangeClipX") || N.get("chartRangeMaxX") > this.maxx)) {
                    this.maxx = N.get("chartRangeMaxX");
                }
            }, drawNormalRange: function (O, S, R, P, T) {
                var M = this.options.get("normalRangeMin"), Q = this.options.get("normalRangeMax"), N = S + b.round(R - (R * ((Q - this.miny) / T))), U = b.round((R * (Q - M)) / T);
                this.target.drawRect(O, N, P, U, c, this.options.get("normalRangeColor")).append();
            }, render: function () {
                var S = this.options, aq = this.target, an = this.canvasWidth, P = this.canvasHeight, V = this.vertices, ar = S.get("spotRadius"), ac = this.regionMap, O, N, ah, al, aj, am, ad, ag, aa, Z, af, Q, ao, Y, ae, ap, R, T, ab, M, W, ai, X, U, ak;
                if (!r._super.render.call(this)) {
                    return;
                }
                this.scanValues();
                this.processRangeOptions();
                X = this.xvalues;
                U = this.yvalues;
                if (!this.yminmax.length || this.yvalues.length < 2) {
                    return;
                }
                al = aj = 0;
                O = this.maxx - this.minx === 0 ? 1 : this.maxx - this.minx;
                N = this.maxy - this.miny === 0 ? 1 : this.maxy - this.miny;
                ah = this.yvalues.length - 1;
                if (ar && (an < (ar * 4) || P < (ar * 4))) {
                    ar = 0;
                }
                if (ar) {
                    W = S.get("highlightSpotColor") && !S.get("disableInteraction");
                    if (W || S.get("minSpotColor") || (S.get("spotColor") && U[ah] === this.miny)) {
                        P -= b.ceil(ar);
                    }
                    if (W || S.get("maxSpotColor") || (S.get("spotColor") && U[ah] === this.maxy)) {
                        P -= b.ceil(ar);
                        al += b.ceil(ar);
                    }
                    if (W || ((S.get("minSpotColor") || S.get("maxSpotColor")) && (U[0] === this.miny || U[0] === this.maxy))) {
                        aj += b.ceil(ar);
                        an -= b.ceil(ar);
                    }
                    if (W || S.get("spotColor") || (S.get("minSpotColor") || S.get("maxSpotColor") && (U[ah] === this.miny || U[ah] === this.maxy))) {
                        an -= b.ceil(ar);
                    }
                }
                P--;
                if (S.get("normalRangeMin") !== c && !S.get("drawNormalOnTop")) {
                    this.drawNormalRange(aj, al, P, an, N);
                }
                ad = [];
                ag = [ad];
                Y = ae = null;
                ap = U.length;
                for (ak = 0; ak < ap; ak++) {
                    aa = X[ak];
                    af = X[ak + 1];
                    Z = U[ak];
                    Q = aj + b.round((aa - this.minx) * (an / O));
                    ao = ak < ap - 1 ? aj + b.round((af - this.minx) * (an / O)) : an;
                    ae = Q + ((ao - Q) / 2);
                    ac[ak] = [Y || 0, ae, ak];
                    Y = ae;
                    if (Z === null) {
                        if (ak) {
                            if (U[ak - 1] !== null) {
                                ad = [];
                                ag.push(ad);
                            }
                            V.push(null);
                        }
                    } else {
                        if (Z < this.miny) {
                            Z = this.miny;
                        }
                        if (Z > this.maxy) {
                            Z = this.maxy;
                        }
                        if (!ad.length) {
                            ad.push([Q, al + P]);
                        }
                        am = [Q, al + b.round(P - (P * ((Z - this.miny) / N)))];
                        ad.push(am);
                        V.push(am);
                    }
                }
                R = [];
                T = [];
                ab = ag.length;
                for (ak = 0; ak < ab; ak++) {
                    ad = ag[ak];
                    if (ad.length) {
                        if (S.get("fillColor")) {
                            ad.push([ad[ad.length - 1][0], (al + P)]);
                            T.push(ad.slice(0));
                            ad.pop();
                        }
                        if (ad.length > 2) {
                            ad[0] = [ad[0][0], ad[1][1]];
                        }
                        R.push(ad);
                    }
                }
                ab = T.length;
                for (ak = 0; ak < ab; ak++) {
                    aq.drawShape(T[ak], S.get("fillColor"), S.get("fillColor")).append();
                }
                if (S.get("normalRangeMin") !== c && S.get("drawNormalOnTop")) {
                    this.drawNormalRange(aj, al, P, an, N);
                }
                ab = R.length;
                for (ak = 0; ak < ab;
                     ak++) {
                    aq.drawShape(R[ak], S.get("lineColor"), c, S.get("lineWidth")).append();
                }
                if (ar && S.get("valueSpots")) {
                    M = S.get("valueSpots");
                    if (M.get === c) {
                        M = new t(M);
                    }
                    for (ak = 0; ak < ap; ak++) {
                        ai = M.get(U[ak]);
                        if (ai) {
                            aq.drawCircle(aj + b.round((X[ak] - this.minx) * (an / O)), al + b.round(P - (P * ((U[ak] - this.miny) / N))), ar, c, ai).append();
                        }
                    }
                }
                if (ar && S.get("spotColor") && U[ah] !== null) {
                    aq.drawCircle(aj + b.round((X[X.length - 1] - this.minx) * (an / O)), al + b.round(P - (P * ((U[ah] - this.miny) / N))), ar, c, S.get("spotColor")).append();
                }
                if (this.maxy !== this.minyorg) {
                    if (ar && S.get("minSpotColor")) {
                        aa = X[l.inArray(this.minyorg, U)];
                        aq.drawCircle(aj + b.round((aa - this.minx) * (an / O)), al + b.round(P - (P * ((this.minyorg - this.miny) / N))), ar, c, S.get("minSpotColor")).append();
                    }
                    if (ar && S.get("maxSpotColor")) {
                        aa = X[l.inArray(this.maxyorg, U)];
                        aq.drawCircle(aj + b.round((aa - this.minx) * (an / O)), al + b.round(P - (P * ((this.maxyorg - this.miny) / N))), ar, c, S.get("maxSpotColor")).append();
                    }
                }
                this.lastShapeId = aq.getLastShapeId();
                this.canvasTop = al;
                aq.render();
            }
        });
        l.fn.sparkline.bar = D = H(l.fn.sparkline._base, j, {
            type: "bar", init: function (au, aw, aa, M, N) {
                var ac = parseInt(aa.get("barWidth"), 10), ae = parseInt(aa.get("barSpacing"), 10), S = aa.get("chartRangeMin"), aj = aa.get("chartRangeMax"), P = aa.get("chartRangeClip"), an = Infinity, W = -Infinity, ax, T, al, ab, ak, at, am, R, ag, Y, av, Z, ar, X, ao, Q, aq, ah, U, ad, O, ap, ai;
                D._super.init.call(this, au, aw, aa, M, N);
                for (at = 0, am = aw.length; at < am; at++) {
                    ad = aw[at];
                    ax = typeof(ad) === "string" && ad.indexOf(":") > -1;
                    if (ax || l.isArray(ad)) {
                        ao = true;
                        if (ax) {
                            ad = aw[at] = I(ad.split(":"));
                        }
                        ad = J(ad, null);
                        T = b.min.apply(b, ad);
                        al = b.max.apply(b, ad);
                        if (T < an) {
                            an = T;
                        }
                        if (al > W) {
                            W = al;
                        }
                    }
                }
                this.stacked = ao;
                this.regionShapes = {};
                this.barWidth = ac;
                this.barSpacing = ae;
                this.totalBarWidth = ac + ae;
                this.width = M = (aw.length * ac) + ((aw.length - 1) * ae);
                this.initTarget();
                if (P) {
                    ar = S === c ? -Infinity : S;
                    X = aj === c ? Infinity : aj;
                }
                ak = [];
                ab = ao ? [] : ak;
                var af = [];
                var V = [];
                for (at = 0, am = aw.length;
                     at < am; at++) {
                    if (ao) {
                        Q = aw[at];
                        aw[at] = U = [];
                        af[at] = 0;
                        ab[at] = V[at] = 0;
                        for (aq = 0, ah = Q.length; aq < ah; aq++) {
                            ad = U[aq] = P ? E(Q[aq], ar, X) : Q[aq];
                            if (ad !== null) {
                                if (ad > 0) {
                                    af[at] += ad;
                                }
                                if (an < 0 && W > 0) {
                                    if (ad < 0) {
                                        V[at] += b.abs(ad);
                                    } else {
                                        ab[at] += ad;
                                    }
                                } else {
                                    ab[at] += b.abs(ad - (ad < 0 ? W : an));
                                }
                                ak.push(ad);
                            }
                        }
                    } else {
                        ad = P ? E(aw[at], ar, X) : aw[at];
                        ad = aw[at] = n(ad);
                        if (ad !== null) {
                            ak.push(ad);
                        }
                    }
                }
                this.max = Z = b.max.apply(b, ak);
                this.min = av = b.min.apply(b, ak);
                this.stackMax = W = ao ? b.max.apply(b, af) : Z;
                this.stackMin = an = ao ? b.min.apply(b, ak) : av;
                if (aa.get("chartRangeMin") !== c && (aa.get("chartRangeClip") || aa.get("chartRangeMin") < av)) {
                    av = aa.get("chartRangeMin");
                }
                if (aa.get("chartRangeMax") !== c && (aa.get("chartRangeClip") || aa.get("chartRangeMax") > Z)) {
                    Z = aa.get("chartRangeMax");
                }
                this.zeroAxis = ag = aa.get("zeroAxis", true);
                if (av <= 0 && Z >= 0 && ag) {
                    Y = 0;
                } else {
                    if (ag == false) {
                        Y = av;
                    } else {
                        if (av > 0) {
                            Y = av;
                        } else {
                            Y = Z;
                        }
                    }
                }
                this.xaxisOffset = Y;
                R = ao ? (b.max.apply(b, ab) + b.max.apply(b, V)) : Z - av;
                this.canvasHeightEf = (ag && av < 0) ? this.canvasHeight - 2 : this.canvasHeight - 1;
                if (av < Y) {
                    ap = (ao && Z >= 0) ? W : Z;
                    O = (ap - Y) / R * this.canvasHeight;
                    if (O !== b.ceil(O)) {
                        this.canvasHeightEf -= 2;
                        O = b.ceil(O);
                    }
                } else {
                    O = this.canvasHeight;
                }
                this.yoffset = O;
                if (l.isArray(aa.get("colorMap"))) {
                    this.colorMapByIndex = aa.get("colorMap");
                    this.colorMapByValue = null;
                } else {
                    this.colorMapByIndex = null;
                    this.colorMapByValue = aa.get("colorMap");
                    if (this.colorMapByValue && this.colorMapByValue.get === c) {
                        this.colorMapByValue = new t(this.colorMapByValue);
                    }
                }
                this.range = R;
            }, getRegion: function (O, N, P) {
                var M = b.floor(N / this.totalBarWidth);
                return (M < 0 || M >= this.values.length) ? c : M;
            }, getCurrentRegionFields: function () {
                var Q = this.currentRegion, N = A(this.values[Q]), M = [], P, O;
                for (O = N.length; O--;) {
                    P = N[O];
                    M.push({isNull: P === null, value: P, color: this.calcColor(O, P, Q), offset: Q});
                }
                return M;
            }, calcColor: function (Q, R, S) {
                var T = this.colorMapByIndex, P = this.colorMapByValue, O = this.options, M, N;
                if (this.stacked) {
                    M = O.get("stackedBarColor");
                } else {
                    M = (R < 0) ? O.get("negBarColor") : O.get("barColor");
                }
                if (R === 0 && O.get("zeroColor") !== c) {
                    M = O.get("zeroColor");
                }
                if (P && (N = P.get(R))) {
                    M = N;
                } else {
                    if (T && T.length > S) {
                        M = T[S];
                    }
                }
                return l.isArray(M) ? M[Q % M.length] : M;
            }, renderRegion: function (W, Q) {
                var Y = this.values[W], O = this.options, M = this.xaxisOffset, U = [], Z = this.range, af = this.stacked, ag = this.target, T = W * this.totalBarWidth, N = this.canvasHeightEf, V = this.yoffset, S, aa, ac, ab, R, ad, P, ah, ae, X;
                Y = l.isArray(Y) ? Y : [Y];
                P = Y.length;
                ah = Y[0];
                ab = f(null, Y);
                X = f(M, Y, true);
                if (ab) {
                    if (O.get("nullColor")) {
                        ac = Q ? O.get("nullColor") : this.calcHighlightColor(O.get("nullColor"), O);
                        S = (V > 0) ? V - 1 : V;
                        return ag.drawRect(T, S, this.barWidth - 1, 0, ac, ac);
                    } else {
                        return c;
                    }
                }
                R = V;
                for (ad = 0; ad < P; ad++) {
                    ah = Y[ad];
                    if (af && ah === M) {
                        if (!X || ae) {
                            continue;
                        }
                        ae = true;
                    }
                    if (Z > 0) {
                        aa = b.floor(N * ((b.abs(ah - M) / Z))) + 1;
                    } else {
                        aa = 1;
                    }
                    if (ah < M || (ah === M && V === 0)) {
                        S = R;
                        R += aa;
                    } else {
                        S = V - aa;
                        V -= aa;
                    }
                    ac = this.calcColor(ad, ah, W);
                    if (Q) {
                        ac = this.calcHighlightColor(ac, O);
                    }
                    U.push(ag.drawRect(T, S, this.barWidth - 1, aa - 1, ac, ac));
                }
                if (U.length === 1) {
                    return U[0];
                }
                return U;
            }
        });
        l.fn.sparkline.tristate = h = H(l.fn.sparkline._base, j, {
            type: "tristate", init: function (R, N, O, Q, M) {
                var P = parseInt(O.get("barWidth"), 10), S = parseInt(O.get("barSpacing"), 10);
                h._super.init.call(this, R, N, O, Q, M);
                this.regionShapes = {};
                this.barWidth = P;
                this.barSpacing = S;
                this.totalBarWidth = P + S;
                this.values = l.map(N, Number);
                this.width = Q = (N.length * P) + ((N.length - 1) * S);
                if (l.isArray(O.get("colorMap"))) {
                    this.colorMapByIndex = O.get("colorMap");
                    this.colorMapByValue = null;
                } else {
                    this.colorMapByIndex = null;
                    this.colorMapByValue = O.get("colorMap");
                    if (this.colorMapByValue && this.colorMapByValue.get === c) {
                        this.colorMapByValue = new t(this.colorMapByValue);
                    }
                }
                this.initTarget();
            }, getRegion: function (N, M, O) {
                return b.floor(M / this.totalBarWidth);
            }, getCurrentRegionFields: function () {
                var M = this.currentRegion;
                return {
                    isNull: this.values[M] === c,
                    value: this.values[M],
                    color: this.calcColor(this.values[M], M),
                    offset: M
                };
            }, calcColor: function (R, S) {
                var N = this.values, Q = this.options, T = this.colorMapByIndex, P = this.colorMapByValue, M, O;
                if (P && (O = P.get(R))) {
                    M = O;
                } else {
                    if (T && T.length > S) {
                        M = T[S];
                    } else {
                        if (N[S] < 0) {
                            M = Q.get("negBarColor");
                        } else {
                            if (N[S] > 0) {
                                M = Q.get("posBarColor");
                            } else {
                                M = Q.get("zeroBarColor");
                            }
                        }
                    }
                }
                return M;
            }, renderRegion: function (P, M) {
                var U = this.values, W = this.options, Q = this.target, O, V, R, T, S, N;
                O = Q.pixelHeight;
                R = b.round(O / 2);
                T = P * this.totalBarWidth;
                if (U[P] < 0) {
                    S = R;
                    V = R - 1;
                } else {
                    if (U[P] > 0) {
                        S = 0;
                        V = R - 1;
                    } else {
                        S = R - 1;
                        V = 2;
                    }
                }
                N = this.calcColor(U[P], P);
                if (N === null) {
                    return;
                }
                if (M) {
                    N = this.calcHighlightColor(N, W);
                }
                return Q.drawRect(T, S, this.barWidth - 1, V - 1, N, N);
            }
        });
        l.fn.sparkline.discrete = d = H(l.fn.sparkline._base, j, {
            type: "discrete", init: function (Q, N, O, P, M) {
                d._super.init.call(this, Q, N, O, P, M);
                this.regionShapes = {};
                this.values = N = l.map(N, Number);
                this.min = b.min.apply(b, N);
                this.max = b.max.apply(b, N);
                this.range = this.max - this.min;
                this.width = P = O.get("width") === "auto" ? N.length * 2 : this.width;
                this.interval = b.floor(P / N.length);
                this.itemWidth = P / N.length;
                if (O.get("chartRangeMin") !== c && (O.get("chartRangeClip") || O.get("chartRangeMin") < this.min)) {
                    this.min = O.get("chartRangeMin");
                }
                if (O.get("chartRangeMax") !== c && (O.get("chartRangeClip") || O.get("chartRangeMax") > this.max)) {
                    this.max = O.get("chartRangeMax");
                }
                this.initTarget();
                if (this.target) {
                    this.lineHeight = O.get("lineHeight") === "auto" ? b.round(this.canvasHeight * 0.3) : O.get("lineHeight");
                }
            }, getRegion: function (N, M, O) {
                return b.floor(M / this.itemWidth);
            }, getCurrentRegionFields: function () {
                var M = this.currentRegion;
                return {isNull: this.values[M] === c, value: this.values[M], offset: M};
            }, renderRegion: function (U, P) {
                var aa = this.values, ab = this.options, R = this.min, X = this.max, T = this.range, N = this.interval, W = this.target, S = this.canvasHeight, Z = this.lineHeight, V = S - Z, M, O, Q, Y;
                O = E(aa[U], R, X);
                Y = U * N;
                M = b.round(V - V * ((O - R) / T));
                Q = (ab.get("thresholdColor") && O < ab.get("thresholdValue")) ? ab.get("thresholdColor") : ab.get("lineColor");
                if (P) {
                    Q = this.calcHighlightColor(Q, ab);
                }
                return W.drawLine(Y, M, Y, M + Z, Q);
            }
        });
        l.fn.sparkline.bullet = F = H(l.fn.sparkline._base, {
            type: "bullet", init: function (S, O, P, R, N) {
                var Q, M, T;
                F._super.init.call(this, S, O, P, R, N);
                this.values = O = I(O);
                T = O.slice();
                T[0] = T[0] === null ? T[2] : T[0];
                T[1] = O[1] === null ? T[2] : T[1];
                Q = b.min.apply(b, O);
                M = b.max.apply(b, O);
                if (P.get("base") === c) {
                    Q = Q < 0 ? Q : 0;
                } else {
                    Q = P.get("base");
                }
                this.min = Q;
                this.max = M;
                this.range = M - Q;
                this.shapes = {};
                this.valueShapes = {};
                this.regiondata = {};
                this.width = R = P.get("width") === "auto" ? "4.0em" : R;
                this.target = this.$el.simpledraw(R, N, P.get("composite"));
                if (!O.length) {
                    this.disabled = true;
                }
                this.initTarget();
            }, getRegion: function (N, M, P) {
                var O = this.target.getShapeAt(N, M, P);
                return (O !== c && this.shapes[O] !== c) ? this.shapes[O] : c;
            }, getCurrentRegionFields: function () {
                var M = this.currentRegion;
                return {fieldkey: M.substr(0, 1), value: this.values[M.substr(1)], region: M};
            }, changeHighlight: function (N) {
                var P = this.currentRegion, O = this.valueShapes[P], M;
                delete this.shapes[O];
                switch (P.substr(0, 1)) {
                    case"r":
                        M = this.renderRange(P.substr(1), N);
                        break;
                    case"p":
                        M = this.renderPerformance(N);
                        break;
                    case"t":
                        M = this.renderTarget(N);
                        break;
                }
                this.valueShapes[P] = M.id;
                this.shapes[M.id] = P;
                this.target.replaceWithShape(O, M);
            }, renderRange: function (P, N) {
                var Q = this.values[P], O = b.round(this.canvasWidth * ((Q - this.min) / this.range)), M = this.options.get("rangeColors")[P - 2];
                if (N) {
                    M = this.calcHighlightColor(M, this.options);
                }
                return this.target.drawRect(0, 0, O - 1, this.canvasHeight - 1, M, M);
            }, renderPerformance: function (N) {
                var P = this.values[1], O = b.round(this.canvasWidth * ((P - this.min) / this.range)), M = this.options.get("performanceColor");
                if (N) {
                    M = this.calcHighlightColor(M, this.options);
                }
                return this.target.drawRect(0, b.round(this.canvasHeight * 0.3), O - 1, b.round(this.canvasHeight * 0.4) - 1, M, M);
            }, renderTarget: function (O) {
                var R = this.values[0], M = b.round(this.canvasWidth * ((R - this.min) / this.range) - (this.options.get("targetWidth") / 2)), Q = b.round(this.canvasHeight * 0.1), P = this.canvasHeight - (Q * 2), N = this.options.get("targetColor");
                if (O) {
                    N = this.calcHighlightColor(N, this.options);
                }
                return this.target.drawRect(M, Q, this.options.get("targetWidth") - 1, P - 1, N, N);
            }, render: function () {
                var P = this.values.length, O = this.target, N, M;
                if (!F._super.render.call(this)) {
                    return;
                }
                for (N = 2; N < P; N++) {
                    M = this.renderRange(N).append();
                    this.shapes[M.id] = "r" + N;
                    this.valueShapes["r" + N] = M.id;
                }
                if (this.values[1] !== null) {
                    M = this.renderPerformance().append();
                    this.shapes[M.id] = "p1";
                    this.valueShapes.p1 = M.id;
                }
                if (this.values[0] !== null) {
                    M = this.renderTarget().append();
                    this.shapes[M.id] = "t0";
                    this.valueShapes.t0 = M.id;
                }
                O.render();
            }
        });
        l.fn.sparkline.pie = w = H(l.fn.sparkline._base, {
            type: "pie", init: function (R, N, O, Q, M) {
                var S = 0, P;
                w._super.init.call(this, R, N, O, Q, M);
                this.shapes = {};
                this.valueShapes = {};
                this.values = N = l.map(N, Number);
                if (O.get("width") === "auto") {
                    this.width = this.height;
                }
                if (N.length > 0) {
                    for (P = N.length;
                         P--;) {
                        S += N[P];
                    }
                }
                this.total = S;
                this.initTarget();
                this.radius = b.floor(b.min(this.canvasWidth, this.canvasHeight) / 2);
            }, getRegion: function (N, M, P) {
                var O = this.target.getShapeAt(N, M, P);
                return (O !== c && this.shapes[O] !== c) ? this.shapes[O] : c;
            }, getCurrentRegionFields: function () {
                var M = this.currentRegion;
                return {
                    isNull: this.values[M] === c,
                    value: this.values[M],
                    percent: this.values[M] / this.total * 100,
                    color: this.options.get("sliceColors")[M % this.options.get("sliceColors").length],
                    offset: M
                };
            }, changeHighlight: function (M) {
                var P = this.currentRegion, N = this.renderSlice(P, M), O = this.valueShapes[P];
                delete this.shapes[O];
                this.target.replaceWithShape(O, N);
                this.valueShapes[P] = N.id;
                this.shapes[N.id] = P;
            }, renderSlice: function (V, P) {
                var X = this.target, ab = this.options, W = this.radius, M = ab.get("borderWidth"), S = ab.get("offset"), N = 2 * b.PI, aa = this.values, Y = this.total, U = S ? (2 * b.PI) * (S / 360) : 0, O, R, T, Z, Q;
                Z = aa.length;
                for (T = 0; T < Z; T++) {
                    O = U;
                    R = U;
                    if (Y > 0) {
                        R = U + (N * (aa[T] / Y));
                    }
                    if (V === T) {
                        Q = ab.get("sliceColors")[T % ab.get("sliceColors").length];
                        if (P) {
                            Q = this.calcHighlightColor(Q, ab);
                        }
                        return X.drawPieSlice(W, W, W - M, O, R, c, Q);
                    }
                    U = R;
                }
            }, render: function () {
                var S = this.target, P = this.values, Q = this.options, M = this.radius, O = Q.get("borderWidth"), N, R;
                if (!w._super.render.call(this)) {
                    return;
                }
                if (O) {
                    S.drawCircle(M, M, b.floor(M - (O / 2)), Q.get("borderColor"), c, O).append();
                }
                for (R = P.length;
                     R--;) {
                    if (P[R]) {
                        N = this.renderSlice(R).append();
                        this.valueShapes[R] = N.id;
                        this.shapes[N.id] = R;
                    }
                }
                S.render();
            }
        });
        l.fn.sparkline.box = q = H(l.fn.sparkline._base, {
            type: "box", init: function (Q, N, O, P, M) {
                q._super.init.call(this, Q, N, O, P, M);
                this.values = l.map(N, Number);
                this.width = O.get("width") === "auto" ? "4.0em" : P;
                this.initTarget();
                if (!this.values.length) {
                    this.disabled = 1;
                }
            }, getRegion: function () {
                return 1;
            }, getCurrentRegionFields: function () {
                var M = [{field: "lq", value: this.quartiles[0]}, {
                    field: "med",
                    value: this.quartiles[1]
                }, {field: "uq", value: this.quartiles[2]}];
                if (this.loutlier !== c) {
                    M.push({field: "lo", value: this.loutlier});
                }
                if (this.routlier !== c) {
                    M.push({field: "ro", value: this.routlier});
                }
                if (this.lwhisker !== c) {
                    M.push({field: "lw", value: this.lwhisker});
                }
                if (this.rwhisker !== c) {
                    M.push({field: "rw", value: this.rwhisker});
                }
                return M;
            }, render: function () {
                var af = this.target, P = this.values, T = P.length, R = this.options, ae = this.canvasWidth, N = this.canvasHeight, Y = R.get("chartRangeMin") === c ? b.min.apply(b, P) : R.get("chartRangeMin"), ad = R.get("chartRangeMax") === c ? b.max.apply(b, P) : R.get("chartRangeMax"), aa = 0, X, ac, Q, W, V, U, M, S, ab, Z, O;
                if (!q._super.render.call(this)) {
                    return;
                }
                if (R.get("raw")) {
                    if (R.get("showOutliers") && P.length > 5) {
                        ac = P[0];
                        X = P[1];
                        W = P[2];
                        V = P[3];
                        U = P[4];
                        M = P[5];
                        S = P[6];
                    } else {
                        X = P[0];
                        W = P[1];
                        V = P[2];
                        U = P[3];
                        M = P[4];
                    }
                } else {
                    P.sort(function (ah, ag) {
                        return ah - ag;
                    });
                    W = v(P, 1);
                    V = v(P, 2);
                    U = v(P, 3);
                    Q = U - W;
                    if (R.get("showOutliers")) {
                        X = M = c;
                        for (ab = 0; ab < T; ab++) {
                            if (X === c && P[ab] > W - (Q * R.get("outlierIQR"))) {
                                X = P[ab];
                            }
                            if (P[ab] < U + (Q * R.get("outlierIQR"))) {
                                M = P[ab];
                            }
                        }
                        ac = P[0];
                        S = P[T - 1];
                    } else {
                        X = P[0];
                        M = P[T - 1];
                    }
                }
                this.quartiles = [W, V, U];
                this.lwhisker = X;
                this.rwhisker = M;
                this.loutlier = ac;
                this.routlier = S;
                O = ae / (ad - Y + 1);
                if (R.get("showOutliers")) {
                    aa = b.ceil(R.get("spotRadius"));
                    ae -= 2 * b.ceil(R.get("spotRadius"));
                    O = ae / (ad - Y + 1);
                    if (ac < X) {
                        af.drawCircle((ac - Y) * O + aa, N / 2, R.get("spotRadius"), R.get("outlierLineColor"), R.get("outlierFillColor")).append();
                    }
                    if (S > M) {
                        af.drawCircle((S - Y) * O + aa, N / 2, R.get("spotRadius"), R.get("outlierLineColor"), R.get("outlierFillColor")).append();
                    }
                }
                af.drawRect(b.round((W - Y) * O + aa), b.round(N * 0.1), b.round((U - W) * O), b.round(N * 0.8), R.get("boxLineColor"), R.get("boxFillColor")).append();
                af.drawLine(b.round((X - Y) * O + aa), b.round(N / 2), b.round((W - Y) * O + aa), b.round(N / 2), R.get("lineColor")).append();
                af.drawLine(b.round((X - Y) * O + aa), b.round(N / 4), b.round((X - Y) * O + aa), b.round(N - N / 4), R.get("whiskerColor")).append();
                af.drawLine(b.round((M - Y) * O + aa), b.round(N / 2), b.round((U - Y) * O + aa), b.round(N / 2), R.get("lineColor")).append();
                af.drawLine(b.round((M - Y) * O + aa), b.round(N / 4), b.round((M - Y) * O + aa), b.round(N - N / 4), R.get("whiskerColor")).append();
                af.drawLine(b.round((V - Y) * O + aa), b.round(N * 0.1), b.round((V - Y) * O + aa), b.round(N * 0.9), R.get("medianColor")).append();
                if (R.get("target")) {
                    Z = b.ceil(R.get("spotRadius"));
                    af.drawLine(b.round((R.get("target") - Y) * O + aa), b.round((N / 2) - Z), b.round((R.get("target") - Y) * O + aa), b.round((N / 2) + Z), R.get("targetColor")).append();
                    af.drawLine(b.round((R.get("target") - Y) * O + aa - Z), b.round(N / 2), b.round((R.get("target") - Y) * O + aa + Z), b.round(N / 2), R.get("targetColor")).append();
                }
                af.render();
            }
        });
        z = H({
            init: function (O, P, N, M) {
                this.target = O;
                this.id = P;
                this.type = N;
                this.args = M;
            }, append: function () {
                this.target.appendShape(this);
                return this;
            }
        });
        m = H({
            _pxregex: /(\d+)(px)?\s*$/i, init: function (N, M, O) {
                if (!N) {
                    return;
                }
                this.width = N;
                this.height = M;
                this.target = O;
                this.lastShapeId = null;
                if (O[0]) {
                    O = O[0];
                }
                l.data(O, "_jqs_vcanvas", this);
            }, drawLine: function (O, Q, N, P, R, M) {
                return this.drawShape([[O, Q], [N, P]], R, M);
            }, drawShape: function (O, N, P, M) {
                return this._genShape("Shape", [O, N, P, M]);
            }, drawCircle: function (O, R, N, P, Q, M) {
                return this._genShape("Circle", [O, R, N, P, Q, M]);
            }, drawPieSlice: function (N, S, M, P, O, Q, R) {
                return this._genShape("PieSlice", [N, S, M, P, O, Q, R]);
            }, drawRect: function (N, R, O, M, P, Q) {
                return this._genShape("Rect", [N, R, O, M, P, Q]);
            }, getElement: function () {
                return this.canvas;
            }, getLastShapeId: function () {
                return this.lastShapeId;
            }, reset: function () {
                alert("reset not implemented");
            }, _insert: function (M, N) {
                l(N).html(M);
            }, _calculatePixelDims: function (P, M, O) {
                var N;
                N = this._pxregex.exec(M);
                if (N) {
                    this.pixelHeight = N[1];
                } else {
                    this.pixelHeight = l(O).height();
                }
                N = this._pxregex.exec(P);
                if (N) {
                    this.pixelWidth = N[1];
                } else {
                    this.pixelWidth = l(O).width();
                }
            }, _genShape: function (N, M) {
                var O = i++;
                M.unshift(O);
                return new z(this, O, N, M);
            }, appendShape: function (M) {
                alert("appendShape not implemented");
            }, replaceWithShape: function (N, M) {
                alert("replaceWithShape not implemented");
            }, insertAfterShape: function (N, M) {
                alert("insertAfterShape not implemented");
            }, removeShapeId: function (M) {
                alert("removeShapeId not implemented");
            }, getShapeAt: function (N, M, O) {
                alert("getShapeAt not implemented");
            }, render: function () {
                alert("render not implemented");
            }
        });
        B = H(m, {
            init: function (O, M, P, N) {
                B._super.init.call(this, O, M, P);
                this.canvas = a.createElement("canvas");
                if (P[0]) {
                    P = P[0];
                }
                l.data(P, "_jqs_vcanvas", this);
                l(this.canvas).css({display: "inline-block", width: O, height: M, verticalAlign: "top"});
                this._insert(this.canvas, P);
                this._calculatePixelDims(O, M, this.canvas);
                this.canvas.width = this.pixelWidth;
                this.canvas.height = this.pixelHeight;
                this.interact = N;
                this.shapes = {};
                this.shapeseq = [];
                this.currentTargetShapeId = c;
                l(this.canvas).css({width: this.pixelWidth, height: this.pixelHeight});
            }, _getContext: function (O, P, M) {
                var N = this.canvas.getContext("2d");
                if (O !== c) {
                    N.strokeStyle = O;
                }
                N.lineWidth = M === c ? 1 : M;
                if (P !== c) {
                    N.fillStyle = P;
                }
                return N;
            }, reset: function () {
                var M = this._getContext();
                M.clearRect(0, 0, this.pixelWidth, this.pixelHeight);
                this.shapes = {};
                this.shapeseq = [];
                this.currentTargetShapeId = c;
            }, _drawShape: function (S, R, Q, T, M) {
                var O = this._getContext(Q, T, M), N, P;
                O.beginPath();
                O.moveTo(R[0][0] + 0.5, R[0][1] + 0.5);
                for (N = 1, P = R.length; N < P; N++) {
                    O.lineTo(R[N][0] + 0.5, R[N][1] + 0.5);
                }
                if (Q !== c) {
                    O.stroke();
                }
                if (T !== c) {
                    O.fill();
                }
                if (this.targetX !== c && this.targetY !== c && O.isPointInPath(this.targetX, this.targetY)) {
                    this.currentTargetShapeId = S;
                }
            }, _drawCircle: function (R, O, T, N, Q, S, M) {
                var P = this._getContext(Q, S, M);
                P.beginPath();
                P.arc(O, T, N, 0, 2 * b.PI, false);
                if (this.targetX !== c && this.targetY !== c && P.isPointInPath(this.targetX, this.targetY)) {
                    this.currentTargetShapeId = R;
                }
                if (Q !== c) {
                    P.stroke();
                }
                if (S !== c) {
                    P.fill();
                }
            }, _drawPieSlice: function (Q, U, S, P, R, O, T, N) {
                var M = this._getContext(T, N);
                M.beginPath();
                M.moveTo(U, S);
                M.arc(U, S, P, R, O, false);
                M.lineTo(U, S);
                M.closePath();
                if (T !== c) {
                    M.stroke();
                }
                if (N) {
                    M.fill();
                }
                if (this.targetX !== c && this.targetY !== c && M.isPointInPath(this.targetX, this.targetY)) {
                    this.currentTargetShapeId = Q;
                }
            }, _drawRect: function (Q, N, S, O, M, P, R) {
                return this._drawShape(Q, [[N, S], [N + O, S], [N + O, S + M], [N, S + M], [N, S]], P, R);
            }, appendShape: function (M) {
                this.shapes[M.id] = M;
                this.shapeseq.push(M.id);
                this.lastShapeId = M.id;
                return M.id;
            }, replaceWithShape: function (O, M) {
                var P = this.shapeseq, N;
                this.shapes[M.id] = M;
                for (N = P.length; N--;) {
                    if (P[N] == O) {
                        P[N] = M.id;
                    }
                }
                delete this.shapes[O];
            }, replaceWithShapes: function (O, N) {
                var S = this.shapeseq, Q = {}, M, P, R;
                for (P = O.length; P--;) {
                    Q[O[P]] = true;
                }
                for (P = S.length; P--;) {
                    M = S[P];
                    if (Q[M]) {
                        S.splice(P, 1);
                        delete this.shapes[M];
                        R = P;
                    }
                }
                for (P = N.length;
                     P--;) {
                    S.splice(R, 0, N[P].id);
                    this.shapes[N[P].id] = N[P];
                }
            }, insertAfterShape: function (O, M) {
                var P = this.shapeseq, N;
                for (N = P.length;
                     N--;) {
                    if (P[N] === O) {
                        P.splice(N + 1, 0, M.id);
                        this.shapes[M.id] = M;
                        return;
                    }
                }
            }, removeShapeId: function (N) {
                var O = this.shapeseq, M;
                for (M = O.length;
                     M--;) {
                    if (O[M] === N) {
                        O.splice(M, 1);
                        break;
                    }
                }
                delete this.shapes[N];
            }, getShapeAt: function (N, M, O) {
                this.targetX = M;
                this.targetY = O;
                this.render();
                return this.currentTargetShapeId;
            }, render: function () {
                var S = this.shapeseq, M = this.shapes, Q = S.length, P = this._getContext(), R, N, O;
                P.clearRect(0, 0, this.pixelWidth, this.pixelHeight);
                for (O = 0; O < Q; O++) {
                    R = S[O];
                    N = M[R];
                    this["_draw" + N.type].apply(this, N.args);
                }
                if (!this.interact) {
                    this.shapes = {};
                    this.shapeseq = [];
                }
            }
        });
        y = H(m, {
            init: function (N, M, P) {
                var O;
                y._super.init.call(this, N, M, P);
                if (P[0]) {
                    P = P[0];
                }
                l.data(P, "_jqs_vcanvas", this);
                this.canvas = a.createElement("span");
                l(this.canvas).css({
                    display: "inline-block",
                    position: "relative",
                    overflow: "hidden",
                    width: N,
                    height: M,
                    margin: "0px",
                    padding: "0px",
                    verticalAlign: "top"
                });
                this._insert(this.canvas, P);
                this._calculatePixelDims(N, M, this.canvas);
                this.canvas.width = this.pixelWidth;
                this.canvas.height = this.pixelHeight;
                O = '<v:group coordorigin="0 0" coordsize="' + this.pixelWidth + " " + this.pixelHeight + '" style="position:absolute;top:0;left:0;width:' + this.pixelWidth + "px;height=" + this.pixelHeight + 'px;"></v:group>';
                this.canvas.insertAdjacentHTML("beforeEnd", O);
                this.group = l(this.canvas).children()[0];
                this.rendered = false;
                this.prerender = "";
            }, _drawShape: function (R, Y, T, M, P) {
                var U = [], S, X, W, Q, V, N, O;
                for (O = 0, N = Y.length; O < N; O++) {
                    U[O] = "" + (Y[O][0]) + "," + (Y[O][1]);
                }
                S = U.splice(0, 1);
                P = P === c ? 1 : P;
                X = T === c ? ' stroked="false" ' : ' strokeWeight="' + P + 'px" strokeColor="' + T + '" ';
                W = M === c ? ' filled="false"' : ' fillColor="' + M + '" filled="true" ';
                Q = U[0] === U[U.length - 1] ? "x " : "";
                V = '<v:shape coordorigin="0 0" coordsize="' + this.pixelWidth + " " + this.pixelHeight + '"  id="jqsshape' + R + '" ' + X + W + ' style="position:absolute;left:0px;top:0px;height:' + this.pixelHeight + "px;width:" + this.pixelWidth + 'px;padding:0px;margin:0px;"  path="m ' + S + " l " + U.join(", ") + " " + Q + 'e"> </v:shape>';
                return V;
            }, _drawCircle: function (P, S, Q, O, R, M, N) {
                var V, U, T;
                S -= O;
                Q -= O;
                V = R === c ? ' stroked="false" ' : ' strokeWeight="' + N + 'px" strokeColor="' + R + '" ';
                U = M === c ? ' filled="false"' : ' fillColor="' + M + '" filled="true" ';
                T = '<v:oval  id="jqsshape' + P + '" ' + V + U + ' style="position:absolute;top:' + Q + "px; left:" + S + "px; width:" + (O * 2) + "px; height:" + (O * 2) + 'px"></v:oval>';
                return T;
            }, _drawPieSlice: function (T, Y, W, S, U, P, X, O) {
                var V, N, M, R, Q, ab, aa, Z;
                if (U === P) {
                    return "";
                }
                if ((P - U) === (2 * b.PI)) {
                    U = 0;
                    P = (2 * b.PI);
                }
                N = Y + b.round(b.cos(U) * S);
                M = W + b.round(b.sin(U) * S);
                R = Y + b.round(b.cos(P) * S);
                Q = W + b.round(b.sin(P) * S);
                if (N === R && M === Q) {
                    if ((P - U) < b.PI) {
                        return "";
                    }
                    N = R = Y + S;
                    M = Q = W;
                }
                if (N === R && M === Q && (P - U) < b.PI) {
                    return "";
                }
                V = [Y - S, W - S, Y + S, W + S, N, M, R, Q];
                ab = X === c ? ' stroked="false" ' : ' strokeWeight="1px" strokeColor="' + X + '" ';
                aa = O === c ? ' filled="false"' : ' fillColor="' + O + '" filled="true" ';
                Z = '<v:shape coordorigin="0 0" coordsize="' + this.pixelWidth + " " + this.pixelHeight + '"  id="jqsshape' + T + '" ' + ab + aa + ' style="position:absolute;left:0px;top:0px;height:' + this.pixelHeight + "px;width:" + this.pixelWidth + 'px;padding:0px;margin:0px;"  path="m ' + Y + "," + W + " wa " + V.join(", ") + ' x e"> </v:shape>';
                return Z;
            }, _drawRect: function (Q, N, S, O, M, P, R) {
                return this._drawShape(Q, [[N, S], [N, S + M], [N + O, S + M], [N + O, S], [N, S]], P, R);
            }, reset: function () {
                this.group.innerHTML = "";
            }, appendShape: function (M) {
                var N = this["_draw" + M.type].apply(this, M.args);
                if (this.rendered) {
                    this.group.insertAdjacentHTML("beforeEnd", N);
                } else {
                    this.prerender += N;
                }
                this.lastShapeId = M.id;
                return M.id;
            }, replaceWithShape: function (P, M) {
                var O = l("#jqsshape" + P), N = this["_draw" + M.type].apply(this, M.args);
                O[0].outerHTML = N;
            }, replaceWithShapes: function (N, M) {
                var Q = l("#jqsshape" + N[0]), P = "", R = M.length, O;
                for (O = 0; O < R; O++) {
                    P += this["_draw" + M[O].type].apply(this, M[O].args);
                }
                Q[0].outerHTML = P;
                for (O = 1; O < N.length; O++) {
                    l("#jqsshape" + N[O]).remove();
                }
            }, insertAfterShape: function (P, M) {
                var O = l("#jqsshape" + P), N = this["_draw" + M.type].apply(this, M.args);
                O[0].insertAdjacentHTML("afterEnd", N);
            }, removeShapeId: function (N) {
                var M = l("#jqsshape" + N);
                this.group.removeChild(M[0]);
            }, getShapeAt: function (N, M, P) {
                var O = N.id.substr(8);
                return O;
            }, render: function () {
                if (!this.rendered) {
                    this.group.innerHTML = this.prerender;
                    this.rendered = true;
                }
            }
        });
    }));
}(document, Math));
