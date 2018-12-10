<h1>Account Manager</h1>
<p>The PAGLAUM Account Admin for managing user accounts of patients and nurses.</p>
<hr>
<br>
<main class="row">
    <div class="three-fourth-row">
        <div class="card">
            <header><strong>About Paglaum</strong></header>
            <main>
                <p>
                    Paglaum is health monitoring software designed for checking
                    patient's vitals. It is aplatform allowing both patients and
                    nurses to monitor and acquire statistical insights of vitals
                </p>
                <p>
                    Once your logged in as an admin, you can manage both accounts for patients and nurses.
                </p>
            </main>
        </div>
    </div>
    <div class="quarter-row">
        <div class="grey-card">
            <header>Login</header>
            <main>
                <form id="login_form">
                    <label for="username">Username</label>
                    <input class="whole-row" type="text" id="username" name="username" required>
                    <label for="password">Password</label>
                    <input type="password" class="whole-row" name="password" id="password" required>
                    <br>
                    <div id="sysMessage" style="color: red"></div>
                    <br>
                    <button type="submit" class="button-primary whole-row">Login to your account</button>
                    <a href="?page=register" class="button-secondary whole-row">Create new account</a>
                </form>
            </main>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function(){
        $('#login_form').on('submit',function(e){
            e.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url: '/pagdraft/views/login/ajax_login.php',
                data: form,
                dataType: 'json',
                success: function(data){
                    if (data.error == false){
                        $('#sysMessage').css({color: 'green'}).text('Login Successful!');
                        setTimeout(function(){
                            window.location.replace('/pagdraft/');
                        },1500);
                    }else {
                        $('#sysMessage').text(data.message);
                    }
                }
            });
        });
    });
</script>