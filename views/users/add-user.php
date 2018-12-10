<main class="grey-card">
    <header>Add New User Account</header>
    <main>
        <form id="reg_form">
            <p><strong>Account Info</strong></p>
            <div class="row">
                <div class="third-row">
                    <label for="username">Username: </label>
                    <input type="text" class="whole-row" id="username" required name="username"/>
                </div>
                <div class="third-row">
                        <label for="username">Password: </label>
                        <input type="password" class="whole-row" id="password" required name="password"/>
                    </div>
                <div class="third-row">
                    <label for="vusername">Verify Password: </label>
                    <input type="password" class="whole-row" id="vpassword" required name="vpassword"/>
                </div>
            </div>
            <br>
            <br>
            <br>
            <p><strong>Personal Info</strong></p>
            <div class="row">
                <div class="third-row">
                    <label for="fname">First name</label>
                    <input type="text" class="whole-row" id="fname" required name="fname"/>
                </div>
                <div class="third-row">
                    <label for="mname">Middle name </label>
                    <input type="text" class="whole-row" id="mname" required name="mname"/>
                </div>
                <div class="third-row">
                    <label for="username">Lastname </label>
                    <input type="text" class="whole-row" id="lname" required name="lname"/>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="third-row">
                    <label for="account">Account Type</label>
                    <select class="whole-row" id="account" name="account">
                        <option name="account" value="1">Nurse</option>
                        <option name="account" value="2">Patient</option>
                    </select>
                </div>
                <div class="third-row">
                    <label for="gender">Gender </label>
                    <select class="whole-row" id="gender" name="gender">
                        <option name="gender" value="0">Male</option>
                        <option name="gender" value="1">Female</option>
                    </select>
                </div>
                <div class="third-row">
                    <label for="age">Age </label>
                    <input type="number" required class="whole-row" id="age" name="age" min="1" max="150" maxlength="3"/>
                </div>
            </div>
            <br><br>
            <div id="sysMessage" style="color: red"></div>
            <br>
            <br>
            <button type="submit" class="button-primary quarter-row">Add User</button>
            <button type="reset" class="button-secondary quarter-row">Clear Data</button>
        </form>
    </main>
</main>
<script type="text/javascript">
    $(document).ready(function(){
        $('#reg_form').on('submit',function(e){
            e.preventDefault();

            if ($('#password').val() != $('#vpassword').val()){
                $('#sysMessage').text('Password does not match!');
                $('#vpassword').focus();

                return false;
            }

            var form = $(this).serialize();
            $.ajax({
                url: '/pagdraft/views/login/ajax_register.php',
                method: 'POST',
                data: form,
                dataType: 'json',
                success: function(data){
                    if (data.error == false){
                        $('#sysMessage').css({color: 'green'}).text('Account Successfully Created!');
                        setTimeout(function(){
                            window.location.replace('/pagdraft/');
                        },1500);
                    }
                }
            });
        });
    });
</script>