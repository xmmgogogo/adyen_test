<?php
?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="csr-t-adyen csr csr-condensed ajax-false ajax-" data-csr-level="2">
<head>
    <title>Payments - Adyen PSP System</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta content="TRUE" name="MSSmartTagsPreventParsing" />


    <link rel="shortcut icon" href="//ca-test.adyen.com/ca/img/adyen/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" type="text/css" href="//ca-test.adyen.com/ca/css/adyen/style.css?e057" />

    <link rel="stylesheet" type="text/css" href="//ca-test.adyen.com/ca/css/csr/csr.css?e057" />


    <link rel="stylesheet" type="text/css" href="//ca-test.adyen.com/ca/css/csr/grid.css?e057" />
    <link rel="stylesheet" type="text/css" href="//ca-test.adyen.com/ca/css/font.css?e057"/>

    <link rel="stylesheet" type="text/css" href="//ca-test.adyen.com/ca/css/grid.css?e057" />

    <style type="text/css">#ca-middlebarcontainer:before{content:'TEST';color:#4c4c4c;background: #efdc38;}</style>

    <!--[if lte IE 8]>
    <script type="text/javascript">
        document.createElement('section');
    </script>
    <![endif]-->



    <!--[if lte IE 8]><script src="//ca-test.adyen.com//ca-test.adyen.com/ca/js/lib/json2.js"></script><![endif]-->




    <script src="//ca-test.adyen.com/ca/js/ps.pack.js?load=pluginspack&amp;e057" type="text/javascript"></script>
    <script src="//ca-test.adyen.com/ca/js/jquery.pack.js?e057" type="text/javascript"></script>
    <script src="//ca-test.adyen.com/ca/js/adyen/adyen.pack.js?e057" type="text/javascript" ></script>


</head>

<body class="no-menu backlink ca-ft-globalsearch">

