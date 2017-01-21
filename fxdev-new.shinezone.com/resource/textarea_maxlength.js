function setMaxLength() {
	var x = document.getElementsByTagName('textarea');
	var counter = document.createElement('div');
	//counter.className = 'textarea_counter';
	counter.className = 'ten_px';
	for (var i=0;i<x.length;i++) {
		if (x[i].getAttribute('maxlength')) {
			var counterClone = counter.cloneNode(true);
			counterClone.relatedElement = x[i];
			counterClone.innerHTML = '<span>0</span>/'+x[i].getAttribute('maxlength');
			x[i].parentNode.insertBefore(counterClone,x[i].nextSibling);
			x[i].relatedElement = counterClone.getElementsByTagName('span')[0];

			x[i].onkeyup = x[i].onchange = checkMaxLength;
			x[i].onkeyup();
		}
	}
}

function textareaSetMaxLength(t) {
	var counter = document.createElement('div');
	counter.className = 'ten_px';
	if (t.getAttribute('maxlength')) {
		var counterClone = counter.cloneNode(true);
		counterClone.relatedElement = t;
		counterClone.innerHTML = '<span>0</span>/'+t.getAttribute('maxlength');
		t.parentNode.insertBefore(counterClone,t.nextSibling);
		t.relatedElement = counterClone.getElementsByTagName('span')[0];

		t.onkeyup = t.onchange = checkMaxLength;
		t.onkeyup();
	}
}

function checkMaxLength() {
	var maxLength = this.getAttribute('maxlength');
	var currentLength = this.value.length;
	if (currentLength > maxLength)
		this.value = this.value.substring(0, maxLength);
	this.relatedElement.firstChild.nodeValue = this.value.length;
	// not innerHTML
}