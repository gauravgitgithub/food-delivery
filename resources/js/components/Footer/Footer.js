import React from 'react';
import './style/footer.css';
const Footer = () => {
  return (
    <footer class="footer-area footer--light">
  <div class="footer-big">

    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="footer-widget">
            <div class="widget-about">
              <img src="assets/img/linkedin_banner_image_2.png" alt="" class="img-fluid" />
              <p>Buy best food, cuisines from your nearby restaurants.</p>
              <ul class="contact-details">
                <li>
                  <span class="icon-earphones"></span> Call Us:
                  <a href="tel:344-755-111">344-755-111</a>
                </li>
                <li>
                  <span class="icon-envelope-open"></span>
                  <a href="mailto:support@fooddelivery.com">support@fooddelivery.com</a>
                </li>
              </ul>
            </div>
          </div>

        </div>
   
        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu footer-menu--1">
              <h4 class="footer-widget-title">Popular Category</h4>
              <ul>
                <li>
                  <a href="#">Indian</a>
                </li>
                <li>
                  <a href="#">Chinese</a>
                </li>
                <li>
                  <a href="#">Italian</a>
                </li>
                <li>
                  <a href="#">Mexican</a>
                </li>
              </ul>
            </div>
          
          </div>
         
        </div>
    

        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu">
              <h4 class="footer-widget-title">Our Company</h4>
              <ul>
                <li>
                  <a href="#">About Us</a>
                </li>
                <li>
                  <a href="#">How It Works</a>
                </li>
                <li>
                  <a href="#">Affiliates</a>
                </li>
                <li>
                  <a href="#">Testimonials</a>
                </li>
                <li>
                  <a href="#">Contact Us</a>
                </li>
                <li>
                  <a href="#">Plan &amp; Pricing</a>
                </li>
                <li>
                  <a href="#">Blog</a>
                </li>
              </ul>
            </div>
     
          </div>
         
        </div>
      

        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu no-padding">
              <h4 class="footer-widget-title">Help Support</h4>
              <ul>
                <li>
                  <a href="#">Support Forum</a>
                </li>
                <li>
                  <a href="#">Terms &amp; Conditions</a>
                </li>
                <li>
                  <a href="#">Support Policy</a>
                </li>
                <li>
                  <a href="#">Refund Policy</a>
                </li>
                <li>
                  <a href="#">FAQs</a>
                </li>
                <li>
                  <a href="#">Buyers Faq</a>
                </li>
                <li>
                  <a href="#">Sellers Faq</a>
                </li>
              </ul>
            </div>
         
          </div>
        
        </div>
      

      </div>
     
    </div>

  </div>

  <div class="mini-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>&copy;
               All rights reserved. Created by
              <a href="#"> FoodDelivery </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
  )
};
export default Footer