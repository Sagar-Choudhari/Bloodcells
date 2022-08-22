<?php
session_start()
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Questions</title>
    <?php include('include/common_links.php'); ?>
    <!-- css -->
    <link rel="stylesheet" href="css/register.css" type="text/css">
    
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>
  </head>
  <body id="page-top">
    
    <!--  Navigation bar -->
    <div class="container-fluid">
      <div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto font-weight-normal">
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="index.php">Home</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="register.php">Register</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="all_request.php">Request</a> </li>
                
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="camps.php">Activity</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="contact.php">Contact Us</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="about.php">About Us</a> </li>
                
                <?php if (!isset($_SESSION['email'])): ?>
                <li class="nav-item ml-5"> <a class="nav-link" href="login.php"><h6 class="login-button">Log-in</h6></a> </li>
                <?php else: ?>
                <?php $email = $_SESSION['email'];
                $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
                $user = $mysqli->query("SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);
                $arrayy = $user->fetch_assoc();
                // SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'
                ?>
                <!-- <?php// echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?> -->
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow ml-5 border-right border-left rounded-pill border-dark px-3">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-capitalize text-dark"><?php echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?></span>
                    <img class="img-profile rounded-circle" src="assets/Icon-person@2x.png" data-size="60x60"><img src="assets/ellipsis-v-solid.svg" class="ml-1 opacity-1" style="opacity: 0.5;" alt=""  width="6">
                  </a>
                  <?php include 'user/togglemenu.php'; ?>
                  
                  
                  <!-- Logout Modal-->
                  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Do you really want to logout??</div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" href="dataconn/logout.php">Logout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li><?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <!-- end  Navigation bar -->
      <div class="m-5 font-weight-bolder text-dark text-center" style="font-size:35px;" data-aos="fade-up">Frequently Asked Questions</div>
        <div class="container">
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="donatingblood" class="ml-2 mt-5 text-primary"><h4>Blood Donation Process</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que1heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que1"
                        aria-expanded="false" aria-controls="que1">
                        <h5 class="mb-0">
                        Why should I donate blood?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que1" class="collapse" role="tabpanel" aria-labelledby="que1heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        The need for blood affects us all. Eight out of ten people need blood or blood products at some time in our lives. One out of every ten patients in hospital requires blood transfusion. The number of blood donations that patients receive depends on their medical condition. Although an average of three donations is transfused to a patient, some patients require many more.</h6>
                        <br><h6>
                        Blood is in constant demand for the treatment of patients involved in accidents, patients with anaemia, malaria, cancer or a bleeding disorder such as haemophilia. Many surgical operations would not be possible without the availability of blood. Blood may be needed during or following childbirth or for an exchange transfusion in newborn babies.</h6>
                        <br><h6>
                        The need for blood never stops. Blood donors save lives. Every blood donation gives the person who receives it a new chance at life.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que2heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que2"
                        aria-expanded="false" aria-controls="que2">
                        <h5 class="mb-0">
                        How does the blood donation process work?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que2" class="collapse" role="tabpanel" aria-labelledby="que2heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        Donating blood is a simple thing to do, but can make a big difference in the lives of others. The donation process from the time you arrive until the time you leave takes about an hour. The donation itself is only about 8-10 minutes on average. The steps in the process are:
                        </h6>
                        <h5>Registration</h5>
                        
                        <ol>
                          <li>You will complete donor registration, which includes information such as your name, address, phone number, and donor identification number (if you have one).</li>
                          <li>You will be asked to show a donor card, driver’s license or two other forms of ID.</li>
                        </ol>
                        <h5>Health History and Mini Physical</h5>
                        <ol>
                          <li>You will answer some questions during a private and confidential interview about your health history and the places you have traveled.</li>
                          <li>You will have your temperature, hemoglobin, blood pressure and pulse checked.</li></ol>
                          <h5>Donation</h5>
                          <ol>
                            <li>We will cleanse an area on your arm and insert a brand–new, sterile needle for the blood draw. This feels like a quick pinch and is over in seconds.</li>
                            <li>You will have some time to relax while the bag is filling. (For a whole blood donation, it is about 8-10 minutes. If you are donating platelets, red cells or plasma by apheresis the collection can take up to 2 hours.)</li>
                            <li>When approximately a pint of blood has been collected, the donation is complete and a staff person will place a bandage on your arm. </li></ol>
                            <h5>Refreshments</h5>
                            <ol>
                              <li>You will spend a few minutes enjoying refreshments to allow your body time to adjust to the slight decrease in fluid volume.</li>
                              <li>After 10-15 minutes you can then leave the donation site and continue with your normal daily activities.</li>
                              <li>Enjoy the feeling of accomplishment knowing that you have helped to save lives.</li>
                              <li>Your gift of blood may help up to three people. Donated red blood cells do not last forever. They have a shelf-life of up to 42 days. A healthy donor may donate every 56 days.</li>
                            </ol>
                      </div>
                    </div>
                  </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="que3heading">
                            <a class="collapsed text-dark" style="text-decoration: none;
                              color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que3"
                              aria-expanded="false" aria-controls="que3">
                              <h5 class="mb-0">
                              Who may donate blood?
                              </h5>
                            </a>
                          </div>
                          <!-- Card body -->
                          <div id="que3" class="collapse" role="tabpanel" aria-labelledby="que3heading" data-parent="#accordionEx">
                            <div class="container card-body px-5 text-dark">
                              <br><h6>
                              Donors should be between the ages of 18 and 65, weigh at least 50 kg and not have donated blood within the previous 12 weeks (for males). The criteria, which are applied before a person can be accepted as a blood donor, are very strict. Not everyone can be a blood donor. This is designed to protect the health of the donor as well as the health of the patient who receives the blood.</h6>
                              <br><h6>
                              For example, people who have certain medical conditions or who are taking certain types of medication are not permitted to donate blood. People whose sexual behaviour places them at increased risk of transmitting infections through transfusion are also not permitted to donate. If any of the deferral criteria apply to you, or if for any reason you think that your blood may be unsafe to transfuse to a patient, you are advised not to donate.</h6>
                              <br><h6>
                              The mission of the blood transfusion service is to provide all patients with sufficient, safe, quality blood and blood products. If you are in any doubt about whether you should donate blood, please discuss it with a staff member. We know it can be disappointing if you are not able to give blood. However, we hope you will understand that our overriding responsibility is to ensure the safety of donors and the safety of the blood for patients.</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="que4heading">
                            <a class="collapsed text-dark" style="text-decoration: none;
                              color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que4"
                              aria-expanded="false" aria-controls="que4">
                              <h5 class="mb-0">
                              What should I do after donating blood?
                              </h5>
                            </a>
                          </div>
                          <!-- Card body -->
                          <div id="que4" class="collapse" role="tabpanel" aria-labelledby="que4heading" data-parent="#accordionEx">
                            <div class="container card-body px-5 text-dark">
                              <h5>After you give blood:</h5>
                              <b>Take the following precautions:</b>
                              <li>Drink an extra four glasses (eight ounces each) of non-alcoholic liquids.</li>
                              <li>Keep your bandage on and dry for the next five hours, and do not do heavy exercising or lifting.</li>
                              <li>If the needle site starts to bleed, raise your arm straight up and press on the site until the bleeding stops.</li>
                              <li>Because you could experience dizziness or loss of strength, use caution if you plan to do anything that could put you or others at risk of harm. For any hazardous occupation or hobby, follow applicable safety recommendations regarding your return to these activities following a blood donation.</li>
                              <li>Eat healthy meals and consider adding iron-rich foods to your regular diet, or discuss taking an iron supplement with your health care provider, to replace the iron lost with blood donation.</li>
                              <li>If you get a bruise:  Apply ice to the area intermittently for 10-15 minutes during the first 24 hours. Thereafter, apply warm, moist heat to the area intermittently for 10-15 minutes. A rainbow of colors may occur for about 10 days.</li>
                              <li>If you get dizzy or lightheaded:  Stop what you are doing, lie down, and raise your feet until the feeling passes and you feel well enough to safely resume activities.</li>
                              <li>And remember to enjoy the feeling of knowing you have helped save lives!</li>
                              <li>Schedule your next appointment.</li>
                            </div>
                          </div>
                        </div>
                        <!-- Accordion card -->
                        
                        <!-- Accordion card -->
                        <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="que6heading">
                            <a class="collapsed text-dark" style="text-decoration: none;
                              color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que6"
                              aria-expanded="false" aria-controls="que6">
                              <h5 class="mb-0">
                              Will it hurt when you insert the needle?
                              </h5>
                            </a>
                          </div>
                          <!-- Card body -->
                          <div id="que6" class="collapse" role="tabpanel" aria-labelledby="que6heading" data-parent="#accordionEx">
                            <div class="container card-body px-5 text-dark">
                              <br><h6>
                              Only for a moment. Pinch the fleshy, soft underside of your arm. That pinch is similar to what you will feel when the needle is inserted.</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="que7heading">
                            <a class="collapsed text-dark" style="text-decoration: none;
                              color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que7"
                              aria-expanded="false" aria-controls="que7">
                              <h5 class="mb-0">
                              How long does a blood donation take?
                              </h5>
                            </a>
                          </div>
                          <!-- Card body -->
                          <div id="que7" class="collapse" role="tabpanel" aria-labelledby="que7heading" data-parent="#accordionEx">
                            <div class="container card-body px-5 text-dark"><br>
                              <h6>The entire process takes about one hour and 15 minutes; the actual donation of a pint of whole blood unit takes eight to 10 minutes. However, the time varies slightly with each person depending on several factors including the donor’s health history and attendance at the blood drive.
                              </h6>
                            </div>
                          </div>
                        </div>
                        <!-- Accordion card -->
                        
                        <!-- Accordion card -->
                        <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="que8heading">
                            <a class="collapsed text-dark" style="text-decoration: none;
                              color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que8"
                              aria-expanded="false" aria-controls="que8">
                              <h5 class="mb-0">
                              What does it mean to have a rare blood type?
                              </h5>
                            </a>
                          </div>
                          <!-- Card body -->
                          <div id="que8" class="collapse" role="tabpanel" aria-labelledby="que8heading" data-parent="#accordionEx">
                            <div class="container card-body px-5 text-dark">
                              <br><h6>
                              Every person has an ABO and rhesus blood group: i.e. group A, B, AB, or O and RhD negative or RhD positive. In addition to these ABO blood groups, people's red blood cells consist of many other antigens as part of their red cell structure.</h6>
                              <br><h6>
                              Occasionally, people have an unusual, specific red cell antigen. Alternatively, some individual's red cells lack an antigen which is common to most people. This would be recognised as a “rare” blood type. Some patients have antibodies against a specific blood type and in these circumstances it may be difficult to find blood from a regular blood donor which is compatible with that of the rare type of the patient.</h6>
                              <br><h6>
                              Before every blood transfusion, compatibility tests are performed on the blood of the patient and on the blood of the donor, to ensure that the transfused blood will not cause any untoward reaction in the recipient.</h6>
                              <br><h6>
                              First-time blood donors are notified by mail of their ABO blood group and RhD type, after the blood has been tested in the BTS laboratory.</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Accordion card -->
                        <!-- Accordion card -->
                        <div class="card">
                          <!-- Card header -->
                          <div class="card-header" role="tab" id="que9heading">
                            <a class="collapsed text-dark" style="text-decoration: none;
                              color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que9"
                              aria-expanded="false" aria-controls="que9">
                              <h5 class="mb-0">
                              How long will it take to replenish the pint of blood I donate?
                              </h5>
                            </a>
                          </div>
                          <!-- Card body -->
                          <div id="que9" class="collapse" role="tabpanel" aria-labelledby="que9heading" data-parent="#accordionEx">
                            <div class="container card-body px-5 text-dark">
                              <br><h6>
                              The plasma from your donation is replaced within about 24 hours. Red cells need about four to six weeks for complete replacement. That’s why at least eight weeks are required between whole blood donations.</h6>
                            </div>
                          </div>
                        </div>
                        <!-- Accordion card -->
                        <br>
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="donatingblood" class="ml-2 mt-5 text-info"><h4>Preparations</h4></label>
                
                
                <!-- Accordion card -->
                <div class="card">
                  <!-- Card header -->
                  <div class="card-header" role="tab" id="que10heading">
                    <a class="collapsed text-dark" style="text-decoration: none;
                      color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que10"
                      aria-expanded="false" aria-controls="que10">
                      <h5 class="mb-0">
                      Can I bring my children to the donation site?
                      </h5>
                    </a>
                  </div>
                  <!-- Card body -->
                  <div id="que10" class="collapse" role="tabpanel" aria-labelledby="que10heading" data-parent="#accordionEx">
                    <div class="container card-body px-5 text-dark">
                      <br> <h6>
                      Children who do not require supervision and are not disruptive are welcome to sit in the waiting or refreshment area. If they require supervision, then another adult must be present.</h6>
                      <h6>
                      <br>
                      Before you leave the blood donor clinic after your blood donation, have some tea, coffee or a soft drink to help replace the blood volume (approximately 450 ml) which has been reduced as a result of your donation.</h6>
                      <h6>
                      <br>
                      Avoid taking aspirin or aspirin-like anti-inflammatory medication in the 72 hours prior to your donation, because aspirin inhibits the function of blood platelets. If you have taken aspirin within this period, your blood platelet component cannot be transfused to a patient.</h6>
                      
                    </div>
                    
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="donatingblood" class="ml-2 mt-5 text-secondary"><h4>Platelet Donations</h4></label>
                
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que11heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que11"
                        aria-expanded="false" aria-controls="que11">
                        <h5 class="mb-0">
                        What is apheresis?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que11" class="collapse" role="tabpanel" aria-labelledby="que11heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Apheresis is the process by which platelets and other specific blood components (red cells or plasma) are collected from a donor. The word “apheresis” is derived from the Greek word aphaeresis meaning “to take away.” This process is accomplished by using a machine called a cell separator. Blood is drawn from the donor and the platelets, or another blood component, are collected by the cell separator and the remaining components of the blood are returned to the donor during the donation. Each apheresis donation procedure takes about one-and-one-half to two hours. Donors can watch movies or relax during the donation.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que12heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que12"
                        aria-expanded="false" aria-controls="que12">
                        <h5 class="mb-0">
                        What are platelets and how are they used?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que12" class="collapse" role="tabpanel" aria-labelledby="que12heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Platelets are tiny, colorless, disc-shaped particles circulating in the blood, and they are essential for normal blood clotting. Platelets are critically important to the survival of many patients with clotting problems (aplastic anemia, leukemia) or cancer, and patients who will undergo organ transplants or major surgeries like heart bypass grafts. Platelets can only be stored for five days after being collected. Maintaining an adequate supply of this lifesaving, perishable product is an ongoing challenge.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que13heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que13"
                        aria-expanded="false" aria-controls="que13">
                        <h5 class="mb-0">
                        How often can I give platelets?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que13" class="collapse" role="tabpanel" aria-labelledby="que13heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Every 7 days up to 24 apheresis donations can be made in a year. Some apheresis donations can generate two or three adult-sized platelet transfusion doses from one donation!</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="eligibility" class="ml-2 mt-5 text-warning"><h4>Medications and Vaccinations</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que14heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que14"
                        aria-expanded="false" aria-controls="que14">
                        <h5 class="mb-0">
                        Aspirin
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que14" class="collapse" role="tabpanel" aria-labelledby="que14heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Aspirin, no waiting period for donating whole blood. However, you must wait 2 full days after taking aspirin or any medication containing aspirin before donating platelets by apheresis. For example, if you take aspirin products on Monday, the soonest you may donate platelets is Thursday.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que15heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que15"
                        aria-expanded="false" aria-controls="que15">
                        <h5 class="mb-0">
                        Antibiotics
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que15" class="collapse" role="tabpanel" aria-labelledby="que15heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>A donor with an acute infection should not donate. The reason for antibiotic use must be evaluated to determine if the donor has a bacterial infection that could be transmissible by blood.
                        Acceptable after finishing oral antibiotics for an infection (bacterial or viral). May have taken last pill on the date of donation. Antibiotic by injection for an infection acceptable 10 days after last injection. Acceptable if you are taking antibiotics to prevent an infection for the following reasons: acne, chronic prostatitis, peptic ulcer disease, periodontal disease, pre-dental work, rosacea, ulcerative colitis, after a splenectomy, or valvular heart disease. If you have a temperature above 99.5 F, you may not donate.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que16heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que16"
                        aria-expanded="false" aria-controls="que16">
                        <h5 class="mb-0">
                        Birth Control
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que16" class="collapse" role="tabpanel" aria-labelledby="que16heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Women on oral contraceptives or using other forms of birth control are eligible to donate.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que17heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que17"
                        aria-expanded="false" aria-controls="que17">
                        <h5 class="mb-0">
                        Immunization, Vaccination
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que17" class="collapse" role="tabpanel" aria-labelledby="que17heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        
                        <ol>
                          <li><h6>
                          Acceptable if you were vaccinated for influenza, pneumonia, tetanus or meningitis, providing you are symptom-free and fever-free. Includes the Tdap vaccine.</h6></li>
                          <li><h6>
                          Acceptable if you received an HPV Vaccine (example, Gardasil).</h6></li>
                          <li><h6>Acceptable if you were vaccinated with SHINGRIX (shingles vaccine) providing you are symptom-free and fever-free. SHINGRIX vaccine is administered in 2 doses (shots). The second shot is administered 2-6 months after the first shot. This distinguishes it from Zostavax, the live shingles vaccine, which is given as a single dose (shot) and requires a 4-week deferral.</h6></li>
                          <li><h6>
                          Wait 4 weeks after immunizations for German Measles (Rubella), MMR (Measles, Mumps and Rubella), Chicken Pox and Zostavax, the live shingles vaccine.</h6></li>
                          <li><h6>
                          Wait 2 weeks after immunizations for Red Measles (Rubeola), Mumps, Polio (by mouth), and Yellow Fever vaccine.</h6></li>
                          <li><h6>
                          Wait 21 days after immunization for hepatitis B as long as you are not given the immunization for exposure to hepatitis B.</h6></li>
                          <h6>
                          <li>
                            <b>
                            Smallpox vaccination and did not develop complications
                            </b>
                          Wait 8 weeks (56 days) from the date of having a smallpox vaccination as long as you have had no complications. Complications may include skin reactions beyond the vaccination site or general illness related to the vaccination.</li></h6>
                          <h6>
                          <li>
                            <b>
                            Smallpox vaccination and developed complications
                            </b>
                          Wait 14 days after all vaccine complications have resolved or 8 weeks (56 days) from the date of having had the smallpox vaccination whichever is the longer period of time. You should discuss your particular situation with the health historian at the time of donation. Complications may include skin reactions beyond the vaccination site or general illness related to the vaccination.</li></h6>
                          <h6>
                          <li>
                            <b>Smallpox vaccination – close contact with someone who has had the smallpox vaccine in the last eight weeks and you did not develop any skin lesions or other symptoms.
                            </b>
                          </li>
                          </h6>
                          <h6>Eligible to donate.</h6>
                          <li><h6><b>
                            Smallpox vaccination – close contact with someone who has had the vaccine in the last eight weeks and you have since developed skin lesions or symptoms.</b></h6>
                          <h6>Wait 8 weeks (56 days) from the date of the first skin lesion or sore. You should discuss your particular situation with the health historian at the time of donation. Complications may include skin reactions or general illness related to the exposure.</h6></li>
                        </ol>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que18heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que18"
                        aria-expanded="false" aria-controls="que18">
                        <h5 class="mb-0">
                        Insulin (Bovine)
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que18" class="collapse" role="tabpanel" aria-labelledby="que18heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        Donors with diabetes who since 1980, ever used bovine (beef) insulin made from cattle from the United Kingdom are not eligible to donate. This requirement is related to concerns about variant CJD, or 'mad cow' disease. </h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que19heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que19"
                        aria-expanded="false" aria-controls="que19">
                        <h5 class="mb-0">
                        Medications
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que19" class="collapse" role="tabpanel" aria-labelledby="que19heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        In almost all cases, medications will not disqualify you as a blood donor. Your eligibility will be based on the reason that the medication was prescribed. As long as the condition is under control and you are healthy, blood donation is usually permitted.</h6>
                        <h6>
                        Over-the-counter oral homeopathic medications, herbal remedies, and nutritional supplements are acceptable. There are a handful of drugs that are of special significance in blood donation. Persons on these drugs have waiting periods following their last dose before they can donate blood:</h6>
                        <ol>
                          <li><h6>
                          Accutane, Amnesteem, Absorica, Claravis, Myorisan, Sotret or Zenatane (isotretinoin), Proscar (finasteride), and Propecia (finasteride) - wait 1 month from the last dose.</h6></li>
                          <li><h6>Avodart or Jalyn (dutasteride) - wait 6 months from the last dose.
                          Aspirin, no waiting period for donating whole blood. However, you must wait 2 full days after taking aspirin or any medication containing aspirin before donating platelets by apheresis. For example, if you take aspirin products on Monday, the soonest you may donate platelets is Thursday.</h6></li>
                          <li><h6>Effient (prasugrel)  and Brilinta (ticagrelor)- no waiting period for donating whole blood. However you must wait 7 days after taking Brilinta (ticagrelor) before donating platelets by apheresis. You must wait 3 days after taking Effient (prasugrel) before donating platelets by apheresis.</h6></li>
                          <li><h6>Feldene (piroxicam), no waiting period for donating whole blood. However, you must wait 2 days after taking Feldene (piroxicam) before donating platelets by apheresis.</h6></li>
                          <li><h6>Coumadin, Warfilone, Jantoven (warfarin) and Heparin, are prescription blood thinners- you should not donate since your blood will not clot normally. If your doctor discontinues your treatment with blood thinners, wait 7 days before returning to donate.</h6></li>
                          <li><h6>Arixtra (fondaparinux), Fragmin (dalteparin), Eliquis (apixaban), Pradaxa (dabigatran),Savaysa (edoxaban), Xarelto (rivaroxaban),and Lovenox (enoxaparin) are also prescription blood thinners- you should not donate since your blood will not clot normally. If your doctor discontinues your treatment with these blood thinners, wait 2 days before returning to donate.</h6></li>
                          <li><h6>Other prescription blood thinners not listed, call 866-236-3276 to speak with an eligibility specialist about your individual situation.</h6></li>
                          <li><h6>Hepatitis B Immune Globulin – given for exposure to hepatitis, wait 12 months after exposure to hepatitis.</h6></li>
                          <li><h6>Human pituitary-derived growth hormone at any time – you are not eligible to donate blood.</h6></li>
                          <li><h6>Plavix (clopidogrel) and Ticlid (ticlopidine) – no waiting period for donating whole blood. However, you must wait 14 days after taking this medication before donating platelets by apheresis.</h6></li>
                          <li><h6>Zontivity (vorapaxar) – no waiting period for donating whole blood. However, you must wait 1 month after taking this medication before donating platelets by apheresis.</h6></li>
                          <li><h6>Thalomid (thalidomide) – wait 1 month.</h6></li>
                          <li><h6>Cellcept (mycophenolate mofetil) – an immunosuppressant – wait 6 weeks</h6></li>
                          <li><h6>Soriatane (acitretin) – wait 3 years.</h6></li>
                          <li><h6>Tegison (etretinate) at any time – you are not eligible to donate blood.</h6></li>
                          <li><h6>Arava (leflunomide),  Erivedge (vismodegib) and Odomzo (sonidegib)– wait 2 years.</h6></li>
                          <li><h6>Aubagio (teriflunomide) – wait 2 years. </h6></li>
                        </ol>
                        <b>Unable to Give Blood?</b>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells's greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="" class="ml-2 mt-5 text-danger"><h4>General Health Considerations</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que20heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que20"
                        aria-expanded="false" aria-controls="que20">
                        <h5 class="mb-0">
                        Cold, Flu
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que20" class="collapse" role="tabpanel" aria-labelledby="que20heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        <li>Wait if you have a fever or a productive cough (bringing up phlegm)</li>
                        <li>Wait if you do not feel well on the day of donation.</li>
                        <li>Wait until you have completed antibiotic treatment for sinus, throat or lung infection. </li>  </h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que21heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que21"
                        aria-expanded="false" aria-controls="que21">
                        <h5 class="mb-0">
                        Weight and Height
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que21" class="collapse" role="tabpanel" aria-labelledby="que21heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>You must weigh at least 110 lbs to be eligible for blood donation for your own safety. Students who donate at high school drives and donors 18 years of age or younger must also meet additional height and weight requirements for whole blood donation (applies to girls shorter than 5'6" and boys shorter than 5').</h6>
                        <h6>
                        Blood volume is determined by body weight and height. Individuals with low blood volumes may not tolerate the removal of the required volume of blood given with whole blood donation. There is no upper weight limit as long as your weight is not higher than the weight limit of the donor bed/lounge you are using. You can discuss any upper weight limitations of beds and lounges with your local health historian.  </h6><br><b>Unable to Give Blood?</b>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells's greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  
                  
                  
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que22heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que22"
                        aria-expanded="false" aria-controls="que22">
                        <h5 class="mb-0">
                        Allergy, Stuffy Nose, Itchy Eyes, Dry Cough
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que22" class="collapse" role="tabpanel" aria-labelledby="que22heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Acceptable as long as you feel well, have no fever, and have no problems breathing through your mouth.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  
                  
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que23heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que23"
                        aria-expanded="false" aria-controls="que23">
                        <h5 class="mb-0">
                        Donation Intervals
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que23" class="collapse" role="tabpanel" aria-labelledby="que23heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        <li>Wait at least 8 weeks between whole blood (standard) donations.</li>
                        <li>Wait at least 7 days between platelet (pheresis) donations.</li>
                        <li>Wait at least 16 weeks between Power Red (automated) donations.</li>
                        </h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="" class="ml-2 mt-5 text-dark"><h4>Medical Conditions that Affect Eligibility</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que24heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que24"
                        aria-expanded="false" aria-controls="que24">
                        <h5 class="mb-0">
                        Allergies
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que24" class="collapse" role="tabpanel" aria-labelledby="que24heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        Acceptable as long as you feel well, have no fever, and have no problems breathing through your mouth.  </h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que25heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que25"
                        aria-expanded="false" aria-controls="que25">
                        <h5 class="mb-0">
                        Asthma
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que25" class="collapse" role="tabpanel" aria-labelledby="que25heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        Acceptable as long as you do not have any limitations on daily activities and are not having difficulty breathing at the time of donation and you otherwise feel well. Medications for asthma do not disqualify you from donating.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que26heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que26"
                        aria-expanded="false" aria-controls="que26">
                        <h5 class="mb-0">
                        Bleeding Condition
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que26" class="collapse" role="tabpanel" aria-labelledby="que26heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        If you have a history of bleeding problems, you will be asked additional questions. If your blood does not clot normally, you should not donate since you may have excessive bleeding where the needle was placed. For the same reason, you should not donate if you are taking any "blood thinner" such as:
                        <li>Atrixa (fondaparinux)</li>
                        <li>Coumadin (warfarin)</li>
                        <li>Eliquis (apixaban)</li>
                        <li>Fragmin (dalteparin)</li>
                        <li>Heparin</li>
                        <li>Jantoven (warfarin) </li>
                        <li>Lovenox (enoxaparin)</li>
                        <li>Pradaxa (dabigatran)</li>
                        <li>Savaysa (edoxaban)</li>
                        <li>Warfilone (warfarin)</li>
                        <li>Xarelto (rivaroxaban)</li>
                        If you are on aspirin, it is OK to donate whole blood. However, you must be off of aspirin for at least 2 full days in order to donate platelets by apheresis.  For example, if you take aspirin products on Monday, the soonest you may donate platelets is Thursday. Donors with clotting disorder from Factor V who are not on anticoagulants are eligible to donate; however, all others must be evaluated by the health historian at the collection center.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que27heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que27"
                        aria-expanded="false" aria-controls="que27">
                        <h5 class="mb-0">
                        Blood Pressure (High or Low)
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que27" class="collapse" role="tabpanel" aria-labelledby="que27heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>
                        <b>High Blood Pressure</b> - Acceptable as long as your blood pressure is below 180 systolic (first number) and below 100 diastolic (second number) at the time of donation. Medications for high blood pressure do not disqualify you from donating.
                        <b>Low Blood Pressure</b> - Acceptable as long as you feel well when you come to donate, and your blood pressure is at least 90/50 (systolic/diastolic).</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que28heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que28"
                        aria-expanded="false" aria-controls="que28">
                        <h5 class="mb-0">
                        Pulse (High or Low)
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que28" class="collapse" role="tabpanel" aria-labelledby="que28heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Acceptable as long as your pulse is no more than 100 and no less than 50.  A pulse that is regular and less than 50 will require evaluation by the regional American Bloodcells physician.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que29heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que29"
                        aria-expanded="false" aria-controls="que29">
                        <h5 class="mb-0">
                        Cancer
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que29" class="collapse" role="tabpanel" aria-labelledby="que29heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Eligibility depends on the type of cancer and treatment history. If you had leukemia or lymphoma, including Hodgkin’s Disease and other cancers of the blood, you are not eligible to donate. Other types of cancer are acceptable if the cancer has been treated successfully and it has been more than 12 months since treatment was completed and there has been no cancer recurrence in this time. Lower risk in-situ cancers including squamous or basal cell cancers of the skin that have been completely removed do not require a 12-month waiting period.</h6>
                        <h6>
                        Precancerous conditions of the uterine cervix do not disqualify you from donation if the abnormality has been treated successfully. You should discuss your particular situation with the health historian at the time of donation.</h6>
                        <h6><b>Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que30heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que30"
                        aria-expanded="false" aria-controls="que30">
                        <h5 class="mb-0">
                        Chronic Illnesses
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que30" class="collapse" role="tabpanel" aria-labelledby="que30heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <br><h6>Most chronic illnesses are acceptable as long as you feel well, the condition is under control, and you meet all other eligibility requirements.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que31heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que31"
                        aria-expanded="false" aria-controls="que31">
                        <h5 class="mb-0">
                        CJD, vCJD, Mad Cow Disease
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que31" class="collapse" role="tabpanel" aria-labelledby="que31heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6><b>Diabetes</b><br><br></h6>
                        <h6>Diabetics who are well controlled on insulin or oral medications are eligible to donate.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que32heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que32"
                        aria-expanded="false" aria-controls="que32">
                        <h5 class="mb-0">
                        Heart Disease
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que32" class="collapse" role="tabpanel" aria-labelledby="que32heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>In general, acceptable as long as you have been medically evaluated and treated, have no current (within the last 6 months) heart related symptoms such as chest pain and have no limitations or restrictions on your normal daily activities.</h6>
                        <h6>
                        Wait at least 6 months following an episode of angina.</h6>
                        <h6>
                        Wait at least 6 months following a heart attack.</h6>
                        <h6>
                        Wait at least 6 months after bypass surgery or angioplasty.</h6>
                        <h6>
                        Wait at least 6 months after a change in your heart condition that resulted in a change to your medications</h6>
                        <h6>
                        If you have a pacemaker, you may donate as long as your pulse is between 50 and 100 beats per minute and you meet the other heart disease criteria. You should discuss your particular situation with your personal healthcare provider and the health historian at the time of donation.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que33heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que33"
                        aria-expanded="false" aria-controls="que33">
                        <h5 class="mb-0">
                        Heart Murmur, Heart Valve Disorder
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que33" class="collapse" role="tabpanel" aria-labelledby="que33heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Acceptable if you have a heart murmur as long as you have been medically evaluated and treated and have not had symptoms in the last 6 months and have no restrictions on your normal daily activities.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que34heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que34"
                        aria-expanded="false" aria-controls="que34">
                        <h5 class="mb-0">
                        Hemochromatosis (Hereditary)
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que34" class="collapse" role="tabpanel" aria-labelledby="que34heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Indian Bloodcells does not accept individuals with hemochromatosis as blood donors.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que35heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que35"
                        aria-expanded="false" aria-controls="que35">
                        <h5 class="mb-0">
                        Hemoglobin, Hematocrit, Blood Count
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que35" class="collapse" role="tabpanel" aria-labelledby="que35heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>In order to donate blood, a woman must have a hemoglobin level of at least 12.5 g/dL, and a man must have a hemoglobin level of at least 13.0 g/dL. For all donors, the hemoglobin level can be no greater than 36 g/dL.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que36heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que36"
                        aria-expanded="false" aria-controls="que36">
                        <h5 class="mb-0">
                        Hepatitis, Jaundice
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que36" class="collapse" role="tabpanel" aria-labelledby="que36heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>If you have signs or symptoms of hepatitis (inflammation of the liver) caused by a virus, or unexplained jaundice (yellow discoloration of the skin), you are not eligible to donate blood. If you ever tested positive for hepatitis B or hepatitis C, at any age, you are not eligible to donate, even if you were never sick or jaundiced from the infection.</h6>
                        <h6><b>Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que37heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que37"
                        aria-expanded="false" aria-controls="que37">
                        <h5 class="mb-0">
                        Hepatitis Exposure
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que37" class="collapse" role="tabpanel" aria-labelledby="que37heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>If you live with or have had sexual contact with a person who has hepatitis, you must wait 12 months after the last contact.</h6>
                        <h6>Persons who have been detained or incarcerated in a facility (juvenile detention, lockup, jail, or prison) for more than 72 consecutive hours (3 days) are deferred for 12 months from the date of last occurrence. This includes work release programs and weekend incarceration. These persons are at higher risk for exposure to infectious diseases.</h6>
                        <h6>Wait 12 months after receiving a blood transfusion (unless it was your own "autologous" blood), non-sterile needle stick or exposure to someone else's blood.</h6>
                        <h6><b>Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que38heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que38"
                        aria-expanded="false" aria-controls="que38">
                        <h5 class="mb-0">
                        HIV, AIDS
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que38" class="collapse" role="tabpanel" aria-labelledby="que38heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>You should not give blood if you have AIDS or have ever had a positive HIV test, or if you have done something that puts you at risk for becoming infected with HIV.</h6>
                        <h6>You are at risk for getting infected if you:</h6>
                        <li><h6>have ever used needles to take any drugs, steroids, or anything not prescribed by your doctor</h6></li>
                        <li><h6>are a male who has had sexual contact with another male, in the last 12 months</h6></li>
                        <li><h6>have ever taken money, drugs or other payment for sex</h6></li>
                        <li><h6>have had sexual contact in the past 12 months with anyone described above</h6></li>
                        <h6>You should not give blood if you have any of the following conditions that can be signs or symptoms of HIV/AIDS:</h6>
                        <li><h6>Fever</h6></li>
                        <li><h6>Enlarged lymph glands</h6></li>
                        <li><h6>Sore throat</h6></li>
                        <li><h6>Rash</h6></li>
                        <h6><b>Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que39heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que39"
                        aria-expanded="false" aria-controls="que39">
                        <h5 class="mb-0">
                        Hypertension, High Blood Pressure
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que39" class="collapse" role="tabpanel" aria-labelledby="que39heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>See "Blood Pressure (High)"</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que40heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que40"
                        aria-expanded="false" aria-controls="que40">
                        <h5 class="mb-0">
                        Infections
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que40" class="collapse" role="tabpanel" aria-labelledby="que40heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>If you have a fever or an active infection, wait until the infection has resolved completely before donating blood.</h6>
                        <h6>Wait until finished taking oral antibiotics for an infection (bacterial or viral). Wait 10 days after the last antibiotic injection for an infection.</h6>
                        <h6>Those who have had infections with Chagas Disease, Babesiosis or Leishmaniasis are not eligible to donate.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que41heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que41"
                        aria-expanded="false" aria-controls="que41">
                        <h5 class="mb-0">
                        Malaria
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que41" class="collapse" role="tabpanel" aria-labelledby="que41heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Malaria is transmitted by the bite of mosquitoes found in certain countries and may be transmitted to patients through blood transfusion. Blood donations are not tested for malaria because there is no sensitive blood test available for malaria.</h6>
                        <h6>
                        If you have traveled or lived in a malaria-risk country, we may require a waiting period before you can donate blood.</h6>
                        <li><h6>Wait 3 years after completing treatment for malaria.</h6></li>
                        <li><h6>Wait 12 months after returning from a trip to an area where malaria is found.</h6></li>
                        <li><h6>Wait 3 years after living more than 5 years in a country or countries where malaria is found. An additional waiting period of 3 years may be required if you have traveled to an area where malaria is found if you have not lived a consecutive 3 years in a country or countries where malaria is not found.</h6></li>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que42heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que42"
                        aria-expanded="false" aria-controls="que42">
                        <h5 class="mb-0">
                        Sickle Cell
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que42" class="collapse" role="tabpanel" aria-labelledby="que42heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Acceptable if you have sickle cell trait. Those with sickle cell disease are not eligible to donate.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que43heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que43"
                        aria-expanded="false" aria-controls="que43">
                        <h5 class="mb-0">
                        Skin Disease, Rash, Acne
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que43" class="collapse" role="tabpanel" aria-labelledby="que43heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Acceptable as long as the skin over the vein to be used to collect blood is not affected. If the skin disease has become infected, wait until the infection has cleared before donating. Taking antibiotics to control acne does not disqualify you from donating.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que44heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que44"
                        aria-expanded="false" aria-controls="que44">
                        <h5 class="mb-0">
                        Tuberculosis
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que44" class="collapse" role="tabpanel" aria-labelledby="que44heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>If you have active tuberculosis or are being treated for active tuberculosis you should not donate. Acceptable if you have a positive skin test or blood test, but no active tuberculosis and are NOT taking antibiotics. If you are receiving antibiotics for a positive TB skin test or blood test only or if you are being treated for a tuberculosis infection, wait until treatment is successfully completed before donating.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que45heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que45"
                        aria-expanded="false" aria-controls="que45">
                        <h5 class="mb-0">
                        Measles Exposure
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que45" class="collapse" role="tabpanel" aria-labelledby="que45heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Acceptable if you are healthy and well and have been vaccinated for measles more than 4 weeks ago or were born before 1956. If you have not been vaccinated or it has been less than 4 weeks since being vaccinated, wait 4 weeks from the date of the vaccination or exposure before donating.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="eligibility" class="ml-2 mt-5 text-primary"><h4>Medical Treatments</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que46heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que46"
                        aria-expanded="false" aria-controls="que46">
                        <h5 class="mb-0">
                        Acupuncture
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que46" class="collapse" role="tabpanel" aria-labelledby="que46heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Donors who have undergone acupuncture treatments are acceptable.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que47heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que47"
                        aria-expanded="false" aria-controls="que47">
                        <h5 class="mb-0">
                        Blood Transfusion
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que47" class="collapse" role="tabpanel" aria-labelledby="que47heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Wait for 12 months after receiving a blood transfusion from another person in the United States.</h6>
                        <h6>
                        You may not donate if you received a blood transfusion since 1980 in the United Kingdom or France (The United Kingdom consists of the following countries: England, Wales, Scotland, Northern Ireland, Channel Islands, Isle of Man, Gibraltar or Falkland Islands). This requirement is related to concerns about variant CJD, or 'mad cow' disease.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que48heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que48"
                        aria-expanded="false" aria-controls="que48">
                        <h5 class="mb-0">
                        Dental Procedures and Oral Surgery
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que48" class="collapse" role="tabpanel" aria-labelledby="que48heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Acceptable after dental procedures as long as there is no infection present. Wait until finishing antibiotics for a dental infection. Wait for 3 days after having oral surgery.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que49heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que49"
                        aria-expanded="false" aria-controls="que49">
                        <h5 class="mb-0">
                        Hormone Replacement Therapy (HRT)
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que49" class="collapse" role="tabpanel" aria-labelledby="que49heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>Women on hormone replacement therapy for menopausal symptoms and prevention of osteoporosis are eligible to donate.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que50heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que50"
                        aria-expanded="false" aria-controls="que50">
                        <h5 class="mb-0">
                        Organ/Tissue Transplants
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que50" class="collapse" role="tabpanel" aria-labelledby="que50heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Wait 12 months after receiving any type of organ transplant from another person. If you ever received a dura mater (brain covering) transplant, you are not eligible to donate. This requirement is related to concerns about the brain disease, Creutzfeld-Jacob Disease (CJD).</h6>
                        <h6>
                        If you ever received a transplant of animal organs or of living animal tissue - you are not eligible to donate blood.  Non-living animal tissues such as bone, tendon, or heart valves are acceptable.</h6>
                        <h6><b>
                        Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que51heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que51"
                        aria-expanded="false" aria-controls="que51">
                        <h5 class="mb-0">
                        Surgery
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que51" class="collapse" role="tabpanel" aria-labelledby="que51heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        It is not necessarily surgery but the underlying condition that precipitated the surgery that requires evaluation before donation. Evaluation is on a case by case basis. You should discuss your particular situation with the health historian at the time of donation.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="eligibility" class="ml-2 mt-5 text-gray-900"><h4>Lifestyle and Life Events</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que52heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que52"
                        aria-expanded="false" aria-controls="que52">
                        <h5 class="mb-0">
                        Age
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que52" class="collapse" role="tabpanel" aria-labelledby="que52heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        You must be at least 17 years old to donate to the general blood supply, or 16 years old with parental/guardian consent, if allowed by state law. Learn more. There is no upper age limit for blood donation as long as you are well with no restrictions or limitations to your activities.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que53heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que53"
                        aria-expanded="false" aria-controls="que53">
                        <h5 class="mb-0">
                        Donor Deferral for Men Who Have Had Sex With Men (MSM)
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que53" class="collapse" role="tabpanel" aria-labelledby="que53heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        First-time male donors may be eligible to donate blood if they have not had sex with another man in more than 12 months. This policy change aligns the MSM donor deferral period with those for other activities that may pose a similar risk of transfusion-transmissible infections. All additional blood donation eligibility criteria will apply. </h6>
                        <h6>
                        Donors who were previously deferred under the prior MSM policy will be evaluated for reinstatement. It is important to understand that the donor reinstatement process involves potentially thousands of donors, and it will take time.</h6>
                        <h6>
                        Individuals who have been deferred for MSM in the past may initiate donor reinstatement by contacting the Bloodcells Donor and Client Support Center at 1-866-236-3276. Individuals with questions about their donation eligibility can contact the Bloodcells Donor and Client Support Center at 1-866-236-3276. We appreciate the patience of our valued donors as we continue to diligently work to implement these changes so that more people can give blood for those in need.</h6>
                        <h6>
                        For the purposes of blood donation gender is self-identified and self-reported, which is relevant to the transgender community.</h6>
                        <h6>
                        More information about the FDA policy is available for LGBTQ+ donors.</h6>
                        <h6><b>
                        Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que54heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que54"
                        aria-expanded="false" aria-controls="que54">
                        <h5 class="mb-0">
                        Intravenous Drug Use
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que54" class="collapse" role="tabpanel" aria-labelledby="que54heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Those who have ever used IV drugs that were not prescribed by a physician are not eligible to donate. This requirement is related to concerns about hepatitis and HIV. </h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que55heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que55"
                        aria-expanded="false" aria-controls="que55">
                        <h5 class="mb-0">
                        Pregnancy, Nursing
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que55" class="collapse" role="tabpanel" aria-labelledby="que55heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Persons who are pregnant are not eligible to donate. Wait 6 weeks after giving birth.</h6>
                        <h6><b>Unable to Give Blood?</b></h6>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que56heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que56"
                        aria-expanded="false" aria-controls="que56">
                        <h5 class="mb-0">
                        Tattoo
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que56" class="collapse" role="tabpanel" aria-labelledby="que56heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Wait 12 months after a tattoo if the tattoo was applied in a state that does not regulate tattoo facilities. Currently, the only states that DO NOT regulate tattoo facilities are: District of Columbia, Georgia, Idaho, Maryland, Massachusetts, New Hampshire, New York, Pennsylvania, Utah and Wyoming. This requirement is related to concerns about hepatitis. Learn more about hepatitis and blood donation.</h6>
                        <h6>
                        A tattoo is acceptable if the tattoo was applied by a state-regulated entity using sterile needles and ink that is not reused. Cosmetic tattoos applied in a licensed establishment in a regulated state using sterile needles and ink that is not reused is acceptable. You should discuss your particular situation with the health historian at the time of donation.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que57heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que57"
                        aria-expanded="false" aria-controls="que57">
                        <h5 class="mb-0">
                        Piercing (ears, body), Electrolysis
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que57" class="collapse" role="tabpanel" aria-labelledby="que57heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Acceptable as long as the instruments used were single-use equipment and disposable (which means both the gun and the earing cassette were disposable). Wait 12 months if a piercing was performed using a reusable gun or any reusable instrument.</h6>
                        <h6>
                        Wait 12 months if there is any question whether or not the instruments used were single-use equipment. This requirement is related to concerns about hepatitis. Learn more about hepatitis and blood donation.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="eligibility" class="ml-2 mt-5 text-danger"><h4>Sexually Transmitted Diseases</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que58heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que58"
                        aria-expanded="false" aria-controls="que58">
                        <h5 class="mb-0">
                        Sexually Transmitted Disease
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que58" class="collapse" role="tabpanel" aria-labelledby="que58heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Wait 12 months after treatment for syphilis or gonorrhea.</h6>
                        <h6>
                        Acceptable if it has been more than 12 months since you completed treatment for syphilis or gonorrhea.</h6>
                        <h6>
                        Chlamydia, venereal warts (human papilloma virus), or genital herpes are not a cause for deferral if you are feeling healthy and well and meet all other eligibility requirements.</h6>
                        <b><h6>
                        Unable to Give Blood?</h6></b>
                        <h6>Consider volunteering or hosting a blood drive through the Bloodcells. You can also help people facing emergencies by making a financial donation to support the Bloodcells’s greatest needs. Your gift enables the Bloodcells to ensure an ongoing blood supply, provide humanitarian support to families in need and prepare communities by teaching lifesaving skills.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que59heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que59"
                        aria-expanded="false" aria-controls="que59">
                        <h5 class="mb-0">
                        Venereal Diseases
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que59" class="collapse" role="tabpanel" aria-labelledby="que59heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        See also "Sexually Transmitted Disease"</h6>
                        <h6>Wait 12 months after treatment for syphilis or gonorrhea.</h6>
                        <h6>Chlamydia, venereal warts (human papilloma virus), or genital herpes are not a cause for deferral if you are feeling healthy and well and meet all other eligibility requirements.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que60heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que60"
                        aria-expanded="false" aria-controls="que60">
                        <h5 class="mb-0">
                        Syphilis/Gonorrhea
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que60" class="collapse" role="tabpanel" aria-labelledby="que60heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Wait 12 months after treatment for syphilis or gonorrhea.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
          <div class="container">
              <div class="container"data-aos="fade-up">
                <label for="eligibility" class="ml-2 mt-5 text-success"><h4>About Hosting</h4></label>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que61heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que61"
                        aria-expanded="false" aria-controls="que61">
                        <h5 class="mb-0">
                        I am interested in hosting a blood drive, who do I contact?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que61" class="collapse" role="tabpanel" aria-labelledby="que61heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h5>Please complete this online form and a Bloodcells representative will contact you.</h5>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que62heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que62"
                        aria-expanded="false" aria-controls="que62">
                        <h5 class="mb-0">
                        What are the requirements for an organization to host a blood drive?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que62" class="collapse" role="tabpanel" aria-labelledby="que62heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Any organization can participate in the blood program. Based on experience, the organization should have enough members to hold a blood drive, but your Bloodcells representative will work with you determine how you can partner with the Bloodcells if you have fewer people. Learn more about requirements for hosting.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que63heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que63"
                        aria-expanded="false" aria-controls="que63">
                        <h5 class="mb-0">
                        Will the Bloodcells bring a blood drive to our location?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que63" class="collapse" role="tabpanel" aria-labelledby="que63heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Blood drives can be held either on a Bloodcells blood donation bus or in the facility of the hosting organization. Most sponsors choose to host the drive in their facility. However, our Bloodcells representative will work with you to determine the best set up for your blood drive.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que64heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que64"
                        aria-expanded="false" aria-controls="que64">
                        <h5 class="mb-0">
                        I do not have enough appointments to meet the blood drive goal, what can I do?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que64" class="collapse" role="tabpanel" aria-labelledby="que64heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        Please see recruitment strategies and tips.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                  <!-- Accordion card -->
                  <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="que65heading">
                      <a class="collapsed text-dark" style="text-decoration: none;
                        color: inherit;" data-toggle="collapse" data-parent="#accordionEx" href="#que65"
                        aria-expanded="false" aria-controls="que65">
                        <h5 class="mb-0">
                        Can I give donors incentives or gifts for participating?
                        </h5>
                      </a>
                    </div>
                    <!-- Card body -->
                    <div id="que65" class="collapse" role="tabpanel" aria-labelledby="que65heading" data-parent="#accordionEx">
                      <div class="container card-body px-5 text-dark">
                        <h6>
                        All donors are required to be truly “volunteer” donors by the FDA, and not be reimbursed for their donation, so any gift or incentive offered must be offered to all participants of a blood drive – donors and volunteers alike. This helps ensure all people are honest about their health history. All incentives offered must be reviewed and approved by your Bloodcells representative.</h6>
                      </div>
                    </div>
                  </div>
                  <!-- Accordion card -->
                </div>
              </div>
          </div>
        </div>
      </div>  <!--  all card end -->
              <?php include 'include/footer.php'; ?>
    </div> <!--end home -->
              <!--
              <div class="container py-5">
                <h4> Welcome <?php //echo $_SESSION['username']; ?> </h4>
                <h2 class="py-5"><a href="logout.php">Logout</a></h2>
              </div>
              -->
            <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
              'use strict';
              window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
              }
              form.classList.add('was-validated');
              }, false);
              });
              }, false);
              })();
            </script>
              <script>//$('.carousel').carousel()</script>

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

            </body>
          </html>