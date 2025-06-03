<section id="contact">
    <div class="container-fluid">

        <div class="section-header">
            <h3>Contact Us</h3>
        </div>

        <div class="row wow fadeInUp">

            <div class="col-lg-5">
                <div class="map mb-4 mb-lg-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-5 info">
                        <i class="ion-ios-location-outline"></i>
                        <p>[Insert office location, if applicable]</p>
                    </div>
                    <div class="col-md-4 info">
                        <i class="ion-ios-email-outline"></i>
                        <p>support@propertyscroller.com</p>
                    </div>
                    <div class="col-md-3 info">
                        <i class="ion-ios-telephone-outline"></i>
                        <p>+91-XXXXXXXXXX</p>
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