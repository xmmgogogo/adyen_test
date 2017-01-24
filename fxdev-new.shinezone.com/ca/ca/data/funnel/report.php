<?php
require __DIR__ . "/../../../../functions/Reports.php";
header("Content-type: application/json;charset=UTF-8");

# params
/**
 *  format:JSON
    startdate:2017-01-01
    enddate:2017-02-01
    granularity:1 day
    formHash:079EGtbQ6u2SEXB2bAeCe250nYanlY=
    cb:1484878936096
 */
$extrude = [
    "Final Settled",
    "Chargeback Reversed",
    "Refund Reversed",
    "Settled",
    "Sent For Settlement",
    "Authorised",
    "Received"
];

$dashBoardInfo = statDashboard();

$sessionData   = [
    'API'      => (int)$dashBoardInfo['API'],
    'HPP'      => (int)$dashBoardInfo['HPP'],
    'Abandoned'=> (int)$dashBoardInfo['Abandoned']
];
$acquireData   = [
    'Received' => (int)$dashBoardInfo['Received'],
    'Refused'  => (int)$dashBoardInfo['Refused'],
    'Error'    => (int)$dashBoardInfo['Error']
];
$authoriseData = [
    'Authorised' => (int)$dashBoardInfo['Authorised'],
    'Cancelled'  => (int)$dashBoardInfo['Cancelled'],
    'Expired'    => (int)$dashBoardInfo['Expired'],
];
$settleData    = [
    'Sent'     => (int)$dashBoardInfo['Sent'],
    'Settled'  => (int)$dashBoardInfo['Settled'],
    'Pre'      => 0,
    'Awaiting' => (int)($dashBoardInfo['Sent'] - $dashBoardInfo['Settled']),
    'Final'    => (int)$dashBoardInfo['FinalSettled'],
    'Chargeback'         => (int)$dashBoardInfo['Chargeback'],
    'ChargebackReversed' => (int)$dashBoardInfo['ChargebackReversed'],
    'Refunded'           => (int)$dashBoardInfo['Refunded'],
    'RefundReversed'     => (int)$dashBoardInfo['RefundReversed'],
];

