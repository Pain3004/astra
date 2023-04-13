@include('layout.dashboard.header')

	<body class="ltr app sidebar-mini light-mode">
    <div class="horizontalMenucontainer" style="padding: 5% 10%;">

                     

<!-- Row -->
<div class="row ">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header border-bottom">
				<div class="card-title">
					Driver Application Form
				</div>
			</div>
			<div class="card-body">
			<input type="hidden" name="_token" id="_tokenApplicationForm" value="{{ csrf_token() }}" />
				<div id="wizard1">
					<h4 class=" "  style="font-size: 25px;text-align:center;">Welcome to Astra TMS..!</h4>
					<div>
					<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0 course">
									<label class="form-label" for="expdate1"  style="font-size: 22px;">Required Documents</label>
									<div class="input-group">
									<ul style= "text-align:left;padding-left:18px;font-size:18px;">
										<li>&#128073; Driving license</li>
										<li>&#128073; Employment Reports</li>
										<li>&#128073; Accident Reports</li>
										<li>&#128073; Violations Reports</li>
                                	</ul>									
								</div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1" style="color:#8fbd56;font-weight: bold;font-size:23px;">*Here, Define the steps to process your application.*</label>
									<div class="input-group">
										<ul style= "text-align:left;padding-left:15px;font-size:16px;color:black;">
											<li class="">&#9997; Applicant Details.</li>
											<li class="">&#9997; Employment Record.</li>
											<li class="">&#9997; Declaration of Employment Status.</li>
											<li class="">&#9997; Accidents for Past Three (3) Years.</li>
											<li class="">&#9997; Traffic Convictions & Forfeitures for Past Three (3) Years.</li>
											<li class="">&#9997; Accidents for Past Three (3) Years.</li>
											<li class="">&#9997; Driver Experience(Type of Equipment).</li>
											<li class="">&#9997; Driving State.</li>
											<li class="">&#9997; Certification of Violations.</li>
											<li class="">&#9997; Driver Statement of On-Duty Hours.</li>
											<li class="">&#9997; Alcohol and Controlled Substances.</li>
										</ul>									
								</div>
								</div>
							</div>
						</div>
					</div>

					<h4>Provide your details</h4>
					<div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Applicant Name  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="ApplicantName" placeholder=" Enter Applicant Name " required>
										<div class="invalid-feedback">
											Please choose a username.
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">Date Of Application <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="DateOfApplication" placeholder=" Enter Date Of Application " >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">Date Of Birth</label>
									<div class="input-group">
									<input type="Date" class="form-control" id="DateOfBirthApplication" placeholder=" Enter Date Of Birth* : " >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">Social Security No <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="number" class="form-control" id="SocialSecurityNo" placeholder=" Enter Social Security No " >
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">License No. <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="LicenseNo" placeholder=" Enter License No " >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">License Issue State <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<select class="form-control select2-show-search form-select" data-placeholder="Choose one" id="licence_state">
										<option value="">License Issue State</option>
                                            <option value="AL">AL</option>
                                            <option value="AK">AK</option>
                                            <option value="AR">AR</option>
                                            <option value="AZ">AZ</option>
                                            <option value="CA">CA</option>
                                            <option value="CO">CO</option>
                                            <option value="CT">CT</option>
                                            <option value="DC">DC</option>
                                            <option value="DE">DE</option>
                                            <option value="FL">FL</option>
                                            <option value="GA">GA</option>
                                            <option value="HI">HI</option>
                                            <option value="IA">IA</option>
                                            <option value="ID">ID</option>
                                            <option value="IL">IL</option>
                                            <option value="IN">IN</option>
                                            <option value="KS">KS</option>
                                            <option value="KY">KY</option>
                                            <option value="LA">LA</option>
                                            <option value="MA">MA</option>
                                            <option value="MD">MD</option>
                                            <option value="ME">ME</option>
                                            <option value="MI">MI</option>
                                            <option value="MN">MN</option>
                                            <option value="MO">MO</option>
                                            <option value="MS">MS</option>
                                            <option value="MT">MT</option>
                                            <option value="NC">NC</option>
                                            <option value="NE">NE</option>
                                            <option value="NH">NH</option>
                                            <option value="NJ">NJ</option>
                                            <option value="NM">NM</option>
                                            <option value="NV">NV</option>
                                            <option value="NY">NY</option>
                                            <option value="ND">ND</option>
                                            <option value="OH">OH</option>
                                            <option value="OK">OK</option>
                                            <option value="OR">OR</option>
                                            <option value="PA">PA</option>
                                            <option value="RI">RI</option>
                                            <option value="SC">SC</option>
                                            <option value="SD">SD</option>
                                            <option value="TN">TN</option>
                                            <option value="TX">TX</option>
                                            <option value="UT">UT</option>
                                            <option value="VT">VT</option>
                                            <option value="VA">VA</option>
                                            <option value="WA">WA</option>
                                            <option value="WI">WI</option>
                                            <option value="WV">WV</option>
                                            <option value="WY">WY</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">License Exp. Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="LicenseExpDate" placeholder=" Enter License Exp. Date" >
									</div>
								</div>
							</div>
						</div>
					</div>

<!-- Applicant Information -->
					<h4>Applicant Information</h4>
					<div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Applicant Name</label>
									<div class="input-group">
										<input type="text" class="form-control" id="ApplicantName2" disabled >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Telephone <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="TelephoneApplicant" placeholder=" Enter Telephone " >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Email <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="Email" class="form-control" id="EmailApplicant" placeholder=" Enter Email " >
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Date Of Birth</label>
									<div class="input-group">
										<input type="Date" class="form-control" id="DateOfBirthApplicant"  disabled>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Social Security No</label>
									<div class="input-group">
										<input type="number" class="form-control" id="SocialSecurityNoApplicant" disabled >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Fax(If Applicable) <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="FaxApplicant" placeholder=" Enter Fax " >
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">License No.</label>
									<div class="input-group">
									<input type="number" class="form-control" id="LicenseNoApplicant" disabled >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">License Issue State <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="text" class="form-control" id="LicenseIssueStateApplicant" disabled >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">License Type <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<select id="licence_type"  name="licence_type" class="form-control select2-show-search">
                                            <option value="">Select Typ</option>
                                            <option value="Class A">Class A</option>
                                            <option value="Class AZ">Class AZ</option>
                                            <option value="Class B">Class B</option>
                                            <option value="Class C">Class C</option>
                                            <option value="Class D">Class D</option>
                                            <option value="Class E">Class E</option>
                                            <option value="Class R">Class R</option>
                                            <option value="Class 1">Class 1</option>
                                            <option value="Class 2">Class 2</option>
                                            <option value="Class 3">Class 3</option>
                                            <option value="Class 4">Class 4</option>
                                            <option value="Class 5">Class 5</option>
                                        </select>									
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">License Exp. Date</label>
									<div class="input-group">
									<input type="date" class="form-control" id="LicenseExpDate2" >
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
									<label for="LicenseNo" class="form-label"> &#128073;  Has any license, permit or privilege ever been suspended or revoked?<span style="color:#ff0000">*</span></label>
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on"  id="licence_suspend">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
									<label for="LicenseNo" class="form-label"> &#128073;  Have you ever been denied a license, permit or privilege to operate a motor vehicle?<span style="color:#ff0000">*</span></label>
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="licence_denied">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Address <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="Address_applicant"  placeholde="Address">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">City,State,Zip <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="CityStateZip_applicant" placeholde="City,State,Zip"  >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">How Long? <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="resident_time" placeholder=" How Long? " >
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<br>
									<label class="form-label" for="">&#128073; Do you have the legal right to work in the United States?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="legal_right">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">&#128073; Can you provide proof of legal status?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="leage_proof">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h6>Emergency Contact</h6>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">Name <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="text" class="form-control" id="emergency_contact_name"  placeholder="Name">
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">Relation <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="text" class="form-control" id="emergency_contact_Relation"  placeholder="Relation">
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">Address <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" id="emergency_contact_Address" class="form-control" placeholder="Address" name="expiremonth">
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Contact Number <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="emergency_contact_Number" placeholder="Contact Number"  >
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h6>Employment Information</h6>
						<hr>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">&#128073; Have you worked for this company before?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="company_employee">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="expdate1">From<span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="date" class="form-control" id="company_employee_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<label for="To" class="form-label">To<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="company_employee_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<label for="From" class="form-label">Reason for leaving?<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="company_employee_leave_reason" placeholder="Reason">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
								<label  class="form-label"> &#128073; Are you now employed?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="employment_status">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="lastEmploymentDate" class="form-label">If not, date left last employment:?</label>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="date" class="form-control" id="last_employee" >
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
								<label class="form-label" > &#128073; Have you ever been bonded?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="bond_status">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
								<label  class="form-label" >If Yes, Name of bonding company:?</label>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
									<input type="text" class="form-control" id="bond_company_name" >
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
								<label for="" class="form-label" > &#128073; Have you ever been convicted of a felony?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="felony_status">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" >If Yes, explain fully on a separate sheet:?</label>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="text" class="form-control" id="felony_reason" >
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label" > &#128073; Conviction of a crime is not an automatic bar to employment. All circumstances will be considered?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="Conviction_status">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label" >If Yes, please explain:</label>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
									<input type="text" class="form-control" id="Conviction_reason" >
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h6 >Education Information</h6>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group mb-sm-0">
									<label for="Grade" class="form-label">Highest Grade Completed: 1 2 3 4 5 6 7 8 9 10 11 12 College: 1 2 3 4 Higher:<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="school_grade" placeholder="Highest Grade" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="Attended" class="form-label">Last School Attended::</label>
									<div class="input-group">
										<input type="text" class="form-control" id="last_school" placeholder="Last School Attended" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="CityState" class="form-label">City, State:</label>
									<div class="input-group">
										<input type="text" class="form-control" id="school_city_state" placeholder="City, State">
									</div>
								</div>
							</div>
						</div>
					</div>

