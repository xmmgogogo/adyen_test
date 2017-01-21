var backData = null;
GlobalSettings = function(me) {
	return me = {
		SetHomepage : function(obj, url) {
			try {
				obj.style.behavior = 'url(#default#homepage)';
				obj.setHomePage(url);
			} catch(e) {
				if(window.netscape) {
					try {
						netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
					} catch (e) {
						alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
						return;
					}
					try {
						var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
						prefs.setCharPref('browser.startup.homepage', url);
					} catch (e) {
						alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
						return;
					}
				} else {
					alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
					return;
				}
	        }
		},
		AddFavorite : function(url, title) {
			try {
				window.external.addFavorite(url, title);
			} catch (e) {
		        try {
		            window.sidebar.addPanel(title, url, "");
		        } catch (e) {
		            alert("加入收藏失败，请使用Ctrl+D进行添加");
		            return;
		        }
		    }
		},
		Open : function(url) {
			window.open(url);
		}
	};
}();

PookNavigation = function(me) {
	return me = {
		safety : function() {
			PookLogin.ifLogin();
			if (backData.msg == null || backData.msg == 0
					|| backData.msg == undefined) {
				tb_show('result', PookNavigation.getWebUrl()+'login_popup.html?height=435&amp;width=502&amp;modal=true&amp;inlineId=infobar', 'thickbox', 'false');
			} else {
				window.location.href = PookNavigation.getWebUrl()+"safety/mySafetyCenter.do";
			}
		},
		
		closePopup : function() {
			tb_remove();
		},
		// 新打开窗口
		showDialog : function(url) {
			var turnForm = document.createElement("form");  
			document.body.appendChild(turnForm);
			turnForm.method = 'get';
			turnForm.action = url;
			turnForm.target = '_blank';
			turnForm.submit();
			return;
		},
		// 获取当前路径
		getWebUrl : function() {
			return "http://www.pook.com/";
		}
		
	};
}();

PookLogin = function(me) {
	return me = {
		ifLogin : function() {
			$.ajax({
				url : PookNavigation.getWebUrl() + "ifLogin.do", 
				type : "post",
				dataType : "json",
				async : false,
				success : function(data) {
					if (typeof(loginCallBack) != 'undefined' && loginCallBack != undefined
							&& typeof(loginCallBack) == 'function') {
						loginCallBack(data);
					}
					if (data.ret == "S") {
						PookLogin.loginSuccess(data.msg);
					} else {
						PookLogin.showLoginBtn();
					}
				},
				error : function() {
					loginCallBack('E', '网络异常');
				}
			});
		},
		loginSuccess : function(accountName) {
			$("#loginState a").remove();			
			var html = "<a href='"+PookNavigation.getWebUrl()+"safety/mySafetyCenter.do'>您好，";
			html += accountName;
			html += "</a><a href='javascript:PookLogin.logout();'>退出</a>";			
			$("#loginState").append(html);
		},
		showLoginBtn : function() {
			$("#loginState a").remove();
			$("#loginState").append("<a href='"+PookNavigation.getWebUrl()+"register/index.html' title='注册' class='top_nav_c_rega'>注册</a>");
		},
		logout : function(data) {
			$.ajax({
				url : PookNavigation.getWebUrl() + "logout.do", 
				type : "post",
				dataType : "json",
				async : false,
				success : function(data) {
					PookLogin.showLoginBtn();
					window.location.href="index.html";
				}
			});
		}
	};
}();

function loginCallBack(data) {
	backData = data;
}

PookLogin.ifLogin();
