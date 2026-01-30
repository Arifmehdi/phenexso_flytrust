<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body text-center">
                <img  class="w3-100 w3-round" src="{{ route('imagecache', [ 'template'=>'cpxxxs','filename' => $ws->logo() ]) }}" alt="kdsbdLogo">
                <address>
                {{$ws->website_title}}<br>
                {{$ws->contact_address}}<br>
                Phone: {{$ws->contact_mobile}}<br>
                Email: {{$ws->contact_email}}
                </address>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
            <address>
                <strong>Order Info</strong><br>
                Order Id: {{$order->id}}<br>
                Order Date: {{$order->created_at->format('d/m/Y')}}<br>
                Order By: {{$order->user->name ?? ''}} ({{$order->user->mobile ?? ''}})<br>
                Email: {{$order->user->mobile ?? ''}}<br>
      
                
            </address>
            </div>
        </div>
    </div>
</div>