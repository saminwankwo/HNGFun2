<?php
include_once("header.php");
require 'db.php';

$firstnameError = "";
$lastnameError = "";
$emailError = "";
$nationalityError = "";
$stateError = "";
$phoneError = "";
$passwordError = "";
$confirmPasswordError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit'])) {
        if($_POST['firstname'] != ""){
            $_POST['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            if ($_POST['firstname'] == ""){
                $lastnameError = "<span class='invalid'>Please enter your firstname.</span>";
            }
        }

            //Data Sanitization and Validation
        if($_POST['lastname'] != ""){
            $_POST['lastname'] = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            if ($_POST['lastname'] == ""){
                $lastnameError = "<span class='invalid'>Please enter your lastname.</span>";
            }
        }

        // email
        if($_POST['email'] != ""){
            $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            if ($_POST['email'] == ""){
                $emailError = "<span class='invalid'>Please enter a email.</span>";
            }
        }

        // nationality
        if($_POST['nationality'] != ""){
            $_POST['nationality'] = filter_var($_POST['nationality'], FILTER_SANITIZE_STRING);
            if ($_POST['nationality'] == ""){
                $nationalityError = "<span class='invalid'>Please choose your nationality.</span>";
            }
        }

        // state
        if($_POST['state'] != ""){
            $_POST['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
            if ($_POST['state'] == ""){
                $stateError = "<span class='invalid'>Please choose your city.</span>";
            }
        }

        // password
        if($_POST['password'] != ""){
            $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            if ($_POST['password'] == ""){
                $passwordError = "<span class='invalid'>Please enter a password.</span>";
            }
        }

        // confirm_password
        if($_POST['confirm_password'] != ""){
            $_POST['confirm_password'] = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
            if ($_POST['confirm_password'] == ""){
                $confirmPasswordError = "<span class='invalid'>Please enter a password.</span>";
            }
        }

        // valid phone number
        if($_POST['phone'] != ""){
            $_POST['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
            if($_POST['phone'] == ""){
                $phoneError = "<span class='invalid'>Please enter a valid phone number</span>";
            }
        }

        //Insert Data into users_data Database
        if ($firstnameError == "" && $lastnameError == ""
            && $emailError == "" && $nationalityError == ""
            && $stateError == "" && $phoneError == ""
            && $passwordError == "" && $confirmPasswordError == "") {

            //Insert user's Data
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $nationality = $_POST['nationality'];
            $password = $_POST['password'];

            $intern_data = array(
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':phone' => $phone,
                ':email' => $email,
                ':nationality' => $nationality,
                ':password' => $password
            );

            $query = 'INSERT INTO user ( firstname,lastname, phone, email, nationality, password)
                  VALUES (
                      :firstname,
                      :lastname,
                      :phone,
                      :email,
                      :nationality,
                      :password
                  );';

            try {
                $q = $conn->prepare($query);
                if ($q->execute($intern_data) == true) {
                    $success = true;
                };
            } catch (PDOException $e) {
                throw $e;
            }

        }
    }
}
?>
<style>
    body {
        font-size: inherit !important;
    }
			.btn-signup {
				background: #2196F3;
                    padding: 0.4em 8em !important;
                    color: white;
                    border-radius: 4px;
            }
            p, label {
                font-size: 14px !important;
            }
a {
    font-size: 14px !important;
    color: #2196F3 !important;
}
        </style>
        <br><br>

<?php
function custom_styles()
{
	echo <<<_END
		
		.page-body{
			font-family: 'Open Sans', sans-serif;
		}
		.description{
			width: 70%;
			max-width: 500px;
			margin-left: auto;
			margin-right: auto;
		}
		.jumbotron{
			background-color: inherit !important; 

		}
		.jumbotron h1{
			font-size: 32px;
			font-weight: normal;
			font-family: 'Open Sans', sans-serif !important;
		}
		.main-form{
			width: 80%;
			max-width: 700px;
		}
		.main-form label {
		    display: block;
		    font-weight: 400;
		    padding-left: 10px;
		    color: #808080;
		    font-size: 95%;
		}
		.main-form label:after {
		    content: "* ";
		    color: red;
		    font-size: 80%;
		    padding-left: 1px;
		}
		
_END;
}
?>