$sessions = [
    [
        'journaltypecode' => 'API',
        'count' => 0,
        'registertype' => 'Sessions',
        'order' => 18,
        'main' => 'FALSE',
        'start' => 0,
        'end' => 0,
        'numsiblings' => 5,
        'description' => 'Payment requests sent to Adyen via an API call.',
    ],[
        'journaltypecode' => 'HPP',
        'count' => 0,
        'registertype' => 'Sessions',
        'order' => 17,
        'main' => 'FALSE',
        'start' => 0,
        'end' => 0,
        'numsiblings' => 5,
        'description' => 'Payment sessions initiated via a Hosted Payment Page (HPP)',
    ],[
        'journaltypecode' => 'Abandoned',
        'count' => 0,
        'registertype' => 'Sessions',
        'order' => 16,
        'main' => 'FALSE',
        'start' => 0,
        'end' => 0,
        'numsiblings' => 5,
        'description' => 'HPP sessions in which the shopper did not complete the payment process.',
    ]
];
foreach($sessions as $ssKey => $session) {
    if ($session['journaltypecode'] == 'API') {
        $sessions[$ssKey]['count'] = (int)$sessionData['API'];
        $sessions[$ssKey]['start'] = 0;
        $sessions[$ssKey]['end']   = (int)$sessionData['API'];
    } else if ($session['journaltypecode'] == 'HPP') {
        $sessions[$ssKey]['count'] = (int)$sessionData['HPP'];
        $sessions[$ssKey]['start'] = (int)$sessionData['API'];
        $sessions[$ssKey]['end']   = (int)($sessionData['API'] + $sessionData['HPP']);
    } else if ($session['journaltypecode'] == 'Abandoned') {
        $sessions[$ssKey]['count'] = $sessionData['Abandoned'];
        $sessions[$ssKey]['start'] = $sessionData['API'] + $sessionData['HPP'] - $sessionData['Abandoned'];
        $sessions[$ssKey]['end']   = $sessionData['API'] + $sessionData['HPP'];
    }
}
$acquireInfo = [
    [
        'journaltypecode' => 'Received',
        'count' => 13604,
        'registertype' => 'Conversion',
        'order' => 15,
        'main' => 'TRUE',
        'start' => 0,
        'end' => 13604,
        'numsiblings' => 3,
        'description' => 'Registration of a validated payment attempt.<br/>This is the initial state for all payments.',
    ], [
        'journaltypecode' => 'Refused',
        'count' => 79,
        'registertype' => 'Conversion',
        'order' => 14,
        'main' => 'FALSE',
        'start' => 13525,
        'end' => 13604,
        'numsiblings' => 3,
        'description' => 'The payment was declined by the financial institution.<br/>The payment is also refused if the fraud score exceeds 99 points.<br/>This is a final state.',
    ] , [
        'journaltypecode' => 'Error',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 13,
        'main' => 'FALSE',
        'start' => 13525,
        'end' => 13525,
        'numsiblings' => 3,
        'description' => 'A payment attempt was validated and received correctly, but an error occurred while communicating with the financial institution.<br/>The payment is assigned an error state.<br/>This is a final state.',
    ]
];
foreach($acquireInfo as $aaKey => $acquire)
{
    if ($acquire['journaltypecode'] == 'Received') {
        $acquireInfo[$aaKey]['count'] = $acquireData['Received'];
        $acquireInfo[$aaKey]['start'] = 0;
        $acquireInfo[$aaKey]['end']   = $acquireData['Received'];
    } else if ($acquire['journaltypecode'] == 'Refused') {
        $acquireInfo[$aaKey]['count'] = $acquireData['Refused'];
        $acquireInfo[$aaKey]['start'] = $acquireData['Received'] - $acquireData['Refused'];
        $acquireInfo[$aaKey]['end']   = $acquireData['Received'];
    } else if ($acquire['journaltypecode'] == 'Error') {
        $acquireInfo[$aaKey]['count'] = $acquireData['Error'];
        $acquireInfo[$aaKey]['start'] = $acquireData['Received'] - $acquireData['Refused'] - $acquireData['Error'];
        $acquireInfo[$aaKey]['end']   = $acquireData['Received'] - $acquireData['Refused'];
    }
}

$authoriseInfo = [
    [
        'journaltypecode' => 'Authorised',
        'count' => 9551,
        'registertype' => 'Conversion',
        'order' => 12,
        'main' => 'TRUE',
        'start' => 0,
        'end' => 9551,
        'numsiblings' => 3,
        'description' => 'The payment is approved by the financial institution.<br/>This state serves as an indicator to proceed with the delivery of goods and services.',
    ],
    [
        'journaltypecode' => 'Cancelled',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 11,
        'main' => 'FALSE',
        'start' => 9551,
        'end' => 9551,
        'numsiblings' => 3,
        'description' => 'A cancellation blocks funds transfer for an authorised payment.<br/>It is possible to cancel a payment only if it has not yet reached the SentForSettle state.<br/>You can submit a cancellation with a modification API call, or in the payment detail page in the Adyen Customer Area (CA).<br/>This is a final state.',
    ],
    [
        'journaltypecode' => 'Expired',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 10,
        'main' => 'FALSE',
        'start' => 9551,
        'end' => 9551,
        'numsiblings' => 3,
        'description' => 'When an authorised payment is still open after 4 weeks, i.e. it has not been cancelled or captured, it is automatically set to Expired.<br/>When a payment reaches the Expired state, it is no longer possible to capture it to transfer funds.<br/>This is a final state.',
    ],
];
foreach($authoriseInfo as $aaKey => $authorise)
{
    if ($authorise['journaltypecode'] == 'Authorised') {
        $authoriseInfo[$aaKey]['count'] = $authoriseData['Authorised'];
        $authoriseInfo[$aaKey]['start'] = 0;
        $authoriseInfo[$aaKey]['end']   = $authoriseData['Authorised'];
    } else if ($authorise['journaltypecode'] == 'Cancelled') {
        $authoriseInfo[$aaKey]['count'] = $authoriseData['Cancelled'];
        $authoriseInfo[$aaKey]['start'] = $authoriseData['Authorised'] - $authoriseData['Cancelled'];
        $authoriseInfo[$aaKey]['end']   = $authoriseData['Authorised'];
    } else if ($authorise['journaltypecode'] == 'Expired') {
        $authoriseInfo[$aaKey]['count'] = $authoriseData['Expired'];
        $authoriseInfo[$aaKey]['start'] = $authoriseData['Authorised'] - $authoriseData['Expired'];
        $authoriseInfo[$aaKey]['end']   = $authoriseData['Authorised'];
    }
}

