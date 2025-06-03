<section id="contact">
    <div class="container-fluid">

        <div class="section-header">
            <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

            <div class="col-lg-5">
                <div class="map mb-4 mb-lg-0">
                    <img src="assets/img/contact.jpg" class="img-fluid" style="border:0; width: 100%; height: 400px;" alt="">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-5 info">
                        <i class="ion-ios-location-outline"></i>
                        <p>B-5 DEEP BULDING GROUND FLOOR BEHIND D-MART KALYAN WEST-421301 MUMBAI</p>
                    </div>
                    <div class="col-md-4 info">
                        <i class="ion-ios-email-outline"></i>
                        <p><a href="mailto:support@propertyscroller.com">support@propertyscroller.com</a></p>
                    </div>
                    <div class="col-md-3 info">
                        <i class="ion-ios-telephone-outline"></i>
                        <p><a href="tel:+919227015296">+91-9227015296</a></p>
                    </div>
                </div>
                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="{{route('addContact')}}" method="post" class="contactForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" />
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" />
                                @error('email')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone_number" placeholder="Enter your Phone Number" />
                                @error('phone_number')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section><!-- #contact -->