<!--<body>-->
<main class="page-body container">
    <div class="jumbotron text-center py-4 mb-0">
        <h1><b>Register</b></h1>
        <p class="description">Just a few clicks away from joining the biggest software development internship in Africa</p>
    </div>
    <div class="main-form ml-auto mr-auto">
        <form method="post">
            <p class="form-text">Already have an account? <a href="login.php">Log in</a></p>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group pr-sm-3">
                        <label for="firstname">First Name</label>
                        <input class="form-control" id="firstname" name="firstname" aria-describedby="nameerr" placeholder="John" required="required" type="text">
                        <!-- <small id="emailHelp" class="has-danger form-text">We'll never share your email with anyone else.</small> -->
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group pl-sm-3">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" id="lastname" name="lastname" placeholder="Doe" required="required" type="text">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group pr-sm-3">
                        <label for="email">Email Address</label>
                        <input class="form-control" id="email" name="email" aria-describedby="mailerr" placeholder="johndoe@mail.com" required="required" type="email">
                        <!-- <small id="mailerr" class="has-danger form-text">We'll never share your email with anyone else.</small> -->
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group pl-sm-3">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" id="phone" name="phone" placeholder="+2348012345678" required="required" type="telephone">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group pr-sm-3 has-danger">
                        <label for="nationality">Nationality</label>
                        <select class="form-control" id="nationality" name="nationality">
                            <option>Select your country</option>
                            <option id="afghanistan">Afghanistan</option>
                            <option id="aland islands">Aland Islands</option>
                            <option id="albania">Albania</option>
                            <option id="algeria">Algeria</option>
                            <option id="american samoa">American Samoa</option>
                            <option id="andorra">Andorra</option>
                            <option id="angola">Angola</option>
                            <option id="anguilla">Anguilla</option>
                            <option id="antarctica">Antarctica</option>
                            <option id="antigua">Antigua</option>
                            <option id="argentina">Argentina</option>
                            <option id="armenia">Armenia</option>
                            <option id="aruba">Aruba</option>
                            <option id="australia">Australia</option>
                            <option id="austria">Austria</option>
                            <option id="azerbaijan">Azerbaijan</option>
                            <option id="bahamas">Bahamas</option>
                            <option id="bahrain">Bahrain</option>
                            <option id="bangladesh">Bangladesh</option>
                            <option id="barbados">Barbados</option>
                            <option id="barbuda">Barbuda</option>
                            <option id="belarus">Belarus</option>
                            <option id="belgium">Belgium</option>
                            <option id="belize">Belize</option><option id="benin">Benin</option><option id="bermuda">Bermuda</option><option id="bhutan">Bhutan</option><option id="bolivia">Bolivia</option><option id="bosnia">Bosnia</option><option id="botswana">Botswana</option><option id="bouvet island">Bouvet Island</option><option id="brazil">Brazil</option><option id="british indian ocean trty.">British Indian Ocean Trty.</option><option id="brunei darussalam">Brunei Darussalam</option><option id="bulgaria">Bulgaria</option><option id="burkina faso">Burkina Faso</option><option id="burundi">Burundi</option><option id="caicos islands">Caicos Islands</option><option id="cambodia">Cambodia</option><option id="cameroon">Cameroon</option><option id="canada">Canada</option><option id="cape verde">Cape Verde</option><option id="cayman islands">Cayman Islands</option><option id="central african republic">Central African Republic</option><option id="chad">Chad</option><option id="chile">Chile</option><option id="china">China</option><option id="christmas island">Christmas Island</option><option id="cocos (keeling) islands">Cocos (Keeling) Islands</option><option id="colombia">Colombia</option><option id="comoros">Comoros</option><option id="congo">Congo</option><option id="congo, democratic republic of the">Congo, Democratic Republic of the</option><option id="cook islands">Cook Islands</option><option id="costa rica">Costa Rica</option><option id="cote d" ivoire'="">Cote d'Ivoire</option><option id="croatia">Croatia</option><option id="cuba">Cuba</option><option id="cyprus">Cyprus</option><option id="czech republic">Czech Republic</option><option id="denmark">Denmark</option><option id="djibouti">Djibouti</option><option id="dominica">Dominica</option><option id="dominican republic">Dominican Republic</option><option id="ecuador">Ecuador</option><option id="egypt">Egypt</option><option id="el salvador">El Salvador</option><option id="equatorial guinea">Equatorial Guinea</option><option id="eritrea">Eritrea</option><option id="estonia">Estonia</option><option id="ethiopia">Ethiopia</option><option id="falkland islands (malvinas)">Falkland Islands (Malvinas)</option><option id="faroe islands">Faroe Islands</option><option id="fiji">Fiji</option><option id="finland">Finland</option><option id="france">France</option><option id="french guiana">French Guiana</option><option id="french polynesia">French Polynesia</option><option id="french southern territories">French Southern Territories</option><option id="futuna islands">Futuna Islands</option><option id="gabon">Gabon</option><option id="gambia">Gambia</option><option id="georgia">Georgia</option><option id="germany">Germany</option><option id="ghana">Ghana</option><option id="gibraltar">Gibraltar</option><option id="greece">Greece</option><option id="greenland">Greenland</option><option id="grenada">Grenada</option><option id="guadeloupe">Guadeloupe</option><option id="guam">Guam</option><option id="guatemala">Guatemala</option><option id="guernsey">Guernsey</option><option id="guinea">Guinea</option><option id="guinea-bissau">Guinea-Bissau</option><option id="guyana">Guyana</option><option id="haiti">Haiti</option><option id="heard">Heard</option><option id="herzegovina">Herzegovina</option><option id="holy see">Holy See</option><option id="honduras">Honduras</option><option id="hong kong">Hong Kong</option><option id="hungary">Hungary</option><option id="iceland">Iceland</option><option id="india">India</option><option id="indonesia">Indonesia</option><option id="iran (islamic republic of)">Iran (Islamic Republic of)</option><option id="iraq">Iraq</option><option id="ireland">Ireland</option><option id="isle of man">Isle of Man</option><option id="israel">Israel</option><option id="italy">Italy</option><option id="jamaica">Jamaica</option><option id="jan mayen islands">Jan Mayen Islands</option><option id="japan">Japan</option><option id="jersey">Jersey</option><option id="jordan">Jordan</option><option id="kazakhstan">Kazakhstan</option><option id="kenya">Kenya</option><option id="kiribati">Kiribati</option><option id="korea">Korea</option><option id="korea (democratic)">Korea (Democratic)</option><option id="kuwait">Kuwait</option><option id="kyrgyzstan">Kyrgyzstan</option><option id="lao">Lao</option><option id="latvia">Latvia</option><option id="lebanon">Lebanon</option><option id="lesotho">Lesotho</option><option id="liberia">Liberia</option><option id="libyan arab jamahiriya">Libyan Arab Jamahiriya</option><option id="liechtenstein">Liechtenstein</option><option id="lithuania">Lithuania</option><option id="luxembourg">Luxembourg</option><option id="macao">Macao</option><option id="macedonia">Macedonia</option><option id="madagascar">Madagascar</option><option id="malawi">Malawi</option><option id="malaysia">Malaysia</option><option id="maldives">Maldives</option><option id="mali">Mali</option><option id="malta">Malta</option><option id="marshall islands">Marshall Islands</option><option id="martinique">Martinique</option><option id="mauritania">Mauritania</option><option id="mauritius">Mauritius</option><option id="mayotte">Mayotte</option><option id="mcdonald islands">McDonald Islands</option><option id="mexico">Mexico</option><option id="micronesia">Micronesia</option><option id="miquelon">Miquelon</option><option id="moldova">Moldova</option><option id="monaco">Monaco</option><option id="mongolia">Mongolia</option><option id="montenegro">Montenegro</option><option id="montserrat">Montserrat</option><option id="morocco">Morocco</option><option id="mozambique">Mozambique</option><option id="myanmar">Myanmar</option><option id="namibia">Namibia</option><option id="nauru">Nauru</option><option id="nepal">Nepal</option><option id="netherlands">Netherlands</option><option id="netherlands antilles">Netherlands Antilles</option><option id="nevis">Nevis</option><option id="new caledonia">New Caledonia</option><option id="new zealand">New Zealand</option><option id="nicaragua">Nicaragua</option><option id="niger">Niger</option><option id="nigeria">Nigeria</option><option id="niue">Niue</option><option id="norfolk island">Norfolk Island</option><option id="northern mariana islands">Northern Mariana Islands</option><option id="norway">Norway</option><option id="oman">Oman</option><option id="pakistan">Pakistan</option><option id="palau">Palau</option><option id="palestinian territory, occupied">Palestinian Territory, Occupied</option><option id="panama">Panama</option><option id="papua new guinea">Papua New Guinea</option><option id="paraguay">Paraguay</option><option id="peru">Peru</option>
                            <option id="philippines">Philippines</option>
                            <option id="pitcairn">Pitcairn</option>
                            <option id="poland">Poland</option>
                            <option id="portugal">Portugal</option>
                            <option id="principe">Principe</option>
                            <option id="puerto rico">Puerto Rico</option>
                            <option id="qatar">Qatar</option>
                            <option id="reunion">Reunion</option>
                            <option id="romania">Romania</option>
                            <option id="russian federation">Russian Federation</option>
                            <option id="rwanda">Rwanda</option>
                            <option id="saint barthelemy">Saint Barthelemy</option>
                            <option id="saint helena">Saint Helena</option>
                            <option id="saint kitts">Saint Kitts</option>
                            <option id="saint lucia">Saint Lucia</option>
                            <option id="saint martin (french part)">Saint Martin (French part)</option>
                            <option id="saint pierre">Saint Pierre</option>
                            <option id="saint vincent">Saint Vincent</option><option id="samoa">Samoa</option><option id="san marino">San Marino</option><option id="sao tome">Sao Tome</option><option id="saudi arabia">Saudi Arabia</option><option id="senegal">Senegal</option><option id="serbia">Serbia</option><option id="seychelles">Seychelles</option><option id="sierra leone">Sierra Leone</option><option id="singapore">Singapore</option><option id="slovakia">Slovakia</option><option id="slovenia">Slovenia</option><option id="solomon islands">Solomon Islands</option><option id="somalia">Somalia</option><option id="south africa">South Africa</option><option id="south georgia">South Georgia</option><option id="south sandwich islands">South Sandwich Islands</option><option id="spain">Spain</option><option id="sri lanka">Sri Lanka</option><option id="sudan">Sudan</option><option id="suriname">Suriname</option><option id="svalbard">Svalbard</option><option id="swaziland">Swaziland</option>
                            <option id="sweden">Sweden</option>
                            <option id="switzerland">Switzerland</option>
                            <option id="syrian arab republic">Syrian Arab Republic</option>
                            <option id="taiwan">Taiwan</option>
                            <option id="tajikistan">Tajikistan</option>
                            <option id="tanzania">Tanzania</option>
                            <option id="thailand">Thailand</option>
                            <option id="the grenadines">The Grenadines</option>
                            <option id="timor-leste">Timor-Leste</option>
                            <option id="tobago">Tobago</option>
                            <option id="togo">Togo</option>
                            <option id="tokelau">Tokelau</option>
                            <option id="tonga">Tonga</option>
                            <option id="trinidad">Trinidad</option>
                            <option id="tunisia">Tunisia</option><option id="turkey">Turkey</option><option id="turkmenistan">Turkmenistan</option><option id="turks islands">Turks Islands</option><option id="tuvalu">Tuvalu</option><option id="uganda">Uganda</option><option id="ukraine">Ukraine</option><option id="united arab emirates">United Arab Emirates</option><option id="united kingdom">United Kingdom</option><option id="united states">United States</option><option id="uruguay">Uruguay</option><option id="us minor outlying islands">US Minor Outlying Islands</option><option id="uzbekistan">Uzbekistan</option><option id="vanuatu">Vanuatu</option><option id="vatican city state">Vatican City State</option><option id="venezuela">Venezuela</option><option id="vietnam">Vietnam</option><option id="virgin islands (british)">Virgin Islands (British)</option><option id="virgin islands (us)">Virgin Islands (US)</option><option id="wallis">Wallis</option><option id="western sahara">Western Sahara</option><option id="yemen">Yemen</option>
                            <option id="zambia">Zambia</option>
                            <option id="zimbabwe">Zimbabwe</option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group pl-sm-3" id="chose_state">
                        <label for="state">State</label>

                        <select class="form-control" id="state" name="state">
                            <option>Select your state</option>
                            <option value="AB">Abia</option>"
                            <option value="AJ">Abuja</option>"
                            <option value="AN">Anambra</option>"
                            <option value="AD">Adamawa</option>"
                            <option value="AK">Akwa Ibom</option>"
                            <option value="BA">Bauchi</option>"
                            <option value="BY">Bayelsa</option>"
                            <option value="BE">Benue</option>"
                            <option value="BO">Borno</option>"
                            <option value="CR">Cross River</option>"
                            <option value="DE">Delta</option>"
                            <option value="ED">Edo</option>"
                            <option value="EK">Ekiti</option>"
                            <option value="EB">Ebonyi</option>"
                            <option value="EN">Enugu</option>"
                            <option value="GO">Gombe</option>"
                            <option value="IM">Imo</option>"
                            <option value="KN">Kano</option>"
                            <option value="LA">Lagos</option>"
                            <option value="NS">Nassarawa</option>"
                            <option value="JI">Jigawa</option>"
                            <option value="KB">Kebbi</option>"
                            <option value="KD">Kaduna</option>"
                            <option value="KG">Kogi</option>"
                            <option value="KT">Katsina</option>"
                            <option value="KW">Kwara</option>"
                            <option value="NR">Niger</option>"
                            <option value="OG">Ogun</option>"
                            <option value="ON">Ondo</option>"
                            <option value="OS">Osun</option>"
                            <option value="OY">Oyo</option>"
                            <option value="PL">Plateau</option>"
                            <option value="RV">Rivers</option>"
                            <option value="SO">Sokoto</option>"
                            <option value="TA">Taraba</option>"
                            <option value="YB">Yobe</option>"
                            <option value="ZM">Zamfara</option>"
                        </select>
                        <input class="form-control d-none" id="state" placeholder="Enter your state" name="state" type="text">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group pr-sm-3">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" name="password" placeholder="Enter your password" required="required" type="password">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group pl-sm-3">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" id="confirm_password" name="confirm_password" aria-describedby="cpwderr" placeholder="johndoe@mail.com" required="required" type="password">
                        <!-- <small id="cpwderr" class="has-danger form-text">We'll never share your email with anyone else.</small> -->
                    </div>

                </div>
                <div class="col-sm-12">
                    <div class="form-group form-check">
                        <input class="form-check-input" id="agree" type="checkbox">
                        <label class="form-check-label" for="agree">I agree to the <a href="#">terms and conditions</a></label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary ml-auto mr-auto">Sign Up</button>
                    </div>
                </div>

            </div>


        </form>
    </div>


</main>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template-->
<script src="js/hng.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
function custom_scripts(){
	echo <<<_END
	<script>
		
	$("select[name='nationality']").on('change', function() {
		
		if (!($("#nigeria").is(":selected"))) {
			$("#state").addClass("d-none");
			$("#enter_state").removeClass('d-none');

		}else{
			$("#state").removeClass("d-none");			
			$("#enter_state").addClass("d-none");
		}
	});
	</script>
_END;
}
include_once("footer.php");
?>
