@extends('layouts.master_frontend')

@section('contain')
    <section class="sec-wrapper contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="info-heading"><i class="fas fa-phone"></i> <span>Phone</span></div>
                            <p>Tel: <a href="tel: +20 010 251 789 18">+20 010 251 789</a></p>
                            <p>Mobile: <a href="tel: +20 051 789 184">+20 051 789 184</a></p>
                        </div>

                        <div class="contact-item">
                            <div class="info-heading"><i class="far fa-envelope"></i> <span>Email</span></div>
                            <p><a href="mailto: info@khdev.com">info@khdev.com</a></p>
                        </div>

                        <div class="contact-item">
                            <div class="info-heading"><i class="fas fa-map-marked-alt"></i> <span>Location</span></div>
                            <p>St. 163, Khan Chamkarmorn, Sangkat Olympic, Phnom Penh, Cambodia</p>
                        </div>

                        <div class="contact-item">
                            <div class="info-heading"><i class="fas fa-user-plus"></i> <span>Follow Us</span></div>
                            <div class="social-link">
                                <ul>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <form id="contact-form" action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="full-name" placeholder="Full Name *" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Phone (Optional)">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message *" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>

            </div>

            <div id="map" data-lat="11.5884488" data-lng="104.9280824"></div>

        </div>
    </section>
@endsection

@section('extra_footer')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0o6F-bPMA18xpjMdovCBRkYa8ibh-83k"></script>
@endsection