<!-- Employment Record					 -->
					<h4>Employment Record</h4>
					<div>
						<div class="row" style="padding: 1% 10%;">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input radioButton" id="radio1" name="optradio" value="option1" checked>
										<label class="form-label" for="radio1" >1</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
										<label class="form-label" for="radio2">2</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3" >
                            			<label class="form-label" for="radio3">3</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="radio4" name="optradio" value="option4">
                            			<label class="form-label" for="radio4">4</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group mb-sm-0">
									<label for="Employer" class="form-label">Employer<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="Employer1" placeholder=" Employer " >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="EmployedFrom" class="form-label">Employed From<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="EmployedFrom1" placeholder=" Employed From " >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="EmployedTo" class="form-label">Employed To<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="EmployedTo1" placeholder=" Employed To " >
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="Street" class="form-label">Street<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="EmployerStreet1" placeholder=" Street " >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="CityStateZip" class="form-label">City,State,Zip<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="EmployerCityStateZip1" placeholder=" City,State,Zip " >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="Phone" class="form-label">Phone <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="EmployerPhone1" placeholder=" Phone" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="Supervisor" class="form-label">Supervisor<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="EmployerSupervisor1" placeholder="Supervisor" >
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="Position" class="form-label">Position<span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="EmployerPosition1" placeholder=" Position " >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="ReasonforLeaving " class="form-label">Reason for Leaving <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" id="EmployerReasonforLeaving1 " placeholder="Reason for Leaving  " >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="Email" class="form-label">Email  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="Email " class="form-control" id="EmployerEmail1 " placeholder=" Email " >
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
								<label for="LicenseNo" class="form-label"> &#128073; Were you subject to the FMCSRs while employed?</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="fmcsrs_status1">
											<span></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-5">
								<div class="form-group mb-sm-0">
								<label for="LicenseNo"  class="form-label"> &#128073; Was your job designated as a safety sensitive function in any DOT regulated mode subject to the drug & alcohol testing requirements of 49 CFR Part 40??</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="drug_alcohol_test1">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div  id="second_radio" style="display:none;">
						<hr style=" border: 1px solid #8fbd56;">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group mb-sm-0">
										<label for="Employer2" class="form-label">Employer<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="Employer2" placeholder=" Employer " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="EmployedFrom2" class="form-label">Employed From<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="date" class="form-control" id="EmployedFrom2" placeholder=" Employed From " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="EmployedTo2" class="form-label">Employed To<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="date" class="form-control" id="EmployedTo2" placeholder=" Employed To " >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Street2" class="form-label">Street<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerStreet2" placeholder=" Street " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="CityStateZip2" class="form-label">City,State,Zip<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerCityStateZip2" placeholder=" City,State,Zip " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Phone2" class="form-label">Phone <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerPhone2" placeholder=" Phone" >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Supervisor2" class="form-label">Supervisor<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerSupervisor2" placeholder="Supervisor" >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="Position2" class="form-label">Position<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerPosition2" placeholder=" Position " >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="ReasonforLeaving2" class="form-label">Reason for Leaving <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerReasonforLeaving2" placeholder="Reason for Leaving  " >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="Email2" class="form-label">Email  <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="Email " class="form-control" id="EmployerEmail2" placeholder=" Email " >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
									<label for="LicenseNo2" class="form-label"> &#128073; Were you subject to the FMCSRs while employed?</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group mb-sm-0">
										<div class="main-toggle-group d-flex flex-wrap mt-3">
											<div class="toggle on" id="fmcsrs_status2">
												<span></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group mb-sm-0">
										<label for="LicenseNo" class="form-label"> &#128073; Was your job designated as a safety sensitive function in any DOT regulated mode subject to the drug & alcohol testing requirements of 49 CFR Part 40??</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group mb-sm-0">
										<div class="main-toggle-group d-flex flex-wrap mt-3">
											<div class="toggle on" id="drug_alcohol_test2">
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div id="third_radio" style="display:none;">
						<hr style=" border: 1px solid #8fbd56;">
							<div class="row" >
								<div class="col-sm-6">
									<div class="form-group mb-sm-0">
										<label for="Employer3" class="form-label">Employer<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerEmployer3" placeholder=" Employer " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="EmployedFrom3" class="form-label">Employed From<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="date" class="form-control" id="EmployerEmployedFrom3" placeholder=" Employed From " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="EmployedTo" class="form-label">Employed To<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="date" class="form-control" id="EmployerEmployedTo" placeholder=" Employed To " >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Street3" class="form-label">Street<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerStreet3" placeholder=" Street " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="CityStateZip3" class="form-label">City,State,Zip<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerCityStateZip3" placeholder=" City,State,Zip " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Phone3" class="form-label">Phone <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerPhone3" placeholder=" Phone" >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Supervisor3" class="form-label">Supervisor<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerSupervisor3" placeholder="Supervisor" >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="Position3" class="form-label">Position<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerPosition3" placeholder=" Position " >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="ReasonforLeaving3" class="form-label">Reason for Leaving <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerReasonforLeaving3" placeholder="Reason for Leaving  " >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="Email3" class="form-label">Email  <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="Email " class="form-control" id="EmployerEmail3" placeholder=" Email " >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="LicenseNo3" class="form-label"> &#128073; Were you subject to the FMCSRs while employed?</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group mb-sm-0">
										<div class="main-toggle-group d-flex flex-wrap mt-3">
											<div class="toggle on" id="fmcsrs_status3">
												<span></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group mb-sm-0">
										<label for="LicenseNo" class="form-label"> &#128073; Was your job designated as a safety sensitive function in any DOT regulated mode subject to the drug & alcohol testing requirements of 49 CFR Part 40??</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group mb-sm-0">
										<div class="main-toggle-group d-flex flex-wrap mt-3">
											<div class="toggle on" id="drug_alcohol_test3">
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>

						<div id="forth_radio" style="display:none;">
						<hr style=" border: 1px solid #8fbd56;">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group mb-sm-0">
										<label for="Employer4" class="form-label">Employer<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerEmployer4" placeholder=" Employer " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="EmployedFrom4" class="form-label">Employed From<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="date" class="form-control" id="EmployerEmployedFrom4" placeholder=" Employed From " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="EmployedTo4" class="form-label">Employed To<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="date" class="form-control" id="EmployerEmployedTo4" placeholder=" Employed To " >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Street4" class="form-label">Street<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerStree4" placeholder=" Street " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="CityStateZip4" class="form-label">City,State,Zip<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerCityStateZip4" placeholder=" City,State,Zip " >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Phone4" class="form-label">Phone <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerPhone4" placeholder=" Phone" >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="Supervisor4" class="form-label">Supervisor<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerSupervisor4" placeholder="Supervisor" >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="Position4" class="form-label">Position<span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerPosition4" placeholder=" Position " >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="ReasonforLeaving4" class="form-label">Reason for Leaving <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control" id="EmployerReasonforLeaving4" placeholder="Reason for Leaving  " >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group mb-sm-0">
										<label for="Email4" class="form-label">Email  <span style="color:#ff0000">*</span></label>
										<div class="input-group">
											<input type="Email " class="form-control" id="EmployerEmail4" placeholder=" Email " >
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="LicenseNo4" class="form-label"> &#128073; Were you subject to the FMCSRs while employed?</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group mb-sm-0">
										<div class="main-toggle-group d-flex flex-wrap mt-3">
											<div class="toggle on" id="fmcsrs_status4">
												<span></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group mb-sm-0">
										<label for="LicenseNo" class="form-label"> &#128073; Was your job designated as a safety sensitive function in any DOT regulated mode subject to the drug & alcohol testing requirements of 49 CFR Part 40??</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group mb-sm-0">
										<div class="main-toggle-group d-flex flex-wrap mt-3">
											<div class="toggle on" id="drug_alcohol_test4">
												<span></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