$settleInfo = [
    [
        'journaltypecode' => 'Sent For Settlement',
        'count' => 9551,
        'registertype' => 'Conversion',
        'order' => 8,
        'main' => 'TRUE',
        'start' => 0,
        'end' => 9551,
        'numsiblings' => 6,
        'description' => 'The request for transferring the funds has been sent to the financial institution.<br/>When a payment reaches the SentForSettle state, it is no longer possible to cancel it.<br/>The only way to reverse the payment is to refund it. Depending on the payment method used in the transaction, it may or not be possible to carry out a refund.<br/>Only Authorised payments can change their state to SentForSettle state. Payments can transition to SentForSettle in one of the following ways:<br/><ul><li>By sending a capture request call via the modification API.</li><li>In the payment detail page in the Adyen Customer Area (CA).</li><li>By enabling the auto-capture feature in the Adyen Customer Area (CA).</li><li>This is the default option.</li></ul>',
    ], [
        'journaltypecode' => 'Pre Settlement',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 9,
        'main' => 'FALSE',
        'start' => 9551,
        'end' => 9551,
        'numsiblings' => 5,
        'description' => 'The payment is approved by the financial institution but not yet sent for settlement.',
    ],[
        'journaltypecode' => 'Settled',
        'count' => 11560,
        'registertype' => 'Conversion',
        'order' => 6,
        'main' => 'TRUE',
        'start' => 0,
        'end' => 11560,
        'numsiblings' => 6,
        'description' => 'The financial institution has transferred the funds to Adyen.',
    ], [
        'journaltypecode' => 'Chargeback',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 3,
        'main' => 'FALSE',
        'start' => 11560,
        'end' => 11560,
        'numsiblings' => 6,
        'description' => 'The payment is reversed by the bank, scheme or consumer.',
    ], [
        'journaltypecode' => 'Chargeback Reversed',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 2,
        'main' => 'TRUE',
        'start' => 11560,
        'end' => 11560,
        'numsiblings' => 6,
        'description' => '',
    ], [
        'journaltypecode' => 'Refunded',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 5,
        'main' => 'FALSE',
        'start' => 11560,
        'end' => 11560,
        'numsiblings' => 6,
        'description' => 'The financial institution has completed the reimbursement to the shopper.',
    ], [
        'journaltypecode' => 'Refund Reversed',
        'count' => 0,
        'registertype' => 'Conversion',
        'order' => 4,
        'main' => 'TRUE',
        'start' => 11560,
        'end' => 11560,
        'numsiblings' => 6,
        'description' => '',
    ],[
        'journaltypecode' => 'Awaiting Settlement',
        'count' => -2009,
        'registertype' => 'Conversion',
        'order' => 7,
        'main' => 'FALSE',
        'start' => 11560,
        'end' => 9551,
        'numsiblings' => 6,
        'description' => 'The payment is is sent for settlement and but not yet settled.',
    ], [
        'journaltypecode' => 'Final Settled',
        'count' => 11560,
        'registertype' => 'Conversion',
        'order' => 1,
        'main' => 'TRUE',
        'start' => 0,
        'end' => 11560,
        'numsiblings' => 5,
        'description' => '',
    ]
];
foreach($settleInfo as $aaKey => $settle)
{
    if ($settle['journaltypecode'] == 'Settled') {
        $settleInfo[$aaKey]['count'] = $settleData['Settled'];
        $settleInfo[$aaKey]['start'] = 0;
        $settleInfo[$aaKey]['end']   = $settleData['Settled'];
    } else if ($settle['journaltypecode'] == 'Sent For Settlement') {
        $settleInfo[$aaKey]['count'] = $settleData['Sent'];
        $settleInfo[$aaKey]['start'] = 0;
        $settleInfo[$aaKey]['end']   = $settleData['Sent'];
    }  else if ($settle['journaltypecode'] == 'Final Settled') {
        $settleInfo[$aaKey]['count'] = $settleData['Final'];
        $settleInfo[$aaKey]['start'] = 0;
        $settleInfo[$aaKey]['end']   = $settleData['Final'];
    } else if ($settle['journaltypecode'] == 'Awaiting Settlement') {
        $settleInfo[$aaKey]['count'] = $settleData['Awaiting'];
        $settleInfo[$aaKey]['start'] = $settleData['Sent'] - $settleData['Awaiting'];
        $settleInfo[$aaKey]['end']   = $settleData['Sent'];
    } else if ($settle['journaltypecode'] == 'Pre Settlement') {
        $settleInfo[$aaKey]['count'] = $settleData['Pre'];
        $settleInfo[$aaKey]['start'] = $settleData['Sent'] - $settleData['Pre'];
        $settleInfo[$aaKey]['end']   = $settleData['Sent'];
    } else if ($settle['journaltypecode'] == 'Chargeback') {
        $settleInfo[$aaKey]['count'] = $settleData['Chargeback'];
        $settleInfo[$aaKey]['start'] = $settleData['Settled'] - $settleData['Chargeback'];
        $settleInfo[$aaKey]['end']   = $settleData['Settled'];
    } else if ($settle['journaltypecode'] == 'Chargeback Reversed') {
        $settleInfo[$aaKey]['count'] = $settleData['ChargebackReversed'];
        $settleInfo[$aaKey]['start'] = $settleData['Settled'] - $settleData['ChargebackReversed'];
        $settleInfo[$aaKey]['end']   = $settleData['Settled'];
    } else if ($settle['journaltypecode'] == 'Refunded') {
        $settleInfo[$aaKey]['count'] = $settleData['Refunded'];
        $settleInfo[$aaKey]['start'] = $settleData['Settled'] - $settleData['Refunded'];
        $settleInfo[$aaKey]['end']   = $settleData['Settled'];
    } else if ($settle['journaltypecode'] == 'Refund Reversed') {
        $settleInfo[$aaKey]['count'] = $settleData['RefundReversed'];
        $settleInfo[$aaKey]['start'] = $settleData['Settled'] - $settleData['RefundReversed'];
        $settleInfo[$aaKey]['end']   = $settleData['Settled'];
    }
}

