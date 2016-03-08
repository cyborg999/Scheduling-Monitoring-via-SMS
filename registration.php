<?php include_once "backend/process.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Marelco</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
        <style type="text/css">

            #filedrag
            {
            display: none;
            font-weight: bold;
            text-align: center;
            padding: 1em 0;
            margin: 1em 0;
            color: #555;
            border: 2px dashed red;
            border-radius: 7px;
            cursor: default;
            }

            #filedrag.hover
            {
            color: #f00;
            border-color: #f00;
            border-style: solid;
            box-shadow: inset 0 3px 4px #888;
            }

            img
            {
            max-width: 100%;
            }

            pre
            {
            width: 95%;
            height: 8em;
            font-family: monospace;
            font-size: 0.9em;
            padding: 1px 2px;
            margin: 0 0 1em auto;
            border: 1px inset #666;
            background-color: #eee;
            overflow: auto;
            }

            #messages
            {
            padding: 0 10px;
            margin: 1em 0;
            }

            #progress p
            {
            display: block;
            width: 240px;
            padding: 2px 5px;
            margin: 2px 0;
            border: 1px inset #446;
            border-radius: 5px;
            background: #eee url("css/progress.png") 100% 0 repeat-y;
            }

            #progress p.success
            {
            background: #0c0 none 0 0 no-repeat;
            }

            #progress p.failed
            {
            background: #c00 none 0 0 no-repeat;
            }
            </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
           <li class="this"><a href="" class="blog-nav-item ">Supply Monitoring and Repair Management System</a></li>
           <li class="this"><a class="blog-nav-item pull-right" href="login.php">Login</a></li>
           <li class="this"><a class="blog-nav-item pull-right active" href="registration.php">Application for Membership</a></li>
           <li class="this"><a class="blog-nav-item pull-right " href="complaints_requirements.php">Services</a>
            <ol class="pull-right" style="left:280px;">
              <li><a href="complaints_requirements.php">Complaints</a></li>
              <li><a href="requests_requirements.php">Requests</a></li>
            </ol>
           </li>
            
           <li class="this "><a class="blog-nav-item pull-right " href="index.php">Home</a></li>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title" style="text-align:center;">Application For Membership and Information Sheet</h1>
      </div>
      <br>
      <div class="row">
        <form id="frmUpdate">
        <input type="hidden" name="addApplication" value="true"/>
        <input type="hidden" name="walkInApplicant" value="true"/>
        <input type="hidden" name="photo" id="photo" class="form-control" placeholder="photo..."/>
        <div class="col-sm-7">
          <table class="table">
            <thead>
              <tr>
                <th><h3>Personal</h3></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>  <label class="control-label" for="firstname">Firstname</label> </td>
                <td>
                  <input class="form-control" type="text" id="firstname" required value="" name="firstname" placeholder="firstname...">
                </td>
              </tr>
              <tr>
                <td> <label class="control-label" for="lastname">Lastname</label></td>
                <td>  <input class="form-control" type="text" id="lastname" required value=""  name="lastname" placeholder="lastname..."></td>
              </tr>
              <tr>
                <td><label class="control-label" for="middlename">Middlename</label></td>
                <td><input class="form-control" type="text" id="middlename" required value="" name="middlename" placeholder="middlename..."></td>
              </tr>
              <tr>
                <td><label class="control-label" for="contact_number">Contact Number</label></td>
                <td><input class="form-control" type="text" id="contact_number" required value="" name="contact_number" placeholder="contact number..."></td>
              </tr>
              <tr>
                <td colspan="2">
                  <hr>
                </td>
              </tr>
               <tr>
                <td> <label class="control-label" for="brgy">Brgy</label></td>
                <td>
                  <?php $brgy = $model->getAllBrgy();?>
                  <select class="form-control" name="brgy" id="brgy">
                    <?php foreach($brgy as $b){ ?>
                      <option value="<?= $b['name'];?>"><?= $b['name'];?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
               <tr>
                <td> <label class="control-label" for="municipality">Municipality</label></td>
                <td>
                  <select class="select form-control" id="municipality" name="municipality">
                      <option value="boac">Boac</option>
                      <option value="mogpog">Mogpog</option>
                      <option value="gasan">Gasan</option>
                      <option value="stacrus">Sta. Cruz</option>
                      <option value="buenavista">Buenavista</option>
                      <option value="torrijos">Torrijos</option>
                  </select>
                </td>
              </tr>
              <tr class="hidden">
                <td><label class="control-label" for="address">Address</label></td>
                <td><input class="form-control" type="text" value=""  id="address" name="address" placeholder="address..."></td>
              </tr>
              <tr>
                <td><label class="control-label" for="nationality">Nationality</label></td>
                <td>
                  <select name="nationality" class="form-control" id="nationality">
                      <option value="afghan">Afghan</option>
                      <option value="albanian">Albanian</option>
                      <option value="algerian">Algerian</option>
                      <option value="american">American</option>
                      <option value="andorran">Andorran</option>
                      <option value="angolan">Angolan</option>
                      <option value="antiguans">Antiguans</option>
                      <option value="argentinean">Argentinean</option>
                      <option value="armenian">Armenian</option>
                      <option value="australian">Australian</option>
                      <option value="austrian">Austrian</option>
                      <option value="azerbaijani">Azerbaijani</option>
                      <option value="bahamian">Bahamian</option>
                      <option value="bahraini">Bahraini</option>
                      <option value="bangladeshi">Bangladeshi</option>
                      <option value="barbadian">Barbadian</option>
                      <option value="barbudans">Barbudans</option>
                      <option value="batswana">Batswana</option>
                      <option value="belarusian">Belarusian</option>
                      <option value="belgian">Belgian</option>
                      <option value="belizean">Belizean</option>
                      <option value="beninese">Beninese</option>
                      <option value="bhutanese">Bhutanese</option>
                      <option value="bolivian">Bolivian</option>
                      <option value="bosnian">Bosnian</option>
                      <option value="brazilian">Brazilian</option>
                      <option value="british">British</option>
                      <option value="bruneian">Bruneian</option>
                      <option value="bulgarian">Bulgarian</option>
                      <option value="burkinabe">Burkinabe</option>
                      <option value="burmese">Burmese</option>
                      <option value="burundian">Burundian</option>
                      <option value="cambodian">Cambodian</option>
                      <option value="cameroonian">Cameroonian</option>
                      <option value="canadian">Canadian</option>
                      <option value="cape verdean">Cape Verdean</option>
                      <option value="central african">Central African</option>
                      <option value="chadian">Chadian</option>
                      <option value="chilean">Chilean</option>
                      <option value="chinese">Chinese</option>
                      <option value="colombian">Colombian</option>
                      <option value="comoran">Comoran</option>
                      <option value="congolese">Congolese</option>
                      <option value="costa rican">Costa Rican</option>
                      <option value="croatian">Croatian</option>
                      <option value="cuban">Cuban</option>
                      <option value="cypriot">Cypriot</option>
                      <option value="czech">Czech</option>
                      <option value="danish">Danish</option>
                      <option value="djibouti">Djibouti</option>
                      <option value="dominican">Dominican</option>
                      <option value="dutch">Dutch</option>
                      <option value="east timorese">East Timorese</option>
                      <option value="ecuadorean">Ecuadorean</option>
                      <option value="egyptian">Egyptian</option>
                      <option value="emirian">Emirian</option>
                      <option value="equatorial guinean">Equatorial Guinean</option>
                      <option value="eritrean">Eritrean</option>
                      <option value="estonian">Estonian</option>
                      <option value="ethiopian">Ethiopian</option>
                      <option value="fijian">Fijian</option>
                      <option value="filipino">Filipino</option>
                      <option value="finnish">Finnish</option>
                      <option value="french">French</option>
                      <option value="gabonese">Gabonese</option>
                      <option value="gambian">Gambian</option>
                      <option value="georgian">Georgian</option>
                      <option value="german">German</option>
                      <option value="ghanaian">Ghanaian</option>
                      <option value="greek">Greek</option>
                      <option value="grenadian">Grenadian</option>
                      <option value="guatemalan">Guatemalan</option>
                      <option value="guinea-bissauan">Guinea-Bissauan</option>
                      <option value="guinean">Guinean</option>
                      <option value="guyanese">Guyanese</option>
                      <option value="haitian">Haitian</option>
                      <option value="herzegovinian">Herzegovinian</option>
                      <option value="honduran">Honduran</option>
                      <option value="hungarian">Hungarian</option>
                      <option value="icelander">Icelander</option>
                      <option value="indian">Indian</option>
                      <option value="indonesian">Indonesian</option>
                      <option value="iranian">Iranian</option>
                      <option value="iraqi">Iraqi</option>
                      <option value="irish">Irish</option>
                      <option value="israeli">Israeli</option>
                      <option value="italian">Italian</option>
                      <option value="ivorian">Ivorian</option>
                      <option value="jamaican">Jamaican</option>
                      <option value="japanese">Japanese</option>
                      <option value="jordanian">Jordanian</option>
                      <option value="kazakhstani">Kazakhstani</option>
                      <option value="kenyan">Kenyan</option>
                      <option value="kittian and nevisian">Kittian and Nevisian</option>
                      <option value="kuwaiti">Kuwaiti</option>
                      <option value="kyrgyz">Kyrgyz</option>
                      <option value="laotian">Laotian</option>
                      <option value="latvian">Latvian</option>
                      <option value="lebanese">Lebanese</option>
                      <option value="liberian">Liberian</option>
                      <option value="libyan">Libyan</option>
                      <option value="liechtensteiner">Liechtensteiner</option>
                      <option value="lithuanian">Lithuanian</option>
                      <option value="luxembourger">Luxembourger</option>
                      <option value="macedonian">Macedonian</option>
                      <option value="malagasy">Malagasy</option>
                      <option value="malawian">Malawian</option>
                      <option value="malaysian">Malaysian</option>
                      <option value="maldivan">Maldivan</option>
                      <option value="malian">Malian</option>
                      <option value="maltese">Maltese</option>
                      <option value="marshallese">Marshallese</option>
                      <option value="mauritanian">Mauritanian</option>
                      <option value="mauritian">Mauritian</option>
                      <option value="mexican">Mexican</option>
                      <option value="micronesian">Micronesian</option>
                      <option value="moldovan">Moldovan</option>
                      <option value="monacan">Monacan</option>
                      <option value="mongolian">Mongolian</option>
                      <option value="moroccan">Moroccan</option>
                      <option value="mosotho">Mosotho</option>
                      <option value="motswana">Motswana</option>
                      <option value="mozambican">Mozambican</option>
                      <option value="namibian">Namibian</option>
                      <option value="nauruan">Nauruan</option>
                      <option value="nepalese">Nepalese</option>
                      <option value="new zealander">New Zealander</option>
                      <option value="ni-vanuatu">Ni-Vanuatu</option>
                      <option value="nicaraguan">Nicaraguan</option>
                      <option value="nigerien">Nigerien</option>
                      <option value="north korean">North Korean</option>
                      <option value="northern irish">Northern Irish</option>
                      <option value="norwegian">Norwegian</option>
                      <option value="omani">Omani</option>
                      <option value="pakistani">Pakistani</option>
                      <option value="palauan">Palauan</option>
                      <option value="panamanian">Panamanian</option>
                      <option value="papua new guinean">Papua New Guinean</option>
                      <option value="paraguayan">Paraguayan</option>
                      <option value="peruvian">Peruvian</option>
                      <option value="polish">Polish</option>
                      <option value="portuguese">Portuguese</option>
                      <option value="qatari">Qatari</option>
                      <option value="romanian">Romanian</option>
                      <option value="russian">Russian</option>
                      <option value="rwandan">Rwandan</option>
                      <option value="saint lucian">Saint Lucian</option>
                      <option value="salvadoran">Salvadoran</option>
                      <option value="samoan">Samoan</option>
                      <option value="san marinese">San Marinese</option>
                      <option value="sao tomean">Sao Tomean</option>
                      <option value="saudi">Saudi</option>
                      <option value="scottish">Scottish</option>
                      <option value="senegalese">Senegalese</option>
                      <option value="serbian">Serbian</option>
                      <option value="seychellois">Seychellois</option>
                      <option value="sierra leonean">Sierra Leonean</option>
                      <option value="singaporean">Singaporean</option>
                      <option value="slovakian">Slovakian</option>
                      <option value="slovenian">Slovenian</option>
                      <option value="solomon islander">Solomon Islander</option>
                      <option value="somali">Somali</option>
                      <option value="south african">South African</option>
                      <option value="south korean">South Korean</option>
                      <option value="spanish">Spanish</option>
                      <option value="sri lankan">Sri Lankan</option>
                      <option value="sudanese">Sudanese</option>
                      <option value="surinamer">Surinamer</option>
                      <option value="swazi">Swazi</option>
                      <option value="swedish">Swedish</option>
                      <option value="swiss">Swiss</option>
                      <option value="syrian">Syrian</option>
                      <option value="taiwanese">Taiwanese</option>
                      <option value="tajik">Tajik</option>
                      <option value="tanzanian">Tanzanian</option>
                      <option value="thai">Thai</option>
                      <option value="togolese">Togolese</option>
                      <option value="tongan">Tongan</option>
                      <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                      <option value="tunisian">Tunisian</option>
                      <option value="turkish">Turkish</option>
                      <option value="tuvaluan">Tuvaluan</option>
                      <option value="ugandan">Ugandan</option>
                      <option value="ukrainian">Ukrainian</option>
                      <option value="uruguayan">Uruguayan</option>
                      <option value="uzbekistani">Uzbekistani</option>
                      <option value="venezuelan">Venezuelan</option>
                      <option value="vietnamese">Vietnamese</option>
                      <option value="welsh">Welsh</option>
                      <option value="yemenite">Yemenite</option>
                      <option value="zambian">Zambian</option>
                      <option value="zimbabwean">Zimbabwean</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td> <label class="control-label" for="civil_status">Civil Status</label></td>
                <td><select class="form-control" name="civil_status" id="civil_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Separated">Separated</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                  </select></td>
              </tr>
              <tr>
                <td><label class="control-label" for="dob">Date of Birth</label></td>
                <td><input class="form-control" type="text" value=""  id="dob" name="dob" placeholder="Date of Birth..."></td>
              </tr>
               <tr>
                <td><label class="control-label" for="age">Age</label></td>
                <td><input class="form-control" readonly type="text" id="age" name="age" value=""  placeholder="age..."></td>
              </tr>
              <tr>
              <tr>
                <td><label class="control-label" for="pob">Place of Birth</label></td>
                <td> <input class="form-control" type="text" value=""  id="pob" name="pob" placeholder="Place of Birth..."></td>
              </tr>
             
                <td><label class="control-label" for="gender">Gender</label></td>
                <td>
                  <div class="radio-inline">
                    <label> <input type="radio" name="gender" id="male" checked value="male">Male</label>
                  </div>
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="gender"  id="female" value="female">Female
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="control-label" for="religion">Religion</label>
                </td>
                <td>
                  <input class="form-control" type="text" value=""  id="religion" name="religion" placeholder="religion...">
                </td>
              </tr>
              <tr class="hidden">
                <td><label class="control-label" for="weight">Weight</label></td>
                <td><input class="form-control" type="text" value=""  id="weight" name="weight" placeholder="weight..."></td>
              </tr>
              <tr class="hidden">
                <td><label class="control-label" for="height">Height</label></td>
                <td><input class="form-control" type="text" value=""  id="height" name="height" placeholder="height..."></td>
              </tr>
            </tbody>
          </table>
          <table class="table hidden" id="spouse">
            <thead>
              <tr>
                <th><h3>Spouse</h3></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label class="control-label" for="s_lastname">Lastname</label></td>
                <td><input class="form-control" type="text" value=""   id="s_lastname" name="s_lastname" placeholder="lastname..."></td>
              </tr>
              <tr>
                <td> <label class="control-label" for="s_firstname">Firstname</label></td>
                <td>
                  <input class="form-control" type="text" value=""  id="s_firstname" name="s_firstname" placeholder="firstname...">
                </td>
              </tr>
              <tr>
                <td><label class="control-label" for="s_middlename">Middlename</label></td>
                <td><input class="form-control" type="text" value=""  id="s_middlename" name="s_middlename" placeholder="middlename..."></td>
              </tr>
              <tr>
                <td><label class="control-label" for="s_dob">Date of Birth</label></td>
                <td><input class="form-control" type="text" value=""  id="s_dob" name="s_dob" placeholder="dob..."></td>
              </tr>
              <tr>
                <td>  <label class="control-label" for="s_pob">Place of Birth</label></td>
                <td> <input class="form-control" type="text" value=""  id="s_pob" name="s_pob" placeholder="place of birth..."></td>
              </tr>
              <tr>
                <td><label class="control-label" for="s_age">Age</label></td>
                <td><input class="form-control" readonly  type="text" value=""  id="s_age" name="s_age" placeholder="age..."></td>
              </tr>
              <tr>
                <td><label class="control-label" for="s_occupation">Occupation</label></td>
                <td><input class="form-control" type="text" value=""  id="s_occupation" name="s_occupation" placeholder="occupation..."></td>
              </tr>
            </tbody>
          </table>
          <table class="table hidden" id="children">
            <thead>
              <tr>
                <th>
                  <h3>Children</h3>
                </th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label>Name</label></td>
                <td><label>Date of Birth</label></td>
                <td></td>
              </tr>
              <tr>
                <td><input type="text" name="c-name[]" class="children-name form-control" placeholder="Name"/></td>
                <td><input type="text" name="c-dob[]" class="children-dob form-control" placeholder="Birthdate"/></td>
                <td>
                  <a href="" class="btn delete-child"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">
                  <button class="add-children btn">
                    <span class="glyphicon glyphicon-plus glyphicon "></span>
                  </button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-sm-5">
          <!-- other information -->
          <table class="table">
            <thead>
              <tr>
                <th>
                  <h3>Membership Info</h3>
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label class="control-label" for="membership_type">Type of Membership</label></td>
                <td>
                  <select class="form-control" id="membership_type" name="membership_type">
                      <option value="Single">Single</option>
                      <option value="Joint">Joint</option>
                      <option value="Juridical">Juridical</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><label class="control-label" for="consumer_type">Type of Consumer</label></td>
                <td><select class="select form-control" name="consumer_type" id="consumer_type">
                      <option value="Residential">Residential</option>
                      <option value="Commercial">Commercial</option>
                      <!-- <option value="Industrial">Industrial</option> -->
                      <!-- <option value="Public Building">Public Building</option> -->
                      <!-- <option value="Water System">Water System</option> -->
                      <!-- <option value="Special Light">Special Light</option> -->
                  </select></td>
              </tr>
            </tbody>
          </table>
          <table class="table hidden">
            <thead>
              <tr>
                <th colspan="2">
                  <h3>Account Information</h3>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label>Username</label></td>
                <td> <input type="text" name="username" class="form-control m-b-10" placeholder="Username"></td>
              </tr>
              <tr>
                <td><label>Email</label></td>
                <td><input type="email" name="email" class="form-control m-b-10" placeholder="Email Address"> </td>
              </tr>
              <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password" class="form-control m-b-10" placeholder="Password"></td>
              </tr>
              <tr>
                <td><label>Password</label></td>
                <td>
              <input name="type" type="hidden" value="applicant"/>
                  <input type="password" name="password2" class="form-control m-b-20" placeholder="Confirm Password"></td>
              </tr>
              <tr>
                <td>
                  <input type="submit" value="register" class="btn btn-lg btn-success"/>
                </td>
              </tr>
              <tr>
                <td>
                </td>
              </tr>
            </tbody>
          </table>
                   <table class="table">
            <tr>
                 <td>
                  <input type="submit" value="register" class="btn btn-lg btn-success"/>
                </td>
            </tr>
          </table>
        </div>
          
        </form>
        <br>
          <br>
                  <ul id="errors"></ul>

      </div>

    </div><!-- /.container -->
   
    <footer class="blog-footer">
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
  <script type="text/html" id="tpl2">
      <option value="[ID]">[MUNICIPALITY]</option>
    </script>
    <script type="text/html" id="tpl">
      <tr>
        <td><input type="text" name="c-name[]" class="children-name form-control" placeholder="Name"/></td>
        <td><input type="text" name="c-dob[]" class="children-dob form-control" placeholder="Birthdate"/></td>
        <td>
          <a href="" class="btn delete-child"><span class="glyphicon glyphicon-remove"></span></a>
        </td>
      </tr>
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script> <!-- jQuery Library -->
    <script src="js/jquery-ui.min.js"></script> <!-- jQuery Library -->
    <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript">
        (function($){
            var Dashboard = {
                __init : function(){
                    this.__listen();
                },
                __error : function(error){
                    for(var i in error){
                      $("#errors").append("<li>"+error[i]+"</li>");
                    }
                },
                __listen : function(){
                    var me      = this;
                    var addChildren = $(".add-children");
                    var removeChild = $(".delete-child");
                    var municipality = $("#municipality");

                    municipality.on("change", function(e){
                      var m = $(this).val();
                      var target = $("#brgy");

                      target.html("");

                      $.ajax({
                        url   : "backend/process.php",
                        data  : {ajaxMunicipality : m},
                        type  : 'POST',
                        dataType  : 'JSON',
                        success   : function(response){
                          for(var i in response){
                            var tpl = $("#tpl2").html();

                            tpl = tpl.replace("[ID]", response[i].id).
                              replace("[MUNICIPALITY]", response[i].name);

                              target.append(tpl);
                          }
                          console.log(response);
                        },
                        error     : function(){
                          console.log("err");
                        }
                      });
                    });

                    removeChild.on("click", function(e){
                      $(this).parents("tr").remove();
                      
                      e.preventDefault();
                    });

                    addChildren.on("click", function(e){
                      var target = $("#children tbody");
                      var tpl = $("#tpl").html();

                      target.append(tpl);
                      var removeChild = $(".delete-child");

                      removeChild.on("click", function(e){
                        $(this).parents("tr").remove();
                        
                        e.preventDefault();
                      });
                      
                      e.preventDefault();
                    });
                    
                    $("#dob, #s_dob").datepicker();
                    $("#dob").on("change", function(){
                      var date = $(this).val();
                      var dob = new Date(date);
                      var today = new Date(); 
                      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                      $("#age").val(age);
                    });

                      $("#s_dob").on("change", function(){
                      var date = $(this).val();
                      var dob = new Date(date);
                      var today = new Date(); 
                      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                      $("#s_age").val(age);
                    });

                    $("#civil_status").on("change", function(){
                      var val = $(this).val();
                      if(val != "Single"){
                        $("#spouse").removeClass("hidden");
                        $("#children").removeClass("hidden");
                      } else {
                        $("#children").removeClass("hidden");
                        $("#spouse").addClass("hidden");
                      }
                    });

                    $("#frmUpdate").on("submit", function(e){
                        e.preventDefault();
                        $.ajax({
                          url : 'backend/process.php',
                          data  : $(this).serialize(),
                          type  : 'POST',
                          dataType :'JSON',
                          success: function(response){
                            $("#errors").html("");
                            console.log(response);
                            if(response.added != null){
                                alert("Record is succesfully Added.");
                                //send notification
                                $.ajax({
                                  url   : "backend/process.php",
                                  data  : {
                                    sendMembershopNotification  : true,
                                    number                      : response.number,
                                    type                        : response.type},
                                  type  : 'POST',
                                  dataType  : 'JSON',
                                  success   : function(response){
                                    console.log("Requirements Notification Sent!");
                                  },
                                  error     : function(){
                                    console.log("err");
                                  }
                                });
                                //membership id,number,requirements
                                    // $("#success").removeClass("hidden").fadeIn("slow");
                            } else {
                                if(response.error.length > 0){
                                    me.__error(response.error);
                                }    
                            }
                            
                            // $("#info").modal("show");
                          },
                          error   : function(){
                            console.log("Oops, something went wrong");
                          }
                        });

                      });

                }   
              
            }

            Dashboard.__init();
                   // getElementById
        function $id(id) {
            return document.getElementById(id);
        }


        // output information
        function Output(msg) {
            var m = $id("messages");
            m.innerHTML = msg;
        }


        // file drag hover
        function FileDragHover(e) {
            e.stopPropagation();
            e.preventDefault();
            e.target.className = (e.type == "dragover" ? "hover" : "");
        }


        // file selection
        function FileSelectHandler(e) {

            // cancel event and hover styling
            FileDragHover(e);

            // fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                ParseFile(f);
                // UploadFile(f);
            }

        }


        // output file information
        function ParseFile(file) {
            var found   = false;

            // display an image
            if (file.type.indexOf("image") == 0) {
                found = true;
            }

            if(found != true){
                console.log("Invalid File Format");
                console.log(file);
            } else {
                $("#photo").val(file.name);
                UploadFile(file);
            }
        }


        function UploadFile(file) {

            var xhr = new XMLHttpRequest();
            if (xhr.upload ) {

                // // create progress bar
                // var o = $id("progress");
                // var progress = o.appendChild(document.createElement("p"));
                // progress.appendChild(document.createTextNode("upload " + file.name));


                // // progress bar
                // xhr.upload.addEventListener("progress", function(e) {
                //     var pc = parseInt(100 - (e.loaded / e.total * 100));
                //     progress.style.backgroundPosition = pc + "% 0";
                // }, false);

                // file received/failed
                xhr.onreadystatechange = function(e) {
                    if (xhr.readyState == 4) {
                        var reader = new FileReader();
                        var slide   = $("#slide").html();

                        reader.onload = function(e) {
                            slide = slide.replace("[FILENAME]", file.name);
                            Output(slide);
                        }

                        reader.readAsDataURL(file);

                //         progress.className = (xhr.status == 200 ? "success" : "failure");
                    }
                };
                // start upload
                xhr.open("POST", $id("upload").action, true);
                xhr.setRequestHeader("X-FILENAME", file.name);
                xhr.send(file);

            }

        }


        // initialize
        function Init() {

            var fileselect = $id("fileselect"),
                filedrag = $id("filedrag"),
                submitbutton = $id("submitbutton");

            // file select
            fileselect.addEventListener("change", FileSelectHandler, false);
            // is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {   
                // file drop
                filedrag.addEventListener("dragover", FileDragHover, false);
                filedrag.addEventListener("dragleave", FileDragHover, false);
                filedrag.addEventListener("drop", FileSelectHandler, false);
                filedrag.style.display = "block";

                // remove submit button
                submitbutton.style.display = "none";
            }

        }

        // call initialization file
        // if (window.File && window.FileList && window.FileReader) {
        //     Init();
        // }

        })(jQuery);
        </script>
  </body>
</html>
