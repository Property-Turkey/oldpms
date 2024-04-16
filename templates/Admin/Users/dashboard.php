<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome Pro -->
    <!-- <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css"
    /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="css/all.css" />
    <title>Dubai</title>
  </head>
  <body>
    <!-- Headr -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasRight"
          aria-controls="offcanvasRight"
          class="fa-solid fa-bars"
        ></i>
      
      </button>
        <a class="navbar-brand" href="#"
          ><img src="img/Logo.svg" alt="logo"
        /></a>
        <div class="hidden">
          <div class="dropdown">
            
            <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><img src="img/00_Icons/dollar_gold.svg" alt="svg"></a>
            <ul class="dropdown-menu">
              <li></li>

            </ul>
          </div>
          <a href="#"><img src="img/00_Icons/07_Phone.svg" alt="svg"></a>
        </div>
       
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasRight"
          aria-labelledby="offcanvasRightLabel"
        >
          <div class="offcanvas-header">
            <i
              class="fa-solid fa-xmark"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></i>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Properties</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Resale</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Developers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>

            <div class="big-btn">
              <select class="form-select" aria-label="Default select example">
                <option selected>$</option>
                <option value="1"></option>
             
              </select>
              <button
                class="btn-big-gold"
                data-bs-toggle="modal"
                data-bs-target="#contactModal"
              >
                <img src="img/00_Icons/15_FreeCon +.svg" alt="svg" /> FREE
                CONSULTATION
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Headr -->
    <!-- Start Hero -->
    <section class="hero">
      <div class="container">
        <div class="content">
          <div class="left">
            <h1 class="title">HIGH INCOME REAL ESTATE IN UAE</h1>
            <div class="btns">
              <button class="gold-btn dark-gold-btn"   data-bs-toggle="modal"
              data-bs-target="#contactModal">LEAVE A REQUEST</button>
            </div>
          </div>
          <div class="right" id="Right">
            <div class="icon">
              <img id="close-icon" src="img/00_Icons/03_close.svg" alt="close" />
            </div>
            <nav>
              <div class="nav btn-group" id="nav-tab" role="tablist">
                <button
                  class="nav-link active"
                  id="Primary-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#Primary"
                  type="button"
                  role="tab"
                  aria-controls="Primary"
                  aria-selected="true"
                >
                  Primary
                </button>
                <button
                  class="nav-link"
                  id="Secondary-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#Secondary"
                  type="button"
                  role="tab"
                  aria-controls="Secondary"
                  aria-selected="false"
                >
                  Secondary
                </button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade show active"
                id="Primary"
                role="tabpanel"
                aria-labelledby="Primary-tab"
                tabindex="0"
              >
                <form action="">
                  <div class="inputs">
                    <div class="input">
                      <p>City</p>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>Dubai</option>
                      </select>
                    </div>
                    <div class="input">
                      <p>Property Type</p>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>Apartment</option>
                      </select>
                    </div>
                    <div class="input">
                      <p>Bedrooms</p>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>2</option>
                      </select>
                    </div>
                  </div>
                  <div class="btm">
                    <div class="top">
                      <p>Price Range</p>
                      <ul>
                        <li class="active">USD</li>
                        <li>EUR</li>
                        <li>AED</li>
                        <li>GBP</li>
                      </ul>
                    </div>
                    <div class="body">
                      <div class="inpt">
                        <input type="text" placeholder="Min 100,000" />
                      </div>
                      <div class="inpt">
                        <input type="text" placeholder="Max 1,000,000" />
                      </div>
                    </div>
                    <div class="btns">
                      <button class="gold-btn dark-gold-btn">
                        Show 111 Properites
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div
                class="tab-pane fade"
                id="Secondary"
                role="tabpanel"
                aria-labelledby="Secondary-tab"
                tabindex="0"
              >
                <form action="">
                  <div class="inputs">
                    <div class="input">
                      <p>City</p>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>Dubai</option>
                      </select>
                    </div>
                    <div class="input">
                      <p>Property Type</p>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>Apartment</option>
                      </select>
                    </div>
                    <div class="input">
                      <p>Bedrooms</p>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected>2</option>
                      </select>
                    </div>
                  </div>
                  <div class="btm">
                    <div class="top">
                      <p>Price Range</p>
                      <ul>
                        <li><a href="#" class="active">USD</a></li>
                        <li><a href="#">EUR</a></li>
                        <li><a href="#">AED</a></li>
                        <li><a href="#">GBP</a></li>
                      </ul>
                    </div>
                    <div class="body">
                      <div class="inpt">
                        <input type="text" placeholder="Min 100,000" />
                      </div>
                      <div class="inpt">
                        <input type="text" placeholder="Max 1,000,000" />
                      </div>
                    </div>
                    <div class="btns">
                      <button class="gold-btn dark-gold-btn">
                        Show 111 Properites
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="over-lay"></div>
      <!-- <div class="image">
        <img src="img/01_Hero.webp" class="mw-100" alt="background" />
      </div> -->
    </section>
    <!-- End Hero -->

    <!-- Start Featured -->
    <section class="featured">
      <div class="container">
        <div class="sec-title gold">
          <h1>Featured</h1>
        </div>
      </div>
      <div class="container-fluid">
        <div class="owl-carousel owl-theme" id="nonloop">
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
          <div class="item">
            <p class="top">
              Apartment in<br />Executive Towers<br />Business Bay Dubai
            </p>
            <div class="image">
              <div class="overlay"></div>
              <img src="img/02_CardImage.webp" alt="text" />
            </div>
            <div class="text">
              <h1>$625,000</h1>
              <div class="icons">
                <p>
                  <img src="img/00_Icons/Location_white.svg" alt="svg" /> Dubai
                </p>
                <p><img src="img/00_Icons/beds_white.svg" alt="svg" /> 1+1</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="btm">
          <div class="content">
            <h1>
              Do you need help finding<br />The perfect assets for your
              investment?
            </h1>
            <div class="btns">
              <button class="gold-btn big-btn">GET A PERSONAL OFFER</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Featured -->
    <!-- Start Developers -->
    <section class="featured" id="developer">
      <div class="container">
        <div class="sec-title gold">
          <h1>Developers</h1>
        </div>
      </div>
      <div class="container-fluid">
        <div class="owl-carousel owl-theme" id="nonloop2">
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
          <div class="item">
            <p class="top">Developer Name</p>
            <div class="image">
              <div class="over-lay"></div>
              <img src="img/03_DeveloperCards.webp" alt="text" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Developers -->
    <!-- Start News -->
    <section class="news">
      <div class="container">
        <div class="sec-title gold">
          <h1>News</h1>
        </div>
      </div>
      <div class="contaier-fluid">
        <div class="owl-carousel owl-theme" id="News">
          <div class="item" data-merge="1">
            <div class="image">
              <img src="img/02_CardImage.webp" alt="test" />
            </div>
            <div class="item-body">
              <div class="text">
                <strong>05.03.2024</strong>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Necessitatibus delectus nam, in libero, accusantium voluptatum
                  ex veniam nesciunt, iusto totam quidem et fugiat asperiores.
                  Nam harum provident id incidunt eius odio voluptate blanditiis
                  unde molestias modi itaque, ipsa quibusdam accusantium
                  voluptatum ad laboriosam vitae sequi amet aspernatur dolorem!
                  Et corporis laudantium tenetur deserunt amet suscipit iusto
                  soluta eum doloremque animi iste omnis dolorum, ea ducimus.
                </p>
              </div>

              <a href="#">Learn more</a>
            </div>
          </div>
          <div class="item" data-merge="1">
            <div class="image">
              <img src="img/02_CardImage.webp" alt="test" />
            </div>
            <div class="item-body">
              <div class="text">
                <strong>05.03.2024</strong>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Necessitatibus delectus nam, in libero, accusantium voluptatum
                  ex veniam nesciunt, iusto totam quidem et fugiat asperiores.
                  Nam harum provident id incidunt eius odio voluptate blanditiis
                  unde molestias modi itaque, ipsa quibusdam accusantium
                  voluptatum ad laboriosam vitae sequi amet aspernatur dolorem!
                  Et corporis laudantium tenetur deserunt amet suscipit iusto
                  soluta eum doloremque animi iste omnis dolorum, ea ducimus.
                </p>
              </div>

              <a href="#">Learn more</a>
            </div>
          </div>
          <div class="item" data-merge="1">
            <div class="image">
              <img src="img/02_CardImage.webp" alt="test" />
            </div>
            <div class="item-body">
              <div class="text">
                <strong>05.03.2024</strong>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Necessitatibus delectus nam, in libero, accusantium voluptatum
                  ex veniam nesciunt, iusto totam quidem et fugiat asperiores.
                  Nam harum provident id incidunt eius odio voluptate blanditiis
                  unde molestias modi itaque, ipsa quibusdam accusantium
                  voluptatum ad laboriosam vitae sequi amet aspernatur dolorem!
                  Et corporis laudantium tenetur deserunt amet suscipit iusto
                  soluta eum doloremque animi iste omnis dolorum, ea ducimus.
                </p>
              </div>

              <a href="#">Learn more</a>
            </div>
          </div>
          <div class="item" data-merge="1">
            <div class="image">
              <img src="img/02_CardImage.webp" alt="test" />
            </div>
            <div class="item-body">
              <div class="text">
                <strong>05.03.2024</strong>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Necessitatibus delectus nam, in libero, accusantium voluptatum
                  ex veniam nesciunt, iusto totam quidem et fugiat asperiores.
                  Nam harum provident id incidunt eius odio voluptate blanditiis
                  unde molestias modi itaque, ipsa quibusdam accusantium
                  voluptatum ad laboriosam vitae sequi amet aspernatur dolorem!
                  Et corporis laudantium tenetur deserunt amet suscipit iusto
                  soluta eum doloremque animi iste omnis dolorum, ea ducimus.
                </p>
              </div>

              <a href="#">Learn more</a>
            </div>
          </div>
          <div class="item" data-merge="1">
            <div class="image">
              <img src="img/02_CardImage.webp" alt="test" />
            </div>
            <div class="item-body">
              <div class="text">
                <strong>05.03.2024</strong>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Necessitatibus delectus nam, in libero, accusantium voluptatum
                  ex veniam nesciunt, iusto totam quidem et fugiat asperiores.
                  Nam harum provident id incidunt eius odio voluptate blanditiis
                  unde molestias modi itaque, ipsa quibusdam accusantium
                  voluptatum ad laboriosam vitae sequi amet aspernatur dolorem!
                  Et corporis laudantium tenetur deserunt amet suscipit iusto
                  soluta eum doloremque animi iste omnis dolorum, ea ducimus.
                </p>
              </div>

              <a href="#">Learn more</a>
            </div>
          </div>
          <div class="item" data-merge="1">
            <div class="image">
              <img src="img/02_CardImage.webp" alt="test" />
            </div>
            <div class="item-body">
              <div class="text">
                <strong>05.03.2024</strong>
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Necessitatibus delectus nam, in libero, accusantium voluptatum
                  ex veniam nesciunt, iusto totam quidem et fugiat asperiores.
                  Nam harum provident id incidunt eius odio voluptate blanditiis
                  unde molestias modi itaque, ipsa quibusdam accusantium
                  voluptatum ad laboriosam vitae sequi amet aspernatur dolorem!
                  Et corporis laudantium tenetur deserunt amet suscipit iusto
                  soluta eum doloremque animi iste omnis dolorum, ea ducimus.
                </p>
              </div>

              <a href="#">Learn more</a>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="btm">
          <div class="left">
            <div class="sec-title gold">
              <h1>Let us help you<br />Make the right decision</h1>
            </div>
          </div>
          <div class="right">
            <form action="">
              <div class="input">
                <label for="Name" class="form-label">Name*</label>
                <input type="text" class="form-control" id="Name" />
                
              </div>
              <div class="input">
                <label for="Phone" class="form-label">Phone Number*</label>
                <input type="phone" class="form-control" id="Phone" />
              </div>
              <div class="input">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" />
              </div>

              <div class="btns">
                <button class="gold-btn">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End News -->
    <!-- Start Footer -->
    <footer>
      <div class="container">
        <div class="boxs">
          <div class="box">
            <div class="logo"><img src="img/Logo.svg" alt="logo" /></div>
            <div class="links">
              <img src="img/00_Icons/16_Footer_Icons/ig.svg" alt="link" />
              <img src="img/00_Icons/16_Footer_Icons/fb.svg" alt="link" />
              <img src="img/00_Icons/16_Footer_Icons/yt.svg" alt="link" />
              <img src="img/00_Icons/16_Footer_Icons/linkedin.svg" alt="link" />
              <img src="img/00_Icons/16_Footer_Icons/twitter.svg" alt="link" />
            </div>
          </div>
          <div class="box">
            <div class="title">
              <strong>Quick Links</strong>
            </div>
            <div class="sections">
              <a href="#">About us</a>
              <a href="#">Terms and Conditions</a>
              <a href="#">Privacy Policy</a>
              <a href="#">Contact us</a>
            </div>
          </div>
          <div class="box">
            <div class="title">
              <strong>Contact</strong>
            </div>
            <div class="text">
              <p>info@elitehomes.ae</p>
              <p>+971 56 875 6310</p>
            </div>
          </div>
          <div class="box">
            <div class="title">
              <strong>Address</strong>
            </div>
            <div class="text">
              <p>Office No. 1214, Burlington Tower,</p>
              <p>Business Bay, Dubai</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <!-- ContactModal -->
    <div
      class="modal fade modal-form"
      id="contactModal"
      tabindex="-1"
      aria-labelledby="contactModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
            <img src="img/00_Icons/03_close.svg" alt="close">
          </button>

          </div>
          <div class="modal-body">
            <p>Please leave your contact information,<br>our experts will contact you shortly</p>
            <form action="" id="form_1">
              <div class="input">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" >
               
              </div>
              <div class="input phone">
                <div class="inline_input" data-bs-target="#countryModal2" data-bs-toggle="modal" data-bs-dismiss="modal">
                  <img src="img/png100px/tr.png" title="placeholder" alt="TR" id="countryImg">
                  <i class="fa-solid fa-angle-down"></i>
                  <input type="tel" name="zip" id="zip" value="+90" maxlength="4">
                 </div>
                <label for="PhoneNumber" class="form-label">Phone Number*</label>
                <input type="phone" class="form-control" id="PhoneNumber" >
              </div>
              <div class="input">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" >
              </div>
              <div class="btns">
                <button class="gold-btn dark-gold-btn" data-bs-target="#lastModal" data-bs-toggle="modal" data-bs-dismiss="modal">
                  Send
                </button>
              </div>
            </form>
          </div>
       
        </div>
      </div>
    </div>
       <!-- End ContactModal -->
       <!-- CountryList Modal -->
       <div class="modal fade" id="countryModal2" aria-hidden="true" aria-labelledby="countryModalLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            
            <div class="modal-body" data-bs-target="#contactModal" data-bs-toggle="modal" data-bs-dismiss="modal">
              <div class="countriesList" id="countriesList">
                <ul></ul>
            </div>
            </div>
           
          </div>
        </div>
      </div>
       <!-- End CountryList Modal -->
       <!-- Last Modal -->
       <div class="modal fade modal-form" id="lastModal" tabindex="-1" aria-labelledby="lastModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            
              <button
              type="button"
              class="btn"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
            <img src="img/00_Icons/03_close.svg" alt="close">
          </button>
            </div>
            <div class="modal-body">
              <div class="text">
                <h1>Thank you</h1>
                <p>our experts will contact you shortly</p>
              </div>
            </div>
          
          </div>
        </div>
      </div>
       <!-- End Last Modal -->
    <script src="js/all.js"></script>
    <script>
      $(document).ready(function () {
        getCountries();
        $("#close-icon").click(function(){
        $("#Right").css("display", "none");
        // console.log($("#Right"));
  });
      });
      function getCountries(tar) {
        $.getJSON("js/countries.json", function (res) {
          var html = "";
          for (var i in res) {
            html +=
              "<li onclick=\"setVal('" +
              res[i].val +
              "|" +
              res[i].code +
              '\')"><img src="img/png100px/' +
              ("bq,cw,gg,im,je,xk,bl,mf,sx,ss".indexOf(res[i].code) > -1
                ? "noimg"
                : res[i].code) +
              '.png" title="' +
              res[i].cname +
              '" alt="' +
              res[i].cname +
              '" /> ' +
              res[i].cname +
              "</li>";
          }
          $(tar || "#countriesList ul").html(html);
        }).fail(function () {
          console.log("ERROR: countriesList not loaded!.");
        });
      }
      var form_target = "#form_1";

      function setVal(val, tar) {
        if (!tar) {
          tar = form_target;
        }
        !val ? (val = COUNTRY.calling_code + "|" + COUNTRY.country_code2) : val;
        val = val.split("|");

        if (tar == "all") {
          $("#form_mdl #zip").val(val[0]);
          $("#form_mdl #countryImg").attr(
            "src",
            "img/png100px/" + val[1] + ".png"
          );
          $("#form_1 #zip").val(val[0]);
          $("#form_1 #countryImg").attr(
            "src",
            "img/png100px/" + val[1] + ".png"
          );
          $("#form_2 #zip").val(val[0]);
          $("#form_2 #countryImg").attr(
            "src",
            "img/png100px/" + val[1] + ".png"
          );
        } else {
          $(tar + " #zip").val(val[0]);
          $(tar + " #countryImg").attr(
            "src",
            "img/png100px/" + val[1] + ".png"
          );
          $(tar + " #phone").focus();
        }
      }


    </script>
  </body>
</html>