<!-- Declaration of Employment Status (GAPS in Employment History) -->
					<h4>Declaration of Employment Status (GAPS in Employment History)</h4>
					<div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<label class="form-label">
										<p>I understand that I must provide my complete employment history for the past 3 years, and all CDL required employment for the 7 years preceding that. Any gaps in employment longer than 1 month are explained as follows:</p>
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label class="ckbox" for="employee_gap" ><input checked type="checkbox" id="employee_gap" ><span>There are no gaps in my employment history in the last 10 years of over 1 month.</span></label>
									</div>
								</div>
							</div>
						</div>

						<div class="row" style="padding: 1% 10%;" id="declarationRadio">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input radioButton" id="declarationRadio1" name="optradio" value="" checked>
                            			<label class="form-check-label" for="">1</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="declarationRadio2" name="optradio" value="option2">
                            			<label class="form-check-label" for="">2</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="declarationRadio3" name="optradio" value="option3" >
                            			<label class="form-check-label" for="">3</label>
									</div>
								</div>
							</div>
						</div>

						<div id="declaratuionOption1">
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="form-label" for="expdate1">During a gap in my employment</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_from" class="form-label">From </label>
										<div class="input-group">
											<input type="date" class="form-control" id="emp_from" name="emp_from" >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_to" class="form-label">To</label>
										<div class="input-group">
											<input type="date" class="form-control" id="emp_to"  >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_reason" class="form-label">I was engaged in the following activity:</label>
										<div class="input-group">
											<input type="text" class="form-control" id="emp_reason"  >
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="ckbox" for="employee_company"><input checked type="checkbox" id="employee_company"><span class="form-label">I was not employed by any company or individual.</span></label>
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="ckbox" for="criminal_act_involving"><input checked type="checkbox" id="criminal_act_involving"><span class="form-label">I was not convicted of any criminal act involving the use of a CMV or while driving a CMV.</span></label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div id="declaratuionOption2">
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="form-label" for="">During a gap in my employment</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_from1" class="form-label">From </label>
										<div class="input-group">
											<input type="date" class="form-control" id="emp_from1"  >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_to1" class="form-label">To</label>
										<div class="input-group">
											<input type="date" class="form-control" id="emp_to1"  >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_reason1" class="form-label">I was engaged in the following activity:</label>
										<div class="input-group">
											<input type="text" class="form-control" id="emp_reason1"  >
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group mb-sm-0">
										<div class="input-group">
										<label class="ckbox" for="employee_company1"><input checked type="checkbox" id="employee_company1"><span class="form-label">I was not employed by any company or individual.</span></label>
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="ckbox" for="criminal_act_involving1"><input checked type="checkbox" id="criminal_act_involving1"><span class="form-label">I was not convicted of any criminal act involving the use of a CMV or while driving a CMV.</span></label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div id="declaratuionOption3">
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label for="" class="form-label">During a gap in my employment</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_from2" class="form-label">From </label>
										<div class="input-group">
											<input type="date" class="form-control" id="emp_from2"  >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_to2" class="form-label">To</label>
										<div class="input-group">
											<input type="date" class="form-control" id="emp_to2"  >
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label for="emp_reason2" class="form-label">I was engaged in the following activity:</label>
										<div class="input-group">
											<input type="text" class="form-control" id="emp_reason2"  >
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="ckbox" for="employee_company2"><input checked type="checkbox" id="employee_company2"><span class="form-label">I was not employed by any company or individual.</span></label>
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group mb-sm-0">
										<div class="input-group">
											<label class="ckbox" for="criminal_act_involving2"><input checked type="checkbox" id="criminal_act_involving2"><span class="form-label">I was not convicted of any criminal act involving the use of a CMV or while driving a CMV.</span></label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

<!-- Accidents for Past Three (3) Years:					 -->
					<h4>Accidents for Past Three (3) Years:</h4>
					<div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label class="ckbox" for="show_accidents"><input checked type="checkbox" id="show_accidents"><span>I have no accidents to report.</span></label>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="padding: 1% 10%;" id="AccidentRadio">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input radioButton" id="AccidentRadio1" name="optradio" value="o1" checked>
										<label class="form-check-label" for="AccidentRadio1">1</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="AccidentRadio2" name="optradio" value="option2">
                            			<label class="form-check-label" for="AccidentRadio2">2</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="AccidentRadio3" name="optradio" value="option3" >
                            			<label class="form-check-label" for="AccidentRadio3">3</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row"  id="AccidentOption1">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Accident Date</label>
									<div class="input-group">
										<input type="date" class="form-control" id="accident_date"  >
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Description :</label>
									<div class="input-group">
										<input type="text" class="form-control" id="accident_description"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">No. of Injuries / Fatalities</label>
									<div class="input-group">
										<input type="text" class="form-control" id="no_of_injuries">
									</div>
								</div>
							</div>
						</div>

						<div class="row" id="AccidentOption2">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Accident Date</label>
									<div class="input-group">
										<input type="date" class="form-control" id="accident_date1"  >
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Description :</label>
									<div class="input-group">
										<input type="text" class="form-control" id="accident_description1"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">No. of Injuries / Fatalities</label>
									<div class="input-group">
										<input type="text" class="form-control" id="no_of_injuries1">
									</div>
								</div>
							</div>
						</div>

						<div class="row" id="AccidentOption3">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Accident Date</label>
									<div class="input-group">
										<input type="date" class="form-control" id="accident_date2"  >
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Description :</label>
									<div class="input-group">
										<input type="text" class="form-control" id="accident_description2"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">No. of Injuries / Fatalities</label>
									<div class="input-group">
										<input type="text" class="form-control" id="no_of_injuries2">
									</div>
								</div>
							</div>
						</div>

					</div>

<!-- Traffic Convictions & Forfeitures for Past Three (3) Years					 -->
					<h4>Traffic Convictions & Forfeitures for Past Three (3) Years</h4>
					<div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label class="ckbox" for="show_traffic"><input checked type="checkbox" id="show_traffic"><span>I have no Traffic Convictions & Forfeitures to report.</span></label>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="padding: 1% 10%;" id="TrafficRadio">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input radioButton" id="TrafficRadio1" name="optradio" value="o1" checked>
                            			<label class="form-check-label" for="TrafficRadio1">1</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="TrafficRadio2" name="optradio" value="option2">
                            			<label class="form-check-label" for="TrafficRadio2">2</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<input type="radio" class="form-check-input" id="TrafficRadio3" name="optradio" value="option3" >
                            			<label class="form-check-label" for="TrafficRadio3">3</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row" id="TrafficOption1">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date</label>
									<div class="input-group">
										<input type="date" class="form-control" id="traffic_convictions_date"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Location  :</label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_location"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Charge </label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_charge"  placeholder="Charge">
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Penalty  </label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_penalty"  placeholder="Penalty">
									</div>
								</div>
							</div>
						</div>



						<div class="row" id="TrafficOption2">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date</label>
									<div class="input-group">
										<input type="date" class="form-control" id="traffic_convictions_date1"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Location  :</label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_location1"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Charge </label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_charge1"  placeholder="Charge">
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Penalty  </label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_penalty1"  placeholder="Penalty">
									</div>
								</div>
							</div>
						</div>

						<div class="row" id="TrafficOption3">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date</label>
									<div class="input-group">
										<input type="date" class="form-control" id="traffic_convictions_date2"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Location  :</label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_location2"  >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Charge </label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_charge2"  placeholder="Charge">
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Penalty  </label>
									<div class="input-group">
										<input type="text" class="form-control" id="traffic_convictions_penalty2"  placeholder="Penalty">
									</div>
								</div>
							</div>
						</div>


					</div>

<!-- Driver Experience				 -->
					<h4>Driver Experience</h4>
					<div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label class="form-label" for="expdate1">Straight Truck (CIRCLE: van, tank, flat, dump, refer)</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">From <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="straight_truck_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">To  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="straight_truck_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label"># of Miles  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="straight_truck_miles" >
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
									<label for="" class="form-label">Tractor & Semi-Trailer (CIRCLE: van, tank, flat, dump, refer)</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">From <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="tractor_semi_trailer_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">To  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="tractor_semi_trailer_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
								<label for="" class="form-label"># of Miles  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="tractor_semi_trailer_miles" >
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Tractor – Two Trailers (CIRCLE: van, tank, flat, dump, refer)</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">From <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="tractor_two_trailer_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">To  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="tractor_two_trailer_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label"># of Miles  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="tractor_two_trailer_miles" >
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Tractor – Three Trailers (CIRCLE: van, tank, flat, dump, refer)</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">From <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="tractor_three_trailer_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">To  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="tractor_three_trailer_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label"># of Miles  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="tractor_three_trailer_miles" >
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Motorcoach – School Bus (9-15)</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">From <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="motorcoach_one_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">To  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="motorcoach_one_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="motorcoach_one_miles" class="form-label"># of Miles  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="motorcoach_one_miles" >
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Motorcoach – School Bus (16+)</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
								<label for="motorcoach_two_from" class="form-label">From <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="date" class="form-control" id="motorcoach_two_from" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="motorcoach_two_to" class="form-label">To  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" class="form-control" id="motorcoach_two_to" >
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label for="motorcoach_two_to" class="form-label"># of Miles  <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" class="form-control" id="motorcoach_two_miles" >
									</div>
								</div>
							</div>
						</div>
						
					</div>

