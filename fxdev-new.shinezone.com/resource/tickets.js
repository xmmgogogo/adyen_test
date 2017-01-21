var DeveloperTickets = Class.create({
	initialize: function(controller, reasons, opt, refundReasons) {
		this.controller = controller;
		this.reasons = $H(reasons);
		this.refundReasons = $H(refundReasons);
		this.id = 'ticket';
		this.formId = this.id + '_form';
		this.messageId = this.id + '_message';
		this.reasonId = this.id + '_reason';
		this.refundReasonId = this.id + '_refund_reason';
		this.submitId = this.id + '_submit';
		this.errorId = this.id + '_error';
		this.successId = this.id + '_success';
		this.closerId = this.id + '_closer';
		this.reasonTypeRefund = 1;
		this.reason = 0;
		this.refundReason = 'not_provided';
		this.showReason = true;
		this.messageRequired = false;

		if (typeof opt != 'undefined') {
			if (typeof opt.reason != 'undefined') {
				this.reason = opt.reason;
			}
			
			if (typeof opt.showReason != 'undefined') {
				this.showReason = opt.showReason;
			}

			if (typeof opt.showReason != 'undefined') {
				this.messageRequired = opt.messageRequired;
			}
		}
	},
	setReason: function(reason) {
		this.reason = reason;
	},
	setShowReason: function(showReason) {
		this.showReason = showReason;
	},
	show: function(refId, refType, applicationId, control) {
		this.clearForm(true);
		this.refId = refId;
		this.refType = refType;
		this.applicationId = applicationId;
		
		if (!$(this.id)) {
			$(document.body).insert(this.buildHtml());
			
			$(this.closerId).observe('click', this.close.bindAsEventListener(this));
			$(this.submitId).observe('click', this.save.bindAsEventListener(this));
			textareaSetMaxLength($(this.messageId));
		}
		else {
			$(this.id).show();
			$(this.formId).show();
		}
		
		var controlOffset = $(control).cumulativeOffset();
		this.handleReasonSelect();
		return false;
	},
	close: function(e) {
		e.stop();
		$(this.id).hide();
		return false;
	},
	save: function() { 
		var m = $F(this.messageId);
		var reason = $F(this.reasonId);
		var refundReason = $F(this.refundReasonId);
		if (true) {
			var ref = this;
			new Ajax.Request(this.controller + '/add-ticket', {
				parameters:{'data[message]':m,'data[cl_id]':this.refId,'data[cl_type]':this.refType,'data[reason]':reason,'id':this.applicationId,'data[refund_reason]':refundReason},
				onSuccess: function(t) {
					var d = t.responseText.evalJSON();
					if (d.result == 1) {
						if (d.cl_id == ref.refId) {
							ref.showSuccess(d);
						}
					}
					else {
						ref.showError(d.error);
					}
				}
			});
		}
	},
	showSuccess: function(data) {
		this.clearForm(true);
		if (!$(this.successId)) {
			$(this.formId).insert({before: this.buildSuccessContainerHtml()});
		}
		$(this.successId).update(this.buildSuccessHtml(data));
		$(this.successId).show();
		$(this.formId).hide();
		
		var actionsContainer = $('actions_' + this.refType + '_' + this.refId);
		if (actionsContainer) {
			if(!$('list_' + this.refId)) {
				actionsContainer.insert(this.buildSuccessActionHtml(data));
			}
			else {
				$('list_' + this.refId).remove();
				actionsContainer.insert(this.buildSuccessActionsHtml(data));
			}
		}
	},
	showError: function(error) {
		this.clearForm(false);
		if (!$(this.errorId)) {
			$(this.formId).insert({top: this.buildErrorContainerHtml()});
		}
		$(this.errorId).update(this.buildErrorHtml(error));
		$(this.errorId).show();
	},
	buildHtml: function() {

		var reasons = '';
		var refundReasons = '';
		var reason = this.reason;
		var refundReason = this.refundReason;
		this.reasons.each(function(r){
			reasons += '<option value="' + r[0] + '"' + (reason == r[0] ? ' SELECTED' : '' ) + '>' + r[1] + '</option>';
		});
		this.refundReasons.each(function(r){
			refundReasons += '<option value="' + r[0] + '"' + (refundReason == r[0] ? ' SELECTED' : '' ) + '>' + r[1] + '</option>';
		});
		var h = '<div class="popup inquiry" id="' + this.id + '">' + 
			'<div class="in">' + 
				
				'<b class="clearb"></b>' + 
				'<h2>'+_tx('Add ticket')+'</h2>' + '<a href="#" id="' + this.closerId + '" alt="close" title="close" class="close">Cancel</a>' + 
				'<div id="' + this.formId + '">' +
					'<div ' + (this.showReason != true ? ' style="display: none; padding-top: 20px;"' : 'style="padding-top: 35px;"') + '><strong>'+_tx('Type')+':</strong><br />' + 
					'<select style="margin-top:15px;" id="' + this.reasonId + '" >' + reasons + '</select><br /></div>' +
					'<select style="margin-bottom: 15px;" id="' + this.refundReasonId + '" >' + refundReasons + '</select><br /></div>' +
					'<strong>' +  ( this.messageRequired ? _tx('Message') : _tx('Message (optional)') ) + ':</strong>' + 
					'<textarea style="margin-top:15px;" id="' + this.messageId + '" maxlength="1000"></textarea>' + 
					'<input type="submit" value="'+_tx("Send")+'" class="floatr but" id="' + this.submitId + '"><b class="clearb"></b>' + 
				'</div>' + 
			'</div></div>';
		return h;
	},
	buildSuccessHtml: function(data) {
		var h = '<div class="message_area_success">';
		if (data.message) {
			h += data.message;
		}
		else {
			h += _tx("Ticket has been added");
		}
		h += '</div>';
		h += '<b class="clearb"></b>';
		return h;
	},
	buildSuccessContainerHtml: function() {
		return '<div id="' + this.successId + '"></div>';
	},
	buildSuccessActionsHtml: function(data) {
		var h = '<a href="' + this.controller + '/tickets?search[s]=1&id=' + this.applicationId + ' &search[ref_id]=' + data.ref_id + '" target="_blank" id="list_' + data.cl_id + '">'+_tx("View tickets")+'</a>';
		return h;
	},
	buildSuccessActionHtml: function(data) {
		var h = '<a href="' + this.controller + '/ticket?tid=' + data.id + '" target="_blank" id="list_' + data.cl_id + '">'+_tx("View ticket")+'</a>';
		return h;		
	},
	buildErrorHtml: function(error) {
		var h = '<div class="message_area_error">';
		if (error[1]) {
			h += '<ul style="margin:0;padding:0">';
			error.each(function(e){
				h += '<li>' + e + '</li>';
			});
			h += '</ul>';
		}
		else {
			h += error[0];
		}
		h += '</div>';
		h += '<b class="clearb"></b>';
		return h;
	},
	buildErrorContainerHtml: function() {
		return '<div id="' + this.errorId + '"></div>';
	},
	clearForm: function(clearValue) {
		if ($(this.errorId)) {
			$(this.errorId).update();
			$(this.errorId).hide();
		}
		if ($(this.successId)) {
			$(this.successId).update();
			$(this.successId).hide();
		}
		if (clearValue) {
			if ($(this.messageId))
				$(this.messageId).value = '';
		}
	},
	handleReasonSelect: function(){
		var ref = this;
		$(ref.reasonId).observe('change', function(){
			if (this.getValue() == ref.reasonTypeRefund){
				$(ref.refundReasonId).show();
			} else {
				$(ref.refundReasonId).hide();
			}
		});
	}
});

function _tx(source) {
	return source;
}