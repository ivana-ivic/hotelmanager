<script>
	function addToList()
	{
		var select = document.getElementById('service_select');
	    var li = document.createElement("li");
	    var inputService = document.createElement('input');
    	inputService.type = 'checkbox';
	    inputService.name = 'services[]';
	    selectedValue = select.options[select.selectedIndex].value;
	    inputService.value = selectedValue
	    inputService.checked = true;
	    var button = document.createElement("button");
	    li.textContent = selectedValue + ' ' +select.options[select.selectedIndex].text;
	    li.appendChild(inputService);
	    var inputQuantity = document.createElement('input');
	    inputQuantity.type = 'number';
	    inputQuantity.name = '';
	    inputQuantity.onchange = function(){changeQuantity(this)};
	    li.appendChild(inputQuantity);
	    button.innerHTML = 'Izbrisi';
	    button.onclick = function(){removeFromList(this)};
	    li.appendChild(button);
	    var lchosen = document.getElementById("list-chosen");
	    lchosen.appendChild(li)
	}

	function removeFromList(el)
	{
		var parent = el.parentNode;
		var remover = el.parentNode.parentNode;
		remover.removeChild(parent);
	}

	function changeQuantity(el)
	{
		var parent = el.parentNode;
		var changethis = parent.querySelector('input[name="services[]"]');
		var split = changethis.value.split(' ');
		var newvalue = split[0] + ' ' + el.value;
		changethis.value = newvalue;
	}
</script>