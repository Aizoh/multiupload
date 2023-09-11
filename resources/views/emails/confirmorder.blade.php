
<x-mail::message>
    # Order Shipped{{$confirmorder->name}}
    
    Your order has been Confirmed!
    
    Order description 
    {{$confirmorder->description}}
    
<x-mail::button :url="route('sendemail')">
Send Email
</x-mail::button>
    Thanks,
    {{ config('app.name') }}
</x-mail::message>



