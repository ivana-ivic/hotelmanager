<div>
	Dear {{ $bill->stay->guest->first_name }} {{ $bill->stay->guest->last_name }},

	For your stay in our hotel from {{ $bill->stay->check_in_time }}
	your bill is {{ $bill->amount }}

	Thank you for using our services
</div>