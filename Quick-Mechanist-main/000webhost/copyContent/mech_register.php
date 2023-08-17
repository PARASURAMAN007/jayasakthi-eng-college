<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<title> MECHANIC REGISTER</title>
	<style type="text/css">
               *{
               	padding: 0;
               	margin: 0;
               }
               .container{
               	background-image: url('pexels-andrea-piacquadio-3807277');
               	background-size: cover;

               }
	</style>
	<script type="text/javascript">
//mechanic service=others...to open textbox
	function checkvalue()
	{
		 function validateEmail() 
		 {
             var emailID = document.myForm.EMail.value;
             atpos = emailID.indexOf("@");
             dotpos = emailID.lastIndexOf(".");
         
             if (atpos < 1 || ( dotpos - atpos < 2 )) {
             alert("Please enter correct email ID")
             document.myForm.EMail.focus() ;
             return false;
         }
         return( true );
      }
       var service=document.getElementById('mech_service_type').value;
          if (service=='stype') 
       {
       	document.getElementById("other_service").style.visibility='hidden';
	   }

       if (service=='others') 
       {
         document.getElementById("other_service").style.visibility='visible';
       }
       else
       {
       	document.getElementById("other_service").style.visibility='hidden';
       }
	}
//password match
    function Validate() 
      {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password != confirmPassword) 
        {
            alert("Passwords do not match.");
            return false;
        }
        return true;
      }
//password checkbox
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
	</script>
</head>
<body>
	<div class="container">
		<div class="form" align="center">
		<form method="POST" action="./backend/mech_register_back.php">
			<table>
				<tr>
					<td class="text">
						<b>FIRST NAME</b>
					</td>
					<td>
					  <input type="text" name="mech_first_name" required autocomplete="off">
				    </td>
			    </tr>
			    <tr>
			        <td class="text">
			        	<b>LAST NAME</b>
			        </td>
			        <td>
			           <input type="text" name="mech_last_name" required autocomplete="off">
			        </td>
			    </tr>
			    <tr>
			    	<td class="text">
			            <b>DATE OF BIRTH</b>
			        </td>
			        <td>    
			            <input type="DATE" name="mech_dob" required autocomplete="off">
			        </td>
			    </tr>
			    <tr>
			    	<td class="text">
			           <b>SERVICE TYPE</b>  
			        </td>
			        <td>
			            <select onchange="checkvalue(this.value)" id="mech_service_type" required name="mech_service" required>
			            	 <option value="stype">Select Service Type</option>
				             <option value="bike_mechanic">
								Bike Mechanic
				             </option>
                             <option value="car_mechanic">
								Car Mechanic
                             </option>
                             <option value="others">      
								Others
                             </option>
                        </select>
                    </td>
                </tr>
                <tr id="other_service">
                	<td>
                         <b>If Others:</b>
                	</td>
                    <td>
                    	
                           <input type="text" name="mech_other_service" autocomplete="off">
                       
                    </td>
                </tr>
                <tr>
                	<td class="text">
			           <b>HOUSE NO</b>
			        </td>
			        <td>
			        	<input type="text" name="mech_house_no" required autocomplete="off">
			        </td>
			    </tr>
			    <tr>
			    	<td class="text">
			           <b>STREET</b>
			        </td>
			        <td>
			        	<input type="text" name="mech_street" required autocomplete="off">
			        </td>
			    </tr>
			    <tr>
			        <td class="text">    	
			           <b>VILLAGE/CITY</b>
			        </td>
			        <td>
			        	<input type="text" name="mech_village_city" required autocomplete="off">
			        </td>
			    </tr>
			    <tr>
			    	<td class="text">
			           <b>DISTRICT</b>
			        </td>
			        <td>
			           <select name="mech_district" id="mech_district" required>
                                   <option value="chennai">Chennai</option>
                                   <option value="madurai">Madurai</option>
                                   <option value="trichy">Trichy</option>
                                   <option value="coimbatore">Coimbatore</option>
                       </select>
                    </td>
                </tr>
              	<tr>
              		<td class="text">
                       <b>EMAIL</b>
                    </td>
                    <td>
                       <input type="text" name="mech_email" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td class="text">    
   			           <b>MOBILE NUMBER</b>
   			        </td>
   			        <td>
   			        	<input type="NUMBER" name="mech_mobile" required autocomplete="off">
   			        </td>
   			    </tr>
   			    <tr>
   			    	<td class="text">
   			           <b>CREATE PASSWORD</b>
   			        </td>
   			        <td>
   			           <input type="PASSWORD" name="mech_password" id="password" required autocomplete="off">
   			        <td>
   			    </tr>
   			    <tr>
   			        <td class="text">
                        <b>CONFIRM PASSWORD</b>
                    </td>
                    <td>
                      <input type="PASSWORD" name="mech_password" id="confirm_password" required><br><input type="checkbox" onclick="myFunction()"><b>Show Password<b>
                    </td>
                </tr>
                <tr>
                    <td>      
                       <input type="submit" name="mech_form_submit" autocomplete="off" value="SUBMIT" id="btnsubmit" onclick="return Validate()"/>
                    </td>
                </tr>
           </table>
		</form>			
		</div>
	</div>

</body>
</html>