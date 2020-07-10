
     <address id="topPanel" class="top-panel">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-6 col-md-3 col-xl-2">
                    <a class="contact-link" href="tel:{{setting()->phone}}"><i class="fas fa-phone"></i> (02)-{{setting()->phone}}
                    </a>
                </div>
                <div class="col-6 col-md-3 text-right text-md-left">
                    <a class="contact-link" href="mailto:{{setting()->email}}" target="_blank">
                        <i class="far fa-envelope-open"></i> {{setting()->email}}
                    </a>
                </div>
                <div class="col-md-6 col-xl-7 text-md-right d-none d-md-block">
                    <a class="contact-link" href="http://maps.google.com/?q={{setting()->address}}" target="_blank">
                        <i class="fas fa-map-marker-alt"></i> {{setting()->address}}
                    </a>
                </div>
            </div>
        </div>
    </address>