

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
    




<?php
$from = $this->request->getQuery('from');
$to = $this->request->getQuery('to');
$k = $this->request->getQuery('k');
$col = $this->request->getQuery('col');
$method = $this->request->getQuery('method');

$params = http_build_query(($this->request->getQuery()));
// dd($params);

?>
<div class="right_col" role="main" ng-init="
        doGet('/admin/properties/index?list=1&page='+paging.page+'&<?= $params ?>', 'list', 'properties');
        doGet('/configs/cat/all', 'list', 'categories');
    ">
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6  side_div1">
                <h3><?= __('properties_list') ?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2">
                <span class="icn">
                    <a href data-toggle="modal" data-target="#search_mdl" data-dismiss="modal" class="btn btn-info">
                        <span class="fa fa-search"></span> <span class="hideMob"><?= __('search_and_filter') ?></span>
                    </a>
                </span>
                <!-- <span class="icn">
                    <a href="<?= $app_folder ?>/<?= $currlang ?>/admin/properties/wizard" class="btn btn-info">
                        <span class="fa fa-plus"></span> <span class="hideMob"><?= __('add_property') ?></span>
                    </a>
                </span> -->
                <span class="icn">
                    <a href class="btn btn-info" ng-click="
                            newEntity('property');
                            openModal('#addEditProperty_mdl')" >
                        <span class="fa fa-plus"></span> <span class="hideMob"><?=__('add_property')?></span>
                    </a>
                </span>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12">
                <div class="x_panel">

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div><?= __('please_wait') ?></div>
                    </div>

                    <div class="x_title">
                        <h2><b><?= __('properties_list') ?></b>
                            <span> <?= __('show') . ' ' . __('from') ?>
                                {{ paging.start  }} <?= __('to') ?>
                                {{ paging.end }} <?= __('of') ?> {{ paging.count }} </span>
                        </h2>
                        <div>
                            <div class="filterShow">
                                <div ng-repeat="(key, val) in rec.search" ng-if="!empty(val)">

                                    <?php // address
                                    ?>
                                    <div ng-if=" 'adrs_country,adrs_city,adrs_region,adrs_district'.indexOf(key) > -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('adrs', key)"> {{ val }} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // my properties
                                    ?>
                                    <div ng-if=" key == 'user_id' ">
                                        <span>
                                            <a href ng-click="removeFilter('adrs', key)"><?=__('myProperties')?> <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // language
                                    ?>
                                    <div ng-if=" key == 'language_id' ">
                                        <b><?= __('language_id') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter('language_id')"> {{ DtSetter('language_id', val) }} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // category id
                                    ?>
                                    <div ng-if=" key == 'category_id' ">
                                        <b><?= __('category_id') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter('category_id')"> {{ DtSetter('PROP', val) }} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // projects 
                                    ?>
                                    <div ng-if="isArray(val) && key == 'project_id'">
                                        <b><?= __('projects') ?></b>:
                                        <span ng-repeat="(key2, val2) in val track by $index">
                                            <a href ng-click="removeFilter('specs', key, $index)"> {{lists.projects_list[val2]}}<i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // non numeric( non-sliders ) specs
                                    ?>
                                    <div ng-if="
                                        isArray(val) && 
                                        'project_id,param_isfurnitured,param_isresale,param_iscitizenship,param_iscommission_included,param_isresidence,param_monthlytax,param_deposit,param_grossspace,param_netspace,features_ids,old,property_price,property_usp'.indexOf(key) == -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span ng-repeat="(key2, val2) in val track by $index" ng-if="isArray(val)">
                                            <a href ng-click="removeFilter('specs', key, $index)"> {{lists.categories['PROP_SPECS'][val2]}}<i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // none array ( one id ) specs
                                    ?>
                                    <div ng-if="
                                        !isArray(val) && 
                                        'param_isfurnitured,param_isresale,property_price,param_iscitizenship,param_iscommission_included,param_isresidence'.indexOf(key) > -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('specs_one_id', key, $index)"> {{DtSetter('bool3', val)}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // numeric( sliders ) specs
                                    ?>
                                    <div ng-if="
                                        'param_monthlytax,param_deposit,param_grossspace,param_netspace,property_price'.indexOf(key) > -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('slide', key, val)"> {{ nFormat(val[0])+' - '+nFormat(val[1]) }} {{key=='property_price' ? DtSetter('currencies', rec.search.property_currency) : ''}}<i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // search input
                                    ?>
                                    <div ng-if=" key == 'keyword' ">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('keyword')"> {{val}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // search updated
                                    ?>
                                    <div ng-if=" key == 'stat_updated' ">
                                        <b><?= __('rec_state') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter(key)"> {{val==1 ? '<?= __('updated') ?>' : '<?= __('outdated') ?>'}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // search stat_created
                                    ?>
                                    <div ng-if=" key == 'stat_created' ">
                                        <b><?= __('rec_state') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter(key)"> {{val}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // features checkbox
                                    ?>
                                    <div ng-if=" key == 'features_ids' && !empty(val)">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span ng-repeat="(key3, val3) in val" ng-if="val3">
                                            <a href ng-click="removeFilter('features_ids', key3)"> {{lists.categories['PROP_FEATURES'][key3]}}<i class="fa fa-times"></i></a>
                                        </span>
                                    </div>

                                    <?php // usp checkbox
                                    ?>
                                    <div ng-if=" key == 'property_usp' && !empty(val)">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span ng-repeat="(key4, val4) in val" ng-if="val4">
                                            <a href ng-click="removeFilter('property_usp', key4)"> {{DtSetter( 'USP', key4 )}}<i class="fa fa-times"></i></a>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])) { ?>
                            <ul class="nav navbar-right panel_toolbox">
                                <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-paper-plane"></i> <?= __('assign_to_content_manager') ?>
                                    </a>
                                    <div class="dropdown-menu  <?= $currlang != 'ar' ? 'dropdown-menu-right' : '' ?>">
                                        <?php foreach ($contentManagers as $id => $contentManager) { ?>
                                            <a href ng-click="multiHandle('/admin/properties/assign/<?= $id ?>');" class="dropdown-item">
                                                <i class="fa fa-user"></i> <?= $contentManager ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu  <?= $currlang != 'ar' ? 'dropdown-menu-right' : '' ?>">

                                        <a href ng-click="multiHandle('/admin/properties/enable/1')" class="dropdown-item">
                                            <i class="fa fa-check"></i> <?= __('enable_selected') ?>
                                        </a>
                                        <a href ng-click="multiHandle('/admin/properties/enable/0')" class="dropdown-item">
                                            <i class="fa fa-times"></i> <?= __('disable_selected') ?>
                                        </a>
                                        <a href ng-click="multiHandle('/admin/properties/enable/2')" class="dropdown-item">
                                            <i class="fa fa-bookmark"></i> <?= __('sold_selected') ?>
                                        </a>

                                        <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin'])) { ?>
                                            <a href ng-click="multiHandle('/admin/properties/delete')" class="dropdown-item">
                                                <i class="fa fa-trash"></i> <?= __('delete_selected') ?>
                                            </a>
                                        <?php } ?>

                                    </div>
                                </li>
                                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> 
                            </li> -->
                            </ul>
                        <?php } ?>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="grayText">
                            <span class="badge badge-bordered">
                                <i class="fa fa-retweet greenText"></i> = <?= __('param_isresale') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-address-card-o orangeText"></i> = <?= __('param_iscitizenship') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-check-circle greenText"></i> = <?= __('active') ?>
                                <i class="fa fa-times-circle redText"></i> = <?= __('inactive') ?>
                                <i class="fa fa-bookmark orangeText"></i> = <?= __('sold') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-thumb-tack greenText"></i> = <?= __('published_on_website') ?>
                                <i class="fa fa-thumb-tack redText"></i> = <?= __('assigned_to_content') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-globe greenText"></i> = <?= __('param_isresidence') ?>
                            </span>
                        </div>
                    </div>

                    <div class="x_content">
                        <div class="grid ">
                            <div class="grid_header row">
                                <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])) { ?>
                                    <div class="col-sm-1 col column-title">
                                        <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'id']) ?>
                                        <label class="mycheckbox">
                                            <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                            <span></span>
                                            <?= __('id') ?>
                                        </label>
                                    </div>
                                <?php } ?>

                                <div class="col-sm-3 col column-title">
                                    <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'property_title', 'search' => 'property_title']) ?>
                                    <?= __('property_title') ?> </div>

                                <div class="col-sm-2 col column-title">
                                    <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'property_price']) ?>
                                    <?= __('property_price') ?> </div>

                                <div class="col-sm-3 col column-title"> <?= __('address') ?> </div>

                                <div class="col-sm-1 col column-title">
                                    <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'rec_state', 'filter' => $this->Do->lcl($this->Do->get('stats'))]) ?>
                                    <?= __('rec_state') ?> </div>

                                <div class="col-sm-2 col column-title hideMob"><span class="nobr"><?= __('action') ?></span>
                                </div>
                            </div>

                            <div class="grid_row row" ng-repeat="itm in lists.properties track by $index">

                                <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])) { ?>
                                    <div class="col-sm-1 hideMobSm grid_header">
                                        <label class="mycheckbox chkb">
                                            <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                            <span></span> {{ itm.id }}
                                        </label>
                                    </div>

                                    <div class="col-4 hideWeb grid_header">
                                        <?= __('id') ?>
                                        <label class="mycheckbox chkb">
                                            <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                            <span></span>
                                        </label>
                                    </div>

                                    <div class="col-md-1 col-8 hideWeb">{{ itm.id }}</div>
                                <?php } ?>

                                <div class="col-4 hideWeb grid_header"><?= __('property_title') ?></div>
                                <div class="col-md-3 col-8 notwrapped">
                                    
                                    <div>{{itm.property_title}}</div>
                                    <div>
                                        <i ng-if="itm.user_property.rec_state" class="fa fa-thumb-tack" title="<?= __('assign_status') ?>" ng-class="{greenText: itm.user_property.rec_state == '2', redText: itm.user_property.rec_state == '1'}"></i>
                                        <i ng-if="itm.param_isresale == 1" class="fa fa-retweet greenText" title="<?= __('param_isresale') ?>"></i>
                                        <i ng-if="itm.param_iscitizenship == 1" class="fa fa-address-card-o orangeText" title="<?= __('param_iscitizenship') ?>"></i>
                                        <i ng-if="itm.param_isresidence == 1" class="fa fa-globe greenText" title="<?= __('param_isresidence') ?>"></i>
                                        <i class="grayText" ng-if="itm.project"><?= __('project_title') ?>: {{ itm.project.project_title }}</i>
                                    </div>
                                    
                                    <div class="clearfix">
                                        <span class="badge badge-info"><?=__('param_rooms')?>: {{DtSetter('PROP_SPECS', itm.param_rooms)}}</span>
                                        <span class="badge badge-info"><?=__('floor')?>: {{DtSetter('PROP_SPECS', itm.param_floor)}}</span>
                                        <span class="badge badge-info"><?=__('param_floors')?>: {{DtSetter('PROP_SPECS', itm.param_floors)}}</span>
                                        <span class="badge badge-info"><?=__('param_netspace')?>: {{itm.param_netspace}} <?= __('m2') ?></span>
                                        <span class="badge badge-info"><?=__('param_grossspace')?>: {{itm.param_grossspace}} <?= __('m2') ?></span>
                                    </div>
                                    <div class="greenText"><?= __('addedby') ?>: {{itm.user.user_fullname}}</div>

                                </div>

                                <div class="col-4 hideWeb grid_header"><?= __('property_price') ?></div>
                                <div class="col-md-2 col-8 notwrapped">
                                    {{DtSetter('currencies_icons', itm.property_currency)}}{{ nFormat(itm.property_price, false, true)}}
                                    <i class="grayText">
                                        {{itm}}
                                    <!-- {{ nFormat(itm.property_usdprice, false, true)}} -->
                                        <!-- ({{DtSetter('currencies_icons', '<?= $currCurrency ?>')}}{{currencyConverter( DtSetter('currencies', itm.property_currency), '<?= $this->Do->get('currencies')[$currCurrency] ?>', itm.property_price )}}) -->
                                    </i>
                                    <div ng-if="compareDate( itm.stat_expired )" class="update_div">
                                        <i class="fa fa-clock-o redText movScale"></i>
                                        <a href="javascript:void(0);"  
                                            ng-click=" 
                                                rec.ind = $index;
                                                rec.property = itm;
                                                openModal('#updateProperty_mdl');
                                                ">
                                            {{itm.stat_updated.split(' ')[0]}}
                                        </a>
                                    </div>
                                    <div ng-if="!compareDate( itm.stat_expired )">
                                        <i class="fa fa-clock-o greenText"> {{itm.stat_updated.split(' ')[0]}}</i>
                                    </div>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?= __('address') ?></div>
                                <div class="col-md-3 col-8 notwrapped">{{ itm.adrs_city }} - {{ itm.adrs_region }}<br />
                                    <b class="badge badge-success" ng-repeat="itm in itm.property_usp">
                                        <i>{{ DtSetter('USP', itm) }}</i>
                                    </b>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?= __('rec_state') ?></div>
                                <div class="col-md-1 col-8" ng-bind-html="DtSetter('bool2', itm.rec_state)"></div>

                                <div class="col-4 hideWeb grid_header"><?= __('actions') ?></div>
                                <div class="col-md-2 col-8 action">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#viewProperty_mdl" class="inline-btn" ng-click="doGet('/admin/properties?id='+itm.id, 'rec', 'property'); curr_t = 'property';">
                                        <i class="fa fa-eye"></i> <?= __('view') ?>
                                    </a> &nbsp;
                                    <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.portfolio', 'admin.supervisor'])) { ?>
                                        <!-- <a ng-hide="('<?= in_array($authUser['user_role'], ['admin.portfolio', 'user.portfolio']) ? 1 : 0 ?>' == '1' && '<?= $authUser['id'] ?>' != itm.user_id)" href="<?= $app_folder . '/' . $currlang ?>/admin/properties/wizard/{{itm.id}}" class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?= __('edit') ?>
                                        </a> -->
                                        <a href ng-hide="('<?=$authUser['user_role']?>' == 'admin.portfolio' && '<?=$authUser['id']?>' != itm.user_id)"
                                            ng-click="
                                                doGet('/admin/properties?id='+itm.id, 'rec', 'property');
                                                openModal('#addEditProperty_mdl');
                                                initMapDelay('map_mdl', 'property', 'mapPlacesSearch_mdl');
                                                "  class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?=__('edit')?>
                                        </a>
                                    <?php } ?>

                                    <?php if (in_array($authUser['user_role'], ['admin.content'])) { ?>
                                        <a href ng-click=" selected[itm.user_property.id] = true; multiHandle('/admin/properties/assign/publish')" ng-class="{disabled: itm.user_property.rec_state>1}" class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?= __('mark_as_published') ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <?php echo $this->element('paginator-ng') ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('Modals/search') ?>
<?php echo $this->element('Modals/updateProperty') ?>
<?php echo $this->element('Modals/viewProperty') ?>
<?php echo $this->element('Modals/addEditProperty')?>
<?php echo $this->element('Modals/map')?>
<?php echo $this->element('Modals/camera')?>
<?php echo $this->element('Modals/addEditSeller')?>
<?php echo $this->element('Modals/addEditDeveloper')?>
<?php echo $this->element('Modals/addEditProject')?>

