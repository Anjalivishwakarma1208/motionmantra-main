
<form role="form" id="stuRegForm">
   <div class="form-group">
     <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small id="statusMsg1"></small><input type="text"
       class="form-control" placeholder="Name" name="stuname" id="stuname">
   </div>
   <div class="form-group">
   <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small><input type="email"
       class="form-control" placeholder="Email" name="stuemail" id="stuemail">
     <small class="form-text">We'll never share your email with anyone else.</small>
   </div>
   <div class="form-group">
     <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New
       Password</label><small id="statusMsg3"></small><input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
   </div>
 </form>
 <script>
document.getElementById("stupass").addEventListener("input", function() {
    let password = this.value;
    let statusMsg = document.getElementById("statusMsg3");

    let passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

    if (!passwordRegex.test(password)) {
        statusMsg.innerHTML = "<span style='color: red;'>Password must be at least 6 characters long and include an uppercase letter, a lowercase letter, and a number.</span>";
    } else {
        statusMsg.innerHTML = "<span style='color: green;'>Strong password!</span>";
    }
});

// Prevent form submission if password is weak
document.getElementById("stuRegForm").addEventListener("submit", function(event) {
    let password = document.getElementById("stupass").value;
    let passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

    if (!passwordRegex.test(password)) {
        document.getElementById("statusMsg3").innerHTML = "<span style='color: red;'>Weak password! Please follow the rules.</span>";
        event.preventDefault(); // Stop form submission
    }
});
</script>
