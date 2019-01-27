<script>
	function addToList()
	{
		var select = document.getElementById('service_select');
	    var li = document.createElement("li");
	    var button = document.createElement("button");
	    li.textContent = select.options[select.selectedIndex].value + ' ' +select.options[select.selectedIndex].text;
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
</script>