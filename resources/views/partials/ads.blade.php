<!-- DT Ads -->
<div class="panel panel-default">
    <div class="panel-body">
        <ins class="adsbygoogle"
             style="display:block;"
             data-ad-client="{{$client or env('ADS_CLIENT')}}"
             data-ad-slot="{{$slot or env('ADS_SLOT_BOX')}}"
             data-ad-format="auto"></ins>
    </div>
</div>

@push('scripts')
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
@endpush
