@extends("layouts.branda.appbranda")
@section('konten')
<section id="contact" class="contact section mt-5">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-5">

                <div class="info-wrap">
                    <div>
                        <h3>Badan Pengurus Cabang – Kota Mojokerto</h3>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Jl. Empunala No. 234, Kelurahan Kedundung, Kecamatan Magersari Kota Mojokerto – 61316
                            </p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Hubungi Kami</h3>
                            <p>081-552-211-24</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Kami</h3>
                            <p>hipmikotamojokerto@gmail.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1977.993550417629!2d112.4470894!3d-7.4666751!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e780d9480cde363%3A0x2ecdfeab6ceb4330!2sJl.%20Empunala%20No.234%2C%20Mergelo%2C%20Balongsari%2C%20Kec.%20Magersari%2C%20Kota%20Mojokerto%2C%20Jawa%20Timur%2061314!5e0!3m2!1sid!2sid!4v1741339475060!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="{{ route('email.send') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                @csrf    
                <div class="row gy-4">

                        <div class="col-md-6">
                            <label for="name-field" class="pb-2">Your Name</label>
                            <input type="text" name="name" id="name-field" class="form-control" required="">
                        </div>

                        <div class="col-md-6">
                            <label for="email-field" class="pb-2">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email-field" required="">
                        </div>

                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject-field" required="">
                        </div>

                        <div class="col-md-12">
                            <label for="message-field" class="pb-2">Message</label>
                            <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section>
@endsection