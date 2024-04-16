

    <!-- Headr -->
    <nav class="navbar navbar-expand-lg page2">
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
          >
          
          <?= $this->Html->image('/img/Logo.svg', ['alt' => 'logo']) ?>
          
          <!-- <img src="img/Logo.svg" alt="logo" />--></a>
        <div class="hidden">
          <div class="dropdown">
            
            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                
            <?= $this->Html->image('/img/00_Icons/dollar_gold.svg', ['alt' => 'svg']) ?>
<!--             
            <img src="img/00_Icons/dollar_gold.svgg" alt="svg"> -->
        </a>
            <ul class="dropdown-menu">
              <li></li>

            </ul>
          </div>
          <a href="#">
            
          <?= $this->Html->image('/img/00_Icons/07_Phone.svg', ['alt' => 'svg']) ?>
          
          <!-- <img src="img/00_Icons/07_Phone.svgg" alt="svg"> -->
        
        </a>
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
              <?= $this->Html->image('/img/00_Icons/15_FreeCon.svg', ['alt' => 'svg']) ?>
                <!-- <img src="img/00_Icons/15_FreeCon +.svgg" alt="svg" />  -->
                FREE
                CONSULTATION
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Headr -->
    <!-- Start Page2 Content -->
    <section class="paga-content">
      <div class="container">
        <div class="content">
          <div class="form-col">
            <form action="" id="top">
              <div class="input location">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search"
                />

                <?= $this->Html->image('/img/00_Icons/04_Location.svg', ['alt' => 'svg']) ?>
                <!-- <img src="img/00_Icons/04_Location.svgg" alt="icon" /> -->
              </div>
              <div class="input hidden">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Property Type</option>
                  <option value="1"></option>
                </select>
              </div>
              <div class="input hidden">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Beds and Baths</option>
                  <option value="1"></option>
                </select>
              </div>
              <div class="input hidden">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Price (USD)</option>
                  <option value="1"></option>
                </select>
              </div>
              <div class="input filter">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Filters</option>
                  <option value="1"></option>
                </select>
              </div>
            </form>
            <div class="left">
              <h1>Properties for Sale in Dubai</h1>
              <div class='left-p'>
                <p>Dubai (10)</p>
                <p>Sharjah (10)</p>
                <p>Abu Dhabi (10)</p>
              </div>
              </div>
              <div class="right">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Sort by</option>
                  <option value="1"></option>
                </select>
                <button class="map">
                <?= $this->Html->image('/img/00_Icons/06_map.svg', ['alt' => 'svg']) ?>
                  <!-- <img src="img/00_Icons/06_map.svgg" alt="icon" />  -->
                  Map
                </button>
              </div>
           
            <!-- <div class="page-head">
               <div class="btm">
             
            </div>
            </div> -->
          </div>
          <div class="boxs">
            <div class="box">
              <div class="image">
                <?= $this->Html->image('/img/00_Icons/04_CardImage.svg', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svgg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'beds']) ?>
                <!-- <img src="img/00_Icons/05_beds.svgg" alt="beds" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'beds']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="beds" /> 1 to 4</p> -->
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.svg', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'beds']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="beds" /> -->
                 1 to 4</p>
              </div>
            </div>
          </div>
          <div id="carouselExm" class="carousel slide">
            <div class="container">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="content">
                    <h1>Ready to invest in Dubai? What is your Badget?</h1>
                    <div class="btns">
                      <button
                        class="badget"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        Up to $100,000
                      </button>
                      <button
                        class="badget"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        Up to $200,000
                      </button>
                      <button
                        class="badget"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        Up to $400,000
                      </button>
                      <button
                        class="badget last"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        Up to $1M
                      </button>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="content">
                    <h1>How Many Bedrooms?</h1>
                    <div class="btns bedroom">
                      <button
                        class="badget bedroom"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        studio
                      </button>
                      <button
                        class="badget bedroom"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        1
                      </button>
                      <button
                        class="badget bedroom"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        2
                      </button>
                      <button
                        class="badget bedroom"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        3
                      </button>
                      <button
                        class="badget bedroom"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        4
                      </button>
                      <button
                        class="badget bedroom"
                        data-bs-target="#carouselExm"
                        data-bs-slide="next"
                      >
                        5+
                      </button>
                    </div>
                    <span
                      class="arrow"
                      data-bs-target="#carouselExm"
                      data-bs-slide="prev"
                    >
                    <?= $this->Html->image('/img/00_Icons/14_leftArrow.svg', ['alt' => 'icon']) ?>
                      <!-- <img src="img/00_Icons/14_leftArrow.svg" alt="icon" /> -->
                    </span>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="content">
                    <h1>We Have a Range or Options for you.</h1>
                    <form action="" id="form_1">
                      <div class="inputs">
                        <div class="input">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Name"
                          />
                        </div>
                        <div class="input phone">
                          <div
                            class="inline_input"
                            data-bs-target="#countryModal2"
                            data-bs-toggle="modal"
                            data-bs-dismiss="modal"
                          >
                          <?= $this->Html->image('/img/png100px/tr.png', ['alt' => 'TR', 'title' => 'placeholder', 'id' => 'countryImg']) ?>
                            <!-- <img
                              src="img/png100px/tr.png"
                              title="placeholder"
                              alt="TR"
                              id="countryImg" -->
                            />
                            <i class="fa-solid fa-angle-down"></i>
                            <input
                              type="tel"
                              name="zip"
                              id="zip"
                              value="+90"
                              maxlength="4"
                            />
                          </div>
                          <input type="phone" class="form-control" />
                        </div>
                      </div>
                      <button class="call"  data-bs-target="#carouselExm"
                      data-bs-slide="next">
                      <?= $this->Html->image('/img/00_Icons/07_Phone.svg', ['alt' => 'Phone']) ?>
                        <!-- <img src="img/00_Icons/07_Phone.svg" alt="Phone" />  -->
                        Call
                        me
                      </button>
                    </form>
                    <span
                      class="arrow"
                      data-bs-target="#carouselExm"
                      data-bs-slide="prev"
                    >
                    <?= $this->Html->image('/img/00_Icons/14_leftArrow.svg', ['alt' => 'icon']) ?>
                      <!-- <img src="img/00_Icons/14_leftArrow.svg" alt="icon" /> -->
                    </span>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="content">
                    <h1>Thank you!</h1>
                   
                    <p>we have received your request, a member of our team will contact you shortly</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="boxs">
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box form">
              <div class="form-title">
                <p>Want to Invest in UAE?</p>
                <span>Consult our Experts</span>
              </div>
              <form action="" id="form_1">
                <div class="form-inputs">
                  <div class="input">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name" >
                  </div>
                  <div class="input phone">
                    <div
                    class="inline_input"
                    data-bs-target="#countryModal2"
                    data-bs-toggle="modal"
                    data-bs-dismiss="modal"
                  >
                  <?= $this->Html->image('/img/png100px/tr.png', ['alt' => 'TR', 'title' => 'placeholder', 'id' => 'countryImg']) ?>
                    <!-- <img
                      src="img/png100px/tr.png"
                      title="placeholder"
                      alt="TR"
                      id="countryImg"
                    /> -->
                    <i class="fa-solid fa-angle-down"></i>
                    <input
                      type="tel"
                      name="zip"
                      id="zip"
                      value="+90"
                      maxlength="4"
                    />
                  </div>
                    <label for="PhoneNumber" class="form-label">Phone Number*</label>
                    <input type="phone" class="form-control" id="PhoneNumber" >
                  </div>
                  <div class="input">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" >
                  </div>
                  <div class="input">
                   <button class="call"><img src="img/00_Icons/07_Phone.svg" alt="icon"> Call me</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>
            <div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div><div class="box">
              <div class="image">
              <?= $this->Html->image('/img/04_CardImage.webp', ['alt' => 'CardImage']) ?>
                <!-- <img src="img/04_CardImage.webp" alt="CardImage" /> -->
              </div>
              <div class="text">
                <h1><span>From</span> $250,000</h1>
                <h2>Hanover Square<br />Jumeriah Village Circle</h2>
                <small>Jumeriah Village</small>
              </div>
              <div class="box-footer">
                <p>
                <?= $this->Html->image('/img/00_Icons/08_apartments.svg', ['alt' => 'apartments']) ?>
                  <!-- <img src="img/00_Icons/08_apartments.svg" alt="apartments" /> -->
                  Apartments
                </p>
                <p>
                <?= $this->Html->image('/img/00_Icons/05_beds.svg', ['alt' => 'apartments']) ?>
                <!-- <img src="img/00_Icons/05_beds.svg" alt="apartments" /> -->
                 1 to 4</p>
              </div>
            </div>

          </div>
          <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item ">
                <a class="page-link"> «  Previous</a>
              </li>
              <li class="page-item  active" aria-current="page"><a class="page-link" href="#">1</a></li>
              <li class="page-item" >
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3...</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next  »</a>
              </li>
            </ul>
          </nav>
        </div>
        
      </div>
    </section>
    <!-- End Page2 Content -->
    <!-- Start Footer -->
    <footer class="page2">
      <div class="container">
        <div class="boxs">
          <div class="box">
            <div class="logo">
            <?= $this->Html->image('/img/Logo.svg', ['alt' => 'logo']) ?>
            <!-- <img src="img/Logo.svg" alt="logo" /> -->
        </div>
            <div class="links">
              <div class="link"><i class="fa-brands fa-instagram"></i></div>
              <div class="link"><i class="fa-brands fa-facebook-f"></i></div>
              <div class="link"><i class="fa-brands fa-youtube"></i></div>
              <div class="link"><i class="fa-brands fa-linkedin-in"></i></div>
              <div class="link"><i class="fa-brands fa-twitter"></i></div>
              
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

    <!-- CountryList Modal -->
    <div
      class="modal fade"
      id="countryModal2"
      aria-hidden="true"
      aria-labelledby="countryModalLabel2"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div
            class="modal-body"
            data-bs-target="#contactModal"
            data-bs-toggle="modal"
            data-bs-dismiss="modal"
          >
            <div class="countriesList" id="countriesList">
              <ul></ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End CountryList Modal -->
    <script src="js/all.js"></script>
    <script>
      $(document).ready(function () {
        getCountries();
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
    


