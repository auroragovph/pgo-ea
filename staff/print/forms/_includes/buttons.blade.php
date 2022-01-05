<button class="btn btn-default btn-xs"><i class="fas fa-receipt"></i> Receipt</button>

<a href="{{ route('fms.documents.cancel.form', ['qrcode' => $qrcode, 'referer' => url()->current()]) }}" class="btn btn-default btn-xs"><i class="fas fa-ban"></i> Cancel</a>

<a 
    href="{{ route('fms.documents.track', ['qrcode' => $qrcode]) }}"
    target="_blank"
    class="btn btn-default btn-xs">
        <i class="fas fa-search"></i> 
        Track
</a>
