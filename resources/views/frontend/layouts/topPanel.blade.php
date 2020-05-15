    <!-- Top panel - contact info -->
    <address id="topPanel" class="top-panel">
      <div class="container">
          <div class="row no-gutters">
              <div class="col-md-3">
                  <a class="contact-link" href="tel:{{setting()->phone}}"><i class="fas fa-phone"></i> (02)-{{setting()->phone}}
                  </a>
              </div>
              <div class="col-md-3">
                  <a class="contact-link" href="mailto:{{setting()->email}}" target="_blank">
                      <i class="far fa-envelope-open"></i> {{setting()->email}}
                  </a>
              </div>
              <div class="col-md-6 text-md-right">
                  <a class="contact-link" href="http://maps.google.com/?q={{setting()->address}}" target="_blank">
                      <i class="fas fa-map-marker-alt"></i> {{setting()->address}}
                  </a>
              </div>
          </div>
      </div>
  </address>