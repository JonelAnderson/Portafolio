@extends('layouts.app')

@section('content')
  <!-- ===== Main Container Start ===== -->
  <div class="main-container">
    <!-- ===== Aside Start ===== -->
    <div class="aside">
      <div class="logo">
        <a href="#"><span>A</span>nders</a>
      </div>
      <div class="nav-toggler">
        <span></span>
      </div>
      <ul class="nav">
        <li ><a href="#home" class="active"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#about" ><i class="fa fa-user"></i> About</a></li>
        <li><a href="#services" ><i class="fa fa-list"></i>Services</a></li>
        <li><a href="#portfolio" ><i class="fa fa-briefcase"></i>Portafolio</a></li>
        <li><a href="#contact" ><i class="fa fa-comments"></i>Contact</a></li>
      </ul>
    </div>
    <!-- ===== Aside End ===== -->
    <!-- ===== Main Content Start ===== -->
    <div class="main-content">
      <!-- ===== Home Section Start ===== -->
      <section class="home section" id="home">
        <div class="container">
          <div class="row">
            <div class="home-info padd-15">
              <h3 class="hello">Hello, my name is <span class="name">{{$home->nombre}}</span></h3>
              <h3 class="my-profession">I' m a <span class="typing">web designer</span></h3>
              <p>{{$home->descripcion}}</p>
              <a href="#contact" class="btn hire-me">Hire Me</a>
            </div>
            <div class="home-img padd-15">
              <img src="/images/home/{{$home->imagen}}" alt="">
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Home Section End ===== -->
      <!-- ===== About Section Start ===== -->
      <section class="about section" id="about">
        <div class="container">
          <div class="row">
            <div class="section-title padd-15">
              <h2>About Me</h2>
            </div>
          </div>
          <div class="row">
            <div class="about-content padd-15">
              <div class="row">
                <div class="about-text padd-15">
                  <h3>I'm {{$home->nombre}} and I'm a <span>{{$about->title}}</span></h3>
                  <p>{{$about->description}}.</p>
                </div>
              </div>
              <div class="row">
                <div class="personal-info padd-15">
                  <div class="row">
                    <div class="info-item padd-15">
                      <p>Website : <span>{{$about->website}}</span></p>
                    </div>
                    <div class="info-item padd-15">
                      <p>Email : <span>{{$about->email}}</span></p>
                    </div>
                    <div class="info-item padd-15">
                      <p>Degree : <span>{{$about->degree}}</span></p>
                    </div>
                    <div class="info-item padd-15">
                      <p>Phone : <span>+{{$about->phone}}</span></p>
                    </div>
                    <div class="info-item padd-15">
                      <p>City : <span>{{$about->city}}</span></p>
                    </div>
                    <div class="info-item padd-15">
                      <p>Freelance : <span>{{$about->freelance}}</span></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="buttons padd-15">
                      <a href="/download-pdf" class="btn">Download CV</a>
                      <a href="#contact" class="btn hire-me">Hire Me</a>
                    </div>
                  </div>
                </div>
                <div class="skills padd-15">
                  <div class="row">
                    <div class="skill-item padd-15">
                      <h5>JS</h5>
                      <div class="progress">
                        <div class="progress-in" style="width: 86%;"></div>
                        <div class="skill-percent">86%</div>
                      </div>
                    </div>
                    <div class="skill-item padd-15">
                      <h5>PHP</h5>
                      <div class="progress">
                        <div class="progress-in" style="width: 66%;"></div>
                        <div class="skill-percent">66%</div>
                      </div>
                    </div>
                    <div class="skill-item padd-15">
                      <h5>HTML</h5>
                      <div class="progress">
                        <div class="progress-in" style="width: 96%;"></div>
                        <div class="skill-percent">96%</div>
                      </div>
                    </div>
                    <div class="skill-item padd-15">
                      <h5>Angular</h5>
                      <div class="progress">
                        <div class="progress-in" style="width: 76%;"></div>
                        <div class="skill-percent">76%</div>
                      </div>
                    </div>
                    <div class="skill-item padd-15">
                      <h5>Laravel</h5>
                      <div class="progress">
                        <div class="progress-in" style="width: 80%;"></div>
                        <div class="skill-percent">80%</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="education padd-15">
                  <h3 class="title">Education</h3>
                  <div class="row">
                    <div class="timeline-box padd-15">
                      <div class="timeline shadow-dark">
                        <!-- ===== timeline item ===== -->
                        @foreach($educations as $item)
                        <div class="timeline-item">
                          <div class="circle-dot"></div>
                          <h3 class="timeline-date">
                            <i class="fa fa-calendar"></i>{{$item->period}}
                          </h3>
                          <h4 class="timeline-title">{{$item->title}}</h4>
                          <p class="timeline-text">{{$item->description}}</p>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="experience padd-15">
                  <h3 class="title">Experience</h3>
                  <div class="row">
                    <div class="timeline-box padd-15">
                      <div class="timeline shadow-dark">
                        <!-- ===== timeline item ===== -->
                        @foreach($experiences as $item)
                        <div class="timeline-item">
                          <div class="circle-dot"></div>
                          <h3 class="timeline-date">
                            <i class="fa fa-calendar"></i>{{$item->period}}
                          </h3>
                          <h4 class="timeline-title">{{$item->title}}</h4>
                          <p class="timeline-text">{{$item->description}}</p>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== About Section End ===== -->
      <!-- ===== Services Section Start ===== -->
      @include('service')
      <!-- ===== Services Section End ===== -->
      <!-- ===== Portfolio Section Start ===== -->
      <section class="portfolio section" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="section-title padd-15">
              <h2>Portfolio</h2>
            </div>
          </div>
          <div class="row">
            <div class="portfolio-heading padd-15">
              <h2>My Last Projects :</h2>
            </div>
          </div>
          <div class="row">
            <!-- ====== portfolio item start ====== -->
            @foreach($portafolios as $portaf)
            <div class="portfolio-item padd-15">
              <div class="portfolio-item-inner shadow-dark">
                <div class="portfolio-img">
                  <img src="images/portfolio/{{$portaf->photo}}" alt="">
                  <div class="centrado"><p><h2>{{$portaf->title}}</h2> {{$portaf->description}}</p></div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- ====== portfolio item End ====== -->
          </div>
        </div>
      </section>
      <!-- ===== Portfolio Section End ===== -->
      <!-- ===== Contact Section Start ===== -->
      <section class="contact section" id="contact">
        <div class="container">
          <div class="row">
            <div class="section-title padd-15">
              <h2>Contact Me</h2>
            </div>
          </div>
          <h3 class="contact-title padd-15">Have You Any Questions ?</h3>
          <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
          <div class="row">
            <!-- ===== Contact info item start ====== -->
            <div class="contact-info-item padd-15">
              <div class="icon"><i class="fa fa-phone"></i></div>
              <h4>Call Us On</h4>
              <p>+{{$about->phone}}</p>
            </div>
            <!-- ===== Contact info item end ====== -->
             <!-- ===== Contact info item start ====== -->
             <div class="contact-info-item padd-15">
              <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
              <h4>Office</h4>
              <p>{{$about->city}}</p>
            </div>
            <!-- ===== Contact info item end ====== -->
             <!-- ===== Contact info item start ====== -->
             <div class="contact-info-item padd-15">
              <div class="icon"><i class="fa fa-envelope"></i></div>
              <h4>Email</h4>
              <p><a href="mailto:{{$about->email}}">{{ $about->email }}</a></p>
            </div>
            <!-- ===== Contact info item end ====== -->
             <!-- ===== Contact info item start ====== -->
             <div class="contact-info-item padd-15">
              <div class="icon"><i class="fa fa-globe-europe"></i></div>
              <h4>Website</h4>
              <p><a  href="https://{{$about->website}}" target="_blank">{{ $about->website }}</a></p>
            </div>
            <!-- ===== Contact info item end ====== -->
          </div>
          <h3 class="contact-title padd-15">SEND ME AN EMAIL</h3>
          <h4 class="contact-sub-title padd-15">I'M VERY RESPOSIVE TO MESSAGES</h4>
          <!-- ====== Contact Form ====== -->
          @if (\Session::has('success'))
            <div class="alert alert-success" style="background-color: floralwhite; text-align:center;">
                <ul>
                    <li>{{\Session::get('success')}}</li>
                </ul>
            </div>
        @endif
            <div class="row formulario">
              <div class="col-6 message">
                <form action="{{url('contacto')}}" method="post" autocomplete="off">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="contact-form padd-15">
                        <div class="row">
                            <div class="form-item col-6 padd-15">
                              <div class="form-group">
                                  <input type="text" name="name" class="form-control" placeholder="Name" required>
                              </div>
                            </div>
                            <div class="form-item col-6 padd-15">
                              <div class="form-group">
                                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-12 padd-15">
                              <div class="form-group">
                                  <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-12 padd-15">
                              <div class="form-group">
                                  <textarea name="message" class="form-control" id=""  placeholder="Message" required></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-12 padd-15">
                            <button type="submit" class="btn">Send Message</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-6">
                <div class="mapa">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8263.138958215106!2d-76.00461300229097!3d-9.297275307784231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a641893b93a2c9%3A0xc1cdbb44b0668e30!2sTingo%20Mar%C3%ADa%2010131!5e0!3m2!1ses-419!2spe!4v1644384466830!5m2!1ses-419!2spe" width="540" height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
        </div>
      </section>
      <!-- ===== Contact Section End ===== -->
    </div>
    <!-- ===== Main Content End ===== -->
  </div>
  <!-- ===== Main Container End ===== -->
  <!-- ===== Style Switcher Start ===== -->

  <div class="style-switcher">
    <div class="style-switcher-toggler s-icon">
      <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
      <i class="fas "></i>
    </div>
    <h4>Theme Colors</h4>
    <div class="colors">
      <span class="color-1" onclick="setActiveStyle('color-1')"></span>
      <span class="color-2" onclick="setActiveStyle('color-2')"></span>
      <span class="color-3" onclick="setActiveStyle('color-3')"></span>
      <span class="color-4" onclick="setActiveStyle('color-4')"></span>
      <span class="color-5" onclick="setActiveStyle('color-5')"></span>
    </div>
  </div>
  <a href="https://api.whatsapp.com/send?phone=5195508107&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20un%20sitio%20web." class="float" target="_blank" title="¿Podemos ayudarlo?">
    <i class='bx bxl-whatsapp my-float'></i>
  </a>
    <!--<a href="https://www.facebook.com/messages/" target="_blank" class="messenger" title="Contactame por Messenger">
        <i class='bx bxl-messenger my-Messenger'></i>
    </a>-->


  <!-- ===== Style Switcher End ===== -->
  @endsection