<!-- Driving State					 -->
					<h4>Driving State</h4>
					<div>
						<div class="form-group">
							<label class="form-label">United States <span style="color:#ff0000">*</span></label>
							<select multiple class="form-control select2-show-search form-select" data-placeholder="Choose state" id="driving_state">
							<option value="SELECT ALL"> Select All States</option>
                                            <option value="AL">AL</option>
                                            <option value="AK">AK</option>
                                            <option value="AR">AR</option>
                                            <option value="AZ">AZ</option>
                                            <option value="CA">CA</option>
                                            <option value="CO">CO</option>
                                            <option value="CT">CT</option>
                                            <option value="DC">DC</option>
                                            <option value="DE">DE</option>
                                            <option value="FL">FL</option>
                                            <option value="GA">GA</option>
                                            <option value="HI">HI</option>
                                            <option value="IA">IA</option>
                                            <option value="ID">ID</option>
                                            <option value="IL">IL</option>
                                            <option value="IN">IN</option>
                                            <option value="KS">KS</option>
                                            <option value="KY">KY</option>
                                            <option value="LA">LA</option>
                                            <option value="MA">MA</option>
                                            <option value="MD">MD</option>
                                            <option value="ME">ME</option>
                                            <option value="MI">MI</option>
                                            <option value="MN">MN</option>
                                            <option value="MO">MO</option>
                                            <option value="MS">MS</option>
                                            <option value="MT">MT</option>
                                            <option value="NC">NC</option>
                                            <option value="NE">NE</option>
                                            <option value="NH">NH</option>
                                            <option value="NJ">NJ</option>
                                            <option value="NM">NM</option>
                                            <option value="NV">NV</option>
                                            <option value="NY">NY</option>
                                            <option value="ND">ND</option>
                                            <option value="OH">OH</option>
                                            <option value="OK">OK</option>
                                            <option value="OR">OR</option>
                                            <option value="PA">PA</option>
                                            <option value="RI">RI</option>
                                            <option value="SC">SC</option>
                                            <option value="SD">SD</option>
                                            <option value="TN">TN</option>
                                            <option value="TX">TX</option>
                                            <option value="UT">UT</option>
                                            <option value="VT">VT</option>
                                            <option value="VA">VA</option>
                                            <option value="WA">WA</option>
                                            <option value="WI">WI</option>
                                            <option value="WV">WV</option>
                                            <option value="WY">WY</option>
							</select>
						</div>
					</div>

<!-- Certification of Violations					 -->
					<h4>Certification of Violations</h4>
					<div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Motor Carrier Instructions:</label>
									<div class="input-group">
										<p>Each motor carrier shall, at least once every 12 months, require each driver it employs to prepare and furnish it with a list of all violations of motor vehicle traffic laws and ordinances (including violations for parking only) of which the driver has been convicted, or on account of which he has forfeited bond or collateral during the preceding 12 months. (Section 391.27) Drivers who have provided information required by Section 383.31 need not repeat that information.</p>									
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Driver Requirements:</label>
									<div class="input-group">
									<p>Each driver shall furnish the list as required by the motor carrier above if the driver has not been convicted of, or forfeited bond or collateral on account of any violation which must be listed, he shall so certify. (Section 391.27) I certify that the following is a true and complete list of traffic violations required to be listed (other than those I have provided under Part 383) for which I have been convicted or forfeited bond or collateral during the past 12 months.</p>									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-10">
								<div class="form-group mb-sm-0">
								<label for=""> &#128073; Was your job designated as a safety sensitive function in any DOT regulated mode subject to the drug & alcohol testing requirements of 49 CFR Part 40??</label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="certification_violations">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

<!-- Driver Statement of On-Duty Hours					 -->
					<h4>Driver Statement of On-Duty Hours</h4>
					<div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<label class="form-label" for="">Driver Requirements:</label>
									<div class="input-group">
									<p>Motor carriers, when using a driver for the first time, must obtain from the driver a signed statement giving the total time on- duty during the immediately preceding 7 days and the time at which the driver was last relieved from duty prior to beginning work for the carrier, as required by section 395.8(j)(2) of the Federal Motor Carrier Safety Regulations. Hours for any work during the preceding 7 days, including any compensated work for a non-motor carrier, must be recorded on this form.</p></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 1</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="day_1_date" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" id="day_1_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_1_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 2</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
								<label for="" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
									<input type="date" id="day_2_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_2_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 3</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" id="day_3_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_3_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 4</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="day_1_date" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" id="day_4_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_4_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 5</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" id="day_5_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_5_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 6</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" id="day_6_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_6_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label for="" class="form-label">Day 7</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Date <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="date" id="day_7_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group mb-sm-0">
									<label for="" class="form-label">Hours Worked <span style="color:#ff0000">*</span></label>
									<div class="input-group">
										<input type="number" id="day_7_hours" class="form-control" placeholder="Hours">
									</div>
								</div>
							</div>
						</div>

					</div>

					<h4>Alcohol and Controlled Substances</h4>
					<div>
						<div class="row">
							<div class="col-sm-10">
								<div class="form-group mb-sm-0">
									<label for="refused_test"> &#128073; Have you ever refused to be tested for drugs and/or alcohol at any time in the last two (2) years?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="refused_test">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-10">
								<div class="form-group mb-sm-0">
									<label for="tested_positive"> &#128073; Have you ever tested positive for drugs and/or alcohol at any time in the last two (2) years?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="tested_positive">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-10">
								<div class="form-group mb-sm-0">
									<label for="tested_positive"> &#128073; Have you ever tested positive on any pre-employment drug or alcohol test for a job, which you applied for but did not obtain?<span style="color:#ff0000">*</span></label>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group mb-sm-0">
									<div class="main-toggle-group d-flex flex-wrap mt-3">
										<div class="toggle on" id="pre_employment_drug">
											<span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<button type="button"  class="btn btn-success " style="background-color:#8fbd56;" >View Comapny Contract </button>                     
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group mb-sm-0">
									<div class="input-group">
										<label class="ckbox" for="show_gap"><input checked type="checkbox" id="show_gap"><span>There are no gaps in my employment history in the last 10 years of over 1 month.</span></label>
									</div>
								</div>
							</div>
						</div>
						<br>
						<button type="button" class="btn btn-success btn-lg btn-block submit">Submit Your Data</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/Row -->

</div>		

<script src="{{URL::to('/')}}/assets/js/jquery.min.js"></script>

