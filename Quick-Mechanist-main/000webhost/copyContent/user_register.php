<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER REGISTER</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <script type="text/javascript">
        //password match
        function Validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
        //password checkbox
        function showPassword() {
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
            <form name="my" method="POST" action="./backend/user_register_back.php" onclick="return ValidateForm()">
                <table>
                    <tr>
                        <td class="text">
                            <b>FIRST NAME</b>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="user_first_name" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>LAST NAME</b>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="user_last_name" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>DATE OF BIRTH</b>
                        </td>
                        <td>
                            <input class="form-control" type="DATE" name="user_dob" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>HOUSE NO</b>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="user_house_no" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>STREET</b>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="user_street" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>VILLAGE/CITY</b>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="user_village_city" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>DISTRICT</b>
                        </td>
                        <td>
                            <select name="user_district" id="user_district" required>
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
                            <input class="form-control" type="text" name="user_email" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>MOBILE NUMBER</b>
                        </td>
                        <td>
                            <input class="form-control" type="NUMBER" name="user_mobile" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>CREATE PASSWORD</b>
                        </td>
                        <td>
                            <input class="form-control" type="PASSWORD" name="user_password" id="password" required><br>
                            <!-- <input class="form-control" type="checkbox" onclick="showPassword()"><b>Show Password</b> -->
                        <td>
                    </tr>
                    <tr>
                        <td class="text">
                            <b>CONFIRM PASSWORD</b>
                        </td>
                        <td>
                            <input class="form-control" type="PASSWORD" name="user_password" id="confirm_password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="submit" id="btnsubmit" name="user_form_submit" value="SUBMIT" onclick="return Validate()" />
                        </td>
                </table>
            </form>
        </div>
    </div>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> -->

</html>