<style type="text/css">
    .ca-get-feedback,
    .ca-get-feedback * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .ca-get-feedback {
        position: fixed;
        bottom: 15px;
        left: 15px;
        z-index: 1000001;
    }

    .ca-get-feedback__button {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        padding: 10px 20px;

        background: #4c4c4c;
        color: #ffffff;
        cursor: pointer;
        line-height: 20px;
    }

    .ca-get-feedback__button .icon-commenting {
        font-size: 18px;
    }

    .ca-get-feedback__button-text {
        display: none;
        margin-left: 5px;
    }

    .ca-get-feedback__button:hover .ca-get-feedback__button-text {
        position: relative;
        top: -3px;

        display: inline-block;
    }

    .ca-get-feedback__form-container {
        position: absolute;
        top: -210px;

        border: 1px solid #cfcfcf;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        height: 200px;
        padding: 25px 20px 15px 20px;
        width: 390px;

        background: #ffffff;
    }

    .ca-get-feedback__form {
        position: relative;

        height: 100%;
    }

    .ca-get-feedback__form .icon-times-circle {
        position: absolute;
        top: -12.5px;
        right: -12.5px;

        color: #4c4c4c;
        cursor: pointer;
        font-size: 16px;
    }

    .ca-get-feedback__form .csr-button-2.submit,
    .ca-get-feedback__form .csr-button-2.next {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .ca-get-feedback__form .csr-button-2.previous {
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .ca-get-feedback__form .csr-label-2 {
        font-size: 14px;
        padding: 0;
        width: 100%;
    }

    .ca-get-feedback__comments .csr-textarea-2 {
        margin-top: 10px;
        width: 100%;
    }

    .ca-get-feedback__comments-email {
        font-size: 11px;
    }

    .ca-get-feedback__rating .rating-list {
        border-left: 1px solid #4c4c4c;
        margin: 20px 0 0 0;
        padding: 0;

        list-style: none;
    }

    .ca-get-feedback__rating .rating-list li {
        border: 1px solid #4c4c4c;
        border-left: 0;
        float: left;
        width: 10%;

        cursor: pointer;
        line-height: 30px;
        list-style-type: none;
        text-align: center;
    }

    .ca-get-feedback__rating .rating-list li:hover {
        background: #eeeeee;
    }

    .ca-get-feedback__rating .rating-list li.active {
        background: #024d63;
        color: #ffffff;
    }

    .util-hidden {
        display: none;
    }

</style>


<div class="ca-get-feedback">
    <div class="ca-get-feedback__button">
        <i class="icon-commenting"></i>
        <span class="ca-get-feedback__button-text">Feedback</span>
    </div>
    <div class="ca-get-feedback__form-container util-hidden">
        <form action="" class="ca-get-feedback__form">
            <i class="icon-times-circle close-form-js"></i>
            <input type="hidden" name="score" class="csr-input-2 util-hidden" value="-1"/>
            <div class="ca-get-feedback__comments ">
                <label class="csr-label-2">What feedback do you have for us about this page?</label>
                <div class="ca-get-feedback__comments-email">For support requests, please email <a href="mailto:support@adyen.com">support@adyen.com</a></div>
                <textarea name="comment" class="csr-textarea-2"></textarea>
                <button type="button" class="csr-button-2 primary submit">Submit</button>
            </div>
            <div class="ca-get-feedback__thankyou util-hidden">
                Thank you for sharing your experiences.<br/>
                This window will close automatically in 5 seconds.            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    require( [ 'jquery', 'Constants', 'util/Ajax' ], function ( jq, Constants, Ajax ) {

        var form = jq( '.ca-get-feedback__form' ),
            button = jq( '.ca-get-feedback__button' ),
            formContainer = jq( '.ca-get-feedback__form-container' ),
            closeForm = jq( '.close-form-js' ),
            classHidden = 'util-hidden',
            classActive = 'active',
            ratingListItem = jq( '.rating-list li' ),
            ratingListItemCheckbox = ratingListItem.find( '.csr-input-checkbox-2' ),
            commentsContainer = jq( '.ca-get-feedback__comments' ),
            commentsButtonPrevious = commentsContainer.find( '.csr-button-2.previous' ),
            ratingContainer = jq( '.ca-get-feedback__rating' ),
            ratingButtonNext = ratingContainer.find( '.csr-button-2.next' ),
            submitButton = form.find( '.csr-button-2.submit' ),
            thankyouContainer = jq( '.ca-get-feedback__thankyou' );

        button.on( 'click', function () {
            formContainer.toggleClass( classHidden );
        } );

        closeForm.on( 'click', function () {
            formContainer.addClass( classHidden );
        } );

        ratingListItem.on( 'click', function () {
            var checkbox = jq( this ).find( '.csr-input-checkbox-2' );

            ratingListItemCheckbox.prop( 'checked', false );
            ratingListItem.removeClass( classActive );
            jq( this ).addClass( classActive );
            checkbox.prop( 'checked', true );
        } );

        commentsButtonPrevious.on( 'click', function () {
            commentsContainer.hide();
            ratingContainer.show();
        } );

        ratingButtonNext.on( 'click', function () {
            ratingContainer.hide();
            commentsContainer.show();
        } );

        submitButton.on( 'click', function () {

            var data = {
                "formHash" : "737vcK/GTrKHovCinpdzqw8TqaAaDM=",
                "pageUrl" : "/ca/ca/payments/showList.shtml"
            };
            commentsContainer.hide();
            thankyouContainer.show();

            var formData = form.serializeArray();

            while (formData.length > 0) {
                var item = formData.shift();
                if (item.name === 'score' || item.name === 'comment') {
                    data[item.name] = item.value;
                }
            }

            if (data.comment && data.pageUrl) {
                Ajax.post( "/ca/ca/customer-excellence/pagefeedback/submit.shtml", data );
            }

            setTimeout( function () {
                formContainer.addClass( classHidden );
                thankyouContainer.hide();
                commentsContainer.show();
            }, 5000 );
        } );

    } );
</script>

<div id="ca-topbar">
    <div class="iefillerdiv"></div>
</div>
<div id="ca-middlebarcontainer">
    <div id="ca-middlebar">
        <a href="/ca/ca/overview/default.shtml">
            <img id="ca-mainlogo" style="height: 55px" src="//ca-test.adyen.com/ca/css/csr/images/adyen-logo.condensed.hr.png?e057" alt="Logo" />
        </a>
        <img id="maintagline" src="//ca-test.adyen.com/ca/img/adyen_tagline.png?e057" alt="Wherever people pay" />
    </div>
</div>
<div id="ca-bottombar"><div id="ca-bottombar2"></div></div>


<script type="text/javascript">
    window.adyen && adyen.monitorActiveAccount && adyen.monitorActiveAccount(adyen.currentAccount="Company.FutureGame");
</script>
<div class="session">
    <ul class="link-list">
        <li class="link-userprofile">
            <div class="user-profile-icons">
                <i class="icon-user"></i>
            </div>
            <ul class="link-list-submenu">
                <li class="user-profile-name">
                    <i class="icon-sort-asc"></i>
                    admin
                </li>
                <li>
                    <a class="icon" href="/ca/ca/config/edituser.shtml?changeOwnCredentials=true"> <i class="icon-lock"></i> <span> User Account Details </span> </a>
                </li>
                <li class="link-logout">
                    <a class="icon" href="/ca/logoff.shtml" title="Sign Out"> <i class="icon-sign-out"></i> <span>Sign out</span> </a>
                </li>
                <li class="version-reference">
                    <a class="icon" href="/ca/ca/accounts/choose.shtml?chooseUserAccount=true"> <i class="icon-bookmark"></i><span>Bookmarks</span></a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<div id="power-search">
    <form action="#" class="power-search-container" method="post">
        <input type="hidden" name="formHash" value="145fSCuiO+yd58kZApByiEQKoj8ivw=" />
        <div class="power-search-query">
            <input type="search" accesskey="q" name="query" class="ps-new-query csr-input-2" id="ps-query" />
                        <span class="when-opened">
                                    <input type="submit" class="csr-button-2 secondary ps-search-button" value="search" />
                            </span>
        </div>
        <div class="power-search-tools when-opened">
            <div class="power-search-types">
            </div>
        </div>
    </form>
    <div class="power-search-inactive">
        <div class="power-search-options"></div>
        <div class="xpower-search-hint"></div>
    </div>
    <div style="display:none" class="template">
        <script type="text/template" id="ps-searchtype">
            <div class="ps-searchoption" data-type="searchType">
                <select name="searchType" class="csr-selectbox-2">
                    <option selected="selected" value="accountNumber">Account number/IBAN</option>
                    <option value="branchCode">Bank/Branch code</option>
                    <option value="description">Description</option>
                </select>
            </div>
        </script>
        <script type="text/template" id="ps-accountTypeCompany">
            <input type="hidden" id="accountTypeCode" name="accountTypeCode"  value="Company"/>
        </script>
        <script type="text/template" id="ps-accountTypeMerchantAccount">
            <input type="hidden" id="accountTypeCode" name="accountTypeCode"  value="MerchantAccount"/>
        </script>
        <script type="text/template" id="ps-offersearchtype">
            <select name="searchType" class="csr-selectbox-2"><option selected="selected" value="pspref">Psp reference</option><option value="merchantref">Merchant reference / Description</option><option value="email">Shopper e-mail</option></select>
        </script>
        <script type="text/template" id="ps-offertxtype">
            <select name="txTypeCode" class="csr-selectbox-2">
                <option value="Offer">Offer</option>
                <option value="Order">Order</option>
                <option value="Payment">Payment</option>
                <option value="Capture">Capture</option>
                <option value="Dispute">Dispute</option>
                <option value="DisputeEvent">DisputeEvent</option>
                <option value="BankInstruction">BankInstruction</option>
                <option value="BankStatement">BankStatement</option>
                <option value="CompanyPayout">CompanyPayout</option>
                <option value="MerchantPayout">MerchantPayout</option>
                <option value="EpaLine">EpaLine</option>
            </select>
        </script>
    </div>
    <div class="power-search-suggestions auto_complete" id="ps-suggestions"></div>
</div>
<div id="ca-merchantlogo">
    <a href="/ca/ca/accounts/manage.shtml"><img height="30" width="130" src="//ca-test.adyen.com/ca/ca/image.shtml?name=accountLogo&amp;mimeType=image%2Fpng&amp;cachingId=Company.FutureGame" alt="merchantlogo"/></a>
</div>
<div id="ca-notification-icon-dock">
</div>

<div class="csr-back" id="backlink">
    <a href="/ca/ca/overview/default.shtml" data-event="MAINNAVBACK">
        <i class="icon-chevron-left"></i>
        <span>Back</span>
    </a>
</div>

<div id="ca-accountnavigation" class="size-2" data-widget="ca/TopNavigation" data-add-bookmark="/ca/ca/config/modifyuseraccount.shtml?modification=add" data-remove-bookmark="/ca/ca/config/modifyuseraccount.shtml?modification=remove">
    <link rel="stylesheet" href="/ca/css/topnavigation.css?e057" type="text/css" />

    <div id="ca-top-navigation">

        <form action="/ca/ca/accounts/preferences/save.shtml" method="post" data-widget="ui/SavePreference">
            <input type="hidden" name="formHash" value="167T0oS2VEIvE3chKSyKNtFzmt2164=" />

            <div class="ca-topnav-account-level  no-alternatives" style="z-index:0">

                <div class="ca-topnav-button-wrapper with-panel ">

                    <a class="csr-button-2 border with-panel " href="/ca/ca/payments/showList.shtml?setActiveAccountKey=Company.FutureGame">




                        FutureGame

                        <i class="icon-chevron-right"></i>
                    </a>
                </div>


                <div class="ca-topnav-panel ">


                    <div class="ca-topnav-panel-column">


                        <div>
                            <a href="/ca/ca/payments/showList.shtml?setActiveAccountKey=MerchantAccount.FutureGameCOM">
                                FutureGameCOM
                            </a>
                        </div>
                    </div>



                    <div class="ca-toggle-stickynavigation csr-panel-content separated" id="ca-toggle-stickynavigation">
                        <input type="hidden" name="preferences.ca_sticky_navigation" value="yes" />
                        <button type="submit" class="csr-button csr-link-button">
                            <i class="icon-square-o csr-fcolor-grey"></i>
                            Stay in the same section when I change accounts
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>                </div>


<div id="ca-maincontent">
    <div id="ca-boxleft">



        <div id="menu">
            <ul class="nav">


                <li ><a href="/ca/ca/overview/default.shtml">Home</a></li>


                <li   class="activelink"  ><a href="/ca/ca/payments/showList.shtml">Payments</a></li>
                <!--

                <li ><a href="/ca/ca/accounts/choose.shtml">Accounts</a></li>

                <li ><a href="/ca/ca/reports/dashboard.shtml">Reports</a></li>



                <li ><a href="/ca/ca/disputes/showList.shtml">Disputes</a></li>



                <li ><a href="/ca/ca/skin/skins.shtml">Skins</a></li>

                <li ><a href="/ca/ca/config/choose.shtml">Settings</a></li>

                <li ><a href="/ca/ca/risk/choose.shtml">RevenueProtect</a></li>


                <li ><a href="/ca/ca/postfm/showposterminals.shtml?accountCode=FutureGame&amp;accountTypeCode=Company">Point-of-Sale</a></li>

                <li ><a href="/ca/ca/revenueaccelerate/overview.shtml">RevenueAccelerate</a></li>

                <li ><a href="/ca/ca/support/start.shtml">Support</a></li>
                -->
            </ul>


        </div>			</div>



    <div id="contentbg">
        <div id="content">
            <div id="contentwrapper">

                <div id="subcontent">
                    <h1 class="ca-pagetitle">Payment List			    	</h1>
                    <table class="data wide highlight csr-table csr-list-table csr-configurable-table">
                        <caption class="list-filter csr-list-filter">
                            <div class="csr-configuration-list util-float-left">
                                <a href="/ca/ca/payments/configurations.shtml">
                                    <i class="icon-pencil"></i>
                                    Manage configurations                </a>
                                | &nbsp;
                                <strong>Default</strong>
                                | &nbsp;
                                <a href="/ca/ca/payments/setConfiguration.shtml?configurationId=2755">POS</a>
                            </div>
                            <form method="post" action="/ca/ca/payments/modifySearch.shtml?uxEvent=PAYMENT_LIST_SEARCH"><span style="vertical-align: middle;  line-height: 2em; font-size: 0.9em">
            <input type="hidden" name="formHash" value="145fSCuiO+yd58kZApByiEQKoj8ivw=" />



				Page 1
							<b> | </b>
			<a href="/ca/ca/payments/showList.shtml?clearFilter=true">
                clear all filters
                <i class="icon-filter csr-fcolor-red"></i>
            </a>
			<b> | </b>

				<input id="spotlightsearchbox" type="text" size="25" name="query" placeholder="&lt;search for payments&gt;" />
				<button type="submit" class="csr-icon-button csr-button">
                    <i class="icon-search"></i>
                </button>
						<b> | </b>
			<a href="/ca/ca/download/payments/showList.shtml?exportcsv=true" title="maximum of 1000 records">
                download as CSV
                <i class="icon-file-o"></i>
            </a>
					</span></form>
                        </caption>
                        <thead>
                        <tr>
                            <th>
                                psp reference
                            </th>
                            <th>merchant reference</th>
                            <th>account</th>
                            <th title="">
                                <a href="/ca/ca/payments/modifyFilter.shtml?sortDirection=asc">
                                    <i class="icon-sort-asc" style="vertical-align: sub;"></i>
                                </a>
                                date
                                <a href="/ca/ca/payments/filterDate.shtml?resourceKeyPrefix=creationDate&amp;displayWildcard=false&amp;filterField=creationDate"
                                >
                                    <i class="icon-filter "></i>
                                </a>
                            </th>
                            <th colspan="2">amount</th>
                            <th>method
                                <a data-dialog="true" href="/ca/ca/payments/filterPMDetails.shtml?filterField=paymentDetails">
                                    <i class="icon-filter "></i>
                                </a>
                            </th>
                            <th>status
                                <a data-dialog="true" href="/ca/ca/payments/filterDropdown.shtml?resourceKeyPrefix=paymentStatus&amp;displayWildcard=false&amp;filterField=status">
                                    <i class="icon-filter "></i>
                                </a>
                            </th>
                            <th>fraud score
                                <a data-dialog="true" href="/ca/ca/payments/filterFraud.shtml?resourceKeyPrefix=fraud&amp;displayWildcard=false&amp;filterField=fraud">
                                    <i class="icon-filter "></i>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="paymentTable">
                        </tbody>


                    </table>
                    <p>
                        <b>No payments found for this account and the current filter settings.</b>
                    </p>


                </div>

                <div class="bbarl">
                    <div class="bbarr">
                        <div class="bbar">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>