//echo '{"PaymentFunnelResults":[{"journaltypecode":"HPP","count":14790,"registertype":"Sessions","order":17,"main":"FALSE","start":19,"end":14809,"numsiblings":5,"description":"Payment sessions initiated via a Hosted Payment Page (HPP)"},{"journaltypecode":"Abandoned","count":1205,"registertype":"Sessions","order":16,"main":"FALSE","start":13604,"end":14809,"numsiblings":5,"description":"HPP sessions in which the shopper did not complete the payment process."},{"journaltypecode":"Refused","count":79,"registertype":"Conversion","order":14,"main":"FALSE","start":13525,"end":13604,"numsiblings":3,"description":"The payment was declined by the financial institution.<br\/>The payment is also refused if the fraud score exceeds 99 points.<br\/>This is a final state."},{"journaltypecode":"Sent For Settlement","count":13525,"registertype":"Conversion","order":8,"main":"TRUE","start":0,"end":13525,"numsiblings":6,"description":"The request for transferring the funds has been sent to the financial institution.<br\/>When a payment reaches the SentForSettle state, it is no longer possible to cancel it.<br\/>The only way to reverse the payment is to refund it. Depending on the payment method used in the transaction, it may or not be possible to carry out a refund.<br\/>Only Authorised payments can change their state to SentForSettle state. Payments can transition to SentForSettle in one of the following ways:<br\/><ul><li>By sending a capture request call via the modification API.<\/li><li>In the payment detail page in the Adyen Customer Area (CA).<\/li><li>By enabling the auto-capture feature in the Adyen Customer Area (CA).<\/li><li>This is the default option.<\/li><\/ul>"},{"journaltypecode":"Authorised","count":13525,"registertype":"Conversion","order":12,"main":"TRUE","start":0,"end":13525,"numsiblings":3,"description":"The payment is approved by the financial institution.<br\/>This state serves as an indicator to proceed with the delivery of goods and services."},{"journaltypecode":"Received","count":13604,"registertype":"Conversion","order":15,"main":"TRUE","start":0,"end":13604,"numsiblings":3,"description":"Registration of a validated payment attempt.<br\/>This is the initial state for all payments."},{"journaltypecode":"Settled","count":13457,"registertype":"Conversion","order":6,"main":"TRUE","start":0,"end":13457,"numsiblings":6,"description":"The financial institution has transferred the funds to Adyen."},{"journaltypecode":"Cancelled","count":0,"registertype":"Conversion","order":11,"main":"FALSE","start":13525,"end":13525,"numsiblings":3,"description":"A cancellation blocks funds transfer for an authorised payment.<br\/>It is possible to cancel a payment only if it has not yet reached the SentForSettle state.<br\/>You can submit a cancellation with a modification API call, or in the payment detail page in the Adyen Customer Area (CA).<br\/>This is a final state."},{"journaltypecode":"Expired","count":0,"registertype":"Conversion","order":10,"main":"FALSE","start":13525,"end":13525,"numsiblings":3,"description":"When an authorised payment is still open after 4 weeks, i.e. it has not been cancelled or captured, it is automatically set to Expired.<br\/>When a payment reaches the Expired state, it is no longer possible to capture it to transfer funds.<br\/>This is a final state."},{"journaltypecode":"Chargeback","count":0,"registertype":"Conversion","order":3,"main":"FALSE","start":13457,"end":13457,"numsiblings":6,"description":"The payment is reversed by the bank, scheme or consumer."},{"journaltypecode":"Chargeback Reversed","count":0,"registertype":"Conversion","order":2,"main":"TRUE","start":13457,"end":13457,"numsiblings":6,"description":""},{"journaltypecode":"Refunded","count":0,"registertype":"Conversion","order":5,"main":"FALSE","start":13457,"end":13457,"numsiblings":6,"description":"The financial institution has completed the reimbursement to the shopper."},{"journaltypecode":"Refund Reversed","count":0,"registertype":"Conversion","order":4,"main":"TRUE","start":13457,"end":13457,"numsiblings":6,"description":""},{"journaltypecode":"Error","count":0,"registertype":"Conversion","order":13,"main":"FALSE","start":13525,"end":13525,"numsiblings":3,"description":"A payment attempt was validated and received correctly, but an error occurred while communicating with the financial institution.<br\/>The payment is assigned an error state.<br\/>This is a final state."},{"journaltypecode":"Pre Settlement","count":0,"registertype":"Conversion","order":9,"main":"FALSE","start":13525,"end":13525,"numsiblings":5,"description":"The payment is approved by the financial institution but not yet sent for settlement."},{"journaltypecode":"Awaiting Settlement","count":68,"registertype":"Conversion","order":7,"main":"FALSE","start":13457,"end":13525,"numsiblings":6,"description":"The payment is is sent for settlement and but not yet settled."},{"journaltypecode":"Final Settled","count":13457,"registertype":"Conversion","order":1,"main":"TRUE","start":0,"end":13457,"numsiblings":5,"description":""},{"journaltypecode":"API","count":19,"registertype":"Sessions","order":18,"main":"FALSE","start":0,"end":19,"numsiblings":5,"description":"Payment requests sent to Adyen via an API call."}]}';die;
echo json_encode(['PaymentFunnelResults' => array_merge($settleInfo, $acquireInfo, $sessions, $authoriseInfo)]);die;