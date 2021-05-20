const regex = {



  Name: /^([A-Za-z\s']+)$/i,

  Username: /^[a-zA-Z0-9@_$]+$/,

  PhoneNumber: /^(\+91 |91|0|\+91|91 |\+91\-|91\-){0,1}[6-9]{1}[0-9]{9}$/,

  Email: /^([\w\.\-]+)@([a-z\d\-]+)\.([a-z]{2,8})(\.[a-z]{2,8}){0,1}(\.[a-z]{2,8}){0,1}$/,

  // City: /^([0-9]{0,1}|[0-9]{0,1} )([A-Za-z']{1,16}){1}(\s[A-za-z']{1,16}){0,2}$/,

  Password: /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&_#]).{8,32}$/



}



function submission(){

  let w1 = document.getElementById("PhoneNumber");

  let var1 = w1.value.trim();

  

  if (!var1.match(regex.PhoneNumber) || var1.length==0) {

    alert("Error in registering. Please check the validity of your credentials.");

    return false;

    

  }else{

    

  }

  let w3 = document.getElementById("Email");

  let var3 = w3.value.trim();

    if (!var3.match(regex.Email) || var3.length==0) {

      alert("Error in registering. Please check the validity of your credentials.");

      return false;

     

    }else{

      

    }

    let w4 = document.getElementById("Password");

    let var4 = w4.value.trim();

    if (!var4.match(regex.Password) || var4.length==0) {

      alert("Error in registering. Please check the validity of your credentials.");

      return false;

      

    }else{

      

    }

    let w12 = document.getElementById("Password");

    let var12 = w12.value.trim();

    let w5 = document.getElementById("ConfirmPassword");

    let var5 = w5.value.trim();

    if (var5 !== var12 || var5.length==0) {

      alert("Error in registering. Please check the validity of your credentials.");

      return false;

      

    }else{

     

    }

    let w6 = document.getElementById("Name");

    let var6 = w6.value.trim();

    if (!var6.match(regex.Name) || var6.length==0) {

      alert("Error in registering. Please check the validity of your credentials.");

      return false;

      

    }else{

      

    }



    let w7 = document.getElementById("Username");

    let var7 = w7.value.trim();

    if (!var7.match(regex.Username) || var7.length==0) {

      alert("Error in registering. Please check the validity of your credentials.");

      return false;

      

    }else{

      

    }

    

}

function phone(){

  let w1 = document.getElementById("PhoneNumber");

let var1 = w1.value.trim();

  if (!var1.match(regex.PhoneNumber) || var1.length==0) {

    // alert("Invalid number, Pls write in format - +91 DDDDDDDDDD");

    func("*Invalid number, Pls write in format - +91 6/7/8/9DDDDDDDDD", "validate-phone");

    w1.classList.add("invalid");

    // return false;

    

  }else{

    func("", "validate-phone");

    w1.classList.remove("invalid");

  }

}





  function getemail(){

    let w3 = document.getElementById("Email");

  let var3 = w3.value.trim();

    if (!var3.match(regex.Email) || var3.length==0) {

      // alert("Invalid email, Pls write in format - test@test.com");

      func("*Invalid email, Pls write in format - test@test.com", "validate-email");

      w3.classList.add("invalid");

      // return false;

     

    }else{

      func("", "validate-email");

      w3.classList.remove("invalid");

    }

  }

  

  

  function getpassword(){

    let w4 = document.getElementById("Password");

    let var4 = w4.value.trim();

    if (!var4.match(regex.Password) || var4.length==0) {

      // alert("Invalid password, Pls use letters- a-z,@,_,-");

      func("*Invalid password, Pls use atleast one lower case, upper case, digit,special character and type 8-15 letters", "validate-password");

      w4.classList.add("invalid");

      // return false;

      

    }else{

      func("", "validate-password");

      w4.classList.remove("invalid");

    }

  

  }

  

  function confirm(){

    let w12 = document.getElementById("Password");

    let var12 = w12.value.trim();

    let w5 = document.getElementById("ConfirmPassword");

    let var5 = w5.value.trim();

    if (var5 !== var12 || w5.length == 0) {

      // alert("Different password written");

      func("*Different password written", "validate-confirmpassword");

      w5.classList.add("invalid");

      // return false;

      

    }else{

      func("", "validate-confirmpassword");

      w5.classList.remove("invalid");

    }

  }

  



  function nome(){

    let w6 = document.getElementById("Name");

    let var6 = w6.value.trim();

    if (!var6.match(regex.Name) || var6.length==0) {

      // alert("Invalid name, Pls specify in format rohan gavaskar etc");

      func("*Invalid name, Pls specify in format rohan gavaskar etc", "validate-naam");

      w6.classList.add("invalid");

      // return false;

      

    }else{

      func("", "validate-naam");

      w6.classList.remove("invalid");

    }

  

  }

  function usernome(){

    let w7 = document.getElementById("Username");

    let var7 = w7.value.trim();

    if (!var7.match(regex.Username) || var7.length==0) {

      // alert("Invalid name, Pls specify in format rohan gavaskar etc");

      func("*Invalid username, please use anything of a-z, A-Z, 0-9 and special characters", "validate-username");

      w7.classList.add("invalid");

      // return false;

      

    }else{

      func("", "validate-username");

      w7.classList.remove("invalid");

    }

  

  }

 

  

  function func(display, id) {

    document.getElementById(id).innerHTML = display;

  }

  

 

  // <div class="container">

  //     <div class="row">

  //         <div class="col-4 offset-md-4 form-div">

  //         <form action="" enctype="multipart/form-data">

              

  //             <h3 class="text-center">User Profile</h3>

  //             <div class="form-group text-center">

  //                <img src="images/<?php echo $profileimage1 ?>" id="profileDisplay" alt="">

  //                <label for="profileImage">Profile Image</label>

  //                <!-- <input type="file" name="profileImage" id="profileImage" style="display: none;"> -->

  //             </div>

               

  //             <div class="form-group">

  //                <label for="username">Fullname</label>

  //                <input type="text" value="<?php echo $name1 ?>" class="form-control">

  //              </div>

  //             <div class="form-group">

  //                <label for="username">Username</label>

  //                <input type="text" value="<?php echo $username1 ?>" class="form-control">

  //              </div>



  //              <div class="form-group">

  //                <label for="password">Password</label>

  //                <input type="text" value="<?php echo $password1 ?>" class="form-control">

  //              </div>



  //              <div class="form-group">

  //                <label for="contacts">Contacts</label>

  //                <input type="text" value="<?php echo $phoneno1 ?>" class="form-control">

  //              </div>



  //              <div class="form-group">

  //                <label for="email">Email</label>

  //                <input type="text" value="<?php echo $email ?>" class="form-control">

  //              </div>



  //              <div class="form-group">

  //                <label for="age">Age</label>

  //                <input type="text" value="<?php echo $age1 ?>" class="form-control">

  //              </div>



               



  //              <div class="form-group">

  //                <label for="bio">Bio</label>

  //                <textarea value="<?php echo $bio1 ?>" class="form-control" cols="30" rows="5"></textarea>

  //              </div>

  //         </form>

  //         </div>

  //     </div>

  // </div>







 

  // <div class="container">

  //     <div class="row">

  //         <div class="col-4 offset-md-4 form-div">

  //         <form action="" enctype="multipart/form-data">



  // <h3 class="text-center">User Profile</h3>

  // <div class="form-group text-center">

  //    <img src="images/<?php echo $profileimage ?>" id="profileDisplay" alt="">

  //    <label for="profileImage">Profile Image</label>

  //    <input type="file" name="profileImage" id="profileImage" style="display: none;">

  // </div>

   

  // <div class="form-group">

  //    <label for="username">Fullname</label>

  //    <input type="text" value="<?php echo $name ?>" class="form-control">

  //  </div>

  // <div class="form-group">

  //    <label for="username">Username</label>

  //    <input type="text" value="<?php echo $username1 ?>" class="form-control">

  //  </div>



  //  <div class="form-group">

  //    <label for="password">Password</label>

  //    <input type="text" value="<?php echo $password1 ?>" class="form-control">

  //  </div>



  //  <div class="form-group">

  //    <label for="contacts">Contacts</label>

  //    <input type="text" value="<?php echo $phoneno ?>" class="form-control">

  //  </div>



  //  <div class="form-group">

  //    <label for="email">Email</label>

  //    <input type="text" value="<?php echo $email ?>" class="form-control">

  //  </div>



  //  <div class="form-group">

  //    <label for="age">Age</label>

  //    <input type="text" value="<?php echo $age1 ?>" class="form-control">

  //  </div>



   



  //  <div class="form-group">

  //    <label for="bio">Bio</label>

  //    <textarea value="<?php echo $bio1 ?>" class="form-control" cols="30" rows="5"></textarea>

  //  </div>

  //  </form>

  //         </div>

  //     </div>

  // </div>


