<!-- Facebook Pixel Code -->
    <noscript>
            @foreach($pixels as $pixel)
                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?= $pixel ?>&ev=PageView&noscript=1"/>
            @endforeach
    </noscript>
<!-- Facebook Pixel Code End -->