<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="jQuery UI autocomplete in Bootstrap Modal Popup Using PHP Ajax, jquery ui autocomplete bootstrap, autocomplete in modal popup">
		<meta name="description" content="jQuery UI autocomplete in Bootstrap Modal Popup Using PHP Ajax, jquery ui autocomplete bootstrap, autocomplete in modal popup">
		<title>Bootstrap Modal jQuery Autocomplete</title>
		<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Noto+Serif:400,700">
		<link href="css/jquery-ui.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
    	<link href="css/datepicker.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<link href="css/style.css" rel="stylesheet">
		
	</head>
<body>

	<!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Bootstrap Modal jQuery Autocomplete</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="http://www.smarttutorials.net/"><i class="fa fa-home"></i>Home</a></li>
					<li><a href="http://www.smarttutorials.net/demo/"> <i class="fa fa-book"></i> Demo </a></li>
					<li><a href="http://blog.smarttutorials.net/"> <i class="fa fa-bank"></i> Blog </a></li>
					<li><a href="http://forum.smarttutorials.net/"> <i class="fa fa-file"></i> Forum </a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
			<!--/.nav-collapse -->
		</div>
	</div>
	
	
	<div class="container content">
		<div class='row'>
    		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
    			<h1 class="text-center title">jQuery UI autocomplete in Bootstrap Modal Popup</h1>
    		</div>
    	</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="text-center">
					<button style="font-size:25px;text-decoration:underline;font-weight:bold" class="btn btn-lg btn-success btn-lg text-center" data-toggle="modal" data-target="#modal-fullscreen">Create Invoice<br/> <span style="font-size:13px;text-decoration:none;">(Note: Click on the button to launch Modal)</span></button>
				</div>
				
			
				<div class="clearfix"></div>
				<br /><br />
				
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Name</th>
			                <th>Position</th>
			                <th>Office</th>
			                <th>Age</th>
			                <th>Start date</th>
			                <th>Salary</th>
			            </tr>
			        </thead>
			        <tfoot>
			            <tr>
			                <th>Name</th>
			                <th>Position</th>
			                <th>Office</th>
			                <th>Age</th>
			                <th>Start date</th>
			                <th>Salary</th>
			            </tr>
			        </tfoot>
			        <tbody>
			            <tr>
			                <td>Tiger Nixon</td>
			                <td>System Architect</td>
			                <td>Edinburgh</td>
			                <td>61</td>
			                <td>2011/04/25</td>
			                <td>$320,800</td>
			            </tr>
			            <tr>
			                <td>Garrett Winters</td>
			                <td>Accountant</td>
			                <td>Tokyo</td>
			                <td>63</td>
			                <td>2011/07/25</td>
			                <td>$170,750</td>
			            </tr>
			            <tr>
			                <td>Ashton Cox</td>
			                <td>Junior Technical Author</td>
			                <td>San Francisco</td>
			                <td>66</td>
			                <td>2009/01/12</td>
			                <td>$86,000</td>
			            </tr>
			            <tr>
			                <td>Cedric Kelly</td>
			                <td>Senior Javascript Developer</td>
			                <td>Edinburgh</td>
			                <td>22</td>
			                <td>2012/03/29</td>
			                <td>$433,060</td>
			            </tr>
			            <tr>
			                <td>Airi Satou</td>
			                <td>Accountant</td>
			                <td>Tokyo</td>
			                <td>33</td>
			                <td>2008/11/28</td>
			                <td>$162,700</td>
			            </tr>
			            <tr>
			                <td>Brielle Williamson</td>
			                <td>Integration Specialist</td>
			                <td>New York</td>
			                <td>61</td>
			                <td>2012/12/02</td>
			                <td>$372,000</td>
			            </tr>
			            <tr>
			                <td>Herrod Chandler</td>
			                <td>Sales Assistant</td>
			                <td>San Francisco</td>
			                <td>59</td>
			                <td>2012/08/06</td>
			                <td>$137,500</td>
			            </tr>
			            <tr>
			                <td>Rhona Davidson</td>
			                <td>Integration Specialist</td>
			                <td>Tokyo</td>
			                <td>55</td>
			                <td>2010/10/14</td>
			                <td>$327,900</td>
			            </tr>
			            <tr>
			                <td>Colleen Hurst</td>
			                <td>Javascript Developer</td>
			                <td>San Francisco</td>
			                <td>39</td>
			                <td>2009/09/15</td>
			                <td>$205,500</td>
			            </tr>
			            <tr>
			                <td>Sonya Frost</td>
			                <td>Software Engineer</td>
			                <td>Edinburgh</td>
			                <td>23</td>
			                <td>2008/12/13</td>
			                <td>$103,600</td>
			            </tr>
			            <tr>
			                <td>Jena Gaines</td>
			                <td>Office Manager</td>
			                <td>London</td>
			                <td>30</td>
			                <td>2008/12/19</td>
			                <td>$90,560</td>
			            </tr>
			            <tr>
			                <td>Quinn Flynn</td>
			                <td>Support Lead</td>
			                <td>Edinburgh</td>
			                <td>22</td>
			                <td>2013/03/03</td>
			                <td>$342,000</td>
			            </tr>
			            <tr>
			                <td>Charde Marshall</td>
			                <td>Regional Director</td>
			                <td>San Francisco</td>
			                <td>36</td>
			                <td>2008/10/16</td>
			                <td>$470,600</td>
			            </tr>
			            <tr>
			                <td>Haley Kennedy</td>
			                <td>Senior Marketing Designer</td>
			                <td>London</td>
			                <td>43</td>
			                <td>2012/12/18</td>
			                <td>$313,500</td>
			            </tr>
			            <tr>
			                <td>Tatyana Fitzpatrick</td>
			                <td>Regional Director</td>
			                <td>London</td>
			                <td>19</td>
			                <td>2010/03/17</td>
			                <td>$385,750</td>
			            </tr>
			            <tr>
			                <td>Michael Silva</td>
			                <td>Marketing Designer</td>
			                <td>London</td>
			                <td>66</td>
			                <td>2012/11/27</td>
			                <td>$198,500</td>
			            </tr>
			            <tr>
			                <td>Paul Byrd</td>
			                <td>Chief Financial Officer (CFO)</td>
			                <td>New York</td>
			                <td>64</td>
			                <td>2010/06/09</td>
			                <td>$725,000</td>
			            </tr>
			            <tr>
			                <td>Gloria Little</td>
			                <td>Systems Administrator</td>
			                <td>New York</td>
			                <td>59</td>
			                <td>2009/04/10</td>
			                <td>$237,500</td>
			            </tr>
			            <tr>
			                <td>Bradley Greer</td>
			                <td>Software Engineer</td>
			                <td>London</td>
			                <td>41</td>
			                <td>2012/10/13</td>
			                <td>$132,000</td>
			            </tr>
			            <tr>
			                <td>Dai Rios</td>
			                <td>Personnel Lead</td>
			                <td>Edinburgh</td>
			                <td>35</td>
			                <td>2012/09/26</td>
			                <td>$217,500</td>
			            </tr>
			            <tr>
			                <td>Jenette Caldwell</td>
			                <td>Development Lead</td>
			                <td>New York</td>
			                <td>30</td>
			                <td>2011/09/03</td>
			                <td>$345,000</td>
			            </tr>
			            <tr>
			                <td>Yuri Berry</td>
			                <td>Chief Marketing Officer (CMO)</td>
			                <td>New York</td>
			                <td>40</td>
			                <td>2009/06/25</td>
			                <td>$675,000</td>
			            </tr>
			            <tr>
			                <td>Caesar Vance</td>
			                <td>Pre-Sales Support</td>
			                <td>New York</td>
			                <td>21</td>
			                <td>2011/12/12</td>
			                <td>$106,450</td>
			            </tr>
			            <tr>
			                <td>Doris Wilder</td>
			                <td>Sales Assistant</td>
			                <td>Sidney</td>
			                <td>23</td>
			                <td>2010/09/20</td>
			                <td>$85,600</td>
			            </tr>
			            <tr>
			                <td>Angelica Ramos</td>
			                <td>Chief Executive Officer (CEO)</td>
			                <td>London</td>
			                <td>47</td>
			                <td>2009/10/09</td>
			                <td>$1,200,000</td>
			            </tr>
			            <tr>
			                <td>Gavin Joyce</td>
			                <td>Developer</td>
			                <td>Edinburgh</td>
			                <td>42</td>
			                <td>2010/12/22</td>
			                <td>$92,575</td>
			            </tr>
			            <tr>
			                <td>Jennifer Chang</td>
			                <td>Regional Director</td>
			                <td>Singapore</td>
			                <td>28</td>
			                <td>2010/11/14</td>
			                <td>$357,650</td>
			            </tr>
			            <tr>
			                <td>Brenden Wagner</td>
			                <td>Software Engineer</td>
			                <td>San Francisco</td>
			                <td>28</td>
			                <td>2011/06/07</td>
			                <td>$206,850</td>
			            </tr>
			            <tr>
			                <td>Fiona Green</td>
			                <td>Chief Operating Officer (COO)</td>
			                <td>San Francisco</td>
			                <td>48</td>
			                <td>2010/03/11</td>
			                <td>$850,000</td>
			            </tr>
			            <tr>
			                <td>Shou Itou</td>
			                <td>Regional Marketing</td>
			                <td>Tokyo</td>
			                <td>20</td>
			                <td>2011/08/14</td>
			                <td>$163,000</td>
			            </tr>
			            <tr>
			                <td>Michelle House</td>
			                <td>Integration Specialist</td>
			                <td>Sidney</td>
			                <td>37</td>
			                <td>2011/06/02</td>
			                <td>$95,400</td>
			            </tr>
			            <tr>
			                <td>Suki Burks</td>
			                <td>Developer</td>
			                <td>London</td>
			                <td>53</td>
			                <td>2009/10/22</td>
			                <td>$114,500</td>
			            </tr>
			            <tr>
			                <td>Prescott Bartlett</td>
			                <td>Technical Author</td>
			                <td>London</td>
			                <td>27</td>
			                <td>2011/05/07</td>
			                <td>$145,000</td>
			            </tr>
			            <tr>
			                <td>Gavin Cortez</td>
			                <td>Team Leader</td>
			                <td>San Francisco</td>
			                <td>22</td>
			                <td>2008/10/26</td>
			                <td>$235,500</td>
			            </tr>
			            <tr>
			                <td>Martena Mccray</td>
			                <td>Post-Sales support</td>
			                <td>Edinburgh</td>
			                <td>46</td>
			                <td>2011/03/09</td>
			                <td>$324,050</td>
			            </tr>
			            
			        </tbody>
			    </table>
			
			</div>
		</div>
	</div>



	<div class="modal modal-fullscreen fade" id="modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Create Invoice</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h2>From,</h2>
						    	<div class='row'>
						      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
						      			<div class="form-group">
											<input type="email" class="form-control" id="companyName" placeholder="Company Name">
										</div>
										<div class="form-group">
											<textarea class="form-control" rows='3' id="companyAddress" placeholder="Your Address"></textarea>
										</div>
						      		</div>
						      	</div>
						      	<h2>To,</h2>
						      	<div class='row'>
						      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
						      			<div class="form-group">
											<input type="email" class="form-control" id="clientCompanyName" placeholder="Company Name">
										</div>
										<div class="form-group">
											<textarea class="form-control" rows='3' id="clientAddress" placeholder="Your Address"></textarea>
										</div>
										
						      		</div>
						      		<div class='col-xs-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-4 col-md-4 col-lg-4'>
						      			<div class="form-group">
											<input type="number" class="form-control" id="invoiceNo" placeholder="Invoice No">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="invoiceDate" placeholder="Invoice Date">
										</div>
										<div class="form-group">
											<input type="number" class="form-control amountDue" id="amountDueTop" placeholder="Amount Due">
										</div>
						      		</div>
						      	</div>
						      	<h2>&nbsp;</h2>
						      	<div class='row'>
						      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      			<table class="table table-bordered table-hover" id="table_auto">
											<thead>
												<tr>
													<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
													<th width="15%">Item No</th>
													<th width="38%">Item Name</th>
													<th width="15%">Price</th>
													<th width="15%">Quantity</th>
													<th width="15%">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input class="case" type="checkbox"/></td>
													<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													<td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													<td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
													<td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
													<td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
												</tr>
											</tbody>
										</table>
						      		</div>
						      	</div>
						      	
						      	<div class='row'>
						      		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
						      			<button class="btn btn-danger delete" type="button">- Delete</button>
						      			<button class="btn btn-success addmore" type="button">+ Add More</button>
						      		</div>
						      		<div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
										<form class="form-inline">
											<div class="form-group">
												<label>Subtotal: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input type="number" class="form-control" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Tax: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input type="number" class="form-control" id="tax" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Tax Amount: &nbsp;</label>
												<div class="input-group">
													<input type="number" class="form-control" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													<div class="input-group-addon">%</div>
												</div>
											</div>
											<div class="form-group">
												<label>Total: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input type="number" class="form-control" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Paid: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input type="number" class="form-control" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Due: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon">$</div>
													<input type="number" class="form-control amountDue" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
										</form>
									</div>
						      	</div>
						      	
						      	<h2>Notes: </h2>
						      	<div class='row'>
						      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						      			<div class="form-group">
											<textarea class="form-control" rows='5' id="notes" placeholder="Your Notes"></textarea>
										</div>
						      		</div>
						      	</div>
							
								<!-- End Here -->
							
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	
	
	<script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>