<script>

	
$(document).ready(function(){

//form validation
	$('.actions  a').click(function(e){
    if($(this).attr('href') == '#next'){
		var current_step=$('.steps ul li.current').index();
//step2
		if(current_step == 2){  //3
			if($("#ApplicantName").val() == ''){
				swal({title: 'Please Enter Name',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#ApplicantName").focus();
			}else if($("#DateOfApplication").val() == ''){
				swal({title: 'Please Enter Date Of Application',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#DateOfApplication").focus();
			}else if($("#DateOfBirthApplication").val() == ''){
				swal({title: 'Please Enter Date Of Birth',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#DateOfBirthApplication").focus();
			}else if($("#SocialSecurityNo").val() == ''){
				swal({title: 'Please Enter Social Security No',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#SocialSecurityNo").focus();
			}else if($("#LicenseNo").val() == ''){
				swal({title: 'Please Enter License No.',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#LicenseNo").focus();
			}else if($("#licence_state").val() == ''){
				swal({title: 'Please Select License Issue State',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#licence_state").focus();
			}else if($("#LicenseExpDate").val() == ''){
				swal({title: 'Please Enter License Exp. Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#LicenseExpDate").focus();
			}

			$("#ApplicantName2").val($("#ApplicantName").val());
			$("#DateOfBirthApplicant").val($("#DateOfBirthApplication").val());
			$("#SocialSecurityNoApplicant").val($("#SocialSecurityNo").val());
			$("#LicenseNoApplicant").val($("#LicenseNo").val());
			$("#LicenseIssueStateApplicant").val($("#licence_state").val());
		}

//step3
		if(current_step == 3){  //4
			if($("#TelephoneApplicant").val() == ''){
				swal({title: 'Please Enter Telephone',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#TelephoneApplicant").focus();
			}else if($("#EmailApplicant").val() == ''){
				swal({title: 'Please Enter Email',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmailApplicant").focus();
			}else if($("#FaxApplicant").val() == ''){
				swal({title: 'Please Enter Fax',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#FaxApplicant").focus();
			}else if($("#licence_type").val() == ''){
				swal({title: 'Please Select License Type',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#licence_type").focus();
			}else if($("#LicenseExpDate2").val() == ''){
				swal({title: 'Please Enter License Exp. Date.',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#LicenseExpDate2").focus();
			}else if($("#Address_applicant").val() == ''){
				swal({title: 'Please Enter Address',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#Address_applicant").focus();
			}else if($("#CityStateZip_applicant").val() == ''){
				swal({title: 'Please Enter City,State,Zip',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#CityStateZip_applicant").focus();
			}else if($("#resident_time").val() == ''){
				swal({title: 'Please Enter How Long',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#resident_time").focus();
			}else if($("#emergency_contact_name").val() == ''){
				swal({title: 'Please Enter Name',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#emergency_contact_name").focus();
			}else if($("#emergency_contact_Relation").val() == ''){
				swal({title: 'Please Enter Relation',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#emergency_contact_Relation").focus();
			}else if($("#emergency_contact_Address").val() == ''){
				swal({title: 'Please Enter Address',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#emergency_contact_Address").focus();
			}else if($("#emergency_contact_Number").val() == ''){
				swal({title: 'Please Enter Contact Number',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#emergency_contact_Number").focus();
			}else if($("#company_employee_from").val() == ''){
				swal({title: 'Please Enter From Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#company_employee_from").focus();
			}else if($("#company_employee_to").val() == ''){
				swal({title: 'Please Enter To Date ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#company_employee_to").focus();
			}else if($("#company_employee_leave_reason").val() == ''){
				swal({title: 'Please Enter Reason',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#company_employee_leave_reason").focus();
			}else if($("#last_employee").val() == ''){
				swal({title: 'Please Enter Last Employee',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#last_employee").focus();
			}else if($("#bond_company_name").val() == ''){
				swal({title: 'Please Enter Bond Company Name',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#bond_company_name").focus();
			}else if($("#felony_reason").val() == ''){
				swal({title: 'Please Enter Felony Reason ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#felony_reason").focus();
			}else if($("#Conviction_reason").val() == ''){
				swal({title: 'Please Enter Conviction Rreason',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#Conviction_reason").focus();
			}else if($("#school_grade").val() == ''){
				swal({title: 'Please Enter School Grade',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#school_grade").focus();
			}
		}
//step4
		if(current_step == 4){  //5
			if($("#Employer1").val() == ''){
				swal({title: 'Please Enter Employer',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#Employer1").focus();
			}else if($("#EmployedFrom1").val() == ''){
				swal({title: 'Please Enter Employed From',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployedFrom1").focus();
			}else if($("#EmployedTo1").val() == ''){
				swal({title: 'Please Enter Employed To',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployedTo1").focus();
			}else if($("#EmployerStreet1").val() == ''){
				swal({title: 'Please Enter Street',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployerStreet1").focus();
			}else if($("#EmployerCityStateZip1").val() == ''){
				swal({title: 'Please Enter City,State,Zip.',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployerCityStateZip1").focus();
			}else if($("#EmployerPhone1").val() == ''){
				swal({title: 'Please Enter Phone',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployerPhone1").focus();
			}else if($("#EmployerReasonforLeaving1 ").val() == ''){
				swal({title: 'Please Enter Reason for Leaving ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployerReasonforLeaving1 ").focus();
			}else if($("#EmployerEmail1  ").val() == ''){
				swal({title: 'Please Enter  Email  ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#EmployerEmail1  ").focus();
			}
		}	
		
//step8
		if(current_step == 8){  //9
			if($("#straight_truck_from").val() == ''){
				swal({title: 'Please Enter Straight Truck From',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#straight_truck_from").focus();
			}else if($("#straight_truck_to").val() == ''){
				swal({title: 'Please Enter Straight Truck To',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#straight_truck_to").focus();
			}else if($("#straight_truck_miles").val() == ''){
				swal({title: 'Please Enter straight truck miles',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#straight_truck_miles").focus();
			}else if($("#tractor_semi_trailer_from").val() == ''){
				swal({title: 'Please Enter tractor semi trailer from',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_semi_trailer_from").focus();
			}else if($("#tractor_semi_trailer_to").val() == ''){
				swal({title: 'Please Enter tractor semi trailer to ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_semi_trailer_to").focus();
			}else if($("#tractor_semi_trailer_miles").val() == ''){
				swal({title: 'Please Enter Tractor Semi Trailer Miles ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_semi_trailer_miles").focus();
			}else if($("#tractor_two_trailer_from").val() == ''){
				swal({title: 'Please Enter Tractor Two Trailer From',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_two_trailer_from").focus();
			}else if($("#tractor_two_trailer_to").val() == ''){
				swal({title: 'Please Enter Tractor Two Trailer To ',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_two_trailer_to").focus();
			}else if($("#tractor_two_trailer_miles").val() == ''){
				swal({title: 'Please Enter Tractor Two Trailer Miles',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_two_trailer_miles").focus();
			}else if($("#tractor_three_trailer_from").val() == ''){
				swal({title: 'Please Enter Tractor Three Trailer From',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_three_trailer_from").focus();
			}else if($("#tractor_three_trailer_to").val() == ''){
				swal({title: 'Please Enter Tractor Three Trailer To',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_three_trailer_to").focus();
			}else if($("#tractor_three_trailer_miles").val() == ''){
				swal({title: 'Please Enter Tractor Three Trailer Miles',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#tractor_three_trailer_miles").focus();
			}else if($("#motorcoach_one_from").val() == ''){
				swal({title: 'Please Enter Motorcoach From',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#motorcoach_one_from").focus();
			}else if($("#motorcoach_one_to").val() == ''){
				swal({title: 'Please Enter Motorcoach To',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#motorcoach_one_to").focus();
			}else if($("#motorcoach_one_miles").val() == ''){
				swal({title: 'Please Enter Motorcoach Miles',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#motorcoach_one_miles").focus();
			}else if($("#motorcoach_two_from").val() == ''){
				swal({title: 'Please Enter Motorcoach From',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#motorcoach_two_from").focus();
			}else if($("#motorcoach_two_to").val() == ''){
				swal({title: 'Please Enter Motorcoach To',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#motorcoach_two_to").focus();
			}else if($("#motorcoach_two_miles").val() == ''){
				swal({title: 'Please Enter Motorcoach Miles',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#motorcoach_two_miles").focus();
			}
		}	
//step9
		if(current_step == 9){  
			if($("#driving_state").val() == ''){
				swal({title: 'Please Select Driving State',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#driving_state").focus();
			}
		}
//step11
		if(current_step == 11){  
			if($("#day_1_date").val() == ''){
				swal({title: 'Please Select Day 1 Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_1_date").focus();
			}else if($("#day_1_hours").val() == ''){
				swal({title: 'Please Enter Day 1 Hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_1_hours").focus();
			}else if($("#day_2_date").val() == ''){
				swal({title: 'Please Select Day 2 Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_2_date").focus();
			}else if($("#day_2_hours").val() == ''){
				swal({title: 'Please Enter Day 2 Hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_2_hours").focus();
			}else if($("#day_3_date").val() == ''){
				swal({title: 'Please Select Day 3 Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_3_date").focus();
			}else if($("#day_3_hours").val() == ''){
				swal({title: 'Please Enter Day 3 Hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_3_hours").focus();
			}else if($("#day_4_date").val() == ''){
				swal({title: 'Please Select Day 4 Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_4_date").focus();
			}else if($("#day_4_hours").val() == ''){
				swal({title: 'Please Enter Day 4 Hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_4_hours").focus();
			}else if($("#day_5_date").val() == ''){
				swal({title: 'Please Select Day 5 Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_5_date").focus();
			}else if($("#day_5_hours").val() == ''){
				swal({title: 'Please Enter Day 5 Hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_2_hours").focus();
			}else if($("#day_6_date").val() == ''){
				swal({title: 'Please Select Day 6 Date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_6_date").focus();
			}else if($("#day_6_hours").val() == ''){
				swal({title: 'Please Enter day_6_hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_6_hours").focus();
			}else if($("#day_7_date").val() == ''){
				swal({title: 'Please Select day_7_date',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_7_date").focus();
			}else if($("#day_7_hours").val() == ''){
				swal({title: 'Please Enter day_7_hours',text: 'Redirecting...',timer: 1500,buttons: false,})
				$(".actions ul li:first a").click();
				$("#day_7_hours").focus();
			}
		}	
    }
});

//form3	
    $('#radio1').click(function(){
		$('#second_radio').hide();
        $('#third_radio').hide();
        $('#forth_radio').hide();
    });
    $("#radio2").click(function(){
        $('#second_radio').show();
        $('#third_radio').hide();
        $('#forth_radio').hide();
    });
    $("#radio3").click(function(){
        $('#second_radio').show();
        $('#third_radio').show();
        $('#forth_radio').hide();
    });
    $("#radio4").click(function(){
        $('#second_radio').show();
        $('#third_radio').show();
        $('#forth_radio').show();
    });

//form4
    if( $('#employee_gap').is(':checked') ){
	   $('#declarationRadio').hide();
	   $('#declaratuionOption1').hide();
	   $('#declaratuionOption2').hide();
	   $('#declaratuionOption3').hide();
   }else{
	   $('#declarationRadio').show();
	   $('#declaratuionOption1').show();
   }
   $("#employee_gap").click(function(){

	   if( $('#employee_gap').is(':checked') ){
		   $("#step4_wrap").removeClass("formScroll")
		   $('#declarationRadio').hide();
		   $('#declaratuionOption1').hide();
		   $('#declaratuionOption2').hide();
		   $('#declaratuionOption3').hide();
	   }else{
		   $("#step4_wrap").addClass("formScroll")
		   $('#declarationRadio').show();
		   $('#declaratuionOption1').show();

		   $("#declarationRadio1").click(function(){
			   $('#declaratuionOption1').show();
			   $('#declaratuionOption2').hide();
			   $('#declaratuionOption3').hide();
		   });

		   $("#declarationRadio2").click(function(){
			   $('#declaratuionOption1').show();
			   $('#declaratuionOption2').show();
			   $('#declaratuionOption3').hide();
		   });

			$("#declarationRadio3").click(function(){
			   $('#declaratuionOption1').show();
			   $('#declaratuionOption2').show();
			   $('#declaratuionOption3').show();
		   });
	   }
   });

//form5

   if( $('#show_accidents').is(':checked') ){
	   $('#AccidentRadio').hide();
	   $('#AccidentOption1').hide();
	   $('#AccidentOption2').hide();
	   $('#AccidentOption3').hide();
	  
   }else{
	   $('#AccidentRadio').show();
	   $('#AccidentOption1').show();
   }

   $("#show_accidents").click(function(){
	   
	   if( $('#show_accidents').is(':checked') ){
		   $("#step5_wrap").removeClass("formScroll")
		   $('#AccidentRadio').hide();
		   $('#AccidentOption1').hide();
		   $('#AccidentOption2').hide();
		   $('#AccidentOption3').hide();
	   }else{
		   $("#step5_wrap").addClass("formScroll")
		   $('#AccidentRadio').show();
		   $('#AccidentOption1').show();
		   $("#AccidentRadio1").click(function(){
			   $('#AccidentOption1').show();
			   $('#AccidentOption2').hide();
			   $('#AccidentOption3').hide();
		   });
		   $("#AccidentRadio2").click(function(){
			   $('#AccidentOption1').show();
			   $('#AccidentOption2').show();
			   $('#AccidentOption3').hide();
		   });
			$("#AccidentRadio3").click(function(){
			   $('#AccidentOption1').show();
			   $('#AccidentOption2').show();
			   $('#AccidentOption3').show();
		   });   
	   }
   });
   
//form6
   if( $('#show_traffic ').is(':checked') ){
	   $('#TrafficRadio').hide();
	   $('#TrafficOption1').hide();
	   $('#TrafficOption2').hide();
	   $('#TrafficOption3').hide();
	  
   }else{
	   $('#TraffictRadio').show();
	   $('#TrafficOption1').show();
   }

   $("#show_traffic").click(function(){
	   
	   if( $('#show_traffic').is(':checked') ){
		   $("#step6_wrap").removeClass("formScroll")
		   $('#TrafficRadio').hide();
		   $('#TrafficOption1').hide();
		   $('#TrafficOption2').hide();
		   $('#TrafficOption3').hide();
	   }else{
		   $("#step6_wrap").addClass("formScroll")
		   $('#TrafficRadio').show();
		   $('#TrafficOption1').show();
		   $("#TrafficRadio1").click(function(){
			   // alert();
			   $('#TrafficOption1').show();
			   $('#TrafficOption2').hide();
			   $('#TrafficOption3').hide();

		   });
		   $("#TrafficRadio2").click(function(){
			   $('#TrafficOption1').show();
			   $('#TrafficOption2').show();
			   $('#TrafficOption3').hide();

		   });
			$("#TrafficRadio3").click(function(){
			   $('#TrafficOption1').show();
			   $('#TrafficOption2').show();
			   $('#TrafficOption3').show();
		   });   
	   }
   });
 
//form submit
	$('.submit').click(function(){
    	var base_path = $("#url").val();
//step 1
    var applicant_name =$('#ApplicantName').val();
    var date_of_application =$('#DateOfApplication').val();
    var date_of_birth =$('#DateOfBirthApplication').val();
    var social_security =$('#SocialSecurityNo').val();
    var license_no =$('#LicenseNo').val();
    var licence_ex_date =$('#LicenseExpDate').val();
    var licence_state =$('#licence_state').val();

//step 2
    var TelephoneApplicant =$('#TelephoneApplicant').val();
    var EmailApplicant =$('#EmailApplicant').val();
    var FaxApplicant =$('#FaxApplicant').val();
    var licence_type =$('#licence_type').val();
	
		if ($('#licence_suspend').hasClass('on')){
			var licence_suspend = 'Yes';
		}else{
			var licence_suspend = 'No';
		}
	

		if ($('#licence_denied').hasClass('on')){
			var licence_denied = 'Yes';
		}else{
			var licence_denied = 'No';
		}
    
    var Address_applicant =$('#Address_applicant').val();
    var CityStateZip_applicant =$('#CityStateZip_applicant').val();
    var resident_time = $("#resident_time").val();

		if ($('#legal_right').hasClass('on')){
			var legal_right = 'Yes';
		}else{
			var legal_right = 'No';
		}

		if ($('#leage_proof').hasClass('on')){
			var leage_proof = 'Yes';
		}else{
			var leage_proof = 'No';
		}

    var emergency_contact_name =$('#emergency_contact_name').val();
    var emergency_contact_relation =$('#emergency_contact_relation').val();
    var emergency_contact_Address =$('#emergency_contact_Address').val();
	var emergency_contact_Relation =$('#emergency_contact_Relation').val();
    var emergency_contact_Number =$('#emergency_contact_Number').val();
    var company_employee =$('#company_employee').val();
    var company_employee_from =$('#company_employee_from').val();
    var company_employee_to =$('#company_employee_to').val();
    var company_employee_leave_reason =$('#company_employee_leave_reason').val();
    var employment_status =$('#employment_status').val();
    var last_employee =$('#last_employee').val();
    var bond_status =$('#bond_status').val();

		if ($('#company_employee').hasClass('on')){
			var company_employee = 'Yes';
		}else{
			var company_employee = 'No';
		}

		if ($('#employment_status').hasClass('on')){
			var employment_status = 'Yes';
		}else{
			var employment_status = 'No';
		}

		if ($('#bond_status').hasClass('on')){
			var bond_status = 'Yes';
		}else{
			var bond_status = 'No';
		}

    
    var bond_company_name =$('#bond_company_name').val();
		if ($('#felony_status').hasClass('on')){
			var felony_status = 'Yes';
		}else{
			var felony_status = 'No';
		}

   

    var felony_reason = $("#felony_reason").val();

		if ($('#Conviction_status').hasClass('on')){
				var Conviction_status = 'Yes';
			}else{
				var Conviction_status = 'No';
		}
   
    var Conviction_reason =$('#Conviction_reason').val();
    var school_grade =$('#school_grade').val();
    var last_school =$('#last_school').val();
    var school_city_state =$('#school_city_state').val();

//step 3 
	// Employer 1
    var Employer1  =$('#Employer1').val();
    var EmployedFrom1 =$('#EmployedFrom1').val();
    var EmployedTo1 =$('#EmployedTo1').val();
    var EmployerStreet1 =$('#EmployerStreet1').val();
    var EmployerCityStateZip1=$('#EmployerCityStateZip1').val();
    var EmployerPhone1=$('#EmployerPhone1').val();
    var EmployerSupervisor1=$('#EmployerSupervisor1').val();
    var EmployerPosition1=$('#EmployerPosition1').val();
    var EmployerReasonforLeaving1=$('#EmployerReasonforLeaving1').val();
    var EmployerEmail1 =$('#EmployerEmail1').val();

		if ($('#fmcsrs_status1').hasClass('on')){
				var fmcsrs_status1 = 'Yes';
			}else{
				var fmcsrs_status1 = 'No';
		}
    
		if ($('#drug_alcohol_test1').hasClass('on')){
				var drug_alcohol_test1 = 'Yes';
			}else{
				var drug_alcohol_test1 = 'No';
		}
    
    //Employer 2
    var Employer2  =$('#Employer2').val();
    var EmployedFrom2 =$('#EmployedFrom2').val();
    var EmployedTo2 =$('#EmployedTo2').val();
    var EmployerStreet2 =$('#EmployerStreet2').val();
    var EmployerCityStateZip2=$('#EmployerCityStateZip2').val();
    var EmployerPhone2=$('#EmployerPhone2').val();
    var EmployerSupervisor2=$('#EmployerSupervisor2').val();
    var EmployerPosition2=$('#EmployerPosition2').val();
    var EmployerReasonforLeaving2=$('#EmployerReasonforLeaving2').val();
    var EmployerEmail2=$('#EmployerEmail2').val();

		if ($('#fmcsrs_status2').hasClass('on')){
				var fmcsrs_status2 = 'Yes';
			}else{
				var fmcsrs_status2 = 'No';
		}

		if ($('#drug_alcohol_test2').hasClass('on')){
				var drug_alcohol_test2 = 'Yes';
			}else{
				var drug_alcohol_test2 = 'No';
		}
   
    //Employer 3
    var Employer3=$('#Employer3').val();
    var EmployedFrom3=$('#EmployedFrom3').val();
    var EmployedTo3=$('#EmployedTo3').val();
    var EmployerStreet3=$('#EmployerStreet3').val();
    var EmployerCityStateZip3=$('#EmployerCityStateZip3').val();
    var EmployerPhone3=$('#EmployerPhone3').val();
    var EmployerSupervisor3=$('#EmployerSupervisor3').val();
    var EmployerPosition3=$('#EmployerPosition3').val();
    var EmployerReasonforLeaving3=$('#EmployerReasonforLeaving3').val();
    var EmployerEmail3=$('#EmployerEmail3').val();

		if ($('#fmcsrs_status3').hasClass('on')){
				var fmcsrs_status3 = 'Yes';
			}else{
				var fmcsrs_status3 = 'No';
		}

		if ($('#drug_alcohol_test3').hasClass('on')){
				var drug_alcohol_test3 = 'Yes';
			}else{
				var drug_alcohol_test3 = 'No';
		}

   //Employer 4
    var Employer4=$('#Employer4').val();
    var EmployedFrom4=$('#EmployedFrom4').val();
    var EmployedTo4=$('#EmployedTo4').val();
    var EmployerStreet4=$('#EmployerStreet4').val();
    var EmployerCityStateZip4=$('#EmployerCityStateZip4').val();
    var EmployerPhone4=$('#EmployerPhone4').val();
    var EmployerSupervisor4=$('#EmployerSupervisor4').val();
    var EmployerPosition4=$('#EmployerPosition4').val();
    var EmployerReasonforLeaving4=$('#EmployerReasonforLeaving4').val();
    var EmployerEmail4=$('#EmployerEmail4').val();

		if ($('#fmcsrs_status4').hasClass('on')){
				var fmcsrs_status4 = 'Yes';
			}else{
				var fmcsrs_status4 = 'No';
		}
   
		if ($('#drug_alcohol_test4').hasClass('on')){
				var drug_alcohol_test4 = 'Yes';
			}else{
				var drug_alcohol_test4 = 'No';
		}
 
// step 4
    var employee_gap = $("#employee_gap").val();
    // Gap 1
    var emp_from = $("#emp_from").val();
    var emp_to = $("#emp_to").val();
    var emp_reason = $("#emp_reason").val();
    var employee_company = $("#employee_company").val();
    var criminal_act_involving = $("#criminal_act_involving").val();
    // Gap 2
    var emp_from1 = $("#emp_from1").val();
    var emp_to1 = $("#emp_to1").val();
    var emp_reason1 = $("#emp_reason1").val();
    var employee_company1 = $("#employee_company1").val();
    var criminal_act_involving1 = $("#criminal_act_involving1").val();
    // Gap 3
    var emp_from2 = $("#emp_from2").val();
    var emp_to2 = $("#emp_to2").val();
    var emp_reason2 = $("#emp_reason2").val();
    var employee_company2 = $("#employee_company2").val();
    var criminal_act_involving2 = $("#criminal_act_involving2").val();

// step 5
    var show_accidents = $("#show_accidents").val();
    // accident 1
    var accident_date = $("#accident_date").val();
    var accident_description = $("#accident_description").val();
    var no_of_injuries = $("#no_of_injuries").val();
    // accident 2
    var accident_date1 = $("#accident_date1").val();
    var accident_description1 = $("#accident_description1").val();
    var no_of_injuries1 = $("#no_of_injuries1").val();
    // accident 3
    var accident_date2 = $("#accident_date2").val();
    var accident_description2 = $("#accident_description2").val();
    var no_of_injuries2 = $("#no_of_injuries2").val();

// Step 6
    var show_traffic = $("#show_traffic").val();
    // traffic 1
    var traffic_convictions_date = $("#traffic_convictions_date").val();
    var traffic_convictions_location = $("#traffic_convictions_location").val();
    var traffic_convictions_charge = $("#traffic_convictions_charge").val();
    var traffic_convictions_penalty = $("#traffic_convictions_penalty").val();
    // traffic 2
    var traffic_convictions_date1 = $("#traffic_convictions_date1").val();
    var traffic_convictions_location1 = $("#traffic_convictions_location1").val();
    var traffic_convictions_charge1 = $("#traffic_convictions_charge1").val();
    var traffic_convictions_penalty1 = $("#traffic_convictions_penalty1").val();
    // traffic 3
    var traffic_convictions_date2 = $("#traffic_convictions_date2").val();
    var traffic_convictions_location2 = $("#traffic_convictions_location2").val();
    var traffic_convictions_charge2 = $("#traffic_convictions_charge2").val();
    var traffic_convictions_penalty2 = $("#traffic_convictions_penalty2").val();

// Step 7
    // Truck type (straight truck)
    var straight_truck_from = $("#straight_truck_from").val();
    var straight_truck_to = $("#straight_truck_to").val();
    var straight_truck_miles = $("#straight_truck_miles").val();

    // Truck type (Tractor & Semi-Trailer)
    var tractor_semi_trailer_from = $("#tractor_semi_trailer_from").val();
    var tractor_semi_trailer_to = $("#tractor_semi_trailer_to").val();
    var tractor_semi_trailer_miles = $("#tractor_semi_trailer_miles").val();

    // Truck type (Tractor – Two Trailers)
    var tractor_two_trailer_from = $("#tractor_two_trailer_from").val();
    var tractor_two_trailer_to = $("#tractor_two_trailer_to").val();
    var tractor_two_trailer_miles = $("#tractor_two_trailer_miles").val();

    // Truck type (straight truck)
    var tractor_three_trailer_from = $("#tractor_three_trailer_from").val();
    var tractor_three_trailer_to = $("#tractor_three_trailer_to").val();
    var tractor_three_trailer_miles = $("#tractor_three_trailer_miles").val();

    // Truck type (motorcoach type one truck)
    var motorcoach_one_from = $("#motorcoach_one_from").val();
    var motorcoach_one_to = $("#motorcoach_one_to").val();
    var motorcoach_one_miles = $("#motorcoach_one_miles").val();

    // Truck type (motorcoach type one truck)
    var motorcoach_two_from = $("#motorcoach_two_from").val();
    var motorcoach_two_to = $("#motorcoach_two_to").val();
    var motorcoach_two_miles = $("#motorcoach_two_miles").val();

// Step 8 (driving State)
		var driving_state = $('#driving_state').val();
			if ($('#certification_violations').hasClass('on')){
					var certification_violations = 'Yes';
				}else{
					var certification_violations = 'No';
			}

		// Day 1
		var day_1_date = $("#day_1_date").val();
		var day_1_hours = $("#day_1_hours").val();
		// Day 2
		var day_2_date = $("#day_2_date").val();
		var day_2_hours = $("#day_2_hours").val();
		// Day 3
		var day_3_date = $("#day_3_date").val();
		var day_3_hours = $("#day_3_hours").val();
		// Day 4
		var day_4_date = $("#day_4_date").val();
		var day_4_hours = $("#day_4_hours").val();
		// day 5
		var day_5_date = $("#day_5_date").val();
		var day_5_hours = $("#day_5_hours").val();
		// Day 6
		var day_6_date = $("#day_6_date").val();
		var day_6_hours = $("#day_6_hours").val();
		// Day 7
		var day_7_date = $("#day_7_date").val();
		var day_7_hours = $("#day_7_hours").val();

// step 11
		if ($('#refused_test').hasClass('on')){
				var refused_test = 'Yes';
			}else{
				var refused_test = 'No';
		}
    
		if ($('#tested_positive').hasClass('on')){
				var tested_positive = 'Yes';
			}else{
				var tested_positive = 'No';
		}

		if ($('#pre_employment_drug').hasClass('on')){
				var pre_employment_drug = 'Yes';
			}else{
				var pre_employment_drug = 'No';
		}
  
    var company_id = 95;
    var username = 'RP';
    var userid = 21;

//ajax
	$.ajax({
			url: "/admin/addApplicationForm",
			type: "POST",
			datatype:"JSON",
			data: {
				_token: $("#_tokenApplicationForm").val(),
				applicant_name: applicant_name,
				date_of_application: date_of_application,
				date_of_birth: date_of_birth,
				social_security: social_security,
				license_no: license_no,
				licence_ex_date: licence_ex_date,
				licence_state: licence_state,
				TelephoneApplicant: TelephoneApplicant,
				EmailApplicant: EmailApplicant,
				FaxApplicant: FaxApplicant,
				licence_type: licence_type,
				licence_suspend: licence_suspend,
				licence_denied: licence_denied,
				Address_applicant: Address_applicant,
				CityStateZip_applicant: CityStateZip_applicant,
				resident_time:resident_time,
				legal_right: legal_right,
				leage_proof: leage_proof,
				emergency_contact_name: emergency_contact_name,
				emergency_contact_relation: emergency_contact_relation,
				emergency_contact_Address: emergency_contact_Address,
				emergency_contact_Relation: emergency_contact_Relation,
				emergency_contact_Number: emergency_contact_Number,
				company_employee: company_employee,
				company_employee_from: company_employee_from,
				company_employee_to: company_employee_to,
				company_employee_leave_reason: company_employee_leave_reason,
				employment_status:employment_status,
				last_employee:last_employee,
				bond_status:bond_status,
				bond_company_name:bond_company_name,
				felony_status:felony_status,
				felony_reason:felony_reason,
				Conviction_status:Conviction_status,
				Conviction_reason:Conviction_reason,
				school_grade:school_grade,
				last_school:last_school,
				school_city_state:school_city_state,

				Employer1:Employer1,
				EmployedFrom1:EmployedFrom1,
				EmployedTo1:EmployedTo1,
				EmployerStreet1:EmployerStreet1,
				EmployerCityStateZip1:EmployerCityStateZip1,
				EmployerPhone1:EmployerPhone1,
				EmployerSupervisor1:EmployerSupervisor1,
				EmployerPosition1:EmployerPosition1,
				EmployerReasonforLeaving1:EmployerReasonforLeaving1,
				EmployerEmail1:EmployerEmail1,
				fmcsrs_status1:fmcsrs_status1,
				drug_alcohol_test1:drug_alcohol_test1,

				Employer2:Employer2,
				EmployedFrom2:EmployedFrom2,
				EmployedTo2:EmployedTo2,
				EmployerStreet2:EmployerStreet2,
				EmployerCityStateZip2:EmployerCityStateZip2,
				EmployerPhone2:EmployerPhone2,
				EmployerSupervisor2:EmployerSupervisor2,
				EmployerPosition2:EmployerPosition2,
				EmployerReasonforLeaving2:EmployerReasonforLeaving2,
				EmployerEmail2:EmployerEmail2,
				fmcsrs_status2:fmcsrs_status2,
				drug_alcohol_test2:drug_alcohol_test2,

				Employer3:Employer3,
				EmployedFrom3:EmployedFrom3,
				EmployedTo3:EmployedTo3,
				EmployerStreet3:EmployerStreet3,
				EmployerCityStateZip3:EmployerCityStateZip3,
				EmployerPhone3:EmployerPhone3,
				EmployerSupervisor3:EmployerSupervisor3,
				EmployerPosition3:EmployerPosition3,
				EmployerReasonforLeaving3:EmployerReasonforLeaving3,
				EmployerEmail3:EmployerEmail3,
				fmcsrs_status3:fmcsrs_status3,
				drug_alcohol_test3:drug_alcohol_test3,

				Employer4:Employer4,
				EmployedFrom4:EmployedFrom4,
				EmployedTo4:EmployedTo4,
				EmployerStreet4:EmployerStreet4,
				EmployerCityStateZip4:EmployerCityStateZip4,
				EmployerPhone4:EmployerPhone4,
				EmployerSupervisor4:EmployerSupervisor4,
				EmployerPosition4:EmployerPosition4,
				EmployerReasonforLeaving4:EmployerReasonforLeaving4,
				EmployerEmail4:EmployerEmail4,
				fmcsrs_status4:fmcsrs_status4,
				drug_alcohol_test4:drug_alcohol_test4, 
				
				employee_gap: employee_gap,
				emp_from: emp_from,
				emp_to: emp_to,
				emp_reason: emp_reason,
				employee_company: employee_company,
				criminal_act_involving: criminal_act_involving,
				emp_from1: emp_from1,
				emp_to1: emp_to1,
				emp_reason1: emp_reason1,
				employee_company1: employee_company1,
				criminal_act_involving1: criminal_act_involving1,
				emp_from2: emp_from2,
				emp_to2: emp_to2,
				emp_reason2: emp_reason2,
				employee_company2: employee_company2,
				criminal_act_involving2: criminal_act_involving2,

				show_accidents: show_accidents,
				accident_date: accident_date,
				accident_description: accident_description,
				no_of_injuries: no_of_injuries,
				accident_date1: accident_date1,
				accident_description1: accident_description1,
				no_of_injuries1: no_of_injuries1,
				accident_date2: accident_date2,
				accident_description2: accident_description2,
				no_of_injuries2: no_of_injuries2,
				show_traffic: show_traffic,

				traffic_convictions_date: traffic_convictions_date,
				traffic_convictions_location: traffic_convictions_location,
				traffic_convictions_charge: traffic_convictions_charge,
				traffic_convictions_penalty: traffic_convictions_penalty,
				traffic_convictions_date1: traffic_convictions_date1,
				traffic_convictions_location1: traffic_convictions_location1,
				traffic_convictions_charge1: traffic_convictions_charge1,
				traffic_convictions_penalty1: traffic_convictions_penalty1,
				traffic_convictions_date2: traffic_convictions_date2,
				traffic_convictions_location2: traffic_convictions_location2,
				traffic_convictions_charge2: traffic_convictions_charge2,
				traffic_convictions_penalty2: traffic_convictions_penalty2,

				straight_truck_from: straight_truck_from,
				straight_truck_to: straight_truck_to,
				straight_truck_miles: straight_truck_miles,
				tractor_semi_trailer_from: tractor_semi_trailer_from,
				tractor_semi_trailer_to: tractor_semi_trailer_to,
				tractor_semi_trailer_miles: tractor_semi_trailer_miles,
				tractor_two_trailer_from: tractor_two_trailer_from,
				tractor_two_trailer_to: tractor_two_trailer_to,
				tractor_two_trailer_miles: tractor_two_trailer_miles,
				tractor_three_trailer_from: tractor_three_trailer_from,
				tractor_three_trailer_to: tractor_three_trailer_to,
				tractor_three_trailer_miles: tractor_three_trailer_miles,

				motorcoach_one_from: motorcoach_one_from,
				motorcoach_one_to: motorcoach_one_to,
				motorcoach_one_miles: motorcoach_one_miles,
				motorcoach_two_from: motorcoach_two_from,
				motorcoach_two_to: motorcoach_two_to,
				motorcoach_two_miles: motorcoach_two_miles,

				driving_state: driving_state,
				certification_violations: certification_violations,

				day_1_date: day_1_date,
				day_1_hours: day_1_hours,
				day_2_date: day_2_date,
				day_2_hours: day_2_hours,
				day_3_date: day_3_date,
				day_3_hours: day_3_hours,
				day_4_date: day_4_date,
				day_4_hours: day_4_hours,
				day_5_date: day_5_date,
				day_5_hours: day_5_hours,
				day_6_date: day_6_date,
				day_6_hours: day_6_hours,
				day_7_date: day_7_date,
				day_7_hours: day_7_hours,

				refused_test: refused_test,
				tested_positive: tested_positive,
				pre_employment_drug: pre_employment_drug,
				companyid: company_id,
				username: username,
				userid: userid
				},
			cache: false,
			success: function(Result){
				console.log(Result);
				if(Result){
					swal("Good job!", "Application submited successfully", "success")
				}else{
					swal("Try Again!", "Application not submited successfully", "error")
				}
			}
		});
	});
});
</script>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

		<!-- BOOTSTRAP JS -->
		<script src="{{URL::to('/')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- FORM WIZARD JS-->
		<script src="{{URL::to('/')}}/assets/plugins/formwizard/jquery.smartWizard.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/formwizard/fromwizard.js"></script>

		<!-- INTERNAl JQUERY.STEPS JS -->
		<script src="{{URL::to('/')}}/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/parsleyjs/parsley.min.js"></script>

		<!-- INTERNAL ACCORDION-WIZARD-FORM JS-->
		<script src="{{URL::to('/')}}/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js"></script>
		<script src="{{URL::to('/')}}/assets/js/form-wizard.js"></script>

		<!-- STICKY JS -->
		<script src="{{URL::to('/')}}/assets/js/sticky.js"></script>

		<!-- COLOR THEME JS -->
		<script src="{{URL::to('/')}}/assets/js/themeColors.js"></script>

		<!-- CUSTOM JS -->
		<script src="{{URL::to('/')}}/assets/js/custom.js"></script>

		<!-- Bootstrap-Date Range Picker js-->
		<script src="{{URL::to('/')}}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

		<!-- jQuery UI Date Picker js -->
		<script src="{{URL::to('/')}}/assets/plugins/date-picker/jquery-ui.js"></script>

		<!-- bootstrap-datepicker js (Date picker Style-01) -->
		<script src="{{URL::to('/')}}/assets/plugins/bootstrap-datepicker/js/datepicker.js"></script>

		<!-- Amaze UI Date Picker js-->
		<script src="{{URL::to('/')}}/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

		<!-- Simple Date Time Picker js-->
		<script src="{{URL::to('/')}}/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

		<!-- SELECT2 JS -->
		<script src="{{URL::to('/')}}/assets/plugins/select2/select2.full.min.js"></script>

		<!--Internal Fileuploads js-->
		<script src="{{URL::to('/')}}/assets/plugins/fileuploads/js/fileupload.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/fileuploads/js/file-upload.js"></script>

		<!--Internal Fancy uploader js-->
		<script src="{{URL::to('/')}}/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
		<script src="{{URL::to('/')}}/assets/plugins/fancyuploder/fancy-uploader.js"></script>

		<!-- FORM ELEMENTS JS -->
		<script src="{{URL::to('/')}}/assets/js/formelementadvnced.js"></script>

		<!-- FORM ELEMENTS JS -->
		<script src="{{URL::to('/')}}/assets/js/form-elements.js"></script>

		<!-- FORM ELEMENTS JS -->
		<script src="{{URL::to('/')}}/assets/js/form-elements.js"></script>

		<!-- SELECT2 JS -->
		<script src="{{URL::to('/')}}/assets/plugins/select2/select2.full.min.js"></script>


	</body>
</html>

