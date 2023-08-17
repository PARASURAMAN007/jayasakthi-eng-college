<?php
include('components/header.php');
?>

<div class="link d-flex justify-content-center">
   <div class="d-flex">
      <div>
         <h4 class="text-center text-white">
            New to Quick Mechanist?
         </h4>
         <a class="noHover" href="user_register.php">
            <button class="btn">REGISTER AS VEHICLE OWNER</button><br>
         </a>
         <a class="noHover" href="mech_register.php">
            <button class="btn">REGISTER AS MECHANIC</button><br>
         </a>
      </div>
      <div class="verticalSplitter"></div>
      <div>
         <h4 class="text-center text-white">
            Welcome back
         </h4>
         <a class="noHover" href="user_login.php">
            <button class="btn">VEHICLE OWNER LOGIN</button><br>
         </a>
         <a class="noHover" href="mech_login.php">
            <button class="btn">MECHANIC LOGIN</button><br>
         </a>
      </div>
   </div>
</div>

<?php
include('components/footer.php');
?>